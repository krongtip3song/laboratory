-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 09:19 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(10) NOT NULL,
  `name_category` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'paper'),
(2, 'à¹à¸‚à¹ˆà¸‡à¸‚à¸±à¸™EIEI'),
(13, 'aa'),
(14, 'bb'),
(15, 'ccAA'),
(16, 'nnn'),
(17, 'mmm'),
(18, 'gbbb'),
(19, 'bbb'),
(22, '5555'),
(23, 'sdfsd'),
(24, 'sdsd'),
(25, 'sssAA');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rank` int(10) NOT NULL,
  `id_project` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `name`, `path`, `date_upload`, `type`, `rank`, `id_project`) VALUES
(1, 'user1.jpg', '../uploads/testByWit/user1.jpg', '2017-04-11 17:32:15', 'pic', 1, 8),
(2, 'test.txt', '../uploads/testByWit/test.txt', '2017-04-11 17:32:15', 'paper', 1, 8),
(3, 'xxx1.jpg', '../uploads/xxxx/xxx1.jpg', '2017-04-11 17:44:15', 'pic', 1, 10),
(4, 'xxx2.png', '../uploads/xxxx/xxx2.png', '2017-04-11 17:44:15', 'paper', 1, 10),
(5, 'xxx2.jpg', '../uploads/xxxx/xxx2.jpg', '2017-04-11 17:44:15', 'paper', 1, 10),
(8, 'ass.JPG', '../uploads/ABC/ass.JPG', '2017-04-13 19:44:11', 'pic', 1, 12),
(10, 'data_add.png', '../uploads/test eiiei/data_add.png', '2017-04-14 08:32:00', 'pic', 1, 16),
(11, 'g2.png', '../uploads/DataTables/g2.png', '2017-04-14 10:11:03', 'pic', 1, 17),
(12, 'data_add.png', '../uploads/aaaaaaaa/data_add.png', '2017-04-15 07:26:01', 'pic', 1, 18),
(13, 'graph.png', '../uploads/aaaaaaaa/graph.png', '2017-04-15 07:26:01', 'pic', 1, 18),
(14, 'wallpaper.jpg', '../uploads/aaaaaaaa/wallpaper.jpg', '2017-04-15 07:26:01', 'pic', 1, 18),
(15, 'xlsx-icon.png', '../uploads/aaaaaaaa/xlsx-icon.png', '2017-04-15 07:26:01', 'pic', 1, 18),
(16, 'wallpaper.jpg', '../uploads/testPhoto/wallpaper.jpg', '2017-04-15 08:03:38', 'pic', 1, 19),
(17, '14442602_1207576289264572_1585721716_n.png', '../uploads/testPhoto/14442602_1207576289264572_1585721716_n.png', '2017-04-15 08:03:39', 'pic', 1, 19),
(18, 'pumpkin.JPG', '../uploads/testPhoto/pumpkin.JPG', '2017-04-15 08:03:39', 'pic', 1, 19),
(19, 'avengerscomiccon.jpg', '../uploads/testPhoto/avengerscomiccon.jpg', '2017-04-15 08:03:39', 'pic', 1, 19),
(20, 'photo1.jpg', '../uploads/testPhoto/photo1.jpg', '2017-04-15 08:03:39', 'pic', 1, 19),
(21, 'blue-flower.jpg', '../uploads/test file/blue-flower.jpg', '2017-04-15 08:36:35', 'pic', 1, 20),
(22, 'test.png', '../uploads/test file/test.png', '2017-04-15 08:36:36', 'pic', 1, 20),
(23, 'testPhoto3.png', '../uploads/test file/testPhoto3.png', '2017-04-15 08:36:36', 'pic', 1, 20),
(24, 'Assignment4.pdf', '../uploads/test file/Assignment4.pdf', '2017-04-15 08:36:36', 'paper', 1, 20),
(25, 'no4_b_2.m', '../uploads/test file/no4_b_2.m', '2017-04-15 08:36:36', 'paper', 1, 20),
(26, 'Assignment à¸„à¸£à¸±à¹‰à¸‡à¸—à¸µà¹ˆ 8.pdf', '../uploads/test file/Assignment à¸„à¸£à¸±à¹‰à¸‡à¸—à¸µà¹ˆ 8.pdf', '2017-04-15 08:36:36', 'paper', 1, 20),
(27, 'Assignment à¸„à¸£à¸±à¹‰à¸‡à¸—à¸µà¹ˆ 8R.pdf', '../uploads/test file/Assignment à¸„à¸£à¸±à¹‰à¸‡à¸—à¸µà¹ˆ 8R.pdf', '2017-04-15 08:36:36', 'program', 1, 20),
(28, 'im1_1_R1.png', '../uploads/test2/im1_1_R1.png', '2017-04-15 08:39:48', 'pic', 1, 21),
(29, 'im1_2_R1.png', '../uploads/test2/im1_2_R1.png', '2017-04-15 08:39:48', 'pic', 1, 21),
(30, 'im1_3_R1.png', '../uploads/test2/im1_3_R1.png', '2017-04-15 08:39:48', 'pic', 1, 21),
(31, 'blue-flower.jpg', '../uploads/test2/blue-flower.jpg', '2017-04-15 08:39:48', 'pic', 1, 21),
(32, 'letter_1.png', '../uploads/test2/letter_1.png', '2017-04-15 08:39:48', 'pic', 1, 21),
(33, 'fingerprint_bw.jpg', '../uploads/test2/fingerprint_bw.jpg', '2017-04-15 08:39:48', 'pic', 1, 21),
(34, 'puppy.jpg', '../uploads/test2/puppy.jpg', '2017-04-15 08:39:48', 'pic', 1, 21),
(35, 'dog.jpg', '../uploads/testFull/dog.jpg', '2017-04-15 09:37:28', 'pic', 1, 22),
(36, 'images.jpg', '../uploads/testFull/images.jpg', '2017-04-15 09:37:28', 'pic', 1, 22),
(37, 'Assignment4.pdf', '../uploads/testFull/Assignment4.pdf', '2017-04-15 09:37:28', 'paper', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `img2`
--

CREATE TABLE IF NOT EXISTS `img2` (
  `id_img` int(10) NOT NULL,
  `path_img` varchar(255) CHARACTER SET swe7 NOT NULL,
  `id_mem` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img2`
