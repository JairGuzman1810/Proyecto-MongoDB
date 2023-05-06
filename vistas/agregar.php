<section class="d-flex flex-column flex-shrink-0 p-3 contenedor" style="width: 70%; background-color: white;">

<div class="row">
    <div class="col">
        <h1>Agregar producto</h1>
    </div>
</div>
<div class="row">
    <div class="col">
    <form method="POST" action="?q=guardar">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input required type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto">
        </div>
        <div class="form-group">
            <label for="cantidadDisponible">Cantidad disponible</label>
            <input required type="number" class="form-control" id="cantidadDisponible" name="cantidadDisponible" placeholder="Cantidad del producto">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input required type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>
</div>

</section>
</main>
