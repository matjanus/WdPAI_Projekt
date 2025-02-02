<?php

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');
Router::post('logOut', 'SecurityController');
Router::post('changePassword', 'SecurityController');
Router::get('signUp', 'DefaultController');
Router::get('accountSettings', 'UserController');
Router::get('api', 'GalleriesController');
Router::get('gallery', 'GalleriesController');
Router::get('newGallery', 'GalleriesController');
Router::post('joinGallery', 'GalleriesController');
Router::post('createNewGallery', 'GalleriesController');
Router::post('uploadImage', 'ImagesController');
Router::post('setGalleryCover', 'GalleriesController');



Router::run($path);