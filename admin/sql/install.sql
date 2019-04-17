
/* ==================== constants ==================== */
SET @tnow = NOW();
SET @tnl  = '0000-00-00 00:00:00';
SET @tns  = '0000-00-00';
SET @db   = DATABASE();

/* ==================== tables ==================== */

CREATE TABLE IF NOT EXISTS `#__pv_cf_reports` (
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
  `class` varchar(255) NOT NULL DEFAULT '',
  `entity` varchar(255) NOT NULL DEFAULT '',
  `display` varchar(255) NOT NULL DEFAULT '',
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
  `class` varchar(255) NOT NULL DEFAULT '',
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

INSERT INTO `#__pv_cf_cycles` VALUES
('','1','Sixth Tuesday Pre-Primary','Sixth Tuesday Pre-Primary',1,,,@tnl,@tnl),
('','2','Second Friday Pre-Primary','Second Friday Pre-Primary',1,,,@tnl,@tnl),
('','3','Thirty Day Post-Primary','Thirty Day Post-Primary',1,,,@tnl,@tnl),
('','4','Sixth Tuesday Pre-General','Sixth Tuesday Pre-General',1,,,@tnl,@tnl),
('','5','Second Friday Pre-General','Second Friday Pre-General',1,,,@tnl,@tnl),
('','6','Thirty Day Post-General','Thirty Day Post-General',1,,,@tnl,@tnl),
('','7','Annual Report','{YEAR} Annual Report',1,,,@tnl,@tnl),
('','8','Special Second Friday Pre-Election','Special Second Friday Pre-Election',1,,,@tnl,@tnl),
('','9','Special Thirty Day Post-Election','Special Thirty Day Post-Election',1,,,@tnl,@tnl),
('','101','Fourth Tuesday Pre-Primary','Fourth Tuesday Pre-Primary',1,,,@tnl,@tnl),
('','201','Final Tuesday Pre-Primary','Final Tuesday Pre-Primary',1,,,@tnl,@tnl),
('','401','Fourth Tuesday Pre-General','Fourth Tuesday Pre-General',1,,,@tnl,@tnl),
('','501','Final Tuesday Pre-General','Final Tuesday Pre-General',1,,,@tnl,@tnl),
('','10a','24-Hour Pre-Primary - Contributions','24-Hour Pre-Primary - Contributions',1,,,@tnl,@tnl),
('','10b','24-Hour Pre-Primary - Expenditures','24-Hour Pre-Primary - Expenditures',1,,,@tnl,@tnl),
('','11a','24-Hour Pre-General - Contributions','24-Hour Pre-General - Contributions',1,,,@tnl,@tnl),
('','11b','24-Hour Pre-General - Expenditures','24-Hour Pre-General - Expenditures',1,,,@tnl,@tnl);