--

INSERT INTO `img2` (`id_img`, `path_img`, `id_mem`) VALUES
(1, '../images/bgcoffee7.jpg_19-04-2017', 0),
(2, '../images/bgcoffee2.jpg_19-04-2017', 26);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `surname` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type_user` enum('STUDENT','TEACHER','ADMIN') NOT NULL,
  `verify` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `name`, `surname`, `tel`, `email`, `type_user`, `verify`) VALUES
(1, 'admin', 'admin', 'WitAbca', 'ChawitEEE', '0817196305', 'wis-chawis@hotmail.com', 'ADMIN', 1),
(5, 'asd', 'asd', 'asd', 'assssssss', '0111111111', 'asd', 'TEACHER', 0),
(7, 'asdsdasd', 'asdas', 'asdasd', 'dasa', 'ads', 'asd', 'STUDENT', 0),
(8, 'aaaas', 'aaa', 'sadsad', 'asdasd', '0817456321', 'wis-chawis@hotmail.com', 'STUDENT', 0),
(10, 'asddasd', 'sadasd', 'sad', 'asd', '0132132135', 'asd', 'STUDENT', 0),
(17, 'teach', 'teach', 'teach', '5555', '0817412365', 'asdfgh@hotmail.com', 'TEACHER', 1),
(18, 'oak1', 'oak1', 'oak1', 'oak1', 'oak1', 'oak1@hotmail.com', 'STUDENT', 0),
(19, 'oak2', 'oak2', 'oakoak', 'oakoak', '0812345678', 'oak2@hotmail.com', 'STUDENT', 0),
(20, 'oak3', 'oak3', 'oakoak', 'oakoak', '0812345678', 'oak3@hotmail.com', 'STUDENT', 0),
(21, 'oak4', 'oak4', 'oakoak', 'oakoak', '0812345678', 'oak4@hotmail.com', 'STUDENT', 0),
(22, 'oak5', 'oak5', 'oakoak', 'oakoak', '0812345678', 'oak5@hotmail.com', 'STUDENT', 0),
(23, 'oak6', 'oak6', 'iwis', 'iwis', '0812345678', 'wiskak@gmail.com', 'STUDENT', 0),
(24, 'oak7', 'oak7', 'noobwis', 'noobwis', '0812345678', 'oak7@hotmail.com', 'STUDENT', 0),
(25, 'oak8', 'oak8', 'wisnoob', 'wisnoob', '0812345678', 'oak8@hotmail.com', 'STUDENT', 0),
(26, 'oak9', 'oak9', 'wisnoobb', 'wisnoobb', '0812345678', 'oak9@hotmail.com', 'STUDENT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_project`
--

