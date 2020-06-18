/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : house

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-19 07:48:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `accesses`
-- ----------------------------
DROP TABLE IF EXISTS `accesses`;
CREATE TABLE `accesses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `accessible_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accessible_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accesses_accessible_type_accessible_id_index` (`accessible_type`,`accessible_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of accesses
-- ----------------------------

-- ----------------------------
-- Table structure for `action_events`
-- ----------------------------
DROP TABLE IF EXISTS `action_events`;
CREATE TABLE `action_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actionable_id` int(10) unsigned NOT NULL,
  `target_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) unsigned DEFAULT NULL,
  `fields` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'running',
  `exception` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `original` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `action_events_actionable_type_actionable_id_index` (`actionable_type`,`actionable_id`),
  KEY `action_events_batch_id_model_type_model_id_index` (`batch_id`,`model_type`,`model_id`),
  KEY `action_events_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of action_events
-- ----------------------------

-- ----------------------------
-- Table structure for `apartments`
-- ----------------------------
DROP TABLE IF EXISTS `apartments`;
CREATE TABLE `apartments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` bigint(20) unsigned NOT NULL,
  `city` bigint(20) unsigned NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `rent` double(8,2) NOT NULL,
  `deposit` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apartments_type_foreign` (`type`),
  KEY `apartments_city_foreign` (`city`),
  KEY `apartments_created_by_foreign` (`created_by`),
  CONSTRAINT `apartments_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `apartments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `apartments_type_foreign` FOREIGN KEY (`type`) REFERENCES `apartment_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of apartments
-- ----------------------------

