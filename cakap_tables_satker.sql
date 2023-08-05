/*
SQLyog Ultimate v13.1.5  (64 bit)
MySQL - 10.3.31-MariaDB-0+deb10u1 : Database - banding
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`banding` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `banding`;

/*Table structure for table `satker` */

DROP TABLE IF EXISTS `satker`;

CREATE TABLE `satker` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pn_id` int(5) DEFAULT NULL,
  `db_name` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `satker` */

insert  into `satker`(`id`,`pn_id`,`db_name`,`nama`) values 
('1','0','','PT Bengkulu'),
('2','80','bengkulu','PN Bengkulu'),
('3','81','curup','PN Curup'),
('4','82','manna','PN Manna'),
('5','83','argamakmur','PN Argamakmur'),
('6','84','bintuhan','PN Bintuhan'),
('7','85','kepahiang','PN Kepahiang'),
('8','338','tais','PN Tais'),
('9','339','tubei','PN Tubei'),
('10','770','mukomuko','PN Mukomuko');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
