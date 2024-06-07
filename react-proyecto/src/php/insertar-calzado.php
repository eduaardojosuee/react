<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

#verificar si vienen los parametros requeridos
if (empty($_POST["ID"])) {
    http_response_code(400);
    exit("Falta ID"); #Terminar el script definitivamente
}

if (empty($_POST["MARCA"])) {
    http_response_code(400);
    exit("falta MARCA"); #Terminar el script definitivamente
}
if (empty($_POST["TALLA"])) {
    http_response_code(400);
    exit("falta TALLA"); #Terminar el script definitivamente
}
if (empty($_POST["COLOR"])) {
    http_response_code(400);
    exit("falta COLOR"); #Terminar el script definitivamente
}
if (empty($_POST["TIPO"])) {
    http_response_code(400);
    exit("falta TIPO"); #Terminar el script definitivamente
}
if (empty($_POST["STOCK"])) {
    http_response_code(400);
    exit("falta STOCK"); #Terminar el script definitivamente
}
if (empty($_POST["STOCKMIN"])) {
    http_response_code(400);
    exit("falta STOCKMIN"); #Terminar el script definitivamente
}
if (empty($_POST["STOCKMAX"])) {
    http_response_code(400);
    exit("falta STOCKMAX"); #Terminar el script definitivamente
}
if (empty($_POST["CC"])) {
    http_response_code(400);
    exit("falta CC"); #Terminar el script definitivamente
}
if (empty($_POST["CV"])) {
    http_response_code(400);
    exit("falta CV"); #Terminar el script definitivamente
}

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

try {
    # preparando la consulta
    $sentencia = $conex->prepare("INSERT INTO CALZADO (ID_CAL, MARCA_CAL, TALLA_CAL, COLOR_CAL, TIPO_CAL, STOCK_CAL, STOCKMIN_CAL, STOCKMAX_CAL, CC_CAL, CV_CAL) 
    VALUES (:ID_CAL, :MARCA_CAL, :TALLA_CAL, :COLOR_CAL, :TIPO_CAL, :STOCK_CAL, :STOCKMIN_CAL, :STOCKMAX_CAL, :CC_CAL, :CV_CAL);");
    $resultado = $sentencia->execute($calzado);
    
    http_response_code(200);
    echo "Datos insertados";

} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: ".$exc->getMessage();
}

?>
