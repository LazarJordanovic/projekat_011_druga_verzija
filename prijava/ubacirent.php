<?php 
require_once("../delovi/header.php");
require_once("../delovi/footer.php");
require_once("../dbphp/conn.php");

    if(isset($_POST["submit"])){

      $ime = $_POST["rentime"];
      $model = $_POST["modelrent"];
      $gorivo = $_POST["rentgorivo"];
      $menjac = $_POST["rentmenjac"];
      $klima= $_POST["rentklima"];
      $sediste = $_POST["rentsediste"];
      $vrata = $_POST["rentbrvrata"];
      $god = $_POST["rentgod"];
      $prtljag = $_POST["rentprtljag"];
      $cus = $_POST["cena_u_sezoni"];
      $cvs = $_POST["cena_van_sezone"];
      $slika= $_FILES["uploaded"]["name"];
      $slika1 = $_FILES["uploaded1"]["name"];

      $insertrent = "INSERT INTO `rent_auto`( `ime_vozila`, `model_vozila`, `gorivo`, `vrsta_menjaca`, `klima`, `br_sedista`, `br_vrata`, `godiste`, `velicina_prtljaga`, `cena_u_sezoni`, `cena_van_sezone`,`slika`,`slika1`) 
      VALUES ('$ime','$model','$gorivo','$menjac','$klima','$sediste','$vrata','$god','$prtljag','$cus','$cvs','$slika','$slika1')";

            if(mysqli_query($conn,$insertrent)){

              move_uploaded_file($_FILES["uploaded"]["tmp_name"],"../img/rentiranje/$slika");
              move_uploaded_file($_FILES["uploaded1"]["tmp_name"],"../img/rentiranje/$slika1");
              echo "<script>alert('Izvrseno uspesno');</script>";
            }else{
              echo "<script>alert('Nije uspeslo upisivanje u bazu');</script>";
            }
      
      
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubaci auto za rentiranje</title>
    <style>
      .ubaciautorent{
        width: 70%;
        margin: 60px auto;
        border: 3px solid gray;
        padding: 20px;
      }
    </style>
</head>
<body>
<ul class="nav justify-content-end" style="background-color:rgba(150, 137, 137, 0.192)">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="./ubaci_auto.php">Ubaci auto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./prikaziauto.php">Prikazi sve automobile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="./ubacirent.php">Ubaci novi auto za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./prikazirent.php">Prikazi sve automobile za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./zakazano.php">Zakazani automobila za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./pogledajkom.php">Pogledaja Komentare</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./logout.php">Odjavi se</a>
  </li>
</ul>
<h1 style="text-align: center;">Ubaci auto za rentiranje</h1>
    <div class="ubaciautorent">
      
    <form action="./ubacirent.php" method="POST" enctype="multipart/form-data">
        <div class=" mb-3">
        <label for="slikaupload">Ubaci Sliku1</label><br>
        <input type="file" class="form-control" name="uploaded" accept=".jpg,.jpeg,.png" ><br> 
        <label for="slikaupload1">Ubaci Sliku2</label><br>
        <input type="file" class="form-control" name="uploaded1" accept=".jpg,.jpeg,.png" multiple><br> 
        <label for="rime" class="form-label">Ime vozila</label>
        <input type="text" class="form-control" id="rime" name="rentime" required><br>
        <label for="modrent" class="form-label">Model vozila</label>
        <input type="text" class="form-control" id="modrent" name="modelrent" requireed> <br> 
        <label for="gorivo" class="form-label">Gorivo</label>
        <input type="text" class="form-control" id="gorivo" name="rentgorivo" required> <br>
        <label for="menj" class="form-label">Vrsta menjaca</label>
        <input type="text" class="form-control" id="menj" name="rentmenjac" required> <br>
        <label for="klima" class="form-label">Klima</label>
        <input type="text" class="form-control" id="klima" name="rentklima" placeholder="DA/NE" required> <br> 
        <label for="sediste" class="form-label">Broj sedista</label>
        <input type="text" class="form-control" id="sediste" name="rentsediste" required> <br>
        <label for="brvrata" class="form-label">Broj Vrata</label>
        <input type="text" class="form-control" id="brvrata" name="rentbrvrata" required> <br> 
        <label for="rentgod" class="form-label">Godiste</label>
        <input type="text" class="form-control" id="rentgodiste" name="rentgod" required> <br>
        <label for="prtrljag" class="form-label">Velicina prtljaga</label>
        <input type="text" class="form-control" id="prtljag" name="rentprtljag" required> <br>
        <label for="cenausezoni" class="form-label">Cena u sezoni</label>
        <input type="text" class="form-control" id="cenausezoni" name="cena_u_sezoni" required> <br>
        <label for="cenavsezone" class="form-label">Cena van sezone</label>
        <input type="text" class="form-control" id="cenavsezone" name="cena_van_sezone" required> <br>
        <input type="submit" name="submit" value="Postavi auto za rentiranje" class="btn btn-primary">      
        </div>
        </form>

    </div>
</body>
</html>