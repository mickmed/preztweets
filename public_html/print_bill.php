<div id='here'>
  
  
<?php
include 'functions.php';

$sub_menu = ($_GET['sub_menu']);
$name = $_GET['name'];
$bill = get_specific_bills($sub_menu, $name);
function get_specific_bills($congress, $name){
  $headers = ["X-API-Key: YAEy2UF8VY2cDr2z6TbN3cV8ozaJUgt5kuqxars7"];
  $bill = get_curl("https://api.propublica.org/congress/v1/115/bills/".$name.".json", $headers);
  return $bill;
}
print_bill($bill);

function print_bill($bill){?>
  <div id="bloonga"></div>
  <ul style="font-size:10px" class = 'independent pre-scrollable bills'>
    
    <li><?php
      echo ($bill['results'][0]['bill']).'<br>';
      echo 'introduced: '.($bill['results'][0]['introduced_date']).'<br>';
     
      echo 'last major action: '.($bill['results'][0]['latest_major_action_date']).' - '; 
      echo ($bill['results'][0]['latest_major_action']).'<br><br>';
      echo ($bill['results'][0]['bill_uri']).'<br><br><br>';?>
     </li><?php
      
    foreach($bill['results'][0]['actions'] as $bill){
      //printr($bill['actions']);
      
      echo '<li>'.$bill['datetime'].'- '.$bill['chamber'].'</li>';
      echo '<li>'.$bill['description'].'</li><br>';
  }?>
  </ul><?php
//print_bills($main_menu, $sub_menu, $status, $bills);
}
// echo ($_GET['name']);
// echo ($_GET['main_menu']);
// echo ($_GET['sub_menu'])

?>

</div>


