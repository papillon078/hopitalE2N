<?php
session_start();
require_once '../init/function.php';
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../models/appointment.php';
require_once '../controllers/exo03_getPatientProfileController.php';
?>
<!doctype html>
<html lang=fr dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link href="../assets/css/style.css" rel="stylesheet" />
        <title>PDO P2 exo 03</title>
    </head>
    <body class="greyBody">
        <img class="seal" src="../assets/img/ban4.jpg" alt="seal"/>
        <?php include '../header.html'; ?>
        <div class="container">
            <div class="row">

                <!-- Lecture des notifications -->
                <?= isset($message) ? '<div class="alert alert-success col-12 text-center text-uppercase" role="alert">' . $message . '</div>' : '' ?>

                <h1 class="col-12 mt-3">Fiche du patient et de ses rendez-vous</h1>
                <!-- Affichage du profil du patient sélectionné dans la page d'affichage des patients -->
                <div class="col-6 my-3">
                    <div class="row bg-light">
                        <div class="col-4 profileLeft border-bottom font-weight-bolder text-right py-2">Nom :</div><div class="col-8 border-bottom py-2"> <?= $patientProfile->lastname ?></div>
                        <div class="col-4 profileLeft border-bottom font-weight-bolder text-right py-2">Prénom :</div><div class="col-8 border-bottom py-2"> <?= $patientProfile->firstname ?></div>
                        <div class="col-4 profileLeft border-bottom font-weight-bolder text-right py-2">Email :</div><div class="col-8 border-bottom py-2"> <?= $patientProfile->mail ?></div>
                        <div class="col-4 profileLeft border-bottom font-weight-bolder text-right py-2">N° téléphone :</div><div class="col-8 border-bottom py-2"> <?= $patientProfile->phone ?></div>
                        <div class="col-4 profileLeft border-bottom font-weight-bolder text-right py-2">Date de naissance :</div><div class="col-8 border-bottom py-2"> <?= $patientProfile->birthdate ?></div>
                    </div>
                </div>

                <!-- Bouton de retour à la liste des rendez-vous -->
                <div class="col mt-3">
                    <a href="exo02_getPatientList.php"><img src="../assets/img/patientListReturn.png" class="w-75" alt="fleche" /></a>
                </div>

                <!-- Bouton de modification du profil patient -->
                <div class="col mt-3">
                    <a href="exo04_updatePatient.php?id=<?= $patientProfile->id ?>"><img src="../assets/img/profileUpdate.png" class="w-75" alt="fleche" /></a>
                </div>
            </div>
            <div class="row">

                <!-- vérification qu'il existe au moins un  rendez-vous à afficher
                <?php if (empty($appointmentList)) {
                    
                } else { ?>
        
                    <!-- tableau d'affichages des rendez-vous du patient -->
                    <table class="table table-striped text-center col-4 border border-primary my-2">
                        <thead class="bg-warning">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Heure</th>
                            </tr>
                        </thead>
                        <?php
                        // foreach dans un tableau de tableau permet de choisir la colonne de la table de la BDD
                        foreach ($appointmentList as $item) {

                            // parsing de dateHour pour separer la date et l'heure du rendez-vous
                            // pour les mettre dans un tableau
                            $dateHourArray = explode(' ', $item->dateHour);
                            ?>
                            <tr>
                                <td class="text-center"> <?= $dateHourArray[0] ?></td>
                                <td class="text-center"> <?= $dateHourArray[1] ?></td>
                            </tr>
                    <?php } ?>
                    </table>
        <?php } ?>
            </div>
        </div>
<?php include '../footer.html'; ?>
        <script src="../assets/libraries/jquery/jquery-3.4.1.min.js"></script>
        <script src="../assets/libraries/bootstrap-4.3.1-dist/js/bootstrap.min.js" rel="stylesheet"></script>
        <script src="../assets/js/script.js"></script>
    </body>

</html>