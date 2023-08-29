
<html> 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="signup.css"> -->
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <title>Dashboard</title>

</head>
<script>
function validateForm() {
  var pw1 = document.getElementById("pd1").value;
   var pw2 = document.getElementById("pd2").value;
    var name = document.getElementById("fname").value;
	var u_name = document.getElementById("uname").value;
	var em = document.getElementById("email").value;
	if(name == "") {
      document.getElementById("nmsg").innerHTML = "**Fill the first name";
      return false;
    }
      if(u_name == "") {
     document.getElementById("umsg").innerHTML = "**Fill the username";
      return false;
   }
	  if(em == "") {
     document.getElementById("emsg").innerHTML = "**Fill the email";
     return false;
  }
		if(!(em.endsWith("cs@bmsce.ac.in"))) {
     document.getElementById("emsg").innerHTML = "**Fill staff email";
     return false;
  }
       
    //check empty password field
  if(pw1 == "") {
    document.getElementById("p1msg").innerHTML = "**Fill the password please!";
  return false;
   }
  
    if(pw1 == "") {
    document.getElementById("p1msg").innerHTML = "**Fill the password please!";
  return false;
   }
  
    //check empty confirm password field
  if(pw2 == "") {
    document.getElementById("p2msg").innerHTML = "**Enter the password please!";
     return false;
   } 
   
    //minimum password length validation
  if(pw1.length < 5) {
  document.getElementById("p1msg").innerHTML = "**Password length must be atleast 8 characters";
    return false;
   }

    
  
    if(pw1 != pw2) {
    document.getElementById("p2msg").innerHTML = "**Passwords are not same";
      return false;
   } 
   else {
      window.location.href = "s.php";
     
    }
 }
</script>
<body>
  <div class='container'>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          </ul>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">BMSCE</h1>
        <p class="lead">Automated Question Generation System </p>
      </div>
    </div>



   
<form action="s.php" method="post" onsubmit="return validateForm()">
    <div class="container">
        <h2>Create an Account</h2>
        <div class="box">
        </div>
		<div class="box">
           uid<input type="text" name="uid" id="uid" placeholder="Enter Your Fullname">
			<h4 id="nmsg" style="color:red"> </h4> 
        </div>
       <div class="box">
            Full name<input type="text" name="fullname" id="fname" placeholder="Enter Your Fullname">
			<h4 id="nmsg" style="color:red"> </h4> 
        </div>
       <div class="box">
            User name<input type="text" name="username" id="uname" placeholder="Enter Your Username">
			<h4 id = "umsg" style="color:red"> </h4> 
        </div>
       <div class="box">
            email<input type="email" name="email" id="email" placeholder="Enter Your Email">
			<h4 id = "emsg" style="color:red"> </h4> 
        </div>
        <div class="box">
            <i class="fa fa-key"></i>
            password<input type="password" name="psswrd" id="pd1" placeholder="Create Password">
			<h4 id = "p1msg" style="color:red"> </h4> 
        </div> 
        <div class="box">
            confirm password<input type="password" name="psswrd" id ="pd2" placeholder="Confirm Password">
			<h4 id = "p2msg" style="color:red"> </h4> 
        </div> 
		 <div class="box">
            Mobile Number<input type="text" name="mno" id ="mno" placeholder="Mobile Number">
			<h4 id = "p2msg" style="color:red"> </h4> 
        </div> 

<input type = "submit" value="submit">
        </form>
        <span class="box">Already have an account?<a href='index.php'>SIGN IN</a></span><br>
    </div>
</div>
  </div>

  <?php include('footer.php'); ?> 


</div>


</body>
</html> 
