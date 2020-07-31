<?php

namespace App\Controller;

class ApiController
{

    private $crudNegocios;
    private $crudCidades;
    private $crudCategorias;
    private $pesquisa;
    public function __construct()
    {
        $this->crudCidades = new CrudCidadesController;
        $this->crudNegocios = new CrudNegociosController;
        $this->crudCategorias = new CrudCategoriasController;
        $this->pesquisa = new PesquisaController;
    }

    private function veririficSessão($sessionId)
    {
        session_start();
        return session_id() == $sessionId ? true : false;
    }

    public function cadastroNegocio($token)
    {
        if ($this->veririficSessão($token)) {
            if (isset($_POST)) {
                $post = $_POST;
                $negocio = new ModelNegocio;
                var_dump($_POST);
                $result = array("success" => true, "msg" => "Cadastrado com sucesso");
            } else {
                $result = array("success" => false, "msg" => "Nenhum dado recebido");
            }
        } else {
            $result = array("success" => false, "msg" => "Usuário não autenticado");
        }
        header("Access-Control-Allow-Origin: *");
        //header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function verNegocio($token)
    {
        if ($this->veririficSessão($token)) {
            $result = array("success" => false, "msg" => "Usuário não autenticado");
        } else {
            $result = array("success" => false, "msg" => "Usuário não autenticado");
        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function selectCidades()
    {

        $cidades = $this->crudCidades->selectCidades();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($cidades, JSON_PRETTY_PRINT);
    }

    public function selectNegocios($cidade)
    {

        $daoNegocios = new DaoNegocio();
        $produtores = json_decode($daoNegocios->selectProdutores($cidade));

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($produtores, JSON_PRETTY_PRINT);
    }

    public function selectCategorias()
    {
        $categorias = $this->crudCategorias->selectCategorias();

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($categorias, JSON_PRETTY_PRINT);
    }
    public function getTiposCidade($idCidade)
    {
        $daoTipos = new DaoTipos();
        $result = json_decode($daoTipos->selectTiposCidade($idCidade));
        $tipos = array();
        foreach ($result->data as $key => $value) {
            if ($value->icon == null) {
                $icon = "";
            } else {
                $icon = $value->icon;
            }
            $tipo = array(
                "idTipo" => $value->id,
                "nome" => $value->nome,
                "icon" => $icon,
            );
            array_push($tipos, $tipo);
        }

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($tipos, JSON_PRETTY_PRINT);
    }

    public function selectNegociosCidade($idCidade)
    {
        $negocios = $this->crudNegocios->selectNegociosCidade($idCidade);

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        echo json_encode($negocios, JSON_PRETTY_PRINT);
    }

    public function selectProdutor($idProdutor)
    {
        $daoProdutor = new DaoProdutores();
        $produtor = $daoProdutor->selectProdutor($idProdutor);

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo $produtor;
    }

    public function notificacoes()
    {

        $notify = array();

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($notify, JSON_PRETTY_PRINT);
    }
    public function lerDadosPesquisa()
    {
        $dados = $this->pesquisa->lerDadosPesquisa();
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($dados, JSON_PRETTY_PRINT);
    }
    public function adcionarDadosPesquisa()
    {
        $result = $this->pesquisa->adcionarDadosPesquisa($_POST);
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($result, JSON_PRETTY_PRINT);
    }
}
