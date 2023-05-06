
<section class="d-flex flex-column flex-shrink-0 p-3 contenedor" style="width: 85%; background-color: white;">
  <div class="row text-center"><h1 class="text-center">Tienda en linea</h1></div>
  <div class="row" style="margin: 0 10% 0;">
    <div class="col-sm-6 d-flex flex-column flex-shrink-0" style=" padding: 0 10% 0;">
      <div class="mb-3">
  <label for="Cliente" class="form-label">Cliente</label>
  <input type="text" class="form-control" id="Cliente" placeholder="Nombre del cliente" >
</div>
<div class="mb-3">
  <label for="Direccion" class="form-label">Direccion</label>
  <input type="text" class="form-control" id="Direccion" placeholder="Direccion del cliente">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label" style="display: inline-block; width: 50%;">Carrito</label>
  <label for="totalpagar" id="totalpagar" class="form-label" style="display: inline-block; width: 48%; text-align: left;">$ 0</label>
<div style="border: 1px solid black; height: 500px; padding: 2%;">
  
  <table class="table" id="table-carrito" style="font-size: 10px;">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</div>
</div>
    </div>
    <div class="col-sm-6" style=" padding: 0 1% 0; ">
      
      <div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Productos</label>
<div style="border: 1px solid black; height: 500px; padding: 2%;"> 
        <table id="table-productos" class="table" style="font-size: 12px;">
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
                  <td id="cantidad-disponible-<?php echo $producto->_id ?>"><?php echo $producto->cantidadDisponible ?></td>
                  <td>$ <?php echo $producto->precio ?></td>
                  <td>
                      <input type="number" id="cantidad-<?php echo $producto->_id ?>" value="0" class="form-control" min="0" step="1">
                  </td>
                  <td>
                      <a class="btn btn-success" onclick="addToCart(<?php echo htmlspecialchars(json_encode($producto)); ?>)">
                          <i class="fa fa-shopping-cart"></i>
                      </a>                    
                  </td>
                  <td id="productId-<?php echo $producto->_id; ?>" style="display: none"><?php echo $producto->_id; ?></td>
              </tr>
          <?php endforeach;?>
          </tbody>
        </table>
</div>
</div>
    </div>
  </div>
  <a class="btn btn-success" onclick="registrarVenta()">
    <i class="fa fa-shopping-cart"></i>
  </a>   
</section>

</main>


