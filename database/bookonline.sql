-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2015 at 06:26 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL,
  `special` tinyint(1) DEFAULT '0',
  `sale_off` text,
  `picture` text,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `price`, `special`, `sale_off`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `category_id`) VALUES
(1, 'Practical PHP Testing', '<p style="text-align:justify;">What is unit testing and why a php programmer shouldadopt it? It may seem simple, but testing is the only way to ensure your work is completed and you will not called in the middle of the night by a client whose website is going nuts. The need for quality is particularly present in the php environment, where it is very simple to deploy an interpreted script, but it is also very simple to break something: a missing semicolon in a common file can halt the entire application. Table of Contents PHPUnit usage Write clever tests Assertions Fixtures Annotations Refactoring and patterns Stubs Mocks Command line options The TDD theory Testing sqrt()</p>\r\n', 50000, 0, '{"type":"percent","value":"50"}', 'book_sFQJrM4w.jpg', '2013-12-12 00:00:00', 'admin', '2014-12-30 13:16:33', 'admin', 1, 1, 21),
(2, 'Doctrine ORM for PHP', '<p style="text-align:justify;">Doctrine is an object relational mapper (ORM) for PHP 5.2.3+ that sits on top of a powerful database abstraction layer (DBAL). One of its key features is the option to write database queries in a proprietary object oriented SQL dialect called <strong>Doctrine Query Language (DQL</strong>), inspired by Hibernates HQL.</p>\r\n\r\n<p style="text-align:justify;">This provides developers with a powerful alternative to SQL that maintains flexibility without requiring unnecessary code duplication.</p>\r\n', 500000, 0, '{"type":"number","value":"20000"}', 'book_uTFdgqR5.jpg', '2013-12-12 00:00:00', 'admin', '2014-12-30 09:38:11', 'admin', 1, 2, 21),
(29, 'Beginner to Intermediate PHP5', '<p>This free php book includes numerous additional tips, the basics of PHP, MySQL query examples, regular expressions syntax, and two indexes to help you find information faster: a common language index and a function index. When the internet is not around or you want a simpler explanation along with all the technical details, this book has all of that and more.</p>\r\n\r\n<p><strong>Table of Contents</strong></p>\r\n\r\n<ul><li>Miscellaneous Things You Should Know</li>\r\n	<li>Operators</li>\r\n	<li>Control Structures</li>\r\n	<li>Global Variables</li>\r\n	<li>Variable Functions</li>\r\n	<li>String Functions</li>\r\n	<li>Array Functions</li>\r\n	<li>Date/Time Functions</li>\r\n	<li>Mathematical Functions</li>\r\n	<li>MySQL Functions</li>\r\n	<li>Directory &amp; File System Functions</li>\r\n	<li>Output Control (Output Buffer)</li>\r\n	<li>Sessions</li>\r\n	<li>Regular Expressions</li>\r\n</ul>', 50000, 0, NULL, 'book_iTDqahL9.jpg', '2014-12-30 08:21:02', NULL, '2014-12-30 08:22:50', NULL, 1, 2, 21),
(30, 'Zend Framework 2 for Beginners is Ready', '<p style="text-align:justify;"><strong>The book</strong> aims to help developers new to Zend Framework 2 get started the right way. What I mean by the right way, is that the book focuses on the key information you need to know.</p>\r\n\r\n<p style="text-align:justify;">As there’s so much to learn, it’s not an easy task to distill it down to the essentials. And you can easily get lost up dark alleyways and waste a lot of time, unnecessarily.</p>\r\n\r\n<p style="text-align:justify;">So it focuses on the core patterns and sections, such as <em>views</em>, <em>view helpers</em>, <em>controllers</em>, <em>actions</em>, <em>modules</em>,<em>configuration</em>, <em>routing</em>, <em>models</em>, <em>datasources</em>, and <em>caching</em> (amongst other areas) along with the key patterns which underpin Zend Framework 2.</p>\r\n\r\n<p style="text-align:justify;">Along with that, it’s packed with best-practices and hands-on tips, picked up from using the framework on large projects and from the shared experiences of others who use it regularly and contribute to the framework.</p>\r\n', 48000, 0, '{"type":"percent","value":"20"}', 'book_qJ8wTQgr.png', '2014-12-30 08:25:16', NULL, '2015-01-07 05:41:36', NULL, 1, 2, 22),
(31, 'Zend Framework in Action', '<p style="text-align:justify;">It features - ZF features and components - ZF''s MVC architecture and its benefits - Ow to integrate ZF using web services Brief TOC The Essentials A Core Application More Power to Your Application</p>\r\n', 32000, 0, '{"type":"percent","value":"20"}', 'book_EAGDwVTU.jpg', '2014-12-30 08:26:47', NULL, NULL, NULL, 1, 2, 22),
(32, 'Zend Framework 2.0 by Example', '<p style="text-align:justify;">ZF2 is the latest update to the well-known Zend Framework. This version has considerably eased the process of building complex web applications with minimal development effort using plug and play components. ZF2 also provides a highly robust and scalable frameworkfor developing web applications. Zend Framework 2.0 by Example: Beginner''s Guide - will guide you through the process of developing powerful web applications using ZF2. It covers all aspects of Zend Framework application development right from installation and configuration; the tasks are designed in a way that readers can easily understand and use them to build their own applications with ease.</p>\r\n', 65000, 0, '{"type":"percent","value":"20"}', 'book_kSGjva1h.png', '2014-12-30 08:29:08', NULL, '2015-01-10 11:35:46', NULL, 1, 1, 19),
(33, 'SSIS Succinctly', '<p style="text-align:justify;"><span style="color:rgb(34,34,34);">SQL Server Integration Services is part of Microsoft’s business intelligence suite and an ETL (extract, transform, and load) tool. With SSIS Succinctly by Rui Machado, you will learn how to build and deploy your own ETL solution in a drag-and-drop development environment by using SSIS packages, control flows, data flows, tasks, and more. </span></p>\r\n', 23000, 0, NULL, 'book_eGoUhEQ5.png', '2014-12-30 08:30:58', NULL, '2014-12-30 12:52:04', NULL, 1, 2, 18),
(34, 'Data Mining for the Masses', '<p style="text-align:justify;">In Data Mining for the Masses, professor Matt North—a former risk analyst and database developer for eBay.com—uses simple examples, clear explanations and free, powerful, easy-to-use software to teach you the basics of data mining; techniques that can help you answer some of your toughest business questions.</p>\r\n\r\n<p style="text-align:justify;"><strong>Description</strong></p>\r\n\r\n<p style="text-align:justify;">Topics included: Introduction to Data Mining and CRISP-DM 3 • Organizational Understanding and Data Understanding • Data Preparation • Correlation • Association Rules • k-Means Clustering • Discriminant Analysis • Linear Regression • Logistic Regression • Decision Trees • Neural Networks • Text Mining • Evaluation and Deployment • Data Mining Ethics</p>\r\n', 56000, 0, '{"type":"percent","value":"20"}', 'book_Id0NhS8U.jpg', '2014-12-30 08:32:12', NULL, NULL, NULL, 1, 4, 18),
(35, 'Twitter Bootstrap 3 Succinctly', '<p style="text-align:justify;"><span style="color:rgb(34,34,34);">Learn the new and improved features in the latest version of Twitter Bootstrap. With Twitter Bootstrap 3 Succinctly, developers will transition smoothly into the newest version of Twitter Bootstrap, which boasts an emphasis on mobile development</span></p>\r\n', 45000, 0, '{"type":"percent","value":"20"}', 'book_EgiC9dVY.png', '2014-12-30 08:33:27', NULL, NULL, NULL, 1, 4, 17),
(36, 'Modern Web Essentials Using JavaScript and HTML5', '<p style="text-align:justify;"><span style="color:rgb(34,34,34);">Developing single page applications with JavaScript and HTML5 solves an enterprise pain point – how to reach users on various platforms without diminishing user experience. This book provides tools for a thorough understanding of three topics integral to effective enterprise-level, web SPA development: JavaScript language essentials, HTML5 specification features, and responsive design principles.</span></p>\r\n', 86000, 0, '{"type":"percent","value":"20"}', 'book_EXIwGsd8.jpg', '2014-12-30 08:34:23', NULL, NULL, NULL, 1, 1, 17),
(37, 'Tablet Web Design Best Practices', '<p style="text-align:justify;"> </p>\r\n\r\n<ul><li style="text-align:justify;"><span style="color:rgb(34,34,34);">creating amazing website experiences on tablet devices. </span></li>\r\n	<li style="text-align:justify;"><span style="color:rgb(34,34,34);">creating amazing website experiences on tablet devices. </span></li>\r\n</ul><p style="text-align:justify;"> </p>\r\n', 98000, 0, '{"type":"number","value":"12000"}', 'book_oJBUVtWu.png', '2014-12-30 08:35:41', NULL, '2015-01-08 11:54:34', NULL, 1, 3, 17),
(38, 'Đêm Định Mệnh', '<p style="text-align:justify;">Thậm chí sau mười hai năm, trở lại trong dáng vẻ một người thành đạt, mang cái họ của người chồng vắn số, Faith vẫn bị hắt hủi do ngoại hình của cô giống hệt người mẹ xinh đẹp nhưng lăng loàn. Tuy vậy, giờ đây, cô không gào thét trong câm lặng rằng “tôi khác” nữa mà sẽ thể hiện cho đến khi nhận được sự tôn trọng của tất cả người dân nơi này - đặc biệt là Gray Rouillard.</p>\r\n\r\n<p style="text-align:justify;">Anh vừa là tia sáng duy nhất trong suốt quãng đời thơ ấu của Faith, đồng thời là bóng ma lớn nhất thuộc về quá khứ mà cô muốn gạt bỏ. Lẽ sống của Faith trong chuỗi ngày u ám thuở bé là cơ hội được thấy bóng dáng Gray, được nghe giọng nói của anh. Cô chỉ dám ao ước bấy nhiêu đó thôi. Giấc mơ có được người con trai sáng giá của gia đình Rouillard quyền thế là quá xa vời.</p>\r\n\r\n<p style="text-align:justify;">Và giấc mơ ấy đã vỡ tan trong một đêm hè khi Gray, giận dữ nghĩ rằng cha bỏ đi dệt mộng uyên ương với mẹ của Faith, quyết định tống khứ cả nhà cô ra khỏi quận cùng câu sỉ vả “Cô là đồ rác rưởi”. Những mảnh vỡ của giấc mơ cứa vào lòng Faith trong suốt mười hai năm xa xứ. Tưởng chừng đó là liều thuốc đắng chữa căn bệnh si tình của cô, ngờ đâu khi gặp lại Gray, cô biết mình luôn là mảnh kim loại bé nhỏ trước sức hút của anh.</p>\r\n', 87000, 0, NULL, 'book_yU3mkuDI.jpg', '2014-12-30 08:41:35', NULL, NULL, NULL, 1, 3, 13),
(39, 'Ở Đây Có Nắng', '<p style="text-align:justify;">Với <strong>Ở đây có nắng</strong>, đạo diễn điện ảnh <strong>Việt Linh</strong> muốn kể chuyện “theo cách thức montage điện ảnh”, làm “một bộ phim truyền hình nhiều tập trên giấy”, “làm phim qua chữ”.</p>\r\n\r\n<p style="text-align:justify;">Những phân cảnh như những câu chuyện nhỏ, được gắn kết lại thành một câu chuyện dài, kể cho bạn nghe nhiều uẩn khúc cuộc đời. Bắt đầu bằng chuyến trở về Việt Nam của Phan Sinh khi anh được biết mình là con nuôi trong một gia đình Việt kiều Pháp. Mở dần ra theo chuyến đi nhiều bí mật bấy lâu bị che giấu bên cạnh những chuyện muôn thuở của cuộc sống: Hội ngộ rồi chia ly tình yêu và hận thù, tài năng cùng người hâm mộ, rồi nỗi buồn, niềm vui, hạnh phúc…</p>\r\n', 96000, 1, '{"type":"percent","value":"20"}', 'book_NfQrIYw1.jpg', '2014-12-30 08:43:00', '2', '2015-01-08 14:02:12', NULL, 1, 31, 13),
(40, 'You Can Win - Bí Quyết Của Người Chiến Thắng', '<p style="text-align:justify;">Với cách đặt vấn đề dễ hiểu, thiết thực và sâu sắc, <strong>Bí quyết của người chiến thắng</strong> sẽ giúp bạn tránh rơi vào cảm giác mất phương hướng, biết xác định mục tiêu và những giá trị cần ưu tiên trong cuộc sống. Có thể xem cuốn sách này như một quyển sổ tay liệt kê những công cụ cần thiết để kiến tao thành công và giúp bạn tạo lập một cuộc sống tốt đẹp. Cũng có thể xem nó như một cuốn cảm nang dạy nấu ăn, bao gồm những chỉ dần về nguyên liệu, công thức và cách pha trộn theo tỉ lệ thích hợp để có được thành công.</p>\r\n\r\n<p style="text-align:justify;">Nhưng trên hết, đây là cuốn sách từng bước dẫn dặt bạn đi từ mơ ước, khát vọng thành công đến khám phá năng lực của bản thân và biến ước mơ thành hiện thực.   Bí quyết sẽ giúp bạn xây dựng mục tiêu mới, hình thành ý niệm mới về mục đích sống, phát triển tư tưởng mới về bản thân và tương lai.</p>\r\n\r\n<p style="text-align:justify;">Một trong những mục đích của cuốn sách là giúp bạn đề ra kế hoạch hành động cho tương lai. Nếu chưa bao giờ làm vậy, bạn hãy xác định xem:</p>\r\n\r\n<p style="text-align:justify;">- Bạn muốn đạt được điều gì?</p>\r\n\r\n<p style="text-align:justify;">- Bạn muốn đạt được mục tiêu bằng cách nào?</p>\r\n\r\n<p style="text-align:justify;">- Thời điểm bạn muốn đạt được mục tiêu là khi nào?</p>\r\n\r\n<p style="text-align:justify;">Những nguyên tắc trình bày trong cuốn sách đều mang tính phổ quát, áp dụng cho mọi tình huống, tổ chức hoặc quốc gia. Hy vọng cuốn sách sẽ mang lại cho bạn nhiều điều mới mẻ và những khám phá thú vị.</p>\r\n', 54000, 1, '{"type":"percent","value":"15"}', 'book_D5xNAnFE.jpg', '2014-12-30 08:45:41', NULL, NULL, NULL, 1, 12, 14),
(41, 'Cuộc Chiến SmartPhone', '<p>Năm 2007, Apple đã tái định nghĩa danh từ "smartphone" một cách đúng đắn nhất bằng việc cho trình làng có chiếc Iphoen đầu tiên, một chiếc điện thoại có tính năng siêu việt, tương tác thông minh với người dùng. Cơn cuồng phong IPhone đã đốn gục gã khổng lồ đầy tự mãn Nokia, đồng thời lại khiến kẻ theo đuổi là Samsung thức tỉnh. Cũng từ đây, một cuộc chiến smartphone đã được khơi ngòi.</p>\r\n\r\n<p>Thông qua <strong>Cuộc chiến smartphone</strong>, cuốn sách được viết bởi người có hơn 10 năm kinh nghiệm làm việc trong công ty điện tử Samsung, chúng ta sẽ biết được cjo tiết các cuộc đua khốc liệt giữa các doanh nghiệp và sáng tạo trong ngành điện thoại di động, đặc biệt là giữa Apple và Samsung, để tạo ra được những chiếc smartphone siêu việt nắm giữ vị thế dẫn đầu thị trường thế giới. Và trên hết, chúng ta sẽ thấu hiểu được cách thức và nguyên do khiến Samsung, từ một kẻ theo sau hoàn toàn thiếu đi sự sáng tạo đã trở thành một doanh nghiệp sáng tạo hàng đầu thế giới, chống chọi với cơn cuồng phong iPhone đồng thời vượt lên trên cả Apple và Nokia trong thị trường smartphone. không chỉ dừng lại ở đó, Samsung còn tạo ra một khái niệm mới - Phablet (máy tính bảng lai). Một khái niệm đánh dấu bước ngoặt thay đổi lối sống của nhân loại đương thời.</p>\r\n', 80000, 1, '{"type":"number","value":"30000"}', 'book_2LVSRBDr.jpg', '2014-12-30 08:46:52', NULL, '2015-01-14 10:12:31', 'hailan', 1, 21, 14);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `books` text NOT NULL,
  `prices` text NOT NULL,
  `quantities` text NOT NULL,
  `names` text NOT NULL,
  `pictures` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `books`, `prices`, `quantities`, `names`, `pictures`, `status`, `date`) VALUES
