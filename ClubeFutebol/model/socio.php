<?php

class socio {
    private $id;
    private $nome;
    private $sobrenome;
    private $clube;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getClube() {
        return $this->clube;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setClube($clube) {
        $this->clube = $clube;
    }

}
