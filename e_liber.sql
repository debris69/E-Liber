-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 07:38 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_liber`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `author` varchar(160) NOT NULL,
  `year` int(4) NOT NULL,
  `genre` varchar(60) NOT NULL,
  `type` varchar(16) NOT NULL,
  `count` int(11) NOT NULL,
  `tags` varchar(190) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `year`, `genre`, `type`, `count`, `tags`) VALUES
(1, '2 States: The Story of My Marriage', 'Chetan Bhagat', 2009, 'Fiction, Romance', 'Paperback', 15, 'chetan bhagat, 2 states, two states, romance, india'),
(2, 'Harry Potter and the Cursed Child', 'Jack Thorne, J. K. Rowling, John Tiffany', 2016, 'Fiction, Fantasy, Adventure, Drama', 'Paperback', 8, 'magic, harry potter, jk rowling, j k rowling, wizardry, wizard'),
(3, 'Harry Potter and the Philosopher\'s Stone', 'J. K. Rowling', 1997, 'Fiction, Fantasy, Adventure, Drama', 'Hardcover', 6, 'magic, harry potter, jk rowling, j k rowling, wizardry, wizard'),
(4, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 1999, 'Fiction, Fantasy, Adventure, Drama', 'Hardcover', 15, 'magic, harry potter, jk rowling, j k rowling, wizardry, wizard'),
(5, 'Beginning Programming With Java for Dummies', 'Barry A. Burd', 2003, 'Programming, JAVA, Computers', 'Paperback', 19, 'programming, learn java, beginners java, computer, science, language, oops'),
(6, 'Java: A Beginner\'s Guide', 'Herbert Schildt', 2002, 'Programming, JAVA, Computers', 'Paperback', 6, 'programming, learn java, beginners java, computer, science, language, oops'),
(7, 'Learn Java in One Day and Learn It Well', 'Jamie Chan', 2016, 'Programming, JAVA, Computers', 'Hardcover', 9, 'programming, learn java, beginners java, computer, science, language, oops'),
(9, 'The C++ Programming Language', 'Bjarne Stroustrup', 1985, 'Programming, C++, Computers', 'Paperback', 13, 'programming, c++, learn c++, object-oriented'),
(10, 'Programming: Principles and Practice Using C++', 'Bjarne Stroustrup', 2008, 'Programming, C++, Computers', 'Hardcover', 3, 'programming, c++, learn c++, object-oriented, introduction, beginners'),
(11, 'Modern C++ Design', 'Andrei Alexandrescu', 2001, 'Programming, C++, Computers', 'Paperback', 3, 'programming, c++, learn c++, object-oriented, modern, '),
(12, 'The Design and Evolution of C++', 'Bjarne Stroustrup', 1994, 'Programming, C++, Computers', 'Paperback', 2, 'programming, c++, learn c++, object-oriented, history'),
(13, 'C#: Programming Basics for Absolute Beginners', 'Clark Nathan', 2016, 'Programming, C#, Computers', 'Paperback', 7, 'programming, learn c#, beginners, introduction'),
(14, 'Fundamentals of Computer Programming with C#: The Bulgarian C# Book', 'Svetlin Nakov', 2014, 'Programming, C#, Computers', 'Paperback', 4, 'programming, learn c#, fundamentals, '),
(15, 'C# in Depth', 'Jon Skeet', 2008, 'Programming, C#, Computers', 'Hardcover', 9, 'programming, learn c#, details, intermediate, higher level'),
(16, 'Fifty Shades of Grey', 'E. L. James', 2011, 'Erotic, Romance', 'Hardcover', 5, '50 shades, 50, erotic, romance, love'),
(17, 'The Diary Of a Young Girl', 'Anne Frank', 1947, 'Biography, Autobiography', 'Paperback', 5, 'dutch, Het Achterhuis, holocaust, holocaust books, '),
(18, 'Fluent in French: The Most Complete Study Guide to Learn French', 'Frederic Bibard', 2015, 'Textbook, Study guide', 'Paperback', 6, 'linguistics, france, self help'),
(19, 'French Grammar You Really Need To Know', 'Robin Adamson', 2010, 'Textbook, Study guide', 'Paperback', 10, 'linguistics, france, self help, grammar'),
(20, 'Talk French', 'Isabelle Fournier', 1998, 'Textbook, Study guide', 'Paperback', 5, 'linguistics, france, self help, vocal skills, '),
(21, 'Short Stories in French for Beginners: Read for Pleasure at Your Level, Expand Y', 'Olly Richards, Richard Simcott', 2018, 'Fiction', 'Paperback', 6, 'linguistics, france, literature');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_book`
--

