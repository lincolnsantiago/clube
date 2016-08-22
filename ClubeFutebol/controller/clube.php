<?php

require __DIR__ . '/../model/clubeDAO.php';

function cadastrarClube($nome) {
    $clube = new clube();
    $clube->setNome($nome);
    $clubDAO = new clubeDAO();
    $clubDAO->insert($clube);
}

function deletarClube($id) {
    $clube = new clube();
    $clube->setId($id);
    $clubDAO = new clubeDAO();
    $clubDAO->delete($clube);
}

function updateClube($id, $nome) {
    $clube = new clube();
    $clube->setId($id);
    $clube->setNome($nome);
    $clubDAO = new clubeDAO();
    $clubDAO->update($clube);
}

function selecionarClubeById($id) {
    $clube = new clube();
    $clubDAO = new clubeDAO();
    $clube->setId($id);
    return $clubDAO->selecionarById($clube);
}

function listarClubesById() {
    $clube = new clube();
    $clubDAO = new clubeDAO();
    return $clubDAO->listarById();
}

function listarClubesByNome() {
    $clube = new clube();
    $clubDAO = new clubeDAO();
    return $clubDAO->listarByName();
}
