/*
SQLyog Ultimate v13.1.5  (64 bit)
MySQL - 10.4.28-MariaDB : Database - advokat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`advokat` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `advokat`;

/*Table structure for table `tipe_user` */

DROP TABLE IF EXISTS `tipe_user`;

CREATE TABLE `tipe_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(255) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tipe_user` */

insert  into `tipe_user`(`id`,`tipe`,`level`) values 
(1,'Administrator',0),
(2,'Ketua Pengadilan',1),
(3,'Wakil Ketua Pengadilan',2),
(4,'Panitera',3),
(5,'Sekretaris',3),
(6,'Kepala Bagian Umum dan Keuangan',4),
(7,'Kepala Bagian Perencanaan dan Kepegawaian',4),
(8,'Panitera Muda Pidana',5),
(9,'Panitera Muda Perdata',5),
(10,'Panitera Muda Hukum',5),
(11,'Panitera Muda Tipikor',5),
(12,'Kepala Sub Bagian Tata Usaha dan Rumah Tangga',5),
(13,'Kepala Sub Bagian Keuangan dan Pelaporan',5),
(14,'Kepala Sub Bagian Rencana Program dan Anggaran',5),
(15,'Kepala Sub Bagian Kepegawaian dan Teknologi Informasi',5),
(16,'Pejabat Fungsional',6),
(17,'Pelaksana',7),
(18,'PPNPN',8),
(19,'Advokat',9);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(18) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` int(2) NOT NULL,
  `tipe_user` int(3) DEFAULT NULL,
  `dibuat_tgl` datetime DEFAULT current_timestamp(),
  `diubah_tgl` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`no_hp`,`email`,`level`,`tipe_user`,`dibuat_tgl`,`diubah_tgl`) values 
(1,'0_superadmin','c3VwM3I0ZG0xbl9wNHNzIw==','087822507250','agiefm@gmail.com',0,1,'2021-03-11 10:13:43','2021-03-11 10:13:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
