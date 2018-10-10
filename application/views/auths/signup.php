<!DOCTYPE html>

<link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">

<div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <h1>Create an Account!</h1>
        <?php echo form_open('auths/create_user'); ?>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputEmail1">User email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email address for log in">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Dsplay name</label>
                    <input type="text" name="displayname" class="form-control" id="exampleInputName" placeholder="Display name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword2" placeholder="Re-enter Password">
                </div>
                <button type="submit" class="btn btn-primary">Create Account</button>
                <a class="btn btn-primary" href="<?php echo site_url('/auths/'); ?>" role="button">Back to log in</a>
            </fieldset>
        </form>
        <?php echo validation_errors('<p class="error">'); ?>
    </div>
    <div class="col-lg-4">
    </div>
</div>