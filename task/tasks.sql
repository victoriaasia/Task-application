
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

CREATE TABLE `tasks` (
  `id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `task` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `id_user` TINYINT(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK1` (`id_user`),
  FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

INSERT INTO `tasks` (`id`, `task`, `status`, `created_at`, `id_user`) VALUES
(4, 'Привет', 0, 1390815970, 1),
(3, 'здесь ты можешь', 0, 1390815993, 1),
(2, 'записывать важные дела', 0, 1390817659, 1),
(1, 'которые предстоит совершить', 0, 1390818389, 1);

CREATE TABLE `connect` (
  `id_user` TINYINT(3) UNSIGNED,
  `session` CHAR(32) NOT NULL,
  `token` CHAR(32) NOT NULL,
  PRIMARY KEY (`session`),
  INDEX `FK1` (`id_user`),
  FOREIGN KEY (`id_user`) REFERENCES `users`(`id`) ON DELETE CASCADE
);









-- CREATE TABLE `users` (
-- `id` int(11) NOT NULL auto_increment,
-- `full_name` varchar(32) collate utf8_unicode_ci NOT NULL default '',
-- `email` varchar(32) collate utf8_unicode_ci NOT NULL default '',
-- `username` varchar(20) collate utf8_unicode_ci NOT NULL default '',
-- `password` varchar(32) collate utf8_unicode_ci NOT NULL default '',
-- PRIMARY KEY  (`id`),
-- UNIQUE KEY `username` (`username`)
-- ) ENGINE=MyISAM;
--
-- CREATE TABLE `tasks` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `task` varchar(200) NOT NULL,
--   `status` int(11) NOT NULL,
--   `created_at` int(11) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB;
