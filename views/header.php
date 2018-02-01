<!doctype html>
<html lang="en">
  <head>
      
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="http://localhost/twitter/style.css" type="text/css"> 
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
     
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/twitter/index.php">Twitter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="?page=timeline">Your Timeline</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="?page=yourtweets">Your Tweets</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="?page=publicprofiles">Public Profiles</a>
      </li>
        
      
      
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <?php 
        
                if(array_key_exists("id",$_SESSION))
                    echo "<a class='btn btn-outline-success my-2 my-sm-0' href='?function=logout'>Log Out</a>";
                else
                    echo "<button class='btn btn-outline-success my-2 my-sm-0' data-toggle='modal' data-target='#exampleModal'>Login/Sign Up</button>";
        ?>
    </div>
  </div>
</nav>