<?php
  include("connection.php");

  // PHP function to delete file
  $path = "file/";
  $id = $_GET['id'];

  // hapus data dari table
  $query = "DELETE from file_list WHERE id=$id";
  $result = mysqli_query($link, $query);

  if($query) {
    // hapus data dari direktori
    unlink($path.$_GET['filename']);
    header("Location: index.php");
  } else {
    die("Gagal Menghapus Data");
  }
?>