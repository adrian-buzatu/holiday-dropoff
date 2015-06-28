<?php foreach ($children as $child): $array = 'child';?>
    <?php if($child['child_id'] == -1):
            $friend = unserialize($child['friend']);
            $array = 'friend';
            
        ?>        
    <?php endif;?>
<p><?php echo ${$array}['first_name']. " ". ${$array}['last_name'];?> - <?php echo $child['days_booked']?></p>
<?php endforeach;?>