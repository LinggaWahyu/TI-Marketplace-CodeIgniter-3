-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Nov 2020 pada 07.16
-- Versi server: 10.4.11-MariaDB-log
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server-ti-store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Baby'),
(2, 'Furniture'),
(3, 'Sneaker'),
(4, 'Make Up'),
(5, 'Gadget'),
(6, 'Tools');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'store123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `categories_id`, `price`, `description`, `stock`, `image`) VALUES
(1, 'Adidas Men Original', 3, 3500000, 'Ini adalah sepatu merk Adidas', 8, 'https://images.unsplash.com/photo-1520256862855-398228c41684?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80'),
(2, 'White Edition Nike', 3, 4000000, 'The Jordan Delta is a versatile shoe that\'s comfortable from the inside out. Mixing high-tech and premium materials, it\'s plush, lightweight and crafted with an array of details.', 7, 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80'),
(3, 'Apple Watch 4', 5, 5400000, 'Ini adalah Apple Watch 4', 22, 'https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80'),
(4, 'Mavic Kawe', 6, 8090000, 'Ini adalah Mavic Kawe', 12, 'https://images.unsplash.com/photo-1547937043-7f1695a96481?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80'),
(5, 'Playstation 5', 6, 3826000, 'Ini adalah PS 5', 53, 'https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80'),
(6, 'Simple Headset', 5, 980000, 'Ini adalah simple headset', 105, 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80'),
(7, 'White G-Mouse', 6, 102000, 'Ini adalah White G-Mouse', 199, 'https://images.unsplash.com/photo-1527814050087-3793815479db?ixlib=rb-1.2.1&auto=format&fit=crop&w=628&q=80'),
(8, 'Converse All Star Shoe', 3, 1421000, 'Ini adalah sepatu Converse', 60, 'https://images.unsplash.com/photo-1494496195158-c3becb4f2475?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80'),
(9, 'Jas Hitam Pria', 4, 546000, 'Ini adalah Jas Hitam Pria', 188, 'https://images.unsplash.com/photo-1497339100210-9e87df79c218?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80'),
(10, 'Black Edition Nike', 3, 3345000, 'With an array of creative tools at his fingertips, visionary artist G-Dragon has set out to create his own utopia. Though lurking forces keep his utopia at bay, he holds out hope that one day his dream will become reality. As he continues to create, his hope grows, and now he\'s sharing that hope under a layer of white paint, in this new iteration of the AF-1 Low x PEACEMINUSONE.\r\n\r\nOver time, white paint on the shoe\'s upper will wear away to reveal a freestyle G-Dragon design, representing his faith in creation. Bearing the logo of his fashion label, PEACEMINUSONE, on the tongue, these AF-1s also feature painted streaks on the midsole, extra-thick laces and a special graphic print on the sockliner.', 20, 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80'),
(11, 'iPhone 10 Pro', 5, 5200000, 'Ini adalah iPhone 10 Pro yang memiliki banyak sekali keunggulan.', 12, 'https://images.unsplash.com/photo-1569429594806-192f16855a0e?ixlib=rb-1.2.1&auto=format&fit=crop&w=401&q=80'),
(12, 'Earpods Original', 5, 3360000, 'Ini adalah headset original untuk smartphone iPhone', 33, 'https://images.unsplash.com/photo-1605464315542-bda3e2f4e605?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `name_user`, `address`, `payment_method`, `total_price`) VALUES
(7, '2020-11-18', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'DANA', 44404000),
(11, '2020-11-19', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'BNI Virtual Account', 2401000),
(12, '2020-11-20', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'OVO', 7903000),
(13, '2020-11-20', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'DANA', 7903000),
(14, '2020-11-20', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'BNI Virtual Account', 15013000),
(15, '2020-11-20', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'BRI Virtual Account', 4806000),
(16, '2020-11-20', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'Indomaret', 1421000),
(17, '2020-11-20', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'Indomaret', 17601000),
(18, '2020-11-22', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'OVO', 4480000),
(19, '2020-11-22', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'BRI Virtual Account', 8090000),
(20, '2020-11-22', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'OVO', 980000),
(21, '2020-11-25', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'DANA', 8325000),
(22, '2020-11-25', 'Lingga Wahyu Rochim', 'Blitar, Jawa Timur', 'DANA', 11826000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` int(11) NOT NULL,
  `id_transactions` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `id_transactions`, `id_products`, `count`) VALUES
(4, 7, 2, 2),
(5, 11, 6, 1),
(6, 11, 8, 1),
(7, 12, 6, 1),
(8, 12, 8, 1),
(9, 12, 7, 1),
(10, 12, 3, 1),
(11, 13, 6, 1),
(12, 13, 8, 1),
(13, 13, 7, 1),
(14, 13, 3, 1),
(15, 14, 8, 1),
(16, 14, 7, 1),
(17, 14, 3, 1),
(18, 14, 4, 1),
(19, 15, 6, 1),
(20, 15, 5, 1),
(21, 16, 8, 1),
(22, 17, 4, 2),
(23, 17, 8, 1),
(24, 18, 6, 1),
(25, 18, 1, 1),
(26, 19, 4, 1),
(27, 20, 6, 1),
(28, 21, 6, 1),
(29, 21, 2, 1),
(30, 21, 10, 1),
(31, 22, 2, 2),
(32, 22, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_product` (`products_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`categories_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction` (`id_transactions`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `fk_transaction` FOREIGN KEY (`id_transactions`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
