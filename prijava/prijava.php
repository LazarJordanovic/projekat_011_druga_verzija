<?php 
// session_start();
require_once("../delovi/header.php");
require_once("../delovi/footer.php");
require_once("../dbphp/conn.php");

// if(isset($_POST["email"]) && isset($_POST["pass"])){
//     $email = $_POST["email"];
//     $pass = $_POST["pass"];

//     $upit = "SELECT `id_korisnika` FROM `korisnici` WHERE `email_korisnika`= ? AND `lozinka_korisnika`= ?";

//     $select_kor = $conn->prepare($upit);
//     $select_kor->bind_parem("ss",$email,$pass);
//     $select_kor->execute();
//     $rez = $select_kor->get_result();

//     foreach($rez as $el){
//         var_dump($el);
//     }
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijavi se</title>
    <style>
        body {
            background-image: url("../img/pozadina1.jpg");
            background-position: center;
            background-repeat: none;
            background-size: cover;
        }
        form a{
            text-decoration: none;
            color:blanchedalmond;
        }
        form button{
            margin-left: 25px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
<nav class="nav flex-column">
  <a class="nav-link active" aria-current="page" href="../index.php" style="font-size: 30px; color:white;"><< Pocetna</a>
  <!-- <a class="nav-link" href="#">Link</a>
  <a class="nav-link" href="#">Link</a>
  <a class="nav-link disabled">Disabled</a> -->
</nav>
    <div class="prijava">
        <form action="./login.php" method="post" class="needs-validation">
        <h3>Forma za prijavljinje</h3>
            <input type="email" name="email" placeholder="Email Korisnika" required><br><br>
            <div class="valid-feedback">
            Unesi email!
            </div>
            <input type="password" name="pass" placeholder="Lozinka Korisnika" required><br><br>
            <div class="valid-feedback">
            Unesi ispravanu lozinku!
            </div>
            <button class="btn btn-success"><a href="./napravi_nalog.php">Napravi nalog</a></button>
            <input type="submit" value="Prijavi se">
        </form>
    </div>
</body>
</html>
