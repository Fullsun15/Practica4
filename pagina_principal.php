<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal - Embotelladora Thomsom</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>

        #noc {
            max-height: 250px; 
            overflow: hidden;
        }


        #s2 span {
        font-weight: bold;
        }

        .card-img {
            width: 100%; 
            height: 200px; 
            object-fit: cover;
        }

        .bajar{
            margin-top: 85px;
        }

        #s1 span {
            font-size: 25px;
            font-weight: bold;
        }

        body{

            background-color: #fafafa;
        }

    </style>
</head>
<body>
    <nav class="blue darken-1">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo left">Embotelladora Thomsom</a>
            <ul id="nav-mobile" class="right">
                <li><a href="#">Inicio</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <section class="slider" id="noc">
        <ul class="slides">
            <li>
                <img src="https://www.cosemarozono.com/wp-content/uploads/2017/05/desinfeccion-fabricas-embotelladoras-agua-mineral.jpg" class="slider-img">
                <div class="caption center-align">
                    
                </div>
            </li>
            <li>
                <img src="https://media.istockphoto.com/id/1249372405/es/foto/planta-embotelladora.jpg?s=612x612&w=0&k=20&c=tFn8ZlLj9NyIF-tNbAgbgGvgbD5rj0vTyVpYYhQ-K4U=" class="slider-img">
                <div class="caption left-align">
                    
                </div>
            </li>
            <li>
                <img src="http://www.minci.gob.ve/wp-content/uploads/2016/06/AGUA.jpg" class="slider-img">
                <div class="caption right-align">
                    
                </div>
            </li>
        </ul>
    </section>

<br>
<div class="container" id="s1">
        <div class="row ">
            <div class="col s12 m6">
                <div class="card bajar">
                    <div class="card-content">
                        <span class="card-title center">Bienvenido a Embotelladora Thomsom</span><br>
                        <p>Con años de experiencia en la industria, hemos perfeccionado el proceso de embotellado para brindarte agua fresca y pura.</p><br>
                            <div class="center-align" >
                            <a href="registroP.php" class="waves-effect blue lighten-4 black-text btn">Realizar Pedido!</a>
                            </div>
                    </div>
                    <div class="card-action">
                        @Rubichan
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <img src="assets\img\Icon.png" class="" alt="Imagen al lado de la carta">
            </div>
        </div>
    </div>

    <div class="container" id="s2">
        <!-- Columna para las cartas -->
        <div class="col s12 m6">
        <h4 class="card-panel blue lighten-5 black-text center">Sucursales</h4>
            <div class="row">
                <div class="col s12 m6">
                    <div class="card card-panel">
                        <div class="card-image">
                            <img src="https://centrosdellenadogarrafones.com.mx/wp-content/uploads/2019/09/purificadora-de-agua-23.jpg" class="card-img">
                        </div>
                        <div class="card-content">
                            <span class="card-title center negrita">Maracaibo</span><hr>
                            <p>Ubicada en la Avenida Libertador con Calle 15 en la Urbanización Los Haticos, Casa #123</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="card card-panel">
                        <div class="card-image">
                            <img src="https://laverdad.com.mx/wp-content/uploads/2022/06/agua-purificada-negocio-1.jpg" class="card-img">
                        </div>
                        <div class="card-content">
                            <span class="card-title center negrita">Táchira</span><hr>
                            <p>Ubicada en la Avenida Principal de Los Pájaros, Calle La Montaña, Urbanización El Paraíso, Casa #123</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="page-footer blue darken-1">
        <div class="footer-copyright">
            <div class="container">
                <p>Copyright © 2023 rubilopez.site</p>
                <a class="left" href="https://github.com/Fullsun15/Practica4.git" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" width="35px" height="35px"></a>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems);
        });
    </script>
</body>
</html>
