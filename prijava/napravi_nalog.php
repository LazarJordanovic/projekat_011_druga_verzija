<?php 
    require_once("../delovi/header.php");
    require_once("../delovi/footer.php");


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
        }
        form h3 {
            text-align: center;
            font-weight: bold;
            font-style: italic;
            color:white;
        }
        form a{
            margin-bottom: 30px;
            margin-left: 20px;
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
    <div class="napravi_nalog">
        <form action="./registracija.php" method="post">
        <h3>Napravi novi nalog</h3>
            <input type="text" name="ime" placeholder="Ime Korisnika"><br><br>
            <input type="text" name="prez" placeholder="Prezime Korisnika"><br><br>
            <input type="email" name ="email" placeholder="E-mail" ><br><br>
            <input type="password" name="passw" placeholder="Lozinka"><br><br>
            <a href="./prijava.php" class="btn btn-success">Imas nalog. Prijavi se.</a>
            <input type="submit" value="Napravi nalog">
        </form>
    </div>
</body>
</html>