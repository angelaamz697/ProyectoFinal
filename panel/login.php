<?php


if($_SERVER['REQUEST_METHOD'] ==='POST'){

  $nombre_usuario = $_POST['nombre_usuario'];
  $clave = $_POST['clave'];
  $estado = $_POST['estado'];

  require "../vendor/autoload.php";
  $usuario = new angelamunoz\Usuario;
  $resultado = $usuario->login($nombre_usuario, $clave,$estado);

  if($resultado && $estado == 1){
     session_start();

     $_SESSION['usuario_info'] = array(
         'nombre_usuario'=>$resultado['nombre_usuario'],
     );

      header('Location: dashboard.php');

  }else{
    session_start();

    $_SESSION['usuario_info'] = array(
        'nombre_usuario'=>$resultado['nombre_usuario'],
    );
    header('Location: ../index_registrado.php');
    

  }
  
}
