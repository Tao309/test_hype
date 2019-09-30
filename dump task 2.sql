SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `email` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'User 1', '0', 'email1@mail.ru,email2@mail.ru,email3@mail.ru,email4@mail.ru');
INSERT INTO `users` VALUES ('2', 'User 2', '1', 'email3@mail.ru,email4@mail.ru');
INSERT INTO `users` VALUES ('3', 'User 3', '0', 'email1@mail.ru,email3@mail.ru,email4@mail.ru');
INSERT INTO `users` VALUES ('4', 'User 4', '1', 'email2@mail.ru,email4@mail.ru');
INSERT INTO `users` VALUES ('5', 'User 5', '0', 'email2@mail.ru,email3@mail.ru,email1@mail.ru');
INSERT INTO `users` VALUES ('6', 'User 6', '0', '');
