<?php 
require_once("../delovi/header.php");
require_once("../delovi/footer.php");
require_once("../dbphp/conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubaci auto</title>
    <style>
      .ubaciauto {
        width: 95%;
        margin: 50px auto;
        border: 2px solid gray;
        padding: 20px;
      }
      .ubaciauto h3 {
        text-align: center;
        color:red;
      }
      .table {
        border: 2px solid black;
      }

    </style>
</head>
<body>
<ul class="nav justify-content-end" style="background-color:rgba(150, 137, 137, 0.192)">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="./ubaci_auto.php">Ubaci auto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="./prikaziauto.php">Prikazi sve automobile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./ubacirent.php">Ubaci novi auto za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./prikazirent.php">Prikazi sve automobile za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./zakazano.php">Zakazani automobila za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./pogledajkom.php">Pogledaj Komentare</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./logout.php">Odjavi se</a>
  </li>
</ul>
    <div class="ubaciauto">
      <h3>Prikaz svih vozila u bazi koji su na prodaju</h3>
      <?php 
      
        $upitslpr= "SELECT * FROM `korisnik_auto` WHERE `kor_admin` = ?";

        $admin = "admin";

        $prikaz_auto = $conn->prepare($upitslpr);
        $prikaz_auto->bind_param("s",$admin);
        $prikaz_auto->execute();

        $rezprikaz = $prikaz_auto->get_result();
        

        foreach($rezprikaz as $prikaz){
          echo "<table class=\"table\">";
            echo "<thead>";
              echo "<tr>";
                echo "<th scope=\"col\">Vozilo</th>";
                echo "<th scope=\"col\">Model</th>";
                echo "<th scope=\"col\">Godiste</th>";
                echo "<th scope=\"col\">Cena</th>";
              echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
              echo "<tr>";
                echo "<th scope=\"row\">".$prikaz["ime_vozila"]."</th>";
                echo "<td>".$prikaz["model_vozila"]."</td>";
                echo "<td>".$prikaz["godisete"]."</td>";
                echo "<td style=\"color: red; font-weight:bold;\">".$prikaz["cena"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td  style=\"text-align:center;\"><a href=\"./phpex/deleteadmauto.php?id=".$prikaz["id_kor_auto"]."\" class=\"btn btn-danger\">Obrisi</a></td>";
              echo "<td  style=\"text-align:center;\"><a href=\"./phpex/updateauto.php?id=".$prikaz["id_kor_auto"]."\" class=\"btn btn-primary\">Izmeni</a></td>";
              echo "</tr>";
            echo "</tbody>";
        echo "</table>";
        }
      
      ?>
    </div>
</body>
</html>