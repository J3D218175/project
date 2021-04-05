-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 06:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_hmki`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `universitas` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gambar` varchar(10000) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `fid` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `link` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`fid`, `judul`, `link`) VALUES
(28, 'Rapat Kerja HMKI, 20 April 2019', 'http://localhost/project/gambar/galeri1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(3, 'Pengurus HMKI'),
(4, 'HMKI Bidang Internal'),
(5, 'HMK Bidang Hub. Antar Lembaga'),
(6, 'HMKI Bidang Pendidikan dan Budaya'),
(7, 'HMKI Bidang Sosial dan Kepemudaan'),
(8, 'HMKI Bidang Komunikasi dan Informasi'),
(9, 'Pengurus Istimewa');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Kegiatan'),
(2, 'Ucapan'),
(3, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_comment` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `waktu` text NOT NULL,
  `id_konten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(100) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `date` text DEFAULT NULL,
  `gambar` varchar(10000) NOT NULL,
  `isi` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `id_user`, `id_kategori`, `judul`, `date`, `gambar`, `isi`) VALUES
(9, 2, 1, 'Ukir Sejarah, Dilantik di Pendopo Kuningan', '16 Januari 2020', 'http://localhost/project/gambar/lantik-hmki-1.jpeg', 0x4b554e494e47414e20284d415353292053656b7265746172697320446165726168204b616275706174656e204b756e696e67616e2c204472204469616e20526163686d61742059616e7561722c204d53692e2c206d656c616e74696b2070656e67757275732048696d70756e616e204d6168617369737761204b756e696e67616e20496e646f6e657369612028484d4b492920506572696f646520323031392d323032332e2050656c616e74696b616e2074657261736120697374696d657761206b6172656e612064696c616b75616e20206469202050656e646f706f204b616275706174656e204b756e696e67616e2c205361627475202831362f332f32303139292e0d0a0d0a0d0a536574656c61682070726f7365732070656c616e7469616b6e2041636172612064696c616e6a75746b616e2064656e67616e20466f6b75732047726f75702044697363757373696f6e2e2041636172612070656c616e74696b616e20646968616469726920706172612074616d7520756e64616e67616e2064616e206a75676120706172612070656a61626174206c61696e6e79612e0d0a0d0ae2809c53617961206d656e67617072657369617369206b68757375736e7961206d61686173697377612079616e6720616b7469702064616c616d206f7267616e69736173692e2053656d6f67612064656e67616e206b6567696174616e20696e6920206d656d62656e74756b206b6172616b746572206b69746120756e74756b206d656e656d7061746b616e20646972692c206d61686173697377612e0d0a0d0a0d0a200d0a4d656e757275742053656b6461204469616e2c2064756c75206d61686173697377612063656e646572756e67206c656269682073656e616e67206265726f7267616e69736173692c206265726469736b7573692c206d656d626163612e2049747520737961726174206d75746c616b20756e74756b206d656e67656d62616e676b616e20646972692070616461206d6173612079616e6720616b616e20646174616e672e204f6c6568207365626162206974752c206961206d656e67616a616b206b6570616461206b616c616e67616e20206d6168617369737761206b6875737573756e7961206469204b616275706174656e20756e74756b206d656e6767656c6f72616b616e206b656d62616c692073656d616e67617420756e74756b206265726f7267616e69736173692e0d0a0d0a53656d656e746172612c20427570617469204b756e696e67616e2064616c616d2073616d627574616e2079616e67206469626163616b616e2053656b6461204469616e20526163686d61742059616e7561722c206d656e67756361706b616e2073656c616d617420617461732064696b756b75686b616e6e79612070656e677572757320484d4b49204b756e696e67616e20706572696f646520323031392d323032312e204b6570657263617961616e20697475206d656e67616e64756e67206b6f6e73656b77656e7369206c616e676b6168206b65726a61206e796174612079616e6720696e74656c656b7475616c2e0d0a0d0a0d0ae2809c53617961206a756761206d656e79616d7061696b616e20746572696d61206b61736968206b65706164612070656e677572757320484d4b49206d617361206268616b746920736562656c756d6e79612c2079616e672074656c6168206d656c616b756b616e2020706572616e2064616c616d206f7267616e697361736920484d4b492ce28099206b617461204275706174692041636570205075726e616d612e0d0a0d0a42757061746920416365702062657268617261702c2020484d4b492068617275732068617275732074616d70696c2062656461207365727461206d656c616b73616e616b616e20706572616e6e79612074616e7061206d656e6767616e676775206b6567696174616e2d6b6567696174616e206469206b616d7075732e204b656861646972616e20484d4b49206861727573206d656d626572696b616e206b6f6e7472696275736920706f73697469662062616769206d6173796172616b61742e),
(11, 2, 1, 'Sekda Kukuhkan Pengurus HMKI Kuningan Periode 2019-2021', '17 Februari 2020', 'http://localhost/project/gambar/artikel2_2.jpeg', 0x53656b7265746172697320446165726168204b616275706174656e204b756e696e67616e2c2044522e204469616e20526163686d61742059616e7561722c204d2e53692e2c206d656c616e74696b2070656e67757275732048696d70756e616e204d6168617369737761204b756e696e67616e20496e646f6e657369612028484d4b492920506572696f646520323031392d323032332c202064692050656e646f706f204b616275706174656e204b756e696e67616e2c205361627475202831362f332f32303139292e2041636172612064696c616e6a75746b616e2064656e67616e20466f6b75732047726f75702044697363757373696f6e2e0d0a0d0ae2809c53617961206d656e67617072657369617369206b68757375736e7961206d61686173697377612079616e6720616b7469702064616c616d206f7267616e69736173692e2053656d6f67612064656e67616e206b6567696174616e20696e6920206d656d62656e74756b206b6172616b746572206b69746120756e74756b206d656e656d7061746b616e20646972692c206d61686173697377612e0d0a0d0a4d656e757275742053656b6461204469616e2c2064756c75206d61686173697377612063656e646572756e67206c656269682073656e616e67206265726f7267616e69736173692c206265726469736b7573692c206d656d626163612e2049747520737961726174206d75746c616b20756e74756b206d656e67656d62616e676b616e20646972692070616461206d6173612079616e6720616b616e20646174616e672e204f6c6568207365626162206974752c206961206d656e67616a616b206b6570616461206b616c616e67616e20206d6168617369737761206b6875737573756e7961206469204b616275706174656e20756e74756b206d656e6767656c6f72616b616e206b656d62616c692073656d616e67617420756e74756b206265726f7267616e69736173692e20200d0a0d0a53656d656e746172612c20427570617469204b756e696e67616e2064616c616d2073616d627574616e2079616e67206469626163616b616e2053656b6461204469616e20526163686d61742059616e7561722c206d656e67756361706b616e2073656c616d617420617461732064696b756b75686b616e6e79612070656e677572757320484d4b49204b756e696e67616e20706572696f646520323031392d323032312e204b6570657263617961616e20697475206d656e67616e64756e67206b6f6e73656b77656e7369206c616e676b6168206b65726a61206e796174612079616e6720696e74656c656b7475616c2e0d0a0d0ae2809c53617961206a756761206d656e79616d7061696b616e20746572696d61206b61736968206b65706164612070656e677572757320484d4b49206d617361206268616b746920736562656c756d6e79612c2079616e672074656c6168206d656c616b756b616e2020706572616e2064616c616d206f7267616e697361736920484d4b492ce28099206b617461204275706174692041636570205075726e616d612e0d0a0d0a42757061746920416365702062657268617261702c2020484d4b492068617275732068617275732074616d70696c2062656461207365727461206d656c616b73616e616b616e20706572616e6e79612074616e7061206d656e6767616e676775206b6567696174616e2d6b6567696174616e206469206b616d7075732e204b656861646972616e20484d4b49206861727573206d656d626572696b616e206b6f6e7472696275736920706f73697469662062616769206d6173796172616b61742e2028486164692f507562646f6b29);

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_konten` int(11) NOT NULL,
  `link` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_konten`, `link`) VALUES
(19, 11, 'http://localhost/project/gambar/artikel2.jpeg'),
(20, 11, 'http://localhost/project/gambar/artikel2_1.jpeg'),
(21, 11, 'http://localhost/project/gambar/artikel2_3.jpeg'),
(22, 11, 'http://localhost/project/gambar/artikel2_4.jpeg'),
(23, 11, 'http://localhost/project/gambar/artikel2_5.jpeg'),
(24, 11, 'http://localhost/project/gambar/artikel2_6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(2, 'myuu', 'myuu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;