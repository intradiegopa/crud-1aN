<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");
    
    if( isset($_POST[id_contatto_dw]) && !empty($_POST[id_contatto_dw]) && isset($_POST[id_azienda_dw]) && !empty($_POST[id_azienda_dw])  )
    {   
        $telefono="";
        $email=""; 
        $cognome="";
        $nome="";
        $titolo="";
        
        $id_azienda = $_POST[id_azienda_dw];
        $id = $_POST[id_contatto_dw];
        
        if( isset($_POST[cognome_dw])  && !empty($_POST[cognome_dw]) )  $cognome = $_POST[cognome_dw];
            
        if( isset($_POST[nome_dw])  && !empty($_POST[nome_dw]) )  $nome = $_POST[nome_dw];
        
        if( isset($_POST[telefono_dw]) && !empty($_POST[telefono_dw]) ) $telefono = $_POST[telefono_dw];
        
        if( isset($_POST[email_dw]) && !empty($_POST[email_dw]) ) $email = $_POST[email_dw];
        
        if( isset($_POST[titolo_dw]) && !empty($_POST[titolo_dw]) ) $email = $_POST[titolo_dw];
        
        $esito = $db->modifica_contatto($id, $nome, $cognome, $email, $telefono, $titolo, $id_azienda);
        
        if ($esito=="Error!")
            
            print("Si sono verificati errori, ripetere l'operazione.");
        
        else
            
            print("Il contatto è stato modificato correttamente($id).");
    
    }else{
        
     print("Parametri mancanti, ripetere l'operazione.");
    }
