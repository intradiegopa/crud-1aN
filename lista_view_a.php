<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "aziendajax", "root", "");
//<form  name='elimina_contatto_form' action="elimina_contatto.php" method='post'>
//</form>  
     if(  isset($_GET["id"]) )
    {  
        $contatti=$db->elenca_contatti_azienda($_GET["id"]);
        foreach ($contatti as $un_contatto) {
            ?>            
        <div class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
          <i class="material-icons mdl-list__item-avatar">person</i>
          <span>
              <?php echo ($un_contatto['titolo'].' '.$un_contatto['cognome'].' '.$un_contatto['nome']); ?>
            </span>
        </span>
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="go_to_visualizza_contatto(<?php echo($un_contatto['id_contatto']); ?>)"><i class="material-icons">remove_red_eye</i></a>
        </div>
        <?php 
        } 
         
    }else{
        
         print("Errore: parametri mancanti, ripetere l'operazione.");
    }
            



