/*
SQLyog Ultimate v9.02 
MySQL - 5.5.16 : Database - labtab
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Data for the table `1m_donor_contact_info` */

insert  into `1m_donor_contact_info`(`id`,`ssn`,`donor_contact_info_id`) values (3966,'555-55-5555',3966),(3967,'666-66-6666',3967),(3968,'777-77-7777',3968),(3969,'443-36-3343',0),(3970,'443-36-3343',3970),(3971,'234-234-2333',3971);

/*Data for the table `1m_donor_specimen` */

insert  into `1m_donor_specimen`(`id`,`ssn`,`number`) values (7095,'777-77-7777','1'),(7096,'666-66-6666','2'),(7097,'777-77-7777','3'),(7098,'555-55-5555','4'),(7099,'555-55-5555','5');

/*Data for the table `1m_labtab_portal` */

insert  into `1m_labtab_portal`(`id`,`labtab_username`,`portal_username`) values (11,'GabbaPentin','b8@webbender.local'),(12,'GabbaPentin','b9@webbender.local'),(14,'GabbaPentin','boggo88@webbender.local'),(16,'GabbaPentin','nikko@webbender.local'),(24,'Broby','tlp@web-bender.com'),(25,'Broby','slb@web-bender.com'),(26,'Broby','jt@webby.com'),(27,'Broby','OLG@w.com');

/*Data for the table `1m_specimen_finalized` */

insert  into `1m_specimen_finalized`(`id`,`specimen_number`,`finalized_id`) values (2,'2',5),(3,'2',6),(4,'2',7),(5,'2',8),(6,'2',9),(7,'2',10),(8,'2',11),(9,'2',12),(10,'2',13),(11,'2',14),(12,'2',15),(13,'2',16),(14,'2',17),(15,'2',18),(16,'2',19),(17,'2',20),(18,'2',21),(19,'3',22);

/*Data for the table `donor` */

insert  into `donor`(`ssn`) values ('234-234-2333'),('443-36-3343'),('555-55-5555'),('666-66-6666'),('777-77-7777');

/*Data for the table `donor_contact_info` */

insert  into `donor_contact_info`(`id`,`ssn`,`date_time_entered`,`dob`,`first_name`,`last_name`,`address`,`city`,`state`,`zip`,`phone`,`from_org`,`insertion_method`) values (3966,'555-55-5555','2013-05-15 00:00:00','2013-05-16','Charles','Schwab','555 Main','Portland','ME',4041,'505-555-5555','',0),(3967,'666-66-6666','2013-05-15 00:00:00','2013-05-16','Bonnie','Clyde','555 Main','Portland','ME',4041,'505-555-5555','',1),(3968,'777-77-7777','2013-05-15 00:00:00','2013-05-16','Deborah','Winger','555 Main','Portland','ME',4041,'505-555-5555','',1),(3969,'443-36-3343','2013-05-23 03:53:00','1922-05-14','Tammy','LePage','55 Main','Portland','OR',44039,'505-555-5555','Broby',1),(3970,'443-36-3343','2013-05-23 03:54:49','1922-05-14','Tammy','LePage','55 Main','Portland','OR',44039,'505-555-5555','Broby',1),(3971,'234-234-2333','2013-05-23 03:59:45','1975-05-14','Joe','LePage','176 Academy St','Portland','OR',4102,'207-764-5445','Broby',1);

/*Data for the table `donor_web_tracker` */

insert  into `donor_web_tracker`(`donor_web_tracker`) values (0000001),(0000002),(0000003),(0000004),(0000005),(0000006),(0000007),(0000008),(0000009),(0000010),(0000011),(0000012),(0000013),(0000014),(0000015),(0000016),(0000017),(0000018),(0000019),(0000020),(0000021),(0000022),(0000023),(0000024);

/*Data for the table `finalized` */

insert  into `finalized`(`id`,`portal_user`,`date_time`,`finalize_changed_to`) values (5,'jlupi@usaccuscreen.com','2013-05-20 15:47:10',0),(6,'jlupi@usaccuscreen.com','2013-05-20 16:49:41',1),(7,'jlupi@usaccuscreen.com','2013-05-20 16:50:54',1),(8,'jlupi@usaccuscreen.com','2013-05-20 17:13:35',1),(9,'jlupi@usaccuscreen.com','2013-05-20 17:15:04',1),(10,'jlupi@usaccuscreen.com','2013-05-20 17:19:47',1),(11,'jlupi@usaccuscreen.com','2013-05-20 17:21:29',0),(12,'jlupi@usaccuscreen.com','2013-05-20 17:22:02',0),(13,'jlupi@usaccuscreen.com','2013-05-20 17:25:25',0),(14,'jlupi@usaccuscreen.com','2013-05-20 17:31:11',0),(15,'jlupi@usaccuscreen.com','2013-05-20 17:31:54',0),(16,'jlupi@usaccuscreen.com','2013-05-20 17:32:22',1),(17,'jlupi@usaccuscreen.com','2013-05-20 17:32:44',1),(18,'jlupi@usaccuscreen.com','2013-05-20 17:35:36',1),(19,'jlupi@usaccuscreen.com','2013-05-20 17:36:31',0),(20,'jlupi@usaccuscreen.com','2013-05-20 17:36:40',1),(21,'jlupi@usaccuscreen.com','2013-05-20 17:36:52',0),(22,'jlupi@usaccuscreen.com','2013-05-20 19:48:52',1);

