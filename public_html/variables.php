<?php



$main_menu_items = ['tweets', 'news', 'bills'];
$main_menu = 'tweets';
if(isset($_GET['main_menu'])){
	$main_menu = $_GET['main_menu'];
}
//echo $_GET['select_menu'];
//////////////////////GET TWEETERS/////////////////////////////////////////////////////////////////////////
if($main_menu == 'tweets'){
  $sub_menu_items = ['white house', 'congress']; 
  $sub_menu = 'white house';
  if(isset($_GET['sub_menu'])){
    $sub_menu = $_GET['sub_menu'];
  }
	///////////////////WHITE HOUSE///////////////////// 
  if($sub_menu == 'white house'){
    include 'cabinet_members.php';
    $select_menu_items = ['all representatives', 'executive', 'cabinet', 'personelle', 'exes'];

    $select_menu = 'all';
    //  echo $_GET['select_menu'];
    if(isset($_GET['select_menu'])){
      $select_menu = $_GET['select_menu'];
    }
    if($select_menu == 'executive'){
      $name = $executive[0]['name'];
      $screen_name=$executive[0]['twitter_account'];
      $members = $executive;
    }elseif($select_menu == 'cabinet'){
      $name = $cabinet[0]['name'];
      $screen_name=$cabinet[0]['twitter_account'];
      $members = $cabinet;    
    }elseif($select_menu == 'personelle'){
      $name = $personelle[0]['name'];
      $screen_name=$personelle[0]['twitter_account'];  
      $members = $personelle;  
    }elseif($select_menu == 'all'){
      //printr($all_members);
      $name = $all_members[0]['name'];
      $screen_name=$all_members[0]['twitter_account'];   
      $members = $all_members;
    }
  
 
  }
  //////////////////CONGRESS//////////////////////////
  if($sub_menu == 'congress'){
	  $select_menu_items = ['all representatives', 'house','senate', 'democrats', 'independents', 'republicans', 'house_democrats', 'house_republicans', 'senate_democrats', 'senate_republicans'];
    $select_menu = 'all';
    if(isset($_GET['select_menu'])){
      $select_menu = $_GET['select_menu'];
    }
		// $house_members = retrieve_members_file('house');
    // $senate_members = retrieve_members_file('senate');
    $house_members = get_members('house');
    $senate_members = get_members('senate');
    $congress_members = array_merge($house_members, $senate_members);
    
  	if($select_menu == 'all'){
  	  $members = $congress_members;
    }
    //save_congress_photos($members);
    if($select_menu == 'house'){
      $members = $house_members;
      //printr($members);
    }
    if($select_menu == 'senate'){
      $members = $senate_members;
    }
    if($select_menu == 'independents' || 'democrats' || 'republicans'){  
      foreach($congress_members as $congress_member){
        if($select_menu == 'independents'){
          if($congress_member['party'] == "I"){
            $members[] = $congress_member;
          }
        }
        if($select_menu == 'democrats'){
          if($congress_member['party'] == "D"){
            $members[] = $congress_member;
          } 
        } 
        if($select_menu == 'republicans'){
          if($congress_member['party'] == "R"){
            $members[] = $congress_member;
          }
        }   
      }
    }
    if($select_menu == 'house_democrats' || 'house_republicans'){ 
      foreach($house_members as $house_member){
        if($select_menu == 'house_democrats'){
          if($house_member['party'] == "D"){
            $members[] = $house_member;
          } 
        }
        if($select_menu == 'house_republicans'){
          if($house_member['party'] == "R"){
            $members[] = $house_member;
          }
        }	
      }
    }
    if($select_menu == 'senate_democrats' || 'senate_republicans'){ 
      foreach($senate_members as $senate_member){
        if($select_menu == 'senate_democrats'){
          if($senate_member['party'] == "D"){
            $members[] = $senate_member;
          } 
        }
        if($select_menu == 'senate_republicans'){
          if($senate_member['party'] == "R"){
            $members[] = $senate_member;
          }
        } 
      }
    }
 
  $congress_members_atoz = sort_congress_atoz($members, 'last_name');
  $members = $congress_members_atoz;
  $screen_name=$members[0]['twitter_account'];
  $name = $members[0]['first_name']. ' ' . $members[0]['last_name']; 
  $second_twitter_account = " ";
  //printr($members[0]);  

}

  if(isset($_GET['screen_name'])){
    $screen_name = ($_GET['screen_name']);
  }
  if(isset($_GET['name'])){
      $name = ($_GET['name']);
  }else{
    if(isset($_GET['first_name'])){
    $name = $_GET['first_name'] . ' ' . $_GET['last_name'];
    }
  }
  if(isset($_GET['second_twitter_account'])){
    $second_twitter_account = $_GET['second_twitter_account'];
  }else{
    $second_twitter_account = " ";
  }
    
 if($screen_name !== '@'){
    $tweets_200 = get_tweets('&','100',$screen_name,3);
  }else{
    $errors['no twitter account'] = $_GET['first_name'].' '.$_GET['last_name'].' has no twitter account';
 }
}
	// ////////////////////FILTER TWEETS BY DATE/////////////////////////////////////////////////////////////////
  // $date_selectors = ['Apr', 'Mar', 'Feb', 'Jan', 'Prez Elect'];
  // $date = "Apr";
  // if(isset($_GET['date'])){
    // $date = $_GET['date'];
  // } 
