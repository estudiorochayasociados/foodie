<?php

namespace Clases;

class Pedidos
{

    //Atributos
    public $id;
    public $cod;
    public $producto;
    public $cantidad;
    public $precio;
    public $precioAdicional;
    public $costoEnvio;
    public $estado;
    public $tipo;
    public $usuario;
    public $detalle;
    public $fecha;
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
        $sql   = "INSERT INTO `pedidos`(`cod`, `producto`,`cantidad`,`precio`,`precioAdicional`,`costoEnvio`, `estado`, `tipo`, `usuario`, `detalle`, `fecha`) VALUES ('{$this->cod}', '{$this->producto}','{$this->cantidad}','{$this->precio}','{$this->precioAdicional}','{$this->costoEnvio}', '{$this->estado}', '{$this->tipo}', '{$this->usuario}', '{$this->detalle}', '{$this->fecha}')";
        $query = $this->con->sql($sql);
        echo $query;
        return $query;
    }

    public function edit()
    {
        $sql   = "UPDATE `pedidos` SET  `producto`='{$this->producto}',`cantidad`='{$this->cantidad}',`precio`='{$this->precio}',`precioAdicional`='{$this->precioAdicional}',`costoEnvio`='{$this->costoEnvio}',`estado`='{$this->estado}',`tipo`='{$this->tipo}',`usuario`='{$this->usuario}',`detalle`='{$this->detalle}',`fecha`='{$this->fecha}' WHERE `id`='{$this->id}'";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function cambiar_estado()
    {
        $sql   = "UPDATE `pedidos` SET `estado`='{$this->estado}',`tipo`='{$this->tipo}',`usuario`='{$this->usuario}' WHERE `cod`='{$this->cod}'";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function delete()
    {
        $sql   = "DELETE FROM `pedidos` WHERE `cod`  = '{$this->cod}'";
        $query = $this->con->sql($sql);
        return $query;
    }

    public function view()
    {
        $sql   = "SELECT * FROM `pedidos` WHERE cod = '{$this->cod}' ORDER BY id DESC";
        $notas = $this->con->sqlReturn($sql);
        $row   = mysqli_fetch_assoc($notas);
        return $row;
    }

    function list($filter) {
        $array = array();
        if (is_array($filter)) {
            $filterSql = "WHERE ";
            $filterSql .= implode(" AND ", $filter);
        } else {
            $filterSql = '';
        }

        $sql   = "SELECT * FROM `pedidos` $filterSql  ORDER BY id DESC";
        $notas = $this->con->sqlReturn($sql);

        if ($notas) {
            while ($row = mysqli_fetch_assoc($notas)) {
                $array[] = $row;
            }
            return $array;
        }
    }
}
