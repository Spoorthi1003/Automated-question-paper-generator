

<?php
 $conn = new mysqli("localhost","root", "","qgs") or die("Connect failed: %s\n". $conn -> error);

if(isset($_POST["fullname"],$_POST["username"],$_POST["email"], $_POST["psswrd"])) 
{  
$uid = $_POST['uid'];
$fname = $_POST['fullname'];
$uname = $_POST['username'];
$em = $_POST['email'];
$pd = $_POST['psswrd'];
$mno = $_POST['mno'];
//$hashed_password = password_hash($pd, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (uid,username,pass,fname,ph_no,email)VALUES ('$uid','$uname','$pd','$fname','$mno','$em')";

if ($conn->query($sql) === TRUE) {
  echo '<script> alert("New user created successfully")</script>';
  header('location:index.php');
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else 
{ 
echo 'incorrect';
}
?>
