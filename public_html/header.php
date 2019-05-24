<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class = "pink-blue">
      <!-- <div class="navbar-header"> -->
        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> -->
        
        <ul class="navbar-brand">
          <a href="index.php"><img src="img/white house/white_house.jpg" alt="preztweets"></a> 
        </ul>
      <!-- </div>  -->
       
      
    <?php print_main_menu($main_menu_items, $main_menu);?>  
      
   </div> 
  
   <!-- NEWS MARQUEE ------------------------------------->
    <div class="row">
      <div class = "col-md-10">
        <ul id = "marquee">
          <!-- <?php 
          $shuffled_articles = $articles;
          shuffle($shuffled_articles);
          //printr($shuffled_articles);
          foreach($shuffled_articles as $article){
            //printr($article);
          ?>
          <li><a href="<?php echo $article['url']?>"><?php echo $article['title'];?> - </a></li>
          <?php
          }
          ?>  -->
        </ul>
      </div>
      <!-- <div class = "col-md-2 row-no-padding">
        <a href="http://newsapi.org" style="text-align:right;font-size:11px;padding-right:15px;float:right">powered by NewsAPI.org</a>
      </div> -->
    </div>
  </div><!--/.container -->
</nav>






  


	