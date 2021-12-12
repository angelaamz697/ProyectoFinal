<?php

require_once  "conectado.php";

$usuario = $_POST['user'];
$contraseña = $_POST['clave'];



$consulta = $pdo->prepare ("INSERT INTO `usuarios`(`nombre_usuario`, `clave`) 
VALUES (:user,:clave)");

$consulta->bindParam(':user',$usuario);
$consulta->bindParam(':clave',$contraseña);



if($consulta->execute()){
    echo "Datos guardados correctamente";
    header('Location: index.php');
}else{
    echo "No se ha registrado correctamente";
}



?>