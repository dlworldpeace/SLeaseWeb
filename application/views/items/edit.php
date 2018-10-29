<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('items/update/'.$item['item_id']); ?>
  <fieldset>
    <div class="form-group row">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Item name</label>
      <input class="form-control" name="item_name" placeholder="Enter an item name" value = "<?php echo $item['item_name']; ?>">
      <small id="emailHelp" class="form-text text-muted">Unique name that makes your item stand out.</small>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Item Description</label>
      <textarea class="form-control" name="description" rows="3"><?php echo $item['description'];?></textarea>
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Category</label>
      <select class="form-control" name="category">
        <?php foreach($categories as $category): ?>
        <option value ="<?= $category['cat_id'] ?>"><?= $category['name'] ?></option>   
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Image input</label>
      <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">Upload a image of your item (no bigger than 100px X 100px).</small>
    </div>
    <!-- <div class="form-group">
      <label for="exampleInputFile">Image input</label>
      <br/>
      <input type="file" name="user_file">
      <small id="fileHelp" class="form-text text-muted">Upload a image of your item (no bigger than 100px X 100px).</small>
    </div> -->
    <div class="form-group">
      <label for="exampleSelect1">Pick up Region</label>
      <select class="form-control" name="pickup_region">
        <option value='Central'>Central</option>
        <option value='West'>West</option>
        <option value='East'>East</option>
        <option value='North'>North</option>
        <option value='South'>South</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Pick up Location</label>
      <input class="form-control" name="pickup_location" placeholder="Enter an address" value = "<?php echo $item['pickup_location']; ?>">
    </div>
    
    <button type="submit" class="btn btn-default" name="update" value="update">update</button>
  </fieldset>
</form>