<?php

// création d'une instance de classe Appointment
$appointment = new Appointment();

// récupération de la liste des rendez-vous
$appointmentList = $appointment->getAppointmentList();

// reception du message de notification de  succès venant de la page
//  de création de rendez-vous.
if (isset($_SESSION['appointmentDeleted'])) {
    $message = $_SESSION['appointmentDeleted'];
    unset($_SESSION['appointmentDeleted']);
}

// reception du message de notification de  succès venant de la page
//  de création de rendez-vous.
if (isset($_SESSION['appointmentCreated'])) {
    $message = $_SESSION['appointmentCreated'];
    unset($_SESSION['appointmentCreated']);
}
?>