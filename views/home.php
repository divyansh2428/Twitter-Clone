<div class="container mainContainer">
    <div class="row">
        <div class="col-8">
        
            <h1>Recent Tweets</h1>
            <?php displayTweets('public'); ?>
        
        </div>
        <div class="col-4">
        
            <?php displaySearch('search'); ?>
            <br>
            <?php displayTweetBox(); ?> 
            
        </div>
    </div>
</div>