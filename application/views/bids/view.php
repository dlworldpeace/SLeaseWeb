<?php if(isset($bid)) {
    echo '<label class="col-sm-2 col-form-label">You have bidded</label>'.
         '<div class="col-sm-10">'.
         '<input type="text" readonly="" class="form-control-plaintext" value="'.$bid['rate'].'">'.
         '</div>';
} else {
    echo '<strong>You have not placed any bid for this item!</strong>';
} ?>

<form class="form-inline my-2 my-lg-0" action="<?php echo site_url('/items/create_bid') ?>"  method = "post"> 
    <input class="form-control mr-sm-2" name="rate" id="rate" type="text" placeholder="S$">
    <button class="btn btn-primary my-2 my-sm-0"  type="submit">Place bid</button>
</form>