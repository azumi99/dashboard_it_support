<?php
require 'function.php';
require 'ceklog.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard | UDAYA</title>
    <link rel="shortcut icon" href="../assets/img/head/logo-udaya.png" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>


<body class="sb-nav-fixed">


    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard" style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><img style="width: 50px; margin-top:6px;" src="../assets/img/head/logo-udaya.png" alt=""> udaya.id
        </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php
                        $tampilangambar = $_SESSION{
                            'image_fa'};
                        $tampilannama = $_SESSION{
                            'nama_finance'};
                        ?>
                        <h3 class="sb-sidenav-menu-heading" style="margin-left: 20px;">Welcome <?= $tampilannama; ?></h3>
                        <div style="border:2px;width: 80px; border-radius:50%; height:80px; margin-left:60px; background: url('<?= "../assets/img/user/finance/$tampilangambar"; ?>') center center; background-size:80px; background-repeat:no-repeat;" class="shadow-lg"></div>
                        <br />
                        <a class="nav-link" href="dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="kb">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Kas Bon
                        </a>
                        <a class="nav-link" href="tb">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Tutup Bon
                        </a>
                        <a class="nav-link" href="tbl">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Tutup Bon Langsung
                        </a>
                        <a class="nav-link" href="logout">
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
                    <div class="text-center">
                        <div id="loading" class="spinner-border" role="status"></div>
                    </div>
                    <h1 class="mt-4">Dashboard</h1>
                    <div class="card border-0 shadow p-3 mb-2 rounded mb-2">
                        <div class="card-header border-0 shadow p-3 mb-3 rounded mb-3">
                            <i class="fas fa-chart-pie"></i> Status
                        </div>
                        <div class="card-body">
                            <?php
                            $session = $_SESSION{
                                'id_company'};

                            $count1 = mysqli_query($conn, "select * from kb WHERE status_terima='belum' AND kb.id_company='$session'");
                            $count2 = mysqli_query($conn, "select * from kb WHERE status_tfkb='belum' AND kb.id_company='$session'");
                            $count3 = mysqli_query($conn, "select * from tb LEFT JOIN kb on tb.id_kb=kb.id_kb WHERE status_trmtb='belum' AND kb.id_company='$session'");
                            $count4 = mysqli_query($conn, "select * from tbl WHERE status_trmtbl='belum' AND tbl.id_company='$session'");
                            $count5 = mysqli_query($conn, "select * from tbl WHERE status_trftbl='belum' AND tbl.id_company='$session'");

                            $hitung1 = mysqli_num_rows($count1);
                            $hitung2 = mysqli_num_rows($count2);
                            $hitung3 = mysqli_num_rows($count3);
                            $hitung4 = mysqli_num_rows($count4);
                            $hitung5 = mysqli_num_rows($count5);


                            ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-light text-info border-0 shadow p-3 mb-5 rounded mb-4">
                                        <div class="card-body">
                                            <h1><i class="far fa-bookmark"></i> <b class="float-right"><?= $hitung1; ?></b></h1>
                                        </div>
                                        <div>
                                            KB Belum Diterima
                                            <a href="kb" class="btn btn-info btn-sm">more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light text-info border-0 shadow p-3 mb-5 rounded mb-4">
                                        <div class="card-body">
                                            <h1><i class="fas fa-exchange-alt"></i> <b class="float-right"><?= $hitung2; ?></b></h1>
                                        </div>
                                        <div>
                                            KB Belum Transfer
                                            <a href="kb" class="btn btn-info btn-sm">more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light text-info border-0 shadow p-3 mb-5 rounded mb-4">
                                        <div class="card-body">
                                            <h1><i class="far fa-bookmark"></i> <b class="float-right"><?= $hitung3; ?></b></h1>
                                        </div>
                                        <div>
                                            TB Belum Diterima
                                            <a href="tb" class="btn btn-info btn-sm">more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light text-info border-0 shadow p-3 mb-5 rounded mb-4">
                                        <div class="card-body">
                                            <h1><i class="fas fa-exchange-alt"></i> <b class="float-right"><?= $hitung5; ?></b></h1>
                                        </div>
                                        <div>
                                            TBL Belum Transfer
                                            <a href="tbl" class="btn btn-info btn-sm">more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light text-info border-0 shadow p-3 mb-5 rounded mb-4">
                                        <div class="card-body">
                                            <h1><i class="far fa-bookmark"></i> <b class="float-right"><?= $hitung4; ?></b></h1>
                                        </div>
                                        <div>
                                            TBL Belum Diterima
                                            <a href="tbl" class="btn btn-info btn-sm">more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
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
    <script>
        var loading = document.getElementById('loading');
        window.addEventListener('load', function() {
            loading.style.display = "none";
        });
    </script>
</body>

</html>