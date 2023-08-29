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
$user = $_SESSION['username']; 
$id = $_SESSION['id']; 
?>

<html> 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <title>Add Question</title>

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
            <a class="nav-link" href="Main.php">Home <span class="sr-only">(current)</span></a>
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
        <p class="lead">Automated Question Generation System</p>
      </div>
    </div>



    <div class="row">
      <div class="col-4">


        <ul class="list-group">

          <li class="list-group-item">Add Question to DB</li>
          <li class="list-group-item"><a href='generatePaper.php'>Generate Paper</a></li>
          <li class="list-group-item"><a href="addCourse.php">Add Course</a></li>
         
          <li class="list-group-item"><a href='findPaper.php'>Download Question by ID</a></li>

        </ul>



      </div>

      <?php
      $errorMsg = ""; 
      $successMsg = "";

      if(!empty($_POST['questionDet'])){
        $question=$_POST['questionDet']; 
        $cc = $_POST['courseSelect'];
		$mark = $_POST['marks'];
    $CONo = $_POST['CNoDet'];
    $Unit = $_POST['UnitDet'];	
		
        $addCourse = "INSERT INTO question(c_code,question,marks,prepared_by_tuid,CO_NO,Unit) VALUES ('$cc','$question', '$mark','$id','$CONo','$Unit')"  or die(mysqli_error());;
       
       $successMsg = "Successfully Added Question to: ".$cc;
		if ($link->query($addCourse) === TRUE) {
		echo "Successfully Added Question to: ".$cc;
		} else {
		echo "Error: " . $addCourse . "<br>" . $link->error;
		}
      }
      $fetchlist=mysqli_query($link, "select * from course");
      ?>

      <div class="col-1">
      </div>


      <div class="col-4">

        <form method="POST">
          <div class="form-group">


            <div class="form-group">
			<h2>Teacher ID : <?php echo ($_SESSION['id']); ?>  </h2>
              <label for="exampleFormControlSelect1">Select Course</label>
              <select name="courseSelect" class="form-control" id="exampleFormControlSelect1">
                <?php 
                while($row=mysqli_fetch_array($fetchlist)){

                  echo '<option>'.$row['c_code'].'</option>'; 
				  
				
                }
                ?> 

              </select>
            </div>


         

            <div class="form-group">
            <label for="exampleFormControlTextarea1">Question</label>
            <textarea name="questionDet" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <label for="exampleFormControlTextarea2">CO No.</label>
            <textarea name="CONoDet" class="form-control" id="exampleFormControlTextarea2" rows="1"></textarea>
            <label for="exampleFormControlTextarea3">Unit</label>
            <textarea name="UnitDet" class="form-control" id="exampleFormControlTextarea3" rows="1"></textarea>
			<input type="text" name="marks" class="form-control" id="exampleFormControlTextarea1" placeholder="Enter Marks for above Question"></input>
          </div>




          <input type="submit" class="btn btn-primary"><br/><br/>
          <div class="alert alert-success" role="alert">
           <?php echo $errorMsg; ?> 
           <?php echo $successMsg; ?> 
         </div>
       </form>



     </div>







   </div>



   <?php include('footer.php'); ?> 


 </div>






</body>
</html> 
