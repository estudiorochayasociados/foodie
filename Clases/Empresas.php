<?php

namespace Clases;

class Empresas
{

    //Atributos
    public $id;
    public $cod;
    public $titulo;
    public $costoEnvio;
    public $telefono;
    public $email;
    public $provincia;
    public $ciudad;
    public $barrio;
    public $direccion;
    public $postal;
    public $coordenadas;
    public $desarrollo;
    public $redes;
    public $logo;
    public $categoria;
    public $subcategoria;
    public $keywords;
    public $description;
    public $fecha;
    public $cod_usuario;
    private $con;


    //Metodos
    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    public function add()
    {
        $sql   = "INSERT INTO `empresas`(`cod`, `titulo`, `telefono`, `email`, `provincia`, `ciudad`, `barrio`, `direccion`, `postal`, `coordenadas`, `desarrollo`, `redes`, `logo`, `costoEnvio`, `categoria`, `subcategoria`, `keywords`, `description`, `fecha`, `cod_usuario`) VALUES ('{$this->cod}', '{$this->titulo}', '{$this->telefono}', '{$this->email}', '{$this->provincia}', '{$this->ciudad}', '{$this->barrio}', '{$this->direccion}', '{$this->postal}', '{$this->coordenadas}', '{$this->desarrollo}', '{$this->redes}','{$this->logo}','{$this->costoEnvio}', '{$this->categoria}', '{$this->subcategoria}', '{$this->keywords}', '{$this->description}', '{$this->fecha}', '{$this->cod_usuario}')";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function edit()
    {
        $sql = "UPDATE `empresas` SET
        `cod` = '{$this->cod}',
        `titulo` = '{$this->titulo}',
        `telefono` = '{$this->telefono}',
        `email` = '{$this->email}',
        `provincia` = '{$this->provincia}',
        `ciudad` = '{$this->ciudad}',
        `barrio` = '{$this->barrio}',
        `direccion` = '{$this->direccion}',
        `postal` = '{$this->postal}',
        `coordenadas` = '{$this->coordenadas}',
        `desarrollo` = '{$this->desarrollo}',
        `redes` = '{$this->redes}',
        `logo` = '{$this->logo}',
        `costoEnvio` = '{$this->costoEnvio}',
        `categoria` = '{$this->categoria}',
        `subcategoria` = '{$this->subcategoria}',
        `keywords` = '{$this->keywords}',
        `description` = '{$this->description}',
        `fecha` = '{$this->fecha}'
        WHERE `id`='{$this->id}'";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function delete()
    {
        $sql   = "DELETE FROM `empresas` WHERE `cod`  = '{$this->cod}'";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function view()
    {
        $sql   = "SELECT * FROM `empresas` WHERE id = '{$this->id}' ||  cod = '{$this->cod}' ||  cod_usuario = '{$this->cod_usuario}' ORDER BY id DESC";
        $notas = $this->con->sqlReturn($sql);
        $row   = mysqli_fetch_assoc($notas);
        return $row;
    }

    function list($filter,$order,$limit) {
        $array = array();
        if (is_array($filter)) {
            $filterSql = "WHERE ";
            $filterSql .= implode(" AND ", $filter);
        } else {
            $filterSql = '';
        }

        if ($order != '') {
            $orderSql = $order;
        } else {
            $orderSql = "id DESC";
        }

        if ($limit != '') {
            $limitSql = "LIMIT " . $limit;
        } else {
            $limitSql = '';
        }

        $sql = "SELECT * FROM `empresas` $filterSql  ORDER BY $orderSql $limitSql";
        $notas = $this->con->sqlReturn($sql);
        if ($notas) {
            while ($row = mysqli_fetch_assoc($notas)) {
                $array[] = $row;
            }
            return $array ;
        } 
    }

    function paginador($filter,$cantidad) {
        $array = array();
        if (is_array($filter)) {
            $filterSql = "WHERE ";
            $filterSql .= implode(" AND ", $filter);
        } else {
            $filterSql = '';
        }
        $sql = "SELECT * FROM `empresas` $filterSql";
        $contar = $this->con->sqlReturn($sql);
        $total = mysqli_num_rows($contar);
        $totalPaginas = $total / $cantidad;
        return floor($totalPaginas);       
    }

}