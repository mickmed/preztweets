<?php

///////////////////////////////GET TWEETS///////////////////////////////////////////////////////
function get_tweets($max_id, $count, $screen_name, $loop_count){
  $x = 0;
  do{
    $settings = oauth_settings();
    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = 'screen_name='.$screen_name.'&tweet_mode=extended&count='.$count.$max_id;
    $requestMethod = 'GET';
    $twitter = new TwitterAPIExchange($settings);
    $response = json_decode($twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest(),$assoc = TRUE);
      if(isset($response[98])){
        //echo 'here';
        $max_id = '&max_id='.$response[98]['id'].'<br><br>';
      }else{
        $responses[] = $response;
        break;
      }
      $responses[] = $response;
      $x++;
  }while ($x<$loop_count);
    
  $tweets = compile_tweets_array($responses);
  return $tweets;
}

function compile_tweets_array($responses){
  if($responses){
    foreach($responses as $response){
      foreach($response as $tweet){
        $tweets[]=$tweet;
      }
    }
  }
  if(isset($tweets)){
  return$tweets;
  }
}

function tweets_date_filter($date, $tweets){
  if($date == 'Apr'){
    $start_time = "2017-04-01";
    $end_time = "2017-05-01";
  }elseif($date == 'Mar'){
    $start_time = "2017-03-01";
    $end_time = "2017-04-01";
  }elseif($date == 'Feb'){
    $start_time = "2017-02-01";
    $end_time = "2017-03-01";
  }elseif($date == 'Jan'){
    $start_time = "2017-01-20";
    $end_time = "2017-02-01";
  }elseif($date == 'Prez Elect'){
    $start_time = "2016-11-09";
    $end_time = "2017-01-20";
  }
  $tweets_dated = sort_tweets($tweets, strtotime($start_time), strtotime($end_time));
  return $tweets_dated;
}


/////////////////////////OATH SETTINGS - GET TWEETS FROM TWITTER API//////////////////////////////////////////
function oauth_settings(){
  $settings = array(
      'oauth_access_token' => "821841132162256896-LTghjZmDXupYsqB67IQus5abkAA08Nr",
      'oauth_access_token_secret' => "0VCfVgZMfDbdYRyT9RZyPkSjCMeNZHr9UE0NB7AGwTMat",
      'consumer_key' => "D2XmaahJ0oS9265Faa8WUWLRB",
      'consumer_secret' => "1gSklQbaxio6nnxj62iwXg9gr96s1wg8Xk2nymzfN49GqU1Djv"
      );  
  return $settings;
}

////////////////////////////////SORT TWEETS//////////////////////////////////////////////////////////////////////////
function sort_tweets($tweets, $oldest_date, $newest_date){
  foreach($tweets as $tweet){
    if(strtotime($tweet['created_at']) > $oldest_date && strtotime($tweet['created_at']) < $newest_date){
      $tweets_date[] = $tweet;
    }
  }
  if(isset($tweets_date)){//printr($tweets_date);
    return $tweets_date;
  }
}


