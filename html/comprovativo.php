<?php

    // CARREGAR O COMPOSER
    require_once "../assets/vendor/autoload.php";
    require_once "../assets/php/conn.php";
    

    // REFERÊNCIAR O NAMESPACE DOMPDF
    use  Dompdf\Dompdf;

    // INSTANCIA DA CLASS DOMPDF
    $dompdf = new Dompdf(['enable_remote' => true]);

    ob_start();
    require __DIR__ ."/edital.php";

    // USO DA CLASS DOMPDF
    $dompdf->loadHtml(ob_get_clean());

    // TIPO DE PAPEL
    $dompdf->setPaper("A4", "portrait");

    // RENDERIZAR HTML COMO PDF
    $dompdf->render();

    // SAIDA PARA GERAR O PDF NO NAVEGADOR

    //$dompdf->stream("comprovativo.pdf", ["Attachment" =>false]);
    $dompdf->stream("comprovativo.pdf", ["Attachment" =>true]);

?>