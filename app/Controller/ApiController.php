<?php
namespace App\Controller;
use App\Model\ModelProdutor;
use App\Dao\DaoProdutores;
use App\Dao\DaoCidades;
use App\Dao\DaoTipos;
use Classes\UploadImagens;

class ApiController{
    
    public function getCidades(){
        $cidades = new DaoCidades();
        $cidades = json_decode($cidades->selectCidades());
        $citys = array();
        foreach ($cidades->data as $key => $value) {
            $cidade = array(
                "idCidade" => $value->idCidade,
                "nome" => $value->nome,
                "img" => $value->img);
                array_push($citys,$cidade);                
            }
            // required headers
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($citys, JSON_PRETTY_PRINT);
        }
        
        public function selectProdutores($cidade){
            
            $daoProdutores = new DaoProdutores();
            $produtores = json_decode($daoProdutores->selectProdutores($cidade));
            
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($produtores, JSON_PRETTY_PRINT);
        }
        
        public function getTipos(){
            $daoTipos = new DaoTipos();
            $result = json_decode($daoTipos->getTipos());
            $tipos = array();
            foreach ($result->data as $key => $value) {
                if($value->icon == null){
                    $icon = "";
                }
                else{
                    $icon = $value->icon;
                }
                $tipo = array(
                    "idTipo" => $value->idTipo,
                    "nome" => $value->nome,
                    "icon" => $icon
                );
                array_push($tipos,$tipo);                
            }
            
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($tipos, JSON_PRETTY_PRINT);
        }
        public function getTiposCidade($idCidade){
            $daoTipos = new DaoTipos();
            $result = json_decode($daoTipos->selectTiposCidade($idCidade));
            $tipos = array();
            foreach ($result->data as $key => $value) {
                if($value->icon == null){
                    $icon = "";
                }
                else{
                    $icon = $value->icon;
                }
                $tipo = array(
                    "idTipo" => $value->id,
                    "nome" => $value->nome,
                    "icon" => $icon
                );
                array_push($tipos,$tipo);                
            }
            
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($tipos, JSON_PRETTY_PRINT);
        }
        
        
        public function getProdutores(){
            $daoProdutor = new DaoProdutores();
            $produtores = $daoProdutor->getProdutores();
            
            
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo $produtores;
        }   
        
        
        public function selectProdutor($idProdutor){
            $daoProdutor = new DaoProdutores();
            $produtor = $daoProdutor->selectProdutor($idProdutor);
            
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo $produtor;
        }   
        
        public function notificacoes(){
            
            $notify = array(
                array("title"=>"Teste","body"=>"Testando notificações"),
            );
            
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($notify);
        }   
            
        }
        
        
        ?>