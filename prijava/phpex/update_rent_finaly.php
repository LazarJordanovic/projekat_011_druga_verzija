<?php 

    require_once("../../dbphp/conn.php");

    $id= $_POST["id"];
    $cenaus = $_POST["stcenaus"];
    $cenavs = $_POST["stcenavs"];

    $upitupdaterent = "UPDATE `rent_auto` SET `cena_u_sezoni` = ? , `cena_van_sezone`= ? WHERE `id_rent`= ?";

    $updaterent = $conn->prepare($upitupdaterent);
    $updaterent->bind_param("ssi",$cenaus,$cenavs,$id);
    $updaterent->execute();

    header("Location: ../prikazirent.php");

?>