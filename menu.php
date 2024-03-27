<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-success mb-5">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logo-rayitas.png" width="80" height="50" class="d-inline-block align-top" alt="Logo">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item active">
            <a class="nav-link text-light text-light" href="index.php">Rayitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="registro.php">Registrarse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="boleta.php">Boleta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contacto.php">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="admin/index-admin.php">Administración</a>
          </li>
        </ul>

        <form method="GET" action="index.php" class="d-flex w-50">
          <div class="input-group">
            <input class="form-control rounded-pill rounded-end" type="text" placeholder="Buscar rayitas" name="busqueda">
            <button class="btn btn-outline-warning input-group-text" name="enviar" value="buscar" type="submit"><i class="bi bi-search"></i></button>
          </div>
        </form>

      </div>
    </div>
  </nav>
</header>



<?php if ($_SESSION['user_id']) : ?>
  <a href="logout.php" class="nav-link text-light text-light">Salir</a>
<?php endif; ?>