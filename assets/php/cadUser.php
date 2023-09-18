<?php 
    require_once "./conn.php";
    session_start();


    if(isset($_POST['cadastrar'])){
        // VERIFICAÇÃO SE O CAMPOS ESTÃO VAZIOS
        if(!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['senha'])){
            // SEGUNDA VERIFICAÇÃO SE O CAMPOS ESTÃO VAZIOS

            if(isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['email'])) {
                $nome      = $_POST['nome'];
                $senha     = $_POST['senha'];
                $confSenha = $_POST['confSenha'];
                $email     = $_POST['email'];
                $telefone  = $_POST['telefone'];
                $foto      = "user.jpg";
                $nivel     = "cliente";
                
                if($senha === $confSenha) {
                    // CRIAR A HASH DA SENHA
                    $senhaP = md5($senha);

                    // SALVAR NO BANCO DE DADOS
                    $query = $conexao->prepare("INSERT INTO usuario(idUser, nivel, nome, email, telefone, senha, foto) VALUES(DEFAULT, '$nivel', '$nome', '$email', '$telefone', '$senhaP', '$foto')");
                    $funciona = $query->execute();
        
                    if($funciona) {
        
                        // ADICIONAR OS DADOS EM SESSÕES
                        $_SESSION['nome']      = $_POST['nome'];
                        $_SESSION['senha']     = $_POST['senha'];
                        $_SESSION['email']     = $_POST['email'];
                        $_SESSION['telefone']  = $_POST['telefone'];
                        $_SESSION['foto']      = "user.jpg";
                        $_SESSION['cliente']   = "cliente";
    
                        header("Location: http://localhost/clinicaaf/html/index.php");
                    }

                }else {
                    $_SESSION['msg'] = '
                        <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div class="pl-2">
                                As senhas não são as mesmas.
                            </div>
                        </div>';

                    header("Location: http://localhost/clinicaaf/html/cadastro.php");

                }
            }
    
        }else {
            $_SESSION['msg'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha todos os campos.
                </div>
            </div>';
            
            header('Location: http://localhost/clinicaaf/html/cadastro.php');
        }

    }else if(empty($_POST['nome']) && empty($_POST['telefone']) && empty($_POST['email']) && empty($_POST['senha'])) {
        $_SESSION['msg'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha todos os campos.
                </div>
            </div>';
            
            header('Location: http://localhost/clinicaaf/html/cadastro.php');
    }

?>