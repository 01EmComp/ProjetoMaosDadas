<?php

namespace App\Controller;

use App\Dao\DaoCidades;
use App\Model\ModelNegocio;
use Classes\UploadImagens;

class CrudNegocioController
{

    private function veririficSessão($sessionId)
    {
        session_start();
        return session_id() == $sessionId ? true : false;
    }

    private function encapsule($data)
    {

        $negocio = new ModelNegocio();

        $negocio->setNomeNegocio($data['nome']);
        $negocio->setIdCidade($data['idCidade']);
        $negocio->setWhatsapp($data['whatsapp']);
        $negocio->setEndereco($data['endereco']);
        $negocio->setFormaPagamento($data['formaPagamento']);
        $negocio->setFormaEntrega($data['formaEntrega']);
        $negocio->setDescricao($data['descricao']);
        $negocio->setKeyWords($data['keywords']);
        $negocio->setIdCategoria($data['idTipo']);
        return $negocio;
    }


    public function cadastrar($data){
        
        $produtor = $this->encapsule($data);

        $daoNegocio = new DaoNegocio();
        $result = $daoNegocio->cadastra($produtor);
        $result = json_decode($result);
        if ($result->success) {
            if (isset($_FILES['img'])) {
                try {
                    $img = $_FILES['img'];
                    $upload = new UploadImagens();
                    $upload->produtor($result->data->idProdutor, $img);

                    $data['success'] = true;
                    $data['msg'] = "Produtor cadastrado com sucesso";
                } catch (Exception $e) {
                    $data['success'] = true;
                    $data['msg'] = $e->getMessage();
                }
            } else {
                $data['success'] = true;
                $data['msg'] = "Produtor cadastrado, sem imagem";
            }
        } else {
            $data['success'] = false;
            $data['msg'] = "Erro ao casdastrar, " . $result->msg;
        }

        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }


    public function editar($idProdutor)
    {


        if ((isset($_POST['nome'])) && (isset($_POST['nomeSocial'])) && (isset($_POST['whatsapp']))
            && (isset($_POST['endereco'])) && (isset($_POST['formaPagamento'])) && (isset($_POST['idCidade']))
            && (isset($_POST['formaEntrega'])) && (isset($_POST['descricao'])) && (isset($_POST['idTipo']))
            && (isset($_POST['keywords']))
        ) {


            $produtor = new ModelProdutor();

            $produtor->setId($idProdutor);
            $produtor->setNome($_POST['nome']);
            $produtor->setIdCidade($_POST['idCidade']);
            $produtor->setNomeSocial($_POST['nomeSocial']);
            $produtor->setWhatsapp($_POST['whatsapp']);
            $produtor->setEndereco($_POST['endereco']);
            $produtor->setFormaPagamento($_POST['formaPagamento']);
            $produtor->setFormaEntrega($_POST['formaEntrega']);
            $produtor->setDescricao($_POST['descricao']);
            $produtor->setKeyWords($_POST['keywords']);
            $produtor->setIdTipo($_POST['idTipo']);
            $daoProdutor = new DaoProdutores();

            if ($daoProdutor->editar($produtor)) {

                if (isset($_FILES['img'])) {
                    try {
                        $img = $_FILES['img'];
                        $upload = new UploadImagens();
                        $upload->produtor($idProdutor, $img);

                        $data['success'] = true;
                        $data['msg'] = "Produtor Editado com sucesso";
                    } catch (Exception $e) {
                        $data['success'] = true;
                        $data['msg'] = $e->getMessage();
                    }
                } else {
                    $data['success'] = true;
                    $data['msg'] = "Imagem não modificada";
                }
            } else {
                $data['success'] = false;
                $data['msg'] = "Erro ao editar produtor";
            }
        } else {
            $data['success'] = true;
            $data['msg'] = "Erro ao modificar produtor, faltaram dados.";
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }




    public function apagar($idProdutor)
    {
        $DaoProdutores = new DaoProdutores();
        $nome = json_decode($DaoProdutores->selectProdutor($idProdutor));

        if ($DaoProdutores->apagar($idProdutor)) {
            $upload = new UploadImagens();
            if (substr($nome->data->img, 0, 7) != "default") {

                if ($upload->apagar("produtores/", $nome->data->img)) {
                    $data = array("success" => true, "msg" => "Tudo apagado");
                } else {
                    $data = array("success" => true, "msg" => "Erro ao apagar imagem");
                }
            }
        } else {
            $data = array("success" => false, "msg" => "Nada apagado.");
        }
        header("Access-Control-Allow-Origin:*");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }




    public function getCidades()
    {
        $cidades = new DaoCidades();
        $cidades = json_decode($cidades->selectCidades());
        $citys = array();
        foreach ($cidades->data as $key => $value) {
            $cidade = array(
                "idCidade" => $value->idCidade,
                "nome" => $value->nome
            );
            array_push($citys, $cidade);
        }
        header("Access-Control-Allow-Origin:*");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($citys);
    }

    public function getProdutores($cidade)
    {

        $daoProdutores = new DaoProdutores();
        $daoProdutores = json_decode($daoProdutores->selectProdutores($cidade));
        $produtores = array();
        foreach ($daoProdutores->data as $key => $value) {
            $produtor = array(
                "idProdutor" => $value->idProdutor,
                "nome" => $value->nomeProdutor
            );
            array_push($produtores, $produtor);
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($produtores);
    }

    public function getTipos()
    {
        $daoTipos = new DaoTipos();
        $result = json_decode($daoTipos->getTipos());
        $tipos = array();
        foreach ($result->data as $key => $value) {
            $tipo = array(
                "idTipo" => $value->idTipo,
                "nome" => $value->nome
            );
            array_push($tipos, $tipo);
        }
        header("Access-Control-Allow-Origin:*");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($tipos);
    }

    public function selectProdutor($idProdutor)
    {
        $daoProdutor = new DaoProdutores();
        $produtor = $daoProdutor->selectProdutor($idProdutor);
        header("Access-Control-Allow-Origin:*");
        header("Content-Type: application/json; charset=UTF-8");
        echo $produtor;
    }
}
