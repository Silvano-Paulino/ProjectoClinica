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

    // IF EXIST cadDoc. CODE FOR CADASTRADOUTOR
    if (isset($_POST['cadDoc'])) {
        if(isset($_FILES['foto']) && isset($_POST['nome']) && isset($_POST['cargo'])) {
            $nome   = $_POST['nome'];
            $cargo  = $_POST['cargo'];
            $foto   = $_FILES['foto'];

            // CONFIGURAÇÃO DA FOTO
            $nome_foto = $foto['name'];
            $foto_permitida = ['jpg', 'png', 'jpeg'];
            $tmp_name = $_FILES['foto']['tmp_name'];

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
    
                $request = $conexao->prepare("INSERT INTO medico(idMedico, nome, area, img) VALUES(DEFAULT, '$nome', '$cargo', '$nome_img_final') ");
                $conf = $request->execute();
        
                if($conf) {

                    $_SESSION['msg'] = '
                        <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div class="pl-2">
                                Cadastro realizado com sucesso. 
                            </div>
                        </div>
                    ';
                    header("Location: http://localhost/clinicaaf/admin/cadastraDoutor.php");
        
                }   
                
            }else {
                $_SESSION['msg'] = '
                    <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div class="pl-2">
                            As extensões de imagens permitidas são: png, jpg e jpeg.
                        </div>
                    </div>'
                ;
                header("Location: http://localhost/clinicaaf/admin/cadastraDoutor.php");
            }
            

        }else {
            $_SESSION['msg'] = '
            <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="pl-2">
                    Preencha correctamente os campos.
                </div>
            </div>'
          ;
          header("Location: http://localhost/clinicaaf/admin/cadastraDoutor.php");
          
        }
    }

    // IF EXIST alterar
    if(isset($_POST['alterar'])) {
        $id   = $_POST['id'];
        $nome = $_POST['nome'];
        $area = $_POST['cargo'];

        $sql = $conexao->prepare("UPDATE medico SET nome='$nome', area='$area'  WHERE idMedico='$id'");
        if($sql->execute()) {
            $_SESSION['alterar'] = '
                <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div class="pl-2">
                        Alteração realizada com sucesso. 
                    </div>
                </div>
            ';
            header("Location: http://localhost/clinicaaf/admin/cadastraDoutor.php");

        }
        
        
    }

?>