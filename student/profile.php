<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style type="text/css">
        .wrapper
        {
            width: 400px;
            margin: 0 auto;
            color: white;

        }
    </style>
</head>
<body style="background-color: #004528;">
<div class="container">
    <form action="" method="post">
        <button class="btn btn-default" style="float: right; width:70px;" name="submit1" type="submit">Edit</button>
    </form>
    <div class="wrapper">
        <?php

        if(isset($_POST['submit1']))
        {
            ?>
            <script type="text/javascript">
                window.location="student_profile_edit.php";
            </script><?php
        }
            $q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[login_user]';");
        ?>
        <h2 style="text-align: center;">My Profile</h2><br><br>
        <?php
            $row=mysqli_fetch_assoc($q);
           

          ?>
    
        <div style="text-align: center;"><b> Welcome, </b>
        <h4>
            <?php echo $_SESSION['login_user']; ?>
        </h4>
        </div><br>
        <?php
            echo "<b>";
            echo "<table class='table table-bordered'>";
            echo "<tr>";
                echo "<td>";
                        echo "<b> First Name : </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['first'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td>";
                    echo "<b> Last Name : </b>";
                echo "</td>";
                   
                echo "<td>";
                echo $row['last'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";

                echo "<td>";
                    echo "<b> Username : </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['username'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";

                echo "<td>";
                    echo "<b> Password : </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['pass'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";

                echo "<td>";
                    echo "<b> Email : </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['email'];
                echo "</td>";
            echo "</tr>";

            echo "<tr>";

                echo "<td>";
                    echo "<b> Contact No : </b>";
                echo "</td>";

                echo "<td>";
                    echo $row['contact'];
                echo "</td>";
            echo "</tr>";

            echo "</table>";
            echo "</b>";
        ?>
        </div>
        </div>
</body>
</html>
