<?php
session_start();

// database conection
$conn = mysqli_connect("localhost", "root", "", "dbrecord");

// for inser
// insert kb
if (isset($_POST['savekb'])) {
	$iduser = $_POST['nama'];
	$deskripsikb = $_POST['deskripsi'];
	$idcompany = $_POST['company'];
	$nominalkb = $_POST['nominal'];
	$transferto = $_POST['transferto'];

	$tambahkb = mysqli_query($conn, "insert into kb (id_login, deskripsi_kb, id_company, nominal_kb, transfer_kb) values ('$iduser', '$deskripsikb', '$idcompany', '$nominalkb', '$transferto')");
	if ($tambahkb) {
		echo "<script>alert('berhasil ditambahkan');
		document.location='kb.php'</script>";
	} else {
		echo "<script>alert('gagal tambah data');
		document.location='kb.php'</script>";
	}
}

//insert tb
if (isset($_POST['savetb'])) {
	$namatb = $_POST['namatb'];
	$pilihkb = $_POST['pilihkb'];
	$keterangan = $_POST['keterangan'];

	$tambahtb = mysqli_query($conn, "insert into tb (id_login, id_kb, ket_tb) values ('$namatb', '$pilihkb', '$keterangan')");
	if ($tambahtb) {
		echo "<script>alert('berhasil ditambahkan');
		document.location='tb.php'</script>";
	} else {
		echo "<script>alert('gagal tambah data');
		document.location='tb.php'</script>";
	}
}

//insert tbl
if (isset($_POST['savetbl'])) {
	$idusertbl = $_POST['namatbl'];
	$deskripsitbl = $_POST['deskripsitbl'];
	$idcompanytbl = $_POST['companytbl'];
	$nominaltbl = $_POST['nominaltbl'];
	$transfertotbl = $_POST['transfertotbl'];

	$tambahtbl = mysqli_query($conn, "insert into tbl (id_login, deskripsi_tbl, id_company, nominal_tbl, transfer_tbl) values ('$idusertbl', '$deskripsitbl', '$idcompanytbl', '$nominaltbl', '$transfertotbl')");
	if ($tambahtbl) {
		echo "<script>alert('berhasil ditambahkan');
		document.location='tbl.php'</script>";
	} else {
		echo "<script>alert('gagal tambah data');
		document.location='tbl.php'</script>";
	}
}

// insert account it support

