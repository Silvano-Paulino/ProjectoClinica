
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

  if (isset($_GET['servImg'])) {
    $id = $_GET['servImg'];
  }

?>

    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row container">
        <div class="row">
          <div class="col-md-12 mt-5">
            <h4><b>Editar imagem</b></h4>
          </div>
        </div>
        <!---------------------->

          <div class="container">
            <div >
            

          <form class="row bg-light mt-5" action="http://localhost/clinicaaf/admin/php/servImg.php" method="post" enctype="multipart/form-data">
            <div class="col p-5">
              <div id="prever">
                <div class="editar-content">
                    <span>
                        <i>Editar</i>
                    </span>
                </div>
                <div id="new">
                    <div class="close-preview-js close-preview" style="display: none;">x</div>
                </div>                    
              </div>
              <div style="padding: 1.2em 0 0 9px">
                <label for="arquivo" class="bg-success" style="padding: 8px 1em; font-size: 14px; color: #fff; border-radius: 6px; cursor: pointer;" id="mostrarFoto">Selecionar imagem</label>
                <input type="file" name="foto" id="arquivo" class="bnvn" onchange="loaderFile(event)">  
                <input type="hidden" name="id" value="<?php echo $id ?>">   
              </div>
              <div class="modal-footer my-4">
                <button type="button" class="btn btn-secondary" onClick="window.location.href='servico.php'">Cancelar</button>
                <button type="submit" name="altImg" class="btn btn-success">Salvar</button>
              </div>
            </div>
          </form>
        </div>

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
