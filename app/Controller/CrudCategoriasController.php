<?php

namespace App\Controller;

use App\Dao\DaoCategorias;
use App\Model\ModelCategorias;
use Classes\StrValidator;
use Classes\UploadImagens;

class CrudCategoriasController
{

    private $categoria;
    private $daoCategorias;
    private $strValidator;
    private $uploadImagens;

    function __construct()
    {
        $this->categoria = new ModelCategorias;
        $this->daoCategorias = new DaoCategorias;
        $this->strValidator = new StrValidator;
        $this->uploadImagens = new UploadImagens;
    }

    private function ValidarEncapsular($data)
    {
        $success = true;

        if ($this->strValidator->setValor($data['nome'])->max(200)->required()->isValid()) {
            $this->categoria->setNome($data['nome']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['descricao'])->max(200)->required()->isValid()) {
            $this->categoria->setDescricao($data['descricao']);
        } else {
            $success = false;
        }

        if ($this->strValidator->setValor($data['icon'])->max(50)->required()->isValid()) {
            $this->categoria->setIcon($data['icon']);
        } else {
            $success = false;
        }
        return $success;
    }

    public function cadastrar($categoria, $img)
    {

        if ($this->ValidarEncapsular($categoria)) {

            $result = $this->daoCategorias->cadastrar($this->categoria);
            if ($result['success']) {
                if (!empty($img)) {

                    if ($this->uploadImagem($result['data']['idCategoria'], $img)) {
                        $data = array("success" => true, "msg" => "Cadastro com sucesso");
                    } else {
                        $data = array("success" => true, "msg" => "Cadastro com sucesso, erro ao salvar imagem.");
                    }
                } else {
                    $data = array("success" => true, "msg" => "Cadastro com sucesso, sem imagem.");
                }
            } else {
                $data = array("success" => false, "msg" => "Erro ao cadastrar");
            }
        } else {
            $data = array("success" => false, "msg" => "Erro ao cadastrar, faltaram dados.");
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }


    public function editar($idCategoria, $categoria, $img)
    {

        if ($this->ValidarEncapsular($categoria)) {
            $this->categoria->setId($idCategoria);

            $result = $this->daoCategorias->editar($this->categoria);
            if ($result['success']) {
                if (!empty($img)) {
                    if ($this->UploadImagem($idCategoria, $img)) {
                        $data = array("success" => true, "msg" => "Editado com sucesso");
                    } else {
                        $data = array("success" => true, "msg" => "Editado com sucesso, erro ao modificar imagem.");
                    }
                } else {
                    $data = array("success" => true, "msg" => "Editado com sucesso, imagem não modificada.");
                }
            } else {
                $data = array("success" => false, "msg" => $result->data);
            }
        } else {
            $data = array("success" => false, "msg" => "Erro ao editar, faltaram dados.");
        }
       
      return $data;
    }


    public function apagar($idCategoria)
    {
      
        $nome = $this->daoCategorias->selectCategoria($idCategoria);

        if ($this->daoCategorias->apagar($idCategoria)) {
            if ($this->uploadImagens->apagar("negocios/", $nome['data']['img'])) {
                $data = array("success" => true, "msg" => "Tudo apagado");
            } else {
                $data = array("success" => true, "msg" => "Erro ao apagar imagem");
            }
        } else {
            $data = array("success" => false, "msg" => "Nada apagado.");
        }
       
        return $data;
    }

    private function UploadImagem($idCategoria, $img)
    {
        try {
            $this->uploadImagens->categoria($idCategoria, $img);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCategoria($idCategoria)
    {
        $categoria = $this->daoCategorias->selectCategoria($idCategoria);
        return$categoria;
    }
}
