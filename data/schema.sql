CREATE TABLE `videos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `video_media_id` int(11) unsigned NOT NULL,
  `order` int(11) unsigned NOT NULL,
  `title` varchar(250) DEFAULT '',
  `directors` varchar(250) DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT '0',
  `published` date DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `is_published` (`is_published`),
  KEY `published` (`published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
