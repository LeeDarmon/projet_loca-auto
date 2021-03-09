<div class="container">
<?php echo validation_errors(); ?>

<?php echo form_open('customer/register'); ?>

    <div class="row">

    <div class="col-12 col-md-6">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" /><br />
    </div>

    <div class="col-12 col-md-6">
    <label for="lastname">Lastname</label>
    <input name="lastname"><br />
    </div>

    <div class="col-12 col-md-6">
    <label for="birth_date">Birth date</label>
    <input type="date" name="birth_date" /><br />
    </div>

    <div class="col-12 col-md-6">
    <label for="phone_number">Phone</label>
    <input name="phone_number"><br />
    </div>

    <div class="col-12 col-md-6">
    <label for="email_cust">Mail</label>
    <input type="email" name="email_cust" /><br />
    </div>

    <div class="col-12 col-md-6">
    <label for="pswd_cust">Password</label>
    <input type="password" name="pswd_cust" /><br />
    </div>

    <div class="col-12">
    <label for="license">Avez vous le permis?</label>

<select name="license" id="license-select">
    <option value="1">yes</option>
    <option value="0">No</option>
   

</select>
    </div>





    <input type="submit" name="submit" value="Inscription" />

</form>

</div>