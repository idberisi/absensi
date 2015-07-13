-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2015 at 11:56 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absen`
--

CREATE TABLE IF NOT EXISTS `tabel_absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `nip_karyawan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `datang` time NOT NULL,
  `pulang` time NOT NULL,
  `peraturan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tabel_absen`
--

INSERT INTO `tabel_absen` (`id`, `id_lokasi`, `nip_karyawan`, `tanggal`, `datang`, `pulang`, `peraturan`) VALUES
(1, 1, '001', '2015-07-06', '07:20:00', '17:00:00', 1),
(2, 1, '002', '2015-07-06', '07:10:00', '16:00:00', 1),
(5, 2, '003', '2015-07-06', '08:30:00', '00:00:00', 1),
(6, 2, '004', '2015-07-06', '08:10:00', '16:00:00', 1),
(7, 5, '002', '2015-07-06', '04:00:00', '05:00:09', 1),
(8, 2, '002', '2015-07-06', '04:00:00', '18:00:00', 1),
(9, 9, '002', '2015-07-06', '04:00:00', '16:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE IF NOT EXISTS `tabel_karyawan` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`nip`, `nama`) VALUES
('001', 'Abdul'),
('002', 'Mail'),
('003', 'Budii'),
('004', 'Rendi'),
('005', 'Andra'),
('006', 'Andro'),
('007', 'Randu'),
('008', 'Ronita'),
('009', 'Rangga'),
('010', 'Rano'),
('011', 'Budi');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kerja`
--

CREATE TABLE IF NOT EXISTS `tabel_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(11) NOT NULL,
  `nip_karyawan` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip_karyawan` (`nip_karyawan`),
  UNIQUE KEY `nip_karyawan_2` (`nip_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tabel_kerja`
--

INSERT INTO `tabel_kerja` (`id`, `id_lokasi`, `nip_karyawan`) VALUES
(1, 1, '001'),
(2, 1, '002'),
(5, 2, '003'),
(6, 2, '004');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_lokasi`
--

CREATE TABLE IF NOT EXISTS `tabel_lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tabel_lokasi`
--

INSERT INTO `tabel_lokasi` (`id`, `nama`, `keterangan`) VALUES
(1, 'PT.SOA', '-'),
(2, 'PT.BCD', ''),
(3, 'PT.SMOE', '--'),
(4, 'PT.TROPICAL', '-'),
(5, 'PT.GARUT', '-'),
(9, 'SENGKUANG', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_peraturan`
--

CREATE TABLE IF NOT EXISTS `tabel_peraturan` (
  `id` int(11) NOT NULL,
  `waktu_masuk` time NOT NULL,
  `waktu_pulang` time NOT NULL,
  `waktu_kerja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_peraturan`
--

INSERT INTO `tabel_peraturan` (`id`, `waktu_masuk`, `waktu_pulang`, `waktu_kerja`) VALUES
(1, '08:00:00', '17:00:00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE IF NOT EXISTS `tabel_user` (
  `id` varchar(10) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_absensi`
--
CREATE TABLE IF NOT EXISTS `view_absensi` (
);
-- --------------------------------------------------------

--
-- Structure for view `view_absensi`
--
DROP TABLE IF EXISTS `view_absensi`;
-- in use(#1356 - View 'data_absensi.view_absensi' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
