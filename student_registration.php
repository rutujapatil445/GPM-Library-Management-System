<?php
	include "connection.php";
	include "navbar.php";

?>
<?php 
		if (isset($_POST['submit1'])) {

			
			

				 header("location:admin_registration.php");

			
			
		}
		?>

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
    	margin-top: -40px;
  
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


     
	

</head>
<body>


	

<section>
	<div class="reg_img">

<br><br>	
	<div class="box2">
		<h1 style="text-align: center; font-size: 35px; font-family: Lucida Console; color: white;"> Library Management System</h1><br>
		<<form method="post" action="">
			<input style="margin-left: 50px; width:18px;" type="radio" name="user1" id="admin" value="admin">
			<label style="color:white;" for="admin">Admin</label>
			<button style="color:black;" name="submit1" type="submit">Show Form</button><br>

		</form>
		<br>
		<h1 style="text-align: center; font-size: 25px; color: white;">Student Registration Form</h1><br>


		
		<form name="Registration" method="post" action="" >
			<br>

			

			<div class="login">
			  <input type="text" name="first"  placeholder="First Name" required="" style="color: black;"> <br><br>
			<input type="text" name="last" placeholder="Last Name" required="" style="color:black;"> <br><br>
            <input type="text" name="username" placeholder="Username" required="" style="color:black;"> <br><br>
			<input type="password" name="pass" placeholder="Password" required="" style="color:black;"><br><br>
            <input type="number" name="enroll" placeholder="Enrollment No" required="" style="color:black;"> <br><br>
			<select name="dept" style="color: black;">
				<option>Select Department</option>
				<option>Computer</option>
				<option>Mechanical</option>
				<option>Medical</option>
				<option>Civil</option>
				<option>Polymer</option>
			</select><br><br>
            <input type="email" name="email" placeholder="Email" required="" style="color:black;"> <br><br>
			<input type="contact" name="contact" placeholder="Mobile No" required="" style="color:black;"> <br><br>
			<button style="color: black;" type="submit" name="submit">Sign Up</button>
		</div>	
		</form><br><br>
		

		
	<?php 

	if (isset($_POST['submit'])) {


      
         $count =0;
         $sql="SELECT username from student ";
         $res = mysqli_query($db,$sql);

         while($row=mysqli_fetch_assoc($res))
         {
         	if($row['username']==$_POST['username'])
         	{
         		$count =$count+1;
         	}
         }
      if($count == 0)
      {


		mysqli_query($db,"INSERT INTO `student` VALUES ('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[pass]','$_POST[enroll]','$_POST[dept]','$_POST[email]','0','$_POST[contact]') ;");
		$otp=rand(10000,99999);
		$date=date("Y-m-d");
		mysqli_query($db,"INSERT INTO verify VALUES('$_POST[username]','$otp','$date');");
		$msg="Hello Your OTP code is:".$otp." .";
		$from="From:sanikabasare01234@gmail.com";
		if(mail($_POST['email'], "OTP",$msg,$from))
		{

		

		?>
		<script type="text/javascript">
			window.location="verify.php";
		</script>
		<?php
		}
		else
		 {
		 	?>
		 	<script type="text/javascript">
			alert("Email not sent.");
		</script>
		 	<?php
		 } 
	}

		else
		 {?>
		 	<script type="text/javascript">
			alert("The username already exist.");
		</script>
		 	<?php
		 } 
		
	}



	?>


	

	</div>
    </div>
</section>


 

	

</body>
</html>