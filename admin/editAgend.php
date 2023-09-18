<?php 
  session_start();
  require_once "php/conn.php";

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

  if(isset($_GET['upd'])) {
    $id = $_GET['upd'];
    $_SESSION['upd'] = $_GET['upd'];

    $query = $conexao->prepare("SELECT * FROM consulta INNER JOIN servico ON consulta.servico_idServico = servico.idServico WHERE idConsulta='$id' ");
    $query->execute();
    $resp = $query->fetch(PDO::FETCH_ASSOC);
  
?>
 <?php require_once "php/head.php"; ?>
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
              <h4><b>Editar agendamento</b></h4>
            </div>
          </div>

          <form class="main-form mb-5" method="post"  action="./agendamento.php">

            <div class="row mt-4 ">
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                <label for="nome"></label>
                <input type="text" class="form-control" name="nome" value="<?php echo $resp['nome'] ?>" placeholder="Nome Completo.." required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <label for="email"></label>
                <input type="text" name="email" value="<?php echo $resp['email'] ?> "class="form-control" placeholder="E-mail.." required>
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <label for="date"></label>
                <input type="date" name="data" value="<?php echo $resp['data'] ?>" class="form-control">
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                <label for="departement"></label>
                <select name="departement" id="departement" value="<?php echo $resp['servico'] ?>" class="custom-select" required>
                  <option >Selecionar serviço..</option>
                  <?php 
                    $query = $conexao->prepare("SELECT * FROM servico WHERE status = 1");
                    $query->execute();

                    foreach($query->fetchAll() as $result) {

                    
                  ?>
                  <option value="<?php echo $result['idServico'] ?>"><?php echo $result['servico'] ?></option>
                  <?php }?>
                </select>
              </div>
              <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <label for="telefone"></label>
                <div style="display: flex;">
                  <p style="padding:  7px 1em; text-align: center; background-color: #ddd;">+244</p>
                  <input type="text" name="telefone" value="<?php echo $resp['telefone'] ?>" id="telefone" maxlength="9" class="form-control" placeholder="Telefone.." required>
                </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $resp['idConsulta'] ?>" >
            </div>

            <button type="submit" name="alterar" style="padding: 12px 2em;" class="btn btn-success mt-3 wow zoomIn">Alterar</button>
          </form>
          <?php } ?>
        </div>
      </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>
