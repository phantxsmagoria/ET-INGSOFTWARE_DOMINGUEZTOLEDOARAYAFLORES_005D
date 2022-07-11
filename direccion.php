<?php

$comuna = isset($_POST['txt_comuna']) ? $_POST['txt_comuna'] : '';
$direccion = isset($_POST['txt_direccion']) ? $_POST['txt_direccion'] : '';
$numerocalle = isset($_POST['txt_numerocalle']) ? $_POST['txt_numerocalle'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=prueba_db", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO direccion(comuna, direccion, numerocalle) VALUES(?, ?, ?)');
    $pdo->bindParam(1, $comuna);
    $pdo->bindParam(2, $direccion);
    $pdo->bindParam(3, $numerocalle);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}