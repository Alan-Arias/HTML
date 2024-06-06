<?php
$conex = new mysqli("localhost", "root", "", "usuarios");
if (isset($_POST["btnvender"])) {
    if (
        strlen($_POST["IdVenta"]) >= 1 &&
        strlen($_POST["IdProducto"]) >= 1 &&
        strlen($_POST["FechaVenta"]) >= 1 &&
        strlen($_POST["Cantidad"]) >= 1 &&
        strlen($_POST["Precio"]) >= 1
    ) {
        $idventa = trim($_POST['IdVenta']);
        $idprod = trim($_POST['IdProducto']);
        $fechaventa = trim($_POST['FechaVenta']);
        $cantidad = trim($_POST['Cantidad']);
        $precio = trim($_POST['Precio']);
        $preciototal = $cantidad * $precio;
    }
    $updateSql = "UPDATE producto SET Disponible = Disponible - '$cantidad' WHERE producto.IdProducto = $idprod";
    
    $result = mysqli_query($conex, $updateSql);


    if ($result) { 

    
    } else {

    }

} else {
}
session_destroy();
?>
