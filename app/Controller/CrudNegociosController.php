<?php

namespace App\Controller;


use App\Dao\DaoNegocio;
use App\Model\ModelNegocio;
use Classes\StrValidator;
use Classes\UploadImagens;

class CrudNegociosController
{
    private $negocio;
    private $daoNegocio;
    private $strValidator;
    private $UploadImagens;
    function __construct()
    {
        $this->negocio = new ModelNegocio;
        $this->daoNegocio = new DaoNegocio;
        $this->UploadImagens = new UploadImagens;
        $this->strValidator = new StrValidator;
    }

    private function encapsule($data)
    {

        $success = true;

        if ($this->strValidator->setValor($data['nome'])->max(200)->required()->isValid()) {
            $this->negocio->setNomeNegocio($data['nome']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['idCidade'])->isNumber()->required()->isValid()) {
            $this->negocio->setIdCidade($data['idCidade']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['whatapp'])->max(14)->isValid()) {
            $this->negocio->setWhatsapp($data['whatsapp']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['endereco'])->max(400)->required()->isValid()) {
            $this->negocio->setEndereco($data['endereco']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['formaPagamento'])->max(50)->required()->isValid()) {
            $this->negocio->setFormaPagamento($data['formaPagamento']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['formaEntrega'])->max(50)->required()->isValid()) {
            $this->negocio->setFormaEntrega($data['formaEntrega']);
            $success = false;
        }

        if ($this->strValidator->setValor($data['descricao'])->max(400)->required()->isValid()) {
            $this->negocio->setDescricao($data['descricao']);
            $success = false;
        }
        if ($this->strValidator->setValor($data['keywords'])->max(200)->required()->isValid()) {
            $this->negocio->setKeyWords($data['keywords']);
            $success = false;
        }
        if ($this->strValidator->setValor($data['idCategoria'])->isNumber()->required()->isValid()) {
            $this->negocio->setIdCategoria($data['idCategoria']);
            $success = false;
        }

        return $success;
    }


    public function cadastrar($idUsuario, $data)
    {


        if ($this->encapsule($data)) {
            $this->negocio->setIdUsuario($idUsuario);
            $result = $this->daoNegocio->cadastrar($this->negocio);

            $result = json_decode($result);
            if ($result->success) {
                if (isset($_FILES['img'])) {
                    try {
                        $img = $_FILES['img'];

                        $this->UploadImagens->negocio($result->data->idProdutor, $img);

                        $data['success'] = true;
                        $data['msg'] = "Negocio cadastrado com sucesso";
                    } catch (\Exception $e) {
                        $data['success'] = true;
                        $data['msg'] = $e->getMessage();
                    }
                } else {
                    $data['success'] = true;
                    $data['msg'] = "Negocio cadastrado, sem imagem";
                }
            } else {
                $data['success'] = false;
                $data['msg'] = "Erro ao casdastrar, " . $result->msg;
            }
        }


        return $data;
    }


    public function editar($idNegocio, $data)
    {


        if ($this->encapsule($data)) {

            $this->negocio->setId($idNegocio);

            if ($this->daoNegocio->editar($this->negocio)) {

                if (isset($_FILES['img'])) {
                    try {
                        $img = $_FILES['img'];
                        $upload = new UploadImagens();
                        $upload->negocio($idNegocio, $img);

                        $data['success'] = true;
                        $data['msg'] = "Produtor Editado com sucesso";
                    } catch (\Exception $e) {
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

        return $data;
    }




    public function apagar($idNegocio)
    {

        $imgNome = json_decode($this->daoNegocio->selectNegocio($idNegocio));

        if ($this->daoNegocio->apagar($idNegocio)) {
            $upload = new UploadImagens();
            if (substr($imgNome->data->img, 0, 7) != "default") {

                if ($upload->apagar("negocio/", $imgNome->data->img)) {
                    $data = array("success" => true, "msg" => "Tudo apagado");
                } else {
                    $data = array("success" => true, "msg" => "Erro ao apagar imagem");
                }
            }
        } else {
            $data = array("success" => false, "msg" => "Nada apagado.");
        }

        return $data;
    }


    public function selectNegociosCidade($idCidade)
    {

        $negocios = $this->daoNegocio->selectNegociosCidade($idCidade);
        return $negocios;
    }


    public function selectNegocio($idNegocio)
    {

        $negocio = $this->daoNegocio->selectNegocio($idNegocio);

        return $negocio;
    }
}
