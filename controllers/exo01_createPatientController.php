<?php


//definition des regex pour la validation du formulaire
define('REGEX_NAME', '/^[a-zA-ZÀ-ÿ’ -]+$/');
define('REGEX_BIRTHDATE', '/^(19|20)[0-9]{2}-[0-9]{2}-[0-9]{2}$/');
define('REGEX_PHONE', '/^(0|\+33)[1-9]([-\. ]?[0-9]{2}){4}$/');
define('REGEX_MAIL', '/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]{2,}\.[a-z]{2,4}$/');

// Initialisation du tableau des erreurs dans la classe Patients
// Gestion d'erreur générale d'envoi du formulaire
if (isset($_POST['submit'])) {

// création d'une instance de classe Patient
    $patient = new Patient();
    
// récupération des données du formulaire
    $patient->lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
    $patient->firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $patient->birthdate = isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : '';
    $patient->phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $patient->mail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';

    
    
// validation du nom de famille
    if (empty($patient->lastname)) {
        $patient->formErrors['lastname'] = 'veuillez remplir ce champ';
    } elseif (!preg_match(REGEX_NAME, $patient->lastname)) {
        $patient->formErrors['lastname'] = 'veuillez entrer un nom valide';
    } elseif (strlen($patient->lastname) < 2 || strlen($patient->lastname) > 25) {
        $patient->formErrors['lastname'] = 'veuillez entrer un nom entre 2 et 25 caractères';
    }

// validation du prénom
    if (empty($patient->firstname)) {
        $patient->formErrors['firstname'] = 'veuillez remplir ce champ';
    } elseif (!preg_match(REGEX_NAME, $patient->lastname)) {
        $patient->formErrors['firstname'] = 'veuillez entrer un nom valide';
    } elseif (strlen($patient->firstname) < 2 || strlen($patient->firstname) > 25) {
        $patient->formErrors['firstname'] = 'veuillez entrer un nom entre 2 et 25 caractères';
    }

// validation de la date de naissance
    if (empty($patient->birthdate)) {
        $patient->formErrors['birthdate'] = 'Ce champ est vide';
    } elseif (!preg_match(REGEX_BIRTHDATE, $patient->birthdate)) {
        $patient->formErrors['birthdate'] = 'Ce champ n\'est pas valide';
    } elseif(strtotime($patient->birthdate) > time()){
        $patient->formErrors['birthdate'] = 'veuillez entrer une date antérieur à la date du jour';
    }

// validation du numéro de téléphone
    if (empty($patient->phone)) {
        $patient->formErrors['phone'] = 'Ce champ est vide';
    } elseif (!preg_match(REGEX_PHONE, $patient->phone)) {
        $patient->formErrors['phone'] = 'Ce champ n\'est pas valide';
    } elseif (strlen($patient->phone) < 10 || strlen($patient->phone) > 25) {
        $patient->formErrors['phone'] = 'Le numéro de téléphone doit comporter minimum 10 chiffres';
    }

// validation de l'adresse mail
    if (empty($patient->mail)) {
        $patient->formErrors['mail'] = 'Ce champ est vide';
    } elseif (!preg_match(REGEX_MAIL, $patient->mail)) {
        $patient->formErrors['mail'] = 'Ce champ n\'est pas valide';
    } elseif (strlen($patient->mail) < 5 || strlen($patient->mail) > 100) {
        $patient->formErrors['mail'] = 'L\'adresse e-mail doit comporter entre 5 et 100 caractères';
    }elseif(!$patient->hasUniqueMail()){
        $patient->formErrors['mail'] = 'L\'adresse e-mail existe deja, ce patient est peut-être deja enregistré';
    }
    
// vérification que tous les champs sont prêts à etre envoyés 
    if (empty($patient->formErrors)) {
    
// insertion des données des patients
        $success = $patient->addPatient();
        if ($success){
        $_SESSION['successMessage'] = 'Le patient a bien été ajouté';
        header('location: /partie2/views/exo02_getPatientList.php');
        exit();
        }
    }
}
?>