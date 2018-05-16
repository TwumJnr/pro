-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 09:19 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `love_church`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `pwd`) VALUES
('7sM2488tDu', 'twum_jnr@hotmail.com', '$2y$10$ienfxeu70SUDOOy2oUnPnOmsP5uMBffBj.xwUW.pkHT7Lr4elGBwu'),
('ATFC4bJpgR', 'nsenku.pekay@example.com', '$2y$10$gHtRyF8tmhZuOSQ7kDaY6uqBAi2f09naBQhVBoimLqBY..rgGfHS2'),
('cdH5cC5lje', 'O.nyinah@gmail.com', '$2y$10$oZ/LQNlCMGra4RwQqPneyOPBeRTNmFJjdBadHj4HIu/9/fxm/f7qO'),
('KJ0dFfUhaM', 'felix.ag@gmail.com', '$2y$10$diy2LcOrOiMPkcN1NkPOEeJeSCikOowPtau5D8EVDu83CvUqeFQOO'),
('L8Yqccyvfb', 'jm@example.com', '$2y$10$avLyb/BsobHzhBICXzDipOxb0uHUgcK1IuBAAU6wHir7gRRncxRM.'),
('RyJ6qbieC4', 'ebtk14@gmail.com', '$2y$10$bcpeJp0spdC.BpcSMfBwKebmjlu2Vqbtdo/c5V7kXPOLuFScbIGt.'),
('Vinu4YhTqM', 'eric.p@gmail.com', '$2y$10$DfsU6tRq2.jSMFLAd2vFpuZ6TaDDsa91Ys6lfK/6lW513pFiupsS2');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `a_id` int(11) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `file` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`a_id`, `headline`, `file`, `date_added`) VALUES
(12, 'New Visitors', 'files/an/361.txt', '2018-05-16 16:08:15'),
(13, 'Group Announcement', 'files/an/173.txt', '2018-05-16 16:08:37'),
(14, 'The Giving', 'files/an/607.txt', '2018-05-16 16:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `message`) VALUES
(1, '', ';mf;km'),
(2, '', 'fvbngmhjgfbv'),
(3, '', 'mk kn'),
(4, '', 'ljbkjjkbkjb'),
(5, '', 'kh k kjnlkn'),
(6, '', 'dlkcncvxlkn'),
(7, '', 'gh'),
(8, '', 'mhvjkh'),
(9, '', 'mhvjkh'),
(10, '', 'sdlkjnsdljnvflkn'),
(11, '', 'asdfdfs'),
(12, '', 'sdflkf'),
(13, '', 'got it '),
(14, '', 'post chat'),
(15, '', 'ss'),
(16, '', 'km vglk'),
(17, '', 'post ,me'),
(18, '', 'this is a post'),
(19, '', 'this is a post'),
(20, '', 'fdlknxcv'),
(21, '', 'hi'),
(22, '', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `cover_page`
--

CREATE TABLE `cover_page` (
  `cover_id` int(11) NOT NULL,
  `header_caption` varchar(50) NOT NULL,
  `header_text` varchar(255) NOT NULL,
  `cover_bg` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cover_page`
--

INSERT INTO `cover_page` (`cover_id`, `header_caption`, `header_text`, `cover_bg`, `status`) VALUES
(22, 'Welcome to First Love Gospel Church', 'At First Love Gospel Church, we know that inspiration opens hearts. An open heart is an open mind and an open mind is one that can practice tolerance, experience gratitude and feel the glory of God. It is our belief that God is present in all of us, but H', 'img/cover/311.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_details`) VALUES
(3, 'files/events/215.jpg'),
(4, 'files/events/897.jpg'),
(5, 'files/events/657.jpg'),
(6, 'files/events/991.jpg'),
(7, 'files/events/202.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ex_id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `lead_id` int(3) NOT NULL,
  `mem_id` varchar(10) NOT NULL,
  `portfolio` varchar(50) NOT NULL,
  `about` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`lead_id`, `mem_id`, `portfolio`, `about`) VALUES
(11, 'FMnX2aPar0', 'Head Pastor', 'files/about/88.txt'),
(12, 'v9PvDuWQ4S', 'Assistant Head Pastor', 'files/about/374.txt'),
(13, 'opmcsGg7Tk', 'Deacon', 'files/about/79.txt');

-- --------------------------------------------------------

--
-- Table structure for table `married`
--

CREATE TABLE `married` (
  `man` varchar(10) NOT NULL,
  `lady` varchar(10) NOT NULL,
  `married_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` varchar(10) NOT NULL,
  `pic` varchar(250) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `othernames` varchar(100) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gender` varchar(1) NOT NULL,
  `baptized` varchar(1) NOT NULL,
  `tel` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `min_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `pic`, `lastname`, `firstname`, `othernames`, `dob`, `gender`, `baptized`, `tel`, `email`, `min_id`) VALUES
('FMnX2aPar0', 'img/user_p/223.jpg', 'Onyinah', 'Opoku', '', '0000-00-00 00:00:00', 'm', 'y', 245632115, 'O.nyinah@gmail.com', 'YlH6ihF7IQ'),
('opmcsGg7Tk', 'img/user_p/701.jpg', 'Mettle', 'Joseph', 'Oscar', '1985-03-03 00:00:00', 'm', 'y', 213456545, 'jm@example.com', 'ZgXh6oSkup'),
('v9PvDuWQ4S', 'img/user_p/518.jpg', 'Patternson', 'Eric', '', '0000-00-00 00:00:00', 'm', 'y', 261487954, 'eric.p@gmail.com', 'YlH6ihF7IQ'),
('zdxwZepkdA', 'img/user_p/930.jpg', 'Asamoah', 'Bernard', '', '0000-00-00 00:00:00', 'm', 'y', 235689784, 'asamoah.ben@hotmail.com', 'z7FeyMNq9k');

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

CREATE TABLE `ministry` (
  `ministry_id` varchar(10) NOT NULL,
  `meet_day` varchar(3) NOT NULL,
  `ministry_name` varchar(100) NOT NULL,
  `no_of_mem` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministry`
--

INSERT INTO `ministry` (`ministry_id`, `meet_day`, `ministry_name`, `no_of_mem`) VALUES
('YlH6ihF7IQ', 'Sun', 'Children\'s Ministry', 5),
('z7FeyMNq9k', 'Sat', 'Choir', 5);

-- --------------------------------------------------------

--
-- Table structure for table `prayer_requests`
--

CREATE TABLE `prayer_requests` (
  `req_id` int(11) NOT NULL,
  `request` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `sent_by` varchar(255) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prayer_requests`
--

INSERT INTO `prayer_requests` (`req_id`, `request`, `date_added`, `sent_by`, `status`) VALUES
(1, 'I have a lot of things to ask for!!!\r\n', '2018-02-06 12:03:42', 'Some Guy', 'Done'),
(2, 'I have a lot of things to ask for!!!\r\n', '2018-02-09 19:58:11', 'Some Guy', 'Done'),
(3, 'I have a lot of things to ask for!!!\r\n', '2018-02-09 19:57:51', 'Some Guy', 'Done'),
(4, 'Testing this thing at this time', '2018-02-09 19:57:56', 'Some Other Guy', 'Done'),
(5, 'Testing testing one two three Four Five Six Seven Eight Nine Ten', '2018-02-09 19:57:57', 'Some New Other Guy', 'Done'),
(6, 'Testing testing one two three Four Five Six Seven Eight Nine Ten', '2018-02-09 19:57:58', 'Some New Other Guy', 'Done'),
(7, 'This is the text area for a prayer request', '2018-02-09 19:57:58', 'Cool Guy', 'Done'),
(8, 'Saying something needed a lot', '2018-02-09 19:57:59', 'Some Cool Guy', 'Done'),
(9, 'some plenty text', '2018-02-09 19:57:59', 'Yellow', 'Done'),
(10, 'some plenty textyy', '2018-02-09 19:57:59', 'Yellow', 'Done'),
(12, 'ffjtyjt', '2018-02-09 19:58:00', 'ryuyttyj', 'Done'),
(13, 'sdfguiyetrdgbnm,kutyhfgb mnjjyhtgdfbv mn,kjhrdfbcv njmyhtrdfgbc ', '2018-02-09 19:58:00', 'rgrthfyjgu', 'Done'),
(14, 'kajndlfnlknflkn fdnvndflnf', '2018-02-09 19:58:01', 'a;sldkfj', 'Done'),
(15, 'ghrtukiyiluiliulkj', '2018-02-09 19:58:02', 'vcbfgbfhf', 'Done'),
(16, 'ghfjkh,jnbmnvmghjklkjhm nmmb ', '2018-02-09 19:58:05', 'xfbfguhj', 'Done'),
(17, ';aslkdjfpqoieurcv podfkdslfkhlkvkdfj', '2018-02-09 19:58:06', 'new guy', 'Done'),
(18, 'slfdjklknvlkn lkdlkhcsljn  ', '2018-02-09 19:58:07', 'Nice guy', 'Done'),
(19, 'lknvdlknBlah blah blahBlah blah blahBlah blah blahBlah blah blahBlah blah blahBlah blah blah', '2018-02-09 19:58:08', 'slkjnfj', 'Done'),
(21, 'text boxes do not accept special characters\n', '2018-02-09 19:58:09', 'more problems', 'Done'),
(22, 'Hahahahahahahahahahaha', '2018-02-09 19:58:10', 'Yooooooo', 'Done'),
(23, 'Some text with full stop.\nand some enter someting', '2018-02-09 19:58:12', 'New Data', 'Done'),
(24, 'Let me get first class in the exam', '2018-02-09 19:51:23', 'Stephen Djaba', 'Done'),
(25, 'lskdfa;lkdfj sa;lfkksdf;sldkjfas;dfkjvlkj ', '2018-02-09 19:59:45', 'New guy again', 'Done'),
(26, '$result->num_rows', '2018-02-09 20:15:29', 'again', 'Done'),
(27, 'Some plenty prayer requests', '2018-02-13 10:20:03', 'Some new name', 'Done'),
(28, 'cxgcnncvbx vbxbx ccgn vcc cbncng', '2018-02-18 17:14:41', 'cxbv bxvc ', 'Done'),
(29, 'dbxcbnbbv db dbdvd dbdfd', '2018-02-18 17:54:10', 'lkxcvndlkmmk', 'Done'),
(30, 'fvnxc,j nx,n xmnx', '2018-02-18 17:59:08', 'xcj czcvzkbc', 'Done'),
(31, ' cgsdghfnfgbftgf', '2018-02-18 18:05:35', 'dgn hvjfnfn', 'Done'),
(32, 'dshdfhfhgftgh', '2018-02-18 18:12:25', 'dgdhdfghf', 'Done'),
(33, 'dxghdfghfdg', '2018-02-18 18:12:59', 'dghsfhgd', 'Done'),
(34, 'Cashmo is guy', '2018-02-20 12:58:03', 'Cashmo', 'Done'),
(35, 'pray for syria\n', '2018-02-27 15:30:02', 'sanson', 'Done'),
(36, 'First class', '2018-05-13 16:22:59', 'final year', 'Done'),
(37, 'pray', '2018-05-16 17:49:04', 'me', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` int(4) NOT NULL,
  `quoter` varchar(50) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quote_id`, `quoter`, `quote`, `status`) VALUES
(5, ' 1 Corinthians 13:12 NIV', 'For now we see only a reflection as in a mirror; then we shall see face to face. Now I know in part; then I shall know fully, even as I am fully known.', 'Down'),
(6, 'Jeremiah 29:11 kJV', 'For I know the thoughts that I think toward you, saith the LORD, thoughts of peace, and not of evil, to give you an expected end', 'Down'),
(7, 'Psalm 27:4 NIV', 'One thing I ask from the LORD, this only do I seek: that I may dwell in the house of the LORD all the days of my life, to gaze on the beauty of the LORD and to seek him in his temple.', 'Down'),
(8, 'Psalm 34:8', ' Taste and see that the LORD is good; blessed is the one who takes refuge in him.', 'Down'),
(9, 'Proverbs 17:17 NIV', ' A friend loves at all times, and a brother is born for a time of adversity.', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tno`
--

CREATE TABLE `tno` (
  `tno_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tno`
--

INSERT INTO `tno` (`tno_id`, `date`, `amount`) VALUES
(1, '2018-05-18', 13456);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(3) NOT NULL,
  `title` varchar(56) NOT NULL,
  `video` varchar(11) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `title`, `video`, `status`) VALUES
(1, 'Luigi Maclean- Made a Way', 'dHHw33Az33o', 'past'),
(3, 'Chris Tomlin- Good Good Father', 'CqybaIesbuA', 'Current');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_page`
--
ALTER TABLE `cover_page`
  ADD PRIMARY KEY (`cover_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`lead_id`),
  ADD UNIQUE KEY `mem_id` (`mem_id`);

--
-- Indexes for table `married`
--
ALTER TABLE `married`
  ADD PRIMARY KEY (`man`,`lady`),
  ADD KEY `lady` (`lady`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ministry`
--
ALTER TABLE `ministry`
  ADD PRIMARY KEY (`ministry_id`);

--
-- Indexes for table `prayer_requests`
--
ALTER TABLE `prayer_requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `tno`
--
ALTER TABLE `tno`
  ADD PRIMARY KEY (`tno_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `cover_page`
--
ALTER TABLE `cover_page`
  MODIFY `cover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaders`
--
ALTER TABLE `leaders`
  MODIFY `lead_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `prayer_requests`
--
ALTER TABLE `prayer_requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tno`
--
ALTER TABLE `tno`
  MODIFY `tno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
