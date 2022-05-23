/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_ybb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ybb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `db_ybb`;

/*Table structure for table `tb_about_gallery` */

DROP TABLE IF EXISTS `tb_about_gallery`;

CREATE TABLE `tb_about_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(200) NOT NULL,
  `created_at` int(20) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_about_gallery` */

insert  into `tb_about_gallery`(`id`,`picture`,`created_at`,`is_deleted`) values 
(1,'berkas/about/gallery/1651851298.jpg',1651851298,0),
(2,'berkas/about/gallery/1651851926.jpg',1651851926,0),
(3,'berkas/about/gallery/1651852156.jpg',1651852156,0),
(4,'berkas/about/gallery/1652095099.jpg',1652095099,0);

/*Table structure for table `tb_announcement` */

DROP TABLE IF EXISTS `tb_announcement`;

CREATE TABLE `tb_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_public` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `for_users` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `for_members` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_announcement` */

insert  into `tb_announcement`(`id`,`subject`,`content`,`for_public`,`for_users`,`for_members`,`notification`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Test','<p>lorem ipsum&nbsp;<strong>BBBB</strong></p>\r\n',NULL,NULL,NULL,0,1650731180,0,0,0,0),
(3,'Test','<h1>Bootstrap Icons</h1>\r\n\r\n<p>Free, high quality, open source icon library with over 1,600 icons. Include them anyway you like&mdash;SVGs, SVG sprite, or web fonts. Use them with or without&nbsp;<a href=\"https://getbootstrap.com/\">Bootstrap</a>&nbsp;in any project.</p>\r\n','public',NULL,'members',0,1650731489,0,1650732064,0,0),
(4,'Test','<p>Include them anyway you like&mdash;SVGs, SVG sprite, or web fonts. Use them with or without&nbsp;<a href=\"https://getbootstrap.com/\">Bootstrap</a>&nbsp;in any project.</p>\r\n',NULL,'users','members',0,1650731180,0,1650732064,0,0);

/*Table structure for table `tb_auth` */

DROP TABLE IF EXISTS `tb_auth`;

CREATE TABLE `tb_auth` (
  `user_id` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) NOT NULL DEFAULT 2 COMMENT '0: Super Admin, 1: Admin, 2: user',
  `active` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Inactive, 1: Active, 2: Suspend',
  `log_time` int(20) DEFAULT NULL,
  `created_at` int(20) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_auth` */

insert  into `tb_auth`(`user_id`,`email`,`password`,`role`,`active`,`log_time`,`created_at`,`is_deleted`) values 
('USR-MHNDR-8b740','mahendradwipurwanto@gmail.com','$2y$10$f1F8rcC9wce1BqxxS8B1.e9iD8Y38ahfU069wYDi8Owz6ImZMnSvi',2,1,1650463587,1650463587,127),
('USR-MHNDR-8b7a4','mahendradwipurwanto@gmail.com','$2y$10$f1F8rcC9wce1BqxxS8B1.e9iD8Y38ahfU069wYDi8Owz6ImZMnSvi',2,1,1650463587,1650463587,127),
('USR-MHNDR-8bawd','mahendradwipurwanto@gmail.com','$2y$10$f1F8rcC9wce1BqxxS8B1.e9iD8Y38ahfU069wYDi8Owz6ImZMnSvi',2,1,1650463587,1650463587,127),
('USR-NGDNG-fcad7','ngodingin.indonesia@gmail.com','$2y$10$f1F8rcC9wce1BqxxS8B1.e9iD8Y38ahfU069wYDi8Owz6ImZMnSvi',0,1,1649858787,1649858787,127);

/*Table structure for table `tb_faq` */

DROP TABLE IF EXISTS `tb_faq`;

CREATE TABLE `tb_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) NOT NULL,
  `answer` text NOT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(20) NOT NULL DEFAULT 0,
  `modified_at` int(20) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_faq` */

