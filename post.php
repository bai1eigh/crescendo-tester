<div id="post">
   <div>
    <?php
    $image = "image/generic-profile-icon-6.jpg";
    ?>
       <img src="<?php echo $image ?>" style="width: 65px; margin-right: 6px;">
   </div>
   <div>
       <div style="font-weight: bold; color:rgb(24, 26, 24);"><?php echo $ROW_USER['first_name'] . " " . $ROW_USER['last_name']; ?></div>
      <?php echo $ROW['post']?>
       <br><br>
       <a href="">Like</a> . <a href=""> Comment</a> . <span style="color: rgb(160, 160, 161);"> <?php echo $ROW['dates']?></span>

   </div>
</div>











