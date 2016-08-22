<?php
require_once "./controller/clube.php";
if (isset($_GET["by"])) {
    $clubes = listarClubesByNome();
} else {
    $clubes = listarClubesById();
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th><a href="?pg=listarClubes">Nº</a></th>
            <th><a href="?pg=listarClubes&by=nome">Nome do Clube</a></th>
            <th class="text-center">Editar</th>
            <th class="text-center">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($x = 0; $x < sizeof($clubes); $x++) { ?>
            <tr>
                <td><?php echo $clubes[$x]->getId(); ?></td>
                <td><?php echo $clubes[$x]->getNome(); ?></td>
                <td class="text-center"><a href="?pg=editarClube&id=<?php echo $clubes[$x]->getId(); ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                <td class="text-center"><a href="controller/controller.php?acao=deletarClube&ex=<?php echo $clubes[$x]->getId(); ?>" onclick="return deletar()"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>