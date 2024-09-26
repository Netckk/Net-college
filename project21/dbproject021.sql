-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 05:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproject021`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(3) NOT NULL,
  `a_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `a_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `a_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_username`, `a_password`) VALUES
(1, 'แอดเก้า', 'gao', '123');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cp_id` int(11) NOT NULL,
  `cp_name` text COLLATE utf8_unicode_ci NOT NULL,
  `cp_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cp_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cp_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cp_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cp_picture` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cp_id`, `cp_name`, `cp_address`, `cp_phone`, `cp_email`, `cp_user`, `cp_password`, `cp_picture`) VALUES
(21, 'Gamming sss+', '141 14 ไสไทย เกษตรสมบูรณ์ ชัยภูมิ 36120', '0959086588', 'gamming@gmail.com', 'game', '1123', '21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `disability`
--

CREATE TABLE `disability` (
  `id_dst` int(11) NOT NULL,
  `name_dst` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disability`
--

INSERT INTO `disability` (`id_dst`, `name_dst`) VALUES
(1, '  บุคคลที่มีความบกพร่องทางการเห็น'),
(2, ' การได้ยิน'),
(3, 'ทางสติปัญญา'),
(4, 'ทางการเรียนรู้'),
(5, 'ทางการพูด และภาษา'),
(6, 'ทางพฤติกรรม หรืออารมณ์'),
(7, 'ออทิสติก');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(3) NOT NULL,
  `job_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `job_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `job_welfare` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `job_salary` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `job_wb` text COLLATE utf8_unicode_ci NOT NULL,
  `job_status` int(11) NOT NULL DEFAULT 0,
  `id_dst` int(3) NOT NULL,
  `job_cpid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`, `job_detail`, `job_welfare`, `job_salary`, `job_wb`, `job_status`, `id_dst`, `job_cpid`) VALUES
(8, 'งานประชาสัมพัน', 'ประชาสัมพันธ์หน้า facebook', 'ข้าวฟรี รักษาฟรี', '150,000 - 200,000', '11', 1, 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `m_id` int(3) NOT NULL,
  `m_cpid` int(3) NOT NULL,
  `m_uid` int(3) NOT NULL,
  `m_jid` int(3) NOT NULL,
  `m_text` text COLLATE utf8_unicode_ci NOT NULL,
  `m_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regisjob`
--

CREATE TABLE `regisjob` (
  `r_id` int(3) NOT NULL,
  `r_uid` int(3) NOT NULL,
  `r_jid` int(3) NOT NULL,
  `r_status` int(1) NOT NULL DEFAULT 0,
  `r_date` datetime NOT NULL,
  `r_text` text COLLATE utf8_unicode_ci NOT NULL,
  `r_img` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'resume.jpg',
  `r_itv` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regisjob`
--

INSERT INTO `regisjob` (`r_id`, `r_uid`, `r_jid`, `r_status`, `r_date`, `r_text`, `r_img`, `r_itv`) VALUES
(2, 1, 1, 1, '2023-01-28 20:27:51', '', '202301282027511.jpg', '0000-00-00 00:00:00'),
(4, 0, 1, 0, '2023-02-03 14:24:13', '', '20230203142413.jpg', '0000-00-00 00:00:00'),
(6, 7, 8, 2, '2023-02-04 12:23:36', '', '202302041223367.jpg', '0000-00-00 00:00:00'),
(7, 7, 8, 1, '2023-02-04 12:42:55', '', '202302041242557.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `typejob`
--

CREATE TABLE `typejob` (
  `id_tpjob` int(3) NOT NULL,
  `name_tpjob` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `typejob`
--

INSERT INTO `typejob` (`id_tpjob`, `name_tpjob`) VALUES
(1, 'งานกฎหมาย'),
(2, 'งานก่อสร้างสถาปัตยกรรม'),
(3, 'งานการเงิน/ธนาคาร'),
(4, 'งานการตลาด'),
(5, 'งานเกษตร/ปศุสัตว์/ประมง'),
(6, 'งานขนส่งและคลังสินค้า'),
(7, 'งานขาย'),
(8, 'งานเขียนแบบ'),
(9, 'งานเขียน/พิสูจน์อักษร/นักแปล/บรรณาธิการ\n'),
(10, 'งานคอมพิวเตอร์/ไอที'),
(11, 'งานจัดซื้อ/งานธุรการ/ประสานงาน'),
(12, 'งานช่างเทคนิค'),
(13, 'งานด้านสุขภาพ/ฟิตเนส/สปา'),
(14, 'งานออกแบบเว็บไซต์');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_tel` int(10) NOT NULL,
  `u_address` text COLLATE utf8_unicode_ci NOT NULL,
  `u_education` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_sex` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `u_rg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_birtdate` date NOT NULL,
  `u_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `u_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_dst` int(10) NOT NULL,
  `u_img` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_tel`, `u_address`, `u_education`, `u_sex`, `u_rg`, `u_birtdate`, `u_email`, `u_username`, `u_password`, `id_dst`, `u_img`) VALUES
(7, 'chakkrit ruerang', 959086588, '141 14 หนองโพนงาม เกษตรสมบูรณ์ ชัยภูมิ 36120', 'ประกาศนียบัตรวิชาชีพ', 'ชาย', 'พุทธ', '2004-06-28', 'chakkrit1120@gmaIl.com', 'asd', '123', 3, '7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indexes for table `disability`
--
ALTER TABLE `disability`
  ADD PRIMARY KEY (`id_dst`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `regisjob`
--
ALTER TABLE `regisjob`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `typejob`
--
ALTER TABLE `typejob`
  ADD PRIMARY KEY (`id_tpjob`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `disability`
--
ALTER TABLE `disability`
  MODIFY `id_dst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `m_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regisjob`
--
ALTER TABLE `regisjob`
  MODIFY `r_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `typejob`
--
ALTER TABLE `typejob`
  MODIFY `id_tpjob` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
