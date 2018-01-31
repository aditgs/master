/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : dewantara2018

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2018-01-29 13:35:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `KodeJ` varchar(25) DEFAULT NULL,
  `Jenis` varchar(255) DEFAULT NULL,
  `prodi` enum('semua','akuntansi','manajemen') DEFAULT 'semua',
  `is_akuntansi` enum('1','0') DEFAULT NULL,
  `is_manajemen` enum('1','0') DEFAULT NULL,
  `iscicilan` enum('1','0') DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES ('1', '01', 'SPP/BULAN', 'semua', '1', '1', '1', null, null);
INSERT INTO `jenis` VALUES ('2', '02', 'REGISTRASI', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('3', '03', 'OSPEK', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('4', '04', 'ALMAMATER', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('5', '05', 'KTM', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('6', '06', 'ASURANSI', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('7', '07', 'KKN', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('8', '08', 'KKM', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('9', '09', 'BIMBINGAN SKRIPSI', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('10', '10', 'PAD*', 'akuntansi', '1', '0', '0', null, null);
INSERT INTO `jenis` VALUES ('11', '11', 'PAI*', 'akuntansi', '1', '0', '0', null, null);
INSERT INTO `jenis` VALUES ('12', '12', 'KOMPUTER AKUNTANSI*', 'akuntansi', '1', '0', '0', null, null);
INSERT INTO `jenis` VALUES ('13', '13', 'AUDITING *', 'akuntansi', '1', '0', '0', null, null);
INSERT INTO `jenis` VALUES ('14', '14', 'PAJAK*', 'akuntansi', '1', '0', '0', null, null);
INSERT INTO `jenis` VALUES ('15', '15', 'SKPI', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('16', '16', 'SEMESTER PENDEK / MK', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('17', '17', 'ETS / MK', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('18', '18', 'EAS / MK', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('19', '19', 'UJIAN PROPOSAL', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('20', '20', 'UJIAN SKRIPSI', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('21', '21', 'SENAT', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('22', '22', 'YUDISIUM', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('23', '23', 'WISUDA', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('24', '24', 'TOGA', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('25', '25', 'IJAZAH', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('26', '26', 'PERPUSTAKAAN', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('27', '27', 'LABORATORIUM', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('28', '28', 'GEDUNG', 'semua', '1', '1', '1', null, null);
INSERT INTO `jenis` VALUES ('29', '29', 'DAFTAR ULANG', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('30', '30', 'KALENDER', 'semua', '1', '1', '0', null, null);
INSERT INTO `jenis` VALUES ('31', '31', 'KONVERSI NILAI / MK', 'semua', '1', '1', '0', null, null);
