<?php

require '../vendor/autoload.php';

$manga = new angelamunoz\Manga;

//que se ejecute solo por el método post
if($_SERVER['REQUEST_METHOD'] ==='POST'){


    
    if ($_POST['accion']==='Registrar'){
        //si está vacio el título salta ese texto
        if(empty($_POST['titulo']))
            exit('Completar titulo');

        //si está vacio descripcion salta ese texto
        if(empty($_POST['descripcion']))
            exit('Completar titulo');

        //si está vacio el id
        if(empty($_POST['categoria_id']))
            exit('Seleccionar una Categoria');

        //si no es un número que ponga una categoría valida
        if(!is_numeric($_POST['categoria_id']))
            exit('Seleccionar una Categoria válida');

        
        //registrar esos parámetros y mandarlos a la clase manga, los ordeno en un array
        $_params = array(
            'titulo'=>$_POST['titulo'],
            'descripcion'=>$_POST['descripcion'],
            'foto'=> subirFoto(), //función subirFoto
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d')//año mes y día
        );
        
        $rpt = $manga->registrar($_params);


        if($rpt)//si todo esta bien que se muestre en la localizacion siguiente
            header('Location: mangas/index.php');
        else //sino pues que muestre el siguiente error
            print 'Error al registrar el manga';
        

    }
    //cuando la accion sea Actualizar
    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['titulo']))
        exit('Completar titulo');
    
    if(empty($_POST['descripcion']))
        exit('Completar titulo');

    if(empty($_POST['categoria_id']))
        exit('Seleccionar una Categoria');

    if(!is_numeric($_POST['categoria_id']))
        exit('Seleccionar una Categoria válida');

    
    $_params = array(
        'titulo'=>$_POST['titulo'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'categoria_id'=>$_POST['categoria_id'],
        'fecha'=> date('Y-m-d'),
        'id'=>$_POST['id'],
    );

    //sino está vacio foto_temp es que tiene algo guardado
    if(!empty($_POST['foto_temp'])) 
        $_params['foto'] = $_POST['foto_temp']; //que coja el valor de foto_temp
    
    if(!empty($_FILES['foto']['name']))//sino está vacio que coja la funcion subirFoto()
        $_params['foto'] = subirFoto();

    $rpt = $manga->actualizar($_params);
    if($rpt)
        header('Location: mangas/index.php');
    else
        print 'Error al actualizar el manga';

    }

}

//ahora con el metodo GET
if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id']; //recoger el id 

    $rpt = $manga->eliminar($id);
    
    if($rpt) //si va bien se queda en el index
        header('Location: mangas/index.php');
    else
        print 'Error al eliminar un manga';


}


function subirFoto() {

    $carpeta = __DIR__.'/../upload/'; //donde guardo

    $archivo = $carpeta.$_FILES['foto']['name']; //el nombre de la foto que se va a subir

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo); //variable de la foto y ruta donde se va a subir

    return $_FILES['foto']['name'];


}




