<?php 

include_once("../database/config.php");

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

	echo "<pre>";
	    print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name']; //Image Upload Name
	$img_size = $_FILES['my_image']['size']; //Image Upload Size
	$tmp_name = $_FILES['my_image']['tmp_name']; //Image Upload FileName
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
            echo "<alert>$em</alert>";
		    header("Location: ../index.php");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO image_path(details_id,folder_path) 
				        VALUES(1,'$new_img_name')";
				mysqli_query($mysqli, $sql);
				header("Location: imageView.php");
			}else {
				$em = "You can't upload files of this type";
                echo "<alert>$em</alert>";
		        header("Location: ../index.php");
			}
		}
	}else {
		$em = "unknown error occurred!";
        echo "<alert>$em</alert>";
		header("Location: ../index.php");
	}

}else {
	header("Location: index.php");
}