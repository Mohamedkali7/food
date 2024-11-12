<?php
$dsn='mysql:host=localhost;dbname=foodgood';
$username   ="root";
$password   ="";


try{

    $conn=new PDO($dsn,$username,$password);
   
}

catch(PDOException $e){
    echo 'failed'.$e->getmassage;
}