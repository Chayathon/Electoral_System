-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 10:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electoral`
--

-- --------------------------------------------------------

--
-- Table structure for table `eltr_admin`
--

CREATE TABLE `eltr_admin` (
  `a_id` int(11) NOT NULL,
  `a_user` varchar(100) NOT NULL,
  `a_pass` varchar(100) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eltr_admin`
--

INSERT INTO `eltr_admin` (`a_id`, `a_user`, `a_pass`, `a_name`, `a_level`) VALUES
(1, 'Chayathon', '135790', 'Super Admin', 'superadmin'),
(2, 'Kittipan', '123456', 'Petch', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `eltr_candidate`
--

CREATE TABLE `eltr_candidate` (
  `c_number` int(11) NOT NULL,
  `c_stdid` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_class` varchar(10) NOT NULL,
  `c_major` varchar(100) NOT NULL,
  `c_year` int(11) NOT NULL,
  `c_policy` varchar(500) NOT NULL,
  `c_img` varchar(100) NOT NULL,
  `c_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eltr_candidate`
--

INSERT INTO `eltr_candidate` (`c_number`, `c_stdid`, `c_name`, `c_class`, `c_major`, `c_year`, `c_policy`, `c_img`, `c_score`) VALUES
(0, '', 'ไม่ประสงค์ลงคะแนน', '', '', 0, '', '', 125),
(1, '64301010001', 'นายภูผา เจริญผล', 'ปวส.1', 'เทคโนโลยีธุรกิจ', 2564, '1.ปรับปรุงภูมิทัศน์ในวิทยาลัย ให้สวย สะอาด น่าเรียน น่าอยู่<br>\r\n2.ส่งเสริมกิจกรรมภายนอกห้องเรียน เช่น กีฬา ดนตรี เต้น Cover Dance', 'policy1072363273.jpg', 27),
(2, '64302010001', 'นายชัยมงคล สุวรรณี', 'ปวส.1', 'จัดดอกไม้', 2564, 'กิจกรรมสร้างสรรค์ พัฒนาผู้เรียน<br>\r\nส่งเสริมความพากเพียร ให้วิทยาลัยฯของเรา', 'policy1646079046.jpg', 246),
(3, '64303010001', 'นางสาวอภิญญาณ์ หลงแก้ว', 'ปวส.1', 'คอมพิวเตอร์กราฟิก', 2564, '1.ดูแลสุขาให้ดีขึ้น มีการจัดวางกระดาษเหลือใช้ตามห้องน้ำหญิงทุกห้อง<br>\r\n2.มีการรณรงค์เพิ่มรายได้ให้แต่ละสาขาโดยการเก็บขวดไปขาย<br>\r\n3.รับกล่องความเห็น', 'policy1068563815.jpg', 89),
(4, '64304010001', 'นางสาวสุธาสินี ภาษี', 'ปวส.1', 'อาหารและโภชนาการ', 2564, 'ปรับเปลี่ยนภูมิทัศน์ภายในวิทยาลัย<br>\r\nมีกิจกรรมทำความสะอาดวิทยาลัยทุกสัปดาห์', 'policy225543433.jpg', 112),
(5, '64305010001', 'นางสาวกนกวรรณ วงษา', 'ปวส.1', 'ออกแบบนิเทศศิลป์', 2564, 'รับฟัง ถ่ายทอด ช่วยกัน แก้ไข', 'policy61960568.jpg', 327),
(6, '64306010001', 'นางสาวมะลิวัลย์ อิสสระ', 'ปวส.1', 'การตลาด', 2564, '1.ปรับปรุงภูมิทัศน์วิทยาลัย<br>\r\n2.จัดระเบียบโรงอาหารและโรงจอดรถ', 'policy373741224.jpg', 169),
(7, '64307010001', 'นางสาวพรพรหม แซ่ฉั่ว', 'ปวส.1', 'การบัญชี', 2564, '1.ปรับปรุงภูมิทัศน์ (วิทยาลัยน่าอยู่)<br>\r\n2.คำศัพท์ต่างประเทศที่น่าสนใจ<br>\r\n3.We-talk (ปรึกษาออนไลน์)<br>\r\n4.กิจกรรมค้นหาความสามารถและความกล้าแสดงออกของนักเรียนนักศึกษา', 'policy1511687440.jpg', 187),
(8, '63308010001', 'นางสาวอาทิตยา มีสวัสดิ์', 'ปวช.2', 'การจัดการสำนักงาน', 2564, '1.ปรับปรุงและดูแลความสะอาดภายในอาคารเรียน, ห้องเรียน, และเขตในวิทยาลัย<br>\r\n2.สนับสนุนให้นักเรียนนักศึกษามีส่วนร่วมกับกิจกรรมต่างๆของวิทยาลัยให้ได้มากที่สุด', 'policy145660318.jpg', 214),
(9, '64309010020', 'นางสาวญาณิศา สิมมา', 'ปวส.1', 'เทคโนโลยีสารสนเทศ', 2564, '1.พัฒนาผู้เรียนให้มีความสามารถคิดแก้ปัญหาในการดำรงชีวิตและประกอบอาชีพอย่างมั่นคง<br>\r\n2.ส่งเสริมการแข่งขันกีฬาอีสปอร์ต ภาคเรียนละ 2 ครั้ง', 'policy1449631396.jpg', 555),
(10, '64310010001', 'นางสาวเบญจวรรณ ย้อยจิ้งหรีด', 'ปวส.1', 'การจัดการโลจิสติกส์', 2564, '1.ผู้เรียนใส่ใจวิทยาลัย<br>\r\n2.ห้องน้ำคือชีวิต<br>\r\n3.กล่องเสียงคนรุ่นใหม่', 'policy1731780908.jpg', 253),
(11, '64311010001', 'นางสาวกนกวรรณ ยวนใจ', 'ปวส.1', 'การจัดการ', 2564, '1.จัดตั้งโครงการตลาดนัดสินค้าเพื่อให้แต่ละแผนกมีรายได้<br>\r\n2.จัดทำกล่องนโยบาย เพื่อให้นักเรียนนักศึกษาเสนอสิ่งที่ต้องการและส่งที่อยากให้ทำ<br>\r\n3.รณรงค์รักษาความสะอาดภายในวิทยาลัย', 'policy497533294.jpg', 326),
(12, '64312010001', 'นายรัตนโชติ สิงห์แก้ว', 'ปวส.1', 'การโรงแรม', 2564, '1.ส่งเสริมงานต่างๆ ของวิทยาลัยอย่างเต็มศักยภาพ<br>\r\n2.จัดกิจกรรมกล่องร้อยความคิดเห็นและร่วมพัฒนาปัญหาต่างๆ<br>\r\n3.ส่งเสริมกิจกรรมสร้างสรรค์ สร้างความสนุกสนานผ่อนคลายในวิทยาลัย', 'policy1827265683.jpg', 172);

-- --------------------------------------------------------

--
-- Table structure for table `eltr_student`
--

CREATE TABLE `eltr_student` (
  `s_user` varchar(100) NOT NULL,
  `s_pass` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_class` varchar(10) NOT NULL,
  `s_year` int(11) NOT NULL,
  `s_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eltr_student`
--

INSERT INTO `eltr_student` (`s_user`, `s_pass`, `s_name`, `s_class`, `s_year`, `s_status`) VALUES
('64309010001', '01/01/2545', 'นายกาณจนศักดิ์ จำศิล', 'สทส.1/1', 2564, 1),
('64309010002', '06/03/2546', 'นายกิตติพันธ์ จันทไหว', 'สทส.1/1', 2564, 1),
('64309010003', '01/01/2545', 'นายชนะชัย คงกลาง', 'สทส.1/1', 2564, 1),
('64309010004', '03/03/2546', 'นายชยธร เติมพิพัฒน์พงศ์', 'สทส.1/1', 2564, 1),
('64309010005', '01/01/2545', 'นายชัยรัตน์ เสือประสงค์', 'สทส.1/1', 2564, 1),
('64309010006', '01/01/2545', 'นายณัฐพล แป๊ะประภา', 'สทส.1/1', 2564, 1),
('64309010007', '01/01/2545', 'นายทีฆทัศน์ ประทับศักดิ์', 'สทส.1/1', 2564, 1),
('64309010008', '01/01/2545', 'นายธนพันธ์ ศิวิลัย', 'สทส.1/1', 2564, 1),
('64309010009', '01/01/2545', 'นายธรรมวัฒน์ จิตไมตรี', 'สทส.1/1', 2564, 1),
('64309010010', '01/01/2545', 'นายธรรมศาสตร์ เจริญสุข', 'สทส.1/1', 2564, 1),
('64309010011', '01/01/2545', 'นายธวัชชัย ปัญญาแก้ว', 'สทส.1/1', 2564, 1),
('64309010012', '01/01/2545', 'นายบูรพา หันสมร', 'สทส.1/1', 2564, 1),
('64309010013', '01/01/2545', 'นายภูวพันธ์ ปัญญาเหลือ', 'สทส.1/1', 2564, 1),
('64309010014', '01/01/2545', 'นายมงคล กิมาโส', 'สทส.1/1', 2564, 1),
('64309010015', '01/01/2545', 'นายมนตรี ฤทธิ์ชัยดำรงกุล', 'สทส.1/1', 2564, 1),
('64309010016', '01/01/2545', 'นายวรเมธ ต้นตะยางกุล', 'สทส.1/1', 2564, 1),
('64309010017', '01/01/2545', 'นายสายันต์ อินทรพรหม', 'สทส.1/1', 2564, 1),
('64309010018', '01/01/2545', 'นายอดิเทพ ใจวัฒนาสวัสดิ์', 'สทส.1/1', 2564, 1),
('64309010019', '01/01/2545', 'นางสาวกานต์สินี กำพุทธ', 'สทส.1/1', 2564, 0),
('64309010020', '01/01/2545', 'นางสาวญาณิศา สิมมา', 'สทส.1/1', 2564, 0),
('64309010021', '01/01/2545', 'นางสาวณฐินี เจริญงามสกุล', 'สทส.1/1', 2564, 0),
('64309010022', '01/01/2545', 'นางสาวทานตะวัน สีเมฆ', 'สทส.1/1', 2564, 0),
('64309010023', '01/01/2545', 'นางสาวรติรัตน์ อ่อนสุดใจ', 'สทส.1/1', 2564, 0),
('64309010024', '01/01/2545', 'นางสาวลัคนา ยิ้มละมัย', 'สทส.1/1', 2564, 0),
('64309010025', '01/01/2545', 'นางสาววัลลภา จันลา', 'สทส.1/1', 2564, 0),
('64309010026', '01/01/2545', 'นางสาววิชุดา แววกระโทก', 'สทส.1/1', 2564, 0),
('64309010027', '01/01/2545', 'นางสาวสุกัญญา วันสา', 'สทส.1/1', 2564, 0),
('64309010028', '01/01/2545', 'นางสาวอาภัสรา กลางลาด', 'สทส.1/1', 2564, 0),
('64309010029', '01/01/2545', 'นางสาวณัชชา บุญรักษา', 'สทส.1/1', 2564, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eltr_admin`
--
ALTER TABLE `eltr_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `eltr_candidate`
--
ALTER TABLE `eltr_candidate`
  ADD PRIMARY KEY (`c_number`);

--
-- Indexes for table `eltr_student`
--
ALTER TABLE `eltr_student`
  ADD PRIMARY KEY (`s_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eltr_admin`
--
ALTER TABLE `eltr_admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
