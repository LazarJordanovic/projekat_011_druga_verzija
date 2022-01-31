<?php 

    require_once("../../dbphp/conn.php");

    $id = $_GET["id"];
    echo $id;
    $upitpordelete = "DELETE  FROM `kontakt` WHERE `id_kon` = ?";

    $deletepor = $conn->prepare($upitpordelete);
    $deletepor->bind_param("s", $id);
    $deletepor->execute();
    

    header("Location: ../pogledajkom.php");
    


?>