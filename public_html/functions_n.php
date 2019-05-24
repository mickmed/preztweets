<?php

///////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////NEWS STUFF////////////////////////////////////////////

function get_news_sources($category, $country, $language){
  $news_sources = get_curl('https://newsapi.org/v1/sources?language='.$language.'&country='.$country.'&category='.$category.'&apiKey=44e5ca1e7d1d461bbfc466448884c1c9','');
  return $news_sources;
}

function get_articles($news_sources){
  foreach($news_sources as $source){
    //printr($source['id']);
    $articles_groups = [get_curl('https://newsapi.org/v1/articles?source='.$source['id'].'&apiKey=44e5ca1e7d1d461bbfc466448884c1c9',''), [$source]];
      foreach($articles_groups as $article_group){
        foreach($article_group['articles'] as $article){
          $article['source_id'] = $source['id']; 
          $article['source'] = $source['name'];
          $articles[] = $article;
        }
      }
  }
  return $articles;
}

function get_news_source($news_sources, $id){
  foreach($news_sources as $news_source){
    if($id == $news_source['id']){
      $source[] = $news_source;
      
    }
  } 
  return $source;
}

function get_authors($articles){
  foreach($articles as $article){
    if(!empty($article['author'])){
      $authors[] = ltrim(rtrim($article['author'])).' ('.$article['source'].')';
    }
  }
  $authors = array_unique($authors);
  sort($authors);
  return($authors);
}

function get_articles_author($articles, $name){
  foreach($articles as $article){
    if($name == ltrim(rtrim($article['author'])).' ('.$article['source'].')'){
      $author_articles[] = $article;
    }
  } 
  return $author_articles;
}

function get_news_source_icon($news_sources_icons, $news_source){
 // printr($news_source);
  foreach($news_sources_icons as $news_source_icon){
    if($news_source_icon['id'] == $news_source){
     return $news_source_icon['logo'];
    }
  }
} 


///////////////////////////////////PRINT NEWS STUFF///////////////////////////////////////////////////////////////




function print_news_sources($main_menu, $sub_menu, $select_menu, $name, $news_sources_icons, $news_sources){?>
  <ul class="news-list"><?php
  foreach($news_sources as $news_source){
    if($name == $news_source['name']){$class_selected = 'member-selected';}else{$class_selected = ' ';}?>
      <a href="?main_menu=<?php echo $main_menu ?>&sub_menu=<?php echo $sub_menu;?>&select_menu=<?php echo $select_menu;?>&name=<?php echo $news_source['name'];?>&id=<?php echo$news_source['id'];?>&desc=<?php echo $news_source['description'];?>">
        <span> 
          <li class = "<?php echo 'independent'.' '.$class_selected;?>">
            <img class="news-categories-pic" alt="?" src="<?php echo get_news_source_icon($news_sources_icons,$news_source['id']);?>">
            <div><?php echo $news_source['name'];?></div>
          </li>
        </span>
      </a> 
    <?php
  }?>
  </ul><?php
}

  
function print_news_authors($main_menu, $sub_menu, $select_menu, $authors, $name){?>
  <ul><?php
    foreach($authors as $author){
      if($name == $author){$class_selected = 'member-selected';}else{$class_selected = ' ';}?>
      <a href="?name=<?php echo $author;?>&main_menu=<?php echo $main_menu ?>&sub_menu=<?php echo $sub_menu;?>&select_menu=<?php echo $select_menu;?>">
        <span> 
          <li class = "<?php echo 'news_menu_list'.' '.$class_selected;?>">
            <?php echo $author;?>
          </li>
        </span>
      </a><?php
    }?>
  </ul><?php
}

function print_news_source_description($id, $desc, $news_sources_icons){
  ?>
  <ul class="news-description">
    <div class = "row">
      <div class="col-sm-1 col-xs-2 row-no-padding">
        
        <img class="news-categories-pic" alt="?" src="<?php echo get_news_source_icon($news_sources_icons,$id);?>">
        
      </div>
      <div class="col-sm-11 col-xs-10 row-no-padding">
        <?php echo ($desc); ?>
      </div>
    </div>
  </ul><?php
  
}
function print_key_words(){?>
     <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="keywords"><?php 
            $top_words = array_splice($top_words, 1);
            //printr($top_words);
            foreach($top_words as $top_word){?>
              <a href="?main_menu=<?php echo $main_menu;?>&sub_menu=<?php echo $sub_menu;?>&top=<?php echo $top_word;?>"><?php echo $top_word;?></a>&nbsp;<?php
            }?>
          </div><?php 
          if(isset($_GET['top'])){
            foreach($articles as $article){
              if(strpos($article['title'], $_GET['top']) !== FALSE){
                $article['title'] = str_replace($_GET['top'],'<span style="color:red">'.$_GET['top'].'</span>', $article['title']);?>
                <div class="keyword-news">
                  <a href = "<?php echo $article['url'];?>">
                    <img src="<?php echo $article['urlToImage'];?>" alt="">
                    <?php echo($article['title']);?>
                    <img class="keyword-news-article-icon" src="<?php echo get_news_source_icon($news_sources_icons,$article['source_id'])?>" alt="">
                  </a>
                </div><?php
              }
            }
          }?>       
        </div>
       </div> 
  
  <?php
}

