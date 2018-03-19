<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "aziendajax", "root", "");

    if(  isset($_GET["id"]) )
    {  
        //echo $_GET["id"];
        $esito = $db->un_contatto($_GET["id"]);
        
        //echo var_dump($esito);
        
//31array(1) { [0]=> array(7) { ["id_contatto"]=> string(2) "31" ["nome"]=> string(10) "Fitzgerald" ["cognome"]=> string(6) "Alston" ["email"]=> string(22) "dui@sodalespurusin.net" ["telefono"]=> string(14) "+39 658 337595" ["titolo"]=> string(4) "Ing." ["id_azienda"]=> string(2) "31" } }
            ?>


                <div  class='mdl-card mdl-cell--6-col mdl-shadow--2dp'>
                <div class='mdl-card__title mdl-color--primary mdl-color-text--white'>
                    <h2 class="mdl-card__title-text">Modifica Contatto</h2>
                </div>
                <div class='mdl-card__supporting-text'>
                    <form  name='modifica_contatto' id='modifica_contatto'  action="modifica_contatto.php" method='post'>
                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="titolo" name="titolo">
                  <option></option>
                  <option value="Sig.">Sig.</option>
                    <option value="Sig.ra">Sig.ra</option>
                    <option value="Agente">Agente</option>
                    <option value="Ing.">Ing.</option>
                    <option value="Dott.">Dott.</option>
                    <option value="Dott.ssa">Dott.ssa</option>
                    </select>
                    <label class="mdl-textfield__label" for="titolo">Titolo</label>
                  </div>
                    
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="cognome" id="cognome" text="<?php echo $esito["cognome"]; ?>" >
                <label class="mdl-textfield__label" for="cognome">Cognome</label>
              </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="nome" id="nome" text="<?php echo $esito["nome"]; ?>" >
                <label class="mdl-textfield__label" for="nome">Nome</label>
              </div>   
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="email" id="email" text="<?php echo $esito["email"]; ?>">
                <label class="mdl-textfield__label" for="email">Email</label>
              </div>
            
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="telefono" id="telefono" text="<?php echo ($esito[telefono]); ?>" >
                <label class="mdl-textfield__label" for="telefono">Telefono</label>
              </div>
           <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="id_azienda" id="id_azienda" text="<?php echo ($esito[id_azienda]); ?>" >
                <label class="mdl-textfield__label" for="id_azienda">id azienda</label>
              </div>
            <fieldset>
                <legend><b>Sesso</b></legend>
                <label class = "mdl-radio mdl-js-radio mdl-js-ripple-effect" for = "maschile">
                  <input class="mdl-radio__button" type="radio" id="maschile" name="genere" checked/>  <span class = "mdl-radio__label">Maschile</span>
                </label>
                <label class = "mdl-radio mdl-js-radio mdl-js-ripple-effect" for = "femminile">
                  <input class="mdl-radio__button" type="radio" id="femminile" name="genere" checked/>  <span class = "mdl-radio__label">Femminile</span>
                </label>
                <label class = "mdl-radio mdl-js-radio mdl-js-ripple-effect" for = "altro">
                  <input class="mdl-radio__button" type="radio" id="altro" name="genere" checked/>  <span class = "mdl-radio__label">Altro</span>
                </label>
            </fieldset>
                        <div class='mdl-card__actions mdl-card--border'>
                            <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit" name="submit" onclick='submit()'>OK</button>
                            <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="back" name="back" >Annulla</button>
                            <form  name='elimina_contatto' id='elimina_contatto'  action="elimina_contatto.php" method='post'>
                                <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="delete" name="delete" >Elimina</button>
                                <input type="hidden" name="id_contatto" id="id_contatto" value="4">
                            </form>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            
            
    
    }else{
        
         print("Errore: parametri mancanti, ripetere l'operazione.");
    }
            




 