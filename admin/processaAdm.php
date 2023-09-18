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
            </div>'
        ;
        header("Location: http://localhost/clinicaaf/admin/login.php");
    }

    // IF EXIST cadAdm
    if(isset($_POST['cadAdm'])) {
        $nome       = $_POST['nome'];
        $email      = $_POST['email'];
        $tel        = $_POST['telefone'];
        $senha      = $_POST['senha'];
        $confSenha  = $_POST['Csenha'];
        $foto       = $_FILES['foto'];
        $nivel      = "admin";

        // CONFIG DA IMG
        $nome_foto = $foto['name'];
        $foto_permitida = ['jpg', 'png', 'jpeg'];
        $tmp_name = $_FILES['foto']['tmp_name'];

        // SEPARAR IMG DA EXTENSÃO PRA VALIDAR
        $extensao = explode('.', $nome_foto);
        $extensao = end($extensao);

        if($senha == $confSenha) {
            if(in_array($extensao, $foto_permitida)) {
                // ONDE VAI SER SALVO E RANDOMIZAÇÃO DO NOME DO ARQUIVO
                // GERAR CÓDIGO DE CONSULTA
                $codigo = "";
        
                // NOS MIN= 100000 E MÁX=999999 (SÃO OS TEMPOS DE RANDOMIZAÇÃO)
                $chars = "012345678901234567890123456789";
                $codigo .= substr(str_shuffle($chars),0,0);
                $codigo .= rand(100000, 999999);

                $nome_img_final = $codigo."_".$nome_foto;
                $folder = "upload/admin/" . $nome_img_final;// ANALISAR AQUI
    
                // FUNÇÃO PARA MOVER AS FOTOS PARA UM DIRECTÓRIO
                move_uploaded_file($tmp_name, $folder);

                // ENCRIPTAR SENHA
                $senha = md5($_POST['senha']);

                $sql = $conexao->prepare("INSERT INTO usuario(idUser, nivel, nome, email, telefone, senha, foto) VALUES(DEFAULT, '$nivel', '$nome', '$email', '$tel', '$senha', '$nome_img_final')");

                if ($sql->execute()) {
                    $_SESSION['user'] = '
                        <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div class="pl-2">
                                Administrador cadastrado com sucesso. 
                            </div>
                        </div>
                    ';
                    header("Location: http://localhost/clinicaaf/admin/cadastAdmin.php");

                }else {
                    $_SESSION['user'] = '
                        <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
                            <div class="pl-2">
                                Administrador não foi cadastrado com sucesso. 
                            </div>
                        </div>
                    ';
                    header("Location: http://localhost/clinicaaf/admin/cadastAdmin.php");
                }

            }

        }else {
            $_SESSION['user'] = '
                <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="pl-2">
                        Preencha correctamente todos os campos.
                    </div>
                </div>'
            ;
            header("Location: http://localhost/clinicaaf/admin/cadastAdmin.php");
        }

    }else {
        $_SESSION['user'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha todos os campos.
                </div>
            </div>'
        ;
        header("Location: http://localhost/clinicaaf/admin/cadastAdmin.php");
    }

?>