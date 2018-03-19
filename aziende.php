<?php
    require_once("database_lib.php");
    
    $db = new DB("localhost", "aziendajax", "root", "");

    $elenco=$db->elenca_aziende();

    foreach ($elenco as $row) {
    ?>            
        <div class="demo-card-square mdl-cell mdl-card mdl-cell--3-col mdl-shadow--2dp">
          <div class="mdl-card__title mdl-card--expand">
            <h2 class="mdl-card__title-text"><?php echo $row['ragione_sociale']; ?></h2>
          </div>
          <div class="mdl-card__supporting-text">
             <h6>P.IVA :</h6><a><?php echo $row['partita_iva'];?></a>
              <h6>Contatti:</h6>
            
                <?php
                    $contatti=$db->elenca_contatti_azienda($row['id_azienda']);
                    foreach ($contatti as $un_contatto) {
                    ?>            
              <div class="mdl-list__item">
                <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-avatar">person</i>
                  <span>
                      <?php echo ($un_contatto['titolo'].' '.$un_contatto['cognome'].' '.$un_contatto['nome']); ?>
                    </span>
                </span>
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick="go_to_visualizza_contatto(<?php echo($un_contatto['id_contatto']); ?>)"><i class="material-icons">star</i></a>
              </div>
                <?php } ?>
            </div>
            <div class="demo-list-action mdl-list">
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick=" go_to_visualizza_azienda(<?php echo $row['id_azienda']; ?>)">Visualizza</a>
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" onclick=" go_to_modifica_azienda(<?php echo $row['id_azienda']; ?>)">Modifica</a>
                </div>
             </div>
</div>
<?php }