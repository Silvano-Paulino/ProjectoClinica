<?php 
    require_once "./conn.php";
    session_start();

    if(isset($_POST['logar'])) {
        // VERIFICA SE OS CAMPOS ESTÃOS VAZIOS
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
            // DECLARAÇÃO DE VARIAVEIS E ATRIBUIÇÃO DE VALORES
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);


            // SELECT NO BANCO DE DADOS
            $query = $conexao->prepare("SELECT * FROM usuario WHERE email='$email' AND senha='$senha' ");

            if($query->execute()) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
           
                if($email == $result['email'] && $senha == $result['senha'] && $result['nivel'] == 'cliente' ) {
                    // ADICIONAR OS DADOS EM SESSÕES
                    $_SESSION['nome']      = $result['nome'];
                    $_SESSION['senha']     = $result['senha'];
                    $_SESSION['email']     = $result['email'];
                    $_SESSION['telefone']  = $result['telefone'];
                    $_SESSION['foto']      = $result['foto'];
                    $_SESSION['cliente']   = $result['nivel'];

                    header("Location: http://localhost/clinicaaf/html/doctors.php");
                    
                }elseif($email == $result['email'] && $senha == $result['senha'] && $result['nivel'] == 'admin' ) { 
                    // ADICIONAR OS DADOS EM SESSÕES
                    $_SESSION['idU']       = $result['idUser'];
                    $_SESSION['name']      = $result['nome'];
                    $_SESSION['pass']      = $result['senha'];
                    $_SESSION['emails']    = $result['email'];
                    $_SESSION['tel']       = $result['telefone'];
                    $_SESSION['photo']     = $result['foto'];
                    $_SESSION['admin']     = $result['nivel'];

                    header("Location: http://localhost/clinicaaf/admin/index.php");

                }else {
                    $_SESSION['msg'] = '
                        <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="pl-2">
                                Usuário inexistente, faça o registro.
                            </div>
                        </div>';
            
                    header('Location: http://localhost/clinicaaf/html/login.php');
                }
            
            }else {
                $_SESSION['msg'] = '
                <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="pl-2">
                        Usuário inexistente, faça o registro.
                    </div>
                </div>';
        
                header('Location: http://localhost/clinicaaf/html/login.php');
            }


        }else {
            $_SESSION['msg'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha todos os campos.
                </div>
            </div>';
            
            header('Location: http://localhost/clinicaaf/html/login.php');
        }
    }

    // LOGAR O DASHBOARD
    if(isset($_POST['logando'])) {
        // VERIFICA SE OS CAMPOS ESTÃOS VAZIOS
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
            // DECLARAÇÃO DE VARIAVEIS E ATRIBUIÇÃO DE VALORES
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);


            // SELECT NO BANCO DE DADOS
            $query = $conexao->prepare("SELECT * FROM usuario WHERE email='$email' AND senha='$senha' ");

            if($query->execute()) {
                $result = $query->fetch(PDO::FETCH_ASSOC);
           
                if($email == $result['email'] && $senha == $result['senha'] && $result['nivel'] == 'admin') {
                    // ADICIONAR OS DADOS EM SESSÕES
                    $_SESSION['idU']       = $result['idUser'];
                    $_SESSION['name']      = $result['nome'];
                    $_SESSION['pass']      = $result['senha'];
                    $_SESSION['emails']    = $result['email'];
                    $_SESSION['tel']       = $result['telefone'];
                    $_SESSION['photo']     = $result['foto'];
                    $_SESSION['admin']     = $result['nivel'];

                    header("Location: http://localhost/clinicaaf/admin/index.php");
                    
                }elseif($email == $result['email'] && $senha == $result['senha'] && $result['nivel'] == 'cliente' ) { 
                    // ADICIONAR OS DADOS EM SESSÕES
                    $_SESSION['nome']      = $result['nome'];
                    $_SESSION['senha']     = $result['senha'];
                    $_SESSION['email']     = $result['email'];
                    $_SESSION['telefone']  = $result['telefone'];
                    $_SESSION['foto']      = $result['foto'];
                    $_SESSION['cliente']   = $result['nivel'];

                    header("Location: http://localhost/clinicaaf/html/index.php");
                    
                }else {
                    $_SESSION['logando'] = '
                        <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="pl-2">
                                Usuário inexistente, faça o registro.
                            </div>
                        </div>';
            
                    header('Location: http://localhost/clinicaaf/admin/login.php');
                }
            
            }else {
                $_SESSION['logando'] = '
                    <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div class="pl-2">
                            Usuário inexistente, faça o registro.
                        </div>
                    </div>';
        
                header('Location: http://localhost/clinicaaf/admin/login.php');
            }


        }else {
            $_SESSION['logando'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha todos os campos.
                </div>
            </div>';
            
            header('Location: http://localhost/clinicaaf/admin/login.php');
        }
    }
?>