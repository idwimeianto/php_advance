<?php
  // redirect to index.php if user has logged
  if(isset($_COOKIE["username"])) {
    header("location: index.php");
  }

  if (isset($_POST["submit"])) {
    include("user_and_pass.php");

    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    $error_message = "";

    if (empty($username)) {
      $error_message .= "Username belum diisi <br>";
    }

    if (empty($password)) {
      $error_message .= "Password belum diisi <br>";
    }

    if (!empty($username) && !empty($password)) {
      if ($username != $user_registered || sha1($password) != $pass_registered) {
        $error_message = "Username atau Password tidak sesuai";
      }
    }

    if ($error_message === "") {
      setcookie("username","admin");
      setcookie("name","Imam Firdaus Dwimeianto");
      header("Location: index.php");
    }
  }

  if (isset($_GET["message_error"])) {
    $error_message = $_GET["message_error"];
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Login Dengan Cookie</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-light">
  <div class="container my-5 pt-4 pb-5 px-5 rounded bg-white" style="max-width:500px">
    <h1 class="text-center mb-4">Login Page</h1>
    <?php
      if (isset($error_message) && $error_message !== "") {
          echo "<div class=\"alert alert-danger\">$error_message</div>";
      }
    ?>
    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
      <div class="mb-3"">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control"
          value="<?php echo isset($username) ? $username : ""?>">
      </div>
      <div class="mb-3"">
        <label for="password" class="form-label">Password : </label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <input type="submit" name="submit" value="Login" class="w-100 btn btn-primary">
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
