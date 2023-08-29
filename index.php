<?php 
require_once 'config.php';
$username = $password = $uid = "";

$username_err = $password_err = "";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = $_POST["username"];
    }
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = $_POST['password'];
    }
    
    if(empty($username_err) && empty($password_err)){
       
		$sql= "SELECT * FROM users WHERE username ='".$username."' AND pass = '".$password."'" or die(mysqli_error());
		$result = mysqli_query($link,$sql);
		
		$res=mysqli_fetch_row($result);
		
		if($res)
		{
			$sql= "SELECT uid from users WHERE username ='".$username."'" or die(mysqli_error());
		$result = mysqli_query($link,$sql);
		
		 $res=mysqli_fetch_row($result);
		 $id=$res['0'];
		$_SESSION['username']=$username;
		$_SESSION['id']=$id;
		header('location:main.php');
	
		}
		else 
		{ 
		echo  '<script>alert("Incorect")</script>';
		}
		}
  
				mysqli_close($link);			
							
                        } 

?> 

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Question Paper Automation System</title>
<link href="css/main.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>


    <div class="container">
        <div class="card card-container">
            <center><b>Automated Question Paper Generation</b></center><br/>            
            <p id="profile-name" class="profile-name-card"></p>       
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="r.php">Sign up now</a>.</p>
        </form>

        </div>
    </div>
</body>

</html>
