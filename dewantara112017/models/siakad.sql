/*
Navicat MySQL Data Transfer

Source Server         : DEWANTARA
Source Server Version : 50505
Source Host           : 153.92.8.180:3306
Source Database       : u9504986_stied_siakad2018

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-08 09:55:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for siakad_bimbingan
-- ----------------------------
DROP TABLE IF EXISTS `siakad_bimbingan`;
CREATE TABLE `siakad_bimbingan` (
  `id_siakad_bimbingan` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_bimbingan` enum('KKN','KKM') NOT NULL,
  `kode_akademik` varchar(10) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nip_dosen` varchar(25) NOT NULL,
  `nm_lokasi` varchar(45) NOT NULL,
  `almt_lokasi` varchar(100) NOT NULL,
  `ket_lokasi` text NOT NULL,
  PRIMARY KEY (`id_siakad_bimbingan`),
  KEY `kode_prodi` (`kode_prodi`) USING BTREE,
  KEY `nip_dosen` (`nip_dosen`) USING BTREE,
  CONSTRAINT `siakad_bimbingan_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `siakad_prodi` (`kode_prodi`),
  CONSTRAINT `siakad_bimbingan_ibfk_2` FOREIGN KEY (`nip_dosen`) REFERENCES `siakad_staff` (`nip_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_bimbingan_mhs
-- ----------------------------
DROP TABLE IF EXISTS `siakad_bimbingan_mhs`;
CREATE TABLE `siakad_bimbingan_mhs` (
  `id_siakad_bimbingan_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `id_siakad_bimbingan` int(11) NOT NULL,
  `nim_mhs` varchar(10) NOT NULL,
  PRIMARY KEY (`id_siakad_bimbingan_mhs`),
  KEY `nim_mhs` (`nim_mhs`) USING BTREE,
  KEY `id_siakad_bimbingan` (`id_siakad_bimbingan`) USING BTREE,
  CONSTRAINT `siakad_bimbingan_mhs_ibfk_1` FOREIGN KEY (`nim_mhs`) REFERENCES `siakad_mhs` (`nim_mhs`),
  CONSTRAINT `siakad_bimbingan_mhs_ibfk_2` FOREIGN KEY (`id_siakad_bimbingan`) REFERENCES `siakad_bimbingan` (`id_siakad_bimbingan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `siakad_jadwal`;
CREATE TABLE `siakad_jadwal` (
  `id_siakad_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akademik` varchar(10) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `hari_jadwal` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_siakad_ruang` int(2) NOT NULL,
  `kapasitas_ruang` int(3) NOT NULL,
  `tatap_muka` int(2) NOT NULL,
  `inisial_kelas_jadwal` varchar(45) NOT NULL,
  `nip_dosen` varchar(25) NOT NULL,
  PRIMARY KEY (`id_siakad_jadwal`),
  KEY `kode_prodi` (`kode_prodi`) USING BTREE,
  KEY `kode_mk` (`kode_mk`) USING BTREE,
  KEY `id_siakad_ruang` (`id_siakad_ruang`) USING BTREE,
  KEY `nip_dosen` (`nip_dosen`) USING BTREE,
  CONSTRAINT `siakad_jadwal_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `siakad_prodi` (`kode_prodi`),
  CONSTRAINT `siakad_jadwal_ibfk_2` FOREIGN KEY (`kode_mk`) REFERENCES `siakad_mk` (`kode_mk`),
  CONSTRAINT `siakad_jadwal_ibfk_3` FOREIGN KEY (`id_siakad_ruang`) REFERENCES `siakad_ruang` (`id_siakad_ruang`),
  CONSTRAINT `siakad_jadwal_ibfk_4` FOREIGN KEY (`nip_dosen`) REFERENCES `siakad_staff` (`nip_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=3738 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_jadwal_absen
-- ----------------------------
DROP TABLE IF EXISTS `siakad_jadwal_absen`;
CREATE TABLE `siakad_jadwal_absen` (
  `id_siakad_jadwal_ujian` int(11) NOT NULL AUTO_INCREMENT,
  `id_siakad_jadwal` int(11) NOT NULL,
  `nim_mhs` varchar(10) NOT NULL,
  `pertemuan_mk` int(2) NOT NULL,
  PRIMARY KEY (`id_siakad_jadwal_ujian`),
  KEY `id_siakad_jadwal` (`id_siakad_jadwal`) USING BTREE,
  KEY `nim_mhs` (`nim_mhs`) USING BTREE,
  CONSTRAINT `siakad_jadwal_absen_ibfk_1` FOREIGN KEY (`id_siakad_jadwal`) REFERENCES `siakad_jadwal` (`id_siakad_jadwal`),
  CONSTRAINT `siakad_jadwal_absen_ibfk_2` FOREIGN KEY (`nim_mhs`) REFERENCES `siakad_mhs` (`nim_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=486 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_jadwal_ampu
-- ----------------------------
DROP TABLE IF EXISTS `siakad_jadwal_ampu`;
CREATE TABLE `siakad_jadwal_ampu` (
  `id_siakad_jadwal_ampu` int(11) NOT NULL AUTO_INCREMENT,
  `id_siakad_jadwal` int(11) NOT NULL,
  `nip_dosen` varchar(25) NOT NULL,
  PRIMARY KEY (`id_siakad_jadwal_ampu`),
  KEY `id_siakad_jadwal` (`id_siakad_jadwal`) USING BTREE,
  KEY `nip_dosen` (`nip_dosen`) USING BTREE,
  CONSTRAINT `siakad_jadwal_ampu_ibfk_1` FOREIGN KEY (`id_siakad_jadwal`) REFERENCES `siakad_jadwal` (`id_siakad_jadwal`) ON DELETE CASCADE,
  CONSTRAINT `siakad_jadwal_ampu_ibfk_2` FOREIGN KEY (`nip_dosen`) REFERENCES `siakad_staff` (`nip_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_jadwal_ujian
-- ----------------------------
DROP TABLE IF EXISTS `siakad_jadwal_ujian`;
CREATE TABLE `siakad_jadwal_ujian` (
  `id_siakad_jadwal_ujian` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `id_siakad_jadwal` int(11) NOT NULL,
  `jenis_ujian` enum('UTS','UAS') NOT NULL,
  `tgl_ujian` date NOT NULL,
  `ujian_mulai` time NOT NULL,
  `ujian_selesai` time NOT NULL,
  `id_siakad_ruang` int(2) NOT NULL,
  `nip_dosen` varchar(25) NOT NULL,
  PRIMARY KEY (`id_siakad_jadwal_ujian`),
  KEY `id_siakad_jadwal` (`id_siakad_jadwal`) USING BTREE,
  KEY `id_siakad_ruang` (`id_siakad_ruang`) USING BTREE,
  KEY `nip_dosen` (`nip_dosen`) USING BTREE,
  CONSTRAINT `siakad_jadwal_ujian_ibfk_1` FOREIGN KEY (`id_siakad_jadwal`) REFERENCES `siakad_jadwal` (`id_siakad_jadwal`),
  CONSTRAINT `siakad_jadwal_ujian_ibfk_2` FOREIGN KEY (`id_siakad_ruang`) REFERENCES `siakad_ruang` (`id_siakad_ruang`),
  CONSTRAINT `siakad_jadwal_ujian_ibfk_3` FOREIGN KEY (`nip_dosen`) REFERENCES `siakad_staff` (`nip_staff`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_kelas
-- ----------------------------
DROP TABLE IF EXISTS `siakad_kelas`;
CREATE TABLE `siakad_kelas` (
  `id_siakad_kelas` int(3) NOT NULL AUTO_INCREMENT,
  `thn_akademik` year(4) NOT NULL,
  `inisial_kelas` varchar(10) NOT NULL,
  `nm_kelas` varchar(45) NOT NULL,
  PRIMARY KEY (`id_siakad_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_keu_koreksi
-- ----------------------------
DROP TABLE IF EXISTS `siakad_keu_koreksi`;
CREATE TABLE `siakad_keu_koreksi` (
  `id_sikad_keu_koreksi` bigint(20) NOT NULL AUTO_INCREMENT,
  `jns_koreksi` enum('Debit','Kredit') NOT NULL,
  `nim_mhs` varchar(10) NOT NULL,
  `tgl_koreksi` date NOT NULL,
  `nm_koreksi` varchar(45) NOT NULL,
  `nominal_koreksi` int(11) NOT NULL,
  PRIMARY KEY (`id_sikad_keu_koreksi`),
  KEY `nim_mhs` (`nim_mhs`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_keu_master
-- ----------------------------
DROP TABLE IF EXISTS `siakad_keu_master`;
CREATE TABLE `siakad_keu_master` (
  `id_siakad_keu_master` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akademik` varchar(5) NOT NULL,
  `nm_tagihan` varchar(100) NOT NULL,
  `nominal_biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_siakad_keu_master`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_keu_paket
-- ----------------------------
DROP TABLE IF EXISTS `siakad_keu_paket`;
CREATE TABLE `siakad_keu_paket` (
  `id_siakad_keu_paket` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akademik` varchar(5) NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  PRIMARY KEY (`id_siakad_keu_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_keu_paket_komp
-- ----------------------------
DROP TABLE IF EXISTS `siakad_keu_paket_komp`;
CREATE TABLE `siakad_keu_paket_komp` (
  `id_siakad_keu_paket_komp` int(11) NOT NULL AUTO_INCREMENT,
  `id_siakad_keu_paket` int(11) NOT NULL,
  `id_siakad_keu_master` int(11) NOT NULL,
  PRIMARY KEY (`id_siakad_keu_paket_komp`),
  KEY `id_siakad_keu_paket` (`id_siakad_keu_paket`) USING BTREE,
  KEY `id_siakad_keu_master` (`id_siakad_keu_master`) USING BTREE,
  CONSTRAINT `siakad_keu_paket_komp_ibfk_1` FOREIGN KEY (`id_siakad_keu_paket`) REFERENCES `siakad_keu_paket` (`id_siakad_keu_paket`),
  CONSTRAINT `siakad_keu_paket_komp_ibfk_2` FOREIGN KEY (`id_siakad_keu_master`) REFERENCES `siakad_keu_master` (`id_siakad_keu_master`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_keu_pendaftaran
-- ----------------------------
DROP TABLE IF EXISTS `siakad_keu_pendaftaran`;
CREATE TABLE `siakad_keu_pendaftaran` (
  `id_siakad_keu_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,
  `thn_akademik` year(4) NOT NULL,
  `nm_pendaftaran` varchar(100) NOT NULL,
  `biaya_pendaftaran` int(11) NOT NULL,
  PRIMARY KEY (`id_siakad_keu_pendaftaran`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_kurikulum
-- ----------------------------
DROP TABLE IF EXISTS `siakad_kurikulum`;
CREATE TABLE `siakad_kurikulum` (
  `id_siakad_kurikulum` int(2) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `kode_kurikulum` varchar(10) NOT NULL,
  `nm_kurikulum` varchar(45) NOT NULL,
  PRIMARY KEY (`id_siakad_kurikulum`),
  KEY `kode_prodi` (`kode_prodi`) USING BTREE,
  CONSTRAINT `siakad_kurikulum_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `siakad_prodi` (`kode_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_mhs
-- ----------------------------
DROP TABLE IF EXISTS `siakad_mhs`;
CREATE TABLE `siakad_mhs` (
  `nim_mhs` varchar(10) NOT NULL,
  `npm_mhs` varchar(45) NOT NULL,
  `noreg_pmb` varchar(20) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nm_mhs` varchar(45) NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `kode_akademik` varchar(10) NOT NULL,
  `bts_akademik` varchar(10) NOT NULL,
  `kelamin_mhs` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_mhs` varchar(20) NOT NULL,
  `tgl_mhs` date NOT NULL,
  `agama_mhs` enum('Islam','Protestan','Katolik','Hindu','Budha','Konghucu') NOT NULL,
  `almt_mhs` varchar(100) NOT NULL,
  `kota_mhs` varchar(20) NOT NULL,
  `kodepos_mhs` varchar(10) NOT NULL,
  `email_mhs` varchar(45) NOT NULL,
  `hp_mhs` varchar(20) NOT NULL,
  `telp_mhs` varchar(20) NOT NULL,
  `status_mhs` enum('Aktif','Tidak','Cuti','Lulus') NOT NULL,
  `nip_dosen` varchar(25) NOT NULL,
  `img_mhs` varchar(45) NOT NULL,
  `pass_mhs` varchar(45) NOT NULL,
  `tgl_lulus_mhs` date NOT NULL,
  `no_transkrip` varchar(45) NOT NULL,
  `status_masuk` enum('Baru','Pindah') NOT NULL DEFAULT 'Baru',
  `style_mhs` varchar(45) NOT NULL DEFAULT 'theme_light',
  PRIMARY KEY (`nim_mhs`),
  KEY `kode_prodi` (`kode_prodi`) USING BTREE,
  KEY `nip_dosen` (`nip_dosen`) USING BTREE,
  CONSTRAINT `siakad_mhs_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `siakad_prodi` (`kode_prodi`),
  CONSTRAINT `siakad_mhs_ibfk_2` FOREIGN KEY (`nip_dosen`) REFERENCES `siakad_staff` (`nip_staff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_mhs_adm
-- ----------------------------
DROP TABLE IF EXISTS `siakad_mhs_adm`;
CREATE TABLE `siakad_mhs_adm` (
  `nim_mhs` varchar(20) NOT NULL,
  `kode_akademik` varchar(10) NOT NULL,
  KEY `nim_mhs` (`nim_mhs`) USING BTREE,
  CONSTRAINT `siakad_mhs_adm_ibfk_1` FOREIGN KEY (`nim_mhs`) REFERENCES `siakad_mhs` (`nim_mhs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_mhs_pmb
-- ----------------------------
DROP TABLE IF EXISTS `siakad_mhs_pmb`;
CREATE TABLE `siakad_mhs_pmb` (
  `id_siakad_mhs_pmb` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `id_siakad_kelas` int(11) NOT NULL,
  `tgl_reg_pmb` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noreg_pmb` varchar(20) NOT NULL,
  `nm_cmhs` varchar(45) NOT NULL,
  `kelamin_cmhs` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_cmhs` varchar(20) NOT NULL,
  `tgl_cmhs` date NOT NULL,
  `agama_cmhs` enum('Islam','Protestan','Katolik','Hindu','Budha','Konghucu') NOT NULL,
  `almt_cmhs` varchar(100) NOT NULL,
  `kota_cmhs` varchar(20) NOT NULL,
  `kodepos_cmhs` varchar(10) NOT NULL,
  `email_cmhs` varchar(45) NOT NULL,
  `hp_cmhs` varchar(20) NOT NULL,
  `telp_cmhs` varchar(20) NOT NULL,
  `asal_pend` varchar(45) NOT NULL,
  `jurusan_pend` varchar(45) NOT NULL,
  `no_ijazah_pend` varchar(20) NOT NULL,
  `tgl_ijazah_pend` date NOT NULL,
  `nil_ijazah_pend` varchar(5) NOT NULL,
  `status_pmb` enum('Terima','Baru','Online','Tolak') NOT NULL DEFAULT 'Baru',
  `id_siakad_keu_rek` int(11) NOT NULL,
  `id_siakad_keu_pendaftaran` int(11) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `nm_transfer` varchar(45) NOT NULL,
  `img_bukti_transfer` varchar(100) NOT NULL,
  `img_pasfoto` varchar(100) NOT NULL,
  `img_ijazah` varchar(100) NOT NULL,
  `img_transkrip` varchar(100) NOT NULL,
  `img_pindah` varchar(100) NOT NULL,
  `status_cmhs` enum('Baru','Pindah') NOT NULL DEFAULT 'Baru',
  PRIMARY KEY (`id_siakad_mhs_pmb`),
  KEY `kode_prodi` (`kode_prodi`) USING BTREE,
  CONSTRAINT `siakad_mhs_pmb_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `siakad_prodi` (`kode_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=3093 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_mhs_studi
-- ----------------------------
DROP TABLE IF EXISTS `siakad_mhs_studi`;
CREATE TABLE `siakad_mhs_studi` (
  `id_siakad_mhs_studi` bigint(20) NOT NULL AUTO_INCREMENT,
  `nim_mhs` varchar(20) NOT NULL,
  `id_siakad_jadwal` int(11) NOT NULL,
  `kode_akademik` varchar(10) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `status_studi` enum('Baru','Ulang') NOT NULL,
  `nil_tugas` int(3) NOT NULL,
  `nil_uts` int(3) NOT NULL,
  `nil_uas` int(3) NOT NULL,
  `nil_akhir` int(3) NOT NULL,
  `nilai_angka_studi` float(3,2) NOT NULL,
  `nilai_huruf_studi` varchar(2) NOT NULL,
  `status_nil_mk` enum('Lulus','Tidak') NOT NULL DEFAULT 'Tidak',
  `status_val_studi` enum('Valid','Baru') NOT NULL DEFAULT 'Baru',
  PRIMARY KEY (`id_siakad_mhs_studi`),
  KEY `nim_mhs` (`nim_mhs`) USING BTREE,
  KEY `id_siakad_jadwal` (`id_siakad_jadwal`) USING BTREE,
  CONSTRAINT `siakad_mhs_studi_ibfk_1` FOREIGN KEY (`id_siakad_jadwal`) REFERENCES `siakad_jadwal` (`id_siakad_jadwal`),
  CONSTRAINT `siakad_mhs_studi_ibfk_2` FOREIGN KEY (`nim_mhs`) REFERENCES `siakad_mhs` (`nim_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=111971 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_mk_paket
-- ----------------------------
DROP TABLE IF EXISTS `siakad_mk_paket`;
CREATE TABLE `siakad_mk_paket` (
  `id_siakad_mk_paket` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `id_siakad_kurikulum` int(2) NOT NULL,
  `nm_paket_mk` varchar(100) NOT NULL,
  `status_paket_mk` enum('Aktif','Tidak') NOT NULL,
  PRIMARY KEY (`id_siakad_mk_paket`),
  KEY `id_siakad_kurikulum` (`id_siakad_kurikulum`) USING BTREE,
  CONSTRAINT `siakad_mk_paket_ibfk_1` FOREIGN KEY (`id_siakad_kurikulum`) REFERENCES `siakad_kurikulum` (`id_siakad_kurikulum`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_mk_syarat
-- ----------------------------
DROP TABLE IF EXISTS `siakad_mk_syarat`;
CREATE TABLE `siakad_mk_syarat` (
  `id_siakad_mk_syarat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `kode_mk_main` varchar(10) NOT NULL,
  `kode_mk_syarat` varchar(10) NOT NULL,
  `nil_mk_syarat` enum('A','B+','B','C+','C','D+','D','E','F') NOT NULL,
  `nil_angka_mk_syarat` float(4,2) NOT NULL,
  PRIMARY KEY (`id_siakad_mk_syarat`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_nilai_predikat
-- ----------------------------
DROP TABLE IF EXISTS `siakad_nilai_predikat`;
CREATE TABLE `siakad_nilai_predikat` (
  `id_siakad_nilai_predikat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_akademik` varchar(10) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `nm_predikat` varchar(20) NOT NULL,
  `bts_bobot_awal` float(4,2) NOT NULL,
  `bts_bobot_akhir` float(4,2) NOT NULL,
  PRIMARY KEY (`id_siakad_nilai_predikat`),
  KEY `kode_prodi` (`kode_prodi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_nilai_rentang
-- ----------------------------
DROP TABLE IF EXISTS `siakad_nilai_rentang`;
CREATE TABLE `siakad_nilai_rentang` (
  `id_siakad_nilai_rentang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `maks_sks` int(2) NOT NULL,
  `ip_bobot_awal` float(4,2) NOT NULL,
  `ip_bobot_akhir` float(4,2) NOT NULL,
  PRIMARY KEY (`id_siakad_nilai_rentang`),
  KEY `kode_prodi` (`kode_prodi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_prodi_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `siakad_prodi_jabatan`;
CREATE TABLE `siakad_prodi_jabatan` (
  `id_siakad_prodi_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `id_siakad_prodi_struk_jbt` int(2) NOT NULL,
  `nip_prodi` varchar(25) NOT NULL,
  `prodi_jbt_awal` varchar(10) NOT NULL,
  `prodi_jbt_akhir` varchar(10) NOT NULL,
  PRIMARY KEY (`id_siakad_prodi_jabatan`),
  KEY `id_siakad_prodi_struk_jbt` (`id_siakad_prodi_struk_jbt`) USING BTREE,
  KEY `kode_prodi` (`kode_prodi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_prodi_struk_jbt
-- ----------------------------
DROP TABLE IF EXISTS `siakad_prodi_struk_jbt`;
CREATE TABLE `siakad_prodi_struk_jbt` (
  `id_siakad_prodi_struk_jbt` int(2) NOT NULL AUTO_INCREMENT,
  `kode_prodi` varchar(10) NOT NULL,
  `nm_prodi_jabatan` varchar(45) NOT NULL,
  `def_pos_surat` enum('Kanan','Kiri','Tidak') NOT NULL DEFAULT 'Tidak',
  PRIMARY KEY (`id_siakad_prodi_struk_jbt`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_pt
-- ----------------------------
DROP TABLE IF EXISTS `siakad_pt`;
CREATE TABLE `siakad_pt` (
  `kode_pt` varchar(10) NOT NULL,
  `nm_pt` varchar(45) NOT NULL,
  `tgl_pt` date NOT NULL,
  `sk_pt` varchar(10) NOT NULL,
  `tgl_sk_pt` date NOT NULL,
  `almt_pt` varchar(100) NOT NULL,
  `kota_pt` varchar(20) NOT NULL,
  `kodepos_pt` varchar(10) NOT NULL,
  `telp_pt` varchar(20) NOT NULL,
  `fax_pt` varchar(20) NOT NULL,
  `email_pt` varchar(45) NOT NULL,
  `web_pt` varchar(45) NOT NULL,
  `logo_pt` varchar(45) NOT NULL,
  PRIMARY KEY (`kode_pt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_pt_struk_jbt
-- ----------------------------
DROP TABLE IF EXISTS `siakad_pt_struk_jbt`;
CREATE TABLE `siakad_pt_struk_jbt` (
  `id_siakad_pt_struk_jbt` int(2) NOT NULL AUTO_INCREMENT,
  `nm_struktur_jabatan` varchar(45) NOT NULL,
  `def_pos_laporan` enum('Kanan','Kiri','Tidak') NOT NULL,
  PRIMARY KEY (`id_siakad_pt_struk_jbt`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for siakad_ruang
-- ----------------------------
DROP TABLE IF EXISTS `siakad_ruang`;
CREATE TABLE `siakad_ruang` (
  `id_siakad_ruang` int(2) NOT NULL AUTO_INCREMENT,
  `inisial_ruangan` varchar(10) NOT NULL,
  `nm_ruangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_siakad_ruang`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
