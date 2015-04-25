<div class="content_right">
    <h2>Welcome To Admin</h2>
    <div>
      	                   <div>
      <<h3>Order's Deal
            <div style="float:right;">
                <a style="cursor:pointer;" class="back_button"><img src="<?php echo asset_url()?>images/button8.jpg" alt="Back"></a>
            </div>
        </h3>
                <table width="100%" cellspacing="4" cellpadding="0" border="1" class="tbl">
            <tbody><tr>
            <th align="center">Customer Name</th>
            <th align="center">Order Total</th>            
            <th align="center">Order Date</th>            
            </tr>
                        
            <tr>
            <td align="center"><?php echo $order['first_name']?> <?php echo $order['last_name']?></td>
            <td align="center"><?php echo number_format($order['total'], 2)?></td>
            <td align="center"><?php echo date('m/d/Y', $order['date'])?></td>
                                                                    
            </tr>
            
                        
        </tbody></table>
      </div>
      <div>
      <h3>
        </h3>
                <table width="100%" cellspacing="4" cellpadding="0" border="1" class="tbl">
            <tbody><tr>
            <th align="center">Child Firstname</th>
            <th align="center">Child Lastname</th>            
            <th align="center">Title</th>            
            <th align="center">Start Date</th> 
            <th align="center">End Date</th> 
            <th align="center">Selected Days</th>                        
            </tr>
            <?php foreach($children as $child):?>
                <tr>
                <td align="left"><?php echo $child['first_name']?></td>
                <td align="left"><?php echo $child['last_name']?></td>
                <td align="left"><?php echo $order['camp_name']?></td>
                <td align="left"><?php echo $order['start_date']?></td>
                <td align="left"><?php echo $order['end_date']?></td>                                    
                <td align="left">
                    <?php $days_arr = explode(",", $child['days_booked']);?>
                    <?php foreach($days_arr as $day):?>
                    <p><?php echo $day?></p>
                    <?php endforeach;?>
                </td>                                                             
                </tr>
            <?php endforeach;?>
                                
            
                        
        </tbody></table>
		<table>
			<tbody><tr>
				<td>Order Status :</td>
				<td>
				<form method="post" name="order_status_change" action="">
					<select name="order_status">
						<option selected="selected" value="1">pending </option>
						<option value="2">processing </option>
						<option value="3">cancel </option>
					</select>
					<input type="hidden" name="order_id" value="119">
					<input type="submit" style="display:none;">
				</form>
				</td>
			</tr>
		</tbody></table>
      </div>
                      </div>
  </div>