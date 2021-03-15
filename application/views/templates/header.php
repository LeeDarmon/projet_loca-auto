<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

    <title><?= $title ?></title>
</head>

<body>
    <?php if ($title == 'Bienvenue sur Loca-Auto !') {; ?>
        <!-- Header -->
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center text-center" id="headerSection">
                <div class="col-md-12">
                    <h1 id="titleHeader">Loca-Auto</h1>
                </div>
            </div>
        </div>
    <?php
    };
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= base_url(); ?>">Loca-Auto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <!-- <i class="fas fa-car"></i> -->
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex flex-column flex-md-row w-100">
                <div class="left-navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url(); ?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('Vehicle_controller/listVehicles/') ?>">Louer une voiture</a>
                        </li>
                    </ul>
                </div>

                <div class="right-navbar ml-md-auto">
                    <ul class="navbar-nav">
                        <?php if (isset($_SESSION['id'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Customer_controller/profil/' . $_SESSION['id']) ?>">Mon profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Customer_controller/disconnect/') ?>">Déconnexion</a>
                            </li>
                        <?php

                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Customer_controller/register/') ?>">Inscription</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('Customer_controller/connect/') ?>">Connexion</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>