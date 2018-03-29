<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");

    if( isset($_POST["nome"],$_POST["cognome"],$_POST["id_azienda"]) )
    {   
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $id_azienda = $_POST["id_azienda"];
        if( isset($_POST["genere"]) )
            $genere = $_POST["genere"];
        if( isset($_POST["titolo"]) )
            $titolo = $_POST["titolo"];
        if( isset($_POST["telefono"]) )
            $telefono = $_POST["telefono"];
        if( isset($_POST["email"]) )
            $email = $_POST["email"];
        
        $esito = $db->inserisci_contatto($nome, $cognome, $email, $telefono, $titolo, $id_azienda);
        
        if ($esito=="Error!")
            
            print("Si sono verificati errori, ripetere l'operazione.");
        
        else
            
            print("Il contatto è stato inserito correttamente ($esito), inserisci_contatto($nome, $cognome, $email, $telefono, $titolo, $id_azienda);");
    
    
    
    }else{
        
         print("Parametri mancanti, ripetere l'operazione.");
    }
            
           