<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");

    if(  isset($_GET["id"]) )
    {  
        $esito = $db->un_contatto($_GET["id"]);
        
        $esito = $esito[0];
        
        header('Content-Type: application/json');
        echo json_encode($esito);

        
    
    }else{
        header('Content-Type: application/json');
         echo json_encode("Errore: parametri mancanti, ripetere l'operazione.");
    }
            




 