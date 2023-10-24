<?php
session_start();

// Verificar si el usuario ha iniciado sesión. Si no, redirigirlo al formulario de inicio de sesión.
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

require_once('conexion.php'); 

$cedula = "";

if (isset($_GET['buscar_cedula'])) {
    $cedula = $_GET['cedula'];


    $query = "SELECT cedula, nombre, apellido, zona_pais FROM cliente WHERE cedula LIKE '%$cedula%'";

    $result = $conn->query($query);
} else {

    $query = "SELECT cedula, nombre, apellido, zona_pais FROM cliente";
    $result = $conn->query($query);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Clientes - Embotelladora Thomsom</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .margin-top-50 {
            margin-top: 50px;
        }

        table, thead, tr{
            border: 1px solid black; 
        }

        .text-center {
        text-align: center;
        }

    </style>
</head>
<body>
    <nav class="blue darken-1">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo left">Embotelladora Thomsom</a>
            <ul id="nav-mobile" class="right">
                <li><a href="pagina_principal.php">Inicio</a></li>
                <li><a href="#">Clientes</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <div class="container ">
    <div class="container margin-top-50">
    <h4 class="card-panel blue lighten-2 black-text center">Clientes Registrados</h4><br>
        <form method="get" action="clientes.php">
            <div class="input-field">
                <input type="text" name="cedula" id="cedula" maxlength="11" value="<?php echo $cedula; ?>">
                <label for="cedula">Buscar por Cédula</label>
            </div>
            <div class="center">
                <button class="waves-effect waves-light blue lighten-4 black-text btn" type="submit" name="buscar_cedula">
                    Buscar
                </button>
            </div>

<br>
        <div class="center">
            <a href="registroC.php" class="waves-effect blue lighten-4 black-text btn">Registrar Nuevo Cliente</a>
        </div>

        <div class="right">
            <a href="fpdf\reporteC.php" target="_blank"><i class="material-icons left">picture_as_pdf</i>Reporte PDF</a><hr>
        </div>

        </form>
        </div>
        </div>

    <div class="container margin-top-50">
        <table class="striped">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Cédula</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Zona/País</th>
                </tr>
            </thead>
            <tbody>
            <?php

            $N_contador = 1;

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='text-center'>" . $N_contador . "</td>";
                echo "<td class='text-center'>" . $row['cedula'] . "</td>";
                echo "<td class='text-center'>" . $row['nombre'] . "</td>";
                echo "<td class='text-center'>" . $row['apellido'] . "</td>";
                echo "<td class='text-center'>" . $row['zona_pais'] . "</td>";
                echo "</tr>";

                $N_contador++;
            }
            ?>
        </tbody>
        </table>
        </div>
<br><br>
        <footer class="page-footer blue darken-1">
        <div class="footer-copyright">
            <div class="container">
                <p>Copyright © 2023 rubilopez.site</p>
                <a class="left" href="https://github.com/Fullsun15/Practica4.git" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" width="35px" height="35px"></a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
