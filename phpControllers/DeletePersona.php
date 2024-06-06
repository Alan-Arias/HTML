<?php
include("conexion.php");
if (!empty($_GET["Nombres"])) {
    $nam=$_GET["Nombres"];
    $sql=$conex->query("delete from nombre where Nombres='$nam'; ");
    if ($sql==1) {
        echo '<script>';
        echo 'document.getElementById("mensaje").style.display = "block";';
        echo '</script>';
    }else{
        echo"<div>¡Error al eliminar!</div>";
    }
}
?>