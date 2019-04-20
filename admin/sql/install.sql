
/* ==================== constants ==================== */
SET @tnow = NOW();
SET @tnl  = '0000-00-00 00:00:00';
SET @tns  = '0000-00-00';
SET @db   = DATABASE();

/* ==================== tables ==================== */

CREATE TABLE IF NOT EXISTS `#__pv_cf_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `display` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__pv_cf_cycles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `display` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__pv_cf_imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(10) NOT NULL DEFAULT '',
  `filername` varchar(255) NOT NULL DEFAULT '',
  `reporturl` varchar(255) NOT NULL DEFAULT '',
  `year` smallint(4) NOT NULL DEFAULT 0,
  `class` varchar(255) NOT NULL DEFAULT '',
  `cycle` varchar(255) NOT NULL DEFAULT '',
  `display` varchar(255) NOT NULL DEFAULT '',
  `ordinal` smallint(4) NOT NULL DEFAULT 0,
  `reporttype` varchar(255) NOT NULL DEFAULT '',
  `reportid` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__pv_cf_online_maps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL DEFAULT 0,
  `entity` varchar(255) NOT NULL DEFAULT '',
  `display` varchar(255) NOT NULL DEFAULT '',
  `committee` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `ordinal` smallint(4) NOT NULL DEFAULT 0,
  `year` smallint(4) NOT NULL DEFAULT 0,
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__pv_cf_paper_maps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL DEFAULT 0,
  `entity` varchar(255) NOT NULL DEFAULT '',
  `display` varchar(255) NOT NULL DEFAULT '',
  `ordinal` smallint(4) NOT NULL DEFAULT 0,
  `year` smallint(4) NOT NULL DEFAULT 0,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `typepath` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__pv_cf_reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(10) NOT NULL DEFAULT '',
  `filername` varchar(255) NOT NULL DEFAULT '',
  `reporturl` varchar(255) NOT NULL DEFAULT '',
  `year` smallint(4) NOT NULL DEFAULT 0,
  `class_id` int(10) unsigned NOT NULL DEFAULT 0,
  `cycle_id` int(10) unsigned NOT NULL DEFAULT 0,
  `cycle_overrride_id` int(10) unsigned NOT NULL DEFAULT 0,
  `display` varchar(255) NOT NULL DEFAULT '',
  `ordinal` smallint(4) NOT NULL DEFAULT 0,
  `reporttype` varchar(255) NOT NULL DEFAULT '',
  `reportid` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `#__pv_cf_cycles` 
(`id`,`number`, `name`, `display`,`published`,`created`) 
VALUES
(1,'1','Cycle 1','Sixth Tuesday Pre-Primary',1,@tnow),
(2,'2','Cycle 2','Second Friday Pre-Primary',1,@tnow),
(3,'3','Cycle 3','Thirty Day Post-Primary',1,@tnow),
(4,'4','Cycle 4','Sixth Tuesday Pre-General',1,@tnow),
(5,'5','Cycle 5','Second Friday Pre-General',1,@tnow),
(6,'6','Cycle 6','Thirty Day Post-General',1,@tnow),
(7,'7','Cycle 7','{YEAR} Annual Report',1,@tnow),
(8,'8','Cycle 1 Special','Special Second Friday Pre-Election',1,@tnow),
(9,'9','Cycle 2 Special','Special Thirty Day Post-Election',1,@tnow),
(10,'101','Cycle 101','Fourth Tuesday Pre-Primary',1,@tnow),
(11,'201','Cycle 201','Final Tuesday Pre-Primary',1,@tnow),
(12,'401','Cycle 401','Fourth Tuesday Pre-General',1,@tnow),
(13,'501','Cycle 501','Final Tuesday Pre-General',1,@tnow),
(14,'10a','24-Hour Pre-Primary - Contributions','24-Hour Pre-Primary - Contributions',1,@tnow),
(15,'10b','24-Hour Pre-Primary - Expenditures','24-Hour Pre-Primary - Expenditures',1,@tnow),
(16,'11a','24-Hour Pre-General - Contributions','24-Hour Pre-General - Contributions',1,@tnow),
(17,'11b','24-Hour Pre-General - Expenditures','24-Hour Pre-General - Expenditures',1,@tnow);

INSERT INTO `#__pv_cf_classes` 
(`id`,`number`,`name`,`display`,`published`,`created`) 
VALUES
(1,'01_mayor','Mayor','Mayor',1,@tnow),
(2,'02_city_commissioners','City Commissioners','City Commissioners',1,@tnow),
(3,'03_register_of_wills','Register of Wills','Register of Wills',1,@tnow),
(4,'04_sheriff','Sheriff','Sheriff',1,@tnow),
(5,'05_council_at_large','Council At-Large','Council At-Large',1,@tnow),
(6,'06_district_council','District Council','District Council',1,@tnow),
(7,'07_city_controller','City Controller','City Controller',1,@tnow),
(8,'08_dist_atty','District Attorney','District Attorney',1,@tnow),
(9,'09_governor','Governor','Governor',1,@tnow),
(10,'10_lt_governor','Lieutenant Governor','Lieutenant Governor',1,@tnow),
(11,'11_supreme_court','Supreme Court','Supreme Court',1,@tnow),
(12,'12_superior_court','Superior Court','Superior Court',1,@tnow),
(13,'13_commonwealth_court','Commonwealth Court','Commonwealth Court',1,@tnow),
(14,'14_common_pleas_court','Common Pleas Court','Common Pleas Court',1,@tnow),
(15,'15_municipal_court','Municipal Court','Municipal Court',1,@tnow),
(16,'16_state_senate','State Senate','State Senate',1,@tnow),
(17,'17_state_representative','State Rep','State Rep',1,@tnow),
(18,'18_us_congress','US Congress','US Congress',1,@tnow),
(19,'19_us_senate','US Senate','US Senate',1,@tnow),
(20,'20_judicial_retention','Judicial Retention','Judicial Retention',1,@tnow),
(21,'21_ward_and_party','Ward and Party','Ward and Party',1,@tnow),
(22,'22_political_action_committees','PACs and IEs','PACs and IEs',1,@tnow),
(23,'23_lobbyists','Lobbyist','Lobbyist',1,@tnow);




--
-- INSERT INTO `#__pv_cf_paper_maps` 
-- (`class_id`,`entity_id`,`display`,`committee`,`ordinal`,`year`,`typepath`,`published`,`created`) 
-- VALUES
--