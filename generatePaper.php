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

<title>Generate Question Paper</title>


</script>

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

  <li class="list-group-item"><a href="addQuestion.php">Add Question to DB</a></li>
  <li class="list-group-item">Generate Paper</li>
  <li class="list-group-item"><a href="addCourse.php">Add Course</a></li>

  <li class="list-group-item"><a href='findPaper.php'>Download Question by ID</a></li>

</ul>
    


  </div>

  <?php
  $id_arr=array();
  $q= ""; 
  $m= ""; 
    $qb= ""; 
  $mb= ""; 
  $errorMsg = ""; 
  $successMsg = "";
  if(!empty($_POST['courseSelect'])){
 $courseName=$_POST['courseSelect']; 
  $key=$_POST['key'];  
  $fetchid=mysqli_query($link, "select qid from question where c_code='$courseName' and marks=10");
  while($qfid=mysqli_fetch_row($fetchid)){
	 $id_arr[]=$qfid[0];
	 }	
$qa=array_rand($id_arr,5);
for($i=0;$i<count($qa);$i++)
{
 $di=$id_arr[$qa[$i]];
 $fetchqm=mysqli_query($link, "select question,marks from question where qid='$di' and marks=10");
  while($qm=mysqli_fetch_row($fetchqm)){  
      $q=$qm[0];
	 $m=$qm[1];

$addPapera = "INSERT INTO gq(c_code,sec,question,marks,prepared_by,ukey) VALUES ('$courseName','A','$q','$m','$id','$key')"  or die(mysqli_error());
 $res=mysqli_query($link, $addPapera);
if($res)
{
printf("Questions Generated");
}
else
{
printf("Question Not Available!");
	}
  }}
  
  
   $fetchidb=mysqli_query($link, "select qid from question where c_code='$courseName' and marks=5");
  while($qfidb=mysqli_fetch_row($fetchidb)){
	 $id_arrb[]=$qfidb[0];
	 }	
$qab=array_rand($id_arrb,4);
for($j=0;$j<count($qab);$j++)
{
 $dib=$id_arrb[$qab[$j]];
 $fetchqmb=mysqli_query($link, "select question,marks from question where qid='$dib' and marks=5");
  while($qmb=mysqli_fetch_row($fetchqmb)){  
      $qb=$qmb[0];
	 $mb=$qmb[1];

$addPaperb = "INSERT INTO gq(c_code,sec,question,marks,prepared_by,ukey) VALUES ('$courseName','B','$qb','$mb','$id','$key')"  or die(mysqli_error());
 $resb=mysqli_query($link, $addPaperb);
if($resb)
{
printf("Questions Generated");
}
else
{
printf("Question Not Available!");
	}
  }}
  
  
  }
  ?>

  <div class="col-1">
  </div>


  <div class="col-4">
    
<form method="POST" action="">
  <div class="form-group">
   

    <div class="form-group">
    <label for="exampleFormControlSelect1">Select Course</label>
    <select method="post" name="courseSelect" class="form-control" id="exampleFormControlSelect1">
      <?php 
        $fetchlist=mysqli_query($link, "select * from course");
	  while($row=mysqli_fetch_array($fetchlist)){

          echo  '<option>'.$row['c_code'].'</option>'; 

      }
	 
	  ?>
	  
    
    </select>
    </div>


  <!-- <div class="form-group">
    <label for="exampleFormControlSelect1">Number of Questions to use on Set</label>
    <select name="countQuestion" class="form-control" id="exampleFormControlSelect1">
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
     <option>5</option>
    </select>
  </div>-->
<div class="form-group">
    <label for="exampleFormControlSelect1">Enter key Q.paper </label>
    <input type="text" name="key" class="form-control" id="un1">
      </div>
 
 <br><input value="Generate" type="submit" class="btn btn-primary"><br/><br/>
 </div>
</div>

</form>
  <div class="alert alert-success" role="alert">
   <?php echo $errorMsg; ?> 
   <?php echo $successMsg; ?> 
  </div>


	


<?php include('footer.php'); ?> 

</div>
</body>
</html>
