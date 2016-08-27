/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : store

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-03-13 16:06:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL DEFAULT '',
  `intro` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '男士正装', '男士正装', '0');
INSERT INTO `category` VALUES ('2', '西装', '西装', '1');
INSERT INTO `category` VALUES ('3', '衬衫', '衬衫', '1');
INSERT INTO `category` VALUES ('4', '女士正装', '女士正装', '0');
INSERT INTO `category` VALUES ('5', '套装', '套装', '4');
INSERT INTO `category` VALUES ('6', '衬衫', '衬衫', '4');
INSERT INTO `category` VALUES ('7', '正装鞋', '正装鞋', '0');
INSERT INTO `category` VALUES ('8', '男士皮鞋', '男士皮鞋', '7');
INSERT INTO `category` VALUES ('9', '女士皮鞋', '女士皮鞋', '7');
INSERT INTO `category` VALUES ('10', '配饰', '配饰', '0');
INSERT INTO `category` VALUES ('11', '领带', '领带', '10');
INSERT INTO `category` VALUES ('12', '皮带', '皮带', '10');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_sn` char(20) NOT NULL DEFAULT '',
  `cat_id` smallint(6) NOT NULL DEFAULT '0',
  `brand_id` smallint(6) NOT NULL DEFAULT '0',
  `goods_name` varchar(30) NOT NULL DEFAULT '',
  `shop_price` decimal(9,2) NOT NULL DEFAULT '0.00',
  `market_price` decimal(9,2) NOT NULL DEFAULT '0.00',
  `goods_number` smallint(6) NOT NULL DEFAULT '1',
  `click_count` mediumint(9) NOT NULL DEFAULT '0',
  `goods_weight` decimal(6,3) NOT NULL DEFAULT '0.000',
  `goods_brief` varchar(100) NOT NULL DEFAULT '',
  `goods_desc` text NOT NULL,
  `thumb_img` varchar(200) NOT NULL DEFAULT '',
  `goods_img` varchar(200) NOT NULL DEFAULT '',
  `ori_img` varchar(200) NOT NULL DEFAULT '',
  `is_on_sale` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `is_best` tinyint(4) NOT NULL DEFAULT '0',
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `is_hot` tinyint(4) NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0',
  `keywords` varchar(200) NOT NULL,
  `seller_note` varchar(200) NOT NULL,
  PRIMARY KEY (`goods_id`),
  UNIQUE KEY `goods_sn` (`goods_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', 'BL2016021939587', '2', '0', '两扣双开衩平驳头斜兜男士西服套装3312/\r\n\r\n纯藏青色人', '799.00', '1598.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_aifwnt.JPG', 'data/images/20\r\n\r\n1602/19/goods_aifwnt.JPG', 'data/images/201602/19/aifwnt.JPG', '1', '0', '0', '1', '0', '1355915283', '0', '', '');
