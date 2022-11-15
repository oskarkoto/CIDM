<!--Header-->
<nav class="navbar navbar-expand-lg" id = "idheader">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical  ml-auto" id="toggler" viewBox="0 0 16 16">
        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
      </svg>
    </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"> Bienvenido  | <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?c=detalleAllPrestamo">Préstamos</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="?c=detalleAllDevolucion">Devoluciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?c=crearReporte">Reportes</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administración
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="?c=detalleAllIngeniero">Administrar Técnicos</a>
          <a class="dropdown-item" href="?c=detalleAllDispositivo">Administrar Inventario</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/Header-->

