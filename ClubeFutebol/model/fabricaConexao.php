<?php

require_once __DIR__ . "/conexaoSQL.php";

class fabricaConexao {
    public function conecatarCB(){
        $con = new conexaoSQL("mysql.hostinger.com.br", "u917052117_user", "clube01", "u917052117_cb");
        $con = $con->conectar();
        return $con;
    }

}
