<?php

// création d'une instance de classe Appointment
$appointment = new Appointment();

// récupération de la liste des clients
$appointmentList = $appointment->getAppointmentList();

if (isset($_SESSION['appointmentCreated'])){
    $message = $_SESSION['appointmentCreated'];
    unset($_SESSION['appointmentCreated']); 
}
?>