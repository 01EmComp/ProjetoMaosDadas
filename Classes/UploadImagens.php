<?php 
namespace Classes;

use App\Dao\DaoCategorias;
use App\Dao\DaoCidades;
use App\Dao\DaoNegocio;

//classe responsavel por redimensionar imagens
use WideImage\WideImage;
use Exception;

class UploadImagens{
    
    private $extencoes;

    private $DaoNegocio;
    private $daoCidade;
    private $DaoCategorias;
    
    function __construct(){
        $this->extencoes = array(
            'image/png' => '.png', 
            'image/jpeg'=>'.jpg',
            'mimage/gif'=>'.gif');
        }
        
        public function cidade($id, $img){            
            
            $this->daoCidade = new DaoCidades();
            
            if(array_key_exists($img['type'], $this->extencoes)){
                
                $novoNome = 'cidade'.$id.$this->extencoes[$img['type']];
                $destino = DIREQ.'public/img/cidades/'.$novoNome;
                
                if(file_exists($destino)){
                    unlink($destino);
                }

                if($this->daoCidade->setImgName($id, $novoNome)){
                    if($this->upload($img['tmp_name'],$destino)){
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
        
        
      


        public function categoria($id, $img){            
            
            $this->DaoCategorias = new DaoCategorias();
            
            if(array_key_exists($img['type'], $this->extencoes)){
                
                $novoNome = 'default'.$id.$this->extencoes[$img['type']];
                $destino = DIREQ.'public/img/produtores/'.$novoNome;
                
                if(file_exists($destino)){
                    unlink($destino);
                }
                if($this->DaoCategorias->setImgName($id, $novoNome)){
                    if($this->upload($img['tmp_name'],$destino)){
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
        
        
        
        public function negocio($id, $img){            
            
            $this->DaoNegocio = new DaoNegocio();
            
            if(array_key_exists($img['type'], $this->extencoes)){
                
                $novoNome = 'produtor'.$id.$this->extencoes[$img['type']];
                $destino = DIREQ.'public/img/produtores/'.$novoNome;
                
                if(file_exists($destino)){
                    unlink($destino);
                }
                if($this->DaoNegocios->setImgName($id, $novoNome)){
                    if($this->upload($img['tmp_name'],$destino)){
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
       

        public function apagar($pasta,$nome){
            if(file_exists(DIREQ.'public/img/'.$pasta.$nome)){
                unlink(DIREQ.'public/img/'.$pasta.$nome);
            }
            return true;
        }

        private function upload($tmpName,$destino){
            if(move_uploaded_file($tmpName,$destino)){
                
                $img = new WideImage();
                $img = $img->load($destino);
                
                $resized = $img->resize(630,318);
                
                $resized->saveToFile($destino);
                return true;
            }
            else{
                return false;
                
            }
        }
    }
    ?>