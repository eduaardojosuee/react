<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include 'vars.php';

#verificar si vienen los parametros requeridos
if (empty($_POST["RFC"])) {
    http_response_code(400);
    exit("Falta RFC"); #Terminar el script definitivamente
}
if (empty($_POST["NOM"])) {
    http_response_code(400);
    exit("falta NOMBRE"); #Terminar el script definitivamente
}
if (empty($_POST["TELF"])) {
    http_response_code(400);
    exit("falta TELEFONO"); #Terminar el script definitivamente
}
if (empty($_POST["DIR"])) {
    http_response_code(400);
    exit("falta DIRECCION"); #Terminar el script definitivamente
}
if (empty($_POST["EMAIL"])) {
    http_response_code(400);
    exit("falta EMAIL"); #Terminar el script definitivamente
}

$conex = new PDO("sqlite:" . $nombre_fichero);
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$proveedor = [
    "RFC_PROV" => $_POST["RFC"],
    "NOMBRE_PROV" => $_POST["NOM"],
    "TEL_PROV" => $_POST["TELF"],
    "DIR_PROV" => $_POST["DIR"],
    "EMAIL_PROV" => $_POST["EMAIL"]
];

try {
    # preparando la consulta
    $sentencia = $conex->prepare("INSERT INTO PROVEEDORES (RFC_PROV, NOMBRE_PROV, TEL_PROV, DIR_PROV, EMAIL_PROV) 
    VALUES (:RFC_PROV, :NOMBRE_PROV, :TEL_PROV, :DIR_PROV, :EMAIL_PROV);");
    $resultado = $sentencia->execute($proveedor);
    
    http_response_code(200);
    echo "Datos insertados";

} catch(PDOException $exc) {
    http_response_code(400);
    echo "Lo siento, ocurrió un error: ".$exc->getMessage();
}

?>
