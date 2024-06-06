<?php
if (isset($_POST["btnsearch"])) {
    $username = $_POST["name-user"];       
    $_SESSION ["name-user"] = $username;
    
    $conex = new mysqli("localhost", "root", "", "usuarios");
    $conex->set_charset("utf8");
    
    $sql = $conex->query("SELECT Nombres, Email, Descripción, Sexo, Password FROM cargo, nombre WHERE nombre.Email='$username' AND cargo.Id_Cargo=nombre.Id_Cargo;");
    while ($datos = $sql->fetch_object()) {
    ?>
    <div class="" style="margin-top: 3cm; display: flex; align-items:center; justify-content:center;">
    <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Email</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $datos->Nombres ?></td>
                        <td><?= $datos->Email ?></td>
                        <td><?= $datos->Descripción ?></td>
                        <td><?= $datos->Sexo ?></td>
                        <td><?= $datos->Password ?></td>
                    </tr>
                </tbody>
            </table>
    </div>
    <?php
    }
}
?>