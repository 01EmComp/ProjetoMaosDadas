<?php
namespace App\Controller;
use App\Dao\DaoProdutores;

class FiltroController{
    

    public function produtores($idCidade,$idTipo)
    {
        $daoProdutores = new DaoProdutores();
        $produtores = $daoProdutores->selectProdutoresTipos($idCidade,$idTipo);

        echo $produtores;
    }

    public function todosProdutores($idCidade)
    {
        $daoProdutores = new DaoProdutores();
        $produtores = $daoProdutores->selectProdutores($idCidade);
        echo $produtores;
    }

}