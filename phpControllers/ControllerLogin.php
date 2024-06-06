<?php
session_start();
include "conexion.php";

if (isset($_POST["btningresar"])) {
    if (isset($_POST['name'], $_POST['pass'])) {
        $usuario = $_POST['name'];
        $pass = $_POST['pass'];

        $conex = new mysqli("localhost", "root", "", "usuarios");
        $conex->set_charset("utf8");

        $stmt = $conex->prepare("SELECT * FROM nombre WHERE Email = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();

        if ($fila) {
            $pass_hash = hash('sha256', $pass); // Encripta la contraseña ingresada

            if ($pass_hash === $fila['Password']) { // Compara con la contraseña encriptada en la base de datos
                $_SESSION['name'] = $usuario;
                $_SESSION['authenticated'] = true;
                $_SESSION['Id_Cargo'] = $fila['Id_Cargo'];

                if ($fila['Id_Cargo'] == 1) { // admin
                    header("Location: ../HtmlPages/admin.php");
                    exit();
                } else if ($fila['Id_Cargo'] == 2) { // user
                    header("Location: ../HtmlPages/cliente.php");
                    exit();
                }
            } else {
                echo '<script>alert("Usuario o contraseña incorrectos");</script>';
                echo '<script>window.location.href="../HtmlPages/login.php";</script>';
                exit();
            }
        } else {
            echo '<script>alert("Usuario no encontrado");</script>';
            echo '<script>window.location.href="../HtmlPages/login.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Campos vacíos!");</script>';
        echo '<script>window.location.href="../HtmlPages/login.php";</script>';
        exit();
    }
}
?>
