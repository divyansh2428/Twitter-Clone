<?php

include("functions.php");

if($_GET["action"]=="loginSignup"){
    
    $error="";
    if($_POST["email"]=="")
        $error.="<p>An email address is required</p>";
    if($_POST["password"]=="")
        $error.="<p>Password is required</p>";
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)&& $_POST["email"]!="")
        $error.="<p>Email Address is not valid</p>";
    
    if($error!="")
        echo $error;
    else
    {
        if($_POST["loginActive"]==0){
            $query="select * from users where email='".$_POST['email']."' ";
            $result=mysqli_query($link,$query);
            if(mysqli_num_rows($result)>0)
                $error.="Email address is registered";
            if($error!="")
                echo $error;
            else{
                $query="insert into users(email,password) values('".$_POST['email']."','".$_POST['password']."')";
                if(!mysqli_query($link,$query))
                    echo "error";
                else
                {
                    $_SESSION['id']=mysqli_insert_id($link);
                    
                $query="update users set password='".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' where email='".$_POST['email']."' ";
                    mysqli_query($link,$query);
                                                             
                }
            }
        
        }
        else{
            $query="select * from users where email='".$_POST['email']."' ";
            $result=mysqli_query($link,$query);
            $row=mysqli_fetch_array($result);
            $_SESSION['id']=$row['id'];
            if($row['password']==md5(md5($row['id']).$_POST['password']))
                echo "1";
            else
                echo "Coudn't find that username/password combination ";
        }
    }
}
if($_GET["action"]=="toggleFollow"){
    $query="select * from following where follower='".$_SESSION['id']."' and following='".$_POST['userid']."' ";
    $result=mysqli_query($link,$query);
    if(mysqli_num_rows($result)>0){
        $query="delete from following where follower='".$_SESSION['id']."' and following='".$_POST['userid']."' LIMIT 1";
        mysqli_query($link,$query);
        echo "1";
    }
    else{
        $query="insert into following(follower,following) values('".$_SESSION['id']."','".$_POST['userid']."') ";
        mysqli_query($link,$query);
        echo "2";
    }
}
if(array_key_exists("action",$_GET)){
    if($_GET["action"]=="postTweet"){
        if($_POST["tweetcontent"]=="")
            echo "Your Tweet is empty";
        else if(strlen($_POST["tweetcontent"])>150)
            echo "Your Tweet is way tool large";
        else{
            $query="insert into tweets(tweet,userid,datetime) values('".$_POST['tweetcontent']."','".$_SESSION['id']."',now())";
            if(!$result=mysqli_query($link,$query))
                echo "error";
            else
                echo "1";
        }
            
        
    }
}

?>