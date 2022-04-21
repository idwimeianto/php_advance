<?php
  if (isset($_POST["submit"])) {
    // check if there's any error or not
    $error = $_FILES["fupload"]["error"];

    if ($error === 0){
      $error_message = "";

      $folder_name  = "file";
      $tmp          = $_FILES["fupload"]["tmp_name"];
      $filename    = $_FILES["fupload"]["name"];
      $path_file    = "$folder_name/$filename";
      $fail = false;

      if (file_exists($path_file)) {
        $error_message  = "File dengan nama sama sudah ada<br>";
        $fail = true;
      }

      $file_size = $_FILES["fupload"]["size"];
      if ($file_size > 716800) {
        $error_message .= "Ukuran file melebihi 700KB<br>";
        $fail = true;
      }

      $check = getimagesize($_FILES["fupload"]["tmp_name"]);
      if ($check === false) {
        $error_message .= "Mohon upload file gambar (gif, png, jpg)<br>";
        $fail = true;
      }

      if (!$fail AND move_uploaded_file($tmp,$path_file)) {
        $message = "File sukses di upload";
      }
      else {
        $error_message = "File gagal di upload";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>File Upload</title>
</head>
<body>
  <h1>Upload File</h1>
  <?php 
    if (!empty($error_message)) {
      echo "<p style=\"color: red\">$error_message</p>";
    } 
    if (!empty($message)) {
      echo "<p style=\"color: green\">$message</p>";
    } 
  ?>
  <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post" enctype="multipart/form-data">
    <p>Upload Gambar:
      <input type="file" name="fupload" accept="image/*">
    </p>
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
