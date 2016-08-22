<?php
require_once "./controller/clube.php";
require_once "./controller/socio.php";

if (isset($_GET["by"])) {
    if($_GET["by"] == "nome"){
        $socios = listarSocioByNome();
    }elseif($_GET["by"] == "sobrenome"){
        $socios = listarSocioBySobrenome();
    }else{
        $socios = listarSocioById();
    }
}else{
    $socios = listarSocioById();
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th><a href="?pg=listarSocios">Nº</a></th>
            <th><a href="?pg=listarSocios&by=nome">Nome Socio</a></th>
            <th><a href="?pg=listarSocios&by=sobrenome">Sobrenome</a></th>
            <th class="text-center">Editar</th>
            <th class="text-center">Clubes</th>
            <th class="text-center">Excluir</th>            
        </tr>
    </thead>
    <tbody>
        <?php for ($x = 0; $x < sizeof($socios); $x++) { ?>
            <tr>
                <td><?php echo $socios[$x]->getId(); ?></td>
                <td><?php echo $socios[$x]->getNome(); ?></td>
                <td><?php echo $socios[$x]->getSobrenome(); ?></td>
                <td class="text-center"><a href="./?pg=editarSocio&id=<?php echo $socios[$x]->getId(); ?>"> <span class="glyphicon glyphicon-edit"></span></a></td>
                <td class="text-center"><a href="./?pg=socioClubes&id=<?php echo $socios[$x]->getId(); ?>"> <span class="glyphicon glyphicon-home"></span></a></td>
                <td class="text-center"><a href="controller/controller.php?acao=deletarSocio&ex=<?php echo $socios[$x]->getId(); ?>" onclick="return deletar()"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>