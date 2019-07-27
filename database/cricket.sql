-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 06:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `total_days` int(10) NOT NULL,
  `end_date` date NOT NULL,
  `cost` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `name`, `email`, `contact`, `purpose`, `start_date`, `total_days`, `end_date`, `cost`, `status`) VALUES
(14, '2', 'Admin', 'd@gmail.com', '1234567890', 'For A Cricket Event For Building MemberS of Our Society', '2019-02-13', 4, '2019-02-16', 12000, 2),
(15, '3', 'Darshan', 'darshan@gmail.com', '9876543210', 'cricket', '2019-02-28', 5, '2019-03-04', 15000, 1),
(16, '2', 'Admin', 'darshan@gmail.com', '9876543210', 'cricket', '2019-02-13', 4, '2019-02-16', 12000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(50) NOT NULL,
  `club_mail` varchar(50) NOT NULL,
  `club_site` varchar(50) NOT NULL,
  `club_tel` int(11) NOT NULL,
  `club_loc` varchar(50) NOT NULL,
  `club_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`club_id`, `club_name`, `club_mail`, `club_site`, `club_tel`, `club_loc`, `club_file`) VALUES
(1, 'The Cricket Club Of India LTD', 'info@cciclub.in', 'http://www.thecricketclubofindia.com', 2147483647, 'Churchgate,Mumbai', 'CricketClubOfIndia.jpg'),
(3, 'POONA CLUB LTD', 'poonaclub@vsnl.com', 'http://www.poonaclubltd.com/', 2026360083, 'Pune,India', 'poonaclub.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_overs` varchar(30) NOT NULL,
  `event_descp` varchar(1000) NOT NULL,
  `event_type` varchar(40) NOT NULL,
  `event_dur` varchar(50) NOT NULL,
  `event_time` varchar(50) NOT NULL,
  `event_prize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_overs`, `event_descp`, `event_type`, `event_dur`, `event_time`, `event_prize`) VALUES
(2, 'Terna Student Champions Trophy', '10', 'Terna\'s Champions Trophy is the Cricket Event Where All Year Students Teams Compete Each Other To Win Terna\'s Champions Trophy', 'Student', 'From 20 Feb To 20 March (Every Tuesday & Thursday', '2:00 pm Onwards', 'Rs.5000'),
(44, 'Terna Faculty Champions Trophy', '10', 'Teams Of Random Faculty Members Compete In a Tournament To Win Terna Faculty Champions Trophy', 'Faculty', 'From 20 Feb To 20 March (Each Saturday)', '2:00pm Onwards', 'Rs.4000'),
(45, 'FE Champions', '5', 'Students Of First Year In College From Same Branch Make Their Best Teams To Compete Other Batches Of Same Year To Win This Title.', 'Student', '21 March To 20 April (Every Tuesday & Thursday)', '2:00pm Onwards', 'Rs.2000'),
(46, 'SE Champions', '10', 'Students Of Second Year In College From Same Branch Make Their Best Teams To Compete Other Batches Of Same Year To Win This Title.', 'Student', '021 March To 20 April (Every Tuesday & Thursday', '9:00 am Onwards', 'Rs.2500'),
(47, 'Staff Fighters', '20', 'Staff From Terna Engineering College From Specific Making Teams And Compete Each Other To Win This Title', 'Staff', 'From 30 April To 20 May (Each Sunday)', '2.00 pm Onwards', 'Rs. 2500'),
(48, 'Terna Champions Trophy', '20', '(Special Event) Terna\'s Student ,Faculty,Staff Make Their Best Teams To Compete And This Glorious Title', 'Others', '20 Feb To 28 Feb Alternate Days', '3.00 Pm To 7.00 Pm', 'Rs.7000 With Surprise Kits');

-- --------------------------------------------------------

--
-- Table structure for table `fb_inbox`
--

