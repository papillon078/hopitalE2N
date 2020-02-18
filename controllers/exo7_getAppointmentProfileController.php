<?php

// condition pour s'assurer qu'on a un id et qu'il est positif sinon 
// on renvoie vers la liste des rendez-vous
if (isset($_GET['id']) && $_GET['id'] > 0) {

// création d'une instance de classe Client
    $appointment = new Appointment();

//renseignement de l'attribut id du rendez-vous recherché
    $appointment->id = htmlspecialchars($_GET['id']);

// récupération du profil du patient recherché
    $appointmentProfile = $appointment->getAppointmentProfile();

// parsing de dateHour pour separer la date et l'heure du rendez-vous
    $dateHourArray = explode (' ', $appointmentProfile->dateHour);

// verification que la requete s'est bien passé
    if (!is_object($appointmentProfile)) {
        header('location:exo6_getAppointmentList.php');
        exit();
    }
} else {
    header('location:exo6_getAppointmentList.php');
    exit();
}

// lecture des notifications
if (isset($_SESSION['appointmentUpdated'])) {
    $message = $_SESSION['appointmentUpdated'];
    unset($_SESSION['appointmentUpdated']);
}

?>

