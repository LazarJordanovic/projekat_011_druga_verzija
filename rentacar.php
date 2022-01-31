<?php 
        require_once("./delovi/header.php");
        require_once("./delovi/nav.php");
        // require_once("./rentiranje_db.php");
        require_once("./dbphp/conn.php");
        $upitslk = "SELECT * FROM `rent_auto`";

        $selectrent = $conn->prepare($upitslk);

        $selectrent->execute();
        $rent_vozila = $selectrent->get_result();
?>
<div class="heading bg-light">
    <h1>RENTIRANJE VOZILA</h1>
    <p>Lista vozila za rentiranje</p>
</div>
<div class="rent">
    <?php 
    foreach($rent_vozila as $auto){
        $cenasz = (int)$auto["cena_u_sezoni"];
        $cenavsz = (int)$auto["cena_van_sezone"]; 
        $osamnaest = $cenasz + 2;
        $osamnaest2 = $cenavsz +2;
        $osam = $cenasz +3;
        $osam2 = $cenavsz +3;
        $tri = $cenasz +4;
        $tri2 = $cenavsz +4;
        $jedan = $cenasz +5;
        $jedan2 = $cenavsz+5;
        echo "<div class=\"car\">";
        echo "<h4>".$auto["ime_vozila"]." | <em>".$auto["model_vozila"]."<em></h4>";
        echo "<div class=\"vslika\">";
        echo "<img src=\"./img/rentiranje/".$auto["slika"]."\">";
        echo "</div>";
        echo "<div class=\"osobine\">";
        echo "<table>";
        echo "<tr>";
        echo "<td><img class=\"obj\"  src=\"./img/obj/menjac.PNG\"></td>";
        echo "<td><img class=\"obj\"  src=\"./img/obj/osobe.PNG\"></td>";
        echo "<td><img class=\"obj\"  src=\"./img/obj/vrata.PNG\"></td>";
        echo "<td><img class=\"obj\"  src=\"./img/obj/gorivo.PNG\"></td>";
        echo "<td><img class=\"obj\"  src=\"./img/obj/klima.PNG\"></td>";
        echo "<td><img class=\"obj\"  src=\"./img/obj/prtljag.PNG\"></td>";
        echo "</tr>";
        echo "<tr>";
        echo"<td>Menjac</td>";
        echo"<td>Broj Osobe</td>";
        echo"<td>Broj vrata</td>";
        echo"<td>Gorivo</td>";
        echo"<td>Klima</td>";
        echo"<td>Prtljag</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>".$auto["vrsta_menjaca"]."</td>";
        echo "<td>".$auto["br_sedista"]."</td>";
        echo "<td>".$auto["br_vrata"]."</td>";
        echo "<td>".$auto["gorivo"]."</td>";
        echo "<td>".$auto["klima"]."</td>";
        echo "<td>".$auto["velicina_prtljaga"]."l</td>";
        echo "</tr>";
        echo "</table>";
        echo "<br><h2>Cena:</h2>";
        echo "<table>";
        echo "<tr>
        <td>Cena za period</td>
        <td>Sezona</td>
        <td>Van Sezone</td>
        </tr>";
        echo "<tr>
        <td>30+ Dana</td>
        <td>$cenasz</td>
        <td>$cenavsz</td>
        </tr>";
        echo "<tr>
        <td>16-30 Dana</td>
        <td>$osamnaest</td>
        <td>$osamnaest2</td>
        </tr>";
        echo "<tr>
        <td>8-15 Dana</td>
        <td>$osam</td>
        <td>$osam2</td>
        </tr>";
        echo "<tr>
        <td>3-7 Dana</td>
        <td>$tri</td>
        <td>$tri2</td>
        </tr>";
        echo "<tr>
        <td>1-2 Dana</td>
        <td>$jedan</td>
        <td>$jedan2</td>
        </tr>";
        echo "</table>";
        echo "Sezonske cene vaze od <b>15.05.".date("Y")." do 15.09.".date("Y")."<b><br>";
        echo "<a href=\"./rentinfo.php?id=".$auto["id_rent"]."\"><button class=\"btn btn-primary\">Zakazi svoj termin</button></a>";
        echo "</div>";
        echo "</div>";
    
        

    }
    
    ?>
    
</div>
<div class= "tehpodrska">
        <h2>Tehnicka podrska</h2>
        <hr>
        <table>
            <tr>
                <td ><img src="./img/obj/phone.png" alt=""></td>
                <td> Telefon: <br>+381648525674</td>
            </tr>
            <tr>
                <td ><img src="./img/obj/viber.png" alt=""></td>
                <td> Viber: <br>+381648525674</td>
            </tr>
            <tr>
                <td><img src="./img/obj/wp.png" alt=""></td>
                <td> Whatsup: <br> +381648525674</td>
            </tr>
            <tr><td>Ili nam pisite na e-mail:</td></tr>
            <tr><td><a href="mailto">neko.nesto@gmail.com</a></td></tr>

        </table>
        <button><a href="./kontakt.php">Podrska 24/7</a></button>
    </div>

