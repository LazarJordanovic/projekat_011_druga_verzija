<?php 
require_once("../delovi/header.php");
require_once("../delovi/footer.php");
require_once("../dbphp/conn.php");
if(isset($_POST["submit"])){
            
            $kora = $_POST["adm"];
            $imea = $_POST["imea"];
            $modela = $_POST["modela"];
            $kuba = $_POST["kubikazaa"];
            $goda = $_POST["godistea"];
            $brva = $_POST["br_vrataa"];
            $bojaa = $_POST["bojaa"];
            $kila = $_POST["kilometrazaa"];
            $carinaa= $_POST["carinaa"];
            $cenaa= $_POST["cenaa"];
            $dodina = $_POST["dodinfoa"];
            $slika = $_FILES["uploaded"]["name"];
            $slika1 = $_FILES["uploaded1"]["name"];


            $insertauto = "INSERT INTO `korisnik_auto`( `ime_vozila`, `model_vozila`, `kubikaza`, `godisete`, `br_vrata`, `boja_vozila`, `kilometraza`, `carinjen`, `cena`, `dod_info`,`kor_admin`,`slika`,`slika1`) 
            VALUES ('$imea','$modela','$kuba','$goda','$brva','$bojaa','$kila','$carinaa','$cenaa','$dodina','$kora','$slika','$slika1')"; 

            if(mysqli_query($conn,$insertauto)){

                move_uploaded_file($_FILES["uploaded"]["tmp_name"],"../img/prodaja/$slika");
                move_uploaded_file($_FILES["uploaded1"]["tmp_name"],"../img/prodaja/$slika1");
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
    <title>Ubaci auto</title>
    <style>
      h1 {
        margin: 30px 0;
      }
      .ubaciauto{
        width: 70%;
        margin: 50px auto;
        border: 2px solid gray;
        padding: 20px;
      }
      @media only screen and (max-width: 600px){
        .ubaci_sliku {
          width: 90%;
          margin: 50px 25px;
        }
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
    <a class="nav-link" href="./ubacirent.php">Ubaci novi auto za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./prikazirent.php">Prikazi sve automobile za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./zakazano.php">Zakazani automobili za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./pogledajkom.php">Pogledaj Komentare</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./logout.php">Odjavi se</a>
  </li>
</ul>
<h1 style="text-align: center;">Postavi novi oglas</h1>
    <div class="ubaciauto">
      
    <form action="./ubaci_auto.php" method="POST" enctype="multipart/form-data">
        <div class=" mb-3">
        <input type="hidden" name="adm" value="admin">
        <label for="slikaupload">Ubaci Sliku1</label><br>
        <input type="file" class="form-control" name="uploaded" accept=".jpg,.jpeg,.png" multiple><br>
        <label for="slikaupload1">Ubaci Sliku2</label><br>
        <input type="file" class="form-control" name="uploaded1" accept=".jpg,.jpeg,.png" multiple><br>
        <label for="ime" class="form-label">Ime vozila</label>
        <input type="text" class="form-control" id="ime" name="imea" required><br>
        <label for="mod" class="form-label">Model vozila</label>
        <input type="text" class="form-control" id="mod" name="modela" required> <br>
        <label for="kub" class="form-label">Kubikaza vozila</label>
        <input type="text" class="form-control" id="kub" name="kubikazaa" required> <br>
        <label for="god" class="form-label">Godiste vozila</label>
        <input type="text" class="form-control" id="god" name="godistea" required> <br>

        <label for="vrata" class="form-label">Broj vrata vozila</label>
        <input type="text" class="form-control" id="vrata" name="br_vrataa" required> <br> 
        <label for="boja" class="form-label">Boja vozila</label>
        <input type="text" class="form-control" id="boja" name="bojaa" required> <br>
        <label for="kilo" class="form-label">Kilometraza vozila</label>
        <input type="text" class="form-control" id="kilo" name="kilometrazaa" required> <br> 
        <label for="car" class="form-label">Carinjen</label>
        <input type="text" class="form-control" id="car" name="carinaa" placeholder="DA/NE" required> <br>
        <label for="cena" class="form-label">Cena vozila</label>
        <input type="text" class="form-control" id="cena" name="cenaa" required> <br>
        <label for="info" class="form-label">Dodatne informacija</label>
        <input type="text" class="form-control" id="info" name="dodinfoa" required> <br>
        
        <input type="submit" name="submit" value="Postavi oglas" class="btn btn-primary">
        
        
              
        </div>
        </form>

    </div>
</body>
</html>