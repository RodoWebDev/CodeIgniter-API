/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.30-MariaDB : Database - jetepay
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jetepay` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jetepay`;

/*Table structure for table `jt_entite` */

DROP TABLE IF EXISTS `jt_entite`;

CREATE TABLE `jt_entite` (
  `ID_ENTITE` varchar(20) DEFAULT NULL,
  `ID_ENT_JETEPAY` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `ADMINISTRATEUR` varchar(1) DEFAULT NULL,
  `BENEFICIAIRE` varchar(1) DEFAULT NULL,
  `GESTIONNAIRE` varchar(50) DEFAULT NULL,
  `ID_ENTITE_OFF` varchar(14) DEFAULT NULL,
  `ID_ADR1` varchar(38) DEFAULT NULL,
  `ID_ADR2` varchar(38) DEFAULT NULL,
  `ADR3` varchar(38) DEFAULT NULL,
  `ADR4` varchar(38) DEFAULT NULL,
  `ADR5` varchar(38) DEFAULT NULL,
  `ADR6` varchar(38) DEFAULT NULL,
  `AD_WEB` varchar(255) DEFAULT NULL,
  `AD_LOGO` varchar(255) DEFAULT NULL,
  `DATE_DEB` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL,
  `BENE_IBAN` varchar(34) DEFAULT NULL,
  KEY `ID_ENTITE` (`ID_ENTITE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_entite` */

insert  into `jt_entite`(`ID_ENTITE`,`ID_ENT_JETEPAY`,`DATE_MOD`,`ID_USER`,`ADMINISTRATEUR`,`BENEFICIAIRE`,`GESTIONNAIRE`,`ID_ENTITE_OFF`,`ID_ADR1`,`ID_ADR2`,`ADR3`,`ADR4`,`ADR5`,`ADR6`,`AD_WEB`,`AD_LOGO`,`DATE_DEB`,`DATE_FIN`,`BENE_IBAN`) values ('201801291122123332','STYXsss','2019-02-08 14:40:54','201801291122123333','O','N','N','45454545454555','STYX','Addr2','4, RUE DES BLES D\'OR','','','','www.celstyx.com','http://www.celstyx.com/wp/wp-content/uploads/2015/11/Logo-V5-Smallest2.png','2019-02-05','2019-02-05','333'),('201801291122123337','CCLB35','2018-11-06 00:00:00',NULL,'N','O','N','47545454545455','CC TRUC',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('201801291122123339','EMP','2018-11-06 00:00:00',NULL,'N','N','O','787878787888','EMP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `jt_equip` */

DROP TABLE IF EXISTS `jt_equip`;

CREATE TABLE `jt_equip` (
  `ID_EQUIPEMENT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `ID_EQ_JETEPAY` varchar(50) DEFAULT NULL,
  `ACTIF` varchar(1) DEFAULT NULL,
  `DATE_DEB` datetime DEFAULT NULL,
  `DATE_FIN` datetime DEFAULT NULL,
  `TYPE_EQUIPEMENT` varchar(50) DEFAULT NULL,
  `FOURNISSEUR` varchar(50) DEFAULT NULL,
  `NUM_SERIE` varchar(50) DEFAULT NULL,
  `TYPE_DECHET` varchar(50) DEFAULT NULL,
  `DEPOT_LITRAGE` int(11) DEFAULT '0',
  `DEPOT_POIDS` int(11) DEFAULT '0',
  `CAPACITE_M3` int(11) DEFAULT '0',
  `ID_EQ_FOURN` varchar(50) DEFAULT NULL,
  `ID_PTCOLL` varchar(50) DEFAULT NULL,
  `COORD_X` int(11) DEFAULT '0',
  `COORD_Y` int(11) DEFAULT '0',
  `ADR3` varchar(38) DEFAULT NULL,
  `ADR4NRUE` varchar(38) DEFAULT NULL,
  `ADR4BTQ` varchar(38) DEFAULT NULL,
  `ADR4RUE` varchar(38) DEFAULT NULL,
  `ADR5` varchar(38) DEFAULT NULL,
  `ADR6VILLE` varchar(38) DEFAULT NULL,
  `COINSEE` varchar(20) DEFAULT NULL,
  `NB_SESSIONS_MAX` int(11) DEFAULT '0',
  `ID_GESTIONNAIRE` varchar(20) DEFAULT NULL,
  `ID_BENEFICIAIRE` varchar(20) DEFAULT NULL,
  KEY `NUM_SERIE` (`NUM_SERIE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_equip` */

/*Table structure for table `jt_equip_journal` */

DROP TABLE IF EXISTS `jt_equip_journal`;

CREATE TABLE `jt_equip_journal` (
  `ID_EVT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `ID_EQ_JETEPAY` varchar(50) DEFAULT NULL,
  `ID_EQUIPEMENT` varchar(20) DEFAULT NULL,
  `SENS` varchar(1) DEFAULT NULL,
  `TYPE_EVT` varchar(50) DEFAULT NULL,
  `DATE_TRANS` datetime DEFAULT NULL,
  `HEURE_TRANS` datetime DEFAULT NULL,
  `TEL_USAGER` varchar(50) DEFAULT NULL,
  `MAIL_USAGER` varchar(50) DEFAULT NULL,
  `NFC_USAGER` varchar(50) DEFAULT NULL,
  `CODE_JETON` varchar(50) DEFAULT NULL,
  `TRANSACTION_OK` varchar(1) DEFAULT NULL,
  `ID_OPERATEUR` varchar(50) DEFAULT NULL,
  `MONTANT` float DEFAULT '0',
  KEY `CODE_JETON` (`CODE_JETON`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_equip_journal` */

/*Table structure for table `jt_equip_paiement` */

DROP TABLE IF EXISTS `jt_equip_paiement`;

CREATE TABLE `jt_equip_paiement` (
  `ID_EQUIP_PAIEMENT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `ID_BENEFICIAIRE` varchar(20) DEFAULT NULL,
  `ID_EQUIPEMENT` varchar(20) DEFAULT NULL,
  `ID_TYPE_PAIEMENT` varchar(50) DEFAULT NULL,
  `DATE_DEB` datetime DEFAULT NULL,
  `DATE_FIN` datetime DEFAULT NULL,
  `EXONERE` varchar(1) DEFAULT NULL,
  `TARIF_SESSION_PF` float DEFAULT '0',
  `TARIF_SESSION_PV` float DEFAULT '0',
  `TARIF_TVA` float DEFAULT '0',
  `COUT_GESTION_PC` float DEFAULT '0',
  `COUT_GESTION_HT` float DEFAULT '0',
  `COUT_GESTION_TVA` float DEFAULT '0',
  `COUT_GESTION_TTC` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_equip_paiement` */

/*Table structure for table `jt_jeton` */

DROP TABLE IF EXISTS `jt_jeton`;

CREATE TABLE `jt_jeton` (
  `ID_JETON` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `CODE_JETON` varchar(50) DEFAULT NULL,
  `TYPE_JETON` varchar(50) DEFAULT NULL,
  `ID_BENEFICIAIRE` varchar(20) DEFAULT NULL,
  `CONSOMME` varchar(1) DEFAULT NULL,
  KEY `CODE_JETON` (`CODE_JETON`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_jeton` */

/*Table structure for table `jt_type_paiement` */

DROP TABLE IF EXISTS `jt_type_paiement`;

CREATE TABLE `jt_type_paiement` (
  `ID_TYPE_PAIEMENT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `LBC_TYPE` varchar(50) DEFAULT NULL,
  `TARIF_SESSION_PF` float DEFAULT '0',
  `TARIF_SESSION_PV` float DEFAULT '0',
  `TARIF_TVA` float DEFAULT '0',
  `COUT_GESTION_PC` float DEFAULT '0',
  `COUT_GESTION_HT` float DEFAULT '0',
  `COUT_GESTION_TVA` float DEFAULT '0',
  `COUT_GESTION_TTC` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_type_paiement` */

insert  into `jt_type_paiement`(`ID_TYPE_PAIEMENT`,`DATE_MOD`,`ID_USER`,`LBC_TYPE`,`TARIF_SESSION_PF`,`TARIF_SESSION_PV`,`TARIF_TVA`,`COUT_GESTION_PC`,`COUT_GESTION_HT`,`COUT_GESTION_TVA`,`COUT_GESTION_TTC`) values ('1',NULL,NULL,'SMS+ à 1 E TTC',1,0,0,NULL,0.2,0,0.2),('2',NULL,NULL,'SANS CONTACT',3,NULL,0,2,0,0,0),('3',NULL,NULL,'AUDIOTEL',1,0.2,20,5,0,0,0);

/*Table structure for table `jt_user` */

DROP TABLE IF EXISTS `jt_user`;

CREATE TABLE `jt_user` (
  `ID_UUSER` varchar(20) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `MAILPSEUDO` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `PORTABLE` varchar(50) DEFAULT NULL,
  KEY `ID_UUSER` (`ID_UUSER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_user` */

insert  into `jt_user`(`ID_UUSER`,`DATE_MOD`,`ID_USER`,`MAILPSEUDO`,`PASSWORD`,`PORTABLE`) values ('201801291122123333','2019-02-08 14:40:54','201801291122123333','franck.hamon@celstyx.com','TopOfTop','+33683881971'),('201801291122123341',NULL,'201801291122123333','cc@cc.com','Truc',NULL),('201801291122123351',NULL,'201801291122123341','client@gmail.com','Customer',NULL),('201801291122123354',NULL,'201801291122123333','didier@gmail.com','GestionnaireForEmp',NULL);

/*Table structure for table `jt_user_entite` */

DROP TABLE IF EXISTS `jt_user_entite`;

CREATE TABLE `jt_user_entite` (
  `ID_UUSER` varchar(20) DEFAULT NULL,
  `ID_ENTITE` varchar(20) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `DATE_DEB` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL,
  `ADMINISTRATEUR` varchar(1) DEFAULT NULL,
  KEY `ID_ENTITE` (`ID_ENTITE`),
  KEY `ID_UUSER` (`ID_UUSER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `jt_user_entite` */

insert  into `jt_user_entite`(`ID_UUSER`,`ID_ENTITE`,`DATE_MOD`,`ID_USER`,`DATE_DEB`,`DATE_FIN`,`ADMINISTRATEUR`) values ('201801291122123333','201801291122123332','2019-02-08 14:40:54','201801291122123333','2019-02-05','2019-02-13','O'),('201801291122123341','201801291122123337',NULL,NULL,'2019-01-01','2100-12-31','O'),('201801291122123351','201801291122123337',NULL,NULL,'2019-01-01','2100-12-31','N'),('201801291122123354','201801291122123339',NULL,NULL,'2019-01-01','2100-12-31','O');

/*Table structure for table `next_jt_equip` */

DROP TABLE IF EXISTS `next_jt_equip`;

CREATE TABLE `next_jt_equip` (
  `ID_EQUIPEMENT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `ID_EQ_JETEPAY` varchar(50) DEFAULT NULL,
  `ACTIF` varchar(1) DEFAULT NULL,
  `DATE_DEB` datetime DEFAULT NULL,
  `DATE_FIN` datetime DEFAULT NULL,
  `TYPE_EQUIPEMENT` varchar(50) DEFAULT NULL,
  `FOURNISSEUR` varchar(50) DEFAULT NULL,
  `NUM_SERIE` varchar(50) DEFAULT NULL,
  `TYPE_DECHET` varchar(50) DEFAULT NULL,
  `DEPOT_LITRAGE` int(11) DEFAULT '0',
  `DEPOT_POIDS` int(11) DEFAULT '0',
  `CAPACITE_M3` int(11) DEFAULT '0',
  `ID_EQ_FOURN` varchar(50) DEFAULT NULL,
  `ID_PTCOLL` varchar(50) DEFAULT NULL,
  `COORD_X` int(11) DEFAULT '0',
  `COORD_Y` int(11) DEFAULT '0',
  `ADR3` varchar(38) DEFAULT NULL,
  `ADR4NRUE` varchar(38) DEFAULT NULL,
  `ADR4BTQ` varchar(50) DEFAULT NULL,
  `ADR4RUE` varchar(50) DEFAULT NULL,
  `ADR5` varchar(50) DEFAULT NULL,
  `ADR6VILLE` varchar(50) DEFAULT NULL,
  `COINSEE` varchar(50) DEFAULT NULL,
  `NB_SESSIONS_MAX` int(11) DEFAULT '0',
  `ID_GESTIONNAIRE` varchar(20) DEFAULT NULL,
  `ID_BENEFICIAIRE` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `next_jt_equip` */

/*Table structure for table `next_jt_equip_journal` */

DROP TABLE IF EXISTS `next_jt_equip_journal`;

CREATE TABLE `next_jt_equip_journal` (
  `ID_EVT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `ID_EQ_JETEPAY` varchar(50) DEFAULT NULL,
  `ID_EQUIPEMENT` varchar(20) DEFAULT NULL,
  `SENS` varchar(1) DEFAULT NULL,
  `TYPE_EVT` varchar(50) DEFAULT NULL,
  `DATE_TRANS` datetime DEFAULT NULL,
  `HEURE_TRANS` datetime DEFAULT NULL,
  `TEL_USAGER` varchar(50) DEFAULT NULL,
  `MAIL_USAGER` varchar(50) DEFAULT NULL,
  `NFC_USAGER` varchar(50) DEFAULT NULL,
  `CODE_JETON` varchar(50) DEFAULT NULL,
  `TRANSACTION_OK` varchar(1) DEFAULT NULL,
  `ID_OPERATEUR` varchar(50) DEFAULT NULL,
  `MONTANT` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `next_jt_equip_journal` */

/*Table structure for table `next_jt_equip_paiement` */

DROP TABLE IF EXISTS `next_jt_equip_paiement`;

CREATE TABLE `next_jt_equip_paiement` (
  `ID_EQUIP_PAIEMENT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `ID_BENEFICIAIRE` varchar(20) DEFAULT NULL,
  `ID_EQUIPEMENT` varchar(20) DEFAULT NULL,
  `ID_TYPE_PAIEMENT` varchar(50) DEFAULT NULL,
  `DATE_DEB` datetime DEFAULT NULL,
  `DATE_FIN` datetime DEFAULT NULL,
  `EXONERE` varchar(1) DEFAULT NULL,
  `TARIF_SESSION_PF` float DEFAULT '0',
  `TARIF_SESSION_PV` float DEFAULT '0',
  `TARIF_TVA` float DEFAULT '0',
  `COUT_GESTION_PC` float DEFAULT '0',
  `COUT_GESTION_HT` float DEFAULT '0',
  `COUT_GESTION_TVA` float DEFAULT '0',
  `COUT_GESTION_TTC` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `next_jt_equip_paiement` */

/*Table structure for table `next_jt_jeton` */

DROP TABLE IF EXISTS `next_jt_jeton`;

CREATE TABLE `next_jt_jeton` (
  `ID_JETON` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `DATE_CREATION` datetime DEFAULT NULL,
  `DATE_PREREMPTION` datetime DEFAULT NULL,
  `CODE_JETON` varchar(50) DEFAULT NULL,
  `MODELE_JETON` varchar(50) DEFAULT NULL,
  `TYPE_JETON` varchar(50) DEFAULT NULL,
  `ID_BENEFICIAIRE` varchar(20) DEFAULT NULL,
  `VALEUR_JETON` int(11) DEFAULT '0',
  `DATE_CONSOMMATION` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `next_jt_jeton` */

/*Table structure for table `next_jt_type_paiement` */

DROP TABLE IF EXISTS `next_jt_type_paiement`;

CREATE TABLE `next_jt_type_paiement` (
  `ID_TYPE_PAIEMENT` varchar(50) DEFAULT NULL,
  `DATE_MOD` datetime DEFAULT NULL,
  `ID_USER` varchar(50) DEFAULT NULL,
  `LBC_TYPE` varchar(50) DEFAULT NULL,
  `TARIF_SESSION_PF` float DEFAULT '0',
  `TARIF_SESSION_PV` float DEFAULT '0',
  `TARIF_TVA` float DEFAULT '0',
  `COUT_GESTION_PC` float DEFAULT '0',
  `COUT_GESTION_HT` float DEFAULT '0',
  `COUT_GESTION_TVA` float DEFAULT '0',
  `COUT_GESTION_TTC` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `next_jt_type_paiement` */

insert  into `next_jt_type_paiement`(`ID_TYPE_PAIEMENT`,`DATE_MOD`,`ID_USER`,`LBC_TYPE`,`TARIF_SESSION_PF`,`TARIF_SESSION_PV`,`TARIF_TVA`,`COUT_GESTION_PC`,`COUT_GESTION_HT`,`COUT_GESTION_TVA`,`COUT_GESTION_TTC`) values ('1',NULL,NULL,'SMS+ à 1 E TTC',1,0,0,NULL,0.2,0,0.2),('2',NULL,NULL,'SANS CONTACT',3,NULL,0,2,0,0,0),('3',NULL,NULL,'AUDIOTEL',1,0.2,20,5,0,0,0);

/*Table structure for table `permission` */

DROP TABLE IF EXISTS `permission`;

CREATE TABLE `permission` (
  `id` int(122) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(250) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `permission` */

insert  into `permission`(`id`,`user_type`,`data`) values (1,'Member','{\"users\":{\"own_create\":\"1\",\"own_read\":\"1\",\"own_update\":\"1\",\"own_delete\":\"1\"}}'),(2,'admin','{\"users\":{\"own_create\":\"1\",\"own_read\":\"1\",\"own_update\":\"1\",\"own_delete\":\"1\",\"all_create\":\"1\",\"all_read\":\"1\",\"all_update\":\"1\",\"all_delete\":\"1\"}}');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(122) unsigned NOT NULL AUTO_INCREMENT,
  `keys` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`id`,`keys`,`value`) values (1,'website','User Login and Management'),(2,'logo','logo.png'),(3,'favicon','favicon.ico'),(4,'SMTP_EMAIL',''),(5,'HOST',''),(6,'PORT',''),(7,'SMTP_SECURE',''),(8,'SMTP_PASSWORD',''),(9,'mail_setting','simple_mail'),(10,'company_name','Company Name'),(11,'crud_list','users,User'),(12,'EMAIL',''),(13,'UserModules','yes'),(14,'register_allowed','1'),(15,'email_invitation','1'),(16,'admin_approval','0'),(17,'user_type','[\"Member\"]');

/*Table structure for table `templates` */

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `id` int(121) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `template_name` varchar(255) DEFAULT NULL,
  `html` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `templates` */

insert  into `templates`(`id`,`module`,`code`,`template_name`,`html`) values (1,'forgot_pass','forgot_password','Forgot password','<html xmlns=\"http://www.w3.org/1999/xhtml\"><head>\r\n  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n  <style type=\"text/css\" rel=\"stylesheet\" media=\"all\">\r\n    /* Base ------------------------------ */\r\n    *:not(br):not(tr):not(html) {\r\n      font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;\r\n      -webkit-box-sizing: border-box;\r\n      box-sizing: border-box;\r\n    }\r\n    body {\r\n      \r\n    }\r\n    a {\r\n      color: #3869D4;\r\n    }\r\n\r\n\r\n    /* Masthead ----------------------- */\r\n    .email-masthead {\r\n      padding: 25px 0;\r\n      text-align: center;\r\n    }\r\n    .email-masthead_logo {\r\n      max-width: 400px;\r\n      border: 0;\r\n    }\r\n    .email-footer {\r\n      width: 570px;\r\n      margin: 0 auto;\r\n      padding: 0;\r\n      text-align: center;\r\n    }\r\n    .email-footer p {\r\n      color: #AEAEAE;\r\n    }\r\n  \r\n    .content-cell {\r\n      padding: 35px;\r\n    }\r\n    .align-right {\r\n      text-align: right;\r\n    }\r\n\r\n    /* Type ------------------------------ */\r\n    h1 {\r\n      margin-top: 0;\r\n      color: #2F3133;\r\n      font-size: 19px;\r\n      font-weight: bold;\r\n      text-align: left;\r\n    }\r\n    h2 {\r\n      margin-top: 0;\r\n      color: #2F3133;\r\n      font-size: 16px;\r\n      font-weight: bold;\r\n      text-align: left;\r\n    }\r\n    h3 {\r\n      margin-top: 0;\r\n      color: #2F3133;\r\n      font-size: 14px;\r\n      font-weight: bold;\r\n      text-align: left;\r\n    }\r\n    p {\r\n      margin-top: 0;\r\n      color: #74787E;\r\n      font-size: 16px;\r\n      line-height: 1.5em;\r\n      text-align: left;\r\n    }\r\n    p.sub {\r\n      font-size: 12px;\r\n    }\r\n    p.center {\r\n      text-align: center;\r\n    }\r\n\r\n    /* Buttons ------------------------------ */\r\n    .button {\r\n      display: inline-block;\r\n      width: 200px;\r\n      background-color: #3869D4;\r\n      border-radius: 3px;\r\n      color: #ffffff;\r\n      font-size: 15px;\r\n      line-height: 45px;\r\n      text-align: center;\r\n      text-decoration: none;\r\n      -webkit-text-size-adjust: none;\r\n      mso-hide: all;\r\n    }\r\n    .button--green {\r\n      background-color: #22BC66;\r\n    }\r\n    .button--red {\r\n      background-color: #dc4d2f;\r\n    }\r\n    .button--blue {\r\n      background-color: #3869D4;\r\n    }\r\n  </style>\r\n</head>\r\n<body style=\"width: 100% !important;\r\n      height: 100%;\r\n      margin: 0;\r\n      line-height: 1.4;\r\n      background-color: #F2F4F6;\r\n      color: #74787E;\r\n      -webkit-text-size-adjust: none;\">\r\n  <table class=\"email-wrapper\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"\r\n    width: 100%;\r\n    margin: 0;\r\n    padding: 0;\">\r\n    <tbody><tr>\r\n      <td align=\"center\">\r\n        <table class=\"email-content\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%;\r\n      margin: 0;\r\n      padding: 0;\">\r\n          <!-- Logo -->\r\n\r\n          <tbody>\r\n          <!-- Email Body -->\r\n          <tr>\r\n            <td class=\"email-body\" width=\"100%\" style=\"width: 100%;\r\n    margin: 0;\r\n    padding: 0;\r\n    border-top: 1px solid #edeef2;\r\n    border-bottom: 1px solid #edeef2;\r\n    background-color: #edeef2;\">\r\n              <table class=\"email-body_inner\" align=\"center\" width=\"570\" cellpadding=\"0\" cellspacing=\"0\" style=\" width: 570px;\r\n    margin:  14px auto;\r\n    background: #fff;\r\n    padding: 0;\r\n    border: 1px outset rgba(136, 131, 131, 0.26);\r\n    box-shadow: 0px 6px 38px rgb(0, 0, 0);\r\n       \">\r\n                <!-- Body content -->\r\n                <thead style=\"background: #3869d4;\"><tr><th><div align=\"center\" style=\"padding: 15px; color: #000;\"><a href=\"{var_action_url}\" class=\"email-masthead_name\" style=\"font-size: 16px;\r\n      font-weight: bold;\r\n      color: #bbbfc3;\r\n      text-decoration: none;\r\n      text-shadow: 0 1px 0 white;\">{var_sender_name}</a></div></th></tr>\r\n                </thead>\r\n                <tbody><tr>\r\n                  <td class=\"content-cell\" style=\"padding: 35px;\">\r\n                    <h1>Hi {var_user_name},</h1>\r\n                    <p>You recently requested to reset your password for your {var_website_name} account. Click the button below to reset it.</p>\r\n                    <!-- Action -->\r\n                    <table class=\"body-action\" align=\"center\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"\r\n      width: 100%;\r\n      margin: 30px auto;\r\n      padding: 0;\r\n      text-align: center;\">\r\n                      <tbody><tr>\r\n                        <td align=\"center\">\r\n                          <div>\r\n                            <!--[if mso]><v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"{{var_action_url}}\" style=\"height:45px;v-text-anchor:middle;width:200px;\" arcsize=\"7%\" stroke=\"f\" fill=\"t\">\r\n                              <v:fill type=\"tile\" color=\"#dc4d2f\" />\r\n                              <w:anchorlock/>\r\n                              <center style=\"color:#ffffff;font-family:sans-serif;font-size:15px;\">Reset your password</center>\r\n                            </v:roundrect><![endif]-->\r\n                            <a href=\"{var_varification_link}\" class=\"button button--red\" style=\"background-color: #dc4d2f;display: inline-block;\r\n      width: 200px;\r\n      background-color: #3869D4;\r\n      border-radius: 3px;\r\n      color: #ffffff;\r\n      font-size: 15px;\r\n      line-height: 45px;\r\n      text-align: center;\r\n      text-decoration: none;\r\n      -webkit-text-size-adjust: none;\r\n      mso-hide: all;\">Reset your password</a>\r\n                          </div>\r\n                        </td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                    <p>If you did not request a password reset, please ignore this email or reply to let us know.</p>\r\n                    <p>Thanks,<br>{var_sender_name} and the {var_website_name} Team</p>\r\n                   <!-- Sub copy -->\r\n                    <table class=\"body-sub\" style=\"margin-top: 25px;\r\n      padding-top: 25px;\r\n      border-top: 1px solid #EDEFF2;\">\r\n                      <tbody><tr>\r\n                        <td> \r\n                          <p class=\"sub\" style=\"font-size:12px;\">If you are having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>\r\n                          <p class=\"sub\"  style=\"font-size:12px;\"><a href=\"{var_varification_link}\">{var_varification_link}</a></p>\r\n                        </td>\r\n                      </tr>\r\n                    </tbody></table>\r\n                  </td>\r\n                </tr>\r\n              </tbody></table>\r\n            </td>\r\n          </tr>\r\n        </tbody></table>\r\n      </td>\r\n    </tr>\r\n  </tbody></table>\r\n\r\n\r\n</body></html>'),(3,'users','invitation','Invitation','<p>Hello <strong>{var_user_email}</strong></p>\r\n\r\n<p>Click below link to register&nbsp;<br />\r\n{var_inviation_link}</p>\r\n\r\n<p>Thanks&nbsp;</p>\r\n');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `users_id` int(121) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `var_key` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`users_id`,`user_id`,`var_key`,`status`,`is_deleted`,`name`,`password`,`email`,`profile_pic`,`user_type`) values (1,'1','','active','0','admin','$2y$10$xlOkDI1FGDpbGETv6IPX5O/aZlAlnNqv1mII6TB/m9g6w9ZFUq/16','olivekoko723@gmail.com','Skype-man_1548763147.jpg','admin'),(2,'2','','active','0','aaa','aaa','aaa@gmail.com','aaa.jpg','user'),(3,'3',NULL,'active','0','bbb','bbb','bbb@gmail.com','bbb.jpg','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
