-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 03:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_user`
--

INSERT INTO `temp_user` (`id`, `email`, `pass`, `status`) VALUES
(1, 'john@exm.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(2, 'marry@exm.com', 'd964173dc44da83eeafa3aebbee9a1a0', '1'),
(3, 'mana@gmail.com', '83b4ef5ae4bb360c96628aecda974200', '1'),
(4, 'debD@gmail.com', 'fb62579e990da4e2a8f15c3d1e123438', '1'),
(5, 'jolly@llb.com', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `email`, `password`, `address`, `mobile`, `dob`, `lang`, `gender`) VALUES
(1, 1, 'John  Doe', 'john@exm.com', 'e10adc3949ba59abbe56e057f20f883e', 'Andul- Mouri, Howrah', '123-9874-123', '10/01/1990', '[\"C\",\"Cpp\",\"Java\",\"Python\",\"PHP\"]', 'male'),
(2, 2, 'Marry Andrew Swanson', 'marry@exm.com', 'd964173dc44da83eeafa3aebbee9a1a0', 'CA, USA', '987-4567-892', '15/07/2010', '[\"C\",\"Python\"]', 'female'),
(3, 3, 'Manabi  Mukharjee', 'mana@gmail.com', '83b4ef5ae4bb360c96628aecda974200', 'Kolkata, India', '033-2674-958', '15/03/1985', '[\"Cpp\",\"Java\",\"Python\"]', 'other'),
(4, 4, 'Dev Kumar Ansari', 'debD@gmail.com', 'fb62579e990da4e2a8f15c3d1e123438', 'Ghatal, East Midnapur', '654-9873-012', '25/12/1987', '[\"C\",\"Java\",\"PHP\"]', 'male'),
(5, 5, 'Jolly Ramdas Llb', 'jolly@llb.com', '202cb962ac59075b964b07152d234b70', 'UP,INDIA', '567-1234-089', '17/08/1989', '[\"C\",\"PHP\"]', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp_user`
--
ALTER TABLE `temp_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
