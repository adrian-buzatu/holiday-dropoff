<p>Niels Buckland: A new registration has come in for <?php echo $children[0]['camp']?>. The registrant is:</p>
<p><br></p>
<p>Contact Name: <?php echo $client['first_name']. " ". $client['last_name']?></p>
<p><br></p>
<p>Email: <?php echo $client['email']?></p>
<p><br></p>
<p>Phone: <?php echo $client['phone_number']?></p></p>
<p><br></p>
<?php $medical = array(); foreach ($children as $child): $array = 'child';?>
    <?php if($child['child_id'] == -1):
            $friend = unserialize($child['friend']);
            $friend['age'] = calculateAge($friend['birthdate']);
            $array = 'friend';
        ?>        
    <?php endif;?>
    <?php if(${$array}['notes'] !== ''):
            $medical[] = ${$array}['first_name']. " ". ${$array}['last_name']. " - ". ${$array}['notes'];
        ?>
    <?php endif;?>
<p><?php echo ${$array}['first_name']. " ". ${$array}['last_name']. ", ". ${$array}['last_name']. " year(s) old";?> - <?php echo $child['days_booked']?></p>
<?php endforeach;?>
<p><br></p>
<p>Registration Amount: £ <?php echo number_format($children[0]['total'], 2)?></p>
<p><br></p>
<p>Amount Paid: £ <?php echo number_format($children[0]['total'], 2)?></p>
<p><br></p>
<p>Been Before</p>
<p><br></p>
<p>Medical Info - <?php echo implode(", ", $medical)?></p>
<p><br></p>

<p>Transaction ID: <?php echo $tx?></p>
<p><br></p>
<p>Excel information</p>
<p><br></p>
<p><?php echo $client['first_name']. " ". $client['last_name']?></p>
<p><?php echo $client['phone_number']?></p>
<?php $medical = array(); foreach ($children as $child): $array = 'child';?>
    <?php if($child['id'] == -1):
            $friend = unserialize($child['friend']);
            $frient['age'] = calculateAge($friend['birthdate']);
            $array = 'friend';
        ?>        
    <?php endif;?>
    <?php if(${$array}['notes'] !== ''):
            $medical[] = ${$array}['first_name']. " ". ${$array}['last_name']. " - ". ${$array}['notes'];
        ?>
    <?php endif;?>
    <p><?php echo ${$array}['first_name']. " ". ${$array}['last_name']?></p>
    <p><?php echo ${$array}['age']?></p>
    <p><?php echo ${$array}['days_booked']?></p>
<?php endforeach;?>

