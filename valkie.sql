-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2021 at 10:50 AM
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
-- Database: `valkie`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `city_picture`) VALUES
(1, 'New York City', 'listing-1.jpg'),
(2, 'San Francisco', 'listing-2.jpg'),
(3, 'Georgia', 'listing-3.jpg'),
(4, 'Seattle', 'listing-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`, `password`) VALUES
('BVXr', 'Mercy Malkie', 'malkie@gmail.com', '8735537292', 'Maseno', '5f4dcc3b5aa765d61d8327deb882cf99'),
('St7H', 'Peter Lenjo', 'lenjo@mail.com', '0787763435', 'Kerario', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` varchar(255) NOT NULL,
  `agent_id` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sqft` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `garage` tinyint(1) NOT NULL DEFAULT 0,
  `floorarea` int(11) NOT NULL,
  `yearbuilt` int(11) NOT NULL,
  `water` tinyint(1) NOT NULL DEFAULT 0,
  `stories` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `agent_id`, `agent_name`, `property_name`, `address`, `sqft`, `price`, `bedrooms`, `bathrooms`, `garage`, `floorarea`, `yearbuilt`, `water`, `stories`, `description`, `image`, `city`, `status`, `type`, `category`) VALUES
('bTeu', '4yVTKzmFJhQ=', 'Sammy James', 'Andrew Street Bungalow', '2854 Andrew Street, Orlando, USA', 1800, 2500, 4, 3, 0, 3000, 2018, 1, 1, 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', 'listing-5.jpg', 'New York', 'rent', 'Office', 'Available'),
('mXZa', '4yVTKzmFJhQ=', 'Sammy James', 'Blue View Home', '2854 Meadow View Drive, Hartford, USA', 1870, 2000, 4, 3, 1, 2000, 2017, 1, 2, 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', 'work-7.jpg', 'San Francisco', 'sale', 'Residential', 'Available'),
('PNRA', '4yVTKzmFJhQ=', 'Sammy James', 'Green Valley Spring ', '285 , Hartford, USA', 3000, 4000, 6, 6, 1, 3000, 2019, 1, 0, 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', 'listing-2.jpg', 'Seattle', 'rent', 'Villa', 'Sold');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` varchar(255) NOT NULL,
  `propertyID` varchar(255) NOT NULL,
  `clientID` varchar(255) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `propertyID`, `clientID`, `Cost`, `Date`) VALUES
('z62ISZEp', 'PNRA', 'St7H', 4000, '2021-01-18 08:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `avatar`) VALUES
('4yVTKzmFJhQ=', 'sammy', 'Sammy James', 'sammyorondo2@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'team-6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
