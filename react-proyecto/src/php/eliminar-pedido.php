<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["ID"])) {
    http_response_code(400);
    exit("Falta ID"); // Terminar el script definitivamente
}

try {
    // Conexión a la base de datos
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparando la consulta
    $sentencia = $conex->prepare("DELETE FROM PEDIDO WHERE ID_PED = :ID_PED");
    $resultado = $sentencia->execute(array("ID_PED" => $_POST["ID"]));

    // Comprobación de la ejecución de la consulta
    if ($resultado) {
        http_response_code(200);
        echo "Registro de pedido eliminado exitosamente";
    } else {
        http_response_code(400);
        echo "No se pudo eliminar el registro de pedido";
    }

} catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>
