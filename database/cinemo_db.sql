-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 02:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29
SET GLOBAL FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemo_db`
--
-- --------------------------------------------------------



-- --------------------------------------------------------


-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(30) NOT NULL,
  `title` text NOT NULL,
  `Genre` text NOT NULL,
  `cover_img` text NOT NULL,
  `duration` float NOT NULL,
  `description` text NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`,`Genre`, `cover_img`, `duration`,`description`, `release_date`) VALUES
(1, 'Doraemon The Movie 2021', 'Animation','thumb_3441.jpg', 1.8,'One day, Nobita picks a small rocket from which a small-sized humanoid alien Papi comes out. He came from the planet named Pirika to the Earth to escape from the PCIA army of his planet. At the very beginning, Doraemon and his friends were confused by the small size of Papi, but with the gadget "Small Light", they became small and play together. However, the whale-shaped battleship, who chased Papi and came to the Earth, attacks Doraemon and Nobita to catch Papi. Papi blames himself for having involved everyone, but he tries to fight against the PCIA army. In order to protect Papi and his planet Pirika, Doraemon and his friends go to Pirika.', '2022-10-06'),
(3, 'Top Gun 2',' Action/Drama', 'rchcff850fpy3iK5rdF-o.jpg', 3,"After 30 years, Maverick is still pushing the envelope as a top naval aviator in order to confront ghosts of his past after leading TOP GUN's elite graduates on a mission that allows the ultimate sacrifice from those chosen to fly it.",  '2022-09-15'),
(4, 'Confidential Assignment International', 'Action, Crime, Drama','confidential_assignment2_3127808_9730.jpg', 2.15,'JawsNorth Korean detective Im Chul-Ryung (Hyun-Bin) is sent to South Korea on a new mission. His target is North Korean crime organization leader Jang Myung-Joon (Jin Sun-Kyu). In South Korea, Im Chul-Ryung teams up again with Detective Kang Jin-Tae (Yu Hae-Jin). Because of a mistake he made, Detective Kang Jin-Tae now works in a cyber crime investigation team rather than the regional investigation unit. He wants to rejoin the regional investigation unit. Meanwhile, F.B.I. Agent Jack (Daniel Henney) joins Im Chul-Ryung and Kang Jin-Tae in their pursuit of Jang Myung-Joon.',  '2022-10-13' ),
(6, 'Halloween Ends', 'Horror, Thriller','thumb_3099.jpg', 1.85,'Four years after the events of last year’s Halloween Kills, Laurie is living with her granddaughter Allyson (Andi Matichak) and is finishing writing her memoir. Michael Myers hasn’t been seen since. Laurie, after allowing the specter of Michael to determine and drive her reality for decades, has decided to liberate herself from fear and rage and embrace life. But when a young man, Corey Cunningham (Rohan Campbell; The Hardy Boys, Virgin River), is accused of killing a boy he was babysitting, it ignites a cascade of violence and terror that will force Laurie to finally confront the evil she can’t control, once and for all.',  '2022-10-13' ),
(7, 'Black Panther Wakanda Forever', 'Action, Adventure','MV5BNTM4NjIxNmEtYWE5NS00NDczLTkyNWQtYThhNmQyZGQzMjM0XkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_FMjpg_UX1000_.jpg', 2.68,'Wakanda Forever,” Queen Ramonda (Angela Bassett), Shuri (Letitia Wright), M’Baku (Winston Duke), Okoye (Danai Gurira) and the Dora Milaje (including Florence Kasumba), fight to protect their nation from intervening world powers in the wake of King T’Challa’s death. As the Wakandans strive to embrace their next chapter, the heroes must band together with the help of War Dog Nakia (Lupita Nyong’o) and Everett Ross (Martin Freeman) and forge a new path for the kingdom of Wakanda. Introducing Tenoch Huerta as Namor, king of a hidden undersea nation, the film also stars Dominique Thorne, Michaela Coel, Mabel Cadena and Alex Livanalli.',  '2022-11-09'),
(8, 'Black Adam', 'Action, Adventure','Black_Adam_(film)_poster.jpg', 2.06,'Five thousand years ago, Kahndaq was a melting pot of cultures, wealth, power and magic. But most of us had nothing, except for the chains around our necks. Kahndaq needed a hero... instead, they got me. I did what needed to be done, and they imprisoned me for it. Now, five thousand years later, I am free. And I give you my word: no one will ever stop me again.',  '2022-10-19');


-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cinema_id` int(30) NOT NULL,
  `cinema_name` varchar(30) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cinema`

