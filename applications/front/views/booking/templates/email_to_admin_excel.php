<p><?php echo $client['first_name']. " ". $client['last_name']?></p>
<p><?php echo $client['phone_number']?></p>
<?php $medical = array(); foreach ($children as $child): $array = 'child';?>
    <?php if($child['child_id'] == -1):
            $friend = unserialize($child['friend']);
            $friend['age'] = calculateAge($friend['birthday']);
            $array = 'friend';
        ?>        
    <?php endif;?>
    <?php if(${$array}['notes'] !== ''):
            $medical[] = ${$array}['first_name']. " ". ${$array}['last_name']. " - ". ${$array}['notes'];
        ?>
    <?php endif;?>
    <p><?php echo ${$array}['first_name']. " ". ${$array}['last_name']?></p>
    <p><?php echo ${$array}['age']?></p>
    <p><?php echo $child['days_booked']?></p>
<?php endforeach;?>

