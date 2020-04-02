<?php 
namespace App\Controller;
use Classes\Captcha;
use App\Dao\DaoUsuarios;
class SessionController
{
    
    function __construct(){
        
    }
    public function login() {
        
        if((isset($_POST['login'])) && (isset($_POST['senha']))&& (isset($_POST['g-recaptcha-response']))){
            $valida = new Captcha();
            
            if($valida->validate($_POST['g-recaptcha-response'])){
                
                $verifica = new DaoUsuarios();
                $user = json_decode($verifica->verificaLogin($_POST['login'],$_POST['senha']));
                if(true){
                    session_start();
                    $_SESSION['idAdmin'] = $user->data->idAdmin;
                    $_SESSION['login'] = $user->data->login;
                    
                    echo json_encode(array("success" => true));
                }else{
                    echo json_encode(array("success" => false,"msg"=>"falhou captcha"));
                }
            }else{
                echo json_encode(array("success" => false));
            }
        }else{
            echo json_encode(array("success" => false));
        }
    }
    public function logout()
    {
        session_destroy();
    }
}