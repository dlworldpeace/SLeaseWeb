<?php   if(!empty($bid)) {
            echo '<label class="col-sm-4 col-form-label">You have bidded '.
                '<strong>S$'.$bid['rate'].'</strong>'.' for this item</label>';
        } else {
            echo '<strong>You have not placed any bid for this item!</strong>';
        } 
        if(!empty($bid)) {
            echo '<br/><label class="col-sm-4 col-form-label">Current highest is <strong>S$'.$highest.'</strong></label>';
        } ?>

<form class="form-inline my-2 my-lg-0" action="<?php echo site_url('/items/bid_for/'.$item_id) ?>"  method="post"> 
    <input class="form-control mr-sm-2" name="rate" id="rate" type="text" placeholder="S$">
    <button class="btn btn-primary my-2 my-sm-0"  type="submit">Place new bid</button>
    <input class="form-control mr-sm-2" name="item_id" id="item_id" type="text" value="<?php echo $item_id; ?>" hidden>
</form>

<?php echo validation_errors(); ?>