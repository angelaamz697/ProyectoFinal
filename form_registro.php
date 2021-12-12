<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="upload/logo.jpg">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Milky Way</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css">
  <style>
    body{
      background-image: url(https://wallpaperaccess.com/full/869910.gif);
      background-size: cover;
    }
  </style>
</head>

<body>


  <div class="container" id="main">
    <div class="main-login">
      <form action="registro.php" method="POST">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="text-center">FORMULARIO REGISTRO</h3>
            <h5 class="text-center">Los campos con (*) son requeridos</h5>
          </div>
          <div class="panel-body">
            <p class="text-center">
              <img src="assets/imagenes/icon.png" alt="">
            </p>
            <div class="form-group">
              <label>* Usuario</label>
              <input type="text" class="form-control" name="user" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <label>* Contraseña</label>
              <input type="text" class="form-control" name="clave" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label>* Repetir Contraseña</label>
              <input type="text" class="form-control" name="repeat" placeholder="Password" required>
               <br>
               <button type="submit" class="btn btn-primary btn-block" name="enviar">REGISTRARME</button>
              
            
            

           
          </div>
        </div>
      </form>
    </div>

  </div> <!-- /container -->
  <?php
   //
   if(isset($_POST['user'])&& isset($_POST['clave'])){
       require_once "conectado.php";
   }
  ?>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>