if (isset($_POST['submit_its'])) {
	$extension = array('png', 'jpg', 'jpeg');
	$name = $_FILES['foto']['name'];
	$x = explode('.', $name);
	$exten = strtolower(end($x));
	$file_temp = $_FILES['foto']['tmp_name'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pass = $_POST['password'];


	if (in_array($exten, $extension) === true) {
		move_uploaded_file($file_temp, 'assets/img/user/' . $name);
		$fotoin = mysqli_query($conn, "insert into login (nama, email, password, image) values ('$nama', '$email', '$pass', '$name')");
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Extensi foto hanya diperbolehkan png, jpeg, jpg');
		document.location='index.php'</script>";
	}
}

// insert account finance

if (isset($_POST['submitfinance'])) {
	$ekstensei = array('png', 'jpg', 'jpeg');
	$name_fa = $_FILES['foto_fa']['name'];
	$y = explode('.', $name_fa);
	$extensi = strtolower(end($y));
	$file_tmp = $_FILES['foto_fa']['tmp_name'];
	$nama = $_POST['namafinance'];
	$email = $_POST['emailfinance'];
	$pass = $_POST['passwordfinance'];
	$company = $_POST['companyfinance'];


	if (in_array($extensi, $ekstensei) === true) {
		move_uploaded_file($file_tmp, 'assets/img/user/finance/' . $name_fa);
		$insertfoto = mysqli_query($conn, "insert into login_fa (nama_finance, email_finance, pass_finance, image_fa, id_company) values ('$nama', '$email', '$pass', '$name_fa','$company')");
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Extensi foto hanya diperbolehkan png, jpeg, jpg');
		document.location='index.php'</script>";
	}
}

// insert company
if (isset($_POST['submit_compa'])) {
	$namacompany = $_POST['companynama'];

	$tambahcompany = mysqli_query($conn, "insert into company (company_name) values ('$namacompany')");
	if ($tambahcompany) {
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Company gagal ditambahkan');
		document.location='index.php'</script>";
	}
}

// for update
//update kb
if (isset($_POST['updatekb'])) {
	$idkb = $_POST['idkb'];
	$deskripsikb = $_POST['deskripsi'];
	$idcompany = $_POST['company'];
	$nominalkb = $_POST['nominal'];
	$transferto = $_POST['transferto'];
	// print_r($iduser);
	// exit();
	$updatekb = mysqli_query($conn, "update kb set deskripsi_kb='$deskripsikb', id_company='$idcompany' , nominal_kb='$nominalkb', transfer_kb='$transferto' where kb.id_kb='$idkb' ");
	if ($updatekb) {
		echo "<script>alert('data berhasil di update');
		document.location='kb.php'</script>";
	} else {
		echo "<script>alert('data gagal di update');
		document.location='kb.php'</script>";
	}
}

//update tb
if (isset($_POST['updatetb'])) {
	$idtb = $_POST['idtb'];
	$selectkb = $_POST['pilihkb'];
	$kettb = $_POST['keterangan'];

	$updatetb = mysqli_query($conn, "update tb set id_kb='$selectkb', ket_tb='$kettb' where id_tb='$idtb'");
	if ($updatetb) {
		echo "<script>alert('data berhasil di update');
		document.location='tb.php'</script>";
	} else {
		echo "<script>alert('data berhasil di update');
		document.location='tb.php'</script>";
	}
}

//update tbl
if (isset($_POST['updatetbl'])) {
	$idtblnya = $_POST['idtbl'];
	$nominaltbl = $_POST['nominalupdatetbl'];
	$transfertotbl = $_POST['transfertoupdatetbl'];
	$companytbl = $_POST['companyupdatetbl'];
	$deskripsitbl = $_POST['deskripsiupdatetbl'];


	$updatetbl = mysqli_query($conn, "update tbl set deskripsi_tbl='$deskripsitbl', id_company='$companytbl', nominal_tbl='$nominaltbl', transfer_tbl='$transfertotbl' where id_tbl='$idtblnya'");
	if ($updatetbl) {
		echo "<script>alert('data berhasil di update');
		document.location='tbl.php'</script>";
	} else {
		echo "<script>alert('data berhasil di update');
		document.location='tbl.php'</script>";
	}
}

// update company
if (isset($_POST['updatecompany'])) {
	$namacompany = $_POST['companyupdate'];
	$idcompanynya = $_POST['idcompany'];

	$updatecompany = mysqli_query($conn, "update company set company_name='$namacompany' where id_company='$idcompanynya'");
	if ($updatecompany) {
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Company gagal diupdate');
		document.location='index.php'</script>";
	}
}

// update add account it support
if (isset($_POST['update_its'])) {
	$idlogin = $_POST['idlogin'];
	$nama_up = $_POST['nama_itupdate'];
	$email_up = $_POST['email_itupdate'];
	$pass_up = $_POST['password_itupdate'];

	$del1 = mysqli_query($conn, "select * from login where id_login='$idlogin'");
	$del2 = mysqli_fetch_assoc($del1);

	$fotolg = $del2['image'];
	if (file_exists("assets/img/user/$fotolg")) {
		unlink("assets/img/user/$fotolg");
	}

	$ekstensi = array('png', 'jpg', 'jpeg');
	$name_it = $_FILES['foto_itupdate']['name'];
	$z = explode('.', $name_it);
	$extensi = strtolower(end($z));
	$file_tmp = $_FILES['foto_itupdate']['tmp_name'];

	if (in_array($extensi, $ekstensi) === true) {
		move_uploaded_file($file_tmp, 'assets/img/user/' . $name_it);
		$updatelogin = mysqli_query($conn, "update login set nama='$nama_up', email='$email_up', password='$pass_up', image='$name_it' where id_login='$idlogin'");
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Extensi foto hanya diperbolehkan png, jpeg, jpg');
		document.location='index.php'</script>";
	}
}

// update add account finance
if (isset($_POST['faupdate'])) {
	$idfa = $_POST['idlogin_fa'];
	$nama_upfa = $_POST['namafaupdate'];
	$email_upfa = $_POST['emailfaupdate'];
	$pass_upfa = $_POST['passwordfaupdate'];
	$companyfa = $_POST['companyfaupdate'];

	$delfa1 = mysqli_query($conn, "select * from login_fa where id_finance='$idfa'");
	$delfa2 = mysqli_fetch_assoc($delfa1);

	$fotolgfa = $delfa2['image_fa'];
	if (file_exists("assets/img/user/finance/$fotolgfa")) {
		unlink("assets/img/user/finance/$fotolgfa");
	}

	$ekstensi = array('png', 'jpg', 'jpeg');
	$name_fa = $_FILES['fotofaupdate']['name'];
	$z = explode('.', $name_fa);
	$extensi = strtolower(end($z));
	$file_tmp = $_FILES['fotofaupdate']['tmp_name'];

	if (in_array($extensi, $ekstensi) === true) {
		move_uploaded_file($file_tmp, 'assets/img/user/finance/' . $name_fa);
		$updateloginfa = mysqli_query($conn, "update login_fa set nama_finance='$nama_upfa', email_finance='$email_upfa', pass_finance='$pass_upfa', image_fa='$name_fa', id_company='$companyfa' where id_finance='$idfa'");
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Extensi foto hanya diperbolehkan png, jpeg, jpg');
		document.location='index.php'</script>";
	}
}

// for delete
//delete kb
if (isset($_POST['deletekb'])) {
	$idkb = $_POST['idkb'];

	$datadelkb1 = mysqli_query($conn, "select * from kb where id_kb='$idkb'");
	$datadelkb2 = mysqli_fetch_assoc($datadelkb1);

	$fotokb = $datadelkb2['bukti_tfkb'];
	if (file_exists("finance/assets/bukti_tfkb/$fotokb")) {
		unlink("finance/assets/bukti_tfkb/$fotokb");
	}

	$deletekb = mysqli_query($conn, "delete from kb where id_kb='$idkb'");


	if ($deletekb) {
		echo "<script>alert('data berhasil dihapus');
		document.location='kb.php'</script>";
	} else {
		echo "<script>alert('data gagal dihapus');
		document.location='kb.php'</script>";
	}
}

//delete tb
if (isset($_POST['deletetb'])) {
	$idtb = $_POST['idtb'];

	$deletetb = mysqli_query($conn, "delete from tb where id_tb='$idtb'");
	if ($deletetb) {
		echo "<script>alert('data berhasil dihapus');
		document.location='tb.php'</script>";
	} else {
		echo "<script>alert('data gagal dihapus');
		document.location='tb.php'</script>";
	}
}

//delete tbl
if (isset($_POST['modaldeletetbl'])) {
	$idtbl = $_POST['idtbl'];

	$datadelkb1 = mysqli_query($conn, "select * from tbl where id_tbl='$idtbl'");
	$datadelkb2 = mysqli_fetch_assoc($datadelkb1);

	$fototbl = $datadelkb2['bukti_tftbl'];
	if (file_exists("finance/assets/bukti_tftbl/$fototbl")) {
		unlink("finance/assets/bukti_tftbl/$fototbl");
	}

	$deletetbl = mysqli_query($conn, "delete from tbl where id_tbl='$idtbl'");
	if ($deletetbl) {
		echo "<script>alert('data berhasil dihapus');
		document.location='tbl.php'</script>";
	} else {
		echo "<script>alert('data gagal dihapus');
		document.location='tbl.php'</script>";
	}
}

// delete company
if (isset($_POST['deletecompany'])) {
	$idcompanynya = $_POST['idcompanydelete'];

	$deletecompany = mysqli_query($conn, "delete from company where id_company='$idcompanynya'");
	if ($deletecompany) {
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Company gagal diupdate');
		document.location='index.php'</script>";
	}
}

// delete user it support
if (isset($_POST['delete_its'])) {
	$idlog = $_POST['idlog'];

	$deleteimage1 = mysqli_query($conn, "select * from login where id_login='$idlog'");
	$deleteimage2 = mysqli_fetch_assoc($deleteimage1);

	$fotodelit = $deleteimage2['image'];
	if (file_exists("assets/img/user/$fotodelit")) {
		unlink("assets/img/user/$fotodelit");
	}

	$deleteloginit = mysqli_query($conn, "delete from login where id_login='$idlog'");
	if ($deleteloginit) {
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Company gagal diupdate');
		document.location='index.php'</script>";
	}
}

// delete user finance
if (isset($_POST['deletefa'])) {
	$idfa = $_POST['id_fa'];

	$deleteimage1 = mysqli_query($conn, "select * from login_fa where id_finance='$idfa'");
	$deleteimage2 = mysqli_fetch_assoc($deleteimage1);

	$fotofa = $deleteimage2['image_fa'];
	if (file_exists("assets/img/user/finance/$fotofa")) {
		unlink("assets/img/user/finance/$fotofa");
	}

	$deletefa = mysqli_query($conn, "delete from login_fa where id_finance='$idfa'");
	if ($deletefa) {
		echo "<script>alert('berhasil');
		document.location='index.php'</script>";
	} else {
		echo "<script>alert('Company gagal diupdate');
		document.location='index.php'</script>";
	}
}