-- ----------------------------
-- Table structure for `apartment_types`
-- ----------------------------
DROP TABLE IF EXISTS `apartment_types`;
CREATE TABLE `apartment_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of apartment_types
-- ----------------------------
INSERT INTO `apartment_types` VALUES ('1', 'Apartment', null, null);
INSERT INTO `apartment_types` VALUES ('2', 'House', null, null);

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', 'Allinge', null, null);
INSERT INTO `cities` VALUES ('2', 'Allingåbro', null, null);
INSERT INTO `cities` VALUES ('3', 'Almind', null, null);
INSERT INTO `cities` VALUES ('4', 'Anholt', null, null);
INSERT INTO `cities` VALUES ('5', 'Ans by', null, null);
INSERT INTO `cities` VALUES ('6', 'Ansager', null, null);
INSERT INTO `cities` VALUES ('7', 'Arden', null, null);
INSERT INTO `cities` VALUES ('8', 'Askeby', null, null);
INSERT INTO `cities` VALUES ('9', 'Asnæs', null, null);
INSERT INTO `cities` VALUES ('10', 'Asperup', null, null);
INSERT INTO `cities` VALUES ('11', 'Assens', null, null);
INSERT INTO `cities` VALUES ('12', 'Asaa', null, null);
INSERT INTO `cities` VALUES ('13', 'Augustenborg', null, null);
INSERT INTO `cities` VALUES ('14', 'Aulum', null, null);
INSERT INTO `cities` VALUES ('15', 'Auning', null, null);
INSERT INTO `cities` VALUES ('16', 'Bagenkop', null, null);
INSERT INTO `cities` VALUES ('17', 'Bagsværd', null, null);
INSERT INTO `cities` VALUES ('18', 'Balle', null, null);
INSERT INTO `cities` VALUES ('19', 'Ballerup', null, null);
INSERT INTO `cities` VALUES ('20', 'Bandholm', null, null);
INSERT INTO `cities` VALUES ('21', 'Barrit', null, null);
INSERT INTO `cities` VALUES ('22', 'Beder', null, null);
INSERT INTO `cities` VALUES ('23', 'Bedsted Thy', null, null);
INSERT INTO `cities` VALUES ('24', 'Bevtoft', null, null);
INSERT INTO `cities` VALUES ('25', 'Billum', null, null);
INSERT INTO `cities` VALUES ('26', 'Billund', null, null);
INSERT INTO `cities` VALUES ('27', 'Bindslev', null, null);
INSERT INTO `cities` VALUES ('28', 'Birkerød', null, null);
INSERT INTO `cities` VALUES ('29', 'Bjerringbro', null, null);
INSERT INTO `cities` VALUES ('30', 'Bjert', null, null);
INSERT INTO `cities` VALUES ('31', 'Bjæverskov', null, null);
INSERT INTO `cities` VALUES ('32', 'Blokhus', null, null);
INSERT INTO `cities` VALUES ('33', 'Blommenslyst', null, null);
INSERT INTO `cities` VALUES ('34', 'Blåvand', null, null);
INSERT INTO `cities` VALUES ('35', 'Boeslunde', null, null);
INSERT INTO `cities` VALUES ('36', 'Bogense', null, null);
INSERT INTO `cities` VALUES ('37', 'Bogø By', null, null);
INSERT INTO `cities` VALUES ('38', 'Bolderslev', null, null);
INSERT INTO `cities` VALUES ('39', 'Bording', null, null);
INSERT INTO `cities` VALUES ('40', 'Borre', null, null);
INSERT INTO `cities` VALUES ('41', 'Borup', null, null);
INSERT INTO `cities` VALUES ('42', 'Brabrand', null, null);
INSERT INTO `cities` VALUES ('43', 'Bramming', null, null);
INSERT INTO `cities` VALUES ('44', 'Brande', null, null);
INSERT INTO `cities` VALUES ('45', 'Branderup', null, null);
INSERT INTO `cities` VALUES ('46', 'Bredebro', null, null);
INSERT INTO `cities` VALUES ('47', 'Bredsten', null, null);
INSERT INTO `cities` VALUES ('48', 'Brenderup', null, null);
INSERT INTO `cities` VALUES ('49', 'Broager', null, null);
INSERT INTO `cities` VALUES ('50', 'Broby', null, null);
INSERT INTO `cities` VALUES ('51', 'Brovst', null, null);
INSERT INTO `cities` VALUES ('52', 'Bryrup', null, null);
INSERT INTO `cities` VALUES ('53', 'Brædstrup', null, null);
INSERT INTO `cities` VALUES ('54', 'Brøndby', null, null);
INSERT INTO `cities` VALUES ('55', 'Brøndby Strand', null, null);
INSERT INTO `cities` VALUES ('56', 'Brønderslev', null, null);
INSERT INTO `cities` VALUES ('57', 'Brønshøj', null, null);
INSERT INTO `cities` VALUES ('58', 'Brørup', null, null);
INSERT INTO `cities` VALUES ('59', 'Bylderup-Bov', null, null);
INSERT INTO `cities` VALUES ('60', 'Bække', null, null);
INSERT INTO `cities` VALUES ('61', 'Bækmarksbro', null, null);
INSERT INTO `cities` VALUES ('62', 'Bælum', null, null);
INSERT INTO `cities` VALUES ('63', 'Børkop', null, null);
INSERT INTO `cities` VALUES ('64', 'Bøvlingbjerg', null, null);
INSERT INTO `cities` VALUES ('65', 'Charlottenlund', null, null);
INSERT INTO `cities` VALUES ('66', 'Christiansfeld', null, null);
INSERT INTO `cities` VALUES ('67', 'Dalby', null, null);
INSERT INTO `cities` VALUES ('68', 'Dalmose', null, null);
INSERT INTO `cities` VALUES ('69', 'Dannemare', null, null);
INSERT INTO `cities` VALUES ('70', 'Daugård', null, null);
INSERT INTO `cities` VALUES ('71', 'Dianalund', null, null);
INSERT INTO `cities` VALUES ('72', 'Dragør', null, null);
INSERT INTO `cities` VALUES ('73', 'Dronninglund', null, null);
INSERT INTO `cities` VALUES ('74', 'Dronningmølle', null, null);
INSERT INTO `cities` VALUES ('75', 'Dybvad', null, null);
INSERT INTO `cities` VALUES ('76', 'Ebberup', null, null);
INSERT INTO `cities` VALUES ('77', 'Ebeltoft', null, null);
INSERT INTO `cities` VALUES ('78', 'Egernsund', null, null);
INSERT INTO `cities` VALUES ('79', 'Egtved', null, null);
INSERT INTO `cities` VALUES ('80', 'Egå', null, null);
INSERT INTO `cities` VALUES ('81', 'Ejby', null, null);
INSERT INTO `cities` VALUES ('82', 'Ejstrupholm', null, null);
INSERT INTO `cities` VALUES ('83', 'Engesvang', null, null);
INSERT INTO `cities` VALUES ('84', 'Errindlev', null, null);
INSERT INTO `cities` VALUES ('85', 'Erslev', null, null);
INSERT INTO `cities` VALUES ('86', 'Esbjerg', null, null);
INSERT INTO `cities` VALUES ('87', 'Eskebjerg', null, null);
INSERT INTO `cities` VALUES ('88', 'Eskilstrup', null, null);
INSERT INTO `cities` VALUES ('89', 'Espergærde', null, null);
INSERT INTO `cities` VALUES ('90', 'Fakse', null, null);
INSERT INTO `cities` VALUES ('91', 'Fakse Ladeplads', null, null);
INSERT INTO `cities` VALUES ('92', 'Fanø', null, null);
INSERT INTO `cities` VALUES ('93', 'Farsø', null, null);
INSERT INTO `cities` VALUES ('94', 'Farum', null, null);
INSERT INTO `cities` VALUES ('95', 'Fejø', null, null);
INSERT INTO `cities` VALUES ('96', 'Ferritslev Fyn', null, null);
INSERT INTO `cities` VALUES ('97', 'Fjenneslev', null, null);
INSERT INTO `cities` VALUES ('98', 'Fjerritslev', null, null);
INSERT INTO `cities` VALUES ('99', 'Flemming', null, null);
INSERT INTO `cities` VALUES ('100', 'Fredensborg', null, null);
INSERT INTO `cities` VALUES ('101', 'Fredericia', null, null);
INSERT INTO `cities` VALUES ('102', 'Frederiksberg', null, null);
INSERT INTO `cities` VALUES ('103', 'Frederikshavn', null, null);
INSERT INTO `cities` VALUES ('104', 'Frederikssund', null, null);
INSERT INTO `cities` VALUES ('105', 'Frederiksværk', null, null);
INSERT INTO `cities` VALUES ('106', 'Frørup', null, null);
INSERT INTO `cities` VALUES ('107', 'Frøstrup', null, null);
INSERT INTO `cities` VALUES ('108', 'Fuglebjerg', null, null);
INSERT INTO `cities` VALUES ('109', 'Fur', null, null);
INSERT INTO `cities` VALUES ('110', 'Føllenslev', null, null);
INSERT INTO `cities` VALUES ('111', 'Føvling', null, null);
INSERT INTO `cities` VALUES ('112', 'Faaborg', null, null);
INSERT INTO `cities` VALUES ('113', 'Fårevejle', null, null);
INSERT INTO `cities` VALUES ('114', 'Fårup', null, null);
INSERT INTO `cities` VALUES ('115', 'Fårvang', null, null);
INSERT INTO `cities` VALUES ('116', 'Gadbjerg', null, null);
INSERT INTO `cities` VALUES ('117', 'Gadstrup', null, null);
INSERT INTO `cities` VALUES ('118', 'Galten', null, null);
INSERT INTO `cities` VALUES ('119', 'Gandrup', null, null);
INSERT INTO `cities` VALUES ('120', 'Gedser', null, null);
INSERT INTO `cities` VALUES ('121', 'Gedsted', null, null);
INSERT INTO `cities` VALUES ('122', 'Gedved', null, null);
INSERT INTO `cities` VALUES ('123', 'Gelsted', null, null);
INSERT INTO `cities` VALUES ('124', 'Gentofte', null, null);
INSERT INTO `cities` VALUES ('125', 'Gesten', null, null);
INSERT INTO `cities` VALUES ('126', 'Gilleleje', null, null);
INSERT INTO `cities` VALUES ('127', 'Gislev', null, null);
INSERT INTO `cities` VALUES ('128', 'Gislinge', null, null);
INSERT INTO `cities` VALUES ('129', 'Gistrup', null, null);
INSERT INTO `cities` VALUES ('130', 'Give', null, null);
INSERT INTO `cities` VALUES ('131', 'Gjerlev', null, null);
INSERT INTO `cities` VALUES ('132', 'Gjern', null, null);
INSERT INTO `cities` VALUES ('133', 'Glamsbjerg', null, null);
INSERT INTO `cities` VALUES ('134', 'Glejbjerg', null, null);
INSERT INTO `cities` VALUES ('135', 'Glesborg', null, null);
INSERT INTO `cities` VALUES ('136', 'Glostrup', null, null);
INSERT INTO `cities` VALUES ('137', 'Glumsø', null, null);
INSERT INTO `cities` VALUES ('138', 'Gram', null, null);
INSERT INTO `cities` VALUES ('139', 'Gredstedbro', null, null);
INSERT INTO `cities` VALUES ('140', 'Grenaa', null, null);
INSERT INTO `cities` VALUES ('141', 'Greve', null, null);
INSERT INTO `cities` VALUES ('142', 'Greve Strand', null, null);
INSERT INTO `cities` VALUES ('143', 'Grevinge', null, null);
INSERT INTO `cities` VALUES ('144', 'Grindsted', null, null);
INSERT INTO `cities` VALUES ('145', 'Græsted', null, null);
INSERT INTO `cities` VALUES ('146', 'Gråsten', null, null);
INSERT INTO `cities` VALUES ('147', 'Gudbjerg', null, null);
INSERT INTO `cities` VALUES ('148', 'Gudhjem', null, null);
INSERT INTO `cities` VALUES ('149', 'Gudme', null, null);
INSERT INTO `cities` VALUES ('150', 'Guldborg', null, null);
INSERT INTO `cities` VALUES ('151', 'Gørding', null, null);
INSERT INTO `cities` VALUES ('152', 'Gørlev', null, null);
INSERT INTO `cities` VALUES ('153', 'Gørløse', null, null);
INSERT INTO `cities` VALUES ('154', 'Haderslev', null, null);
INSERT INTO `cities` VALUES ('155', 'Haderup', null, null);
INSERT INTO `cities` VALUES ('156', 'Hadsten', null, null);
INSERT INTO `cities` VALUES ('157', 'Hadsund', null, null);
INSERT INTO `cities` VALUES ('158', 'Hagersten', null, null);
INSERT INTO `cities` VALUES ('159', 'Hals', null, null);
INSERT INTO `cities` VALUES ('160', 'Hammel', null, null);
INSERT INTO `cities` VALUES ('161', 'Hampen', null, null);
INSERT INTO `cities` VALUES ('162', 'Hanstholm', null, null);
INSERT INTO `cities` VALUES ('163', 'Harboøre', null, null);
INSERT INTO `cities` VALUES ('164', 'Harlev', null, null);
INSERT INTO `cities` VALUES ('165', 'Harndrup', null, null);
INSERT INTO `cities` VALUES ('166', 'Harpelunde', null, null);
INSERT INTO `cities` VALUES ('167', 'Hasle', null, null);
INSERT INTO `cities` VALUES ('168', 'Haslev', null, null);
INSERT INTO `cities` VALUES ('169', 'Hasselager', null, null);
INSERT INTO `cities` VALUES ('170', 'Havdrup', null, null);
INSERT INTO `cities` VALUES ('171', 'Havndal', null, null);
INSERT INTO `cities` VALUES ('172', 'Hedehusene', null, null);
INSERT INTO `cities` VALUES ('173', 'Hedensted', null, null);
INSERT INTO `cities` VALUES ('174', 'Hejls', null, null);
INSERT INTO `cities` VALUES ('175', 'Hejnsvig', null, null);
INSERT INTO `cities` VALUES ('176', 'Hellebæk', null, null);
INSERT INTO `cities` VALUES ('177', 'Hellerup', null, null);
INSERT INTO `cities` VALUES ('178', 'Helsinge', null, null);
INSERT INTO `cities` VALUES ('179', 'Helsingør', null, null);
INSERT INTO `cities` VALUES ('180', 'Hemmet', null, null);
INSERT INTO `cities` VALUES ('181', 'Henne', null, null);
INSERT INTO `cities` VALUES ('182', 'Herfølge', null, null);
INSERT INTO `cities` VALUES ('183', 'Herlev', null, null);
INSERT INTO `cities` VALUES ('184', 'Herlufmagle', null, null);
INSERT INTO `cities` VALUES ('185', 'Herning', null, null);
INSERT INTO `cities` VALUES ('186', 'Hesselager', null, null);
INSERT INTO `cities` VALUES ('187', 'Hillerød', null, null);
INSERT INTO `cities` VALUES ('188', 'Hinnerup', null, null);
INSERT INTO `cities` VALUES ('189', 'Hirtshals', null, null);
INSERT INTO `cities` VALUES ('190', 'Hjallerup', null, null);
INSERT INTO `cities` VALUES ('191', 'Hjerm', null, null);
INSERT INTO `cities` VALUES ('192', 'Hjortshøj', null, null);
INSERT INTO `cities` VALUES ('193', 'Hjørring', null, null);
INSERT INTO `cities` VALUES ('194', 'Hobro', null, null);
INSERT INTO `cities` VALUES ('195', 'Holbæk', null, null);
INSERT INTO `cities` VALUES ('196', 'Holeby', null, null);
INSERT INTO `cities` VALUES ('197', 'Holme-Olstrup', null, null);
INSERT INTO `cities` VALUES ('198', 'Holstebro', null, null);
INSERT INTO `cities` VALUES ('199', 'Holsted', null, null);
INSERT INTO `cities` VALUES ('200', 'Holte', null, null);
INSERT INTO `cities` VALUES ('201', 'Horbelev', null, null);
INSERT INTO `cities` VALUES ('202', 'Hornbæk', null, null);
INSERT INTO `cities` VALUES ('203', 'Hornslet', null, null);
INSERT INTO `cities` VALUES ('204', 'Hornsyld', null, null);
INSERT INTO `cities` VALUES ('205', 'Horsens', null, null);
INSERT INTO `cities` VALUES ('206', 'Horslunde', null, null);
INSERT INTO `cities` VALUES ('207', 'Hovborg', null, null);
INSERT INTO `cities` VALUES ('208', 'Hovedgård', null, null);
INSERT INTO `cities` VALUES ('209', 'Humble', null, null);
INSERT INTO `cities` VALUES ('210', 'Humlebæk', null, null);
INSERT INTO `cities` VALUES ('211', 'Hundested', null, null);
INSERT INTO `cities` VALUES ('212', 'Hundslund', null, null);
INSERT INTO `cities` VALUES ('213', 'Hurup Thy', null, null);
INSERT INTO `cities` VALUES ('214', 'Hvalsø', null, null);
INSERT INTO `cities` VALUES ('215', 'Hvide Sande', null, null);
INSERT INTO `cities` VALUES ('216', 'Hvidovre', null, null);
INSERT INTO `cities` VALUES ('217', 'Højbjerg', null, null);
INSERT INTO `cities` VALUES ('218', 'Højby', null, null);
INSERT INTO `cities` VALUES ('219', 'Højer', null, null);
INSERT INTO `cities` VALUES ('220', 'Højslev', null, null);
INSERT INTO `cities` VALUES ('221', 'Høng', null, null);
INSERT INTO `cities` VALUES ('222', 'Hørning', null, null);
INSERT INTO `cities` VALUES ('223', 'Hørsholm', null, null);
INSERT INTO `cities` VALUES ('224', 'Hørve', null, null);
INSERT INTO `cities` VALUES ('225', 'Haarby', null, null);
INSERT INTO `cities` VALUES ('226', 'Hårlev', null, null);
INSERT INTO `cities` VALUES ('227', 'Idestrup', null, null);
INSERT INTO `cities` VALUES ('228', 'Ikast', null, null);
INSERT INTO `cities` VALUES ('229', 'Ishøj', null, null);
INSERT INTO `cities` VALUES ('230', 'Janderup', null, null);
INSERT INTO `cities` VALUES ('231', 'Jelling', null, null);
INSERT INTO `cities` VALUES ('232', 'Jerslev', null, null);
INSERT INTO `cities` VALUES ('233', 'Jerslev', null, null);
INSERT INTO `cities` VALUES ('234', 'Jerup', null, null);
INSERT INTO `cities` VALUES ('235', 'Jordrup', null, null);
INSERT INTO `cities` VALUES ('236', 'Juelsminde', null, null);
INSERT INTO `cities` VALUES ('237', 'Jyderup', null, null);
INSERT INTO `cities` VALUES ('238', 'Jyllinge', null, null);
INSERT INTO `cities` VALUES ('239', 'Jystrup', null, null);
INSERT INTO `cities` VALUES ('240', 'Jægerspris', null, null);
INSERT INTO `cities` VALUES ('241', 'Kalundborg', null, null);
INSERT INTO `cities` VALUES ('242', 'Kalvehave', null, null);
INSERT INTO `cities` VALUES ('243', 'Karby', null, null);
INSERT INTO `cities` VALUES ('244', 'Karise', null, null);
INSERT INTO `cities` VALUES ('245', 'Karlslunde', null, null);
INSERT INTO `cities` VALUES ('246', 'Karrebæksminde', null, null);
INSERT INTO `cities` VALUES ('247', 'Karup', null, null);
INSERT INTO `cities` VALUES ('248', 'Kastrup', null, null);
INSERT INTO `cities` VALUES ('249', 'Kerteminde', null, null);
INSERT INTO `cities` VALUES ('250', 'Kettinge', null, null);
INSERT INTO `cities` VALUES ('251', 'Kibæk', null, null);
INSERT INTO `cities` VALUES ('252', 'Kirke Eskilstrup', null, null);
INSERT INTO `cities` VALUES ('253', 'Kirke Hyllinge', null, null);
INSERT INTO `cities` VALUES ('254', 'Kirke Såby', null, null);
INSERT INTO `cities` VALUES ('255', 'Kjellerup', null, null);
INSERT INTO `cities` VALUES ('256', 'Klampenborg', null, null);
INSERT INTO `cities` VALUES ('257', 'Klarup', null, null);
INSERT INTO `cities` VALUES ('258', 'Klemensker', null, null);
INSERT INTO `cities` VALUES ('259', 'Klippinge', null, null);
INSERT INTO `cities` VALUES ('260', 'Klovborg', null, null);
INSERT INTO `cities` VALUES ('261', 'Knebel', null, null);
INSERT INTO `cities` VALUES ('262', 'Kokkedal', null, null);
INSERT INTO `cities` VALUES ('263', 'Kolding', null, null);
INSERT INTO `cities` VALUES ('264', 'Kolind', null, null);
INSERT INTO `cities` VALUES ('265', 'Kongens Lyngby', null, null);
INSERT INTO `cities` VALUES ('266', 'Kongerslev', null, null);
INSERT INTO `cities` VALUES ('267', 'Korsør', null, null);
INSERT INTO `cities` VALUES ('268', 'Kruså', null, null);
INSERT INTO `cities` VALUES ('269', 'Kvistgård', null, null);
INSERT INTO `cities` VALUES ('270', 'Kværndrup', null, null);
INSERT INTO `cities` VALUES ('271', 'København', null, null);
INSERT INTO `cities` VALUES ('272', 'Køge', null, null);
INSERT INTO `cities` VALUES ('273', 'Langebæk', null, null);
INSERT INTO `cities` VALUES ('274', 'Langeskov', null, null);
INSERT INTO `cities` VALUES ('275', 'Langå', null, null);
INSERT INTO `cities` VALUES ('276', 'Lejre', null, null);
INSERT INTO `cities` VALUES ('277', 'Lem', null, null);
INSERT INTO `cities` VALUES ('278', 'Lemming', null, null);
INSERT INTO `cities` VALUES ('279', 'Lemvig', null, null);
INSERT INTO `cities` VALUES ('280', 'Lille Skensved', null, null);
INSERT INTO `cities` VALUES ('281', 'Lintrup', null, null);
INSERT INTO `cities` VALUES ('282', 'Liseleje', null, null);
INSERT INTO `cities` VALUES ('283', 'Lundby', null, null);
INSERT INTO `cities` VALUES ('284', 'Lunderskov', null, null);
INSERT INTO `cities` VALUES ('285', 'Lynge', null, null);
INSERT INTO `cities` VALUES ('286', 'Lystrup', null, null);
INSERT INTO `cities` VALUES ('287', 'Læsø', null, null);
INSERT INTO `cities` VALUES ('288', 'Løgstrup', null, null);
INSERT INTO `cities` VALUES ('289', 'Løgstør', null, null);
INSERT INTO `cities` VALUES ('290', 'Løgumkloster', null, null);
INSERT INTO `cities` VALUES ('291', 'Løkken', null, null);
INSERT INTO `cities` VALUES ('292', 'Løsning', null, null);
INSERT INTO `cities` VALUES ('293', 'Låsby', null, null);
INSERT INTO `cities` VALUES ('294', 'Malling', null, null);
INSERT INTO `cities` VALUES ('295', 'Mariager', null, null);
INSERT INTO `cities` VALUES ('296', 'Maribo', null, null);
INSERT INTO `cities` VALUES ('297', 'Marslev', null, null);
INSERT INTO `cities` VALUES ('298', 'Marstal', null, null);
INSERT INTO `cities` VALUES ('299', 'Martofte', null, null);
INSERT INTO `cities` VALUES ('300', 'Melby', null, null);
INSERT INTO `cities` VALUES ('301', 'Mern', null, null);
INSERT INTO `cities` VALUES ('302', 'Mesinge', null, null);
INSERT INTO `cities` VALUES ('303', 'Middelfart', null, null);
INSERT INTO `cities` VALUES ('304', 'Millinge', null, null);
INSERT INTO `cities` VALUES ('305', 'Morud', null, null);
INSERT INTO `cities` VALUES ('306', 'Munke Bjergby', null, null);
INSERT INTO `cities` VALUES ('307', 'Munkebo', null, null);
INSERT INTO `cities` VALUES ('308', 'Møldrup', null, null);
INSERT INTO `cities` VALUES ('309', 'Mørke', null, null);
INSERT INTO `cities` VALUES ('310', 'Mørkøv', null, null);
INSERT INTO `cities` VALUES ('311', 'Måløv', null, null);
INSERT INTO `cities` VALUES ('312', 'Mårslet', null, null);
INSERT INTO `cities` VALUES ('313', 'Nakskov', null, null);
INSERT INTO `cities` VALUES ('314', 'Nexø', null, null);
INSERT INTO `cities` VALUES ('315', 'Nibe', null, null);
INSERT INTO `cities` VALUES ('316', 'Nimtofte', null, null);
INSERT INTO `cities` VALUES ('317', 'Nivå', null, null);
INSERT INTO `cities` VALUES ('318', 'Nordborg', null, null);
INSERT INTO `cities` VALUES ('319', 'Nyborg', null, null);
INSERT INTO `cities` VALUES ('320', 'Nykøbing F', null, null);
INSERT INTO `cities` VALUES ('321', 'Nykøbing M', null, null);
INSERT INTO `cities` VALUES ('322', 'Nykøbing Sj', null, null);
INSERT INTO `cities` VALUES ('323', 'Nyrup', null, null);
INSERT INTO `cities` VALUES ('324', 'Nysted', null, null);
INSERT INTO `cities` VALUES ('325', 'Nærum', null, null);
INSERT INTO `cities` VALUES ('326', 'Næstved', null, null);
INSERT INTO `cities` VALUES ('327', 'Nørager', null, null);
INSERT INTO `cities` VALUES ('328', 'Nørre Alslev', null, null);
INSERT INTO `cities` VALUES ('329', 'Nørre Asmindrup', null, null);
INSERT INTO `cities` VALUES ('330', 'Nørre Nebel', null, null);
INSERT INTO `cities` VALUES ('331', 'Nørre Snede', null, null);
INSERT INTO `cities` VALUES ('332', 'Nørre Aaby', null, null);
INSERT INTO `cities` VALUES ('333', 'Nørreballe', null, null);
INSERT INTO `cities` VALUES ('334', 'Nørresundby', null, null);
INSERT INTO `cities` VALUES ('335', 'Odder', null, null);
INSERT INTO `cities` VALUES ('336', 'Odense', null, null);
INSERT INTO `cities` VALUES ('337', 'Oksbøl', null, null);
INSERT INTO `cities` VALUES ('338', 'Otterup', null, null);
INSERT INTO `cities` VALUES ('339', 'Oure', null, null);
INSERT INTO `cities` VALUES ('340', 'Outrup', null, null);
INSERT INTO `cities` VALUES ('341', 'Padborg', null, null);
INSERT INTO `cities` VALUES ('342', 'Pandrup', null, null);
INSERT INTO `cities` VALUES ('343', 'Præstø', null, null);
INSERT INTO `cities` VALUES ('344', 'Randbøl', null, null);
INSERT INTO `cities` VALUES ('345', 'Randers', null, null);
INSERT INTO `cities` VALUES ('346', 'Ranum', null, null);
INSERT INTO `cities` VALUES ('347', 'Rask Mølle', null, null);
INSERT INTO `cities` VALUES ('348', 'Redsted', null, null);
INSERT INTO `cities` VALUES ('349', 'Regstrup', null, null);
INSERT INTO `cities` VALUES ('350', 'Ribe', null, null);
INSERT INTO `cities` VALUES ('351', 'Ringe', null, null);
INSERT INTO `cities` VALUES ('352', 'Ringkøbing', null, null);
INSERT INTO `cities` VALUES ('353', 'Ringsted', null, null);
INSERT INTO `cities` VALUES ('354', 'Risskov', null, null);
INSERT INTO `cities` VALUES ('355', 'Roskilde', null, null);
INSERT INTO `cities` VALUES ('356', 'Roslev', null, null);
INSERT INTO `cities` VALUES ('357', 'Rude', null, null);
INSERT INTO `cities` VALUES ('358', 'Rudkøbing', null, null);
INSERT INTO `cities` VALUES ('359', 'Ruds Vedby', null, null);
INSERT INTO `cities` VALUES ('360', 'Rungsted Kyst', null, null);
INSERT INTO `cities` VALUES ('361', 'Ry', null, null);
INSERT INTO `cities` VALUES ('362', 'Rynkeby', null, null);
INSERT INTO `cities` VALUES ('363', 'Ryomgård', null, null);
INSERT INTO `cities` VALUES ('364', 'Ryslinge', null, null);
INSERT INTO `cities` VALUES ('365', 'Rødby', null, null);
INSERT INTO `cities` VALUES ('366', 'Rødding', null, null);
INSERT INTO `cities` VALUES ('367', 'Rødekro', null, null);
INSERT INTO `cities` VALUES ('368', 'Rødkærsbro', null, null);
INSERT INTO `cities` VALUES ('369', 'Rødovre', null, null);
INSERT INTO `cities` VALUES ('370', 'Rødvig Stevns', null, null);
INSERT INTO `cities` VALUES ('371', 'Rømø', null, null);
INSERT INTO `cities` VALUES ('372', 'Rønde', null, null);
INSERT INTO `cities` VALUES ('373', 'Rønne', null, null);
INSERT INTO `cities` VALUES ('374', 'Rønnede', null, null);
INSERT INTO `cities` VALUES ('375', 'Rørvig', null, null);
INSERT INTO `cities` VALUES ('376', 'Sabro', null, null);
INSERT INTO `cities` VALUES ('377', 'Sakskøbing', null, null);
INSERT INTO `cities` VALUES ('378', 'Saltum', null, null);
INSERT INTO `cities` VALUES ('379', 'Samsø', null, null);
INSERT INTO `cities` VALUES ('380', 'Sandved', null, null);
INSERT INTO `cities` VALUES ('381', 'Sejerø', null, null);
INSERT INTO `cities` VALUES ('382', 'Silkeborg', null, null);
INSERT INTO `cities` VALUES ('383', 'Sindal', null, null);
INSERT INTO `cities` VALUES ('384', 'Sjællands Odde', null, null);
INSERT INTO `cities` VALUES ('385', 'Sjølund', null, null);
INSERT INTO `cities` VALUES ('386', 'Skagen', null, null);
INSERT INTO `cities` VALUES ('387', 'Skals', null, null);
INSERT INTO `cities` VALUES ('388', 'Skamby', null, null);
INSERT INTO `cities` VALUES ('389', 'Skanderborg', null, null);
INSERT INTO `cities` VALUES ('390', 'Skibby', null, null);
INSERT INTO `cities` VALUES ('391', 'Skive', null, null);
INSERT INTO `cities` VALUES ('392', 'Skjern', null, null);
INSERT INTO `cities` VALUES ('393', 'Skodsborg', null, null);
INSERT INTO `cities` VALUES ('394', 'Skovlunde', null, null);
INSERT INTO `cities` VALUES ('395', 'Skælskør', null, null);
INSERT INTO `cities` VALUES ('396', 'Skærbæk', null, null);
INSERT INTO `cities` VALUES ('397', 'Skævinge', null, null);
INSERT INTO `cities` VALUES ('398', 'Skødstrup', null, null);
INSERT INTO `cities` VALUES ('399', 'Skørping', null, null);
INSERT INTO `cities` VALUES ('400', 'Skårup', null, null);
INSERT INTO `cities` VALUES ('401', 'Slagelse', null, null);
INSERT INTO `cities` VALUES ('402', 'Slangerup', null, null);
INSERT INTO `cities` VALUES ('403', 'Smørum', null, null);
INSERT INTO `cities` VALUES ('404', 'Snedsted', null, null);
INSERT INTO `cities` VALUES ('405', 'Snekkersten', null, null);
INSERT INTO `cities` VALUES ('406', 'Snertinge', null, null);
INSERT INTO `cities` VALUES ('407', 'Solbjerg', null, null);
INSERT INTO `cities` VALUES ('408', 'Solrød Strand', null, null);
INSERT INTO `cities` VALUES ('409', 'Sommersted', null, null);
INSERT INTO `cities` VALUES ('410', 'Sorring', null, null);
INSERT INTO `cities` VALUES ('411', 'Sorø', null, null);
INSERT INTO `cities` VALUES ('412', 'Spenstrup', null, null);
INSERT INTO `cities` VALUES ('413', 'Spjald', null, null);
INSERT INTO `cities` VALUES ('414', 'Sporup', null, null);
INSERT INTO `cities` VALUES ('415', 'Spøttrup', null, null);
INSERT INTO `cities` VALUES ('416', 'Stakroge', null, null);
INSERT INTO `cities` VALUES ('417', 'Stege', null, null);
INSERT INTO `cities` VALUES ('418', 'Stenderup', null, null);
INSERT INTO `cities` VALUES ('419', 'Stenlille', null, null);
INSERT INTO `cities` VALUES ('420', 'Stenløse', null, null);
INSERT INTO `cities` VALUES ('421', 'Stenstrup', null, null);
INSERT INTO `cities` VALUES ('422', 'Stensved', null, null);
INSERT INTO `cities` VALUES ('423', 'Stoholm', null, null);
INSERT INTO `cities` VALUES ('424', 'Stokkemarke', null, null);
INSERT INTO `cities` VALUES ('425', 'Store Fuglede', null, null);
INSERT INTO `cities` VALUES ('426', 'Store Heddinge', null, null);
INSERT INTO `cities` VALUES ('427', 'Store Merløse', null, null);
INSERT INTO `cities` VALUES ('428', 'Storvorde', null, null);
INSERT INTO `cities` VALUES ('429', 'Stouby', null, null);
INSERT INTO `cities` VALUES ('430', 'Strandby', null, null);
INSERT INTO `cities` VALUES ('431', 'Struer', null, null);
INSERT INTO `cities` VALUES ('432', 'Strøby', null, null);
INSERT INTO `cities` VALUES ('433', 'Stubbekøbing', null, null);
INSERT INTO `cities` VALUES ('434', 'Støvring', null, null);
INSERT INTO `cities` VALUES ('435', 'Suldrup', null, null);
INSERT INTO `cities` VALUES ('436', 'Sulsted', null, null);
INSERT INTO `cities` VALUES ('437', 'Sunds', null, null);
INSERT INTO `cities` VALUES ('438', 'Svaneke', null, null);
INSERT INTO `cities` VALUES ('439', 'Svebølle', null, null);
INSERT INTO `cities` VALUES ('440', 'Svendborg', null, null);
INSERT INTO `cities` VALUES ('441', 'Svenstrup', null, null);
INSERT INTO `cities` VALUES ('442', 'Svinninge', null, null);
INSERT INTO `cities` VALUES ('443', 'Sydals', null, null);
INSERT INTO `cities` VALUES ('444', 'Sæby', null, null);
INSERT INTO `cities` VALUES ('445', 'Søborg', null, null);
INSERT INTO `cities` VALUES ('446', 'Søby Ærø', null, null);
INSERT INTO `cities` VALUES ('447', 'Søllested', null, null);
INSERT INTO `cities` VALUES ('448', 'Sønder Felding', null, null);
INSERT INTO `cities` VALUES ('449', 'Sønder Omme', null, null);
INSERT INTO `cities` VALUES ('450', 'Sønder Stenderup', null, null);
INSERT INTO `cities` VALUES ('451', 'Sønderborg', null, null);
INSERT INTO `cities` VALUES ('452', 'Søndersø', null, null);
INSERT INTO `cities` VALUES ('453', 'Sørvad', null, null);
INSERT INTO `cities` VALUES ('454', 'Tappernøje', null, null);
INSERT INTO `cities` VALUES ('455', 'Tarm', null, null);
INSERT INTO `cities` VALUES ('456', 'Terndrup', null, null);
INSERT INTO `cities` VALUES ('457', 'Them', null, null);
INSERT INTO `cities` VALUES ('458', 'Thisted', null, null);
INSERT INTO `cities` VALUES ('459', 'Thorsø', null, null);
INSERT INTO `cities` VALUES ('460', 'Thyborøn', null, null);
INSERT INTO `cities` VALUES ('461', 'Thyholm', null, null);
INSERT INTO `cities` VALUES ('462', 'Tikøb', null, null);
INSERT INTO `cities` VALUES ('463', 'Tilst', null, null);
INSERT INTO `cities` VALUES ('464', 'Tim', null, null);
INSERT INTO `cities` VALUES ('465', 'Tinglev', null, null);
INSERT INTO `cities` VALUES ('466', 'Tistrup', null, null);
INSERT INTO `cities` VALUES ('467', 'Tisvildeleje', null, null);
INSERT INTO `cities` VALUES ('468', 'Tjele', null, null);
INSERT INTO `cities` VALUES ('469', 'Tjæreborg', null, null);
INSERT INTO `cities` VALUES ('470', 'Toftlund', null, null);
INSERT INTO `cities` VALUES ('471', 'Tommerup', null, null);
INSERT INTO `cities` VALUES ('472', 'Toreby', null, null);
INSERT INTO `cities` VALUES ('473', 'Torrig', null, null);
INSERT INTO `cities` VALUES ('474', 'Tranbjerg J', null, null);
INSERT INTO `cities` VALUES ('475', 'Tranekær', null, null);
INSERT INTO `cities` VALUES ('476', 'Trige', null, null);
INSERT INTO `cities` VALUES ('477', 'Trustrup', null, null);
INSERT INTO `cities` VALUES ('478', 'Tureby', null, null);
INSERT INTO `cities` VALUES ('479', 'Tylstrup', null, null);
INSERT INTO `cities` VALUES ('480', 'Tølløse', null, null);
INSERT INTO `cities` VALUES ('481', 'Tønder', null, null);
INSERT INTO `cities` VALUES ('482', 'Tørring', null, null);
INSERT INTO `cities` VALUES ('483', 'Tårs', null, null);
INSERT INTO `cities` VALUES ('484', 'Taastrup', null, null);
INSERT INTO `cities` VALUES ('485', 'Ugerløse', null, null);
INSERT INTO `cities` VALUES ('486', 'Uldum', null, null);
INSERT INTO `cities` VALUES ('487', 'Ulfborg', null, null);
INSERT INTO `cities` VALUES ('488', 'Ullerslev', null, null);
INSERT INTO `cities` VALUES ('489', 'Ulstrup', null, null);
INSERT INTO `cities` VALUES ('490', 'Vadum', null, null);
INSERT INTO `cities` VALUES ('491', 'Valby', null, null);
INSERT INTO `cities` VALUES ('492', 'Vallensbæk', null, null);
INSERT INTO `cities` VALUES ('493', 'Vallensbæk Strand', null, null);
INSERT INTO `cities` VALUES ('494', 'Vamdrup', null, null);
INSERT INTO `cities` VALUES ('495', 'Vandel', null, null);
INSERT INTO `cities` VALUES ('496', 'Vanløse', null, null);
INSERT INTO `cities` VALUES ('497', 'Varde', null, null);
INSERT INTO `cities` VALUES ('498', 'Vedbæk', null, null);
INSERT INTO `cities` VALUES ('499', 'Veflinge', null, null);
INSERT INTO `cities` VALUES ('500', 'Vejby', null, null);
INSERT INTO `cities` VALUES ('501', 'Vejen', null, null);
INSERT INTO `cities` VALUES ('502', 'Vejers Strand', null, null);
INSERT INTO `cities` VALUES ('503', 'Vejle', null, null);
INSERT INTO `cities` VALUES ('504', 'Vejle Øst', null, null);
INSERT INTO `cities` VALUES ('505', 'Vejstrup', null, null);
INSERT INTO `cities` VALUES ('506', 'Veksø Sjælland', null, null);
INSERT INTO `cities` VALUES ('507', 'Vemb', null, null);
INSERT INTO `cities` VALUES ('508', 'Vemmelev', null, null);
INSERT INTO `cities` VALUES ('509', 'Vesløs', null, null);
INSERT INTO `cities` VALUES ('510', 'Vestbjerg', null, null);
INSERT INTO `cities` VALUES ('511', 'Vester Skerninge', null, null);
INSERT INTO `cities` VALUES ('512', 'Vesterborg', null, null);
INSERT INTO `cities` VALUES ('513', 'Vestervig', null, null);
INSERT INTO `cities` VALUES ('514', 'Viborg', null, null);
INSERT INTO `cities` VALUES ('515', 'Viby J', null, null);
INSERT INTO `cities` VALUES ('516', 'Viby Sjælland', null, null);
INSERT INTO `cities` VALUES ('517', 'Videbæk', null, null);
INSERT INTO `cities` VALUES ('518', 'Vig', null, null);
INSERT INTO `cities` VALUES ('519', 'Vildbjerg', null, null);
INSERT INTO `cities` VALUES ('520', 'Vils', null, null);
INSERT INTO `cities` VALUES ('521', 'Vinderup', null, null);
INSERT INTO `cities` VALUES ('522', 'Vipperød', null, null);
INSERT INTO `cities` VALUES ('523', 'Virum', null, null);
INSERT INTO `cities` VALUES ('524', 'Vissenbjerg', null, null);
INSERT INTO `cities` VALUES ('525', 'Viuf', null, null);
INSERT INTO `cities` VALUES ('526', 'Vodskov', null, null);
INSERT INTO `cities` VALUES ('527', 'Vojens', null, null);
INSERT INTO `cities` VALUES ('528', 'Vonge', null, null);
INSERT INTO `cities` VALUES ('529', 'Vorbasse', null, null);
INSERT INTO `cities` VALUES ('530', 'Vordingborg', null, null);
INSERT INTO `cities` VALUES ('531', 'Vrå', null, null);
INSERT INTO `cities` VALUES ('532', 'Væggerløse', null, null);
INSERT INTO `cities` VALUES ('533', 'Værløse', null, null);
INSERT INTO `cities` VALUES ('534', 'Ærøskøbing', null, null);
INSERT INTO `cities` VALUES ('535', 'Ølgod', null, null);
INSERT INTO `cities` VALUES ('536', 'Ølsted', null, null);
INSERT INTO `cities` VALUES ('537', 'Ølstykke', null, null);
INSERT INTO `cities` VALUES ('538', 'Ørbæk', null, null);
INSERT INTO `cities` VALUES ('539', 'Ørnhøj', null, null);
INSERT INTO `cities` VALUES ('540', 'Ørsted', null, null);
INSERT INTO `cities` VALUES ('541', 'Ørum Djurs', null, null);
INSERT INTO `cities` VALUES ('542', 'Østbirk', null, null);
INSERT INTO `cities` VALUES ('543', 'Øster Assels', null, null);
INSERT INTO `cities` VALUES ('544', 'Øster Ulslev', null, null);
INSERT INTO `cities` VALUES ('545', 'Øster Vrå', null, null);
INSERT INTO `cities` VALUES ('546', 'Østermarie', null, null);
INSERT INTO `cities` VALUES ('547', 'Aabenraa', null, null);
INSERT INTO `cities` VALUES ('548', 'Aabybro', null, null);
INSERT INTO `cities` VALUES ('549', 'Åbyhøj', null, null);
INSERT INTO `cities` VALUES ('550', 'Aakirkeby', null, null);
INSERT INTO `cities` VALUES ('551', 'Aalborg', null, null);
INSERT INTO `cities` VALUES ('552', 'Ålbæk', null, null);
INSERT INTO `cities` VALUES ('553', 'Aalestrup', null, null);
INSERT INTO `cities` VALUES ('554', 'Ålsgårde', null, null);
INSERT INTO `cities` VALUES ('555', 'Århus', null, null);
INSERT INTO `cities` VALUES ('556', 'Årre', null, null);
INSERT INTO `cities` VALUES ('557', 'Aars', null, null);
INSERT INTO `cities` VALUES ('558', 'Årslev', null, null);
INSERT INTO `cities` VALUES ('559', 'Aarup', null, null);

-- ----------------------------
-- Table structure for `failed_jobs`
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for `invoices`
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `handle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_ex_vat` int(11) NOT NULL,
  `amount_vat` int(11) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `settled` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_user_id_foreign` (`user_id`),
  KEY `invoices_subscription_id_foreign` (`subscription_id`),
  KEY `invoices_status_id_foreign` (`status_id`),
  CONSTRAINT `invoices_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `invoice_statuses` (`id`),
  CONSTRAINT `invoices_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoices
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice_items`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint(20) unsigned NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_ex_vat` int(11) NOT NULL,
  `amount_vat` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoice_items
