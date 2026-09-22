<?php
   include "connection.php";
   include "navbar.php";
   ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Books</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
  .srch
{
    padding-Left: 1000px;
}
 body {
  background-color: #024629;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
.book
{
  width: 400px;
  margin: 0px auto;
}
.form-control
{
  background-color: #080707;
  color: white;
  height: 40px;
}
        </style>
    </head>
<body>

   <!--________________________________sidenav__________________________-->

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
  <div class="h"><a href="date_expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer"; color: black; onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;" >
    <h2 style="color: white; fon-family: Lucida Console; text-align: center"><b>Add New Books</b></h2><br><br>
      <form class="book" action="" method="post">
        <select name="scheme"  class="form-control" required="">
        <option>Select Scheme Code </option>
        <option value="DO">Development(DO)</option>
        <option value="BO">Book Bank(BO)</option>
        <option value="CO">Special Component(CO)</option>
        <option value="SO">Social Welfare(SO)</option>
        <option value="WO">World Bank(WO)</option>
        <option value="UP">Up gradation(UP)</option>
        <option value="CP">Community(CP)</option>


      </select><br>
          <input type="text" name="accno" class="form-control" placeholder="Book Accession Number" required="">
          <br>
          <input type="text" name="name" class="form-control" placeholder="Book Name" required="">
          <br>
          <input type="text" name="authors" class="form-control" placeholder="Authors Name" required="">
          <br>
          <input type="text" name="edition" class="form-control" placeholder="Edition" required="">
          <br>
          <input type="text" name="status" class="form-control" placeholder="Status" required="">
          <br>
          <input type="text" name="quantity" class="form-control" placeholder="Quantity" required="">
          <br>
          <input type="text" name="department" class="form-control" placeholder="Department" required="">
          <br>
          <button class="but but-default" type="submit" name="submit">ADD</button>
      </form>  
  </div>

   <form action="import.php" method="post" enctype="multipart/form-data">
        <label style="margin-left: 900px; color:white;" for="excelFile">Add More Books:</label><br><br>
        <input style="margin-left:900px;" type="file" name="excelFile" id="excelFile" accept=".xlsx, .xls"><br>
        <input style="margin-left:900px; width: 100px;" type="submit" name="importBtn" value="Import Data">
    </form>

  <?php
      if(isset($_POST['submit']))
      {
        if(isset($_SESSION['login_user']))
        {


           mysqli_query($db,"INSERT INTO books VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           /*if($_POST['scheme'] == "DO")
           {
             mysqli_query($db,"INSERT INTO DObooks VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           }

            if($_POST['scheme'] == "BO")
           {
             mysqli_query($db,"INSERT INTO BObooks VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           }

            if($_POST['scheme'] == "CO")
           {
             mysqli_query($db,"INSERT INTO CObooks VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           }

            if($_POST['scheme'] == "SO")
           {
             mysqli_query($db,"INSERT INTO SObooks VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           }

            if($_POST['scheme'] == "WO")
           {
             mysqli_query($db,"INSERT INTO WObooks VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           }

            if($_POST['scheme'] == "UP")
           {
             mysqli_query($db,"INSERT INTO UPbooks VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           }
             if($_POST['scheme'] == "CP")
           {
             mysqli_query($db,"INSERT INTO CPbooks VALUES ('$_POST[scheme]','$_POST[accno]','$_POST[name]','$_POST[authors]','$_POST[edition]',
          '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
           }
         */
         
          ?>
           <script type="text/javascript">
               alert("Book Added Successfully.");
           </script>

          <?php
        }
        else
        {
          ?>
           <script type="text/javascript">
               alert("You need to login first.");
           </script>
          <?php
        }
      }
  ?>

  </div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#024629";
}
</script>

</body>
</html>