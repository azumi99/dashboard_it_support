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
    <title>Kas Bon | UDAYA</title>
    <link rel="shortcut icon" href="assets/img/head/logo-udaya.png" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard" style="font-family:Verdana, Geneva, Tahoma, sans-serif;"><img style="width: 50px; margin-top:6px;" src="assets/img/head/logo-udaya.png" alt=""> udaya.id
        </a>
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
                    <h1 class="mt-4">Kasbon</h1>
                    <div class="card border-0 shadow p-3 mb-5 rounded mb-4">
                        <div class="card-header border-0 shadow p-3 mb-2 rounded mb-4">
                            <!-- Button trigger modal -->

                            <form method="POST">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kbmodal">
                                    <i class="fas fa-plus"></i>
                                </button>
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
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="orderdesc" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Deskripsi</th>
                                            <th>Company</th>
                                            <th>Nominal</th>
                                            <th>To</th>
                                            <th>Recive</th>
                                            <th>Transfer</th>
                                            <th>Evidence</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="listSearch">
                                        <?php
                                        function Rupiah($angka)
                                        {
                                            $hasil = "Rp " . number_format($angka, 2, ',', '.');
                                            return $hasil;
                                        }



                                        if (isset($_POST['monthsubmit'])) {
                                            $for_date = mysqli_real_escape_string($conn, $_POST['date']);
                                            $tampilankb = mysqli_query($conn, "select kb.*, login.nama, company.company_name from kb left join login on kb.id_login=login.id_login left join company on kb.id_company=company.id_company where month(tanggal_kb)=$for_date order by tanggal_kb");
                                        } else {
                                            $tampilankb =  mysqli_query($conn, "select kb.*, login.nama, company.company_name from kb left join login on kb.id_login=login.id_login left join company on kb.id_company=company.id_company order by tanggal_kb");
                                        };


                                        while ($data = mysqli_fetch_array($tampilankb)) {
                                            $id_kb = $data['id_kb'];
                                            $tanggal = $data['tanggal_kb'];
                                            $nama = $data['nama'];
                                            $deskripsi = $data['deskripsi_kb'];
                                            $company = $data['company_name'];
                                            $idcompany = $data['id_company'];
                                            $id_login = $data['id_login'];
                                            $nominal = $data['nominal_kb'];
                                            $transfer = $data['transfer_kb'];
                                            $status_terima = $data['status_terima'];
                                            $status_transfer = $data['status_tfkb'];
                                            $gambar = $data['bukti_tfkb'];
                                            if ($gambar == null) {
                                                $img = 'tidak ada lampiran';
                                            } else {
                                                $img = '<img style="width:50px;" src="finance/assets/bukti_tfkb/' . $gambar . '" >';
                                            }


                                        ?>
                                            <tr>
                                                <td><?= $id_kb; ?></td>
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
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalupdate<?= $id_kb; ?>"><i class="fas fa-pencil-alt"></i></button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $id_kb; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                            <!-- update modal -->
                                            <div class="modal fade" id="modalupdate<?= $id_kb; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update KB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <select name="company" class="form-control">
                                                                    <option selected value="<?= $idcompany; ?>"><?= $company; ?></option>
                                                                    <?php
                                                                    $tampilancompanyupdate = mysqli_query($conn, "select * from company");
                                                                    while ($fetcharray = mysqli_fetch_array($tampilancompanyupdate)) {
                                                                        $company_list = $fetcharray['company_name'];
                                                                        $id_company_list = $fetcharray['id_company'];
                                                                    ?>
                                                                        <option value="<?= $id_company_list; ?>"><?= $company_list; ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br />
                                                                <input type="number" name="nominal" value="<?= $nominal; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="transferto" value="<?= $transfer; ?>" class="form-control" required>
                                                                <br />
                                                                <textarea type="text" class="form-control" name="deskripsi" rows="3" required><?= $deskripsi; ?></textarea>
                                                                <input type="hidden" name="idkb" value="<?= $id_kb; ?>">
                                                                <br />
                                                                <button type="submit" name="updatekb" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- update modal -->

                                            <!-- delete modal -->
                                            <div class="modal fade" id="modaldelete<?= $id_kb; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus KB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <fieldset disabled>
                                                                    <textarea type="text" class="form-control" name="deskripsi" rows="3" placeholder="<?= $deskripsi; ?>"></textarea>
                                                                </fieldset>
                                                                <br />
                                                                Apakah anda ingin menghapus KB ini?
                                                                <br />
                                                                <br />
                                                                <input type="hidden" name="idkb" value="<?= $id_kb; ?>">
                                                                <button type="submit" name="deletekb" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete modal -->

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
<div class="modal fade" id="kbmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah KB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <?php
                    $tampilannama = $_SESSION{
                        'nama'};
                    $idloginnya = $_SESSION{
                        'id_login'};
                    ?>
                    <label for="">Nama</label>
                    <select name="nama" class="form-control">
                        <option value="<?= $idloginnya; ?>" selected><?= $tampilannama; ?></option>
                    </select>
                    <label for="">Company</label>
                    <select name="company" class="form-control">
                        <option selected></option>
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
                    <label for="">Nominal</label>
                    <input type="number" name="nominal" class="form-control" required>
                    <label for="">Transfer To</label>
                    <input type="text" name="transferto" class="form-control" required>
                    <label for="">Keterangan</label>
                    <textarea type="text" class="form-control" name="deskripsi" rows="3" required></textarea>
                    <br />
                    <button type="submit" name="savekb" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>