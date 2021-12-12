<?php

namespace angelamunoz;

class Manga{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ; //referencia a config.ini

        //PDO es una clase para conectarnos
        //estamos leyendo los datos de configuración hacia la base de datos que están en config.ini
        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' //Para no tener problemas con las ñ o tildes (array)
        ));
        
    }

    public function registrar($_params){
        //no necesito id porque se incrementa solo y estado ya tiene un valor por defecto.
        $sql = "INSERT INTO `manga`(`titulo`, `descripcion`, `foto`, `precio`, `categoria_id`, `fecha`) 
        VALUES (:titulo,:descripcion,:foto,:precio,:categoria_id,:fecha)";

        //variable que devuelve el resultado después de la consulta
        $resultado = $this->cn->prepare($sql);

        //los reemplazos
        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha'],
        );

        //si resultado es verdadero devuelve true sino falso
        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `manga` SET `titulo`=:titulo,`descripcion`=:descripcion,`foto`=:foto,`precio`=:precio,`categoria_id`=:categoria_id,`fecha`=:fecha  WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha'],
            ":id" =>  $_params['id']
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `manga` WHERE `id`=:id ";

        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar(){
        $sql = "SELECT manga.id, titulo, descripcion,foto,nombre,precio,fecha,estado FROM manga 
        
        INNER JOIN categorias 
        ON manga.categoria_id = categorias.id ORDER BY manga.id DESC
        ";
        //con inner consigo relacionar la tabla manga con la tabla categorias
        //para saber lo que tienen en común uso el ON
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();
        //fetchAll se encarga de traer todos los registros de la tabla en formato de filas y columnas
        return false;
    }

    public function mostrarPorId($id){
        
        $sql = "SELECT * FROM `manga` WHERE `id`=:id ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();
            //como solo nos interesa el id utilizamos fetch y no fetchAll

        return false;
    }





    
}



