<?php

// création d'une instance de classe Client
$patient = new Patient();

// récupération de la liste des clients
$patientList = $patient->getPatientList();

if (isset($_SESSION['patientCreated'])){
    $message = $_SESSION['patientCreated'];
    unset($_SESSION['patientCreated']); 
}

if (isset($_SESSION['patientDeleted'])){
    $message = $_SESSION['patientDeleted'];
    unset($_SESSION['patientDeleted']); 
}
?>