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
      .kont {
        width: 90%;
        margin: 50px auto;
        border: 2px solid gray;
        padding: 20px;
      }
      .kont h4 {
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
    <a class="nav-link" href="./zakazano.php">Zakazani automobila za rentiranje</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="./pogledajkom.php">Pogledaja Komentare</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./logout.php">Odjavi se</a>
  </li>
</ul>
    <div class="kont">
      <h4>Prikaz svih poruka</h4>
    <?php 
      $upit = "SELECT * FROM `kontakt`";

      $por = $conn->prepare($upit);
      $por->execute();

      $rezpor = $por->get_result();
      $i=1;
      foreach($rezpor as $el){
        echo $i++ ." Poruka:<br>Vreme slanja: ". $el["datum"]."";
        // var_dump($el);
        echo "<table class=\"table\">";
            echo "<thead>";
              echo "<tr>";
                echo "<th scope=\"col\">Ime</th>";
                echo "<th scope=\"col\">Prezime</th>";
                echo "<th scope=\"col\">e-mail</th>";
                echo "<th scope=\"col\">Poruka</th>";
              echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
              echo "<tr>";
                echo "<th scope=\"row\">".$el["ime"]."</th>";
                echo "<td>".$el["prezime"]."</td>";
                echo "<td>".$el["email"]."</td>";
                echo "<td style=\"color: red;\">".$el["poruka"]."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td  style=\"text-align:center;\"><a href=\"./phpex/deletepor.php?id=".$el["id_kon"]."\" class=\"btn btn-danger\">Obrisi</a></td>";
              echo "</tr>";
              
            echo "</tbody>";
        echo "</table>";
      }
    
    ?>

    </div>
</body>
</html>