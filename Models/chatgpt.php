<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'usuario', 'contraseña', 'basededatos');

// Obtener los datos del mensaje enviado
$usuario = $_POST['usuario'];
$mensaje = $_POST['mensaje'];
$hora = date('Y-m-d H:i:s');

// Insertar el mensaje en la base de datos
$consulta = "INSERT INTO chat (usuario, mensaje, hora) VALUES ('$usuario', '$mensaje', '$hora')";
$resultado = $conexion->query($consulta);

if ($resultado) {
    // Obtener los últimos 10 mensajes de la base de datos
    $consulta = "SELECT * FROM chat ORDER BY id DESC LIMIT 10";
    $resultado = $conexion->query($consulta);

    // Crear un arreglo con los mensajes
    $mensajes = array();
    while ($fila = $resultado->fetch_assoc()) {
        $mensajes[] = $fila;
    }

    // Convertir el arreglo de mensajes a formato JSON
    $json = json_encode($mensajes);

    // Imprimir el resultado en formato JSON
    echo $json;
} else {
    echo "Error al enviar el mensaje";
}

// Cerrar la conexión a la base de datos
$conexion->close();


?>