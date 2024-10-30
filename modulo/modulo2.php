<?php

// Comprobar si el usuario está logueado
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Debes estar logueado para enviar un mensaje.');</script>";
    echo "<script>window.location='index.php';</script>"; // Redirigir al inicio o a la página de login
}

// Enviar mensaje
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];
    
    // Guardar mensaje en la base de datos
    $usuario_id = $_SESSION['id']; // ID del usuario logueado
    $sql = "INSERT INTO comentarios (usuario_id, mensaje) VALUES ('$usuario_id', '$mensaje')";
    
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Mensaje enviado con éxito.');</script>";
    } else {
        echo "<script>alert('Error al enviar el mensaje: " . mysqli_error($con) . "');</script>";
    }
}

// Mostrar mensajes del usuario logueado
$sql = "SELECT * FROM comentarios WHERE usuario_id = '".$_SESSION['id']."'";
$result = mysqli_query($con, $sql);

// Eliminar mensaje
if (isset($_GET['eliminar'])) {
    $mensaje_id = $_GET['eliminar'];
    $sql = "DELETE FROM comentarios WHERE id = '$mensaje_id' AND usuario_id = '".$_SESSION['id']."'";
    mysqli_query($con, $sql);
    echo "<script>alert('Mensaje eliminado con éxito.');</script>";
    echo "<script>window.location='index.php?modulo=modulo2';</script>"; // Redirigir después de eliminar
}
?>

<section id="contacto" class="section">
    <h2>Contacto</h2>
    <form action="index.php?modulo=modulo2" method="POST" onsubmit="return fc_validar_mensaje();">
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" required></textarea>
        <button type="submit">Enviar Mensaje</button>
    </form>

    <h3>Mensajes Enviados:</h3>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div>
            <p><?php echo htmlspecialchars($row['mensaje']); ?></p>
            <a href="index.php?modulo=modulo2&eliminar=<?php echo $row['id']; ?>">Eliminar</a> <!-- Enlace para eliminar -->
        </div>
    <?php endwhile; ?>
</section>

<!-- Incluir el archivo de JavaScript -->
<script src="../js/fc_script.js"></script>

