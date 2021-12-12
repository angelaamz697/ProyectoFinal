<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="upload/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="upload/logo.jpg">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Milky Way</title>
    <style>
        .jumbotron{
            background-image: url(https://i.pinimg.com/originals/af/98/d6/af98d66b320244a253f3a8c3cce57b37.jpg);
            background-size: cover;
        }
        body{
            background-image: url(https://i.pinimg.com/originals/94/17/82/941782f60e16a9d7f9b4cea4ae7025e0.png);
            background-size: cover;
        }

        .row h2{
            
            font-family: 'Yusei Magic', sans-serif;
           color: #FFFFFF;
           text-shadow: #0e0e0e 3px 5px 2px;
        }
        .row p{
            
            font-family: 'Yusei Magic', sans-serif;
           color: #FFFFFF;
           text-shadow: #0e0e0e 3px 5px 2px;
        }
    </style>

  

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/canvas.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
  </head>

  <body>
  <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-default navbar-fixed-top">
        
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



    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
            <h2>Nuestro Directorio!</h2>
            <p>Conoce los diferentes géneros de manga y adopta como propio tu estilo.</p>
            <p>En los distintos links te dejaremos los canales de nuestros creadores de contenido favoritos.</p>
          </div>
         

          <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="https://i.pinimg.com/originals/5e/ab/89/5eab8970af9c1ca03cde87f081f744c5.jpg" alt="Generic placeholder image" width="150" height="150">
          <h2>Shounen</h2>
          <p>Significa "niño" en traducción literal del japonés. Este tipo de anime está dirigido a un público masculino joven (principalmente adolescentes), entre 12 y 18 años. Es considerada la clasificación de anime y manga más popular.

           La historia del anime shounen generalmente se centra en el desarrollo y el viaje del héroe, que en muchos casos es un hombre (aunque existen excepciones).</p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="https://sm.ign.com/t/ign_latam/screenshot/default/card-captor-sakuranetflix_jemh.1280.jpg" alt="Generic placeholder image" width="150" height="150">
          <h2>Shoujo</h2>
          <p>Significa "niña" en su traducción más literal. El anime shoujo también está dirigido a jóvenes, pero principalmente a mujeres. La trama de la serie generalmente presenta a una niña como protagonista, siendo las historias más centradas en dramas, romances y otros eventos que marcan el desarrollo de la mujer..</p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="https://img.captain-droid.com/wp-content/uploads/2018/03/tokyoghoul-icon.png.webp" alt="Generic placeholder image" width="150" height="150">
          <h2>Seinen</h2>
          <p>Significa "adulto" u "hombre adulto". Como su nombre lo indica, estos animes están hechos para un público más maduro, generalmente entre 18 y 40 años. Los seinen están destinados a hombres y contienen temas complejos que no serían apropiados para las personas más jóvenes.

           El contenido erótico y las escenas violentas también forman parte de las producciones de seinen..</p>
          
        </div><!-- /.col-lg-4 -->
      </div>
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="https://images6.fanpop.com/image/photos/42000000/-Chihaya-Ayase-chihayafuru-42086298-300-400.jpg" alt="Generic placeholder image" width="150" height="150">
          <h2>Josei</h2>
          <p>Literalmente significa "mujer". Al igual que el seinen, este tipo de anime está hecho para un público adulto pero femenino. En resumen, Josei representa la maduración del shoujo, presentando problemas comunes de la vida cotidiana de las mujeres desde un punto de vista realista.</p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="https://64.media.tumblr.com/98be35ca00ece7571203cb6ac9925e58/1709f0167eec2368-c3/s400x600/876dfb78b543ae3c351c3f5786a2adda364c91cc.jpg" alt="Generic placeholder image" width="150" height="150">
          <h2>Kodomo</h2>
          <p>Literalmente significa "niños" (en este caso, niños pequeños). Estos son animes hechos con enfoque en audiencias infantiles, como su nombre indica, especialmente entre los 4 y 10 años.

            Las historias de kodomo a menudo transmiten lecciones importantes a las personas más jóvenes, como respetar a las personas mayores, por ejemplo. Las tramas son simples y fáciles de entender.</p>
          
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="https://i.pinimg.com/originals/94/72/bc/9472bcf0b68a96896e445130b7f217a5.jpg" alt="Generic placeholder image" width="150" height="150">
          <h2>Sponkon</h2>
          <p>El spokon es un género del manga y anime dedicado a los fanáticos del deporte. Spokon es una palabra compuesta formada por dos vocablos: sport, que significa deporte y kondo, cuyo significado es espíritu deportivo; valores como el trabajo en equipo, la amistad, el esfuerzo, la competencia…son los que quedan resaltados en este género.</p>
          
        </div><!-- /.col-lg-4 -->
      </div>
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="https://www.youtube.com/c/UmaruchanYT" class="list-group-item active">Umaru-chan</a>
            <a href="https://www.youtube.com/user/Lolweapon" class="list-group-item">Lolweapon</a>
            <a href="https://www.youtube.com/c/elbledavulvarde" class="list-group-item">Bleda y Vulvarde</a>
            <a href="https://www.youtube.com/c/iLuTV" class="list-group-item">iLuTV</a>
            <a href="https://www.youtube.com/c/WadeOtaku" class="list-group-item">Wade Otaku</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div><!--/.container-->


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>