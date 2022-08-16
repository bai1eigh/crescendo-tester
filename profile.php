<?php 
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");

//isset($_SESSION['crescendo_userid']);
$login = new Login();
$user_data = $login->check_login($_SESSION['crescendo_userid']);
//posting starts here
if($_SERVER['REQUEST_METHOD']== "POST"){
    
    $post = new Post();
    $id = $_SESSION['crescendo_userid'];
    $result = $post->create_post($id, $_POST);

    if($result=="empty"){
        header("Location: profile.php");
        die;
    }else {
        echo "<div style='left:300px; font-size: 15px;color: red; background-color:transparent; opacity:.8 ;z-index: 100; position: absolute;'>";
        echo "<br>The following errors occured<br><br>";
        echo $result;
        echo "</div>";
    }
}

//collect posts
$post = new Post();
$id = $_SESSION['crescendo_userid'];

$posts = $post->get_posts($id);

//collect friends 
$user = new User();
$id = $_SESSION['crescendo_userid'];

$friends = $user->get_friends($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crescendo | Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <?php 
   include ("header.php");
   ?>

    <!---cover area-->
    <div id="profileHeader">
        <div id="profileHeader2"> 
            <?php 
            $image = "additional images/nobgimage.jpg";
            if(file_exists($user_data['cover_image'])){
               $image = $user_data['cover_image'];
            }
        ?>
          <img id="coverImage" src="<?php echo $image?>?">

           
       

         <?php 
            $image = "additional images/noprofile.jpg.png";
            if(file_exists($user_data['profile_image'])){
               $image = $user_data['profile_image'];
            }
         ?>

          <span style="font-size:12px;">
                <img id="profile_pic" src="<?php echo $image?>"><br />
                <a style="color: rgb(67, 67, 231); text-decoration: none;" href="change_profile_image.php?change=profile"> Change Profile
                    Image</a> |
                    <a style="color: rgb(67, 67, 231); text-decoration: none;" href="change_profile_image.php?change=cover"> Change
                    Cover</a>
            </span>

            <br>
            <div style="font-size: 20px;">
                <?php echo $user_data['first_name'] . " " . $user_data['last_name'] ?>
            </div>
            <br>
            <a style="text-decoration: none;" href="index.php">
                <div id="menu_buttons"> Timeline</div>
            </a>
            <a style="text-decoration: none;" href="">
                <div id="menu_buttons"> About</div>
            </a>
            <a style="text-decoration: none;"  href="">
                <div id="menu_buttons"> Friends </div>
            </a>
            <a style="text-decoration: none;" href="">
                <div id="menu_buttons"> Playlists </div>
            </a>
            <!--was photos--->
            <a href="">
                <div id="menu_buttons"> Settings </div>
            </a>

        </div>
        <!---boxes-->
        <div style="display: flex;">

            <!---friends area-->
            <div style="background-color:white; min-height: 400px; flex: 1;">

                <div id="friends_bar">Friends<br>

                    <?php
                if($friends){
                     foreach($friends as $FRIEND_ROW){
                       include("user.php");
                 }
                }

                 ?>
                </div>
            </div>

            <!---posts area-->
            <div style="background-color:gray;  min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">

                <div style="background-color: white; border: black thin solid ; padding: 10px;">
                    <form method="post">
                        <textarea name="post" placeholder="whats on your mind?"></textarea>
                        <button style="background-color: rgb(18, 160, 73); float: right; border: thin;"> <input
                                type="submit" id="post_button" value="Post"></button>
                        <br> <br>
                    </form>
                </div>

                <!---posts-->
                <div id="post_bar">

                    <?php
                if($posts){
                     foreach($posts as $ROW){
                       $user = new User();
                       $ROW_USER = $user->get_user($ROW['userid']);

                       include("post.php");
                 }
                }

                 ?>

                </div>
            </div>
        </div>

    </div>

</body>

</html>