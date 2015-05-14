
<?php $medical = array(); foreach ($children as $child): $array = 'child';?>
    <?php if($child['id'] === -1):
            $friend = unserialize($child['friend']);            
            $array = 'friend';
        ?>        
    <?php endif;?>
    <?php if(${$array}['notes'] !== ''):
            $medical[] = ${$array}['first_name']. " ". ${$array}['last_name']. " - ". ${$array}['notes'];
        ?>
    <?php endif;?>
<?php endforeach;?>
<?php echo implode(", ", $medical);?>
