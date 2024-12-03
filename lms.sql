-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 10:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendee_id` int(11) NOT NULL,
  `fees_paid` int(11) DEFAULT NULL,
  `NID_number` int(11) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE `attends` (
  `event_id` int(11) NOT NULL,
  `attendee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_full_name` varchar(250) NOT NULL,
  `au_image` varchar(400) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `biography` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_full_name`, `au_image`, `nationality`, `biography`) VALUES
(1, 'Humayun Ahmed', 'image/mdp.jpg', 'Bangladesh', 'Humayun Ahmed was a Bangladeshi writer, dramatist, and film director'),
(2, '‎Sarat Chandra Chattopadhyay', 'image/ChattopadhyaySharatChandra.jpg', 'Indain', 'Bengali novelist and short story writer of the early 20th century.'),
(3, 'William Shakespeare', 'image/Rothman-Shakespear-In-New-Yorker.jpg', ' England', 'William Shakespeare was a renowned English poet, playwright, and actor born in 1564 in Stratford-upon-Avon.'),
(4, 'Jane Austen', 'image/960108_ra604.jpg', 'Britsh', 'Celebrated English novelist Jane Austen is born on December 16, 1775, the seventh of eight children of a clergyman in a country village in Hampshire'),
(5, 'Robert C. Martin', 'image/images (1).jpg', 'Britsh', 'Martin has authored many books and magazine articles. He was the editor-in-chief of C++ Report magazine and served as the first chairman of the Agile Alliance.'),
(6, 'Abraham Silberschatz ', 'image/downloary.jpg', 'Ishraili', 'Avi Silberschatz is an Israeli computer scientist and researcher. He is known for having authored many influential texts in computer science'),
(7, 'Arif Azad', 'image/Arif-Azad-300x186.jpg', 'Bangladesh', ' Muijul Hoque Azad (Born: January 7, 1990) is a Bangladeshi activist and author. All of his three books became bestseller in Ekushey Book Fair.');

-- --------------------------------------------------------

--
-- Table structure for table `au_published`
--

CREATE TABLE `au_published` (
  `Publisher_id` int(11) NOT NULL,
  `Author_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `a_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `award_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`a_id`, `member_id`, `event_id`, `award_name`) VALUES
(13, 2, 2, 'Longest Member/Best Reader'),
(14, 3, 5, 'Best Reader'),
(15, 7, 4, 'best Writer'),
(16, 5, 3, 'Best Member');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_image` varchar(400) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `book_isbn` int(50) NOT NULL,
  `aviavlity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_image`, `book_name`, `author_id`, `author_name`, `cat_id`, `cat_name`, `book_isbn`, `aviavlity`) VALUES
(9, 'image/Opekkha-Humayun_Ahmed-9a14b-222273.png', ' অপেক্ষা', 1, 'Humayun Ahmed', 1, 'Contemporary Novel', 2107483647, 99),
(10, 'image/img-3-600x904.jpg', 'Bohubrihi', 1, 'Humayun Ahmed', 1, 'Contemporary Novel', 214709647, 90),
(11, 'image/Deyal_by_Humayun_Ahmed_book_cover.jpg', 'Deyal', 1, 'Humayun Ahmed', 2, 'Novel', 214083647, 11),
(12, 'image/9789354348648.jpg', 'Devdash', 2, 'Sarat Chandra Chattopadhyay ', 2, 'Novel', 214748361, 100),
(13, 'image/Parineeta-Saratchandra_Chattopadhyay-23f90-346687.jpg', 'parineeta', 2, 'Sarat Chandra Chattopadhyay ', 2, 'Novel', 214748300, 80),
(14, 'image/Pother_Dabi-Saratchandra_Chattopadhyay-0295b-262821.png', 'Pother Dabi', 2, 'Sarat Chandra Chattopadhyay ', 2, 'Novel', 214748356, 99),
(15, 'image/book_27072022-01-30_1643524055.jpg', 'Hamlet', 3, 'William Shakespeare', 3, 'Revenge tragedy ', 21471647, 80),
(16, 'image/61LQf6GWT4L._AC_UF1000,1000_QL80_.jpg', 'Romeo and Juliet', 3, 'William Shakespeare', 4, 'Love', 2147557, 159),
(17, 'image/images.jpg', 'Twelfth Night', 3, 'William Shakespeare', 5, 'Comedy', 2474864, 161),
(18, 'image/71if8BnWzmL._AC_UF1000,1000_QL80_.jpg', 'Othello', 3, 'William Shakespeare', 6, 'Tragidey', 21465647, 79),
(21, 'image/download.jpg', 'EMMA', 4, 'Jane Austen', 4, 'Novel', 2156647, 159),
(22, 'image/down.jpg', 'Clean code', 5, 'Robert C. Martin', 7, 'Computer Science Engineering', 21477747, 87),
(23, 'image/do.jpg', 'Agile Software Development, Principles, Patterns, and Practices', 5, 'Robert C. Martin', 7, 'Computer Science Engineering', 94799161, 165),
(24, 'image/downloa.jpg', 'Database System Concepts', 6, 'Abraham Silberschatz', 7, 'Computer Science Engineering', 214723647, 455),
(25, 'image/Paradoxical-Sajid-1.jpg', 'Paradoxical Sajid', 7, 'Arif Azad', 8, 'Islamic', 909978, 121),
(26, 'image/Paradoxical-Sajid-1.jpg', 'Himu', 1, 'Humayun Ahmed', 1, 'Novel', 98789, 12);

