<?php
// Initialize the session
require_once 'config.php';
session_start();
 
// If session variable is not set it will redirect to login page
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
$ses_sql=mysqli_query($link, "select fname from teachers where username='$user'");
$uinfo=mysqli_fetch_assoc($ses_sql);
$sql=mysqli_query($link, "select c_code from gq where ukey='$id'");
$cinfo=mysqli_fetch_assoc($sql);
 

?>

<html> 
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<title>Download Question Paper</title>
<style>
table, th, td {
  border: 1px solid black;
   border-collapse: collapse;
}



</style>
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
  <li class="list-group-item"><a href="generatePaper.php">Generate Paper</a></li>
  <li class="list-group-item"><a href="addCourse.php">Add Course</a></li>

  <li class="list-group-item">Download Question by ID</li>

</ul>
    


  </div>

  <?php
  $ques_array=array(); 
   $m_array=array(); 
  $errorMsg = ""; 
  $successMsg = "";
 
  if(!empty($_POST['searchBox'])){
  $searchString=$_POST['searchBox']; 
  
  

  $uid=(int)$searchString; 
 
  $fetchpaper=mysqli_query($link, "select question,marks from gq where ukey='$uid'");
 
 $printQues=mysqli_fetch_array($fetchpaper);
 while($ques=mysqli_fetch_array($fetchpaper)){
 
 $ques_array[]= $ques[0];
  $m_array[]= $ques[1];

 }
 //print_r($ques_array);
//for($i=0;$i<count($ques_array);$i++) 
//{
	//echo $ques_array[$i].'<br>';
//}
 if(!empty($printQues)){
 $sql=mysqli_query($link, "select c_code from gq where ukey='$uid'");

$cinfo=mysqli_fetch_assoc($sql);
 
     $successMsg = "Found!";
    
        
  }

  else {
    $successMsg = "Could not find!"; 
  }
  
}


  ?>

 

  <div class="col-8">
    
<form method="POST">
  
   <div class="form-group">
    <label for="exampleFormControlInput1">Enter Q.paper key</label>
    <input name="searchBox" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Type unique ID">
  </div>
   

    

 
 <input value="Find" type="submit" class="btn btn-primary"><br/><br/>
  <div class="alert alert-success" role="alert">
   <?php echo $errorMsg; ?> 
   <?php echo $successMsg; ?> 
  </div>
</form>

<input type="button" onclick="printDiv('questionBox')" value="PRINT!" />



<?php 
if(!empty($printQues)){

     $successMsg = "Found!";
     $c=1;
	$a4=$ques_array[0];
	 $b4=$ques_array[1];
	 $a3=$ques_array[2];
	 $b3=$ques_array[3];
	 $a1=$ques_array[4];
	 $a2=$ques_array[5];
	 $b2=$ques_array[6];
	 $c2=$ques_array[7];
     echo '

     <div id="questionBox" style="border:1px solid black;"> 
<table>
<tr>
<td></td>
</tr>
</table>
<td>
     <center> 
     <h2>BMSCE</h2>
     <h5>Department of Computer Science & Engineering</h5> 
     <h5>Demo Internals</h5> 
	
	 
     <p><b> Subject: ' .$cinfo['c_code'].' | Faculty: '.$uinfo['fname'].'</b></p>

     Time: 1 hour
       
   
	  
	  <center><b>PART A</b><br>Total 5 marks(no Choice)</center>
	  <table style="width:100%;border:1px solid black;">
	 <tr>
	 <th style="width:10%">No</th>
	 <th style="width:70%">Question</th>
	 <th style="width:10%">Marks</th>
	 <th style="width:10%">Level</th>
   <th style="width:10%">CO_No</th>
	 <th style="width:10%">Unit</th>
	 </tr>
	 <tr>
	 <td>1a</td>
	 <td>'.$a1.'</td>
	<td>5M</td>
	<td>1</td>
  <td>1</td>
  <td>1</td>
	</tr>
	 </table>
	 
	 <center><b>PART B</b><br>Total 15 marks(no Choice)</center>
	  <table style="width:100%" border="1px solid black">
	<tr>
	 <th style="width:10%">No</th>
	 <th style="width:70%">Question</th>
	 <th style="width:10%">Marks</th>
	 <th style="width:10%">Level</th>
   <th style="width:10%">CO_No</th>
	 <th style="width:10%">Unit</th>
	 </tr>
	 <tr>
	 <td>2a</td>
	 <td>'.$a2.'</td>
	<td>5M</td>
	<td>2</td>
  <td>1</td>
  <td>1</td>
	</tr>
	<tr>
	 <td>2b</td>
	 <td>'.$b2.'</td>
	<td>5M</td>
	<td>2</td>
  <td>1</td>
  <td>2</td>
	</tr>
	<tr>
	 <td>2c</td>
	 <td>'.$c2.'</td>
	<td>5M</td>
	<td>2</td>
  <td>1</td>
  <td>2</td>
	</tr>
	
	
     
	 </table>
	 
	 <center><b>PART C</b><br>Total 20 marks(Choice)</center>
	  <table style="width:100%" border=1.1>
	<tr>
	 <th style="width:10%">No</th>
	 <th style="width:70%">Question</th>
	 <th style="width:10%">Marks</th>
	 <th style="width:10%">Level</th>
   <th style="width:10%">CO_No</th>
	 <th style="width:10%">Unit</th>
	 </tr>
	 <tr>
	 <td>3a</td>
	 <td>'.$a3.'</td>
	<td>10M</td>
	<td>3</td>
  <td>2</td>
  <td>2</td>
	</tr>
	<tr>
	<tr>
	<td colspan="4" align="center">OR</td>
	</tr>
	 <td>3b</td>
	 <td>'.$b3.'</td>
	<td>10M</td>
	<td>3</td>
  <td>2</td>
  <td>2</td>
	</tr>
	<tr>
	<td colspan="4" align="center"> </td>
	</tr>
	 <td>4a</td>
	 <td>'.$a4.'</td>
	<td>10M</td>
	<td>3</td>
  <td>1</td>
  <td>2</td>
	</tr>
	<tr>
	<td colspan="4" align="center">OR</td>
	</tr>
	 <td>4b</td>
	 <td>'.$b4.'</td>
	<td>10M</td>
	<td>3</td>
  <td>2</td>
  <td>2</td>
	</tr>
	
	 </table>
     <font size="5">
	
     <div style="margin-left:80px;">
     ';
	
/*$sec=array("A","A","A","A","B","B","B","C");
	for($i=0;$i<count($ques_array);$i++) 
	 {
	 echo '<tr><td>'.$sec[$i].'</td>';
	 echo '<td>'.$c++.'</td>';	
	 echo '<td>'.$ques_array[$i].'</td>';	  
	 echo '<td>'.$m_array[$i].'</td>';
	 echo '</tr>';
	 }*/
	 
	 
	 //print_r($ques_array);
	 echo '</table>  
     </div>
	 	 
     <br/><br/><br/><br/><br/><br/><br/><br/><br/>
     <center>===== THE END ====</center>
     </div></font>

     ';
    
        
  }

?>

  
  <script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}</script>
  </div>

 






</div>



<?php include('footer.php'); ?> 


</div>

   

       


</body>
</html> 
