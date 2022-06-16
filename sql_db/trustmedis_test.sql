/*
 Navicat Premium Data Transfer

 Source Server         : mysql_local
 Source Server Type    : MySQL
 Source Server Version : 50718
 Source Host           : localhost:3306
 Source Schema         : trustmedis

 Target Server Type    : MySQL
 Target Server Version : 50718
 File Encoding         : 65001

 Date: 16/06/2022 10:09:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hari
-- ----------------------------
DROP TABLE IF EXISTS `hari`;
CREATE TABLE `hari`  (
  `id` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hari
-- ----------------------------
INSERT INTO `hari` VALUES (1, 'Senin');
INSERT INTO `hari` VALUES (2, 'Selasa');
INSERT INTO `hari` VALUES (3, 'Rabu');
INSERT INTO `hari` VALUES (4, 'Kamis');
INSERT INTO `hari` VALUES (5, 'Jum\'at');
INSERT INTO `hari` VALUES (6, 'Sabtu');
INSERT INTO `hari` VALUES (7, 'Minggu');

-- ----------------------------
-- Table structure for jadwal_dokter
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_dokter`;
CREATE TABLE `jadwal_dokter`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  `id_hari` int(11) NULL DEFAULT NULL,
  `jam_mulai` time NULL DEFAULT NULL,
  `jam_berakhir` time NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_pegawai`(`id_pegawai`) USING BTREE,
  INDEX `id_hari`(`id_hari`) USING BTREE,
  CONSTRAINT `jadwal_dokter_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `jadwal_dokter_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal_dokter
-- ----------------------------
INSERT INTO `jadwal_dokter` VALUES (1, 1, 1, '08:00:00', '10:00:00', '2022-06-16 09:30:13', '2022-06-16 09:30:16');
INSERT INTO `jadwal_dokter` VALUES (3, 7, 3, '09:00:00', '12:00:00', '2022-06-16 02:59:37', '2022-06-16 02:59:37');
INSERT INTO `jadwal_dokter` VALUES (4, 3, 1, '10:00:00', '12:00:00', '2022-06-16 03:04:34', '2022-06-16 03:04:34');

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_poli` int(10) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_poli`(`id_poli`) USING BTREE,
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
INSERT INTO `pegawai` VALUES (1, 3, 'Dr. Yaeger', '2022-06-16 02:01:35', '2022-06-16 02:01:35');
INSERT INTO `pegawai` VALUES (2, 1, 'Dr. Nagita', '2022-06-16 02:16:51', '2022-06-16 02:16:51');
INSERT INTO `pegawai` VALUES (3, 1, 'Dr. Rafi', '2022-06-16 02:17:35', '2022-06-16 02:17:35');
INSERT INTO `pegawai` VALUES (6, 5, 'Dr. Tarti', '2022-06-16 02:18:14', '2022-06-16 02:18:14');
INSERT INTO `pegawai` VALUES (7, 5, 'Dr. Faisal', '2022-06-16 02:18:22', '2022-06-16 02:18:22');

-- ----------------------------
-- Table structure for poli
-- ----------------------------
DROP TABLE IF EXISTS `poli`;
CREATE TABLE `poli`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of poli
-- ----------------------------
INSERT INTO `poli` VALUES (1, 'Poli Mata', '2022-06-16 01:04:33', '2022-06-16 01:04:33');
INSERT INTO `poli` VALUES (3, 'Poli Gigi', '2022-06-16 01:27:50', '2022-06-16 01:27:56');
INSERT INTO `poli` VALUES (4, 'Poli Kandungan', '2022-06-16 02:17:11', '2022-06-16 02:17:11');
INSERT INTO `poli` VALUES (5, 'Poli Penyakit Dalam', '2022-06-16 02:17:19', '2022-06-16 02:17:19');

SET FOREIGN_KEY_CHECKS = 1;
