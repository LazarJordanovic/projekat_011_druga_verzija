<?php 
    require_once("./delovi/header.php");
    require_once("./delovi/nav.php"); 
    require_once("./dbphp/conn.php");
?>
<div class="heading bg-light">
    <h1>KONTAKT</h1>
    <p>Ovde nas mozete kontaktirati 24/7</p>
</div>
<?php 
            if(isset($_GET["ime"]) && isset($_GET['prez']) && isset($_GET["email"]) && isset($_GET["poruka"])){
                $ime = $_GET["ime"];
                $prezime = $_GET["prez"];
                $email = $_GET["email"];
                $poruke = $_GET["poruka"];
                $vreme= date("d/m/Y H:i:s ");

                if($ime && $prezime && $email && $poruke){
                    echo '<hr><h3 class="blue">Vasa poruka je usposno poslata dana' ." ". $vreme. ', odgovoricemo Vam u najkracem vremenu.</h3><hr>';
                }else {
                    echo '<hr><h3 class="red">Da bi poslao poruku moraju da budu popunjena sva polja iz forme. Pokusajte opet.</h3><hr>';
                }

                $upit = "INSERT INTO `kontakt`( `ime`, `prezime`, `email`, `poruka`,`datum`) VALUES (?,?,?,?,?)";

                $kontakt = $conn->prepare($upit);
                $kontakt->bind_param("sssss", $ime, $prezime,$email,$poruke, $vreme);
                $kontakt->execute();
                $rez = $kontakt->get_result();
            }
            ?>

<div class="kontakt">
<div class="kform">
            <form action="./kontakt.php" method="get">
                <label for="">Ime:</label><br><br>
                <input type="text" name="ime" placeholder="Unesi svoje ime" required><br><br>
                <label for="">Pezime:</label><br><br>
                <input type="text" name="prez" placeholder="Unesi svoje prezime" required><br><br>
                <label for="">Email:</label><br><br>
                <input type="email" name="email" placeholder="Unesi svoju e-mail adresu" required><br><br>
                <label for="">Vaša Poruka:</label><br><br>
                <textarea name="poruka" id="" cols="30" rows="10" required>Vaša poruka</textarea><br><br>
                <input type="submit" value="Pošalji">
            </form>
           
        </div>
        <div id="adr">
        <h2>Kontakt informacije</h2>
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
        <!-- <img src="./img/slika4.png" alt="" class="pismo">
        <h3 class="blue">Salon nameštaja ITBoot</h3>
        <p>Ilije Garsanina 53a/7</p>
        <p>11200 Beograd</p>
        <p><a href="https://divac.com/rs/Naslovna" class="bezlinija">www.divac.com</a></p>
        <h3 class="blue">Prodajni centar u Beogradu</h3>
        <p>Kraljice Marije 16</p>
        <p>11000, Beograd, Srbija</p>
        <p><a href="https://www.mas.bg.ac.rs/" class="bezlinija">www.mas.bg.ac.rs</a></p> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23536.12255183962!2d21.464967477523352!3d42.4912269626315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1354ed56143f2481%3A0x9d4079212fbf8deb!2sGornje%20Kusce!5e0!3m2!1ssr!2s!4v1641826710829!5m2!1ssr!2s" 
            width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    </div>
<?php require_once("./delovi/footer.php"); ?>