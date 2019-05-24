				if(isset($_GET['top'])){
									if(isset($target_words)){
												
											
										foreach($articles as $article){
										
											if(strpos($article['title'], $pair) !== FALSE  || strpos($article['title'], strtolower($pair)) !== FALSE){
												$article['title'] = 
												//str_replace($target_word,'<span style="color:red">'.($target_word).'</span>', $article['title']); 
												str_replace(array($pair, strtolower($pair)), array('<span style="color:red">'.($pair).'</span>', '<span style="color:red">'.strtolower($pair).'</span>'), $article['title']);
												?>
												<a href = "<?php echo $article['url'];?>"><pre style="overflow:hidden"><img class="" style="float:left;width:100px" src="<?php echo $article['urlToImage'];?>" alt="news pic not available">&nbsp&nbsp<?php echo($article['title']).' &nbsp&nbsp';?><img class="" style="float:right;height:18px" src="<?php echo $article['news_source_small_logo'];?>" alt="news logo not available"><br><br><br></pre></a>
												<?php
											}		
										}				
											
										foreach($articles as $article){
											if(
											(strpos($article['title'], $target_words[0]) !== FALSE && strpos($article['title'], $target_words[1]) === FALSE) ||
											(strpos($article['title'], strtolower($target_words[0])) !== FALSE && strpos($article['title'], strtolower($target_words[1])) === FALSE)){
												$article['title'] = 
												str_replace(array($target_words[0], strtolower($target_words[0])), array('<span style="color:red">'.($target_words[0]).'</span>', '<span style="color:red">'.strtolower($target_words[0]).'</span>'), $article['title']);
												?>
												<a href = "<?php echo $article['url'];?>"><pre style="overflow:hidden"><img class="" style="float:left;width:100px" src="<?php echo $article['urlToImage'];?>" alt="news pic not available">&nbsp&nbsp<?php echo($article['title']).' &nbsp&nbsp';?><img class="" style="float:right;height:18px" src="<?php echo $article['news_source_small_logo'];?>" alt="news logo not available"><br><br><br></pre></a>
												<?php
											}
											
											if(
											(strpos($article['title'], $target_words[1]) !== FALSE && strpos($article['title'], $target_words[0]) === FALSE) ||
											(strpos($article['title'], strtolower($target_words[1])) !== FALSE && strpos($article['title'], strtolower($target_words[0])) === FALSE)){
												$article['title'] = 
												str_replace(array($target_words[1], strtolower($target_words[1])), array('<span style="color:red">'.($target_words[1]).'</span>', '<span style="color:red">'.strtolower($target_words[1]).'</span>'), $article['title']);
												
												?>
												<a href = "<?php echo $article['url'];?>"><pre style="overflow:hidden"><img class="" style="float:left;width:100px" src="<?php echo $article['urlToImage'];?>" alt="news pic not available">&nbsp&nbsp<?php echo($article['title']).' &nbsp&nbsp';?><img class="" style="float:right;height:18px" src="<?php echo $article['news_source_small_logo'];?>" alt="news logo not available"><br><br><br></pre></a>
												<?php
											}
										}
									
									}else{
										foreach($articles as $article){
										
											if(strpos($article['title'], $_GET['top']) !== FALSE){
												$article['title'] = 
												//str_replace($target_word,'<span style="color:red">'.($target_word).'</span>', $article['title']); 
												str_replace(array($_GET['top'], strtolower($_GET['top'])), array('<span style="color:red">'.$_GET['top'].'</span>', '<span style="color:red">'.strtolower($_GET['top']).'</span>'), $article['title']);
												?>
												<a href = "<?php echo $article['url'];?>"><pre style="overflow:hidden"><img class="" style="float:left;width:100px" src="<?php echo $article['urlToImage'];?>" alt="news pic not available">&nbsp&nbsp<?php echo($article['title']).' &nbsp&nbsp';?><img class="" style="float:right;height:18px" src="<?php echo $article['news_source_small_logo'];?>" alt="news logo not available"><br><br><br></pre></a>
												<?php
											}		
										}				
									}				
								}<style>
	
	
.container {position:relative;}
.row {clear: both;}
.row div {float: left; width: 75px; margin-bottom: 20px}

