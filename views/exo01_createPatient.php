<?php
session_start();
require_once '../models/database.php';
require_once '../models/patient.php';
require_once '../controllers/exo01_createPatientController.php';
?>
<!doctype html>
<html lang=fr dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/partie2/assets/libraries/bootstrap-4.3.1-dist/css/bootstrap.min.css" />
        <link href="/partie2/assets/css/style.css" rel="stylesheet" />
        <title>PDO P2 exo 01</title>
    </head>
    <body class="lightBody">
        <img class="seal" src="../assets/img/banExo1.jpg" alt="seal"/>
        <?php include '../header.html'; ?>
        <div class="container">
            <section class"lightBody">
                     <div class="my-5">
                    <h1>Formulaire d'inscription</h1>
                    <p>Pour notre ami il est deja trop tard, ne laissez pas passer votre chance, inscrivez vous !</p>
                    <!-- Début du formulaire d'inscription-->
                    <form action="#" method="POST" class="was-invalidated">
                        <div class="row">
                            <!-- 1ere section-->
                            <fieldset class="border py-2 col-6">
                                <!-- Champ nom-->
                                <label for="lastname">votre nom</label>
                                <input type="text" name="lastname" class="<?= !isset($_POST['submit']) ? '' : (empty($patient->formErrors['lastname']) ? 'is-valid' : 'is-invalid') ?> form-control "
                                       id="lastname" placeholder="ex: Dupont" value="<?= isset($patient->lastname) ? $patient->lastname : '' ?>" />
                                <div class="<?= empty($patient->formErrors['lastname']) ? 'valid-feedback' : 'invalid-feedback' ?>">
                                    <?= isset($patient->formErrors['lastname']) ? $patient->formErrors['lastname'] : 'champ correct' ?>
                                </div>
                                <!-- Champ prénom -->
                                <label for="firstname">votre prénom</label>
                                <input type="text" name="firstname" class="<?= !isset($_POST['submit']) ? '' : (empty($patient->formErrors['firstname']) ? 'is-valid' : 'is-invalid') ?> form-control "
                                       id="firstname" placeholder="ex: Jean" value="<?= isset($patient->firstname) ? $patient->firstname : '' ?>" />
                                <div class="<?= empty($patient->formErrors['firstname']) ? 'valid-feedback' : 'invalid-feedback' ?>">
                                    <?= isset($patient->formErrors['firstname']) ? $patient->formErrors['firstname'] : 'champ correct' ?>
                                </div>
                                <!-- Champ date de naissance-->
                                <label for="birthDate">votre date de naissance</label>
                                <input type="date" name="birthdate" class="<?= !isset($_POST['submit']) ? '' : (empty($patient->formErrors['birthdate']) ? 'is-valid' : 'is-invalid') ?> form-control " 
                                       id="birthDate" value="<?= isset($patient->birthdate) ? $patient->birthdate : '' ?>" />
                                <div class="<?= empty($patient->formErrors['birthdate']) ? 'valid-feedback' : 'invalid-feedback' ?>">
                                    <?= isset($patient->formErrors['birthdate']) ? $patient->formErrors['birthdate'] : 'champ correct' ?>
                                </div>
                                <!-- Champ téléphone-->
                                <label for="phone">votre numéro de téléphone</label>
                                <input type="text" name="phone" class="<?= !isset($_POST['submit']) ? '' : (empty($patient->formErrors['phone']) ? 'is-valid' : 'is-invalid') ?> form-control " 
                                       id="phone" placeholder="ex: 06.06.06.06.06" value="<?= isset($patient->phone) ? $patient->phone : '' ?>" />
                                <div class="<?= empty($patient->formErrors['phone']) ? 'valid-feedback' : 'invalid-feedback' ?>">
                                    <?= isset($patient->formErrors['phone']) ? $patient->formErrors['phone'] : 'champ correct' ?>
                                </div>
                                <!-- Champ email-->
                                <label for="email">votre adresse mail</label>
                                <input type="email" name="mail" class="<?= !isset($_POST['submit']) ? '' : (empty($patient->formErrors['mail']) ? 'is-valid' : 'is-invalid') ?> form-control " 
                                       id="email" placeholder="ex: Jean.Dupont@gmail.com" value="<?= isset($patient->mail) ? $patient->mail : '' ?>" />
                                <div class="<?= empty($patient->formErrors['mail']) ? 'valid-feedback' : 'invalid-feedback' ?>">
                                    <?= isset($patient->formErrors['mail']) ? $patient->formErrors['mail'] : 'champ correct' ?>
                                </div>
                            </fieldset>
                        </div><!-- fin row-->
                        
                            <input type="submit" name="submit" value="Envoyer" class="btn btn-success submit my-2 col-6" />
                        
                    </form>
                </div>
            </section>
        </div>
        <?php include '../footer.html'; ?>
        <script src="/partie2/assets/libraries/jquery/jquery-3.4.1.min.js"></script>
        <script src="/partie2/assets/libraries/bootstrap-4.3.1-dist/js/bootstrap.min.js" rel="stylesheet"></script>
        <script src="/partie2/assets/js/script.js"></script>
    </body>
</html>
