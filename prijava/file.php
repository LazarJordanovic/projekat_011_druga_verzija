<?php 

    if(isset($_POST["submit"])){
        $file = $_FILES['uploaded'];
        if($file['error']==0){
            $uspeh = move_uploaded_file($file['tmp_name'],"../img/novi_naziv.jpg");

            if($uspeh){
                echo "Fajl je uspesno odpremljen";
            }
        }
        var_dump($file);
        // foreach($file as $el){

        
        //     $putanja= $el["tmp_name"];
        //     echo $putanja;
        // }
        echo $file["tmp_name"];
    }

?>