<?php 
namespace App\Controller;
use Classes\Captcha;
use App\Dao\DaoAdminstradores;
use App\Dao\DaoUsuarios;

class SessionController
{
    
    function __construct(){
        
    }
    public function loginAdm() {
        
        if((isset($_POST['login'])) && (isset($_POST['senha']))&& (isset($_POST['g-recaptcha-response']))){
            $valida = new Captcha();
            
            if($valida->validate($_POST['g-recaptcha-response'])){
                
                $verifica = new DaoAdminstradores();
                $user = json_decode($verifica->verificaLogin($_POST['login'],$_POST['senha']));
                if($user->success){
                    session_start();
                    $_SESSION['idAdmin'] = $user->data->idAdmin;
                    $_SESSION['login'] = $user->data->login;
                    
                    $result = array("success" => true);
                }else{
                    $result = array("success" => false,"msg"=>"Usuario ou senha incorretos");
                }
            }else{
                $result = array("success" => false,"msg"=>"falhou captcha");
            }
        }else{;
        }
        echo json_encode($result);
    }
    public function login() {
         
        if((isset($_POST['login'])) && (isset($_POST['senha']))&& (isset($_POST['g-recaptcha-response']))){
            $valida = new Captcha();
            
            if($valida->validate($_POST['g-recaptcha-response'])){
                
                $verifica = new DaoUsuarios();
                $user = json_decode($verifica->verificaLogin($_POST['login'],$_POST['senha']));
                if($user->success){
                    session_start();
                    $_SESSION['userId'] = $user->data->userId;
                    $_SESSION['nome'] = $user->data->nome;
                    
                    $result = array("success" => true);
                }else{
                    $result = array("success" => false,"msg"=>"Usuario ou senha incorretos");
                }
            }else{
                $result = array("success" => false,"msg"=>"falhou captcha");
            }
        }else{
            $result = array("success" => false,"msg"=>"Faltaram dados");
        }
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($result);
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header('location:'.DIRPAGE);
    }
}