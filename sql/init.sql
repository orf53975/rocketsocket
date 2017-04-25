CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passwd` varchar(16) NOT NULL,
  `t` int(11) NOT NULL DEFAULT '0',
  `u` bigint(20) NOT NULL,
  `d` bigint(20) NOT NULL,
  `transfer_enable` bigint(20) NOT NULL,
  `port` int(5) NOT NULL,
  `protocol` varchar(128) NOT NULL DEFAULT 'origin',
  `obfs` varchar(128) NOT NULL DEFAULT 'plain',
  `switch` tinyint(1) NOT NULL DEFAULT '1',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `method` varchar(64) NOT NULL DEFAULT 'chacha20',
  `service_id` int(10) unsigned NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `service_id` (`service_id`),
  UNIQUE KEY `port` (`port`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `recycle_bin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `port` int(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
