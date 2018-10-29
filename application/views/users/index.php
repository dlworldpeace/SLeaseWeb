<div class="row">
    <div class="col-lg-6">
        <h2><?= $title ?></h2>
    </div>
    <div class="col-lg-6" style="display:flex;justify-content:flex-end;">
        <?php echo form_open('/users/edit'); ?>
            <input type="submit" value="Change Name/Password" class="btn btn-default">
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <legend>Display Name</legend>
        <label class="col-sm-2 col-form-label"><?php echo $user['user_name'] ?></label>
    </div>
    <div class="col-lg-4">
        <legend>Login Email</legend>
        <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo $user['email'] ?></label>
    </div>
    <div class="col-lg-4">
        <legend>Account Type</legend>
        <label class="col-sm-2 col-form-label">
        <?php if($user['isadmin'] === '1') {
                    echo 'Admin';
                } else {
                    echo 'Non-Admin';
                } ?>
        </label>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-6">
        <h2><?= $ongoing_title ?></h2>
    </div>
    <div class="col-lg-6" style="display:flex;justify-content:flex-end;">
        <a class="btn btn-primary btn-lg" href="<?php echo site_url('/items/create'); ?>" role="button">Lease another item</a>
    </div>
</div>

<div class="row">
    <?php foreach($ongoing_items as $item) : ?>
        <div class="col-lg-3">
            <div class="card mb-3">
                <h5 class="card-header"><?php echo mb_strimwidth($item['item_name'],0, 18,"..."); ?></h3>
                <img style="height: 200px; width: 100%; display: block;" src="<?php echo (string)$item['image']; ?>" alt="Image missing">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $item['fromdate']; ?> to <?php echo $item['todate']; ?></li>
                    <li class="list-group-item"><?php echo $item['pickup_location']; ?></li>
                </ul>
                <div class="card-footer text-muted">
                    <a class="btn btn-primary btn-lg" style="display:block;margin: 0 auto;" href="<?php echo site_url('/items/'.$item['item_id']); ?>" role="button">Find Out More</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<hr>

<h2><?= $completed_title ?></h2>

<div class="row">
    <?php foreach($completed_items as $item) : ?>
        <div class="col-lg-3">
            <div class="card mb-3">
                <h5 class="card-header"><?php echo mb_strimwidth($item['item_name'],0, 18,"..."); ?></h3>
                <img style="height: 200px; width: 100%; display: block;" src="<?php echo (string)$item['image']; ?>" alt="Image missing">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $item['fromdate']; ?> to <?php echo $item['todate']; ?></li>
                    <li class="list-group-item"><?php echo $item['pickup_location']; ?></li>
                </ul>
                <div class="card-footer text-muted">
                    <a class="btn btn-primary btn-lg" style="display:block;margin: 0 auto;" href="<?php echo site_url('/items/'.$item['item_id']); ?>" role="button">Find Out More</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>