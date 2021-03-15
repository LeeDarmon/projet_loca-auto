<div class="container mb-5 opacity">

    <h1 class="text-center mt-5" id="titleSection">Modification profil</h1>

    <?php echo form_open('customer_controller/modify/' . $profil['id']); ?>

    <div class="row">

        <div class="col-12 col-md-6">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" class="form-control" value="<?= $profil['firstname'] ?>">
            <?php echo form_error('firstname'); ?>
        </div>

        <div class="col-12 col-md-6">
            <label for="lastname">Lastname</label>
            <input name="lastname" class="form-control" value="<?= $profil['lastname'] ?>"">
        <?php echo form_error('lastname'); ?>
        </div>

    <div class=" col-12 col-md-6">
            <label for="birth_date">Birth date</label>
            <input type="date" name="birth_date" class="form-control" value="<?= $profil['birth_date'] ?>">
            <?php echo form_error('birth_date'); ?>
        </div>

        <div class="col-12 col-md-6">
            <label for="phone_number">Phone</label>
            <input name="phone_number" class="form-control" value="<?= $profil['phone_number'] ?>">
            <?php echo form_error('phone_number'); ?>
        </div>

        <div class="col-12 col-md-6">
            <label for="email_cust">Mail</label>
            <input type="email" name="email_cust" class="form-control" value="<?= $profil['email_cust'] ?>">
            <?php echo form_error('email_cust'); ?>
        </div>

        <!-- <div class="col-12 col-md-6">
            <label for="pswd_cust">Password</label>
            <input type="password" name="pswd_cust" class="form-control" value="<?= $profil['pswd_cust'] ?>">
            <?php echo form_error('pswd_cust'); ?>
        </div> -->

        <div class="col-12 col-md-6">
            <label for="license">Avez vous le permis?</label>

            <select name="license" id="license-select" class="custom-select">
                <option value="1">yes</option>
                <option value="0">No</option>
            </select>
        </div>
    </div>

    <div class="row justify-content-center my-4 pb-4">
        <input type="submit" name="submit" value="Modification" class="btn btn-primary">
    </div>

    </form>
</div>