
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sidebars · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

<meta name="theme-color" content="#7952b3">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      main {
    display: flex;
    background-image: url('/ProyectoBdNoR/img/pescaderia.png');
    flex-wrap: nowrap;
    height: 100vh;
    height: -webkit-fill-available;
    max-height: 100vh;
    overflow-x: auto;
    overflow-y: hidden;
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .contenedor{
        margin: 2% 5% 2% !important;
        border-radius: 2%;
        font-family: Candara;
        font-size: 25px;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
  </head>
<main>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 15%;">
    <a href="?q=inicio" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Pescadería</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="?q=inicio" class="nav-link <?php echo isset($_GET["q"]) && $_GET["q"] === "inicio" ? "active": "text-white" ?>" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Inicio
        </a>
      </li>
      <li>
        <a href="?q=mostrador" class="nav-link <?php echo isset($_GET["q"]) && $_GET["q"] === "mostrador" ? "active": "text-white" ?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Mostrador
        </a>
      </li>
      <li>
        <a href="?q=tienda" class="nav-link <?php echo isset($_GET["q"]) && $_GET["q"] === "tienda" ? "active": "text-white" ?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Tienda en linea
        </a>
      </li>
      <li>
          <a href="?q=inventario" class="nav-link <?php echo isset($_GET["q"]) && ($_GET["q"] === "agregar" || $_GET["q"] === "editar" || $_GET["q"] === "inventario") ? "active": "text-white" ?>">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Inventario
        </a>
      </li>
      <li>
        <a href="?q=historial" class="nav-link <?php echo isset($_GET["q"]) && $_GET["q"] === "historial" ? "active": "text-white" ?>"">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Historial de ventas
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        
        <li><a class="dropdown-item" href="#">Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Salir</a></li>
      </ul>
    </div>
  </div>
  
  <section class="d-flex flex-column flex-shrink-0 p-3 contenedor" style="width: 70%; background-color: white;">
  <div class="row text-center"><h1 class="text-center">Venta en mostrador</h1></div>
  <div class="row" style="margin: 0 10% 0;">
    <div class="col-sm-6 d-flex flex-column flex-shrink-0" style=" padding: 0 10% 0;">
      <div class="mb-3">
      <label for="Cliente" class="form-label">Cliente</label>
      <input type="text" class="form-control" value="CLIENTE MOSTRADOR" id="Cliente" placeholder="Nombre del cliente" disabled>
    </div>
    <div class="mb-3">
      <label for="Direccion" class="form-label">Direccion</label>
      <input type="text" class="form-control" id="Direccion" placeholder="Direccion del cliente" disabled>
    </div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Carrito</label>
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
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad disponible</th>
      <th scope="col">Precio</th>
      <th scope="col"></th>
      <th scope="col"></th>
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
  var carrito = "";

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
  } else {
    Swal.fire({
      title: '¡Error!',
      text: 'No hay productos en el carrito',
      icon: 'error',
      confirmButtonText: 'Ok'
    });
  }
}

</script>