  <?php 

    require_once "../assets/php/conn.php";
    require_once "../assets/php/head.php"; 
  
  ?>
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
              <a class="nav-link active" href="about.php">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.php">Agendar Consulta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Serviços</a>
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
            <li class="breadcrumb-item active" aria-current="page">Sobre</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Sobre Nós</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index"  style="display: none;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <span class="mai-chatbubbles-outline"></span>
              </div>
              <p><span>Bate-papo</span></p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <span class="mai-shield-checkmark"></span>
              </div>
              <p><span></span>Proteção</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <span class="mai-basket"></span>
              </div>
              <p><span></span> Farmácia</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Bem-vindo a clinica <br>Antero e Filhos</h1>
            <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
            <a href="about.php" class="btn btn-primary">Ler Mais</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/bg-doctor.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  <div class="page-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 wow fadeInUp">
          <h1 class="text-center mb-3">Bem-vindo ao Seu Centro de Saúde</h1>
          <div class="text-lg">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure explicabo aut consequuntur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt neque sit, explicabo vero nulla animi nemo quae cumque, eaque pariatur eum ut maxime! Tenetur aperiam maxime iure explicabo aut consequuntur.</p>
            <p>Expedita iusto sunt beatae esse id nihil voluptates magni, excepturi distinctio impedit illo, incidunt iure facilis atque, inventore reprehenderit quidem aliquid recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quod ad sequi atque accusamus deleniti placeat dignissimos illum nulla voluptatibus vel optio, molestiae dolore velit iste maxime, nobis odio molestias!</p>
          </div>
        </div>
        <div class="col-lg-10 mt-5">
          <h1 class="text-center mb-5 wow fadeInUp">Nossos Doctores</h1>
          <div class="row justify-content-center">
          <?php 
                $query = $conexao->prepare("SELECT * FROM medico");
                $query->execute();

                foreach($query->fetchAll() as $result) {

                
              ?>
            <div class="col-md-6 col-lg-4 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="http://localhost/clinicaaf/admin/upload/doctors/<?php echo $result['img'] ?>" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0"><?php echo $result['nome'] ?></p>
                  <span class="text-sm text-grey"><?php echo $result['area'] ?></span>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once "../assets/php/footer.php"; ?>