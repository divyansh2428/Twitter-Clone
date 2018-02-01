<div class="container mainContainer">
    <div class="row">
        <div class="col-8">
            
            <?php 
            if(array_key_exists("userid",$_GET)){
                displayTweets($_GET['userid']);
            }
            else{
                echo "<h1>Active Users</h1>";
                displayUsers();
            }
            ?>
        </div>
        <div class="col-4">
        
            <?php displaySearch('search'); ?>
            <br>
            <?php displayTweetBox(); ?> 
            
        </div>
    </div>
</div>