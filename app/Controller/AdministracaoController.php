<?php 
namespace App\Controller;
use Classes\Render;
use App\Dao\DaoCidades;
use App\Dao\DaoTipos;
use App\Dao\DaoProdutores;

class AdministracaoController extends Render
{
    
    function __construct()
    {
        session_start();
        if(isset($_SESSION['idAdmin'])){
            $this->setTitle("Administração"); 
            $this->setDescritpion("Pagina administracao");
            $this->setKeywords("administracao");
            $this->setDir("Administracao/"); 
            $this->renderLayout();
        }else{
            header('location:'.DIRPAGE.'error/401');
        }
    }
}