<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $age = $birthdate = $email = $contactnumber = $gender = $password = "";

$name_err = $age_err = $birthdate_err = $email_err = $contactnumber_err = $gender_err = $password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $input_name = trim($_POST["Name"]);
    if(empty($input_name)){
        $name_err = "Please enter name";     
    } else{
        $name = $input_name;
    }

    $input_age = trim($_POST["Age"]);
    if(empty($input_age)){
        $age_err = "Please enter an age";     
    } else{
        $age = $input_age;
    }

    $input_birthdate = trim($_POST["Birthdate"]);
    if(empty($input_birthdate)){
        $birthdate_err = "Please enter birthdate";     
    } else{
        $birthdate = $input_birthdate;
    }

    $input_email = trim($_POST["Email"]);
    if(empty($input_email)){
        $email_err = "Please enter email";     
    } else{
        $email = $input_email;
    }

    $input_contactnumber = trim($_POST["Contact"]);
    if(empty($input_contactnumber)){
        $contactnumber_err = "Please enter contact number";     
    } else{
        $contactnumber = $input_contactnumber;
    }

    $input_gender = trim($_POST["Gender"]);
    if(empty($input_gender)){
        $gender_err = "Please enter gender";     
    } else{
        $gender = $input_gender;
    }

    $input_password = trim($_POST["Password"]);
    if(empty($input_password)){
        $password_err = "Please enter password";     
    } else{
        $password = $input_password;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($age_err) && empty($birthdate_err) && empty($email_err) && empty($contactnumber_err) && empty($gender_err) && empty($password_err)){
        // Prepare an update statement
        $sql = "UPDATE `customer` SET `Name`=?,`Age`=?,`Birthdate`=?,`Email`=?,`Contact Number`=?,`Gender`=?,`Password`=? WHERE `id`=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_name, $param_age, $param_birthdate, $param_email, $param_contactnumber, $param_gender, $param_password, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_age = $age;
            $param_birthdate = $birthdate;
            $param_email = $email;
            $param_contactnumber = $contactnumber;
            $param_gender = $gender;
            $param_password = $password;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: indexstaff.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM customer WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["Name"];
                    $age = $row["Age"];
                    $birthdate = $row["Birthdate"];
                    $email = $row["Email"];
                    $contactnumber = $row["Contact Number"];
                    $gender = $row["Gender"];
                    $password = $row["Password"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($age_err)) ? 'has-error' : ''; ?>">
                            <label>Age</label>
                            <input type="text" name="Age" class="form-control" value="<?php echo $age; ?>">
                            <span class="help-block"><?php echo $age_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($birthdate_err)) ? 'has-error' : ''; ?>">
                            <label>Birthdate</label>
                            <input type="text" name="Birthdate" class="form-control" value="<?php echo $birthdate; ?>">
                            <span class="help-block"><?php echo $birthdate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="Email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($contactnumber_err)) ? 'has-error' : ''; ?>">
                            <label>Contact Number</label>
                            <input type="text" name="Contact" class="form-control" value="<?php echo $contactnumber; ?>">
                            <span class="help-block"><?php echo $contactnumber_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <label>Gender</label>
                            <input type="text" name="Gender" class="form-control" value="<?php echo $gender; ?>">
                            <span class="help-block"><?php echo $gender_err;?></span>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexstaff.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>