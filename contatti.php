<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "my_intradiego", "intradiego", "");

    $elenco=$db->elenca_contatti();

    foreach ($elenco as $row) {
    ?>            
        <div class="demo-card-square mdl-cell mdl-card mdl-cell--3-col mdl-shadow--2dp" name="<?php echo( strtolower( "$row[titolo] $row[cognome] $row[nome]" )); ?>">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text">
                <?php echo "$row[titolo] $row[cognome] $row[nome]"; ?>
            </h2>
          </div>
          <div class="mdl-card__supporting-text">
              Email: <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a>
              Telefono: <a href="tel:<?php echo $row['telefono'];?>"><?php echo $row['telefono'];?></a>
            </div>
        <div class="mdl-card__actions mdl-card--border">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick=" go_to_visualizza_contatto(<?php echo $row[id_contatto]; ?>)">Visualizza</a>
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick=" go_to_visualizza_azienda(<?php echo $row[id_azienda]; ?>)">Azienda</a>
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick=" go_to_modifica_contatto(<?php echo $row[id_contatto]; ?>)">Modifica</a>
        </div>
     </div>
<?php }