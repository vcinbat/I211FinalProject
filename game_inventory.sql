-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 06:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `game_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `user_id`, `game_id`) VALUES
(1, 4, 2),
(2, 6, 4),
(3, 3, 1),
(4, 1, 4),
(5, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `platform` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `description` text NOT NULL,
  `image` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `title`, `genre`, `platform`, `release_date`, `description`, `image`) VALUES
(1, 'Resident Evil 4', 'Survival Horror', 'PlayStation 5', '2023-03-23', 'Resident Evil™ 4 joins Leon S. Kennedy six years after his hellish experiences in the biological disaster of Raccoon City. His unmatched resolve caused him to be recruited as an agent reporting directly to the president of the United States. With the experience of multiple missions on his back, Leon is dispatched to rescue the president’s recently kidnapped daughter. Leon tracks her to a secluded European village, however after making first contact he discovers a fervor beyond reason grips the local populace. ', 'www/img/img1.jpg'),
(2, 'God of War Ragnarök', 'Action Adventure', 'PlayStation 5', '2022-11-09', 'Embark on an epic and heartfelt journey as Kratos and Atreus struggle with holding on and letting go. Against a backdrop of Norse Realms torn asunder by the fury of the Aesir, they’ve been trying their utmost to undo the end times. But despite their best efforts, Fimbulwinter presses onward. Witness the changing dynamic of the father-son relationship as they fight for survival; Atreus thirsts for knowledge to help him understand the prophecy of “Loki”, as Kratos struggles to break free of his past and be the father his son needs. See for yourself how fate will force a choice upon them: between their own safety or the safety of the realms. All the while, hostile Asgardian forces assemble… Venture through all Nine Realms towards the prophesied battle that will end the world. Vanquish Norse gods and monsters alike in fluid, expressive combat. Explore in wonder through stunning mythological landscapes.', 'www/img/img2.png'),
(3, 'Super Smash Bros. Ultimate', 'Platform ', 'Nintendo Switch', '2018-12-07', 'Gaming icons clash in the ultimate brawl you can play anytime, anywhere! Smash rivals off the stage as new characters Isabelle, Simon Belmont and King K. Rool join Inkling, Ridley, and every fighter in Super Smash Bros. history. Enjoy enhanced speed and combat at new stages based on the Castlevania series, Super Mario Odyssey, and more!', 'www/img/img3.jpg'),
(4, 'Super Mario Galaxy 2', 'Platform', 'Wii', '2010-05-23', 'Launch into a new universe of gravity warping worlds in the sequel to one of the greatest games of all time! Yoshi joins Mario as they traverse a wild variety of galaxies exploding with imagination, helping out our hero as he gulps enemies, runs at super speed, or inflates like a blimp to reach high cliff tops. Whether Mario’s leaping into orbit around tiny micro-planets, tumbling through rooms with constantly flip-flopping gravity, or drilling through craggy worlds to emerge on the other side, he’ll need new abilities and serious jumping skills to survive the all-new challenges ahead!', 'www/img/img4.jpg'),
(5, 'NBA 2K23', 'Sports', 'Xbox One', '2022-09-08', 'Rise to the occasion and realize your full potential in NBA 2K23. Prove yourself against the best players in the world and showcase your talent in MyCAREER. Pair today’s All-Stars with timeless legends in MyTEAM. Build a dynasty of your own in MyGM or take the NBA in a new direction with MyLEAGUE. Take on NBA or WNBA teams in PLAY NOW and experience true-to-life gameplay. How will you Answer the Call?', 'www/img/img5.jpg'),
(6, 'The Sims 3', 'Life Simulation', 'PC', '2009-06-02', 'The Sims 3 lets you immerse truly unique Sims in an open, living neighborhood just outside their door! The freedom of The Sims 3 will inspire you with endless possibilities and amuse you with unexpected moments of surprise and mischief. Your Sims can roam throughout their neighborhood, visit neighbors’ homes, and explore the surroundings. They can stroll downtown to hang out with friends, meet someone new at the park, or run into colleagues on the street. If your Sims are in the right place at the right time, who knows what might happen?! New easy-to-use design tools allow for unlimited customization to make truly individual Sims. Determine your Sims’ shape and size, from thin to full-figured to muscular—and everything in between! Choose your Sims’ facial features, their exact skin tone, hair eye shape and color and select their clothing and accessories. Create realistic Sims with distinctive personalities. Select from dozens of personality traits and combine them in fun ways. The combination of traits you choose—brave, artistic, loner, perfectionist, klepto, romantic, clumsy, paranoid, and much, much more—help shape the behavior of your Sims and how they interact with other Sims. Your Sims can now rise above their basic set of every day needs. They are complex individuals with unique personalities. Build your dream house or design the ultimate home. Customize everything from floors to flowers, shirts to sofas, wallpaper to window shades. It’s fun and easy to change colors and patterns giving you endless personalization options. Or you can populate your Sims’ neighborhood with pre-designed buildings and furnishings. Which of your Sims will live in high-end mansions, cool bachelor pads, ultimate dream homes or low-cost cottages?', 'www/img/img6.jpg'),
(7, 'The Sims 2', 'Life Simulation', 'PC', '2004-09-14', 'In The Sims 2, your Sims will be more lifelike, more responsive, and more complex than ever before. You\'ll be able to control your Sims over their entire lifetimes, taking them from their first steps to their golden years. Guide them through \"Life\'s Big Moments\" and build their \"Life Score\" with every decision you make. And since every Sim will have its own DNA, their appearance and personality will be passed down through the generations. Life in The Sims 2 will take on a whole different dimension with our entirely new 3-D engine.', 'www/img/img7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) NOT NULL,
  `role_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_title`) VALUES
(1, 'System Administrator'),
(2, 'Basic User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `username`, `password`, `email`) VALUES
(1, 1, 'phpuser', 'phpuser', 'phpuser@phpuser.com'),
(3, 2, 'kim', 'password', 'kim@phpuser.com'),
(4, 2, 'chris', 'password', 'chris@phpuser.com'),
(5, 2, 'sara', 'password', 'sara@phpuser.com'),
(6, 2, 'ethan', 'password', 'ethan@phpuser.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `users.user_id` (`user_id`),
  ADD KEY `games.game_id` (`game_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `roles.role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `games.game_id` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `users.user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles.role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
