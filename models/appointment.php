<?php

class Appointment extends Database {
    
    // attributs 
    // (seront utilisés lorsque l'on récuperera des données à partir de formulaires)
    public $id;
    public $dateHour;
    public $idPatients;
    
    
    // initialisation du tableau d'erreurs
    public $formErrors = array();
    
    /**
     * connexion à la base de données
     * le constructeur hérite du construct de la classe parente
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * fermeture automatique de la connexion à la destruction de l'instance de classe
     */
    public function __destruct() {
        parent::__destruct();
    }

    /**
     * méthode permettant de créer un nouveau rendez-vous dans la BDD
     * @return boolean
     */
    public function addAppointment() {

        try {
            //definition de la requete SQL avec des marqueurs nommés
            $query = "INSERT INTO `appointments` (`dateHour`, `idPatients`)
                  VALUES
                  (:dateHour, :idPatients)";
            
            
            // preparation de la requete au serveur de bdd
            $result = $this->db->prepare($query);
            
            // association des marqueurs nommées aux véritables informations
                $result->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
                $result->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
                
                
            // execution de la requete
            // renvoi TRUE en cas de succès sinon FALSE là où j'appelle ma méthode addPatient(ctrl)
            return $result->execute();
            
            
        }
        //bloc catch de renvoi des erreurs
        catch (PDOException $e) {
            die('echec de la connexion : ' . $e->getMessage());
        }
    }
    
    /**
     * méthode permettant de récupérer la liste de tous les rendez-vous
     * @return array
     */
    public function getAppointmentList() {
        
        //definition de la requete SQL 
        $query = "  SELECT  `appointments`.`id`, 
                            `appointments`.`dateHour`,
                            `patients`.`lastname`,
                            `patients`.`firstname`,
                            DATE_FORMAT(`patients`.`birthdate`, '%e/%m/%Y') AS `birthdate`,
                            `patients`.`phone`,
                            `patients`.`mail`
                    FROM `patients`
                    INNER JOIN `appointments` ON `patients`.`id` = `appointments`.`idPatients`
                    ORDER BY `appointments`.`dateHour` DESC";
        
        // soumission de la requete au serveur de bdd
        $result = $this->db->query($query);
        
        // recuperation de la liste des rendez-vous sous forme d'un tableau d'objets
        return $result->fetchall(PDO::FETCH_OBJ);
         
    }  
    
    public function hasUniqueTimeSlot(){
        
        //definition de la requete SQL
        $query = 'SELECT `id`, `dateHour` FROM `appointments` WHERE `dateHour`= :dateHour';
        
        // preparation de la requete au serveur de bdd
            $result = $this->db->prepare($query);
            
        // association des marqueurs nommées aux véritables informations
            $result->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        
        try{
            $result->execute();
            
            // recuperation du premier créneau de rendez-vous correspondant trouvé dans un objet
            $foundAppointment = $result->fetch(PDO::FETCH_OBJ);
            
            // verification que le créneau du rendez-vous existe deja 
            if (is_object($foundAppointment)){
                return false;
            } else {
                return true;
            }
            
        } catch (PDOException $e) {
             die('erreur : ' . $e->getMessage());
        }
    }
    
    /**
     * méthode permettant de récupérer les détails d'un rendez-vous
     * @return array
     */
    public function getAppointmentProfile() {
        try{
        // définition de la requête sql
        $query ="  SELECT  `appointments`.`id`, 
                            DATE_FORMAT(`appointments`.`dateHour`, '%e/%m/%Y %H:%i') AS `dateHour`,
                            DATE_FORMAT(`appointments`.`dateHour`, '%Y-%m-%d %H:%i') AS `dateHourEN`,
                            `patients`.`lastname`,
                            `patients`.`firstname`,
                            DATE_FORMAT(`patients`.`birthdate`, '%e/%m/%Y') AS `birthdate`,
                            `patients`.`phone`,
                            `patients`.`mail`
                    FROM `patients`
                    INNER JOIN `appointments` ON `patients`.`id` = `appointments`.`idPatients`
                    WHERE `appointments`.`id` = :id"; 

         // soumission de la requête au serveur de la base de données
        $result = $this->db->prepare($query);

        // association des marqueurs nommés aux véritables informations
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);

        $result->execute();
        
        // récupération de la liste des patients sous forme d'un objets
        return $result->fetch(PDO::FETCH_OBJ);
        
    }
    catch (PDOException $e) {
        die('erreur : ' . $e->getMessage());
   }
}
 
    /**
     * méthode permettant de mettre à jour les rendez-vous dans la BDD
     * @return boolean
     */
    public function updateAppointment() {

        try {
            //definition de la requete SQL avec des marqueurs nommés
            $query = "  UPDATE  `appointments` 
                        SET     `dateHour` = :dateHour,
                                `idPatients` = :idPatients
                        WHERE   `id` = :id ";
            
            // preparation de la requete au serveur de bdd
            $result = $this->db->prepare($query);
            
            // association des marqueurs nommées aux véritables informations
                $result->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
                $result->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
                $result->bindValue(':id', $this->id, PDO::PARAM_INT);
                
            // execution de la requete
            // renvoi TRUE en cas de succès sinon FALSE là où j'appelle ma méthode addPatient(ctrl)
            return $result->execute();
            
            
        }
        //bloc catch de renvoi des erreurs
        catch (PDOException $e) {
            die('echec de la connexion : ' . $e->getMessage());
        }
    }
    
    /**
     * méthode permettant de récupérer la liste des rendez-vous d'un patient
     * @return array
     */
    public function getAppointmentListByPatient() {
        try{
        // définition de la requête sql
        $query ="  SELECT  DATE_FORMAT(`dateHour`, '%e/%m/%Y %H:%i') AS `dateHour`
                    FROM `appointments`
                    WHERE `idPatients` = :idPatients
                    ORDER BY `dateHour`"; 
        
         // soumission de la requête au serveur de la base de données
        $result = $this->db->prepare($query);

        // association des marqueurs nommés aux véritables informations
        $result->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);

        $result->execute();
        
        // récupération de la liste des patients sous forme d'un objets
        return $result->fetchAll(PDO::FETCH_OBJ);
        
    }
    catch (PDOException $e) {
        die('erreur : ' . $e->getMessage());
   }
}

 /**
     * méthode permettant de supprimer un redez-vous rendez-vous dans la BDD
     * @return boolean
     */
    public function deleteAppointment() {

        try {
            //definition de la requete SQL avec des marqueurs nommés
            $query = " DELETE FROM `appointments` 
                        WHERE   `id` = :id ";
            
            // preparation de la requete au serveur de bdd
            $result = $this->db->prepare($query);
            
            // association des marqueurs nommées aux véritables informations
                $result->bindValue(':id', $this->id, PDO::PARAM_INT);
                
            // execution de la requete
            // renvoi TRUE en cas de succès sinon FALSE là où j'appelle ma méthode addPatient(ctrl)
            return $result->execute();
            
            
        }
        //bloc catch de renvoi des erreurs
        catch (PDOException $e) {
            die('echec de la connexion : ' . $e->getMessage());
        }
    }
    
    
}