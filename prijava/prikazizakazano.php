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
    <title>Prikazi Rentovane Automobile</title>
    <style>
      .prikazirentauto {
        width: 95%;
        margin: 50px auto;
        border: 2px solid gray;
        padding: 20px;
      }
      .prikazirentauto h3 {
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
    <a class="nav-link active" href="./ubacirent.php">Ubaci novi auto za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./prikazirent.php">Prikazi sve automobile za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./zakazano.php">Zakazani automobili za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./pogledajkom.php">Pogledaja Komentare</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./logout.php">Odjavi se</a>
  </li>
</ul>
    <div class="prikazirentauto">
      <h3>Auto koji je rentiran</h3>
    <?php 
    
      $upitrent1 = "SELECT * FROM `rent_auto` INNER JOIN `zakazano` ON `rent_auto`.`id_rent`= `zakazano`.`id_rent_vozila`";

      $selectrent = $conn->prepare($upitrent1);

      $selectrent->execute();

      $rent = $selectrent->get_result();

      foreach($rent as $rentiranje){
          // var_dump($rentiranje);
      
        echo "<table class=\"table\">";
            echo "<thead>";
              echo "<tr>";
                echo "<th scope=\"col\">Vozilo</th>";
                echo "<th scope=\"col\">Model</th>";
                echo "<th scope=\"col\">Godiste</th>";
                echo "<th scope=\"col\">Cena u sezoni</th>";
                echo "<th scope=\"col\">Cena van sezoni</th>";
              echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
              echo "<tr>";
                echo "<th scope=\"row\">".$rentiranje["ime_vozila"]."</th>";
                echo "<td>".$rentiranje["model_vozila"]."</td>";
                echo "<td>".$rentiranje["godiste"]."</td>";
                echo "<td style=\"color: red;\">".$rentiranje["cena_u_sezoni"]."</td>";
                echo "<td style=\"color: blue;\">".$rentiranje["cena_van_sezone"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td><a href=\"./zakazano.php\" class=\"btn btn-danger\">GOTOVO!!!</a></td>";
              
              echo "</tr>";
              
            echo "</tbody>";
        echo "</table>";
      }
    ?>

    </div>
</body>
</html>