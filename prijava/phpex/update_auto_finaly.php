<?php 

    require_once("../../dbphp/conn.php");

    $id= $_POST["id"];
    $cena = $_POST["stcena"];

    $upitupdateauto = "UPDATE `korisnik_auto` SET `cena` = ? WHERE `id_kor_auto`= ?";

    $updateauto = $conn->prepare($upitupdateauto);
    $updateauto->bind_param("ss",$cena,$id);
    $updateauto->execute();

    header("Location: ../prikaziauto.php");

?>