INSERT INTO `goods` VALUES ('2', 'BL2016021913673', '2', '0', '纯羊毛一粒扣枪驳领纯黑西服套\r\n\r\n装', '999.00', '1325.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_z2gd86.JPG', 'data/images/20\r\n\r\n1602/19/goods_z2gd86.JPG', 'data/images/201602/19/z2gd86.JPG', '1', '0', '0', '1', '0', '1355915493', '0', '', '');
INSERT INTO `goods` VALUES ('3', 'BL2016021919874', '2', '0', '两扣平驳领棕色格纹男士休闲单西\r\n\r\nD6959', '1490.00', '1643.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_dx9ghq.JPG', 'data/image\r\n\r\ns/201602/19/goods_dx9ghq.JPG', 'data/images/201602/19/dx9ghq.JPG', '1', '0', '0', '1', '0', '1355915572', '0', '', '');
INSERT INTO `goods` VALUES ('4', 'BL2016021970923', '3', '0', '蓝黑竖条纹男士休闲衬\r\n\r\n衫', '199.00', '238.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_juir8s.JPG', 'data/images/201\r\n\r\n602/19/goods_juir8s.JPG', 'data/images/201602/19/juir8s.JPG', '1', '0', '0', '0', '0', '1355915656', '0', '', '');
INSERT INTO `goods` VALUES ('5', 'BL2016021980647', '3', '0', '蓝底提花咖色竖条纹修身正装衬\r\n\r\n衫', '199.00', '234.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_rad3wq.JPG', 'data/images/201\r\n\r\n602/19/goods_rad3wq.JPG', 'data/images/201602/19/rad3wq.JPG', '1', '0', '0', '1', '0', '1355915689', '0', '', '');
INSERT INTO `goods` VALUES ('6', 'BL2016021956217', '3', '0', '男士短袖衬衫A52D/纯白暗竖纹/莫代尔\r\n\r\n棉', '45.00', '54.00', '0', '0', '0.000', '', '', 'data/images/201602/19/thumb_3fckzt.jpg', 'data/images/20160\r\n\r\n2/19/goods_3fckzt.jpg', 'data/images/201602/19/3fckzt.jpg', '1', '0', '0', '0', '0', '1355915726', '0', '', '');
INSERT INTO `goods` VALUES ('7', 'BL2016021936338', '5', '0', '枪驳大领面后开叉短款两扣女士正\r\n\r\n装', '567.00', '1324.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_wcri9z.JPG', 'data/images/20\r\n\r\n1602/19/goods_wcri9z.JPG', 'data/images/201602/19/wcri9z.JPG', '1', '0', '0', '0', '0', '1355915834', '0', '', '');
INSERT INTO `goods` VALUES ('8', 'BL2016021994403', '5', '0', '泡泡袖后领色丁拼接平驳领一扣女士正装套裤/黑\r\n\r\n色', '482.00', '897.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_5tsyhu.JPG', 'data/images/201\r\n\r\n602/19/goods_5tsyhu.JPG', 'data/images/201602/19/5tsyhu.JPG', '1', '0', '0', '0', '0', '1355915895', '0', '', '');
INSERT INTO `goods` VALUES ('9', 'BL2016021977239', '5', '0', '本白压褶下摆短袖套\r\n\r\n裙', '318.00', '564.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_ay86zh.JPG', 'data/images/201\r\n\r\n602/19/goods_ay86zh.JPG', 'data/images/201602/19/ay86zh.JPG', '1', '0', '0', '0', '0', '1355915936', '0', '', '');
INSERT INTO `goods` VALUES ('10', 'BL2016021941490', '5', '0', '枪驳大领面1扣女士正装/亮咖\r\n\r\n色', '499.00', '675.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_n29dmp.JPG', 'data/images/201\r\n\r\n602/19/goods_n29dmp.JPG', 'data/images/201602/19/n29dmp.JPG', '1', '0', '0', '1', '0', '1355915993', '0', '', '');
INSERT INTO `goods` VALUES ('11', 'BL2016021985783', '6', '0', '纯白斜条棉涤女士衬\r\n\r\n衫', '42.00', '67.00', '0', '0', '0.000', '', '', 'data/images/201602/19/thumb_byadc8.JPG', 'data/images/20160\r\n\r\n2/19/goods_byadc8.JPG', 'data/images/201602/19/byadc8.JPG', '1', '0', '0', '0', '0', '1355916069', '0', '', '');
INSERT INTO `goods` VALUES ('12', 'BL2016021952838', '6', '0', '女士长袖衬衫165/蓝条纹/莫代尔棉V领花\r\n\r\n边', '99.00', '134.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_2mhjt4.JPG', 'data/images/2016\r\n\r\n02/19/goods_2mhjt4.JPG', 'data/images/201602/19/2mhjt4.JPG', '1', '0', '0', '0', '0', '1355916106', '0', '', '');
INSERT INTO `goods` VALUES ('13', 'BL2016021982746', '6', '0', '白色暗竖纹V领莫代尔棉衬\r\n\r\n衫', '89.00', '156.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_fys85v.JPG', 'data/images/2016\r\n\r\n02/19/goods_fys85v.JPG', 'data/images/201602/19/fys85v.JPG', '1', '1', '0', '0', '0', '1355916157', '0', '', '');
INSERT INTO `goods` VALUES ('14', 'BL2016021992429', '8', '0', '男士系带正装鞋/黑色/牛\r\n\r\n皮', '150.00', '250.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_yvwnc9.JPG', 'data/images/201\r\n\r\n602/19/goods_yvwnc9.JPG', 'data/images/201602/19/yvwnc9.JPG', '1', '0', '0', '0', '0', '1355916281', '0', '', '');
INSERT INTO `goods` VALUES ('15', 'BL2016021971035', '8', '0', '滑轮添奴男士系带正装鞋/牛\r\n\r\n皮', '150.00', '250.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_dh2yxm.JPG', 'data/images/201\r\n\r\n602/19/goods_dh2yxm.JPG', 'data/images/201602/19/dh2yxm.JPG', '1', '0', '0', '0', '0', '1355916549', '0', '', '');
INSERT INTO `goods` VALUES ('16', 'BL2016021977793', '8', '0', '全牛皮小圆头正装\r\n\r\n鞋', '199.00', '234.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_iu5xgq.JPG', 'data/images/201\r\n\r\n602/19/goods_iu5xgq.JPG', 'data/images/201602/19/iu5xgq.JPG', '1', '0', '0', '0', '0', '1355916612', '0', '', '');
INSERT INTO `goods` VALUES ('17', 'BL2016021952414', '0', '0', '鞋面三扣装饰胎牛皮带绒中跟踝靴/黑\r\n\r\n色', '299.00', '399.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_i7pqy8.JPG', 'data/images/201\r\n\r\n602/19/goods_i7pqy8.JPG', 'data/images/201602/19/i7pqy8.JPG', '1', '0', '0', '0', '0', '1355916746', '0', '', '');
INSERT INTO `goods` VALUES ('18', 'BL2016021957666', '9', '0', '简约中跟女士正装鞋黑\r\n\r\n色', '199.00', '399.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_fsuh7j.JPG', 'data/images/201\r\n\r\n602/19/goods_fsuh7j.JPG', 'data/images/201602/19/fsuh7j.JPG', '1', '0', '0', '0', '0', '1355916792', '0', '', '');
INSERT INTO `goods` VALUES ('19', 'BL2016021917277', '9', '0', '单侧镶钻漆皮中跟正装鞋/黑\r\n\r\n色', '145.00', '234.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_uigxw5.JPG', 'data/images/201\r\n\r\n602/19/goods_uigxw5.JPG', 'data/images/201602/19/uigxw5.JPG', '1', '0', '0', '0', '0', '1355916829', '0', '', '');
INSERT INTO `goods` VALUES ('20', 'BL2016021993042', '11', '0', '深蓝纯色领\r\n\r\n带', '89.00', '139.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_cbnrqe.JPG', 'data/images/2016\r\n\r\n02/19/goods_cbnrqe.JPG', 'data/images/201602/19/cbnrqe.JPG', '1', '0', '0', '0', '0', '1355916948', '0', '', '');
INSERT INTO `goods` VALUES ('21', 'BL2016021965862', '11', '0', '100%桑蚕丝天蓝底黑斜纹领\r\n\r\n带', '128.00', '234.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_uc9n7f.JPG', 'data/images/201\r\n\r\n602/19/goods_uc9n7f.JPG', 'data/images/201602/19/uc9n7f.JPG', '1', '0', '0', '0', '0', '1355916979', '0', '', '');
INSERT INTO `goods` VALUES ('22', 'BL2016021940360', '11', '0', '100%桑蚕丝灰黑斜条纹领\r\n\r\n带', '128.00', '234.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_m5qd2j.JPG', 'data/images/201\r\n\r\n602/19/goods_m5qd2j.JPG', 'data/images/201602/19/m5qd2j.JPG', '1', '0', '0', '0', '0', '1355917010', '0', '', '');
INSERT INTO `goods` VALUES ('23', 'BL2016021939272', '12', '0', '不锈钢自动扣荔枝纹牛皮正装腰\r\n\r\n带', '69.00', '129.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_kixvwy.JPG', 'data/images/2016\r\n\r\n02/19/goods_kixvwy.JPG', 'data/images/201602/19/kixvwy.JPG', '1', '0', '0', '0', '0', '1355917090', '0', '', '');
INSERT INTO `goods` VALUES ('24', 'BL2016021926113', '12', '0', '黑色烤漆不锈钢自动扣细纹牛皮正装腰\r\n\r\n带', '89.00', '169.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_avkfd4.JPG', 'data/images/2016\r\n\r\n02/19/goods_avkfd4.JPG', 'data/images/201602/19/avkfd4.JPG', '1', '0', '0', '0', '0', '1355917125', '0', '', '');
INSERT INTO `goods` VALUES ('25', 'BL2016021943041', '12', '0', '银色不锈钢针扣头层小牛皮二层同色皮底正装腰\r\n\r\n带', '99.00', '169.00', '1', '0', '0.000', '', '', 'data/images/201602/19/thumb_nv7cas.JPG', 'data/images/2016\r\n\r\n02/19/goods_nv7cas.JPG', 'data/images/201602/19/nv7cas.JPG', '1', '0', '0', '0', '0', '1355917162', '0', '', '');
INSERT INTO `goods` VALUES ('26', '25032016031266085', '5', '0', '韩版修身显瘦气质潮百搭西服上衣', '100.00', '150.00', '5', '0', '1.000', '', '<p><img src=\"/ueditor/php/upload/image/20160312/1457795751903495.jpg\" title=\"1457795751903495.jpg\" alt=\"2.jpg\"/></p><p><span style=\"color: rgb(255, 0, 0);\">超赞西装</span></p>', 'data/images/201603/12/thumb_c1nvpw.jpg', 'data/images/201603/12/goods_c1nvpw.jpg', 'data/images/201603/12/c1nvpw.jpg', '1', '0', '1', '0', '0', '1457795785', '0', '西装', '');
INSERT INTO `goods` VALUES ('27', '33212016031354159', '2', '0', 'AZ男士修身西装春伴郎西服套装', '329.00', '500.00', '1', '0', '1.000', '', '<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img title=\"1457852281935941.jpg\" alt=\"2.jpg\" src=\"/ueditor/php/upload/image/20160313/1457852281935941.jpg\"/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img title=\"1457852300100758.jpg\" alt=\"3.jpg\" src=\"/ueditor/php/upload/image/20160313/1457852300100758.jpg\"/></p>', 'data/images/201603/13/thumb_qn92p1.jpg', 'data/images/201603/13/goods_qn92p1.jpg', 'data/images/201603/13/qn92p1.jpg', '1', '0', '1', '0', '0', '1457852325', '0', '西装', '');
INSERT INTO `goods` VALUES ('28', '33612016031348437', '5', '0', '春装修身职业装女装套装OL套', '230.00', '350.00', '1', '0', '1.000', '', '<p style=\"TEXT-ALIGN: center\"><img title=\"1457852633127610.jpg\" src=\"http://localhost/ueditor/php/upload/image/20160313/1457852633127610.jpg\"/></p><p style=\"TEXT-ALIGN: center\"><img title=\"1457852633123023.jpg\" src=\"/ueditor/php/upload/image/20160313/1457852633123023.jpg\"/></p><p></p>', 'data/images/201603/13/thumb_4ta26v.jpg', 'data/images/201603/13/goods_4ta26v.jpg', 'data/images/201603/13/4ta26v.jpg', '1', '0', '1', '0', '0', '1457852675', '0', '西装', '');
INSERT INTO `goods` VALUES ('29', 'BL2016031397425', '5', '0', '春装新款韩版宽松双排扣小西装外套', '189.00', '230.00', '1', '0', '1.000', '', '<p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\"><img style=\"BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FLOAT: none; VERTICAL-ALIGN: top; BORDER-TOP: 0px; BORDER-RIGHT: 0px; PADDING-TOP: 0px; opacity: 1; animation: ks-fadeIn 350ms linear 0ms 1 normal both\" class=\"img-ks-lazyload\" alt=\"\" src=\"https://assets.alicdn.com/sys/wangwang/smiley/48x48/0.gif\"/>2016早春新款西装套装</strong></span></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">一面帅气 ,一面优雅 ,正式与休闲并存&nbsp;</strong></span></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; COLOR: rgb(153,0,255); PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">新品抢鲜价,限时包邮!</strong></span></span></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; COLOR: rgb(153,0,255); PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">早买早优惠！</strong></span></span></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\">&nbsp;</p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; COLOR: rgb(0,0,0); PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">洋气大方，薄厚适宜，正适合春天穿</strong></span></span><br style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px\"/></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; COLOR: rgb(0,0,0); PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">套装就是为了省去搭配烦恼，不用再考虑怎样搭配了</strong></span></span></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; COLOR: rgb(0,0,0); PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">帅气西装领+双袋盖口袋设计，简直洋爆了~</strong></span></span><br style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px\"/></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; COLOR: rgb(0,0,0); PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">挺括的西装面料，很显气质，很有范</strong></span></span><br style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; PADDING-TOP: 0px\"/></span></p><p style=\"TEXT-ALIGN: center; PADDING-BOTTOM: 0px; WIDOWS: 1; TEXT-TRANSFORM: none; BACKGROUND-COLOR: rgb(255,255,255); TEXT-INDENT: 0px; MARGIN: 1.12em 0px; PADDING-LEFT: 0px; LETTER-SPACING: normal; PADDING-RIGHT: 0px; FONT: 14px/1.4 tahoma, arial, 宋体, sans-serif; WHITE-SPACE: normal; COLOR: rgb(64,64,64); WORD-SPACING: 0px; PADDING-TOP: 0px; -webkit-text-stroke-width: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; COLOR: rgb(0,0,0); PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-FAMILY: lisu; PADDING-TOP: 0px\"><span style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-SIZE: 24px; PADDING-TOP: 0px\"><strong style=\"PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; FONT-WEIGHT: 700; PADDING-TOP: 0px\">喜欢的MM一定要入哦</strong></span></span></span></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p style=\"TEXT-ALIGN: center\"><img title=\"1457853121660408.jpg\" src=\"http://localhost/ueditor/php/upload/image/20160313/1457853121660408.jpg\"/></p><p style=\"TEXT-ALIGN: center\"><img title=\"1457853121100423.jpg\" src=\"http://localhost/ueditor/php/upload/image/20160313/1457853121100423.jpg\"/></p>', 'data/images/201603/13/thumb_xlrmhc.jpg', 'data/images/201603/13/goods_xlrmhc.jpg', 'data/images/201603/13/xlrmhc.jpg', '1', '0', '1', '0', '0', '1457853186', '0', '西装', '');

