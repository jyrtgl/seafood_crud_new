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
            <li><a href="orderlist.php">Orders</a></li>
            <li><a href="producttable.php">Product List</a></li>
            <li><a href="indexstaff.php">Customer</a></li>
            <li><a href="adminlogout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="page-header clearfix">
            <h2 class="pull-left">Orders</h2>
            <!-- <a href="createproduct.php" class="btn btn-success pull-right btn-lg">Add New Product</a> -->
        </div>

        <div class="form-inline">
        <center>
            <form method="post" action="ordertable.php"  class="col-xs-14" >
                <input type="text" name="term" class="form-control"  />
                <input type="submit" name="submit" value="Search" class="btn btn-basic" />
                <input type="submit" name="load" class="btn btn-info pull-right btn-sm" value="All data">
            </form>
            <form method="post" action="ordertable.php"  class="col-xs-14" >
                <input type="submit" name="pending" class="btn btn-info pull-right btn-sm" value="Pending">
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
        if (isset($_POST["pending"])){
            //check if have some value or not
            if (isset($_GET['id'])) {
                //getting value passed in url
                    $productieorder =  $_GET['id'];
                    $updateStatus = "UPDATE orders SET `Status` = 'Done' WHERE id=".$productieorder."";
                    $query2 = $mysql->query($updateStatus);
            }
            $sql = "SELECT * FROM `orders` WHERE Status = 'Pending'";
            
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped' >";
                        echo "<thead>";
                            echo "<tr  class='text-center'>";
                                echo "<th class='text-center'>#</th>";
                                echo "<th class='text-center'>First Name</th>";
                                echo "<th class='text-center'>Last Name</th>";
                                echo "<th class='text-center'>Address</th>";
                                echo "<th class='text-center'>Email Address</th>";
                                echo "<th class='text-center'>Phone Number</th>";
                                echo "<th class='text-center'>Orders</th>";
                                echo "<th class='text-center'>Quantity</th>";
                                echo "<th class='text-center'>Price</th>";
                                echo "<th class='text-center'>Total</th>";
                                echo "<th class='text-center'>Status</th>";
                                echo "<th class='text-center'>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td class='text-center'>" . $row['id'] . "</td>";
                                echo "<td class='text-center'>" . $row['First_Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Last_Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Address'] . "</td>";
                                echo "<td class='text-center'>" . $row['Email_Address'] . "</td>";
                                echo "<td class='text-center'>" . $row['Phone_Number'] . "</td>";
                                echo "<td class='text-center'>" . $row['Orders'] . "</td>";
                                echo "<td class='text-center'>" . $row['Quantity'] . "</td>";
                                echo "<td class='text-center'>" . $row['Price'] . "</td>";
                                echo "<td class='text-center'>" . $row['Total'] . "</td>";
                                echo "<td class='text-center'>" . $row['Status'] . "</td>";
                                echo "<td class='text-center'>";
                                    // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-sm'>View</span></a>";
                                    echo "<a href='updateorder.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='btn btn-success btn-sm'>Update to Done</span></a>";
                                    // echo "<a href='deleteproduct.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-sm'>Delete</span></a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";                            
                    echo "</table>";
                    
                    // Free result set
                    mysqli_free_result($result);

                    // $sql = "UPDATE `orders` SET `Status` = 'Done' WHERE `id` = ?";
                } else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
    
            // Close connection
            mysqli_close($link);
        }
        if (isset($_POST["load"])){
            $sql = "SELECT * FROM `orders`";
            
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped' >";
                        echo "<thead>";
                            echo "<tr  class='text-center'>";
                                echo "<th class='text-center'>#</th>";
                                echo "<th class='text-center'>First Name</th>";
                                echo "<th class='text-center'>Last Name</th>";
                                echo "<th class='text-center'>Address</th>";
                                echo "<th class='text-center'>Email Address</th>";
                                echo "<th class='text-center'>Phone Number</th>";
                                echo "<th class='text-center'>Orders</th>";
                                echo "<th class='text-center'>Quantity</th>";
                                echo "<th class='text-center'>Price</th>";
                                echo "<th class='text-center'>Total</th>";
                                echo "<th class='text-center'>Status</th>";
                                // echo "<th class='text-center'>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td class='text-center'>" . $row['id'] . "</td>";
                                echo "<td class='text-center'>" . $row['First_Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Last_Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Address'] . "</td>";
                                echo "<td class='text-center'>" . $row['Email_Address'] . "</td>";
                                echo "<td class='text-center'>" . $row['Phone_Number'] . "</td>";
                                echo "<td class='text-center'>" . $row['Orders'] . "</td>";
                                echo "<td class='text-center'>" . $row['Quantity'] . "</td>";
                                echo "<td class='text-center'>" . $row['Price'] . "</td>";
                                echo "<td class='text-center'>" . $row['Total'] . "</td>";
                                echo "<td class='text-center'>" . $row['Status'] . "</td>";
                                // echo "<td class='text-center'>";
                                //     // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-sm'>View</span></a>";
                                //     echo "<a href='updateproduct.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='btn btn-success btn-sm'>Update</span></a>";
                                //     echo "<a href='deleteproduct.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-sm'>Delete</span></a>";
                                // echo "</td>";
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

            $sql = "SELECT * FROM `orders` WHERE `First_Name` LIKE '%".$term."%'";
            // $sql = "SELECT * FROM `customer`";
            
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped' >";
                        echo "<thead>";
                            echo "<tr  class='text-center'>";
                                echo "<th class='text-center'>#</th>";
                                echo "<th class='text-center'>First Name</th>";
                                echo "<th class='text-center'>Last Name</th>";
                                echo "<th class='text-center'>Address</th>";
                                echo "<th class='text-center'>Email Address</th>";
                                echo "<th class='text-center'>Phone Number</th>";
                                echo "<th class='text-center'>Orders</th>";
                                echo "<th class='text-center'>Quantity</th>";
                                echo "<th class='text-center'>Price</th>";
                                echo "<th class='text-center'>Total</th>";
                                echo "<th class='text-center'>Status</th>";
                                // echo "<th class='text-center'>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                                echo "<td class='text-center'>" . $row['id'] . "</td>";
                                echo "<td class='text-center'>" . $row['First_Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Last_Name'] . "</td>";
                                echo "<td class='text-center'>" . $row['Address'] . "</td>";
                                echo "<td class='text-center'>" . $row['Email_Address'] . "</td>";
                                echo "<td class='text-center'>" . $row['Phone_Number'] . "</td>";
                                echo "<td class='text-center'>" . $row['Orders'] . "</td>";
                                echo "<td class='text-center'>" . $row['Quantity'] . "</td>";
                                echo "<td class='text-center'>" . $row['Price'] . "</td>";
                                echo "<td class='text-center'>" . $row['Total'] . "</td>";
                                echo "<td class='text-center'>" . $row['Status'] . "</td>";
                                // echo "<td class='text-center'>";
                                //     // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='btn btn-info btn-sm'>View</span></a>";
                                //     echo " <a href='updateproduct.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='btn btn-success btn-sm'>Update</span></a>";
                                //     echo " <a href='deleteproduct.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='btn btn-danger btn-sm'>Delete</span></a>";
                                // echo "</td>";
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