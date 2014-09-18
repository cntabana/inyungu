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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
  `sector` varchar(20) DEFAULT NULL,
  `identite` varchar(16) NOT NULL,
  `idcompanytype` int(11) NOT NULL,
  `numberofmembers` int(5) NOT NULL DEFAULT '1',
  `nameofcooperative` varchar(50) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `iddistrict` (`iddistrict`),
  KEY `iduser` (`iduser`),
  KEY `idcompanytype` (`idcompanytype`),
  CONSTRAINT `igu_registration_ibfk_1` FOREIGN KEY (`iddistrict`) REFERENCES `igu_district` (`id`),
  CONSTRAINT `igu_registration_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`),
  CONSTRAINT `igu_registration_ibfk_3` FOREIGN KEY (`idcompanytype`) REFERENCES `igu_companytype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE DATA igu_agents
-- -------------------------------------------
INSERT INTO `igu_agents` (`id`,`firstname`,`lastname`,`telephone`,`iddistrict`,`sector`,`identite`,`iduser`) VALUES
('3','Musugi','Pierre','788654321','1','','877654321','13');
INSERT INTO `igu_agents` (`id`,`firstname`,`lastname`,`telephone`,`iddistrict`,`sector`,`identite`,`iduser`) VALUES
('4','bonzi','fils','788654321','4','burera','2147483647','23');
INSERT INTO `igu_agents` (`id`,`firstname`,`lastname`,`telephone`,`iddistrict`,`sector`,`identite`,`iduser`) VALUES
('5','amahoro','pacy','788543310','2','karago','2147483647','24');



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
('2','2000','60');
INSERT INTO `igu_credit` (`id`,`cash`,`days`) VALUES
('3','5000','100');
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
('3','Rubavu','1');
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
('15','Kimironko','6');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('17','Remera','6');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('18','Gasabo','6');
INSERT INTO `igu_district` (`id`,`district`,`idprovince`) VALUES
('19','Nyanza','2');



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
('11','Ibihingwa ngandurabukungu','1');



-- -------------------------------------------
-- TABLE DATA igu_voucher
-- -------------------------------------------
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56623','802295165552','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56624','524906857674','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56625','845260550005','1','3');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56626','722985410502','1','3');
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
('56723','406786949696','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56724','977560528087','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56725','808088721818','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56726','234674834444','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56727','238008770808','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56728','911298199891','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56729','911396125651','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56730','240565649590','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56731','471982528281','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56732','412021129192','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56733','335895497575','1','1');
INSERT INTO `igu_voucher` (`id`,`vouchernumber`,`status`,`idcredit`) VALUES
('56734','578078798888','1','1');
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
('56751','278779222928','1','2');
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
-- TABLE DATA pcounter_save
-- -------------------------------------------
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('day_time','2456691');
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('max_count','2');
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('counter','4');
INSERT INTO `pcounter_save` (`save_name`,`save_value`) VALUES
('yesterday','1');



-- -------------------------------------------
-- TABLE DATA pcounter_users
-- -------------------------------------------
INSERT INTO `pcounter_users` (`user_ip`,`user_time`) VALUES
('\'105.230.240.19\'','1391373105');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('2','ntabana','df67e491e8533db834f0f1a8286abf1a','1','5301f92c34fec6.22006825');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('3','dedy','1d2dfdebd15e96b4374ee6e0dadd9479','1','530112353c9a91.56296076');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('4','peter','8e6b8996f74e45354e404855446998fa','1','52e6cc4d8d7071.55109141');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('5','cyusa','d85bc337401559c96f36297727b20694','1','52e78db33356d8.34739566');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('6','kabengera','ce230720f00fdb40ae1bef07d27a5e73','1','52e78ee69534c9.81835154');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('7','coco','c0d99ac9f90e22f01b122ae9b4a98b7e','1','52e78fbddcf798.58280949');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('8','dodo','106391001bbe860a126ee5e16e92e53e','1','52e79014cbe645.46317453');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('9','fofo','7c95fb8620c71937397d2c28f8475634','1','52e7b4e371fa08.11180118');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('10','admin','2a3c1c5d123714824d9a9df6274dd076','2','52e7b9ee31c604.31795449');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('11','uwamahoro','9567412199cb403375ba8264b9c72732','2','52e90b1a588868.38219338');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('13','Musugi','381990dec9d6b4cc45d915b98f6a934a','3','52eb8227727863.73317075');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('14','mutuwa','0ea56e051c2ab3a36f8df57c3fb1e971','2','52eb829d180dd3.11770517');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('15','james','02a24310e107ddba341108c803d36059','1','52eb82b3a23199.84640918');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('16','umurungi','1fd7a30edfa3715b44eca8dd76b096d9','1','52eb8316ae88d2.35009550');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('17','komeza','5176f2e5368e9c418fa3fbb37bab2857','1','52ebae24bdd1a7.37738010');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('18','mukomeza','ae8d867a8386ee5d21c5f5abd5258b28','1','52ebae7bb2ec08.72707530');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('19','mutabazi','c97749b7f4f117a45ab43ca02232b17b','1','52ebaf4fbe29a3.61010657');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('20','fanny','743b1482cbb223cad2e402916afbd63c','1','52ebb06c187401.13750223');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('22','mugs','b0ab805439756444c590eb9ef0546e7c','1','52ebb0a0649058.07589208');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('23','bonzi','c11365b13cb01c39b04eb9ef9a8228a6','3','52ee3224320db4.97941807');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('24','pacy','539422c4beb7200deede17edcdae8621','3','52f1ec272c24b6.77555058');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('25','toto','6b26d4886883491ae30305489487f30f','3','52f1eca1b41280.74496855');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('27','joriji','e7e1d391f8c94cddfc18837cf3fdf4e7','2','52f1ed79bf8175.67429599');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('28','denyse','d33ca74804e75e85cf56542b21660c71','2','52f1ed8f156367.32958818');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('29','foto','05af4c0b8cfc1f549bd7c501136a0d96','1','52f1ed94f246f9.90745572');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('30','musolini','9fb1dffa142d009d25b45636208c0c2d','1','52f1edcccd2a42.28189074');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('31','cyuda','0b8d506be7d100202c92a3530e3f6e71','1','52f21e3dc04008.12884923');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('32','coucou','deb5b7bdc05d3147b204305474f0b0a8','1','52f2211aae3052.57958824');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('34','sebikoro','4cc5f006139f83acc0132f6184075df8','1','52f23f0dc3b205.89628070');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('35','pasi','562cde32abcf7a5d3579b848ef4274d8','1','5300fff5357fd0.91287930');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('36','twi','85ff29e091c4606bf0d0460fe1c11129','1','5301006db27ec1.36549543');
INSERT INTO `user` (`id`,`username`,`password`,`status`,`salt`) VALUES
('37','gigi','49b12c44c259b80f5173b5902e739141','1','5301142c107732.37134592');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
