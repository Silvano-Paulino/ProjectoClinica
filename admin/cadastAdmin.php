
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

  if(isset($_GET['del'])) {
    $id = $_GET['del'];

    $action = $conexao->prepare("DELETE FROM usuario WHERE idUser = '$id'");
    if($action->execute()) {
        $_SESSION['del'] = '
          <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div class="pl-2">
                  Deletado com sucesso. 
              </div>
          </div>
      ';
    }
  }

  if (isset($_POST['editAdm'])) {
    $id        = $_POST['idU'];
    $nome      = $_POST['nome'];
    $email     = $_POST['email'];
    $tel       = $_POST['telefone'];
    $senha     = $_POST['senha'];
    $confSenha = md5($_POST['Csenha']);

    if ($senha === $confSenha) {

      $sql = $conexao->prepare("UPDATE usuario SET nome='$nome', email='$email', telefone='$tel', senha='$confSenha' WHERE idUser='$id' ");
      
      if ($sql->execute()) {
        $_SESSION['user'] = '
          <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div class="pl-2">
                  Dados alterados com sucesso. 
              </div>
          </div>
        ';
        // ADICIONAR OS DADOS EM SESSÕES
        $_SESSION['name']      = $nome;
        $_SESSION['emails']    = $email;
        $_SESSION['tel']       = $tel;
        $_SESSION['pass']      = $confSenha;

      }
    }else {
      $_SESSION['user'] = '
        <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div class="pl-2">
                ERRO: Impossível alterar. As senhas devem ser iguais!
            </div>
        </div>'
      ;

    }
    
  }
?>

  <style> 
    .contentG {
        display: flex;
        flex-wrap: wrap-reverse;
    }

    .contentL {
        display: flex;
        width: 650px;
    }
    .contentL p {
        font-size: 14px;
        
    }

    .contentR {
      position: relative;
    }
    .contentR img {
        width: 100% !important;
        object-fit: contain;
        height: 100%;
    }
    .contentR div {
        border: solid #ddd 1px;
        height: 150px;
        width: 230px;
        margin-bottom: 2.5em;
        background-color: #fff;
        border-radius: 10px;
    }

    .contentR a {
      position: absolute;
      z-index: 14;
      right: -6px;
      top: -6px;
      border: none;
      border-radius: 4px;
      display: none;
      padding: 1px 4px;
    }

    .contentR :hover a {
      display: block;
    }

  </style>

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
            <h4><b>Perfil Administrador</b></h4>
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
              if(isset($_SESSION['user'])) {
                echo $_SESSION['user'];
                unset($_SESSION['user']);
              }
              
            ?>
          </span>
          <span>
            <?php
              if(isset($_SESSION['imgU'])) {
                echo $_SESSION['imgU'];
                unset($_SESSION['imgU']);
              }
              
            ?>
          </span>
          <div class="text-right " style="padding-right: 4.2em;"><a href="editLogado.php" class="text-success">Editar perfil</a></div>
          <div class="contentG py-5">
              <div class="contentL">
                  <div class="col-3">
                      <p>NOME: </p>
                      <p>E-MAIL: </p>
                      <p>TELEFONE: </p>
                      <p>SENHA: </p>
                  </div>
                  <div class="col-5">
                      <p><b><?php echo $_SESSION['name'] ?> </b></p>
                      <p><b><?php echo $_SESSION['emails'] ?></b></p>
                      <p><b><?php echo "+244 ".$_SESSION['tel'] ?></b></p>
                      <p><b><?php echo $_SESSION['pass'] ?></b></p>
                  </div>
              </div> 
              <div class="contentR">
                  <div>
                      <img class="p-2" src="upload/admin/<?php echo $_SESSION['photo'] ?>" alt="">

                      <a href="mAdmImg.php" class="btn-secondary"><i class="bi bi-pencil-square"></i></a>
                      
                  </div>
                  
              </div>
          </div>

          <form class="row bg-light mt-5" action="http://localhost/clinicaaf/admin/processaAdm.php" method="post" enctype="multipart/form-data">
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
              <p class="fs-4">Dados de cadastro</p>
              <div class="mb-3">
                <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Nome..">
              </div>
              <div class="mb-3">
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail..">
              </div>
              <div class="mb-3">
                <input type="text" name="telefone" class="form-control" id="telefone" maxlength="9" placeholder="Telefone..">
              </div>
              <div class="mb-3">
                <input type="password" name="senha" class="form-control" id="exampleFormControlInput1" placeholder="Senha..">
              </div>
              <div class="mb-3">
                <input type="password" name="Csenha" class="form-control" id="exampleFormControlInput1" placeholder="Confirmar senha..">
              </div>
              <button type="submit" name="cadAdm" class="btn btn-success">Cadastrar</button>
            </div>
          </form>
        </div>

            <!------------Tabela-------------------->
            <span>
              <?php
                if(isset($_SESSION['del'])) {
                  echo $_SESSION['del'];
                  unset($_SESSION['del']);
                }
                
              ?>
            </span>
            <span>
              <?php
                if(isset($_SESSION['altera'])) {
                  echo $_SESSION['altera'];
                  unset($_SESSION['altera']);
                }
                
              ?>
            </span>
            <table class="table mt-5">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Senha</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Acão</th>
                </tr>
              </thead>
                <?php 
                  $query = $conexao->prepare("SELECT * FROM usuario WHERE nivel='admin' ");
                  
                  if($query->execute()) {
                    foreach($query->fetchAll() as $result) {

                    
                ?>
              <tbody>
                 <tr>
                  <th scope="row"><?php echo $result['idUser'] ?></th>
                  <td><?php echo $result['nome'] ?></td>
                  <th><?php echo $result['email'] ?></th>
                  <th><?php echo "+244 ".$result['telefone'] ?></th>
                  <th><?php echo $result['senha'] ?></th>
                  <td ><div style="width: 60px;height: 60px;"><img src="upload/admin/<?php echo $result['foto'] ?>" class="w-100 h-100" /></div></td>
                  <th class="text-center">
                    <a href="cadastAdmin.php?del=<?php echo $result['idUser'] ?>"><i class="bi bi-x text-danger fs-3"></i></a>
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
