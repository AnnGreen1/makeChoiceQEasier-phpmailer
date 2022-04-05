/*
 Navicat MySQL Data Transfer

 Source Server         : xammpp_mysql
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : 127.0.0.1:3306
 Source Schema         : makechoiceqeasier

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 05/04/2022 23:32:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES (1, 'admin', '123', 'anngreen.jpeg'), (6, 'admin2', '222', 'default.png'), (8, '807487176@qq.com', '342423', 'default.png'), (9, '807487176@qq.com', 'ewr34', 'default.png'), (10, '807487176@qq.com', 'zdffgsdsdffg', 'default.png');
COMMIT;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_time` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of blog
-- ----------------------------
BEGIN;
INSERT INTO `blog` VALUES (1, 'tom', '第一条博客', '<h1>这是第一条博客，这是第一条博客，这是第一条博客</h1>', 1640499571), (2, 'luna', 'id是2', '<h1>卢娜的博客</h1>', 1640499572), (3, 'mike', '快要考试了', '下周内有第三阶段考试，下周末还有软件工程考试', 1640499573), (4, 'admin', '插入博客', '<p>这会是第一条插入的博客</p>', 1640735172), (5, 'admin', '第一条成功插入的博客', '<p>者将会是第一条自动刷新显示的博客</p>', 1640735369), (6, 'admin', '提示', '<p>这条博客要提示我添加成功</p>', 1640767122), (7, 'admin', '提示成功', '<p>必需提示成功</p>', 1640767213), (8, 'admin', '提示成功', '<p>必需提示成功</p>', 1640768374), (9, 'admin', '今天周三了', '<p>是的，2021要结束了</p>', 1640768437), (10, 'admin', '这是杨删除的博客', '<p>博客</p>', 1640771229), (11, 'admin', '我是王子祥', '<p>也是汪自祥</p>', 1640772267), (12, 'admin', '新年好！', '<blockquote><p><b>“</b></p></blockquote><p><br/></p><p><b>2021 你过的好吗？</b></p><p>我知道 你不该被概括</p><p><b>我知道 你也隐藏着自己的感受</b></p><p>不能拥抱每一个你</p><p><b>所以尽可能收录每一个瞬间</b></p><p>在一年的最后一天 为你拼接</p><blockquote><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>&nbsp;”</b></p></blockquote>', 1640975127), (13, 'luna', 'id是13', '<h2>luna的第二条博客</h2>', 1640499574), (15, 'admin', '新年好！', '<p><img src=\"http://localhost:80/allPHPcode/makeChoiceQEasier/backend/server/resource/blogphoto/newyear.jpg\" style=\"max-width:100%;\" contenteditable=\"false\"/></p>', 1641056080);
COMMIT;

-- ----------------------------
-- Table structure for emailverificationcode
-- ----------------------------
DROP TABLE IF EXISTS `emailverificationcode`;
CREATE TABLE `emailverificationcode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `verificationCode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createtime` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of emailverificationcode
-- ----------------------------
BEGIN;
INSERT INTO `emailverificationcode` VALUES (12, '', '308226', 1642973236), (13, '807487176@qq.com', '470931', 1642973374), (14, '', '739659', 1642975431);
COMMIT;

-- ----------------------------
-- Table structure for judge
-- ----------------------------
DROP TABLE IF EXISTS `judge`;
CREATE TABLE `judge`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `question_id` int NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_time` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of judge
-- ----------------------------
BEGIN;
INSERT INTO `judge` VALUES (6, '', 12, 'b', 1640964774), (7, '', 10, 'c', 1640964775), (8, '', 11, 'd', 1640964781), (9, '', 11, 'd', 1640964806), (10, '', 11, 'd', 1640964812), (11, '', 10, 'd', 1640964818), (12, '', 12, 'b', 1640965598), (13, '', 10, 'c', 1640965599), (14, '', 12, 'b', 1640965694), (15, '', 10, 'd', 1640965696), (16, '', 11, 'b', 1640965699), (17, '平台第二次测试', 12, 'a', 1640966315), (18, '平台第二次测试', 10, 'c', 1640966317), (19, '平台第二次测试', 12, 'a', 1640966356), (20, '平台第二次测试', 10, 'b', 1640966357), (21, '平台第二次测试', 11, 'd', 1640966360), (26, '平台第二次测试', 12, 'a', 1641303699), (27, '平台第二次测试', 10, 'a', 1641303701), (28, '平台第二次测试', 11, 'a', 1641303702), (29, '平台第二次测试', 10, 'a', 1641303705), (30, '平台第二次测试', 11, 'a', 1641303709), (31, '平台第二次测试', 11, 'a', 1641303711), (32, '平台第二次测试', 10, 'a', 1641303711), (33, '平台第二次测试', 12, 'a', 1641303714), (34, '平台第二次测试', 12, 'b', 1641314995), (35, '平台第二次测试', 10, 'c', 1641314997), (36, '平台第二次测试', 11, 'a', 1641315000), (60, '平台第二次测试', 12, 'b', 1641406392), (61, '平台第二次测试', 10, 'b', 1641406396), (62, '平台第二次测试', 11, 'b', 1641406400), (63, '平台第二次测试', 12, 'd', 1641409322), (64, '平台第二次测试', 10, 'b', 1641409326), (65, '平台第二次测试', 11, 'a', 1641409329), (66, '平台第二次测试', 10, 'a', 1641409331), (67, '平台第二次测试', 11, 'a', 1641409333);
COMMIT;

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `stem` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `answer_a` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `answer_b` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `answer_c` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `answer_d` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `right_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `create_time` int(11) UNSIGNED ZEROFILL NOT NULL,
  `difficulty` int NOT NULL,
  `open` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of question
-- ----------------------------
BEGIN;
INSERT INTO `question` VALUES (1, 'php', 'a', '以下代码不能把json格式的字符 {} 转成json对象的有？', ' JSON.parse(‘{}’)', 'JSON(\'{}\')', '(new Function(\'return {}\'))()', 'evel(\'(\' + {} + \')\')', 'JSON(\'{}\')', 01640366413, 2, 0), (5, 'php', 'a', '哪个是php文件的后缀', '.php', '.hpp', '.pph', '.txt', '.php', 01640089476, 2, 1), (6, 'php', 'a', 'Restful是目前最流行的 API 设计规范，用于 Web 数据接口的设计。下列不属于Restful架构特点的是()', '每一个URI代表一种资源，资源表示一种实体，URI可以写成动词+名词的形式操作对应实体的数据', '客户端和服务器之间，传递这种资源的某种表现层', '客户端通过HTTP动词，对服务器端资源进行操作，实现\'表现层状态转化\'', 'RESTful 的核心思想就是，客户端发出的数据操作指令都是\'动词 + 宾语\'的结构。比如，GET /articles这个命令，GET是动词，/articles是宾语', '每一个URI代表一种资源，资源表示一种实体，URI可以写成动词+名词的形式操作对应实体的数据', 01640089489, 2, 1), (7, 'php', 'a', '下列接口描述不正确的是（  ）', '接口设计时，需要考虑接口的安全性', '客户端和服务端针对不同接口统一做好加密工作，服务端在每次接口需要时只有会员接口需要进行验证', '接口可以简单分为三种：普通接口、表单接口、会员接口', '会员接口需要登录才可以访问内容，而其他接口则不需要', '会员接口需要登录才可以访问内容，而其他接口则不需要', 01640089490, 2, 1), (8, 'php', 'a', '在Restful接口中，某些动作是HTTP动词表示不了的，如汇款时从账户1向账户2汇款500元，正确的写法是 ()', 'POST /accounts/1/transfer/500/to/2', 'GET /accounts/1/transfer/500/to/2', 'POST /transaction from=1&to=2&amount=500.00', 'GET /transaction/from=1&to=2&amount=500.0', 'POST /transaction from=1&to=2&amount=500.00', 01694967295, 2, 1), (9, 'php', 'a', '有关JSON描述错误的是（）', 'JSON 指的是 JavaScript 对象表示法', 'JSON 是存储和交换文本信息的语法，类似 XML', 'JSON 比 XML体积稍大，但是更快，更易解析', 'JSON 是轻量级的文本数据交换格式', 'JSON 比 XML体积稍大，但是更快，更易解析', 01640089445, 2, 1), (10, 'php', 'a', '关于使用PHP类库说法正确的是（）', '在使用特定类库时无需引入该类库', '使用类库可以帮助我们更加快捷的完成某些功能的编写', '引入类库时只能使用include引入方式', '其他选项都不正确', '使用类库可以帮助我们更加快捷的完成某些功能的编写', 01694967295, 2, 1), (11, 'php', 'a', 'Web程序通常采用MVC架构来设计，数据库相关操作属于（）？', 'Model', 'Controller', '都不属于', 'View', 'Model', 01640089423, 2, 1), (12, 'php', 'a', 'MVC是一种常见的架构。以下描述正确的是？ （）', '只有Web系统才能使用MVC', '只有能够保存正在数据库里面的实体才能称之为模型（Model）', '只有以HTML形式显示的页面才是视图（View）', '模型变更之后，只有控制器（Controller）才能驱动视图变更或重新渲染视图', '模型变更之后，只有控制器（Controller）才能驱动视图变更或重新渲染视图', 01640089478, 2, 1), (13, 'html', 'a', '在HTML页面中，下列选项除了（     ）都属于鼠标相关事件。', 'onClick', 'onMouseDown', 'onMouseOver', ' onChange', 'onChange', 01640089412, 1, 1), (14, 'JQuery', 'a', '在jQuery中，如果想要停止个动画，用(   )函数来实现。', 'remov()', 'forbidden()', 'hide()', 'stop()', 'stop()', 01640089434, 1, 1);
COMMIT;

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `question_id` int NOT NULL,
  `create_time` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 83 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of test
-- ----------------------------
BEGIN;
INSERT INTO `test` VALUES (1, '平台第二次测试', 'admin', 12, 1640499571), (2, '平台第二次测试', 'admin', 10, 1640499571), (3, '平台第二次测试', 'admin', 11, 1640499571), (4, '平台第三次测试', 'admin', 13, 1640499571), (16, '平台第一次测试', 'admin', 1, 1640499571), (17, '平台第一次测试', 'admin', 8, 1640499571), (18, '平台第一次测试', 'admin', 9, 1640499571), (19, '平台第一次测试', 'admin', 5, 1640499571), (20, '平台第一次测试', 'admin', 7, 1640499571), (77, '平台第四次测试', 'admin2', 3, 1641377573), (78, '平台第四次测试', 'admin2', 4, 1641377573), (79, '平台第四次测试', 'admin2', 7, 1641377573), (80, '平台第五次测试', 'admin2', 1, 1641380503), (81, '平台第五次测试', 'admin2', 4, 1641380503), (82, '平台第五次测试', 'admin2', 6, 1641380503);
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nickname` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `num` int NOT NULL,
  `create_time` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'a', '1', 'aaaa', 'anngreen.jpeg', '2021-12-23', 0, 1640268836), (2, 'b', '2', 'bbb', 'icon.png', '2021-12-01', 1, 1638774695), (3, 'tom', 'tom666', 'Tom', 'IMG_7473.JPG', '2021-12-31', 5, 1640457345), (8, 'anna123', '123', 'Anna', 'kfc.png', '2021-12-25', 2, 1640456444), (9, 'luna', 'lua123', 'IsLuna', 'mla.jpg', '2021-12-25', 3, 1640456990), (10, 'mike', 'mike1314', 'somike', 'QQ20181029-230434@2x.png', '2021-12-15', 4, 1640457055);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
