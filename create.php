<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values

// $name = $address = $salary = "";
$username = $name = $age = $birthdate = $email = $contactnumber = $gender = $password = $confirm_password = "";


$username_err = $name_err = $age_err = $birthdate_err = $email_err = $contactnumber_err = $gender_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["Username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM customer WHERE Username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["Username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["Username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

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

    // $input_password = trim($_POST["Password"]);
    // if(empty($input_password)){
    //     $password_err = "Please enter password";     
    // } else{
    //     $password = $input_password;
    // }

    // Validate password
    if(empty(trim($_POST["Password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["Password"])) < 3){
        $password_err = "Password must have atleast 3 characters.";
    } else{
        $password = trim($_POST["Password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($name_err) && empty($age_err) && empty($birthdate_err) && empty($email_err) && empty($contactnumber_err) && empty($gender_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO `customer`(`Username`, `Name`, `Age`, `Birthdate`, `Email`, `Contact Number`, `Gender`, `Password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_username, $param_name, $param_age, $param_birthdate, $param_email, $param_contactnumber, $param_gender, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_name = $name;
            $param_age = $age;
            $param_birthdate = $birthdate;
            $param_email = $email;
            $param_contactnumber = $contactnumber;
            $param_gender = $gender;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record Customer</title>
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
                        <h2>Create Record Customer</h2>
                    </div>
                    <p>Please fill this form and submit to add <b>customer</b> record to the database.</p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="Username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>
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

                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexstaff.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>