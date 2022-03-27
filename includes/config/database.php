<?php 

function conectarDB():mysqli{
    $db = new mysqli('localhost','root','heart2022','taqueria');
    if(!$db){
        echo 'Error, No se pudo conectar';
        exit;
    }
    return $db;
}
?>