insert  into `tb_faq`(`id`,`question`,`answer`,`draft`,`created_at`,`modified_at`,`is_deleted`) values 
(1,'Apakah ada biaya pendaftaran?','Tidak ada. Kami tidak memungut biaya apapun pada seluruh proses pendaftaran beasiswa YBB.',0,1651849792,1651849895,0),
(2,'Warga negara mana saja yang bisa mendaftar?','Warga Negara Indonesia',0,1651849927,0,0),
(3,'Siapakah yang bisa mendaftar di beasiswa ini?','Semua pelajar SMA dan Mahasiswa S1 sederajat di bidang apapun.',0,1651849941,0,0),
(4,'Apakah ada syarat ketentuan nilai?','Tidak ada.',0,1651849952,0,0),
(5,'Apakah ada ketentuan jurusan atau program studi?','Tidak ada.',0,1651849962,0,0),
(6,'Apakah ada batasan usia?','Tidak ada.',0,1651849969,0,0),
(7,'Dokumen apa saja yang dibutuhkan?','- Kartu Tanda Pelajar atau Kartu Tanda Mahasiswa atau sejenisnya.\r\n<br>\r\n- Rapor atau Transkrip Akhir',0,1651849980,1651849991,0),
(8,'Apa yang di dapat dari beasiswa ini?','Uang saku setiap 6 bulan dan Mentoring.',0,1651850051,0,0);

/*Table structure for table `tb_home` */

DROP TABLE IF EXISTS `tb_home`;

