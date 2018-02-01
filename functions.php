<?php
$z=0;
session_start();
$link=mysqli_connect("localhost","root","divyansh2428","twitter");

if(mysqli_connect_error())
    die("Connection not established");

if(array_key_exists("function",$_GET)){
    if($_GET["function"]=="logout") 
            session_unset();
}
function time_since($since) {
    $chunks = array(
        array(60 * 60 * 24 * 365 , 'year'),
        array(60 * 60 * 24 * 30 , 'month'),
        array(60 * 60 * 24 * 7, 'week'),
        array(60 * 60 * 24 , 'day'),
        array(60 * 60 , 'hour'),
        array(60 , 'minute'),
        array(1 , 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    return $print;
}
function displayTweets($type){
    
    
    global $link,$z;
    $z=0;
    if($type=='public')
        $whereclause="";
    
    else if($type=='isfollowing'){
        
        if(array_key_exists("id",$_SESSION)){
            $whereclause="";
            $query="select * from following where follower='".$_SESSION['id']."'";
            $result=mysqli_query($link,$query);
            if(mysqli_num_rows($result)==0){
               
                $z=1;
            }
            else{
            while($row=mysqli_fetch_array($result)){
                if($whereclause=="") $whereclause="where";
                else $whereclause.=" OR";
                $whereclause.=" userid='".$row['following']."'";
                }
            }
        }

            
    }
    else if($type=="yourtweets"){
        if(array_key_exists("id",$_SESSION)){
            $whereclause="where userid='".$_SESSION['id']."' ";
        }
    }
    else if($type=="search"){
        echo "<p>Showing search results for ''".$_GET['q']."'' </p>";
        $whereclause="where tweet like '%".$_GET['q']."%' ";
    }
    else if(is_numeric($type)){
        $query="select * from users where id='".$type."' ";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        echo "<h2>".$row["email"]."'s tweets</h2>";
        $whereclause="where userid='".$type."' ";
    }
        
    if(array_key_exists("id",$_SESSION) && $z==0|| $type=="public" || is_numeric($type) || $type=="search" ){
    $query="select * from tweets ".$whereclause. "order by datetime desc";
        
    if(!$result=mysqli_query($link,$query))
        echo "Please Login first to use this functionality";
    
    if(mysqli_num_rows($result)==0)
        echo "There are no tweets to display.";
    
    else{
        while($row=mysqli_fetch_array($result)){
    
            $query="select * from users where id='".$row['userid']."' ";
            $result1=mysqli_query($link,$query);
            while($row1=mysqli_fetch_array($result1)){
                
                echo "<div class='tweets'><a href='?page=publicprofiles&userid=".$row['userid']."'>" .$row1["email"]. " </a><span id='time'>". time_since(time()-strtotime($row['datetime'])). " ago</span><br>";
                echo "<p>" .$row["tweet"]. "</p>";
                
                if(array_key_exists("id",$_SESSION))
                {
                    echo "<p><a class='toggleFollow btn btn-success my-2 my-sm-0' data-userid='".$row['userid']."'>";
                $query="select * from following where follower='".$_SESSION['id']."' and following='".$row['userid']." '";
                $result2=mysqli_query($link,$query);
                if(mysqli_num_rows($result2)>0)
                    echo "Unfollow";
                else
                    echo "Follow";
                    
                
                    echo "</a></p></div><br>";
                }
                else
                    echo "</div><br>";
                
            }
            
        }
    }
    }
    else if($z==1)
         echo "You follow no one so no tweets are availaible on your timeline!!";
    else
        echo "You must login first to use this functionality!!!";
}
function displaySearch(){
    echo '
    <form class="form-inline">
        <div class="form-group">
            <input type="hidden" name="page" value="search">
            <input type="text" name="q" class="form-control" id="search" placeholder="Search">
        </div>
        
        <button class="btn btn-primary">Search Tweets</button>
        
    </form>
    
    ';
}

function displayTweetBox(){
    if(array_key_exists("id",$_SESSION)){
    echo '
    <div id="tweetSuccess" class="alert alert-success">Tweet posted successfully</div>
    <div id="tweetFail" class="alert alert-danger"></div>
    <div class="form">
        <div class="form-group">
            <textarea class="form-control" id="tweetcontent"></textarea>
        </div>
        <button class="btn btn-primary" id="postTweet">Post Tweet</button>
        
    </div>
    
    ';
    }
}
function displayUsers(){
    global $link;
    $query="select * from users";
    $result=mysqli_query($link,$query);
    while($row=mysqli_fetch_array($result)){
        echo "<p><a href='?page=publicprofiles&userid=".$row['id']."'>". $row["email"]."</a></p>";
    }
}

?>