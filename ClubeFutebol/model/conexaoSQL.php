<?php

class conexaoSQL {

    protected $servidor;
    protected $usuario;
    protected $senha;
    protected $nomeBanco;

    public function __construct($servidor, $usuario, $senha, $nomeBanco) {
        $this->servidor = $servidor;
        $this->nomeBanco = $nomeBanco;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }
    
    public function conectar() {
        $teste = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->nomeBanco) or die(mysqli_error());  
        return $teste;
    }

    public function desconectar() {
        mysqli_close();
    }

}
