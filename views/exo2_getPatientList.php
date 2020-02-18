<?php
session_start();
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../controllers/exo2_getPatientListController.php';
?>
<!doctype html>
<html lang=fr dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/partie2/assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link href="/partie2/assets/css/style.css" rel="stylesheet" />
        <title>PDO P2 exo2</title>
    </head>
    <body class="lightBody">
        <img class="seal" src="../assets/img/ban3.jpg" alt="seal"/>
        <?php include '../header.html'; ?>
        <div class="container">
            <div class="row">

                <?= isset($message) ? '<div class="alert alert-success col-12 text-center text-uppercase" role="alert">' . $message . '</div>' : '' ?>

                <button type="" name="submit" value="Envoi" class="col-12 btn btn-success mb-3">  
                    <a href="exo1_createPatient.php" class="redirection"> Ajouter un patient</a>
                </button>
                <h1>Liste des patients inscrits</h1>
                <table class="table table-striped text-center col-12 border border-primary mx-auto my-2">
                    <thead class="bg-warning">
                        <tr>
                            <th scope="col">nom</th>
                            <th scope="col">prénom</th>
                            <th scope="col">profil</th>
                            <th scope="col">supprimer le profil</th>
                        </tr>
                    </thead>
                    <?php
                    // foreach dans un tableau de tableau permet de choisir la colonne de la table de la BDD
                    foreach ($patientList as $item) {
                        ?>
                        <tr>
                            <td class="text-center"> <?= $item->lastname ?></td>
                            <td class="text-center"> <?= $item->firstname ?></td>
                            <td class="text-center">
                                <a href="exo9_getPatientAppointment.php?id=<?= $item->id ?>">Voir le profil</a>
                            </td>
                            <td class="text-center" data-toggle="modal" data-target="#deletePatient">
                                <button type="button" class="btn" data-toggle="modal" data-target="#deletePatient<?= $item->id ?>">
                                    <img src="../assets/img/deleteCross.png" alt="croix suppression" />
                                </a>
                                </button>
                            </td>
                        </tr>
                        <!-- modale de confirmation de suppression de patient -->
                        <div class="modal" id="deletePatient<?= $item->id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h2 class="modal-title">Patient : Mr/Me <?= $item->lastname ?></h2>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Voulez-vous vraiment supprimer le profil de ce patient de la base de données ?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">annuler</button>
                                        <a href="exo11_deletePatient.php?id=<?= $item->id ?>">Confirmer</a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </table>
            </div>
        </div>


        <?php include '../footer.html'; ?>
        <script src="/partie2/assets/libraries/jquery/jquery-3.4.1.min.js"></script>
        <script src="/partie2/assets/libraries/bootstrap-4.3.1-dist/js/bootstrap.min.js" rel="stylesheet"></script>
        <script src="/partie2/assets/js/script.js"></script>
    </body>

</html>
