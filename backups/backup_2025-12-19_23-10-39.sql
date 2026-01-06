-- TABLE: attempt_answers
CREATE TABLE `attempt_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `attempt_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `answer_text` text,
  `selected_option_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_correct` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aa_attempt` (`attempt_id`),
  KEY `fk_aa_question` (`question_id`),
  CONSTRAINT `fk_aa_attempt` FOREIGN KEY (`attempt_id`) REFERENCES `attempts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_aa_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `attempt_answers` VALUES ('1','1','25',NULL,'[\"97\"]','1');
INSERT INTO `attempt_answers` VALUES ('2','1','17',NULL,'[\"65\"]','0');
INSERT INTO `attempt_answers` VALUES ('3','1','27',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('4','1','19',NULL,'[\"74\"]','1');
INSERT INTO `attempt_answers` VALUES ('5','1','5',NULL,'[\"17\"]','0');
INSERT INTO `attempt_answers` VALUES ('6','1','12',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('7','1','4',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('8','1','20',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('9','1','1',NULL,'[\"1\"]','1');
INSERT INTO `attempt_answers` VALUES ('10','1','26',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('11','1','23',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('12','1','6',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('13','1','22',NULL,'[\"85\"]','0');
INSERT INTO `attempt_answers` VALUES ('14','1','29',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('15','1','18',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('16','1','10',NULL,'[\"39\"]','0');
INSERT INTO `attempt_answers` VALUES ('17','1','9',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('18','1','15',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('19','1','14',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('20','1','3',NULL,'[\"10\"]','1');
INSERT INTO `attempt_answers` VALUES ('21','2','15',NULL,'[\"57\"]','1');
INSERT INTO `attempt_answers` VALUES ('22','2','16',NULL,'[\"61\"]','0');
INSERT INTO `attempt_answers` VALUES ('23','2','20',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('24','2','19',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('25','2','10',NULL,'[\"40\"]','0');
INSERT INTO `attempt_answers` VALUES ('26','2','18',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('27','2','30',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('28','2','21',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('29','2','25',NULL,'[\"97\"]','1');
INSERT INTO `attempt_answers` VALUES ('30','2','17',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('31','2','28',NULL,'[\"112\"]','0');
INSERT INTO `attempt_answers` VALUES ('32','2','13',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('33','2','11',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('34','2','8',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('35','2','5',NULL,'[\"18\"]','1');
INSERT INTO `attempt_answers` VALUES ('36','2','14',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('37','2','29',NULL,'[\"116\"]','0');
INSERT INTO `attempt_answers` VALUES ('38','2','4',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('39','2','9',NULL,'[\"33\"]','1');
INSERT INTO `attempt_answers` VALUES ('40','2','23',NULL,'[\"89\"]','1');
INSERT INTO `attempt_answers` VALUES ('41','3','68',NULL,'[\"269\"]','0');
INSERT INTO `attempt_answers` VALUES ('42','3','82',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('43','3','83',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('44','3','90',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('45','3','89',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('46','3','63',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('47','3','61',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('48','3','87',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('49','3','71',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('50','3','84',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('51','3','80',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('52','3','81',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('53','3','74',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('54','3','88',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('55','3','70',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('56','3','86',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('57','3','67',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('58','3','66',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('59','3','79',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('60','3','72',NULL,'[\"285\"]','1');
INSERT INTO `attempt_answers` VALUES ('61','4','87',NULL,'[\"345\"]','0');
INSERT INTO `attempt_answers` VALUES ('62','4','79',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('63','4','64',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('64','4','76',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('65','4','73',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('66','4','86',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('67','4','78',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('68','4','72',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('69','4','62',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('70','4','68',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('71','4','65',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('72','4','67',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('73','4','75',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('74','4','80',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('75','4','74',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('76','4','83',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('77','4','69',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('78','4','63',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('79','4','89',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('80','4','81',NULL,'[\"321\"]','1');
INSERT INTO `attempt_answers` VALUES ('81','5','65',NULL,'[\"258\"]','1');
INSERT INTO `attempt_answers` VALUES ('82','5','70',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('83','5','74',NULL,'[\"293\"]','0');
INSERT INTO `attempt_answers` VALUES ('84','5','77',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('85','5','87',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('86','5','80',NULL,'[\"318\"]','1');
INSERT INTO `attempt_answers` VALUES ('87','5','89',NULL,'[\"353\"]','1');
INSERT INTO `attempt_answers` VALUES ('88','5','63',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('89','5','88',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('90','5','85',NULL,'[\"337\"]','1');
INSERT INTO `attempt_answers` VALUES ('91','5','68',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('92','5','78',NULL,'[\"312\"]','0');
INSERT INTO `attempt_answers` VALUES ('93','5','72',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('94','5','62',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('95','5','86',NULL,'[\"344\"]','0');
INSERT INTO `attempt_answers` VALUES ('96','5','83',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('97','5','67',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('98','5','81',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('99','5','79',NULL,'[\"315\"]','0');
INSERT INTO `attempt_answers` VALUES ('100','5','76',NULL,'[\"303\"]','0');
INSERT INTO `attempt_answers` VALUES ('101','7','103',NULL,'[\"409\"]','1');
INSERT INTO `attempt_answers` VALUES ('102','7','119',NULL,'[\"474\"]','0');
INSERT INTO `attempt_answers` VALUES ('103','7','117',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('104','7','101',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('105','7','96',NULL,'[\"382\"]','1');
INSERT INTO `attempt_answers` VALUES ('106','7','108',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('107','7','98',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('108','7','112',NULL,'[\"446\"]','1');
INSERT INTO `attempt_answers` VALUES ('109','7','116',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('110','7','99',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('111','7','93',NULL,'[\"372\"]','0');
INSERT INTO `attempt_answers` VALUES ('112','7','95',NULL,'[\"378\"]','1');
INSERT INTO `attempt_answers` VALUES ('113','7','105',NULL,'[null]','0');
INSERT INTO `attempt_answers` VALUES ('114','7','91',NULL,'[\"363\"]','0');
INSERT INTO `attempt_answers` VALUES ('115','7','118',NULL,'[\"469\"]','1');
INSERT INTO `attempt_answers` VALUES ('116','8','115',NULL,'[\"457\"]','1');
INSERT INTO `attempt_answers` VALUES ('117','8','112',NULL,'[\"447\"]','0');
INSERT INTO `attempt_answers` VALUES ('118','8','99',NULL,'[\"394\"]','0');
INSERT INTO `attempt_answers` VALUES ('119','8','120',NULL,'[\"479\"]','0');
INSERT INTO `attempt_answers` VALUES ('120','8','101',NULL,'[\"402\"]','0');
INSERT INTO `attempt_answers` VALUES ('121','8','92',NULL,'[\"366\"]','0');
INSERT INTO `attempt_answers` VALUES ('122','8','109',NULL,'[\"435\"]','0');
INSERT INTO `attempt_answers` VALUES ('123','8','98',NULL,'[\"391\"]','1');
INSERT INTO `attempt_answers` VALUES ('124','8','110',NULL,'[\"438\"]','1');
INSERT INTO `attempt_answers` VALUES ('125','8','97',NULL,'[\"386\"]','1');
INSERT INTO `attempt_answers` VALUES ('126','8','106',NULL,'[\"422\"]','1');
INSERT INTO `attempt_answers` VALUES ('127','8','93',NULL,'[\"370\"]','1');
INSERT INTO `attempt_answers` VALUES ('128','8','96',NULL,'[\"381\"]','0');
INSERT INTO `attempt_answers` VALUES ('129','8','117',NULL,'[\"465\"]','0');
INSERT INTO `attempt_answers` VALUES ('130','8','116',NULL,'[\"461\"]','1');


-- TABLE: attempts
CREATE TABLE `attempts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `started_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `finished_at` datetime DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL,
  `duration_seconds` int DEFAULT NULL,
  `question_order` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attempt_quiz` (`quiz_id`),
  KEY `user_id` (`user_id`,`quiz_id`),
  CONSTRAINT `fk_attempt_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_attempt_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `attempts` VALUES ('1','1','2','2025-12-12 23:39:46','2025-12-12 23:39:57','20.00','11','[25,17,27,19,5,12,4,20,1,26,23,6,22,29,18,10,9,15,14,3]');
INSERT INTO `attempts` VALUES ('2','1','2','2025-12-16 00:55:20','2025-12-16 00:55:45','25.00','25','[15,16,20,19,10,18,30,21,25,17,28,13,11,8,5,14,29,4,9,23]');
INSERT INTO `attempts` VALUES ('3','3','2','2025-12-16 13:02:06','2025-12-16 13:02:14','5.00','8','[68,82,83,90,89,63,61,87,71,84,80,81,74,88,70,86,67,66,79,72]');
INSERT INTO `attempts` VALUES ('4','3','5','2025-12-16 13:34:06','2025-12-16 13:34:15','5.00','9','[87,79,64,76,73,86,78,72,62,68,65,67,75,80,74,83,69,63,89,81]');
INSERT INTO `attempts` VALUES ('5','3','5','2025-12-17 00:52:26','2025-12-17 00:52:45','20.00','19','[65,70,74,77,87,80,89,63,88,85,68,78,72,62,86,83,67,81,79,76]');
INSERT INTO `attempts` VALUES ('6','3','5','2025-12-17 00:53:16',NULL,'0.00','0','[64,78,81,71,75,68,80,77,73,89,87,70,65,85,72,62,69,74,67,84]');
INSERT INTO `attempts` VALUES ('7','7','8','2025-12-19 14:26:44','2025-12-19 14:26:59','33.33','15','[103,119,117,101,96,108,98,112,116,99,93,95,105,91,118]');
INSERT INTO `attempts` VALUES ('8','7','8','2025-12-19 17:56:02','2025-12-19 17:56:45','46.67','43','[115,112,99,120,101,92,109,98,110,97,106,93,96,117,116]');
INSERT INTO `attempts` VALUES ('9','7','8','2025-12-19 17:57:22',NULL,'0.00','0','[109,117,107,98,103,104,92,120,116,108,100,105,113,115,106]');


-- TABLE: options
CREATE TABLE `options` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint unsigned NOT NULL,
  `body` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_opt_q` (`question_id`),
  CONSTRAINT `fk_opt_q` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=481 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `options` VALUES ('1','1','Styles','1');
INSERT INTO `options` VALUES ('2','1','Themes','0');
INSERT INTO `options` VALUES ('3','1','Templates','0');
INSERT INTO `options` VALUES ('4','1','Macros','0');
INSERT INTO `options` VALUES ('5','2','استفاده از Headingها','1');
INSERT INTO `options` VALUES ('6','2','ایجاد بوکمارک','0');
INSERT INTO `options` VALUES ('7','2','افزودن Hyperlink','0');
INSERT INTO `options` VALUES ('8','2','استفاده از Symbolها','0');
INSERT INTO `options` VALUES ('9','3','Line Spacing','0');
INSERT INTO `options` VALUES ('10','3','Paragraph Spacing','1');
INSERT INTO `options` VALUES ('11','3','Indentation','0');
INSERT INTO `options` VALUES ('12','3','Page Setup','0');
INSERT INTO `options` VALUES ('13','4','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('14','4','Insert &gt; Page Number','1');
INSERT INTO `options` VALUES ('15','4','Layout &gt; Margins','0');
INSERT INTO `options` VALUES ('16','4','View &gt; Header &amp; Footer','0');
INSERT INTO `options` VALUES ('17','5','Text Direction','0');
INSERT INTO `options` VALUES ('18','5','Columns','1');
INSERT INTO `options` VALUES ('19','5','Wrap Text','0');
INSERT INTO `options` VALUES ('20','5','Section Break','0');
INSERT INTO `options` VALUES ('21','6','Track Changes','0');
INSERT INTO `options` VALUES ('22','6','Restrict Editing','1');
INSERT INTO `options` VALUES ('23','6','Compare Documents','0');
INSERT INTO `options` VALUES ('24','6','Smart Lookup','0');
INSERT INTO `options` VALUES ('25','7','Grammar Checker','0');
INSERT INTO `options` VALUES ('26','7','Spelling Checker','1');
INSERT INTO `options` VALUES ('27','7','Word Count','0');
INSERT INTO `options` VALUES ('28','7','AutoCorrect Options','0');
INSERT INTO `options` VALUES ('29','8','Bullets','0');
INSERT INTO `options` VALUES ('30','8','Numbering','0');
INSERT INTO `options` VALUES ('31','8','Multilevel List','1');
INSERT INTO `options` VALUES ('32','8','Outline View','0');
INSERT INTO `options` VALUES ('33','9','Ctrl + H','1');
INSERT INTO `options` VALUES ('34','9','Ctrl + F','0');
INSERT INTO `options` VALUES ('35','9','Ctrl + G','0');
INSERT INTO `options` VALUES ('36','9','Ctrl + Shift + H','0');
INSERT INTO `options` VALUES ('37','10','Insert &gt; Text','0');
INSERT INTO `options` VALUES ('38','10','Home &gt; Font &gt; Change Case','1');
INSERT INTO `options` VALUES ('39','10','Layout &gt; Text Direction','0');
INSERT INTO `options` VALUES ('40','10','Review &gt; Language','0');
INSERT INTO `options` VALUES ('41','11','Paste Special','0');
INSERT INTO `options` VALUES ('42','11','AutoFormat','0');
INSERT INTO `options` VALUES ('43','11','Borders','1');
INSERT INTO `options` VALUES ('44','11','Ruler','0');
INSERT INTO `options` VALUES ('45','12','View &gt; Gridlines','1');
INSERT INTO `options` VALUES ('46','12','Insert &gt; Shapes','0');
INSERT INTO `options` VALUES ('47','12','Layout &gt; Align','0');
INSERT INTO `options` VALUES ('48','12','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('49','13','Text Wrapping','1');
INSERT INTO `options` VALUES ('50','13','Picture Style','0');
INSERT INTO `options` VALUES ('51','13','Crop Tool','0');
INSERT INTO `options` VALUES ('52','13','Screenshot','0');
INSERT INTO `options` VALUES ('53','14','Column Break','0');
INSERT INTO `options` VALUES ('54','14','Line Break','0');
INSERT INTO `options` VALUES ('55','14','Page Break','1');
INSERT INTO `options` VALUES ('56','14','Text Wrapping Break','0');
INSERT INTO `options` VALUES ('57','15','Word Count','1');
INSERT INTO `options` VALUES ('58','15','Reviewing Pane','0');
INSERT INTO `options` VALUES ('59','15','Read Mode','0');
INSERT INTO `options` VALUES ('60','15','Track Changes','0');
INSERT INTO `options` VALUES ('61','16','Split Cells','0');
INSERT INTO `options` VALUES ('62','16','Merge Cells','1');
INSERT INTO `options` VALUES ('63','16','AutoFit','0');
INSERT INTO `options` VALUES ('64','16','Distribute Rows','0');
INSERT INTO `options` VALUES ('65','17','Insert &gt; Note','0');
INSERT INTO `options` VALUES ('66','17','View &gt; Comments','0');
INSERT INTO `options` VALUES ('67','17','Review &gt; New Comment','1');
INSERT INTO `options` VALUES ('68','17','Home &gt; Comment','0');
INSERT INTO `options` VALUES ('69','18','Page Setup','0');
INSERT INTO `options` VALUES ('70','18','Section Breaks','1');
INSERT INTO `options` VALUES ('71','18','Layout Themes','0');
INSERT INTO `options` VALUES ('72','18','Ruler Sections','0');
INSERT INTO `options` VALUES ('73','19','Convert &gt; Text to Table','0');
INSERT INTO `options` VALUES ('74','19','Convert &gt; Table to Text','1');
INSERT INTO `options` VALUES ('75','19','Split Table','0');
INSERT INTO `options` VALUES ('76','19','Paste as Text','0');
INSERT INTO `options` VALUES ('77','20','Track Changes','0');
INSERT INTO `options` VALUES ('78','20','Compare','1');
INSERT INTO `options` VALUES ('79','20','Restrict Editing','0');
INSERT INTO `options` VALUES ('80','20','Share','0');
INSERT INTO `options` VALUES ('81','21','Insert Caption','1');
INSERT INTO `options` VALUES ('82','21','Insert Number','0');
INSERT INTO `options` VALUES ('83','21','AutoLabel','0');
INSERT INTO `options` VALUES ('84','21','Figure Format','0');
INSERT INTO `options` VALUES ('85','22','Margins','0');
INSERT INTO `options` VALUES ('86','22','Orientation','1');
INSERT INTO `options` VALUES ('87','22','Page Color','0');
INSERT INTO `options` VALUES ('88','22','Page Border','0');
INSERT INTO `options` VALUES ('89','23','Insert &gt; Illustration &gt; SmartArt','1');
INSERT INTO `options` VALUES ('90','23','Insert &gt; Icons','0');
INSERT INTO `options` VALUES ('91','23','Home &gt; Styles','0');
INSERT INTO `options` VALUES ('92','23','Layout &gt; Smart Layout','0');
INSERT INTO `options` VALUES ('93','24','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('94','24','Insert &gt; Endnote','0');
INSERT INTO `options` VALUES ('95','24','References &gt; Insert Footnote','1');
INSERT INTO `options` VALUES ('96','24','Review &gt; Notes','0');
INSERT INTO `options` VALUES ('97','25','Shift + Enter','1');
INSERT INTO `options` VALUES ('98','25','Ctrl + Enter','0');
INSERT INTO `options` VALUES ('99','25','Alt + Enter','0');
INSERT INTO `options` VALUES ('100','25','Ctrl + Shift + Enter','0');
INSERT INTO `options` VALUES ('101','26','Developer Tools','1');
INSERT INTO `options` VALUES ('102','26','Page Layout','0');
INSERT INTO `options` VALUES ('103','26','SmartArt','0');
INSERT INTO `options` VALUES ('104','26','WordArt','0');
INSERT INTO `options` VALUES ('105','27','Table of Contents','0');
INSERT INTO `options` VALUES ('106','27','Index','0');
INSERT INTO `options` VALUES ('107','27','Table of Figures','1');
INSERT INTO `options` VALUES ('108','27','Caption List','0');
INSERT INTO `options` VALUES ('109','28','Track Changes','1');
INSERT INTO `options` VALUES ('110','28','Version History','0');
INSERT INTO `options` VALUES ('111','28','Compare','0');
INSERT INTO `options` VALUES ('112','28','Share','0');
INSERT INTO `options` VALUES ('113','29','Hyperlink + Bookmark','1');
INSERT INTO `options` VALUES ('114','29','Review Link','0');
INSERT INTO `options` VALUES ('115','29','Page Marker','0');
INSERT INTO `options` VALUES ('116','29','AutoJump','0');
INSERT INTO `options` VALUES ('117','30','Insert','0');
INSERT INTO `options` VALUES ('118','30','Layout &gt; Margins','1');
INSERT INTO `options` VALUES ('119','30','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('120','30','References','0');
INSERT INTO `options` VALUES ('121','31','Styles','1');
INSERT INTO `options` VALUES ('122','31','Themes','0');
INSERT INTO `options` VALUES ('123','31','Templates','0');
INSERT INTO `options` VALUES ('124','31','Macros','0');
INSERT INTO `options` VALUES ('125','32','استفاده از Headingها','1');
INSERT INTO `options` VALUES ('126','32','ایجاد بوکمارک','0');
INSERT INTO `options` VALUES ('127','32','افزودن Hyperlink','0');
INSERT INTO `options` VALUES ('128','32','استفاده از Symbolها','0');
INSERT INTO `options` VALUES ('129','33','Line Spacing','0');
INSERT INTO `options` VALUES ('130','33','Paragraph Spacing','1');
INSERT INTO `options` VALUES ('131','33','Indentation','0');
INSERT INTO `options` VALUES ('132','33','Page Setup','0');
INSERT INTO `options` VALUES ('133','34','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('134','34','Insert &gt; Page Number','1');
INSERT INTO `options` VALUES ('135','34','Layout &gt; Margins','0');
INSERT INTO `options` VALUES ('136','34','View &gt; Header &amp; Footer','0');
INSERT INTO `options` VALUES ('137','35','Text Direction','0');
INSERT INTO `options` VALUES ('138','35','Columns','1');
INSERT INTO `options` VALUES ('139','35','Wrap Text','0');
INSERT INTO `options` VALUES ('140','35','Section Break','0');
INSERT INTO `options` VALUES ('141','36','Track Changes','0');
INSERT INTO `options` VALUES ('142','36','Restrict Editing','1');
INSERT INTO `options` VALUES ('143','36','Compare Documents','0');
INSERT INTO `options` VALUES ('144','36','Smart Lookup','0');
INSERT INTO `options` VALUES ('145','37','Grammar Checker','0');
INSERT INTO `options` VALUES ('146','37','Spelling Checker','1');
INSERT INTO `options` VALUES ('147','37','Word Count','0');
INSERT INTO `options` VALUES ('148','37','AutoCorrect Options','0');
INSERT INTO `options` VALUES ('149','38','Bullets','0');
INSERT INTO `options` VALUES ('150','38','Numbering','0');
INSERT INTO `options` VALUES ('151','38','Multilevel List','1');
INSERT INTO `options` VALUES ('152','38','Outline View','0');
INSERT INTO `options` VALUES ('153','39','Ctrl + H','1');
INSERT INTO `options` VALUES ('154','39','Ctrl + F','0');
INSERT INTO `options` VALUES ('155','39','Ctrl + G','0');
INSERT INTO `options` VALUES ('156','39','Ctrl + Shift + H','0');
INSERT INTO `options` VALUES ('157','40','Insert &gt; Text','0');
INSERT INTO `options` VALUES ('158','40','Home &gt; Font &gt; Change Case','1');
INSERT INTO `options` VALUES ('159','40','Layout &gt; Text Direction','0');
INSERT INTO `options` VALUES ('160','40','Review &gt; Language','0');
INSERT INTO `options` VALUES ('161','41','Paste Special','0');
INSERT INTO `options` VALUES ('162','41','AutoFormat','0');
INSERT INTO `options` VALUES ('163','41','Borders','1');
INSERT INTO `options` VALUES ('164','41','Ruler','0');
INSERT INTO `options` VALUES ('165','42','View &gt; Gridlines','1');
INSERT INTO `options` VALUES ('166','42','Insert &gt; Shapes','0');
INSERT INTO `options` VALUES ('167','42','Layout &gt; Align','0');
INSERT INTO `options` VALUES ('168','42','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('169','43','Text Wrapping','1');
INSERT INTO `options` VALUES ('170','43','Picture Style','0');
INSERT INTO `options` VALUES ('171','43','Crop Tool','0');
INSERT INTO `options` VALUES ('172','43','Screenshot','0');
INSERT INTO `options` VALUES ('173','44','Column Break','0');
INSERT INTO `options` VALUES ('174','44','Line Break','0');
INSERT INTO `options` VALUES ('175','44','Page Break','1');
INSERT INTO `options` VALUES ('176','44','Text Wrapping Break','0');
INSERT INTO `options` VALUES ('177','45','Word Count','1');
INSERT INTO `options` VALUES ('178','45','Reviewing Pane','0');
INSERT INTO `options` VALUES ('179','45','Read Mode','0');
INSERT INTO `options` VALUES ('180','45','Track Changes','0');
INSERT INTO `options` VALUES ('181','46','Split Cells','0');
INSERT INTO `options` VALUES ('182','46','Merge Cells','1');
INSERT INTO `options` VALUES ('183','46','AutoFit','0');
INSERT INTO `options` VALUES ('184','46','Distribute Rows','0');
INSERT INTO `options` VALUES ('185','47','Insert &gt; Note','0');
INSERT INTO `options` VALUES ('186','47','View &gt; Comments','0');
INSERT INTO `options` VALUES ('187','47','Review &gt; New Comment','1');
INSERT INTO `options` VALUES ('188','47','Home &gt; Comment','0');
INSERT INTO `options` VALUES ('189','48','Page Setup','0');
INSERT INTO `options` VALUES ('190','48','Section Breaks','1');
INSERT INTO `options` VALUES ('191','48','Layout Themes','0');
INSERT INTO `options` VALUES ('192','48','Ruler Sections','0');
INSERT INTO `options` VALUES ('193','49','Convert &gt; Text to Table','0');
INSERT INTO `options` VALUES ('194','49','Convert &gt; Table to Text','1');
INSERT INTO `options` VALUES ('195','49','Split Table','0');
INSERT INTO `options` VALUES ('196','49','Paste as Text','0');
INSERT INTO `options` VALUES ('197','50','Track Changes','0');
INSERT INTO `options` VALUES ('198','50','Compare','1');
INSERT INTO `options` VALUES ('199','50','Restrict Editing','0');
INSERT INTO `options` VALUES ('200','50','Share','0');
INSERT INTO `options` VALUES ('201','51','Insert Caption','1');
INSERT INTO `options` VALUES ('202','51','Insert Number','0');
INSERT INTO `options` VALUES ('203','51','AutoLabel','0');
INSERT INTO `options` VALUES ('204','51','Figure Format','0');
INSERT INTO `options` VALUES ('205','52','Margins','0');
INSERT INTO `options` VALUES ('206','52','Orientation','1');
INSERT INTO `options` VALUES ('207','52','Page Color','0');
INSERT INTO `options` VALUES ('208','52','Page Border','0');
INSERT INTO `options` VALUES ('209','53','Insert &gt; Illustration &gt; SmartArt','1');
INSERT INTO `options` VALUES ('210','53','Insert &gt; Icons','0');
INSERT INTO `options` VALUES ('211','53','Home &gt; Styles','0');
INSERT INTO `options` VALUES ('212','53','Layout &gt; Smart Layout','0');
INSERT INTO `options` VALUES ('213','54','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('214','54','Insert &gt; Endnote','0');
INSERT INTO `options` VALUES ('215','54','References &gt; Insert Footnote','1');
INSERT INTO `options` VALUES ('216','54','Review &gt; Notes','0');
INSERT INTO `options` VALUES ('217','55','Shift + Enter','1');
INSERT INTO `options` VALUES ('218','55','Ctrl + Enter','0');
INSERT INTO `options` VALUES ('219','55','Alt + Enter','0');
INSERT INTO `options` VALUES ('220','55','Ctrl + Shift + Enter','0');
INSERT INTO `options` VALUES ('221','56','Developer Tools','1');
INSERT INTO `options` VALUES ('222','56','Page Layout','0');
INSERT INTO `options` VALUES ('223','56','SmartArt','0');
INSERT INTO `options` VALUES ('224','56','WordArt','0');
INSERT INTO `options` VALUES ('225','57','Table of Contents','0');
INSERT INTO `options` VALUES ('226','57','Index','0');
INSERT INTO `options` VALUES ('227','57','Table of Figures','1');
INSERT INTO `options` VALUES ('228','57','Caption List','0');
INSERT INTO `options` VALUES ('229','58','Track Changes','1');
INSERT INTO `options` VALUES ('230','58','Version History','0');
INSERT INTO `options` VALUES ('231','58','Compare','0');
INSERT INTO `options` VALUES ('232','58','Share','0');
INSERT INTO `options` VALUES ('233','59','Hyperlink + Bookmark','1');
INSERT INTO `options` VALUES ('234','59','Review Link','0');
INSERT INTO `options` VALUES ('235','59','Page Marker','0');
INSERT INTO `options` VALUES ('236','59','AutoJump','0');
INSERT INTO `options` VALUES ('237','60','Insert','0');
INSERT INTO `options` VALUES ('238','60','Layout &gt; Margins','1');
INSERT INTO `options` VALUES ('239','60','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('240','60','References','0');
INSERT INTO `options` VALUES ('241','61','Styles','1');
INSERT INTO `options` VALUES ('242','61','Themes','0');
INSERT INTO `options` VALUES ('243','61','Templates','0');
INSERT INTO `options` VALUES ('244','61','Macros','0');
INSERT INTO `options` VALUES ('245','62','استفاده از Headingها','1');
INSERT INTO `options` VALUES ('246','62','ایجاد بوکمارک','0');
INSERT INTO `options` VALUES ('247','62','افزودن Hyperlink','0');
INSERT INTO `options` VALUES ('248','62','استفاده از Symbolها','0');
INSERT INTO `options` VALUES ('249','63','Line Spacing','0');
INSERT INTO `options` VALUES ('250','63','Paragraph Spacing','1');
INSERT INTO `options` VALUES ('251','63','Indentation','0');
INSERT INTO `options` VALUES ('252','63','Page Setup','0');
INSERT INTO `options` VALUES ('253','64','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('254','64','Insert &gt; Page Number','1');
INSERT INTO `options` VALUES ('255','64','Layout &gt; Margins','0');
INSERT INTO `options` VALUES ('256','64','View &gt; Header &amp; Footer','0');
INSERT INTO `options` VALUES ('257','65','Text Direction','0');
INSERT INTO `options` VALUES ('258','65','Columns','1');
INSERT INTO `options` VALUES ('259','65','Wrap Text','0');
INSERT INTO `options` VALUES ('260','65','Section Break','0');
INSERT INTO `options` VALUES ('261','66','Track Changes','0');
INSERT INTO `options` VALUES ('262','66','Restrict Editing','1');
INSERT INTO `options` VALUES ('263','66','Compare Documents','0');
INSERT INTO `options` VALUES ('264','66','Smart Lookup','0');
INSERT INTO `options` VALUES ('265','67','Grammar Checker','0');
INSERT INTO `options` VALUES ('266','67','Spelling Checker','1');
INSERT INTO `options` VALUES ('267','67','Word Count','0');
INSERT INTO `options` VALUES ('268','67','AutoCorrect Options','0');
INSERT INTO `options` VALUES ('269','68','Bullets','0');
INSERT INTO `options` VALUES ('270','68','Numbering','0');
INSERT INTO `options` VALUES ('271','68','Multilevel List','1');
INSERT INTO `options` VALUES ('272','68','Outline View','0');
INSERT INTO `options` VALUES ('273','69','Ctrl + H','1');
INSERT INTO `options` VALUES ('274','69','Ctrl + F','0');
INSERT INTO `options` VALUES ('275','69','Ctrl + G','0');
INSERT INTO `options` VALUES ('276','69','Ctrl + Shift + H','0');
INSERT INTO `options` VALUES ('277','70','Insert &gt; Text','0');
INSERT INTO `options` VALUES ('278','70','Home &gt; Font &gt; Change Case','1');
INSERT INTO `options` VALUES ('279','70','Layout &gt; Text Direction','0');
INSERT INTO `options` VALUES ('280','70','Review &gt; Language','0');
INSERT INTO `options` VALUES ('281','71','Paste Special','0');
INSERT INTO `options` VALUES ('282','71','AutoFormat','0');
INSERT INTO `options` VALUES ('283','71','Borders','1');
INSERT INTO `options` VALUES ('284','71','Ruler','0');
INSERT INTO `options` VALUES ('285','72','View &gt; Gridlines','1');
INSERT INTO `options` VALUES ('286','72','Insert &gt; Shapes','0');
INSERT INTO `options` VALUES ('287','72','Layout &gt; Align','0');
INSERT INTO `options` VALUES ('288','72','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('289','73','Text Wrapping','1');
INSERT INTO `options` VALUES ('290','73','Picture Style','0');
INSERT INTO `options` VALUES ('291','73','Crop Tool','0');
INSERT INTO `options` VALUES ('292','73','Screenshot','0');
INSERT INTO `options` VALUES ('293','74','Column Break','0');
INSERT INTO `options` VALUES ('294','74','Line Break','0');
INSERT INTO `options` VALUES ('295','74','Page Break','1');
INSERT INTO `options` VALUES ('296','74','Text Wrapping Break','0');
INSERT INTO `options` VALUES ('297','75','Word Count','1');
INSERT INTO `options` VALUES ('298','75','Reviewing Pane','0');
INSERT INTO `options` VALUES ('299','75','Read Mode','0');
INSERT INTO `options` VALUES ('300','75','Track Changes','0');
INSERT INTO `options` VALUES ('301','76','Split Cells','0');
INSERT INTO `options` VALUES ('302','76','Merge Cells','1');
INSERT INTO `options` VALUES ('303','76','AutoFit','0');
INSERT INTO `options` VALUES ('304','76','Distribute Rows','0');
INSERT INTO `options` VALUES ('305','77','Insert &gt; Note','0');
INSERT INTO `options` VALUES ('306','77','View &gt; Comments','0');
INSERT INTO `options` VALUES ('307','77','Review &gt; New Comment','1');
INSERT INTO `options` VALUES ('308','77','Home &gt; Comment','0');
INSERT INTO `options` VALUES ('309','78','Page Setup','0');
INSERT INTO `options` VALUES ('310','78','Section Breaks','1');
INSERT INTO `options` VALUES ('311','78','Layout Themes','0');
INSERT INTO `options` VALUES ('312','78','Ruler Sections','0');
INSERT INTO `options` VALUES ('313','79','Convert &gt; Text to Table','0');
INSERT INTO `options` VALUES ('314','79','Convert &gt; Table to Text','1');
INSERT INTO `options` VALUES ('315','79','Split Table','0');
INSERT INTO `options` VALUES ('316','79','Paste as Text','0');
INSERT INTO `options` VALUES ('317','80','Track Changes','0');
INSERT INTO `options` VALUES ('318','80','Compare','1');
INSERT INTO `options` VALUES ('319','80','Restrict Editing','0');
INSERT INTO `options` VALUES ('320','80','Share','0');
INSERT INTO `options` VALUES ('321','81','Insert Caption','1');
INSERT INTO `options` VALUES ('322','81','Insert Number','0');
INSERT INTO `options` VALUES ('323','81','AutoLabel','0');
INSERT INTO `options` VALUES ('324','81','Figure Format','0');
INSERT INTO `options` VALUES ('325','82','Margins','0');
INSERT INTO `options` VALUES ('326','82','Orientation','1');
INSERT INTO `options` VALUES ('327','82','Page Color','0');
INSERT INTO `options` VALUES ('328','82','Page Border','0');
INSERT INTO `options` VALUES ('329','83','Insert &gt; Illustration &gt; SmartArt','1');
INSERT INTO `options` VALUES ('330','83','Insert &gt; Icons','0');
INSERT INTO `options` VALUES ('331','83','Home &gt; Styles','0');
INSERT INTO `options` VALUES ('332','83','Layout &gt; Smart Layout','0');
INSERT INTO `options` VALUES ('333','84','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('334','84','Insert &gt; Endnote','0');
INSERT INTO `options` VALUES ('335','84','References &gt; Insert Footnote','1');
INSERT INTO `options` VALUES ('336','84','Review &gt; Notes','0');
INSERT INTO `options` VALUES ('337','85','Shift + Enter','1');
INSERT INTO `options` VALUES ('338','85','Ctrl + Enter','0');
INSERT INTO `options` VALUES ('339','85','Alt + Enter','0');
INSERT INTO `options` VALUES ('340','85','Ctrl + Shift + Enter','0');
INSERT INTO `options` VALUES ('341','86','Developer Tools','1');
INSERT INTO `options` VALUES ('342','86','Page Layout','0');
INSERT INTO `options` VALUES ('343','86','SmartArt','0');
INSERT INTO `options` VALUES ('344','86','WordArt','0');
INSERT INTO `options` VALUES ('345','87','Table of Contents','0');
INSERT INTO `options` VALUES ('346','87','Index','0');
INSERT INTO `options` VALUES ('347','87','Table of Figures','1');
INSERT INTO `options` VALUES ('348','87','Caption List','0');
INSERT INTO `options` VALUES ('349','88','Track Changes','1');
INSERT INTO `options` VALUES ('350','88','Version History','0');
INSERT INTO `options` VALUES ('351','88','Compare','0');
INSERT INTO `options` VALUES ('352','88','Share','0');
INSERT INTO `options` VALUES ('353','89','Hyperlink + Bookmark','1');
INSERT INTO `options` VALUES ('354','89','Review Link','0');
INSERT INTO `options` VALUES ('355','89','Page Marker','0');
INSERT INTO `options` VALUES ('356','89','AutoJump','0');
INSERT INTO `options` VALUES ('357','90','Insert','0');
INSERT INTO `options` VALUES ('358','90','Layout &gt; Margins','1');
INSERT INTO `options` VALUES ('359','90','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('360','90','References','0');
INSERT INTO `options` VALUES ('361','91','Styles','1');
INSERT INTO `options` VALUES ('362','91','Themes','0');
INSERT INTO `options` VALUES ('363','91','Templates','0');
INSERT INTO `options` VALUES ('364','91','Macros','0');
INSERT INTO `options` VALUES ('365','92','استفاده از Headingها','1');
INSERT INTO `options` VALUES ('366','92','ایجاد بوکمارک','0');
INSERT INTO `options` VALUES ('367','92','افزودن Hyperlink','0');
INSERT INTO `options` VALUES ('368','92','استفاده از Symbolها','0');
INSERT INTO `options` VALUES ('369','93','Line Spacing','0');
INSERT INTO `options` VALUES ('370','93','Paragraph Spacing','1');
INSERT INTO `options` VALUES ('371','93','Indentation','0');
INSERT INTO `options` VALUES ('372','93','Page Setup','0');
INSERT INTO `options` VALUES ('373','94','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('374','94','Insert &gt; Page Number','1');
INSERT INTO `options` VALUES ('375','94','Layout &gt; Margins','0');
INSERT INTO `options` VALUES ('376','94','View &gt; Header &amp; Footer','0');
INSERT INTO `options` VALUES ('377','95','Text Direction','0');
INSERT INTO `options` VALUES ('378','95','Columns','1');
INSERT INTO `options` VALUES ('379','95','Wrap Text','0');
INSERT INTO `options` VALUES ('380','95','Section Break','0');
INSERT INTO `options` VALUES ('381','96','Track Changes','0');
INSERT INTO `options` VALUES ('382','96','Restrict Editing','1');
INSERT INTO `options` VALUES ('383','96','Compare Documents','0');
INSERT INTO `options` VALUES ('384','96','Smart Lookup','0');
INSERT INTO `options` VALUES ('385','97','Grammar Checker','0');
INSERT INTO `options` VALUES ('386','97','Spelling Checker','1');
INSERT INTO `options` VALUES ('387','97','Word Count','0');
INSERT INTO `options` VALUES ('388','97','AutoCorrect Options','0');
INSERT INTO `options` VALUES ('389','98','Bullets','0');
INSERT INTO `options` VALUES ('390','98','Numbering','0');
INSERT INTO `options` VALUES ('391','98','Multilevel List','1');
INSERT INTO `options` VALUES ('392','98','Outline View','0');
INSERT INTO `options` VALUES ('393','99','Ctrl + H','1');
INSERT INTO `options` VALUES ('394','99','Ctrl + F','0');
INSERT INTO `options` VALUES ('395','99','Ctrl + G','0');
INSERT INTO `options` VALUES ('396','99','Ctrl + Shift + H','0');
INSERT INTO `options` VALUES ('397','100','Insert &gt; Text','0');
INSERT INTO `options` VALUES ('398','100','Home &gt; Font &gt; Change Case','1');
INSERT INTO `options` VALUES ('399','100','Layout &gt; Text Direction','0');
INSERT INTO `options` VALUES ('400','100','Review &gt; Language','0');
INSERT INTO `options` VALUES ('401','101','Paste Special','0');
INSERT INTO `options` VALUES ('402','101','AutoFormat','0');
INSERT INTO `options` VALUES ('403','101','Borders','1');
INSERT INTO `options` VALUES ('404','101','Ruler','0');
INSERT INTO `options` VALUES ('405','102','View &gt; Gridlines','1');
INSERT INTO `options` VALUES ('406','102','Insert &gt; Shapes','0');
INSERT INTO `options` VALUES ('407','102','Layout &gt; Align','0');
INSERT INTO `options` VALUES ('408','102','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('409','103','Text Wrapping','1');
INSERT INTO `options` VALUES ('410','103','Picture Style','0');
INSERT INTO `options` VALUES ('411','103','Crop Tool','0');
INSERT INTO `options` VALUES ('412','103','Screenshot','0');
INSERT INTO `options` VALUES ('413','104','Column Break','0');
INSERT INTO `options` VALUES ('414','104','Line Break','0');
INSERT INTO `options` VALUES ('415','104','Page Break','1');
INSERT INTO `options` VALUES ('416','104','Text Wrapping Break','0');
INSERT INTO `options` VALUES ('417','105','Word Count','1');
INSERT INTO `options` VALUES ('418','105','Reviewing Pane','0');
INSERT INTO `options` VALUES ('419','105','Read Mode','0');
INSERT INTO `options` VALUES ('420','105','Track Changes','0');
INSERT INTO `options` VALUES ('421','106','Split Cells','0');
INSERT INTO `options` VALUES ('422','106','Merge Cells','1');
INSERT INTO `options` VALUES ('423','106','AutoFit','0');
INSERT INTO `options` VALUES ('424','106','Distribute Rows','0');
INSERT INTO `options` VALUES ('425','107','Insert &gt; Note','0');
INSERT INTO `options` VALUES ('426','107','View &gt; Comments','0');
INSERT INTO `options` VALUES ('427','107','Review &gt; New Comment','1');
INSERT INTO `options` VALUES ('428','107','Home &gt; Comment','0');
INSERT INTO `options` VALUES ('429','108','Page Setup','0');
INSERT INTO `options` VALUES ('430','108','Section Breaks','1');
INSERT INTO `options` VALUES ('431','108','Layout Themes','0');
INSERT INTO `options` VALUES ('432','108','Ruler Sections','0');
INSERT INTO `options` VALUES ('433','109','Convert &gt; Text to Table','0');
INSERT INTO `options` VALUES ('434','109','Convert &gt; Table to Text','1');
INSERT INTO `options` VALUES ('435','109','Split Table','0');
INSERT INTO `options` VALUES ('436','109','Paste as Text','0');
INSERT INTO `options` VALUES ('437','110','Track Changes','0');
INSERT INTO `options` VALUES ('438','110','Compare','1');
INSERT INTO `options` VALUES ('439','110','Restrict Editing','0');
INSERT INTO `options` VALUES ('440','110','Share','0');
INSERT INTO `options` VALUES ('441','111','Insert Caption','1');
INSERT INTO `options` VALUES ('442','111','Insert Number','0');
INSERT INTO `options` VALUES ('443','111','AutoLabel','0');
INSERT INTO `options` VALUES ('444','111','Figure Format','0');
INSERT INTO `options` VALUES ('445','112','Margins','0');
INSERT INTO `options` VALUES ('446','112','Orientation','1');
INSERT INTO `options` VALUES ('447','112','Page Color','0');
INSERT INTO `options` VALUES ('448','112','Page Border','0');
INSERT INTO `options` VALUES ('449','113','Insert &gt; Illustration &gt; SmartArt','1');
INSERT INTO `options` VALUES ('450','113','Insert &gt; Icons','0');
INSERT INTO `options` VALUES ('451','113','Home &gt; Styles','0');
INSERT INTO `options` VALUES ('452','113','Layout &gt; Smart Layout','0');
INSERT INTO `options` VALUES ('453','114','Insert &gt; Footer','0');
INSERT INTO `options` VALUES ('454','114','Insert &gt; Endnote','0');
INSERT INTO `options` VALUES ('455','114','References &gt; Insert Footnote','1');
INSERT INTO `options` VALUES ('456','114','Review &gt; Notes','0');
INSERT INTO `options` VALUES ('457','115','Shift + Enter','1');
INSERT INTO `options` VALUES ('458','115','Ctrl + Enter','0');
INSERT INTO `options` VALUES ('459','115','Alt + Enter','0');
INSERT INTO `options` VALUES ('460','115','Ctrl + Shift + Enter','0');
INSERT INTO `options` VALUES ('461','116','Developer Tools','1');
INSERT INTO `options` VALUES ('462','116','Page Layout','0');
INSERT INTO `options` VALUES ('463','116','SmartArt','0');
INSERT INTO `options` VALUES ('464','116','WordArt','0');
INSERT INTO `options` VALUES ('465','117','Table of Contents','0');
INSERT INTO `options` VALUES ('466','117','Index','0');
INSERT INTO `options` VALUES ('467','117','Table of Figures','1');
INSERT INTO `options` VALUES ('468','117','Caption List','0');
INSERT INTO `options` VALUES ('469','118','Track Changes','1');
INSERT INTO `options` VALUES ('470','118','Version History','0');
INSERT INTO `options` VALUES ('471','118','Compare','0');
INSERT INTO `options` VALUES ('472','118','Share','0');
INSERT INTO `options` VALUES ('473','119','Hyperlink + Bookmark','1');
INSERT INTO `options` VALUES ('474','119','Review Link','0');
INSERT INTO `options` VALUES ('475','119','Page Marker','0');
INSERT INTO `options` VALUES ('476','119','AutoJump','0');
INSERT INTO `options` VALUES ('477','120','Insert','0');
INSERT INTO `options` VALUES ('478','120','Layout &gt; Margins','1');
INSERT INTO `options` VALUES ('479','120','Home &gt; Paragraph','0');
INSERT INTO `options` VALUES ('480','120','References','0');


-- TABLE: questions
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint unsigned NOT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `type` enum('mcq_single','mcq_multi','true_false','fill_blank') NOT NULL,
  `body` text NOT NULL,
  `explanation` text,
  `difficulty` tinyint unsigned DEFAULT '2',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_q_quiz` (`quiz_id`),
  KEY `fk_q_subject` (`subject_id`),
  CONSTRAINT `fk_q_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_q_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `questions` VALUES ('1','1',NULL,'mcq_single','برای ایجاد تیترهای خودکار در یک سند ورد از کدام قابلیت استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('2','1',NULL,'mcq_single','برای ایجاد فهرست مطالب خودکار، ابتدا باید کدام مورد رعایت شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('3','1',NULL,'mcq_single','کدام گزینه برای تنظیم فاصله قبل و بعد از پاراگراف استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('4','1',NULL,'mcq_single','برای افزودن شماره صفحه در پایین صفحه از چه مسیری استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('5','1',NULL,'mcq_single','کدام ویژگی باعث می‌شود یک متن به شکل سطرهای ستونی دربیاید؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('6','1',NULL,'mcq_single','برای محافظت از سند و جلوگیری از ویرایش دیگران از کدام گزینه استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('7','1',NULL,'mcq_single','کدام گزینه برای تشخیص غلط‌های املایی خودکار در متن کاربرد دارد؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('8','1',NULL,'mcq_single','برای درج خودکار شماره‌گذاری چندسطحی در Word از کدام قابلیت استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('9','1',NULL,'mcq_single','کدام دستور برای جستجو و جایگزینی یک واژه در سند استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('10','1',NULL,'mcq_single','برای تبدیل متن انتخاب شده به حروف بزرگ از کدام مسیر استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('11','1',NULL,'mcq_single','کدام گزینه برای ایجاد خطوط افقی خودکار در صفحه استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('12','1',NULL,'mcq_single','برای نمایش خطوط راهنما (Gridlines) کدام مسیر درست است؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('13','1',NULL,'mcq_single','کدام ویژگی باعث می‌شود تصویر با متن حرکت کند؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('14','1',NULL,'mcq_single','کدام نوع Break باعث ایجاد صفحه جدید می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('15','1',NULL,'mcq_single','برای مشاهده تعداد کلمات سند از چه گزینه‌ای استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('16','1',NULL,'mcq_single','کدام گزینه برای ادغام چند سلول جدول به یک سلول استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('17','1',NULL,'mcq_single','برای درج یادداشت (Comment) از چه مسیری استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('18','1',NULL,'mcq_single','برای ایجاد بخش‌های مجزا در سند از کدام ابزار استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('19','1',NULL,'mcq_single','کدام گزینه برای تبدیل جدول به متن استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('20','1',NULL,'mcq_single','کدام ابزار برای مقایسه دو سند ورد استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('21','1',NULL,'mcq_single','برای اضافه کردن شماره خودکار شکل‌ها از کدام گزینه استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('22','1',NULL,'mcq_single','کدام گزینه برای تغییر جهت صفحه از عمودی به افقی استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('23','1',NULL,'mcq_single','برای تبدیل متن به SmartArt از کدام مسیر استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('24','1',NULL,'mcq_single','برای افزودن پاورقی (Footnote) از کدام قسمت استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('25','1',NULL,'mcq_single','کدام گزینه باعث می‌شود هنگام تایپ، خط جدید بدون ایجاد پاراگراف آغاز شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('26','1',NULL,'mcq_single','برای ایجاد فیلدهای پرشدنی (Fillable Forms) از چه ابزاری استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('27','1',NULL,'mcq_single','برای استخراج خودکار عناوین تصاویر در فهرست جداگانه از چه ابزاری استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('28','1',NULL,'mcq_single','کدام ابزار امکان مشاهده تغییرات سایر کاربران را فراهم می‌کند؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('29','1',NULL,'mcq_single','برای لینک‌کردن به یک نقطه در همان سند از چه ابزاری استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('30','1',NULL,'mcq_single','برای تنظیم حاشیه‌ها در کل سند از کدام بخش استفاده می‌شود؟','','2','2025-12-12 23:26:24');
INSERT INTO `questions` VALUES ('31','2',NULL,'mcq_single','برای ایجاد تیترهای خودکار در یک سند ورد از کدام قابلیت استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('32','2',NULL,'mcq_single','برای ایجاد فهرست مطالب خودکار، ابتدا باید کدام مورد رعایت شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('33','2',NULL,'mcq_single','کدام گزینه برای تنظیم فاصله قبل و بعد از پاراگراف استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('34','2',NULL,'mcq_single','برای افزودن شماره صفحه در پایین صفحه از چه مسیری استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('35','2',NULL,'mcq_single','کدام ویژگی باعث می‌شود یک متن به شکل سطرهای ستونی دربیاید؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('36','2',NULL,'mcq_single','برای محافظت از سند و جلوگیری از ویرایش دیگران از کدام گزینه استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('37','2',NULL,'mcq_single','کدام گزینه برای تشخیص غلط‌های املایی خودکار در متن کاربرد دارد؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('38','2',NULL,'mcq_single','برای درج خودکار شماره‌گذاری چندسطحی در Word از کدام قابلیت استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('39','2',NULL,'mcq_single','کدام دستور برای جستجو و جایگزینی یک واژه در سند استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('40','2',NULL,'mcq_single','برای تبدیل متن انتخاب شده به حروف بزرگ از کدام مسیر استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('41','2',NULL,'mcq_single','کدام گزینه برای ایجاد خطوط افقی خودکار در صفحه استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('42','2',NULL,'mcq_single','برای نمایش خطوط راهنما (Gridlines) کدام مسیر درست است؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('43','2',NULL,'mcq_single','کدام ویژگی باعث می‌شود تصویر با متن حرکت کند؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('44','2',NULL,'mcq_single','کدام نوع Break باعث ایجاد صفحه جدید می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('45','2',NULL,'mcq_single','برای مشاهده تعداد کلمات سند از چه گزینه‌ای استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('46','2',NULL,'mcq_single','کدام گزینه برای ادغام چند سلول جدول به یک سلول استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('47','2',NULL,'mcq_single','برای درج یادداشت (Comment) از چه مسیری استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('48','2',NULL,'mcq_single','برای ایجاد بخش‌های مجزا در سند از کدام ابزار استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('49','2',NULL,'mcq_single','کدام گزینه برای تبدیل جدول به متن استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('50','2',NULL,'mcq_single','کدام ابزار برای مقایسه دو سند ورد استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('51','2',NULL,'mcq_single','برای اضافه کردن شماره خودکار شکل‌ها از کدام گزینه استفاده می‌شود؟','','2','2025-12-16 00:42:32');
INSERT INTO `questions` VALUES ('52','2',NULL,'mcq_single','کدام گزینه برای تغییر جهت صفحه از عمودی به افقی استفاده می‌شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('53','2',NULL,'mcq_single','برای تبدیل متن به SmartArt از کدام مسیر استفاده می‌شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('54','2',NULL,'mcq_single','برای افزودن پاورقی (Footnote) از کدام قسمت استفاده می‌شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('55','2',NULL,'mcq_single','کدام گزینه باعث می‌شود هنگام تایپ، خط جدید بدون ایجاد پاراگراف آغاز شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('56','2',NULL,'mcq_single','برای ایجاد فیلدهای پرشدنی (Fillable Forms) از چه ابزاری استفاده می‌شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('57','2',NULL,'mcq_single','برای استخراج خودکار عناوین تصاویر در فهرست جداگانه از چه ابزاری استفاده می‌شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('58','2',NULL,'mcq_single','کدام ابزار امکان مشاهده تغییرات سایر کاربران را فراهم می‌کند؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('59','2',NULL,'mcq_single','برای لینک‌کردن به یک نقطه در همان سند از چه ابزاری استفاده می‌شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('60','2',NULL,'mcq_single','برای تنظیم حاشیه‌ها در کل سند از کدام بخش استفاده می‌شود؟','','2','2025-12-16 00:42:33');
INSERT INTO `questions` VALUES ('61','3',NULL,'mcq_single','برای ایجاد تیترهای خودکار در یک سند ورد از کدام قابلیت استفاده می‌شود؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('62','3',NULL,'mcq_single','برای ایجاد فهرست مطالب خودکار، ابتدا باید کدام مورد رعایت شود؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('63','3',NULL,'mcq_single','کدام گزینه برای تنظیم فاصله قبل و بعد از پاراگراف استفاده می‌شود؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('64','3',NULL,'mcq_single','برای افزودن شماره صفحه در پایین صفحه از چه مسیری استفاده می‌شود؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('65','3',NULL,'mcq_single','کدام ویژگی باعث می‌شود یک متن به شکل سطرهای ستونی دربیاید؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('66','3',NULL,'mcq_single','برای محافظت از سند و جلوگیری از ویرایش دیگران از کدام گزینه استفاده می‌شود؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('67','3',NULL,'mcq_single','کدام گزینه برای تشخیص غلط‌های املایی خودکار در متن کاربرد دارد؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('68','3',NULL,'mcq_single','برای درج خودکار شماره‌گذاری چندسطحی در Word از کدام قابلیت استفاده می‌شود؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('69','3',NULL,'mcq_single','کدام دستور برای جستجو و جایگزینی یک واژه در سند استفاده می‌شود؟','','2','2025-12-16 13:01:14');
INSERT INTO `questions` VALUES ('70','3',NULL,'mcq_single','برای تبدیل متن انتخاب شده به حروف بزرگ از کدام مسیر استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('71','3',NULL,'mcq_single','کدام گزینه برای ایجاد خطوط افقی خودکار در صفحه استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('72','3',NULL,'mcq_single','برای نمایش خطوط راهنما (Gridlines) کدام مسیر درست است؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('73','3',NULL,'mcq_single','کدام ویژگی باعث می‌شود تصویر با متن حرکت کند؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('74','3',NULL,'mcq_single','کدام نوع Break باعث ایجاد صفحه جدید می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('75','3',NULL,'mcq_single','برای مشاهده تعداد کلمات سند از چه گزینه‌ای استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('76','3',NULL,'mcq_single','کدام گزینه برای ادغام چند سلول جدول به یک سلول استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('77','3',NULL,'mcq_single','برای درج یادداشت (Comment) از چه مسیری استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('78','3',NULL,'mcq_single','برای ایجاد بخش‌های مجزا در سند از کدام ابزار استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('79','3',NULL,'mcq_single','کدام گزینه برای تبدیل جدول به متن استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('80','3',NULL,'mcq_single','کدام ابزار برای مقایسه دو سند ورد استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('81','3',NULL,'mcq_single','برای اضافه کردن شماره خودکار شکل‌ها از کدام گزینه استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('82','3',NULL,'mcq_single','کدام گزینه برای تغییر جهت صفحه از عمودی به افقی استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('83','3',NULL,'mcq_single','برای تبدیل متن به SmartArt از کدام مسیر استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('84','3',NULL,'mcq_single','برای افزودن پاورقی (Footnote) از کدام قسمت استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('85','3',NULL,'mcq_single','کدام گزینه باعث می‌شود هنگام تایپ، خط جدید بدون ایجاد پاراگراف آغاز شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('86','3',NULL,'mcq_single','برای ایجاد فیلدهای پرشدنی (Fillable Forms) از چه ابزاری استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('87','3',NULL,'mcq_single','برای استخراج خودکار عناوین تصاویر در فهرست جداگانه از چه ابزاری استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('88','3',NULL,'mcq_single','کدام ابزار امکان مشاهده تغییرات سایر کاربران را فراهم می‌کند؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('89','3',NULL,'mcq_single','برای لینک‌کردن به یک نقطه در همان سند از چه ابزاری استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('90','3',NULL,'mcq_single','برای تنظیم حاشیه‌ها در کل سند از کدام بخش استفاده می‌شود؟','','2','2025-12-16 13:01:15');
INSERT INTO `questions` VALUES ('91','7',NULL,'mcq_single','برای ایجاد تیترهای خودکار در یک سند ورد از کدام قابلیت استفاده می‌شود؟','','2','2025-12-19 14:26:31');
INSERT INTO `questions` VALUES ('92','7',NULL,'mcq_single','برای ایجاد فهرست مطالب خودکار، ابتدا باید کدام مورد رعایت شود؟','','2','2025-12-19 14:26:31');
INSERT INTO `questions` VALUES ('93','7',NULL,'mcq_single','کدام گزینه برای تنظیم فاصله قبل و بعد از پاراگراف استفاده می‌شود؟','','2','2025-12-19 14:26:31');
INSERT INTO `questions` VALUES ('94','7',NULL,'mcq_single','برای افزودن شماره صفحه در پایین صفحه از چه مسیری استفاده می‌شود؟','','2','2025-12-19 14:26:31');
INSERT INTO `questions` VALUES ('95','7',NULL,'mcq_single','کدام ویژگی باعث می‌شود یک متن به شکل سطرهای ستونی دربیاید؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('96','7',NULL,'mcq_single','برای محافظت از سند و جلوگیری از ویرایش دیگران از کدام گزینه استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('97','7',NULL,'mcq_single','کدام گزینه برای تشخیص غلط‌های املایی خودکار در متن کاربرد دارد؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('98','7',NULL,'mcq_single','برای درج خودکار شماره‌گذاری چندسطحی در Word از کدام قابلیت استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('99','7',NULL,'mcq_single','کدام دستور برای جستجو و جایگزینی یک واژه در سند استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('100','7',NULL,'mcq_single','برای تبدیل متن انتخاب شده به حروف بزرگ از کدام مسیر استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('101','7',NULL,'mcq_single','کدام گزینه برای ایجاد خطوط افقی خودکار در صفحه استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('102','7',NULL,'mcq_single','برای نمایش خطوط راهنما (Gridlines) کدام مسیر درست است؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('103','7',NULL,'mcq_single','کدام ویژگی باعث می‌شود تصویر با متن حرکت کند؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('104','7',NULL,'mcq_single','کدام نوع Break باعث ایجاد صفحه جدید می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('105','7',NULL,'mcq_single','برای مشاهده تعداد کلمات سند از چه گزینه‌ای استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('106','7',NULL,'mcq_single','کدام گزینه برای ادغام چند سلول جدول به یک سلول استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('107','7',NULL,'mcq_single','برای درج یادداشت (Comment) از چه مسیری استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('108','7',NULL,'mcq_single','برای ایجاد بخش‌های مجزا در سند از کدام ابزار استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('109','7',NULL,'mcq_single','کدام گزینه برای تبدیل جدول به متن استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('110','7',NULL,'mcq_single','کدام ابزار برای مقایسه دو سند ورد استفاده می‌شود؟','','2','2025-12-19 14:26:32');
INSERT INTO `questions` VALUES ('111','7',NULL,'mcq_single','برای اضافه کردن شماره خودکار شکل‌ها از کدام گزینه استفاده می‌شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('112','7',NULL,'mcq_single','کدام گزینه برای تغییر جهت صفحه از عمودی به افقی استفاده می‌شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('113','7',NULL,'mcq_single','برای تبدیل متن به SmartArt از کدام مسیر استفاده می‌شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('114','7',NULL,'mcq_single','برای افزودن پاورقی (Footnote) از کدام قسمت استفاده می‌شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('115','7',NULL,'mcq_single','کدام گزینه باعث می‌شود هنگام تایپ، خط جدید بدون ایجاد پاراگراف آغاز شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('116','7',NULL,'mcq_single','برای ایجاد فیلدهای پرشدنی (Fillable Forms) از چه ابزاری استفاده می‌شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('117','7',NULL,'mcq_single','برای استخراج خودکار عناوین تصاویر در فهرست جداگانه از چه ابزاری استفاده می‌شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('118','7',NULL,'mcq_single','کدام ابزار امکان مشاهده تغییرات سایر کاربران را فراهم می‌کند؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('119','7',NULL,'mcq_single','برای لینک‌کردن به یک نقطه در همان سند از چه ابزاری استفاده می‌شود؟','','2','2025-12-19 14:26:33');
INSERT INTO `questions` VALUES ('120','7',NULL,'mcq_single','برای تنظیم حاشیه‌ها در کل سند از کدام بخش استفاده می‌شود؟','','2','2025-12-19 14:26:33');


-- TABLE: quiz_user_limits
CREATE TABLE `quiz_user_limits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `max_attempts` int NOT NULL DEFAULT '1',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_quiz_user` (`quiz_id`,`user_id`),
  KEY `fk_qul_user` (`user_id`),
  CONSTRAINT `fk_qul_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_qul_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `quiz_user_limits` VALUES ('1','3','5','2','1','2025-12-17 00:47:20');


-- TABLE: quizzes
CREATE TABLE `quizzes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `max_attempts` int NOT NULL DEFAULT '1',
  `module` varchar(50) DEFAULT NULL,
  `time_limit_seconds` int DEFAULT '0',
  `question_count` int NOT NULL DEFAULT '20',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_quiz_user` (`created_by`),
  KEY `fk_quiz_subject` (`subject_id`),
  CONSTRAINT `fk_quiz_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_quiz_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `quizzes` VALUES ('1','آزمون عربی دهم','1','0','ICDL_Concepts','2000','20','1','1','2025-12-12 00:49:53');
INSERT INTO `quizzes` VALUES ('2','الزامات دهم',NULL,'0','','2000','20','0','3','2025-12-14 13:53:06');
INSERT INTO `quizzes` VALUES ('3','پودمان اول','3','0','ICDL_Concepts','600','20','1','1','2025-12-16 13:00:43');
INSERT INTO `quizzes` VALUES ('4','پودمان اول شبکه',NULL,'0','internet','800','15','0','9','2025-12-19 00:40:21');
INSERT INTO `quizzes` VALUES ('5','پودموان اول شبکه و تجهیزات',NULL,'0','','2000','15','0','9','2025-12-19 00:43:15');
INSERT INTO `quizzes` VALUES ('6','پودمان اول شبکه','5','1','internet','2000','15','0','9','2025-12-19 00:45:53');
INSERT INTO `quizzes` VALUES ('7','پودمان دوم شبکه','5','1','','0','15','1','9','2025-12-19 00:53:48');
INSERT INTO `quizzes` VALUES ('8','پودمان سوم شبکه','5','3','','160','16','1','9','2025-12-19 18:23:37');


-- TABLE: subjects
CREATE TABLE `subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `subjects` VALUES ('1','عربی','دهم','شبکه','4563','1','2025-12-12 00:41:48');
INSERT INTO `subjects` VALUES ('2','الزامات','دهم','شبکه','4564','1','2025-12-15 23:24:12');
INSERT INTO `subjects` VALUES ('3','برنامه سازی','یادزهم','شبکه','4565','1','2025-12-16 13:00:14');
INSERT INTO `subjects` VALUES ('4','نصب و نگهداری','دهم','شبکه','','1','2025-12-17 14:20:03');
INSERT INTO `subjects` VALUES ('5','شبکه و تجهیزات','دوازدهم','شبکه','4568','1','2025-12-17 14:20:33');


-- TABLE: user_subjects
CREATE TABLE `user_subjects` (
  `user_id` bigint unsigned NOT NULL,
  `subject_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`subject_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `user_subjects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user_subjects` VALUES ('5','3');
INSERT INTO `user_subjects` VALUES ('6','3');
INSERT INTO `user_subjects` VALUES ('8','3');
INSERT INTO `user_subjects` VALUES ('3','4');
INSERT INTO `user_subjects` VALUES ('8','5');
INSERT INTO `user_subjects` VALUES ('9','5');
INSERT INTO `user_subjects` VALUES ('10','5');


-- TABLE: users
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','teacher','student') NOT NULL DEFAULT 'student',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` VALUES ('1','admin','admin','$2y$10$aNB59/9nkhsThJ4BZX/zNuzIBEOAyQdnQOVEkMylclYGA0exebmrm','admin','1','2025-12-11 23:31:27');
INSERT INTO `users` VALUES ('2','محمود بجانی','bejani','$2y$10$BWtuP8d3CNHVu5YqQSCAsuR/TS8JLlbrgiOM/jz68ozsmM9qi1v9m','student','1','2025-12-12 00:50:20');
INSERT INTO `users` VALUES ('3','فرامرز افسری','afsari','$2y$10$9oRsUX3DEwZ7C6G1Av6wROSTCuekeksXWIBDT0sCDZpMR4O8u3Rw2','teacher','1','2025-12-14 13:19:57');
INSERT INTO `users` VALUES ('5','ائلیار','elyar','$2y$10$1THxcDmyokf.LX7oyrmIJ.pX1WoWGDHQMtuvkgjm2xn21046.d5qW','student','1','2025-12-16 13:33:45');
INSERT INTO `users` VALUES ('6','مطیعی','mot','$2y$10$jQnpQj0EGqIV7q9J2CtzTuCva1z3EecMZnrY7.VJ5E0TwbXDPOyxu','teacher','1','2025-12-16 13:42:22');
INSERT INTO `users` VALUES ('8','کریم محمدی','karim','$2y$10$kaMEpzFhHc5QhyXDsf5vs.bu89s4OjRhySX0BtJeWH.dvjv8uYE46','student','1','2025-12-19 00:29:46');
INSERT INTO `users` VALUES ('9','نادر گرجاسی','nader','$2y$10$qp96KPTvXHhfYL1fEb3sKOFRSUnLhHkOAWWh79enl21.qsJNao2by','teacher','1','2025-12-19 00:30:30');
INSERT INTO `users` VALUES ('10','علی فرزانه','ali','$2y$10$TCbpSwBhFHL7kmwc8ljtXujRlxgYpUfuJ0z8uwfb4IRM6XhK5ax9S','student','1','2025-12-19 00:52:48');


