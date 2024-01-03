-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 02:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `commision_revenues`
--

CREATE TABLE `commision_revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_number` bigint(20) UNSIGNED NOT NULL,
  `titles` varchar(255) DEFAULT NULL,
  `deduction_name` varchar(255) NOT NULL,
  `deduction_amount` decimal(20,9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_computations`
--

CREATE TABLE `insurance_computations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_product_id` bigint(20) UNSIGNED NOT NULL,
  `insurance_coverage_id` bigint(20) UNSIGNED NOT NULL,
  `set_limit_minimum` decimal(20,9) NOT NULL,
  `set_limit_maximum` decimal(20,9) NOT NULL,
  `set_rate_minimum` decimal(20,9) NOT NULL,
  `set_rate_maximum` decimal(20,9) NOT NULL,
  `provider_net_rate` decimal(20,9) NOT NULL,
  `comm_based` decimal(20,9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_computations`
--

INSERT INTO `insurance_computations` (`id`, `provider_product_id`, `insurance_coverage_id`, `set_limit_minimum`, `set_limit_maximum`, `set_rate_minimum`, `set_rate_maximum`, `provider_net_rate`, `comm_based`) VALUES
(12, 1, 1, 100000.000000000, 2000000.000000000, 0.010000000, 0.017500000, 0.008000000, 0.000000000),
(13, 1, 2, 50000.000000000, 50000.000000000, 0.003900000, 0.003900000, 0.003900000, 0.000000000),
(14, 1, 2, 75000.000000000, 75000.000000000, 0.003000000, 0.003000000, 0.003000000, 0.000000000),
(15, 1, 2, 100000.000000000, 100000.000000000, 0.002700000, 0.002700000, 0.002700000, 0.000000000),
(16, 1, 2, 200000.000000000, 200000.000000000, 0.002100000, 0.002100000, 0.002100000, 0.000000000),
(17, 1, 3, 50000.000000000, 50000.000000000, 0.019500000, 0.019500000, 0.019500000, 0.000000000),
(18, 1, 3, 75000.000000000, 75000.000000000, 0.013800000, 0.013800000, 0.013800000, 0.000000000),
(19, 1, 3, 100000.000000000, 100000.000000000, 0.010950000, 0.010950000, 0.010950000, 0.000000000),
(20, 1, 3, 200000.000000000, 200000.000000000, 0.006225000, 0.006225000, 0.006225000, 0.000000000),
(21, 1, 4, 50000.000000000, 50000.000000000, 0.000000000, 0.000000000, 0.000000000, 0.000000000),
(22, 1, 5, 0.000000000, 0.000000000, 0.005000000, 0.005000000, 0.000500000, 0.000000000);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_coverages`
--

CREATE TABLE `insurance_coverages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coverage_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_coverages`
--

INSERT INTO `insurance_coverages` (`id`, `coverage_name`, `created_at`, `updated_at`) VALUES
(1, 'OWN DAMAGE/THEFT', NULL, NULL),
(2, 'BODILY INJURY', NULL, NULL),
(3, 'PROPERTY DAMAGE', NULL, NULL),
(4, 'AUTO-PA-5 SEATS', NULL, NULL),
(5, 'AOG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_products`
--

CREATE TABLE `insurance_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_products`
--

INSERT INTO `insurance_products` (`id`, `product_name`, `product_type`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', NULL, NULL, NULL),
(2, 'Wagon', NULL, NULL, NULL),
(3, 'Truck', NULL, NULL, NULL),
(4, 'L300', NULL, NULL, NULL),
(5, 'FPA', '', NULL, NULL),
(6, 'Luxury', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_providers`
--

CREATE TABLE `insurance_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `provider_logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_providers`
--

INSERT INTO `insurance_providers` (`id`, `provider_name`, `provider_logo`, `created_at`, `updated_at`) VALUES
(1, 'FGEN', 'FGEN.png', NULL, NULL),
(2, 'APA', NULL, NULL, NULL),
(3, 'Kemper', NULL, NULL, NULL),
(4, 'WPA', NULL, NULL, NULL),
(5, 'MUA', NULL, NULL, NULL),
(6, 'BTIS', NULL, NULL, NULL),
(7, 'DOMINION', NULL, NULL, NULL),
(8, 'AIG', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `insured_quotation_details`
--

CREATE TABLE `insured_quotation_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_number` bigint(20) UNSIGNED NOT NULL,
  `insured_full_name` varchar(255) NOT NULL,
  `insured_car_classification` varchar(255) NOT NULL,
  `insured_unit_model` varchar(255) NOT NULL,
  `insured_plate_no` varchar(255) NOT NULL,
  `effectivity_type` varchar(255) NOT NULL,
  `effectivity_date_start` date DEFAULT NULL,
  `effectivity_date_end` date DEFAULT NULL,
  `insured_net_premium` decimal(20,9) NOT NULL,
  `insured_dst_amount` decimal(20,9) NOT NULL,
  `insured_vat_amount` decimal(20,9) NOT NULL,
  `insured_rap_amount` decimal(20,9) DEFAULT NULL,
  `insured_lgt_amount` decimal(20,9) NOT NULL,
  `insured_gross_premium` decimal(20,9) NOT NULL,
  `provider_net_premium` decimal(20,9) NOT NULL,
  `provider_dst_amount` decimal(20,9) NOT NULL,
  `provider_vat_amount` decimal(20,9) NOT NULL,
  `provider_rap_amount` decimal(20,9) DEFAULT NULL,
  `provider_lgt_amount` decimal(20,9) NOT NULL,
  `provider_gross_premium_due` decimal(20,9) NOT NULL,
  `insured_discount_amount` decimal(20,9) NOT NULL,
  `insured_total_net_amount` decimal(20,9) NOT NULL,
  `commision_revenue_total_amount` decimal(20,9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2023_12_26_023202_create_insurance_providers_table', 1),
(19, '2023_12_26_104016_create_insurance_products_table', 1),
(20, '2023_12_26_104331_create_insurance_coverages_table', 1),
(21, '2023_12_26_104811_create_provider_products_table', 1),
(22, '2023_12_26_105031_create_provider_product_extensions_table', 1),
(23, '2024_01_02_132918_create_insurance_computations_table', 2),
(29, '2024_01_02_145708_create_quotations_table', 3),
(30, '2024_01_02_154827_create_insured_quotation_details_table', 4),
(31, '2024_01_02_171907_create_commision_revenues_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider_products`
--

CREATE TABLE `provider_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `insurance_provider_id` bigint(20) UNSIGNED NOT NULL,
  `insurance_product_id` bigint(20) UNSIGNED NOT NULL,
  `insurance_product_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_products`
--

INSERT INTO `provider_products` (`id`, `insurance_provider_id`, `insurance_product_id`, `insurance_product_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Rate', NULL, NULL),
(2, 1, 2, 'Rate', NULL, NULL),
(3, 1, 3, 'Rate', NULL, NULL),
(4, 1, 4, 'Commission Based', NULL, NULL),
(9, 1, 5, '', NULL, NULL),
(10, 1, 6, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provider_product_extensions`
--

CREATE TABLE `provider_product_extensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `extension_details` varchar(255) NOT NULL,
  `provider_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_number` bigint(20) UNSIGNED NOT NULL,
  `computation_rate_id` bigint(20) UNSIGNED NOT NULL,
  `insured_limit` decimal(20,9) NOT NULL,
  `insured_rate` decimal(20,9) NOT NULL,
  `insured_premium_due` decimal(20,9) NOT NULL,
  `provider_premium_due` decimal(20,9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commision_revenues`
--
ALTER TABLE `commision_revenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commision_revenues_quotation_number_foreign` (`quotation_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `insurance_computations`
--
ALTER TABLE `insurance_computations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurance_computations_provider_product_id_foreign` (`provider_product_id`),
  ADD KEY `insurance_computations_insurance_coverage_id_foreign` (`insurance_coverage_id`);

--
-- Indexes for table `insurance_coverages`
--
ALTER TABLE `insurance_coverages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_products`
--
ALTER TABLE `insurance_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_providers`
--
ALTER TABLE `insurance_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insured_quotation_details`
--
ALTER TABLE `insured_quotation_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insured_quotation_details_quotation_number_foreign` (`quotation_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provider_products`
--
ALTER TABLE `provider_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_products_insurance_provider_id_foreign` (`insurance_provider_id`),
  ADD KEY `provider_products_insurance_product_id_foreign` (`insurance_product_id`);

--
-- Indexes for table `provider_product_extensions`
--
ALTER TABLE `provider_product_extensions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_product_extensions_provider_product_id_foreign` (`provider_product_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotations_computation_rate_id_foreign` (`computation_rate_id`),
  ADD KEY `quotations_quotation_number_index` (`quotation_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commision_revenues`
--
ALTER TABLE `commision_revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_computations`
--
ALTER TABLE `insurance_computations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `insurance_coverages`
--
ALTER TABLE `insurance_coverages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `insurance_products`
--
ALTER TABLE `insurance_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insurance_providers`
--
ALTER TABLE `insurance_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `insured_quotation_details`
--
ALTER TABLE `insured_quotation_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider_products`
--
ALTER TABLE `provider_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provider_product_extensions`
--
ALTER TABLE `provider_product_extensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commision_revenues`
--
ALTER TABLE `commision_revenues`
  ADD CONSTRAINT `commision_revenues_quotation_number_foreign` FOREIGN KEY (`quotation_number`) REFERENCES `quotations` (`quotation_number`);

--
-- Constraints for table `insurance_computations`
--
ALTER TABLE `insurance_computations`
  ADD CONSTRAINT `insurance_computations_insurance_coverage_id_foreign` FOREIGN KEY (`insurance_coverage_id`) REFERENCES `insurance_coverages` (`id`),
  ADD CONSTRAINT `insurance_computations_provider_product_id_foreign` FOREIGN KEY (`provider_product_id`) REFERENCES `provider_products` (`id`);

--
-- Constraints for table `insured_quotation_details`
--
ALTER TABLE `insured_quotation_details`
  ADD CONSTRAINT `insured_quotation_details_quotation_number_foreign` FOREIGN KEY (`quotation_number`) REFERENCES `quotations` (`quotation_number`);

--
-- Constraints for table `provider_products`
--
ALTER TABLE `provider_products`
  ADD CONSTRAINT `provider_products_insurance_product_id_foreign` FOREIGN KEY (`insurance_product_id`) REFERENCES `insurance_products` (`id`),
  ADD CONSTRAINT `provider_products_insurance_provider_id_foreign` FOREIGN KEY (`insurance_provider_id`) REFERENCES `insurance_providers` (`id`);

--
-- Constraints for table `provider_product_extensions`
--
ALTER TABLE `provider_product_extensions`
  ADD CONSTRAINT `provider_product_extensions_provider_product_id_foreign` FOREIGN KEY (`provider_product_id`) REFERENCES `provider_products` (`id`);

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_computation_rate_id_foreign` FOREIGN KEY (`computation_rate_id`) REFERENCES `insurance_computations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
