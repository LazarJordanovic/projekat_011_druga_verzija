<?php 

    require_once("../../dbphp/conn.php");

    $id = $_GET["id"];
    $upitrentdelete = "DELETE  FROM `rent_auto` WHERE `id_rent` = ?";

    $deleterent = $conn->prepare($upitrentdelete);
    $deleterent->bind_param("s", $id);
    $deleterent->execute();
    

    header("Location: ../prikazirent.php");
    


?>