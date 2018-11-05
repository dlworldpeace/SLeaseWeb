<div class="row">
    <?php echo form_open('/items/edit/'.$item_id); ?>
        <input type="submit" value="edit" class="btn btn-default">
    </form>
    <?php echo form_open('/items/delete/'.$item_id); ?>
        <input type="submit" value="delete" class="btn btn-danger">
    </form>
</div>
<hr>