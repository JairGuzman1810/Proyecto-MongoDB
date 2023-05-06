<?php
class ProductoModel
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
    public static function insertar($producto)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        # Acceder a la colección contactos
        $coleccion = $baseDeDatos->Productos;
        $resultado = $coleccion->insertOne([
            "nombre" => $producto->getNombre(),
            "cantidadDisponible" => $producto->getCantidadDisponible(),
            "precio" => $producto->getPrecio(),
                ]);
        return $resultado->getInsertedCount() === 1;
    }

    public static function obtenerPorId($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->Productos;
        return $coleccion->findOne(["_id" => new MongoDB\BSON\ObjectId($id)]);
    }

    public static function obtenerTodos()
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->Productos;
        return $coleccion->find(); // Sin criterio de búsqueda
    }

    public static function actualizar($id, $producto)
    {
        echo "id => $id";
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->Productos;
        $resultado = $coleccion->updateOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)],
            // Nuevos valores
            [
                '$set' => [
                    "nombre" => $producto->getNombre(),
                    "cantidadDisponible" => $producto->getCantidadDisponible(),
                    "precio" => $producto->getPrecio(),
                ],
            ]
        );
        # Recuerda que puedes ver a cuántos afectó con $resultado->getModifiedCount()
        return true;
    }

    public static function eliminar($id)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->Productos;
        $resultado = $coleccion->deleteOne(
            // El criterio, algo así como where
            ["_id" => new MongoDB\BSON\ObjectId($id)]
        );
        return $resultado->getDeletedCount() === 1;
    }


    public static function actualizarVarios($productos)
    {
        $baseDeDatos = self::obtenerBaseDeDatos();
        $coleccion = $baseDeDatos->Productos;

        foreach ($productos as $producto) {
            $resultado = $coleccion->updateOne(
                // El criterio, algo así como where
                ["_id" => new MongoDB\BSON\ObjectId($producto['_id'])],
                // Nuevos valores
                [
                    '$set' => [
                        "cantidadDisponible" => $producto['cantidadDisponible'],
                    ],
                ]
            );
            # Recuerda que puedes ver a cuántos afectó con $resultado->getModifiedCount()
        }
        return true;
    }
}
