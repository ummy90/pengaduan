-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table pengaduan_masyarakat.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pengaduan_masyarakat.kategori: ~12 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id`, `kategori`) VALUES
	(1, 'Prasarana Umum'),
	(2, 'Lingkungan Hidup'),
	(3, 'Perhubungan'),
	(4, 'Kesehatan'),
	(5, 'Pelanggaran Peraturan Daerah'),
	(6, 'Perizinan'),
	(7, 'Sosial'),
	(8, 'Perpajakan'),
	(9, 'Komunikasi dan Informatika'),
	(10, 'Kepegawaian'),
	(11, 'Pelayanan Kecamatan Kelurahan');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table pengaduan_masyarakat.masyarakat
CREATE TABLE IF NOT EXISTS `masyarakat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pengaduan_masyarakat.masyarakat: ~1 rows (approximately)
/*!40000 ALTER TABLE `masyarakat` DISABLE KEYS */;
INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `telepon`) VALUES
	(1, '340302281280001', 'Eko Priyo', 'ekopriyo', '$2y$10$QI7w6SZ4MlWt0BkgLDgeMujbkooOenIHIiSiC15drO1H53Pvnnd.2', '085643744344'),
	(2, '3402023001198000', 'Sartono', 'sartono', '$2y$10$BK.E/jQG5KHX/CEwPHM8VO3MslWtduxxqXUimtJJbPcQLHw.MuBOK', '081176876564');
/*!40000 ALTER TABLE `masyarakat` ENABLE KEYS */;

-- Dumping structure for table pengaduan_masyarakat.pengaduan
CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `idsubkategori` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi_pengaduan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pengaduan_masyarakat.pengaduan: ~2 rows (approximately)
/*!40000 ALTER TABLE `pengaduan` DISABLE KEYS */;
INSERT INTO `pengaduan` (`id`, `nik`, `idsubkategori`, `tanggal`, `isi_pengaduan`, `foto`, `status`) VALUES
	(1, '340302281280001', 1, '2023-01-29', 'lampu pju mati', './berkas/171.PNG', '1'),
	(2, '340302281280001', 5, '2023-01-29', 'tumpukan sampah di Depo Sampah Tamansari sudah sangat banyak dan sudah mulai keluar bau menyengat.', './berkas/aspd.png', '1'),
	(3, '3402023001198000', 9, '2023-01-30', 'parkir tidak beraturan di jalan nitikan, mohon untuk ditindaklanjuti', './berkas/IMG_9949.JPG', '2');
/*!40000 ALTER TABLE `pengaduan` ENABLE KEYS */;

-- Dumping structure for table pengaduan_masyarakat.petugas
CREATE TABLE IF NOT EXISTS `petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `level` enum('a','p') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pengaduan_masyarakat.petugas: ~3 rows (approximately)
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` (`id`, `nama`, `username`, `password`, `telepon`, `level`) VALUES
	(1, 'Administrator', 'minda', '$2y$10$/wEu2xh8nUeO1R.WqH2uYOoZWpPj2P7UVwdVfg0DrUHgrnaVLfl2m', '085643744344', 'a'),
	(2, 'Operator', 'ops', 'd62ab7bea13d774f3edd07dc98c2152749ae2d9f', '087848111102', 'p'),
	(3, 'Eko Priyo', 'eko', '$2y$10$mtsp10RaPhO7WcHAALMfzuDgz6jtoP2j2EsSziesynAvTV4JWmwaK', '09009', 'p');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;

-- Dumping structure for table pengaduan_masyarakat.subkategori
CREATE TABLE IF NOT EXISTS `subkategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkategori` int(11) DEFAULT NULL,
  `subkategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pengaduan_masyarakat.subkategori: ~10 rows (approximately)
/*!40000 ALTER TABLE `subkategori` DISABLE KEYS */;
INSERT INTO `subkategori` (`id`, `idkategori`, `subkategori`) VALUES
	(1, 1, 'Penerangan Jalan Umum'),
	(2, 1, 'Jalan'),
	(3, 1, 'Jembatan'),
	(4, 1, 'Saluran Air Hujan'),
	(5, 2, 'Sampah'),
	(6, 2, 'Limbah Industri'),
	(7, 3, 'Gangguan Trafic Light'),
	(8, 3, 'Kemacetan'),
	(9, 3, 'Pelanggaran Parkir'),
	(10, 11, 'Kecamatan Gondomanan');
/*!40000 ALTER TABLE `subkategori` ENABLE KEYS */;

-- Dumping structure for table pengaduan_masyarakat.tanggapan
CREATE TABLE IF NOT EXISTS `tanggapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpengaduan` int(11) DEFAULT NULL,
  `idpetugas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pengaduan_masyarakat.tanggapan: ~1 rows (approximately)
/*!40000 ALTER TABLE `tanggapan` DISABLE KEYS */;
INSERT INTO `tanggapan` (`id`, `idpengaduan`, `idpetugas`, `tanggal`, `tanggapan`) VALUES
	(1, 2, 1, '2023-01-29', 'TPST Piyungan statusnya baru overload, untuk sementara akan dilakukan penyemprotan disinvektan pada sampah di depo sampah tamansari.'),
	(2, 1, 1, '2023-01-30', 'segera akan dikerjakan'),
	(3, 3, 3, '2023-01-30', 'sudah ditertibkan');
/*!40000 ALTER TABLE `tanggapan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
