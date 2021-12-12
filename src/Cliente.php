<?php
//Creamos la clase Cliente
namespace angelamunoz;

class Cliente{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }


    //funcion registrar un cliente
    public function registrar($_params){
        $sql = "INSERT INTO `clientes`(`nombre`, `apellidos`, `email`, `telefono`, `comentario`) 
        VALUES (:nombre,:apellidos,:email,:telefono,:comentario)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":apellidos" => $_params['apellidos'],
            ":email" => $_params['email'],
            ":telefono" => $_params['telefono'],
            ":comentario" => $_params['comentario']
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId(); //cn la variable de conexion y con lastInsertId nos devuelve el ultimo
            // id que se ha insertado si es la primera vez, en la base de datos el codigo de cliente es 1 porque no hay nada
            // y si ya hay uno coge el siguiente valor disponible

        return false;
    }


}