<?php

include("classes/connect.php");
include("classes/signup.php");

$first_name = "";
$last_name = "";
$email = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if($result != ""){
        echo "<div style='left:300px; font-size: 15px;color: red; background-color:transparent; opacity:.8 ;z-index: 100; position: absolute;'>";
            echo "<br>The following errors occured<br><br>";
           echo $result;
           echo "</div>";
    }else {
        header("Location: login.php" ); //. ROOT ."login"
		die;
    }
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crescendo | Signup</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <div class="crescendoLogo">
            Logo
        </div>
    </div>

    <div id="signupCard">
        <p id="cardText" style="position: absolute; bottom: 85%; left: 40%;">Sign up</p> <br>

        <form method="post" action="">

            <input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First name "><br><br>
            <input  value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Last name"><br><br>
            <input  value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br><br>

            <input name="password" type="password" id="text" placeholder="Password"><br><br>
            <input type="password2" id="text" placeholder=" Retype Password"><br><br><br>

          <button style="background-color:#46cc61bd; border: thin;"><input type="submit" id="loginButton" value="Sign up"></button>

            <div class="signin">
                <p>Already have an account? <a href='login.php'>Log in</a>.</p>

        </form>
    </div>
    </div>


</body>

</html>