<?php 

$conn = new mysqli("localhost","root","", "automobili");

if(is_null($conn->connect_error)){
        // echo "Uspesno ste se pozvezali";
}else{
    echo "Greska: $conn->connect_error";
}

?>