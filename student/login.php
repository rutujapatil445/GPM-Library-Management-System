<?php
	include "connection.php";
	include "navbar.php";
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   


 
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	

</head>
<body>
<style type="text/css">
  section
{
   height: 650px;
    width: 1520px;
    background-color: lightgrey;
     margin-top: -40px;
  
}

.log_img
{
    height: 650px;
    margin-top: 0px;
    background-image: url("images/loginbackground.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
}
.box1
{
    height: 500px;
    width: 470px;
    background-color: black;
    margin: 20px auto;
    opacity: .8;
   
    padding: 20px;
}

</style>

	
      
		


<section>
	<div class="log_img">
		<br><br>
	
	<div class="box1">
		<h1 style="text-align: center; font-size: 35px; font-family: Lucida Console; color:white;"> Library Management System</h1><br>
		<h1 style="text-align: center; font-size: 25px; color: white;">Student Login Form</h1><br>
		<form name="login" action="" method="post">
			<br><br>
			<b><p style="padding-left: 50px; font-size: 15px; font-weight: 700; color:white;">Login as:</p></b><br>
	
			<input style="margin-left: 50px; width:18px;" type="radio" name="user" id="admin" value="admin">
			<label style="color:white;" for="admin">Admin</label>
			<input style="margin-left: 50px; width:18px;" type="radio" name="user" id="student" value="student">
			<label style="color:white;" for="student">Student</label><br><br>

			<div class="login">
			<input type="text" name="username" placeholder="username" required="" style="color: black;"> <br><br>
			<input type="password" name="pass" placeholder="password" style="color: black;"><br><br>
			<button style="color:black;" name="submit" type="submit">Login</button>
		</div>	
		</form>
		<p style="color: white; padding-left: 15px;">
			<br><br>
			<a style="color: white;" href="update_pass.php" >Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			New to this website? <a style="color : white;" href="student_registration.php">Sign Up</a>
		</p>

	</div>
    </div>
</section>

<?php
	if(isset($_POST['submit']))
	{
        if($_POST['user'] =='admin')
        {
        	$count = 0;
		$res = mysqli_query($db,"SELECT * from `admin` where username='$_POST[username]' && pass='$_POST[pass]';");
		$count = mysqli_num_rows($res);

		if($count == 0)
		{
		?>
		  <div class="alert alert-danger" style="width:600px; margin-left:370px; background-color: #de1313; color:white">
		  	<strong>The username and password doesn't match</strong>
		  </div>
		  <?php

		}
		else
		{
			$_SESSION['login_user'] = $_POST['username'];
		?>
		<script type="text/javascript">
			window.location="admin/profile.php";
		</script>
		<?php
		}
	

        }
        else
        {

        
		$count = 0;
		$res = mysqli_query($db,"SELECT * from `student` where username='$_POST[username]' && pass='$_POST[pass]';");
		$row=mysqli_fetch_assoc($res);
		$count = mysqli_num_rows($res);

		if($count == 0)
		{
		?>
		  <div class="alert alert-danger" style="width:600px; margin-left:370px; background-color: #de1313; color:white">
		  	<strong>The username and password doesn't match</strong>
		  </div>
		  <?php

		}
		else
		{
			if ($row['estatus']==1) {
				
			
			$_SESSION['login_user'] = $_POST['username'];
		?>
		<script type="text/javascript">
			window.location="student/profile.php";
		</script>
		<?php
		}
		else
		{
			?>
              <script type="text/javascript">
			alert("Verify Your Email Address by OTP before login.");
		</script>
		<?php 
		}
	
	  }	
	}
}
?>
<footer>
	

</footer>
</body>
</html>