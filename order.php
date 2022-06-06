

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Velen and Ana’s Seafoods Dealer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <?php include 'header.php';?>
    <?php   
    // session_start();
    require_once "config.php";

    if(isset($_POST["add_to_cart"]))  
    {  
        if(isset($_SESSION["shopping_cart"]))  
        {  
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
            if(!in_array($_GET["id"], $item_array_id))  
            {  
                    $count = count($_SESSION["shopping_cart"]);  
                    $item_array = array(  
                        'item_id'               =>     $_GET["id"],  
                        'item_name'               =>     $_POST["hidden_name"],  
                        'item_price'          =>     $_POST["hidden_price"],  
                        'item_quantity'          =>     $_POST["quantity"]  
                    );  
                    $_SESSION["shopping_cart"][$count] = $item_array;  
            }  
            else  
            {  
                    echo '<script>alert("Item Already Added")</script>';  
                    echo '<script>window.location="order.php"</script>';  
            }  
        }  
        else  
        {  
            $item_array = array(  
                    'item_id'               =>     $_GET["id"],  
                    'item_name'               =>     $_POST["hidden_name"],  
                    'item_price'          =>     $_POST["hidden_price"],  
                    'item_quantity'          =>     $_POST["quantity"]  
            );  
            $_SESSION["shopping_cart"][0] = $item_array;  
        }  
    }  
    if(isset($_GET["action"]))  
    {  
        if($_GET["action"] == "delete")  
        {  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
                    if($values["item_id"] == $_GET["id"])  
                    {  
                        unset($_SESSION["shopping_cart"][$keys]);  
                        echo '<script>alert("Item Removed")</script>';  
                        echo '<script>window.location="order.php"</script>';  
                    }  
            }  
        }  
    }  
/////////////////////////////////////////////////////////////////////////////////////////////

    

    ?>
        
    <div class="container" style="width:700px;">  
                
                <?php  
                
                $sql = "SELECT * FROM productlist ORDER BY id ASC";  
                $result = mysqli_query($link, $sql);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="order.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["Image"]; ?>" width="100" height="100" /><br />  
                               <h4 class="text-info"><?php echo $row["Name"]; ?></h4>  
                               <h4 class="text-danger">P <?php echo $row["Price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                    <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>P <?php echo $values["item_price"]; ?></td>  
                               <td>P <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="order.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                   $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">P <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                    </table> 
                          <?php  
                          }  
                          ?>  
                </div>  
           </div>  
<?php

error_reporting(E_ALL ^ E_NOTICE);  
     // Define variables and initialize with empty values

// $name = $address = $salary = "";
$firstname = $lastname = $address = $emailaddress = $phonenumber = "";


$firstname_err = $lastname_err = $address_err = $emailaddress_err = $phonenumber_err ="";
 
// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_firstname = trim($_POST["First_Name"]);
    if(empty($input_firstname)){
        $firstname_err = "Please enter first name";     
    } else{
        $firstname = $input_firstname;
    }

    $input_lastname = trim($_POST["Last_Name"]);
    if(empty($input_lastname)){
        $lastname_err = "Please enter last name";     
    } else{
        $lastname = $input_lastname;
    }

    $input_address = trim($_POST["Address"]);
    if(empty($input_address)){
        $address_err = "Please enter address";     
    } else{
        $address = $input_address;
    }

    $input_emailaddress = trim($_POST["Email_Address"]);
    if(empty($input_emailaddress)){
        $emailaddress_err = "Please enter email address";     
    } else{
        $emailaddress = $input_emailaddress;
    }

    $input_phonenumber = trim($_POST["Phone_Number"]);
    if(empty($input_phonenumber)){
        $phonenumber_err = "Please enter phone number";     
    } else{
        $phonenumber = $input_phonenumber;
    }
    
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($address_err) && empty($emailaddress_err) && empty($phonenumber_err)){
        // Prepare an insert statement
     //    $values["item_name"]
     // '{$_SESSION['shopping_cart']}'
     //    $val= "'$values["item_name"]', '$values["item_name"]'";
        $sql = "INSERT INTO `orders`(`First_Name`, `Last_Name`, `Address`, `Email_Address`, `Phone_Number`, `Status`, `Orders`, `Quantity`, `Price`, `Total`) VALUES (?, ?, ?, ?, ?, 'Pending', ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_firstname, $param_lastname, $param_address, $param_emailaddress, $param_phonenumber, $values["item_name"], $values["item_quantity"], $values["item_price"], $total);
            
            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_address = $address;
            $param_emailaddress = $emailaddress;
            $param_phonenumber = $phonenumber;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                if (headers_sent()) {
                    die("<h1>Order sent</h1>");
                }
                else{
                    header("location: customerindex.php");
                    exit();
                }
            } else{
                echo "Something went wrong. Please try again later.";
                printf("Error: %s.\n", $stmt->error);
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
          <div>
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                              <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                                   <label>First Name</label>
                                   <input type="text" name="First_Name" class="form-control" value="<?php echo $firstname; ?>">
                                   <span class="help-block"><?php echo $firstname_err;?></span>
                              </div>
                              <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                                   <label>Last Name</label>
                                   <input type="text" name="Last_Name" class="form-control" value="<?php echo $lastname; ?>">
                                   <span class="help-block"><?php echo $lastname_err;?></span>
                              </div>
                              <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                   <label>Address</label>
                                   <input type="text" name="Address" class="form-control" value="<?php echo $address; ?>">
                                   <span class="help-block"><?php echo $address_err;?></span>
                              </div>
                              <div class="form-group <?php echo (!empty($emailaddress_err)) ? 'has-error' : ''; ?>">
                                   <label>Email Address</label>
                                   <input type="text" name="Email_Address" class="form-control" value="<?php echo $emailaddress; ?>">
                                   <span class="help-block"><?php echo $emailaddress_err;?></span>
                              </div>
                              <div class="form-group <?php echo (!empty($phonenumber_err)) ? 'has-error' : ''; ?>">
                                   <label>Phone Number</label>
                                   <input type="text" name="Phone_Number" class="form-control" value="<?php echo $phonenumber; ?>">
                                   <span class="help-block"><?php echo $phonenumber_err;?></span>
                              </div>

                              <input type="submit" class="btn btn-primary" value="Submit">
                              <a href="customerindex.php" class="btn btn-default">Cancel</a>
               </form>
          </div>
          
        
           

    
    <?php include 'footer.php';?>
</body>
</html>