<div class="container mb-5">
    <h1 class="text-center mt-5 opacity" id="titleSection">Profil</h1>

    <div class="row">
        <div class=" col-12 col-md-4 mb-3">
            <div class="card h-100 shadow-lg">
                <div class="card-body" id="profile-user">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?= base_url(); ?>assets/images/icone-avatar.png" alt="Admin" class="rounded-circle" width="150">
                        <h4 class="mt-3"><?= $profil['firstname'] . ' ' . $profil['lastname'] ?></h4>
                        <div class="mt-3">
                            <a class="btn btn-primary text-center" href="<?= site_url('customer_controller/modify/' . $profil['id']); ?>">Modifier profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8 mb-3">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nom</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profil['lastname'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Prénom</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profil['firstname'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Date de naissance</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profil['birth_date'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profil['phone_number'] ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?= $profil['email_cust'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                    <h2>Location actuelle</h2>
                    <?php
                    if ($actually != null) {
                        foreach ($actually as $actuallys) {
                    ?>
                            <div class="row">
                                <div class="col-6"><img src="<?= base_url(); ?>assets/images/<?= $actuallys->url_image; ?>" alt="<?= $actuallys->markName . ' ' . $actuallys->vehicle_model; ?>" class="img-thumbnail"></div>
                                <p class="col-6"><?= $actuallys->vehicle_model ?> <?= $actuallys->markName ?> Date de début : <?= $actuallys->start_date ?>- Date de fin : <?= $actuallys->end_date ?></p>
                            </div>
                    <?php
                        }
                    } else {
                        echo "Aucune location actuellement";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mb-3">
            <div class="card h-100 shadow-lg">
                <div class="card-body">
                    <h2>Historique</h2>
                    <?php
                    if ($old != null) {
                        foreach ($old as $olds) {
                    ?>
                            <h3><?= $olds->markName ?> <?= $olds->vehicle_model ?></h3>
                            <p>Date de début : <?= $olds->start_date ?> / Date de fin : <?= $olds->end_date ?></p>
                            <hr />
                    <?php
                        }
                    } else {
                        echo "Ce client n'a aucune location dans son historique";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card h-100 shadow-lg">
                <div class="card-body" id="profile-user">
                    <h2 class="mt-3">
                        Que faire en cas de problème ?
                    </h2>
                    <p>
                        Si vous rencontrez un problème sur une location, ou pour toute autre question, contactez notre administrateur à l'adresse suivante :
                        <a href="contact@loca-auto.fr">contact@loca-auto.fr</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>