CREATE TABLE IF NOT EXISTS `member_project` (
  `id_member_project` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `id_member` int(10) NOT NULL,
  `position` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `weight` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_project`
--

INSERT INTO `member_project` (`id_member_project`, `id_project`, `id_member`, `position`, `weight`) VALUES
(1, 1, 2, 'xxx', 100),
(2, 1, 1, 'ccc', 90),
(3, 2, 1, 'qqq', 22),
(4, 7, 1, 'à¸«à¸±à¸§à¸«à¸™à¹‰à¸²', 100),
(5, 7, 2, 'Dev', 50),
(6, 8, 1, 'à¸«à¸±à¸§à¸«à¸™à¹‰à¸²', 100),
(7, 8, 2, 'Dev', 50),
(8, 8, 1, 'à¸«à¸±à¸§à¸«à¸™à¹‰à¸²', 100),
(9, 8, 2, 'Dev', 50),
(10, 10, 5, 'sss', 100),
(12, 12, 1, 'sss', 12),
(15, 15, 5, 'aas', 12),
(16, 16, 5, '', 0),
(17, 17, 8, '', 0),
(18, 18, 1, 'cccc', 122),
(19, 19, 7, 'aa', 100),
(20, 19, 1, 'bb', 12),
(21, 22, 1, 'à¸«à¸±à¸§à¸«à¸™à¹‰à¸²', 100),
(22, 22, 5, 'Dev', 80),
(23, 22, 8, 'Dev', 80),
(24, 22, 17, 'Dev', 80),
(25, 23, 1, '', 0),
(26, 24, 5, '', 0),
(27, 25, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(10) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_Published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_Occurred` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_category` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `title`, `description`, `date_Published`, `date_Occurred`, `id_category`) VALUES
(1, 'AAAA', 'AAAA', '2017-04-05 17:00:00', '2017-04-06 17:00:00', 1),
(2, 'BBB', 'BBBBB', '2017-04-06 17:00:00', '2017-04-06 21:00:00', 2),
(3, 'à¸­à¸´à¸­à¸´', '<p>à¸­à¸´à¸­à¸´</p>', '2017-04-09 17:30:15', '0000-00-00 00:00:00', 1),
(4, 'eiei', '<p>dfgdgdfgdfgsgdhmkjhkhjk</p>', '2017-04-09 17:30:53', '0000-00-00 00:00:00', 1),
(5, 'eieihjhk', '<p>dfgdgdfgdfgsgdhmkjhkhjk<img src="https://i.froala.com/download/a4f8448338b8979e66f593174bc26b7a30a6f6f1.jpg?1491759429" style="width: 300px;" class="fr-fic fr-dib"></p>', '2017-04-09 17:37:18', '0000-00-00 00:00:00', 1),
(6, 'test1', '<p>eiei &nbsp; ei ei &nbsp;ei ei ei eie iei ei ei eie i eie</p><p><br></p><p><img src="https://i.froala.com/download/821e359df58321bf19df3a419727ae17fb624fae.jpg?1491760407" style="width: 152px; height: 152px;" class="fr-fic fr-dib fr-fil"></p><table style="width: 100%;"><tbody><tr><td style="width: 50.0000%;">asdasdsad<br></td><td style="width: 50.0000%;">asdasd<br></td></tr><tr><td style="width: 50.0000%;">232323<br></td><td style="width: 50.0000%;">3665<br></td></tr></tbody></table><hr><p>sadasdad<sup>sdsds</sup>sdadasdas<sub>sadsadasdads</sub>asasdasda<s>asdasdasdasd</s>d<u>sdsd</u>sdsdsd<u>sdsdsdsdsdsd</u>sdas<em>dasdasdasdasd</em><strong>vbnvbnvbnvbnvbnv</strong></p><p><br></p><p class="fr-text-gray fr-text-bordered fr-text-spaced"><strong><span style="font-size: 20px; color: red;">sdfsdfsdfs<span style="font-size: 14px; color: blue;">sdfsdfsdfsdfsdfsdfsfdsdfsdfsdfsdfssdfsdfsdf</span></span></strong></p><p class="fr-text-gray fr-text-bordered fr-text-spaced"><br></p><p><a class="fr-file" href="https://i.froala.com/download/46cb775ff4487873535279726d6fb1e6819c6d03.txt?1491760653">test.txt</a></p>', '2017-04-09 17:57:30', '0000-00-00 00:00:00', 2),
(7, 'testByWit', '<p>testByWit</p><p><img src="https://i.froala.com/download/47d3a744cb79b7ce93043da13a2ad83cb22e6ad8.jpg?1491931766" style="width: 182px; height: 182px;" class="fr-fic fr-dib fr-fil"></p><p>eiei</p><table style="width: 100%;"><tbody><tr><td style="width: 25.0000%;">1</td><td style="width: 25.0000%;">2</td><td style="width: 25.0000%;">3</td><td style="width: 25.0000%;">4</td></tr><tr><td style="width: 25.0000%;">5</td><td style="width: 25.0000%;">6</td><td style="width: 25.0000%;">7</td><td style="width: 25.0000%;">8</td></tr></tbody></table><p><br></p>', '2017-04-11 17:31:26', '0000-00-00 00:00:00', 2),
(8, 'testByWit', '<p>testByWit</p><p><img src="https://i.froala.com/download/47d3a744cb79b7ce93043da13a2ad83cb22e6ad8.jpg?1491931766" style="width: 182px; height: 182px;" class="fr-fic fr-dib fr-fil"></p><p>eiei</p><table style="width: 100%;"><tbody><tr><td style="width: 25.0000%;">1</td><td style="width: 25.0000%;">2</td><td style="width: 25.0000%;">3</td><td style="width: 25.0000%;">4</td></tr><tr><td style="width: 25.0000%;">5</td><td style="width: 25.0000%;">6</td><td style="width: 25.0000%;">7</td><td style="width: 25.0000%;">8</td></tr></tbody></table><p><br></p>', '2017-04-11 17:31:58', '0000-00-00 00:00:00', 1),
(9, 'testByWit', '<p>testByWit</p><p><img src="https://i.froala.com/download/47d3a744cb79b7ce93043da13a2ad83cb22e6ad8.jpg?1491931766" style="width: 182px; height: 182px;" class="fr-fic fr-dib fr-fil"></p><p>eiei</p><table style="width: 100%;"><tbody><tr><td style="width: 25.0000%;">1</td><td style="width: 25.0000%;">2</td><td style="width: 25.0000%;">3</td><td style="width: 25.0000%;">4</td></tr><tr><td style="width: 25.0000%;">5</td><td style="width: 25.0000%;">6</td><td style="width: 25.0000%;">7</td><td style="width: 25.0000%;">8</td></tr></tbody></table><p><br></p>', '2017-04-11 17:32:15', '2017-04-11 18:01:00', 1),
(10, 'xxxx', '<p>à¸Ÿà¸«à¸à¸Ÿà¸«à¸à¸Ÿà¸«à¸à¸Ÿà¸«à¸à¸Ÿà¸«à¸à¸Ÿà¸«à¸à¸Ÿà¸«à¸</p>', '2017-04-11 17:44:15', '2017-04-11 17:00:00', 2),
(12, 'ABC', '<p>ABC</p><p>ABC</p><p>ABC</p><p>ABC</p><p><br></p>', '2017-04-13 19:44:11', '2017-04-13 17:59:00', 2),
(15, 'sdadasdasd', '<p><img src="https://i.froala.com/download/f2c815cacbc6beb6f13f796d48c1bbe78e0e7279.png?1492157297" style="width: 300px;" class="fr-fic fr-dib"></p>', '2017-04-14 08:08:23', '2017-04-13 17:00:00', 1),
(16, 'test eiiei', '', '2017-04-14 08:32:00', '2017-04-13 18:01:00', 2),
(17, 'DataTables', '<p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAa</p><p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p><p>AAAAAAAAAAAAAAAAAAAA</p><p>AAAAAAAAAAAAAAAAAAAA</p><p>AAAAAAAAAAAAAAAAAAAA</p><p>AAAAAAAAAAAAAAAAAAAA</p>', '2017-04-14 10:11:03', '2017-04-14 17:00:00', 2),
(18, 'aaaaaaaa', '<p>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA skdjfjsdlfs;ldkf;slkf;lsk;flks;dlfk;sdkf;sldkf;lskd;jsknvjidfnbpijerpojpoejgpoerjgpojpfodjgdfjgljdf;gjdkfjglkdjfglkjdflkgjdlkfjgldkfjglkdjfglkjdflgjdlkfjgldkfgdlfgjd</p><p>fgkjd</p><p>dkjg</p><p>;djfgldjfg</p><p>djfg;ljdf;gjoerorkgjb;lmbjdljbdof</p>', '2017-04-15 07:26:00', '2017-04-13 17:00:00', 1),
(19, 'testPhoto', '<p>asdasdasdasd</p>', '2017-04-15 08:03:38', '2017-04-15 17:00:00', 15),
(20, 'test file', '', '2017-04-15 08:36:35', '2017-04-14 17:00:00', 1),
(21, 'test2', '<h2>Modal Image</h2><p>A modal is a dialog box/popup window that is displayed on top of the current page.</p><p>This example use most of the code from the previous example, <a href="https://www.w3schools.com/howto/howto_css_modals.asp">Modal Boxes</a>, only in this example, we use images.</p>', '2017-04-15 08:39:48', '2017-04-14 17:00:00', 1),
(22, 'testFull', '<h2>Download &amp; CustomizeEasy</h2><p>Want to manage and host Font Awesome assets yourself? You can <a data-toggle="modal" href="http://fontawesome.io/get-started/#modal-download">download</a>, customize, and use the icons and default styling manually. Both CSS and CSS Preprocessor (Sass and Less) formats are included.</p><p><br></p><h3>Using CSS</h3><ol><li>Copy the entire <code>font-awesome</code> directory into your project.</li><li>In the <code>&lt;head&gt;</code> of your html, reference the location to your font-awesome.min.css.<pre><code>&lt;link rel=&quot;stylesheet&quot; href=&quot;path/to/font-awesome/css/font-awesome.min.css&quot;&gt;\n</code></pre></li><li>Check out the <a href="http://fontawesome.io/examples/">examples</a> to start using Font Awesome!</li></ol><h3>Using Sass or Less</h3><p>Use this method to customize Font Awesome 4.7.0 using LESS or SASS.</p><ol><li>Copy the <code>font-awesome/</code> directory into your project.</li><li>Open your project&#39;s <code>font-awesome/less/variables.less</code> or <code>font-awesome/scss/_variables.scss</code> and edit the <code>@fa-font-path</code> or <code>$fa-font-path</code> variable to point to your font directory.<pre><code>@fa-font-path: &quot;../font&quot;;\n</code></pre><br>&nbsp;The font path is relative from your compiled CSS directory.</li><li>Re-compile your LESS or SASS if using a static compiler. Otherwise, you should be good to go.</li><li>Check out the <a href="http://fontawesome.io/examples/">examples</a> to start using Font Awesome!</li></ol><p><br></p><p><br></p>', '2017-04-15 09:37:27', '0000-00-00 00:00:00', 1),
(23, 'testup1', '', '2017-04-15 10:50:54', '2017-04-14 17:00:00', 1),
(24, 'testup2', '<p>asdadad</p>', '2017-04-15 10:51:40', '2017-04-14 17:00:00', 1),
(25, 'testup3', '<p>sadasdasdsad</p>', '2017-04-15 10:54:56', '2017-04-14 17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `num` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`num`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `wall_index`
--

CREATE TABLE IF NOT EXISTS `wall_index` (
  `id_wall` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `path_wall` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wall_index`
--

INSERT INTO `wall_index` (`id_wall`, `id_project`, `path_wall`, `status`) VALUES
(8, 1, 'images/wall_index/slider-1.jpg', 1),
(9, 2, 'images/wall_index/slider-2.jpg', 0),
(10, 1, 'images/wall_index/1_download.jpg', 1),
(11, 1, 'images/wall_index/1_excel.ico', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`,`id_project`),
  ADD KEY `id_project` (`id_project`);

--
-- Indexes for table `img2`
--
ALTER TABLE `img2`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `member_project`
--
ALTER TABLE `member_project`
  ADD PRIMARY KEY (`id_member_project`,`id_project`,`id_member`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`,`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `wall_index`
--
ALTER TABLE `wall_index`
  ADD PRIMARY KEY (`id_wall`,`id_project`),
  ADD KEY `id_project` (`id_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `img2`
--
ALTER TABLE `img2`
  MODIFY `id_img` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `member_project`
--
ALTER TABLE `member_project`
  MODIFY `id_member_project` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `wall_index`
--
ALTER TABLE `wall_index`
  MODIFY `id_wall` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
