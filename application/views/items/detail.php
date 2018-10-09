<h2><?php echo $item['item_name']; ?></h2>


<img style="height: 200px; width: 100%; display: block;" src="data:image/jpeg;base64, <?php echo (string)$item['image']; ?>" alt="Image missing">

<p><?php echo $item['description']; ?></p>

<ul>
    <li><?php echo $item['owner']; ?></li>
    <li><?php echo $item['fromdate']; ?> to <?php echo $item['todate']; ?></li>
    <li><?php echo $item['pickup_location']; ?></li>
    <li><?php echo $item['return_location']; ?></li>
</ul>