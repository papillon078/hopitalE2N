<?php

// création d'une instance de classe Client
$patient = new Patient();

// récupération de la liste des clients
$patientList = $patient->getPatientList();

// reception des notifications venant des autres vues (création, suppression de patients
if (isset($_SESSION['successMessage'])){
    $message = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']); 
}

?>