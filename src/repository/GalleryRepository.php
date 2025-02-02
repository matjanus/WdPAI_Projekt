<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Gallery.php';
require_once __DIR__.'/../models/Image.php';

class GalleryRepository extends Repository {
    public function getUsersGalleries(user $user): array{

        $stmt = $this->database->connect()->prepare('
            select * from vusers_in_galleries_with_their_names where id_user = ? ;
        ');

        $stmt->execute([$user->getId()]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $galleries = [];
        foreach ($res as $galleryData) { 
            $galleries[] = new Gallery(
                $galleryData['id_gallery'],
                $galleryData['gallery_name'],
                $galleryData['id_image'],
            );
        }
        return $galleries;
    }

    public function ifUserHasAccessToGallery(User $user, int $id_gallery): bool{
        $stmt = $this->database->connect()->prepare('
            SELECT id_user, id_gallery
	            FROM public.users_in_galleries where id_user = ? and id_gallery = ? ;
        ');

        $stmt->execute([$user->getId(), $id_gallery]);
        return count($stmt->fetchAll(PDO::FETCH_ASSOC)) !== 0;

    }

    public function getGallerysImages(int $id_gallery): array{
        $stmt = $this->database->connect()->prepare('
            SELECT id_image
                FROM public.images
                where id_gallery = ? ;
        ');

        $stmt->execute([$id_gallery]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $images = [];
        foreach ($res as $image) {
            $images[] =  new Image($image["id_image"]);
        }
        return $images;
    }

    public function addUserToGallery(User $user, int $id_gallery) : void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users_in_galleries(
                id_user, id_gallery)
                VALUES (?, ?);
        ');

        $stmt->execute([$user->getId(), $id_gallery]);
    }

    public function getGalleryByInviteCode(string $inviteCode): int {
        $stmt = $this->database->connect()->prepare('
            SELECT id_gallery FROM public.gallery_details WHERE invite_code = ?;
        ');
    
        $stmt->execute([$inviteCode]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $res ? (int) $res['id_gallery'] : 0;
    }

    public function createNewGallery(string $gallery_name, User $user): int {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.galleries (gallery_name) 
            VALUES (?) 
            RETURNING id_gallery;
        ');
        $stmt->execute([$gallery_name]);

        $id_gallery = $stmt->fetch(PDO::FETCH_ASSOC)['id_gallery'];

        if (!$id_gallery) {
            return 0; 
        }

        $this->addUserToGallery($user, $id_gallery);

        return $id_gallery;
    }

    public function getGallerysCode(int $id_gallery): ?string {
        $stmt = $this->database->connect()->prepare('
            SELECT invite_code
            FROM public.gallery_details
            WHERE id_gallery = ?;
        ');

        $stmt->execute([$id_gallery]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && isset($result['invite_code'])) {
            return $result['invite_code'];
        }

        return null;
    }

    public function addImageToGallery(int $id_gallery): string {
        $stmt = $this->database->connect()->prepare('
            select add_image_to_gallery( ? );
        ');

        $stmt->execute([$id_gallery]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC)["add_image_to_gallery"];
        return $res;
    }

    public function setImageAsCover($id_gallery, $id_image) : void {
        $stmt = $this->database->connect()->prepare('
            select id_image from gallery_covers where id_gallery = ?;
        ');
        $stmt->execute([$id_gallery]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result === false){
            $stmt = $this->database->connect()->prepare('
                INSERT INTO public.gallery_covers(
                    id_gallery, id_image)
                    VALUES (?, ?);
            ');
            $stmt->execute([$id_gallery, $id_image]);
        }else{
            $stmt = $this->database->connect()->prepare('
                UPDATE public.gallery_covers
                    SET id_image= ?
                    WHERE id_gallery = ?;
        ');
        $stmt->execute([$id_image, $id_gallery]);
        }
    }
}