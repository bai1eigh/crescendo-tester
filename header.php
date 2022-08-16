 <?php
 $corner_image = "additional images/noprofile.jpg.png";
 if(isset($user_data)){
    $image_class = new Image();
    $corner_image = $image_class->get_thumb_profile($user_data['profile_image']);
 }
 
 
 ?>
 
 <!---nav bar-->
 <div id="dark_bar">
        <div id="crescendoLogo">
            <a href="index.php" style="text-decoration: none; color: white;">Crescendo</a>
             &nbsp; &nbsp; <input type="text" id="search_box" placeholder="search">
             
             <a href="profile.php">
            <img id="noProfile" src="<?php echo $corner_image?>">
        </a>
           <a href="logout.php">
            <span style="font-size:12px; color: white; float: right; margin: 20px;">Logout</span>
       </a> 
    </div>
    </div>