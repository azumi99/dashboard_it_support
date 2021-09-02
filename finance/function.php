<?php
session_start();

// database conection
$conn = mysqli_connect("localhost", "root", "", "db_record");


//update diterima kb
if (isset($_POST['sudah'])) {
	$idkb = $_POST['idkb'];
	$sudah1 = $_POST['namapenerima'];

	$sudah = mysqli_query($conn, "update kb set status_terima='$sudah1' where id_kb=$idkb ");
	if ($sudah) {
		echo "<script>alert('Kas bon berhasil di terima');
		document.location='kb'</script>";
	} else {
		echo "<script>alert('Kas bon gagal di terima');
		document.location='kb'</script>";
	}
}
// update bukti tf kb

if (isset($_POST['uploadbuktitf'])) {


	$allowed_extension = array('png', 'jpg', 'jpeg', 'pdf');
	$nama = $_FILES['file']['name'];
	$dot = explode('.', $nama);
	$ekstensi = strtolower(end($dot));
	$ukuran = $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$idkb = $_POST['idkb'];

	$textsudahtf = "sudah";
	if (in_array($ekstensi, $allowed_extension) === true) {

		move_uploaded_file($file_tmp, 'assets/bukti_tfkb/' . $nama);
		$uploadbuktitf = mysqli_query($conn, " update kb set status_tfkb='$textsudahtf' ,bukti_tfkb='$nama' where id_kb=$idkb");

		echo "<script>alert('Kas bon berhasil di transfer');
		document.location='kb'</script>";
	} else {
		echo "<script>alert('Kas bon gagal di transfer');
		document.location='kb'</script>";
	}
};

//update sudah diterima tb
if (isset($_POST['sudahtrmtb'])) {
	$idtb = $_POST['idtb'];
	$sudah1 = $_POST['namapenerima'];

	$sudahtrmtb = mysqli_query($conn, "update tb set status_trmtb='$sudah1' where id_tb=$idtb ");
	if ($sudahtrmtb) {
		echo "<script>alert('Tutup bon berhasil di terima');
		document.location='tb'</script>";
	} else {
		echo "<script>alert('Tutup bon gagal di terima');
		document.location='tb'</script>";
	}
}

//update sudah terima tbl
if (isset($_POST['sudahterimatbl'])) {
	$idtbl = $_POST['idtbl'];
	$sudah1 = $_POST['namapenerima'];

	$sudahterimatbl = mysqli_query($conn, "update tbl set status_trmtbl='$sudah1' where id_tbl=$idtbl");
	if ($sudahterimatbl) {
		echo "<script>alert('TBL berhasil di terima');
		document.location='tbl'</script>";
	} else {
		echo "<script>alert('TBL gagal di terima');
		document.location='tbl'</script>";
	}
}

// update bukti tf TBL

if (isset($_POST['uploadbuktitftbl'])) {


	$allowed_extension = array('png', 'jpg', 'jpeg', 'pdf');
	$nama = $_FILES['file']['name'];
	$dot = explode('.', $nama);
	$ekstensi = strtolower(end($dot));
	$ukuran = $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
	$idtbl = $_POST['idtbl'];

	$textsudahtf = "sudah";
	if (in_array($ekstensi, $allowed_extension) === true) {

		move_uploaded_file($file_tmp, 'assets/bukti_tftbl/' . $nama);
		$uploadbuktitftbl = mysqli_query($conn, " update tbl set status_trftbl='$textsudahtf' ,bukti_tftbl='$nama' where id_tbl=$idtbl");

		echo "<script>alert('TBL berhasil di transfer');
		document.location='tbl'</script>";
	} else {
		echo "<script>alert('TBL gagal di transfer');
		document.location='tbl'</script>";
	}
};
