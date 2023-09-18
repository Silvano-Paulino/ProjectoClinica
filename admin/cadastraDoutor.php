
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

  if(isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $action = $conexao->prepare("DELETE FROM medico WHERE idMedico = '$id'");
    if($action->execute()) {
        $_SESSION['delete'] = '
          <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div class="pl-2">
                  Deletado com sucesso. 
              </div>
          </div>
      ';
    }
  }
?>

  <style>
      .altImg {
        position: relative;
      }

      .altImg a {
        position: absolute;
        top: 4px;
        right: 84px;
        border-radius: 18px;
        display: none;
        padding: 1px 4px;
      }
      .altImg a i {
        font-size: 14px;
      }
      
      .altImg :hover a {
        display: block;
      }
    </style>

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
          <span>
            <?php
              if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
              
            ?>
          </span>
              <form class="row bg-light mt-5" action="http://localhost/clinicaaf/admin/processa.php" method="post" enctype="multipart/form-data">
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
                  </div>
                </div>
                <div class="col p-5">
                  <p class="fs-4">Dados do Doctor</p>
                  <div class="mb-3">
                    <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Nome">
                  </div>
                  <div class="mb-3">
                    <input type="text" name="cargo" class="form-control" id="exampleFormControlInput1" placeholder="Cargo">
                  </div>
                  <button type="submit" name="cadDoc" class="btn btn-success">Cadastrar</button>
                </div>
              </form>
            </div>

            <!------------Tabela-------------------->
            <span>
              <?php
                if(isset($_SESSION['delete'])) {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
                }
                
              ?>
            </span>
            <span>
              <?php
                if(isset($_SESSION['alterar'])) {
                  echo $_SESSION['alterar'];
                  unset($_SESSION['alterar']);
                }
                
              ?>
            </span>
            <?php
              if(isset($_SESSION['imgD'])) {
                echo $_SESSION['imgD'];
                unset($_SESSION['imgD']);
              }
              
            ?>
          </span>
            <table class="table mt-5">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Cargo</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
                <?php 
                  $query = $conexao->prepare("SELECT * FROM medico");
                  
                  if($query->execute()) {
                    foreach($query->fetchAll() as $result) {
                      
                ?>
              <tbody>
                 <tr>
                  <th scope="row"><?php echo $result['idMedico'] ?></th>
                  <td><?php echo $result['nome'] ?></td>
                  <th><?php echo $result['area'] ?></th>
                  <td class="altImg">
                    <div style="width: 60px;height: 60px;">
                      <img src="upload/doctors/<?php echo $result['img'] ?>" class="w-100 h-100" />
                      <a href="mDocImg.php?docImg=<?php echo $result['idMedico'] ?>" class="btn-secondary" ><i class="bi bi-pencil-square"></i></a>
                    </div>
                  </td>
                  <th class="text-center">
                    <a href="cadastraDoutor.php?delete=<?php echo $result['idMedico'] ?>"><i class="bi bi-x text-danger fs-3"></i></a>
                    <a href="editDoc.php?alt=<?php echo $result['idMedico'] ?>"><i class="bi bi-pencil-square fs-5 text-primary"></i></a>
                  </th>
                  
                </tr>
              </tbody>
              <?php } } ?>
            </table>
            
             <!---fim da tabela---------------------->
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
