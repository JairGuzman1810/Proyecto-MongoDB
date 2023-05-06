<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/Contacto.php";
require_once __DIR__ . "/ContactosModel.php";
require_once __DIR__ . "/Producto.php";
require_once __DIR__ . "/ProductoModel.php";
require_once __DIR__ . "/Venta.php";
require_once __DIR__ . "/VentaModel.php";
$pagina = "inicio";
if (isset($_GET["q"])) {
    $pagina = $_GET["q"];
}
switch ($pagina) {
    case "creditos":
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/creditos.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "listar":
        $cursorProductos = ProductoModel::obtenerTodos();
        include_once __DIR__ . "/vistas/encabezado.php";
        include_once __DIR__ . "/vistas/listar.php";
        include_once __DIR__ . "/vistas/pie.php";
        break;
    case "guardar":
        $producto = new Producto($_POST["nombre"], $_POST["cantidadDisponible"],  $_POST["precio"]);
        $resultado = ProductoModel::insertar($producto);
        if ($resultado) {
            header("Location: ?q=inventario");
            exit;
        } else {
            echo "Error al insertar, intenta más tarde";
        }
        break;
    case "guardarCambios":
        $producto = new Producto($_POST["nombre"], $_POST["cantidadDisponible"],  $_POST["precio"]);
        $id = $_POST["id"];
        $resultado = ProductoModel::actualizar($id, $producto);
        if ($resultado) {
            header("Location: ?q=inventario");
            exit;
        } else {
            echo "Error al actualizar, intenta más tarde";
        }
        break;
    case "eliminar":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
        $id = $_GET["id"];
        $resultado = ProductoModel::eliminar($id);
        if ($resultado) {
            header("Location: ?q=inventario");
            exit;
        } else {
            echo "Error al eliminar, intenta más tarde";
        }
        break;
    case "inicio":
        include_once __DIR__ . "/vistas/navegador.php";
        include_once __DIR__ . "/vistas/inicio.php";
        break;
    case "mostrador":
        $cursorProductos = ProductoModel::obtenerTodos();
        include_once __DIR__ . "/vistas/navegador.php";
        include_once __DIR__ . "/vistas/mostrador.php";
        break;
    case "tienda":
        include_once __DIR__ . "/vistas/navegador.php";
        include_once __DIR__ . "/vistas/tienda.php";
        break;
    case "inventario":
        $cursorProductos = ProductoModel::obtenerTodos();
        include_once __DIR__ . "/vistas/navegador.php";
        include_once __DIR__ . "/vistas/inventario.php";
        break;
    case "agregar":
        include_once __DIR__ . "/vistas/navegador.php";
        include_once __DIR__ . "/vistas/agregar.php";
        break;
    case "editar":
        if (!isset($_GET["id"])) {
            exit("No hay id");
        }
    
        $producto = ProductoModel::obtenerPorId($_GET["id"]);
        include_once __DIR__ . "/vistas/navegador.php";
        include_once __DIR__ . "/vistas/editar.php";
        break;
    case "guardarCarrito":
        
        $productos = $_POST["productos"];
        $carrito = $_POST["carrito"];
        $cliente = $_POST["cliente"];
        $direccion = $_POST["direccion"];


        $resultado = ProductoModel::actualizarVarios($productos); 
        if (!$resultado) {
            return;
        }

        $total = 0;
        foreach ($carrito as $producto) {
            $total += $producto['cantidadSolicitada'] * $producto['precio'];
        }

        $venta = new Venta($cliente, $direccion, date("Y-m-d H:i:s"), $carrito, $total);

        $resultado = VentaModel::insertar($venta);

        if($resultado) {
            echo json_encode("bien");
        } else {
            echo json_encode("mal");
        }


        

        break;
}
