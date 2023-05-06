<section class="d-flex flex-column flex-shrink-0 p-3 contenedor" style="width: 70%; background-color: white;">

<div class="row">
    <div class="col">
        <h1>Editar</h1>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardarCambios">
        <input type="hidden" value="<?php echo $producto->_id ?>" name="id">
        <div class="form-group">
            <label for="nombre">Nombre del producto</label>
            <input value="<?php echo $producto->nombre; ?>" required type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="cantidadDisponible">Cantidad disponible</label>
            <input value="<?php echo $producto->cantidadDisponible; ?>" required type="number" class="form-control" id="cantidadDisponible" name="cantidadDisponible" placeholder="Cantidad Disponible">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input value="<?php echo $producto->precio; ?>" required type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>


</section>
</main>
