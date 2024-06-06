<?php
$conex=new mysqli("localhost","root","","usuarios");
session_start();
if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 && 
        strlen($_POST['edad']) >= 1 && 
        strlen($_POST['sexo']) >= 1 && 
        strlen($_POST['email']) >= 1 && 
        strlen($_POST['password']) >= 1 ) {     

    $usuario=trim($_POST['nombre']);
    $edad=trim($_POST['edad']);
    $sexo=trim($_POST['sexo']);
    $email=trim($_POST['email']);    
    $pass=trim($_POST['password']);
    $pass_hash = hash('sha256', $pass);

    $consulta="INSERT INTO nombre(Nombres, Edad, Sexo, Id_Cargo, Email, Password) VALUES ('$usuario','$edad','$sexo','2','$email','$pass_hash')";  
    $result=mysqli_query($conex,$consulta);

    if ($result) {
        echo '<script>';
        echo 'document.getElementById("none-class").style.display = "block";';
        echo 'setTimeout(function() {';
        echo 'window.location.href = "../HtmlPages/login.php?name=' . $email . '&password=' . $pass . '";';
        echo '}, 3000);'; // Redirigir después de 1 segundo
        echo '</script>';
    }else{
        echo '<div class="cont-p"><p class="bad">Ha ocurrido un error en el registro</p></div>';
    }
    }else{
        echo '<div class="cont-p"><p class="bad">Llene el formulario por favor!</hp3></div>';
    }
}
session_destroy();
?>