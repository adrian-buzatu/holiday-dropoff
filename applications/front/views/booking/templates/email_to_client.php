<p><?php echo $client['title']." ". $client['first_name']. " " .$client['last_name']?>,</p>
<p><br></p>
<p>Thank you for registering for <?php echo $children[0]['camp']?></p>
<p><br></p>
<p>We have received the following booking information</p>
<p><br></p>
<?php foreach ($children as $child): $array = 'child';?>
    <?php if($child['id'] === -1):
            $friend = unserialize($child['friend']);
            $array = 'friend';
        ?>        
    <?php endif;?>
<p><?php echo ${$array}['first_name']. " ". ${$array}['last_name'];?> - <?php echo $child['days_booked']?></p>
<?php endforeach;?>


<p>This event will be taking place at:</p>
<p><br></p>
<p>Pond Cottages&nbsp;</p>
<p>London, SE21 7LD&nbsp;</p>
<p>United Kingdom</p>
<p><br></p>
<p>To make registration nice and easy for you, we have attached a registration form.</p>
<p><br></p>
<p>This should be filled out prior to arriving on the day of your booking. 
    If you have been to HDO before, you don't need to fill another one out
</p>
<p><br></p>
<p>To take advantage of future deals make sure that you join our facebook page by searching 
    Holiday Drop Off or by copying the link <a href="http://www.facebook.com/HolidayDropOff">www.facebook.com/HolidayDropOff</a>
</p>
<p>What to bring - Packed lunch with drink, comfortable clothing, 
    swimming kit (If swimming is chosen on the day as an activity - Swimming isn't a compulsory sport)
</p>
<p><br></p>
<p>We thank you again and look forward to seeing you at the camp.</p>
<p><br></p>
<p>Sincerely,</p>
<p><br></p>
<p>HDO Registration Team</p>                                                                                                                                                                          