CREATE TABLE `fb_inbox` (
  `fbinbox_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fb_id` int(11) NOT NULL,
  `fb_descp` varchar(5000) NOT NULL,
  `fb_reply` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb_inbox`
--

INSERT INTO `fb_inbox` (`fbinbox_id`, `user_id`, `fb_id`, `fb_descp`, `fb_reply`) VALUES
(3, 2, 19, 'feedback', 'problem solved'),
(4, 3, 1, 'taklya darshan:)', 'mahitye mala');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fb_descp` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `user_name`, `user_id`, `fb_descp`) VALUES
(1, 'Darshan', 3, 'taklya darshan:)'),
(2, 'Darshan', 3, 'guthhhhi');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_descp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_descp`) VALUES
(23, 'Every Saturday Get Chance To Watch Our Faculty Playing Live'),
(20, 'Ground Booking On Discount Just Rs.3000 Per Day'),
(19, 'Upcoming Event : Terna Student Champions Trophy'),
(22, 'We Check Ground Bookings Daily At 11.00 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(500) NOT NULL,
  `file` varchar(500) NOT NULL,
  `prod_descr` varchar(1000) NOT NULL,
  `cost` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `file`, `prod_descr`, `cost`) VALUES
(44, 'Boys Full Kit', 'kit1.jpg', 'Play unstoppable in full form on the cricket pitch with CW Ezeepak sports cricket kit red without bat a great cricket equipment pack set by No.1 sports products manufacturers Cricket World. Ezeepak cricket set seven item essential batting pack which has all vital tools for a players to perform in the match.Good quality excellent & with maximum high priority qualities which a batsmen need a most (Original top grade Leg guards with sturdy material construction for maximum protection + Large size hard stuff made ezeepak kit bag + One pair batting gloves+ cricket helmet+arm & Thai guard + abdomen guard a perfect match and best hand protective gear for batsmen) all these high qualities items set in this kit.', '1499'),
(45, 'Economy Cricket Kit, Size 4', 'SG kit4.jpg', '1.SG cricket RSD xtreme Kashmir willow bat\r\n2. SG cricket helmet \r\n3. SG cricket batting gloves \r\n4. SG cricket batting pads \r\n5. SG cricket league abdominal guard \r\n6. In-Box Contents: 1 Cricket Kit Bag, 1 Cricket Bat, 1 Cricket Helmet, 1 Pair Batting Pads, 1 Pair Thigh Pads, 1 Pair Batting Gloves and 1 Abdominal Guard', '1999'),
(46, 'Kookaburra Leather Ball, (Red)', 'kookared.jpg', 'Strong Alum Tanned Leather with moulded cork/Rubber centre â— 4 Pcs. Construction â—Red Cherry Red ball is a premium quality four-piece ball made from superior quality alum tanned leather chosen from the top grade hide. Red Cherry Red is a good quality four-piece cricket ball made from good quality alum tanned leather. Ideal for club cricketers Good abrasion resistance and excellent shape retention â— Good quality centre construction encased with layers of top quality Portuguese cork wound with 100% wool Water-proof', '300'),
(47, 'MRF VK-18 Cricket Kit', 'mrf1.JPG', ' MRF COMPLETE ENGLISH WILLOW CRICKET BAT WITH MRF GRAND EDITION ENGLISH WILLOW CRICKET BAT AND GRAND EDITION BATTING GLOVES AND MRF DUFFLE VK 18 CRICKET KITBAG', '2999'),
(49, 'Cricket Kit - Set of 17 Items', 'RetailWorld-Cricket-Kit-with-Helmet-SDL473277056-1-2fdff.jpg', 'Cricket Kit for Boys containing Cricket Bat , Batting Pad, Arm Guard, Leg Guard, Batting Gloves, Kit Bag, Abdominal Guard, Helmet, Pair of Wrist Support, Head Band, Pair of Inner Gloves, Leather Ball, Bat Grip (2 Pcs), Set of Finger Support, Gym Sipper, Stumps (3 Piece), Supporter (Size-M)', '3999'),
(50, 'Cricket Bat With 2 Hayden Tennis Balls', 'Master_Blaster_With.jpg', 'Popular willow cricket bat Ideal for playing with light weight tennis ball Ideal for age group 14-18 years Ideal for recreational and intermediate level matches Box contents 1 cricket bat with 2 Tennis Balls', '699'),
(51, 'Tennis Bat', 'nike bat.JPG', 'Cricket bats....cricketers and all top coaches agree with suppliers and manufacturers that choosing the correct size bat is vital for the proper technical development of young cricketers. It is important that the bat is not too long and more importantly not too heavy to hinder correct stroke play and good technique. Junior bats are scaled down in size and weight to meet this important requirement.', '649'),
(52, 'Teampack Kit Bag', 'sg bagpack.JPG', 'Without a carry-all, lugging your heavy equipment around can be a pain especially if you spend a lot of time travelling from different tournament venues and practise sessions. Functions and Usability This SG Teampak Kit Bag from the League series is made of heavy duty nylon that can carry heavy loads without tearing. The bag has two additional pockets including a compartment for your shoes. The bag has a zipper closure that keeps all your stuff securely inside. Benefits and Safety Features This bag from SG has a base sheet that is durable and a moulded rubber grip as well. For easy conveyance of a heavy bag, in-built wheels are present as well. More than three decades of manufacturing par excellence cricketing goods has made Sanspareils Greenlands the world\'s go-to company for any serious cricketer. SG prides itself on a research & development team that comprises of world-class cricketers ensuring first-hand perspective on the exact needs of any player.', '899'),
(53, '15-19 Years Boys Cricket Kit', 'sgpack1.JPG', 'Description A Complete Economy Kit for Batsmen (Ideal for 15 to 19 years Child) . --The Kit includes the following item SG Cricket RSD Xtreme Kasmir Willow Bat Size-6 2 SG Cricket Kit Bag. 3. SG Cricket Helmet Youth 4. SG Cricket Batting Pads Youth 5.SG Cricket Batting Gloves Youth 6. SG Cricket Test Thigh Pads Youth. 7.SG Cricket League Abdominal Guard, 8. SG Leather Cricket Ball .', '1300');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `reference_id` int(20) NOT NULL,
  `prod_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`reference_id`, `prod_id`, `user_id`) VALUES
