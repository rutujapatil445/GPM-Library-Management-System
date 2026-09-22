<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Request </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            .srch
            {
                  padding-Left: 850px;
                  padding-top: 5px;
            }
            .form-control
            {
                width: 300px;
                height: 40px;
                background-color:black;
                color:white;

            }
            body {
  background-repeat:no-repeat;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}
.container
{
  height: 600px;
  overflow: auto;
    background-color: black;
    opacity: .8;
    color: white;

}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.img-circle
{
    margin-left: 20px;
}
.h:hover
{
   color: white;
   width: 300px;
   height: 50px;
   background-color: #00544c;
}
        </style>
</head>
<body>
<!--sidenav-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <div  style="color:white; margin-left: 60px; font-size:20px;">
          <?php
          if(isset($_SESSION['login_user']))
          {
               
                echo "Welcome ".$_SESSION['login_user'];
          }
          ?>
 </div><br><br>

  <div class="h"><a href="books.php">Books</a></div>  
    <div class="h"><a href="add.php">Add Books</a></div>  
      <div class="h"><a href="delete_books.php">Delete Books</a></div>  

  <div class="h"><a href="request.php">Book Request</a></div>
   <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"> <a href="date_expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() 
{
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav()
 {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<br><br>
<div class="container">
    <div class="srch">
<form method="post" action="" name="formal">
    <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
    <input type="text" name="accno" class="form-control" placeholder="Accession No" required=""><br>
    <button class="btn btn-default" name="submit" type="submit">Submit</button><br>
</form>
    </div> 
      <h3 style="text-align: center; margin-top: 20px;">Request of Book</h3><br><br>
    <?php 
if(isset($_SESSION['login_user'])) {
    $sql = "SELECT student.username, enroll, books.accno, name, authors, edition, status FROM student 
            INNER JOIN issue_book ON student.username = issue_book.username 
            INNER JOIN books ON issue_book.accno = books.accno 
            WHERE issue_book.approved='' ";
    $res = mysqli_query($db, $sql);

    // Check if there are any rows returned by the query
    if(mysqli_num_rows($res) == 0) {
        echo "There is no any request<br>";
    } else {
        echo "<br>";
        echo "<table class='table table-bordered'>";
        echo "<tr style='background-color: #6db6b9e6;'>";
        // Table Header
        echo "<th>";  echo "Student Username";  echo "</th>";
        echo "<th>";  echo "Roll No";  echo "</th>";
        echo "<th>";  echo "Accession No";  echo "</th>";
        echo "<th>";  echo "Book Name";  echo "</th>";
        echo "<th>";  echo "Authors Name ";  echo "</th>";
        echo "<th>";  echo "Edition";  echo "</th>";
        echo "<th>";  echo "Status";  echo "</th>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['status']; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    ?>
    <br>
    <h4 style="text-align: center;color:yellow">You need to login to see the request.</h4>
    <?php
}   
if(isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['accno'] = $_POST['accno'];
    ?>
    <script type="text/javascript">
        window.location = "admin_approve.php"
    </script>
    <?php
}
?>

</div>
</div>
</body>
</html>
