<?php
namespace App\Controller;
use App\Dao\DaoTipos;
use App\Model\ModelCategorias;
use Classes\UploadImagens;

class CrudCategoriasController {
    
    function __construct(){
        session_start();
        if(!isset($_SESSION['idAdmin'])){
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode(array("success"=>false,"msg"=>"Você não tem permissão para isso."));
        }
    }
    
    public function cadastrar()
    {
        if((isset($_POST['nome']))&&(isset($_POST['keywords']))){
            $categoria = new ModelCategorias();
            $categoria->setNome($_POST['nome']);
            $categoria->setDescricao($_POST['keywords']);
            
            $DaoTipos = new DaoTipos();
            $result = json_decode($DaoTipos->cadastrar($categoria));
            if($result->success){
                if(isset($_FILES['img'])){
                    $upload = new UploadImagens();
                    $upload->categoria($result->data->idTipo,$_FILES['img']);
                    $data = array("success"=>true,"msg"=>"Cadastro com sucesso");
                }
                else{
                    $data = array("success"=>true,"msg"=>"Cadastro com sucesso, sem imagem.");
                }
            }
            else{
                $data = array("success"=>false,"msg"=>"Erro ao cadastrar");
            }
        }
        else{
            $data = array("success"=>false,"msg"=>"Erro ao cadastrar, faltaram dados.");
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }
}


