<?php
session_start();
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../models/appointment.php';
require_once '../controllers/exo10_deleteAppointmentController.php';
?>
<!doctype html>
<html lang=fr dir="ltr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <title>PDO P2 exo10</title>
    </head>

    <body class="lightBody">
        <img class="seal" src="../assets/img/ban1.jpg" alt="seal"/>
        <?php include '../header.html'; ?>
        <div class="container">
            <h1>Suppression d'un rendez-vous</h1>
            <!-- card bootstrap de confirmation de suppression de rendez-vous -->
            <div class="card my-5 mx-auto" style="width: 30rem;">
                <div class="card-body">
                    <h2 class="card-title h4 py-4">Voulez-vous supprimer ce rendez-vous ?</h2>
                        <a href="exo06_getAppointmentList.php" class="card-link bg-danger text-white p-2 rounded mx-auto">Annuler</a>
                        <a href="exo10_deleteAppointment.php?id=<?= $appointment->id . '&confirm=true' ?>" class="card-link bg-success text-white p-2 rounded mx-auto">Confirmer</a>
                </div>
            </div>
        </div>

        <?php include '../footer.html'; ?>
        <script src="../assets/libraries/jquery/jquery-3.4.1.min.js"></script>
        <script src="../assets/libraries/bootstrap-4.3.1-dist/js/bootstrap.min.js" rel="stylesheet"></script>
        <script src="../assets/js/script.js"></script>
    </body>

</html>
