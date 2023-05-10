<?php
class VentaModel
{
    private static function obtenerBaseDeDatos()
    {
        $host = "127.0.0.1";
        $puerto = "27017";
        //$usuario = rawurlencode("parzibyte");
        //$pass = rawurlencode("hunter2");
        $nombreBD = "Pescaderia";
        # Crea algo como mongodb://parzibyte:hunter2@127.0.0.1:27017/agenda
        //$cadenaConexion = sprintf("mongodb://%s:%s@%s:%s/%s", $usuario, $pass, $host, $puerto, $nombreBD);
        $cadenaConexion ='mongodb://localhost:27017';
        $cliente = new MongoDB\Client($cadenaConexion);
        return $cliente->selectDatabase($nombreBD);
    }

    /**
     * @param $contacto Contacto: un objeto de la clase Contacto
     * @return bool indicando si la inserción fue correcta
     */
    public static function insertar($venta)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        # Acceder a la colección contactos
        $coleccion = $baseDeDatos->Ventas;
        $resultado = $coleccion->insertOne([
            "cliente" => $venta->getCliente(),
            "direccion" => $venta->getDireccion(),
            "fecha" => $venta->getFecha(),
            "total" => $venta->getTotal(),
            "carrito" => $venta->getCarrito(),
                ]);
        return $resultado->getInsertedCount() === 1;
    }

    public static function obtenerTodos()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->Ventas;
        return $coleccion->find(); // Sin criterio de búsqueda
    }
}
