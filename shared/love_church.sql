-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 10:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

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
(1, 'Some Announcement headline', 'files/an/845.txt', '2018-03-22 17:32:51'),
(2, 'Another headline', 'files/an/265.txt', '2018-03-22 16:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` varchar(10) NOT NULL,
  `headline` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `added_by` varchar(10) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cover_page`
--

CREATE TABLE `cover_page` (
  `cover_id` int(11) NOT NULL,
  `header_caption` varchar(25) NOT NULL,
  `header_text` varchar(255) NOT NULL,
  `cover_bg` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cover_page`
--

INSERT INTO `cover_page` (`cover_id`, `header_caption`, `header_text`, `cover_bg`, `status`) VALUES
(22, 'Love Church', 'A church like no other \r\nSome more text Some more text Some more text Some more text Some more text Some more text Some more text Some more text Some more text Some more text Some more text', 'img/cover/311.jpg', 'Active'),
(23, 'Love Church', 'blah blah', 'img/cover/409.jpg', 'Inactive'),
(24, 'iyjthgfdm', 'kumjnghbfvd bnhjmk,l.,jmhn gbbgj', 'img/cover/305.jpg', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `devotion`
--

CREATE TABLE `devotion` (
  `devotion_id` varchar(10) NOT NULL,
  `devotion_title` varchar(255) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `mem_id` varchar(10) NOT NULL,
  `portfolio` varchar(100) NOT NULL,
  `ministry` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `baptized` varchar(1) NOT NULL,
  `bap_date` date NOT NULL,
  `tel` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `min_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

CREATE TABLE `ministry` (
  `ministry_id` varchar(10) NOT NULL,
  `head` varchar(10) NOT NULL,
  `meet_days` varchar(100) NOT NULL,
  `ministry_name` varchar(100) NOT NULL,
  `no_of_mem` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(35, 'pray for syria\n', '2018-02-27 15:30:02', 'sanson', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sermon`
--

CREATE TABLE `sermon` (
  `sermon_id` varchar(10) NOT NULL,
  `minister` varchar(255) NOT NULL,
  `sermon_highlight` varchar(100) NOT NULL,
  `resources` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `cover_page`
--
ALTER TABLE `cover_page`
  ADD PRIMARY KEY (`cover_id`);

--
-- Indexes for table `devotion`
--
ALTER TABLE `devotion`
  ADD PRIMARY KEY (`devotion_id`);

--
-- Indexes for table `married`
--
ALTER TABLE `married`
  ADD PRIMARY KEY (`man`,`lady`);

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
-- Indexes for table `sermon`
--
ALTER TABLE `sermon`
  ADD PRIMARY KEY (`sermon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cover_page`
--
ALTER TABLE `cover_page`
  MODIFY `cover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `prayer_requests`
--
ALTER TABLE `prayer_requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
