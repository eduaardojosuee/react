<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

#verificar si vienen los parametros requeridos
if (empty($_POST["ID"])) {
    http_response_code(400);
    exit("Falta ID"); #Terminar el script definitivamente
}
if (empty($_POST["FECHAPED"])) {
    http_response_code(400);
    exit("falta FECHA DE PEDIDO"); #Terminar el script definitivamente
}
if (empty($_POST["IDCAL"])) {
    http_response_code(400);
    exit("falta ID DE CALZADO"); #Terminar el script definitivamente
}
if (empty($_POST["RFC"])) {
    http_response_code(400);
    exit("falta RFC"); #Terminar el script definitivamente
}
if (empty($_POST["CANT"])) {
    http_response_code(400);
    exit("falta CANTIDAD"); #Terminar el script definitivamente
}
if (empty($_POST["FECHASURT"])) {
    http_response_code(400);
    exit("falta FECHA DE SURTIDO"); #Terminar el script definitivamente
}
if (empty($_POST["COSTO"])) {
    http_response_code(400);
    exit("falta COSTO"); #Terminar el script definitivamente
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pedido = [
    "ID_PED" => $_POST["ID"],
    "FECHAPED_PED" => $_POST["FECHAPED"],
    "ID_CAL" => $_POST["IDCAL"],
    "RFC_PROV" => $_POST["RFC"],
    "CANT_PED" => $_POST["CANT"],
    "FECHASURT_PED" => $_POST["FECHASURT"],
    "COSTO_PED" => $_POST["COSTO"],
];

try {
    # preparando la consulta
    $sentencia = $conex->prepare("INSERT INTO PEDIDO (ID_PED, FECHAPED_PED, ID_CAL, RFC_PROV, CANT_PED, FECHASURT_PED, COSTO_PED) 
    VALUES (:ID_PED, :FECHAPED_PED, :ID_CAL, :RFC_PROV, :CANT_PED, :FECHASURT_PED, :COSTO_PED);");
    $resultado = $sentencia->execute($pedido);
    
    http_response_code(200);
    echo "Datos insertados";

} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: ".$exc->getMessage();
}

?>
