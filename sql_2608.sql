-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_absent_pkj.absent
CREATE TABLE IF NOT EXISTS `absent` (
  `id_absent` int(11) NOT NULL AUTO_INCREMENT,
  `absent_nip` varchar(255) DEFAULT NULL,
  `attendance_entry` time DEFAULT NULL,
  `attendance_return` time DEFAULT NULL,
  `location_entry` varchar(255) DEFAULT NULL,
  `location_return` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT '1',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id_absent`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_absent_pkj.absent: ~0 rows (approximately)
DELETE FROM `absent`;
/*!40000 ALTER TABLE `absent` DISABLE KEYS */;
/*!40000 ALTER TABLE `absent` ENABLE KEYS */;

-- Dumping structure for table db_absent_pkj.daily_job
CREATE TABLE IF NOT EXISTS `daily_job` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `id_absent` int(11) DEFAULT NULL,
  `job_nip` varchar(255) DEFAULT NULL,
  `job_desc` longtext,
  `doc_file` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id_job`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_absent_pkj.daily_job: ~0 rows (approximately)
DELETE FROM `daily_job`;
/*!40000 ALTER TABLE `daily_job` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_job` ENABLE KEYS */;

-- Dumping structure for table db_absent_pkj.document
CREATE TABLE IF NOT EXISTS `document` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `id_absent` int(11) DEFAULT NULL,
  `doc_nip` varchar(255) DEFAULT NULL,
  `doc_name` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_absent_pkj.document: ~0 rows (approximately)
DELETE FROM `document`;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Dumping structure for table db_absent_pkj.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id_profile` int(11) NOT NULL AUTO_INCREMENT,
  `profile_nip` varchar(255) DEFAULT NULL,
  `profile_name` varchar(255) DEFAULT NULL,
  `profile_email` varchar(255) DEFAULT NULL,
  `work_unit` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_absent_pkj.profile: ~2 rows (approximately)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id_profile`, `profile_nip`, `profile_name`, `profile_email`, `work_unit`, `created_by`, `updated_date`) VALUES
	(1, '101', 'Admin', NULL, NULL, NULL, NULL),
	(2, '102', 'User', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Dumping structure for table db_absent_pkj.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_nip` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT '2',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_absent_pkj.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `user_nip`, `pass`, `email`, `level`, `created_by`, `updated_date`) VALUES
	(1, '101', 'admin', NULL, 1, NULL, NULL),
	(2, '102', 'user', NULL, 2, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
