<?php
session_start();
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../models/appointment.php';
require_once '../controllers/deleteAppointmentController.php';
?>
<!doctype html>
<html lang=fr dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/partie2/assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link href="/partie2/assets/css/style.css" rel="stylesheet" />
        <title>PDO P2 exo10</title>
    </head>
    <body class="lightBody">
        <img class="seal" src="../assets/img/killian.jpg" alt="seal"/>
        <?php include '../header.html'; ?>
        <div class="container">
            <div class="card my-5 mx-auto" style="width: 30rem;">
                <div class="card-body">
                    <h1 class="card-title">Voulez-vous supprimer ce rendez-vous ?</h1>
                    <a href="exo10_deleteAppointment.php" class="card-link">Annuler</a>
                    <a href="deleteAppointment.php?id=<?= $appointment->id.'&confirm=true' ?>" class="card-link">Confirmer</a>
                </div>
            </div>
        </div
        <?php include '../footer.html'; ?>
        <script src="/partie2/assets/libraries/jquery/jquery-3.4.1.min.js"></script>
        <script src="/partie2/assets/libraries/bootstrap-4.3.1-dist/js/bootstrap.min.js" rel="stylesheet"></script>
        <script src="/partie2/assets/js/script.js"></script>
    </body>

</html>