/*Data for the table `labtab_user` */

insert  into `labtab_user`(`labtab_username`,`org_name`,`user_type`) values ('Broby','Gabba Gabba, Inc.',1),('GabbaPentin','GabbaPentin',0),('Dancer','Tiny & Co.',1);

/*Data for the table `poc_positives` */

insert  into `poc_positives`(`number`,`amp`,`bar`,`bup`,`bzd_bzo`,`coc`,`mdma_xtc`,`met`,`mtd_mad`,`opi_mop_mor`,`oxy`,`pcp`,`ppx`,`tca`,`thc`,`bsalts`,`etg`,`k2`) values ('2',-1,-1,0,1,1,0,-1,0,2,0,0,0,0,0,0,0,2),('3',-1,-1,0,1,1,0,-1,0,2,0,0,0,0,0,0,0,2),('4',-1,-1,0,1,1,0,-1,0,2,0,0,0,0,0,0,0,2),('5',-1,-1,0,0,0,0,0,0,0,0,-1,-1,0,0,0,0,2);

/*Data for the table `portal_user` */

insert  into `portal_user`(`user_fname`,`user_lname`,`email`,`pw`,`user_type`) values ('Tammy','LePage','tlp@web-bender.com','password',1),('bozo3','bozo4','boggo88@webbender.local','test',0),('smart','smart2','b8@webbender.local','1234Asdf',1),('bozo','bozo2','nikko@webbender.local','test',1),('smart3','smart4','b9@webbender.local','test',0),('Shia','LeBouf','slb@web-bender.com','password',1),('John','Turnbull','jt@webby.com','password',1),('Oh long','Johnson','OLG@w.com','password',1);

/*Data for the table `pw_reset` */

insert  into `pw_reset`(`id`,`email`,`exp_date`,`used`) values (-1242175839,'b8@webbender.local','2013-06-12 03:15:07',1),(-703476207,'b8@webbender.local','2013-06-12 23:22:09',1),(-210371415,'b8@webbender.local','2013-05-12 03:16:30',0);

/*Data for the table `specimen` */

insert  into `specimen`(`number`,`from`,`received`,`date`,`ins_back`,`ins_front`,`ins2_back`,`ins2_front`,`other_medicines`,`ins_info`,`temp_ok`,`visit_reason`,`poc_method`,`physician`,`diagnoses`,`medicines`,`poc_positives`,`from_pending`,`label_text`,`signature`,`empid`,`finalized`,`collector_name`) values ('1','albuquerque','2013-05-13 00:00:00',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'clinic',NULL,'',0,''),('2','Broby','2013-05-12 00:00:00',NULL,'matt.jpg','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'court',NULL,'',0,''),('3','albuquerque','2013-05-12 00:00:00',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'court',NULL,'',1,''),('4','Broby','2013-04-12 00:00:00',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'court',NULL,'',0,''),('5','denver','2013-04-12 00:00:00',NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'clinic',NULL,'',0,'');

/*Data for the table `specimen_first_view` */

insert  into `specimen_first_view`(`number`,`email`,`date_time_seal_response`,`seal_condition`,`org_contacted`,`date_time_org_contacted`,`email_org_contacted`) values ('2','jlupi@usaccuscreen.com','2013-05-20 14:39:42',3,1,NULL,'b9@webbender.local'),('3','npr@npr.org','0000-00-00 00:00:00',3,0,'2013-05-15 20:02:56',NULL),('4','boose@heang','2013-05-15 20:02:56',3,0,'2013-05-15 20:02:56',NULL),('5','matt@web-bender.com','2013-05-15 20:02:56',3,0,'2013-05-15 20:02:56',NULL);

/*Data for the table `specimen_screen` */

insert  into `specimen_screen`(`number`,`Amphetamines`,`Barbituates`,`Benzodiazepines`,`Cocaine`,`Methadone`,`Phencyclidine`,`MDMA`,`Opiates`,`Oxycodone`,`Cannabinoids`,`Ethyl_Glucuronide`) values ('2',1,-1,1,-1,-1,1,1,-1,-1,1,0);

/*Data for the table `specimen_validation` */

insert  into `specimen_validation`(`number`,`ph`,`creatinine`,`specificgravity`,`Oxidants`,`Chromates`,`Nitrates`) values ('2',1,3,2,1,0,-1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
