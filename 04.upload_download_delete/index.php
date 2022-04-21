<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <h1>Data File</h1>
  <p><a href="upload.php">Tambah Data</a></p>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Tanggal</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include("connection.php");

      $query = "SELECT * FROM file_list ORDER BY id DESC";
      $result = mysqli_query($link, $query);

      if (!$result) {
        die ("Query Error: ".mysqli_errno($link)." - ".mysqli_error($link));
      }
      
      $i = 1;
      while($data=mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$i++."</td>";
        echo "<td>$data[filename]</td>";
        echo "<td>$data[description]</td>";
        echo "<td>$data[date]</td>";
        echo "<td><a href=\"download.php?filename=$data[filename]\">Download</td>";
        echo "<td><a href=\"delete.php?id=$data[id]&filename=$data[filename]\">Delete</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>

