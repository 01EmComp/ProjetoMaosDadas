<?php
namespace App\Controller;
use App\Dao\DaoProdutores;

class FiltroController{
    

    public function produtores($idCidade,$idTipo)
    {
        $daoProdutores = new DaoProdutores();
        $produtores = $daoProdutores->selectProdutoresTipos($idCidade,$idTipo);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo $produtores;
    }

    public function todosProdutores($idCidade){

        $daoProdutores = new DaoProdutores();
        $produtores = $daoProdutores->selectProdutores($idCidade);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo $produtores;
        
    }

}