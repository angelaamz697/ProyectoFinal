<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="../upload/logo.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Milky Way</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/estilos.css">
  <style>
    body{
      background-image: url(https://i.pinimg.com/originals/ab/26/01/ab26019d6a9def8082a9d5134a9e2d74.gif);
      background-size: cover;
    }
  </style>
</head>

<body>


  <div class="container" id="main">
    <div class="main-login">
      <form action="login.php" method="post">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="text-center">ACCESO</h3>
          </div>
          <div class="panel-body">
            <p class="text-center">
              <img src="../assets/imagenes/icon.png" alt="">
            </p>
            <div class="form-group">
              <label>Usuario</label>
              <input type="text" class="form-control" name="nombre_usuario" placeholder="Usuario" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="clave" placeholder="Password" required>
            </div>
            <div class="form-group">
              <select name="estado" class="form-control" required>
                <option value="1">Administrador</option>
                <option value="0" selected>Usuario cliente</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">LOGIN</button>



          </div>
        </div>
      </form>
    </div>

  </div> <!-- /container -->


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>