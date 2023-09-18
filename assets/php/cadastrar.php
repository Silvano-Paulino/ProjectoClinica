<?php 
    
    require_once "./conn.php";
    session_start();

    if(isset($_POST['marcar'])) {
        // SÓ VAI PODER FAZER A MARCAÇÃO SE TIVER SESSÃO INICIADA
        if(isset($_SESSION['email']) && isset($_SESSION['senha'])) {

            // VALIDANDO COM A DATA
            if (isset($_SESSION['email']) && isset($_SESSION['senha']) && strtotime($_POST['data']) >= strtotime(date("y-m-d"))) {
                $nome        = $_POST['nome'];
                $email       = $_POST['email'];
                $telefone    = $_POST['telefone'];
                $desc        = $_POST['descricao'];
                $data        = $_POST['data'];
                $departement = $_POST['departement'];
                $status = 1;

                // GERAR CÓDIGO DE CONSULTA
                $codigo = "";
        
                // VAI DE: A-Z
                // NOS MIN= 100000 E MÁX=999999 (SÃO OS TEMPOS DE RANDOMIZAÇÃO)
                $chars = "012345678901234567890123456789";
                $codigo .= substr(str_shuffle($chars),0,0);
                $codigo .= rand(100000, 999999);
        
                $sql = $conexao->prepare("INSERT INTO consulta(idConsulta, servico_idServico, data, nome, telefone, email, mensagem, codigo, estado) VALUES(DEFAULT, '$departement', '$data', '$nome', '$telefone', '$email', '$desc', '$codigo', '$status')");
                $result = $sql->execute();
        
                if($result) {
                    $_SESSION['codigo'] = $codigo;
                    
                    $_SESSION['msg'] = '
                        <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div class="pl-2">
                                A sua marcação foi feita com sucesso. <a href="http://localhost/clinicaaf/html/comprovativo.php">Baixar comprovativo</a>
                            </div>
                        </div>
                   ';
                   
                    header('Location: http://localhost/clinicaaf/html/doctors.php');
                }else {
                    $_SESSION['msg'] = '
                    <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div class="pl-2">
                            Erro: A sua marcação não foi feita com sucesso.
                        </div>
                    </div>';
                   
                    header('Location: http://localhost/clinicaaf/html/doctors.php');
                }
            }else {
                $_SESSION['msg'] = '
                    <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div class="pl-2">
                            Data de marcação inválida.
                        </div>
                    </div>'
                ;

                header('Location: http://localhost/clinicaaf/html/doctors.php');
            }


        }else {
            $_SESSION['msg'] = '
                <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="pl-2">
                        Para agendar uma consulta, inicia sessão .
                    </div>
                </div>'
            ;
            
           
            header('Location: http://localhost/clinicaaf/html/login.php');
        }


    }else if(empty($_POST['nome']) && empty($_POST['email'] && empty($_POST['telefone']) && empty($_POST['descricao']) && empty($_POST['data']) && empty($_POST['departement']))) {
        $_SESSION['msg'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha todos os campos.
                </div>
            </div>';
        
        header('Location: http://localhost/clinicaaf/html/doctors.php');
    }
?>