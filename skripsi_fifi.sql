/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `about` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `about` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `akun` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `arsip_sk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `dokumen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `divisi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `durasi_voting` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_berakhir` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `ekskul` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `galeri` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `hasil_rapat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama_rapat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `kontak` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `sumber_dana` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bukti_kuitansi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `visi_misi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `about` (`id`, `about`) VALUES
(1, '<p>OSIS SMAN - 1 Pandih Batu merupakan salah satu organisasi yang ada di SMAN - 1 Pandih Batu</p>');


INSERT INTO `akun` (`id`, `username`, `password`, `role`, `nama`) VALUES
(1, 'Admin', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', 'Admin');
INSERT INTO `akun` (`id`, `username`, `password`, `role`, `nama`) VALUES
(6, 'Pengurus', '9dd30f31a3904bf113581e61ea7132e9', 'Pengurus', 'Yuli');
INSERT INTO `akun` (`id`, `username`, `password`, `role`, `nama`) VALUES
(8, 'Pembina', '2b05ddf9eea70d716c16e23df3c1554e', 'Pembina', 'Yudi');





INSERT INTO `divisi` (`id`, `nama_divisi`) VALUES
(1, 'a');




INSERT INTO `ekskul` (`id`, `nama`, `konten`, `slug`) VALUES
(1, 'Sepak Bola', '<p>tes</p><ul><li>tes</li><li>tes</li></ul><p>tes</p>', 'sepak_bola');


INSERT INTO `galeri` (`id`, `foto`, `nama_kegiatan`, `keterangan`) VALUES
(1, '649e3552be52c.jpg', 'Dies Natalis FISIP UPR', 'tes tes tes tes');


INSERT INTO `hasil_rapat` (`id`, `tanggal`, `nama_rapat`, `keterangan`, `foto`, `file`) VALUES
(2, '2023-06-30', 'tes', '<p>tes</p>', '649e9fdb9254a.png', '649e9fdb91fc6.pdf');






INSERT INTO `keuangan` (`id`, `tanggal`, `nominal`, `keterangan`, `jenis`) VALUES
(1, '2023-06-15', 100000, 'tes', 'Pemasukan');
INSERT INTO `keuangan` (`id`, `tanggal`, `nominal`, `keterangan`, `jenis`) VALUES
(2, '2023-06-25', 200000, 'tes lagi', 'Pemasukan');
INSERT INTO `keuangan` (`id`, `tanggal`, `nominal`, `keterangan`, `jenis`) VALUES
(3, '2023-06-25', 50000, 'tes', 'Pengeluaran');

INSERT INTO `kontak` (`id`, `telp`, `email`, `alamat`, `ig`) VALUES
(2, '123456789123', 'osissmansapandihbatu@gmail.com', 'Jl. Patih Rumbih, Pangkoh Hulu, Kec. Pandih Batu, Kabupaten Pulang Pisau, Kalimantan Tengah 74872', 'osissmansapandihbatu');


INSERT INTO `pemasukan` (`id`, `tanggal`, `nominal`, `sumber_dana`) VALUES
(1, '2023-06-30', 100000, 'abc');
INSERT INTO `pemasukan` (`id`, `tanggal`, `nominal`, `sumber_dana`) VALUES
(2, '2020-10-10', 10000, 'a');


INSERT INTO `pengeluaran` (`id`, `tanggal`, `nominal`, `keterangan`, `bukti_kuitansi`) VALUES
(1, '2023-06-30', 5000, 'tes', '649e5fd6d5dc2.jpg');
INSERT INTO `pengeluaran` (`id`, `tanggal`, `nominal`, `keterangan`, `bukti_kuitansi`) VALUES
(2, '2024-10-10', 10000, 'asd', '649ee9194480a.png');




INSERT INTO `visi_misi` (`id`, `visi`, `misi`) VALUES
(1, '<p>Menjadikan OSIS sebagai sarana pengembangan siswa</p>', '<p>Menumbuhkan jiwa kewirausahaan siswa</p>');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;