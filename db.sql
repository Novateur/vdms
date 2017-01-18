-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 05:35 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `vdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `apllicants`
--

CREATE TABLE IF NOT EXISTS `apllicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opp_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complete` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `apllicants`
--

INSERT INTO `apllicants` (`id`, `first_name`, `last_name`, `add`, `city`, `zip`, `state`, `phone`, `company_id`, `opp_id`, `complete`) VALUES
(3, 'Akobundu', 'Michael', 'Naic house', 'Abuja', '', '', '', '5', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add1` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add2` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rc_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `country`, `add1`, `add2`, `city`, `zip`, `state`, `phone`, `com_name`, `logo`, `email`, `website`, `fax`, `admin_id`, `rc_no`) VALUES
(3, 'fjhjhfjkdjkjdkdhjd', 'hfjfhjdjhjdhjd', 'dhjhdhjdhjgd', 'uieiuryuyr', '344', 'otorioruir', '0940985857874', 'AP oil and gas', 'com_logo.png', '', '', '', '2', ''),
(5, 'Nigeria', 'NAIC House,Right wing', 'Zone A0 Central Business District, Abuja.', 'Abuja', '778874', 'Lagos', '08034452650', 'Novateur Nigeria', 'Novateur-Logo-Trans1.png', 'info@novateur.ng', 'www.novateur.ng', '', '3', '888567'),
(6, 'Nigeria', 'Naic house', '', 'Abuja', '', '', '07060815446', 'anything', 'Novateur-Logo-Trans1.png', NULL, NULL, NULL, '12', NULL),
(7, 'Nigeria', 'Patnasonic Estate,Mbora,Abuja', 'Naic House', 'PortHacourt', '09', 'F.C.T', '097079968958', 'Rico Computers', 'com_logo.png', NULL, NULL, NULL, '13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE IF NOT EXISTS `contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_from` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_to` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `progress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complete` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `user_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_updated` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contract_name`, `com_from`, `com_to`, `ref_no`, `progress`, `company_id`, `complete`, `comment`, `user_id`, `start_date`, `end_date`, `date_added`, `last_updated`, `percent`) VALUES
(21, 'Supply us with goat meat', 'Novateur Nigeria', 'Crunchies foods', 'ABU/2016/NO/67558', 'Ongoing', '5', '1', 'This project is going on very well', '4', '11-08-2016', '14-09-2017', '14/07/2016 at 16:27', '28/10/2016 at 23:39', '60'),
(22, 'Bulletin printing', 'Novateur Nigeria', 'Moz printing press', 'ABU/2016/NO/6678', 'Ongoing', '5', '1', 'bla bla bla', '4', '19-07-2016', '08-09-2016', '18/07/2016 at 15:59', '18/07/2016 at 16:11', '70'),
(23, 'Car washing', 'Novateur Nigeria', 'MJ car washing ltd', 'ABU/2016/NO/8956', 'Initiated', '5', '1', NULL, NULL, '21-07-2016', '21-07-2016', '18/07/2016 at 16:02', '18/07/2016 at 16:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract_docs`
--

CREATE TABLE IF NOT EXISTS `contract_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `renamed` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref_no` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `contract_docs`
--

