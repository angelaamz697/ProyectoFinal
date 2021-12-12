<?php

namespace angelamunoz;

class Usuario{

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

    public function login($nombre,$clave,$estado){
        
        $sql = "SELECT nombre_usuario FROM `usuarios` WHERE nombre_usuario = :nombre AND clave = :clave AND estado = :estado ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":nombre" =>  $nombre,
            ":clave" =>   $clave,
            ":estado" =>  $estado,
        );

        if($resultado->execute($_array))
            return $resultado->fetch();
            //como solo nos interesa el id utilizamos fetch y no fetchAll

        return false;
    }

    


}

