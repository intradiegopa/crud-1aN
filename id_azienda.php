<? header('Content-Type: application/json'); 
    require_once("database_lib.php");
    $db = new DB("localhost", "my_intradiego", "intradiego", "");
    $elenco=$db->elenca_aziende();
    $esito=array();
    $esito["Table"]=array();
    foreach ($elenco as $row) {
        $item=array(
        "ragione_sociale" => $row['ragione_sociale'],
        "id_azienda" => $row['id_azienda']);
         array_push($esito["Table"], $item);
    }
    echo json_encode($esito, JSON_NUMERIC_CHECK);