CREATE TABLE `borrowed_book` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed_book`
--

INSERT INTO `borrowed_book` (`id`, `member`, `book`, `date`) VALUES
(11, 14, 1, '2020-03-02 03:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Piyush Kumar', 'piyushsahsah.sah@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN'),
(2, 'Lauren Prescot', 'l.prescot@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'LIBRARIAN'),
(3, 'Diamond Pal', 'dpal@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN'),
(4, 'Jay Agnihotri', 'j.agni@gmail.com', 'baba327d241746ee0829e7e88117d4d5', 'LIBRARIAN'),
(5, 'Debajit Ghosh', 'deb.ghosh@gmail.com', '69de285a4d70065f82056ad48d39df4c', 'LIBRARIAN'),
(6, 'Vicky Kaushal', 'v.kaushal@gmail.com', '8af433519d6e385e89bb280f8002f2b2', 'LIBRARIAN'),
(7, 'Akash Chawal', 'ak.chawal@gmail.com', '0b85df76d024ef62c5a05c401975549e', 'LIBRARIAN'),
(8, 'Arvind Kejriwal', 'kejriwal@gmail.com', '77cbb7d5ac4488160b7ac76429b2113f', 'LIBRARIAN'),
(9, 'Amisha Tripathi', 'tripathi.amisha@gmail.com', '7927221283b1fb48f9e3a9092ad95ee7', 'LIBRARIAN'),
(10, 'Jaya Sharma', 'j.sharma@ymail.com', '3dc1e4c3bc5b2ae63520627ea44df7fd', 'LIBRARIAN'),
(11, 'Aman Singh', 'a.singh@gmail.com', '2865a5b14e5a70273a7d311bfc150f4f', 'LIBRARIAN'),
(12, 'Jatin Yadav', 'j.yadav@gmail.com', '93cc7343b428ef16a2e93cb2ea255709', 'LIBRARIAN'),
(20, 'Jabe Tata', 'tata.jabe@gmail.com', '49d02d55ad10973b7b9d0dc9eba7fdf0', '');

-- --------------------------------------------------------

--
-- Table structure for table `issue_cart`
--

CREATE TABLE `issue_cart` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_cart`
--

