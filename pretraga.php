<?php 
    require_once("./delovi/header.php");
    require_once("./delovi/nav.php");
    require_once("./dbphp/conn.php");

    if($_GET["pretraga"]){
        $pretraga = $_GET["pretraga"];
        $upitpr = "SELECT * FROM `korisnik_auto` WHERE `ime_vozila`= ? OR `model_vozila`= ? OR `cena` = ?";
        
        $selectkor = $conn->prepare($upitpr);
        $selectkor->bind_param("sss",$pretraga,$pretraga,$pretraga);
        $selectkor->execute();
        $auto = $selectkor->get_result();
        foreach($auto as $el){
            // var_dump($el);
        }
        
    }
    
?>
<div class="heading bg-light">
    <h1>PRETRAGA VOZILA</h1>
    <p>Koja su trenutno na prodaju</p>
</div>
<div class="row">
<?php 
    foreach ($auto as $pretraga){

        echo " <div class=\"auto\">";
          echo  "<div class=\"naslov bg-light\">";
             echo "<a href=\"info.php?id=".$pretraga['id_kor_auto']."\">";
                echo"<h4>".$pretraga["ime_vozila"] ."</h4>";
                echo"<h5>".$pretraga["model_vozila"]."</h5>";
            echo "</a>";
            echo "</div>";
            echo "<div class=\"slike\">";
                echo "<a href=\"info.php?id=".$pretraga['id_kor_auto']."\"><img src=\"./img/prodaja/". $pretraga["slika"]."\" ></a>";
            echo"</div>";
            echo "<div class=\"cena bg-light\">";
            echo  "CENA: <button>". $pretraga["cena"]."$</button><br>";
            echo "<span><a href=\"info.php?id=".$pretraga['id_kor_auto']."\">Procitaj vise</a></span>";
            echo "</div>";
        echo"</div>";
    }

?>
</div>