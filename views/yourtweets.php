<div class="container mainContainer">
    <div class="row">
        <div class="col-8">
        
            <h1>Your tweets</h1>
            <?php displayTweets('yourtweets'); ?>
        
        </div>
        <div class="col-4">
        
            <?php displaySearch(); ?>
            <br>
            <?php displayTweetBox(); ?> 
            
        </div>
    </div>
</div>