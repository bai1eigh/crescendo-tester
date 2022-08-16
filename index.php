<?php
session_start();
include("classes/autoload.php");


//isset($_SESSION['crescendo_userid']);
$login = new Login();
$user_data = $login->check_login($_SESSION['crescendo_userid']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crescendo | Timeline</title>
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

            <!---friends area-->
            <div style="background-color:white; min-height: 400px; flex: 1;">

                <div id="friends_bar">
                <img style="margin-bottom:-170px;" src="noprofile.jpg.png" id="profile_pic">
                <br><br><br><br><br><br><br><br><br>
                <a href="profile.php" style="text-decoration:none;">
                <?php echo $user_data['first_name'] . "<br>" . $user_data['last_name'] ?>
                </a>
                </div>
            </div>

            <!---posts area-->
            <div style="background-color:gray;  min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">

                <div style="background-color: white; border: black thin solid ; padding: 10px;">
                    <textarea placeholder="whats on your mind?"></textarea>
                    <input type="submit" id="post_button" value="Post">
                    <br> <br>
                </div>

                <!---posts-->
                <div id="post_bar">
                    <!---post1 -->
                    <div id="post">
                        <div>
                            <img src="noprofile.jpg.png" style="width: 65px; margin-right: 6px;">
                        </div>
                        <div>
                            <div style="font-weight: bold; color:rgb(24, 26, 24);">First Person</div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi,
                            recusandae consequatur provident, unde temporibus a omnis ducimus
                            excepturi doloribus velit quidem eligendi cum ab laboriosam labore
                            commodi, ipsa ipsum. Nulla.
                            <br><br>
                            <a href="">Like</a> . <a href=""> Comment</a> . <span
                                style="color: rgb(160, 160, 161);">August 13 2022</span>

                        </div>
                    </div>

                     <!---post2 -->
                     <div id="post">
                        <div>
                            <img src="noprofile.jpg.png" style="width: 65px; margin-right: 6px;">
                        </div>
                        <div>
                            <div style="font-weight: bold; color:rgb(24, 26, 24);">Sec Person</div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi,
                            recusandae consequatur provident, unde temporibus a omnis ducimus
                            excepturi doloribus velit quidem eligendi cum ab laboriosam labore
                            commodi, ipsa ipsum. Nulla.
                            <br><br>
                            <a href="">Like</a> . <a href=""> Comment</a> . <span
                                style="color: rgb(160, 160, 161);">August 13 2022</span>

                        </div>
                    </div>
                     <!---post3 -->
                     <div id="post">
                        <div>
                            <img src="noprofile.jpg.png" style="width: 65px; margin-right: 6px;">
                        </div>
                        <div>
                            <div style="font-weight: bold; color:rgb(24, 26, 24);">third Person</div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi,
                            recusandae consequatur provident, unde temporibus a omnis ducimus
                            excepturi doloribus velit quidem eligendi cum ab laboriosam labore
                            commodi, ipsa ipsum. Nulla.
                            <br><br>
                            <a href="">Like</a> . <a href=""> Comment</a> . <span
                                style="color: rgb(160, 160, 161);">August 13 2022</span>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>

</html>