-- --------------------------------------------------------

--
-- Table structure for table `book_copies`
--

CREATE TABLE `book_copies` (
  `Book_copy_ID` int(11) NOT NULL,
  `isbn` int(13) DEFAULT NULL,
  `Availability_status` varchar(50) DEFAULT NULL,
  `librarian_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_fine`
--

CREATE TABLE `book_fine` (
  `bid` int(11) NOT NULL,
  `fine_amount` int(111) NOT NULL,
  `payment` int(111) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books_fines`
--

CREATE TABLE `borrowed_books_fines` (
  `fines_id` int(11) NOT NULL,
  `fine_amount` int(11) NOT NULL,
  `payment_statu` varchar(15) NOT NULL,
  `memer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(13, 'Contemporary Novel'),
(14, 'Novel'),
(15, 'Revenge tragedy '),
(16, 'Love'),
(17, 'Comedy'),
(18, 'Tragidey'),
(19, 'Computer Science Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `d_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `highest_degree` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eresources`
--

CREATE TABLE `eresources` (
  `e_id` int(99) NOT NULL,
  `e_name` varchar(70) NOT NULL,
  `type` varchar(70) NOT NULL,
  `avility` int(100) DEFAULT NULL,
  `brance_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eresources`
--

INSERT INTO `eresources` (`e_id`, `e_name`, `type`, `avility`, `brance_id`) VALUES
(8, ' Electronic journals', 'journals', 12, 1),
(9, 'electronic books', 'Books', 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `installment`
--

CREATE TABLE `installment` (
  `member_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `Fine` int(11) NOT NULL,
  `installment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `s_no` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_author` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `issue_date` longtext NOT NULL,
  `due_date` date DEFAULT NULL,
  `fine` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`s_no`, `book_no`, `book_name`, `book_author`, `student_id`, `status`, `issue_date`, `due_date`, `fine`) VALUES
(53, 21465647, 'Othello', 'William Shakespeare', 7, 0, '2024-05-08', '2024-05-24', 20),
(54, 214748361, 'Devdash', '‎Sarat Chandra Chattopadhyay', 1, 0, '2024-05-27', '2024-06-06', 30),
(55, 214723647, 'Database System Concepts', 'Abraham Silberschatz', 2, 1, '2024-04-30', '2024-05-24', NULL),
(56, 2107483647, 'অপেক্ষা', 'Humayun Ahmed', 3, 1, '2024-05-01', '2024-05-25', NULL),
(57, 2156647, 'EMMA', 'Jane Austen', 4, 1, '2024-05-02', '2024-05-27', NULL),
(60, 2474864, 'Twelfth Night', 'William Shakespeare', 5, 0, '2024-05-01', '2024-05-25', 10),
(61, 21477747, 'Clean code', 'Robert C. Martin', 5, 0, '2024-05-22', '2024-05-26', 0),
(62, 2147557, 'Romeo and Juliet', 'William Shakespeare', 7, 1, '2024-05-14', '2024-06-07', NULL),
(63, 2474864, 'Twelfth Night', 'William Shakespeare', 5, 1, '2024-05-09', '2024-05-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(11) NOT NULL,
  `lib_image` varchar(400) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `job_role` varchar(60) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` int(10) NOT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `lib_image`, `name`, `email`, `job_role`, `password`, `mobile`, `branch_id`) VALUES
(15, 'image/439417479_3757897381202810_2655016514123199849_n.jpg', 'Rabby Ishlam', 'rabby@gmail.com', 'Library Managers', '11111', 1719390998, 1),
(16, 'image/426544246_1865523963876525_1028750486509254855_n.jpg', 'Tawfiq Ishlam', 'tafiq@gmail.com', 'Library Managers', '11111', 1719390998, 4),
(18, 'image/20240412_160430_🔐Time to fly💯R13_by_Masum_124453.PORTRAIT.jpg', 'Ms Alifa', 'alifa@gamil.com', 'manager', '12345', 1234567898, 2);

-- --------------------------------------------------------

--
-- Table structure for table `library_branches`
--

CREATE TABLE `library_branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact_info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_branches`
--

INSERT INTO `library_branches` (`branch_id`, `branch_name`, `address`, `contact_info`) VALUES
(1, 'Dhaka Library', 'Dhaka University', 2147483647),
(2, 'Bangla Academy Library', 'Dhaka', 2147483647),
(3, 'United Nations Information Centre', 'Dhaka', 880173466),
(4, 'North South University Library', 'Dhaka', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `library_events`
--

CREATE TABLE `library_events` (
  `event_id` int(11) NOT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_events`
--

INSERT INTO `library_events` (`event_id`, `ename`, `branch_id`, `date`, `location`) VALUES
(2, 'Book Bonanza', 1, '2024-05-29', 'Dhaka'),
(3, 'Library Lit Fest', 2, '2024-06-06', 'Dhaka'),
(4, 'Story Safari', 3, '2024-05-29', 'Dhaka'),
(5, 'Reading Roundtable', 4, '2024-06-07', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `library_subscription`
--

CREATE TABLE `library_subscription` (
  `sub_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_subscription`
--

INSERT INTO `library_subscription` (`sub_id`, `id`, `sname`, `type`, `availability`) VALUES
(8, 4, 'Book Haven Membership', 'Premium ', 1),
(9, 1, 'Premium Page Turner', 'Basic', 1),
(10, 2, 'Novel Navigator Subscription', 'Premium ', 1),
(11, 3, 'Novel Navigator Subscription', 'Premium ', 1),
(12, 5, 'Novel Navigator Subscription', 'Basic', 1),
(13, 6, 'Premium Page Turner', 'Premium ', 1),
(14, 7, 'Novel Navigator Subscription', 'Basic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proceedings`
--

CREATE TABLE `proceedings` (
  `id` int(11) NOT NULL,
  `conference_name` varchar(50) DEFAULT NULL,
  `conference_topic` varchar(100) DEFAULT NULL,
  `lib_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proceedings`
--

INSERT INTO `proceedings` (`id`, `conference_name`, `conference_topic`, `lib_id`) VALUES
(1, 'Library Innovators Summit', 'Adapting library services to the digital age.', 1),
(2, 'Future of Libraries Conference', 'Teaching critical thinking and research skills', 4),
(3, 'Global Library Exchange', 'Creative programs to engage community members.', 2),
(4, 'NextGen Libraries Conference', 'Promoting open access resources and publications.\r\n', 4);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `contact_info` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `book_id`, `user_id`, `review`, `rating`) VALUES
(9, 9, NULL, '', 4),
(10, 10, NULL, '', 5),
(11, 24, NULL, '', 5),
(12, 23, NULL, '', 2),
(13, 11, NULL, '', 3),
(14, 14, NULL, '', 2),
(15, 12, NULL, '', 3),
(16, 13, NULL, '', 5),
(17, 15, NULL, '', 5),
(18, 16, NULL, '', 5),
(19, 17, NULL, '', 4),
(20, 18, NULL, '', 4),
(21, 21, NULL, '', 3),
(22, 24, NULL, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `s_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `seminar_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`s_id`, `title`, `seminar_date`, `start_time`, `end_time`, `branch_id`) VALUES
(1, 'Digital Transformation in Libraries', '2024-06-01', '05:52:00', '07:52:00', 1),
(2, 'Preservation of Cultural Heritage', '2024-05-31', '17:52:00', '18:52:00', 2),
(3, 'The Future of Academic Libraries', '2024-06-07', '20:53:00', '21:53:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

CREATE TABLE `speaker` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sp_image` varchar(400) NOT NULL,
  `speech_title` varchar(50) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speaker`
--

INSERT INTO `speaker` (`id`, `name`, `sp_image`, `speech_title`, `summary`, `specialization`, `s_id`, `branch_id`) VALUES
(10, 'Maqsudul Alam', 'image/d).jpg', 'Digital Transformation', 'The transformation of libraries from their traditional, physical embodiments to digital forms represents a profound shift in the way knowledge and information are curated, accessed, and disseminated.', 'Scientest', 1, 1),
(11, 'Kamrun Nahar', 'image/h).jpg', 'Cultural Heritage', 'The deliberate action of keeping cultural heritage from the present for the future is known as preservation (American English) or conservation (British English), which cultural and historical ethnic m', 'scientist and environmentalist', 2, 2),
(12, 'Shuvo Roy', 'image/ucsf-shuvo-roy.jpg', 'The Future of Academic ', 'Academic publishing is the backbone of science dissemination –– but is the current system fit for purpose? We asked a diverse group of scientists to comment on the future of publishing. They discuss s', 'American scientist and engineer', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `std_image` varchar(400) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `std_image`, `name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'image/435781610_413056168111487_404518686600224554_n.jpg', 'Irfan Shah Mayen', 'irfan@gmail.com', '11111', 1722295770, 'Basundhora'),
(2, 'image/425317675_3698302417154356_1901434105925118434_n.jpg', 'Muhammad Saad', 'saad@gmail.com', '11111', 1719390997, 'Dhaka'),
(3, 'image/438256400_883220986906629_7067308390254897891_n.jpg', 'Muhtadina Serniabat Tasin', 'tasin@gamil.com', '11111', 1719390777, 'Basundhora'),
(4, 'image/436197241_3834728016762618_1168171875168043995_n.jpg', 'Nabil Abdullha', 'nabil@gmail.com', '11111', 1719390997, 'Dhaka'),
(5, 'image/404312912_280192288352010_6560130382202683642_n.jpg', 'Nayon', 'nayon@gmail.com', '11111', 1788888888, 'Dhaka'),
(6, 'image/442500925_3472801023022067_7373937215262283185_n.jpg', 'Asif Mamunur', 'asif@gmail.com', '11111', 1722295770, 'Dhaka,Kisorgang'),
(7, 'image/441307958_428083463496217_3018461198452259694_n.jpg', 'Adriya Keya', 'keya@gmail.com', '11111', 1733205770, 'Dhaka'),
(30, 'image/dowwelfh.jpg', 'David Bekham', 'david@gmail.com', '11111', 1722205770, 'German');

-- --------------------------------------------------------

--
-- Table structure for table `working`
--

CREATE TABLE `working` (
  `librarian_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendee_id`);

--
-- Indexes for table `attends`
--
ALTER TABLE `attends`
  ADD PRIMARY KEY (`event_id`,`attendee_id`),
  ADD KEY `attendee_id` (`attendee_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `au_published`
--
ALTER TABLE `au_published`
  ADD PRIMARY KEY (`Publisher_id`,`Author_ID`),
  ADD KEY `Author_ID` (`Author_ID`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_copies`
--
ALTER TABLE `book_copies`
  ADD PRIMARY KEY (`Book_copy_ID`),
  ADD KEY `isbn` (`isbn`),
  ADD KEY `librianfk` (`librarian_ID`);

--
-- Indexes for table `book_fine`
--
ALTER TABLE `book_fine`
  ADD PRIMARY KEY (`bid`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `borrowed_books_fines`
--
ALTER TABLE `borrowed_books_fines`
  ADD PRIMARY KEY (`fines_id`,`fine_amount`),
  ADD KEY `memer_id` (`memer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `eresources`
--
ALTER TABLE `eresources`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `brance_id` (`brance_id`);

--
-- Indexes for table `installment`
--
ALTER TABLE `installment`
  ADD PRIMARY KEY (`member_id`,`amount`,`Fine`,`installment_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `library_branches`
--
ALTER TABLE `library_branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `library_events`
--
ALTER TABLE `library_events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `library_subscription`
--
ALTER TABLE `library_subscription`
  ADD PRIMARY KEY (`sub_id`,`id`,`sname`,`type`,`availability`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `proceedings`
--
ALTER TABLE `proceedings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lib_branch` (`lib_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seminar` (`s_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working`
--
ALTER TABLE `working`
  ADD PRIMARY KEY (`librarian_id`,`branch_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `book_fine`
--
ALTER TABLE `book_fine`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eresources`
--
ALTER TABLE `eresources`
  MODIFY `e_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `library_events`
--
ALTER TABLE `library_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `library_subscription`
--
ALTER TABLE `library_subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `proceedings`
--
ALTER TABLE `proceedings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `speaker`
--
ALTER TABLE `speaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attends`
--
ALTER TABLE `attends`
  ADD CONSTRAINT `attends_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `library_events` (`event_id`),
  ADD CONSTRAINT `attends_ibfk_2` FOREIGN KEY (`attendee_id`) REFERENCES `attendees` (`attendee_id`);

--
-- Constraints for table `au_published`
--
ALTER TABLE `au_published`
  ADD CONSTRAINT `au_published_ibfk_1` FOREIGN KEY (`Publisher_id`) REFERENCES `publisher` (`publisher_id`),
  ADD CONSTRAINT `au_published_ibfk_2` FOREIGN KEY (`Author_ID`) REFERENCES `authors` (`author_id`);

--
-- Constraints for table `award`
--
ALTER TABLE `award`
  ADD CONSTRAINT `award_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `award_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `library_events` (`event_id`);

--
-- Constraints for table `book_copies`
--
ALTER TABLE `book_copies`
  ADD CONSTRAINT `isbn` FOREIGN KEY (`isbn`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `librianfk` FOREIGN KEY (`librarian_ID`) REFERENCES `librarians` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_fine`
--
ALTER TABLE `book_fine`
  ADD CONSTRAINT `book_fine_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `borrowed_books_fines`
--
ALTER TABLE `borrowed_books_fines`
  ADD CONSTRAINT `borrowed_books_fines_ibfk_1` FOREIGN KEY (`memer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `degree`
--
ALTER TABLE `degree`
  ADD CONSTRAINT `degree_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `eresources`
--
ALTER TABLE `eresources`
  ADD CONSTRAINT `eresources_ibfk_1` FOREIGN KEY (`brance_id`) REFERENCES `library_branches` (`branch_id`);

--
-- Constraints for table `installment`
--
ALTER TABLE `installment`
  ADD CONSTRAINT `mm` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD CONSTRAINT `issued_books_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `librarians`
--
ALTER TABLE `librarians`
  ADD CONSTRAINT `librarians_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `library_branches` (`branch_id`);

--
-- Constraints for table `library_events`
--
ALTER TABLE `library_events`
  ADD CONSTRAINT `library_events_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `library_branches` (`branch_id`);

--
-- Constraints for table `library_subscription`
--
ALTER TABLE `library_subscription`
  ADD CONSTRAINT `library_subscription_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `proceedings`
--
ALTER TABLE `proceedings`
  ADD CONSTRAINT `proceedings_ibfk_1` FOREIGN KEY (`lib_id`) REFERENCES `library_branches` (`branch_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `seminar_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `library_branches` (`branch_id`);

--
-- Constraints for table `speaker`
--
ALTER TABLE `speaker`
  ADD CONSTRAINT `speaker_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seminar` (`s_id`),
  ADD CONSTRAINT `speaker_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `library_branches` (`branch_id`);

--
-- Constraints for table `working`
--
ALTER TABLE `working`
  ADD CONSTRAINT `working_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `library_branches` (`branch_id`),
  ADD CONSTRAINT `working_ibfk_2` FOREIGN KEY (`librarian_id`) REFERENCES `librarians` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
