
/* ==================== constants ==================== */
SET @tnow = NOW();
SET @tnl  = '0000-00-00 00:00:00';
SET @tns  = '0000-00-00';
SET @db   = DATABASE();

/* ==================== tables ==================== */

CREATE TABLE IF NOT EXISTS `jos_pv_cf_reports` (
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

CREATE TABLE IF NOT EXISTS `jos_pv_cf_online_maps` (
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

CREATE TABLE IF NOT EXISTS `jos_pv_cf_paper_maps` (
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

CREATE TABLE IF NOT EXISTS `jos_pv_cf_cycles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `checked_out` int(10) unsigned NOT NULL DEFAULT 0,
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

