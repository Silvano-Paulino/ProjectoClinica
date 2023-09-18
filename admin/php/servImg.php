<?php 
    session_start();
    require_once "./conn.php"; 

    if (isset($_POST['altImg'])) {
        $id    = $_POST['id'];
        $foto  = $_FILES['foto'];

        // CONFIGURAÇÃO DA FOTO
        $nome_foto = $foto['name'];
        $foto_permitida = ['jpg', 'png', 'jpeg'];
        $tmp_name = $_FILES['foto']['tmp_name'];

        $extensao = explode('.', $nome_foto);
        $extensao = end($extensao);

        if(in_array($extensao, $foto_permitida)) {
            // ONDE VAI SER SALVO E RANDOMIZAÇÃO DO NOME DO ARQUIVO
            $codigo = "";
    
            // NOS MIN= 100000 E MÁX=999999 (SÃO OS TEMPOS DE RANDOMIZAÇÃO)
            $chars = "012345678901234567890123456789";
            $codigo .= substr(str_shuffle($chars),0,0);
            $codigo .= rand(100000, 999999);

            $nome_img_final = $codigo."_".$nome_foto;
            $folder = "../upload/doctors/" .$nome_img_final;

            // FUNÇÃO PARA MOVER AS FOTOS PARA UM DIRECTÓRIO
            move_uploaded_file($tmp_name, $folder);

            $request = $conexao->prepare("UPDATE servico SET img = '$nome_img_final' WHERE idServico = '$id' ");
            $conf = $request->execute();
    
            if($conf) {

                $_SESSION['imgS'] = '
                    <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div class="pl-2">
                            Alteração realizada com sucesso. 
                        </div>
                    </div>
                ';
                header("Location: http://localhost/clinicaaf/admin/servico.php");
    
            }   
            
        }else {
            $_SESSION['imgS'] = '
                <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="pl-2">
                        As extensões de imagens permitidas são: png, jpg e jpeg.
                    </div>
                </div>'
            ;
            header("Location: http://localhost/clinicaaf/admin/servico.php");
        }
        

    }else {
        $_SESSION['imgS'] = '
        <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div class="pl-2">
                Preencha correctamente o campo.
            </div>
        </div>'
      ;
      header("Location: http://localhost/clinicaaf/admin/servico.php");
      
    }

    
?>