<?php 
namespace App\Dao;
use App\lib\Database\Connection;
//use App\Model\ModelUsuarios;

class DaoUsuarios {
    private $con;
    
    function __construct(){
        $this->con = new Connection();
        $this->con = $this->con->getConn();
    }
    
    public function verificaLogin($login,$senha){
        try {

            $query = $this->findQuery($login);
           
            $stmt = $this->con->prepare($query);
            
            $senha = hash("sha256",$senha,false);
            
            $stmt->bindValue(':login',$login);
            $stmt->bindValue(':senha',$senha);
            $stmt->execute();
            
            if($stmt->rowCount() == 1){
                $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
                $user = array(
                    "userId" => $resultado['idUsuario'],
                    "nome" => $resultado['nome']);
                    
                    $data['success'] = true;
                    $data['data'] = $user;
                }else{
                    $data['success'] = false;
                    $data['data'] = "Usuario não encontrado";
                }
                
            } catch (\Exception $e) {
                
                $data['success'] = false;
                $data['data'] = 'Error: '.$e->getMessage();
            }
            //header("Content-Type: application/json; charset=UTF-8");
            return json_encode($data);
        }
        private function findQuery($login){
            if(is_numeric($login)){
                $query = "SELECT idUsuario,nome FROM Usuarios WHERE whatsapp = :login AND senha = :senha";
                return $query;
            }
            else if((strpos($login,'.com'))&&(strpos($login,'@'))){
                $query = "SELECT idUsuario,nome FROM Usuarios WHERE email = :login AND senha = :senha";
                return $query;
            }
            else{
                $query = "SELECT idUsuario,nome FROM Usuarios WHERE login = :login AND senha = :senha";
                return $query;
            }
        }
    }
    ?>