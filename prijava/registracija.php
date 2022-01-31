<?php 
require_once("../dbphp/conn.php");

// if(isset($_POST["ime"]) && isset($_POST["prez"]) && isset($_POST["email"]) && isset($_POST["passw"])){

    $ime = $_POST["ime"];
    $prezime =  $_POST["prez"];
    $email = $_POST["email"];
    $pass = $_POST["passw"];

    $uptikorisnik = "INSERT INTO `korisnici`(`ime_korisnika`, `prezime_korisnika`, `email_korisnika`, `lozinka_korisnika`) VALUES (?,?,?,?)";

    $insertkorisnik = $conn->prepare($uptikorisnik);
    $insertkorisnik->bind_param("ssss", $ime,$prezime,$email,$pass);
    $insertkorisnik->execute();

    header("Location: ./prijava.php");
// }

?>