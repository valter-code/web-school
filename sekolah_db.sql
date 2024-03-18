-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 05:21 AM
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
  `password_admin` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$Ux093S9.Ayk2jRU6wxATheA14dtY12EbQo6w73aHP5TYtLhTtKz5e');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul_berita`, `isi_berita`, `penulis`, `date`) VALUES
(1, 'berita LKS Cyber Security', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!', 'ferdi', '2024-03-17'),
(2, 'Berita Lomba Futsal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit aspernatur repellendus et laudantium? Impedit quod velit atque suscipit ratione maiores distinctio, harum beatae incidunt recusandae earum odio labore exercitationem quae!', 'kevin', '2024-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jurusan_siswa` varchar(10) NOT NULL,
  `password_siswa` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `jurusan_siswa`, `password_siswa`) VALUES
(1, 'test', 'TKJ', '$2y$10$GosZtdVWrPShiX7Y.HJtru3odzlupcLYWfbbR88FVY/XN9oTvnY4.'),
(2, 'test', 'TKJ', '$2y$10$x8VgN.UY8fgkTp4VLF52GuE7Yh.eySs1BfQvB4XkOp272jAyFkDIe'),
(3, 'ferdi', 'MP', '$2y$10$nCkkuqV3SCLeyqMZ0NH6suCevWnoxR6R7M1QXZzn1Y9C7I0eOUqh6'),
(7, 'kevin', 'BD', '$2y$10$jew7nZ1rqvzd3kgVdvd/TuHczR.vkEEWyJ.xus8oU3qDyzFNyxneK');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
