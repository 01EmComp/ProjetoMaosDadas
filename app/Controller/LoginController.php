<?php 
namespace App\Controller;
use Classes\Render;
class LoginController extends Render{
    function __construct() {
        session_start();
        if(isset($_SESSION['idAdmin'])){
            header('location:'.DIRPAGE.'administracao');
        }else{
            $this->setTitle("Login"); 
            $this->setDescritpion("Pagina login");
            $this->setKeywords("Login");
            $this->setDir("Login/"); 
            $this->renderLayout();
        }
    }
}