<div class="container">

    <h3 class="text-center mt-5">Profil</h3>

    <div class="col-12 bg-dark pt-5 pb-5 text-white">
        <div class="row">
            <div class="col-12 col-md-3"><img class="img-fluid" src="https://oasys.ch/wp-content/uploads/2019/03/photo-avatar-profil.png"></div>
            <div class="col-12 col-md-3">
                <p class="text-left text-white">Prenom : <?php echo $_SESSION['firstname'] ?></p>
                <p class="text-left text-white">Nom : <?php echo $_SESSION['lastname'] ?></p>
                <p class="text-left text-white">Date de naissance : <?php echo $_SESSION['birth_date'] ?></p>
            </div>
            <div class="col-12 col-md-3">
                <p class="text-left text-white">Numéros de téléphone : <?php echo $_SESSION['phone_number'] ?></p>
                <p class="text-left text-white">Email : <?php echo $_SESSION['email_cust'] ?></p>

            </div>
            <div class="col-12 col-md-3">
                <a href="<?php echo site_url('customer/modify/' . $_SESSION['id']); ?>"><button class="btn btn-success">Modifier profil</button></a>
            </div>
        </div>
    </div>

    <div class="col-12 bg-dark pt-5 pb-5 text-white mt-5">
    <div class="row">
        <div class="col-12 col-md-6 bg-dark pt-5 pb-5 text-white"></div>
        <div class="col-12 col-md-6 bg-dark pt-5 pb-5 text-white"></div>
    </div>
    </div>