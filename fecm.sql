/*
Navicat MySQL Data Transfer

Source Server         : fecm
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : fecm

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-03-18 16:43:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for fecm_bugdata
-- ----------------------------
DROP TABLE IF EXISTS `fecm_bugdata`;
CREATE TABLE `fecm_bugdata` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(300) NOT NULL,
  `category` varchar(100) NOT NULL,
  `cookies` varchar(2000) NOT NULL,
  `ua` varchar(200) NOT NULL,
  `hxff_ip` varchar(100) NOT NULL COMMENT 'HTTP_X_FORWARDED_FOR获取的IP',
  `hci_ip` varchar(100) NOT NULL COMMENT 'HTTP_CLIENT_IP获取的IP',
  `ra_ip` varchar(100) NOT NULL COMMENT 'REMOTE_ADDR获取的IP',
  `time` date NOT NULL,
  `fixes` varchar(2) NOT NULL DEFAULT '0' COMMENT '0为未修复，1为已修复',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fecm_bugdata
-- ----------------------------
INSERT INTO `fecm_bugdata` VALUES ('1', 'http://fecm.cn/Details', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-07', '1');
INSERT INTO `fecm_bugdata` VALUES ('2', 'http://www.kancloud.cn/manual/thinkphp/1873', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-07', '0');
INSERT INTO `fecm_bugdata` VALUES ('3', 'https://www.baidu.com/s?ie=utf-8&f=8&rsv_bp=1&tn=baidu&wd=%E8%AF%A6%E6%83%85%E8%8B%B1%E6%96%87&oq=%E6%BC%8F%E6%B4%9E%E8%8B%B1%E6%96%87&rsv_pq=bbc4a8d80006b022&rsv_t=f5c8vM%2BZvq6H5Bn4txcYTCOt%2FZ9NwXhE%2BLdnxk6EKXkU8yknonJyqv3LvuI&rsv_enter=1&rsv_sug3=33&rsv_sug1=15&rsv_sug7=100&bs=%E6%BC%8F%E6%B4%9', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-07', '1');
INSERT INTO `fecm_bugdata` VALUES ('4', 'http://www.kancloud.cn/manual/thinkphp/1721', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-07', '0');
INSERT INTO `fecm_bugdata` VALUES ('5', 'http://v3.bootcss.com/components/#panels', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-07', '1');
INSERT INTO `fecm_bugdata` VALUES ('6', 'http://www.bootcss.com/', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-02', '1');
INSERT INTO `fecm_bugdata` VALUES ('7', 'http://www.kancloud.cn/thinkphp/thinkphp_quickstart/35577', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-07', '1');
INSERT INTO `fecm_bugdata` VALUES ('9', 'http://weibo.com/comelove/home?wvr=5&c=spr_sinamktbd_bd_baidub_weibo_t001', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-05', '0');
INSERT INTO `fecm_bugdata` VALUES ('10', 'http://www.freebuf.com/', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-09', '1');
INSERT INTO `fecm_bugdata` VALUES ('11', 'http://drops.wooyun.org/', '触发alret函数', 'font-size=1; font-theme=0; pgv_pvi=9205693440; PHPSESSID=2b771fdh5l306tvdidr47qmg23; __login__=http%3A%2F%2Fwww.kancloud.cn%2F; Hm_lvt_ee21b19ea80b048a0b089c41510c37db=1453735143,1454422053; Hm_lpvt_ee21b19ea80b048a0b089c41510c37db=1454422215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/37.0.2062.120 Chrome/37.0.2062.120 Safari/537.36', '123.456.789.001', '125.154.254.361', '125.154.254.361', '2016-03-09', '0');
INSERT INTO `fecm_bugdata` VALUES ('25', 'http://xxxo.cn/defenderXssTest.html', '触发alret函数', 'PHPSESSID=d1810b920os4evu04et8a1tcv0; pgv_pvi=8669731840; pgv_si=s3533342720; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; thinkphp_show_page_trace=0|3; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-09', '1');
INSERT INTO `fecm_bugdata` VALUES ('24', 'http://ixss.warsong.pw/4acRJB?1457104953', '触发alret函数', 'PHPSESSID=d1810b920os4evu04et8a1tcv0; pgv_pvi=8669731840; pgv_si=s3533342720; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; thinkphp_show_page_trace=0|3; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-09', '1');
INSERT INTO `fecm_bugdata` VALUES ('28', 'http://xxx.cn/defenderXssTest.html', '触发alret函数', 'PHPSESSID=d1810b920os4evu04et8a1tcv0; pgv_pvi=8669731840; pgv_si=s3533342720; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; thinkphp_show_page_trace=0|3; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-09', '0');
INSERT INTO `fecm_bugdata` VALUES ('22', 'http://fecm.cn/test.html', '触发alret函数', 'PHPSESSID=d1810b920os4evu04et8a1tcv0; pgv_pvi=8669731840; pgv_si=s3533342720; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; thinkphp_show_page_trace=0|3; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-09', '0');
INSERT INTO `fecm_bugdata` VALUES ('26', 'http://fecm.cn/Details', '触发alret函数', 'PHPSESSID=d1810b920os4evu04et8a1tcv0; pgv_pvi=8669731840; pgv_si=s3533342720; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; thinkphp_show_page_trace=0|3; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-09', '1');
INSERT INTO `fecm_bugdata` VALUES ('27', 'http://fecm.cn/Details', '触发alret函数', 'PHPSESSID=d1810b920os4evu04et8a1tcv0; pgv_pvi=8669731840; pgv_si=s3533342720; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; thinkphp_show_page_trace=0|3; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-09', '1');
INSERT INTO `fecm_bugdata` VALUES ('29', 'https://www.baidu.com/s?ie=UTF-8&amp;wd=category', '触发alret函数', 'pgv_pvi=8669731840; PHPSESSID=o5oo44m6agllq4r88p2odpjel4; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-18', '0');
INSERT INTO `fecm_bugdata` VALUES ('31', 'http://codeio.cn/defenderXssTest.html', '发现不在白名单里的第三方JavaScript资源', 'pgv_pvi=8669731840; PHPSESSID=o5oo44m6agllq4r88p2odpjel4; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-18', '0');
INSERT INTO `fecm_bugdata` VALUES ('32', 'http://codeio.cn/defenderXssTest.html', '发现不在白名单里的第三方JavaScript资源', 'pgv_pvi=8669731840; PHPSESSID=o5oo44m6agllq4r88p2odpjel4; FECM_uid=f67541ff7112d31cdeb9c7dc1f6faaa2; FECM_flag=c5541ff7e9a7ccff7112d7ccec67b4eaa131655038d6045038dc1969e52d364c58d364c58; ', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', '攻击者没有通过代理服务器访问', '攻击者数据包头部没有HTTP_CLIENT_IP', '127.0.0.1', '2016-03-18', '0');

-- ----------------------------
-- Table structure for fecm_user
-- ----------------------------
DROP TABLE IF EXISTS `fecm_user`;
CREATE TABLE `fecm_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `md5name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fecm_user
-- ----------------------------
INSERT INTO `fecm_user` VALUES ('1', 'Black-Hole', 'f67541ff7112d31cdeb9c7dc1f6faaa2', 'c56d0e9a7ccec67b4ea131655038d604', '158099591@qq.com', '2016-03-03');
