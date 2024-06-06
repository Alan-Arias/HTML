<?php
if (isset($_POST["btnsearch"])) {
    if (strlen($_POST["name-user"]) >= 1) {
        $username = $_POST["name-user"];
        
        $_SESSION["name-user"] = $username;
        $conex = new mysqli("localhost", "root", "", "usuarios");
        $conex->set_charset("utf8");

        // Utilizar declaraciones preparadas para evitar inyecciones SQL
        $stmt = $conex->prepare("SELECT Nombres, Email, Descripción, Sexo, Password FROM cargo, nombre WHERE nombre.Email = ? AND cargo.Id_Cargo = nombre.Id_Cargo");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $filas = $resultado->fetch_assoc();

        if ($filas !== null && $filas['Email'] == $username) { // Verifica si el usuario es correcto y existe en la base de datos
            echo '<div style="color: white; background-color:blue; border-radius:9px; margin-right:10px;">¡El usuario existe!</div>';
        } else {
            echo '<div style="color: white; background-color:blue; border-radius:9px;">¡El usuario No existe!</div>';
        }

        $stmt->close();
        $conex->close();
    }
}
?>
