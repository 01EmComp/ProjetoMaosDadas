<?php 
namespace App\Controller;
use Classes\Render;
class LoginController extends Render{
    function __construct() {
        session_start();
        if(isset($_SESSION['userId'])){
            header('location:'.DIRPAGE.'perfil');
        }else{
            $this->setTitle("Login"); 
            $this->setDescritpion("Pagina login");
            $this->setKeywords("Login");
            $this->setDir("Login/"); 
            $this->renderLayout();
        }
    }
}