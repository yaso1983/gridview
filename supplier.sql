/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : yii2basic

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2022-05-20 14:00:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `code` char(3) CHARACTER SET ascii DEFAULT NULL,
  `t_status` enum('ok','hold') CHARACTER SET ascii NOT NULL DEFAULT 'ok',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES ('1', 'name1', '001', 'ok');
INSERT INTO `supplier` VALUES ('2', 'name2', '002', 'hold');
INSERT INTO `supplier` VALUES ('3', 'name3', '003', 'ok');
INSERT INTO `supplier` VALUES ('4', 'name4', '004', 'ok');
INSERT INTO `supplier` VALUES ('5', 'name5', '005', 'ok');
INSERT INTO `supplier` VALUES ('6', 'name6', '006', 'ok');
INSERT INTO `supplier` VALUES ('7', 'name7', '007', 'ok');
INSERT INTO `supplier` VALUES ('8', 'name8', '008', 'hold');
INSERT INTO `supplier` VALUES ('9', 'name9', '009', 'ok');
INSERT INTO `supplier` VALUES ('10', 'name10', '010', 'ok');
INSERT INTO `supplier` VALUES ('11', 'name11', '011', 'hold');
