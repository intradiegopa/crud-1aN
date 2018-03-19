<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "aziendajax", "root", "");

    header("location: index.html");

    if( isset($_GET["id_contatto"]) )
    {   
        $eesito = $db->elimina_contatto($_GET["id_contatto"]);
        
        if ($eesito == "Error!" )
            $esito="Si sono verificati errori, ripetere l'operazione.";
        else
            $esito="Il contatto è stato eliminato correttamente ($_GET[id])";
            
    }else{
        
        $esito="Parametri mancanti, ripetere l'operazione.";
    }

        header('Content-Type: application/json');
        echo json_encode($esito);
    
            
           