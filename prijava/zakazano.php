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
    <title>Pogledaj komentare</title>
    <style>
      .zak {
        width: 95%;
        margin: 50px auto;
        border: 2px solid gray;
        padding: 20px;
      }
      .zak h1 {
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
    <a class="nav-link active" href="./pogledajkom.php">Pogledaja Komentare</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./logout.php">Odjavi se</a>
  </li>
</ul>
<div class="zak">
    <h1>Zakazani automobili za rentiranje</h1>
    <?php 
    
      $upit = "SELECT * FROM `zakazano`";

      $selectzakazano = $conn->prepare($upit);

      $selectzakazano->execute();

      $rezzakazan = $selectzakazano->get_result();

      foreach($rezzakazan as $zakazano){
        echo "<table class=\"table\">";
        echo "<thead>";
          echo "<tr>";
            echo "<th scope=\"col\">Ime i prezime</th>";
            echo "<th scope=\"col\">Email</th>";
            echo "<th scope=\"col\">Br. Tel</th>";
            echo "<th scope=\"col\">Datum preuzimanja</th>";
            echo "<th scope=\"col\">Datum vracanja</th>";
            echo "<th scope=\"col\">Ukupno dani</th>";
            echo "<th scope=\"col\">Ukupno za placanje</th>";
          echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
          echo "<tr>";
            echo "<th scope=\"row\">".$zakazano["ime_prezime"]."</th>";
            echo "<td>".$zakazano["email"]."</td>";
            echo "<td>".$zakazano["br_tel"]."</td>";
            echo "<td>".$zakazano["datum_peuz"]."</td>";
            echo "<td>".$zakazano["datum_vra"]."</td>";
            echo "<td>".$zakazano["dani_ukupno"]."</td>";
            echo "<td>".$zakazano["ukupna_cena"]."$</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td  style=\"text-align:center;\"><a href=\"./phpex/deletezakazano.php?id=".$zakazano["id_zakazano"]."\" class=\"btn btn-danger\">Obrisi</a></td>";
          echo "<td  style=\"text-align:center;\"><a href=\"./prikazizakazano.php?id=".$zakazano["id_zakazano"]."\" class=\"btn btn-success\">Prikazi rentiran auto</a></td>";
          echo "</tr>";
          
        echo "</tbody>";
        echo "</table>";
      }
    
    ?>
</div>