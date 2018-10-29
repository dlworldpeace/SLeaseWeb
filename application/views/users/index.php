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
        <legend><?= $sucbid_title ?></legend>
        <?php if(!empty($sucbids)) {
            echo '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Pick Up Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Your Bid</th>
                        </tr>
                    </thead>
                    <tbody>';
            $length = count($sucbids);
            for ($x = 0; $x < $length; $x++) {
                echo '<tr class="table-default">
                        <td>'.$sucbids[$x]['fromdate'].'</td>
                        <td>'.$sucbids[$x]['todate'].'</td>
                        <td><a href="'.site_url('/items/'.$sucbids[$x]['item_id']).
                        '" >'.$sucbids[$x]['item_name'].'</a></td>
                        <td>S$'.$sucbids[$x]['rate'].'</td>
                    </tr>';
            } 
            echo '</tbody>
                    </table> ';
        } else {
            echo '<strong>You have no winning bids.</strong>';
        } ?>
    </div>
    <div class="col-lg-6">
        <legend><?= $ongoingbid_title ?></legend>
        <?php if(!empty($ongoingbids)) {
            echo '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Status</th>
                            <th scope="col">Decision Date</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Your Bid</th>
                            <th scope="col">Current Highest</th>
                        </tr>
                    </thead>
                    <tbody>';
            $length = count($ongoingbids);
            for ($x = 0; $x < $length; $x++) {
                if($ongoingbids[$x]['rate'] === $ongoingbids[$x]['maximum']){
                    echo '<tr class="table-success">
                            <th scope="row">Highest</th>
                            <td>'.$ongoingbids[$x]['fromdate'].'</td>
                            <td><a href="'.site_url('/items/'.$ongoingbids[$x]['item_id']).
                            '" style="color:#f8f9fa">'.$ongoingbids[$x]['item_name'].'</a></td>
                            <td>S$'.$ongoingbids[$x]['rate'].'</td>
                            <td>S$'.$ongoingbids[$x]['maximum'].'</td>
                        </tr>';
                } else {
                    echo '<tr class="table-light">
                            <th scope="row">Outbidded</th>
                            <td>'.$ongoingbids[$x]['fromdate'].'</td>
                            <td><a href="'.site_url('/items/'.$ongoingbids[$x]['item_id']).
                            '" >'.$ongoingbids[$x]['item_name'].'</a></td>
                            <td>S$'.$ongoingbids[$x]['rate'].'</td>
                            <td>S$'.$ongoingbids[$x]['maximum'].'</td>
                        </tr>';
                }
            }
            echo '</tbody>
                    </table> ';
        } else {
            echo '<strong>You have no on-going bids.</strong>';
        } ?>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-lg-6">
        <legend><?= $ongoing_title ?></legend>
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

<legend><?= $completed_title ?></legend>

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