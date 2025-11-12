-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2025 at 11:31 PM
-- Server version: 10.6.23-MariaDB-cll-lve
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ixd608_tien_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 20,
  `category` varchar(32) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_modify` datetime NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `images` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `category`, `date_create`, `date_modify`, `description`, `thumbnail`, `images`) VALUES
(1, 'Eevee Plush 10\"', 19.99, 20, 'plushie', '2025-11-04 22:23:18', '2025-11-04 22:23:18', 'This Eevee plush is super soft and perfect for any Pokémon fan. It’s about ten inches tall, easy to hug, and makes a cute addition to your collection or desk.', 'eevee.jpg', 'eevee.jpg'),
(2, 'Espeon Plush 10\"\r\n', 19.99, 20, 'plushie', '2025-11-04 22:25:34', '2025-11-04 22:25:34', 'This Espeon plush is soft, detailed, and has that calm, elegant look fans love. It’s around ten inches tall and perfect for cuddling or displaying next to your other Eeveelution plushies.', 'espeon.jpg', 'espeon.jpg'),
(3, 'Umbreon Plush 10\"', 19.99, 20, 'plushie', '2025-11-04 23:01:18', '2025-11-04 23:01:18', 'This Umbreon plush has a smooth, velvety feel and bright yellow rings that stand out. It’s about ten inches tall and makes a great companion for any Pokémon collector or Eevee evolution fan.', 'umbreon.jpg', 'umbreon.jpg'),
(4, 'Flareon Plush 10\"', 19.99, 20, 'plushie', '2025-11-04 23:02:57', '2025-11-04 23:02:57', 'This Flareon plush is warm and fluffy with soft orange fur and a big cream-colored mane. It’s about ten inches tall and brings a cozy, fiery charm to any Pokémon collection.', 'flareon.jpg', 'flareon.jpg'),
(5, 'Vaporeon Plush 10\"', 19.99, 20, 'plushie', '2025-11-04 23:03:37', '2025-11-04 23:03:37', 'This Vaporeon plush is super soft with a smooth blue finish and cute fin details. It’s around ten inches tall and perfect for fans who love water-type Pokémon or want to complete their Eeveelution set.', 'vaporeon.jpg', 'vaporeon.jpg'),
(6, 'Chikorita Plush 17\"', 27.99, 20, 'plushie', '2025-11-04 23:05:50', '2025-11-04 23:05:50', 'This Chikorita plush is extra huggable with soft green fabric and an adorable leaf on its head. At seventeen inches tall, it’s bigger than most plushies and makes a sweet centerpiece for any Pokémon fan’s collection.', 'chikorita.jpg', 'chikorita.jpg'),
(7, 'Lucario Plush 8\"', 14.99, 20, 'plushie', '2025-11-04 23:07:49', '2025-11-04 23:07:49', 'This Lucario plush is small but full of personality, with soft blue and black fabric that captures its cool look. At eight inches tall, it’s perfect to keep on your desk, shelf, or to take on the go.', 'lucario.jpg', 'lucario.jpg'),
(8, 'Masterball Plush 7\"', 13.99, 20, 'plushie', '2025-11-04 23:09:15', '2025-11-04 23:09:15', 'This Master Ball plush is soft, round, and ready to catch your heart. At seven inches wide, it’s perfect for tossing around, displaying on your shelf, or adding a fun touch to your Pokémon collection.', 'masterball.jpg', 'masterball.jpg'),
(9, 'Bulbasaur_TCG Pokemon Mega Evolution', 8.99, 20, 'card', '2025-11-04 23:21:36', '2025-11-04 23:21:36', 'This Bulbasaur TCG card features stunning artwork that highlights its Mega Evolution power. It’s a great piece for collectors and players who love classic Pokémon with a powerful twist, making it a must-have for any deck or display.', 'bulbasaur.jpg', 'bulbasaur.jpg'),
(10, 'Vulpix_TCG Pokemon Mega Evolution', 12.99, 20, 'card', '2025-11-04 23:22:59', '2025-11-04 23:22:59', 'This Vulpix TCG card shows off a fiery and elegant design that captures its evolved strength. It’s a beautiful addition for collectors who appreciate classic Pokémon cards with bold artwork and vibrant energy.', 'vulpix.jpg', 'vulpix.jpg'),
(11, 'Spearow_TCG Pokemon Mega Evolution', 5.99, 20, 'card', '2025-11-04 23:23:49', '2025-11-04 23:23:49', 'This Spearow TCG card features dynamic artwork that shows off its fierce flying power. It’s a great pick for collectors who enjoy classic Pokémon with a bold and energetic style.', 'spearow.jpg', 'spearow.jpg'),
(12, 'Stufful_TCG Pokemon Mega Evolution', 12.99, 20, 'card', '2025-11-04 23:24:41', '2025-11-04 23:24:41', 'This Stufful TCG card is both cute and strong, showing off its playful side with a touch of power. It’s a fun addition for collectors who love adorable Pokémon that can still pack a punch in battle.', 'stufful.jpg', 'stufful.jpg'),
(13, 'Litleo_TCG Pokemon Mega Evolution', 15.99, 20, 'card', '2025-11-04 23:25:30', '2025-11-04 23:25:30', 'This Litleo TCG card captures its fiery spirit and brave energy with bold, detailed artwork. It’s a great choice for collectors who enjoy Pokémon that balance cuteness with strength.', 'litleo.jpg', 'litleo.jpg'),
(14, 'Ivysaur_TCG Pokemon Mega Evolution', 38.99, 20, 'card', '2025-11-04 23:26:13', '2025-11-04 23:26:13', 'This Ivysaur TCG card highlights its growth and power with vivid artwork and strong attack details. It’s a perfect pick for collectors who love seeing the evolution journey from Bulbasaur to its mighty final form.', 'ivysaur.jpg', 'ivysaur.jpg'),
(15, 'Exeggutor_TCG Pokemon Mega Evolution', 32.99, 20, 'card', '2025-11-04 23:26:59', '2025-11-04 23:26:59', 'This Exeggutor TCG card shows off its tall, tropical look with bright colors and fun artwork. It’s a playful yet powerful addition for collectors who enjoy unique Pokémon with a bit of personality.', 'exeggutor.jpg', 'exeggutor.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
