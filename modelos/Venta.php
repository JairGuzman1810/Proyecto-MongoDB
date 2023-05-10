<?php
class Venta
{
    private $cliente;
    private $direccion;
    private $fecha;
    private $carrito;
    private $total;

    public function __construct($cliente, $direccion, $fecha, $carrito, $total)
    {
        $this->cliente = $cliente;
        $this->direccion = $direccion;
        $this->fecha = $fecha;
        $this->carrito = $carrito;
        $this->total = $total;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getCarrito()
    {
        return $this->carrito;
    }

    public function setCarrito($carrito)
    {
        $this->carrito = $carrito;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

}
