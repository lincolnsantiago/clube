<?php
require_once "./controller/clube.php";
$clubes = listarClubesById();
?>
<form method="post" action="controller/controller.php?acao=cadastrarSocio">
    <div class="form-group">
        <label for="nomeclube">Nome do Sócio</label>
        <input type="text" class="form-control" id="nomesocio" name="nomesocio" placeholder="Nome">

        <label for="nomeclube">Sobrenome do Sócio</label>
        <input type="text" class="form-control" id="sobrenomesocio" name="sobrenomesocio" placeholder="Sobrenome">

        <label for="sel1">Clubes:</label>
        <div class="conclubes" id="conclubes">
        <select class="form-control" id="clubes" name="clubes[]">
            <?php for ($x = 0; $x < sizeof($clubes); $x++) { ?>
                <option value="<?php echo $clubes[$x]->getId() ?>"><?php echo $clubes[$x]->getNome() ?></option>
            <?php } ?>
        </select>
        </div>
        <input type="button" value="+ Clube" onclick="clonarClubes()" class="btn btn-success"/>
        <input type="button" value="- Clube" onclick="removerClube()" class="btn btn-warning" />
        <input type="submit" value="Enviar" class="btn btn-primary" />
    </div>
</form>
