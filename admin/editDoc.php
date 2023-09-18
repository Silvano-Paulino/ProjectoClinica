
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

  if ($_GET['alt']) {
    $id = $_GET['alt'];

    $query = $conexao->prepare("SELECT *FROM medico WHERE idMedico = '$id'");
    $query->execute();
    $result = $query->fetch();

?>


<!-- offcanvas -->
<main class="mt-5 pt-3">
    <div class="container-fluid">
    <div class="row container">
    <div class="row">
        <div class="col-md-12 mt-5">
        <h4><b>Cadastrar Doctor</b></h4>
        </div>
    </div>
    <!---------------------->

    <div class="container">
    <div >
        <form class="row bg-light mt-5" action="http://localhost/clinicaaf/admin/processa.php" method="post" enctype="multipart/form-data">
        <div class="col p-5">
            <p class="fs-4">Dados do Doctor</p>
            <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="<?php echo $result['nome'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Nome">
            </div>
            <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" name="cargo" value="<?php echo $result['area'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="Cargo">
            </div>
            <input type="hidden" name="id" value="<?php echo $result['idMedico'] ?>" >
            <button type="submit" name="alterar" class="btn btn-success">Alterar</button>
        </div>
        </form>
        <?php } ?>
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
