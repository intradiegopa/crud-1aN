<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");
    
    if( isset($_POST[id_azienda_up]) && !empty($_POST[id_azienda_up]) && isset($_POST[piva_up]) && !empty($_POST[piva_up])  )
    {   
        $telefono="";
        $nome="";    
        $email=""; 
        
        $id = $_POST[id_azienda_up];
        
        $piva = $_POST[piva_up];
        
        if( isset($_POST[nome_up])  && !empty($_POST[nome_up]) ) $nome = $_POST[nome_up];
        
        if( isset($_POST[telefono_up]) && !empty($_POST[telefono_up]) ) $telefono = $_POST[telefono_up];
        
        if( isset($_POST[email_up]) && !empty($_POST[email_up]) ) $email = $_POST[email_up];
        
        $esito = $db->modifica_azienda($id, $nome, $piva, $telefono, $email);
        
        if ($esito=="Error!")
            
            print("Si sono verificati errori, ripetere l'operazione.");
        
        else
            
            print("L'azienda è stata modificata correttamente($id).");
    
    }else{
        
     print("Parametri mancanti, ripetere l'operazione.");
    }