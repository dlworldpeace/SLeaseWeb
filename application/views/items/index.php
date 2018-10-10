<h2><?= $title ?></h2>

<a class="btn btn-primary btn-lg" href="<?php echo site_url('/items/create'); ?>" role="button">Lease your item</a>


<div class="row">
    <?php foreach($items as $item) : ?>
        <div class="col-lg-4">
            <div class="card mb-3">
                <h3 class="card-header"><?php echo mb_strimwidth($item['item_name'],0, 18,"..."); ?></h3>
                <img style="height: 200px; width: 100%; display: block;" src="<?php echo (string)$item['image']; ?>" alt="Image missing">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $item['owner']; ?></li>
                    <li class="list-group-item"><?php echo $item['fromdate']; ?> to <?php echo $item['todate']; ?></li>
                    <li class="list-group-item"><?php echo $item['pickup_location']; ?></li>
                </ul>
                <div class="card-footer text-muted">
                    2 more days to go!
                    <a class="btn btn-primary btn-lg" href="<?php echo site_url('/items/'.$item['item_id']); ?>" role="button">To Bid</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

