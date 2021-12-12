<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="es">
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
    <link rel="stylesheet" href="assets/css/carousel.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <style>
      body{
        background: rgb(255,158,175);
background: radial-gradient(circle, rgba(255,158,175,1) 0%, rgba(142,136,228,0.5690651260504201) 100%);
      }
    </style>
  </head>

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
                <li><a class="navbar-brand" href="conocenos.php">Conócenos</a></li>
                
                
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




    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="upload/slide1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Bienvenid@ a Milky Way</h1>
              <p>Milky Way  es una tienda online totalmente independiente creada por un pequeño grupo de personas
                 que creemos profundamente en la historieta como arte, publicando títulos de calidad de autores dedicados
                  al arte narrativo con verdadera pasión. El objetivo es ofrecer variedad sin distinción de género ni 
                  estilo. Una editorial galáctica en su cometido,una única en su visión.</p>
              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="upload/slide2.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <p>Tienda de Cultura y Literatura japonesa en español. En nuestro directorio encontrarás información sobre el mundo del manga y las diferenctes categorías que existen. Conoce el MANGA en España con nosotros.</p>
              <p><a class="btn btn-lg btn-primary" href="directorio.php" role="button">Directorio</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="upload/slide3.png" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Quienes somos?</h1>
              <p>Conoce a la familia de Milky Way, y también conoce a nuestros amigos los youtubers e influencers que trabajan con nosotros pratocinando nuestra web y apoyando a la comunidad del Manga en España</p>
              <p><a class="btn btn-lg btn-primary" href="conocenos.php" role="button">Conócenos</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    <p class="lead text-center  mb-1 pt-2 pb-2" ><i class="glyphicon glyphicon-bookmark"></i> NUESTROS TÍTULOS</p>
    

    <div class="container" id="main">
        <div class="row">
            <?php
              require 'vendor/autoload.php'; //llamar al archivo autoload
              $manga = new angelamunoz\Manga;
              $info_peliculas = $manga->mostrar();
              $cantidad = count($info_peliculas);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_peliculas[$x];
            ?>
              <div class="col-md-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h6 class="text-center titulo-manga"><?php print $item['titulo'] ?></h6>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" class="img-responsive">
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div class="panel-footer">
                        <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Agregar al carrito
                        </a>
                    </div>
                  </div>
              
              
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>




        </div>
      

    </div> <!-- /container -->
    

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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