INSERT INTO `cinema` (`cinema_id`, `cinema_name`,`location`) VALUES
(1, 'Cinema1','Location1'),
(2, 'Cinema2','Location2'),
(3, 'Cinema3','Location3');

-- --------------------------------------------------------
--
-- Table structure for table `theater_room`
--

CREATE TABLE `theater_room` (
  `theater_room_id` int(30) NOT NULL,
  `cinema_id` int(30) NOT NULL,
  `room_number` int(30) NOT NULL,
  `room_type` enum('2D','3D','IMAX') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theater_room`
--

INSERT INTO `theater_room` (`theater_room_id`, `cinema_id`,`room_number`,`room_type`) VALUES
(1,1,1,'2D'),
(2,1,3,'3D'),
(3,2,1,'2D'),
(4,2,2,'3D'),
(5,2,3,'3D'),
(6,3,1,'2D');

-- --------------------------------------------------------
--
-- Table structure for table `room_template`
--

CREATE TABLE `room_template` (
  `room_template_id` int(30) NOT NULL,
  `theater_room_id` int(30) NOT NULL,
  `f_row_num` int (30) NOT NULL,
  `f_column_num` int (30) NOT NULL,
  `f_seat_price` int(30) NOT NULL,
  `s_row_num` int (30) NOT NULL,
  `s_column_num` int (30) NOT NULL,
  `s_seat_price` int(30) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_template`
--

INSERT INTO `room_template` (`room_template_id`, `theater_room_id`,`f_row_num`,`f_column_num`,`f_seat_price`,`s_row_num`,`s_column_num`,`s_seat_price`) VALUES
(1,1,8,13,200,2,16,280),
(2,2,13,16,220,4,20,300),
(3,3,8,16,200,2,22,280),
(5,4,10,13,260,3,18,340),
(7,5,8,12,280,2,16,380),
(8,6,13,18,220,5,22,260);

-- --------------------------------------------------------
--
-- Table structure for table `room_schedule`
--

CREATE TABLE `room_schedule` (
  `room_schedule_id` int(30) NOT NULL,
  `theater_room_idd` int(30) NOT NULL,
  `movie_idd` int (30) NOT NULL,
  `movie_showdate` date NOT NULL,
  `movie_showtime` time NOT NULL,
  `seats_maintenance` varchar(255),
  `seats_booked` varchar(255)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_schedule`
--

INSERT INTO `room_schedule` (`room_schedule_id`, `theater_room_idd`,`movie_idd`,`movie_showdate`,`movie_showtime`,`seats_maintenance`,`seats_booked`) VALUES
(1,1,1,'2022-10-20','11:40',NULL,'20,21'),
(2,1,1,'2022-10-20','17:30',NULL,NULL),
(3,1,4,'2022-10-19','19:20',NULL,'66,80,71'),
(4,2,1,'2022-10-19','12:10','100,101,102','55,57,58,59'),
(5,2,5,'2022-10-19','16:00','20,28',NULL),
(6,2,6,'2022-10-19','19:50',NULL,'48,56'),
(7,3,1,'2022-10-19','11:20',NULL,'18,20,26'),
(8,4,1,'2022-10-20','11:20',NULL,NULL);

-- --------------------------------------------------------
--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contact_id` int(30) NOT NULL,
  `contact_name` varchar(30) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_id`, `contact_name`, `contact_email`, `contact_number`) VALUES
(1, 'David', 'cinemo@cinemo.com', '095416531');

-- --------------------------------------------------------
--
-- Table structure for table `introduction`
--

CREATE TABLE `introduction` (
  `introduction_id` int(30) NOT NULL,
  `introduction_text` TEXT NOT NULL,
  `object_text` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `introduction` (`introduction_id`, `introduction_text`, `object_text`) VALUES
(1, 'Cinemo is a web application which used by a particular movie theater business. Cinemo allows the users who want to watch movies at the cinema hall by booking the tickets. 
          The user can give a rating and review the movie that they watched. In addition, Cinemo integrates a social feature which the user can share their booking ticket with their friends.', 'The main objective of Cinemo is to provide the customers convenience for choosing and booking the movie ticket online via a web application rather than going to the movie theatres physically which is time consuming and impractical.');

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','staff','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`,`username`, `password`,`role`) VALUES
(1, 'admin', 'admin','admin', '0192023a7bbd73250516f069df18b500','admin'),
(2,'Jhon','Smith','Jhon','4d2ff2f945883e090ac4de4fb9e23fab','staff'),
(3,'Mary','Miller','Mary','f387c152606d845d3c4fcb4137b0c084','staff'),
(4,'James','Roberts','James','9ba36afc4e560bf811caefc0c7fddddf','customer');

-- --------------------------------------------------------
--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(30) NOT NULL,
  `payer_id` int(30) NOT NULL,
  `room_schedule_ID` int(30) NOT NULL,
  `seat_chosen` varchar(255) NOT NULL,
  `total_price` int(30) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `payer_card_number` varchar(16) NOT NULL,
  `card_exp` Date NOT NULL,
  `CVV` varchar(3) NOT NULL,
  `payment_status` enum('completed','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--
INSERT INTO `payment`(`payment_id`, `payer_id`, `room_schedule_ID`, `seat_chosen`, `total_price`, `payer_name`, `payer_email`,`payer_card_number`, `card_exp`, `CVV`, `payment_status`) VALUES 
('1','4','1','12','200','James Roberts','example@example.com','5555555555555555','2024-09-00','462','completed');

-- --------------------------------------------------------


-- Table structure for table `book_history`
--

CREATE TABLE `book_history` (
  `book_history_id` int(30) NOT NULL,
  `payment_ID` int(30) NOT NULL,
  `payment_Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_history`
--
INSERT INTO `book_history` (`book_history_id`,`payment_ID`,`payment_status`) VALUES 
(1,1,"completed");

-- --------------------------------------------------------
--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(30) NOT NULL,
  `book_history_idd` int(30) NOT NULL,
  `user_idd` int(30) NOT NULL,
  `review_stars` int (2) NOT NULL,
  `review_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--
INSERT INTO `review`(`review_id`, `book_history_idd`, `user_idd`, `review_stars`, `review_text`) VALUES 
('1','1','4',4,'No comments.');


--
-- Indexes for dumped tables
--
-- Indexes for table `book_history`
--
ALTER TABLE `book_history`
  ADD PRIMARY KEY (`book_history_id`),
  ADD KEY (`payment_ID`),
  ADD KEY (`payment_Status`);

--

-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cinema_id`),
  ADD KEY (`cinema_id`);

--
-- Indexes for table `theater room`
--
ALTER TABLE `theater_room`
  ADD PRIMARY KEY (`theater_room_id`),
  ADD KEY (`cinema_id`);

--
-- Indexes for table `theater room`
--
ALTER TABLE `room_template`
  ADD PRIMARY KEY (`room_template_id`),
  ADD KEY (`theater_room_id`);

--
-- Indexes for table `room_schedule`
--
ALTER TABLE `room_schedule`
  ADD PRIMARY KEY (`room_schedule_id`),
  ADD KEY (`theater_room_idd`),
  ADD KEY (`movie_idd`);

--


-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY (`payer_id`),
  ADD KEY (`room_schedule_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY (`user_idd`),
  ADD KEY (`book_history_idd`);

--
-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table `book_history`
--
ALTER TABLE `book_history`
  MODIFY `book_history_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `cinema_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `theater_room`
--
ALTER TABLE `theater_room`
  MODIFY `theater_room_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_template`
--
ALTER TABLE `room_template`
  MODIFY `room_template_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- AUTO_INCREMENT for table `room_schedule`
--
ALTER TABLE `room_schedule`
  MODIFY `room_schedule_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--

-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--

-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `contact_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `theater_room`
  ADD CONSTRAINT `cinema_ID` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`cinema_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `room_template`
  ADD CONSTRAINT `theater_room_ID` FOREIGN KEY (`theater_room_id`) REFERENCES `theater_room` (`theater_room_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `room_schedule`
  ADD CONSTRAINT `theater_room_idd` FOREIGN KEY (`theater_room_idd`) REFERENCES `theater_room` (`theater_room_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `movie_idd` FOREIGN KEY (`movie_idd`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `payment`
  ADD CONSTRAINT `payer_id` FOREIGN KEY (`payer_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `room_schedule_ID` FOREIGN KEY (`room_schedule_ID`) REFERENCES `room_schedule` (`room_schedule_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `book_history`
  ADD CONSTRAINT `payment_ID` FOREIGN KEY (`payment_ID`) REFERENCES `payment` (`payment_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `review`
  ADD CONSTRAINT `user_idd` FOREIGN KEY (`user_idd`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_history_idd` FOREIGN KEY (`book_history_idd`) REFERENCES `book_history` (`book_history_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

ALTER TABLE `review` CHANGE `review_text` `review_text` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'No comments.';
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
