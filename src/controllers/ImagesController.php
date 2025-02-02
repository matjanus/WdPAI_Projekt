<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/GalleryRepository.php';

class ImagesController extends AppController {

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/app/img/galleries/';

    public function uploadImage() {
        $user = $this->getUserFromCookies();
        if ($user === null) {
            $this->render('main');
            return;
        }

        $id_gallery = $_POST['id_gallery'];

        if (!is_uploaded_file($_FILES['image']['tmp_name']) || !$this->validateFile($_FILES['image'])) {
            $this->redirect("/gallery/".$id_gallery);
        }
        $galleryRepository = new GalleryRepository();

        if(!$galleryRepository->ifUserHasAccessToGallery($user, $id_gallery)){
            exit;
        }
        $new_image_name = $galleryRepository->addImageToGallery($id_gallery);

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            self::UPLOAD_DIRECTORY . $new_image_name
        );

        $this->redirect("/gallery/".$id_gallery);
    }

    private function validateFile(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            return false;
        }
        return true;
    }
        
    

}