//   
  // $tweets_dated = tweets_date_filter($date, $tweets_200);
    
  //////////////////////GET CONGRESS MEMBERS///////////////////////////////////////////////////////////////////////////
	
	//$get_house_members = get_members('house');
	//$get_senate_members = get_members('senate');
	
	//$house_members = save_members_file($get_house_members, 'house');
	//$senate_members = save_members_file($get_senate_members, 'senate');
	
	//save_tweets_file($responses, $conn);
  //$tweets_file = retrieve_tweets_file();

	$menu_list_class = "pre-scrollable-members-list";
	
////////////////////////////////////////////////BILLS//////////////////////////////////////////////
if($main_menu == 'bills'){
  
  $sub_menu_items = ['house', 'senate', 'both']; 
  $sub_menu = 'both';
  if(isset($_GET['sub_menu'])){
    $sub_menu = $_GET['sub_menu'];
  }

  
  
  $select_menu_items = ['introduced', 'updated', 'active', 'passed', 'enacted', 'vetoed']; 
  $select_menu = 'introduced';
  if(isset($_GET['select_menu'])){
    $select_menu = $_GET['select_menu'];
  }

  if($select_menu){
    $status = $select_menu;
  }
  
  $pages = [1,2,3,4,5,6,7,8,9,10];
  
  $page = 1;
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  
  $offset = ($page*20)-20;
 
  
  
  
  
  $bills = get_recent_bills($sub_menu, $status, $offset);
  //printr($bills);
  
  //$name = '';
  $name = ($bills[0]['bill_slug']); 
  if(isset($_GET['name'])){                                                                                                                                                                                                                                                                                                                                                                                                                               
    $name = strtok($_GET['name'], '-');
  }
  
  
  //echo $status;
   //printr($name);
   
    $bill = get_specific_bills($sub_menu, $name);
   //printr($bill);
    
   //$bills = get_recent_bills();
 
  
  
   $menu_list_class = "pre-scrollable-bills-list"; 

  
 
  
	
	
	
}


