<div class="container mb-5">

<h3 class="text-center mt-5">Connexion</h3>

<?php echo form_open('customer_controller/connect'); ?>

    <div class="row">

    <div class="col-12 col-md-6">
    <label for="email_cust">Mail</label>
    <input type="email" name="email_cust" class="form-control">
    <?php echo form_error('email_cust'); ?>
    </div>

    <div class="col-12 col-md-6">
    <label for="pswd_cust">Password</label>
    <input type="password" name="pswd_cust" class="form-control">
    <?php echo form_error('pswd_cust'); ?>
    </div>


    <div class="offset-3 col-6 mt-3">
    <input type="submit" name="submit" value="Connexion" class="btn btn-success btn-lg mx-auto d-block">
    </div>

    </div>

</form>

</div>

