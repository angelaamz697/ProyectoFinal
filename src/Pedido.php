<?php

namespace angelamunoz;

class Pedido{ //Clase Pedido

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }



    public function registrar($_params){ //función registrar un pedido
        $sql = "INSERT INTO `pedidos`(`cliente_id`, `total`, `fecha`) 
        VALUES (:cliente_id,:total,:fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":cliente_id" => $_params['cliente_id'],
            ":total" => $_params['total'],
            ":fecha" => $_params['fecha'],
            
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function registrarDetalle($_params){ //registrar el detalle del pedido
        $sql = "INSERT INTO `detalle_pedidos`(`pedido_id`, `manga_id`, `precio`, `cantidad`) 
        VALUES (:pedido_id,:manga_id,:precio,:cantidad)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":pedido_id" => $_params['pedido_id'],
            ":manga_id" => $_params['manga_id'],
            ":precio" => $_params['precio'],
            ":cantidad" => $_params['cantidad'],
        );

        if($resultado->execute($_array))
            return  true; //devolvemos verdadero cuando se haya realizado el registro

        return false;
    }
    
    //mostrar los pedidos relacionados a un cliente
    public function mostrar()
    {
        //consulta relacionada a la tabla pedidos y clientes
        //alias p para pedidos para no usar el nombre completo
        //alias c para clientes
        //ON igual lo que tienen las dos tablas ( cliente_id )
        //ORDER BY para el pedido de forma descendente
        $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.cliente_id = c.id ORDER BY p.id DESC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();//lista de todos los pedidos

        return false;

    }

    //Funcion para mostrar los últimos 10 pedidos
    //10 ultimos productos con el limit 10
    public function mostrarUltimos()
    {
        $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.cliente_id = c.id ORDER BY p.id DESC LIMIT 10";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    //Funcion mostrar por id del pedido
    public function mostrarPorId($id)
    {
        $sql = "SELECT p.id, nombre, apellidos, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.cliente_id = c.id WHERE p.id = :id"; //where 

        $resultado = $this->cn->prepare($sql);

        $_array = array( //parámetro array
            ':id'=>$id //le pasamos el id
        );

        if($resultado->execute($_array ))
            return  $resultado->fetch();//solo fecth() porque es solo un producto

        return false;
    }

    
     //Funcion mostrar detalle por el id del pedido
    public function mostrarDetallePorIdPedido($id)
    {
        //seleccionar todo el contendo de la tabla detalle pedidos y su alias es dp
        //INNER con la tabla manga
        //WHERE detallepedido.pedido_id igual a id
        $sql = "SELECT *
                FROM detalle_pedidos dp
                INNER JOIN manga ma ON ma.id= dp.manga_id
                WHERE dp.pedido_id = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute($_array))
            return  $resultado->fetchAll();

        return false;

    }



}