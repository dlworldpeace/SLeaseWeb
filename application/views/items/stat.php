<div class="row">
    <?php echo form_open('/items/edit/'.$item_id); ?>
        <input type="submit" value="edit" class="btn btn-default">
    </form>
    <?php echo form_open('/items/delete/'.$item_id); ?>
        <input type="submit" value="delete" class="btn btn-danger">
    </form>
</div>
<hr>

<?php   if(!empty($bids)) {
            echo '<table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">User</th>
                        <th scope="col">Rate</th>
                    </tr>
                    </thead>
                    <tbody>';
            $length = count($bids);
            for ($x = 0; $x < $length; $x++) {
                if($x === 0) {
                    echo '<tr class="table-success">
                            <th scope="row">Highest</th>
                            <td>'.$bids[$x]['email'].'</td>
                            <td>S$'.$bids[$x]['rate'].'</td>
                        </tr>';
                } else {
                    echo ' <tr class="table-light">
                            <th scope="row">Outbidded</th>
                            <td>'.$bids[$x]['email'].'</td>
                            <td>S$'.$bids[$x]['rate'].'</td>
                        </tr>';
                }
            } 
            echo '</tbody>
                    </table> ';
        } else {
            echo '<strong>No one has bidded for your item.</strong>';
        } ?>