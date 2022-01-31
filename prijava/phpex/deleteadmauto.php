<?php 

    require_once("../../dbphp/conn.php");

    $id = $_GET["id"];
    echo $id;
    $upitautodelete = "DELETE  FROM `korisnik_auto` WHERE `id_kor_auto` = ?";

    $deleteauto = $conn->prepare($upitautodelete);
    $deleteauto->bind_param("s", $id);
    $deleteauto->execute();
    

    header("Location: ../prikaziauto.php");
    


?>