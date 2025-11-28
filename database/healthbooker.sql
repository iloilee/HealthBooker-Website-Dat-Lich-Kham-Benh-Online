-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2025 lúc 05:36 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `healthbooker`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clinics`
--

CREATE TABLE `clinics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `introductionHTML` text DEFAULT NULL,
  `introductionMarkdown` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `clinics`
--

INSERT INTO `clinics` (`id`, `name`, `address`, `phone`, `introductionHTML`, `introductionMarkdown`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Phòng khám Cần Thơ', '123 Đường Mạc Thiên Tích, Cần Thơ', '0909123456', NULL, NULL, NULL, NULL, '2025-11-26 17:57:22', '2025-11-26 17:57:22', NULL),
(2, 'Phòng khám Vĩnh Long', '456 Đường Nguyễn Huệ, Vĩnh Long', '0909876543', NULL, NULL, NULL, NULL, '2025-11-26 17:57:22', '2025-11-26 17:57:22', NULL),
(3, 'Phòng khám Đà Nẵng', '789 Đường Phan Văn Trị, Đà Nẵng', '0909988776', NULL, NULL, NULL, NULL, '2025-11-26 17:57:22', '2025-11-26 17:57:22', NULL),
(4, 'Phòng khám Hồ Chí Minh', '12 Nguyễn Huệ, Quận 1, TP.HCM', '0911222333', NULL, NULL, NULL, NULL, '2025-11-28 10:57:22', '2025-11-28 10:57:22', NULL),
(5, 'Phòng khám Hà Nội', '88 Trần Duy Hưng, Cầu Giấy, Hà Nội', '0933444555', NULL, NULL, NULL, NULL, '2025-11-28 10:57:22', '2025-11-28 10:57:22', NULL),
(6, 'Phòng khám Hải Phòng', '27 Lạch Tray, Hải Phòng', '0944555666', NULL, NULL, NULL, NULL, '2025-11-28 10:57:22', '2025-11-28 10:57:22', NULL),
(7, 'Phòng khám Nha Trang', '59 Trần Phú, Nha Trang', '0922334455', NULL, NULL, NULL, NULL, '2025-11-28 10:57:22', '2025-11-28 10:57:22', NULL),
(8, 'Phòng khám Bình Dương', '101 Đại Lộ Bình Dương, Thủ Dầu Một', '0911778899', NULL, NULL, NULL, NULL, '2025-11-28 10:57:22', '2025-11-28 10:57:22', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctor_users`
--

CREATE TABLE `doctor_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `clinicId` bigint(20) UNSIGNED DEFAULT NULL,
  `specializationId` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctor_users`
--

INSERT INTO `doctor_users` (`id`, `doctorId`, `clinicId`, `specializationId`, `phone`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 2, '0909123456', 'doctor1.jpg', '2025-11-26 18:01:09', '2025-11-26 18:01:09', NULL),
(3, 6, 1, 1, '0912345678', NULL, '2025-11-26 12:35:01', '2025-11-26 12:35:01', NULL),
(4, 7, 2, 2, '0987654321', NULL, '2025-11-26 12:35:01', '2025-11-26 12:35:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `extra_infos`
--

CREATE TABLE `extra_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED DEFAULT NULL,
  `historyBreath` text DEFAULT NULL,
  `placeId` bigint(20) UNSIGNED DEFAULT NULL,
  `oldForms` text DEFAULT NULL,
  `sendForms` text DEFAULT NULL,
  `moreInfo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED DEFAULT NULL,
  `timeBooking` time DEFAULT NULL,
  `dateBooking` date DEFAULT NULL,
  `content` text DEFAULT NULL,
  `rating` tinyint(4) NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '01_2025_11_25_222625_create_roles_table', 1),
(2, '02_2025_11_25_222625_create_users_table', 1),
(3, '03_2025_11_25_222626_create_specializations_table', 1),
(4, '04_2025_11_25_222626_create_clinics_table', 1),
(5, '05_2025_11_25_222626_create_doctor_users_table', 1),
(6, '06_2025_11_25_222627_create_schedules_table', 1),
(7, '07_2025_11_25_222630_create_statuses_table', 1),
(8, '08_2025_11_25_222627_create_patients_table', 1),
(9, '09_2025_11_25_222627_create_feedbacks_table', 1),
(10, '10_2025_11_25_222627_create_sessions_table', 1),
(11, '11_2025_11_25_222628_create_places_table', 1),
(12, '12_2025_11_25_222628_create_posts_table', 1),
(13, '13_2025_11_25_222628_create_extra_infos_table', 1),
(14, '14_2025_11_25_222629_create_supporterlogs_table', 1),
(15, '10_2025_11_26_094215_create_sessions_table', 2),
(16, '10_2025_11_26_094520_create_sessions_table', 3),
(17, '2025_11_26_135517_create_cache_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `statusId` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dateBooking` date DEFAULT NULL,
  `timeBooking` time DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isSentForms` tinyint(1) NOT NULL DEFAULT 0,
  `isTakeCare` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patients`
--

INSERT INTO `patients` (`id`, `doctorId`, `statusId`, `name`, `phone`, `dateBooking`, `timeBooking`, `email`, `gender`, `year`, `address`, `description`, `isSentForms`, `isTakeCare`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 1, NULL, 'Nguyen Van A', '0912345678', NULL, NULL, 'patient1@gmail.com', 'male', NULL, NULL, NULL, 0, 0, '2025-11-26 18:02:25', '2025-11-26 18:02:25', NULL),
(5, 1, NULL, 'Tran Thi B', '0987654321', NULL, NULL, 'patient2@gmail.com', 'female', NULL, NULL, NULL, 0, 0, '2025-11-26 18:02:25', '2025-11-26 18:02:25', NULL),
(6, 1, NULL, 'Le Van C', '0909988776', NULL, NULL, 'patient3@gmail.com', 'male', NULL, NULL, NULL, 0, 0, '2025-11-26 18:02:25', '2025-11-26 18:02:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `contentMarkdown` text DEFAULT NULL,
  `contentHTML` text DEFAULT NULL,
  `forDoctorId` bigint(20) UNSIGNED DEFAULT NULL,
  `forSpecializationId` bigint(20) UNSIGNED DEFAULT NULL,
  `forClinicId` bigint(20) UNSIGNED DEFAULT NULL,
  `writerId` bigint(20) UNSIGNED NOT NULL,
  `confirmByDoctor` tinyint(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ADMIN', '2025-11-26 12:44:36', '2025-11-26 12:44:36', NULL),
(2, 'DOCTOR', '2025-11-26 12:44:36', '2025-11-26 12:44:36', NULL),
(3, 'PATIENT', '2025-11-26 12:44:36', '2025-11-26 12:44:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctorId` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `maxBooking` int(11) DEFAULT NULL,
  `sumBooking` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('g1dYcbKGf80GXluw9M4mwGcpvCwxWdCkZbSZV56x', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUtEM25mSjhidUowMnVuZjdPYWJpc1Z2eFdueHBDVHkwSVJpWTJvSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1764160804);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tim mạch', 'Chuyên khoa tim mạch', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(2, 'Da liễu', 'Chuyên khoa da liễu', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(3, 'Nhi khoa', 'Chuyên khoa nhi', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(4, 'Tiêu hóa', 'Chuyên khoa tiêu hóa', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(5, 'Sản phụ khoa', 'Chuyên khoa sản phụ khoa', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(6, 'Cơ xương khớp', 'Chuyên khoa cơ xương khớp', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(7, 'Thần kinh', 'Chuyên khoa thần kinh', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(8, 'Tai mũi họng', 'Chuyên khoa tai mũi họng', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(9, 'Nhãn khoa', 'Chuyên khoa nhãn khoa', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL),
(10, 'Nha khoa', 'Chuyên khoa nha khoa', NULL, '2025-11-26 18:00:17', '2025-11-26 18:00:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supporterlogs`
--

CREATE TABLE `supporterlogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patientId` bigint(20) UNSIGNED DEFAULT NULL,
  `supporterId` bigint(20) UNSIGNED DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `gender` enum('male','female','other') NOT NULL DEFAULT 'male',
  `roleId` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `avatar`, `gender`, `roleId`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin - iLoileDev', 'admin@gmail.com', '$2y$12$hrElLGLajA938uHMNa1V/.fWQKUuZYbM2ElSV44jLAeNQtWVyqWfi', NULL, NULL, NULL, 'male', 1, 1, '2025-11-26 05:16:59', '2025-11-26 05:16:59', NULL),
(2, 'Dr. Trịnh Trần Phương Hướng', 'doctor@gmail.com', '$2y$12$7H.TdCSEGpFFbiu70unl3.nthrElZSzzj0ucWeo0Vo5cewjczjRsC', NULL, NULL, 'https://lh3.googleusercontent.com/aida-public/AB6AXuBCkxmitPoFXpxvpuWGI_2HrlehwV-XKyJwlg73pQd1PVaQyg2r_G7zRxRCSOH1Cto51sKaQZmzRrp5y98OczTir5jkczGvLbtqF-XC1FtN5N8tJoS_tv9P6AtrXayMcfScy-5aW8R_g4AtylnmXXTrfpN7l3Ujq_USIa-pzxrwrD5c6WT1vnRBc5eqv0vyzOXB33UEATrQLpfCRVaoRF4gtErR8-Z1sGZ2AaZlk5Ng7dQQAXAYXVAVjyh0FBL16-aayJhaP4qXM3g', 'male', 2, 1, '2025-11-26 05:54:18', '2025-11-26 05:54:18', NULL),
(3, 'Nguyễn Vân Anh', 'patient@gmail.com', '$2y$12$reW9JSP.q//DOboUhk2DbO2/Q37kyCCuA633BCUbmbF11Hu47RY62', NULL, NULL, NULL, 'male', 3, 1, '2025-11-26 05:54:18', '2025-11-26 05:54:18', NULL),
(4, 'Nguyễn Nhật Minh ', 'patient4@gmail.com', '$2y$12$e0NRF3vHqi7kXfC8U6F4fOu5tVQp3dZVupvym6G5OjPqv.K6pq1rK', NULL, NULL, NULL, 'male', 3, 1, '2025-11-28 16:32:43', '2025-11-28 16:32:43', NULL),
(5, 'Thái Thị Mỹ ', 'patient5@gmail.com', '$2y$12$e0NRF3vHqi7kXfC8U6F4fOu5tVQp3dZVupvym6G5OjPqv.K6pq1rK', NULL, NULL, NULL, 'female', 3, 1, '2025-11-28 16:32:43', '2025-11-28 16:32:43', NULL),
(6, 'Dr. Trần Mạnh Hùng', 'doctor2@gmail.com', '$2y$12$Wz4p2Bl58yXuJ.vj5q6F9.wcXzIc/DXds3z1TJVkEjJxuzaYnyFy6', NULL, NULL, 'https://png.pngtree.com/png-vector/20250813/ourlarge/pngtree-smiling-male-doctor-in-white-coat-portrait-against-light-gray-background-png-image_16654591.png', 'male', 2, 1, '2025-11-26 12:31:35', '2025-11-26 12:31:35', NULL),
(7, 'Dr. Phan Vân Tường', 'doctor3@gmail.com', '$2y$12$8N1Vh14KYGzw3e29Ueyzsu.kcvn2MqBfKwtXRArI2cw4/gdWiVKxi', NULL, NULL, 'https://png.pngtree.com/png-vector/20250105/ourlarge/pngtree-portrait-studio-isolated-cutout-closeup-shot-of-asian-professional-successful-female-png-image_15063485.png', 'female', 2, 1, '2025-11-26 12:31:35', '2025-11-26 12:31:35', NULL),
(8, 'Trần Thị Tuyết', 'patient2@gmail.com', '$2y$12$XXV9sxFJ9FHfa3GF8/M6M.cj29wGcneay2OB9hfBO5f1lj4x7mcEG', NULL, NULL, NULL, 'female', 3, 1, '2025-11-26 12:31:36', '2025-11-26 12:31:36', NULL),
(9, 'Trần Văn Toàn', 'patient3@gmail.com', '$2y$12$dVYM5pq5PJU.4ufJ48gaTOHf53AUNRlj2PEEve2NC/j8Zc5/yvJUa', NULL, NULL, NULL, 'male', 3, 1, '2025-11-26 12:31:36', '2025-11-26 12:31:36', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doctor_users`
--
ALTER TABLE `doctor_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_users_doctorid_foreign` (`doctorId`),
  ADD KEY `doctor_users_clinicid_foreign` (`clinicId`),
  ADD KEY `doctor_users_specializationid_foreign` (`specializationId`);

--
-- Chỉ mục cho bảng `extra_infos`
--
ALTER TABLE `extra_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `extra_infos_patientid_foreign` (`patientId`),
  ADD KEY `extra_infos_placeid_foreign` (`placeId`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_doctorid_foreign` (`doctorId`),
  ADD KEY `feedbacks_patientid_foreign` (`patientId`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_doctorid_foreign` (`doctorId`),
  ADD KEY `patients_statusid_foreign` (`statusId`);

--
-- Chỉ mục cho bảng `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_fordoctorid_foreign` (`forDoctorId`),
  ADD KEY `posts_forspecializationid_foreign` (`forSpecializationId`),
  ADD KEY `posts_forclinicid_foreign` (`forClinicId`),
  ADD KEY `posts_writerid_foreign` (`writerId`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_doctorid_foreign` (`doctorId`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supporterlogs`
--
ALTER TABLE `supporterlogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supporterlogs_patientid_foreign` (`patientId`),
  ADD KEY `supporterlogs_supporterid_foreign` (`supporterId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roleid_foreign` (`roleId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `doctor_users`
--
ALTER TABLE `doctor_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `extra_infos`
--
ALTER TABLE `extra_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `supporterlogs`
--
ALTER TABLE `supporterlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `doctor_users`
--
ALTER TABLE `doctor_users`
  ADD CONSTRAINT `doctor_users_clinicid_foreign` FOREIGN KEY (`clinicId`) REFERENCES `clinics` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `doctor_users_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_users_specializationid_foreign` FOREIGN KEY (`specializationId`) REFERENCES `specializations` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `extra_infos`
--
ALTER TABLE `extra_infos`
  ADD CONSTRAINT `extra_infos_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `extra_infos_placeid_foreign` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctor_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctor_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patients_statusid_foreign` FOREIGN KEY (`statusId`) REFERENCES `statuses` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_forclinicid_foreign` FOREIGN KEY (`forClinicId`) REFERENCES `clinics` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_fordoctorid_foreign` FOREIGN KEY (`forDoctorId`) REFERENCES `doctor_users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_forspecializationid_foreign` FOREIGN KEY (`forSpecializationId`) REFERENCES `specializations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_writerid_foreign` FOREIGN KEY (`writerId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_doctorid_foreign` FOREIGN KEY (`doctorId`) REFERENCES `doctor_users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `supporterlogs`
--
ALTER TABLE `supporterlogs`
  ADD CONSTRAINT `supporterlogs_patientid_foreign` FOREIGN KEY (`patientId`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supporterlogs_supporterid_foreign` FOREIGN KEY (`supporterId`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roleid_foreign` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
