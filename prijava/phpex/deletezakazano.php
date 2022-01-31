<?php  
    require_once("../../dbphp/conn.php");

    $id = $_GET["id"];
    $upitdeletezakazano = "DELETE  FROM `zakazano` WHERE `id_zakazano` = ?";

    $deletezakazano = $conn->prepare($upitdeletezakazano);
    $deletezakazano->bind_param("s", $id);
    $deletezakazano->execute();
    

    header("Location: ../zakazano.php");
?>