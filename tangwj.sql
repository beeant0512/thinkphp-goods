/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50629
Source Host           : localhost:3306
Source Database       : tangwj

Target Server Type    : MYSQL
Target Server Version : 50629
File Encoding         : 65001

Date: 2016-03-20 22:40:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for share_goods
-- ----------------------------
DROP TABLE IF EXISTS `share_goods`;
CREATE TABLE `share_goods` (
  `goods_id` varchar(36) NOT NULL COMMENT '主键',
  `goods_name` varchar(100) NOT NULL COMMENT '商品名称',
  `goods_price` decimal(8,3) NOT NULL COMMENT '商品价格',
  `goods_stock` int(8) NOT NULL COMMENT '库存',
  `goods_image` varchar(50) NOT NULL COMMENT '缩略图片',
  `goods_type_id` varchar(36) NOT NULL COMMENT '商品类别',
  `goods_effects` varchar(255) DEFAULT NULL COMMENT '功效',
  `goods_fit_skin` varchar(50) DEFAULT NULL COMMENT '适用肤质',
  `goods_net_weight` varchar(10) NOT NULL COMMENT '净含量',
  `goods_home_id` char(36) NOT NULL COMMENT '产地',
  `goods_brand_id` varchar(36) NOT NULL COMMENT '品牌',
  `goods_expiration_date` int(3) NOT NULL DEFAULT '3' COMMENT '保质期（年）',
  `goods_description` longtext COMMENT '商品描述',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否删除',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品';

-- ----------------------------
-- Records of share_goods
-- ----------------------------
INSERT INTO `share_goods` VALUES ('1', '1', '1.000', '10', '', '1', null, null, '100ml', '1', '1', '4', null, '2016-03-19 14:45:18', '\0');
INSERT INTO `share_goods` VALUES ('2', '2', '2.000', '20', '', '2', null, null, '500ml', '2', '2', '3', null, '2016-03-19 14:45:17', '\0');
INSERT INTO `share_goods` VALUES ('goods_109317e7-2186-b888-4b57-31e2e6', '新增吗', '1.000', '111', '', '1', '1', '1', '1', '1', '1', '1', '1', '0000-00-00 00:00:00', '\0');
INSERT INTO `share_goods` VALUES ('goods_1481f401-8dac-8d07-9c7d-01c47f', '1', '1.000', '1', '', '1', null, '1', '', '1', '1', '1', null, '2016-03-19 18:24:48', '\0');
INSERT INTO `share_goods` VALUES ('goods_1c09ce09-5db7-a9eb-c40e-1a3d84', '12345678901', '1.000', '1', '', '1', '1', '1', '1', '1', '1', '123', '1', '2016-03-20 12:07:09', '\0');
INSERT INTO `share_goods` VALUES ('goods_3e413784-6717-2941-1ac5-de5b19', 'name', '0.000', '1', '', '2', 'effects', 'skin', '100', '2', '2', '100', 'description', '2016-03-19 18:33:34', '\0');
INSERT INTO `share_goods` VALUES ('goods_6ba985d4-7948-400b-6028-b30cf9', '123', '1.000', '11111', '', '2', '11111', '11111', '11111', '2', '2', '2147483647', '11111', '2016-03-19 18:24:09', '\0');
INSERT INTO `share_goods` VALUES ('goods_e1fbf61c-2510-7212-5316-1b7307', '3123123123', '99999.999', '123123123', '', '1', '12345678901', '123123123', '1234567890', '1', '1', '12312312', '12345678901', '2016-03-19 18:24:54', '\0');
INSERT INTO `share_goods` VALUES ('goods_f3d41fa6-fa44-1872-833b-1b6339', '12345678901', '1.000', '1', '', '2', '12345678901', '1', '123', '2', '2', '1', '12345678901', '2016-03-19 18:40:14', '\0');

-- ----------------------------
-- Table structure for share_goods_brand
-- ----------------------------
DROP TABLE IF EXISTS `share_goods_brand`;
CREATE TABLE `share_goods_brand` (
  `goods_brand_id` varchar(36) NOT NULL COMMENT '品牌ID',
  `goods_brand_name` varchar(255) NOT NULL COMMENT '品牌名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否删除',
  PRIMARY KEY (`goods_brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品品牌';

-- ----------------------------
-- Records of share_goods_brand
-- ----------------------------
INSERT INTO `share_goods_brand` VALUES ('1', 'brand1', '2016-03-19 15:30:21', '\0');
INSERT INTO `share_goods_brand` VALUES ('2', 'brand2', '2016-03-19 15:30:23', '');
INSERT INTO `share_goods_brand` VALUES ('goods_brand_id0ea31c96-67af-9a19-3e9', '品牌2', '2016-03-20 10:44:49', '\0');

-- ----------------------------
-- Table structure for share_goods_home
-- ----------------------------
DROP TABLE IF EXISTS `share_goods_home`;
CREATE TABLE `share_goods_home` (
  `home_id` varchar(36) NOT NULL COMMENT '产地ID,主键',
  `home_name` varchar(255) NOT NULL COMMENT '产地名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否删除',
  PRIMARY KEY (`home_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品产地';

-- ----------------------------
-- Records of share_goods_home
-- ----------------------------
INSERT INTO `share_goods_home` VALUES ('1', 'home1', '2016-03-19 15:30:36', '\0');
INSERT INTO `share_goods_home` VALUES ('2', 'home2', '2016-03-19 15:30:34', '\0');
INSERT INTO `share_goods_home` VALUES ('home_id4c626811-39c9-e3be-ada2-118d3', '啊啊啊啊啊2', '2016-03-20 10:30:19', '');
INSERT INTO `share_goods_home` VALUES ('home_id4ea58fc4-48d7-e9c3-7228-9f6ed', '123123', '2016-03-20 10:40:36', '');
INSERT INTO `share_goods_home` VALUES ('home_id5212db52-57ef-163d-e351-c70c8', '123123123123', '2016-03-20 10:46:43', '\0');
INSERT INTO `share_goods_home` VALUES ('home_id8caf634a-94ed-e33b-81ef-34898', '啊啊啊啊啊', '2016-03-20 10:30:52', '');
INSERT INTO `share_goods_home` VALUES ('home_iddccfec07-54bc-df07-8051-53e45', '啊啊啊啊啊', '2016-03-20 10:36:55', '');

-- ----------------------------
-- Table structure for share_goods_order
-- ----------------------------
DROP TABLE IF EXISTS `share_goods_order`;
CREATE TABLE `share_goods_order` (
  `order_id` varchar(36) NOT NULL COMMENT '订单ID',
  `user_id` varchar(36) NOT NULL COMMENT '用户ID',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '订单时间',
  `deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否删除',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品订单';

-- ----------------------------
-- Records of share_goods_order
-- ----------------------------
INSERT INTO `share_goods_order` VALUES ('1', '1', '2016-03-19 14:46:56', '\0');
INSERT INTO `share_goods_order` VALUES ('2', '1', '2016-03-20 09:56:52', '\0');

-- ----------------------------
-- Table structure for share_goods_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `share_goods_order_detail`;
CREATE TABLE `share_goods_order_detail` (
  `order_id` varchar(36) NOT NULL COMMENT '订单ID',
  `user_id` varchar(36) NOT NULL COMMENT '用户ID',
  `goods_id` varchar(36) NOT NULL COMMENT '商品ID',
  `goods_number` int(8) NOT NULL COMMENT '商品数量',
  `goods_price` decimal(8,3) unsigned NOT NULL COMMENT '单价',
  `deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否删除',
  KEY `order_detial_id` (`order_id`),
  KEY `order_detail_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单详情';

-- ----------------------------
-- Records of share_goods_order_detail
-- ----------------------------
INSERT INTO `share_goods_order_detail` VALUES ('1', '1', '1', '2', '10.000', '\0');
INSERT INTO `share_goods_order_detail` VALUES ('1', '1', '2', '3', '5.000', '\0');

-- ----------------------------
-- Table structure for share_goods_top
-- ----------------------------
DROP TABLE IF EXISTS `share_goods_top`;
CREATE TABLE `share_goods_top` (
  `goods_id` varchar(36) NOT NULL COMMENT '商品ID',
  `top_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '置顶时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='置顶商品';

-- ----------------------------
-- Records of share_goods_top
-- ----------------------------
INSERT INTO `share_goods_top` VALUES ('1', '1', '2016-03-19 14:47:22');
INSERT INTO `share_goods_top` VALUES ('2', '2', '2016-03-19 14:47:26');

-- ----------------------------
-- Table structure for share_goods_type
-- ----------------------------
DROP TABLE IF EXISTS `share_goods_type`;
CREATE TABLE `share_goods_type` (
  `goods_type_id` varchar(36) NOT NULL COMMENT '类型ID',
  `goods_type_name` varchar(255) NOT NULL COMMENT '类型名称',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否删除',
  PRIMARY KEY (`goods_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品类型';

-- ----------------------------
-- Records of share_goods_type
-- ----------------------------
INSERT INTO `share_goods_type` VALUES ('1', 'type1', '2016-03-19 15:17:18', '\0');
INSERT INTO `share_goods_type` VALUES ('2', 'type2', '2016-03-19 15:17:19', '\0');
INSERT INTO `share_goods_type` VALUES ('goods_type_idb088eef5-1efe-6c19-9b88', '123', '2016-03-20 10:38:36', '\0');
INSERT INTO `share_goods_type` VALUES ('goods_type_idd80c4fe8-6230-38ba-f5b7', '32111111', '2016-03-20 10:40:53', '');

-- ----------------------------
-- Table structure for share_photos
-- ----------------------------
DROP TABLE IF EXISTS `share_photos`;
CREATE TABLE `share_photos` (
  `photo_id` varchar(36) NOT NULL COMMENT '图片ID',
  `root_id` varchar(36) NOT NULL COMMENT '图片所属ID',
  `photo_name` varchar(255) NOT NULL DEFAULT '' COMMENT '图片别名',
  `source_name` varchar(255) NOT NULL DEFAULT '' COMMENT '上传文件的原始名称',
  `path` varchar(255) NOT NULL COMMENT '存储路径',
  `savename` varchar(255) NOT NULL DEFAULT '' COMMENT '上传文件的保存名称',
  `thumbnail_path` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图路径',
  `size` varchar(36) NOT NULL COMMENT '文件大小',
  `type` varchar(36) NOT NULL COMMENT '上传文件的MIME类型',
  `ext` varchar(10) NOT NULL DEFAULT '' COMMENT '上传文件的后缀类型',
  `md5` varchar(255) NOT NULL DEFAULT '' COMMENT '文件md5哈希验证字符串',
  `sha1` varchar(255) NOT NULL DEFAULT '' COMMENT '文件sha1哈希验证字符串',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上传时间',
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图册';

-- ----------------------------
-- Records of share_photos
-- ----------------------------
INSERT INTO `share_photos` VALUES ('photo_11204466-72a3-9c92-397c-090c7e', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Jellyfish.jpg', 'Jellyfish.jpg', '20160319/', '56ed7564cbd64.jpg', '56ed7564cbd64.jpg', '775702', 'image/jpeg', 'jpg', '5a44c7ba5bbe4ec867233d67e4806848', '3b15be84aff20b322a93c0b9aaa62e25ad33b4b4', '2016-03-19 23:51:01');
INSERT INTO `share_photos` VALUES ('photo_241e53bb-5728-eaff-07e7-534d51', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Lighthouse.jpg', 'Lighthouse.jpg', '20160319/', '56ed7560438af.jpg', '56ed7560438af.jpg', '561276', 'image/jpeg', 'jpg', '8969288f4245120e7c3870287cce0ff3', '1b4605b0e20ceccf91aa278d10e81fad64e24e27', '2016-03-19 23:50:57');
INSERT INTO `share_photos` VALUES ('photo_3bec7a1d-1e06-764a-232b-edf777', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Chrysanthemum.jpg', 'Chrysanthemum.jpg', '20160319/', '56ed7563a8aa2.jpg', '56ed7563a8aa2.jpg', '879394', 'image/jpeg', 'jpg', '076e3caed758a1c18c91a0e9cae3368f', 'f5f8ad26819a471318d24631fa5055036712a87e', '2016-03-19 23:51:00');
INSERT INTO `share_photos` VALUES ('photo_5bf6c89f-df1c-cb85-d901-b635d5', 'goods_d9c567a8-23d7-0331-be8e-b4dcfd', 'Jellyfish.jpg', 'Jellyfish.jpg', '20160320/', '56ed7863bb726.jpg', '56ed7863bb726.jpg', '775702', 'image/jpeg', 'jpg', '5a44c7ba5bbe4ec867233d67e4806848', '3b15be84aff20b322a93c0b9aaa62e25ad33b4b4', '2016-03-20 00:03:48');
INSERT INTO `share_photos` VALUES ('photo_64833b52-7645-02d4-8011-46ff57', 'goods_d9c567a8-23d7-0331-be8e-b4dcfd', 'Koala.jpg', 'Koala.jpg', '20160320/', '56ed7864e3420.jpg', '56ed7864e3420.jpg', '780831', 'image/jpeg', 'jpg', '2b04df3ecc1d94afddff082d139c6f15', '9c3dcb1f9185a314ea25d51aed3b5881b32f420c', '2016-03-20 00:03:50');
INSERT INTO `share_photos` VALUES ('photo_68c0953f-4cd8-09b0-da24-ba8c68', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Penguins.jpg', 'Penguins.jpg', '20160319/', '56ed756725da8.jpg', '56ed756725da8.jpg', '777835', 'image/jpeg', 'jpg', '9d377b10ce778c4938b3c7e2c63a229a', 'df7be9dc4f467187783aca68c7ce98e4df2172d0', '2016-03-19 23:51:04');
INSERT INTO `share_photos` VALUES ('photo_707adda1-8c12-f31a-95c7-c0cad2', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Tulips.jpg', 'Tulips.jpg', '20160319/', '56ed75685fbb7.jpg', '56ed75685fbb7.jpg', '620888', 'image/jpeg', 'jpg', 'fafa5efeaf3cbe3b23b2748d13e629a1', '54c2f1a1eb6f12d681a5c7078421a5500cee02ad', '2016-03-19 23:51:05');
INSERT INTO `share_photos` VALUES ('photo_73eb53a1-77bc-0b40-7583-3cbb0b', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Hydrangeas.jpg', 'Hydrangeas.jpg', '20160319/', '56ed7565eec3d.jpg', '56ed7565eec3d.jpg', '595284', 'image/jpeg', 'jpg', 'bdf3bf1da3405725be763540d6601144', 'd997e1c37edc05ad87d03603e32ad495ee2cfce1', '2016-03-19 23:51:03');
INSERT INTO `share_photos` VALUES ('photo_99c0977f-bebf-0bd0-2aba-78bf85', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Desert.jpg', 'Desert.jpg', '20160319/', '56ed7562805d8.jpg', '56ed7562805d8.jpg', '845941', 'image/jpeg', 'jpg', 'ba45c8f60456a672e003a875e469d0eb', '30420d1a9afb2bcb60335812569af4435a59ce17', '2016-03-19 23:50:59');
INSERT INTO `share_photos` VALUES ('photo_cd8dd16a-7faf-33dd-6ba7-e2154b', 'goods_76401dd2-8726-3f53-a268-980a9b', 'Koala.jpg', 'Koala.jpg', '20160319/', '56ed75616251f.jpg', '56ed75616251f.jpg', '780831', 'image/jpeg', 'jpg', '2b04df3ecc1d94afddff082d139c6f15', '9c3dcb1f9185a314ea25d51aed3b5881b32f420c', '2016-03-19 23:50:58');

-- ----------------------------
-- Table structure for share_users
-- ----------------------------
DROP TABLE IF EXISTS `share_users`;
CREATE TABLE `share_users` (
  `userid` varchar(8) NOT NULL COMMENT '用户id',
  `user_type` enum('admin','custom') NOT NULL DEFAULT 'custom' COMMENT '用户类型',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` varchar(50) NOT NULL DEFAULT '' COMMENT '昵称',
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `lasttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次登录时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后一次登录ip',
  `loginnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '手机号码',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定',
  `vip` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否会员',
  `overduedate` int(10) unsigned NOT NULL COMMENT '账户过期时间',
  `deleted` bit(1) NOT NULL DEFAULT b'0' COMMENT '状态-用于软删除',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `user_username` (`username`) USING BTREE,
  KEY `user_email` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户';

-- ----------------------------
-- Records of share_users
-- ----------------------------
INSERT INTO `share_users` VALUES ('1', 'admin', 'admin', 'admin', '管理员', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0.0.0.0', '11', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('2', 'custom', '2', '', '', '2016-03-19 13:48:27', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '');
INSERT INTO `share_users` VALUES ('3', 'custom', '3', '', '', '2016-03-19 13:48:39', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('4', 'custom', '4', '', '', '2016-03-19 13:48:47', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('5', 'custom', '5', '', '', '2016-03-19 13:49:51', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('6', 'custom', '6', '', '', '2016-03-19 13:49:55', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('7', 'custom', '7', '', '', '2016-03-19 13:49:57', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('8', 'custom', '8', '', '', '2016-03-19 13:50:01', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('9', 'custom', '9', '', '', '2016-03-19 13:50:04', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('10', 'custom', '10', '', '', '2016-03-19 13:50:06', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('11', 'custom', '11', '', '', '2016-03-19 13:50:08', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('12', 'custom', '12', '', '', '2016-03-19 13:50:09', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('13', 'custom', '13', '', '', '2016-03-19 13:50:11', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('14', 'custom', '14', '', '', '2016-03-19 13:50:14', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
INSERT INTO `share_users` VALUES ('15', 'custom', '15', '', '', '2016-03-19 13:50:17', '0000-00-00 00:00:00', '', '', '0', '', '', '0', '0', '0', '\0');