.header .row{ /*position: fixed;*/ background: #3d7;}
.table {height: 200px; overflow-y: auto; overflow-x: hidden}

</style>


<?php

include 'head.html.php';
?>

<div class="container">
    <div class="header">
        <div class="row" >
                <div class="col-md-1">id</div>
                <div class="col-md-3">L Name</div>
                <div class="col-md-1">M</div>
                <div class="col-md-2">F Name</div>
                <div class="col-md-3">Username</div>
                <div class="col-md-2">Phone</div>
          </div><!-- row -->
     </div>            
     <div class="table">
                <div class="row" >
                <div class="col-md-1">id</div>
                <div class="col-md-3">L Name</div>
                <div class="col-md-1">M</div>
                <div class="col-md-2">F Name</div>
                <div class="col-md-3">Username</div>
                <div class="col-md-2">Phone</div>
            </div><!-- row -->
                <div class="row" >
                <div class="col-md-1">id</div>
                <div class="col-md-3">L Name</div>
                <div class="col-md-1">M</div>
                <div class="col-md-2">F Name</div>
                <div class="col-md-3">Username</div>
                <div class="col-md-2">Phone</div>
            </div><!-- row -->
<!-- some data -->
            <div class="row">
                <div class="col-md-1">id</div>
                <div class="col-md-3">L Name</div>
                <div class="col-md-1">M</div>
                <div class="col-md-2">F Name</div>
                <div class="col-md-3">Username</div>
                <div class="col-md-2">Phone</div>
            </div><!-- row -->
                <div class="row">
                <div class="col-md-1">id</div>
                <div class="col-md-3">L Name</div>
                <div class="col-md-1">M</div>
                <div class="col-md-2">F Name</div>
                <div class="col-md-3">Username</div>
                <div class="col-md-2">Phone</div>
            </div><!-- row -->

    </div>    
</div>

<a href="#">President of the U.S.A</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Mike_Pence_new_official_portrait.jpg/100px-Mike_Pence_new_official_portrait.jpg" width="20" height="20"></a>
<a href="#">Mike Pence</a><br><br>



<a href="#">Vice President</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Mike_Pence_new_official_portrait.jpg/100px-Mike_Pence_new_official_portrait.jpg" width="20" height="20"></a>
<a href="#">Mike Pence</a><br><br>
													

<a href="#">Secretary of State</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Rex_Tillerson_official_Transition_portrait.jpg/100px-Rex_Tillerson_official_Transition_portrait.jpg" width="20" height="20"></a>
<a href="#">Rex Tillerson</a><br><br>

<a href="#">Secretary of the Treasury</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/d/da/Steven-Mnuchin.jpg/18px-Steven-Mnuchin.jpg" width="20" height="20"></a>
<a href="#">Steve Mnuchin</a><br><br>

<a href="#">Secretary of Defense</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/5/5c/James_Mattis_Official_SECDEF_Photo.jpg/100px-James_Mattis_Official_SECDEF_Photo.jpg" width="20" height="20"></a>
<a href="#">James Mattis</a><br><br>

<a href="#">Attorney General</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Jeff_Sessions%2C_official_portrait.jpg/100px-Jeff_Sessions%2C_official_portrait.jpg" width="20" height="20"></a>
<a href="#">Jeff Sessions</a><br><br>

<a href="#">Secretary of the Interior</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/2/23/Ryan_Zinke_official_photo.jpg/100px-Ryan_Zinke_official_photo.jpg" width="20" height="20"></a>
<a href="#">Ryan Zinke</a><br><br>

<a href="#">Secretary of Agriculture</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/1/1d/No_image.svg/100px-No_image.svg.png"  width="20" height="20"></a>
<a href="#">Mike Young</a><br><br>

<a href="#">Secretary of Commerce</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/1/17/Wilbur_Ross_Official_Portrait_%28cropped%29.jpg/100px-Wilbur_Ross_Official_Portrait_%28cropped%29.jpg" width="20" height="20"></a>
<a href="#">Wilbur Ross</a><br><br>

<a href="#">Secretary of Labor</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/1/1c/HuglerEdward.jpg/100px-HuglerEdward.jpg" width="20" height="20"></a>
<a href="#">Ed Hugler</a><br><br>

<a href="#">Secretary of Health and Human Services</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Tom_Price_official_Transition_portrait.jpg/100px-Tom_Price_official_Transition_portrait.jpg" width="20" height="20"></a>
<a href="#">Tom Price</a><br><br>

<a href="#">Secretary of Housing and Urban Development</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/6/6d/HUD_Secretary%2C_Ben_Carson_%28cropped%29.jpg/100px-HUD_Secretary%2C_Ben_Carson_%28cropped%29.jpg" width="20" height="20"></a>
<a href="#">Ben Carson</a><br><br>

<a href="#">Secretary of Transporation</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Elaine_L._Chao_%28cropped%29.jpg/100px-Elaine_L._Chao_%28cropped%29.jpg" width="20" height="20"></a>
<a href="#">Elaine Chao</a><br><br>

<a href="#">Secretary of Energy</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Gov._Perry_CPAC_February_2015_Blue.jpg/100px-Gov._Perry_CPAC_February_2015_Blue.jpg" width="20" height="20"></a>
<a href="#">Rick Perry</a><br><br>

<a href="#">Secretary of Education</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Betsy_DeVos_official_photo_%28cropped%29.jpg/100px-Betsy_DeVos_official_photo_%28cropped%29.jpg" width="20" height="20"></a>
<a href="#">Betsy DeVos</a><br><br>

<a href="#">Secretary of Veterans Affairs</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/SECVA-David-Shulkin-MD.jpg/100px-SECVA-David-Shulkin-MD.jpg" width="20" height="20"></a>
<a href="#">David Shulkin</a><br><br>

<a href="#">Secretary of Homeland Security</a><br>
<a href="#" class="image"><img alt="" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/John_Kelly_official_DHS_portrait.jpg/100px-John_Kelly_official_DHS_portrait.jpg" width="20" height="20"></a>
<a href="#">John F. Kelly</a><br><br>




<a href="#" class="image"><img alt="Seal of the United States Department of the Treasury.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Seal_of_the_United_States_Department_of_the_Treasury.svg/75px-Seal_of_the_United_States_Department_of_the_Treasury.svg.png" width="20" height="20"  /></a>
<a href="//en.wikipedia.org/wiki/United_States_Secretary_of_the_Treasury" title="United States Secretary of the Treasury">Secretary of the Treasury</a>



<a href="#" class="image"><img alt="Steven-Mnuchin.jpg" src="//upload.wikimedia.org/wikipedia/commons/thumb/d/da/Steven-Mnuchin.jpg/18px-Steven-Mnuchin.jpg" width="18" height="18"></a>
<a href="#" title="Steven Mnuchin">Steve Mnuchin</a><br><br>


	
	if($twitter_menu == 'other'){?>
										<div class = "row">
											<div class="pre-scrollable col-sm-6 col-xs-6 row-no-padding" style="background-color:#d6f6f9;color:black;border-radius:10px;padding:4px;">
												<p>Democrats</p>
												<ul>
												<?php
												foreach($white_house_items as $white_house_item){
												echo '<span><li style="padding-left:3px";><img src='.get_user_info($white_house_item)['profile_image_url'].' alt="Smiley face" style="width:20px;margin:4px;border-radius:5px;">';	
												echo'<a href="?screen_name=@'.$white_house_item.'" style="color:'.$color.'" data-toggle="tooltip" title="@'.$white_house_item.'" data-placement="auto right">'.$white_house_item.'</a></li></span>&nbsp';
												}
												?>
												</ul>
											</div>
										</div>		
										


	
	
	// $wiki = 'http://en.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&rvsection=0&titles=pizza&format=json';
	// $iduno = get_news_sources();
	// printr($iduno);
	// printr($wiki);
	
	

// action=parse: get parsed text
// page=Baseball: from the page Baseball
// format=json: in json format
// prop=text: send the text content of the article
// section=0: top content of the page

// $url='https://en.wikipedia.org/w/api.php?action=query&titles=Cabinet%20of%20the%20United%20States&prop=revisions&rvprop=content&rvsection=5&format=json&formatversion=2';
// $ch = curl_init($url);
// curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt ($ch, CURLOPT_USERAGENT, "TestScript (http://preztweets.com; mick2090@gmail.com)"); // required by wikipedia.org server; use YOUR user agent with YOUR contact information. (otherwise your IP might get blocked)
// $c = curl_exec($ch);
// //printr($c);	
// $json = json_decode($c,$true);
 // // printr($json);
 // foreach($json as $k=> $v){
 	// //printr($k);
	// //printr($v);
	 // foreach($v as $w=>$x){
	 	// //printr($w);
		 // //p/rintr($x);
		 // foreach($x as $w => $z){
// 		 	
			// //printr($z);
			 // foreach($z as $a => $b){
			 	// //printr($b);
// 				 
				 // foreach($a as $c=>$d){
				 	// //print($d);
				 // }
			 // }
		 // }
	 // }
 // }
// $content = $json->{'parse'}->{'text'}->{'*'}; // get the main text content of the query (it's parsed HTML)
// 
// // pattern for first match of a paragraph
// $pattern = '#<p>(.*)</p>#Us'; // http://www.phpbuilder.com/board/showthread.php?t=10352690
// if(preg_match($pattern, $content, $matches))
// {
    // // print $matches[0]; // content of the first paragraph (including wrapping <p> tag)
    // print strip_tags($matches[1]); // Content of the first paragraph without the HTML tags.
// }
//printr($content);	








if(!empty($screen_name)){
            
          // echo get_user_info($screen_name)['description'];
          // echo get_user_info($screen_name)['followers_count'];
          // echo get_user_info($screen_name)['friends_count'];
          // echo get_user_info($screen_name)['favorites_count'];
          
          // echo($member['results'][0]['url']);
          // echo($member['results'][0]['date_of_birth']);
          // echo($member['results'][0]['facebook_account']);
          // echo($member['results'][0]['roles'][0]['state']);
          // echo($member['results'][0]['roles'][0]['seniority']);
          // echo($member['results'][0]['roles'][0]['district']);
          // echo($member['results'][0]['roles'][0]['start_date']);
          // echo($member['results'][0]['roles'][0]['end_date']);
          // echo($member['results'][0]['roles'][0]['phone']);
          // echo($member['results'][0]['roles'][0]['committees'][0]['name']);
          // echo($member['results'][0]['roles'][0]['committees'][1]['name']);
          //echo($member['results'][0]['roles'][0]['committees'][2]['name']);
          echo '</li>';
          }
          $menu_screen_names = ['@realDonaldTrump', '@potus', '@vp', '@BarackObama'];
          $member = get_specific_member($_GET['id']);
          // foreach($menu_screen_names as $menu_screen_name){
          // if($menu_screen_name == $screen_name){$color='blue';$bold='font-weight:bold';}else{$color='green';$bold='font-weight:normal';}
          // if($menu_screen_name == '@realdonaldtrump'){$href='index.php';}else{$href='?screen_name='.$menu_screen_name;}
          // //echo $href;
          // echo '<li style="padding-left:5px";><img class="img-rounded" src='.get_user_info($menu_screen_name)['profile_image_url'].' alt="Smiley face" style="width:40px;margin:4px;border-radius:5px;">'; 
          // echo'<a href="'.$href.'" style="padding:15px 5px;color:'.$color.';width:120px;display:inline-block" data-toggle="tooltip" title="'.get_user_info($menu_screen_name)['name'].'"data-placement="auto right">'.$menu_screen_name.'</a></li>&nbsp';
          // //printr(get_user_info($menu_screen_name));
          // };
	<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php 
                echo '<img class="" src="img/white house/white_house.jpg" alt="Smiley face" style="height:44px;border-radius:20px;">'; 
                ?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <span> 
                <li style="list-style:none;" data-toggle="tooltip" title="<?php echo $member['twitter_account'];?>">
                  <div style="float:left;width:40px;height:40px;">
                    <?php echo '<img class="img-rounded" src='.get_user_info($screen_name)['profile_image_url'].' alt="Smiley face" style="height:44px;border-radius:5px;">'; ?>
                  </div>
                  <div style="float:left;padding-left:10px">
                    <div style="font-size:12px"><?php echo $name;?></div>
                    <div style="font-size:10px"><?php echo $screen_name;?></div>
                    <div style="font-size:10px">
                     <?php 
                     foreach($cabinet_members as $cabinet_member){
                       if($cabinet_member['name'] == $name){
                         echo $cabinet_member['second_twitter_account'];
                       } 
                     }
                    ?>
                    </div>
                  </div>
                  
                </li>
                <li class="pull-right">
                  <div style="font-size:9px;text-align:right" class="pull-right">
                    <p><div class = "glyphicon glyphicon-menu-left"></div><?php echo ' '. get_user_info($screen_name)['followers_count'];?></p>
         
                    <p><div class = "glyphicon glyphicon-menu-right"></div><?php echo ' '. get_user_info($screen_name)['friends_count'];?></p>
                    <p><div class = "glyphicon glyphicon-heart"></div><?php echo ' '. get_user_info($screen_name)['favourites_count'];?></p>
                         
                    
                    
                  </div>
                </li>
              </span>
              <li><a href="#">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>









<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
    </div>      
   
    <div class="collapse navbar-collapse grad" id="navbar">
      
      <div class="row" style="">
        
        <div class="col-sm-1 row-no-padding" style="padding-top:5px;">
          <a href="index.php" class=""> 
            <ul class="nav navbar-nav">
              <li style="padding:0px;">
                <?php 
                echo '<img class="" src="img/white house/white_house.jpg" alt="Smiley face" style="height:44px;border-radius:20px;">'; 
                ?>
              </li>
            </ul>
          </a>
        </div>
        
        <div class="col-sm-3 row-no-padding" style="padding-top:5px;padding-left:10px;">   
          <a href="?screen_name=<?php $screen_name;?>&sub_menu=<?php echo $sub_menu;?>">
            <ul class="nav navbar-nav" style="width:100%;padding-right:10px">
              <span> 
                <li style="list-style:none;" data-toggle="tooltip" title="<?php echo $member['twitter_account'];?>">
                  <div style="float:left;width:40px;height:40px;">
                    <?php echo '<img class="img-rounded" src='.get_user_info($screen_name)['profile_image_url'].' alt="Smiley face" style="height:44px;border-radius:5px;">'; ?>
                  </div>
                  <div style="float:left;padding-left:10px">
                    <div style="font-size:12px"><?php echo $name;?></div>
                    <div style="font-size:10px"><?php echo $screen_name;?></div>
                    <div style="font-size:10px">
                     <?php 
                     foreach($cabinet_members as $cabinet_member){
                       if($cabinet_member['name'] == $name){
                         echo $cabinet_member['second_twitter_account'];
                       } 
                     }
                    ?>
                    </div>
                  </div>
                  
                </li>
                <li class="pull-right">
                  <div style="font-size:9px;text-align:right" class="pull-right">
                    <p><div class = "glyphicon glyphicon-menu-left"></div><?php echo ' '. get_user_info($screen_name)['followers_count'];?></p>
         
                    <p><div class = "glyphicon glyphicon-menu-right"></div><?php echo ' '. get_user_info($screen_name)['friends_count'];?></p>
                    <p><div class = "glyphicon glyphicon-heart"></div><?php echo ' '. get_user_info($screen_name)['favourites_count'];?></p>
                         
                    
                    
                  </div>
                </li>
              </span>
           </ul>
         </a> 
      </div>

      <div class = "col-sm-8" style="padding-top:5px">    
        <ul class="nav navbar-nav">
          <li><?php echo get_user_info($screen_name)['description'];?></li>
         </ul>
      </div>
    </div>          
 </div>
            

    <!-- NEWS MARQUEE ------------------------------------->
    <div class="row">
      <div class = "col-md-11">
        <marquee scrollamount=3 scrolldelay=5 class="marquee">
        <?php 
        shuffle($shuffled_articles);
        //printr($shuffled_articles);
        // foreach($shuffled_articles as $article){
          // //printr($article);
          // echo '<a href="'.$article['url'].'"><span>'.$article['title'].'</span><span style="font-size:10px">('.$article['name'].')</span> </a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        // }
        ?>
        </marquee>
      </div>
      <div class = "col-md-1">
        <a href="http://newsapi.org" style="text-align:right;font-size:8px;padding-right:3px;">powered by NewsAPI.org</a>
      </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-xs-12">
        <div style=";overflow:word-wrap;border-width:1px;border-style:solid;border-radius:10px;font-size:10px;margin-bottom:10px;padding:3px;">
        <?php 
        $top_words = array_splice($top_words, 1);
        //printr($top_words);
        foreach($top_words as $top_word){
          echo '<a href="?top='.$top_word.'">'.$top_word.'</a>&nbsp ';
        }
        ?>
        </div>
      </div>
    </div>  
    </div>
</nav>


  


  