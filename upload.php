<?php


if(($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['file']))){

	$name = uploadImage($_POST['file']);
	echo $name;

}

// Upload image  
function uploadImage($file){
	$image_parts = explode(";base64,", $file);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $name = uniqid() . '.png';
    $file = 'image/' . $name;
    file_put_contents($file, $image_base64);
    return $name;
}


