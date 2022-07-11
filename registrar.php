<?php

$rut = isset($_POST['txt_rut']) ? $_POST['txt_rut'] : '';
$dv = isset($_POST['txt_dv']) ? $_POST['txt_dv'] : '';
$primer_nombre = isset($_POST['txt_nombre']) ? $_POST['txt_nombre'] : '';
$segundo_nombre = isset($_POST['txt_nombre2']) ? $_POST['txt_nombre2'] : '';
$primer_apellido = isset($_POST['txt_apellido']) ? $_POST['txt_apellido'] : '';
$segundo_apellido = isset($_POST['txt_apellido2']) ? $_POST['txt_apellido2'] : '';


try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=prueba_db", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO pasajero(rut, dv, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido) VALUES(?, ?, ?, ?, ?, ?)');
    $pdo->bindParam(1, $rut);
    $pdo->bindParam(2, $dv);
    $pdo->bindParam(3, $primer_nombre);
    $pdo->bindParam(4, $segundo_nombre);
    $pdo->bindParam(5, $primer_apellido);
    $pdo->bindParam(6, $segundo_apellido);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}
