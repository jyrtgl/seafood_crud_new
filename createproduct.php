<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values

// $name = $address = $salary = "";
$image = $name = $price = $stocks = "";


$image_err = $name_err = $price_err = $stocks_err = "";
 
// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_image = trim($_POST["Image"]);
    if(empty($input_image)){
        $image_err = "Please enter image";     
    } else{
        $image = $input_image;
    }

    $input_name = trim($_POST["Name"]);
    if(empty($input_name)){
        $name_err = "Please enter name";     
    } else{
        $name = $input_name;
    }

    $input_price = trim($_POST["Price"]);
    if(empty($input_price)){
        $price_err = "Please enter a price";     
    } else{
        $price = $input_price;
    }

    $input_stocks = trim($_POST["Stocks"]);
    if(empty($input_stocks)){
        $stocks_err = "Please enter stocks";     
    } else{
        $stocks = $input_stocks;
    }
    
    // Check input errors before inserting in database
    if(empty($image_err) && empty($name_err) && empty($price_err) && empty($stocks_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO `productlist`(`Image`, `Name`, `Price`, `Stocks`) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_image, $param_name, $param_price, $param_stocks);
            
            // Set parameters
            $param_image = $image;
            $param_name = $name;
            $param_price = $price;
            $param_stocks = $stocks;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: producttable.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record Staff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .content {
            position: absolute;
            left: 50%;
            top: 45%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record Product</h2>
                    </div>
                    <p>Please fill this form and submit to add <b>product</b> record to the database.</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Image</label>
                            <input type="text" name="Image" class="form-control" value="<?php echo $image; ?>">
                            <span class="help-block"><?php echo $image_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="Price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($stocks_err)) ? 'has-error' : ''; ?>">
                            <label>Stocks</label>
                            <input type="text" name="Stocks" class="form-control" value="<?php echo $stocks; ?>">
                            <span class="help-block"><?php echo $stocks_err;?></span>
                        </div>
                        

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="producttable.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>