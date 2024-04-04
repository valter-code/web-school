-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 06:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(355) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `gambar_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email_admin`, `username_admin`, `password_admin`, `nama_admin`, `gambar_admin`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$sfn0GPdFIu/9knaWcaMsm.cdhjpOM3l8TdkQd861ZSsFfi7fMFnLa', 'root', '660ed03f1b07c.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `gambar_berita` varchar(355) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul_berita`, `isi_berita`, `penulis`, `date`, `gambar_berita`) VALUES
(1, 'berita LKS Cyber Securityy', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!', 'ferdi', '2024-03-17', '660241d25a602.png'),
(2, 'Berita Lomba Futsal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!', 'kevin', '2024-03-17', NULL),
(16, 'berita geming', 'blablabla', 'firdan', '', ''),
(17, 'slebew gaming', 'yoyoyo', 'guru A', '', ''),
(18, 'judul azzah', 'yyo wahtsup', 'ferdi geming', '20-03-2024', ''),
(19, 'mouse gaming', 'efjisdochef jbf', 'firdan', '22-03-2024', ''),
(20, 'est', 'test gambar', 'gambarte', '22-03-2024', 'Screenshot (161).png'),
(21, 'cers', 's', 's', '22-03-2024', 'Screenshot (3).png'),
(23, 'puter jari', 'test sahaja', 'nibba', '23-03-2024', 'default.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `email_guru` varchar(100) NOT NULL,
  `username_guru` varchar(100) NOT NULL,
  `password_guru` varchar(400) NOT NULL,
  `nama_guru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `email_guru`, `username_guru`, `password_guru`, `nama_guru`) VALUES
(1, 'guru@gmail.com', 'guru', '$2y$10$cBXO7jT8i4LfVkGmjPxc9efe5tnOc5jbh4Sz0igD8zCtwy/.DIJ9u', 'pak jordan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jurusan_siswa` varchar(10) NOT NULL,
  `password_siswa` varchar(400) NOT NULL,
  `gender_siswa` varchar(100) DEFAULT NULL,
  `agama_siswa` varchar(50) DEFAULT NULL,
  `nis_siswa` varchar(50) DEFAULT NULL,
  `nisn_siswa` varchar(255) DEFAULT NULL,
  `tempat_lahir_siswa` varchar(255) DEFAULT NULL,
  `tanggal_lahir_siswa` varchar(255) DEFAULT NULL,
  `foto_siswa` varchar(355) DEFAULT NULL,
  `kelas_siswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `jurusan_siswa`, `password_siswa`, `gender_siswa`, `agama_siswa`, `nis_siswa`, `nisn_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `foto_siswa`, `kelas_siswa`) VALUES
(3, 'ferdi', 'MP', '$2y$10$nCkkuqV3SCLeyqMZ0NH6suCevWnoxR6R7M1QXZzn1Y9C7I0eOUqh6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'kevin', 'BD', '$2y$10$jew7nZ1rqvzd3kgVdvd/TuHczR.vkEEWyJ.xus8oU3qDyzFNyxneK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'firdan', 'rpl', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'tets', 'MP', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'rendi', 'MP', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'nada', 'TKJ', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'yooy', 'TKJ', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'rendi nurfauzan', 'TKJ', '$2y$10$dQOkgNds5MUszAAXMU88lOKUXKXYNr5PEFuuj/MlqGfiD5mgGHggi', 'L', 'islam', '0101', '0202', 'jakarta', '27-09-2003', 'default.JPG', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
