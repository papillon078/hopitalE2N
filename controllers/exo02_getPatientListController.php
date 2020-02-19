<?php

// création d'une instance de classe Client
$patient = new Patient();

// affichage de la liste complète SI on ne fait pas de recherche
if (!isset($_POST['submit']) || empty($_POST['keywords']) || isset($_POST['fullList'])) {


// récupération de la liste des clients
    $lenght = ($_GET['page']-1)*10;
    
//appel de la methode qui va executer la requête
    $patientList = $patient->getPatientList($lenght);

// Si une recherche est detectée :     
} elseif (isset($_POST['submit']) && !empty($_POST['keywords'])) {

// récupération des données de recherche    
    $mySearch = '%'.htmlspecialchars($_POST['keywords']).'%';
    
    
// récupération de la liste des clients
    $patientList = $patient->getSearchList($mySearch);
    
}

// reception des notifications venant des autres vues (création, suppression de patients
if (isset($_SESSION['successMessage'])) {
    $message = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}
?>