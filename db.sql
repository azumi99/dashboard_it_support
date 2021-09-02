-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Agu 2021 pada 14.22
-- Versi server: 10.3.31-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anandane_record`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id_company`, `company_name`) VALUES
(1, 'SAI'),
(4, 'PARATEKNO'),
(5, 'XSYS'),
(7, 'PLI'),
(11, 'LAI'),
(12, 'GTLN'),
(13, 'XSYS PJT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kb`
--

CREATE TABLE `kb` (
  `id_kb` int(11) NOT NULL,
  `tanggal_kb` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_login` varchar(11) NOT NULL,
  `deskripsi_kb` varchar(250) NOT NULL,
  `id_company` varchar(11) NOT NULL,
  `nominal_kb` int(11) NOT NULL,
  `transfer_kb` varchar(100) NOT NULL,
  `status_terima` varchar(20) NOT NULL DEFAULT 'belum',
  `status_tfkb` varchar(10) NOT NULL DEFAULT 'belum',
  `bukti_tfkb` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kb`
--

INSERT INTO `kb` (`id_kb`, `tanggal_kb`, `id_login`, `deskripsi_kb`, `id_company`, `nominal_kb`, `transfer_kb`, `status_terima`, `status_tfkb`, `bukti_tfkb`) VALUES
(49, '2021-08-18 01:42:11', '1', 'Mouse usb logitech b100 2 unit, 1 unit untuk kanita fa xsys, 1unit untuk backup xsys', '5', 109000, 'Ilham Tegar', 'sudah | septi', 'belum', ''),
(51, '2021-08-18 06:59:27', '1', 'Ssd 250 sata untuk pak yudis xsys cs, ssd 250 m.2 untuk pak ridho ops, ram 8 gb ddr4 untuk pak lexi ', '13', 2172900, 'Ilham Tegar 1180010779212', 'sudah | asih', 'sudah', 'bukti trf upgrade laptop.JPG'),
(52, '2021-08-19 06:17:36', '1', 'Mouse wirelles logitech m585 untuk alfvian yusuf (it)', '1', 366400, 'Ilham Tegar 1180010779212', 'sudah | Yurike', 'sudah', 'WhatsApp Image 2021-08-16 at 17.01.36.jpeg'),
(53, '2021-08-19 06:34:59', '1', 'Adapter charger lenovo V330 untuk laptop ihsan (it)', '1', 130000, 'Ilham Tegar 1180010779212', 'sudah | Yurike', 'sudah', 'KASBON ADAPTOR.PNG'),
(54, '2021-08-20 07:22:39', '2', '1 set pc branded DELL OPTIPLEX 7020/3020,INTEL I5 GEN 4 ,RAM 4GB + 1 SSD WD BLUE 250 GB (UNTUK DISPLAY CCTV RUANGAN BU ELEN PLI LT3)', '7', 3272100, '5920130323 bca admathir', 'sudah | yani', 'sudah', 'WhatsApp Image 2021-08-23 at 13.21.58.jpeg'),
(55, '2021-08-20 07:55:21', '1', 'Ssd wd blue 250 gb sata untuk desi fa pli', '7', 730000, 'Ilham Tegar 1180010779212', 'sudah | yani', 'sudah', 'WhatsApp Image 2021-08-23 at 13.27.34 (1).jpeg'),
(56, '2021-08-23 05:05:46', '2', 'Biaya Pembelian 1 Laptop Asus M415va,amd ryzen 5,8gb ram,512 ssd.\r\nUntuk ahmad ridwan pramana (IT lt 5)', '1', 9856300, '5920130323 bca admathir', 'sudah | Selvie', 'sudah', 'kasbon laptop Ridwan.PNG'),
(57, '2021-08-24 10:00:57', '2', '1 unit printer epson l4150 wifi all in one printer (Untuk Pak Kur)', '1', 3995000, '5920130323 bca admathir', 'sudah | Selvie', 'sudah', 'kasbon printer u. bp kur.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama`, `email`, `password`, `image`) VALUES
(1, 'Ilham Tegar', 'ilham@gmail.com', '321ilham', 'IMG_1596 (1).JPG'),
(2, 'Admathir', 'matir@gmail.com', '321matir', 'matir.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_fa`
--

CREATE TABLE `login_fa` (
  `id_finance` int(11) NOT NULL,
  `nama_finance` varchar(40) NOT NULL,
  `email_finance` varchar(40) NOT NULL,
  `pass_finance` varchar(13) NOT NULL,
  `id_company` int(11) NOT NULL,
  `image_fa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_fa`
--

INSERT INTO `login_fa` (`id_finance`, `nama_finance`, `email_finance`, `pass_finance`, `id_company`, `image_fa`) VALUES
(3, 'SAI FINANCE', 'sai@gmail.com', '321sai', 1, 'att.png'),
(4, 'PLI FINANCE', 'pli@gmail.com', '321pli', 7, 'Untitled-1.png'),
(5, 'XSYS FINANCE', 'xsys@gmail.com', '321xsys', 5, 'xsys.png'),
(6, 'PARATEKNO FINANCE', 'pat@gmail.com', '321paratekno', 4, 'pat.jpg'),
(7, 'XSYS PJT FINANCE', 'xsyspjt@gmail.com', '321xsys', 13, 'xsys.png'),
(8, 'GTLN FINANCE', 'gtln@gmail.com', '321gtln', 12, 'logo-white.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb`
--

CREATE TABLE `tb` (
  `id_tb` int(11) NOT NULL,
  `tanggal_tb` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_login` int(11) NOT NULL,
  `id_kb` int(11) NOT NULL,
  `ket_tb` varchar(200) NOT NULL,
  `status_trmtb` varchar(20) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb`
--

INSERT INTO `tb` (`id_tb`, `tanggal_tb`, `id_login`, `id_kb`, `ket_tb`, `status_trmtb`) VALUES
(21, '2021-08-18 01:43:24', 1, 49, 'kasbon awal 110.000 sisa 1000', 'sudah | septi'),
(22, '2021-08-18 07:03:03', 1, 51, 'kasbon awal 2.171.900 tutupbon 2.172.900', 'sudah | asih'),
(23, '2021-08-19 06:18:37', 1, 52, 'ada lebih 10.000 transfer to admathir', 'sudah | selvie'),
(24, '2021-08-20 07:56:04', 1, 55, 'ok', 'sudah | yani'),
(25, '2021-08-25 06:32:20', 1, 53, 'ok', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl`
--

CREATE TABLE `tbl` (
  `id_tbl` int(11) NOT NULL,
  `tanggal_tbl` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_login` int(11) NOT NULL,
  `deskripsi_tbl` varchar(250) NOT NULL,
  `id_company` int(11) NOT NULL,
  `nominal_tbl` int(11) NOT NULL,
  `transfer_tbl` varchar(100) NOT NULL,
  `status_trmtbl` varchar(20) NOT NULL DEFAULT 'belum',
  `status_trftbl` varchar(10) NOT NULL DEFAULT 'belum',
  `bukti_tftbl` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl`
--

INSERT INTO `tbl` (`id_tbl`, `tanggal_tbl`, `id_login`, `deskripsi_tbl`, `id_company`, `nominal_tbl`, `transfer_tbl`, `status_trmtbl`, `status_trftbl`, `bukti_tftbl`) VALUES
(14, '2021-08-18 06:38:53', 2, 'Biaya Swab antigen Rafles nainggolan IT\r\ntanggal 23 juni 2021 (hasil negative)', 4, 130000, 'Bambang Santoso 5270234234', 'sudah | Selvie', 'sudah', 'rafles.PNG'),
(15, '2021-08-18 06:39:29', 2, 'Biaya Swab antigen DIna marisca IT tanggal 23 juni 2021 (hasil negative)', 4, 130000, 'Bambang Santoso 5270234234', 'sudah | Selvie', 'sudah', 'marisca.PNG'),
(16, '2021-08-19 06:44:20', 2, 'Biaya internet Bulanan IFORTE (Blok N27) bulan agustus 2021 .', 1, 6600000, 'BCA 814730003285 A.N PT SEGARA ARTHA INVESTAMA', 'sudah | Yurike', 'sudah', 'IFORTE.PNG'),
(17, '2021-08-19 06:46:37', 2, 'Biaya SSL A WILL CARD DOMAIN transys.id 1 tahun (18/08/2021-17/08/2022)', 1, 1544400, 'Nama Bank: BCA Nama Penerima: PT. Exabytes Network Indonesia No. Rekening: 607 053 0188', 'sudah | Yurike', 'sudah', 'EXABYTES.PNG'),
(18, '2021-08-19 06:47:48', 2, 'Biaya Bulanan Ali Cloud Paratekno bulan agustus 2021', 4, 14645410, 'indonet', 'sudah | Yurike', 'sudah', 'ALICLOUD.PNG'),
(19, '2021-08-19 06:48:41', 2, 'Biaya bulanan Ali Cloud GTLN bulan agustus 2021', 12, 73767039, 'indonet', 'sudah | Annisa', 'sudah', 'INDONET JULI.JPG'),
(20, '2021-08-20 02:53:07', 1, 'E-toll drop printer ke service san mangga dua', 1, 52000, 'Ilham Tegar 1180010779212', 'sudah | selvie', 'belum', ''),
(21, '2021-08-23 04:53:44', 2, 'Biaya  Bulanan Deviceless wablas no cs 6281211818198\r\nbulan agustus 2021', 4, 200179, 'Bank: MANDIRI No.Rek : 1380015911006 A/N: MUHAMAD YANUN ASAT', 'sudah | Selvie', 'sudah', 'DEVICELESS WABLASS NO CS BLN AGT.PNG'),
(22, '2021-08-23 04:55:35', 2, 'Biaya Bulanan Wablas no cs 6281211818198\r\nBulan agustus', 4, 419234, 'Bank: MANDIRI No.Rek : 1380015911006 A/N: MUHAMAD YANUN ASAT', 'sudah | Selvie', 'sudah', 'WABLAS NO CS UNLIMITED.PNG'),
(23, '2021-08-23 04:58:00', 2, 'Biaya Bulanan Wablas no GETI 6281389193052 \r\nBulan agustus', 4, 419167, 'Bank: MANDIRI No.Rek : 1380015911006 A/N: MUHAMAD YANUN ASAT', 'sudah | Selvie', 'sudah', 'WABLAS NO GETI BLN AGT.PNG'),
(24, '2021-08-23 04:59:47', 2, 'Biaya Bulanan Wablas no INDONESIAN HUB\r\n6281511129537 \r\nBulan agustus', 4, 419370, 'Bank: MANDIRI No.Rek : 1380015911006 A/N: MUHAMAD YANUN ASAT', 'sudah | Selvie', 'sudah', 'WABLAS NO INDONESIA.PNG'),
(25, '2021-08-23 05:01:48', 2, 'Biaya Bulanan Microsoft outlook \r\nemail hosting pli.co.id\r\n', 7, 860200, 'microsoft ', 'sudah | yani', 'sudah', 'WhatsApp Image 2021-08-25 at 09.15.57.jpeg'),
(26, '2021-08-23 05:03:38', 2, 'Biaya hosting dan domain udaya.id 1 tahun 2021\r\n', 1, 508810, 'virtual account bca 113661646153', 'sudah | Selvie', 'belum', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indeks untuk tabel `kb`
--
ALTER TABLE `kb`
  ADD PRIMARY KEY (`id_kb`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `login_fa`
--
ALTER TABLE `login_fa`
  ADD PRIMARY KEY (`id_finance`);

--
-- Indeks untuk tabel `tb`
--
ALTER TABLE `tb`
  ADD PRIMARY KEY (`id_tb`);

--
-- Indeks untuk tabel `tbl`
--
ALTER TABLE `tbl`
  ADD PRIMARY KEY (`id_tbl`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kb`
--
ALTER TABLE `kb`
  MODIFY `id_kb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `login_fa`
--
ALTER TABLE `login_fa`
  MODIFY `id_finance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb`
--
ALTER TABLE `tb`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl`
--
ALTER TABLE `tbl`
  MODIFY `id_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
