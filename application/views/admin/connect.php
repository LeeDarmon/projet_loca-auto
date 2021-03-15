<div class="container opacity mb-5">

    <h1 class="text-center mt-5" id="titleSection">Connexion Admin</h1>
    <?= $error ?? ''; ?>
    <?= form_open('admin_controller/connect'); ?>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <label for="email_a">Email</label>
            <input type="email" name="email_a" class="form-control">
            <?= form_error('email_a'); ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <label for="password_a">Mot de passe</label>
            <input type="password" name="password_a" class="form-control">
            <?= form_error('password_a'); ?>
        </div>
    </div>

    <!-- <p class="text-center">Vous avez oublié votre mot de passe ? Cliquez <a href="">ici</a></p> -->

    <div class="row justify-content-center my-4 pb-4">
        <input type="submit" name="submit" value="Connexion" class="btn btn-primary">
    </div>

    <?= form_close(); ?>

</div>