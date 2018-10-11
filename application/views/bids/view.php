<?php   if(!empty($bid)) {
            echo '<label class="col-sm-2 col-form-label">You have bidded '.
                '<strong>S$'.$bid['rate'].'</strong>'.' for this item</label>';
        } else {
            echo '<strong>You have not placed any bid for this item!</strong>';
        } ?>

<form class="form-inline my-2 my-lg-0" action="<?php echo site_url('/items/bid_for/'.$item_id) ?>"  method="post"> 
    <input class="form-control mr-sm-2" name="rate" id="rate" type="text" placeholder="S$">
    <button class="btn btn-primary my-2 my-sm-0"  type="submit">Place new bid</button>
</form>