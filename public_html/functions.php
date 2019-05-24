<?php

//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////PRINT FUNCTIONS/////////////////////////////////////////////////

function print_main_menu($main_menu_items, $main_menu){
	 foreach($main_menu_items as $main_menu_item){
          if($main_menu_item == $main_menu){$class = 'main-menu-selected';}else{$class = 'main-menu';}
           
           
           
            if($main_menu == 'news'){?>
             
              <a href="http://www.newsclover.com" class="<?php echo $class ?>">
              <button>
                <?php echo $main_menu_item;?><img src="img/main_menu/<?php echo $main_menu_item;?>_button.png">
              </button> <?php
            }else{?>
            <a href="?main_menu=<?php echo $main_menu_item;?>" class="<?php echo $class ?>">
              <button>
                <?php echo $main_menu_item;?><img src="img/main_menu/<?php echo $main_menu_item;?>_button.png">
              </button>
            </a><?php
             
            }
   }        
}

function print_sub_menu($sub_menu_items, $main_menu, $sub_menu){
	foreach($sub_menu_items as $sub_menu_item){
		if($sub_menu_item == $sub_menu){$class = 'main-menu-selected';}else{$class = 'sub-menu-item';}
		echo '<a href="?main_menu='.$main_menu.'&sub_menu='.$sub_menu_item.'" class="'.$class.'">'.$sub_menu_item.'</a>';
	}
}

function print_sub_menu1($main_menu, $sub_menu, $select_menu, $name, $screen_name){?>
  <a href="?main_menu=<?php echo $main_menu;?>"><?php echo $main_menu;?></a> -->
  <a href="?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>"><?php echo $sub_menu;?></a> -->
  <a href="?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>&select_menu=<?php echo $select_menu;?>"><?php echo $select_menu;?></a> -->
  <a href="?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>&select_menu=<?php echo $select_menu;?>&name=<?php echo $name;?>"><?php echo $name;?></a><?php
}


function printr($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

function get_curl($service_url, $headers){
  $curl = curl_init($service_url);
  curl_setopt($curl, CURLOPT_URL, $service_url);
  if($headers){
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  }
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt ($ch, CURLOPT_USERAGENT, "TestScript (http://preztweets.com; mick2090@gmail.com)");
  $curl_response = curl_exec($curl);
  if ($curl_response === false) {
      $info = curl_getinfo($curl);
      curl_close($curl);
      die('error occured during curl exec. Additioanl info: ' . var_export($info));
  }
  curl_close($curl);
  $sources = json_decode($curl_response, true);
  if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
      die('error occured: ' . $decoded->response->errormessage);
  }
  return($sources);
    
}



// function trans($trans){
  // // $trans = trans();
    // // foreach($trans as $k => $v){
      // // if($v == $_GET['top']){
        // // $target_words[] = $k;
        // // $pair=($v);
      // // }
    // // }
// }

