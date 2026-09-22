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
            }
            .form-control
            {
                width: 300px;
                height: 40px;
                background-color:black;
                color:white;

            }
            body {
                background-image:url("images/1111.jpg");
  background-repeat:no-repeat;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}
.container
{
    height: 600px;
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
.container
{
    height: auto;
    background-color: black;
    opacity: .8;
    color: white;

}
.scroll
{
    width:100%;
    height: 500px;

    overflow:auto;
}
th,td
{
    width: 10%;
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
  <div class="h"><a href="date_expired.php">Expired List</a></div>

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
<div class ="container"><br>
    <h2 style="text-align:center;" >Information of Borrowed Books</h2><br>
    <?php
    $c=0;
    if(isset($_SESSION['login_user']))
    {
        $sql="SELECT student.username,enroll,books.accno,name,authors,edition,issue_book.issue,returnd FROM student inner join 
        issue_book ON student.username=issue_book.username inner join books ON issue_book.accno=books.accno WHERE issue_book.approved='Yes' ORDER BY issue_book.returnd ASC";
        $res=mysqli_query($db,$sql);


        
        echo "<div class='scroll'>";
        echo "<table class='table table-bordered' style='width:100%;'>";
        echo "<tr style='background-color: #6db6b9e6;'>";
        //Table Header
        
          echo "<th>";  echo "Username";  echo "</th>";
          echo "<th>";  echo "Enrollment No";  echo "</th>";
          echo "<th>";  echo "Accession No";  echo "</th>";
          echo "<th>";  echo "Book Name";  echo "</th>";
          echo "<th>";  echo "Authors Name ";  echo "</th>";
          echo "<th>";  echo "Edition";  echo "</th>";
          echo "<th>";  echo "Issue Date";  echo "</th>";
          echo "<th>";  echo "Return Date";  echo "</th>";

         
        echo "</tr>"; 
       
       
    
        while($row=mysqli_fetch_assoc($res))
        {

            $d=date("Y-m-d");
            if($d > $row['returnd'])

        {
            $c=$c+1;
            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';

            mysqli_query($db,"UPDATE issue_book SET approved='$var' where returnd ='$row[returnd]' and approved='Yes' limit $c;");  
            
        }
           

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['returnd']; echo "</td>";
           

            echo "</tr>";
           echo "</table>";
           echo "</div>";
          
        }

/*
            $sql="SELECT student.username,enroll,BOBooks.accno,name,authors,edition,issue_book.issue,returnd FROM student inner join 
        issue_book ON student.username=issue_book.username inner join BOBooks ON issue_book.accno=BOBooks.accno WHERE issue_book.approved='Yes' ORDER BY issue_book.returnd ASC";
        $res=mysqli_query($db,$sql);


         while($row=mysqli_fetch_assoc($res))
        {

            $d=date("Y-m-d");
            if($d > $row['returnd'])

        {
            $c=$c+1;
            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';

            mysqli_query($db,"UPDATE issue_book SET approved='$var' where returnd ='$row[returnd]' and approved='Yes' limit $c;");  
            echo $d."<br>";
        }
           

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['returnd']; echo "</td>";
           

            echo "</tr>";
          
        }

         $sql="SELECT student.username,enroll,COBooks.accno,name,authors,edition,issue_book.issue,returnd FROM student inner join 
        issue_book ON student.username=issue_book.username inner join COBooks ON issue_book.accno=COBooks.accno WHERE issue_book.approved='Yes' ORDER BY issue_book.returnd ASC";
        $res=mysqli_query($db,$sql);


         while($row=mysqli_fetch_assoc($res))
        {

            $d=date("Y-m-d");
            if($d > $row['returnd'])

        {
            $c=$c+1;
            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';

            mysqli_query($db,"UPDATE issue_book SET approved='$var' where returnd ='$row[returnd]' and approved='Yes' limit $c;");  
            echo $d."<br>";
        }
           

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['returnd']; echo "</td>";
           

            echo "</tr>";
          
        }


         $sql="SELECT student.username,enroll,SOBooks.accno,name,authors,edition,issue_book.issue,returnd FROM student inner join 
        issue_book ON student.username=issue_book.username inner join SOBooks ON issue_book.accno=SOBooks.accno WHERE issue_book.approved='Yes' ORDER BY issue_book.returnd ASC";
        $res=mysqli_query($db,$sql);


         while($row=mysqli_fetch_assoc($res))
        {

            $d=date("Y-m-d");
            if($d > $row['returnd'])

        {
            $c=$c+1;
            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';

            mysqli_query($db,"UPDATE issue_book SET approved='$var' where returnd ='$row[returnd]' and approved='Yes' limit $c;");  
            echo $d."<br>";
        }
           

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['returnd']; echo "</td>";
           

            echo "</tr>";
          
        }

          $sql="SELECT student.username,enroll,WOBooks.accno,name,authors,edition,issue_book.issue,returnd FROM student inner join 
        issue_book ON student.username=issue_book.username inner join WOBooks ON issue_book.accno=WOBooks.accno WHERE issue_book.approved='Yes' ORDER BY issue_book.returnd ASC";
        $res=mysqli_query($db,$sql);


         while($row=mysqli_fetch_assoc($res))
        {

            $d=date("Y-m-d");
            if($d > $row['returnd'])

        {
            $c=$c+1;
            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';

            mysqli_query($db,"UPDATE issue_book SET approved='$var' where returnd ='$row[returnd]' and approved='Yes' limit $c;");  
            echo $d."<br>";
        }
           

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['returnd']; echo "</td>";
           

            echo "</tr>";
          
        }

          $sql="SELECT student.username,enroll,CPBooks.accno,name,authors,edition,issue_book.issue,returnd FROM student inner join 
        issue_book ON student.username=issue_book.username inner join CPBooks ON issue_book.accno=CPBooks.accno WHERE issue_book.approved='Yes' ORDER BY issue_book.returnd ASC";
        $res=mysqli_query($db,$sql);


         while($row=mysqli_fetch_assoc($res))
        {

            $d=date("Y-m-d");
            if($d > $row['returnd'])

        {
            $c=$c+1;
            
            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';

            mysqli_query($db,"UPDATE issue_book SET approved='$var' where returnd ='$row[returnd]' and approved='Yes' limit $c;");  
            echo $d."<br>";
        }
           

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['returnd']; echo "</td>";
           

            echo "</tr>";
          
        }
        $sql="SELECT student.username,enroll,UPBooks.accno,name,authors,edition,issue_book.issue,returnd FROM student inner join 
        issue_book ON student.username=issue_book.username inner join UPBooks ON issue_book.accno=UPBooks.accno WHERE issue_book.approved='Yes' ORDER BY issue_book.returnd ASC";
        $res=mysqli_query($db,$sql);


         while($row=mysqli_fetch_assoc($res))
        {

            $d=date("Y-m-d");
            if($d > $row['returnd'])

        {
            $c=$c+1;
            $var='<p style="color:yellow;background-color:red;">EXPIRED</p>';

            mysqli_query($db,"UPDATE issue_book SET approved='$var' where returnd ='$row[returnd]' and approved='Yes' limit $c;");  
            echo $d."<br>";
        }
           

            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['enroll']; echo "</td>"; 
            echo "<td>"; echo $row['accno']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issue']; echo "</td>";
            echo "<td>"; echo $row['returnd']; echo "</td>";
           

            echo "</tr>";
          
        }*/


   
        echo "</table>";
        echo "</div>";
    }  
    else
    {
        ?>
        <h1 style="text-align: center;">Login to see information of Borrowed Books.</h1>
        <?php
    }
    ?>
    </script>
</div>
</div>
</html>

