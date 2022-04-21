<?php
  if (isset($_POST["upload"])) {
    $error = $_FILES["fupload"]["error"];

    if ($error === 0){
      $error_message = "";

      $folder_name  = "file";
      $tmp          = $_FILES["fupload"]["tmp_name"];
      $filename     = $_FILES["fupload"]["name"];
      $path_file    = "$folder_name/$filename";
      $description  = $_POST["desc"];
      $date         = date("Ymd");
      $fail = false;

      if (file_exists($path_file)) {
        $error_message  = "File dengan nama sama sudah ada<br>";
        $fail = true;
      }

      $file_size = $_FILES["fupload"]["size"];
      if ($file_size > 2000000) {
        $error_message .= "Ukuran file melebihi 700KB<br>";
        $fail = true;
      }

      include("connection.php");

      $query = "INSERT INTO file_list(filename, description, date) VALUES";
      $query .= "('$filename', '$description', '$date')";

      $result = mysqli_query($link, $query);

      if (!$result) {
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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Upload</title>
  <style>
    table {
      border: none;
      max-width: 600px;
    }
    table td {
      padding: 20px;
    }
    table td:nth-child(1) {
      width: 250px;
    }
  </style>
</head>
<body>
  <form action="<?php echo $_SERVER["REQUEST_URI"];  ?>" method="post" enctype="multipart/form-data">
    <h1>Upload File</h1>
    <?php 
      if (!empty($error_message)) {
        echo "<p style=\"color: red\">$error_message</p>";
      } 
      if (!empty($message)) {
        echo "<p style=\"color: green\">$message</p>";
      } 
    ?>
    <table>
      <tr>
        <td>File</td>
        <td><input type="file" name="fupload" required></td>
      </tr>
      <tr>
        <td>Deskripsi File</td>
        <td><textarea name="desc" cols="50" rows="5" required></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="upload" value="Upload">
          <input type="reset" name="cancel" value="Batal">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>