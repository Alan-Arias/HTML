<?php
$conex = new mysqli("localhost", "root", "", "usuarios");


//subir imagen inicio
include "../HtmlPages/upload.php";
//subir imagen fin


if (isset($_POST["bntregistrarprod"])) {
        $nombre = trim($_POST['Nombres']);
        $disp = trim($_POST['Disponible']);
        $talla = trim($_POST['Talla']);
        $categoria = trim($_POST['categoria']);
        $ruta_imagen = $target_filev2;// La ruta de la imagen seleccionada

        $consulta = "INSERT INTO producto(Nombre, Disponible, Talla, url_img, id_categoria) VALUES ('$nombre','$disp','$talla','$ruta_imagen','$categoria')";

        $result = mysqli_query($conex, $consulta);

        if ($result) {
            ?>
            <div class="cont-p">
                <p class="ok">REGISTRO COMPLETO</p>
            </div>
            <?php
            header("Location: adminProducto.php");
            sleep(2);
        } else {
            echo "Error al registrar el producto: " . mysqli_error($conex);
        }
}
?>
