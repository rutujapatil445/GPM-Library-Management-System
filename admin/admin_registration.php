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

	<title>Student Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		section
{
   height: 650px;
    width: 1520px;
    background-color: grey;
  
}
.reg_img
{
    height: 650px;
    margin-top: 0px;
    background-image: url("images/loginbackground.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
}

	</style>
</head>
<body>


     <style type="text/css">
		section
		{
			margin-top: -40px;
		}

	</style>
	

</head>
<body>


	

<section>
	<div class="reg_img">

<br><br>	
	<div class="box2">
		<h1 style="text-align: center; font-size: 35px; font-family: Lucida Console; color: white;"> Library Management System</h1><br>
		<h1 style="text-align: center; font-size: 25px; color: white;">Student Registration Form</h1><br>
		<form name="Registration" method="post" action="" >
			<br><br>
			<div class="login">
			  <input type="text" name="first"  placeholder="First Name" required="" style="color: black;"> <br><br>
			<input type="text" name="last" placeholder="Last Name" required="" style="color:black;"> <br><br>
            <input type="text" name="username" placeholder="Username" required="" style="color:black;"> <br><br>
			<input type="password" name="pass" placeholder="Password" required="" style="color:black;"><br><br>
            
			
            <input type="email" name="email" placeholder="Email" required="" style="color:black;"> <br><br>
			<input type="number" name="contact" placeholder="Mobile No" required="" style="color:black;"> <br><br>
			<button style="color: black;" type="submit" name="submit">Sign Up</button>
		</div>	
		</form>
	

	</div>
    </div>
</section>


  <?php
    
    if(isset($_POST['submit']))
    {
         $count =0;
         $sql="SELECT username from `admin`";
         $res=mysqli_query($db,$sql);

         while($row=mysqli_fetch_assoc($res))
          {
          	if($row['username'] == $_POST['username'])
          	{
          		$count=$count+1;
          	}
          }
        if($count == 0)
        {   
    	   mysqli_query($db,"INSERT INTO `admin` VALUES($_POST[first]','$_POST[last]','$_POST[username]','$_POST[pass]','$_POST[email]','$_POST[contact]',' ');");
    

	?>

	<script type="text/javascript">
		alert("Registration successful");
	</script>
  <?php
         }
         else
         {
         		?>

	<script type="text/javascript">
		alert("The username already exist.");
	</script>
  <?php

         }
       }
  ?>

</body>
</html>