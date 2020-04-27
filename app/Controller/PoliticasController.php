<?php 
namespace App\Controller;
use Classes\Render;
class PoliticasController extends Render{
    //boleano, se verdadeiro é as politcas de privacidade, se false termos de uso
    public $privacidade;
    function __construct() {

        $this->privacidade = false;
        $this->setTitle("Politicas"); 
        $this->setDescritpion("Pagina login");
        $this->setKeywords("politicas de privacidade");
        $this->setDir("Politicas/");
        $this->renderLayout();
    }
    public function uso(){

        $this->privacidade=false;
    }
    public function privacidade(){
        $this->privacidade = true;
        
    }
}