<?php
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");
include("classes/image.php");

//isset($_SESSION['crescendo_userid']);
$login = new Login();
$user_data = $login->check_login($_SESSION['crescendo_userid']);

//posting starts here
if($_SERVER['REQUEST_METHOD'] == "POST"){ 

if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
{ //die;
    if($_FILES['file']['type'] == "image/jpeg") 
    {
        $allowed_size = (1024 * 1024) * 3;
        if($_FILES['file']['size'] < $allowed_size){

        //everything is fine 
        $folder = "uploads/" . $user_data['userid'] ."/";

        //create folder
        if(!file_exists($folder)){
        mkdir($folder, 0777, true);
        }

        $image = new Image();
        
        $filename = $folder . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $filename);

        //changing dimensions for cover image
        $change = "profile"; 

        //checking for mode
        if(isset($_GET['change'])){
            
            $change = $_GET['change'];
        } 
         
       $image = new Image();

       if($change == 'cover'){
         $image->crop_image($filename, $filename, 1366,488);
       } else {
      
       $image->crop_image($filename, $filename, 800,800);
        }
        if(file_exists($filename)){
        $userid = $user_data['userid'];
        if($change == "cover"){
                $query = "update users set cover_image = '$filename' where userid = '$userid' limit 1";
        } else {
            $query = "update users set profile_image = '$filename' where userid = '$userid' limit 1";
        }
        $DB = new Database();
        $DB->save($query);

        header(("Location: profile.php"));
        die;
    }
        } else {
            echo "<div style='left:300px; font-size: 15px;color: red; background-color:transparent; opacity:.8 ;z-index: 100; position: absolute;'>";
            echo "<br>The following errors occured<br><br>";
            echo "Only images of size 3MB or lower are allowed";
            echo "</div>";
        }
    
    } else {
        echo "<div style='left:300px; font-size: 15px;color: red; background-color:transparent; opacity:.8 ;z-index: 100; position: absolute;'>";
        echo "<br>The following errors occured<br><br>";
        echo "Only images of jpeg type are allowed";
        echo "</div>";
    }

    
} else {
    echo "<div style='left:300px; font-size: 15px;color: red; background-color:transparent; opacity:.8 ;z-index: 100; position: absolute;'>";
    echo "<br>The following errors occured<br><br>";
    echo "please add image";
    echo "</div>";
}}

?>
<!---html start-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crescendo Change Image| Crescendo</title>
    <link rel="stylesheet" href="timeline.css">
</head>

<body>
    <!---nav bar-->
    <?php 
    include ("header.php");
    ?>
    <br><br><br><br><br>
    <!---cover area-->
    <div id="profileHeader">

        <!---boxes-->
        <div style="display: flex;">

            <!---change profile image -->
            <div style="background-color:gray;  min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
                <form method="post" enctype="multipart/form-data">
                    <div style="background-color: white; border: black thin solid ; padding: 10px;">
                        <input type="file" name="file"><br>
                        <input style = "width: 60px;"type="submit" id="post_button" value="Change">
                        <br><br>
                    </div>
                </form>

            </div>
        </div>
    </div>

    </div>

</body>

</html>