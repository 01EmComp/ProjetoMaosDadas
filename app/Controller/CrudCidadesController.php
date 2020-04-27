<?php
namespace App\Controller;
use App\Dao\DaoCidades;
use App\Model\ModelCidades;
use Classes\UploadImagens;

class CrudCidadesController {
    
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
        if((isset($_POST['nome']))&&(isset($_POST['cep']))&&(isset($_POST['uf']))){
            $cidade = new ModelCidades();
            $cidade->setNome($_POST['nome']);
            $cidade->setCep($_POST['cep']);
            $cidade->setUf($_POST['uf']);
            
            
            $daoCidade = new DaoCidades();
            $id = json_decode($daoCidade->cadastraCidade($cidade));
            
            if((isset($_FILES['img']))&&($id->success)){
                try {
                    $upload = new UploadImagens();
                    $upload->cidade($id->data->idCidade, $_FILES['img']); 
                    echo json_encode(array("success"=> true,"msg"=>"Cidade cadastrada com sucesso"));
                } catch (Exception $e) {
                    echo json_encode(array("success"=> false,"msg"=>$e->getMessage()));
                    
                }
            }else{
                echo json_encode(array("success"=>$id->success,"msg"=>"Erro ao cadastrar","error"=>$id->data));
            }
        }
        else{
            echo json_encode(array("success"=>false,"msg"=>"Erro ao cadastrar, ausencia de dados"));
        }
    }
    
    
    
    
    public function editar($idCidade){
        
        if((isset($_POST['nome']))&&(isset($_POST['cep']))&&(isset($_POST['uf']))){
            $cidade = new ModelCidades();
            $cidade->setIdCidade($idCidade);
            $cidade->setNome($_POST['nome']);
            $cidade->setCep($_POST['cep']);
            $cidade->setUf($_POST['uf']);
            
            $daoCidade = new DaoCidades();
            
            $result = json_decode($daoCidade->editarCidade($cidade));
            if($result->success){
                if(isset($_FILES['img'])){
                    try {
                        $img = $_FILES['img'];
                        $upload = new UploadImagens();
                        $upload->cidade($idCidade,$img);
                        
                        $data['success']=true;
                        $data['msg'] = "Cidade Editada com sucesso";
                    } catch (Exception $e) {
                        $data['success']=true;
                        $data['msg'] = $e->getMessage();
                    }
                }
                else{
                    $data['success']=true;
                    $data['msg'] = "Imagem não modificada";
                }
            }
            else{
                $data['success']=false;
                $data['msg'] = "Erro ao editar Cidade";
            }
        }
        else{
            $data['success']=true;
            $data['msg'] = "Erro ao modificar cidade, faltaram dados.";
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }
    
    
    
    public function apagar($idCidade)
    {
        $DaoCidades = new DaoCidades();
        $nome = json_decode($DaoCidades->selectCidade($idCidade));
        
        if($DaoCidades->apagar($idCidade)){
            $upload = new UploadImagens();
            
            if($upload->apagar("cidades/",$nome->data->img)){
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
    
    
    
    public function selectCidade($idCidade){
        $daoCidade = new DaoCidades();
        $Cidade = $daoCidade->selectCidade($idCidade);
        
        header("Content-Type: application/json; charset=UTF-8");
        echo $Cidade;
    }   
    
}

?>
