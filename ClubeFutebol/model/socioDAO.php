<?php

require_once __DIR__ . "/socio.php";
require_once __DIR__ . "/clube.php";
require_once __DIR__ . '/fabricaConexao.php';

class socioDao {

    public function insert(socio $socio) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $last_id = 0;
        $sql = "INSERT INTO socio (nome,sobrenome) VALUES ('" . $socio->getNome() . "','" . $socio->getSobrenome() . "')";
        if (mysqli_query($con, $sql)) {
            $last_id = $con->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        for ($x = 0; $x < sizeof($socio->getClube()); $x++) {
            $sql = "INSERT INTO clube_socio (clube_id, socio_id) VALUES ('" . $socio->getClube()[$x] . "','" . $last_id . "')";
            if (mysqli_query($con, $sql)) {
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }

    public function delete(socio $socio) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "DELETE FROM socio WHERE id='" . $socio->getId() . "'";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }        
        $sql = "DELETE FROM clube_socio WHERE socio_id='" . $socio->getId() . "'";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function deleteVinculoIfExist(socio $socio) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "DELETE FROM clube_socio WHERE socio_id='" . $socio->getId() . "'";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function deleteVinculo(socio $socio) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "DELETE FROM clube_socio WHERE clube_socio.clube_id = " . $socio->getClube() . " AND clube_socio.socio_id = " . $socio->getId() . " ";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function update(socio $socio) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "UPDATE socio SET nome='" . $socio->getNome() . "', sobrenome='" . $socio->getSobrenome() . "'WHERE id='" . $socio->getId() . "'";
        if (mysqli_query($con, $sql)) {
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function updateVinculo(socio $socio) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        for ($x = 0; $x < sizeof($socio->getClube()); $x++) {
            $sql = "INSERT INTO clube_socio (clube_id, socio_id) VALUES ('" . $socio->getClube()[$x] . "','" . $socio->getId() . "')";
            if (mysqli_query($con, $sql)) {
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        }
    }

    public function selecionarById(socio $socio) {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $sql = "SELECT * FROM socio WHERE id = '" . $socio->getId() . "'";
        if ($result = mysqli_query($con, $sql)) {
            $row = $result->fetch_assoc();
            $socio->setId($row["id"]);
            $socio->setNome($row["nome"]);
            $socio->setSobrenome($row["sobrenome"]);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        
        $sql = "SELECT clube.nome as clube_nome, socio_id, socio.nome, clube.id as clube_id FROM clube_socio 
INNER JOIN clube on clube_socio.clube_id=clube.id
INNER JOIN socio on clube_socio.socio_id=socio.id
WHERE socio_id  = '" . $socio->getId() . "'";

        $clubes = [];
        if ($result = mysqli_query($con, $sql)) {
            for ($x = 0; $x < $result->num_rows; $x++) {
                $row = $result->fetch_assoc();
                $clube = new clube();
                $clube->setId($row["clube_id"]);
                $clube->setNome($row["clube_nome"]);
                $clubes[$x] = $clube;
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        $socio->setClube($clubes);
        return $socio;
    }

    public function listarById() {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $socio = new socio();
        $socios = array();
        $sql = "SELECT * FROM socio ORDER BY id";
        if ($result = mysqli_query($con, $sql)) {
            for ($x = 0; $x < $result->num_rows; $x++) {
                $row = $result->fetch_assoc();
                $socio = new socio();
                $socio->setId($row["id"]);
                $socio->setNome($row["nome"]);
                $socio->setSobrenome($row["sobrenome"]);
                $socios[$x] = $socio;
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        return $socios;
    }
    
    public function listarByNome() {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $socio = new socio();
        $socios = array();
        $sql = "SELECT * FROM socio ORDER BY nome";
        if ($result = mysqli_query($con, $sql)) {
            for ($x = 0; $x < $result->num_rows; $x++) {
                $row = $result->fetch_assoc();
                $socio = new socio();
                $socio->setId($row["id"]);
                $socio->setNome($row["nome"]);
                $socio->setSobrenome($row["sobrenome"]);
                $socios[$x] = $socio;
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        return $socios;
    }

    public function listarBySobrenome() {
        $con = new fabricaConexao();
        $con = $con->conecatarCB();
        $socio = new socio();
        $socios = array();
        $sql = "SELECT * FROM socio ORDER BY sobrenome";
        if ($result = mysqli_query($con, $sql)) {
            for ($x = 0; $x < $result->num_rows; $x++) {
                $row = $result->fetch_assoc();
                $socio = new socio();
                $socio->setId($row["id"]);
                $socio->setNome($row["nome"]);
                $socio->setSobrenome($row["sobrenome"]);
                $socios[$x] = $socio;
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        return $socios;
    }

    /*
      public function listarJoin() {
      $con = new fabricaConexao();
      $con = $con->conecatarCB();
      $socio = new socio();
      $socios = array();
      $sql = "SELECT socio.nome as socio_nome, socio.sobrenome, clube.nome as clube_nome, clube_socio.clube_id, clube_socio.socio_id FROM socio
      INNER JOIN clube_socio ON socio.id=clube_socio.socio_id
      INNER JOIN clube ON clube.id=clube_socio.clube_id order by socio_nome";


      if ($result = mysqli_query($con, $sql)) {
      for ($x = 0; $x < $result->num_rows; $x++) {
      $row = $result->fetch_assoc();
      $socio = new socio();
      $socio->setId($row["socio_id"]);
      $socio->setNome($row["socio_nome"]);
      $socio->setSobrenome($row["sobrenome"]);
      $socio->setClube($row["clube_nome"]);

      $socios[$x] = $socio;
      }
      echo "Deu certo";
      } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      return $socios;
      }

      public function listarJoinById(socio $socio) {
      $con = new fabricaConexao();
      $con = $con->conecatarCB();
      $socios = [];


      $sql = "SELECT clube.nome as clube_nome, socio_id, socio.nome FROM clube_socio
      INNER JOIN clube on clube_socio.clube_id=clube.id
      INNER JOIN socio on clube_socio.socio_id=socio.id
      WHERE socio_id = '" . $socio->getId() . "'";


      if ($result = mysqli_query($con, $sql)) {
      for ($x = 0; $x < $result->num_rows; $x++) {
      $row = $result->fetch_assoc();
      $socio = new socio();
      $socio->setClube($row["clube_nome"]);
      $socio->setId($row["socio_id"]);
      $socio->setNome($row["nome"]);
      $socios[$x] = $socio;
      }
      } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      return $socios;
      }
     */
}