(69, '47', '3'),
(73, '46', '3'),
(77, '44', '2'),
(78, '46', '2'),
(79, '45', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `name`, `email`, `pwd`, `admin`) VALUES
(1, 'Adarsh', 'adarsh@gmail.com', 'abcd123', 0),
(2, 'Admin', 'a@gmail.com', 'abcd123', 1),
(3, 'Darshan', 'd@gmail.com', 'abcd123', 0),
(5, 'Priya', 'priya@gmail.com', 'abcd123', 0),
(9, 'test', 'd@gmail.com', 'abcd123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teams_id` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `player_1` varchar(20) NOT NULL,
  `player_2` varchar(20) NOT NULL,
  `player_3` varchar(20) NOT NULL,
  `player_4` varchar(20) NOT NULL,
  `player_5` varchar(20) NOT NULL,
  `player_6` varchar(20) NOT NULL,
  `player_7` varchar(20) NOT NULL,
  `player_8` varchar(20) NOT NULL,
  `player_9` varchar(20) NOT NULL,
  `player_10` varchar(20) NOT NULL,
  `player_11` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teams_id`, `team_name`, `player_1`, `player_2`, `player_3`, `player_4`, `player_5`, `player_6`, `player_7`, `player_8`, `player_9`, `player_10`, `player_11`) VALUES
(1, 'TE Comps', 'Rishikesh Sawant', 'Adarsh Singh', 'Deepak Dabi', 'Deepak Jarande', 'Siddhesh Naikare', 'Darshan Shirke', 'Aditya Ambre', 'Vivek Gupta', 'Rahul Sanke', 'Amit Patel', 'Amar Sawant'),
(2, 'SE-Mech', 'Abhimanyu Vashishtha', 'Akhil Herwadkar', 'Aman Khan (C)', 'Arman Jaffer', 'Ashay Sardesai', 'Chinmay Sutar', 'Dhrumil Matkar', 'Hardik Tamore', 'Jay Bista', 'Karsh Kothari', 'Khizar Dafedar');

-- --------------------------------------------------------

--
-- Table structure for table `user_inbox`
--

CREATE TABLE `user_inbox` (
  `userinbox_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_msg` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_name` (`event_name`);

--
-- Indexes for table `fb_inbox`
--
ALTER TABLE `fb_inbox`
  ADD PRIMARY KEY (`fbinbox_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fb_id` (`fb_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD UNIQUE KEY `notice_descp` (`notice_descp`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_name` (`prod_name`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`reference_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teams_id`),
  ADD UNIQUE KEY `team_name` (`team_name`);

--
-- Indexes for table `user_inbox`
--
ALTER TABLE `user_inbox`
  ADD PRIMARY KEY (`userinbox_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `fb_inbox`
--
ALTER TABLE `fb_inbox`
  MODIFY `fbinbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `reference_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teams_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_inbox`
--
ALTER TABLE `user_inbox`
  MODIFY `userinbox_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
