<?php 

        require_once("./delovi/header.php"); 

        require_once("./delovi/nav.php");

        require_once("./dbphp/conn.php");

        require_once("./phpfunkcije.php");
        

        if(isset($_GET["id_vozila"])&&isset($_GET["cenaus"])&&isset($_GET["cenavs"]) && isset($_GET["datepreuz"]) && isset($_GET["datevrac"])&& isset($_GET["imepr"])&& 
           isset($_GET["email"]) && isset($_GET["brtel"])&&isset($_GET["mestopre"]) && isset($_GET["mestovrac"])){
                $cena = $_GET["cenaus"];
                $cena2 = $_GET["cenavs"];
                $datpr = $_GET["datepreuz"];
                $datevr  = $_GET["datevrac"];
                $imepr = $_GET["imepr"];
                $email = $_GET["email"];
                $brtel = $_GET["brtel"];
                $mestopre = $_GET["mestopre"];
                $mestovrac = $_GET["mestovrac"];
                $ukupnodani = izDani($datpr,$datevr);
                $ukupno= sezona($datpr,$datevr,$cena,$cena2);
                $id_vozila = $_GET["id_vozila"];

               echo "<div class=\"zakazani\">";
                echo "<h2>Uspesno ste zakazali termin za iznajmljivanje</h2>";
                echo "<h4>Vase Ime je: $imepr</h4>";
                echo "<h4>Vasa e-mail adresa je: $email</h4>";
                echo "<h4>Vas broj telefona je: $brtel</h4>";
                echo "<h4>Datum zakazivanja od: $datpr</h4>";
                echo "<h4>Datum zakazivanja do: $datevr</h4>";
                echo "<h4>Ukupno dani: $ukupnodani</h4>";
                echo "<h4>Ukupno za placanje: $ukupno $</h4>";
                echo "<a href=\"./rentacar.php\" class=\"btn btn-primary\">Gotovo!!!</a>";
               echo "</div>";


               $upit = "INSERT INTO `zakazano`( `ime_prezime`, `email`, `br_tel`, `datum_peuz`, `datum_vra`, `dani_ukupno`, `ukupna_cena`, `id_rent_vozila`) VALUES (?,?,?,?,?,?,?,?)";

               $insertzakazano = $conn->prepare($upit);
               $insertzakazano->bind_param("ssssssss",$imepr,$email,$brtel,$datpr,$datevr,$ukupnodani,$ukupno,$id_vozila);
               $insertzakazano->execute();
        }



?>
   
