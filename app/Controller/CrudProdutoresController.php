<?php
namespace App\Controller;
use App\Model\ModelProdutor;
use App\Dao\DaoProdutores;
use App\Dao\DaoCidades;
use App\Dao\DaoTipos;
use Classes\UploadImagens;

class CrudProdutoresController{
    
    public function cadastrar(){
        
        if((isset($_POST['nome']))&&(isset($_POST['nomeSocial']))&&(isset($_POST['whatsapp']))
        &&(isset($_POST['endereco']))&&(isset($_POST['formaPagamento']))&&(isset($_POST['idCidade']))
        &&(isset($_POST['formaEntrega']))&&(isset($_POST['descricao']))&&(isset($_POST['idTipo']))){
            
            $produtor = new ModelProdutor();
            
            $produtor->setNome($_POST['nome']);
            $produtor->setIdCidade($_POST['idCidade']);
            $produtor->setNomeSocial($_POST['nomeSocial']);
            $produtor->setWhatsapp($_POST['whatsapp']);
            $produtor->setEndereco($_POST['endereco']);
            $produtor->setFormaPagamento($_POST['formaPagamento']);
            $produtor->setFormaEntrega($_POST['formaEntrega']);
            $produtor->setDescricao($_POST['descricao']);
            $produtor->setIdTipo($_POST['idTipo']);
            
            $daoProdutor = new DaoProdutores();
            $result = $daoProdutor->cadastra($produtor);
            $result = json_decode($result);
            if($result->success){
                if(isset($_FILES['img'])){
                    try {
                        $img = $_FILES['img'];
                        $upload = new UploadImagens();
                        $upload->produtor($result->data->idProdutor,$img);
                        
                        $data['success']=true;
                        $data['msg'] = "Produtor cadastrado com sucesso";
                    } catch (Exception $e) {
                        $data['success']=true;
                        $data['msg'] = $e->getMessage();
                    }
                }
                else{
                    $data['success']=true;
                    $data['msg'] = "Produtor cadastrado, sem imagem";
                }
            }
            else{
                $data['success']=false;
                $data['msg'] = "Erro ao casdastrar, ".$result->msg;
            }
            
        }
        else{
            $data['success']=false;
            $data['msg'] = "Erro ao casdastrar, faltaram alguns dados.";
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }
    
    public function getCidades(){
        $cidades = new DaoCidades();
        $cidades = json_decode($cidades->selectCidades());
        $citys = array();
        foreach ($cidades->data as $key => $value) {
            $cidade = array(
                "idCidade" => $value->idCidade,
                "nome" => $value->nome);
                array_push($citys,$cidade);                
            }
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($citys);
        }
        public function getTipos(){
            $daoTipos = new DaoTipos();
            $result = json_decode($daoTipos->getTipos());
            $tipos = array();
            foreach ($result->data as $key => $value) {
                $tipo = array(
                    "idTipo" => $value->idTipo,
                    "nome" => $value->nome);
                    array_push($tipos,$tipo);                
                }
                header("Content-Type: application/json; charset=UTF-8");
                echo json_encode($tipos);
            }
            
            public function selectProdutor($idProdutor){
                $daoProdutor = new DaoProdutores();
                $produtor = $daoProdutor->selectProdutor($idProdutor);
                
                header("Content-Type: application/json; charset=UTF-8");
                echo $produtor;
            }   
            
        }
        
        
        ?>