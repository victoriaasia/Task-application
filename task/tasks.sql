
CREATE DATABASE `task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `users` (
  `id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `email` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  `username` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);


CREATE TABLE `type` (
  `id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` char(20) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `tasks` (
  `id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `task` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL ON UPDATE current_timestamp,
  `id_user` TINYINT(3) UNSIGNED NOT NULL,
  `id_type` TINYINT(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK1` (`id_user`),
  FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  INDEX `FK2` (`id_type`),
  FOREIGN KEY (`id_type`) REFERENCES `type`(`id`)
);


CREATE TABLE `connect` (
  `id_user` TINYINT(3) UNSIGNED,
  `session` CHAR(32) NOT NULL,
  `token` CHAR(32) NOT NULL,
  PRIMARY KEY (`session`),
  INDEX `FK1` (`id_user`),
  FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE
);


INSERT INTO `tasks` (`id`, `task`, `status`, `created_at`, `id_user`, `id_type`) VALUES
(4, 'Привет', 0, NOW(), 1, 1),
(3, 'здесь ты можешь', 0, NOW(), 1, 2),
(2, 'записывать важные дела', 0, NOW(), 1, 1),
(1, 'которые предстоит совершить', 0, NOW(), 1, 1);


INSERT INTO `type` (`id`, `value`) VALUES
(1, 'учеба'),
(2, 'работа'),
(3, 'цели'),
(4, 'другое');
