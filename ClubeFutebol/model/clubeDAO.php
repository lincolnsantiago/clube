<?php

require_once __DIR__ . "/clube.php";
require_once __DIR__ . '/fabricaConexao.php';

class clubeDAO {

    public function insert(clube $clube) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "INSERT INTO clube (nome) VALUES ('" . $clube->getNome() . "')";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function delete(clube $clube) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $id = 1;
        $sql = "DELETE FROM clube WHERE id='" . $clube->getId() . "'";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }        
        $sql = "DELETE FROM clube_socio WHERE clube_id='" . $clube->getId() . "'";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function update(clube $clube) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "UPDATE clube SET nome='" . $clube->getNome() . "'WHERE id='" . $clube->getId() . "'";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function selecionarById(clube $clube) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "SELECT * FROM clube WHERE id = '" . $clube->getId() . "'";
        if ($result = mysqli_query($con, $sql)) {
            $row = $result->fetch_assoc();
            $clube->setId($row["id"]);
            $clube->setNome($row["nome"]);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        return $clube;
    }

    public function listarById() {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $clube = new clube();
        $clubes = array();
        $sql = "SELECT * FROM clube ORDER BY id";
        if ($result = mysqli_query($con, $sql)) {
            for ($x = 0; $x < $result->num_rows; $x++) {
                $row = $result->fetch_assoc();
                $clube = new clube();
                $clube->setId($row["id"]);
                $clube->setNome($row["nome"]);
                $clubes[$x] = $clube;
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        return $clubes;
    }

    public function listarByName() {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $clube = new clube();
        $clubes = array();
        $sql = "SELECT * FROM clube ORDER BY nome";
        if ($result = mysqli_query($con, $sql)) {
            for ($x = 0; $x < $result->num_rows; $x++) {
                $row = $result->fetch_assoc();
                $clube = new clube();
                $clube->setId($row["id"]);
                $clube->setNome($row["nome"]);
                $clubes[$x] = $clube;
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        return $clubes;
    }

}
