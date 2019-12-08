-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 12:47 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hospital_plus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bolesti`
--

CREATE TABLE `bolesti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naziv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra_bolesti` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bolesti`
--

INSERT INTO `bolesti` (`id`, `naziv`, `sifra_bolesti`) VALUES
(1, 'bolest 1', 'a01'),
(2, 'bolest 2', 'a02');

-- --------------------------------------------------------

--
-- Table structure for table `evidencija_lecenja`
--

CREATE TABLE `evidencija_lecenja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karton_id` bigint(20) UNSIGNED NOT NULL,
  `datum_posete` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bolest_id` bigint(20) UNSIGNED NOT NULL,
  `opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lek_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evidencija_lecenja`
--

INSERT INTO `evidencija_lecenja` (`id`, `karton_id`, `datum_posete`, `user_id`, `bolest_id`, `opis`, `lek_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-12-10', 1, 1, 'asdasdasd', 1, NULL, NULL),
(2, 1, '2019-12-12', 1, 2, 'asdas', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kartoni`
--

CREATE TABLE `kartoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `broj_kartona` int(11) NOT NULL,
  `pacijent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kartoni`
--

INSERT INTO `kartoni` (`id`, `broj_kartona`, `pacijent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lekovi`
--

CREATE TABLE `lekovi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lekovi`
--

INSERT INTO `lekovi` (`id`, `naziv`, `kolicina`) VALUES
(1, 'lek 1', 5),
(2, 'Lek 2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_12_04_185841_create_uloge_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_04_195912_create_lekovi_table', 1),
(6, '2019_12_04_200104_create_bolesti_table', 1),
(7, '2019_12_04_204946_create_pacijenti_table', 1),
(8, '2019_12_04_212951_create_kartoni_table', 1),
(9, '2019_12_04_214442_create_evidencija_lecenjas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pacijenti`
--

CREATE TABLE `pacijenti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pol` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `krvna_grupa` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lbo` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pacijenti`
--

INSERT INTO `pacijenti` (`id`, `ime`, `prezime`, `adresa`, `grad`, `telefon`, `pol`, `datum_rodjenja`, `krvna_grupa`, `lbo`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mika', 'Mikić', 'asd', 'dsa', '123123', 'm', '2019-12-17', 'a+', 123123, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id`, `naziv`) VALUES
(1, 'Admin'),
(2, 'Lekar'),
(3, 'Sestra');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uloga_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ime`, `prezime`, `telefon`, `email`, `username`, `password`, `uloga_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pera', 'Kojot', '123', 'pera@kojot.com', 'pera', '123123', 2, NULL, NULL, NULL, NULL),
(2, 'Đura', 'Đurić', '123123', 'djura@djura.com', 'djura', '$2y$10$9IlfZpfXXWDiGzMSbr6UNu7oCcDL8QpTlqJj5vYayRujNCGJnwLhm', 1, NULL, NULL, '2019-12-04 21:56:09', '2019-12-04 21:56:09'),
(3, 'Laza', 'Lazić', '123123', 'laza@djura.com', 'laza', '$2y$10$CilIfzFx5WcVbHtnaDrs/OaWmwcQX2Wi4WdYDQDN6ptZMetDJ6/f2', 1, NULL, NULL, '2019-12-04 21:57:43', '2019-12-04 21:57:43'),
(4, 'Olja', 'Samardzic', '123123123', 'olja@olja.com', 'oljaa', '$2y$10$MCuzAyWjFB/cn6OxCAl/tePujgZveYzuKuxOsJJCgTOyCSgVB08C6', 1, NULL, 'fL56NSFQ4SiZRHRh1THwvMF2yseL4orRO9bW8owfrRefbbTbRzCH7LrvKMoL', '2019-12-04 22:00:17', '2019-12-04 22:00:17'),
(5, 'qwe', 'qwe', '123', 'qwe@qwe.com', 'qawe', '$2y$10$a8ScLR.PcTh7zRNeVU4d5.hsbbPE1XhulD9WkAKI7QdJKaDXhD0Vi', 1, NULL, NULL, '2019-12-04 22:13:05', '2019-12-04 22:13:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bolesti`
--
ALTER TABLE `bolesti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidencija_lecenja`
--
ALTER TABLE `evidencija_lecenja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evidencija_lecenja_karton_id_foreign` (`karton_id`),
  ADD KEY `evidencija_lecenja_user_id_foreign` (`user_id`),
  ADD KEY `evidencija_lecenja_bolest_id_foreign` (`bolest_id`),
  ADD KEY `evidencija_lecenja_lek_id_foreign` (`lek_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartoni`
--
ALTER TABLE `kartoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kartoni_pacijent_id_foreign` (`pacijent_id`);

--
-- Indexes for table `lekovi`
--
ALTER TABLE `lekovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacijenti`
--
ALTER TABLE `pacijenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pacijenti_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_uloga_id_foreign` (`uloga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bolesti`
--
ALTER TABLE `bolesti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evidencija_lecenja`
--
ALTER TABLE `evidencija_lecenja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kartoni`
--
ALTER TABLE `kartoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lekovi`
--
ALTER TABLE `lekovi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pacijenti`
--
ALTER TABLE `pacijenti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidencija_lecenja`
--
ALTER TABLE `evidencija_lecenja`
  ADD CONSTRAINT `evidencija_lecenja_bolest_id_foreign` FOREIGN KEY (`bolest_id`) REFERENCES `bolesti` (`id`),
  ADD CONSTRAINT `evidencija_lecenja_karton_id_foreign` FOREIGN KEY (`karton_id`) REFERENCES `kartoni` (`id`),
  ADD CONSTRAINT `evidencija_lecenja_lek_id_foreign` FOREIGN KEY (`lek_id`) REFERENCES `lekovi` (`id`),
  ADD CONSTRAINT `evidencija_lecenja_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kartoni`
--
ALTER TABLE `kartoni`
  ADD CONSTRAINT `kartoni_pacijent_id_foreign` FOREIGN KEY (`pacijent_id`) REFERENCES `pacijenti` (`id`);

--
-- Constraints for table `pacijenti`
--
ALTER TABLE `pacijenti`
  ADD CONSTRAINT `pacijenti_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_uloga_id_foreign` FOREIGN KEY (`uloga_id`) REFERENCES `uloge` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