function print_news_articles($main_menu, $sub_menu, $articles, $top_word, $news_sources_icons, $news_articles_class){?>
  <div class = "row">
    <div class="col-sm-12 col-xs-12 row-no-padding">
   
      <ul class = "row pre-scrollable news-articles <?php echo $news_articles_class?>"><?php  
        if(!isset($_GET['top'])){          
          foreach($articles as $article){?>
            <a target="_blank" href = "<?php echo $article['url'];?>"> 
            <li class="col-sm-2 col-xs-2 row-no-padding">
              <img style="width:90%" src="<?php echo $article['urlToImage'];?>" alt="">
            </li>
            <li class="col-sm-7 col-xs-7 row-no-padding">
              <p><?php echo($article['title']);?></p>
            </li>
            
            <li class="col-sm-2 col-xs-2 row-no-padding news-icon">
              <img src="<?php echo get_news_source_icon($news_sources_icons,$article['source_id']);?>" alt="">
            </li>
            </a><?php
          }
        }?>
      </ul>
    </div>
  </div>
  <?php
}

function excluded_words(){
  $excluded_words = ['AIa', 't', 'https', 'co', 'the', 'to', 'and', 'in', 'of', 'i', 'a', 'is', 'you', 'for', 'will', 'on', 'be', '-', 'that', 'with', 'at', 'are', 'the', 'have', 'it', 'our', 'by', 'great', 'was', 'all', 'has', 'my', 'we', 'We', 'me', 'not', 'so', 'out', 'this', 'from', 'a', 'her', 'as','who', 'just', 'about', 'she', 'u', 'they', 'am', 'going', 'but', 'he', 'get', 'your', 'been', 'amp', 'after', 's', 'over', 'says', 'is', 'up', 'no', 'why', 'rise', 'what', 'into', 'new', 'how', 'an', 'may','could', 'if', 'these', 'or', 'some', 'TV', 'his', 'between', 'claims','r', 'can', 'know', 'us', 'in', 'house', 'bill', 'u.s.','of the', 'more', 'than', 'say', '|', '•', 'cnn', 'video',"it's"];
  
  return $excluded_words;
}

function trans(){
  $trans = array("Donald" => "Trump", "Attacker" => "Attack", "Vote On" => "Vote", "White" => "White House", "House" => "White House", "Health" => "Health Care", "Care" => "Health Care", "Trump's" => "Trump");
  
  return $trans;
}


function top_words($strings){
  //printr($strings);
  
  $strings = implode(" ",$strings);//make long string from strings
  $strings = explode(" ",ucwords(strtolower($strings)));//make array of single words
  
  //printr($strings);
  
  $pairs = array();// make array of paired words
  for($i=0;$i<count($strings)-1;$i++) {
    $pairs[] =  $strings[$i].' '.$strings[$i+1];
  }
  $pairs[] =  $strings[$i];
  //printr($pairs);
  
  $words_and_pairs = array_merge($strings, $pairs);
  
  //printr($words_and_pairs);
  
  
  $excluded_words = excluded_words();
  foreach($excluded_words as $excluded_word){
    
    $excluded_words_capped[] = ucfirst($excluded_word);
  }
  foreach($excluded_words_capped as $excluded_word){
    $excluded_words_nulled[$excluded_word] = '';  
  }
  
  $trans = trans();
  
  $filtered_words = array_merge($excluded_words_nulled, $trans);
  
//printr($filtered_words);
  
  foreach($filtered_words as $find => $replace){
    //echo $find;
    //echo $replace;
    $find_pos = array_keys($words_and_pairs, $find);
    $replacements[] = '';
    foreach($find_pos as $replace_pos){
      //echo $replace_pos;
      $replacements[$replace_pos] = $replace;
      //printr($replace_pos);
    }
    
  }
  //printr($replacements);
    $words_and_pairs_filtered = array_replace($words_and_pairs, $replacements);
  //printr($words_and_pairs_filtered);
  
  
  $words_and_pairs_counts = array_count_values($words_and_pairs_filtered);
    arsort($words_and_pairs_counts);
  
   //printr($words_and_pairs_counts);
    $top_words = array_slice($words_and_pairs_counts, 0, 20);
  
  //printr(($top_words));
  return array_keys($top_words);
  
}








function excluded_pairs(){
  
  $excluded_pairs = ['injured in'];
  
  // foreach($excluded_words as $excluded_word){
//    
    // $excluded_words[] = ucfirst($excluded_word);
  // }
  return $excluded_pairs;
  
}




function strpos_all($haystack, $needle) {
    $offset = 0;
    $allpos = array();
    while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
        $offset   = $pos + 1;
        $allpos[] = $pos;
    }
    return $allpos;
}

