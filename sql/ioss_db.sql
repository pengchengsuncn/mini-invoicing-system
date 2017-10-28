

--
-- 数据库: `ioss`
--
DROP DATABASE `ioss`;
CREATE DATABASE `ioss` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `ioss`;

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--
-- 创建时间: 2014 年 05 月 23 日 05:06
--

CREATE TABLE IF NOT EXISTS `goods` (
  `gods_id` int(11) NOT NULL AUTO_INCREMENT,
  `bar_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `gods_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `gods_type` int(11) NOT NULL,
  `gods_unit` int(11) NOT NULL,
  `gods_size` varchar(50) COLLATE utf8_bin DEFAULT '暂无规格信息',
  `gods_price` float(6,2) NOT NULL,
  `sell_price` float(6,2) NOT NULL,
  `gods_amount` int(11) NOT NULL,
  `gods_vendor` int(11) NOT NULL,
  `in_operator` int(11) NOT NULL,
  `in_date` date NOT NULL,
  `sell_flag` char(1) COLLATE utf8_bin DEFAULT 'Y',
  `gods_desc` varchar(200) COLLATE utf8_bin DEFAULT '暂无描述信息',
  PRIMARY KEY (`gods_id`),
  UNIQUE KEY `bar_code` (`bar_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`gods_id`, `bar_code`, `gods_name`, `gods_type`, `gods_unit`, `gods_size`, `gods_price`, `gods_amount`, `gods_vendor`, `in_operator`, `in_date`, `sell_flag`, `gods_desc`) VALUES
(1, '78945514', '小瓶和其正', 2, 4, '暂无信息', 2.50, 123, 3, 1, '2014-05-23', 'Y', '清热解渴，你值得 拥有！'),
(2, '5425631', '唐僧超级辣条', 1, 6, '暂无信息', 1.03, 25, 1, 1, '2014-05-23', 'Y', '很好吃的哦'),
(3, '01234567', '田字格作业本', 5, 3, '暂无信息', 1.20, 36, 3, 1, '2014-05-23', 'Y', '小学生用的哦'),
(4, '784512456', 'Inter Core Pro Family', 4, 3, '20cm*14cm', 378.00, 12, 2, 1, '2014-05-25', 'Y', '这个到底是什么商品呢');

-- --------------------------------------------------------

--
-- 表的结构 `goods_type`
--
-- 创建时间: 2014 年 05 月 23 日 04:43
--

CREATE TABLE IF NOT EXISTS `goods_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `type_desc` varchar(200) COLLATE utf8_bin DEFAULT "暂无描述信息",
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_name` (`type_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `goods_type`
--

INSERT INTO `goods_type` (`type_id`, `type_name`, `type_desc`) VALUES
(1, '小食品', '这里的小食品好好吃啊'),
(2, '饮料类', '你渴了没有啊，来喝点吧'),
(4, '儿童玩具', '好好玩玩吧，你是最棒的'),
(5, '图书类型', '知识修养，就看你了'),
(6, '家用电气额', '大家电、小家电，这里都有销售。');

-- --------------------------------------------------------

--
-- 表的结构 `supplier`
--
-- 创建时间: 2014 年 05 月 24 日 08:46
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `sup_tel` varchar(20) COLLATE utf8_bin DEFAULT "暂无联系电话",
  `sup_addr` varchar(200) COLLATE utf8_bin DEFAULT "暂无地址信息",
  `sup_desc` varchar(300) COLLATE utf8_bin DEFAULT '暂无描述信息',
  `create_date` date NOT NULL,
  PRIMARY KEY (`sup_id`),
  UNIQUE KEY `sup_name` (`sup_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_tel`, `sup_addr`, `sup_desc`, `create_date`) VALUES
(2, '新奇食品', '13655458964', '深圳市福田区酒仙桥28号', '送货速度挺快的!', '2014-05-24'),
(3, '上好佳食品', '15895412568', '广州市马驹桥文化路3号', '供货价格便宜!', '2014-05-24'),
(4, '日中百货', '13684569254', '北京市经济技术开发区', '很热心肠的一个人', '2014-05-25');

-- --------------------------------------------------------

--
-- 表的结构 `units`
--
-- 创建时间: 2014 年 05 月 25 日 04:18
--

CREATE TABLE IF NOT EXISTS `units` (
  `un_id` int(11) NOT NULL AUTO_INCREMENT ,
  `un_name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`un_id`),
  UNIQUE KEY `un_name` (`un_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `units`
--

INSERT INTO `units` (`un_id`, `un_name`) VALUES
(2, '个'),
(1, '包'),
(6, '斤'),
(4, '条'),
(3, '瓶'),
(7, '盒'),
(8, '米'),
(5, '颗');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--
-- 创建时间: 2014 年 05 月 21 日 15:39
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `sign_pwd` varchar(32) COLLATE utf8_bin NOT NULL,
  `usr_role` varchar(3) COLLATE utf8_bin DEFAULT 'emp',
  `create_date` date NOT NULL ,
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_name` (`usr_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `sign_pwd`, `usr_role`, `create_date`) VALUES
(1, '王海亮', '456321', 'adm', '2014-05-18'),
(2, '张三丰', '123456', 'usr', '2014-05-23'),
(3, '李四', '123456', 'usr', '2014-05-23');
