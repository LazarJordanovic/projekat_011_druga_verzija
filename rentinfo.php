<?php 
    require_once("./delovi/header.php");
    require_once("./delovi/nav.php"); 
    require_once("./dbphp/conn.php");
    require_once("./phpfunkcije.php");
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $upitslk = "SELECT * FROM `rent_auto` WHERE `id_rent`= ?";

        $selectrent = $conn->prepare($upitslk);
        $selectrent->bind_param("i",$id);
        $selectrent->execute();

        $rent_automobili = $selectrent->get_result();
        
    }
?>

<div class="heading bg-light">
    <?php 
        foreach($rent_automobili as $rent_auto){
            echo "<h1>".$rent_auto["ime_vozila"]." | " .$rent_auto["model_vozila"]."</h1>";
        }
    ?>
</div>
<?php 
foreach($rent_automobili as $rent_auto){
    echo "<div class=\"rentinfo\">";
    echo "<div class=\"slinfo\">";
    echo "<div class=\"slider\">";
    echo "<div class=\"slider-item\">";
                echo "<div class=\"item active\">";
                  echo  "<img src=\"img/rentiranje/".$rent_auto["slika"]."\" >";
                echo "</div>";
                echo "<div class=\"item\">";
                    echo "<img src=\"img/rentiranje/".$rent_auto["slika1"]."\" >";
                echo "</div>";
                echo "<div class=\"item\">";
                    echo "<img src=\"img/rentiranje/".$rent_auto["slika"]."\" >";
                echo "</div>";
                echo "<div class=\"item\">";
                    echo "<img src=\"img/rentiranje/".$rent_auto["slika1"]."\" >";
                echo "</div>";
            echo "</div>";
            
            echo "<div class=\"left\" ><img src=\"img/strelice/strelicaL.png\" ></div>";
            echo "<div class=\"right\"><img src=\"img/strelice/strelicaD.png\"></div>";
        echo "</div>";
    echo "</div>";
    echo "<div class=\"inforent\">";
    echo "<h4>".$rent_auto["ime_vozila"]." ".$rent_auto["model_vozila"]."</h4>";
    echo "<ul>";
    echo "<li>Mernjac / ".$rent_auto["vrsta_menjaca"]."</li>";
    echo "<li>Broj vrata / ".$rent_auto["br_vrata"]."</li>";
    echo "<li>Broj Putnika / ".$rent_auto["br_sedista"]."</li>";
    echo "<li>Velicina prtljaznika / ".$rent_auto["velicina_prtljaga"]." l</li>";
    echo "<li>Velicina prtljaznika / ".$rent_auto["klima"]." </li>";
    echo "<li>Motor / ".$rent_auto["gorivo"]."</li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
   
}

?>

<div class="dodoprema">
    
    <?php     
    foreach($rent_automobili as $rent_auto){

        $cenausz = $rent_auto["cena_u_sezoni"];
        $cenavansz = $rent_auto["cena_van_sezone"];
        $id_vozila = $rent_auto["id_rent"];
        echo "<form action=\"./zakazanoinfo.php\" method=\"GET\">";
    

    echo " <table>";
        echo "<input type=\"hidden\" name=\"id_vozila\" value=\"$id_vozila\"/>";
        echo "<input type=\"hidden\" name=\"cenaus\" value=\"$cenausz\"/>";
        echo "<input type=\"hidden\" name=\"cenavs\" value=\"$cenavansz\"/>";
        echo "<tr> <td colspan=\"4\"><h3>Cena rentiranja:<br>Cena u sezoni: ".$cenausz."$ /dan<br>Cena van sezone: ".$cenavansz."$ /dan</h3></td></tr>";
        echo "<tr><td colspan=\"4\"><h3>Dodatna oprema:</h3></td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Kasko 5% ucesce u steti</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Osiguranje putnika</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Navigacija</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Sediste</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Isporuka van radnog vremena</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Pranje</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Wifi</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Dostava automobila</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>24 casovna pomoc na putu</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Zeleni karton</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Popusti za gorivo na Gasprom pumpama</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        echo "<tr><td colspan=\"2\"><input type=\"checkbox\" name=\"\" checked>Dodatni vozac</td> <td colspan=\"2\" style=\"text-align: end;\">Besplatno</td></tr>";
        
      
                echo "<tr>";
                    echo "<td colspan=\"2\"><label for=\"\">Mesto preuzimnja:</label><br><input type=\"text\" name=\"mestopre\"></td>";
                    echo "<td colspan=\"2\"><label for=\"\">Mesto Vracanja:</label><br><input type=\"text\" name=\"mestovrac\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><label for=\"\">Datum preuzimanja:</label><br><input type=\"date\" name=\"datepreuz\" required></td>";
                echo "<td ><label for=\"\">Vreme preuzimanja:</label><br><input type=\"time\" name=\"timepreuz\"></td>";
                echo "<td ><label for=\"\">Datum Vracanja:</label><br><input type=\"date\" name=\"datevrac\" required></td>";
                echo "<td ><label for=\"\">Vreme vracanja:</label><br><input type=\"time\" name=\"timevrac\"></td>";
                echo "</tr>";
                echo "<tr> <td colspan=\"4\"><h3>Informacije o korisniku:</h3></td></tr>";
                echo "<tr>";
                    echo "<td colspan=\"2\"><label for=\"\">Ime i prezime:</label><br><input type=\"text\" name=\"imepr\" required></td>";
                    echo "<td colspan=\"2\"><label for=\"\">Email:</label><br><input type=\"email\" name=\"email\" required></td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td colspan=\"2\"><label for=\"\">Broj telefona:</label><br><input type=\"text\" name=\"brtel\" required></td>";
                    echo "<td colspan=\"2\"><label for=\"\">Broj leta:</label><br><input type=\"text\" name=\"brleta\"></td>";
                echo "</tr>";
                echo "<tr> <td colspan=\"4\"><h3>Nacin placanja:</h3></td></tr>";
                echo "<tr><td><input type=\"radio\" name=\"kes\" id=\"\" value=\"gotkes\">Gotovina/Kes</td></tr>";
                echo "<tr><td><input type=\"radio\" name=\"vir\" id=\"\" value=\"virman\">Virman</td></tr>";
                echo "<tr><td><input type=\"radio\" name=\"kart\" id=\"\" value=\"krkartica\">Kreditna kartica</td></tr>";
                echo "<tr> <td colspan=\"4\"><h3>Upisite dodatne zahteve:</h3></td></tr>";
                echo "<tr><td colspan=\"4\"><textarea name=\"por\" id=\"\" ></textarea></td></tr>";
                echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td><input type=\"reset\" value=\"Ponisti\"></td>";
                    echo "<td><input type=\"submit\" value=\"Posalji podatke\"></td>";
                echo "</tr>";
            
                echo "</table>";
    echo "</form>";
}
?>
    
</div>


<?php require_once("./delovi/footer.php") ?>