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

-- Dumping structure for table toko_online.checkout
CREATE TABLE IF NOT EXISTS `checkout` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int NOT NULL DEFAULT '0',
  `alamat` varchar(50) NOT NULL DEFAULT '0',
  `kota` varchar(50) NOT NULL DEFAULT '0',
  `kode_pos` int NOT NULL DEFAULT '0',
  `provinsi` varchar(50) NOT NULL DEFAULT '0',
  `metode_pembayaran` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_checkout_pembayaran` (`metode_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.checkout: ~0 rows (approximately)
DELETE FROM `checkout`;

-- Dumping structure for table toko_online.item_transaksi
CREATE TABLE IF NOT EXISTS `item_transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transaksi_id` int NOT NULL DEFAULT '0',
  `produk_id` int NOT NULL DEFAULT '0',
  `jml_beli` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_item_transaksi_transaksi` (`transaksi_id`),
  KEY `FK_item_transaksi_produk` (`produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.item_transaksi: ~0 rows (approximately)
DELETE FROM `item_transaksi`;

-- Dumping structure for table toko_online.kategori_produk
CREATE TABLE IF NOT EXISTS `kategori_produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.kategori_produk: ~3 rows (approximately)
DELETE FROM `kategori_produk`;
INSERT INTO `kategori_produk` (`id`, `nama`) VALUES
	(1, 'Tanpa Resep Dokter'),
	(2, 'Butuh Resep Dokter'),
	(3, 'Narkotika');

-- Dumping structure for table toko_online.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `produk_id` int NOT NULL DEFAULT '0',
  `jumlah` int NOT NULL,
  `total_harga` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `produk_id` (`produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.keranjang: ~2 rows (approximately)
DELETE FROM `keranjang`;
INSERT INTO `keranjang` (`id`, `user_id`, `produk_id`, `jumlah`, `total_harga`) VALUES
	(32, 17, 1, 3, 60000),
	(33, 17, 4, 1, 35000);

-- Dumping structure for table toko_online.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.pembayaran: ~5 rows (approximately)
DELETE FROM `pembayaran`;
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
  KEY `kategori_produk_id` (`kategori_produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.produk: ~6 rows (approximately)
DELETE FROM `produk`;
INSERT INTO `produk` (`id`, `kategori_produk_id`, `nama`, `harga`, `deskripsi`, `foto_produk`, `stok_produk`) VALUES
	(1, 2, 'Amoxcilin', 20000, 'obat hebat', 'amoxcilin.jpg', 100),
	(2, 1, 'Paracetamol', 10000, 'obat demam', 'paracetamol.png', 0),
	(4, 1, 'Scabimite', 35000, 'obat gudik', 'scabimite.webp', 9),
	(10, 1, 'Caladine', 20000, 'obat gatal', 'caladine.jpg', 21),
	(11, 3, 'ambacilin', 10000000, 'bawadehek', 'faros.jpg', 100),
	(12, 1, 'Agar Hitam Mas Rehan', 20000, 'wefaew', 'download.jpg', 54);

-- Dumping structure for table toko_online.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pembayaran_id` int NOT NULL,
  `alamat_pengiriman` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_harga` int NOT NULL,
  `no_hp` int NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_id` (`pembayaran_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.transaksi: ~0 rows (approximately)
DELETE FROM `transaksi`;

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
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.ulasan: ~1 rows (approximately)
DELETE FROM `ulasan`;
INSERT INTO `ulasan` (`id`, `produk_id`, `user_id`, `ulasan`, `rating`, `foto_ulasan`) VALUES
	(32, 1, 1, 'adfagag', 5, 'ulasan_20241021060247.jpg');

-- Dumping structure for table toko_online.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_online.user: ~3 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `role`) VALUES
	(1, 'rusdi', 'rusdi', 'rusdi@gmail.com', '12345', 2),
	(4, 'Faizzz', 'Admin', 'faiz@gmail.com', '12345', 1),
	(17, 'sutsulet', 'sutsulet', 'afefwseg@gmail.com', '12345', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