INSERT INTO `issue_cart` (`id`, `member`, `book`, `time`) VALUES
(31, 1, 3, '2020-03-02 07:24:35'),
(32, 1, 6, '2020-03-02 07:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `issue_request`
--

CREATE TABLE `issue_request` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `request_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `response` varchar(15) NOT NULL,
  `employee` int(11) NOT NULL,
  `response_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_request`
--

INSERT INTO `issue_request` (`id`, `member`, `book`, `request_time`, `response`, `employee`, `response_time`) VALUES
(1, 1, 3, '2020-02-28 16:22:11', 'ACCEPTED', 1, '2020-02-28 19:45:50'),
(2, 1, 1, '2020-02-28 16:22:58', 'ACCEPTED', 1, '2020-02-28 19:46:04'),
(3, 2, 1, '2020-02-28 20:26:54', 'REJECTED', 2, '2020-02-28 20:27:09'),
(4, 2, 2, '2020-02-28 20:28:37', 'REJECTED', 2, '2020-02-28 20:28:57'),
(5, 2, 1, '2020-02-28 20:30:36', 'ACCEPTED', 2, '2020-02-28 20:30:50'),
(6, 2, 2, '2020-02-28 20:32:27', 'ACCEPTED', 2, '2020-02-28 20:32:34'),
(8, 2, 7, '2020-02-28 20:35:04', 'REJECTED', 2, '2020-02-28 20:35:08'),
(9, 1, 2, '2020-02-28 21:27:08', 'ACCEPTED', 1, '2020-02-28 21:28:18'),
(10, 1, 4, '2020-02-28 21:27:10', 'ACCEPTED', 1, '2020-02-28 21:28:22'),
(11, 1, 16, '2020-03-01 17:50:45', 'ACCEPTED', 1, '2020-03-01 17:51:08'),
(12, 1, 21, '2020-03-01 17:54:02', 'ACCEPTED', 1, '2020-03-01 17:54:29'),
(13, 1, 20, '2020-03-01 17:54:04', 'ACCEPTED', 1, '2020-03-01 17:54:32'),
(14, 14, 1, '2020-03-02 03:44:09', 'ACCEPTED', 1, '2020-03-02 03:46:22'),
(15, 1, 16, '2020-03-02 07:22:57', 'ACCEPTED', 1, '2020-03-02 07:23:44'),
(16, 1, 5, '2020-03-02 07:23:00', 'ACCEPTED', 1, '2020-03-02 07:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Satish Sharma', 's.sharma@gmail.com', '3dc1e4c3bc5b2ae63520627ea44df7fd', 'ACTIVE'),
(2, 'Ajay Saxena', 'a.saxena@gmail.com', '8b7e2fc63dd911826874cbb8a5f50f16', 'ACTIVE'),
(3, 'Neha Balan', 'n.balan@gmail.com', '42a398c41c84b13191eeead70231aa2d', 'ACTIVE'),
(4, 'Faheem Rizvi', 'f.rizvi@gmail.com', 'dfa93fa5e4fbe6d53a3560ee5638fcd6', 'ACTIVE'),
(5, 'Akash Chopra', 'a.chopra@ymail.com', '0f6e2d24c06a69acf0a68c3ece783ac0', 'ACTIVE'),
(6, 'Akash Saxena', 'ak.saxena@gmail.com', '8b7e2fc63dd911826874cbb8a5f50f16', 'ACTIVE'),
(7, 'Naveen Chadda', 'chadda.naveen@gmail.com', '03c6be6d00100eeb1c79b038c76845b4', 'INACTIVE'),
(8, 'Vidya Balan', 'v.balan@gmail.com', '42a398c41c84b13191eeead70231aa2d', 'INACTIVE'),
(9, 'Vijay Rathi', 'rathi.vijay@ymail.com', '052203e77e587fcf9fea8025f2a4da60', 'ACTIVE'),
(10, 'Shaurya Vedi', 's.vedi@gmail.com', 'aa4bbe33017c6b5e2aace943b6fd566b', 'INACTIVE'),
(11, 'Marco Ghosh', 'm.ghosh@gmail.com', '69de285a4d70065f82056ad48d39df4c', 'INACTIVE'),
(12, 'Tarun Vishal', 't.vishal@gmail.com', '8b64d2451b7a8f3fd17390f88ea35917', 'INACTIVE'),
(13, 'Sohail Bedi', 's.bedi@gmail.com', 'cd944e065096c6b61db1b58b46899ff8', 'INACTIVE'),
(14, 'Abhishek Mishra', 'akm936@gmail.com', '202cb962ac59075b964b07152d234b70', 'ACTIVE'),
(15, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'INACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_cart`
--
ALTER TABLE `issue_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_request`
--
ALTER TABLE `issue_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `issue_cart`
--
ALTER TABLE `issue_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `issue_request`
--
ALTER TABLE `issue_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
