<?php
session_start();
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../models/appointment.php';
require_once '../controllers/exo7_getAppointmentProfileController.php';
?>
<!doctype html>
<html lang=fr dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/partie2/assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link href="/partie2/assets/css/style.css" rel="stylesheet" />
        <title>PDO P2 exo7</title>
    </head>
    <body class="greyBody">
        <img class="seal" src="../assets/img/ban4.jpg" alt="seal"/>
        <?php include '../header.html'; ?>
        <div class="container">
            <?= isset($message) ? '<div class="alert alert-success col-12 text-center text-uppercase" role="alert">' . $message . '</div>' : '' ?>
            <div class="row">
                <h1 class="col-12 mt-3">Détails du rendez vous</h1>
                <!-- Affichage des détails du rendez-vous sélectionné dans la page d'affichage des rendez-vous -->
                <div class="col-6 my-3">
                    <h2>Le patient</h2>
                    <div class="row bg-light">
                        <div class="col-5 profileLeft border-bottom font-weight-bolder text-right py-2">Nom :</div><div class="col-7 border-bottom py-2"> <?= $appointmentProfile->lastname ?></div>
                        <div class="col-5 profileLeft border-bottom font-weight-bolder text-right py-2">Date du rendez-vous :</div><div class="col-7 border-bottom py-2"> <?= $dateHourArray[0] ?></div>
                        <div class="col-5 profileLeft border-bottom font-weight-bolder text-right py-2">Email :</div><div class="col-7 border-bottom py-2"> <?= $appointmentProfile->mail ?></div>
                        <div class="col-5 profileLeft border-bottom font-weight-bolder text-right py-2">Date de naissance :</div><div class="col-7 border-bottom py-2"> <?= $appointmentProfile->birthdate ?></div>
                    </div>
                </div>

                <div class="col-6 my-3">
                    <h2>son rendez-vous</h2>
                    <div class="row bg-light">
                        <div class="col-5 profileLeft border-bottom font-weight-bolder text-right py-2">Prénom :</div><div class="col-7 border-bottom py-2"> <?= $appointmentProfile->firstname ?></div>
                        <div class="col-5 profileLeft border-bottom font-weight-bolder text-right py-2">Heure du rendez-vous :</div><div class="col-7 border-bottom py-2"> <?= $dateHourArray[1] ?></div>
                        <div class="col-5 profileLeft border-bottom font-weight-bolder text-right py-2">N° téléphone :</div><div class="col-7 border-bottom py-2"> <?= $appointmentProfile->phone ?></div>
                    </div>
                </div>

                    <!-- Bouton de retour à la liste des rendez-vous -->
                    <div class="col-6 mt-3 justify-content-end">
                        <a href="exo10_deleteAppointment.php"><img src="../assets/img/patientListReturn.png" class="w-50" alt="fleche" /></a>
                    </div>

                    <!-- Bouton de modification du profil patient -->
                    <div class="col-6 mt-3">
                        <a href="exo8_updateAppointment.php?id=<?= $appointmentProfile->id ?>"><img src="../assets/img/profileUpdate.png" class="w-50" alt="fleche" /></a>
                    </div>
            </div>
        </div>
        <?php include '../footer.html'; ?>
        <script src="/partie2/assets/libraries/jquery/jquery-3.4.1.min.js"></script>
        <script src="/partie2/assets/libraries/bootstrap-4.3.1-dist/js/bootstrap.min.js" rel="stylesheet"></script>
        <script src="/partie2/assets/js/script.js"></script>
    </body>

</html>