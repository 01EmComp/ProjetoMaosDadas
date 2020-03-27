<?php

    require_once('../BancoDeDados/database.php');
    
    class LoginDao {

    private $conn;

    public function __construct() {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    public function Logar(Login $login) {
        try {
            
            $usuario = $login->getCpf();
            $senha = $login->getSenha();

            $senhaCriptografada = hash('sha512', md5($senha));

            $logado = false;
            
            $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE cpfUsuario = :ulogin");
            $stmt->execute(array(':ulogin' => $usuario));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() == 1) {
                if ($senhaCriptografada == $userRow['senhaUsuario']) {
                    session_start();
                    $_SESSION['user_session'] = $userRow['cpfUsuario'];
                    $_SESSION['user_id'] = $userRow['codUsuario'];
                    echo 1;

                } else {
                    echo 2;
                }
            } else {
                echo 3;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function is_loggedin() {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function redirecionar($url) {
        header("Location: $url");
    }

    public function Logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}

?>