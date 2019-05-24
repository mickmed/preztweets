<?php

///////////////////////////////////GET RECENT BILLS//////////////////////////////////////////////////////////////
function get_recent_bills($congress, $status, $offset){
  $headers = ["X-API-Key: YAEy2UF8VY2cDr2z6TbN3cV8ozaJUgt5kuqxars7"];
  $recent_bills = get_curl("https://api.propublica.org/congress/v1/115/".$congress."/bills/".$status.".json?offset=".$offset, $headers);
  foreach($recent_bills['results'] as $bills){
    foreach($bills['bills'] as $bill){
      //printr($bill);
      $bills[]=$bill;
    }
  }
  return $bills['bills'];
}

function get_specific_bills($congress, $name){
  $headers = ["X-API-Key: YAEy2UF8VY2cDr2z6TbN3cV8ozaJUgt5kuqxars7"];
  $bill = get_curl("https://api.propublica.org/congress/v1/115/bills/".$name.".json", $headers);
  return $bill;
}

///////////////////PRINT BILLS LIST////////////////////////////////////////////////////////////////////

function print_bills($main_menu, $sub_menu, $select_menu, $name, $bill_number, $bills, $offset){?>

    <ul class="bills-list"><?php
      foreach($bills as $bill){
        if($name == $bill['bill_slug']){$xclass_selected = 'member-selected';}else{$class_selected = ' ';}?>
        <div><a href="print_bill.php?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>&bill_id=<?php echo $bill['bill_id'];?>&name=<?php echo $bill['bill_slug'];?>&page=<?php echo $offset;?>">
          <li class = "row bills-menu <?php echo $class_selected;?>">
            <div class="col-md-1 col-sm-1 col-xs-2 row-no-padding">
              <?php echo $bill['number'];?>&nbsp
            </div> 
            <div class="col-md-1 col-sm-1 col-xs-2 row-no-padding">
              <?php echo $bill['introduced_date'];?>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-8 row-no-padding">
              <?php echo $bill['sponsor_name'];?><br>
            </div>
            <div class="col-md-10 col-sm-12 col-xs-12 row-no-padding">
              <?php echo $bill['title'];?>
            </div>
          </li>
       </a></div>
       <li><?php print_bill(get_specific_bills($sub_menu, $bill['bill_slug']));?></li>
      <?php } ?>
    </ul>
  <?php
}


function print_bill($bill){?>
 
  <ul class = 'bill-details'>
    <li>
      <div class="row">
       
        <div class="col-sm-2 col-xs-12 row-no-padding">
          <?php echo ($bill['results'][0]['bill']);?>
        </div> 
        <div class="col-sm-10 col-xs-12 row-no-padding">
          <?php echo ($bill['results'][0]['bill_uri']);?>
        </div>
        <div class="col-sm-2 col-xs-3 row-no-padding">
          <?php echo $bill['results'][0]['introduced_date'];?>
        </div>
        <div class="col-sm-10 col-xs-9 row-no-padding">
          Introduced
        </div>
        <div class="col-sm-2 col-xs-3 row-no-padding">
          <?php echo ($bill['results'][0]['latest_major_action_date']);?>
        </div>
        <div class="col-sm-2 col-xs-9 row-no-padding">
          Last Major Action
        </div>
        <div class="col-sm-8 col-xs-12 row-no-padding">
          <?php echo ($bill['results'][0]['latest_major_action']);?>
        </div>
        
      <?php foreach($bill['results'][0]['actions'] as $bill){?>
          <div class="col-sm-2 col-xs-3 row-no-padding"><?php
            echo $bill['datetime'];?>
          </div>
          <div class="col-sm-2 col-xs-9 row-no-padding"><?php
            echo $bill['chamber'];?>
          </div>
          <div class="col-sm-8 col-xs-10 row-no-padding"><?php  
            echo $bill['description'];?>
          </div>
        <?php } ?>
      </div>
    
    </li>
  </ul><?php
//print_bills($main_menu, $sub_menu, $status, $bills);
}

function print_page_numbers($main_menu, $sub_menu, $select_menu, $pages){?>
  <div class="paginator"><?php 
    foreach($pages as $page){
      if($page == ($offset/20)+1){$class_selected = 'page-selected';}else{$class_selected = ' ';}?>
        <a href = "?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>&select_menu=<?php echo $select_menu;?>&page=<?php echo $page;?>">
          <div style = "padding:5px;display:inline" class = "<?php echo $class_selected;?>"><?php echo $page;?></div>
        </a><?php
    }?>
  </div><?php           
}