CREATE TABLE `tb_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_icon` tinyint(1) NOT NULL DEFAULT 0,
  `icon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` tinyint(1) NOT NULL DEFAULT 0,
  `button_text` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_home` */

insert  into `tb_home`(`id`,`key`,`picture`,`value`,`desc`,`hero_icon`,`icon`,`button`,`button_text`,`button_link`,`button_color`,`button_text_color`,`created_at`,`modified_at`,`is_deleted`) values 
(1,'gallery','berkas/home/gallery/1652095225.jpg','',NULL,0,NULL,0,NULL,NULL,NULL,NULL,1652095164,1652095225,0),
(2,'benefit','berkas/home/benefit/1652108838.jpg','Mentoring','Dimentori dengan mentor yang berpengalaman',0,NULL,0,NULL,NULL,NULL,NULL,1652095621,1652108909,0),
(3,'gallery','berkas/home/gallery/1652095685.jpg','',NULL,0,NULL,0,NULL,NULL,NULL,NULL,1652095685,0,0),
(4,'gallery','berkas/home/gallery/1652095828.jpg','',NULL,0,NULL,0,NULL,NULL,NULL,NULL,1652095828,0,0),
(5,'benefit','berkas/home/benefit/1652108903.jpg','Uang Saku','Dapatkan uang saku selama kegiatan berlangsung',0,NULL,0,NULL,NULL,NULL,NULL,1652095866,1652108904,0),
(6,'sinopsis','','<h2>Semangat mengejar mimpi harus terus menyala ✊✊✊</h2>\r\n<p>Program YBB mendukung mimpi para generasi penerus bangsa untuk mendapatkan pendidikan yang memadai.&nbsp;</p>\r\n<p>Permasalahan ekonomi sering kali menjadi momok pembicaraan untuk mendapatkan pendidikan yang lebih layak. Oleh karena itu, problematika pendidikan dan ekonomi saling berhubungan erat satu sama lain, namun kondisi perekonomian yang sulit seharusnya tidak memadamkan semangat dan mimpi para generasi muda untuk melanjutkan studinya.</p>\r\n<p>&nbsp;</p>\r\n<p>Kini Youth Break the Boundaries Foundation hadir untuk mendorong semangat para pelajar dan mahasiswa agar terus berprestasi dimapun dan kapanpun. Harapannya, program Beasiswa ini mampu meningkatkan pendidikan generasi muda yang berkelanjutan serta mempersiapkan generasi penerus bangsa yang berkualitas dan unggul diberbagai bidang.</p>\r\n<p>&nbsp;</p>\r\n<p>Mari wujudkan masa depan yang lebih gemilang bersama YBB! ✊✊✊</p>\r\n<p>&nbsp;</p>',NULL,0,NULL,0,NULL,NULL,NULL,NULL,0,0,0),
(13,'hero','berkas/home/hero/1652103968.jpg','YBB FOUNDATION','\"Inspire the Next\"',1,'berkas/home/hero/16521039681.jpg',0,'','','#000000',NULL,1652103968,0,0),
(14,'hero','berkas/home/hero/1652104269.jpg','YBB Foundation Scholarship','',0,NULL,1,'Apply Here','http://localhost/scholarship','#fb669e',NULL,1652104269,0,0),
(15,'hero','berkas/home/hero/1652104269.jpg','YBB','',1,'berkas/home/hero/1652106474.jpg',1,'TEST','www.google.com','#ffffff','#000000',1652106886,0,1);

/*Table structure for table `tb_other_program` */

DROP TABLE IF EXISTS `tb_other_program`;

CREATE TABLE `tb_other_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(20) NOT NULL,
  `modified_at` int(20) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_other_program` */

insert  into `tb_other_program`(`id`,`title`,`picture`,`desc`,`draft`,`created_at`,`modified_at`,`is_deleted`) values 
(1,'Konferensi International','berkas/other-program/content/1651853889.jpg','<p>YBB setiap tahunnya aktif dalam menyelenggarakan konferensi-konferensi nasional maupun di internasional. Berbagai macam konferensi telah dilaksanakan seperti di Istanbul, Malaysia, Thailand dan berbagai negara lainnya.</p>\r\n\r\n<p>ig: @istanbulyouthsummit @middleeastsummit @cairoyouthsummit&nbsp;</p>\r\n\r\n<p>web:</p>\r\n',0,1651853889,0,1),
(2,'Konferensi International','berkas/other-program/content/1651854005.jpg','<p>YBB setiap tahunnya aktif dalam menyelenggarakan konferensi-konferensi nasional maupun di internasional. Berbagai macam konferensi telah dilaksanakan seperti di Istanbul, Malaysia, Thailand dan berbagai negara lainnya.</p>\r\n\r\n<p>ig: @istanbulyouthsummit @middleeastsummit @cairoyouthsummit&nbsp;</p>\r\n\r\n<p>web:</p>\r\n',0,1651854005,0,0),
(3,'Education Consultant','berkas/other-program/content/1651854176.jpg','<p>Saat ini YBB sangat aktif dalam memberikan informasi untuk para pelajar Indonesia yang ingin melanjutkan pendidikan ke Luar Negeri. Saat ini sosial media YBB sangat aktif dalam membagikan berbagai macam informasi beasiswa, mentoring serta ikut serta dalam mendampingi pelajar Indonesia belajar ke luar negeri.</p>\r\n\r\n<p>ig:@ybbedu.id</p>\r\n\r\n<p>web:</p>\r\n',0,1651854176,0,0),
(4,'YBB School ','berkas/other-program/content/1651854193.jpg','<p>YBB School saat ini banyak berkontribusi dengan banyak sekolah, lembaga, dan organisasi untuk meningkatkan pendidikan pelajar khususnya dalam bidang bahasa. Selain itu, YBB juga aktif untuk mengadakan seminar baik secara online maupun offline ke berbagai lembaga dan sekolah.</p>\r\n\r\n<p>@ybbturkishschool @ybbenglishschool @ybbarabicschool</p>\r\n',0,1651854193,0,0),
(5,'YBB Store','berkas/other-program/content/1651854212.jpg','<p>YBB Store menjadi salah satu platform jual beli merchandise sampai buku tulisan karya anak bangsa yang kuliah di&nbsp; luar negeri.&nbsp;</p>\r\n\r\n<p>ig: @ybbstore</p>\r\n',0,1651854212,0,0);

/*Table structure for table `tb_scholarship` */

DROP TABLE IF EXISTS `tb_scholarship`;

CREATE TABLE `tb_scholarship` (
  `scholar_id` varchar(25) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `date_birth` varchar(20) DEFAULT NULL,
  `whatsapp_number` varchar(18) DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `field_study` varchar(30) DEFAULT NULL,
  `school` varchar(30) DEFAULT NULL,
  `current_gpa` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `dream_come` text DEFAULT NULL,
  `volunteer` text DEFAULT NULL,
  `status` int(5) DEFAULT 1,
  `created_at` int(20) DEFAULT NULL,
  `modified_at` int(20) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1: Process, 2: Approved, 3: Rejected',
  PRIMARY KEY (`scholar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_scholarship` */

insert  into `tb_scholarship`(`scholar_id`,`user_id`,`full_name`,`date_birth`,`whatsapp_number`,`current_address`,`field_study`,`school`,`current_gpa`,`semester`,`about`,`dream_come`,`volunteer`,`status`,`created_at`,`modified_at`,`is_deleted`) values 
('SCHLR-MHNDR-231','USR-MHNDR-8b740','Mahendra Dwi Purwanto','2022-04-15','85785111746','Singosari','Computer Science','STIKI','3.66','1','test','yes','no',3,1650031587,NULL,0),
('SCHLR-MHNDR-c828b8','USR-MHNDR-8b740','Mahendra Dwi Purwanto','2022-04-15','85785111746','Singosari','Computer Science','STIKI Malang','3.22','1','test','yes','no',2,1652450787,NULL,0),
('SCHLR-MHNDR-c82awd8','USR-MHNDR-8b740','Mahendra Dwi Purwanto','2022-04-15','85785111746','Singosari','Computer Science','STIKI','3.66','1','test','yes','no',1,1652450787,NULL,0);

/*Table structure for table `tb_scholarship_file` */

DROP TABLE IF EXISTS `tb_scholarship_file`;

CREATE TABLE `tb_scholarship_file` (
  `scholar_id` varchar(25) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `upload_follow` varchar(255) DEFAULT NULL,
  `upload_apps` varchar(255) DEFAULT NULL,
  `upload_youtube` varchar(255) DEFAULT NULL,
  `upload_telegram` varchar(255) DEFAULT NULL,
  `upload_story` varchar(255) DEFAULT NULL,
  `upload_tags` varchar(255) DEFAULT NULL,
  `upload_twibbon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_scholarship_file` */

insert  into `tb_scholarship_file`(`scholar_id`,`user_id`,`upload_follow`,`upload_apps`,`upload_youtube`,`upload_telegram`,`upload_story`,`upload_tags`,`upload_twibbon`) values 
('SCHLR-MHNDR-231','USR-MHNDR-8b740','berkas/user/USR-MHNDR-8b740/scholarship/1650035344.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353441.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353442.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353443.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353444.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353445.jpg',NULL),
('SCHLR-MHNDR-c82awd8','USR-MHNDR-8b740','berkas/user/USR-MHNDR-8b740/scholarship/1650035344.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353441.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353442.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353443.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353444.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353445.jpg',NULL),
('SCHLR-MHNDR-c828b8','USR-MHNDR-8b740','berkas/user/USR-MHNDR-8b740/scholarship/1650035344.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353441.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353442.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353443.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353444.jpg','berkas/user/USR-MHNDR-8b740/scholarship/16500353445.jpg',NULL);

/*Table structure for table `tb_settings` */

DROP TABLE IF EXISTS `tb_settings`;

CREATE TABLE `tb_settings` (
  `key` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_settings` */

