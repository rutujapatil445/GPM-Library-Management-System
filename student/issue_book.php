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
        .srch {
            padding-Left: 1000px;
        }

        body {
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
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .img-circle {
            margin-left: 20px;
        }

        .h:hover {
            color: white;
            width: 300px;
            height: 50px;
            background-color: #00544c;
        }
    </style>
</head>

<body>
    <!--________________________________sidenav__________________________-->

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div style="color:white; margin-left: 60px; font-size:20px;">
            <?php
            if (isset($_SESSION['login_user'])) {
                echo "Welcome " . $_SESSION['login_user'];
            }
            ?>
        </div><br><br>

        <div class="h"><a href="books.php">Books</a></div>
        <div class="h"><a href="request.php">Book Request</a></div>
        <div class="h"><a href="issue_book.php">Issue Information</a></div>
        <div class="h"><a href="date_expired.php">Expired List</a></div>

    </div>

    <div id="main">

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "300px";
                document.getElementById("main").style.marginLeft = "300px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "white";
            }
        </script>
        <br><br>
        <form method="post" action="">
            <div class="container" style="width:90%;">

                <?php
                $q = mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approved='Yes' or approved='';");

                if (mysqli_num_rows($q) == 0) {
                    echo "There's no pending request";
                } else {
                ?>

                    <table class='table table-bordered table-hover'>
                        <tr style='background-color: #6db6b9e6;'>
                            <!--Table Header-->
                            <th style='text-align:center;'>Select</th>
                            <th>Accession No</th>
                            <th>Approve Status</th>
                            <th>Request Date</th>
                            <th>Return Date</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_assoc($q)) {
                        ?>
                            <tr>
                                <td style="width:10%;"><input type="checkbox" name="check[]" value="<?php echo $row["accno"] ?>"></td>
                                <td><?php echo $row['accno']; ?></td>
                                <td><?php echo $row['approved']; ?></td>
                                <td><?php echo $row['issue']; ?></td>
                                <td><?php echo $row['returnd']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                    <p align="center"><button type="submit" name="delete" class="btn btn-success">Delete</button></p>

                    <?php
                    if (isset($_POST['delete'])) {
                        if (isset($_POST['check'])) {
                            foreach ($_POST['check'] as $delete_id) {
                                mysqli_query($db, "DELETE from issue_book where accno='$delete_id' and username='$_SESSION[login_user]' ORDER BY accno ASC LIMIT 1;");
                            }
                            // Refresh the page after deletion
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    }
                    ?>

                <?php
                }
                ?>
            </div>
        </form>
    </body>

</html>
