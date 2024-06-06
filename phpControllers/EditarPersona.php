<?php
$conex = new mysqli("localhost", "root", "", "usuarios");

if (isset($_POST["bnteditar"])) {
    if (
        strlen($_POST["Nombres"]) >= 1 &&
        strlen($_POST["Edad"]) >= 1 &&
        strlen($_POST["Sexo"]) >= 1 &&
        strlen($_POST["Email"]) >= 1 &&
        strlen($_POST["Passwrd"]) >= 1
    ) {
        $id_per = trim($_POST['id']);
        $usuario = trim($_POST['Nombres']);
        $edad = trim($_POST['Edad']);
        $sexo = trim($_POST['Sexo']);
        $email = trim($_POST['Email']);
        $pass = trim($_POST['Passwrd']);
        $pass_hash = hash('sha256', $pass);
        $consulta = "UPDATE nombre SET Nombres='$usuario', Edad='$edad', Sexo='$sexo', Email='$email', Password='$pass_hash' WHERE id_persona=$id_per";
        $result = mysqli_query($conex, $consulta);
        header("Location: admin.php");
    } else {
        echo '<div class="alert alert-danger"><p>Campos Vacios</p></div>';
    }
}
?>