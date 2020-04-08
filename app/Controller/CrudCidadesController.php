<?php
namespace App\Controller;
use App\Dao\DaoCidades;
use App\Model\ModelCidades;
use Classes\UploadImagens;

class CrudCidadesController {
    
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
}


?>