insert  into `tb_settings`(`key`,`value`,`desc`) values 
('contribute_an_rekening','Yayasan Pemuda Penembus Batas (mandiri)',NULL),
('contribute_desc','<p>YBB Scholarship dikelola sepenuhnya oleh YBB Foundation dan dengan dukungan dari berbagai pihak yang memberikan donasi dan kontribusi. Anda dapat turut serta berkontribusi dalam beasiswa YBB ini. Donasi Anda akan digunakan untuk diberikan kepada penerima beasiswa pada yayasan kami.</p>\r\n',NULL),
('contribute_rekening','1370017756343',NULL),
('contribute_whatsapp','085646006909',NULL),
('mailer_alias','YBB Foundation Scholarship',NULL),
('mailer_host','smtp.gmail.com',NULL),
('mailer_mode','0',NULL),
('mailer_password','hxexyuauljnejjmq',NULL),
('mailer_port','587',NULL),
('mailer_username','ngodingin.indonesia@gmail.com',NULL),
('op_bg','berkas/other-program/1651854116.jpg',NULL),
('op_desc','Learn more about what we do',NULL),
('web_about','<p>YBB merupakan organisasi yang fokus pengembangan dan pemberdayaan pemuda untuk mempersiapkan pemimpin masa depan yang unggul dengan mengedepankan jati diri dan karakter yang kuat serta memberikan nilai-nilai luhur bagi pemuda.</p>\r\n<p>Sejak tahun 2021 YBB memulai untuk membantu pendidikan mahasiswa mahasiswa terbaik pilihan YBB berupa bantuan uang saku dan mentoring. Hal ini selaras dengan tujuan YBB dalam menjadi wadah bagi pemuda dalam pembentukan karakter mereka. ✊✊✊✊</p>',NULL),
('web_address','East Java - Indonesia',NULL),
('web_desc','<p>This website make to become a media for YBB Foundation scholaship program, that held every year for every collage student in Indonesia</p>\r\n',NULL),
('web_email','ngodingin.indonesia@gmail.com',NULL),
('web_facebook','www.facebook.com',NULL),
('web_icon','icon.png',NULL),
('web_icon_white','icon-white.png',NULL),
('web_instagram','www.instagram.com',NULL),
('web_logo','logo.png',NULL),
('web_logo_white','logo-white.png',NULL),
('web_motto','Semangat mengejar mimpi harus terus menyala',NULL),
('web_phone','085785111746',NULL),
('web_title','YBB Foundation Scholarship Programs',NULL),
('web_twitter','www.twitter.com',NULL),
('web_whatsapp','085785111746',NULL),
('web_youtube','www.youtube.com',NULL);

