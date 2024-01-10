<?php

require_once "../controller/AuthController.php";

$usercontroller = new AuthController();

if(isset($_GET['action'])){
    $route = $_GET['action'];

    switch($route){
        case 'register':
            extract($_POST);
            $usercontroller->register($prenom,$nom,$email,$password);
            break;
        case 'login';
            extract($_POST);
            $usercontroller->login($email,$password);
            break;
            case 'categorie';
            $usercontroller=new AdminController();
            $usercontroller->getCategories();
            break;
    }
}