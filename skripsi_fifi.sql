/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.28-MariaDB : Database - skripsi_fifi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`skripsi_fifi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `skripsi_fifi`;

/*Table structure for table `about` */

DROP TABLE IF EXISTS `about`;

CREATE TABLE `about` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `about` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `about` */

insert  into `about`(`id`,`about`) values 
(1,'<p>OSIS SMAN - 1 Pandih Batu merupakan salah satu organisasi yang ada di SMAN - 1 Pandih Batu</p>');

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=664 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `akun` */

insert  into `akun`(`id`,`username`,`password`,`role`,`nama`,`tempat_lahir`,`tgl_lahir`,`jenis_kelamin`,`alamat`) values 
(1,'Admin','e3afed0047b08059d0fada10f400c1e5','Admin','Admin',NULL,NULL,NULL,NULL),
(6,'Pengurus','9dd30f31a3904bf113581e61ea7132e9','Pengurus','Yuli',NULL,NULL,NULL,NULL),
(8,'Pembina','2b05ddf9eea70d716c16e23df3c1554e','Pembina','Yudi',NULL,NULL,NULL,NULL);

/*Table structure for table `anggota_divisi` */

DROP TABLE IF EXISTS `anggota_divisi`;

CREATE TABLE `anggota_divisi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_akun` bigint(20) unsigned NOT NULL,
  `id_divisi` bigint(20) unsigned NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_akun` (`id_akun`),
  KEY `id_divisi` (`id_divisi`),
  CONSTRAINT `anggota_divisi_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anggota_divisi_ibfk_2` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `anggota_divisi` */

/*Table structure for table `arsip_sk` */

DROP TABLE IF EXISTS `arsip_sk`;

CREATE TABLE `arsip_sk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `arsip_sk` */

/*Table structure for table `divisi` */

DROP TABLE IF EXISTS `divisi`;

CREATE TABLE `divisi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `divisi` */

insert  into `divisi`(`id`,`nama_divisi`) values 
(1,'a');

/*Table structure for table `durasi_voting` */

DROP TABLE IF EXISTS `durasi_voting`;

CREATE TABLE `durasi_voting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `durasi_voting` */

/*Table structure for table `ekskul` */

DROP TABLE IF EXISTS `ekskul`;

CREATE TABLE `ekskul` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ekskul` */

insert  into `ekskul`(`id`,`nama`,`konten`,`slug`) values 
(1,'Sepak Bola','<p>tes</p><ul><li>tes</li><li>tes</li></ul><p>tes</p>','sepak_bola');

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `galeri` */

insert  into `galeri`(`id`,`foto`,`nama_kegiatan`,`keterangan`) values 
(1,'649e3552be52c.jpg','Dies Natalis FISIP UPR','tes tes tes tes');

/*Table structure for table `hasil_rapat` */

DROP TABLE IF EXISTS `hasil_rapat`;

CREATE TABLE `hasil_rapat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama_rapat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `hasil_rapat` */

insert  into `hasil_rapat`(`id`,`tanggal`,`nama_rapat`,`keterangan`,`foto`,`file`) values 
(2,'2023-06-30','tes','<p>tes</p>','649e9fdb9254a.png','649e9fdb91fc6.pdf');

/*Table structure for table `hasil_voting` */

DROP TABLE IF EXISTS `hasil_voting`;

CREATE TABLE `hasil_voting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_akun` bigint(20) unsigned NOT NULL,
  `id_kandidat` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_user` (`id_akun`),
  KEY `id_kandidat` (`id_kandidat`),
  CONSTRAINT `hasil_voting_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hasil_voting_ibfk_2` FOREIGN KEY (`id_kandidat`) REFERENCES `kandidat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `hasil_voting` */

/*Table structure for table `kandidat` */

DROP TABLE IF EXISTS `kandidat`;

CREATE TABLE `kandidat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ketua` bigint(20) unsigned NOT NULL,
  `id_wakil` bigint(20) unsigned NOT NULL,
  `no_urut` int(11) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kelas_ketua` varchar(255) NOT NULL,
  `kelas_wakil` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_ketua` (`id_ketua`),
  KEY `id_wakil` (`id_wakil`),
  CONSTRAINT `kandidat_ibfk_1` FOREIGN KEY (`id_ketua`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kandidat_ibfk_2` FOREIGN KEY (`id_wakil`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kandidat` */

/*Table structure for table `keuangan` */

DROP TABLE IF EXISTS `keuangan`;

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keuangan` */

insert  into `keuangan`(`id`,`tanggal`,`nominal`,`keterangan`,`jenis`) values 
(1,'2023-06-15',100000,'tes','Pemasukan'),
(2,'2023-06-25',200000,'tes lagi','Pemasukan'),
(3,'2023-06-25',50000,'tes','Pengeluaran');

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id`,`telp`,`email`,`alamat`,`ig`) values 
(2,'123456789123','osissmansapandihbatu@gmail.com','Jl. Patih Rumbih, Pangkoh Hulu, Kec. Pandih Batu, Kabupaten Pulang Pisau, Kalimantan Tengah 74872','osissmansapandihbatu');

/*Table structure for table `pemasukan` */

DROP TABLE IF EXISTS `pemasukan`;

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `sumber_dana` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pemasukan` */

insert  into `pemasukan`(`id`,`tanggal`,`nominal`,`sumber_dana`) values 
(1,'2023-06-30',100000,'abc'),
(2,'2020-10-10',10000,'a');

/*Table structure for table `pengeluaran` */

DROP TABLE IF EXISTS `pengeluaran`;

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bukti_kuitansi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengeluaran` */

insert  into `pengeluaran`(`id`,`tanggal`,`nominal`,`keterangan`,`bukti_kuitansi`) values 
(1,'2023-06-30',5000,'tes','649e5fd6d5dc2.jpg'),
(2,'2024-10-10',10000,'asd','649ee9194480a.png');

/*Table structure for table `struktur_inti` */

DROP TABLE IF EXISTS `struktur_inti`;

CREATE TABLE `struktur_inti` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_akun` bigint(20) unsigned NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_akun` (`id_akun`),
  CONSTRAINT `struktur_inti_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `struktur_inti` */

/*Table structure for table `visi_misi` */

DROP TABLE IF EXISTS `visi_misi`;

CREATE TABLE `visi_misi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `visi_misi` */

insert  into `visi_misi`(`id`,`visi`,`misi`) values 
(1,'<p>Menjadikan OSIS sebagai sarana pengembangan siswa</p>','<p>Menumbuhkan jiwa kewirausahaan siswa</p>');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
