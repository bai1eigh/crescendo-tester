<?php

session_start();

include("classes/connect.php");
include("classes/login.php");

$email = "";
$password = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $login = new Login();
    $result = $login->evaluate($_POST);

    //checking for errors
    if($result != ""){
        echo "<div style='left:300px; font-size: 15px;color: red; background-color:transparent; opacity:.8 ;z-index: 100; position: absolute;''>";
        echo "<br>The following errors occured<br><br>";
        echo $result;
        echo "</div>";
    }else {
        header("Location: profile.php" ); //. ROOT ."login"
		die;
    }
    
    $password = $_POST['password'];
    $email = $_POST['email'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crescendo | Log in</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
    <form method="post"> 
        <div class="crescendoLogo">
            Logo
            <div id="signupBtn"><a style="color:white;"href="signup.php">Signup</a></div>
        </div>
    </div>

    <div id="signupCard">
        <p id="cardText">Log in to Crescendo</p> <br>
        <input name="email" value="<?php echo $email?>" type="text" id="text" placeholder="Email"><br><br>
        <input name="password" value="<?php echo $password?>" type="password" id="text" placeholder="Password"><br><br><br><br><br><br>
        <button style="background-color:#46cc61bd; border: thin;"> <input type="submit" id="loginButton" value="Log in"></button>
         <div class="signin">
        <p>Don't have an account? <a href='signup.php'>Sign up</a>.</p>
</form>

      </div>
    </div>

   
</body>

</html>