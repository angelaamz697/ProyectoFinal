<?php

session_start(); //Activar la sesión.
require 'funciones.php'; //llamo a funciones.php

if(isset($_GET['id']) && is_numeric($_GET['id'])){ //si existe ese id y viene por GET y si es numerico
    $id = $_GET['id']; //recogemos id relacionado con cada manga atraves del metodo GET
    require 'vendor/autoload.php'; //llamar a vendor y dentro autoload
    $manga = new angelamunoz\Manga; //variable manga y llamamos a la clase Manga
    $resultado = $manga->mostrarPorId($id);// variable resultado que usara la variable manga y llamamos a la
    //funcion mostrarPorId()
    
    if(!$resultado)//sino existe un manga que vuelva al index
       header('Location: index.php');

       



    if(isset($_SESSION['carrito'])){  //si la sesion "carrito" existe /Crear sesión "carrito"
        if(array_key_exists($id,$_SESSION['carrito'])){ //si el producto existe y esta agregada en la sesion
            actualizarManga($id);//pasamos el id y actualizamos
        }else{
            
            agregarManga($resultado, $id);
        }

    }else{
        //sino existe
        agregarManga($resultado, $id);

    }  

}  

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="upload/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Milky Way</title>

    <!-- Latest compiled and minified CSS -->
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


    <div class="container" id="main">
            <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Manga</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php //si existe y no esta vacio
                        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                            $c=0; //valor inicial 0
                            foreach($_SESSION['carrito'] as $indice => $value){ //crear variable indice con valor value
                                $c++; //incrementa la variable c
                                $total = $value['precio'] * $value['cantidad'];//el precio x la cantidad y guardamos en total
                      ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post"> <!-- Manda la información actualizada hacia actualizar_carrito con post -->
                                <td><?php print $c ?></td><!-- el indice -->
                                <td><?php print $value['titulo']  ?></td> <!-- lee el titulo -->
                                <td>
                                    <?php //lee la foto
                                        $foto = 'upload/'.$value['foto'];
                                        if(file_exists($foto)){
                                        ?> <!-- ancho de 35 -->
                                        <img src="<?php print $foto; ?>" width="35"> 
                                    <?php }else{?><!-- la fot por defecto que muestra si no tiene foto -->
                                        <img src="assets/imagenes/not-found.jpg" width="35">
                                    <?php }?>
                                </td>
                                <td><?php print $value['precio']  ?> €</td><!-- lee el precio -->
                                <td>
                                <input type="hidden" name="id"  value="<?php print $value['id'] ?>">
                                    <input type="text" name="cantidad" class="form-control u-size-100" value="<?php 
                                    print $value['cantidad'] ?>"> <!-- el indice cantidad -->
                                </td>
                                <td>
                                    <?php print $total  ?> € <!-- el total -->
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs"><!-- boton para actualizar -->
                                        <span class="glyphicon glyphicon-refresh"></span> 
                                    </button>

                                    <a href="eliminar_carrito.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash"></span> <!-- eliminar por id un producto -->
                                    </a>


                                </td>
                            </form>
                        </tr>

                    <?php
                        }
                        }else{
                    ?>
                        <tr>
                            <td colspan="7">NO HAY PRODUCTOS EN EL CARRITO</td>

                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">Total</td>
                            <td><?php print calcularTotal(); ?> €</td>
                            <td></td>
                        </tr>

                </tfoot>
            </table>
            <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                    //si la sesion carrito existe y que no este vacio
            ?>  
            <div class="row">
                    <div class="pull-left"> <!-- botón para volver al index y seguir comprando -->
                        <a href="index.php" class="btn btn-info">Seguir Comprando</a>
                    </div>
                    <div class="pull-right"><!-- y botón para finalizar la compra y nos lleva a finalizar.php -->
                        <a href="finalizar.php" class="btn btn-success">Finalizar Compra</a>
                    </div>
            </div>

            <?php
                }
            ?>

    </div>
     <!-- /container -->
     <br>
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
