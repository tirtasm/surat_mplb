-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2023 at 01:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int NOT NULL,
  `no_surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_input` text NOT NULL,
  `tanggal_surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dari` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `uraian` text NOT NULL,
  `kode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `keterangan` text NOT NULL,
  `file_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `no_surat`, `tanggal_input`, `tanggal_surat`, `dari`, `uraian`, `kode`, `keterangan`, `file_surat`) VALUES
(106, '', '26-10-2023', '2023-10-21', '', '', '', '', '372-Article Text-889-1-10-20210705.pdf'),
(107, 'kj', '26-10-2023', '2023-10-30', 'ojk', 'oijk', 'ojk', 'oij', '372-Article Text-889-1-10-20210705.pdf'),
(108, 'ds', '27-10-2023', '2023-10-26', 'dari', 'asdf', 'asfdf', 'asdf', 'Purple and Orange Business Workplan Presentation.pdf'),
(109, 'hgvnb', '07-11-2023', '2023-11-24', 'cfgv', 'fgh', 'tgh', 'fgh', '1.PDF'),
(110, 'ok', '07-11-2023', '2023-11-15', 'ok', 'ok', 'ok', 'ok', 'DOC-20231023-WA0010..pdf'),
(111, 'he', '07-11-2023', '2023-11-07', 'ads', 'sa', 'okok', 'okok', 'DOC-20231023-WA0010. (3).pdf'),
(112, 's', '07-11-2023', '2023-11-08', 'das', 'ads', 'dsa', 'sad', 'DOC-20231023-WA0010..pdf'),
(113, 'df', '07-11-2023', '2023-11-15', 'asd', 'as', 'sad', 'Keluar', 'DOC-20231023-WA0010..pdf'),
(114, '001', '08-11-2023', '2006-10-17', 'SMKN 1 KEBUMEN', 'AESXDCFVGHJMK', 'RCTCYGVHBJK', 'Keluar', 'DOC-20231023-WA0010. (2).pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
