/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80031
 Source Host           : localhost:3306
 Source Schema         : db_stok_barang

 Target Server Type    : MySQL
 Target Server Version : 80031
 File Encoding         : 65001

 Date: 14/04/2023 02:59:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_barang
-- ----------------------------
DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Table structure for tb_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kt` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Table structure for tb_transaksi_keluar
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaksi_keluar`;
CREATE TABLE `tb_transaksi_keluar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_barang` (`id_barang`),
  KEY `username` (`username`),
  CONSTRAINT `tb_transaksi_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id`),
  CONSTRAINT `tb_transaksi_keluar_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Table structure for tb_transaksi_masuk
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaksi_masuk`;
CREATE TABLE `tb_transaksi_masuk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_barang` (`id_barang`),
  KEY `username` (`username`),
  CONSTRAINT `tb_transaksi_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id`),
  CONSTRAINT `tb_transaksi_masuk_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

SET FOREIGN_KEY_CHECKS = 1;
