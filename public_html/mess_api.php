<div class="container-fluid">
  <nav class="navbar navbar-default nav-lower">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-bottom" aria-expanded="false"> <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>

      </button>
      <a class="navbar-brand navbrand-hidden" href="#">Collapse Nav</a>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-bottom">
      <div class="row" id="bottomInfoRow">
        <div class="col-sm-4">
          <ul class="nav navbar-nav">
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
          </ul>
        </div>
        <div class="col-sm-4">
          <ul class="nav navbar-nav">
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
          </ul>
        </div>
        <div class="col-sm-4">
          <ul class="nav navbar-nav">
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
            <li><a href="#">Link</a>

            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
	
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