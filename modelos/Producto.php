<?php
class Producto
{
    private $nombre;
    private $cantidadDisponible;
    private $precio;

    public function __construct($nombre, $cantidadDisponible, $precio)
    {
        $this->nombre = $nombre;
        $this->cantidadDisponible = $cantidadDisponible;
        $this->precio = $precio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCantidadDisponible()
    {
        return $this->cantidadDisponible;
    }

    public function setCantidadDisponible($cantidadDisponible)
    {
        $this->cantidadDisponible = $cantidadDisponible;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }


}
