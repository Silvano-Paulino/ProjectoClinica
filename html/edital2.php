<?php 
  require_once "../assets/php/conn.php";
  require_once "../assets/vendor/autoload.php";
  session_start();

    if (isset($_SESSION['email']) && isset($_SESSION['senha'])) {
        if(isset($_POST['codigo'])){
            $codigo              = $_POST['codigo'];
            $_SESSION['codigo']  = $_POST['codigo'];
        }
    }else {
        $_SESSION['msg'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Para baixar comprovativo, inicia sessão.
                </div>
            </div>';
            
            header('Location: http://localhost/clinicaaf/html/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="copyright" content="MACode ID, https://macodeid.com/">

<title>Antero & Filhos - Clínica Médica</title>

<link rel="stylesheet" href="http://localhost/clinicaaf/assets/css/maicons.css">

<link rel="stylesheet" href="http://localhost/clinicaaf/assets/css/bootstrap.css">

<link rel="stylesheet" href="http://localhost/clinicaaf/assets/vendor/owl-carousel/css/owl.carousel.css">

<link rel="stylesheet" href="http://localhost/clinicaaf/assets/vendor/animate/animate.css">

<link rel="stylesheet" href="http://localhost/clinicaaf/assets/css/theme.css">

<link rel="stylesheet" href="http://localhost/clinicaaf/assets/css/comprovativo.css">
</head>
<body>
    <div class="container">
        <div class="contentTop mt-5">
            <div class="imagem mb-3">
                <img src="http://localhost/clinicaaf/assets/img/qe.png" width="100%">
            </div>
            <h1>MINISTERIO DA SAUDE</h1>
            <h1>CLINICA ANTERO & FILHOS</h1>
            
        </div>

        <br>
        <div class="comprova">
            <h5>COMPROVATIVO DE AGENDAMENTO DE CONSULTA</h5> 
        </div>

        <div class="tabela">
            <?php 
                if(isset($_SESSION['codigo']) && isset($_POST['codigo'])) {
                $query = $conexao->prepare("SELECT * FROM consulta INNER JOIN servico ON servico.idServico=consulta.servico_idServico WHERE codigo='$codigo' AND status = 1 ");
                
                if ($query->execute()) {
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                }
                
                }else {
                    header('Location: http://localhost/clinicaaf/html/login.php');
                }
            ?>
            <table width="100%" >
            
                <th>DADOS DE AGENDAMENTO</th>
                <th></th>
                <tr>
                    <td>
                        <b>Codigo de Agendamento:</b><br>
                        <span><?= $result["codigo"] ?></span>
                    </td>
                    <td></td>
                </tr>          
            
                <th>DADOS PESSOAIS</th>
                <th></th>
                <tr>
                    <td>
                        <b>Nome Completo:</b><br>
                        <span><?= $result["nome"] ?></span>
                    </td>
                    <td class="td">
                        <b>E-mail:</b><br>
                        <span><?= $result["email"] ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Telefone:</b><br>
                        <span><?= "+244 ".$result["telefone"] ?></span>
                    </td>
                    <td></td>
                </tr>
                
                <th>CONSULTA PRETENDIDA</th>
                <th></th>
                <tr>
                    <td>
                        <b>Tipo de consulta:</b><br>
                        <span><?= $result["servico"] ?></span>
                    </td>
                    <td class="td">
                        <b>Data de Consulta:</b><br>
                        <span><?= date("d-m-20y",strtotime($result["data"])) ?></span>
                    </td>
                </tr>
            
            </table>
        </div>
        <div class="mt-4 mb-5 text-center">
            <a href="comprovativo.php" class="btn btn-primary">Baixar comprovativo</a>
        </div>
    </div>

</body>
</html>


