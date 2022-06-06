<?php
// // Initialize the session
// session_start();
 
// // Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: customerlogin.php");
//     exit;
// }
?>
 
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
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Velen and Ana’s Seafoods Dealer.</h1>
    </div>
    <p>
        <!-- <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a> -->
        <!-- <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> -->
        <a href=".php" class="btn btn-warning">Order</a>
    </p>
    <div class="card">

  <img src="https://lh3.googleusercontent.com/5eInozUw3IAsVLFgsTR4K17MHsK3x2ysSs051NY3_P3hTtQjQs3Qq18ti7Ys2y8TdeGlLOlHFQiCY884gzb9Bt8vaGxevqdHEsezje5QZ_uHUCGIcWCkqPko3iq42_Tu1jUM91IzT9yRj_XnYe8-SGzn8ZKvY3oLAwf-KFwP3UnUL1bVM8WM99iTApVaFq1wjJRREC-Jg-x15FVE6YYmkwqZ4JIwFsxv3Iigtv2k52CdFxG7gaxn4My-D_IeMglOu_Ap-oPoysbpyyLywWCKpsZV7J7AAWZiXJcsqS-cGn6soEqYJDSpoaFEn1E-XqBlkgKyp7TFIQby5qU05YsIfWVlojamTAB0lrqK53O-FVv8QMWnImh8-rKwe4eLs6iV9seTFb5TOxv5xcVpyY1kMJuLq7nHoX-7NVmlEEzh0Bu60kATCSmhb0kWUuE28tn7WKwq4E3hKrIJtZg0mazcmS_eBQKtoGVElBQNvNuemxx0IszO_dJ4R5CUyn3rPPDnsu3lJADeN4QnVAqcuLoEW4FxPNOMos0ocpk1nbKsWYln--GD1Y4d6MwAcsXDFRIYezupfdWUy8Yo60i91iuDBATe_HjP43az_maam77GoQG2LZ2vYMVE5lOA56fW5iUVXjwJRk6S06I-i0npn6BQEZIwb5jaxQo1iqpE5xGFw8ErAbCOgC8NyefEJz0DL0yn-DKnMuMK2yAOybVwCVVaV6cSXZJ4x7izXJbA6QP8Oz4PZfoMMasQKPJuE64Ut56ac9AQNb5UDSXm4T0XVMpDfanvLUyhwoxuHgs=w720-h300-no?authuser=1" class="d-block w-100" alt="...">
  <p class="par">
    Welcome to Velen and Ana’s Seafood Dealer!
    This is your one stop shop Fresh Seafood store right at the tip of your fingers.
    We offer you a wide variety of seafood which you can order online and will be ready for pick-up at your preferred date and time. 
  </p>
    <?php include 'footer.php';?>
</body>
</html>