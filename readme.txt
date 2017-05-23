CREATE TABLE IF NOT EXISTS `bloggers` (
  `blogger_id` int(11) NOT NULL,
  `username` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(999) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL,
  `post` text COLLATE utf8_unicode_ci,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `word_count` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;