///////////////////////////////////SAVE TWEETS TO DATABASE/////////////////////////////////////////
function save_tweets_db($response, $conn){
  foreach($response as $value){
    $full_text = filter_var($value['full_text'], FILTER_SANITIZE_STRING); 
    $sql = "INSERT tweets (user_id, screen_name, text, created_at) VALUES ('".($value['user']['id'])."','".($value['user']['screen_name'])."','".($full_text)."', '".($value['created_at'])."');";
    if (mysqli_query($conn, $sql)) {
      $last_id = $conn->insert_id;
      echo "record created successfully";
    }else{
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  
    if(!empty($value['entities']['media'])){
      foreach($value['entities']['media'] as $url){
      $sql="UPDATE tweets SET media_url='".$url['media_url']."' WHERE id =".$last_id."";
      //echo '<img src='.$url['media_url'].' alt="Smiley face"><br><br>';
        if (mysqli_query($conn, $sql)) {
          echo "record created successfully";
        }else{
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    }
  }
  return $response;
}


/////////////////////////////SAVE TWEETS TO FILE//////////////////////////////////////////////////////////
function save_tweets_file($responses, $conn){
  for ($i = 0; $i <= 10; $i++) {
      if(!file_exists('trump_tweets'.$i.'.bin')){
      
      file_put_contents('trump_tweets'.$i.'.bin', serialize($responses));
      exit;
    }
  }
}

function retrieve_tweets_file(){
  for ($i = 0; $i <= 10; $i++) {
      if(!file_exists('trump_tweets'.$i.'.bin')){
      $i = $i-1;
      //echo 'trump_tweets'.$i.'.bin';
      $responses = unserialize(file_get_contents('trump_tweets'.$i.'.bin'));
      $tweets = compile_tweets_array($responses);
      return $tweets;
    }
  } 
}
//////////////////////////////////////SAVE MEMBERS FILE////////////////////////////////////
function save_members_file($members, $chamber){
  for ($i = 0; $i <= 10; $i++) {
    if(file_exists('members'.$i.'.bin')){
      $num = $i+1;      
    }
  }
  if(!file_exists('members'.$i.'.bin')){
    $num = 0;
  }
}

function retrieve_members_file($chamber){
  for ($i = 0; $i <= 10; $i++) {
    if(!file_exists('members'.$chamber.$i.'.bin')){
      $i = $i-1;
      $responses = unserialize(file_get_contents('members'.$chamber.$i.'.bin'));
      return $responses;
    }
  } 
  file_put_contents('members'.$chamber.$num.'.bin', serialize($members));
}

///////////////////////GET CONGRESS MEMBERS BY CHAMBER//////////////////////////////////////////
function get_members($chamber){
  $headers = ["X-API-Key: YAEy2UF8VY2cDr2z6TbN3cV8ozaJUgt5kuqxars7"];
  $congress_members = get_curl("https://api.propublica.org/congress/v1/115/".$chamber."/members.json", $headers);
  foreach($congress_members['results'] as $details){
    foreach($details['members'] as  $member){
      $members[] = $member;
    }     
  }
  return $members;
}

/////////////////////////GET SPECIFIC CONGRESS MEMBER////////////////////////////////////////////////////
function get_specific_member($member_id){
  $headers = ["X-API-Key: YAEy2UF8VY2cDr2z6TbN3cV8ozaJUgt5kuqxars7"];
  $congress_member_details = get_curl("https://api.propublica.org/congress/v1/members/K000388.json", $headers);
  return $congress_member_details;
}

//////////////////////////GET CONGRESS MEMBERS TWITTER USER INFO//////////////////////////////////////////////////
function get_user_info($screen_name){
  //echo $screen_name;
  $settings = oauth_settings();
    $url = 'https://api.twitter.com/1.1/users/show.json';
  $getfield = 'screen_name='.$screen_name;
  $requestMethod = 'GET';
  $twitter = new TwitterAPIExchange($settings);
  $response = json_decode($twitter->setGetfield($getfield)
  ->buildOauth($url, $requestMethod)
  ->performRequest(),$assoc = TRUE);
  return $response;
}

//////////////////////////////////SAVE CONGRESS PHOTOS////////////////////////////////////////
function save_congress_photos($members){
  foreach($members as $member){
   // printr($member);
    $twitter_member = get_user_info($member['twitter_account']);  
    copy($twitter_member['profile_image_url'], "img/congress/".$member['id'].".jpg");
    //$content = file_get_contents($member['profile_image_url']);
    //file_put_contents('/img/congress/flower.jpg', $content);
  }  
  printr($membero['profile_image_url']); 
  // printr($member['profile_image_url']);  
  copy($membero['profile_image_url'], "img/congress/".$membero['id'].".jpg");
}

////////////////////////ALPHABETIZE CONGRESS MEMBERS///////////////////////////////////////////////
function sort_congress_atoz($array, $key){
  foreach($array as $k => $v){
    $b[]=strtolower($v[$key]);
  }
  asort($b);
  foreach($b as $k => $v){
    $c[]=$array[$k];
  }
  return($c);
}

///////////////////PRINT MEMBERS LIST////////////////////////////////////////////////////////////////////
function print_members($screen_name, $main_menu, $sub_menu, $select_menu, $members, $name){
  //printr($cabinet_members);
  echo '<ul class="member-list">';
  foreach($members as $member){
    if(!$member['name']){
     $member['name'] = $member['first_name'].' '.$member['last_name'];
     //$img = get_user_info('@'. $member['twitter_account'])['profile_image_url'];
     $img = "img/congress/".$member['id'].".jpg";
    }else{
      $img = "img/cabinet/".$member['name'].".jpg";
    }
    if($member['party'] == 'I'){$class = 'independent';}
    elseif($member['party'] == 'D'){$class = 'democrat';}
    elseif($member['party'] == 'R'){$class = 'republican';}
    if($name == $member['name']){$class_selected = 'member-selected';}else{$class_selected = ' ';}?>

    <a href="?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>&select_menu=<?php echo $select_menu;?>&screen_name=<?php echo $member['twitter_account'];?>&name=<?php echo $member['name'];?>&second_twitter_account=<?php echo $member['second_twitter_account'];?>">
      <span> 
        <li class = "<?php echo $class.' '.$class_selected;?>">
         
       
          <img src="<?php echo $img?>">
         
         <div class="member-title">
           <?php echo $member['title'];?>
          
           
         </div>
         <div class="member-name">
          <?php echo $member['name'];?>
         </div>
        </li>
      </span>
    </a><?php
  }
  echo '</ul>';
}
/////////////////////////////PRINT TWEETS//////////////////////////////////////////////////////////
function print_id_card($main_menu, $sub_menu, $screen_name, $name){?>
  
  <ul class="id-card">
    <div class = "row">
      <div class="col-sm-12 row-no-padding">
        <div class="row">
          <div class="col-sm-4 row-no-padding">
             <span>
              <li data-toggle="tooltip" title="<?php echo $member['twitter_account'];?>">
                <img class="img-rounded" src="<?php echo get_user_info($screen_name)['profile_image_url'];?>" alt="<?php echo '';?>">             
                <div class="id-card-details">
                  <div><?php echo $name;?></div>
                  <div><?php echo $screen_name;?></div>
                  <div>
                    <a href="?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>&screen_name=<?php echo $second_twitter_account;?>&name=<?php echo $name;?>&second_twitter_account=<?php echo $screen_name;?>"><?php echo $second_twitter_account;?></a>
                  </div>
                </div>
              </li>
            </span>
          </div>
          <div class="col-sm-6 row-no-padding id-card-desc">
            <li><?php echo get_user_info($screen_name)['description']?></li>
          </div>
          <div class="col-sm-2 row-no-padding"> 
            <li class="pull-right">
              <p><div class = "glyphicon glyphicon-menu-left"></div><?php echo ' '. get_user_info($screen_name)['followers_count'];?></p>
              <p><div class = "glyphicon glyphicon-menu-right"></div><?php echo ' '. get_user_info($screen_name)['friends_count'];?></p>
              <p><div class = "glyphicon glyphicon-heart"></div><?php echo ' '. get_user_info($screen_name)['favourites_count'];?></p>
            </li>
          </div>
        </div>
      </div>
    </div>
  </ul><?php
}


function print_tweets1($main_menu, $sub_menu, $name, $screen_name, $tweets_200){
    if(isset($tweets_200)){?>
      <div class = "row">
        <div class="col-sm-11 row-no-padding newest-tweet">
          <div class="col-sm-9 col-xs-12 row-no-padding">
            <p class='created_at'><?php echo date('M d, H:i', strtotime($tweets_200[0]['created_at'])+(date('Z'))+3600*2);?></p>
            <p class='tweet'><?php echo $tweets_200[0]['full_text'];?></p><br>
          </div>
          <div class="col-sm-3 hidden-xs-down row-no-padding"><?php
            if(!empty($tweets_200[0]['entities']['media'])){
              foreach($tweets_200[0]['entities']['media'] as $url){
                echo '<img src='.$url['media_url'].' alt="pic not available">';
              }
            }?>
          </div>  
        </div>  
      </div>
      <div class = "row">
        <div class="col-sm-12 pre-scrollable row-no-padding tweets">
          <div class="row"><?php
            foreach($tweets_200 as $k => $tweet){
              if($k > 0){
                if(!empty($tweet['retweeted_status'])){
                  $full_text = $tweet['retweeted_status']['full_text'];
                }else{
                  $full_text = $tweet['full_text'];
                }
                date_default_timezone_set('America/New_York');
                $utc_offset =  date('Z');?>
              <div class="col-sm-10">
                <p class='created_at'><?php echo date('M d, H:i', strtotime($tweet['created_at'])+(date('Z'))+3600*2);?></p>
                <p class='created_at tweet'><?php echo $full_text; ?></p>
              </div>
              <div class="col-sm-2"><?php
                if(!empty($tweet['entities']['media'])){
                  foreach($tweet['entities']['media'] as $url){
                    echo '<img src='.$url['media_url'].' alt="Smiley face" style="width:100px" align="middle" class="img-responsive">';
                  }
                }?>
              </div><?php
            }
          }?>
        </div>
      </div>
    </div><?php
  }
}
?>
