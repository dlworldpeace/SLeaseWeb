<h2><?= $title ?></h2>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <select class="form-control" name="SorBy" style="width:50%" onchange="sort(this.value)">
                <option value='0'>Sort By</option>
                <option value='1'>Start Date</option>
                <option value='2'>Mininum Bids</option>
                <option value='3'>Name Ascending</option>
                <option value='4'>Name Descending</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <a class="btn btn-primary btn-lg" style="float:right" href="<?php echo site_url('/items/create'); ?>" role="button">Lease your item</a>
    </div>
</div>

<hr>

<div class="row">
    <?php foreach($items as $item) : ?>
        <div class="col-lg-3">
            <div class="card mb-3">
                <h5 class="card-header"><?php echo mb_strimwidth($item['item_name'],0, 18,"..."); ?></h3>
                <img style="height: 200px; width: 100%; display: block;" src="<?php echo (string)$item['image']; ?>" alt="Image missing">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $item['owner']; ?></li>
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

 <script type="text/javascript">
    function sort(index) {
        window.location.href = "<?php echo site_url('items/index');?>/"+index;
    }
</script>

