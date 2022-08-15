<?php
class Image
{
	public function crop_image($original_file_name, $cropped_file_name, $max_width, $max_height)
	{
		if(file_exists($original_file_name)){
	$original_image = imagecreatefromjpeg($original_file_name);

	$original_width = imagesx($original_image);
	$original_height = imagesy($original_image);

	if($original_height > $original_width){

		//make width equal to the max width
	} else {

	}
		}
		imagecopyresampled($new_cropped_image, $new_image, 0, 0, $x, $y, $max_width, $max_height, $max_width, $max_height);
		
	}

}
?>