<script>

  function addToCart(producto) {
  // Do something with the "producto" object
  var productId = producto._id.$oid;
  var cantidadInput = document.getElementById('cantidad-' + productId);
  var cantidadSolicitada = cantidadInput.value;

  if (cantidadSolicitada == 0) {
    Swal.fire({
      title: 'Error',
      text: 'La cantidad no puede ser cero.',
      icon: 'error',
      confirmButtonText: 'Ok'
    });
    return; // Stop execution if cantidad is zero
  }

  if (cantidadSolicitada > parseInt(producto.cantidadDisponible)) {
    Swal.fire({
      title: 'Error',
      text: 'No hay stock suficiente.',
      icon: 'error',
      confirmButtonText: 'Ok'
    });
    return; // Stop execution if cantidad is zero
  }

  var table = $('#table-carrito');
  var tbody = table.find('tbody');

  // Check if product already exists in cart
  var existingRow = tbody.find('tr').filter(function() {
    return $(this).find('.cartProductId').text() === productId;
  });

  if (existingRow.length > 0) {
    // Update existing row with new quantity
    var existingQty = parseInt(existingRow.find('.productQty').text());
    var newQty = existingQty + parseInt(cantidadSolicitada);
    existingRow.find('.productQty').text(newQty);
    existingRow.find('.productPrice').text('$ '+ producto.precio);
  } else {
    // create a new row using jQuery
    var newRow = $('<tr>');

    // create the columns for the new row using jQuery
    var colName = $('<td>').addClass('productName').text(producto.nombre);
    var colQty = $('<td>').addClass('productQty').text(cantidadSolicitada);
    var colPrice = $('<td>').addClass('productPrice').text('$ ' + producto.precio);
    var colButton = $('<td>');
    var button = $('<button>').addClass('btn btn-danger');
    var icon = $('<i>').addClass('fa fa-trash');

    // add a click event listener to the button using jQuery
    button.click(function() {
  // Get the quantity of the product in the cart
      var qty = parseInt(colQty.text());

      // Subtract the quantity from the cantidadDisponible cell
      var cantidadDisponibleCell = $('#cantidad-disponible-' + productId);
      var cantidadDisponible = parseInt(cantidadDisponibleCell.text()) + qty;
      cantidadDisponibleCell.text(cantidadDisponible);

      // Remove the row from the cart
      newRow.remove();
    });

    // add the icon to the button using jQuery
    button.append(icon);

    // add the button to the fourth column using jQuery
    colButton.append(button);

    // add product ID to a hidden column for easier identification
    var colId = $('<td>').addClass('cartProductId').text(productId).hide();

    // add the columns to the new row using jQuery
    newRow.append(colName);
    newRow.append(colQty);
    newRow.append(colPrice);
    newRow.append(colButton);
    newRow.append(colId);

    // add the new row to the table using jQuery
    tbody.append(newRow);
  }

  // Update cantidadDisponible cell in product table
  var cantidadDisponibleCell = $('#cantidad-disponible-' + productId);
  var cantidadDisponible = parseInt(cantidadDisponibleCell.text()) - parseInt(cantidadSolicitada);
  cantidadDisponibleCell.text(cantidadDisponible);

  // Update total
  var carrito = getCarritoData();
  var total = 0;
  for (var i = 0; i < carrito.length; i++) {
    total += parseFloat(carrito[i].precio);
  }

  var cantidadDisponibleCell = $('#totalpagar');
  cantidadDisponibleCell.text("$ "+total);
}


function getProductosData() {
  var productos = [];
  $('#table-productos tbody tr').each(function() {
    var producto = {
      nombre: $(this).find('td:first-child').text(),
      cantidadDisponible: $(this).find('td:nth-child(2)').text(),
      precio: $(this).find('td:nth-child(3)').text().slice(2),
      cantidad: $(this).find('input[type="number"]').val(),
      _id: $(this).find('td:last-child').text()
    };
    productos.push(producto);
  });
  return productos;
}

function getCarritoData() {
  var table = $('#table-carrito');
  var rows = table.find('tbody tr');

  var data = [];
  rows.each(function(index, row) {
    var nombre = $(row).find('td:nth-child(1)').text();
    var cantidadSolicitada = $(row).find('td:nth-child(2)').text();
    var precio = $(row).find('td:nth-child(3)').text().slice(2);
    var idProducto = $(row).find('td:nth-child(5)').text();

    var item = {
      nombre: nombre,
      cantidadSolicitada: cantidadSolicitada,
      precio: precio,
      idProducto: idProducto
    };
    data.push(item);
  });
  return data;
}

function registrarVenta() {
  var productos = getProductosData();
  var carrito = getCarritoData();
  var cliente = document.querySelector('#Cliente').value;
  var direccion = document.querySelector('#Direccion').value;


  if(carrito.length > 0) {
    // create an object with both JSON objects as properties
    var data = {
      productos: productos,
      carrito: carrito,
      cliente: cliente,
      direccion: direccion
    };
    var baseUrl = window.location.origin + "/MongoDB/";

    // create the full URL for the endpoint
    var url = baseUrl + "?q=guardarCarrito";



    $.ajax({
      type: "POST",
      url: url,
      data: data, // convert the object to a JSON string
      success: function(response) {        
        if(response.replace(/"/g, '') === "ok") {
          Swal.fire({
          title: 'Venta registrada.',
          text: 'La venta ha sido registrada correctamente.',
          icon: 'success',
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
        }});

        } else {
          Swal.fire({
          title: '¡Error!',
          text: 'Hubo un error al registrar la información',
          icon: 'error',
          confirmButtonText: 'Ok'
        });
        }
        

        // handle the response
      }
    });
  }
}







</script>