<?php
require_once __DIR__ . '/model/clube.php';
require_once "./controller/socio.php";
require_once "./controller/clube.php";
$clubes = listarClubesById();
if (isset($_GET["id"])) {
    $socio = selecionarSocioById($_GET["id"]);
} else {
    header("Location: $header?pg=listarSocios&msg=2");
}
?>
<form method="post" action="controller/controller.php?acao=editarSocio">
    <div class="form-group">
        <input type="hidden" value="<?php echo $socio->getId(); ?>" name="id">
        <input type="text" value="<?php echo $socio->getId(); ?>" class="form-control" readonly>
        <label for="nomeclube">Nome do Socio</label>
        <input type="text" class="form-control" id="nomesocio" name="nomesocio" value="<?php echo $socio->getNome(); ?>">
        <label for="nomeclube">Sobrenome</label>
        <input type="text" class="form-control" id="sobrenomesocio" name="sobrenomesocio" value="<?php echo $socio->getSobrenome(); ?>">
        <h2>Clubes:</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nome</th>
                    <th class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($x = 0; $x < sizeof($socio->getClube()); $x++) { ?>
                    <tr>
                        <td><?php echo $socio->getClube()[$x]->getId() ?></td>
                        <td><?php echo $socio->getClube()[$x]->getNome(); ?> </td>
                        <td class="text-center"><a href="./controller/controller.php?acao=excluirVinculo&idc=<?php echo $socio->getClube()[$x]->getId(); ?>&ids=<?php echo $socio->getId(); ?> "><span class="glyphicon glyphicon-remove"></span></a> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="conclubes" id="conclubes">
            <select class="form-control" id="clubes" name="clubes[]">
                <?php for ($x = 0; $x < sizeof($clubes); $x++) { ?>
                    <option value="<?php echo $clubes[$x]->getId() ?>"><?php echo $clubes[$x]->getNome() ?></option>
                <?php } ?>
            </select>
        </div>
        <input type="checkbox" name="naocadastrar" value="true"checked>NÃO Cadastrar clubes selecionados!<br>
        <input type="button" value="+ Clube" onclick="clonarClubes()" class="btn btn-success"/>
        <input type="button" value="- Clube" onclick="removerClube()" class="btn btn-warning" />
        <input type="submit" value="Enviar" class="btn btn-primary" />
    </div>
</form>
