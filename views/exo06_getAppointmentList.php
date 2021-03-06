<?php
session_start();
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../models/appointment.php';
require_once '../controllers/exo06_getAppointmentListController.php';
?>
<!doctype html>
<html lang=fr dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <title>PDO P2 exo06</title>
    </head>
    <body class="lightBody">
        <img class="seal" src="../assets/img/ban3.jpg" alt="seal"/>
        <?php include '../header.html'; ?>
        <div class="container">
            <div class="row">

                <!--lecture des notifications -->
                <?= isset($message) ? '<div class="alert alert-success col-12 text-center text-uppercase" role="alert">' . $message . '</div>' : '' ?>

                <!-- redirection vers la création d'un nouveau rendez-vous -->
                <button type="" name="submit" value="Envoi" class="col-12 btn btn-success mb-3">  
                    <a href="exo05_createAppointment.php" class="redirection"> Ajouter un Rendez-vous</a>
                </button>

                <!-- tableau listant les rendez-vous et les options de detail et suppression -->
                <table class="table table-striped text-center col-12 border border-primary mx-auto my-2">
                    <thead class="bg-warning">
                        <tr>
                            <th scope="col">date</th>
                            <th scope="col">nom</th>
                            <th scope="col">prénom</th>
                            <th scope="col">détails du rendez-vous</th>
                            <th scope="col">supprimer</th>
                        </tr>
                    </thead>
                    <?php
                    // foreach dans un tableau de tableau permet de choisir la colonne de la table de la BDD
                    foreach ($appointmentList as $item) {
                        ?>
                        <tr>
                            <td class="text-center"> <?= $item->dateHour ?></td>
                            <td class="text-center"> <?= $item->lastname ?></td>
                            <td class="text-center"> <?= $item->firstname ?></td>
                            <td class="text-center">
                                <a href="exo07_getAppointmentProfile.php?id=<?= $item->id ?>">Voir le rendez-vous</a>
                            </td>
                            <td class="text-center">
                                <a href="exo10_deleteAppointment.php?id=<?= $item->id ?>"><img src="../assets/img/deleteCross.png" alt="croix suppression" /></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <?php include '../footer.html'; ?>
        <script src="../assets/libraries/jquery/jquery-3.4.1.min.js"></script>
        <script src="../assets/libraries/bootstrap-4.3.1-dist/js/bootstrap.min.js" rel="stylesheet"></script>
        <script src="..assets/js/script.js"></script>
    </body>

</html>
