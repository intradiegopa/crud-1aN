<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");

    header('Content-Type: application/json');

    if( isset($_GET["id_azienda"]) )
    {   
        $esito = $db->elimina_contatto($_GET["id_azienda"]);
        
        $a = var_dump($esito);
        
        if ($esito == "Error!" )
            echo json_encode("Si sono verificati errori, ripetere l'operazione.$a");
        else
            echo json_encode("L'azienda è stato eliminata correttamente ($_GET[id_azienda])");
            
    }else{
        
         echo json_encode("Parametri mancanti, ripetere l'operazione.$_GET[id_azienda]");
    }
           