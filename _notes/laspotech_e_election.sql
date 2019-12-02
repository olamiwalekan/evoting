-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2014 at 12:47 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laspotech_e_election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_veriy`
--

CREATE TABLE IF NOT EXISTS `admin_veriy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(122) NOT NULL,
  `password` varchar(22) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_veriy`
--

INSERT INTO `admin_veriy` (`id`, `username`, `password`) VALUES
(1, 'vote_administrator', 'i_am_admin');

-- --------------------------------------------------------

--
-- Table structure for table `demo_cand`
--

CREATE TABLE IF NOT EXISTS `demo_cand` (
  `cand_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `cand_name` varchar(225) NOT NULL,
  `blob` varchar(225) NOT NULL,
  `DEPT_ID` int(11) NOT NULL,
  PRIMARY KEY (`cand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `demo_cand`
--

INSERT INTO `demo_cand` (`cand_id`, `post_id`, `cand_name`, `blob`, `DEPT_ID`) VALUES
(1, 1, 'KELECHI AGNES', 'I believe in a better governance', 12),
(2, 1, 'ODETUNDE BABATUNDE ', 'Freedom for all is what i wish', 12),
(3, 2, 'AJADI AFEEZ', 'Followership is the best act of leadership', 12),
(4, 2, 'Akinbami Oluwaseun Esther', 'Socratism in education leadership act', 12),
(5, 3, 'Odunsi Olayiwola', 'A VERY GOOD BOY', 12),
(6, 1, 'AGBOOLA OLAWALE', 'my vision is to acquire wealth and build mansions in my home town', 12);

-- --------------------------------------------------------

--
-- Table structure for table `demo_eligible`
--

CREATE TABLE IF NOT EXISTS `demo_eligible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MATRIC_NO` int(11) NOT NULL,
  `status` varchar(130) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `demo_eligible`
--

INSERT INTO `demo_eligible` (`id`, `MATRIC_NO`, `status`) VALUES
(1, 125021052, 'active'),
(2, 125021099, 'active'),
(3, 125021033, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `demo_post`
--

CREATE TABLE IF NOT EXISTS `demo_post` (
  `Title` varchar(225) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `demo_post`
--

INSERT INTO `demo_post` (`Title`, `id`) VALUES
('HEAD OF CLASS', 1),
('ASSISSTANT HEAD OF CLASS', 2),
('President', 3);

-- --------------------------------------------------------

--
-- Table structure for table `demo_vote`
--

CREATE TABLE IF NOT EXISTS `demo_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `voter_ip` varchar(225) NOT NULL,
  `cand_id` int(11) NOT NULL,
  `cand_name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `demo_vote`
--

INSERT INTO `demo_vote` (`id`, `post_id`, `voter_id`, `voter_ip`, `cand_id`, `cand_name`) VALUES
(25, 1, 125021009, '::1', 1, 'KELECHI AGNES'),
(26, 2, 125021009, '::1', 3, 'AJADI AFEEZ'),
(27, 1, 125021030, '192.168.173.216', 1, 'KELECHI AGNES'),
(28, 2, 125021030, '192.168.173.216', 4, 'Akinbami Oluwaseun Esther'),
(30, 1, 125021099, '127.0.0.1', 2, 'ODETUNDE BABATUNDE '),
(31, 2, 125021099, '127.0.0.1', 3, 'AJADI AFEEZ'),
(32, 3, 125021099, '127.0.0.1', 5, 'Odunsi Olayiwola');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `FACULTY_ID` int(11) NOT NULL,
  `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPARTMENT` varchar(225) NOT NULL,
  `NO_OF_STUDENT 1` int(11) NOT NULL,
  `NO_OF_STUDENT 2` int(11) NOT NULL,
  `NO_OF_POST_HND1` int(11) NOT NULL,
  `NO_OF_POST_HND2` int(11) NOT NULL,
  PRIMARY KEY (`DEPT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='FOR ALL SCHOOL FACULTY AND THEIR DEPARTMENT' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`FACULTY_ID`, `DEPT_ID`, `DEPARTMENT`, `NO_OF_STUDENT 1`, `NO_OF_STUDENT 2`, `NO_OF_POST_HND1`, `NO_OF_POST_HND2`) VALUES
