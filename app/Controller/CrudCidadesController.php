<?php

namespace App\Controller;

use App\Dao\DaoCidades;
use App\Model\ModelCidades;
use Classes\StrValidator;
use Classes\UploadImagens;

class CrudCidadesController
{

    private $daoCidades;
    private $modelCidades;
    private $strValidator;
    private $uploadImagens;
    function __construct()
    {
        $this->daoCidades = new DaoCidades;
        $this->modelCidades = new ModelCidades;
        $this->strValidator = new StrValidator;
        $this->uploadImagens = new UploadImagens;
    }

    private function validarEncapsular($data)
    {

        $success = true;

        if ($this->strValidator->setValor($data['nome'])->max(200)->required()->isValid()) {
            $this->modelCidades->setNome($data['nome']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['cep'])->max(9)->required()->isValid()) {
            $this->modelCidades->setNome($data['cep']);
        } else {
            $success = false;
        }
        if ($this->strValidator->setValor($data['uf'])->max(2)->required()->isValid()) {
            $this->modelCidades->setCep($data['uf']);
        } else {
            $success = false;
        }

        return $success;
    }

    public function cadastrar($data, $img)
    {


        if ($this->validarEncapsular($data)) {
            $result = $this->daoCidades->cadastrar($this->modelCidades);

            if ((!empty($img)) && ($result['success'])) {
                try {

                    $this->UploadImagem($result['data']['idCidade'], $img);

                    $data = array("success" => true, "msg" => "Cidade cadastrada com sucesso");
                } catch (\Exception $e) {
                    $data = array("success" => false, "msg" => $e->getMessage());
                }
            } else {
                $data = array("success" => $result['success'], "msg" => $result['data']);
            }
        } else {
            $data = array("success" => false, "msg" => "Erro ao cadastrar, ausencia de dados");
        }
        return $data;
    }




    public function editar($idCidade, $data, $img)
    {

        if ($this->validarEncapsular($data)) {
            $this->modelCidades->setIdCidade($idCidade);


            $result = $this->daoCidades->editar($this->modelCidades);
            if ($result['success']) {
                if (!empty($img)) {
                    try {

                        $this->UploadImagem($result['data']['idCidade'], $img);

                        $data['success'] = true;
                        $data['msg'] = "Cidade Editada com sucesso";
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
                $data['msg'] = "Erro ao editar Cidade";
            }
        } else {
            $data['success'] = true;
            $data['msg'] = "Erro ao modificar cidade, faltaram dados.";
        }

        return $data;
    }



    public function apagar($idCidade)
    {
        $DaoCidades = new DaoCidades();
        $nome = json_decode($DaoCidades->selectCidade($idCidade));

        if ($DaoCidades->apagar($idCidade)) {
            $upload = new UploadImagens();

            if ($upload->apagar("cidades/", $nome->data->img)) {
                $data = array("success" => true, "msg" => "Tudo apagado");
            } else {
                $data = array("success" => true, "msg" => "Erro ao apagar imagem");
            }
        } else {
            $data = array("success" => false, "msg" => "Nada apagado.");
        }

        return $data;
    }

    private function UploadImagem($idCidade, $img)
    {
        try {
            $this->uploadImagens->cidade($idCidade, $img);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function selectCidade($idCidade)
    {
        $cidade = $this->daoCidades->selectCidade($idCidade);

        return $cidade;
    }

    public function selectCidades()
    {
        $cidade = $this->daoCidades->selectCidades();
        return $cidade;
    }
}
