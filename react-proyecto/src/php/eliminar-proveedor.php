<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

# Verificar si vienen los parámetros requeridos
if (empty($_POST["RFC"])) {
    http_response_code(400);
    exit("Falta RFC"); // Terminar el script definitivamente
}

try {
    // Conexión a la base de datos
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparando la consulta
    $sentencia = $conex->prepare("DELETE FROM PROVEEDORES WHERE RFC_PROV = :RFC_PROV");
    $resultado = $sentencia->execute(array("RFC_PROV" => $_POST["RFC"]));

    // Comprobación de la ejecución de la consulta
    if ($resultado) {
        http_response_code(200);
        echo "Registro de proveedor eliminado exitosamente";
    } else {
        http_response_code(400);
        echo "No se pudo eliminar el registro de proveedor";
    }

} catch (PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: " . $exc->getMessage();
}
?>
