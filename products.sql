-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 10:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beactivev1`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` tinyint(1) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `stock`, `parent_id`, `created_at`, `updated_at`, `rating`) VALUES
(1, 'Protein Powder Supplement', NULL, 'Various flavored protein powders.', 0.00, 0, NULL, '2024-12-07 20:43:42', '2024-12-07 20:43:42', NULL),
(2, 'Sport Equipment', NULL, 'Various sport equipment for fitness.', 0.00, 0, NULL, '2024-12-07 20:43:42', '2024-12-07 20:43:42', NULL),
(3, 'Gym Equipment', NULL, 'Essential gym equipment for fitness.', 0.00, 0, NULL, '2024-12-07 20:43:42', '2024-12-07 20:43:42', NULL),
(4, 'Clothing', NULL, 'Sport clothing for athletes.', 0.00, 0, NULL, '2024-12-07 20:43:42', '2024-12-07 20:43:42', NULL),
(5, 'Accessories', NULL, 'Fitness accessories for sports enthusiasts.', 0.00, 0, NULL, '2024-12-07 20:43:42', '2024-12-07 20:43:42', NULL),
(6, 'Football', 'football.jpeg', 'Durable and high-quality football for training and matches.', 10.00, 100, 2, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(7, 'Baseball Bat', 'Baseball-Bat.jpeg', 'Sturdy and well-balanced bat for powerful swings.', 12.00, 100, 2, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(8, 'Volleyball', 'volleyball.jpeg', 'Lightweight and durable volleyball for indoor and beach play.', 6.00, 100, 2, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(10, 'Basketball', 'basketball.jpeg', 'Basketball for indoor and outdoor courts.', 7.00, 100, 2, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(12, 'Tennis Racket', 'Tennis-Racket.jpeg', ' Lightweight and sturdy racket for precision shots.', 18.00, 100, 2, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(13, 'Badminton Racket', 'Badminton-Racket.jpeg', 'High-performance racket for fast-paced games.', 20.00, 100, 2, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(15, 'Yoga-Mat', 'Yoga-Mat.jpeg', 'Comfortable, non-slip mat for yoga and stretching.', 6.00, 100, 2, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(16, 'Whey Protein Powder', 'Whey-Protein-Powder.jpeg', 'Premium whey protein for muscle building and recovery.', 15.00, 100, 1, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(17, 'Fish Oil Omega-3', 'Fish-Oil-Omega-3.jpeg', ' Supports heart health and reduces inflammation.', 9.00, 100, 1, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(20, 'Creatine Monohydrate', 'Creatine-Monohydrate.jpeg', 'Boosts strength and enhances workout performance.', 10.00, 100, 1, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(22, 'Zinc and magnesium', 'Zinc-and-Magnesium.jpeg', 'Supports muscle recovery and immune health.', 5.00, 100, 1, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(23, 'BCAA', 'bcaa.jpeg', 'Essential amino acids for muscle recovery and endurance.', 10.00, 100, 1, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 2),
(25, 'Vitamins C', 'Vitamins-C.jpeg', 'Immune-boosting supplement for overall wellness.', 4.00, 100, 1, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 2),
(26, 'Dumbbells', 'Dumbbells.jpeg', 'Versatile weights for strength training exercises.', 15.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(27, 'Kettlebell', 'kettlebell.jpeg', 'Compact and effective weight for functional workouts.', 16.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(28, 'Treadmill', 'treadmill.jpeg', 'High-performance treadmill for cardio training.', 80.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(29, 'Weight Plates', 'Weight-Plates.jpeg', 'Durable plates for adjustable weightlifting.', 20.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(30, 'Barbell', 'barbell.jpeg', 'Heavy-duty barbell for powerlifting and strength training.', 50.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(31, 'Exercise Mat', 'Exercise-Mat.jpeg', 'Comfortable mat for floor exercises and stretching.', 7.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(32, 'Rowing Machine', 'Rowing-Machine.jpeg', 'Full-body workout machine for endurance training.', 70.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(33, 'Resistance Bands', 'Resistance-Bands.jpeg', 'Versatile bands for strength and mobility training.', 10.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(34, 'Jump Rope', 'Jump-Rope.jpeg', 'Lightweight and durable for cardio workouts.', 3.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(35, 'Standing Bike', 'Standing-Bike.jpeg', 'Stationary bike for effective indoor cycling.\n', 100.00, 50, 3, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(36, 'T-Shirts', 't-shirts.jpeg', 'Breathable sports T-shirts for workouts.', 6.00, 60, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(37, 'Sports Bra', 'Sports-Bra.jpeg', 'Comfortable and supportive for active women.\n', 5.00, 60, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(38, 'Shorts', 'shorts.jpeg', 'Lightweight shorts for sports and gym.\n', 4.00, 70, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(39, 'Sweatband', 'Sweatband.jpeg', 'Absorbs sweat during intense workouts.', 3.00, 50, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(40, 'Socks', 'socks.jpeg', 'Comfortable and breathable sports socks.', 3.00, 40, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 2),
(41, 'Hoodie', 'Hoodie.jpeg', 'Warm and stylish hoodie for casual wear.', 20.00, 50, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(43, 'Joggers', 'joggers.jpeg', 'Flexible joggers for workouts and casual wear.', 20.00, 30, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(45, 'Running shoes', 'Running-Shoes.jpeg', 'Lightweight and cushioned shoes for running.', 35.00, 30, 4, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 2),
(46, 'Water Bottle', 'Water-Bottle.jpeg', 'Durable and leak-proof Water Bottle, perfect for workouts, travel, and daily use. Made from BPA-free material with a secure lid to prevent spills. Easy to carry and keeps you hydrated on the go.', 10.00, 100, 5, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 5),
(47, 'Gym Bag', 'Gym-Bag.jpeg', 'Spacious and durable gym bag for essentials.', 25.00, 60, 5, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 3),
(49, 'Foam Roller', 'Foam-Roller.jpeg', 'Helps with muscle recovery and relaxation.', 15.00, 70, 5, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(50, 'Gym Gloves', 'Gym-Gloves.jpeg', 'Protective gloves for weightlifting and training.', 7.00, 50, 5, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 4),
(51, 'Fitness Tracker', 'Fitness-Tracker.jpeg', 'Tracks workouts, steps, and heart rate.', 90.00, 40, 5, '2024-12-07 20:43:42', '2024-12-07 20:43:42', 2),
(52, 'Resistance Bands', 'Resistance-Bands.jpeg', 'Durable bands for resistance training.', 20.00, 40, 5, '2024-12-07 20:43:43', '2024-12-07 20:43:43', 5),
(53, 'Headphones', 'Headphones.jpeg', 'Wireless headphones for workouts.', 45.00, 40, 5, '2024-12-07 20:43:43', '2024-12-07 20:43:43', 5),
(54, 'Towel', 'towel.jpeg', 'Soft and absorbent sports towel', 6.00, 40, 5, '2024-12-07 20:43:43', '2024-12-07 20:43:43', 5),
(55, 'Sport Watch', 'Sport-Watch.jpeg', ' Tracks time, heart rate, and fitness goals.', 60.00, 40, 5, '2024-12-07 20:43:43', '2024-12-07 20:43:43', 2);

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `enforce_rating` BEFORE INSERT ON `products` FOR EACH ROW SET NEW
    .rating = IF(
        NEW.rating < 1 OR NEW.rating > 5,
        3,
        NEW.rating
    )
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_parent_id_foreign` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
