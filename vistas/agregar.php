
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
  <div class="row text-center"><h1 class="text-center">Agregar producto</h1></div>

  <div class="row">
        <div class="col">
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