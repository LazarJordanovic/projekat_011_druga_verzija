<?php 
require_once("../../delovi/header.php");
require_once("../../delovi/footer.php");
require_once("../../dbphp/conn.php");


    

    $id = $_GET["id"];
    // echo $id;
    $upitautoupdate = "SELECT * FROM `korisnik_auto` WHERE `id_kor_auto` = ?";

    $updateauto = $conn->prepare($upitautoupdate);
    $updateauto->bind_param("s", $id);
    $updateauto->execute();
    $rezultat =  $updateauto->get_result();
    
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmeni cenu automobila</title>
    <style>
      .updateauto{
          width: 60%;
          padding: 25px;
          margin: 100px auto;
      }
      .updateauto h3{
        text-align: center;
        margin-bottom: 50px;
      }

    </style>
</head>
<body>
<ul class="nav justify-content-end" style="background-color:rgba(150, 137, 137, 0.192)">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="./ubaci_auto.php">Ubaci auto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../prikaziauto.php">Prikazi sve automobile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../ubacirent.php">Ubaci novi auto za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../prikazirent.php">Prikazi sve automobile za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../pogledajkom.php">Pogledaj Komentare</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="../logout.php">Odjavi se</a>
  </li>
</ul>

<div class="updateauto">
      <h3>Izmena za automobile koji su na prodaju</h3>
        <form action="./update_auto_finaly.php" method="POST">
        <input type="hidden" name="id" value="<?php foreach($rezultat as $rez){ echo $rez["id_kor_auto"];}?>" >
        <label for="scena" class="form-label">Stara cena automobila</label>
        <input type="text" class="form-control" id="scena" name="stcena" value="<?php foreach($rezultat as $rez){ echo $rez["cena"];} ?>" required> <br>
        <input type="submit" value="Promeni cenu" class="btn btn-primary"> 
        </form>
       
</div>
    
</body>
</html>