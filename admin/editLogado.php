
<?php 
  session_start();

  if(!isset($_SESSION['admin'])) {
    $_SESSION['logando'] = '
      <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div class="pl-2">
            Para realizar qualquer tarefa faça o login.
          </div>
      </div>';
    header("Location: http://localhost/clinicaaf/admin/login.php");
  }
  require_once "php/conn.php";
  require_once "php/head.php"; 

?>

    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row container">
        <div class="row">
          <div class="col-md-12 mt-5">
            <h4><b>Editar Administrador</b></h4>
          </div>
        </div>
        <!---------------------->

          <div class="container">
            <div>

              <form class="row bg-light mt-5" action="http://localhost/clinicaaf/admin/cadastAdmin.php" method="post" enctype="multipart/form-data">
                <div class="col p-5">
                  <p class="fs-4">Dados do Administrador</p>
                  <div class="mb-3">
                    <input type="text" name="nome" value="<?php echo $_SESSION['name'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Nome..">
                  </div>
                  <div class="mb-3">
                    <input type="email" name="email" value="<?php echo $_SESSION['emails'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="E-mail..">
                  </div>
                  <div class="mb-3">
                    <input type="tel" name="telefone" value="<?php echo $_SESSION['tel'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Telefone..">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="senha" value="<?php echo $_SESSION['pass'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Senha..">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="Csenha" class="form-control" id="exampleFormControlInput1" placeholder="Confirmar senha..">
                  </div>
                  <input type="hidden" name="idU" value="<?php echo $_SESSION['idU'] ?>">
                  <button type="submit" name="editAdm" class="btn btn-success">Alterar</button>
                </div>
              </form>
            </div>

            
            </div>
          </div>
        </div>

        

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
