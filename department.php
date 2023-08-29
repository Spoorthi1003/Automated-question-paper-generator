<?php
require_once 'config.php';
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
 header("location: index.php");
 exit;
}
?>

<html> 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="dep.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <title>Department</title>

</head>
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
         
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
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



    <div class="row">
      <div class="col-4">


       <!-- <button onclick="window.location.href='dep.html';">DEPARTMENTS</button> -->
       <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Departments</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="addCourse.php">CSE</a>
    <a href="addCourse.php">ISE</a>
    <a href="addCourse.php">ECE</a>
  </div>
</div>


      </div>

      <div class="col-8">

       <h2>Welcome !!! <br>Name:<?php echo ($_SESSION['username']); ?>  </h2>
	   <h2>ID : <?php echo ($_SESSION['id']); ?>  </h2>
       
	  

    </div>
  </div>

  <?php include('footer.php'); ?> 


</div>
<script>
  /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</body>

</html> 
