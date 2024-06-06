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
    $consulta2 = "INSERT INTO detalleventa (IdProducto, IdVenta, PrecioTotal, CantidadComprada) VALUES ('$idprod', '$idventa', '$preciototal', '$cantidad')";

    
    $result = mysqli_query($conex, $consulta2);


    if ($result) { 

    } else {

    }




} else {
}
?>