/////////////////////////////////GET NEWS///////////////////////////////////////////////
if($main_menu == 'news'){
  include 'news_sources_icons.php';
  $sub_menu_items = ['categories', 'countries', 'lang'];

  
  
  $sub_menu="categories"; 
  if(isset($_GET['sub_menu'])){
    $sub_menu = $_GET['sub_menu'];
  }
 
  
  if($sub_menu == 'categories'){
    $select_menu_items = ['all', 'business', 'entertainment', 'gaming', 'general', 'music', 'politics', 'science-and-nature', 'sport', 'technology', 'journalists']; 
    $select_menu = 'general';
    if(isset($_GET['select_menu'])){
      $select_menu = $_GET['select_menu'];
    } 
    //echo $select_menu;
    if($select_menu == 'all'){
      $category = '';
    
    }else{
      $category = $select_menu;
    }
    
    $news_sources = get_news_sources($category, '', 'en');
    //printr($news_sources);
    
   
    if(isset($_GET['name'])){
      $name = $_GET['name'];
      $id = $_GET['id'];
      $desc = $_GET['desc'];
      $news_source = get_news_source($news_sources['sources'], $id);
      $articles = get_articles($news_source);
    }else{
    
      $name = '';
      $id = '';
      $desc = '';
      $articles = get_articles($news_sources['sources']);
    
    }
    
      
    if($select_menu == 'journalists'){
      
      $news_sources = get_news_sources('', '', '');
      $articles = get_articles($news_sources['sources']);
      
      $authors = get_authors($articles);  
      
      //printr($authors);
      
      if(isset($_GET['name'])){
       
        $name = $_GET['name'];
        $id = $_GET['id'];
        $articles = get_articles_author($articles, $name);
      }
    }
    
   $articles = sort_congress_atoz($articles, ('publishedAt'));
    $articles = array_reverse($articles);
  //printr($articles);   
    
  }
  
     
  if($sub_menu == 'countries'){
    $select_menu_items = ['all','us'=>'united_states', 'gb'=>'great_britain', 'au'=>'australia', 'de'=>'germany', 'in'=>'india', 'it'=>'italy', ];
    $select_menu = 'all';
    if(isset($_GET['select_menu'])){
      $select_menu = $_GET['select_menu'];
    } 
  
    
    if($select_menu == 'all'){
      $country = '';}
    elseif($select_menu == 'united_states'){
      $country = 'us';}  
    elseif($select_menu == 'great_britain'){
      $country = 'gb';}
    elseif($select_menu == 'australia'){
      $country = 'au';} 
    elseif($select_menu == 'germany'){
      $country = 'de';}
    elseif($select_menu == 'india'){
      $country = 'in';} 
    elseif($select_menu == 'italy'){
      $country = 'it';}  
    if(isset($_GET['name'])){
      $name = $_GET['name'];
      $id = $_GET['id'];
      
       $news_sources = get_news_sources('', $country, '');
      $news_source = get_news_source($news_sources['sources'], $id);
      //printr($news_source);
      $articles = get_articles($news_source);
      
    }else{
       $news_sources = get_news_sources('', $country, '');
      $name = '';
      $id = '';
      $articles = get_articles($news_sources['sources']);
    
    }
    
   
    $articles = sort_congress_atoz($articles, ('publishedAt'));
    $articles = array_reverse($articles);
    
  }
	
  if($sub_menu == 'lang'){
    $select_menu_items = ['all', 'en'=>'english', 'de'=>'german', 'fr'=>'french'];
    $select_menu = 'all';
    if(isset($_GET['select_menu'])){
      $select_menu = $_GET['select_menu'];
    } 
  
    if($select_menu == 'all'){
        $language = '';}
      elseif($select_menu == 'english'){
        $language = 'en';}  
      elseif($select_menu == 'german'){
        $language = 'de';}
      elseif($select_menu == 'french'){
        $language = 'fr';} 
      $news_sources = get_news_sources('', '', $language);
      
      if(isset($_GET['name'])){
      $name = $_GET['name'];
      $id = $_GET['id'];
      
       $news_sources = get_news_sources('', '', $language);
      $news_source = get_news_source($news_sources['sources'], $id);
      //printr($news_source);
      $articles = get_articles($news_source);
      
    }else{
        $news_sources = get_news_sources('', '', $language);
      $name = '';
      $id = '';
      $articles = get_articles($news_sources['sources']);
    
    }
    
   
      
      $articles = sort_congress_atoz($articles, ('publishedAt'));
      $articles = array_reverse($articles);  
    } 
    $menu_list_class = "pre-scrollable-news-list";
  }
  //printr($articles); 
  // if($sub_menu == 'journalists'){
    // 
    // //printr($articles);
  // }
//   
  // include 'news_sources_icons.php'; 
//  
  // foreach($articles as $article){
    // $articles_top_words[] = $article['title'];
  // } 
  // //printr($articles_top_words);	
	// $top_words = top_words($articles_top_words);
	// //printr($articles);



/////////////////////CABINET MEMBERS///////////////////////////////

