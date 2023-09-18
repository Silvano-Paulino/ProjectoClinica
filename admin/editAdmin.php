
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

  if(isset($_GET['altera'])) {
    $id = $_GET['altera'];
    
    $query = $conexao->prepare("SELECT * FROM usuario WHERE idUser='$id'");
    
    if($query->execute()) {
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
?>

    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./js/jquery.mask.min.js"></script>
    <script>
      $(document).ready(
        function () {
            $("#telefone").mask("999 999 999");
        }
      );
    </script>

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
              <form class="row bg-light mt-5" action="http://localhost/clinicaaf/admin/processaAdm.php" method="post" enctype="multipart/form-data">
                <div class="col p-5">
                  <p class="fs-4">Dados do Administrador</p>
                  <div class="mb-3">
                    <input type="text" name="nome" value="<?php echo $result['nome'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Nome..">
                  </div>
                  <div class="mb-3">
                    <input type="email" name="email" value="<?php echo $result['email'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="E-mail..">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="telefone" maxlength="9" class="form-control" id="telefone" value="<?php echo $result['telefone'] ?>" placeholder="Telefone..">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="senha" class="form-control" id="exampleFormControlInput1" value="<?php echo $result['senha'] ?>" placeholder="Senha..">
                  </div>
                  <div class="mb-3">
                    <input type="password" name="Csenha" class="form-control" id="exampleFormControlInput1" placeholder="Confirmar nova senha..">
                  </div>
                  <button type="submit" name="editAdm" class="btn btn-success">Alerar</button>
                </div>
              </form>
            </div>
            <?php } }?>
            </div>
          </div>
        </div>

      </div>
    </main>

    <script>
      var btnClose = document.querySelector('close-preview-js');
      var loaderFile = function (event) {
          var reader = new FileReader();
          reader.onload = function() {      
              var output = document.getElementById('new');
              output.style.display="block";
              output.style.backgroundImage="url("+reader.result+")"
          }
          reader.readAsDataURL(event.target.files[0]);
      }

      var editarAvatar = document.querySelector(".editar-content");
      var buttonFile = document.querySelector('.bnvn');
      editarAvatar.addEventListener('click', function (){
         buttonFile.click();
      })
  </script>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
