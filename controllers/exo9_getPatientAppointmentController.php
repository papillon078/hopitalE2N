<?php

// condition pour s'assurer qu'on a un id et qu'il est positif sinon 
// on renvoie vers la liste des patients
if (isset($_GET['id']) && $_GET['id'] > 0) {

// création d'une instance de classe Client et Appointment
    $patient = new Patient();
    $appointment = new Appointment();

//renseignement de l'attribut id du profil recherché dans les 2 classes
    $patient->id = htmlspecialchars($_GET['id']);
    $appointment->idPatients = htmlspecialchars($_GET['id']);

// récupération du profil du patient recherché
    $patientProfile = $patient->getPatientProfile();
    $appointmentList = $appointment->getAppointmentListByPatient();

//vérification que les requêtes se sont bien passées
    if (!is_object($patientProfile) || !is_array($appointmentList)) {
        header('Location: ../views/exo11_deletePatient.php');
        exit();
    }
} else {
    header('location: ../views/exo11_deletePatient.php');
    exit();
}
// lecture des notifications
if (isset($_SESSION['patientUpdated'])) {
    $message = $_SESSION['patientUpdated'];
    unset($_SESSION['patientUpdated']);
}
?>

