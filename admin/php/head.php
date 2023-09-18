<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="css/bootstrap.min.copy.css" />
    <link rel="stylesheet" href="css/bootstrap.copy.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/cd.css">

    <script src="http://localhost/clinicaaf/admin/js/jquery-3.6.3.min.js"></script>
    <script src="http://localhost/clinicaaf/admin/js/jquery.mask.min.js"></script>
    
    <title>Clínica Antero & Filhos - Admin</title>

    <style>
      .BT-1 {
        border-bottom: 0.4rem solid #28a745;
      }
    </style>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand" href="#"><span class="text-success">Clinica</span>-Antero & Filhos</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
              <input
                class="form-control"
                type="search"
                placeholder="Pesquisar..."
                aria-label="Search"
              />
              <button class="btn btn-success" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="width: 110px;"
              >
              <img src="upload/admin/<?php echo $_SESSION['photo'] ?>" class="w-25"   alt="...">
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  
                </li>
                <li>
                  <a class="dropdown-item" href="#"><i class="bi bi-envelope "></i> <?php echo $_SESSION['emails'] ?></a></li>
                <li>
                  <a class="dropdown-item" href="#"> <i class="bi bi-telephone"></i> <?php echo $_SESSION['tel'] ?></a>
                </li>
                <li>
                  <a class="dropdown-item" href="cadastAdmin.php"> <i class="bi bi-person-circle"></i> Perfil</a>
                </li>
                <li><hr class="dropdown-divider bg-black"/></li>
                <li>
                  <a class="dropdown-item" style="color: red;" href="http://localhost/clinicaaf/admin/php/logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a href="index.php" class="nav-link px-3 active mb-5 mt-3">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="cliente.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-people-fill"></i></span>
                <span>Clientes</span>
              </a>
            </li>
            <li>
              <a href="servico.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-cloud-fill"></i></span>
                <span>Serviços</span>
              </a>
            </li>
            <li>
              <a href="cadastraDoutor.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-people-fill"></i></span>
                <span>Doctores</span>
              </a>
            </li>
            <li>
              <a href="agendamento.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Agendamentos</span>
              </a>
            </li>
            <li>
              <a href="cadastAdmin.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-person-circle"></i></span>
                <span>Perfil</span>
              </a>
            </li>
            <li class="my-4 mt-5"><hr class="dropdown-divider bg-light"/></li>
            <li>
              <a href="http://localhost/clinicaaf/admin/php/logout.php"  style="color: red;" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-box-arrow-in-left"></i></span>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
