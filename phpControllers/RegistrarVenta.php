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
    $consulta = "INSERT INTO venta (IdVenta, FechaVenta, Cantidad, Precio) VALUES ('$idventa', '$fechaventa', '$cantidad', '$precio')";
    
    $result = mysqli_query($conex, $consulta);


    if ($result) { 
        ?>
        <div class="cont-p">
            <p class="ok">VENTA COMPLETA</p>
        </div>
    <?php
    
    } else {

    }




} else {
}
?>