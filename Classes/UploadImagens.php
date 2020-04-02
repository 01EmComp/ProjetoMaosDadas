<?php 
namespace Classes;
use App\Dao\DaoCidades;
use App\Dao\DaoProdutores;
use Exception;
class UploadImagens{
    
    private $extencoes;
    
    function __construct(){
        $this->extencoes = array(
            'image/png' => '.png', 
            'image/jpeg'=>'.jpg',
            'mimage/gif'=>'.gif');
        }
        
        public function cidade($id, $img){            
            
            $daoCidade = new DaoCidades();
            
            if(array_key_exists($img['type'], $this->extencoes)){
                
                $novoNome = 'cidade'.$id.$this->extencoes[$img['type']];
                $destino = DIREQ.'public/img/cidades/'.$novoNome;
                
                if($daoCidade->setImgName($id, $novoNome)){
                    if(self::upload($img['tmp_name'],$destino)){
                        return true;
                    }else{
                        throw new \Exception("Erro ao enviar imagem");
                        return false;
                    }
                    
                }else{
                    throw new \Exception("Erro ao salvar nome");
                }
            }else{
                throw new \Exception("Erro, extensão invalida");
            }
        }
        
        public function produtor($id, $img){            
            
            $daoProdutores = new DaoProdutores();
            
            if(array_key_exists($img['type'], $this->extencoes)){
                
                $novoNome = 'produtor'.$id.$this->extencoes[$img['type']];
                $destino = DIREQ.'public/img/produtores/'.$novoNome;
                
                if($daoProdutores->setImgName($id, $novoNome)){
                    if(self::upload($img['tmp_name'],$destino)){
                        return true;
                    }else{
                        throw new \Exception("Erro ao enviar imagem");
                        return false;
                    }
                    
                }else{
                    throw new \Exception("Erro ao salvar nome");
                }
            }else{
                throw new \Exception("Erro, extensão invalida");
            }
        }
        
        
        private function upload($tmpName,$destino){
            if(move_uploaded_file($tmpName,$destino)){
                return true;
            }
            else{
                return false;
                
            }
        }
    }
    ?>