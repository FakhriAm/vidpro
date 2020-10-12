-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5956
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for content_provider
CREATE DATABASE IF NOT EXISTS `content_provider` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `content_provider`;

-- Dumping structure for table content_provider.default_master
CREATE TABLE IF NOT EXISTS `default_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.default_master: ~0 rows (approximately)
/*!40000 ALTER TABLE `default_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `default_master` ENABLE KEYS */;

-- Dumping structure for table content_provider.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table content_provider.groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`, `active`) VALUES
	(1, 'admin', 'Administrator', 1),
	(2, 'uploader', 'Uploader', 1),
	(3, 'Pricer', 'Marketing Team', 1),
	(4, 'Approver', 'SPV Marketing', 1);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table content_provider.groups_auth
CREATE TABLE IF NOT EXISTS `groups_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.groups_auth: ~15 rows (approximately)
/*!40000 ALTER TABLE `groups_auth` DISABLE KEYS */;
INSERT INTO `groups_auth` (`id`, `created`, `modified`, `id_group`, `id_menu`, `active`) VALUES
	(1, '2020-02-18 16:21:55', '2020-10-12 14:29:57', 1, 1, 0),
	(2, '2020-02-18 17:00:52', '2020-10-12 14:30:23', 1, 2, 0),
	(3, '2020-02-18 17:00:52', '2020-10-01 14:38:46', 1, 3, 0),
	(4, '2020-02-18 17:00:52', '2020-10-01 14:39:00', 1, 4, 0),
	(5, '2020-02-18 17:00:52', '2020-09-23 11:07:29', 1, 5, 1),
	(6, '2020-02-18 17:04:41', '2020-09-23 10:26:05', 1, 6, 1),
	(7, '2020-02-18 17:07:44', '2020-09-23 10:01:53', 2, 1, 1),
	(8, '2020-02-18 17:07:44', '2020-09-23 10:02:07', 2, 2, 1),
	(9, '2020-02-18 17:08:05', '2020-09-23 11:07:31', 3, 3, 1),
	(10, '2020-02-18 17:08:05', '2020-09-23 11:07:34', 3, 4, 1),
	(11, '2020-02-18 17:08:29', '2020-09-23 11:07:34', 4, 5, 1),
	(12, '2020-02-18 17:08:29', '2020-10-01 14:37:59', 1, 7, 1),
	(13, '2020-02-18 17:08:29', '2020-09-22 16:27:30', 1, 8, 1),
	(14, '2020-02-18 17:08:29', '2020-09-23 10:02:13', 1, 9, 1);
/*!40000 ALTER TABLE `groups_auth` ENABLE KEYS */;

