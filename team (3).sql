/*
Navicat MySQL Data Transfer

Source Server         : 1
Source Server Version : 50171
Source Host           : 127.0.0.1:3306
Source Database       : team

Target Server Type    : MYSQL
Target Server Version : 50171
File Encoding         : 65001

Date: 2017-05-02 11:46:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `conf`
-- ----------------------------
DROP TABLE IF EXISTS `conf`;
CREATE TABLE `conf` (
  `re` int(11) DEFAULT '0' COMMENT '是否允许注册 1允许 0关闭',
  `reuptime` int(11) DEFAULT NULL,
  `sy` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `my` int(10) unsigned DEFAULT NULL,
  `dp` int(10) unsigned DEFAULT NULL,
  `tp` int(10) unsigned DEFAULT NULL,
  `yktp` int(10) unsigned DEFAULT '0',
  `nbtp` int(10) unsigned DEFAULT '0',
  `tplj` varchar(255) DEFAULT NULL,
  `ss` int(10) unsigned DEFAULT NULL,
  `ssh` int(11) DEFAULT NULL,
  `syyb` int(10) unsigned DEFAULT NULL,
  `syzb` int(10) unsigned DEFAULT NULL,
  `sykd` int(11) DEFAULT NULL,
  `sygd` int(11) DEFAULT NULL,
  `syxz` int(11) DEFAULT NULL,
  `syxzss` int(11) unsigned DEFAULT '0',
  `syys` varchar(255) DEFAULT NULL,
  `syxzssf` int(10) unsigned DEFAULT NULL,
  `qtdjs` int(10) unsigned DEFAULT NULL,
  `syybyingg` int(11) unsigned DEFAULT NULL,
  `syxzssdhsy` int(10) unsigned DEFAULT NULL,
  `imagethumb` varchar(255) DEFAULT NULL,
  `syyssiez` int(10) unsigned DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of conf
-- ----------------------------
INSERT INTO `conf` VALUES ('1', '148', '广西南宁共振广告有限公司', '25', '1', '1', '1', '0', '42ee5ac243ca09f4ce591419cc3b575a', '1489051708', '24', '30', '20', '500', '80', '0', '0', '#aaa', '1', '1', '20', '1', 'logo3.png', '36');

-- ----------------------------
-- Table structure for `dp`
-- ----------------------------
DROP TABLE IF EXISTS `dp`;
CREATE TABLE `dp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `puid` int(10) unsigned DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pid` int(10) unsigned DEFAULT NULL,
  `ip` int(10) unsigned DEFAULT NULL,
  `ctime` int(10) unsigned DEFAULT NULL,
  `satus` int(10) unsigned DEFAULT '0',
  `dtime` int(10) unsigned DEFAULT NULL,
  `mtime` int(10) unsigned DEFAULT NULL,
  `dday` int(10) unsigned DEFAULT NULL,
  `zt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dp
-- ----------------------------

-- ----------------------------
-- Table structure for `fm`
-- ----------------------------
DROP TABLE IF EXISTS `fm`;
CREATE TABLE `fm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dtime` int(10) unsigned DEFAULT NULL,
  `mtime` int(10) unsigned DEFAULT NULL,
  `ctime` int(10) unsigned DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `zt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bz` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dday` int(10) unsigned DEFAULT NULL,
  `bumen` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fm
-- ----------------------------
INSERT INTO `fm` VALUES ('50', '2017', '3', '1490079620', '88ad9c09616de7e2715751df37ede568', '44', '春茶', '自由发挥', '21', '2');
INSERT INTO `fm` VALUES ('51', '2017', '3', '1490232878', 'ede17c547ff46394c72d86ea36fa67f0', '53', '春茶', '自由发挥', '23', '1');
INSERT INTO `fm` VALUES ('52', '2017', '3', '1490232895', '86ce0b52f987156519ac0beb67961ef6', '53', '春茶', '自由发挥', '23', '1');
INSERT INTO `fm` VALUES ('53', '2017', '3', '1490253251', '3af57b8f16bc66348e3b2826d347bc65', '43', '春茶', '自由发挥', '23', '2');
INSERT INTO `fm` VALUES ('54', '2017', '3', '1490258378', '76f44dbd32246a1cdb704fc34c1543bb', '53', '春茶', '自由发挥', '23', '1');
INSERT INTO `fm` VALUES ('55', '2017', '3', '1490258894', 'fa3eaebbe08f9fe34bdf3ee2be66ec74', '53', '春茶', '自由发挥', '23', '1');
INSERT INTO `fm` VALUES ('56', '2017', '4', '1492411421', '600976e3ff73a38610c15e562f11d118', '53', '4月主题设计：春茶', '自由发挥', '17', '1');
INSERT INTO `fm` VALUES ('57', '2017', '4', '1492680782', 'e7c24d206b53e066567d2759de63e691', '43', '4月主题设计：春茶', '自由发挥', '20', '2');
INSERT INTO `fm` VALUES ('58', '2017', '4', '1493023613', '58bfbc05369d1cf7c8a11cb86d4ad1a4', '48', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('59', '2017', '4', '1493024457', '0d8a8c4c02486b6aad3eda2f09664df9', '41', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('60', '2017', '4', '1493024460', '42dcfd23becf5df06fdeeb64a6783add', '48', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('61', '2017', '4', '1493024577', 'c9d01b4287559020f4ee91a86213b7e4', '48', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('62', '2017', '4', '1493030048', '3df9def3504b976773b402c8f0d09984', '55', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('63', '2017', '4', '1493030082', '834b7555919c1f73442ac6e9ce35ed37', '55', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('64', '2017', '4', '1493030553', '108c7a6a9d2f0376c22ae67f897a50e7', '54', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('65', '2017', '4', '1493037981', '62c9799742627c4c9a6b9e817c72fda0', '56', '4月主题设计：春茶', '自由发挥', '24', '1');
INSERT INTO `fm` VALUES ('66', '2017', '4', '1493040292', '95da7afec8444af87075309db612027c', '46', '4月主题设计：春茶', '自由发挥', '24', '1');

-- ----------------------------
-- Table structure for `p`
-- ----------------------------
DROP TABLE IF EXISTS `p`;
CREATE TABLE `p` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tp` int(11) unsigned DEFAULT '0',
  `dp` int(10) unsigned DEFAULT '0',
  `ctime` int(10) unsigned DEFAULT NULL,
  `dtime` int(10) unsigned DEFAULT NULL COMMENT '年',
  `mtime` int(11) DEFAULT NULL COMMENT '月',
  `dday` int(10) unsigned DEFAULT NULL COMMENT '天',
  `zt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sm` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bz` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bumen` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of p
-- ----------------------------
INSERT INTO `p` VALUES ('156', '53', 'b05da8d2119c24fb3ddf396f449f5c94', '1', '0', '1490232853', '2017', '3', '23', '春茶', '春茶logo', '自由发挥', '1');
INSERT INTO `p` VALUES ('157', '43', '5ca49028f8aec658a2941e092738126f', '0', '0', '1490253239', '2017', '3', '23', '春茶', '美亚传媒', '自由发挥', '2');
INSERT INTO `p` VALUES ('158', '40', 'ed3bc50e4e2cdad20c3dbc0f05731fd3', '0', '0', '1490255258', '2017', '3', '23', '春茶', '测试水印', '自由发挥', '6');
INSERT INTO `p` VALUES ('159', '53', 'fa9181bbf41c764157b1c676f8dd0ef7', '0', '0', '1490258405', '2017', '3', '23', '春茶', '', '自由发挥', '1');
INSERT INTO `p` VALUES ('160', '53', '4aa711e0da4ec87f1a3f7a9e5dee47c7', '0', '0', '1490258447', '2017', '3', '23', '春茶', '', '自由发挥', '1');
INSERT INTO `p` VALUES ('161', '53', 'c79481e654119a5afeb70dc4dd70b42c', '0', '0', '1490258547', '2017', '3', '23', '春茶', '一片绿意春盎然 好茶揭盖香飘逸', '自由发挥', '1');
INSERT INTO `p` VALUES ('162', '44', 'f0c6dc14368a5663ac15f293b03c90d3', '1', '0', '1490357426', '2017', '3', '24', '春茶', '美亚传媒', '自由发挥', '2');
INSERT INTO `p` VALUES ('163', '53', '45d0953abb4a4a4032b4eb7f2edd8247', '0', '0', '1492411447', '2017', '4', '17', '4月主题设计：春茶', '', '自由发挥', '1');
INSERT INTO `p` VALUES ('164', '43', '025b13695a799a2d2d66cb60adad515e', '2', '0', '1492680819', '2017', '4', '20', '4月主题设计：春茶', '美亚传媒（四月份）', '自由发挥', '2');
INSERT INTO `p` VALUES ('165', '48', '92abecbc35059d6cb10216f5df2218c3', '4', '0', '1493023630', '2017', '4', '24', '4月主题设计：春茶', '', '自由发挥', '1');
INSERT INTO `p` VALUES ('166', '41', '02af0163db0cf2eabbc8ac82a5edb017', '0', '0', '1493026298', '2017', '4', '24', '4月主题设计：春茶', '', '自由发挥', '1');
INSERT INTO `p` VALUES ('167', '41', 'e94e2f5a7db4053e8745c397abec74f9', '0', '0', '1493026925', '2017', '4', '24', '4月主题设计：春茶', '整体LOGO以“春”字的造型，想到春天就会想到春游去山间小路感受最自然的空气，所以用山丘代表春天。用茶壶代表茶，一方面茶壶是茶的载体，另一方面也是为了突出品牌特征及定位，整体结合景物与实物的组合创意表现，简洁明了的表达了春茶的文字内涵更融入了中国特色的画面，赋予品牌更多的文化内涵与气质。', '自由发挥', '1');
INSERT INTO `p` VALUES ('168', '41', '4ab0210f138f5fe8ba8b469c1cdae42f', '1', '0', '1493027086', '2017', '4', '24', '4月主题设计：春茶', '整体LOGO以“春”字为造型，想到春天就会想到春游去山间小路感受最自然的空气，所以用山丘代表春天。用茶壶代表茶，一方面茶壶是茶的载体，另一方面也是为了突出品牌特征及定位，整体结合景物与实物的组合创意表现，简洁明了的表达了春茶的文字内涵更融入了中国特色的画面，赋予品牌更多的文化内涵与气质。', '自由发挥', '1');
INSERT INTO `p` VALUES ('169', '55', '7b8ac3252ace2cb6fa8d9eb1eab80dbc', '1', '0', '1493029796', '2017', '4', '24', '4月主题设计：春茶', 'LOGO的主体是由“春茶”字体变形和一片茶叶组合而成的一个干净、简洁的标志。“茶”字底下的三撇就像一把火，在煮水时冒出的水蒸汽；中间的一片叶子则是被水浸润之后舒展的茶叶。整个LOGO以茶绿色为主色调，体现一种安逸祥和之感，突显茶这一主题。', '自由发挥', '1');
INSERT INTO `p` VALUES ('170', '54', '973cfcd30829a0dbe0b31a841d315a39', '1', '0', '1493030477', '2017', '4', '24', '4月主题设计：春茶', '', '自由发挥', '1');
INSERT INTO `p` VALUES ('171', '56', '50b86dad1b8aee5bb168acc43b0e1ca8', '1', '0', '1493038071', '2017', '4', '24', '4月主题设计：春茶', '春茶LOGO', '自由发挥', '1');
INSERT INTO `p` VALUES ('172', '46', 'fd5624eb51ece356685d2be0e7d9c84b', '3', '0', '1493040750', '2017', '4', '24', '4月主题设计：春茶', '春茶logo', '自由发挥', '1');
INSERT INTO `p` VALUES ('173', '21', 'b2075f3eba9c1636d9bf8eee84025021', '0', '0', '1493691873', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('174', '21', 'b18538236836cf24080b049cefb65b7d', '0', '0', '1493691904', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('175', '21', 'c58109ba8a1e549a372ccbc651dfe645', '0', '0', '1493692147', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('176', '21', '916886367b770fd5440da6cb2fdf6994', '0', '0', '1493692182', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('177', '21', '918e0880b2e9ed0281ea77704c7c38ae', '0', '0', '1493692214', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('178', '21', '23b0adf5d3e20173265bfdf5baa55b35', '0', '0', '1493692305', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('179', '21', '269760e04808a6438235cf4b20237e12', '0', '0', '1493692354', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('180', '21', '433904ee842c1e00db6e93aee5e42edf', '0', '0', '1493692395', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('181', '21', 'c7ae0e022932988f6171db92edb09a53', '0', '0', '1493692460', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('182', '21', '5735a7174e5ef2a66f6444c20f6a8c18', '0', '0', '1493692510', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('183', '21', '29c29f695b9c6f7cdf93226ce1e865d9', '0', '0', '1493692538', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('184', '21', '52bc86e7fbf56e1167b07ab741aceb25', '0', '0', '1493692572', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('185', '21', 'f1514205fd9fc0b456e7fece2f8b0e61', '0', '0', '1493692611', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('186', '21', '4f5d860e054615a653aef3cbe78c84ab', '0', '0', '1493692693', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('187', '21', 'fc2ff957881e96c4dd6f6d27dcca3a8c', '0', '0', '1493692706', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('188', '21', 'beaf8fdfb4932a63156a2d5ea11e68cc', '0', '0', '1493692783', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('189', '21', '8a5985bbc7ef33127adee414c075e43b', '0', '0', '1493692836', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('190', '21', '580cce22bb036426719d572a601f11b4', '0', '0', '1493692874', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('191', '21', '52a36a3c7ae91911dc3b37fe206cbfe4', '0', '0', '1493692892', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('192', '21', 'c4b13cafcf1f0201069401408ce0003f', '0', '0', '1493692932', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('193', '21', 'c5dc37c73f86598fe75fb6faae61aa49', '0', '0', '1493693359', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('194', '21', '2d223b0fd1f5c87e9005e133d8d4c88e', '0', '0', '1493693380', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('195', '21', '353f6255505fb06326e78e8496d0f892', '0', '0', '1493693398', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('196', '21', 'fb8c5d739de81d71badef0275eed5730', '0', '0', '1493693426', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('197', '21', 'a57ce12454a5cc103bab3d02c0ca43ed', '0', '0', '1493694216', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('198', '21', 'be622769ff1deb7851449590bbd013b7', '0', '0', '1493694374', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('199', '21', 'b20285b25505ca2da2ec4cf62593220d', '0', '0', '1493695305', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('200', '21', '169bfb34eb8d29c263d5d96468e03e2c', '0', '0', '1493695379', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('201', '21', '1675c38fde2cafeee53212fb504e7d5d', '0', '0', '1493695469', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('202', '21', '2e2dd1ae300f1f51be3d794fea54b94f', '0', '0', '1493695558', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('203', '21', 'a4fcc544d9c04238167e4da7204fc0ee', '0', '0', '1493695619', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('204', '21', '551b1c40ccf67e251fe0a9958e1e7f08', '0', '0', '1493695638', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('205', '21', 'd3653ea0bb5e20eb078233b9a8748e63', '0', '0', '1493695654', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('206', '21', '58e059dd45115f3e859d6a905248dfba', '0', '0', '1493695680', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('207', '21', 'ef82412613a689cef7844010918dc429', '0', '0', '1493695901', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('208', '21', 'e14b213fed781cca665498110e113e75', '0', '0', '1493695927', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('209', '21', '9656086a5a0589ff736c74ac8b2b6dda', '0', '0', '1493696088', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('210', '21', '854a174d4963b37511b73bc9db0a3fd4', '0', '0', '1493696382', '2017', '5', '2', null, '', null, '5');
INSERT INTO `p` VALUES ('211', '21', 'f9ea9cf32e62e12ef42899dec66dde6b', '0', '0', '1493696434', '2017', '5', '2', null, '', null, '5');

-- ----------------------------
-- Table structure for `tp`
-- ----------------------------
DROP TABLE IF EXISTS `tp`;
CREATE TABLE `tp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` int(10) unsigned DEFAULT NULL,
  `num` int(10) unsigned DEFAULT NULL,
  `puid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `dtime` int(10) unsigned DEFAULT NULL,
  `mtime` int(10) unsigned DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `dday` int(10) unsigned DEFAULT NULL,
  `zt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tuid` int(10) unsigned DEFAULT NULL,
  `bumen` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tp
-- ----------------------------
INSERT INTO `tp` VALUES ('69', '976998004', '1', '53', '156', '2017', '3', '1490255393', '23', '春茶', '21', '1');
INSERT INTO `tp` VALUES ('70', '976998004', '1', '44', '162', '2017', '3', '1490665581', '28', '春茶', '44', '2');
INSERT INTO `tp` VALUES ('71', '976997287', '1', '46', '172', '2017', '4', '1493169355', '26', '4月主题设计：春茶', '21', '1');
INSERT INTO `tp` VALUES ('72', '976997287', '1', '43', '164', '2017', '4', '1493169368', '26', '4月主题设计：春茶', '21', '2');
INSERT INTO `tp` VALUES ('73', '976997534', '1', '55', '169', '2017', '4', '1493343655', '28', '4月主题设计：春茶', '55', '1');
INSERT INTO `tp` VALUES ('74', '976997534', '1', '41', '168', '2017', '4', '1493344168', '28', '4月主题设计：春茶', '37', '1');
INSERT INTO `tp` VALUES ('75', '976997534', '1', '43', '164', '2017', '4', '1493344196', '28', '4月主题设计：春茶', '37', '2');
INSERT INTO `tp` VALUES ('76', '976997534', '1', '54', '170', '2017', '4', '1493345099', '28', '4月主题设计：春茶', '56', '1');
INSERT INTO `tp` VALUES ('77', '976997287', '1', '48', '165', '2017', '4', '1493353849', '28', '4月主题设计：春茶', '40', '1');
INSERT INTO `tp` VALUES ('78', '976997534', '1', '48', '165', '2017', '4', '1493354498', '28', '4月主题设计：春茶', '59', '1');
INSERT INTO `tp` VALUES ('79', '976997534', '1', '48', '165', '2017', '4', '1493359232', '28', '4月主题设计：春茶', '60', '1');
INSERT INTO `tp` VALUES ('80', '976997287', '1', '56', '171', '2017', '4', '1493359249', '28', '4月主题设计：春茶', '57', '1');
INSERT INTO `tp` VALUES ('81', '976997287', '1', '46', '172', '2017', '4', '1493359314', '28', '4月主题设计：春茶', '62', '1');
INSERT INTO `tp` VALUES ('82', '976997534', '1', '46', '172', '2017', '4', '1493366152', '28', '4月主题设计：春茶', '46', '1');
INSERT INTO `tp` VALUES ('83', '976997534', '1', '48', '165', '2017', '4', '1493366198', '28', '4月主题设计：春茶', '48', '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `slat` varchar(255) DEFAULT NULL,
  `loginslat` varchar(255) DEFAULT NULL,
  `satus` int(10) unsigned DEFAULT '0' COMMENT '1禁用',
  `admim` int(10) unsigned DEFAULT '0' COMMENT '1 管理员',
  `ctime` int(10) unsigned DEFAULT NULL,
  `bumen` varchar(255) DEFAULT NULL,
  `qquid` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`qquid`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('55', '梁少浪', '826ca65f674b9ff36d50d7add512dc15', '416351', '168d2f442d0d5d14519b0155fe4b7863', '1', '0', '1492400239', '1', '0');
INSERT INTO `user` VALUES ('54', '黄永婷', '22fa6dcc3f3c0136b15b085bf2ea5e34', '395724', 'eae12bfc51d67649cd008b8f03bdd002', '0', '0', '1488868153', '1', '0');
INSERT INTO `user` VALUES ('21', '李振球', '9b0142aaa2ac59639f86acde5806816d', '987887', '1982030755a71029102df3d1a9959354', '1', '1', '1488182484', '5', '0');
INSERT INTO `user` VALUES ('43', '温杏媚', 'c2b5d20b7d56d75be7791493590bfccb', '338540', '416bde199e70f05e4868f803a602383e', '1', '0', '1488783992', '2', '0');
INSERT INTO `user` VALUES ('44', '黄怡洁', 'd802585473fcc0ecc6f88088c00df089', '600207', '5254135a99aaa6a558f7c7dbf09fcf10', '0', '0', '1488784115', '2', 'BF7E6FA26C51CD18A997E70C233A6D6C');
INSERT INTO `user` VALUES ('45', '陈兰', '3655b9a7549e35079050724da618251f', '325521', '921a943ba4a88f8b36ac000485f32fd1', '1', '0', '1488784463', '6', '0');
INSERT INTO `user` VALUES ('46', '周士入', 'e4ee50ddf2331ea842e25a9ad2170215', '534976', '92edc114d48b1a7b36512e356938be65', '1', '0', '1488859705', '1', '0');
INSERT INTO `user` VALUES ('47', '黎妍君', '423bb81051fbd7c6e128218259051f64', '296517', '576678f725d5437304d4c37bda8e134a', '0', '0', '1488859734', '1', '1216040E98A40164AB598D0C4833263F');
INSERT INTO `user` VALUES ('48', '江淑莹', '7fe6a38dd241e1197c937d238bd8f755', '526544', 'acd03f1bc8b905d9d565af54da29229a', '1', '0', '1488859750', '1', '0');
INSERT INTO `user` VALUES ('51', '共振设计——哒哒的马蹄声', '87b69d96acd1390f06c241d8baa9b24a', '258422', null, '0', '0', '1488867384', '0', '0');
INSERT INTO `user` VALUES ('52', '苏新达', '701a952dca9fea92de7503ae0dd2a833', '120462', '6ec1d9455cee39656e266850448440f5', '0', '0', '1488867589', '1', '0');
INSERT INTO `user` VALUES ('53', '周鸿涵', 'd8945483ec72c077725842a684a836b4', '558596', 'cd49c524952d9765e4d119d71806771f', '1', '0', '1488867861', '1', '0');
INSERT INTO `user` VALUES ('37', '莫伟琳', 'b06a2c27cffd29876080e37e3466b99b', '379409', 'f7a4fc1b53ebdb044d698c5863733c18', '1', '1', '1488611844', '4', 'C5EC172FD34981C6AC9BDDC8B7EC16F6');
INSERT INTO `user` VALUES ('38', 'gongzhen', 'f856862e9581d9e367f9efa4cea34ebe', '682989', '4f5cebc6e61c6ca2a0ade7732717f3d7', '1', '1', '1488612997', '4', '5F34BF1C74DFFD4D3EECC941CAB9BE1F');
INSERT INTO `user` VALUES ('42', '王蓉', '1e4b37b26d3db2e79492be07a63011f2', '837951', 'f18215b7ecdf90944ac5d3696943e87a', '1', '0', '1488783946', '3', '0');
INSERT INTO `user` VALUES ('40', '共振梁峻华', 'c38c480412baaca5fbf1c905c39460b9', '778048', 'aa4387091c045279cd84e4fb8f80fb89', '1', '1', '1488615842', '6', '0');
INSERT INTO `user` VALUES ('41', '邓庆', 'f7c7e6e5fba0c95ec98a3a460f1b5eb4', '924661', '635014fc4d91e074625c0454795fe84f', '1', '0', '1488783902', '1', '0');
INSERT INTO `user` VALUES ('56', '共振设计-丘岳耀', '750cd02c11423b830f32b42db26f7284', '328625', 'b7bb8c24376810993df8aa1f429f219c', '1', '0', '1492400291', '1', '0');
INSERT INTO `user` VALUES ('57', 'ltm', 'bda21829815283b3538c25b08211c0af', '712240', 'a27d52120d58f361659db31b2eb3f746', '1', '0', '1493344698', '5', 'C123412B0FB71A411B3765CD77134EF2');
INSERT INTO `user` VALUES ('58', '吴卓君', '83cc3697315f1fbf0b2722c72647a3c5', '623443', null, '1', '0', '1493344725', '6', '0');
INSERT INTO `user` VALUES ('59', 'song.', '0e93287f738de6794f8b65ea7e294824', '179760', 'af80e754f8197b2bbbf8d9aa4eed2e7e', '1', '0', '1493345036', '4', '0');
INSERT INTO `user` VALUES ('60', '1751859192@qq.com', '49432e6c79295fd0c6cadee7c8eebc94', '562606', 'fa6f905c88c04820f9a3d2d614df77a3', '1', '0', '1493345298', '1', '5AB800BB3E283511EFADC11CB8FF58DC');
INSERT INTO `user` VALUES ('61', '共振策划黄棱喜', '253e6ba30df15e62ff3cbbad9b66409a', '627975', '47e15205083063ddc30e13dff74edd06', '1', '0', '1493345318', '6', '0');
INSERT INTO `user` VALUES ('62', '18776040512', '0f28e2e6d25a50c490786853d7fc0e0e', '944711', '96aca2d3495a54eb28bc1db4ae0ad7b1', '1', '0', '1493345450', '5', '0');
INSERT INTO `user` VALUES ('63', 'lovekoki', '6c958d133ad01a17d6b38fce91ca6d7b', '257406', null, '1', '0', '1493347122', '0', '0');

-- ----------------------------
-- Table structure for `zt`
-- ----------------------------
DROP TABLE IF EXISTS `zt`;
CREATE TABLE `zt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bz` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ctime` int(10) unsigned DEFAULT NULL,
  `dtime` int(10) unsigned DEFAULT NULL,
  `mtime` int(10) unsigned DEFAULT NULL,
  `dday` int(10) unsigned DEFAULT NULL,
  `wybz` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `wybt` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of zt
-- ----------------------------
INSERT INTO `zt` VALUES ('12', '春茶', '自由发挥', '1489372789', '2017', '3', '13', '自由发挥', '春茶');
INSERT INTO `zt` VALUES ('13', '4月主题设计：春茶', '4月主题设计：春茶', '1492400358', '2017', '4', '17', '4月主题设计：春茶', '4月主题设计：春茶');
INSERT INTO `zt` VALUES ('14', '4月主题设计：春茶', '自由发挥', '1492400777', '2017', '4', '17', '自由发挥', '4月主题设计：春茶');
