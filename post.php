<div id="post">
   <div>
    <?php
    $image = "image/generic-profile-icon-6.jpg";
 
    //checking if user has a profile image
    if(file_exists($ROW_USER['profile_image'])){
      $image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
    }
    
    ?>
       <img src="<?php echo $image ?>" style="width: 65px; margin-right: 6px; border-radius:50%;">
   </div>
   <div style="width:100%;">
       <div style="font-weight: bold; color:rgb(24, 26, 24);">
       <?php
        echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']; 

       if($ROW['is_profile_image'])
       {
        echo "<span style='font-weight:normal; color:green;'> updated profile image </span>";
       }
       
       if($ROW['is_cover_image'])
       {
        echo "<span style='font-weight:normal; color:green;'> updated cover image </span>";
       }
       ?>
      </div>

      <?php echo $ROW['post']?>
      <br><br>
      <!--creates image, it will actully show up on page-->
      <?php 
      if(file_exists($ROW['image'])){

        $post_image = $image_class->get_thumb_post($ROW['image']);

        echo "<img src='$post_image'  style='width:50%;'/>";
      } 
     
      ?>
       <br><br>
       <a href="">Like</a> . <a href=""> Comment</a> . <span style="color: rgb(160, 160, 161); ">
        <?php echo $ROW['dates']?></span>
         <span style= " color: rgb(160, 160, 161); float:right;">Edit . Delete . </span>

   </div>
</div>











