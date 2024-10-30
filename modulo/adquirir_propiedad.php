<?php

if (isset($_POST['id_propiedad']) && isset($_SESSION['id'])) {
    $id_propiedad = intval($_POST['id_propiedad']);
    $id_usuario = $_SESSION['id'];

    // Verificar disponibilidad de la propiedad
    $sql = "SELECT disponibilidad FROM propiedades WHERE id = $id_propiedad";
    $resultado = mysqli_query($con, $sql);
    $propiedad = mysqli_fetch_assoc($resultado);

    if ($propiedad && $propiedad['disponibilidad'] > 0) {
        // Insertar en la base de datos la propiedad adquirida
        $sql = "INSERT INTO adquisiciones (usuario_id, propiedad_id) VALUES ('$id_usuario', '$id_propiedad')";
        
        if (mysqli_query($con, $sql)) {
            // Actualizar la disponibilidad de la propiedad
            $sql = "UPDATE propiedades SET disponibilidad = disponibilidad - 1 WHERE id = $id_propiedad";
            mysqli_query($con, $sql);
            echo json_encode(["success" => true, "message" => "Propiedad adquirida con éxito."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al adquirir la propiedad."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "La propiedad no está disponible."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "No se puede adquirir la propiedad."]);
}
?>
