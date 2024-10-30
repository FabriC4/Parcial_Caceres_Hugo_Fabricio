<?php
session_start();
include("./php/conexion.php");
conectar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agencia Inmobiliaria</title>
    <link rel="stylesheet" href="css/fc_estilos.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?modulo=modulo1">Propiedades Disponibles</a></li>
            <li><a href="index.php?modulo=modulo2">Contacto</a></li>
            <li><a href="index.php?modulo=modulo3">Propiedades Destacadas</a></li>
            <li><a href="index.php?modulo=registro">Registro</a></li>
            <li><a href="index.php?modulo=login">Iniciar Sesión</a></li>
        </ul>
    </nav>
    <header>
        <h1>Agencia Inmobiliaria</h1>
    </header>
    <?php
        if (!empty($_SESSION['nombre_usuario'])) {
            ?>
            <p>Hola <?php echo $_SESSION['nombre_usuario']; ?>, usted tiene el ID: <?php echo $_SESSION['id']; ?></p>
            <a href="index.php?modulo=login&salir=ok">SALIR</a>
            <?php
        }
    ?>
    <main>
    <?php
        if (!empty($_GET['modulo'])) {
            include('modulo/' . $_GET['modulo'] . '.php');
        } else {
            ?>
            <section>
                <h2>Página Principal</h2>
                <p>Bienvenido a la página. Busca Propiedades Interesantes</p>
            </section>

            <!-- Añadimos el contenedor del slider de propiedades destacadas con datos de ejemplo -->
            <section id="slider-destacadas">
                <h2>Propiedades Destacadas</h2>
                <div class="slider">
                    <div class="slider-content">
                        <!-- Slide 1 - Ejemplo -->
                        <div class="slide">
                            <img src="imagenes/fc_inmobiliaria1-destacada.jpeg" alt="Propiedad 1">
                            <h3>Casa en la Playa</h3>
                            <p>Hermosa casa con vista al mar, ideal para vacacionar.</p>
                        </div>
                        <!-- Slide 2 - Ejemplo -->
                        <div class="slide">
                            <img src="imagenes/fc_inmobiliaria2-destacada.jpeg" alt="Propiedad 2">
                            <h3>Apartamento Moderno</h3>
                            <p>Apartamento en el centro de la ciudad, con todos los servicios.</p>
                        </div>
                        <!-- Slide 3 - Ejemplo -->
                        <div class="slide">
                            <img src="imagenes/fc_inmobiliaria3-destacada.jpeg" alt="Propiedad 3">
                            <h3>Casa Familiar</h3>
                            <p>Casa espaciosa con jardín, perfecta para una familia.</p>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
    ?>
</main>

    <script src="js/fc_script.js"></script>
</body>
</html>
