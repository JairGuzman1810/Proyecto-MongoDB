
<section class="d-flex flex-column flex-shrink-0 p-3 contenedor" style="width: 70%; background-color: white;">

<div class="row">
    <div class="col">
        <h1>Inventario de productos</h1>
        <a href="?q=agregar" class="btn btn-success">Agregar</a>
        <br>
        <br>
    </div>

</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad disponible</th>
                    <th>Precio</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cursorProductos as $producto): ?>
                <tr>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo $producto->cantidadDisponible ?></td>
                    <td>$ <?php echo $producto->precio ?></td>
                    <td>
                        <a class="btn btn-warning" href="?q=editar&id=<?php echo $producto->_id ?>">Editar</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="?q=eliminar&id=<?php echo $producto->_id ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>


</section>
</main>