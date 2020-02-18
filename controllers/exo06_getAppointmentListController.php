<?php

// création d'une instance de classe Appointment
$appointment = new Appointment();

// récupération de la liste des clients
$appointmentList = $appointment->getAppointmentList();

//reception des messages de notification (création ou suppression d'un rendez-vous
if (isset($_SESSION['successMessage'])){
    $message = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']); 
}
?>