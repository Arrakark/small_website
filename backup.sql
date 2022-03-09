-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2014 at 07:19 AM
-- Server version: 5.5.32-log
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sw`
--
CREATE DATABASE IF NOT EXISTS `admin_sw` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `admin_sw`;

-- --------------------------------------------------------

--
-- Table structure for table `sw_cat`
--

CREATE TABLE IF NOT EXISTS `sw_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_user_id` int(11) NOT NULL,
  `cat_title` varchar(120) NOT NULL,
  `cat_data` text NOT NULL,
  `cat_timeupdate` datetime NOT NULL,
  `cat_timeadd` datetime NOT NULL,
  `cat_status` tinyint(1) NOT NULL DEFAULT '1',
  `cat_navbar` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`),
  KEY `cat_user_id` (`cat_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sw_cat`
--

INSERT INTO `sw_cat` (`cat_id`, `cat_user_id`, `cat_title`, `cat_data`, `cat_timeupdate`, `cat_timeadd`, `cat_status`, `cat_navbar`) VALUES
(4, 1, 'Uncategorized', 'For all those posts that do not fit into a specific category.', '2013-12-22 18:16:04', '2013-12-22 18:16:04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sw_comment`
--

CREATE TABLE IF NOT EXISTS `sw_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_email` varchar(60) NOT NULL,
  `comment_data` varchar(120) NOT NULL,
  `comment_timeupdate` datetime NOT NULL,
  `comment_timeadd` datetime NOT NULL,
  `comment_post_id` int(11) DEFAULT NULL,
  `comment_user_ip` varchar(60) NOT NULL,
  `comment_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`comment_id`),
  KEY `comment_user_id` (`comment_email`,`comment_post_id`),
  KEY `comment_post_id` (`comment_post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sw_comment`
--

INSERT INTO `sw_comment` (`comment_id`, `comment_email`, `comment_data`, `comment_timeupdate`, `comment_timeadd`, `comment_post_id`, `comment_user_ip`, `comment_status`) VALUES
(1, 'user@example.com', 'This is a comment!', '2013-12-22 18:22:05', '2013-12-22 18:22:05', 8, '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sw_featured_img`
--

CREATE TABLE IF NOT EXISTS `sw_featured_img` (
  `media_id` int(11) NOT NULL,
  `img_title` varchar(60) NOT NULL,
  `img_text` varchar(255) NOT NULL,
  `link_text` varchar(60) NOT NULL,
  `link` varchar(120) NOT NULL,
  UNIQUE KEY `media_id` (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sw_featured_img`
--

INSERT INTO `sw_featured_img` (`media_id`, `img_title`, `img_text`, `link_text`, `link`) VALUES
(8, 'Welcome to Small Website!', 'Small website is a website system meant for speed and efficiency on home servers. Here you can start your own blog, page, or host media. Login to get started!', 'Login >', '/admin/');

-- --------------------------------------------------------

--
-- Table structure for table `sw_footer`
--

CREATE TABLE IF NOT EXISTS `sw_footer` (
  `footer_id` int(11) NOT NULL AUTO_INCREMENT,
  `footer_user_id` int(11) NOT NULL,
  `footer_data` varchar(120) NOT NULL,
  `footer_url` varchar(120) NOT NULL,
  `footer_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`footer_id`),
  KEY `footer_user_id` (`footer_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sw_footer`
--

INSERT INTO `sw_footer` (`footer_id`, `footer_user_id`, `footer_data`, `footer_url`, `footer_status`) VALUES
(1, 1, 'Admin Login', '/admin/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sw_media`
--

CREATE TABLE IF NOT EXISTS `sw_media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_user_id` int(11) NOT NULL,
  `media_title` varchar(120) NOT NULL,
  `media_image_data` varchar(120) NOT NULL,
  `media_video_data` varchar(120) NOT NULL,
  `media_timeupdate` datetime NOT NULL,
  `media_timeadd` datetime NOT NULL,
  `media_metadata` varchar(120) NOT NULL,
  `media_data` text NOT NULL,
  `media_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`media_id`),
  KEY `media_user_id` (`media_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sw_media`
--

INSERT INTO `sw_media` (`media_id`, `media_user_id`, `media_title`, `media_image_data`, `media_video_data`, `media_timeupdate`, `media_timeadd`, `media_metadata`, `media_data`, `media_status`) VALUES
(8, 1, 'CubeSats against solar panels', '/img/cubesat.jpg', '', '2013-12-22 18:27:17', '2013-12-22 18:27:17', '2859x2000', 'Here are three CubeSats that were deployed from the ISS. Each measure 10cm by 10cm and carry an experiment on board.', 1),
(9, 1, 'The International Space Station', '/img/iss.jpg', '', '2013-12-22 18:27:17', '2013-12-22 18:27:17', '960x638', 'Here is a picture of the ISS. The ISS orbits the earth about 370km away from the surface and travels roughly about at 7.71 km/s. ', 1),
(10, 2, 'Nexus 5 Wallpaper', '/img/nexus.jpg', '', '2013-12-27 21:28:01', '2013-12-27 21:28:01', '960x200', 'This is one of the backgrounds for the nexus.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sw_page`
--

CREATE TABLE IF NOT EXISTS `sw_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_user_id` int(11) NOT NULL,
  `page_title` varchar(120) NOT NULL,
  `page_data` text NOT NULL,
  `page_timeupdate` datetime NOT NULL,
  `page_timeadd` datetime NOT NULL,
  `page_status` tinyint(1) NOT NULL DEFAULT '1',
  `page_navbar` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_id`),
  KEY `page_user_id` (`page_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sw_page`
--

INSERT INTO `sw_page` (`page_id`, `page_user_id`, `page_title`, `page_data`, `page_timeupdate`, `page_timeadd`, `page_status`, `page_navbar`) VALUES
(1, 2, 'About', '<iframe width="100%" height="480" src="//www.youtube.com/embed/6tb0CwlQW0M" frameborder="0" allowfullscreen></iframe>\r\n<p>Small Website System is a fast, performance based website system that makes posting new content easy.</p>', '2014-01-01 17:42:17', '2013-12-22 18:21:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sw_post`
--

CREATE TABLE IF NOT EXISTS `sw_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_user_id` int(11) NOT NULL,
  `post_title` varchar(120) NOT NULL,
  `post_data` text NOT NULL,
  `post_timeupdate` datetime NOT NULL,
  `post_timeadd` datetime NOT NULL,
  `post_cat_id` int(11) DEFAULT NULL,
  `post_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`post_id`),
  KEY `post_user_id` (`post_user_id`,`post_cat_id`),
  KEY `post_cat_id` (`post_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sw_post`
--

INSERT INTO `sw_post` (`post_id`, `post_user_id`, `post_title`, `post_data`, `post_timeupdate`, `post_timeadd`, `post_cat_id`, `post_status`) VALUES
(8, 1, 'Hello, World!', '<iframe src="/php/image.php?md=9" scrolling="no">\r\n</iframe>\r\n<p>This is the very first post on your "Small Website" system. You can edit, delete, or modify this post. Start building your website today!</p>', '2014-01-01 13:42:51', '2013-12-22 18:14:48', 4, 1),
(18, 2, 'Welcome to Small Website!', '<p>This is the small website system. I will be updating this website often with downloadable updates and code samples.</p>', '2014-01-01 17:40:39', '2013-12-27 17:05:06', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sw_setting`
--

CREATE TABLE IF NOT EXISTS `sw_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(120) NOT NULL,
  `setting_data` varchar(120) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sw_setting`
--

INSERT INTO `sw_setting` (`setting_id`, `setting_name`, `setting_data`) VALUES
(5, 'website_title', 'Denial Media'),
(9, 'show_home_nav', '1'),
(10, 'style_file', '/css/squareblue.css'),
(12, 'view_width', '980'),
(13, 'favicon', 'favico.ico'),
(14, 'img_height', '400');

-- --------------------------------------------------------

--
-- Table structure for table `sw_user`
--

CREATE TABLE IF NOT EXISTS `sw_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_title` varchar(120) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_data` text NOT NULL,
  `user_img_url` varchar(120) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_staff` tinyint(1) NOT NULL,
  `user_edit` tinyint(1) NOT NULL,
  `user_publish` tinyint(1) NOT NULL,
  `user_administer` tinyint(1) NOT NULL,
  `user_install` tinyint(1) NOT NULL,
  `user_pass` varchar(120) NOT NULL,
  `user_email` varchar(120) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sw_user`
--

INSERT INTO `sw_user` (`user_id`, `user_title`, `user_name`, `user_data`, `user_img_url`, `user_status`, `user_staff`, `user_edit`, `user_publish`, `user_administer`, `user_install`, `user_pass`, `user_email`) VALUES
(1, 'John Smith', 'admin', 'This is the admin account.', '/img/admin.png', 1, 1, 1, 1, 1, 1, 'cookie', 'user@example.com'),
(2, 'Vladislav Pomogaev', 'arrakark', 'This is Vlad! :)', '/img/vlad.jpg', 1, 1, 1, 1, 1, 1, 'cookie', 'comsa44@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sw_widget`
--

CREATE TABLE IF NOT EXISTS `sw_widget` (
  `widget_id` int(11) NOT NULL AUTO_INCREMENT,
  `widget_title` varchar(120) NOT NULL,
  `widget_order` int(11) NOT NULL,
  `widget_content` text NOT NULL,
  `widget_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_track`
--

CREATE TABLE IF NOT EXISTS `web_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(120) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(60) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sw_cat`
--
ALTER TABLE `sw_cat`
  ADD CONSTRAINT `sw_cat_ibfk_1` FOREIGN KEY (`cat_user_id`) REFERENCES `sw_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sw_comment`
--
ALTER TABLE `sw_comment`
  ADD CONSTRAINT `sw_comment_ibfk_2` FOREIGN KEY (`comment_post_id`) REFERENCES `sw_post` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sw_featured_img`
--
ALTER TABLE `sw_featured_img`
  ADD CONSTRAINT `sw_featured_img_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `sw_media` (`media_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sw_footer`
--
ALTER TABLE `sw_footer`
  ADD CONSTRAINT `sw_footer_ibfk_1` FOREIGN KEY (`footer_user_id`) REFERENCES `sw_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sw_media`
--
ALTER TABLE `sw_media`
  ADD CONSTRAINT `sw_media_ibfk_1` FOREIGN KEY (`media_user_id`) REFERENCES `sw_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sw_page`
--
ALTER TABLE `sw_page`
  ADD CONSTRAINT `sw_page_ibfk_1` FOREIGN KEY (`page_user_id`) REFERENCES `sw_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sw_post`
--
ALTER TABLE `sw_post`
  ADD CONSTRAINT `sw_post_ibfk_1` FOREIGN KEY (`post_user_id`) REFERENCES `sw_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sw_post_ibfk_2` FOREIGN KEY (`post_cat_id`) REFERENCES `sw_cat` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
