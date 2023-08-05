/*
SQLyog Ultimate v13.1.5  (64 bit)
MySQL - 10.1.19-MariaDB : Database - monitor_absen
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kepegawaian` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kepegawaian`;

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) NOT NULL,
  `NIK` varchar(16) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `EmailPegawai` varchar(100) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `jabatan_sikep` varbinary(255) DEFAULT NULL,
  `pangkat` varchar(20) DEFAULT NULL,
  `id_gol` int(2) DEFAULT NULL,
  `gol` varchar(5) DEFAULT NULL,
  `TMTGolongan` date DEFAULT NULL,
  `tmt_jabatan` date DEFAULT NULL,
  `tmt_pns` date DEFAULT NULL,
  `masa_kerja` int(3) DEFAULT NULL,
  `nama_unit_kerja` varchar(100) DEFAULT NULL,
  `id_pendidikan` int(2) DEFAULT NULL,
  `pendidikan` varchar(5) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `nomor_handphone` varchar(13) DEFAULT NULL,
  `alamat_rumah` varchar(255) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `status_pegawai` int(1) DEFAULT NULL,
  `status_pegawai_text` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=44335 DEFAULT CHARSET=utf8;

/*Data for the table `pegawai` */

insert  into `pegawai`(`id`,`nip`,`NIK`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`EmailPegawai`,`id_jabatan`,`jabatan_sikep`,`pangkat`,`id_gol`,`gol`,`TMTGolongan`,`tmt_jabatan`,`tmt_pns`,`masa_kerja`,`nama_unit_kerja`,`id_pendidikan`,`pendidikan`,`agama`,`nomor_handphone`,`alamat_rumah`,`status`,`status_pegawai`,`status_pegawai_text`,`created_at`,`updated_at`) values 
(47,'195302102011000029','000','SAMSUL HADI, S.H., M.Sc.','Pria','Indonesia','1953-02-10','',256,'Hakim Ad Hoc Tipikor','Tanpa Golongan',87,'-','2011-04-12','2022-03-09','1990-01-01',0,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','085641777296','Jl. Pembangunan Kota Bengkulu','aktif',2,'PNS Non-Aktif, Pejabat Negara Aktif','2023-03-03 11:03:20','2023-03-03 11:03:20'),
(170,'196309181985031004','1771011809630002','TURIJAN, S.H.','Pria','Cilacap','1963-09-18','turijan@mahkamahagung.go.id',291,'Panitera Muda','Penata Tingkat I',6,'III/d','2007-10-01','2016-06-22','1986-09-11',34,'Panitera Muda Hukum',8,'S-1','Islam','08117317392',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-03 10:20:26','2023-03-03 10:20:26'),
(212,'196105301992121001','1471073005610002','DEDY HERMAWAN, S.H., M.H.','Pria','Padang','1961-05-30','dedy@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2021-07-01','1994-09-01',28,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','082179138118','KH.Nasution Komp.BLPP/BPTP','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(2925,'196211161992121001','3322101611620001','H. SUMEDI, S.H., M.H.','Pria','Pati','1962-11-16','sumedii@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2022-02-18','1994-08-01',28,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','082237688621',NULL,'aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(3286,'196606181992121001','3374131806660001','Dr. BAMBANG EKAPUTRA, S.H., M.H.','Pria','Bengkulu','1966-06-18','bambangekaputra@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2022-02-18','1994-07-01',28,'Pengadilan Tinggi Bengkulu',10,'S-3','Islam','081369181820',NULL,'aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(3325,'198306032009121004','1771010306830002','MUHAMMAD PRANA CAHAYA, S.Kom.','Pria','Bengkulu','1983-06-03','mpranacahaya@mahkamahagung.go.id',180,'Analis Kepegawaian Ahli Pertama','Penata Muda Tingkat ',8,'III/b','2018-04-01','2021-04-01','2011-05-01',9,'Pengadilan Tinggi Bengkulu',8,'S-1','Islam','085286010545',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(3468,'197506292005021001','1771062906750001','M ALI EL FAHMI, S.T.','Pria','Bengkulu','1975-06-29','elfahmi@mahkamahagung.go.id',21,'Kepala Sub Bagian','Penata Tingkat I',6,'III/d','2017-04-01','2015-12-29','2006-02-01',14,'Sub Bagian Kepegawaian Dan Teknologi Informasi',8,'S-1','Islam','082377253636',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(3606,'196504271986031002','3674062704650006','SYAHRI ADAMY, S.H., M.H.','Pria','Lampung Utara','1965-04-27','syahri.adamy@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2020-04-01','2022-02-18','1987-06-01',29,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','081280586181','Jalan Sei Betung 2 No.1 Siring Agung Pakjo ','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(4055,'196210081981032001','1403014810624883','Hj. MAHTUM SAADIAH, S.H., M.H.','Wanita','Bukittinggi','1962-10-08','mahtum.saadiah@mahkamahagung.go.id',78,'Panitera Tingkat Banding','Pembina Utama Muda',3,'IV/c','2021-04-01','2020-12-28','1982-06-01',32,'Panitera',9,'S-2','Islam','081276532779','Jalan Seruni No.07','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(5791,'195605241985031002','3171052405560002','PRAMODANA KUMARA KUSUMAH ATMADJA, S.H., M.Hum','Pria','Jakarta Pusat','1956-05-24','pramodanakka@mahkamahagung.go.id',290,'Ketua Pengadilan','Pembina Utama',1,'IV/e','2017-04-01','2022-02-08','1986-05-01',32,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','081381589559','Jl. Rudus no.43 Sekip','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(7071,'196102281983032004','1703076802610001','SUSYANTI, S.H.','Wanita','Bengkulu Utara','1961-02-28','susyantish@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2008-04-01','2017-09-26','1984-06-01',36,'Panitera',8,'S-1','Islam','085267678310',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(8319,'197010121992032001','1771025210700003','Hj. YURNI HENDARWATI, S.Pd.','Wanita','Bengkulu Selatan','1970-10-12','yurnihendarwati@mahkamahagung.go.id',17,'Kepala Bagian','Pembina Tingkat I',4,'IV/b','2021-10-01','2017-07-03','1993-10-01',25,'Bagian Perencanaan Dan Kepegawaian',8,'S-1','Islam','081278337624',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(8676,'196209191992122001','1371035909620003','YOSE ANA ROSLINDA, S.H., M.H.','Wanita','Pesisir Selatan','1962-09-19','yoseanaroslinda@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2022-06-20','1994-10-01',28,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','081277261211','Jl. Serayu Padang Harapan Kota Bengkulu','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(9318,'196001181985031006','1271201801600001','JEFERSON TARIGAN, S.H., M.H.','Pria','Asahan','1960-01-18','jeferson@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama',1,'IV/e','2017-10-01','2021-02-23','1986-10-01',32,'Pengadilan Tinggi Bengkulu',9,'S-2','Katholik','081288079067',NULL,'aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(9742,'196003101985121001','1207281003600003','Dr. PONTAS EFENDI, S.H., M.H.','Pria','Tapanuli Utara','1960-03-10','pontas.efendi@mahkamahagung.go.id',304,'Wakil Ketua Pengadilan','Pembina Utama',1,'IV/e','2018-04-01','2022-06-10','1987-02-01',32,'Pengadilan Tinggi Bengkulu',9,'S-2','Kristen Pr','081354113104','jl. taman malaka selatan, blok b 5 no 16, Pondok kelapa, duren sawit. Jakarta Timur','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(9802,'196012241981021002','1771022412600001','ACHMAD WIBISONO, S.Sos.','Pria','Boyolali','1960-12-24','achmadwibisono@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2009-04-01','2020-03-05','1982-09-01',23,'Panitera',8,'S-1','Islam','081271155888',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(9902,'196104101992121001','1273021004610001','YOSDI, S.H.','Pria','Bukittinggi','1961-04-10','yosdish@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2021-07-01','1994-10-01',28,'Pengadilan Tinggi Bengkulu',8,'S-1','Islam','08126691577','Jl. Seruni no 6','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(10280,'196410061991031002','1671060610640002','SAIMAN, S.H., M.H.','Pria','Palembang','1964-10-06','saiman64@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2019-04-01','2022-06-20','1992-09-01',28,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','082173604447',NULL,'aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(11552,'198709252009122005','1771076509870001','SESTI SAPITTRI, S.E.','Wanita','Tanah Datar','1987-09-25','sesti.safitri@mahkamahagung.go.id',378,'Penyusun Laporan Keuangan','Penata',7,'III/c','2021-04-01','2020-06-10','2011-07-01',8,'Sub Bagian Keuangan Dan Pelaporan',8,'S-1','Islam','085357074087',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(13254,'198806032011012010','1771024306880001','FRIESDA ROTUA RUMONDANG, S.E.','Wanita','Bengkulu','1988-06-03','friesdamanik@mahkamahagung.go.id',179,'Analis Kepegawaian Ahli Muda','Penata',7,'III/c','2019-04-01','2021-04-01','2012-10-01',8,'Pengadilan Tinggi Bengkulu',8,'S-1','Katholik','08117333688',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(13763,'198005092012121001','1501050905800001','ENDANG WIJAYA','Pria','Kerinci','1980-05-09','ewijaya@mahkamahagung.go.id',336,'Pengadministrasi Perencanaan dan Program','Pengatur',11,'II/c','2021-04-01','2020-06-10','2014-05-01',17,'Sub Bagian Rencana Program Dan Anggaran',3,'SLTA/','Islam','081274477130',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(13787,'196209141982031001','3317101409620003','Dr. H. SUNARSO, S.H., M.H.','Pria','Semarang','1962-09-14','hsunarso@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2018-04-01','2021-03-26','1984-01-01',31,'Pengadilan Tinggi Bengkulu',10,'S-3','Islam','089681713642','Jl. Batang Hari No. 07 Kota Bengkulu','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(13805,'196104201983111001','1702092004610001','ABDUL MUIS, S.H.','Pria','Lahat','1961-04-20','abdul.muis@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2014-04-01','2020-03-05','1984-12-01',25,'Panitera',8,'S-1','Islam','081271848083','Jl. Merawan gang Dempo Raya 1','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-03 10:19:55','2023-03-03 10:19:55'),
(14868,'196008151986121001','3273211608600002','MULA PANGARIBUAN, S.H., M.H.','Pria','Pematangsiantar','1960-08-15','mulapangaribuan@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama',1,'IV/e','2019-04-01','2022-03-11','1988-04-01',32,'Pengadilan Tinggi Bengkulu',9,'S-2','Katholik','08126448346','Jl. DI panjaitan 201\r\nKENDARI','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(15556,'198705062015031001','1771030605870004','HARDI RAMADHAN, S.E.','Pria','Bengkulu','1987-05-06','hardileni@mahkamahagung.go.id',466,'Analis Protokol','Penata Muda Tingkat ',8,'III/b','2019-04-01','2020-06-10','2016-09-01',4,'Sub Bagian Tata Usaha Dan Rumah Tangga',8,'S-1','Islam','085267050507',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(16180,'198511072006041005','1771060711850002','IRDIAN NOFRIANSYAH, S.H.','Pria','Bengkulu','1985-11-07','irdian@mahkamahagung.go.id',441,'Pengelola Pengadaan Barang/Jasa Ahli Pertama','Penata Muda Tingkat ',8,'III/b','2019-04-01','2022-04-26','2008-02-01',8,'Pengadilan Tinggi Bengkulu',8,'S-1','Islam','081278047005',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(16296,'196311071992121001','3577030711630004','SUNGGUL SIMANJUNTAK, S.H., C.N., M.Hum.','Pria','Toba Samosir','1963-11-07','sunggul@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2022-01-21','1994-05-01',28,'Pengadilan Tinggi Bengkulu',9,'S-2','Kristen Pr','085235717777','Perum Panorama Willis Blok A No.18','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(16476,'196102121982031004','1702091202610001','SUWANDI, S.H.','Pria','Bengkulu','1961-02-12','risnawati66@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2008-10-01','2019-09-26','1983-06-01',21,'Panitera',8,'S-1','Islam','08127377414','Jln. Bantar Kemang','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(16523,'196103251986032001','1871066503610004','HARNETI, S.H.','Wanita','Tais','1961-03-25','harneti@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2014-04-01','2019-03-01','1987-05-01',33,'Panitera',8,'S-1','Islam','081377996622',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(17095,'196108301983111001','1771023008610231','AZIZ WIRAWAN, S.H.','Pria','Rejang Lebong','1961-08-30','aziz.wirawan@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2012-04-01','2020-12-10','1985-01-01',23,'Panitera',8,'S-1','Islam','081367383300','Jl. peking prumnas cempaka permai','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(18010,'196910091989031002','1771060910690001','NAZORI, S.H.','Pria','Lampung Barat','1969-10-09','nazorip1@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2015-10-01','2008-02-01','1990-07-01',30,'Panitera',8,'S-1','Islam','082183745569',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(18233,'196205011992122001','1271214102620001','ROSMINA, S.H., M.H.','Wanita','Medan','1962-05-01','rosmina@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2022-01-21','1994-08-01',28,'Pengadilan Tinggi Bengkulu',9,'S-2','Kristen Pr','08126169384','jalan Garuda St Kemayoran','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(18312,'198509092008052001','1771064909850002','FENTI WIDYASTUTI, S.H.','Wanita','Bengkulu','1985-09-09','fenti85@mahkamahagung.go.id',326,'Analis Perkara Peradilan','Penata',7,'III/c','2021-04-01','2020-06-10','2009-05-01',10,'Panitera Muda Perdata',8,'S-1','Islam','081367786885',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(18417,'196807281990032003','1771026807680001','UMI KALSUM, S.Sos.','Wanita','Bengkulu Selatan','1968-07-28','umi.kalsum@mahkamahagung.go.id',17,'Kepala Bagian','Pembina Tingkat I',4,'IV/b','2022-04-01','2017-07-03','1991-08-05',26,'Bagian Umum Dan Keuangan',8,'S-1','Islam','081273543770',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(18696,'196206251990031002','1771052506620003','FAHRUDDIN, S.H.','Pria','Bengkulu','1962-06-25','fahruddin62@mahkamahagung.go.id',302,'Panitera Pengganti','Pembina',5,'IV/a','2013-04-01','2019-08-23','1991-08-01',21,'Panitera',8,'S-1','Islam','081366403737',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(20195,'196208131986121001','3273221308620002','MARULAK PURBA, S.H., M.H.','Pria','Tapanuli Utara','1962-08-13','mpurba@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama',1,'IV/e','2019-10-01','2019-06-21','1988-05-01',32,'Pengadilan Tinggi Bengkulu',9,'S-2','Katholik','082115108880','PADANG HARAPAN','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(20914,'196208021985022002','1771024208620001','SUARSIH, S.H.','Wanita','Bandar Lampung','1962-08-02','suarsih@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2013-04-01','1999-12-01','1986-06-01',34,'Panitera',8,'S-1','Islam','082180130862',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(21437,'196310121988032002','1271075210630002','SERLIWATY, S.H., M.H.','Wanita','Tapanuli Utara','1963-10-12','sherliwaty@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama',1,'IV/e','2020-04-01','2020-03-30','1989-06-01',32,'Pengadilan Tinggi Bengkulu',9,'S-2','Katholik','081372341128','PADANG HARAPAN','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(21802,'196401141987031003','3201131401640003','Drs.H. ERWIN WIDANARKO, S.H.,S.AP.,M.Pd.','Pria','Surabaya','1964-01-14','erwinwidanarko@mahkamahagung.go.id',256,'Hakim Ad Hoc Tipikor','Pembina Utama Muda',3,'IV/c','2017-10-01','2021-09-15','1988-05-01',25,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','08561070179',NULL,'aktif',2,'PNS Non-Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(21842,'196402021983031001','1771010202640002','DARNO, S.H.','Pria','Banyumas','1964-02-02','darnosh@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2015-10-01','2005-04-29','1984-07-01',36,'Panitera',8,'S-1','Islam','085378707552',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(22587,'196409141985032004','1771015409640001','ZEKMA, S.H.','Wanita','Bengkulu','1964-09-14','zekmapt@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2011-10-01','2000-01-29','1986-09-11',34,'Panitera',8,'S-1','Islam','085267003871',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(23071,'196301211992031010','1771022101630001','RIZWAN MANADI, S.H., M.H.','Pria','Bengkulu Selatan','1963-01-21','rizwanmanadi@mahkamahagung.go.id',291,'Panitera Muda','Pembina',5,'IV/a','2018-10-01','2016-09-05','1994-02-01',27,'Panitera Muda Perdata',9,'S-2','Islam','082371150380',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(23425,'198908072012122002','1771044708890001','YENNI KOMALASARI, S.H.','Wanita','Bengkulu','1989-08-07','yennikomalasari@mahkamahagung.go.id',478,'Analis Tata Laksana','Penata',7,'III/c','2021-04-01','2022-07-19','2014-05-01',8,'Sub Bagian Kepegawaian Dan Teknologi Informasi',8,'S-1','Islam','08117388777','sinar pagi, bintuhan','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(23747,'196311201985031005','1771072011630001','SUPRAN, S.H.','Pria','Empat Lawang','1963-11-20','supransubli@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2010-10-01','1999-12-01','1986-04-01',34,'Panitera',8,'S-1','Islam','085367283963',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(24651,'196703101987032001','1771025003670008','GARINI MARTATI, S.H.','Wanita','Palembang','1967-03-10','garinimartatish@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2015-04-01','2009-08-12','1988-07-01',32,'Panitera',8,'S-1','Islam','085273979167',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(24670,'196703191990031001','1771041903670001','KARDINI, S.H.','Pria','Ogan Komering Ulu','1967-03-19','kardini@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2010-10-01','2002-06-04','1991-08-01',29,'Panitera',8,'S-1','Islam','085321423866','JALAN KALIMANTAN GANG MELATI 18 NO. 31','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(24921,'196707081989032011','1771014807670003','FATMAWATI, S.H.','Wanita','Kampar','1967-07-08','fatmawatish@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2013-10-01','2018-08-06','1990-07-01',30,'Panitera',8,'S-1','Islam','082182593366','Jln.Pepeya 3  Rt17,Rw 004 No.1 Kec.Selebar, Kel Bumi Ayu Kota Bengkulu','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(25017,'196708231993012001','3276056308670001','NINIL EVA YUSTINA, S.H., M.Hum.','Wanita','Jakarta Pusat','1967-08-23','ninil_eva_yustina@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama Madya',2,'IV/d','2021-04-01','2021-11-08','1994-08-01',28,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','08161912831','Rumah Dinas MA, Jl Kencana 7 Blok C8 No 6a Villa Serpong','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(25132,'196109301983111001','1771073009610001','PUNGUT, S.H.','Pria','Lebong','1961-09-30','pungut@mahkamahagung.go.id',302,'Panitera Pengganti','Penata Tingkat I',6,'III/d','2010-10-01','2019-03-01','1985-03-01',35,'Panitera',8,'S-1','Islam','081278471731',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(25762,'196309031985021001','1771020309630005','ALIDIN, S.H.','Pria','Bengkulu Selatan','1963-09-03','alidin63@mahkamahagung.go.id',291,'Panitera Muda','Penata Tingkat I',6,'III/d','2013-04-01','2016-01-21','1986-04-01',34,'Panitera Muda Khusus Tindak Pidana Korupsi',8,'S-1','Islam','085273184645',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(26100,'196010291986122001','3308106910600001','ARINI, S.H.','Wanita','Karanganyar','1960-10-29','arini60@mahkamahagung.go.id',33,'Hakim Tinggi','Pembina Utama',1,'IV/e','2019-10-01','2019-06-12','1988-04-01',32,'Pengadilan Tinggi Bengkulu',8,'S-1','Islam','081559545719','RUMAH DINAS PENGADILAN','aktif',1,'PNS Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(26376,'196506151990032001','1771045506650006','TINI ELORASITA, BPA.','Wanita','Bengkulu Selatan','1965-06-15','tinielorasita@mahkamahagung.go.id',413,'Pranata Kearsipan','Penata',7,'III/c','2010-04-01','2020-06-10','1991-08-01',29,'Sub Bagian Tata Usaha Dan Rumah Tangga',6,'D-III','Islam','082391191051',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(26582,'196012121985031009','1771061212600005','JAMALUDIN, S.H.','Pria','Bengkulu Selatan','1960-12-12','jamaludinsh@mahkamahagung.go.id',291,'Panitera Muda','Penata Tingkat I',6,'III/d','2006-04-01','2016-06-22','1986-06-01',34,'Panitera Muda Pidana',8,'S-1','Islam','085273366934',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(28229,'197308302006042015','1771067008730002','RINA ASTUTI, S.E.','Wanita','Bengkulu','1973-08-30','rina1973@mahkamahagung.go.id',21,'Kepala Sub Bagian','Penata Tingkat I',6,'III/d','2018-04-01','2015-12-29','2007-04-01',13,'Sub Bagian Keuangan Dan Pelaporan',8,'S-1','Islam','085267778542',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(28926,'197511092003121001','3201160911750003','ENDRI NOVIAN, S.E.','Pria','Bogor','1975-11-09','endrinovian@mahkamahagung.go.id',87,'Sekretaris','Pembina Tingkat I',4,'IV/b','2021-04-01','2019-10-24','2005-04-01',21,'Sekretaris',8,'S-1','Islam','087877770117','Padang Harapan','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(29526,'197706102009042004','1771025006770003','LINDA NORA, S.Kom.S.H.','Wanita','Rejang Lebong','1977-06-10','lindanora@mahkamahagung.go.id',21,'Kepala Sub Bagian','Penata Tingkat I',6,'III/d','2021-04-01','2018-01-29','2010-07-01',12,'Sub Bagian Tata Usaha Dan Rumah Tangga',8,'S-1','Islam','082372566263',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(30558,'197911202009042003','1771046011790003','YUN HERAWATI, S.Kom.','Wanita','Lahat','1979-11-20','yunherawati@mahkamahagung.go.id',378,'Penyusun Laporan Keuangan','Penata Muda Tingkat ',8,'III/b','2021-04-01','2020-06-10','2010-04-01',10,'Sub Bagian Keuangan Dan Pelaporan',8,'S-1','Islam','082279873440',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(31025,'198102162009042008','1709025602810001','VARLIAN AGUSTINI, S.E.','Wanita','Seluma','1981-02-16','varlianagustini@mahkamahagung.go.id',151,'Arsiparis Ahli Pertama','Penata Muda',9,'III/a','2017-04-01','2022-03-31','2010-04-01',10,'Pengadilan Tinggi Bengkulu',8,'S-1','Islam','082279387107',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(31540,'198203312009042001','1771027103820005','FIDIYAH SISTONA, S.E.','Wanita','Bandar Lampung','1982-03-31','fidiyahsistona@mahkamahagung.go.id',21,'Kepala Sub Bagian','Penata Tingkat I',6,'III/d','2021-04-01','2018-01-29','2010-07-01',12,'Sub Bagian Rencana Program Dan Anggaran',8,'S-1','Islam','08117313103',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(31651,'198206062006042008','1771074606820001','FETTY YUNIZA, S.H.','Wanita','Bengkulu','1982-06-06','fetty82@mahkamahagung.go.id',326,'Analis Perkara Peradilan','Penata',7,'III/c','2020-04-01','2020-06-10','2007-04-01',12,'Panitera Muda Pidana',8,'S-1','Islam','081367560466',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(32945,'198502202014032004','1771026002850007','RINI TRI WAHYUNI, S.H.','Wanita','Rejang Lebong','1985-02-20','rinitw@mahkamahagung.go.id',478,'Analis Tata Laksana','Penata',7,'III/c','2022-04-01','2022-06-27','2015-10-01',8,'Sub Bagian Kepegawaian Dan Teknologi Informasi',8,'S-1','Islam','085294078009','Jl. Zainul arifin Gang SMP 6 kompi','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(33151,'198507222011011011','1771062207850002','ZENO DANI KUNCORO, ST','Pria','Bengkulu','1985-07-22','zerowaiting@mahkamahagung.go.id',143,'Pranata Komputer Ahli Pertama','Penata Muda Tingkat ',8,'III/b','2015-04-01','2018-07-25','2012-10-01',8,'Pengadilan Tinggi Bengkulu',8,'S-1','Katholik','085643931111',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(33159,'198507242006042001','1771026407850003','HARINI KURNIATI','Wanita','Bengkulu','1985-07-24','harinikurniati@mahkamahagung.go.id',412,'Pengadministrasi Registrasi Perkara','Pengatur Tingkat I',10,'II/d','2018-04-01','2022-05-09','2007-09-01',13,'Panitera Muda Hukum',3,'SLTA/','Islam','085382922639',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(33343,'198512092006042002','1771064912860001','SISKA VITRIANI','Wanita','Bengkulu','1985-12-09','siskav@mahkamahagung.go.id',547,'Pranata Keuangan APBN Pelaksana/Terampil','Pengatur Tingkat I',10,'II/d','2018-04-01','2021-04-01','2008-02-01',12,'Pengadilan Tinggi Bengkulu',3,'SLTA/','Islam','081368313757',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(33873,'198703032011011006','1771010303870007','IRWAN KURNIAWAN, S.H.','Pria','Bengkulu','1987-03-03','irwank@mahkamahagung.go.id',466,'Analis Protokol','Penata Muda',9,'III/a','2019-04-01','2021-01-04','2012-05-01',6,'Sub Bagian Tata Usaha Dan Rumah Tangga',8,'S-1','Islam','085267259470',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(34236,'198805122014032006','1771025205880013','WINDYA PRABAWATI, S.H.','Wanita','Jakarta Timur','1988-05-12','windya@mahkamahagung.go.id',326,'Analis Perkara Peradilan','Penata',7,'III/c','2022-04-01','2020-06-10','2015-11-01',8,'Panitera Muda Hukum',8,'S-1','Islam','08561115661',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(34315,'198810222014032001','1771026210880001','IKA IKMASSARI, S.H.','Wanita','Bengkulu','1988-10-22','ika@mahkamahagung.go.id',326,'Analis Perkara Peradilan','Penata',7,'III/c','2022-04-01','2020-06-10','2015-11-01',8,'Panitera Muda Pidana',8,'S-1','Islam','082278965008','Perumahan Surabaya Permai 3 Blok E No.08','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(34383,'198903222009122001','1771066203890004','MARETA ISABELLA, S.E., S.H.','Wanita','Bengkulu','1989-03-22','mareta.isabella@mahkamahagung.go.id',466,'Analis Protokol','Penata',7,'III/c','2022-04-01','2022-01-05','2011-05-01',10,'Sub Bagian Tata Usaha Dan Rumah Tangga',8,'S-1','Islam','082178753106',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(34469,'198910212009042001','1771046110890002','MIRIANTI OKTAVIANA SURI, S.H.','Wanita','Bengkulu','1989-10-21','mirianti@mahkamahagung.go.id',326,'Analis Perkara Peradilan','Penata',7,'III/c','2021-04-01','2022-05-09','2010-04-01',8,'Panitera Muda Khusus Tindak Pidana Korupsi',8,'S-1','Islam','085273431222',NULL,'aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(37329,'198908102019032005','1771065008890001','RIKA ANGGRAINI, S.IP.','Wanita','Bengkulu','1989-08-10','rikaanggraini@mahkamahagung.go.id',180,'Analis Kepegawaian Ahli Pertama','Penata Muda',9,'III/a','2019-03-01','2021-01-14','2020-03-02',0,'Sub Bagian Kepegawaian Dan Teknologi Informasi',9,'S-2','Islam','085267968248',' JL. SERAYU NO.40 RT.09 RW.02 KEL. LEMPUING KEC. RATU AGUNG KOTA BENGKULU, 38225','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(38398,'198806112015052001','1771065106880002','VERA ANGGRAINI, S.H.','Wanita','Bengkulu','1988-06-11','vera88@mahkamahagung.go.id',326,'Analis Perkara Peradilan','Penata Muda Tingkat ',8,'III/b','2019-10-01','2022-05-09','2017-01-01',4,'Panitera Muda Perdata',8,'S-1','Islam','085221430707','Jalan Dempo No. 16 RT 019 RW 004 ','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(38659,'199702182020121006','1771041802970004','AGIEF MUFTAHID, S.Kom.','Pria','Bengkulu','1997-02-18','agiefm@mahkamahagung.go.id',143,'Pranata Komputer Ahli Pertama','Penata Muda',9,'III/a','2020-12-01','2022-01-03','2022-01-03',0,'Sekretaris',8,'S-1','Islam','087822507250','Perumnas UNIB BLOK V No. 13','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(38660,'199612202020122009','1671106012960003','ROSA DESVANA, A.Md.','Wanita','Palembang','1996-12-20','rosadsvn@mahkamahagung.go.id',389,'Pengelola Barang Milik Negara','Pengatur',11,'II/c','2020-12-01','2022-01-05','2022-01-03',3,'Sub Bagian Keuangan Dan Pelaporan',6,'D-III','Islam','089667778683','Jl. Kapuas 7','aktif',3,'PNS Aktif, Pejabat Negara Non-Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(40909,'196006280220200302','3515082806600002','BAMBANG ANGKOSO WAHYONO, S.H., M.H.,.','Pria','Bandung','1960-06-28','bambangkosovo@mahkamahagung.go.id',256,'Hakim Ad Hoc Tipikor','Tanpa Golongan',87,'-','2020-06-09','2020-03-11',NULL,9,'Pengadilan Tinggi Bengkulu',9,'S-2','Islam','081332540759','Jl.Serayu 24','aktif',2,'PNS Non-Aktif, Pejabat Negara Aktif','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(43006,'199407052022031011','1771020507950002','MOHD.HARYO JULIAN PUTRA, S.H.','Pria','Bengkulu Selatan','1994-07-05','mohdharyo@gmail.com',326,'Analis Perkara Peradilan','Penata Muda',9,'III/a','2022-03-01','2022-03-01',NULL,0,'Panitera Muda Pidana',8,'S-1','Islam','085157579500','Jl.Hibrida 15 No.23','aktif',5,'CPNS','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(43016,'198609232022031002','1701072309860001','TOMMY AFRIAWAN, S.E.','Pria','Bengkulu Selatan','1986-09-23','tomibanisan@gmail.com',331,'Analis Perencanaan, Evaluasi dan Pelaporan','Penata Muda',9,'III/a','2022-03-01','2022-03-01',NULL,0,'Sub Bagian Rencana Program Dan Anggaran',8,'S-1','Islam','082186814263','Desa Lubuk ladung','aktif',5,'CPNS','2023-03-02 20:35:40','2023-03-02 20:35:40'),
(44334,'199110302022031004','1702183010910001','DWIPRAJA KUMARA ZUMA, A.Md.','Pria','Rejang Lebong','1991-10-30','dwipraja4@gmail.com',347,'Pengelola Perkara','Pengatur',11,'II/c','2022-03-01','2022-03-01',NULL,3,'Panitera Muda Pidana',8,'S-1','Islam','082176003963','Jl. Citandui No. 72a depan gudang mayora rumah warna orange','aktif',5,'CPNS','2023-03-02 20:35:40','2023-03-02 20:35:40');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(18) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`level`,`created_at`,`updated_at`) values 
(1,'0_superadmin','c3VwM3I0ZG0xbl9wNHNzIw==',0,'2021-03-11 10:13:43','2021-03-11 10:13:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;