<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

# Verificar si vienen los parametros requeridos
if (empty($_POST["ID"])) {
    http_response_code(400);
    exit("Falta ID"); # Terminar el script definitivamente
}

if (empty($_POST["MARCA"])) {
    http_response_code(400);
    exit("Falta MARCA"); # Terminar el script definitivamente
}

if (empty($_POST["TALLA"])) {
    http_response_code(400);
    exit("Falta TALLA"); # Terminar el script definitivamente
}

if (empty($_POST["COLOR"])) {
    http_response_code(400);
    exit("Falta COLOR"); # Terminar el script definitivamente
}

if (empty($_POST["TIPO"])) {
    http_response_code(400);
    exit("Falta TIPO"); # Terminar el script definitivamente
}

if (empty($_POST["STOCK"])) {
    http_response_code(400);
    exit("Falta STOCK"); # Terminar el script definitivamente
}

if (empty($_POST["STOCKMIN"])) {
    http_response_code(400);
    exit("Falta STOCKMIN"); # Terminar el script definitivamente
}

if (empty($_POST["STOCKMAX"])) {
    http_response_code(400);
    exit("Falta STOCKMAX"); # Terminar el script definitivamente
}

if (empty($_POST["CC"])) {
    http_response_code(400);
    exit("Falta CC"); # Terminar el script definitivamente
}

if (empty($_POST["CV"])) {
    http_response_code(400);
    exit("Falta CV"); # Terminar el script definitivamente
}

try {
    $conex = new PDO("sqlite:" . $nombre_fichero);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $calzado = [
        "ID_CAL" => $_POST["ID"],
        "MARCA_CAL" => $_POST["MARCA"],
        "TALLA_CAL" => $_POST["TALLA"],
        "COLOR_CAL" => $_POST["COLOR"],
        "TIPO_CAL" => $_POST["TIPO"],
        "STOCK_CAL" => $_POST["STOCK"],
        "STOCKMIN_CAL" => $_POST["STOCKMIN"],
        "STOCKMAX_CAL" => $_POST["STOCKMAX"],
        "CC_CAL" => $_POST["CC"],
        "CV_CAL" => $_POST["CV"]
    ];
    
    # Preparando la consulta
    $sentencia = $conex->prepare("UPDATE CALZADO 
        SET MARCA_CAL=:MARCA_CAL, TALLA_CAL=:TALLA_CAL, COLOR_CAL=:COLOR_CAL, TIPO_CAL=:TIPO_CAL, 
        STOCK_CAL=:STOCK_CAL, STOCKMIN_CAL=:STOCKMIN_CAL, STOCKMAX_CAL=:STOCKMAX_CAL, CC_CAL=:CC_CAL, CV_CAL=:CV_CAL 
        WHERE ID_CAL=:ID_CAL;");
    $resultado = $sentencia->execute($calzado);
    
    http_response_code(200);
    echo "Datos actualizados";

} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: ".$exc->getMessage();
}
?>
