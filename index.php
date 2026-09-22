<?php 
 session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

		

	<title> GPM Online Library Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
	nav
{
    float: right;
    word-spacing: 30px;
    padding: 20px;
}

nav li
{
    display: inline-block;
    line-height: 100px;
}
	</style>
</head>
<body>
<div class="wrapper">
<header>
    <div class="logo">
	<img src="images/blogo.png">
	<h1 style="color: white ;">GPM LIBRARY MANAGEMENT SYSTEM</h1>
    </div>
    <?php
    if(isset($_SESSION['login_user']))
    {
        ?>
    	<nav> 
         <ul>
         	<li><a href="index.php">HOME</a></li>
         	<li><a href="books.php">BOOKS</a></li>
         	<li><a href="logout.php">LOGOUT</a></li>
         	<li><a href="feedback.php">FEEDBACK</a></li>
         	<li><a href="aboutus.php">ABOUT_US</a></li>
         </ul>
	    </nav>
	<?php 
    }
    else
    {
    	?>
    	 <nav> 
         <ul>
         	<li><a href="index.php">HOME</a></li>
         	<li><a href="books.php">BOOKS</a></li>
         	<li><a href="login.php">LOGIN</a></li>
         	<li><a href="feedback.php">FEEDBACK</a></li>
         	<li><a href="aboutus.php">ABOUT_US</a></li>
         </ul>
	</nav>


    <?php
     }

    ?>

    
	
</header>

<section>
	<div class="sec_img">
	<br>
	<div class="box">
		<br><br><br><br>
	<h1 style="text-align: center; font-size: 35px; color: white;"> Welcome to library</h1>
    </div>
    </div>

</section>

<footer>
	<p style="color: white; text-align:center;">
		<br>
		Email :  gpmlibrary@gmail.com<br><br>
		Mobile : +9977665554

	</p>
</footer>
</div>
</body>
</html>