-- Dumping structure for table content_provider.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table content_provider.login_attempts: ~2 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
	(1, '127.0.0.1', 'a', 1535014593),
	(2, '127.0.0.1', 'a', 1535014618);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Dumping structure for table content_provider.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_type` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_parent` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `level` int(2) NOT NULL,
  `have_function` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `short` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=558 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.menu: ~10 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `created`, `modified`, `id_type`, `content`, `link`, `icon`, `is_parent`, `id_parent`, `level`, `have_function`, `active`, `short`) VALUES
	(1, '2020-02-18 16:59:50', '2020-10-01 11:09:57', 1, 'Add User', 'user', 'fas fa-fw fa-user-plus', 0, 0, 0, 0, 1, 2),
	(2, '2020-02-18 16:16:22', '2020-10-01 14:39:25', 1, 'Upload Video', 'upload_video', 'fas fa-fw fa-upload', 0, 0, 0, 0, 1, 3),
	(3, '2020-02-18 16:59:50', '2020-10-01 14:38:39', 1, 'Add Image -', 'add_image', 'fas fa-fw fa-file-image', 0, 0, 0, 0, 0, 4),
	(4, '2020-02-18 16:59:50', '2020-09-29 10:43:21', 1, 'Add Info Grafis', 'upload_infografis', 'fas fa-fw fa-info-circle', 0, 0, 0, 0, 1, 5),
	(5, '2020-02-18 16:56:53', '2020-10-12 14:38:05', 1, 'Incoming Request', 'history_upload', 'fas fa-fw fa-history', 0, 0, 0, 0, 1, 6),
	(6, '2020-02-18 16:59:50', '2020-10-12 14:38:04', 1, 'My Request', 'log_download', 'fas fa-fw fa-list', 0, 0, 0, 0, 1, 7),
	(7, '2020-02-18 16:59:50', '2020-09-29 10:48:15', 1, 'Dashboard', 'dashboard', 'fas fa-fw fa-home', 0, 0, 0, 0, 1, 1),
	(333, '2020-02-18 16:57:49', '2020-09-23 11:05:59', 1, 'Pricing Video', 'pricing_video', 'fas fa-fw fa-list', 0, 0, 0, 0, 1, 0),
	(444, '2020-02-18 16:58:22', '2020-09-28 13:42:33', 1, 'Pricing History', 'history_pricing', 'fas fa-fw fa-history', 0, 0, 0, 0, 1, 0),
	(555, '2020-02-18 16:58:38', '2020-09-23 11:06:15', 1, 'Approval Video', 'approval_video', 'fas fa-fw fa-list', 0, 0, 0, 0, 1, 0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table content_provider.menu_type
CREATE TABLE IF NOT EXISTS `menu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `content` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.menu_type: ~5 rows (approximately)
/*!40000 ALTER TABLE `menu_type` DISABLE KEYS */;
INSERT INTO `menu_type` (`id`, `created`, `modified`, `content`, `active`) VALUES
	(1, '2018-10-01 10:32:50', '2018-10-01 10:32:50', 'Menu', 1),
	(2, '2018-10-01 10:32:50', '2018-10-01 10:32:50', 'Function', 1),
	(3, '2018-10-01 10:33:17', '2018-10-01 10:33:17', 'Left Panel', 1),
	(4, '2018-10-04 11:43:21', '2018-10-04 11:43:21', 'Button Menu', 1),
	(5, '2018-10-18 10:17:45', '2018-10-18 10:17:45', 'Right-Click Disabled', 1);
/*!40000 ALTER TABLE `menu_type` ENABLE KEYS */;

-- Dumping structure for table content_provider.thumbnail_meta
CREATE TABLE IF NOT EXISTS `thumbnail_meta` (
  `id_thumbnail` int(11) DEFAULT NULL,
  `thumb_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.thumbnail_meta: ~0 rows (approximately)
/*!40000 ALTER TABLE `thumbnail_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `thumbnail_meta` ENABLE KEYS */;

-- Dumping structure for table content_provider.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` int(10) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` date NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `token_login` varchar(100) DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'img.png',
  `nik` int(9) NOT NULL,
  `id_group` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table content_provider.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `token_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `image`, `nik`, `id_group`) VALUES
	(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', 0, 'nBjtUiTCwe0x0X61X3Pui.a1a14ae3f52a79e6f6', 1535011315, NULL, '0000-00-00', '0000-00-00 00:00:00', NULL, 1, 'Admin', 'istrator', 'ADMIN', '0', 'img.png', 0, 0),
	(9, '127.0.0.1', 'kemal.wibisono@cnn.id', '739c6beead44c6c4b99838fb98d00813793b80071a4e1182f660956c5b7d03d5f85d0f3f07845d7e2cc610a8fcf9f328f192b91aaf17f161de10618d48e6de8avoFcmpaktkh1vZMSUnZvdikUEwEhgIWaP+IAU7pRm+8=', NULL, 'kemal.wibisono@cnn.id', NULL, '72075400', NULL, NULL, '2018-08-29', '2020-10-12 09:45:28', 'GK90RQvhAOClV7G7M4XVB2C4LQNVBNx85SDLEgEkBwx2rcYOuwXQIXTl7tb6hbqoAmtx2g2v8w6G6wDDmegaIV619ggiTZArTuWk', 1, 'Fakhri', 'Ammarrizky', NULL, '082308236576', 'img.png', 200271154, 1),
	(13, '::1', 'wibisonokemal@gmail.com', '739c6beead44c6c4b99838fb98d00813793b80071a4e1182f660956c5b7d03d5f85d0f3f07845d7e2cc610a8fcf9f328f192b91aaf17f161de10618d48e6de8avoFcmpaktkh1vZMSUnZvdikUEwEhgIWaP+IAU7pRm+8=', NULL, 'wibisonokemal@gmail.com', NULL, NULL, NULL, NULL, '2018-09-10', '2020-09-15 06:27:20', NULL, 1, 'Team', 'Uploader', NULL, NULL, 'img.png', 2, 2),
	(14, '127.0.0.1', 'tes@tes.com', '739c6beead44c6c4b99838fb98d00813793b80071a4e1182f660956c5b7d03d5f85d0f3f07845d7e2cc610a8fcf9f328f192b91aaf17f161de10618d48e6de8avoFcmpaktkh1vZMSUnZvdikUEwEhgIWaP+IAU7pRm+8=', NULL, 'tes@tes.com', NULL, NULL, NULL, NULL, '2018-11-08', '2020-09-04 04:39:17', NULL, 1, 'Team', 'Marketing', NULL, NULL, 'img.png', 3, 3),
	(15, '127.0.0.1', 'spv', '739c6beead44c6c4b99838fb98d00813793b80071a4e1182f660956c5b7d03d5f85d0f3f07845d7e2cc610a8fcf9f328f192b91aaf17f161de10618d48e6de8avoFcmpaktkh1vZMSUnZvdikUEwEhgIWaP+IAU7pRm+8=', NULL, 'spv@mail.com', NULL, NULL, NULL, NULL, '2020-02-20', '2020-09-04 04:40:36', 'FiwCNVfih4LJEajkFIQEyrg8f7efyxQGEFZccmQ0XQnwfvOn9TXAkIbbYQggqJpVLz7Q2RQcvuIEkOV6NAicXU6LaWiOC3VIfKI4', 1, 'SPV', 'Marketing', 'CNN Indonesia', '082308230823', 'img.png', 4, 4),
	(16, '127.0.0.1', 'almer.suryadi@cnn.id', '739c6beead44c6c4b99838fb98d00813793b80071a4e1182f660956c5b7d03d5f85d0f3f07845d7e2cc610a8fcf9f328f192b91aaf17f161de10618d48e6de8avoFcmpaktkh1vZMSUnZvdikUEwEhgIWaP+IAU7pRm+8=', NULL, 'almer.suryadi@cnn.id', NULL, NULL, NULL, NULL, '2020-06-23', '2020-09-16 03:36:17', 'NKT5vOTD6d9GElZD8x8sPfbkzHo5TVlDkV6SygQ4w9XbY8Z1S9C9JTIvTxmRrhvJLQOchCAMXWvJ2UFwBYoSSz5DjUcHldIdznGm', 1, 'Almer P.', 'Suryadi', 'CNN Indonesia', '6375', 'img.png', 17, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table content_provider.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table content_provider.users_groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1),
	(2, 1, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

-- Dumping structure for table content_provider.video_category
CREATE TABLE IF NOT EXISTS `video_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `content` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.video_category: ~8 rows (approximately)
/*!40000 ALTER TABLE `video_category` DISABLE KEYS */;
INSERT INTO `video_category` (`id`, `created`, `created_by`, `modified`, `modified_by`, `content`, `active`) VALUES
	(1, '2020-03-09 10:47:21', 0, '2020-10-06 10:16:48', 0, 'NATIONAL', 1),
	(2, '2020-03-09 10:47:21', 0, '2020-10-06 10:16:54', 0, 'INTERNATIONAL', 1),
	(3, '2020-03-09 10:47:21', 0, '2020-10-06 10:17:06', 0, 'ECONOMY', 1),
	(4, '2020-03-09 10:47:21', 0, '2020-10-06 10:17:12', 0, 'SPORT', 1),
	(5, '2020-03-09 10:47:21', 0, '2020-10-06 10:17:41', 0, 'TECHNOLOGY', 1),
	(7, '2020-03-09 10:47:21', 0, '2020-10-06 10:17:59', 0, 'HEALT & BEAUTY', 1),
	(8, '2020-03-09 10:47:21', 0, '2020-10-06 10:17:43', 0, 'DISASTER', 1),
	(9, '2020-03-09 10:47:21', 0, '2020-10-06 10:18:37', 0, 'ANIMAL', 1);
/*!40000 ALTER TABLE `video_category` ENABLE KEYS */;

-- Dumping structure for table content_provider.video_meta
CREATE TABLE IF NOT EXISTS `video_meta` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `uploader` int(11) DEFAULT NULL,
  `video_title` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `journalist` varchar(50) DEFAULT NULL,
  `video_id` text DEFAULT NULL,
  `video_low` text DEFAULT NULL,
  `id_thumbnail` text DEFAULT NULL,
  `uploaded_date` datetime DEFAULT NULL,
  `tag` text DEFAULT NULL,
  `id_status` tinyint(1) DEFAULT 1,
  `id_video_type` int(11) NOT NULL DEFAULT 0,
  `id_video_category` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL DEFAULT '00:00:00',
  `id_video_price` int(11) NOT NULL DEFAULT 0,
  `user_do_pricing` int(11) NOT NULL DEFAULT 0,
  `user_approve` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.video_meta: ~9 rows (approximately)
/*!40000 ALTER TABLE `video_meta` DISABLE KEYS */;
INSERT INTO `video_meta` (`id_video`, `uploader`, `video_title`, `description`, `journalist`, `video_id`, `video_low`, `id_thumbnail`, `uploaded_date`, `tag`, `id_status`, `id_video_type`, `id_video_category`, `duration`, `id_video_price`, `user_do_pricing`, `user_approve`, `active`) VALUES
	(28, 9, 'Bull', 'Bulled', 'Bull', '603d065cf6c996e7d53ba7679670bd0d_WeAreGoingOnBullrun.mp4', '603d065cf6c996e7d53ba7679670bd0d_WeAreGoingOnBullrun.m3u8', '603d065cf6c996e7d53ba7679670bd0d_Capture.PNG', '2020-06-23 07:23:23', 'Jakarta', 1, 0, 2, '01:01:01', 0, 0, 0, 0),
	(29, 9, 'Blay', 'Bley', 'Bloy', '77eed3c6dc524c84394b7f57f3477247_WeAreGoingOnBullrun.mp4', '77eed3c6dc524c84394b7f57f3477247_WeAreGoingOnBullrun.m3u8', '77eed3c6dc524c84394b7f57f3477247_Capture.PNG', '2020-06-23 07:54:11', 'asr', 1, 0, 1, '01:01:01', 0, 0, 0, 0),
	(30, 16, 'For A Grande', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Almer', '578dde315996601845dff7af46da393f_WhatCarCanYouGetForAGrand.mp4', '578dde315996601845dff7af46da393f_WhatCarCanYouGetForAGrand.m3u8', '578dde315996601845dff7af46da393f_Capture.PNG', '2020-06-23 07:59:39', 'Tokoh', 3, 1, 2, '01:01:01', 1, 16, 16, 1),
	(31, 16, 'Blazae', 'Blaze', 'Blaze', '71b0ee59152c72c316317321168efa17_ForBiggerBlazes.mp4', '71b0ee59152c72c316317321168efa17_ForBiggerBlazes.m3u8', '71b0ee59152c72c316317321168efa17_Capture.PNG', '2020-06-23 09:52:44', 'Politkk', 1, 0, 2, '01:01:01', 0, 0, 0, 0),
	(32, 13, 'Testing', 'Ini testing', 'Desi', '70560fc264c09f412756c6b64df29d10_VID-20200529-WA0030.mp4', '70560fc264c09f412756c6b64df29d10_VID-20200529-WA0030.m3u8', '70560fc264c09f412756c6b64df29d10_IMG-20200624-WA0026.jpg', '2020-06-25 11:07:19', 'Nasional', 2, 1, 1, '00:01:40', 1, 14, 0, 1),
	(33, 13, 'Kantor', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Soki', '0bccb137501a072329d23839681d124c_20200625_183902.mp4', '0bccb137501a072329d23839681d124c_20200625_183902.m3u8', '0bccb137501a072329d23839681d124c_20200618_145916.jpg', '2020-06-25 11:40:31', 'Testing', 2, 1, 1, '00:01:00', 2, 14, 0, 1),
	(34, 9, 'Video Test', 'Video Test', 'Almer', 'a17d0b8e406bf7e4a40acd09ecadcc66_ElephantsDream.mp4', 'a17d0b8e406bf7e4a40acd09ecadcc66_ElephantsDream.m3u8', 'a17d0b8e406bf7e4a40acd09ecadcc66_Capture.PNG', '2020-09-11 08:51:02', 'Politik', 1, 0, 1, '00:00:00', 0, 0, 0, 0),
	(35, 13, 'Ini Music', 'Tentang music sejagat', 'Pak Yogi', '0a4840ab17db2a2a76a71dacd8a4433b_videoplayback.mp4', '0a4840ab17db2a2a76a71dacd8a4433b_videoplayback.m3u8', '0a4840ab17db2a2a76a71dacd8a4433b_instagram-social-media-icon-design-template-vector-png_126996.jpg', '2020-09-15 06:30:51', 'Music , gitar', 3, 2, 1, '00:03:00', 2, 9, 9, 1),
	(36, 16, 'Ardhito', 'Here We Go', 'Ardhito', 'a5271863cdbac4456342e57133f189a2_y2mate.com - Ardhito Pramono - Here We Go Again  Fanboi (Lyric Video)_RlOqMOG9m2k_720p.mp4', 'a5271863cdbac4456342e57133f189a2_y2mate.m3u8', 'a5271863cdbac4456342e57133f189a2_Capture.PNG', '2020-09-16 03:37:55', 'Politik, Nama', 2, 2, 2, '04:04:04', 2, 9, 0, 1);
/*!40000 ALTER TABLE `video_meta` ENABLE KEYS */;

-- Dumping structure for table content_provider.video_price
CREATE TABLE IF NOT EXISTS `video_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `active` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.video_price: ~2 rows (approximately)
/*!40000 ALTER TABLE `video_price` DISABLE KEYS */;
INSERT INTO `video_price` (`id`, `created`, `created_by`, `modified`, `modified_by`, `content`, `active`) VALUES
	(1, '2020-03-03 13:58:08', 0, '2020-03-03 13:58:08', 0, 700000, 1),
	(2, '2020-03-03 13:58:08', 0, '2020-03-03 13:58:08', 0, 1400000, 1);
/*!40000 ALTER TABLE `video_price` ENABLE KEYS */;

-- Dumping structure for table content_provider.video_source
CREATE TABLE IF NOT EXISTS `video_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `content` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.video_source: ~8 rows (approximately)
/*!40000 ALTER TABLE `video_source` DISABLE KEYS */;
INSERT INTO `video_source` (`id`, `created`, `created_by`, `modified`, `modified_by`, `content`, `active`) VALUES
	(1, '2020-03-09 10:47:21', 0, '2020-10-06 09:16:10', 0, 'CNN ID', 1),
	(2, '2020-03-09 10:47:21', 0, '2020-10-06 09:12:10', 0, 'TRANS TV', 1),
	(3, '2020-03-09 10:47:21', 0, '2020-10-06 09:12:14', 0, 'TRANS 7', 1),
	(4, '2020-03-09 10:47:21', 0, '2020-10-06 09:17:31', 0, 'TRANS VISION', 1),
	(5, '2020-03-09 10:47:21', 0, '2020-10-06 09:16:07', 0, 'CNBC ID', 1),
	(7, '2020-03-09 10:47:21', 0, '2020-10-06 09:17:25', 0, 'DETIK COM', 1),
	(8, '2020-03-09 10:47:21', 0, '2020-10-06 09:17:58', 0, 'FEMALE DAILY', 1),
	(9, '2020-03-09 10:47:21', 0, '2020-10-06 09:17:58', 0, 'BEAUTY NESIA', 1);
/*!40000 ALTER TABLE `video_source` ENABLE KEYS */;

-- Dumping structure for table content_provider.video_type
CREATE TABLE IF NOT EXISTS `video_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table content_provider.video_type: ~4 rows (approximately)
/*!40000 ALTER TABLE `video_type` DISABLE KEYS */;
INSERT INTO `video_type` (`id`, `created`, `created_by`, `modified`, `modified_by`, `content`, `active`) VALUES
	(1, '2020-03-03 13:56:26', 0, '2020-03-03 13:56:26', 0, 'REGULER', 1),
	(2, '2020-03-03 13:56:26', 0, '2020-03-03 13:56:26', 0, 'SILVER', 1),
	(3, '2020-03-03 13:56:26', 0, '2020-03-03 13:56:26', 0, 'GOLD', 1),
	(4, '2020-03-03 13:56:26', 0, '2020-03-03 13:56:26', 0, 'PLATINUM', 1);
/*!40000 ALTER TABLE `video_type` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
