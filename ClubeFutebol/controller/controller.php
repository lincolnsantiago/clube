<?php

$header = "http://clubefutebol.hol.es/ClubeFutebol";

include_once __DIR__ . '/clube.php';
include_once __DIR__ . '/socio.php';


if (isset($_GET["acao"])) {
    if ($_GET["acao"] == "cadastrarClube") {
        $nome = $_POST["nomeclube"];
        if ($nome == "") {
            header("Location: $header?pg=cadastrarClube&msg=2");
        } else {
            cadastrarClube($nome);
            header("Location: $header?pg=cadastrarClube&msg=1");
        }
        die();
    }

    if ($_GET["acao"] == "excluirVinculo") {
        $ids = $_GET["ids"];
        $idc = $_GET["idc"];
        deletarVinculo($ids, $idc);
        header("Location: $header?pg=editarSocio&id=$ids&msg=3");
        die();
    }

    if ($_GET["acao"] == "editarSocio") {
        $id = $_POST["id"];
        $nome = $_POST["nomesocio"];
        $sobrenome = $_POST["sobrenomesocio"];
        $clubes = $_POST["clubes"];
        updateSocio($id, $nome, $sobrenome);
        if (!isset($_POST["naocadastrar"])) {
            updateVinculo($id, $clubes);
        }
        header("Location: $header?pg=editarSocio&id=$id&msg=1");
        die();
    }

    if (($_GET["acao"] == "editarClube") && (isset($_POST["id"]))) {
        $nome = $_POST["nomeclube"];
        $id = $_POST["id"];
        if (($id == "") || (($nome == ""))) {
            header("Location: $header?pg=listarClubes&msg=2");
        } else {
            updateClube($id, $nome);
            header("Location: $header?pg=editarClube&id=19&msg=1");
        }
        die();
    }

    if ($_GET["acao"] == "cadastrarSocio") {
        $nome = $_POST["nomesocio"];
        $sobrenome = $_POST["sobrenomesocio"];
        $clubes = $_POST["clubes"];
        $clubes = array_unique($clubes);
        if (($nome == "") || ($sobrenome == "") || ($clubes == "")) {
            header("Location: $header?pg=cadastrarSocio&msg=2");
        } else {
            cadastrarSocio($nome, $sobrenome, $clubes);
            header("Location: $header?pg=cadastrarSocio&msg=1");
        }
        die();
    }

    if (($_GET["acao"] == "deletarClube") && (isset($_GET["ex"]))) {
        $id = $_GET["ex"];
        deletarClube($id);
        header("Location: $header?pg=listarClubes&msg=3");
        die();
    }

    if (($_GET["acao"] == "deletarSocio") && (isset($_GET["ex"]))) {
        $id = $_GET["ex"];
        deletarSocio($id);
        header("Location: $header?pg=listarSocios&msg=3");
        die();
    }
}