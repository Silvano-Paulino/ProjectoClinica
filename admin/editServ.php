
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

  if(isset($_GET['alterado'])) {
    $id = $_GET['alterado'];
    
    $query = $conexao->prepare("SELECT * FROM servico WHERE idServico='$id'");
    
    if($query->execute()) {
        $result = $query->fetch(PDO::FETCH_ASSOC);
    
?>

    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row container">
        <div class="row">
          <div class="col-md-12 mt-5">
            <h4><b>Editar Serviço</b></h4>
          </div>
        </div>
        <!---------------------->

          <div class="container">
            <div>
              <form class="row bg-light mt-5" action="http://localhost/clinicaaf/admin/servico.php" method="post" enctype="multipart/form-data">
                <div class="col p-5">
                  <p class="fs-4">Dados do Serviço</p>
                  <div class="mb-3">
                    <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" value="<?php echo $result['servico'] ?>" placeholder="Nome..">
                  </div>
                  <div class="mb-3">
                    <select name="estado" id="estado"  style="width: 99.5%; height: 40px; border: solid 1px #ddd;">
                        <option>Selecionar Status</option>
                        <option value="1">Disponível</option>
                        <option value="0">Indisponível</option>
                    </select>
                  </div>
                  <input type="hidden" name="id" value="<?php echo $result['idServico'] ?>" >
                  <div class="mb-3">
                    <input type="text" class="form-control"  name="descricao" id="descricao" value="<?php echo $result['descricao'] ?>">
                  </div>
                  <button type="submit" name="editServ" class="btn btn-success">Alterar</button>
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
