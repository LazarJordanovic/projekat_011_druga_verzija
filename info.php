<?php 
require_once("./delovi/header.php");
require_once("./delovi/nav.php");
// require_once("./db.php");
require_once("./dbphp/conn.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $upitslk = "SELECT * FROM `korisnik_auto` WHERE `id_kor_auto`= $id";

    $res = $conn->query($upitslk);
    $auto = $res->fetch_assoc();
    
    
}
?>
<div class="heading bg-light">
    <?php 
        
            echo "<h1>".$auto["ime_vozila"]." | " .$auto["model_vozila"]."</h1>";
        
    ?>
<div class="info">
<?php 
    
        
        echo "<div class=\"prslike\">";
        // echo "<img src=\"./img/".$auto1["slika"][0]."\">";
        echo "<div class=\"slider\">";
        // echo "<img src=\"./img/".$rent_auto["slika"][0]."\">";
        echo "<div class=\"slider-item\">";
                echo "<div class=\"item active\">";
                  echo  "<img src=\"img/prodaja/".$auto["slika"]."\" >";
                echo "</div>";
                echo "<div class=\"item\">";
                    echo "<img src=\"img/prodaja/".$auto["slika1"]."\" >";
                echo "</div>";
                echo "<div class=\"item\">";
                    echo "<img src=\"img/prodaja/".$auto["slika"]."\" >";
                echo "</div>";
                echo "<div class=\"item\">";
                    echo "<img src=\"img/prodaja/".$auto["slika1"]."\" >";
                echo "</div>";
            echo "</div>";
            
            echo "<div class=\"left\" id=\"sl\"><img src=\"img/strelice/strelicaL.png\" ></div>";
            echo "<div class=\"right\" id=\"sd\"><img src=\"img/strelice/strelicaD.png\"></div>";
        echo "</div>";
        echo "</div>";
        
        
        echo "<div class=\"infoauto\">";
        echo "<h4>Osnovne informacije o automobilu</h4>";
        echo "<table>";
        echo "<tr>";
        echo "<td>Marka vozila:</td><td>".$auto["ime_vozila"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Model vozila:</td><td> ".$auto["model_vozila"]."</td>";
        echo "</tr>"; 
        echo "<tr>";
        echo "<td>Kubikaza vozila:</td><td> ".$auto["kubikaza"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Prva registracija vozila:</td><td> ".$auto["godisete"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Broj vrata:</td><td> ".$auto["br_vrata"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Boja vozila:</td><td> ".$auto["boja_vozila"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Kilometraza vozila:</td><td> ".$auto["kilometraza"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Carinjen:</td>";
        
        echo "<td>".$auto["carinjen"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Prodajna cena:</td><td style=\"color:red; font-size:30px;\"> ".$auto["cena"]."$</td>";
        echo "</tr>";
        echo "</table>";       
        echo "</div>";
        
        echo "</div>";
        echo "<div class=\"dodatneinfo\">";
        echo "<h3>Dodatne informacije o automobilu:</h3>";
        echo "<p>".$auto["dod_info"]."</p>";
        echo "</div>";
       
    // }

?>
<div class="kontaktinfo">
    <h3>Kontakt informacije:</h3>
    <table>
        <tr>
            <td><img src="./img/obj/phone.png" alt="">Telefon:</td>
            <td><img src="./img/obj/viber.png" alt="">Viber:</td>
            <td><img src="./img/obj/wp.png" alt="">Whatsup:</td>
            <td><img src="./img/obj/mail.png" alt="">EMAIL:</td>
        </tr>
        <tr>
            <td>+38164/123-456-7</td>
            <td>+38164/123-456-7</td>
            <td>+38164/123-456-7</td>
            <td><a href="#">neko@gmail.com</a></td>
        </tr>
    </table>
</div>
</div>
<div class="prazno">

</div>



<?php require_once("./delovi/footer.php")?>