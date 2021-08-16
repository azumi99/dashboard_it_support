<?php
require 'function.php';
require 'cek.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="assets/img/head/logo-udaya.png" />
    <title>Dashboard | UDAYA </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img style="width: 200px; margin-left:-15px; margin-top:6px;" src="assets/img/head/udayaforheader.PNG" alt=""> </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php
                        $tampilannama = $_SESSION{
                            'nama'};
                        $tampilangambar = $_SESSION{
                            'image'};
                        ?>
                        <div>
                            <h3 class="sb-sidenav-menu-heading" style="margin-left: 15px;">Welcome <?= $tampilannama; ?></h3>
                            <div style="width: 80px; border-radius:50%; height:80px; margin-left:50px; background: url('<?= "assets/img/user/$tampilangambar"; ?>') center center; background-size:80px; background-repeat:no-repeat;"></div>
                        </div>

                        <br />
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="kb.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Kas Bon
                        </a>
                        <a class="nav-link" href="tb.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Tutup Bon
                        </a>
                        <a class="nav-link" href="tbl.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Tutup Bon Langsung
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <div class="card ">
                        <div class="card-header">
                            <i class="fas fa-chart-pie"></i> Status
                        </div>
                        <div class="card-body">
                            <?php
                            $count1 = mysqli_query($conn, 'select * from kb WHERE status_terima="belum";');
                            $count2 = mysqli_query($conn, 'select * from kb WHERE status_tfkb="belum";');
                            $count3 = mysqli_query($conn, 'select * from tb WHERE status_trmtb="belum";');
                            $count4 = mysqli_query($conn, 'select * from tbl WHERE status_trmtbl="belum";');
                            $count5 = mysqli_query($conn, 'select * from tbl WHERE status_trftbl="belum";');

                            $hitungkb1 = mysqli_num_rows($count1);
                            $hitungkb2 = mysqli_num_rows($count2);
                            $hitungtb3 = mysqli_num_rows($count3);
                            $hitungtbl4 = mysqli_num_rows($count4);
                            $hitungtbl5 = mysqli_num_rows($count5);


                            ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-header">
                                            KB Belum Diterima
                                        </div>
                                        <div class="card-body">
                                            <h1><?= $hitungkb1; ?> <i class="far fa-bookmark float-right"></i></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-header">
                                            KB Belum Transfer
                                        </div>
                                        <div class="card-body">
                                            <h1><?= $hitungkb2; ?> <i class="fas fa-exchange-alt float-right opacity-50"></i></h1>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-header">
                                            TB Belum Diterima
                                        </div>
                                        <div class="card-body">
                                            <h1><?= $hitungtb3; ?> <i class="far fa-bookmark float-right"></i></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-header">
                                            TBL Belum Transfer
                                        </div>
                                        <div class="card-body">
                                            <h1><?= $hitungtbl5; ?> <i class="fas fa-exchange-alt float-right"></i></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-info text-white mb-4">
                                        <div class="card-header">
                                            TBL Belum Diterima
                                        </div>
                                        <div class="card-body">
                                            <h1><?= $hitungtbl4; ?> <i class="far fa-bookmark float-right"></i></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- bagian add account -->
                    <div class="card ">
                        <div class="card-header">
                            <i class="far fa-user-circle "></i> Add Account
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-6">
                                    <div class="card">
                                        <a class="btn btn-primary btn-lx" data-toggle="collapse" href="#itsupport" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Add Account It Support
                                        </a>
                                        <div class="collapse" id="itsupport">
                                            <div class="card card-body">
                                                <form method="POST" enctype="multipart/form-data">
                                                    <label for="">Nama</label>
                                                    <input type="text" name="nama" autocomplete="off" class="form-control" required>
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" autocomplete="off" class="form-control" required>
                                                    <label for="">Password</label>
                                                    <input type="text" name="password" autocomplete="off" class="form-control" required>
                                                    <label for="">Foto</label>
                                                    <input type="file" class="form-control" name="foto">
                                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                        <button type="submit" class="btn btn-primary" name="submit_its">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div class="card">
                                        <a class="btn btn-primary btn-lx" data-toggle="collapse" href="#finance" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Add Account Finance
                                        </a>
                                        <div class="collapse" id="finance">
                                            <div class="card card-body">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <label for="">Nama</label>
                                                    <input type="text" name="namafinance" autocomplete="off" class="form-control" required>
                                                    <label for="">Email</label>
                                                    <input type="email" name="emailfinance" autocomplete="off" class="form-control" required>
                                                    <label for="">Company</label>
                                                    <select name="companyfinance" class="form-control">
                                                        <option selected></option>
                                                        <?php
                                                        $tampilancompany = mysqli_query($conn, "select * from company");
                                                        while ($fetcharray = mysqli_fetch_array($tampilancompany)) {
                                                            $nama_company = $fetcharray['company_name'];
                                                            $id_compa = $fetcharray['id_company'];
                                                        ?>
                                                            <option value="<?= $id_compa; ?>"><?= $nama_company; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="">Password</label>
                                                    <input type="text" name="passwordfinance" autocomplete="off" class="form-control">
                                                    <label for="">Foto</label>
                                                    <input type="file" name="foto_fa" class="form-control">
                                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                        <button class="btn btn-primary" name="submitfinance">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <!-- bagian table -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Login IT Support View
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Foto</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $tampilanlogin = mysqli_query($conn, "select * from login");
                                                        while ($data = mysqli_fetch_array($tampilanlogin)) {
                                                            $name = $data['nama'];
                                                            $email = $data['email'];
                                                            $gambarlg = $data['image'];
                                                            $pass = $data['password'];
                                                            $idlogin = $data['id_login'];
                                                            $img = '<img style="width:50px;" src="assets/img/user/' . $gambarlg . '" >';

                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $name; ?></td>
                                                                <td><?= $email; ?></td>
                                                                <td><?= $img; ?></td>
                                                                <td>
                                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateitsupport<?= $idlogin; ?>"><i class="fas fa-edit"></i></button>
                                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteitsupport<?= $idlogin; ?>"><i class="fas fa-trash-alt"></i></button>
                                                                </td>
                                                            </tr>
                                                            <!-- modal update add account it support -->
                                                            <div class="modal fade" id="updateitsupport<?= $idlogin; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Login IT Support</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <dic class="modal-body">
                                                                                <label for="">Nama</label>
                                                                                <input value="<?= $name; ?>" type="text" name="nama_itupdate" autocomplete="off" class="form-control">
                                                                                <label for="">Email</label>
                                                                                <input value="<?= $email; ?>" type="email" name="email_itupdate" autocomplete="off" class="form-control">
                                                                                <label for="">Password</label>
                                                                                <input value="<?= $pass; ?>" type="password" name="password_itupdate" autocomplete="off" class="form-control">
                                                                                <label for="">Foto</label>
                                                                                <input type="file" class="form-control" name="foto_itupdate">
                                                                                <input type="hidden" value="<?= $idlogin; ?>" name="idlogin">
                                                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                                                    <button type="submit" class="btn btn-warning" name="update_its">Update</button>
                                                                                </div>
                                                                            </dic>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal delete ad account it support -->
                                                            <div class="modal fade" id="deleteitsupport<?= $idlogin; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Login IT Support</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <dic class="modal-body">
                                                                                <input value="<?= $name; ?>" type="text" name="nama" autocomplete="off" class="form-control" readonly>
                                                                                <br />
                                                                                <input value="<?= $email; ?>" type="email" name="email" autocomplete="off" class="form-control" readonly>
                                                                                <br />
                                                                                <p>Kamu mau hapus user ini?</p>
                                                                                <input type="hidden" value="<?= $idlogin; ?>" name="idlog">
                                                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                                                    <button type="submit" class="btn btn-danger" name="delete_its">Delete</button>
                                                                                </div>
                                                                            </dic>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Login Finance View
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Company</th>
                                                            <th>Foto</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $tampilanlogin_fa = mysqli_query($conn, "select * from login_fa left join company on login_fa.id_company=company.id_company ");
                                                        while ($data = mysqli_fetch_array($tampilanlogin_fa)) {
                                                            $name_fa = $data['nama_finance'];
                                                            $email_fa = $data['email_finance'];
                                                            $companynama = $data['company_name'];
                                                            $companyid = $data['id_company'];
                                                            $passfa = $data['pass_finance'];
                                                            $image_fa = $data['image_fa'];
                                                            $id_fa = $data['id_finance'];

                                                            $img = '<img style="width:50px;" src="assets/img/user/finance/' . $image_fa . '" >';

                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $name_fa; ?></td>
                                                                <td><?= $email_fa; ?></td>
                                                                <td><?= $companynama; ?></td>
                                                                <td><?= $img; ?></td>
                                                                <td>
                                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatefinanceuser<?= $companyid; ?>"><i class="fas fa-edit"></i></button>
                                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletefinanceuser<?= $companyid; ?>"><i class="fas fa-trash-alt"></i></button>
                                                                </td>
                                                            </tr>
                                                            <!-- modal update finance -->
                                                            <div class="modal fade" id="updatefinanceuser<?= $companyid; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Login Finance</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <dic class="modal-body">
                                                                                <label for="">Nama</label>
                                                                                <input value="<?= $name_fa; ?>" type="text" name="namafaupdate" autocomplete="off" class="form-control">
                                                                                <label for="">Email</label>
                                                                                <input value="<?= $email_fa; ?>" type="email" name="emailfaupdate" autocomplete="off" class="form-control">
                                                                                <label for="">Company</label>
                                                                                <select name="companyfaupdate" class="form-control">
                                                                                    <option value="<?= $companyid; ?>" selected><?= $companynama; ?></option>
                                                                                    <?php
                                                                                    $tampilancompany = mysqli_query($conn, "select * from company");
                                                                                    while ($fetcharray = mysqli_fetch_array($tampilancompany)) {
                                                                                        $nama = $fetcharray['company_name'];
                                                                                        $id_company = $fetcharray['id_company'];
                                                                                    ?>
                                                                                        <option value="<?= $id_company; ?>"><?= $nama; ?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                                <label for="">Password</label>
                                                                                <input value="<?= $passfa; ?>" type="password" name="passwordfaupdate" autocomplete="off" class="form-control">
                                                                                <label for="">Foto</label>
                                                                                <input type="file" class="form-control" name="fotofaupdate">
                                                                                <input type="hidden" name="idlogin_fa" value="<?= $id_fa; ?>">
                                                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                                                    <button type="submit" class="btn btn-warning" name="faupdate">Update</button>
                                                                                </div>
                                                                            </dic>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal delete finance -->
                                                            <div class="modal fade" id="deletefinanceuser<?= $companyid; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Login Finance</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST" enctype="multipart/form-data">
                                                                            <dic class="modal-body">
                                                                                <input value="<?= $name_fa; ?>" type="text" name="nama" autocomplete="off" class="form-control" readonly>
                                                                                <br />
                                                                                <input value="<?= $email_fa; ?>" type="email" name="email" autocomplete="off" class="form-control" readonly>
                                                                                <br />
                                                                                <p>Kamu mau hapus user ini?</p>
                                                                                <input type="hidden" name="id_fa" value="<?= $id_fa; ?>">
                                                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                                                    <button type="submit" class="btn btn-danger" name="deletefa">Delete</button>
                                                                                </div>
                                                                            </dic>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <!-- bagian add company -->
                    <div class="card ">
                        <div class="card-header">
                            <i class="far fa-building"></i> Add Company
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-6">
                                    <div class="card">
                                        <a class="btn btn-primary btn-lx" data-toggle="collapse" href="#addcompany" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Add Company
                                        </a>
                                        <div class="collapse" id="addcompany">
                                            <div class="card card-body">
                                                <form method="POST">
                                                    <label for="">Nama Company</label>
                                                    <input type="text" name="companynama" autocomplete="off" class="form-control">
                                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                        <button type="submit" class="btn btn-primary" name="submit_compa">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Company Name View
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Company</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $tampilancomapny = mysqli_query($conn, "select * from company");
                                                        while ($data = mysqli_fetch_array($tampilancomapny)) {
                                                            $companyname = $data['company_name'];
                                                            $idcompany = $data['id_company'];

                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><?= $companyname; ?></td>
                                                                <td>
                                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatecompany<?= $idcompany; ?>"><i class="fas fa-edit"></i></button>
                                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletecompany<?= $idcompany; ?>"><i class="fas fa-trash-alt"></i></button>
                                                                </td>
                                                            </tr>
                                                            <!-- modal update add company -->
                                                            <div class="modal fade" id="updatecompany<?= $idcompany; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST">
                                                                            <dic class="modal-body">
                                                                                <label for="">Company</label>
                                                                                <input value="<?= $companyname; ?>" type="text" name="companyupdate" autocomplete="off" class="form-control">
                                                                                <input type="hidden" value="<?= $idcompany; ?>" name="idcompany">
                                                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                                                    <button type="submit" class="btn btn-warning" name="updatecompany">Update</button>
                                                                                </div>
                                                                            </dic>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal delete add company -->
                                                            <div class="modal fade" id="deletecompany<?= $idcompany; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form method="POST">
                                                                            <dic class="modal-body">
                                                                                <label for="">Company</label>
                                                                                <input value="<?= $companyname; ?>" type="text" name="nama" autocomplete="off" class="form-control" readonly>
                                                                                <br />
                                                                                <p>Kamu mau hapus company ini?</p>
                                                                                <input type="hidden" value="<?= $idcompany; ?>" name="idcompanydelete">
                                                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                                                    <button type="submit" class="btn btn-danger" name="deletecompany">Delete</button>
                                                                                </div>
                                                                            </dic>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; IT Support Palem | 2021</div>
                        <div>
                            <a>Develop by</a>
                            <a style="text-decoration:none;" href="https://www.anandanesia.com/" target="_blank">Ilham Tegar</a>
                            &middot;
                            <a style="text-decoration:none;" href="#">Admathir</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>