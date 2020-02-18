<?php
// cette vue ne sera pas affichée car pour la suppression d'un patient, on est
//  immédiatement redirigé vers la page liste des patients
session_start();
require_once '../models/database.php';
require_once '../models/patient.php';
// le controleur va utiliser le parametre id dans l'url de cette page pour 
// effacer le bon patient puis faire la redirection
require_once '../controllers/exo11_deletePatientController.php';
?>