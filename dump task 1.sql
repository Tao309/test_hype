SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Новости');
INSERT INTO `category` VALUES ('2', 'Продажи');
INSERT INTO `category` VALUES ('3', 'Фрукты');
INSERT INTO `category` VALUES ('4', 'Медицина');

-- ----------------------------
-- Table structure for `link_category_post`
-- ----------------------------
DROP TABLE IF EXISTS `link_category_post`;
CREATE TABLE `link_category_post` (
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  KEY `index_cat` (`category_id`),
  KEY `index_post` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of link_category_post
-- ----------------------------
INSERT INTO `link_category_post` VALUES ('1', '1');
INSERT INTO `link_category_post` VALUES ('1', '2');
INSERT INTO `link_category_post` VALUES ('1', '3');
INSERT INTO `link_category_post` VALUES ('2', '4');
INSERT INTO `link_category_post` VALUES ('2', '5');
INSERT INTO `link_category_post` VALUES ('3', '6');
INSERT INTO `link_category_post` VALUES ('3', '7');
INSERT INTO `link_category_post` VALUES ('3', '8');
INSERT INTO `link_category_post` VALUES ('3', '9');
INSERT INTO `link_category_post` VALUES ('4', '10');
INSERT INTO `link_category_post` VALUES ('4', '11');
INSERT INTO `link_category_post` VALUES ('4', '12');

-- ----------------------------
-- Table structure for `link_likes`
-- ----------------------------
DROP TABLE IF EXISTS `link_likes`;
CREATE TABLE `link_likes` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `index_post` (`post_id`),
  KEY `index_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of link_likes
-- ----------------------------
INSERT INTO `link_likes` VALUES ('12', '1');
INSERT INTO `link_likes` VALUES ('11', '2');
INSERT INTO `link_likes` VALUES ('9', '4');
INSERT INTO `link_likes` VALUES ('12', '4');

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES ('1', 'На луне нашли большой камень');
INSERT INTO `post` VALUES ('2', 'Информация про погоду на завтра');
INSERT INTO `post` VALUES ('3', 'Список интересных фильмов');
INSERT INTO `post` VALUES ('4', 'Продажа авто в Томске');
INSERT INTO `post` VALUES ('5', 'Список необходимых зап. частей при покупке авто');
INSERT INTO `post` VALUES ('6', 'Зелёные яблоки');
INSERT INTO `post` VALUES ('7', 'Красные яблоки');
INSERT INTO `post` VALUES ('8', 'Бананы');
INSERT INTO `post` VALUES ('9', 'Мандарины');
INSERT INTO `post` VALUES ('10', 'Нервная система');
INSERT INTO `post` VALUES ('11', 'Костно-мышешчная система');
INSERT INTO `post` VALUES ('12', 'Прочие препараты');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Admin');
INSERT INTO `user` VALUES ('2', 'User');
INSERT INTO `user` VALUES ('3', 'Publisher');
INSERT INTO `user` VALUES ('4', 'Moderator');
