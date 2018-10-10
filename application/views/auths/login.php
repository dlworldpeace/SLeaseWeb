<!DOCTYPE html>

<link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">

<div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <?php if(isset($account_created)) { ?>
            <h3><?php echo $account_created; ?></h3>
        <?php } else { ?>
            <h3>Please login with your email address.<h3>
        <?php } ?>

        <?php echo form_open('auths/validate'); ?>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
                <a class="btn btn-primary" href="<?php echo site_url('/auths/signup'); ?>" role="button">Sign Up</a>
            </fieldset>
        </form>
    </div>
    <div class="col-lg-4">
    </div>
</div>