/*Table structure for table `tb_timeline` */

DROP TABLE IF EXISTS `tb_timeline`;

CREATE TABLE `tb_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(20) NOT NULL DEFAULT 0,
  `modified_at` int(20) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_timeline` */

insert  into `tb_timeline`(`id`,`title`,`period`,`desc`,`created_at`,`modified_at`,`is_deleted`) values 
(1,'Pendaftaran','05/10/2022 - 06/10/2022','',1652108118,1652112259,0),
(2,'Pengumuman Wawancara','06/26/2022 - 06/26/2022','',1652112299,0,0),
(3,'Wawancara','06/01/2022 - 06/03/2022','',1652112365,0,0),
(4,'Pengumuman','06/10/2022 - 06/10/2022','',1652112377,0,0);

/*Table structure for table `tb_token` */

DROP TABLE IF EXISTS `tb_token`;

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) NOT NULL,
  `key` varchar(255) NOT NULL,
  `type` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: inactive, 1: active',
  `date_created` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_token`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_token` */

insert  into `tb_token`(`id_token`,`user_id`,`key`,`type`,`status`,`date_created`) values 
(8,'USR-MHNDR-8b740','de064aefab72734efa45d5c60288e55579804ad16a7d1bbc6471b2dae51ee6979f4de3886165c2ba9e8ed36aab5deccaafe443f8ec1587bcbcafed209307fba1y8vwXgnb0DtlVitm0jlZeH3ilTVbppbR3cAu4z/b/SU=',1,1,1649995556),
(9,'USR-NGDNG-fcad7','7c94b6b8b38478432008283321e8c1609363ca4f038a8130574e9d94f58764f989c2767126780681539b508e6d1341508538e8d7f19222af9841b99b5688611dGozNQYXjlmfseQBhIJXU+zyJCaFXk2oUfyk86Qra1oo=',1,1,1650039738),
(16,'USR-NGDNG-fcad7','63a4088c596fd29be36d6a62717fa23b83730d84b9a22e464a426baaee397ff9',2,0,1651842631);

/*Table structure for table `tb_token_type` */

DROP TABLE IF EXISTS `tb_token_type`;

CREATE TABLE `tb_token_type` (
  `ID_TYPE` int(10) NOT NULL AUTO_INCREMENT,
  `TYPE` int(10) NOT NULL,
  `KETERANGAN` text DEFAULT NULL,
  PRIMARY KEY (`ID_TYPE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_token_type` */

insert  into `tb_token_type`(`ID_TYPE`,`TYPE`,`KETERANGAN`) values 
(1,1,'Proses verifikasi email'),
(2,2,'Permintaan link recovery password');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` varchar(15) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `address` text DEFAULT NULL,
  KEY `userForeign` (`user_id`),
  CONSTRAINT `userForeign` FOREIGN KEY (`user_id`) REFERENCES `tb_auth` (`user_id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`picture`,`name`,`gender`,`phone`,`address`) values 
('USR-MHNDR-8b740','berkas/user/USR-MHNDR-8b740/profile/1652346550.jpg','Mahendra Dwi Purwanto','other','85785111746',NULL),
('USR-NGDNG-fcad7',NULL,'Ngodingin Indonesia','male','85785111746',NULL),
('USR-MHNDR-8b740','berkas/user/USR-MHNDR-8b740/profile/1652346550.jpg','Mahendra Dwi Purwanto','other','85785111746',NULL),
('USR-MHNDR-8b740','berkas/user/USR-MHNDR-8b740/profile/1652346550.jpg','Mahendra Dwi Purwanto','other','85785111746',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