('hxyikju', 'nvan', '["40","41"]', '["45900","80000"]', '["2","2"]', '["You Can Win - B\\u00ed Quy\\u1ebft C\\u1ee7a Ng\\u01b0\\u1eddi Chi\\u1ebfn Th\\u1eafng","Cu\\u1ed9c Chi\\u1ebfn SmartPhone"]', '["book_D5xNAnFE.jpg","book_2LVSRBDr.jpg"]', 0, '2015-01-16 05:36:16'),
('rljm7f4', 'nvan', '["40"]', '["45900"]', '["1"]', '["You Can Win - B\\u00ed Quy\\u1ebft C\\u1ee7a Ng\\u01b0\\u1eddi Chi\\u1ebfn Th\\u1eafng"]', '["book_D5xNAnFE.jpg"]', 0, '2015-01-16 06:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `left` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`, `parent`, `level`, `left`, `right`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Root', '', 1, 0, 0, 0, 29, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(15, 'Computers & Internet', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 1, 1, 13, 26, '2014-12-29 14:18:32', '', '2015-01-07 07:51:43', ''),
(13, 'Literature - Novels', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them. </span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 1, 1, 27, 28, '2014-12-29 14:17:38', '', '2015-01-07 07:52:56', ''),
(14, 'Business & Investing', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 1, 1, 9, 10, '2014-12-29 14:18:19', '', '2015-01-07 07:52:16', ''),
(17, 'Web Design', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 15, 2, 18, 19, '2014-12-29 14:19:27', '', '2015-01-07 07:51:56', ''),
(18, 'Databases', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 15, 2, 16, 17, '2014-12-29 14:19:48', '', '2015-01-07 07:51:51', ''),
(19, 'Programming', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 15, 2, 20, 25, '2014-12-29 14:20:35', '', '2015-01-07 07:52:01', ''),
(20, 'Project Management ', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 15, 2, 14, 15, '2014-12-29 14:21:17', '', '2015-01-07 07:51:47', ''),
(21, 'PHP Programming', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 19, 3, 21, 22, '2014-12-29 14:42:20', '', '2015-01-07 07:52:05', ''),
(22, 'Zend Framework 2.x', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 19, 3, 23, 24, '2014-12-29 14:42:39', '', '2015-01-07 07:52:10', ''),
(26, 'Arts & Photography', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 1, 1, 1, 2, '2015-01-07 07:53:43', '', '0000-00-00 00:00:00', ''),
(27, 'Audiobooks', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 1, 1, 3, 8, '2015-01-07 07:54:12', '', '0000-00-00 00:00:00', ''),
(28, 'Children''s Books', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 27, 2, 4, 5, '2015-01-07 07:54:35', '', '0000-00-00 00:00:00', ''),
(29, 'Audible Audiobooks', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 27, 2, 6, 7, '2015-01-07 07:55:02', '', '0000-00-00 00:00:00', ''),
(30, 'Cooking, Food & Wine', '<p style="text-align:justify;"><strong>Well, reading books </strong><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some “esoteric” people could afford them.</span></p>\r\n\r\n<p style="text-align:justify;"><span style="background-color:rgb(247,247,247);color:rgb(126,126,126);">And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</span></p>\r\n', 1, 1, 1, 11, 12, '2015-01-07 07:56:48', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `group_acp` tinyint(1) NOT NULL DEFAULT '0',
  `permission_id` text NOT NULL,
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `status`, `ordering`, `group_acp`, `permission_id`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 'Manager', 1, 2, 1, '', '2013-11-07 00:00:00', 'admin', '2013-12-03 00:00:00', 'admin'),
(3, 'Member', 1, 1, 0, '', '2013-11-12 00:00:00', 'admin', '2014-02-18 00:00:00', 'admin'),
(4, 'Register', 1, 4, 0, '', '2015-01-12 10:56:06', 'admin', '0000-00-00 00:00:00', NULL),
(1, 'Admin', 1, 3, 1, '[1,2,3,4,5]', '2014-12-02 05:54:41', 'admin', '2014-12-03 05:10:41', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `nested`
--

CREATE TABLE IF NOT EXISTS `nested` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `left` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nested`
--

INSERT INTO `nested` (`id`, `name`, `status`, `parent`, `level`, `left`, `right`) VALUES
(1, 'Root', 1, 0, 0, 0, 15),
(2, 'A', 1, 1, 1, 1, 2),
(3, 'B', 1, 1, 1, 3, 6),
(4, 'C', 1, 1, 1, 7, 8),
(6, 'E', 1, 1, 1, 9, 10),
(7, 'B1', 1, 3, 2, 4, 5),
(8, 'D1', 1, 1, 1, 11, 12),
(9, 'D2', 1, 1, 1, 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `module` varchar(45) NOT NULL,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `module`, `controller`, `action`) VALUES
(1, 'Hiển thị danh sách các quyển sách', 'admin', 'book', 'index'),
(2, 'Thay đổi status của một quyển sách', 'admin', 'book', 'status'),
(3, 'Thay đổi status của nhiều quyển sách', 'admin', 'book', 'multi-status'),
(4, 'Cập nhật (add, edit) thông tin một quyển sách', 'admin', 'book', 'form'),
(5, 'Xóa một quyển sách', 'admin', 'book', 'delete'),
(6, 'Admin control panel', 'admin', 'index', 'index');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL,
  `picture` text,
  `created` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `description`, `price`, `picture`, `created`, `created_by`, `modified`, `modified_by`, `status`, `ordering`, `book_id`) VALUES
(1, 'Practical PHP Testing', '<p style="text-align:justify;">What is unit testing and why a php programmer shouldadopt it? It may seem simple, but testing is the only way to ensure your work is completed and you will not called in the middle of the night by a client whose website is going nuts. The need for quality is particularly present in the php environment, where it is very simple to deploy an interpreted script, but it is also very simple to break something: a missing semicolon in a common file can halt the entire application. Table of Contents PHPUnit usage Write clever tests Assertions Fixtures Annotations Refactoring and patterns Stubs Mocks Command line options The TDD theory Testing sqrt()</p>\r\n', 50000, 'slide_sFQJrM4w.jpg', '2013-12-12 00:00:00', 'admin', '2014-12-30 13:16:33', 'admin', 1, 1, 1),
(3, 'Doctrine ORM for PHP', '<p style="text-align:justify;">Doctrine is an object relational mapper (ORM) for PHP 5.2.3+ that sits on top of a powerful database abstraction layer (DBAL). One of its key features is the option to write database queries in a proprietary object oriented SQL dialect called <strong>Doctrine Query Language (DQL</strong>), inspired by Hibernates HQL.</p>\r\n\r\n<p style="text-align:justify;">This provides developers with a powerful alternative to SQL that maintains flexibility without requiring unnecessary code duplication.</p>\r\n', 500000, 'slide_uTscgqR5.jpg', '2013-12-12 00:00:00', 'admin', '2014-12-30 09:38:11', 'admin', 1, 2, 31),
(4, 'SSIS Succinctly', '<p>Zend Framework là một thư viện các lớp được xây dựng trên nền tảng ngôn ngữ PHP, theo hướng OOP và được công ty Zend phát triển. Zend Framework được định hướng theo mô hình MVC và là một PHP framework ra đời khá trễ, chính vì vậy ZF đã thừa hưởng những tinh hoa của các framework</p>\r\n', 56000, 'slider_ijm2BhbN.jpg', '2015-01-06 04:21:44', NULL, '2015-01-06 04:21:44', NULL, 1, 3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `sign` text NOT NULL,
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(45) DEFAULT NULL,
  `modified` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(45) DEFAULT NULL,
  `register_time` datetime DEFAULT '0000-00-00 00:00:00',
  `register_ip` varchar(25) DEFAULT NULL,
  `active_code` varchar(45) NOT NULL,
  `active_time` datetime NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `ordering` int(11) DEFAULT '10',
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `fullname`, `password`, `avatar`, `sign`, `created`, `created_by`, `modified`, `modified_by`, `register_time`, `register_ip`, `active_code`, `active_time`, `status`, `ordering`, `group_id`) VALUES
(1, 'ronaldo', 'ronaldo@gmail.com', 'Admin 123456', 'e10adc3949ba59abbe56e057f20f883e', 'user_h6MNE8eQ.jpg', '<p>The HeadScript helper allows you to manage both. The HeadScript helper supports the following methods for setting and adding scripts</p>\r\n', '2014-12-10 08:55:35', 'admin', '2014-12-16 12:08:59', 'admin', '0000-00-00 00:00:00', NULL, '1', '0000-00-00 00:00:00', 1, 2, 4),
(2, 'admin123', 'Admin12345@gmail.com', 'Admin1234523', '7c6f3ef49405d8a330aaa19ca0d0f6af', 'user_ZMfhibF9.jpg', '<p><span style="color:#B22222;"><u><s><em><strong><span style="background-color:#FFFF00;">Sign</span></strong></em></s></u></span></p>\r\n', '2014-12-13 07:20:03', NULL, '2014-12-26 11:29:35', NULL, '0000-00-00 00:00:00', NULL, '', '0000-00-00 00:00:00', 1, 2, 1),
(30, 'nvan', 'lthlan54@gmail.com', 'Hai Lan 1234', 'e10adc3949ba59abbe56e057f20f883e', 'user_xCEfOzhZ.jpg', '', '2015-01-14 00:00:00', NULL, '2015-01-14 07:25:04', 'hailan', '2015-01-12 16:12:35', '127.0.0.1', '1', '2015-01-12 16:45:52', 1, 10, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
