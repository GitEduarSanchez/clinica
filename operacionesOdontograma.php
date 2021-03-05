<?php

$accion = $_GET["accion"];
$img = (isset($_POST["img_val"]))? $_POST["img_val"]: "";
$codigo = (isset($_POST["codigo"]))? $_POST["codigo"]: "";
//$aplicarTodo = (isset($_POST["todo"]))? "1": "0";


switch($accion):
    case "5":
        //save.php code
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        //Get the base-64 string from data
        //$filteredData=substr($img, strpos($img, ",")+1);

        //Decode the string
        $unencodedData = base64_decode($img);
        $nombre = $codigo.".png";
        
        //Save the image
        file_put_contents('fotos/'.$nombre, $unencodedData);
    break;

endswitch;


?>