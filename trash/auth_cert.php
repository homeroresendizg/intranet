<?php

$config = include 'config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    // confirmación usuarios
    $users = [
        "username"      => $_POST['username'],
        "password"      => $_POST['password'],
    ];
    $user = $_POST['username'];
    $password = $_POST['password'];

    $userssql = "SELECT * FROM users WHERE username = '$user' AND password = '$password' AND tuser = 'admin'";

    $sentencia = $conexion->prepare($userssql);
    $sentencia->execute();

    //detecta si hay filas en esa consulta
    $usercolumn = $sentencia->rowCount();

    /* si detecta que hay un usuario registrado con esas las credenciales del form
    y con tipo de usuario = user entonces ejecuta lo siguiente*/

    if ($usercolumn == 1) {
        // control
    $certification = [
        "title"         => $_POST['title'],
        "description"   => $_POST['description'],
        "image"         => $_POST['image'],
        "document"      => $_POST['document'],
    ];
    $consultaSQL = "INSERT INTO certificate (title, description, image, document)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($certification)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($certification);

    header('Location: certificaciones.php');
    exit;
    } else {
        include('./error/usuario.php');
        
    }
    
} catch (PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
}