INSERT INTO `contract_docs` (`id`, `file_name`, `file_title`, `renamed`, `ref_no`) VALUES
(18, 'HGB Content.pdf', 'Hgb signed docs', '411CON754.pdf', 'ADA/2016/NO/800690'),
(19, 'Flask.pdf', 'flask signed docs', '235CON432.pdf', 'ADA/2016/NO/800690'),
(20, 'Flask.pdf', 'ghgfgds', '877CON97.pdf', 'dgf/8989/klki/juiu'),
(22, 'jQueryNotes.pdf', 'fgdrgfdtfdddfddfg', '672CON710.pdf', '89893889r/oriouriyr/klfjkdjgd'),
(23, 'AppProgrammingGuide.pdf', 'fgjhjfkkfjhgjkgkgk', '405CON954.pdf', '89893889r/oriouriyr/klfjkdjgd'),
(24, 'AppProgrammingGuide.pdf', 'flglllgggjlgklgljg', '923CON80.pdf', 'klrklkrjkflkfj/kflgjjg'),
(25, 'AppProgrammingGuide.pdf', 'CAC signed documents', '782CON822.pdf', 'ABU/2016/NO/67558'),
(26, 'Flask.pdf', 'Staff resume', '651CON37.pdf', 'ABU/2016/NO/67558'),
(27, 'AppProgrammingGuide.pdf', 'Signed cac', '416CON885.pdf', 'ABU/2016/NO/6678'),
(28, 'jQueryNotes.pdf', 'Signed business ideas', '569CON455.pdf', 'ABU/2016/NO/6678'),
(29, 'Flask.pdf', 'Signed flask document', '148CON70.pdf', 'ABU/2016/NO/8956');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opp_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `renamed` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `file`, `title`, `opp_id`, `company_id`, `renamed`) VALUES
(25, 'AppProgrammingGuide.pdf', 'evidence of cac', '4', '5', '664.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `oppurtunity`
--

CREATE TABLE IF NOT EXISTS `oppurtunity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref_no` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8_unicode_ci,
  `scope` text COLLATE utf8_unicode_ci,
  `Requirements` text COLLATE utf8_unicode_ci,
  `terms` text COLLATE utf8_unicode_ci,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `oppurtunity`
--

INSERT INTO `oppurtunity` (`id`, `name`, `ref_no`, `introduction`, `scope`, `Requirements`, `terms`, `location`, `type`, `company_id`, `doc`) VALUES
(1, 'Road Construction', 'ISH/2016/FGN/005', NULL, NULL, NULL, NULL, NULL, 'Bid', '5', NULL),
(3, 'Pipeline distribution', 'NNP/2016/PHC/143', NULL, NULL, NULL, NULL, NULL, 'Bid', '3', NULL),
(4, 'Flyover bridge construction', 'JUL/2016/ABJ/904', 'Social media [technology] has become a growing phenomenon with many and varied definitions in public and academic use. Social media generally refer to media used to enable social interaction. For our purposes, the term social media technology (SMT) refers to web-based and mobile applications that allow individuals and organizations to create, engage, and share new user-generated or existing content, in digital environments through multi-way communication. ', 'In tertiary institutions connectivity can be seen as one of the factors that can improve a student grade. Therefore bringing together students of a particular department to share common idea, socialize, connect and send messages across to one another is a very important task which this software is based upon. There were some barriers to achieving the factors mentioned above, some of these barriers includes:\n•	Cost: Huge amount of money was spent while trying to gather information on what students of computer science department needs.\n•	Timeliness: Due to the nature of this project huge amount of time was spent in order to make sure that it was a success.\n', 'Web-based services that allow individuals to (1) construct a public or semi-public profile within a bounded system, (2) articulate a list of other users with whom they share a connection, and (3) view and traverse their list of connections and those made by others within the system. The nature and nomenclature of these connections may vary from site to site (boyd & Ellison, 2007). Social networking services (SNS) are increasingly popular amongst young people regardless of geographical location, background and age. They include services such as Facebook.com, MySpace.com and Bebo.com which have many millions of members each. It also includes services, such as Elftown.com (for fans of fantasy and science fiction) and Ravelry.com (for fans of knitting!) with small numbers of members, often connected by a specific common interest. Furthermore, many services created for media sharing (e.g. Flickr for photo sharing, Last.FM for music listening habits and YouTube for video sharing) have incorporated profile and networking features and may be thought of as part of this wider conceptualization of SNS themselves (boyd & Ellison 2008:216). Indeed, SNS in a Web 2.0 environment have transformed processes of communication and social interaction particularly with the increasing integration of social media functionality to these services. ', 'As such, issues pertaining to the safety and wellbeing of young people using SNS are of particular concern to parents (ACMA 2009). \nThe focus on risk and protecting children and young people from harm is often based on concerns that young people lack awareness of the public nature of the internet (Acquisti and Gross 2006; Stutzman 2006; Barnes 2006). \nIn addition to the threat of abuse, some fear that young people’s use of SNS can compromise the development and maintenance of supportive friendships and involvement in institutions traditionally understood as the embodiment of ‘communities’, namely school, sports clubs, families etc. (Delmonico & Carnes 1999). \nThese concerns have dominated both public debate and policy-making in recent years. To consider social media as a marketing tool a retailer must understand every aspect of it.\nThere is some evidence that young people are aware of potential privacy threats online and many proactively take steps to minimize potential risks (Hitchcock 2008; Lenhart & Madden 2007; Hinduja & Patchin 2008; Warfel 2009, cited in Boyd and Ellison 2007:222). Research has indicated that online risks „are not radically different in nature or scope than the risks minors have long faced offline, and minors who are most at risk in the offline world continue to be most at risk online (Palfrey, 2008). Although the risks are real and the consequences can be extremely serious, experts emphasise that it is important not to overstate fears or understate the complexity of the challenge (The Alannah & Madeline Foundation, 2009). Further, given that social networking practices are a routine part of many young people’s lives, we need to seek ways to promote the positive impacts of these. Limited intergenerational understanding of young people’s ability to navigate online environments can contribute to a disproportionate emphasis on the risks of SNS use (ACMA 2009; Bauman 2007). Young people are often proficient users of online and networked technologies. Harnessing, expanding and promoting their skills and understandings of SNS may hold the key for overcoming the issues of concern.\n', 'Abuja', 'Tender', '3', NULL),
(6, 'Lekki Gardens', 'AYE/2016/LAG/013', NULL, NULL, NULL, NULL, 'Lagos', 'Bid', '5', NULL),
(8, 'School uniform supplier', 'ADA/2016/NO/800690', 'bla bla bla', 'nxnmbdhdjd hdkjdkhdjhd hdkjdkhdk', 'nhddhjgdjd hjdjhjdjdgd bbdbndgsjhjdgjjd jhjdjgdjd', 'bla bla bla jhjdd ghghdjhjhd ggghdhjh hdjhsjhjsgjgd', 'Adamawa', 'Bid', '5', NULL),
(9, 'Fertilizer supplier', 'ABI/2016/NO/71960', 'The bla bla bla goes here', 'What you''re expected to do goes here', 'All requirements are expected to be here', 'Terms and conditions goes here', 'Abia', 'Tender', '5', '126CON701.pdf'),
(10, 'Stadium construction', 'AKW/2016/NO/648834', 'Introduction goes here', 'Scope of work goes here', 'Requirements goes here', 'Terms and conditions goes here', 'Akwa-Ibom', 'RFQ', '5', NULL),
(15, 'Newspaper printing', 'ABI/2016/NO/618622', 'Introduction goes here', 'Scope of work goes here', 'Requirements goes here', 'terms and conditions goes here', 'Abia', 'Proposal', '5', NULL),
(16, 'Video editor', 'ADA/2016/NO/447144', 'Introduction goes here', 'Scope of work goes here', 'Requirements goes here', 'Terms andcondition goes here', 'Adamawa', 'EOI', '5', NULL),
(17, 'Water supply', 'AKW/2016/NO/916748', 'Introduction goes here', 'Scope of work goes here', 'Requirements goes here', 'Terms and conditions goes here', 'Akwa-Ibom', 'RFP', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loca` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `photo`, `loca`, `company_id`, `level`, `position`, `status`) VALUES
(2, 'Novateur Nigeria', 'test@novateur.ng', '1f853155adb9e2a753cb6d3668303d60db29927c', 'avatar.png', 'Abuja', '6', 'admin', 'Manager', NULL),
(3, 'John Doe', 'johndoe@gmail.com', 'c6bd3d45153b54fbbb7349d87f37d31e1cf61364', 'avatar.png', 'Lagos', '6', 'admin', 'Manager', '<i class=''fa fa-check''></i>'),
(4, 'Sandra Chidinma', 'sandra@gmail.com', '218f80e362cfbdbc886c205a7684f7826de9774e', 'avatar.png', 'Lagos', '5', 'admin', 'Secretary', '<i class=''fa fa-check''></i>'),
(11, 'Okoroafor Emeka', 'emoroking@gmail.com', NULL, 'avatar.png', NULL, '6', 'admin', 'Web Developer', 'invited'),
(13, 'Okoroafor Michael', 'rico@gmail.com', '9fbe54b1acef85c9aa812216dd980f95e02539f7', 'avatar.png', 'PortHacourt', '7', 'admin', 'Manager', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `add1` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add2` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add3` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rc_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `add1`, `add2`, `add3`, `city`, `zip`, `country`, `phone`, `email`, `website`, `name`, `company_id`, `rc_no`, `first_name`, `last_name`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Traveler''s agency', '5', NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NAIC', '5', NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ASO savings and loans', '5', NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NTA Channel 5', '5', NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dangote Cement', '5', NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'News Agency of Nigeria(NAN)', '5', NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'info@ecobankplc.com', NULL, 'Ecobank plc', '5', NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Agro Allied', '5', NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'info@zenithbanknigeriaplc.com', NULL, 'Zenith bank plc', '5', NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'National Assembly', '5', NULL, NULL, NULL),
(17, 'No 92 Gandoki Street,Wuse 2', 'Close to NAIC building,Central Business District Abuja', '', 'Abuja', '90', 'Nigeria', '09045686970', 'info@honda.com', 'www.honda.com', 'HONDA', '5', '668907', NULL, NULL),
(18, 'No 19 Delta Street, Maitama, Abuja', 'No 28 Clement close off kunle Street, Jabi, Abuja', '', 'Abuja', '09', 'Nigeria', '0685849489586', 'clement419@yahoo.com', '', 'Clement oluwasegun', '5', 'NPQ78984', 'Clement', 'oluwasegun'),
(19, '', '', '', '', '', 'Nigeria', '', 'elakoson2000@yahoo.com', '', 'Akobundu Godson', '5', '', 'Akobundu', 'Godson'),
(24, '', '', '', '', '', 'Nigeria', '', '', '', 'Central Bank of Nigeria', '5', '33657', NULL, NULL),
(26, '', '', '', '', '', 'Nigeria', '', '', '', 'Naic', '6', '676766', NULL, NULL);
