<?php

namespace App\Controller;

use Classes\Render;

class PerfilController extends Render
{

    function __construct()
    {
        session_start();
        if (isset($_SESSION['userId'])) {
            $this->setTitle("Perfil");
            $this->setDescritpion("Pagina Usuarios");
            $this->setKeywords("usuarios, perfil");
            $this->setDir("Perfil/");
            $this->renderLayout();
        } else {
              header('location:'.DIRPAGE.'login');
        }
    }

}
