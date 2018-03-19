<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "aziendajax", "root", "");

    header("location: index.html");

    if( isset($_POST["id"]) )
    {   
        $esito = $db->elimina_contatto($_POST["id"]);
        
        if ($esito == "Error!" )
            print("Si sono verificati errori, ripetere l'operazione.");
        else
            print("Il contatto è stato eliminato correttamente ($_POST[id])");
            
    }else{
        
         print("Parametri mancanti, ripetere l'operazione.");
    }
           