<?php
require_once "./controller/clube.php";
require_once "./controller/socio.php";
if (isset($_GET["id"])) {
    $socios = selecionarSocioById($_GET["id"]);
} else {
    header("Location: $header?pg=error");
}
if (sizeof($socios->getClube()) == 0) {
    echo "Esse sócio não está veinculado a um clube";
    die();
}
?>
<h1><?php echo $socios->getNome(); ?></h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nº</th>
            <th>Clube</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($x = 0; $x < sizeof($socios->getClube()); $x++) { ?>
            <tr>
                <td><?php echo $socios->getClube()[$x]->getId(); ?></td>
                <td><?php echo $socios->getClube()[$x]->getNome(); ?></td>
            </tr>

        <?php } ?>
    </tbody>
</table>