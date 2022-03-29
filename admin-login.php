<?php
@session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body class="bg-dark">
  <div class="container">
    <div class="d-flex text-white justify-content-center align-items-center vh-100">
      <form action="backend/admin-login.php" method="post">
        <h3>Admin Login</h3>
        <?php
        if(isset($_SESSION['loginErrors']))
        {
        ?>
        <div class="alert alert-danger my-2"><?php echo $_SESSION['loginErrors']; ?></div>
        <?php
        unset($_SESSION['loginErrors']);
        }
        ?>
        <div class="mb-3">
          <label for="adminusername" class="form-label">Email address</label>
          <input type="text" class="form-control" id="adminusername" aria-describedby="emailHelp"
            name="adminUsername" />
          <div id="emailHelp" class="form-text">
            We'll never share your email with anyone else.
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="adminPassword" />
        </div>

        <button type="submit" class="btn btn-primary" name="loginBtn" value="submit">Submit</button>
      </form>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>