<?php

if (isset($_GET['id']) && $_GET['id'] > 0) {

// création d'une instance de classe Client
    $patient = new Patient();

//renseignement de l'id du patient à effacer    
    $patient->id = htmlspecialchars($_GET['id']);

// insertion des données des patients
    $success = $patient->deletePatient();

// création d'un message de confirmation, si la requète a bien réussie        
    if ($success) {
        $_SESSION['patientDeleted'] = 'Le patient a bien été retiré de la base de donnée';
        header('location: /partie2/views/exo2_getPatientList.php');
        exit();
    }
} else {
    header('location: /partie2/views/exo2_getPatientList.php');
    exit();
}

if (isset($_SESSION['patientCreated'])) {
    $message = $_SESSION['patientCreated'];
    unset($_SESSION['patientCreated']);
}
if (isset($_SESSION['patientDeleted'])) {
    $message = $_SESSION['patientDeleted'];
    unset($_SESSION['patientDeleted']);
}
?>