-- ----------------------------

-- ----------------------------
-- Table structure for `invoice_statuses`
-- ----------------------------
DROP TABLE IF EXISTS `invoice_statuses`;
CREATE TABLE `invoice_statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoice_statuses
-- ----------------------------

-- ----------------------------
-- Table structure for `media`
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of media
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2013_11_20_110939_create_cities_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('3', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('4', '2017_05_28_115649_create_gates_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_01_01_000000_create_action_events_table', '1');
INSERT INTO `migrations` VALUES ('6', '2019_05_10_000000_add_fields_to_action_events_table', '1');
INSERT INTO `migrations` VALUES ('7', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('8', '2019_10_09_143453_create_accesses_table', '1');
INSERT INTO `migrations` VALUES ('9', '2019_11_20_164411_create_apartment_types_table', '1');
INSERT INTO `migrations` VALUES ('10', '2019_11_21_192914_create_apartments_table', '1');
INSERT INTO `migrations` VALUES ('11', '2019_11_27_173801_create_media_table', '1');
INSERT INTO `migrations` VALUES ('12', '2020_01_01_194912_create_social_facebook_accounts_table', '1');
INSERT INTO `migrations` VALUES ('13', '2020_01_04_200000_create_plans_table', '1');
INSERT INTO `migrations` VALUES ('14', '2020_01_25_191725_create_user_payments_table', '1');
INSERT INTO `migrations` VALUES ('15', '2020_01_31_202529_create_user_payment_methods_table', '1');
INSERT INTO `migrations` VALUES ('16', '2020_01_32_201806_create_subscriptions_table', '1');
INSERT INTO `migrations` VALUES ('17', '2020_03_05_180102_create_invoice_statuses_table', '1');
INSERT INTO `migrations` VALUES ('18', '2020_03_05_180103_create_invoices_table', '1');
INSERT INTO `migrations` VALUES ('19', '2020_03_05_180110_create_invoice_items_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `plans`
-- ----------------------------
DROP TABLE IF EXISTS `plans`;
CREATE TABLE `plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of plans
-- ----------------------------
INSERT INTO `plans` VALUES ('1', 'plan-db6d9', '1', '2020-06-18 05:41:40', '2020-06-18 05:41:43');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for `role_permission`
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`,`permission_slug`),
  CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_permission
-- ----------------------------

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------

-- ----------------------------
-- Table structure for `social_facebook_accounts`
-- ----------------------------
DROP TABLE IF EXISTS `social_facebook_accounts`;
CREATE TABLE `social_facebook_accounts` (
  `user_id` bigint(20) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of social_facebook_accounts
-- ----------------------------

-- ----------------------------
-- Table structure for `subscriptions`
-- ----------------------------
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `card_id` bigint(20) unsigned NOT NULL,
  `status` int(11) NOT NULL,
  `subscription_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_create` timestamp NULL DEFAULT NULL,
  `trial_end` timestamp NULL DEFAULT NULL,
  `next_invoice` timestamp NULL DEFAULT NULL,
  `change_card_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_foreign` (`user_id`),
  KEY `subscriptions_plan_id_foreign` (`plan_id`),
  KEY `subscriptions_card_id_foreign` (`card_id`),
  CONSTRAINT `subscriptions_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `user_payment_methods` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------
