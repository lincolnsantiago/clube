<?php
require_once __DIR__.'/../model/socioDAO.php';

function cadastrarSocio($nome, $sobrenome, $clubes) {
    $socio = new socio();
    $socio->setNome($nome);
    $socio->setSobrenome($sobrenome);
    $socio->setClube($clubes);
    $socioDAO = new socioDao();
    $socioDAO->insert($socio);
}

function updateSocio($id, $nome, $sobrenome) {
    $socio = new socio();
    $socio->setId($id);
    $socio->setNome($nome);
    $socio->setSobrenome($sobrenome);
    $socioDAO = new socioDao();
    $socioDAO->update($socio);
}

function updateVinculo($ids, $clubes) {
    $socio = new socio();
    $socio->setId($ids);
    $socio->setClube($clubes);    
    $socioDAO = new socioDao();
    $socioDAO->updateVinculo($socio);
}

function deletarVinculo($ids, $idc) {
    $socio = new socio();
    $socio->setId($ids);
    $socio->setClube($idc);
    $socioDAO = new socioDao();
    return $socioDAO->deleteVinculo($socio);
}

function selecionarSocioById($id) {
    $socio = new socio();
    $socio->setId($id);
    $socioDAO = new socioDao();
    return $socioDAO->selecionarById($socio);
}

function deletarSocio($id) {    
    $socio = new socio();
    $socio->setId($id);
    $socioDAO = new socioDao();
    $socioDAO->delete($socio);
}

function listarSocioJoin() {
    $socio = new socio();
    $socioDAO = new socioDAO();
    return $socioDAO->listarJoin();
}

function listarJoinById($id) {
    $socio = new socio();
    $socio->setId($id);
    $socioDAO = new socioDAO();
    return $socioDAO->listarJoinById($socio);
}

function listarSocioById() {
    $socio = new socio();
    $socioDAO = new socioDAO();
    return $socioDAO->listarById();
}

function listarSocioByNome() {
    $socio = new socio();
    $socioDAO = new socioDAO();
    return $socioDAO->listarByNome();
}

function listarSocioBySobrenome() {
    $socio = new socio();
    $socioDAO = new socioDAO();
    return $socioDAO->listarBySobrenome();
}
