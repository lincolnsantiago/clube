<?php
require_once __DIR__.'/controller/msgs.php';
$cc = "null";
$cs = "null";
$lc = "null";
$ix = "null";
$ls = "null";
if (isset($_GET['pg'])) {
    if ($_GET['pg'] == "cadastrarClube") {
        $cc = "active";
    }
    if ($_GET['pg'] == "cadastrarSocio") {
        $cs = "active";
    }
    if ($_GET['pg'] == "listarClubes") {
        $lc = "active";
    }
    if ($_GET['pg'] == "listarSocios") {
        $ls = "active";
    }
} else {
    $ix = "active";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clubes de Futebok</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/js.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/npm.js"></script>
    </head>
    <body>
        <div class="margin"></div>
        <div class="container">
            <div class="menu">
                <ul class="nav nav-tabs">                    
                    <li class="<?php echo $ix ?>"><a href="index.php">Home</a></li>
                    <li class="<?php echo $cc ?>"><a href="?pg=cadastrarClube">Cadastar Clube</a></li>
                    <li class="<?php echo $cs ?>"><a href="?pg=cadastrarSocio">Cadastrar Sócio</a></li>
                    <li class="<?php echo $lc ?>"><a href="?pg=listarClubes">Listar Clubes</a></li>
                    <li class="<?php echo $ls ?>"><a href="?pg=listarSocios">Listar Sócios</a></li>
                </ul>
            </div>
<?php echo gerarMsg(); ?>


