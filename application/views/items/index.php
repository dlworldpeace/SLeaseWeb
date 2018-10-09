<h2><?= $title ?></h2>

<div class="row">
    <?php foreach($items as $item) : ?>
        <div class="col-lg-4">
            <div class="card mb-3">
                <h3 class="card-header"><?php echo $item['item_name']; ?></h3>
                <img style="height: 200px; width: 100%; display: block;" src="data:image/jpeg;base64, <?php echo (string)$item['image']; ?>" alt="Image missing">
                <div class="card-body">
                    <p class="card-text"><?php echo $item['description']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $item['owner']; ?></li>
                    <li class="list-group-item"><?php echo $item['fromdate']; ?> to <?php echo $item['todate']; ?></li>
                    <li class="list-group-item"><?php echo $item['pickup_location']; ?></li>
                </ul>
                <div class="card-footer text-muted">
                    2 more days to go!
                    <a class="btn btn-primary btn-lg" href="#" role="button">To Bid</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
