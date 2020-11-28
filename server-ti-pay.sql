-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Nov 2020 pada 07.17
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
-- Database: `server-ti-pay`
--

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
(1, 1, 'pay123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `category` enum('e-money','virtual account','merchant','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `name`, `description`, `logo`, `category`) VALUES
(1, 'DANA', 'Selesaikan pembayaran menggunakan saldo DANA kamu', 'https://upload.wikimedia.org/wikipedia/commons/5/52/Dana_logo.png', 'e-money'),
(2, 'GOPAY', 'Selesaikan pembayaran menggunakan saldo GOPAY kamu', 'https://seeklogo.com/images/G/gopay-logo-D27C1EBD0D-seeklogo.com.png', 'e-money'),
(3, 'LinkAja', 'Selesaikan pembayaran menggunakan saldo LinkAja kamu', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/LinkAja.svg/92px-LinkAja.svg.png', 'e-money'),
(4, 'OVO', 'Selesaikan pembayaran menggunakan saldo OVO kamu', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/512px-Logo_ovo_purple.svg.png', 'e-money'),
(5, 'Mandiri Virtual Account', 'ATM Mandriri\r\n1. Masukkan kartu ATM dan Pin.\r\n2. Pilih Menu Bayar/Beli.\r\n3. Pilih menu Lainnya, hingga menemukan menu Multipayment.\r\n4. Masukkan Nomor Virtual Account, lalu pilih tombol Benar.\r\n5. Masukkan Angka 1 untuk memilih tagihan, lalu pilih tombol Ya.\r\n6. Akan muncul konfirmasi pembayaran, lalu pilih tombol Ya.\r\n7. Simpan struk sebagai bukti pembayaran Anda.', 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fa/Bank_Mandiri_logo.svg/222px-Bank_Mandiri_logo.svg.png', 'virtual account'),
(6, 'BRI Virtual Account', 'ATM Bank BRI\r\n1. Masukkan ATM dan PIN\r\n2. Pilih Menu Transaksi Lain\r\n3. Pilih Menu Pembayaran\r\n4. Pilih Menu Lainnya\r\n5. Pilih Menu BRIVA\r\n6. Masukan 15 digit Nomor Virtual Account \r\n7. Proses Pembayaran (Ya/Tidak)\r\n8. Simpan struk sebagai bukti pembayaran Anda.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Logo_BRI.png/320px-Logo_BRI.png', 'virtual account'),
(7, 'BNI Virtual Account', 'ATM Bank BNI\r\n1. Masukkan ATM dan PIN\r\n2. Pilih \"Menu Lainnya\"\r\n3. Pilih \"Transfer\"\r\n4. Pilih Jenis rekening yang akan Anda gunakan\r\n5. Pilih “Virtual Account Billing”\r\n6. Masukkan nomor Virtual Account\r\n7. Tagihan yang harus dibayarkan akan muncul pada layar konfirmasi\r\n8. Konfirmasi, apabila telah sesuai, lanjutkan transaksi\r\n9. Simpan struk sebagai bukti pembayaran Anda.', 'https://upload.wikimedia.org/wikipedia/en/thumb/2/27/BankNegaraIndonesia46-logo.svg/175px-BankNegaraIndonesia46-logo.svg.png', 'virtual account'),
(8, 'Indomaret', 'Pembayaran melalui kasir Indomaret. Kamu akan dikenakan tambahan biaya administrasi sebesar Rp.2,500 di kasir Indomaret.', 'https://upload.wikimedia.org/wikipedia/id/thumb/0/04/Logo_Indomaret.svg/220px-Logo_Indomaret.svg.png', 'merchant'),
(9, 'Alfamart', 'Pembayaran melalui kasir Alfamart. Kamu akan dikenakan tambahan biaya administrasi sebesar Rp.2,500 di kasir Alfamart.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Alfamart_logo.svg/320px-Alfamart_logo.svg.png', 'merchant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_transaction`
--

CREATE TABLE `payment_transaction` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_code` int(11) NOT NULL,
  `number_account` varchar(50) NOT NULL,
  `name_account` varchar(50) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `status` enum('FAILED','PENDING','SUCCESS','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment_transaction`
--

INSERT INTO `payment_transaction` (`id`, `payment_id`, `payment_code`, `number_account`, `name_account`, `total_payment`, `status`) VALUES
(8, 9, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(9, 9, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(10, 4, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(11, 6, 2147483647, '08192272139', 'Lingga Wahyu R', 44000000, 'SUCCESS'),
(12, 6, 2147483647, '08192272139', 'Lingga Wahyu R', 44000000, 'SUCCESS'),
(13, 7, 2147483647, '08192272139', 'Lingga Wahyu R', 44000000, 'SUCCESS'),
(14, 4, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(15, 4, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(16, 4, 2147483647, '08192272139', 'Lingga Wahyu', 44000000, 'SUCCESS'),
(17, 1, 2147483647, '08192272139', 'Sofa Ternyaman', 44000000, 'SUCCESS'),
(18, 7, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(19, 6, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(20, 8, 2147483647, '08192272139', 'Apple Watch 4', 44000000, 'SUCCESS'),
(21, 8, 2147483647, '08192272139', 'Lingga Wahyu R', 44000000, 'SUCCESS'),
(22, 4, 2147483647, '08192272139', 'Apple Watch 4', 44000000, 'SUCCESS'),
(23, 6, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 44000000, 'SUCCESS'),
(24, 4, 2147483647, '08192272139', 'Lingga Wahyu R', 980000, 'SUCCESS'),
(25, 1, 2147483647, '08192272139', 'Lingga Wahyu Rochim', 8325000, 'SUCCESS'),
(26, 1, 2147483647, '081217453887', 'Lingga Wahyu Rochim', 11826000, 'SUCCESS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment_transaction`
--
ALTER TABLE `payment_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction_payment` (`payment_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `payment_transaction`
--
ALTER TABLE `payment_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `payment_transaction`
--
ALTER TABLE `payment_transaction`
  ADD CONSTRAINT `fk_transaction_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
