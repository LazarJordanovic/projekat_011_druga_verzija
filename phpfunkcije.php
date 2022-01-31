<?php



class Prautomobila {
    protected $ime;
    protected $marka;
    protected $kubikaza;
    protected $slika;
    protected $godiste;
    protected $br_vrata;
    protected $boja;
    protected $kilometraza;
    protected $carinjen;
    protected $cena;
    protected $info;

    public function __construct(string $ime, string $marka, string $kub, string $sl, int $god, int $br_vr, string $boja, string $kilometraza, string $car, int $cena, string $info ){
        $this->ime = $ime;
        $this->marka = $marka;
        $this->kubikaza= $kub;
        $this->slika= $sl;
        $this->godiste=$god;
        $this->br_vrata = $br_vr;
        $this->boja= $boja;
        $this->kilometraza = $kilometraza;
        $this->carinjen = $car;
        $this->cena= $cena;
        $this->info = $info; 
        
    }
}

function izDani(string $date1, string $date2){
        
    $dan1 = substr($date1,8,9);
    $dan2 = substr($date2,8,9);
    $mesec1 = substr($date1,5,2);
    $mesec2 = substr($date2,5,2);
    $godina1 = substr($date1,0,4);
    $godina2 = substr($date2,0,4);
  
           if($date1 < $date2){
               if(($godina1 == $godina2) && ($mesec1 == $mesec2) && ($dan1 < $dan2)){
               $raz = $dan2 - $dan1;
               return $raz;
               }
               elseif(($godina1 == $godina2) && ($mesec1 < $mesec2) || ($godina1 < $godina2)){
                       if($mesec1 == "01"){
                           $jan = 31 - $dan1;
                           $ukp1= $jan + $dan2;
                           return $ukp1 ; 
                       }elseif($mesec1 == "02"){
                           $feb = 28 - $dan1;
                           $ukp2 = $feb + $dan2;
                           return $ukp2;
                       }elseif($mesec1 == "03"){
                           $mar = 31 - $dan1;
                           $ukp3 = $mar + $dan2;
                           return $ukp3;
                       }elseif($mesec1 == "04"){
                           $apr = 30 - $dan1;
                           $ukp4 = $apr+$dan2;
                           return $ukp4;
                       }elseif($mesec1 == "05"){
                           $maj = 31 - $dan1;
                           $ukp5 = $maj + $dan2;
                           return $ukp5;
                       }elseif($mesec1 == "06"){
                           $jun = 30 - $dan1;
                           $ukp6 = $jun + $dan2;
                           return $ukp6;
                       }elseif($mesec1 == "07"){
                           $jul = 31 - $dan1;
                           $ukp7 = $jul + $dan2;
                           return $ukp7;
                       }elseif($mesec1 == "08"){
                           $avg = 31 - $dan1;
                           $ukp8 = $dan2 + $avg;
                           return $ukp8;
                       }elseif($mesec1 == "09"){
                           $sep = 30 - $dan1;
                           $ukp9 = $sep + $dan2;
                           return $ukp9;
                       }elseif($mesec1 == "10"){
                           $okt = 31 - $dan1;
                           $ukp10 = $okt + $dan2;
                           return $ukp10;
                       }elseif($mesec1 == "11"){
                           $nov = 30 - $dan1;
                           $ukp11 = $nov + $dan2;
                           return $ukp11;
                       }elseif($mesec1 == "12"){
                           $dec = 31 - $dan1;
                           $ukp12 = $dec + $dan2;
                           return $ukp12;
                       }
               }
           }else {
               return "Ponovo unesite datum";
           }
   }

   function sezona($date1, $date2,$cenasz, $cenavsz ){
       
    //    $cenaus=15;
    //    $cenavs=12;
       $dani = izDani($date1, $date2);
       if($dani>= 1 &&$dani <= 2){
           if(($date1 >= "2022-05-15" && $date1<="2022-09-15")|| ($date2 >= "2022-05-15" && $date2 <="2022-09-15")){
               $cenausezoni = ($cenasz+5) * $dani;
               return $cenausezoni;
               
           }else {
               $cena_v_sezone=  ($cenavsz+5) * $dani;
               return $cena_v_sezone ;
              
           }
       }elseif($dani >= 3 && $dani <= 7){
           if(($date1 >= "2022-05-15" && $date1<="2022-09-15")|| ($date2 >= "2022-05-15" && $date2 <="2022-09-15")){
               $cenausezoni = ($cenasz+4) * $dani;
               return $cenausezoni; 
           }else {
               $cena_v_sezone=  ($cenavsz+4) * $dani;
               return $cena_v_sezone;
           }
       }elseif($dani>=8 && $dani <=15){
           if(($date1 >= "2022-05-15" && $date1<="2022-09-15")|| ($date2 >= "2022-05-15" && $date2 <="2022-09-15")){
               $cenausezoni = ($cenasz+3) * $dani;
               return $cenausezoni; 
           }else {
               $cena_v_sezone=  ($cenavsz+3) * $dani;
               return $cena_v_sezone;
           }
       }elseif($dani >=16 && $dani <=30){
           if(($date1 >= "2022-05-15" && $date1<="2022-09-15")|| ($date2 >= "2022-05-15" && $date2 <="2022-09-15")){
               $cenausezoni = ($cenasz+2) * $dani;
               return $cenausezoni; 
           }else {
               $cena_v_sezone=  ($cenavsz+2) * $dani;
               return $cena_v_sezone;
           }
       }elseif($dani>30){
           if(($date1 >= "2022-05-15" && $date1<="2022-09-15")|| ($date2 >= "2022-05-15" && $date2 <="2022-09-15")){
               $cenausezoni = ($cenasz) * $dani;
               return $cenausezoni; 
           }else {
               $cena_v_sezone=  ($cenavsz) * $dani;
               return $cena_v_sezone;
           }
       }
       
   }

   function slobodno($date1, $date2){
       $trdate = date("Y,m,d");

       if($trdate>= $date1 && $trdate <= $date2){
           echo "Zauzeto";
       }else {
           echo "Slobodno";
       }
   }

?>