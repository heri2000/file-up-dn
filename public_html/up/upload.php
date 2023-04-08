<?php
$target_dir = "../dn/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
if (file_exists($target_file)) {
  echo "File already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 26214400) {
  echo "Your file is > 20 MiB.";
  $uploadOk = 0;
}

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $arr = explode('/', $_SERVER['PHP_SELF'], 10);
    $count = count($arr);
    $dir = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
    for ($i=0; $i < $count-2; $i++) {
      $dir .= (endsWith($dir, '/') ? '' : '/') . $arr[$i];
    }

    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
    $url = $dir . '/dn/' . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    echo 'URL: <a href="' . $url . '">' . $url . '</a>';
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

function endsWith( $haystack, $needle ) {
  $length = strlen( $needle );
  if( !$length ) {
      return true;
  }
  return substr( $haystack, -$length ) === $needle;
}
?>