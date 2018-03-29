<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");

    if( isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["piva"]) && !empty($_POST["piva"])  )
    {   
        $nome = $_POST["nome"];
        $piva = $_POST["piva"];
        if( isset($_POST["telefono"]) )
            $telefono = $_POST["telefono"];
        if( isset($_POST["email"]) )
            $email = $_POST["email"];
        
        $esito = $db->inserisci_azienda($nome, $piva, $telefono, $email);
        
        if ($esito=="Error!")
            
            print("Si sono verificati errori, ripetere l'operazione.");
        
        else
            
            print("L'azienda è stata inserita correttamente ($esito)");
    
    
    
    }else{
        
         print("Parametri mancanti, ripetere l'operazione.");
    }
            
           
    