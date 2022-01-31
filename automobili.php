
<?php
 
require_once("./delovi/header.php");
require_once("./delovi/nav.php"); 
require_once("./dbphp/conn.php");
?>
<div class="heading bg-light">
    <h1>LISTA VOZILA</h1>
    <p>Koja su trenutno na prodaju</p>
</div>
    <div class="row">
        <div class="pretraga">
            <form class="d-flex" action="./pretraga.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Pretrazi automobile" aria-label="Search" name="pretraga">
                <button class="btn btn-outline-success" type="submit" name="proveri">Pretraga</button>
            </form>
        </div>
        <div class="cenapr">
            <form class="row g-1" action="./pretragacena.php" method="GET">
                <div class="col-auto">
                    <label for="cena1" >Od Cene</label>
                    <input type="text" class="form-control me-2" id="cena1" name="cena1" required>
                </div>
                <div class="col-auto">
                    <label for="cena2" >Do Cene</label>
                    <input type="text" class="form-control me-2" id="cena2" name="cena2" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Pretrazi po ceni</button>
                </div>
            </form>
            </div>
    <?php 

    $upitslk = "SELECT * FROM `korisnik_auto` ";

    $selectkor = $conn->prepare($upitslk);

    $selectkor->execute();
    $auto = $selectkor->get_result();
    
    foreach($auto as $kola){
        
        echo " <div class=\"auto\">";
          echo  "<div class=\"naslov bg-light\">";
             echo "<a href=\"info.php?id=".$kola['id_kor_auto']."\">";
                echo"<h4>".$kola["ime_vozila"] ."</h4>";
                echo"<h5>".$kola["model_vozila"]."</h5>";
            echo "</a>";
            echo "</div>";
            echo "<div class=\"slike\">";
                echo "<a href=\"info.php?id=".$kola['id_kor_auto']."\"><img src=\"./img/prodaja/". $kola["slika"]."\" ></a>";
            echo"</div>";
            echo "<div class=\"cena bg-light\">";
            echo  "CENA: <button>". $kola["cena"]."$</button><br>";
            echo "<span><a href=\"info.php?id=".$kola['id_kor_auto']."\">Procitaj vise</a></span>";
            echo "</div>";
        echo"</div>";
        
    } ?>
    </div>
   
    
<?php require_once("./delovi/footer.php"); ?>


