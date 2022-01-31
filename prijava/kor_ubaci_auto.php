<?php 
    require_once("../delovi/header.php");
    require_once("../delovi/footer.php");
    require_once("../dbphp/conn.php");

    if(isset($_POST["submit"])){
            
            $kor = $_POST["kor"];
            $ime = $_POST["ime"];
            $model = $_POST["model"];
            $kub = $_POST["kubikaza"];
            $god = $_POST["godiste"];
            $brv = $_POST["br_vrata"];
            $boja = $_POST["boja"];
            $kil = $_POST["kilometraza"];
            $carina= $_POST["carina"];
            $cena= $_POST["cena"];
            $dodin = $_POST["dodinfo"];
            $slika = $_FILES["uploaded"]["name"];
            $slika1 = $_FILES["uploaded1"]["name"];
            


            $insertauto = "INSERT INTO `korisnik_auto`( `ime_vozila`, `model_vozila`, `kubikaza`, `godisete`, `br_vrata`, `boja_vozila`, `kilometraza`, `carinjen`, `cena`, `dod_info`,`kor_admin`,`slika`,`slika1`) 
            VALUES ('$ime','$model','$kub','$god','$brv','$boja','$kil','$carina','$cena','$dodin','$kor','$slika','$slika1')"; 
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
        .ubaci_auto_kor{
            width: 70%;
            margin: 50px auto;
            border:  3px solid gray;
            padding: 20px;
        }
      nav{
          background-color: gray;
      }
      @media only screen and (max-width: 600px){
        .ubaci_auto_kor {
          width: 90%;
          margin: 50px 25px;
        }
      }
     
    </style>
</head>
<body>
<nav class="nav flex-column">
  <a class="nav-link active" aria-current="page" href="./logout.php" style="font-size: 30px;" class="btn btn-primary">Odjavi se</a>
  <!-- <a class="nav-link" href="#">Link</a>
  <a class="nav-link" href="#">Link</a>
  <a class="nav-link disabled">Disabled</a> -->
</nav>
    <h1 style="text-align: center;">Postavi oglas</h1>
    <div class="ubaci_auto_kor">
        <form action="./kor_ubaci_auto.php" method="POST" enctype="multipart/form-data">
        <div class=" mb-3">
        <input type="hidden" name="kor" value="korisnik">
        <label for="slikaupload">Ubaci Sliku1</label><br>
        <input type="file" class="form-control" name="uploaded" accept=".jpg,.jpeg,.png" ><br>
        <label for="slikaupload1">Ubaci Sliku2</label><br>
        <input type="file" class="form-control" name="uploaded1" accept=".jpg,.jpeg,.png" multiple><br>
        <label for="ime" class="form-label">Ime vozila</label>
        <input type="text" class="form-control" id="ime" name="ime" required><br>
        <label for="mod" class="form-label">Model vozila</label>
        <input type="text" class="form-control" id="mod" name="model" required> <br> 
        <label for="kub" class="form-label">Kubikaza vozila</label>
        <input type="text" class="form-control" id="kub" name="kubikaza" required> <br>
        <label for="god" class="form-label">Godiste vozila</label>
        <input type="text" class="form-control" id="god" name="godiste" required> <br>
        <label for="vrata" class="form-label">Broj vrata vozila</label>
        <input type="text" class="form-control" id="vrata" name="br_vrata" required> <br> 
        <label for="boja" class="form-label">Boja vozila</label>
        <input type="text" class="form-control" id="boja" name="boja" required> <br>
        <label for="kilo" class="form-label">Kilometraza vozila</label>
        <input type="text" class="form-control" id="kilo" name="kilometraza" required> <br> 
        <label for="car" class="form-label">Carinjen</label>
        <input type="text" class="form-control" id="car" name="carina" placeholder="DA/NE" required> <br>
        <label for="cena" class="form-label">Cena vozila</label>
        <input type="text" class="form-control" id="cena" name="cena" required> <br>
        <label for="info" class="form-label">Dodatne informacija</label>
        <input type="text" class="form-control" id="info" name="dodinfo" required> <br>
        <input type="submit" name="submit" value="Postavi oglas" class="btn btn-primary">      
        </div>
        </form>
    </div>
</body>
</html>