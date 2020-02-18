<?php

// condition pour s'assurer qu'on a un id et qu'il est positif sinon 
// on renvoie vers la liste des patients
if (isset($_GET['id']) && $_GET['id'] > 0) {

// création d'une instance de classe Client
    $patient = new Patient();

//renseignement de l'attribut id du profil recherché
    $patient->id = htmlspecialchars($_GET['id']);

// récupération du profil du patient recherché
    $patientProfile = $patient->getPatientProfile();

    //verification que la requete s'est bien passé
    if (!is_object($patientProfile)) {
        header('location:exo2_getPatientList.php');
        exit();
    }
} else {
    header('location:exo2_getPatientList.php');
    exit();
}
// lecture des notifications
if (isset($_SESSION['patientUpdated'])) {
    $message = $_SESSION['patientUpdated'];
    unset($_SESSION['patientUpdated']);
}
?>

