<h2><?= $title ?></h2>

<div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <?php echo validation_errors('<p class="error">'); ?>
        <?php echo form_open('users/update_name/'); ?>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputName">Dsplay name</label>
                    <input type="text" name="displayname" class="form-control" id="exampleInputName" value="<?php echo $user['user_name'] ?>" >
                </div>
                <button type="submit" class="btn btn-primary">Save New Name</button>
            </fieldset>
        </form>
        <hr>
        <?php echo form_open('users/update_password/'); ?>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm New Password</label>
                    <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword2" placeholder="Re-enter Password">
                </div>
                <button type="submit" class="btn btn-primary">Save New Password</button>
            </fieldset>
        </form>
        <hr>
        <a class="btn btn-primary" href="<?php echo site_url('/users/'); ?>" role="button">Cancel</a>
    </div>
    <div class="col-lg-4">
    </div>
</div>