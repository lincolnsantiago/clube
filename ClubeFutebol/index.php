<?php
include './header.php';
if (isset($_GET['pg'])) {
    if ($_GET['pg'] == "cadastrarClube") {
        include './cadastrarClube.php';
    }elseif ($_GET['pg'] == "cadastrarSocio") {
        include './cadastrarSocio.php';
    }elseif ($_GET['pg'] == "listarClubes") {
        include './listarClubes.php';
    }elseif(($_GET['pg'] == "listarSocios")){
        include './listarSocios.php';
    }elseif(($_GET['pg'] == "editarClube")){
        include './editarClube.php';
    }elseif(($_GET['pg'] == "socioClubes")){
        include './socioClubes.php';
    }elseif(($_GET['pg'] == "editarSocio")){
        include './editarSocio.php';
    }
    else{    
        include './error.php';
    }
} else {
    include './home.php';
}

include './footer.php';
