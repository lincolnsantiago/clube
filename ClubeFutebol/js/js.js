function clonarClubes() {
    $("#clubes").clone().appendTo("#conclubes");
}
function removerClube() {
    var vrows = document.getElementsByName("clubes[]");
    if (vrows.length > 1) {
        document.getElementById("clubes").remove();
    }
}
function deletar() {
    var deletar = confirm("Voce tem certeza que deseja deletar?");
    if (deletar) {
        return true;
    } else {
        return false;
    }

}
