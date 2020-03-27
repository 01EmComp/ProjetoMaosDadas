<?php

require_once('../database/Database.php');

class DaoLogin {

    private $conn;

    function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function verificaLogin(ModelLogin $Login) {
        try {
            //recupero valores do Model
            $usuario = $Login->getUsuario();
            $senha = $Login->getSenha();
            
            //preparo o comando
            $stmt = $this->conn->prepare("SELECT idUsuario FROM usuario WHERE usuarioUsuario = ? AND senhaUsuario = ? ");

            //bind nos valores dos campos
            $stmt->bindparam(1, $usuario);
            $stmt->bindparam(2, $senha);
            

            //executo a instrução
            $stmt->execute();

            //verifico se deu certo
            if ($stmt->rowCount() == 1) {
                $result = $stmt->fetch((PDO::FETCH_ASSOC));
                session_start();
                $_SESSION['id'] = $result["idUsuario"];
                echo 1;
            } else {
                echo "Usuário ou senha incorretos";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function editarUsuario(ModelUsuario $Usuario) {
        try {
            //recupero valores do Model
            $id = $Usuario->getId();
            $nome = $Usuario->getNome();
            $usuario = $Usuario->getUsuario();
            $email = $Usuario->getEmail();
            $senha = $Usuario->getSenha();
            $nivel = $Usuario->getNivel();

            //preparo o comando
            $stmt = $this->conn->prepare("UPDATE Usuario SET nomeUsuario = ?, usuarioUsuario = ?, senhaUsuario = ?, emailUsuario = ?, nivelUsuario = ? WHERE idUsuario = ?");

            //bind nos valores dos campos
            $stmt->bindparam(1, $nome);
            $stmt->bindparam(2, $usuario);
            $stmt->bindparam(3, $senha);
            $stmt->bindparam(4, $email);
            $stmt->bindparam(5, $nivel);
            $stmt->bindparam(6, $id);

            //executo a instrução
            $stmt->execute();

            //verifico se deu certo
            if ($stmt->rowCount() > 0) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function excluirUsuario(ModelUsuario $Usuario) {
        try {
            //recupero valores do Model
            $id = $Usuario->getId();

            //preparo o comando
            $stmt = $this->conn->prepare("DELETE FROM Usuario WHERE idUsuario = ?");

            //bind nos valores dos campos
            $stmt->bindparam(1, $id);
            $stmt->execute();

            //verifico se deu certo
            if ($stmt->rowCount() > 0) {
                echo 1;
            } else {
                echo 2;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>