-- ----------------------------
-- Table structure for `ordergoods`
-- ----------------------------
DROP TABLE IF EXISTS `ordergoods`;
CREATE TABLE `ordergoods` (
  `og_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `order_sn` char(15) NOT NULL DEFAULT '',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(60) NOT NULL DEFAULT '',
  `goods_number` smallint(6) NOT NULL DEFAULT '1',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`og_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ordergoods
-- ----------------------------
INSERT INTO `ordergoods` VALUES ('1', '1', 'OI2016031267023', '6', '男士短袖衬衫A52D/纯白暗竖纹/莫代尔\r\n\r\n棉', '1', '45.00', '45.00');
INSERT INTO `ordergoods` VALUES ('2', '1', 'OI2016031267023', '11', '纯白斜条棉涤女士衬\r\n\r\n衫', '1', '42.00', '42.00');

-- ----------------------------
-- Table structure for `orderinfo`
-- ----------------------------
DROP TABLE IF EXISTS `orderinfo`;
CREATE TABLE `orderinfo` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` char(15) NOT NULL DEFAULT '',
  `username` varchar(15) NOT NULL,
  `user_id` int(5) unsigned zerofill NOT NULL,
  `zone` varchar(30) NOT NULL DEFAULT '',
  `address` varchar(30) NOT NULL DEFAULT '',
  `zipcode` char(6) NOT NULL DEFAULT '',
  `reciver` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `tel` varchar(20) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '',
  `building` varchar(30) NOT NULL DEFAULT '',
  `best_time` varchar(10) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderinfo
-- ----------------------------
INSERT INTO `orderinfo` VALUES ('1', 'OI2016031267023', 'smy14520', '00037', '福建', '福建三明', '365100', '肖祖瑞', 'smy14520@126.com', '15659370618', '15659370618', '埃菲尔铁塔', '后天', '1457761757', '87.00', '4');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `passwd` char(32) NOT NULL DEFAULT '',
  `regtime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('30', '123', '', '', '1457264617', '0');
INSERT INTO `user` VALUES ('31', '123', '', '', '1457264642', '0');
INSERT INTO `user` VALUES ('32', '123', '', '', '1457264700', '0');
INSERT INTO `user` VALUES ('33', '4234', '', '', '1457264725', '0');
INSERT INTO `user` VALUES ('34', '123', '', '', '1457264759', '0');
INSERT INTO `user` VALUES ('37', 'smy14520', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457271835', '0');
INSERT INTO `user` VALUES ('36', '543', '', '', '1457264838', '0');
INSERT INTO `user` VALUES ('38', 'smy145201', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272387', '0');
INSERT INTO `user` VALUES ('39', 'smy145202', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272485', '0');
INSERT INTO `user` VALUES ('40', 'smy145203', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272593', '0');
INSERT INTO `user` VALUES ('41', 'smy145205', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272641', '0');
INSERT INTO `user` VALUES ('42', 'smy145206', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272708', '0');
INSERT INTO `user` VALUES ('43', 'smy145207', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272803', '0');
INSERT INTO `user` VALUES ('44', 'smy1452071', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272825', '0');
INSERT INTO `user` VALUES ('45', 'smy145299', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272840', '0');
INSERT INTO `user` VALUES ('46', 'bxz747', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272869', '0');
INSERT INTO `user` VALUES ('47', 'smy14520512', 'smy14520@126.com', '94ddbb4cb41a195f6a5777ca281466a5', '1457272991', '0');
INSERT INTO `user` VALUES ('48', 'smy145205122', 'smy14520@126.com', 'e10adc3949ba59abbe56e057f20f883e', '1457273119', '0');
