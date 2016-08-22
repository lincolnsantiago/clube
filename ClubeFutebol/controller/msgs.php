<?php
function gerarMsg() {
    $msg=0;
    $alert = 0;
    if (isset($_GET["msg"])) {
        if ($_GET["msg"] == 1) {
            $msg = "Cadastrado com sucesso";
            $alert = "alert-success";
        } elseif ($_GET["msg"] == 2) {
            $msg = "Erro ao cadastrar";
            $alert = "alert-danger";
        } elseif ($_GET["msg"] == 3) {
            $msg = "Deletado";
            $alert = "alert-success";
        } elseif ($_GET["msg"] == 4) {
            $msg = "Erro ao deletar";
            $alert = "alert-danger";
        }
        $div = '<div class="alert '.$alert.'">
        <strong>'.$msg.'</strong>
        </div>';
        return $div;
    }
    return;
}
