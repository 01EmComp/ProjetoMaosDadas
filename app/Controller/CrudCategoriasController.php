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
            header('location:'.DIRPAGE.'error');
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
    
    
    public function editar($idTipo)
    {
        if((isset($_POST['nome']))&&(isset($_POST['keywords']))){
            $categoria = new ModelCategorias();
            $categoria->setId($idTipo);
            $categoria->setNome($_POST['nome']);
            $categoria->setDescricao($_POST['keywords']);
            
            $DaoTipos = new DaoTipos();
            $result = json_decode($DaoTipos->editar($categoria));
            if($result->success){
                if(isset($_FILES['img'])){
                    $upload = new UploadImagens();
                    $upload->categoria($idTipo,$_FILES['img']);
                    $data = array("success"=>true,"msg"=>"Editado com sucesso");
                }
                else{
                    $data = array("success"=>true,"msg"=>"Editado com sucesso, imagem não modificada.");
                }
            }
            else{
                $data = array("success"=>false,"msg"=>$result->data);
            }
        }
        else{
            $data = array("success"=>false,"msg"=>"Erro ao editar, faltaram dados.");
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }
    
    
    public function apagar($idCategoria)
    {
        $DaoTipos = new DaoTipos();
        $nome = json_decode($DaoTipos->getTipo($idCategoria));
        
        if($DaoTipos->apagar($idCategoria)){
            $upload = new UploadImagens();
            if($upload->apagar("produtores/",$nome->data->img)){
                $data = array("success"=>true,"msg"=>"Tudo apagado");
            }
            else{
                $data = array("success"=>true,"msg"=>"Erro ao apagar imagem");
            }
        }
        else{
            $data = array("success"=>false,"msg"=>"Nada apagado.");
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }
    
    
    public function getCategoria($idTipo)
    {
        $DaoTipos = new DaoTipos();
        $tipo = $DaoTipos->getTipo($idTipo);
        header("Content-Type: application/json; charset=UTF-8");
        echo $tipo;
    }
}


