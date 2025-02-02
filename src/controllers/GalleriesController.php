<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/GalleryRepository.php';


class GalleriesController extends AppController {

    public function api(array $exploaded_urp)
    {
        $user = $this->getUserFromCookies();
        if ($user == null) {
            return;
        }
        if($exploaded_urp[1] === "galleries"){
            $this->appGalleries($user);
            return;
        }
        
    }

    public function gallery(array $exploaded_url): void
    {
        $user = $this->getUserFromCookies();
        if ($user == null) {
            $this->render('main');
            return;
        }
        $id_gallery = (int)$exploaded_url[1];
        $galleryRepository = new GalleryRepository();
        if($galleryRepository->ifUserHasAccessToGallery($user,$id_gallery )){
            $images = $galleryRepository->getGallerysImages($id_gallery);
            $invite_code = $galleryRepository->getGallerysCode($id_gallery);
            $this->render('galleryview', ["images" => $images, "invite_code" => $invite_code, "id_gallery" => $id_gallery]);
        }else{
            $this->redirect("../");
        }
        
    }

    private function appGalleries(User $user){
        $galleryRepository = new GalleryRepository();
        $galleries = $galleryRepository->getUsersGalleries($user);
        $jsons = [];
        foreach($galleries as $gallery){
            $jsons[] = $gallery->toJson();
        }
        echo json_encode($jsons);
    }

    public function newGallery() : void {
        $user = $this->getUserFromCookies();
        if ($user == null) {
            $this->render('main');
            return;
        }
        $this->render('newGallery');
    }


    public function joinGallery() : void {
        $user = $this->getUserFromCookies();
        if ($user == null) {
            $this->render('main');
            return;
        }
        $code = $_POST['code'];
        $galleryRepository = new GalleryRepository();
        $id_gallery = $galleryRepository->getGalleryByInviteCode($code);
        if($id_gallery === 0){
            $this->render('newGallery', ["message" => "Wrong code!"]);
            return;
        }
        if($galleryRepository->ifUserHasAccessToGallery($user, $id_gallery)){
            $this->render('newGallery', ["message" => "You already have acces to this gallery!"]);
            return;
        }

        $galleryRepository->addUserToGallery($user, $id_gallery);

        $this->redirect("/gallery/".$id_gallery);
    }


    public function createNewGallery(): void {
        $user = $this->getUserFromCookies();
        if ($user === null) {
            $this->render('main');
            return;
        }
    
        if (!isset($_POST['galleryName']) || empty(trim($_POST['galleryName']))) {
            $this->render('newGallery', ["message" => "Please enter a gallery name!"]);
            return;
        }
    
        $galleryName = trim($_POST['galleryName']);
        $galleryRepository = new GalleryRepository();
    
        $id_gallery = $galleryRepository->createNewGallery($galleryName, $user);
    
        if ($id_gallery === 0) {
            $this->render('newGallery', ["message" => "Error creating gallery!"]);
            return;
        }
    
        $this->redirect("/gallery/" . $id_gallery);
    }

    public function setGalleryCover(){
        $user = $this->getUserFromCookies();
        if ($user === null) {
            $this->render('main');
            return;
        }
    
        if (!isset($_POST['id_image']) || empty(trim($_POST['id_image']))) {
            return;
        }
        if (!isset($_POST['id_gallery'])) {
            return;
        }
        
        $id_gallery = $_POST['id_gallery'];
        $id_image = $_POST['id_image'];
        $galleryRepository = new GalleryRepository();

        if(!$galleryRepository->ifUserHasAccessToGallery($user, $id_gallery)){
            return;
        }

        $galleryRepository->setImageAsCover( $id_gallery, $id_image);

        $this->redirect("/gallery/".$id_gallery);
    }





}