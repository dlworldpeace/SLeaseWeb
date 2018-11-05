<h2><?php echo $item['item_name']; ?></h2>

<img style="display: block;" src="<?php echo (string)$item['image']; ?>" alt="Image missing">

<p><?php echo $item['description']; ?></p>

<ul>
    <li>Owner: <?php echo $item['owner']; ?></li>
    <li>Duration: <?php echo $item['fromdate']; ?> to <?php echo $item['todate']; ?></li>
    <li>Starting bid: S$<?php echo $item['minbid']; ?></li>
    <li>Pick up from: <?php echo $item['pickup_location']; ?></li>
    <li>Return to: <?php echo $item['return_location']; ?></li>
    <li>Category: <?php echo $category; ?></li>	
</ul>

<hr>


