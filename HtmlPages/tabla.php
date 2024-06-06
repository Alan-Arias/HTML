<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Resultado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/49f6844fc6.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="cont-222" class="col-7 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Id_Cargo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conex=new mysqli("localhost","root","","usuarios");
                    $conex->set_charset("utf8");

                    $sql=$conex->query("SELECT * FROM nombre");
                    while($datos=$sql->fetch_object()){
                        ?>
                        <tr>
                        <td><?= $datos->Nombres?></td>
                        <td><?= $datos->Edad?></td>
                        <td><?= $datos->Sexo?></td>
                        <td><?= $datos->Id_Cargo?></td>
                        <td><?= $datos->Email?></td>
                        <td><?= $datos->Password?></td>
                        <td>
                            <a href="">eliminar</i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                    
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>