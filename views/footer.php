<footer class="footer">
    
    <div class="container">
        <p>&copy; Made By Divyansh Singhal</p>
    </div>

</footer>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
      <div class="modal-body">
          <div class="alert alert-danger" id="error"></div>
        <form>
            <input type="hidden" name="loginActive" id="loginActive" value="1"> 
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  
</form>
      </div>
      <div class="modal-footer">
          <a id="togglelogin">SignUp</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="button">Login</button>
      </div>
    </div>
  </div>
</div>

<script>

    $("#togglelogin").click(function(){
        
        if($("#loginActive").val()=="1"){
            
                $("#loginActive").val("0");
                $("#title").html("Sign Up");
                $("#togglelogin").html("Log In");
                $("#button").html("Sign Up");
        }
        else{
             $("#loginActive").val("1");
                $("#title").html("Log In");
                $("#togglelogin").html("Sign Up");
                $("#button").html("Log In");
        }
    })
    $("#button").click(function(){
        
         $.ajax({
            type: "POST",
            url: "actions.php?action=loginSignup",
            data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
            success: function(result) {
                if(result=="1")
                    window.location.assign("http://localhost/twitter/index.php");
                else{
                    $("#error").html(result).show();
                }
            }
            
        })
        
    })
    $(".toggleFollow").click(function(){
        var id=$(this).attr("data-userid");
        $.ajax({
            type: "POST",
            url: "actions.php?action=toggleFollow",
            data: "userid=" + id,
            success: function(result) {
                if(result=="1"){
                    $("a[data-userid='" + id + "']").html("Follow");
                }
                else{
                    $("a[data-userid='" + id + "']").html("Unfollow");
                }
            }
            
        })
    })
    
    $("#postTweet").click(function(){
        $.ajax({
            type: "POST",
            url: "actions.php?action=postTweet",
            data: "tweetcontent=" + $("#tweetcontent").val(),
            success: function(result) {
                if(result=="1"){
                   
                    $("#tweetSuccess").show();
                     $("#tweetFail").hide();
                    
                }
                else{
                    
                    $("#tweetFail").html(result).show();
                    $("#tweetSuccess").hide();
                }
            }
            
        })
    })

</script>
  </body>
</html>