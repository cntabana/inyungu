-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `igu_agents`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_agents`;
CREATE TABLE IF NOT EXISTS `igu_agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `telephone` int(20) NOT NULL,
  `iddistrict` int(11) NOT NULL,
  `sector` varchar(20) DEFAULT NULL,
  `identite` int(15) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iddistrict` (`iddistrict`),
  KEY `iduser` (`iduser`),
  CONSTRAINT `igu_agents_ibfk_2` FOREIGN KEY (`iddistrict`) REFERENCES `igu_district` (`id`),
  CONSTRAINT `igu_agents_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_client_product`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_client_product`;
CREATE TABLE IF NOT EXISTS `igu_client_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproduct` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `currentprice` int(11) NOT NULL,
  `creationdate` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `mesure` varchar(10) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idproduct` (`idproduct`,`idclient`),
  KEY `idclient` (`idclient`),
  CONSTRAINT `igu_client_product_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `igu_registration` (`id`),
  CONSTRAINT `igu_client_product_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `igu_products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_companytype`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_companytype`;
CREATE TABLE IF NOT EXISTS `igu_companytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companytype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companytype` (`companytype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_credit`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_credit`;
CREATE TABLE IF NOT EXISTS `igu_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cash` int(11) NOT NULL,
  `days` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cash` (`cash`),
  UNIQUE KEY `days` (`days`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_district`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_district`;
CREATE TABLE IF NOT EXISTS `igu_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(20) NOT NULL,
  `idprovince` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `district` (`district`),
  KEY `idprovince` (`idprovince`),
  CONSTRAINT `igu_district_ibfk_1` FOREIGN KEY (`idprovince`) REFERENCES `igu_province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_historique_price`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_historique_price`;
CREATE TABLE IF NOT EXISTS `igu_historique_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproduct` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `changedate` date NOT NULL,
  `oldprice` int(11) NOT NULL,
  `newprice` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idproduct` (`idproduct`,`idclient`),
  KEY `idclient` (`idclient`),
  CONSTRAINT `igu_historique_price_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `igu_registration` (`id`),
  CONSTRAINT `igu_historique_price_ibfk_2` FOREIGN KEY (`idproduct`) REFERENCES `igu_products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_image_product`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_image_product`;
CREATE TABLE IF NOT EXISTS `igu_image_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `idclientproduct` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idclientproduct` (`idclientproduct`),
  CONSTRAINT `igu_image_product_ibfk_1` FOREIGN KEY (`idclientproduct`) REFERENCES `igu_client_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_investment`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_investment`;
CREATE TABLE IF NOT EXISTS `igu_investment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `cashinvested` int(11) NOT NULL,
  `cashprofit` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idclient` (`idclient`,`idproduct`),
  CONSTRAINT `igu_investment_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `igu_registration` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_payment`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_payment`;
CREATE TABLE IF NOT EXISTS `igu_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `datepaiement` date NOT NULL,
  `vouchernumber` varchar(12) NOT NULL,
  `validity` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idclient` (`idclient`),
  CONSTRAINT `igu_payment_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `igu_registration` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_product_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_product_category`;
CREATE TABLE IF NOT EXISTS `igu_product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_products`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_products`;
CREATE TABLE IF NOT EXISTS `igu_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsouscategory` int(11) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productname` (`productname`),
  KEY `idsouscategory` (`idsouscategory`),
  CONSTRAINT `igu_products_ibfk_1` FOREIGN KEY (`idsouscategory`) REFERENCES `igu_sous_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_province`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_province`;
CREATE TABLE IF NOT EXISTS `igu_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `province` (`province`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_registration`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_registration`;
CREATE TABLE IF NOT EXISTS `igu_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `datedinscription` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `iddistrict` int(11) NOT NULL,
  `idumurenge` int(11) NOT NULL,
  `akagali` varchar(20) NOT NULL,
  `umudugudu` varchar(20) DEFAULT NULL,
  `identite` varchar(16) DEFAULT NULL,
  `idcompanytype` int(11) NOT NULL,
  `numberofmembers` int(5) NOT NULL DEFAULT '1',
  `nameofcooperative` varchar(50) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iduser` (`iduser`),
  KEY `idcompanytype` (`idcompanytype`),
  KEY `idumurenge` (`idumurenge`),
  KEY `iddistrict` (`iddistrict`),
  CONSTRAINT `igu_registration_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`),
  CONSTRAINT `igu_registration_ibfk_3` FOREIGN KEY (`idcompanytype`) REFERENCES `igu_companytype` (`id`),
  CONSTRAINT `igu_registration_ibfk_4` FOREIGN KEY (`idumurenge`) REFERENCES `imirenge` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_sous_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_sous_category`;
CREATE TABLE IF NOT EXISTS `igu_sous_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory` varchar(30) NOT NULL,
  `idcategory` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategory` (`subcategory`),
  KEY `idcategory` (`idcategory`),
  CONSTRAINT `igu_sous_category_ibfk_1` FOREIGN KEY (`idcategory`) REFERENCES `igu_product_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_voucher`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_voucher`;
CREATE TABLE IF NOT EXISTS `igu_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vouchernumber` varchar(12) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `idcredit` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vouchernumber` (`vouchernumber`),
  KEY `idcredit` (`idcredit`),
  CONSTRAINT `igu_voucher_ibfk_1` FOREIGN KEY (`idcredit`) REFERENCES `igu_credit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56786 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `igu_voucher_management`
-- -------------------------------------------
DROP TABLE IF EXISTS `igu_voucher_management`;
CREATE TABLE IF NOT EXISTS `igu_voucher_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idagent` int(11) NOT NULL,
  `idvoucher` int(11) NOT NULL,
  `useddate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `givendate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idagent` (`idagent`,`idvoucher`),
  KEY `idvoucher` (`idvoucher`),
  CONSTRAINT `igu_voucher_management_ibfk_1` FOREIGN KEY (`idvoucher`) REFERENCES `igu_voucher` (`id`),
  CONSTRAINT `igu_voucher_management_ibfk_2` FOREIGN KEY (`idagent`) REFERENCES `igu_agents` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `imirenge`
-- -------------------------------------------
DROP TABLE IF EXISTS `imirenge`;
CREATE TABLE IF NOT EXISTS `imirenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `umurenge` varchar(30) NOT NULL,
  `iddistrict` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iddistrict` (`iddistrict`),
  CONSTRAINT `imirenge_ibfk_1` FOREIGN KEY (`iddistrict`) REFERENCES `igu_district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `pcounter_save`
-- -------------------------------------------
DROP TABLE IF EXISTS `pcounter_save`;
CREATE TABLE IF NOT EXISTS `pcounter_save` (
  `save_name` varchar(10) NOT NULL,
  `save_value` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `pcounter_users`
-- -------------------------------------------
DROP TABLE IF EXISTS `pcounter_users`;
CREATE TABLE IF NOT EXISTS `pcounter_users` (
  `user_ip` varchar(39) NOT NULL,
  `user_time` int(10) unsigned NOT NULL,
  UNIQUE KEY `user_ip` (`user_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `user`
-- -------------------------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `salt` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE DATA igu_client_product
-- -------------------------------------------
INSERT INTO `igu_client_product` (`id`,`idproduct`,`idclient`,`currentprice`,`creationdate`,`quantity`,`mesure`,`totalamount`,`detail`) VALUES
('1','25','3','100','2014-02-19','100','T','100000','ok');
INSERT INTO `igu_client_product` (`id`,`idproduct`,`idclient`,`currentprice`,`creationdate`,`quantity`,`mesure`,`totalamount`,`detail`) VALUES
('2','21','3','100','2014-02-20','100','Kg','100000','ok ok');
INSERT INTO `igu_client_product` (`id`,`idproduct`,`idclient`,`currentprice`,`creationdate`,`quantity`,`mesure`,`totalamount`,`detail`) VALUES
('3','2','9','100','2014-02-20','100','Kg','100000','ok');



-- -------------------------------------------
-- TABLE DATA igu_companytype
-- -------------------------------------------
INSERT INTO `igu_companytype` (`id`,`companytype`) VALUES
('3','Company');
INSERT INTO `igu_companytype` (`id`,`companytype`) VALUES
('2','Cooperative');
INSERT INTO `igu_companytype` (`id`,`companytype`) VALUES
('1','personal');



-- -------------------------------------------
-- TABLE DATA igu_credit
-- -------------------------------------------
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('1','100','1');
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('2','500','2');
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('3','1000','3');
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('4','10000','150');
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('5','20000','200');
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('6','6000','175');
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('7','100000','1000');



-- -------------------------------------------
-- TABLE DATA igu_district
-- -------------------------------------------
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('1','Burera','1');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('2','Musanze','1');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('3','Rubavu','5');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('4','Rwamagana','3');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('5','Huye','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('8','Nyamagabe','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('11','Kayonza','3');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('13','Muhanga','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('15','Kicukiro','6');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('17','Nyarugenge','6');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('18','Gasabo','6');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('19','Nyanza','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('20','Gakenke','1');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('21','Rulindo','1');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('22','Bugesera','3');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('23','Nyagatare','3');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('24','Ngoma','3');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('25','Kirehe','3');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('26','Gatsibo','3');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('27','Gisagara','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('28','Kamonyi','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('29','Nyaruguru','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('30','Ruhango','2');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('31','Karongi','5');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('32','Ngororero','5');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('33','Nyabihu','5');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('34','Nyamasheke','5');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('35','Rusizi','5');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('36','Rutsiro','5');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('37','Gicumbi','1');



-- -------------------------------------------
-- TABLE DATA igu_image_product
-- -------------------------------------------
INSERT INTO `igu_image_product` (`id`,`image`,`idclientproduct`) VALUES
('1','default.jpg','1');
INSERT INTO `igu_image_product` (`id`,`image`,`idclientproduct`) VALUES
('2','default.jpg','2');
INSERT INTO `igu_image_product` (`id`,`image`,`idclientproduct`) VALUES
('3','default.jpg','3');



-- -------------------------------------------
-- TABLE DATA igu_payment
-- -------------------------------------------
INSERT INTO `igu_payment` (`id`,`idclient`,`datepaiement`,`vouchernumber`,`validity`) VALUES
('1','3','2014-02-19','845260550005','0');
INSERT INTO `igu_payment` (`id`,`idclient`,`datepaiement`,`vouchernumber`,`validity`) VALUES
('2','9','2014-02-20','524906857674','0');
INSERT INTO `igu_payment` (`id`,`idclient`,`datepaiement`,`vouchernumber`,`validity`) VALUES
('3','10','2014-02-23','278779222928','0');
INSERT INTO `igu_payment` (`id`,`idclient`,`datepaiement`,`vouchernumber`,`validity`) VALUES
('4','11','2014-02-23','578078798888','0');



-- -------------------------------------------
-- TABLE DATA igu_product_category
-- -------------------------------------------
INSERT INTO `igu_product_category` (`id`,`category`) VALUES
('2','Amatungo');
INSERT INTO `igu_product_category` (`id`,`category`) VALUES
('1','Ibihingwa');
INSERT INTO `igu_product_category` (`id`,`category`) VALUES
('3','Ibindi');



-- -------------------------------------------
-- TABLE DATA igu_products
-- -------------------------------------------
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('2','11','Icyayi','8.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('3','11','Ikawa','9.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('5','10','Amasaka','11.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('6','4','Ihene','12.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('7','6','Inkoko','13.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('8','5','Inka','14.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('9','4','Intama','15.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('10','4','Ingurube','16.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('11','4','Inkwavu','17.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('12','4','Imbeba','18.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('13','6','Inzuki','38.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('14','8','Inanasi','39.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('15','8','Icunga','40.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('16','8','Ibinyomoro','19.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('17','8','Imineke','20.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('18','8','Indimu','7.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('19','8','Imyembe','29.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('20','8','Marakuja','30.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('21','8','Avoka','31.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('22','11','Ibireti','32.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('23','9','Ibitunguru','6.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('24','9','Karoti','33.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('25','9','Amashu','34.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('26','9','Epinari','35.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('27','9','Imiteja','36jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('28','9','Puwavuro','37.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('29','9','Itomati','22.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('30','9','Ibihumyo','21.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('31','10','Umuceli','42.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('32','10','Ibigori','23.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('33','10','Ingano','28.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('34','10','Ibirayi','24.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('35','10','Imyumbati','25.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('36','10','Ibijumba','26.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('37','10','Amateke','27.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('38','10','Igitoki','41.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('39','10','Amashaza','5.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('40','10','Ibishyimbo','4.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('41','10','Soya','3.jpg');
INSERT INTO `igu_products` (`id`,`idsouscategory`,`productname`,`image`) VALUES
('42','10','Ubunyobwa','2.jpg');



-- -------------------------------------------
-- TABLE DATA igu_province
-- -------------------------------------------
INSERT INTO `igu_province` (`id`,`province`) VALUES
('1','Intara y\'Amajyaruguru');
INSERT INTO `igu_province` (`id`,`province`) VALUES
('2','Intara y\'Amajyepfo');
INSERT INTO `igu_province` (`id`,`province`) VALUES
('3','Intara y\'Iburasirazu');
INSERT INTO `igu_province` (`id`,`province`) VALUES
('5','Intara y’Iburengerazuba');
INSERT INTO `igu_province` (`id`,`province`) VALUES
('6','Umujyi wa Kigali');



-- -------------------------------------------
-- TABLE DATA igu_registration
-- -------------------------------------------
INSERT INTO `igu_registration` (`id`,`firstname`,`lastname`,`telephone`,`datedinscription`,`email`,`iddistrict`,`idumurenge`,`akagali`,`umudugudu`,`identite`,`idcompanytype`,`numberofmembers`,`nameofcooperative`,`iduser`) VALUES
('3','ntabana','coco','0788654321','2014-02-19','cntbanan@yahoo.fr','26','29','','dodo','1233456789','1','1','My own','11');
INSERT INTO `igu_registration` (`id`,`firstname`,`lastname`,`telephone`,`datedinscription`,`email`,`iddistrict`,`idumurenge`,`akagali`,`umudugudu`,`identite`,`idcompanytype`,`numberofmembers`,`nameofcooperative`,`iduser`) VALUES
('8','ntabana','coco','0788654321','2014-02-19','cntbanan@yahoo.fr','23','98','','09876','1198280196155267','3','1','cssb','13');
INSERT INTO `igu_registration` (`id`,`firstname`,`lastname`,`telephone`,`datedinscription`,`email`,`iddistrict`,`idumurenge`,`akagali`,`umudugudu`,`identite`,`idcompanytype`,`numberofmembers`,`nameofcooperative`,`iduser`) VALUES
('9','Uwamahoro','coco','2074507306','2014-02-20','cntbanan@yahoo.fr','23','98','rwaza','rukumbeli','8765472145788909','2','1','My own','15');
INSERT INTO `igu_registration` (`id`,`firstname`,`lastname`,`telephone`,`datedinscription`,`email`,`iddistrict`,`idumurenge`,`akagali`,`umudugudu`,`identite`,`idcompanytype`,`numberofmembers`,`nameofcooperative`,`iduser`) VALUES
('10','soso','soso','078865434321','2014-02-23','cntabana@yahoo.fr','22','1','kiki','kiki','8888888888888888','3','1','rssb','17');
INSERT INTO `igu_registration` (`id`,`firstname`,`lastname`,`telephone`,`datedinscription`,`email`,`iddistrict`,`idumurenge`,`akagali`,`umudugudu`,`identite`,`idcompanytype`,`numberofmembers`,`nameofcooperative`,`iduser`) VALUES
('11','koko','koko','987665','2014-02-23','cntbanan@yahoo.fr','24','83','nj','hu','8765472145788909','3','1','ko','16');



-- -------------------------------------------
-- TABLE DATA igu_sous_category
-- -------------------------------------------
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('4','Amatungo magufi','2');
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('5','Amatungo maremare','2');
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('6','Ibiguruka','2');
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('7','Amafi','2');
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('8','Imbuto','1');
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('9','Imboga','1');
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('10','Ibihingwa ngandurarugo','1');
INSERT INTO `igu_sous_category` (`id`,`subcategory`,`idcategory`) VALUES
('11','Ibihingwa ngengabukungu','1');



-- -------------------------------------------
-- TABLE DATA igu_voucher
-- -------------------------------------------
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56623','802295165552','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56624','524906857674','2','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56625','845260550005','2','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56626','722985410502','2','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56627','902715912522','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56628','269492059299','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56629','139311182129','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56630','953040244043','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56631','859596736669','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56632','837290021017','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56633','420529664940','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56634','556686698686','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56635','497799341917','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56636','474286076664','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56637','546990192026','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56638','407066081617','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56639','331238292821','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56640','189815530509','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56641','151823119391','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56642','435000431015','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56643','835753337375','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56644','698333437378','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56645','814230567074','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56646','696945806566','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56647','741632948281','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56648','899513976369','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56649','444249044944','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56650','673005429593','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56651','917137712727','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56652','331820303031','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56653','995546936665','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56654','320304260400','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56655','843765328583','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56656','144072060204','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56657','317388664847','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56658','115649016965','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56659','145102445255','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56660','882297962722','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56661','176886716666','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56662','505801933135','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56663','137359717977','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56664','307439075957','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56665','326779158986','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56666','545961868185','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56667','895195092525','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56668','399476649699','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56669','218193985358','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56670','684115853534','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56671','827550334047','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56672','714486951614','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56673','706374468486','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56674','913408302823','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56675','986102913236','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56676','909284511419','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56677','652853402322','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56678','989443497379','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56679','530831093130','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56680','745828766865','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56681','668395463538','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56682','968251096168','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56683','184929410904','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56684','195700741015','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56685','935029646965','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56686','247555386567','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56687','248408655858','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56688','543752975253','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56689','432700401012','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56690','500793723330','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56691','984071820104','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56692','836884241416','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56693','480437422720','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56694','147534051417','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56695','904968438884','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56696','505921385155','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56697','907404193437','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56698','259368020809','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56699','756159655956','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56700','823282697273','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56701','443709041913','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56702','509090994049','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56703','765902716265','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56704','137382768287','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56705','171927631711','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56706','653776745653','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56707','735979398985','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56708','434365140504','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56709','212316654642','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56710','403160978083','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56711','609896770609','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56712','772022742222','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56713','240676328680','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56714','360756667670','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56715','245327243735','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56716','664429403934','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56717','722855092522','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56718','803507757773','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56719','438923002328','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56720','176655410506','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56721','762244565452','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56722','998908026868','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56723','406786949696','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56724','977560528087','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56725','808088721818','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56726','234674834444','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56727','238008770808','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56728','911298199891','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56729','911396125651','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56730','240565649590','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56731','471982528281','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56732','412021129192','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56733','335895497575','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56734','578078798888','2','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56735','223632899293','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56736','973070181013','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56737','653912862223','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56738','450966784640','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56739','259318214849','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56740','200457457770','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56741','833358111813','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56742','142589221912','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56743','856083904346','1','5');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56744','934573860304','1','5');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56745','646472892226','1','5');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56746','242678102822','1','6');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56747','648178180808','1','6');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56748','601344844441','1','6');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56749','963502054243','1','6');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56750','489670656069','1','6');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56751','278779222928','2','2');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56752','848037117778','1','2');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56753','772287792722','1','2');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56754','469775254549','1','2');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56755','507875315557','1','2');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56756','221168977871','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56757','308548613838','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56758','536607771716','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56759','119884891419','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56760','675496285655','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56761','761162948281','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56762','745276982625','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56763','956255758586','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56764','308961145158','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56765','473710630003','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56766','199772004249','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56767','961298734841','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56768','448933574348','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56769','794070226064','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56770','608534984448','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56771','566114478486','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56772','650017126760','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56773','462398895852','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56774','650998088880','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56775','900144925450','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56776','659527626769','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56777','300275781510','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56778','725658594845','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56779','460024465450','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56780','395239742925','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56781','585420571015','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56782','328104638488','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56783','645371789195','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56784','181855404541','1','4');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56785','617569452927','1','4');



-- -------------------------------------------
-- TABLE DATA imirenge
-- -------------------------------------------
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('1','Gashora','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('2','Juru','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('3','Kamabuye','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('4','Ntarama','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('5','Mareba','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('6','Mayange','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('7','Musenyi','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('8','Mwogo','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('9','Ngeruka','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('10','Nyamata','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('11','Nyarugenge','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('12','Rilima','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('13','Ruhuha','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('14','Rweru','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('15','Shyara','22');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('16','Gasange','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('17','Gatsibo','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('18','Gitoki','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('19','Kabarore','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('20','Kageyo','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('21','Kiramuruzi','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('22','kKiziguro','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('23','Muhura','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('24','Murambi','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('25','Ngarama','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('26','Nyagihanga','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('27','Remera','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('28','Rugarama','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('29','Rwimbogo','26');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('30','Gahini','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('31','Kabare','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('32','Kabarondo','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('33','Mukarange','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('34','Murama','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('35','Murundi','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('36','Mwiri','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('37','Bungwe','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('38','Ndego','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('39','Nyamirama','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('40','Butaro','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('41','Cyanika','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('42','Rukara','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('43','Ruramira','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('44','Rwinkwavu','11');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('45','Gahara','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('46','cyeru','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('47','gahunga','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('48','Gatebe','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('49','Gatore','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('50','Kigina','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('51','Gitovu','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('52','Kirehe','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('53','Mahama','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('54','Kagogo','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('55','Mpanga','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('56','Kinoni','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('57','Musaza','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('58','Mushikiri','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('59','Nasho','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('60','Nyamugari','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('61','Nyarubuye','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('62','Kigarama','25');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('63','Gashanda','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('64','Jarama','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('65','Karembo','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('66','Kazo','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('67','Kibungo','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('68','Mugesera','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('69','Kinyababa','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('71','Kivuye','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('73','Nemba','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('76','Mutenderi','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('78','Rukira','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('79','Rukumberi','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('80','Rurenge','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('81','Sake','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('82','Zaza','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('83','Murama','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('84','Remera','24');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('85','Gatunda','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('86','Kiyombe','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('87','Karama','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('88','Karangazi','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('89','Katabagemu','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('90','Matimba','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('91','Mimuli','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('92','Mukama','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('93','Musheli','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('94','Nyagatare','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('95','Rukomo','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('96','Rwempasha','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('97','Rwimiyaga','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('98','Tabagwe','23');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('99','Fumbwe','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('100','Gahengeri','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('101','Gishari','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('102','Karenge','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('103','Kigabiro','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('104','Muhazi','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('105','Munyaga','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('106','Munyiginya','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('107','Musha','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('108','Muyumbu','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('109','Mwulire','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('110','Nyakariro','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('111','Nzige','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('112','Rubona','4');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('113','Rugarama','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('114','Rugendabari','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('115','Ruhunde','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('116','Rusarabuge','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('117','Rwerere','1');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('118','Busenge','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('119','Coko','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('120','Bumbogo','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('121','Gatsata','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('122','Cyabingo','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('123','Jali','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('124','Gakenke','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('125','Gikomero','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('126','Gashenyi','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('127','Gisozi','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('128','Jabana','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('129','Mugunga','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('130','Kinyinya','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('131','Ndera','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('132','Nduba','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('133','Rusororo','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('134','jinja','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('135','Rutunga','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('136','Kamubuga','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('137','Kacyiru','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('138','Kimihurura','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('139','Karambo','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('140','Kimironko','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('141','Kivuruga','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('142','Remera','18');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('143','Mataba','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('144','Gahanga','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('145','Minazi','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('146','Gatenga','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('147','Gikondo','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('148','Muhondo','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('149','Kagarama','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('150','Muyongwe','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('151','Kanombe','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('152','Kicukiro','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('153','Muzo','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('154','Kigarama','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('155','Masaka','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('156','Nemba','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('157','Niboye','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('158','Nyarugunga','15');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('159','Ruli','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('160','Rusasa','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('161','Rushashi','20');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('162','Bukure','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('163','Bwisige','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('164','Byumba','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('165','Cyumba','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('166','Gitega','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('167','Giti','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('168','Kanyinya','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('169','Kigali','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('170','Kaniga','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('171','Kimisagara','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('172','Mageragere','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('173','Muhima','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('174','Nyakabanda','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('175','Nyamirambo','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('176','Rwezamenyo','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('177','Nyarugenge','17');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('178','Bwishyura','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('179','Gishari','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('180','Gishyita','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('181','Gisovu','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('182','Gitesi','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('183','Kareba','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('184','Murambi','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('185','Mubuga','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('186','Rubengera','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('187','Manyagiro','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('188','Miyove','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('189','Mutuntu','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('190','Rugabano','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('191','Rwankuba','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('192','Ruganda','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('193','Twumba','31');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('194','Bwira','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('195','Kageyo','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('196','Mukarange','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('197','Muko','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('198','Gatumba','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('199','Mutete','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('200','Nyamiyaga','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('201','Hindiro','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('202','Nyankenke','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('203','Rubaya','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('204','Rukomo','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('205','Kabaya','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('206','Kageyo','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('207','Rushaki','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('208','Kavumu','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('209','Matyazo','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('210','Muhanda','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('211','Muhororo','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('212','Ndaro','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('213','Ngororero','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('214','Nyange','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('215','Rutare','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('216','Sovu','32');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('217','Ruvune','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('218','Bigogwe','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('219','Jenda','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('220','Rwamiko','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('221','Jomba','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('222','Shangasha','37');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('223','Kabatwa','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('224','Karago','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('225','Kintobo','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('226','Mukamira','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('227','Muringa','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('228','Rambura','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('229','Rugera','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('230','Busogo','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('231','Rurembo','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('232','Cyuve','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('233','Shyira','33');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('234','gacaca','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('235','Gashaki','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('236','Gataraga','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('237','Bushekeri','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('238','Kimonyi','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('239','Bushenge','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('240','Kinigi','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('241','Cyato','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('242','Muhoza','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('243','Gihombo','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('244','Kagano','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('245','Muko','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('246','Kanjongo','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('247','Karambi','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('248','Musanze','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('249','Nkotsi','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('250','Nyange','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('251','Remera','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('252','Rwaza','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('253','Shingiri','2');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('254','Karengera','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('255','Kirimbi','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('256','Macuba','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('257','Base','21');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('258','Mahembe','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('259','Burega','21');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('260','Nyabitekeri','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('261','Bushoki','21');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('262','Rangiro','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('263','Buyoga','21');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('264','Kinzuzi','21');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('265','Ruharambuga','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('266','Shangi','34');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('267','Bugeshi','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('268','Busasamana','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('269','Cyanzarwe','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('270','Gisenyi','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('271','Kanama','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('272','Kanzenze','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('273','Mudende','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('274','Nyakiliba','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('275','Nyamyumba','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('276','Nyundo','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('277','Rubavu','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('278','Rugerero','3');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('279','Bugarama','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('280','Butare','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('281','Bweyeye','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('282','Gikundamvura','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('283','Gashonga','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('284','Giheke','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('285','Gihundwe','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('286','Gitambi','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('287','Kamembe','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('288','Muganza','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('289','Muganza','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('290','Mururu','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('291','Nkanka','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('292','Nkombo','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('293','Nkungu','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('294','Nyakabuye','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('295','Nyakarenzo','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('296','Nzahaha','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('297','Rwimbogo','35');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('298','Boneza','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('299','Gihango','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('300','Kigeyo','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('301','Kivumu','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('302','Manihira','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('303','Mukura','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('304','Murunda','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('305','Musasa','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('306','Mushonyi','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('307','Mushubati','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('308','Nyabirasi','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('309','Ruhango','36');
INSERT INTO `imirenge` (`id`,`umurenge`,`iddistrict`) VALUES
('310','Rusebeya','36');



-- -------------------------------------------
-- TABLE DATA pcounter_save
-- -------------------------------------------
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('day_time','2456706');
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('max_count','2');
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('counter','5');
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('yesterday','0');



-- -------------------------------------------
-- TABLE DATA pcounter_users
-- -------------------------------------------
INSERT INTO `pcounter_users` (`user_ip`,`user_time`) VALUES
('\'197.155.70.178\'','1392648828');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('10','admin','2a3c1c5d123714824d9a9df6274dd076','2','52e7b9ee31c604.31795449');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('11','ntabana','1daf3dab16bc4aa6c2735350e6c8d142','1','5304a71b972b13.49960083');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('12','twi','623932824a1e299df87b1923cefec5e2','1','5304aa713bbe71.09834719');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('13','dodo','c0b23b5e82ff10656d0e56a9a2e0e29e','1','5304b263342b23.73384398');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('14','administrator','bef921c5a6caf3d167c5a75993db90b3','2','5305c5d8579735.86930170');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('15','jojo','315317f480800f03a852a361340268a3','1','5305d2cdf36e25.06018769');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('16','koko','0871b080015bee949a63d511536f6e0a','1','53060cb23d11c7.31947494');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('17','soso','6764113b16a5b6dfac05dee0f9a0d857','1','530a17c124f434.85888656');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
