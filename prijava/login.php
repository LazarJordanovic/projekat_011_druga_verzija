<?php
    session_start();
    require_once("../dbphp/conn.php");
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $sql = "SELECT `id_korisnika` FROM `korisnici` WHERE `email_korisnika`='$email' AND `lozinka_korisnika`='$password'";
    
    $query = mysqli_query($conn,$sql);
    $id =mysqli_fetch_assoc($query);
    var_dump($id);
    
    if($id){
    $_SESSION['id']=$id;
    if($email == "lazar.jordanovic@gmail.com" && $password == "Lj.2208991"){
    header('Location: ./prikaziauto.php');
    }else{
        header('Location: ./kor_ubaci_auto.php');
    }
    }else{
        header('Location: ./prijava.php');
    }

?>