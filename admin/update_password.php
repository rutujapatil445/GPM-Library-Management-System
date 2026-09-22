<?php
include "connection.php";
include "navbar.php"
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    <style type="text/css">
        body
        {
            width: 1540px;
            height: 650px;
            background-color: red
            background-image:url(images/lbackground.jpg);
            background-repeat: no-str_repeat;

        }
        .wrapper
        {
            width:400px;
            height:400px;
            margin:100px auto;
            background-color:black;
            opacity: 0.8;
            color: white;
            padding:27px 15px;
        }
        .form-control
        {
            width:300px;

        }
        </style>
</head>
<body>
    <div class="wrapper">
        <div style="text-align: center;">
            <h1 style="text-align: center; font-size: 35px; font-family:Lucida Console;">
                Change Your Password
            </h1>
        </div>
        <div style="padding-Left:30px">
            <form action="" method="post">
                <input type="text" name="username" class="form-control"
                placeholder="Username" required=""><br>
                <input type="text" name="email" class="form-control"
                placeholder="Email" required=""><br>
                <input type="text" name="password" class="form-control"
                placeholder="New Password" required=""><br>

                <button class="btn btn-default" name="submit" type="submit"> Update</button>
            </form>
        </div>
    
    <?php
     if(isset($_POST['submit']))
     {
        $sql = mysqli_query($db,"UPDATE admin SET pass='$_POST[password]' WHERE username='$_POST[username]' AND email = '$_POST[email]';"))

      {
          ?>
          <script type="text/javascript">
              alert("The Password Updated Successfully..")
          </script>
          <?php
      }


     }
    ?>
</div>
</body>
</html>
