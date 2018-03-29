<?php
class DB {
        private $pdo;
        public function __construct($host, $dbname, $username, $password) {
                 try{
                    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->pdo = $pdo;
                }
                catch(PDOException $e){
                    //$error = $e->getMessage();
                }
        }
        public function elimina_azienda($id) {
            
            $query = "DELETE FROM Contatti WHERE id_azienda=$id;";
            $statement = $this->pdo->prepare($query);
            try { 
                $statement->execute();
                $query = "DELETE FROM Aziende WHERE id_azienda=$id;";
                $statement = $this->pdo->prepare($query);
                
                return $statement->rowCount();
                
            } catch(PDOExecption $e) {  
                return "Error!"; 
            }
            
        }
        public function elimina_contatto($id) {
            
            $query = "DELETE FROM Contatti WHERE id_contatto=$id;";
            $statement = $this->pdo->prepare($query);
            try { 
                $statement->execute();
                return $statement->rowCount();
                
            } catch(PDOExecption $e) {  
                return "Error!"; 
            }
            
        }
        public function inserisci_contatto($nome, $cognome, $email, $telefono, $titolo, $id_azienda) {
            
            $query = "INSERT INTO Contatti (nome, cognome, email, telefono, titolo, id_azienda)
                VALUES ('$nome', '$cognome', '$email', '$telefono', '$titolo', '$id_azienda');";
            $statement = $this->pdo->prepare($query);
            try { 
                $statement->execute();
                return $this->pdo->lastInsertId();
                
            } catch(PDOExecption $e) {  
                return "Error!"; 
            }
            
        }
    public function modifica_contatto($id, $nome, $cognome, $email, $telefono, $titolo, $id_azienda) {
            
            $query = "UPDATE Contatti SET nome = '$nome', cognome = '$cognome', email = '$email', telefono = '$telefono', titolo = '$titolo', id_azienda = '$id_azienda' WHERE id_contatto = $id;";
            $statement = $this->pdo->prepare($query);
            try { 
                $statement->execute();
                return $statement->rowCount();
                
            } catch(PDOExecption $e) {  
                return "Error!"; 
            }
            
        }
    public function inserisci_azienda($nome, $piva, $telefono, $email) {
                $query = "INSERT INTO Aziende (ragione_sociale, partita_iva, centralino, email)
                VALUES ('$nome', '$piva', '$telefono', '$email');";
                $statement = $this->pdo->prepare($query);
            try { 
                $statement->execute();
                return $this->pdo->lastInsertId();
                
            } catch(PDOExecption $e) {  
                return "Error!"; 
            }
        }
    public function modifica_azienda($id, $nome, $piva, $telefono, $email) {
                $query = "UPDATE Aziende SET ragione_sociale = '$nome' , partita_iva = '$piva' , centralino = '$telefono' , email = '$email' WHERE id_azienda = $id;";
                $statement = $this->pdo->prepare($query);
            try { 
                $statement->execute();
                return $statement->rowCount();
                
            } catch(PDOExecption $e) {  
                return "Error!"; 
            }
        }
    public function elenca_aziende() {
                $query = "SELECT * FROM Aziende ORDER BY ragione_sociale ";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }
    public function elenca_una_azienda($id_azienda) {
                $query = "SELECT * FROM Aziende WHERE id_azienda=$id_azienda limit 1";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }
    public function un_contatto($id) {
                $query = "SELECT * FROM Contatti WHERE id_contatto = $id limit 1;";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }
    public function elenca_contatti() {
                $query = "SELECT * FROM Contatti ORDER BY Cognome, Nome ";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }
    public function elenca_contatti_azienda($id_azienda){
                $id_azienda = trim(filter_var($id_azienda, FILTER_SANITIZE_STRING));
                $query = "SELECT * FROM Contatti WHERE id_azienda=$id_azienda ORDER BY Cognome, Nome;";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }
    public function seleziona_una_azienda($id_azienda){
                $id_azienda = trim(filter_var($id_azienda, FILTER_SANITIZE_STRING));
                $query = "SELECT * FROM Aziende WHERE id_azienda=$id_azienda;";
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $data;
        }
    public function query($query) {
                $statement = $this->pdo->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll();
                return $data;
        }  
}
?>