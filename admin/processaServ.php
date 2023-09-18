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
    if(isset($_POST['cadServ'])) {
        $nome       = $_POST['nome'];
        $descricao  = $_POST['descricao'];
        $foto       = $_FILES['foto'];
        $status     = $_POST['estado'];

        // CONFIG DA IMG
        $nome_foto = $foto['name'];
        $foto_permitida = ['jpg', 'png', 'jpeg'];
        $tmp_name = $_FILES['foto']['tmp_name'];

        // SEPARAR IMG DA EXTENSÃO PRA VALIDAR
        $extensao = explode('.', $nome_foto);
        $extensao = end($extensao);

        if(in_array($extensao, $foto_permitida)) {
            // ONDE VAI SER SALVO E RANDOMIZAÇÃO DO NOME DO ARQUIVO
            // GERAR CÓDIGO DE CONSULTA
            $codigo = "";
    
            // NOS MIN= 100000 E MÁX=999999 (SÃO OS TEMPOS DE RANDOMIZAÇÃO)
            $chars = "012345678901234567890123456789";
            $codigo .= substr(str_shuffle($chars),0,0);
            $codigo .= rand(100000, 999999);

            $nome_img_final = $codigo."_".$nome_foto;
            $folder = "upload/doctors/" . $nome_img_final;// ANALISAR AQUI

            // FUNÇÃO PARA MOVER AS FOTOS PARA UM DIRECTÓRIO
            move_uploaded_file($tmp_name, $folder);

            $sql = $conexao->prepare("INSERT INTO servico(idServico, servico, img, descricao, status) VALUES(DEFAULT, '$nome','$nome_img_final', '$descricao', '$status')");

            if ($sql->execute()) {
                $_SESSION['serv'] = '
                    <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div class="pl-2">
                            Serviço cadastrado com sucesso. 
                        </div>
                    </div>
                ';
                header("Location: http://localhost/clinicaaf/admin/servico.php");

            }else {
                $_SESSION['serv'] = '
                    <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
                        <div class="pl-2">
                            Serviço não foi cadastrado com sucesso. 
                        </div>
                    </div>
                ';
                header("Location: http://localhost/clinicaaf/admin/servico.php");
            }

        }

    }else {
        $_SESSION['serv'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha todos os campos.
                </div>
            </div>'
        ;
        header("Location: http://localhost/clinicaaf/admin/servico.php");
    }
?>