<div class="latest_news">
    <div class="container">
        <div class="row">

      <div class="latest_news_title">
        <div class="col-md-12">
                <h2>Latest News from <big>INHEALTH</big> <span style="color:#f26529">AGENCY</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
              </div>
            </div>

      
        
                
                
                
            <div class="latest_newsslider">
                
                <ul id="flexiselDemo3">
                    <?php 
                         if(!empty($newsRes)){
                            foreach($newsRes as $news){
                              $news_id = stripslashes($news['News']['news_id']);
                              $newsSlug = stripslashes($news['News']['slug']);
                              $newsPDetail = $this->Custom->BapCustUniPageByID(9);
                            $newsURL = $base_url."pages/".$newsPDetail['AdminPage']['page_slug']."/".$newsSlug;
                              $news_img= $base_url."files/news/".$news['News']['news_img'];
                      ?> 

                    <li>
                      <div class="col-md-12">
                        <img src="<?php echo $news_img ?>" alt="">
                          <span class="textareabox">
                              <h3><?php echo stripslashes($news['News']['news_title']);?></h3>
                               <p><?php echo $this->Custom->getShortContent(80,stripslashes($news['News']['news_content']))?></p> 
                                <a href="<?php echo $newsURL;?>" class="allbtn2">read more</a>
                            </span>
                        </div>
                    </li>
                    <?php } }?>
                    
                </ul>    

             </div>
        </div>
    </div>
</div>