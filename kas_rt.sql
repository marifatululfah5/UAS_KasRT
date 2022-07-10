-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kas_rt
-- CREATE DATABASE IF NOT EXISTS `kas_rt` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
-- USE `kas_rt`;

-- Dumping structure for table kas_rt.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL DEFAULT '0',
  `admin_password` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kas_rt.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id_admin`, `admin_name`, `admin_password`) VALUES
	(1, 'admin', '$2y$10$Mf/D8kEoLMpX.M3qVBr0cut8xpMoXW1aNMm8ovtfWouaYnhlzs5hq');

-- Dumping structure for table kas_rt.iuran

-- Dumping structure for table kas_rt.jenis_kelamin
CREATE TABLE IF NOT EXISTS `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jenis_kelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kas_rt.jenis_kelamin: ~2 rows (approximately)
INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
	(1, 'Laki - laki'),
	(2, 'Perempuan');

-- Dumping structure for table kas_rt.warga
CREATE TABLE IF NOT EXISTS `warga` (
  `id_warga` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_warga`),
  KEY `jenis_kelamin_id` (`jenis_kelamin_id`),
  CONSTRAINT `FK_warga_jenis_kelamin` FOREIGN KEY (`jenis_kelamin_id`) REFERENCES `jenis_kelamin` (`id_jenis_kelamin`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kas_rt.warga: ~2 rows (approximately)
INSERT INTO `warga` (`id_warga`, `nik`, `nama`, `jenis_kelamin_id`, `alamat`) VALUES
	(1, '1234', 'Marifatul', 2, 'Kp. Bandan'),
	(2, '1235', 'Yanto', 1, 'Cikini');
    
CREATE TABLE IF NOT EXISTS `iuran` (
  `id_iuran` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` tinytext DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(10,2) NOT NULL DEFAULT 0.00,
  `warga_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_iuran`),
  KEY `warga_id` (`warga_id`),
  CONSTRAINT `FK_iuran_warga` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id_warga`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table kas_rt.iuran: ~2 rows (approximately)
INSERT INTO `iuran` (`id_iuran`, `keterangan`, `tanggal`, `jumlah`, `warga_id`) VALUES
	(2, 'Bayar kas bulanan', '2022-07-09', 20000.00, 2),
	(3, 'bayar kas + wifi', '2022-07-09', 25000.00, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
