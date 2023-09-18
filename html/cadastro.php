<?php 
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
            <a class="nav-link" href="about.php">Sobre</a>
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
  <!-- CÓDIGO QUE PERMITE MOSTRAR AS IMAGENS SVG -->
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>

  <!--------Registro------------>
  <div class="container">
    <div class="mod-form">
      <form class="formCad" method="POST" action="../assets/php/cadUser.php">
        <div class="mb-3">
          <?php 
            if(!empty($_SESSION['msg'])) {
              
              $msg = $_SESSION['msg'];
          ?>

          <span>
            <?php echo $msg; 
              unset($_SESSION['msg']);
            }?>
          </span> 
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" name="nome" aria-describedby="nomelHelp">
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">E-mail</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Telefone</label>
          <div style="display: flex;">
            <p style="padding:  12px 1em; text-align: center; background-color: #ddd;">+244</p>
            <input type="text" name="telefone" id="telefone" maxlength="9" class="form-control" placeholder="Telefone.." required>
        </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Senha</label>
          <input type="password" class="form-control" name="senha" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword2" class="form-label">Confirmar Senha</label>
          <input type="password" class="form-control" name="confSenha" id="exampleInputPassword2">
        </div>
        <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
        <div class="my-3 paraC">
          <p>Já tens uma conta? <a href="login.php">Iniciar sessão</a></p>
        </div>
      </form>
    </div>
</div>

<?php require_once "../assets/php/footer.php"; ?>