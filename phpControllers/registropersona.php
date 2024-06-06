<?php
$conex=new mysqli("localhost","root","","usuarios");
if (isset($_POST["bntregistrar"])) {
    if (
        strlen($_POST["Nombres"]) >= 1 &&
        strlen($_POST["Edad"]) >= 1 &&
        strlen($_POST["Sexo"]) >= 1 &&
        strlen($_POST["Id_Cargo"]) >= 1 &&
        strlen($_POST["Email"]) >= 1 &&
        strlen($_POST["Passwrd"]) >= 1
    ) {
        $usuario = trim($_POST['Nombres']);
        $edad = trim($_POST['Edad']);
        $sexo = trim($_POST['Sexo']);
        $idcargo = trim($_POST['Id_Cargo']);
        $email = trim($_POST['Email']);
        $pass = trim($_POST['Passwrd']);
        $pass_hash = hash('sha256', $pass);
    }
    $consulta = "INSERT INTO nombre(Nombres, Edad, Sexo, Id_Cargo, Email, Password) VALUES ('$usuario','$edad','$sexo','$idcargo','$email','$pass_hash')";
    $result = mysqli_query($conex, $consulta);

    if ($result) {
?>
        <div class="cont-p">
            <p class="ok">REGISTRO COMPLETO</p>
        </div>
<?php
header("Location: admin.php");
        sleep(2);
    } else {
        
    }
} else {
    echo '<div class="cont-p"><p class="bad">Llene el formulario por favor!</hp3></div>';
}
?>