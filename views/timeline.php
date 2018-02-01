<div class="container mainContainer">
    <div class="row">
        <div class="col-8">
        
            <h1>Tweets for you</h1>
            <?php displayTweets('isfollowing'); ?>
        
        </div>
        <div class="col-4">
        
            <?php displaySearch(); ?>
            <br>
            <?php displayTweetBox(); ?> 
            
        </div>
    </div>
</div>