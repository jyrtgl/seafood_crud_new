<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Staff</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="ordertable.php">Orders</a></li>
            <li><a href="producttable.php">Product List</a></li>
            <li><a href="indexstaff.php">Customer</a></li>
            <li><a href="adminlogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="page-header clearfix">
            <h2 class="pull-left">Customer Details</h2>
            <a href="create.php" class="btn btn-success pull-right btn-lg">Add New Customer</a>
        </div>

        <div class="form-inline">
        <center>
            <form method="post" action="indexstaff.php"  class="col-xs-14" >
                <input type="text" name="term" class="form-control"  />
                <input type="submit" name="submit" value="Search" class="btn btn-basic" />
                <input type="submit" name="load" class="btn btn-info pull-right btn-sm" value="Load data">
            </form>
        </center>
            <br>
        </div>
        
        <?php
        // Include config file
        require_once "config.php";
        
        // Attempt select query execution
        // $sql = "SELECT * FROM customer where Username like '%.$query.%'";
        
        // if(isset($_GET['submit'])){
        //     $query=$_GET['query'];
        //     echo $query;
        // }

        if (isset($_POST["load"])){
            $sql = "SELECT * FROM `customer`";
            
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped' >";
                        echo "<thead>";
                            echo "<tr  class='text-center'>";
                                echo "<th class='text-center'>#</th>";
                                echo "<th class='text-center'>Username</th>";
                                echo "<th class='text-center'>Name</th>";
                                echo "<th class='text-center'>Age</th>";
                                echo "<th class='text-center'>Birthdate</th>";
                                echo "<th class='text-center'>Email</th>";
                                echo "<th class='text-center'>Contact Number</th>";
                                echo "<th class='text-center'>Gender</th>";
                                echo "<th class='text-center'>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td class='text-center'>" . $row['id'] . "</td>";
                                echo "<td class='text-center'>" . $row['Username'] . "</td>";
                                echo "<td class='text-center'>" . $row['Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Age'] . "</td>";
                                echo "<td class='text-center'>" . $row['Birthdate'] . "</td>";
                                echo "<td class='text-center'>" . $row['Email'] . "</td>";
                                echo "<td class='text-center'>" . $row['Contact Number'] . "</td>";
                                echo "<td class='text-center'>" . $row['Gender'] . "</td>";
                                echo "<td class='text-center'>";
                                    // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-sm'>View</span></a>";
                                    echo " <a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='btn btn-success btn-sm'>Update</span></a>";
                                    echo " <a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-sm'>Delete</span></a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
    
            // Close connection
            mysqli_close($link);
        }
        if (!empty($_REQUEST['term'])) {

            $term = mysqli_real_escape_string($link, $_REQUEST['term']);

            $sql = "SELECT * FROM `customer` WHERE `Username` LIKE '%".$term."%' OR `Name` LIKE '%".$term."%' OR `Age` LIKE '%".$term."%' OR `Birthdate` LIKE '%".$term."%' OR `Email` LIKE '%".$term."%' OR `Contact Number` LIKE '%".$term."%' OR `Gender` LIKE '%".$term."%'";
            // $sql = "SELECT * FROM `customer`";
            
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped' >";
                        echo "<thead>";
                            echo "<tr  class='text-center'>";
                                echo "<th class='text-center'>#</th>";
                                echo "<th class='text-center'>Username</th>";
                                echo "<th class='text-center'>Name</th>";
                                echo "<th class='text-center'>Age</th>";
                                echo "<th class='text-center'>Birthdate</th>";
                                echo "<th class='text-center'>Email</th>";
                                echo "<th class='text-center'>Contact Number</th>";
                                echo "<th class='text-center'>Gender</th>";
                                echo "<th class='text-center'>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td class='text-center'>" . $row['id'] . "</td>";
                                echo "<td class='text-center'>" . $row['Username'] . "</td>";
                                echo "<td class='text-center'>" . $row['Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Age'] . "</td>";
                                echo "<td class='text-center'>" . $row['Birthdate'] . "</td>";
                                echo "<td class='text-center'>" . $row['Email'] . "</td>";
                                echo "<td class='text-center'>" . $row['Contact Number'] . "</td>";
                                echo "<td class='text-center'>" . $row['Gender'] . "</td>";
                                echo "<td class='text-center'>";
                                    echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-sm'>View</span></a>";
                                    echo " <a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='btn btn-success btn-sm'>Update</span></a>";
                                    echo " <a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-sm'>Delete</span></a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
    
            // Close connection
            mysqli_close($link);
        }

        
        ?>
</body>
</html>