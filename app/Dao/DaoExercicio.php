<?php

require_once('../database/Database.php');

class DaoExercicio {

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

    public function adicionarExercicio(ModelExercicio $Exercicio) {
        try {
            //recupero valores do Model
            $nome = $Exercicio->getNome();
            $series = $Exercicio->getSeries();
            $reps = $Exercicio->getReps();
            $descanso = $Exercicio->getDescanso();
            $carga = $Exercicio->getCarga();

            //preparo o comando
            $stmt = $this->conn->prepare("INSERT INTO exercicio(nomeExercicio, seriesExercicio, repsExercicio, descansoExercicio, cargaExercicio) 
                VALUES(?,?, ?, ?, ?)");

            //bind nos valores dos campos
            $stmt->bindparam(1, $nome);
            $stmt->bindparam(2, $series);
            $stmt->bindparam(3, $reps);
            $stmt->bindparam(4, $descanso);
            $stmt->bindparam(5, $carga);

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

    public function editarExercicio(ModelExercicio $Exercicio) {
        try {
            //recupero valores do Model
            $id = $Exercicio->getId();
            $nome = $Exercicio->getNome();
            $series = $Exercicio->getSeries();
            $reps = $Exercicio->getReps();
            $descanso = $Exercicio->getDescanso();
            $carga = $Exercicio->getCarga();

            //preparo o comando
            $stmt = $this->conn->prepare("UPDATE Exercicio SET nomeExercicio = ? ,seriesExercicio = ?, repsExercicio = ?, descansoExercicio = ?, cargaExercicio = ? WHERE idExercicio = ?");

            //bind nos valores dos campos
            $stmt->bindparam(1, $nome);
            $stmt->bindparam(2, $series);
            $stmt->bindparam(3, $reps);
            $stmt->bindparam(4, $descanso);
            $stmt->bindparam(5, $carga);
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

    public function excluirExercicio(ModelExercicio $Exercicio) {
        try {
            //recupero valores do Model
            $id = $Exercicio->getId();

            //preparo o comando
            $stmt = $this->conn->prepare("DELETE FROM Exercicio WHERE idExercicio = ?");

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