(1, 1, 'Leisure and Tourism Management', 43, 43, 5, 5),
(1, 2, 'Food Technology', 43, 43, 5, 5),
(1, 4, 'Science Laboratory Technology', 43, 43, 5, 5),
(1, 5, 'Microbiology', 43, 43, 5, 5),
(1, 6, 'Physics With Electronics', 43, 43, 5, 5),
(1, 7, 'Environmental Biology', 43, 43, 5, 5),
(1, 8, 'Chemistry', 43, 43, 5, 5),
(1, 9, 'Biochemistry', 43, 43, 5, 5),
(1, 10, 'Hospitality Management Technology', 43, 43, 5, 5),
(1, 11, 'Computer Science', 43, 43, 5, 5),
(2, 12, 'Computer Science', 68, 67, 3, 4),
(2, 13, 'Food Technology', 50, 60, 3, 3),
(2, 14, 'Leisure and Tourism Management', 54, 64, 3, 3),
(2, 15, 'Science Laboratory Technology', 71, 34, 3, 2),
(2, 16, 'Hospitality Management Technology', 54, 44, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department_post`
--

CREATE TABLE IF NOT EXISTS `department_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  FULLTEXT KEY `post_title` (`post_title`),
  FULLTEXT KEY `post_title_2` (`post_title`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `department_post`
--

INSERT INTO `department_post` (`post_id`, `post_title`, `time`) VALUES
(1, 'NacossPresident', 0),
(2, 'Nacoss Vice President', 0),
(3, 'Nacoss General Secetary', 0),
(4, 'Nacoss Assistant general Secetary', 0),
(5, 'Nacoss Sport Director', 0),
(6, 'Nacoss Lady Vice', 0),
(10, 'Welfare Director', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_post_candidate`
--

CREATE TABLE IF NOT EXISTS `department_post_candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `candidate` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `DEPT_ID` int(11) NOT NULL,
  `FACULTY_ID` int(11) NOT NULL,
  PRIMARY KEY (`candidate_id`),
  KEY `poll_id` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1313 ;

--
-- Dumping data for table `department_post_candidate`
--

INSERT INTO `department_post_candidate` (`candidate_id`, `post_id`, `candidate`, `DEPT_ID`, `FACULTY_ID`) VALUES
(1, 1, 'David Hoc', 12, 1),
(2, 1, 'Odunsi Olayiwola', 12, 1),
(3, 2, 'Agboola Olawale', 12, 1),
(4, 2, 'Conde Ibukun', 12, 1),
(5, 3, 'Animaasaun damilare', 12, 1),
(6, 3, 'Bussi fresh', 12, 1),
(7, 4, 'Adebambo Morruf', 12, 1),
(8, 4, 'akinbami mistura', 12, 1),
(9, 5, 'Oyenusi Eziekel', 12, 1),
(10, 5, 'Okunola racheal', 12, 1),
(11, 6, 'Akintoye Micheal', 12, 1),
(12, 6, 'Kelechi Agnes', 12, 1),
(13, 7, 'Goodie Abigeal', 0, 2),
(14, 7, 'Richie Blaze', 0, 2),
(15, 8, 'Jeff mba', 0, 2),
(16, 8, 'Omowunmi Kilo', 0, 2),
(17, 9, 'Sanni Quadri', 0, 2),
(18, 9, 'Damilola Atanda', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department_vote`
--

CREATE TABLE IF NOT EXISTS `department_vote` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `candidate_id` int(10) unsigned NOT NULL,
  `MATRIC_N0` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `poll_id` (`candidate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `department_vote`
--

INSERT INTO `department_vote` (`id`, `post_id`, `candidate_id`, `MATRIC_N0`) VALUES
(7, 1, 2, ''),
(8, 1, 5, ''),
(9, 1, 4, ''),
(10, 1, 3, ''),
(18, 1, 1, ''),
(19, 1, 1, ''),
(20, 1, 1, ''),
(21, 1, 1, ''),
(22, 1, 1, ''),
(23, 1, 1, ''),
(24, 1, 1, ''),
(25, 1, 3, ''),
(26, 1, 2, ''),
(27, 1, 3, ''),
(28, 1, 4, ''),
(29, 1, 2, ''),
(30, 1, 3, ''),
(31, 1, 3, ''),
(32, 1, 1, ''),
(33, 1, 1, ''),
(34, 1, 1, ''),
(35, 1, 3, ''),
(36, 1, 1, ''),
(37, 1, 3, ''),
(38, 1, 1, ''),
(39, 1, 1, ''),
(40, 1, 1, ''),
(41, 1, 1, ''),
(43, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `FACULTY_ID` varchar(255) NOT NULL,
  `FACULTY` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FACULTY_ID`, `FACULTY`) VALUES
('2', 'school of technology for nd'),
('1', 'school of technology for hnd');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_post_candidate`
--

CREATE TABLE IF NOT EXISTS `faculty_post_candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `candidate` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`candidate_id`),
  KEY `poll_id` (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `faculty_post_candidate`
--

INSERT INTO `faculty_post_candidate` (`candidate_id`, `post_id`, `candidate`) VALUES
(1, 1, 'jQuery'),
(2, 1, 'Prototype'),
(3, 1, 'MooTools'),
(4, 1, 'MochiKit'),
(5, 1, 'Rialto');

-- --------------------------------------------------------

--
-- Table structure for table `falculty_vote`
--

CREATE TABLE IF NOT EXISTS `falculty_vote` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `candidate_id` int(10) unsigned NOT NULL,
  `MATRIC_N0` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `poll_id` (`candidate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `falculty_vote`
--

INSERT INTO `falculty_vote` (`id`, `post_id`, `candidate_id`, `MATRIC_N0`) VALUES
(7, 1, 2, ''),
(8, 1, 5, ''),
(9, 1, 4, ''),
(10, 1, 3, ''),
(18, 1, 1, ''),
(19, 1, 1, ''),
(20, 1, 1, ''),
(21, 1, 1, ''),
(22, 1, 1, ''),
(23, 1, 1, ''),
(24, 1, 1, ''),
(25, 1, 3, ''),
(26, 1, 2, ''),
(27, 1, 3, ''),
(28, 1, 4, ''),
(29, 1, 2, ''),
(30, 1, 3, ''),
(31, 1, 3, ''),
(32, 1, 1, ''),
(33, 1, 1, ''),
(34, 1, 1, ''),
(35, 1, 3, ''),
(36, 1, 1, ''),
(37, 1, 3, ''),
(38, 1, 1, ''),
(39, 1, 1, ''),
(40, 1, 1, ''),
(41, 1, 1, ''),
(43, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `falcuty_post`
--

CREATE TABLE IF NOT EXISTS `falcuty_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `falcuty_post`
--

INSERT INTO `falcuty_post` (`post_id`, `post_title`, `time`) VALUES
(1, 'NATS President', 1314951807),
(2, 'NATS President', 9),
(3, 'NATS Vice President', 8),
(4, 'NATS Vice President', 3),
(5, 'NATS General Secetary', 0),
(6, 'NATS Assistant general Secetary', 1),
(7, 'NATS Sport Director', 5),
(8, 'NATS Social Director', 6),
(9, 'NATS Lady Vice', 10);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `optionname` varchar(225) NOT NULL,
  `value` varchar(225) NOT NULL,
  `showToggle` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`optionname`, `value`, `showToggle`) VALUES
('starttime', '1430755800', ''),
('endtime', '1444897860', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `reg_student`
--

CREATE TABLE IF NOT EXISTS `reg_student` (
  `MATRIC_N0` int(11) NOT NULL,
  `F_NAME` varchar(225) NOT NULL,
  `L_NAME` varchar(225) NOT NULL,
  `YOB` int(11) NOT NULL,
  `MOB` varchar(225) NOT NULL,
  `DOB` int(11) NOT NULL,
  `FACULTY_ID` varchar(225) NOT NULL,
  `sex` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `DEPT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_student`
--

INSERT INTO `reg_student` (`MATRIC_N0`, `F_NAME`, `L_NAME`, `YOB`, `MOB`, `DOB`, `FACULTY_ID`, `sex`, `password`, `DEPT_ID`) VALUES
(125021052, 'olayiwola', 'odunsi', 1988, '10', 19, 'school of technology for nd', 'male', 'riliwan', 12),
(125021030, 'AGBOOLA', 'OLAWALE', 1985, '3', 17, '2', 'male', 'hotspot', 12),
(125021009, 'abigeal', 'ope', 1971, '3', 17, '2', 'female', '', 12),
(125021024, 'ADEBAMBO', 'damilare', 1993, '8', 8, '2', 'male', 'pagerthadre', 12),
(125021099, 'Ajadi', 'Afeez', 1971, '9', 14, '2', 'male', 'afeezco', 12);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `matric_no` int(11) NOT NULL,
  `ip` int(11) DEFAULT NULL,
  PRIMARY KEY (`vote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
