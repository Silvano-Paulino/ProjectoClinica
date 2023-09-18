<?php require_once "../assets/php/conn.php"; ?>
<?php  require_once "../assets/php/head.php"; ?>

  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Clínica</span>-Antero & Filhos</a>

        <form action="./edital2.php" method="POST">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <button type="submit" class="input-group-text" id="icon-addon1"><span class="mai-search"></span></button>
            </div>
            <input type="text" class="form-control pesquisa" name="codigo" placeholder="Código recibo..." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.php">Agendar Consulta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="blog.php">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contacto</a>
            </li>
            <?php 
              if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])) {
                // SE NÃO TIVER SESSÃO, VAI MOSTRAR O CONTEUDO DESTA VARIAVEL
                echo $login;

              }else {
                // SE TIVER SESSÃO, NÃO VAI MOSTRAR O CONTEUDO DESTA VARIAVEL
                empty($login);
              }
            ?>

            <?php if(isset($_SESSION['email']) && isset($_SESSION['senha'])) {  ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="background-color: #20c997;color:white; border-radius: 6px;" href="#" id="navbarDropdown" role="button"  data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['nome'] ?> </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li class="dropdown-item"><?php echo "+244 ".$_SESSION['telefone'] ?></li>
                  <li class="dropdown-item"><?php echo mb_strcut($_SESSION['email'],0, 18)."..." ?></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../assets/php/logout.php" style="color: red;">Terminar sessão</a></li>
                </ul>
              </li>
            <?php } ?>
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Serviços</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Nossos Serviços</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="row">
            <?php
              $query = $conexao->prepare("SELECT * FROM servico WHERE status = 1");
              $query->execute();

              foreach($query->fetchAll(PDO::FETCH_ASSOC) as $result) {
            ?>
            <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="http://localhost/clinicaaf/admin/upload/doctors/<?php echo $result['img'] ?>" height="100%" alt="">
                </div>
                <div class="body">
                  <p class="text-xl mb-0 text-center"><?php echo $result['servico'] ?></p>
                  <span class="text-sm text-grey text-center"><?php echo $result['descricao'] ?></span>
                </div>
              </div>
            </div>
            <?php }?>
    
          </div>

        </div>
      </div>
    </div> <!-- .container -->
  </div>

  <!-- .page-section -->

  <?php require_once "../assets/php/footer.php"; ?>