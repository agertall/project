<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
  <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="form">

    <ul class="tab-group">
      <li class="tab active"><a href="#signup">Sign Up</a></li>
      <li class="tab"><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
      <div id="signup">   


        <form action="/" method="POST">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input name="name" value="" type="text" required autocomplete="off" placeholder=""> 
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
             <input name="surname" value="" type="text" required autocomplete="off" placeholder="">
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" value="" type="email" required autocomplete="off" placeholder="">
          </div>
        
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input name="password" value="" type="password"required autocomplete="off" placeholder="">
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
        </form>

      </div>

      <div id="login"> 

        <form action="/" method="post">

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/>Log In</button>
          
        </form>

      </div>

    </div><!-- tab-content -->

  </div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

  <script  src="js/index.js"></script>




</body>

</html>