<?php
session_start();
require 'funciones.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="/upload/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/carousel/">

    <title>Milky Way</title>

    <style>
      body{
        background: rgb(159,159,159);
background: linear-gradient(90deg, rgba(159,159,159,0.8855917366946778) 0%, rgba(123,115,180,0.8575805322128851) 47%, rgba(111,101,187,0.8407738095238095) 54%, rgba(70,150,66,0.8379726890756303) 94%);
      }
    </style>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/canvas.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
    
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

      <nav class="navbar navbar-default navbar-static-top">
        
        <div class="container">
          <div class="navbar-header">
          
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
            <a class="navbar-brand" href="index.php">MILKY WAY</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="index.php">Home</a></li>
              <li><a class="navbar-brand" href="directorio.php">Directorio</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a class="navbar-brand" href="panel/index.php">Acceder</a></li>
              <li><a class="navbar-brand" href="form_registro.php">Registrarme</a></li>
            <li><a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadMangas(); ?></span></a></li>
            </ul>
            
            
          </div>
        </div>
      </nav>


      </div>
    </div>



    <div class="container marketing">

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Nuestra tienda. <span class="text-muted">Visitanos.</span></h2>
          <p class="lead">
            <ul class="lead">
                <li>Dirección: Avenida Los Naranjos (Sevilla) 41001</li>
                <li>Teléfono: 93 303 68 20 / 
                    93 303 68 31</li>
                <li>Correo electrónico: milkyway@editorial.com</li>
            </ul></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="https://pbs.twimg.com/media/FGGrAoOWQAEypoM.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h4 class="featurette-heading">Departamento de distribución y comercial. <span class="text-muted">Contáctanos.</span></h4>
          <p class="lead">Milky Way controla directamente la distribución de nuestras publicaciones en diversas autonomías españolas, con dos almacenes que suman más de 2.500 m2.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="https://revistaronda.net/wp-content/uploads/2020/07/interior-01p-1024x768-1.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Departamento de compra y venta de derechos. <span class="text-muted">Contacto.</span></h2>
          <p class="lead">Se responsabiliza de la compra y venta de derechos, así como de la coordinación de las impresiones para nuestros clientes internacionales
          </p><br><p class="lead">Contacto: milkyway@editorial.com.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="https://lagataquelee.files.wordpress.com/2020/06/nostromo_comics_sevilla.jpg?w=1024" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

      </div>
      <!-- FOOTER -->
      <footer class="footer-bs">
        <div class="row">
        	<div class="col-md-3 footer-brand animated fadeInLeft">
            	<h2>Milky Way</h2>
                <p>Tu tienda de manga de confianza.</p>
                <p>© 2021 Sevilla, España, All rights reserved</p>
            </div>
        	<div class="col-md-4 footer-nav animated fadeInUp">
            	<h4>Menu —</h4>
            	<div class="col-md-6">
                    <ul class="pages">
                        <li><a href="#">MANGAS</a></li>
                        <li><a href="#">ANIME</a></li>
                        <li><a href="#">CREADORES DE CONTENIDO</a></li>
                        <li><a href="#">NUESTRO EQUIPO</a></li>
                    </ul>
                </div>
            	<div class="col-md-6">
                    <ul class="list">
                        <li><a href="conocenos.php">Conócenos</a></li>
                        <li><a href="#">Directorio</a></li>
                        <li><a href="index.php">Página principal</a></li>
                        
                    </ul>
                </div>
            </div>
        	<div class="col-md-2 footer-social animated fadeInDown">
            	<h4>Síguenos!!!</h4>
            	<ul>
                	<li><a href="#">Facebook</a></li>
                	<li><a href="#">Twitter</a></li>
                	<li><a href="#">Instagram</a></li>
                	<li><a href="#">RSS</a></li>
                </ul>
            </div>
        	<div class="col-md-3 footer-ns animated fadeInRight">
            	<h4>PROXIMAMENTE</h4>
                <p>Proximamente abriremos nuestro servicio de mensajería.</p>
                <p>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                      </span>
                    </div><!-- /input-group -->
                 </p>
            </div>
        </div>
    </footer>

 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>