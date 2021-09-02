<?php
require 'function.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $cekdata = mysqli_query($conn, "SELECT * FROM login_fa where email_finance='$email' and pass_finance='$password'");
  $get = mysqli_fetch_assoc($cekdata);


  $hitung = mysqli_num_rows($cekdata);

  if ($hitung > 0) {

    $data = [
      $_SESSION['loglog'] = 'True',
      $_SESSION['id_finance'] = $get['id_finance'],
      $_SESSION['nama_finance'] = $get['nama_finance'],
      $_SESSION['email_finance'] = $get['email_finance'],
      $_SESSION['id_company'] = $get['id_company'],
      $_SESSION['image_fa'] = $get['image_fa'],
    ];
    // print_r($data);
    // die;
    header('location:dashboard');
  } else {
    header('location:login');
  };
};


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-6">
            <img src="../assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="../assets/images/logo-udaya.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">
                Sign into <span>finance</span> account
              </p>
              <form method="post">
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                </div>
                <button class="btn btn-block login-btn mb-4" name="login">Login</button>
              </form>
              <div class="card-title">
                <a href="finance"><span>finance</span></a>
                <a href="login"><span>it support</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>