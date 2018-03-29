<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");
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
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="go_to_modifica_contatto(<?php echo($un_contatto['id_contatto']); ?>)"><i class="material-icons">mode edit</i></a>
        <form  id='elimina_contatto_form' name='elimina_contatto_form' action="elimina_contatto.php" method='post'>    
            <input type="hidden" name="id_contatto" id="id_contatto" value="<?php echo($un_contatto['id_contatto']); ?>">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="elimina_contatto(<?php echo($un_contatto['id_contatto'].",'".$un_contatto['cognome']." ".$un_contatto['nome']."'"); ?>)"><i class="material-icons">delete</i></a>
        </form>  
        </div>
        <?php 
        } 
         
    }else{
        
         print("Errore: parametri mancanti, ripetere l'operazione.");
    }
            



