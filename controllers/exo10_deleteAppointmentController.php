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
        $_SESSION['successMessage'] = 'Le rendez-vous a bien été supprimé';
        header('location: /partie2/views/exo06_getAppointmentList.php');
        exit();
    }
}

// 1ere arrivée sur la page pour pouvoir confirmer la suppression
    elseif (isset($_GET['id']) && $_GET['id']>0) {
    
     // Création d'une instance de classe Appointment()
    $appointment = new Appointment();

    // Recuperation du parametre d'url id
    $appointment->id = htmlspecialchars(intval($_GET['id']));

    // Recherche d'un rdv correspondant a l'id passé en paramètre d'URL
    $foundAppointment = $appointment->getAppointmentDetails();

    // SI aucun rdv n'est trouvé en base une redirection vers la page details rdv est appliquée
    if (!is_object($foundAppointment)) {
        // Permet de rediriger si un id qui existe pas
        header('Location: exo06_getAppointmentList.php');
        exit();
    }
}
// redirection en cas de probleme avec les parametres d'url
else{
    header('Location: exo06_getAppointmentList.php');
    exit();
}
?>