INSERT INTO `subscriptions` VALUES ('1', '1', '1', '1', '1', 'sub-0050', '2020-06-17 21:59:41', '2020-07-01 21:59:41', '2020-07-01 21:59:41', 'https://checkout.reepay.com/#/subscription/pay/da_DK/6317fef916620e26f51497c84715e437/sub-0050', '2020-06-17 22:00:06', '2020-06-17 22:00:06');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` bigint(20) unsigned DEFAULT NULL,
  `postal_code` bigint(20) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_autogenerated` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_city_foreign` (`city`),
  CONSTRAINT `users_city_foreign` FOREIGN KEY (`city`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Aleksandar', 'Gordic', 'lifeisyoureality@gmail.com', '+381600999999', 'Kraljevica Marka bb 31230 Arilje', '559', '1234', null, null, '$2y$10$pI1XXflHinBr8PZw4.8PEOHoRHUBj4s/U1i/v6U/6zkjuLw4s1jei', '0', null, '2020-06-15 10:29:32', '2020-06-15 10:33:41');

-- ----------------------------
-- Table structure for `user_payments`
-- ----------------------------
DROP TABLE IF EXISTS `user_payments`;
CREATE TABLE `user_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `handler` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_handler` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_payments_user_id_foreign` (`user_id`),
  CONSTRAINT `user_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_payments
-- ----------------------------
INSERT INTO `user_payments` VALUES ('1', '1', 'cs_4bb590e490faf4cc9e84dff53a27fcbb', 'cust-0034', '2020-06-15 10:34:12', '2020-06-17 21:05:37');

-- ----------------------------
-- Table structure for `user_payment_methods`
-- ----------------------------
DROP TABLE IF EXISTS `user_payment_methods`;
CREATE TABLE `user_payment_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `handler` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masked_card` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_payment_methods_user_id_foreign` (`user_id`),
  CONSTRAINT `user_payment_methods_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_payment_methods
-- ----------------------------
INSERT INTO `user_payment_methods` VALUES ('1', '1', 'ca_208968d7ecae67b64b969b14717b7657', '411111XXXXXX1111', 'visa', '05-23', '2020-06-15 23:54:16', '2020-06-15 23:54:16');
INSERT INTO `user_payment_methods` VALUES ('2', '1', 'ca_c1da81beea884d7cf3485122396fa1a9', '411111XXXXXX1111', 'visa', '06-22', '2020-06-15 23:55:27', '2020-06-15 23:55:27');
INSERT INTO `user_payment_methods` VALUES ('3', '1', 'ca_6865260a43a7961fefd07d65cd6407e6', '411111XXXXXX1111', 'visa', '02-25', '2020-06-17 21:06:31', '2020-06-17 21:06:31');
INSERT INTO `user_payment_methods` VALUES ('4', '1', 'ca_72fd85a4454e300dd2137cff118435d0', '411111XXXXXX1111', 'visa', '05-22', '2020-06-17 21:08:55', '2020-06-17 21:08:55');
INSERT INTO `user_payment_methods` VALUES ('5', '1', 'ca_c474fc0d434ca4545258c9e909bf1dd5', '411111XXXXXX1111', 'visa', '11-21', '2020-06-17 21:10:47', '2020-06-17 21:10:47');
INSERT INTO `user_payment_methods` VALUES ('6', '1', 'ca_b9414fd11682597e80e902e01990b898', '411111XXXXXX1111', 'visa', '02-22', '2020-06-17 21:47:51', '2020-06-17 21:47:51');
INSERT INTO `user_payment_methods` VALUES ('7', '1', 'ca_cfd8c83db7961cfc9006398b93ddb6cb', '411111XXXXXX1111', 'visa', '11-22', '2020-06-17 21:59:25', '2020-06-17 21:59:25');
