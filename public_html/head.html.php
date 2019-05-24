<head>
  
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114793472-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114793472-1');
</script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>PrezTweets</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="preztweets.css" type="text/css" charset="utf-8" /> 

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="jquery.tweet-linkify.js" type="text/javascript"></script>
<script src="jquery.autoScrollTextTape.min.js"></script>
<script src="jquery.webticker.min.js"></script>
<script src="/js-cookie/src/js.cookie.js"></script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->

</head>

  <!-- <?php if($main_menu == 'bills'){?>
             
                <div class = "row menu-list">
                  <form id="menu_list" action="index.php" class="form-group">
                    <input type="hidden" name="main_menu" value="bills">
                    <input type="hidden" name="sub_menu" value="<?php echo $sub_menu; ?>">
                    <select name="tweets_select_menu"  onchange="this.form.submit();">
                      <option value="allbills">All Bills</option>
                      <?php foreach($select_menu_items as $select_menu_item){?>
                      <option <?php if($select_menu == $select_menu_item){echo 'selected="selected"';}?> value=<?php echo $select_menu_item;?>><?php echo $select_menu_item;?></option>
                      <?php
                      }           
                      ?>                     
                    </select>
                  </form>
                  <div class="pre-scrollable col-sm-12 col-xs-12 row-no-padding" id="menu-list">
                    
                  <?php 
                 
                  print_bills($main_menu, $sub_menu, $status, $bills);
                  // foreach($bills as $bill){
//                     
                    // printr($bill['number']);
                    // echo($bill['title']);
                    // printr($bill['sponsor_name']);
                  // }
                  // printr($bills);
                  ?>   
                  </div>
                  <?php
                  }?>
                    </div> -->