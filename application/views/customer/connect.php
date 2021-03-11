<div class="container opacity">

    <h2 class="text-center mt-5">Connexion</h2>

    <?= form_open('customer_controller/connect'); ?>

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <label for="email_cust">Email</label>
            <input type="email" name="email_cust" class="form-control">
            <?= form_error('email_cust'); ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <label for="pswd_cust">Mot de passe</label>
            <input type="password" name="pswd_cust" class="form-control">
            <?= form_error('pswd_cust'); ?>
        </div>
    </div>
    <p class="text-center">Pour vous inscrire cliquez sur ce <a href="<?= site_url('Customer_controller/register/'); ?>">lien</a></p>

    <div class="row justify-content-center my-4 pb-4">
        <input type="submit" name="submit" value="Connexion" class="btn btn-success">
    </div>

    <?= form_close(); ?>

</div>