<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('items/create'); ?>
  <fieldset>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">User</label>
      <div class="col-sm-10">
        <input type="text" readonly="" class="form-control-plaintext" name="owner" value="justminyu@gmail.comm">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Item name</label>
      <input type="email" class="form-control" name="item_name" placeholder="Enter an item name">
      <small id="emailHelp" class="form-text text-muted">Unique name that makes your item stand out.</small>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Item Description</label>
      <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Starting bid</label>
      <input type="number" class="form-control" name="minbid" placeholder="S$">
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Category</label>
      <select class="form-control" name="category">
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">Image input</label>
      <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">Upload a image of your item (no bigger than 100px X 100px).</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Pick up Location</label>
      <input class="form-control" name="pickup_location" placeholder="Enter an address">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Return Location</label>
      <input class="form-control" name="return_location" placeholder="Enter an address">
    </div>
    <div class="form-group">
      From<input type="date" class="form-control" name="fromdate">
      To<input type="date" class="form-control" name="todate">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>