<h3><?php echo $title?>
    <div style="float: right;">
        <a href="<?php echo $addBaseUrl?>">Add New</a>
    </div>
</h3>
<table width="100%" class="table_template">
    <tbody>
        <tr style="display:block; background:#F2F2F2; padding:10px;">
            <?php foreach($headers as $header):?>
            <th align="left" width="<?php echo (90/(count($headers)))?>%"><?php echo $header?></th> 
            <?php endforeach;?>
            <th width="20%" align="left">Edit</th>
            <th width="20%" align="left">Delete</th>
        </tr>
        <?php if(is_array($data)):?>
            <?php foreach($data as $index => $item):?>
                <tr class="tblrow">
                    <?php foreach($displayedFields as $key):?>
                        <?php $value = $data[$index][$key]?>
                        <td align="left" width="<?php echo (90/(count($displayedFields)))?>%">
                            <?php if(isset($links[$key])):?>
                                <?php 
                                    $linkRaw = $links[$key];
                                    $linksArr = explode(",", $linkRaw);
                                    $link = $linksArr[0]. "/". $item[$linksArr[1]];
                                ?>
                                <?php if(isset($fieldFunctions) && isset($fieldFunctions[$key])):?>
                                    <a href="<?php echo $link?>"><?php eval(str_replace("{field}", $value, $fieldFunctions[$key]))?></a>
                                <?php elseif(isset($fieldTemplate) && isset($fieldTemplate[$key])): ?>
                                    <a href="<?php echo $link?>"><?php echo str_replace("{". $key ."}", $value, $fieldTemplate[$key]);?></a>                                       
                                <?php else:?>
                                    <a href="<?php echo $link?>"><?php echo $value?></a>
                                <?php endif;?>
                            <?php else:?>
                                    <?php if (isset($fieldFunctions) && isset($fieldFunctions[$key])): ?>
                                        <?php eval(str_replace("{field}", $value, $fieldFunctions[$key])) ?>
                                    <?php elseif(isset($fieldTemplate) && isset($fieldTemplate[$key])): ?>
                                        <?php echo str_replace("{". $key ."}", $value, $fieldTemplate[$key]);?>
                                    <?php else:?>
                                        <?php echo $value?>
                                    <?php endif; ?>
                            <?php endif;?>
                        </td>
                        
                    <?php endforeach;?>
                        <td width="20%" align="left"><a href="<?php echo $editBaseUrl. $item[$editParam]?>" class="edit_list_item">edit</a></td>
                        <td width="20%" align="left"><a href="<?php echo $deleteBaseUrl. $item[$deleteParam]?>" class="delete_list_item">delete</a></td>
                </tr>
                
            <?php endforeach;?>
        <?php else:?>
                <tr class="tblrow" colspan="<?php echo count($headers)?>">
                    <td align="center">
                        No Data Found
                    </td>
                </tr>
        <?php endif;?>
        <?php if(is_array($data)):?>
            <tr>
                <td colspan="3"><strong style="padding:3px 5px 2px; margin:2px; background:#006ED3;color: #FFFFFF;">1</strong></td>
            </tr>
        <?php endif;?>
    </tbody>
</table>