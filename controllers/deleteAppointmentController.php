<?php

// detection de l'appui sur le bouton confirmation
// grace au parametre confirm = true detecté dans l'url
// et verification de la présence de l'id
if (isset($_GET['id']) && $_GET['id']>0 && isset($_GET['confirm']) && $_GET['confirm']){

//création d'une instance de la classe Appointment
$appointment = new Appointment();

//renseignement de l'attribut id du rendez-vous à supprimer
$appointment->id = htmlspecialchars($_GET['id']);

// execution de la requete de suppression
    $success = $appointment->deleteAppointment();

// création d'un message de confirmation, si la suppression a bien réussie        
    if ($success) {
        $_SESSION['appointmentDeleted'] = 'Le rendez-vous a bien été supprimé';
        header('location: /partie2/views/exo10_deleteAppointment.php');
        exit();
    }
    
// redirection en cas de probleme avec les parametres d'url
}else{
    header('Location: exo10_deleteAppointment.php');
    exit();
}
?>