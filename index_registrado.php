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
              
              <a class="navbar-brand" href="#">MILKY WAY</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="selected"><a href="index.php">Home</a></li>
                <li><a href="directorio.php">Directorio</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a class="navbar-brand" href="panel/index.php">Acceder</a></li>
              <li><a href="carrito.php" class="btn">CARRITO <span class="badge"><?php print cantidadMangas(); ?></span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                 aria-expanded="false"><?php print $_SESSION['usuario_info']['nombre_usuario'] ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="panel/cerrar_session.php">Salir</a></li>
                </ul>
                
            </li>
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
              <h1></h1>
              <p>Milky Way  es una tienda online totalmente independiente creada por un pequeño grupo de personas
                 que creemos profundamente en la historieta como arte, publicando títulos de calidad de autores dedicados
                  al arte narrativo con verdadera pasión. El objetivo es ofrecer variedad sin distinción de género ni 
                  estilo. Una editorial galáctica en su cometido, única en su visión.</p>
              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="upload/slide2.png" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <p>Tienda de Cultura y Literatura japonesa en español. Últimas novedades e información de tus títulos favoritos. Conoce el MANGA en España con nosotros.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Noticias</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="upload/slide3.png" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Slide3</h1>
              <p>olit.</p>
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
    
    <p class="lead text-center  mb-1 pt-2 pb-2" ><i class="fa fa-bookmark"></i> NUESTROS TÍTULOS</p>
    

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
