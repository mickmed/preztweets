<?php
	include 'functions.php';
  include 'functions_t.php';
  include 'functions_b.php';
  include 'functions_n.php';
	require_once('TwitterAPIExchange.php');
	include 'variables.php';
 // include 'print_data.php';
  
?>						  	
<!DOCTYPE html>
<html lang="en">
	<head><?php include 'head.html.php';?></head>
	<body onload="loadDeviceSize()">
		<div class="container main">	
		<?php include 'header.php';?>
			<div class="body-main">
		  <!-- <button class="tweet_toggle" onclick="loadDeviceSize()"><div class = "glyphicon glyphicon-menu-left"></div>More Tweeters</button> -->
	
		  <!--///////////////SUB MENU YELLOW///////////////////////////////----->
			<div class="row"><?php
			 if($main_menu == 'tweets' || $main_menu == 'news'){?>
  			<div class="col-sm-3 col-xs-3 row-no-padding"><?php
  		 }
       if($main_menu == 'bills'){?>
         <div class="col-sm-12 col-xs-12 row-no-padding"><?php
       }?>
  		  
  			  
    		  <div class = "sub-menu">
    		    <?php print_sub_menu($sub_menu_items, $main_menu, $sub_menu);?>
    		  </div>
  		  		<div class ="row">
  						<div class="col-sm-12 col-xs-12 row-no-padding">
							  <form action="index.php" class="form-group">
                  <input type="hidden" name="main_menu" value="<?php echo $main_menu; ?>">
                  <input type="hidden" name="sub_menu" value="<?php echo $sub_menu; ?>">
                  <select name="select_menu"  onchange="this.form.submit();">
                    <?php foreach($select_menu_items as $select_menu_item){?>
                      <option <?php if($select_menu == $select_menu_item){echo 'selected="selected"';}?> value=<?php echo $select_menu_item;?>><?php echo $select_menu_item;?></option><?php
                    }?>                     
                  </select>
                </form>
                <!--------------------------MENU-LIST--------------------------->
                <?php 
                if($main_menu == 'bills'){
                  print_page_numbers($main_menu,$sub_menu, $select_menu, $pages);
                  ?><?php
                }?>
                <div class="pre-scrollable col-sm-12 col-xs-12 row-no-padding <?php echo $menu_list_class;?>" id="menu-list">
                  <?php 
                  if($main_menu == 'tweets'){
                    print_members($screen_name, $main_menu, $sub_menu, $select_menu, $members, $name);
                  }
                  if($main_menu == 'bills'){
                    
                    print_bills($main_menu, $sub_menu, $select_menu, $name, $bill_number, $bills, ($offset/20)+1); 
                   
                  }
                  if($main_menu == 'news'){
                    if($select_menu !== 'journalists'){
                      print_news_sources($main_menu, $sub_menu,  $select_menu, $name, $news_sources_icons, $news_sources['sources']);
                    }else{
                      print_news_authors($main_menu, $sub_menu, $select_menu, $authors, $name);
                    }
                  }
                  ?>  
                </div>
              </div>	
    				</div>
  				</div>
				    
				<!-- ///////////////////////////////////////////////TWEETS OR NEWS PRINT/////////////////////////////////-->
			 <?php
       if($main_menu == 'tweets' || $main_menu == 'news'){?>
        <div class="col-sm-9 col-xs-9 row-no-padding">
        <div class = "sub-menu1">
          <?php print_sub_menu1($main_menu, $sub_menu, $select_menu, $name, $screen_name);?>
			  </div>
			  <?php
       }
       if($main_menu == 'bills'){?>
         <div class="hidden-xl-down row-no-padding"><?php
       }?>
				
				  <?php 
				  if($main_menu == 'tweets'){
				    print_id_card($main_menu, $sub_menu, $screen_name, $name);
            print_tweets1($main_menu, $sub_menu, $name, $screen_name, $tweets_200 );			  
					}
          if($main_menu == 'news'){
            if(!empty($desc)){
              print_news_source_description($id, $desc, $news_sources_icons);
              $news_articles_class = 'pre-scrollable-news-articles';
            }
              print_news_articles($main_menu, $sub_menu, $articles, $top_word, $news_sources_icons, $news_articles_class);
          }
          if($main_menu == 'bills'){
            //print_bill($bill);
          }  
          
            //include 'counter.php';?>
          </div>
			  </div>
		  </div>
	  </div>
	  </div>
    </div>
   





  </body>
</html>





<script>


//accordian for showing bill details

// (function($) {
//     
  // var allPanels = $('.bills-list > li').hide();
//     
  // $('.bills-list > div > a').click(function() {
    // allPanels.slideUp();
    // $(this).parent().next().slideDown();
    // return false;
  // });
// 
// })(jQuery);



var lastitem='';
(function($) {

var allPanels = $('.bills-list > li').hide();

$('.bills-list > div > a').click(function() {
    allPanels.slideUp();
    if ($(this).text() != lastitem) {
        $(this).parent().next().slideDown();
        lastitem = $(this).text();
    } else {
        lastitem = '';
    };
    return false;
  });

})(jQuery);















//ajax for showing bill details
// $(document).ready(function() {
  // //$('#bloonga').load('print_bill.php');
  // $('.ajax_test  a').click(function(event) { 
       // event.preventDefault(); 
//   
     // var url = $(this).attr('href');
//     
     // $.get(url, function(data) {
       // //alert(data);
       // $('#bloonga').load(url);
      // });
      // return false;
  // });
// });




// $('.bill').hide();
// $('.clicker').on('click',
  // function() {
    // $('.bills-menu, .bills').toggle()
  // }
// );













//js for loading menu list to previously selected
$(function() {
   $(window).unload(function() {
      var scrollPosition = $("div#menu-list").scrollTop();
      localStorage.setItem("scrollPosition", scrollPosition);
   });
   if(localStorage.scrollPosition) {
      $("div#menu-list").scrollTop(localStorage.getItem("scrollPosition"));
   }
});






$('.new-tweet').tweetLinkify();
$('p.tweet').tweetLinkify();
$('span.tweet').tweetLinkify(); 



$('.navbar-toggle').on('click', function() {
  
   var mainDiv = document.querySelector('body');
    if(mainDiv.style.paddingTop === '160px'){
      mainDiv.style.paddingTop = '110px';
      //document.write(5 + 6);
    }else{
      mainDiv.style.paddingTop = '160px';
      //document.write(5 + 6);
    }
  
  
});



function loadDeviceSize() {
  
  
  if (document.documentElement.clientWidth < 320) {
  // scripts

    var x = document.getElementById('menu_list');
    var y = document.getElementById('list_results');
    if (x.style.display === 'none') {
       x.style.display = 'block';
    } else {
       
       x.style.display = 'none';
    }
    
     if (y.style.display && y.style.display === 'block') {
         // document.write('ynone');
        y.style.display = 'none';
    } else {
        // document.write('none');
        y.style.display = 'block';
        
    }
}
} 
 
 



$('.marqueee').autoTextTape({
      speed: 'normal'
    });

$('#marquee').webTicker();



</script>





















