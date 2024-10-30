<?php
// Obtener las propiedades disponibles
$sql = "SELECT * FROM propiedades";
$resultado = mysqli_query($con, $sql);

// Crear un array con las imágenes
$imagenes = [
    1 => '../imagenes/fc_propiedad1.jpeg', // Casa en el campo
    2 => '../imagenes/fc_propiedad2.jpeg', // Apartamento céntrico
    3 => '../imagenes/fc_propiedad3.jpeg'  // Casa de lujo
];

// Mostrar propiedades
echo "<h2>Propiedades Disponibles</h2>";
if (mysqli_num_rows($resultado) > 0) {
    while ($propiedad = mysqli_fetch_assoc($resultado)) {
        echo "<div class='propiedad'>";
        echo "<h3>" . htmlspecialchars($propiedad['nombre']) . "</h3>";
        echo "<p>" . htmlspecialchars($propiedad['descripcion']) . "</p>";
        echo "<p>Precio: $" . number_format($propiedad['precio'], 2) . "</p>";

        // Obtener la imagen correspondiente por ID
        $id_propiedad = $propiedad['id'];
        $imagen_path = $imagenes[$id_propiedad] ?? 'imagenes/default.jpg'; // Imagen por defecto si no existe

        // Mostrar imagen asociada
        echo "<img src='" . $imagen_path . "' alt='" . htmlspecialchars($propiedad['nombre']) . "' onerror=\"this.onerror=null; this.src='imagenes/default.jpg';\">";

        echo "<p>Disponibilidad: " . ($propiedad['disponibilidad'] > 0 ? 'Disponible' : 'No disponible') . "</p>";

        // Solo mostrar botón si el usuario está logueado y hay disponibilidad
        if (!empty($_SESSION['nombre_usuario']) && $propiedad['disponibilidad'] > 0) {
            echo "<form action='./modulo/adquirir_propiedad.php' method='POST'>";
            echo "<input type='hidden' name='id_propiedad' value='" . $propiedad['id'] . "'>";
            echo "<button type='submit'>Adquirir</button>";
            echo "</form>";
        } elseif ($propiedad['disponibilidad'] == 0) {
            echo "<p>No disponible para adquirir.</p>";
        } else {
            echo "<p>Inicie sesión para adquirir esta propiedad.</p>";
        }

        echo "</div>";
    }
} else {
    echo "<p>No hay propiedades disponibles.</p>";
}
?>
