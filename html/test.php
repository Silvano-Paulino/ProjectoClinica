<?php 
    if (isset($_POST['testa'])) {
        $data = date("d/m/20y H:i", strtotime($_POST['data']));
        $dataS = strtotime(date("y-m-d"));
        var_dump($data). "<br>";
        var_dump($dataS). "<br>";

        echo  "<br>". date("d-m-20y H:i",strtotime($_POST['data'])). "<br>";
        echo strtotime(date("y-m-d")). "<br>"; 

        if (strtotime($_POST['data']) >= strtotime(date("y-m-d"))) {
            echo "Data válida";

        }else {
            echo "Data inválida";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>
    <form action="test.php" method="post">
        <div style="width: 200px; height: 40px;">
            <input type="datetime-local" name="data">
        </div>
        <button type="submit" name="testa">Testar</button>
    </form>
</body>
</html>