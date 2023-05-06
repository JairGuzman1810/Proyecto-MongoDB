    <div style="width: 90%; background-color: white;">
        <div class="container-fluid">
            <h1 class="mt-3 mb-4">Historial de ventas</h1>
            <section class="d-flex flex-row flex-shrink-0 p-3 container">
                <div class="col-md-6" style="margin-right: 20px;">
                    <h2 class="mb-4">Tabla de ventas</h2>
                    <form id="form" method="post" action="?q=historial">
                    <div class="input-group mb-3">
                    <label for="fechaInicio" class="input-group-text">Fecha de inicio</label>
                        <input type="date" class="form-control" name="fechaInicio" id="fechaInicio" required
                        <?php if(isset($_POST["fechaInicio"])) { echo ' value="' . $_POST["fechaInicio"] . '"'; } ?>>
                        <label for="fechaFin" class="input-group-text">Fecha de fin</label>
                        <input type="date" class="form-control" name="fechaFin" id="fechaFin" required
                        <?php if(isset($_POST["fechaFin"])) { echo ' value="' . $_POST["fechaFin"] . '"'; } ?>>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                            <button class="btn btn-secondary" type="reset" onclick="limpiar()">Resetear</button>
                        </div>
                    </div>
                    </form>
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Nombre del cliente</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                                <th scope="col" style="display:none;">_id</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($cursorVentas as $producto): ?>
                            <tr>
                                <td><?php echo $producto['cliente']; ?></td>
                                <td><?php echo empty($producto['direccion']) ? 'N/A' : $producto['direccion']; ?></td>
                                <td><?php echo $producto['fecha']; ?></td>
                                <td>$ <?php echo $producto['total']; ?></td>
                                <td style="display:none;"><?php echo $producto['_id']; ?></td>
                                <td><a type="button" onclick="mostrarDetalleVenta(<?php echo htmlspecialchars(json_encode($producto['carrito'])); ?>)"><i class="btn btn-success fa fa-eye"></i></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h2 class="mb-4">Lista de productos comprados</h2>
                    <div id="detalleVenta"></div>
                </div>
            </section>
        </div>
    </div>
</main>

<script>
    function mostrarDetalleVenta(carrito) {
        var detalleVenta = document.getElementById('detalleVenta');
        detalleVenta.innerHTML = '';
        carrito.forEach(function(item) {
            var card = document.createElement('div');
            card.classList.add('card', 'mb-3');
            var cardBody = document.createElement('div');
            cardBody.classList.add('card-body');
            var cardTitle = document.createElement('h3');
            cardTitle.classList.add('card-title');
            cardTitle.innerText = item['nombre'];
            var cardText = document.createElement('p');
            cardText.classList.add('card-text');
            cardText.innerHTML = '<strong>Cantidad:</strong> ' + item['cantidadSolicitada'] + '<br>' +
                                  '<strong>Precio:</strong> $' + item['precio'];
            cardBody.appendChild(cardTitle);
            cardBody.appendChild(cardText);
            card.appendChild(cardBody);
            detalleVenta.appendChild(card);
        });
    }
</script>


<script>
    function limpiar() {
        const form = document.querySelector('form');
        form.reset();

        // Reload the page
        var baseUrl = window.location.origin + "/MongoDB/";

        // create the full URL for the endpoint
        var url = baseUrl + "?q=historial";
        window.location.replace(url);
    }
</script>
