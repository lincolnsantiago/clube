<?php
require_once "./controller/clube.php";
if (isset($_GET["id"])){
    $clube = selecionarClubeById($_GET["id"]);
}else{
     header("Location: $header?pg=listarClubes&msg=2");
}
?>
<form method="post" action="controller/controller.php?acao=editarClube">
  <div class="form-group">
    <label for="nomeclube">Nome do Clube</label>
    <input type="hidden" value="<?php echo $clube->getId(); ?>" name="id">
    <input type="text" value="<?php echo $clube->getId(); ?>" class="form-control" readonly>
    <input type="text" class="form-control" id="nomeclube" name="nomeclube" value="<?php echo $clube->getNome(); ?>">
    <input type="submit" value="Enviar" class="btn btn-primary"/>
  </div>
</form>
