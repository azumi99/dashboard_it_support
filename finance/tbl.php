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
    <title>Tutup Bon Langsung | UDAYA </title>
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
                    <h1 class="mt-4">Tutup Bon Langsung</h1>
                    <div class="card border-0 shadow p-3 mb-5 rounded mb-4">
                        <div class="card-header border-0 shadow p-3 mb-2 rounded mb-4">
                            <!-- Button trigger modal -->
                            <form method="POST">
                                <table class="float-right">
                                    <tr>

                                        <td><b style="margin-left: 15px;">Month</b></td>
                                        <td>
                                            <select name="date" id="" class="form-control">
                                                <option value="0"></option>
                                                <option value="01">Januari</option>
                                                <option value="02">Febuari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">July</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </td>
                                        <td><button type="submit" name="monthsubmit" class="btn btn-info ">Go</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="orderdesc" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Company</th>
                                            <th>Nominal</th>
                                            <th>To</th>
                                            <th>Recive</th>
                                            <th>Transfer</th>
                                            <th>Evidence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function Rupiah($angka)
                                        {
                                            $hasil = "Rp " . number_format($angka, 2, ',', '.');
                                            return $hasil;
                                        }
                                        $sesion = $_SESSION{
                                            'id_company'};

                                        if (isset($_POST['monthsubmit'])) {
                                            $for_date = mysqli_real_escape_string($conn, $_POST['date']);
                                            $tampilantbl = mysqli_query($conn, "select * from tbl left join login on tbl.id_login=login.id_login left join company on tbl.id_company=company.id_company where tbl.id_company='$sesion' and month(tanggal_tbl)=$for_date order by tanggal_tbl");
                                        } else {
                                            $tampilantbl = mysqli_query($conn, "select * from tbl left join login on tbl.id_login=login.id_login left join company on tbl.id_company=company.id_company where tbl.id_company='$sesion'");
                                        };

                                        $no = 1;
                                        while ($data = mysqli_fetch_array($tampilantbl)) {
                                            $idtbl = $data['id_tbl'];
                                            $idlogin = $data['id_login'];
                                            $idcompany = $data['id_company'];
                                            $tanggal = $data['tanggal_tbl'];
                                            $nama = $data['nama'];
                                            $deskripsi = $data['deskripsi_tbl'];
                                            $company = $data['company_name'];
                                            $nominal = $data['nominal_tbl'];
                                            $transfer = $data['transfer_tbl'];
                                            $status_terima = $data['status_trmtbl'];
                                            $status_transfer = $data['status_trftbl'];
                                            $bukti_transfer = $data['bukti_tftbl'];

                                            $gambar = $data['bukti_tftbl'];
                                            if ($gambar == null) {
                                                $img = 'tidak ada lampiran';
                                            } else {
                                                $img = '<img style="width:50px;" src="assets/bukti_tftbl/' . $gambar . '" >';
                                            }

                                        ?>
                                            <tr>
                                                <td><?= $idtbl; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $nama; ?></td>
                                                <td><?= $deskripsi; ?></td>
                                                <td><?= $company ?></td>
                                                <td><?= Rupiah($nominal); ?></td>
                                                <td><?= $transfer; ?></td>
                                                <td><?= $status_terima; ?></td>
                                                <td><?= $status_transfer; ?></td>
                                                <td><?= $img; ?></td>
                                                <td>
                                                    <?php
                                                    if ($status_terima == "belum") {
                                                        echo '<button style="margin: 2px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#tblterima' . $idtbl . '" id="Btn" onclick="myFunction()"><i class="fas fa-bookmark"></i></button>';
                                                    } else {
                                                    }
                                                    if ($status_transfer == "belum") {
                                                        echo ' <button style="margin: 2px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalbuktitftbl' . $idtbl . '"><i class="fas fa-receipt"></i></button>';
                                                    } else {
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <!-- update modal -->
                                            <div class="modal fade" id="tblterima<?= $idtbl; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">TBL di Terima oleh :</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">

                                                                <input type="text" class="form-control" name="namapenerima" required>
                                                                <input type="hidden" name="idtbl" value="<?= $idtbl; ?>">
                                                                <br />
                                                                <button type="submit" name="sudahterimatbl" class="btn btn-success">Oke ,di Terima</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- upload bukti transfer modal-->

                                            <!-- upload bukti transfer mida -->
                                            <div class="modal fade" id="modalbuktitftbl<?= $idtbl; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transfer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">

                                                                <input type="file" name="file" class="form-control">
                                                                <br />
                                                                Pastikan Bukti Transfer Sudah Benar Dan Sesuai !
                                                                <br />
                                                                <input type="hidden" name="idtbl" value="<?= $idtbl; ?>">
                                                                <br />
                                                                <button type="submit" name="uploadbuktitftbl" class="btn btn-primary">Uploud</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete modal tb -->

                                        <?php
                                        };

                                        ?>

                                    </tbody>
                                </table>
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
    <script>
        $(document).ready(function() {
            $('#orderdesc').DataTable({
                "order": [
                    [1, "desc"]
                ]
            });
        });
    </script>
    <script>
        var loading = document.getElementById('loading');
        window.addEventListener('load', function() {
            loading.style.display = "none";
        });
    </script>
</body>

<!-- Modal -->
<div class="modal fade" id="tblmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah TBL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <select name="namatbl" class="form-control">
                        <option selected>pilih user</option>
                        <?php
                        $tampilannama = mysqli_query($conn, "select * from login");
                        while ($fetcharray = mysqli_fetch_array($tampilannama)) {
                            $nama = $fetcharray['nama'];
                            $id_loginnya = $fetcharray['id_login'];
                        ?>
                            <option value="<?= $id_loginnya; ?>"><?= $nama; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br />
                    <select name="companytbl" class="form-control">
                        <option selected>pilih company</option>
                        <?php
                        $tampilancompany = mysqli_query($conn, "select * from company");
                        while ($fetcharray = mysqli_fetch_array($tampilancompany)) {
                            $company = $fetcharray['company_name'];
                            $id_companynya = $fetcharray['id_company'];
                        ?>
                            <option value="<?= $id_companynya; ?>"><?= $company; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br />
                    <input type="number" name="nominaltbl" placeholder="nominal" class="form-control" required>
                    <br />
                    <input type="text" name="transfertotbl" placeholder="transfer to" class="form-control" required>
                    <br />
                    <textarea type="text" class="form-control" name="deskripsitbl" rows="3" placeholder="deskripsi" required></textarea>
                    <br />
                    <button type="submit" name="savetbl" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>