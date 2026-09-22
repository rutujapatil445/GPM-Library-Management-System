<?php
    include "navbar.php";
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Profile</title>
    <style type="text/css">
        .form-control
        {
            width:300px;
            margin: 0 auto;
            color: white;
        }
        form
        {
            padding-Left:400px ;
        }
        label
        {
            color:white;
        }
    </style>
</head>
<body style="background-color: #004528;">

        
<h2 style="text-align: center; color: #fff;"> Edit Information</h2>  
<?php
    $sql = "SELECT * FROM student WHERE username = '$_SESSION[login_user]'";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));



   $first = $last = $username = $password = $email = $contact = "";

while ($row = mysqli_fetch_assoc($result)) {
    $first = $row['first'];
    $last = $row['last'];
    $username = $row['username'];
    $password = $row['pass'];
    $email = $row['email'];
    $contact = $row['contact'];
}

        
    
    ?>
<div class="profile_info" style="text-align: center;">
<span style="color:white;">Welcome,</span>
<h4 style="color:white;"><?php echo $_SESSION['login_user']; ?></h4>
</div><br><br>
<div class="form1">
<form action="" method="post" >

    <label><h4><b>First Name: </b></h4></label>
    <input class="form-control" type="text" style="color:black;" name="first" value="<?php echo $first ; ?>">
    <label><h4><b>Last Name: </b></h4></label>
    <input class="form-control" type="text" style="color:black;" name="last" value="<?php echo $last; ?>" >
    <label><h4><b>Username: </b></h4></label>
    <input class="form-control" type="text" style="color:black;" name="username" value="<?php echo $username; ?>" >
    <label><h4><b>Password: </b></h4></label>
    <input class="form-control" type="text" style="color:black;" name="pass" value="<?php echo $password; ?>" >
    <label><h4><b>Email: </b></h4></label>
    <input class="form-control" type="text" style="color:black;" name="email" value="<?php echo $email; ?>" >
    <label><h4><b>Contact No: </b></h4></label>
    <input class="form-control" type="text" style="color:black;" name="contact"value="<?php echo $contact; ?>" ><br>
    <div style="padding-Left:100px;">
        <button class="btn btn-default" type="submit" name="submit"> save</button>
    </div>
</form>
</div>
<?php 
if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql1 = "UPDATE student SET first='$first', last='$last', username='$username', pass='$password', email='$email', contact='$contact' WHERE username='$_SESSION[login_user]'";

    if (mysqli_query($db, $sql1)) {
        ?>
        <script type="text/javascript">
            alert("Saved Successfully..");
            window.location="profile.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Error: <?php echo mysqli_error($db); ?>");
        </script>
        <?php
    }
}

?>
</body>
</html>
