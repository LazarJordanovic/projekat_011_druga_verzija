<?php 
require_once("../../delovi/header.php");
require_once("../../delovi/footer.php");
require_once("../../dbphp/conn.php");


    

    $id = $_GET["id"];
    // echo $id;
    $upitrentupdate = "SELECT * FROM `rent_auto` WHERE `id_rent` = ?";

    $updaterent = $conn->prepare($upitrentupdate);
    $updaterent->bind_param("s", $id);
    $updaterent->execute();
    $rezultatrent =  $updaterent->get_result();
    
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmeni cenu automobila</title>
    <style>
      .updaterent{
          width: 60%;
          padding: 25px;
          margin: 100px auto;
      }
      .updaterent h3{
          text-align: center;
          margin-bottom: 50px;
      }

    </style>
</head>
<body>
<ul class="nav justify-content-end" style="background-color:rgba(150, 137, 137, 0.192)">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="../ubaci_auto.php">Ubaci auto</a>
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

<div class="updaterent">
        <h3>Izmena za automobile koji se rentireju</h3>
        <form action="./update_rent_finaly.php" method="POST">
        <input type="hidden" name="id" value="<?php foreach($rezultatrent as $rez){ echo $rez["id_rent"];}?>" >
        <label for="scena" class="form-label">Cena u sezoni</label>
        <input type="text" class="form-control" id="scena" name="stcenaus" value="<?php foreach($rezultatrent as $rez){ echo $rez["cena_u_sezoni"];} ?>" required> <br>
        <label for="scena" class="form-label">Cena van sezone</label>
        <input type="text" class="form-control" id="scena" name="stcenavs" value="<?php foreach($rezultatrent as $rez){ echo $rez["cena_van_sezone"];} ?>" required> <br>
        <input type="submit" value="Promeni cenu" class="btn btn-primary"> 
        </form>
       
</div>
    
</body>
</html>