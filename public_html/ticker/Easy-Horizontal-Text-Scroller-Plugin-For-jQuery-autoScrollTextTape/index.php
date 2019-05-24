<?php
	//session_start();
	include 'counter.php';
	include 'functions.php';
	require_once('TwitterAPIExchange.php');
	//include 'connect.php;
	
	////////////////////////YELLOW MENU SELECTOR///////////////////////////////////////////////////////////////////
	$menu = 'tweeters';
	if(isset($_GET['menu'])){
		$menu = $_GET['menu'];
	}
	
	$tweeters_menu = 'cabinet';
	if(isset($_GET['tweeters_menu'])){
	}
	
	$news_menu ='sources';
	if(isset($_GET['news_menu'])){
		$news_menu = $_GET['news_menu'];
	
	$tweeters_menu_items = ['cabinet', 'senate', 'house', 'other'];
	$news_menu_items = ['headlines', 'categories', 'authors', 'sources'];
	
	$style = "color:blue;font-size:12px;font-weight:bold;padding-left:20px";
	
	////////////////////////TRUMP DEFAULT SCREEN NAME/////////////////////////////////////////////////////
	$screen_name = '@realDonaldTrump';
	if(isset($_GET['screen_name'])){
		$screen_name = ($_GET['screen_name']);
	}
	
	//////////////////////GET TWEETS/////////////////////////////////////////////////////////////////////////
	if($menu == 'tweeters'){
		if($screen_name !== '@'){
			//$tweets_200 = get_tweets('&','100',$screen_name,3);
		}else{
			$errors['no twitter account'] = $_GET['first_name'].' '.$_GET['last_name'].' has no twitter account';
		}
		//save_tweets_file($responses, $conn);
		//$tweets_file = retrieve_tweets_file();
	
	////////////////////FILTER TWEETS BY DATE/////////////////////////////////////////////////////////////////
		$date_selectors = ['Mar', 'Feb', 'Jan', 'Prez Elect'];
		$date = "Mar";
		if(isset($_GET['date'])){
			$date = $_GET['date'];
		}	
		
		$tweets_dated = tweets_date_filter($date, $tweets_200);
	
	/////////////////////GET NEWS////////////////////////////////////////////////////////////////////////////
	}elseif($_GET['menu'] == 'news'){
		$news_sources = get_news_sources();
		list($articles, $articles_titles) = get_news_articles($news_sources);
		$top_words = top_words($articles_titles);
	}
	
	//////////////////////GET MEMBERS///////////////////////////////////////////////////////////////////////////
	if(isset($tweeters_menu)){
		if($tweeters_menu == 'senate' || $tweeters_menu == 'house'){
			$members = get_members($tweeters_menu);
		}
	}
	//
	//list($members,$democrats_twitter_accounts, $republicans_twitter_accounts, $democrats_names, $republicans_names) = get_congress_members();
								$cabinet_members = [

['title'=> 'President', 'image'=>get_user_info('@RealDonaldTrump')['profile_image_url'], 'name'=>get_user_info('@RealDonaldTrump')['name'], 'twitter_account' => '@realDonaldTrump', 'second_twitter_account' => '@potus'],			

['title'=> 'Vice President', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Mike_Pence_new_official_portrait.jpg/100px-Mike_Pence_new_official_portrait.jpg', 'name'=>'Mike Pence', 'twitter_account' => '@vp', 'second_twitter_account' => '@mike_pence'],

['title'=> 'Secretary of State', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Rex_Tillerson_official_Transition_portrait.jpg/100px-Rex_Tillerson_official_Transition_portrait.jpg', 'name'=>'Rex Tillerson', 'twitter_account' => '', 'second_twitter_account' => ''],
		
['title'=> 'Secretary of the Treasury', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/d/da/Steven-Mnuchin.jpg/18px-Steven-Mnuchin.jpg', 'name'=>'Steve Mnuchin', 'twitter_account' => '@stevenmnuchin1', 'second_twitter_account' => ''],

['title'=> 'Secretary of Defense', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/5/5c/James_Mattis_Official_SECDEF_Photo.jpg/100px-James_Mattis_Official_SECDEF_Photo.jpg', 'name'=>'James Mattis', 'twitter_account' => ' @realjimmattis', 'second_twitter_account' => ''],



['title'=> 'Attorney General', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Jeff_Sessions%2C_official_portrait.jpg/100px-Jeff_Sessions%2C_official_portrait.jpg', 'name'=>'Jeff Sessions', 'twitter_account' => '@USAGSessions', 'second_twitter_account' => '@jeffsessions'],

['title'=> 'Secretary of the Interior', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/2/23/Ryan_Zinke_official_photo.jpg/100px-Ryan_Zinke_official_photo.jpg', 'name'=>'Ryan Zinke', 'twitter_account' => '@RepRyanZinke', 'second_twitter_account' => '@RyanZinke'],

['title'=> 'Secretary of Agriculture', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/1d/No_image.svg/100px-No_image.svg.png', 'name'=>'Mike Young', 'twitter_account' => '', 'second_twitter_account' => ''],

['title'=> 'Secretary of Commerce', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/17/Wilbur_Ross_Official_Portrait_%28cropped%29.jpg/100px-Wilbur_Ross_Official_Portrait_%28cropped%29.jpg', 'name'=>'Wilbur Ross', 'twitter_account' => '@SecretaryRoss', 'second_twitter_account' => '@WilburRoss'],

['title'=> 'Secretary of Labor', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/1c/HuglerEdward.jpg/100px-HuglerEdward.jpg', 'name'=>'Ed Hugler', 'twitter_account' => '@realDonaldTrump'],

['title'=> 'Secretary of Health and Human Services', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Tom_Price_official_Transition_portrait.jpg/100px-Tom_Price_official_Transition_portrait.jpg', 'name'=>'Tom Price', 'twitter_account' => '@RepTomPrice', 'second_twitter_account' => ''],

['title'=> 'Secretary of Housing and Urban Development', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/6/6d/HUD_Secretary%2C_Ben_Carson_%28cropped%29.jpg/100px-HUD_Secretary%2C_Ben_Carson_%28cropped%29.jpg', 'name'=>'Ben Carson', 'twitter_account' => '@SecretaryCarlson', 'second_twitter_account' =>'@RealBenCarson'],

['title'=> 'Secretary of Transporation', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Elaine_L._Chao_%28cropped%29.jpg/100px-Elaine_L._Chao_%28cropped%29.jpg', 'name'=>'Elaine Chao', 'twitter_account' => '@SecElaineChao', 'second_twitter_account' => '@ElaineChao'],

['title'=> 'Secretary of Energy', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Gov._Perry_CPAC_February_2015_Blue.jpg/100px-Gov._Perry_CPAC_February_2015_Blue.jpg', 'name'=>'Rick Perry', 'twitter_account' => '@SecretaryPerry', 'second_twitter_account' => '@GovernorPerry'],

['title'=> 'Secretary of Education', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Betsy_DeVos_official_photo_%28cropped%29.jpg/100px-Betsy_DeVos_official_photo_%28cropped%29.jpg', 'name'=>'Betsy Devos', 'twitter_account' => '@BetsyDeVosED', 'second_twitter_account' => '@BetsyDeVos'],

['title'=> 'Secretary of Veterans Affairs', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/SECVA-David-Shulkin-MD.jpg/100px-SECVA-David-Shulkin-MD.jpg', 'name'=>'David Shulkin', 'twitter_account' => '@secShulkin'],

['title'=> 'Secretary of Homeland Security', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/John_Kelly_official_DHS_portrait.jpg/100px-John_Kelly_official_DHS_portrait.jpg', 'name'=>'John F. Kelly', 'twitter_account' => '', 'second_twitter_account' => '']
];
//printr($cabinet_members);
					
$cabinet_members_officials = [
					['title'=> 'White House Chief of Staff', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Reince_Priebus_by_Gage_Skidmore.jpg/100px-Reince_Priebus_by_Gage_Skidmore.jpg', 'name'=>'Reince Priebus', 'twitter_account' => '@Reince45', 'second_twitter_account' => '@Reince'],	
		
['title'=> 'Trade Representative', 'image'=>'//upload.wikimedia.org/wikipedia/commons/6/6d/No_image.png', 'name'=>'Stephen Vaughn', 'twitter_account' => '', 'second_twitter_account' => ''],

['title'=> 'Director of National Intelligence', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Dan_Coats_official_DNI_portrait.jpg/100px-Dan_Coats_official_DNI_portrait.jpg', 'name'=>'Dan Coats', 'twitter_account' => '@SenDanCoats', 'second_twitter_account' => '@DanCoats'],
		
['title'=> 'Ambassador to the United Nations', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/2/21/Nikki_Haley_official_Transition_portrait.jpg/100px-Nikki_Haley_official_Transition_portrait.jpg', 'name'=>'Nikki Haley', 'twitter_account' => '@nikkihaley'],

['title'=> 'Director of the Office of Management and Budget', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/1/18/Mick_Mulvaney%2C_Official_Portrait%2C_113th_Congress_%28cropped%29.jpg/100px-Mick_Mulvaney%2C_Official_Portrait%2C_113th_Congress_%28cropped%29.jpg', 'name'=>'Mick Mulvaney', 'twitter_account' => '', 'second_twitter_account' => ''],

['title'=> 'Director of the Central Intelligence Agency', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/2/23/Mike_Pompeo_official_Transition_portrait.jpg/100px-Mike_Pompeo_official_Transition_portrait.jpg', 'name'=>'Mike Pompeo', 'twitter_account' => '@RealMikePompeo', 'second_twitter_account' => ''],
					
					['title'=> 'Administrator of the Environmental Protection Agency', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/9/91/Scott_Pruitt%2C_EPA_official_portrait_%28cropped%29.jpg/100px-Scott_Pruitt%2C_EPA_official_portrait_%28cropped%29.jpg', 'name'=>'Scott Pruitt', 'twitter_account' => '@EPAScottPruitt', 'second_twitter_account' => '@ScottPruittOK'],
					
					['title'=> 'Administrator of the Small Business Administration', 'image'=>'//upload.wikimedia.org/wikipedia/commons/thumb/4/41/Linda_McMahon_official_photo.jpg/100px-Linda_McMahon_official_photo.jpg', 'name'=>'Linda McMahon', 'twitter_account' => '@SBALinda', 'second_twitter_account' => '@LindaMcMahon']
					
					
				
					];
					//printr($cabinet_members);
			$white_house_items = [['title' => 'President', 'image' =>'', 'name' => 'Donald J. Trump', 'twitter_account'=> '@potus'],
								
								  ];
								  
								  
								  
$republican_house_leaders = [

['title' => 'Speaker of the House', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Speaker_Paul_Ryan_official_photo_%28cropped_2%29.jpg/200px-Speaker_Paul_Ryan_official_photo_%28cropped_2%29.jpg', 'name' => 'Paul Ryan', 'twitter_account' => '@SpeakerRyan', 'second_twitter_account' => '@PRyan'],

['title' => 'House Majority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/7/70/House_Maj._Leader_Kevin_McCarthy_official_photo.jpg/93px-House_Maj._Leader_Kevin_McCarthy_official_photo.jpg', 'name' => 'Kevin McCarthy', 'twitter_account' => '@kevinomccarthy', 'second_twitter_account'=> ''],

['title' => 'House Majority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Steve_Scalise.jpg/94px-Steve_Scalise.jpg', 'name' => 'Steve Scalise', 'twitter_account' => '@SteveScalise', 'second_twitter_account' => '@GeauxScalise']
];							  
								  

								  
$republican_senate_leaders = [

['title' => 'Senate Majority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Mitch_McConnell_close-up.JPG/100px-Mitch_McConnell_close-up.JPG', 'name' => 'Mitch McConnell', 'twitter_account' => 'SenateMajLdr', 'second_twitter_account' => 'McConnell Press'],

['title' => 'Senate Majority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/3/39/John_Cornyn_official_portrait%2C_2009.jpg/103px-John_Cornyn_official_portrait%2C_2009.jpg', 'name' => 'John Cornyn', 'twitter_account' => '@JohnCornyn']
];


$democrat_house_leaders = [

['title' => 'House Minority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Nancy_Pelosi_2012.jpg/104px-Nancy_Pelosi_2012.jpg', 'name' => 'Nancy Pelosi', 'twitter_account' => '@NancyPelosi', 'second_twitter_account' => ''],
	  
['title' => 'House Minority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Steny_Hoyer%2C_official_photo_as_Whip.jpg/86px-Steny_Hoyer%2C_official_photo_as_Whip.jpg', 'name' => 'Steny Hoyer', 'twitter_account' => '', 'second_twitter_account' => ''],
];
		
	  


$democrat_senate_leaders = [

['title' => 'Senate Minority Leader', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/8/8d/Senator_Chuck_Schumer_%28cropped%29.jpg/112px-Senator_Chuck_Schumer_%28cropped%29.jpg', 'name' => 'Chuck Schumer', 'twitter_account' => 'SenSchumer', 'second_twitter_account' => '@chuckschumer'],

['title' => 'Senate Minority Whip', 'image' => '//upload.wikimedia.org/wikipedia/commons/thumb/0/03/Richard_Durbin_official_photo.jpg/103px-Richard_Durbin_official_photo.jpg', 'name' => 'Dick Durbin', 'twitter_account' => '@SenatorDurbin', 'second_twitter_account' => '@DickDurbin']
];

						  	?>
								  	
								  	
								  	
								  	

<!DOCTYPE html>
<html lang="en">
	<head><?php include 'head.html.php';?></head>
	<body>
		<div class="container main">	
		<?php include 'header.php';	?>
			<div class="header">
			<!-- YELLOW BAR MENU ----------------------------------->
				<div class="row " style="padding-top:3px;">
					<div class="col-sm-4 col-xs-4 row-no-padding" style="background-color:yellow;color:green;font-size:12px">
			  		  	<a href="?menu=tweeters" style="<?php if($menu == 'tweeters'){echo $style;}?>">tweeters</a>
			  		  	<a href="?menu=news" style="<?php if($menu == 'news'){echo $style;}?>">news</a>
							
						<div class ="row" style="padding-top:3px;">
							<div class="col-sm-12 col-xs-12 row-no-padding" style="background-color:white;color:green;font-size:12px">
								<?php 
								if($menu == 'tweeters'){
									foreach($tweeters_menu_items as $tweeters_menu_item){
										//echo $tweeters_menu_item;
										
										if($tweeters_menu_item == $tweeters_menu){$style = "color:blue;font-size:12px;font-weight:bold;padding-left:40px";}else{$style = "font-weight:normal;padding-left:40px;";}
										echo '<a href="?tweeters_menu='.$tweeters_menu_item.'" style='. $style.'>'.$tweeters_menu_item.'</a>&nbsp&nbsp&nbsp';
									}
								}elseif($menu == 'news'){
									
									foreach($news_menu_items as $news_menu_item){
										if($news_menu_item === $news_menu){$style = "color:blue;font-size:12px;font-weight:bold:padding-left:40px";}else{$style = "font-weight:normal";}
										echo '<a href="?menu='.$menu.'&news_menu='.$news_menu_item.'" style='. $style.'>'.$news_menu_item.'</a>&nbsp&nbsp&nbsp';
									}
								}
								if($menu == 'tweeters'){
									
								
								////////////////////CABINET//////////////////////////////
									if($tweeters_menu == 'cabinet'){?>
										<div class = "row">
											<div class="pre-scrollable col-sm-6 col-xs-6 row-no-padding gradlistd" style="background-color:#f9d6d9;color:black;border-radius:10px;padding:4px;">
												<ul>
												<?php
											    foreach($cabinet_members as $cabinet_member){
													//printr($cabinet_member['title']);
													echo '<a href="'.$cabinet_member['twitter_account'].'" style="padding-left:3px;font-size:10px;"><span>'; 
													echo '<li style = "width:100%;box-shadow: 0px 1px 0px #d6f6f9;border-radius:4px;white-space:nowrap;overflow:hidden;"data-toggle="tooltip" title="'.$cabinet_member['twitter_account'].'">';
													echo '<div style="color:blue;text-shadow: 1px 1px white">'.$cabinet_member['title'].'</div>'; 
													echo '<div style="float:left;height:35px;"><img style="width:20px;margin:4px;border-radius:3px;border:1px solid white;" alt="" src="'.$cabinet_member['image'].'" width="20"></div>';
													echo '<div style="color:green;font-size:14px;padding-left:3px;text-shadow: 1px 1px white">'.$cabinet_member['name'].'<br></div>';
													echo '</li></span></a>';; 
												}
												?>
												</ul>
											</div>
											<div class="pre-scrollable col-sm-6 col-xs-6 gradliste" style="background-color:#f9d6d9;color:black;border-radius:10px;padding:4px;">
												<ul>
												<?php
											    foreach($cabinet_members_officials as $cabinet_member){
													echo '<a href="'.$cabinet_member['twitter_account'].'" style="padding-left:3px;font-size:10px;"><span>'; 
													echo '<li style = "width:100%;box-shadow: 0px 1px 0px #d6f6f9;border-radius:4px;white-space:nowrap;overflow:hidden;"data-toggle="tooltip" title="'.$cabinet_member['twitter_account'].'">';
													echo '<div style="color:blue;text-shadow: 1px 1px white">'.$cabinet_member['title'].'</div>'; 
													echo '<div style="float:left;height:35px;"><img style="width:20px;margin:4px;border-radius:3px;border:1px solid white;" alt="" src="'.$cabinet_member['image'].'" width="20"></div>';
													echo '<div style="color:green;font-size:14px;padding-left:3px;text-shadow: 1px 1px white">'.$cabinet_member['name'].'<br></div>';
													echo '</li></span></a>';; 
												}
												?>
												</ul>
											</div>
										</div>
									<?php
									}
	
								//////////////////////////HOUSE//SENATE//////////////////////////////////////	
															
									if($tweeters_menu == 'senate' || $tweeters_menu == 'house'){?>
										<div class = "row">
											<div class="pre-scrollable col-sm-6 col-xs-6 row-no-padding" style="background-color:#d6f6f9;color:black;border-radius:10px;padding:4px;">
												<p>Democrats</p>
												<ul>
												<?php 	
												
												foreach($members as $member){
													if($member['party'] == 'D'){
														if(isset($_GET['screen_name'])){
														//echo $_GET['screen_name'];
														if($_GET['screen_name'] == '@'.$member['twitter_account']){$color = 'purple';}else{$color = 'blue';}
														}else{
															$color = 'blue';
														}
														
														echo'<span><li style="display:block;float:left;clear:left;"><a href="?screen_name=@'.$member['twitter_account'].'&chamber='.$chamber.'&first_name='.$member['first_name'].'&last_name='.$member['last_name'].'" style="color:'.$color.'" data-toggle="tooltip" title="@'.$member['twitter_account'].' -'.$member['state'].'" data-placement="auto right">'.$member['first_name'] .' '.$member['last_name'].'</a>&nbsp<img src='.get_user_info($member['twitter_account'])['profile_image_url'].' alt="Smiley face" style="width:18px;margin:4px;border-radius:5px;"></li></span><br>';	
													}
												}
												
												
												?>
												</ul>
											</div>
					
											<div class="pre-scrollable col-sm-6 col-xs-6" style="background-color:#f9d6d9;color:black;border-radius:10px;padding:4px;">
											    <p>Republicans</p>
												<ul>
												<?php 
												
												foreach($members as $member){
													if($member['party'] == 'R'){
														if(isset($_GET['screen_name'])){
														if($_GET['screen_name'] == '@'.$member['twitter_account']){$color = 'purple';}else{$color = 'blue';}
														}else{
															$color = 'blue';
														}
														echo'<li style="display:block;float:left;clear:left;"><a href="?screen_name=@'.$member['twitter_account'].'&chamber='.$chamber.'&first_name='.$member['first_name'].'&last_name='.$member['last_name'].'" style="color:'.$color.'" data-toggle="tooltip" title="@'.$member['twitter_account'].'"data-placement="auto right">'.$member['first_name'] .' '.$member['last_name'].'</a></li></span>&nbsp';
													}
												}
												?>
												</ul>
											</div>
										</div>
									<?php
									}
									
									if($tweeters_menu == 'other'){?>
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
									<?php
									}
								}
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								if($menu == 'news'){
								//////////////////////////////////////NEWS SOURCES/////////////////////////////////////////////	
									if($news_menu == 'sources'){
										
										
										?>
											<div class = "row">
											<div class="pre-scrollable col-sm-6 col-xs-6 row-no-padding" style="background-color:#d6f6f9;color:black;border-radius:10px;padding:4px;">
												<p>news sources go here</p>
												<ul>
												<?php echo 'hiiiii';
												foreach($members as $member){
													if($member['party'] == 'D'){
														if(isset($_GET['screen_name'])){
														//echo $_GET['screen_name'];
														if($_GET['screen_name'] == '@'.$member['twitter_account']){$color = 'purple';}else{$color = 'blue';}
														}else{
															$color = 'blue';
														}
														echo '<span><li style="padding-left:3px";><img src='.get_user_info($member['twitter_account'])['profile_image_url'].' alt="Smiley face" style="width:20px;margin:4px;border-radius:5px;">';	
														echo'<li style="display:block;float:left;clear:left;"><a href="?screen_name=@'.$member['twitter_account'].'&chamber='.$chamber.'&first_name='.$member['first_name'].'&last_name='.$member['last_name'].'" style="color:'.$color.'" data-toggle="tooltip" title="@'.$member['twitter_account'].' -'.$member['state'].'" data-placement="auto right">'.$member['first_name'] .' '.$member['last_name'].'</a></li></span>&nbsp';
													}
												}
												?>
												</ul>
											</div>
					
											<div class="pre-scrollable col-sm-6 col-xs-6" style="background-color:#f9d6d9;color:black;border-radius:10px;padding:4px;">
											    <p>and here</p>
												<ul>
												<?php 
												
												foreach($members as $member){
													if($member['party'] == 'R'){
														if(isset($_GET['screen_name'])){
														if($_GET['screen_name'] == '@'.$member['twitter_account']){$color = 'purple';}else{$color = 'blue';}
														}else{
															$color = 'blue';
														}
														echo'<li style="display:block;float:left;clear:left;"><a href="?screen_name=@'.$member['twitter_account'].'&chamber='.$chamber.'&first_name='.$member['first_name'].'&last_name='.$member['last_name'].'" style="color:'.$color.'" data-toggle="tooltip" title="@'.$member['twitter_account'].'"data-placement="auto right">'.$member['first_name'] .' '.$member['last_name'].'</a></li></span>&nbsp';
													}
												}
												?>
												</ul>
											</div>
										</div>
										<?php
									}}
									?>
								
								
								
								
								
								
								
								
								
								
								
								
								
							</div>
	                	</div>
					</div>
					<div class="col-sm-8 col-xs-8  row-no-padding" style="background-color:yellow;color:green;font-size:12px;">
						<?php 
						if(isset($date_selectors)){
						foreach($date_selectors as $date_selector){
							if($date == $date_selector){$color = 'green';}else{$color = 'blue';}
								if($screen_name !== '@realDonaldTrump' && $date_selector == 'Prez Elect'){
								}else{
								echo'<a href="?date='.$date_selector.'&screen_name='.$screen_name.'" style="color:'.$color.';font-size:10px;padding:0px 20px">'.$date_selector.'</a>&nbsp&nbsp&nbsp';	
							}
						}}else{
							echo 'suffr';
						}	
						?>
						<div class = "row">
							<div class="col-sm-12 col-xs-12 pre-scrollable" style="background-color:transparent;">
								<?php
								
								$trans = trans();
				
								foreach($trans as $k => $v){
									if($v == $_GET['top']){
										$target_words[] = $k;
										
										$pair=($v);
									
									}
								}
				
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
								}else{
									if(isset($tweets_200)){
										print_tweets($tweets_dated);
									}else{
										printr($errors['no twitter account']);
									}
								}
								?>
							</div>
						</div>
					
	  		 		</div>
	  		        
			</div>	
		</div> 
</div>
	<?php
	//echo "You are visitor number $counterVal to this site";
	//mysqli_close($conn);
	?>
	
</body>
</html>





<script>
$('p#test').tweetLinkify();
$('span#test').tweetLinkify();
</script>