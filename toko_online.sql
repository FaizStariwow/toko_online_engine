-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for toko_online
CREATE DATABASE IF NOT EXISTS `toko_online` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `toko_online`;

-- Dumping structure for table toko_online.kategori_produk
CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.kategori_produk: ~2 rows (approximately)
INSERT INTO `kategori_produk` (`id`, `nama`) VALUES
	(1, 'Tanpa Resep Dokter'),
	(2, 'Butuh Resep Dokter'),
	(3, 'Narkotika');

-- Dumping structure for table toko_online.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `produk_id` int NOT NULL DEFAULT '0',
  `jumlah` int NOT NULL,
  `total_harga` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `produk_id` (`produk_id`),
  CONSTRAINT `FK_keranjang_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_keranjang_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.keranjang: ~0 rows (approximately)

-- Dumping structure for table toko_online.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.pembayaran: ~4 rows (approximately)
INSERT INTO `pembayaran` (`id`, `nama`) VALUES
	(1, 'Cash'),
	(2, 'E-Wallet'),
	(3, 'Debit'),
	(4, 'Kredit'),
	(5, 'COD');

-- Dumping structure for table toko_online.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori_produk_id` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_produk` varchar(200) NOT NULL,
  `stok_produk` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_produk_id` (`kategori_produk_id`),
  CONSTRAINT `FK_kategori` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.produk: ~4 rows (approximately)
INSERT INTO `produk` (`id`, `kategori_produk_id`, `nama`, `harga`, `deskripsi`, `foto_produk`, `stok_produk`) VALUES
	(1, 2, 'Amoxcilin', 20000, 'obat hebat', 'amoxcilin.jpg', 10),
	(2, 1, 'Paracetamol', 10000, 'obat demam', 'paracetamol.png', 5),
	(4, 1, 'Scabimite', 35000, 'obat gudik', 'scabimite.webp', 10),
	(7, 1, 'yoga kebal cc', 20000, 'gusikdam', '64a1dcbd8722601f0f3ca5fe971489c2.jpg', 1000),
	(9, 2, 'yoga kebal cc', 20000, 'dasgs', 'fried-chicken-murah-5_169-removebg-preview 1.png', 9);

-- Dumping structure for table toko_online.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `produk_id` int NOT NULL,
  `pembayaran_id` int NOT NULL,
  `alamat_pengiriman` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_id` (`pembayaran_id`),
  KEY `user_id` (`user_id`),
  KEY `produk_id` (`produk_id`),
  CONSTRAINT `FK_transaksi_pembayaran` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_transaksi_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_transaksi_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.transaksi: ~0 rows (approximately)
INSERT INTO `transaksi` (`id`, `user_id`, `produk_id`, `pembayaran_id`, `alamat_pengiriman`, `total_harga`, `jumlah`, `tgl_transaksi`, `status`) VALUES
	(1, 4, 2, 2, 'malang', 50000, 7, '2024-09-09', 1);

-- Dumping structure for table toko_online.ulasan
CREATE TABLE IF NOT EXISTS `ulasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produk_id` int NOT NULL,
  `user_id` int NOT NULL,
  `ulasan` varchar(200) NOT NULL,
  `rating` int NOT NULL,
  `foto_ulasan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_id` (`produk_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.ulasan: ~0 rows (approximately)
INSERT INTO `ulasan` (`id`, `produk_id`, `user_id`, `ulasan`, `rating`, `foto_ulasan`) VALUES
	(1, 2, 3, 'mio baguss', 60, 'mio.jpg');

-- Dumping structure for table toko_online.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.user: ~4 rows (approximately)
INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `role`) VALUES
	(2, 'Argus', 'Atmin', 'atmin@gmail.com', '12345', 2),
	(3, 'Suki', 'Suki', 'suki@gmail.com', '12345', 2),
	(4, 'Faizzz', 'FaizSatrio', 'faiz@gmail.com', '12345', 1),
	(6, 'Radit', 'Radittumapel', 'alqaybulzakyyy@gmail.com', '12345', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
