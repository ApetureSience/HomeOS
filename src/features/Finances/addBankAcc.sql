CREATE TABLE IF NOT EXISTS `###NAME###` (
  `date/time` datetime NOT NULL,
  `category` varchar(64) COLLATE utf16_bin NOT NULL,
  `title` varchar(64) COLLATE utf16_bin DEFAULT NULL,
  `value` float(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;