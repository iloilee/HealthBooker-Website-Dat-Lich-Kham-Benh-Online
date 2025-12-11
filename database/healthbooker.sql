-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2025 lúc 04:51 PM
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
(1, 'Phòng khám Cần Thơ', '123 Đường Mạc Thiên Tích, Cần Thơ', '0909123456', NULL, NULL, NULL, NULL, '2025-11-26 10:57:22', '2025-11-26 10:57:22', NULL),
(2, 'Phòng khám Vĩnh Long', '456 Đường Nguyễn Huệ, Vĩnh Long', '0909876543', NULL, NULL, NULL, NULL, '2025-11-26 10:57:22', '2025-11-26 10:57:22', NULL),
(3, 'Phòng khám Đà Nẵng', '789 Đường Phan Văn Trị, Đà Nẵng', '0909988776', NULL, NULL, NULL, NULL, '2025-11-26 10:57:22', '2025-11-26 10:57:22', NULL),
(4, 'Phòng khám Hồ Chí Minh', '12 Nguyễn Huệ, Quận 1, TP.HCM', '0911222333', NULL, NULL, NULL, NULL, '2025-11-28 03:57:22', '2025-11-28 03:57:22', NULL),
(5, 'Phòng khám Hà Nội', '88 Trần Duy Hưng, Cầu Giấy, Hà Nội', '0933444555', NULL, NULL, NULL, NULL, '2025-11-28 03:57:22', '2025-11-28 03:57:22', NULL);

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `certification` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctor_users`
--

INSERT INTO `doctor_users` (`id`, `doctorId`, `clinicId`, `specializationId`, `phone`, `photo`, `created_at`, `updated_at`, `deleted_at`, `bio`, `experience_years`, `certification`, `date_of_birth`) VALUES
(1, 7, 1, 1, '0909123456', 'doctor1.jpg', '2025-11-26 11:01:09', '2025-11-26 11:01:09', NULL, 'Bác sĩ chuyên khoa nội với hơn 10 năm kinh nghiệm.', 10, 'Chứng chỉ hành nghề nội tổng quát', '1980-05-12'),
(3, 8, 1, 2, '0912345678', 'doctor2.jpg', '2025-11-26 05:35:01', '2025-11-26 05:35:01', NULL, 'Chuyên gia tim mạch với nhiều công trình nghiên cứu.', 12, 'Chứng chỉ chuyên khoa tim mạch', '1982-09-20'),
(4, 9, 2, 3, '0987654321', 'doctor3.jpg', '2025-11-26 05:35:01', '2025-11-26 05:35:01', NULL, 'Bác sĩ ngoại khoa chuyên phẫu thuật tiêu hóa.', 15, 'Chứng chỉ phẫu thuật tiêu hóa nâng cao', '1978-03-15'),
(5, 10, 2, 4, '0909000004', 'doctor4.jpg', '2025-11-28 13:27:13', '2025-11-28 13:27:13', NULL, 'Bác sĩ nhi khoa tận tâm với trẻ em.', 8, 'Chứng chỉ chuyên ngành nhi', '1987-11-02'),
(6, 11, 3, 5, '0909000005', 'doctor5.jpg', '2025-11-28 13:27:13', '2025-11-28 13:27:13', NULL, 'Bác sĩ da liễu chuyên điều trị các bệnh mãn tính.', 9, 'Chứng chỉ da liễu chuyên sâu', '1985-01-18'),
(7, 12, 4, 6, '0909000006', 'doctor6.jpg', '2025-11-28 13:27:13', '2025-11-28 13:27:13', NULL, 'Bác sĩ xương khớp với 11 năm kinh nghiệm.', 11, 'Chứng chỉ cơ xương khớp', '1981-07-09'),
(8, 13, 5, 7, '0909000007', 'doctor7.jpg', '2025-11-28 13:27:13', '2025-11-28 13:27:13', NULL, 'Bác sĩ thần kinh học với kinh nghiệm điều trị chứng đau đầu mãn tính.', 14, 'Chứng chỉ chuyên ngành thần kinh', '1979-12-28'),
(9, 14, 1, 8, '0909000008', 'doctor8.jpg', '2025-11-28 13:27:13', '2025-11-28 13:27:13', NULL, 'Bác sĩ sản khoa với hơn 13 năm kinh nghiệm.', 13, 'Chứng chỉ sản phụ khoa', '1983-04-22');

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

--
-- Đang đổ dữ liệu cho bảng `extra_infos`
--

INSERT INTO `extra_infos` (`id`, `patientId`, `historyBreath`, `placeId`, `oldForms`, `sendForms`, `moreInfo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 16, 'Không có tiền sử hô hấp nghiêm trọng', 1, '[]', '[]', 'Bệnh nhân dễ bị cảm lạnh', '2025-11-28 06:49:34', NULL, NULL),
(10, 17, 'Đôi khi khó thở khi vận động', 1, '[]', '[]', 'Cần theo dõi huyết áp', '2025-11-28 06:49:34', NULL, NULL),
(11, 18, 'Có tiền sử hen nhẹ', 5, '[]', '[]', 'Dị ứng phấn hoa mùa xuân', '2025-11-28 06:49:34', NULL, NULL),
(12, 19, 'Khó thở nhẹ khi mệt', 2, '[]', '[]', 'Cần ăn uống hợp lý', '2025-11-28 06:49:34', NULL, NULL),
(13, 20, 'Không có triệu chứng hô hấp', 3, '[]', '[]', 'Theo dõi thể trạng cơ xương', '2025-11-28 06:49:34', NULL, NULL),
(14, 21, 'Đôi khi ho về đêm', 5, '[]', '[]', 'Kiểm tra mắt định kỳ', '2025-11-28 06:49:34', NULL, NULL),
(15, 22, 'Tiền sử viêm phổi năm 2020', 1, '[]', '[]', 'Cần chăm sóc răng miệng tốt', '2025-11-28 06:49:34', NULL, NULL),
(16, 23, 'Không có vấn đề hô hấp', 2, '[]', '[]', 'Khám sản phụ khoa định kỳ', '2025-11-28 06:49:34', NULL, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `doctorId`, `patientId`, `timeBooking`, `dateBooking`, `content`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 7, 16, '08:00:00', '2025-12-01', 'Bác sĩ rất nhiệt tình, khám kỹ.', 5, '2025-11-28 00:00:00', NULL, NULL),
(32, 8, 17, '09:00:00', '2025-12-01', 'Rất hài lòng với cách tư vấn.', 4, '2025-11-28 00:05:00', NULL, NULL),
(33, 9, 18, '10:00:00', '2025-12-02', 'Thái độ thân thiện, giải thích dễ hiểu.', 5, '2025-11-28 00:10:00', NULL, NULL),
(34, 1, 19, '11:00:00', '2025-12-02', 'Chờ hơi lâu nhưng bác sĩ khám kỹ.', 4, '2025-11-28 00:15:00', NULL, NULL),
(35, 3, 20, '08:30:00', '2025-12-03', 'Khám nhanh, có lưu ý thêm cho bệnh nhân.', 3, '2025-11-28 00:20:00', NULL, NULL),
(36, 4, 17, '14:00:00', '2025-12-03', 'Bác sĩ giải thích chi tiết, dễ hiểu.', 5, '2025-11-28 00:25:00', NULL, NULL),
(37, 5, 22, '15:30:00', '2025-12-04', 'Hơi đông bệnh nhân nhưng vẫn chu đáo.', 4, '2025-11-28 00:30:00', NULL, NULL),
(38, 6, 21, '13:00:00', '2025-12-04', 'Rất chuyên nghiệp, nhiệt tình với bệnh nhân.', 5, '2025-11-28 00:35:00', NULL, NULL),
(39, 6, 20, '09:30:00', '2025-12-05', 'Chưa hài lòng lắm, bác sĩ hơi vội.', 3, '2025-11-28 00:40:00', NULL, NULL),
(40, 7, 23, '10:30:00', '2025-12-05', 'Khám tốt, tư vấn kỹ, sẽ quay lại.', 5, '2025-11-28 00:45:00', NULL, NULL);

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
(1, '00_2025_11_25_000001_create_master_data_tables', 1),
(2, '02_2025_11_25_000002_create_users_table', 1),
(3, '03_2025_11_25_000003_create_doctor_users_table', 1),
(4, '04_2025_11_25_000004_create_patients_table', 1),
(5, '05_2025_11_25_000005_create_extra_infos_table', 1),
(6, '06_2025_11_25_000006_create_schedules_table', 1),
(7, '07_2025_11_25_000007_create_feedbacks_table', 1),
(8, '08_2025_11_25_000008_create_supporterlogs_table', 1),
(9, '09_2025_11_25_000009_create_posts_table', 1),
(10, '10_2025_11_29_000010_create_password_reset_tokens_table', 1),
(11, '2025_12_08_183947_add_doctor_details_to_doctor_users_table', 1),
(12, '2025_12_08_190015_add_date_of_birth_to_doctor_users_table', 1),
(13, '2025_12_08_192727_update_gender_enum_in_users_table', 1),
(14, '2025_12_11_134524_add_cancellation_reason_to_patients_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cancellation_reason` text DEFAULT NULL,
  `isSentForms` tinyint(1) NOT NULL DEFAULT 0,
  `isTakeCare` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `patients`
--

INSERT INTO `patients` (`id`, `doctorId`, `statusId`, `name`, `phone`, `dateBooking`, `timeBooking`, `email`, `gender`, `year`, `address`, `description`, `cancellation_reason`, `isSentForms`, `isTakeCare`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 1, 1, 'Nguyễn Vân Anh', '0909123456', '2025-12-30', '08:00:00', 'patient1@gmail.com', 'male', '1990', 'Cần Thơ', 'Khám tổng quát', NULL, 1, 0, '2025-11-28 13:41:18', NULL, NULL),
(17, 3, 2, 'Nguyễn Nhật Minh', '0912345678', '2025-12-01', '09:00:00', 'patient2@gmail.com', 'male', '1992', 'Cần Thơ', 'Khám tim mạch', NULL, 0, 0, '2025-11-28 13:41:18', NULL, NULL),
(18, 4, 1, 'Thái Thị Mỹ', '0987654321', '2025-12-30', '10:00:00', 'patient3@gmail.com', 'female', '1995', 'Hà Nội', 'Khám da liễu', NULL, 1, 0, '2025-11-28 13:41:18', '2025-12-11 08:45:36', NULL),
(19, 5, 3, 'Trần Thị Tuyết', '0909000001', '2025-12-02', '11:00:00', 'patient4@gmail.com', 'female', '1988', 'Vĩnh Long', 'Khám tiêu hóa', NULL, 1, 0, '2025-11-28 13:41:18', NULL, NULL),
(20, 6, 2, 'Trần Văn Toàn', '0909000002', '2025-12-03', '08:30:00', 'patient5@gmail.com', 'male', '1991', 'Đà Nẵng', 'Khám cơ xương khớp', NULL, 0, 0, '2025-11-28 13:41:18', NULL, NULL),
(21, 7, 1, 'Nguyễn Thị Lan', '0909000003', '2025-12-03', '09:30:00', 'patient6@gmail.com', 'female', '1993', 'Hà Nội', 'Khám mắt', NULL, 0, 0, '2025-11-28 13:41:18', NULL, NULL),
(22, 8, 4, 'Phạm Văn Hùng', '0909000004', '2025-12-04', '08:00:00', 'patient7@gmail.com', 'male', '1985', 'Cần Thơ', 'Khám răng', NULL, 0, 0, '2025-11-28 13:41:18', NULL, NULL),
(23, 9, 3, 'Lê Thị Hoa', '0909000005', '2025-12-04', '10:00:00', 'patient8@gmail.com', 'female', '1990', 'Vĩnh Long', 'Khám sản phụ khoa', NULL, 1, 0, '2025-11-28 13:41:18', NULL, NULL),
(24, 4, 3, 'Trần Văn Hoa', '0987654321', '2025-12-30', '10:00:00', 'patient9@gmail.com', 'male', '1995', 'Hà Nội', 'Khám tổng quát', NULL, 1, 0, '2025-11-28 14:41:18', NULL, NULL),
(25, 4, 4, 'Trần Mạnh Hùng', '0987654321', '2026-01-10', '15:00:00', 'patient10@gmail.com', 'male', '1995', 'Hà Nội', 'Khám mắt', 'di choi voi ghe dit bu', 1, 0, '2025-11-28 14:41:18', '2025-12-11 07:20:28', NULL);

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

--
-- Đang đổ dữ liệu cho bảng `places`
--

INSERT INTO `places` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cần Thơ', '2025-11-28 13:43:21', '2025-11-28 13:43:21', NULL),
(2, 'Vĩnh Long', '2025-11-28 13:43:21', '2025-11-28 13:43:21', NULL),
(3, 'Đà Nẵng', '2025-11-28 13:43:21', '2025-11-28 13:43:21', NULL),
(4, 'Hồ Chí Minh', '2025-11-28 13:43:21', '2025-11-28 13:43:21', NULL),
(5, 'Hà Nội', '2025-11-28 13:43:21', '2025-11-28 13:43:21', NULL);

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
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `contentMarkdown`, `contentHTML`, `forDoctorId`, `forSpecializationId`, `forClinicId`, `writerId`, `confirmByDoctor`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '7 lời khuyên để có một trái tim khỏe mạnh', 'Chuyên gia tim mạch chia sẻ các bí quyết đơn giản nhưng hiệu quả để bảo vệ sức khỏe tim mạch.', '<p>Chuyên gia tim mạch chia sẻ các bí quyết đơn giản nhưng hiệu quả để bảo vệ sức khỏe tim mạch.</p>', NULL, NULL, NULL, 1, 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuDDQCUJw56m3H-xq82BPDJ3GMfLFGCooZ2p7-CoIHnWsc7NU1wxkQw3MZX6G_PkJiJvAM2LClpsIKJfBEwtoPsHKo7k_8iPsuKpg76jjeG98DlHN0MVWnq9zxvrMLKY0DxRM9ndLPOeTbm1Ji4SzD8BW33fCDvdUS8uwZariYuXtvMtLuswGLztLKfWctEfq6gwQO_V6rtX6uKGWIJOfLT6N2_fE2xuvSUgRoe14kCZdyTMXuKAD22Ay6vtfG-yEQB_JToe32Lj3Yc', '2025-11-28 03:00:00', NULL, NULL),
(2, 'Chế độ ăn uống cân bằng cho người bận rộn', 'Hướng dẫn duy trì chế độ ăn uống lành mạnh khi không có nhiều thời gian.', '<p>Hướng dẫn duy trì chế độ ăn uống lành mạnh khi không có nhiều thời gian.</p>', NULL, NULL, NULL, 1, 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuCkwU4-0_27rDFiMV2iQM3yF5aDiXJr6GQcRwPitWem1OZQCpBe3WjU9sPO9a-skxmz3BJyBH-rwAMYILK2aey4fiiUPefiMBWaN6ZrXL8-l0Dj75mGsvjpotX9XvSN0sLZNt0FrGN1qAvJKPPTNamjqT5QDD74svnUihfsgotQRCj1mGxnWUNiA17R4PQTSiTlAPnSIhu-lT69WGNxbO9zvu6xgMOgogsARHeWxm_P1lKdyXJF3rHudJI0iWAbHvgvuSKxlpIdN9g', '2025-11-28 03:00:00', NULL, NULL),
(3, 'Giảm căng thẳng và lo âu với 5 bài tập thở', 'Các kỹ thuật thở đơn giản giúp bình tĩnh và cải thiện sức khỏe tinh thần.', '<p>Các kỹ thuật thở đơn giản giúp bình tĩnh và cải thiện sức khỏe tinh thần.</p>', NULL, NULL, NULL, 1, 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuA3pDA5-4UCVlO1Cwp_-THfHvDoT1uJOfgcqPxPRNPTaPO47DOYSGup-yDlywfPBI_DlIRffUj-sdb4n5M98U-p-KnjufrbU7u21qqdDyBhxH8zPm1pIh2gsDJQfGkr_VyXMdGHSJ-eb2Ve1ytu1FcyG311O3afDRc9RzcKgrUIBb25hg3dZwZojhzMAZif7IejaOkbnqAm5EqpnA7bL_eq0a5Qw5-_oGiMEEFMejdKDthzdhafofwDqySbYfMcDyQ33b6W85DI2Yk', '2025-11-28 03:00:00', NULL, NULL),
(4, 'AI đang thay đổi ngành chẩn đoán hình ảnh như thế nào', 'Trí tuệ nhân tạo mang lại những bước tiến vượt bậc trong phát hiện sớm và chẩn đoán bệnh.', '<p>Trí tuệ nhân tạo mang lại những bước tiến vượt bậc trong phát hiện sớm và chẩn đoán bệnh.</p>', NULL, NULL, NULL, 1, 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuDFyr0wJZ_1_I6lvtRIRACwwvdrXBQKmSelRS7HoEcCxACNBIR_VobfJcqPcPyd-FuzGwI2P-un-msEufqFySqUr5pJt8hObDZhv8YRtrkAh7j0HshtvfTKVLOVEIf4RHPTugQ9IMolhXSZL5HR8XXh0mEa9RSX5I2_5B-TYtXYRjnOU5e5OPBON_R2ZdiOwBl14TklaJr5hHG-j3vSGnTzcLig8B-K9ZqdEces2btfv_cz5yrm0iWMPQHyXdnbcaSQLRwonvQxzLc', '2025-11-28 03:00:00', NULL, NULL),
(5, 'Tầm quan trọng của giấc ngủ đối với sức khỏe', 'Khám phá lý do tại sao giấc ngủ ngon là nền tảng cho cơ thể và tinh thần khỏe mạnh.', '<p>Khám phá lý do tại sao giấc ngủ ngon là nền tảng cho cơ thể và tinh thần khỏe mạnh.</p>', NULL, NULL, NULL, 1, 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuDdatFsojk6832TSaQUsLQnJmcuCpp07aAwNUoIXMlzmdn3zMi_F4Nb81kSjAZZtDUtBA4UcSqmc-J6ZN4ZRad3JLJeLdz17eoQMEy3UHvXERtiLJYMCfceiVCw2grjWTaua5lnUcHg4CfOwJatweov2-tocj-Z2uhWNI6S6c5AXUlBBdgVklVTGoEGiOYZp-UmF0NZJULMKB0msDSFfor1L7X0D51ZDg9XxGimstUGc8X9c8VpkzmjfuzwD3O96mitxuJcFlu4UtQ', '2025-11-28 03:00:00', NULL, NULL),
(6, '5 thói quen đơn giản giúp tăng cường hệ miễn dịch', 'Xây dựng hàng rào bảo vệ cơ thể bằng những thay đổi nhỏ trong lối sống hàng ngày.', '<p>Xây dựng hàng rào bảo vệ cơ thể bằng những thay đổi nhỏ trong lối sống hàng ngày.</p>', NULL, NULL, NULL, 1, 1, 'https://lh3.googleusercontent.com/aida-public/AB6AXuBBEnEdXFq_s8I6aOX7ajXMWxRLkf1NstIIthBuhgsgxoS2AQ-WDRTeEGoUK6AMuSoRmmWrXn2ro0-e6GKBXVVo9XriHMIsU7kzgZT3M48z1GFd9v1q6rEAW6zOQ1kEqGwQ87KvqVg088F5BZcDJ5vDFdwCP-R26xlex0gTVmCrA5FBbLGmWr3KNa1pGqKCvGvkuZyTEqJXe7lyDEbDgarlDVJxNs_bpm7G1b_VYs4I0XcUnAwzM6mrCTbX7k1sjf7fuk8lHs2GeFA', '2025-11-28 03:00:00', NULL, NULL);

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
(1, 'ADMIN', '2025-11-26 05:44:36', '2025-11-26 05:44:36', NULL),
(2, 'DOCTOR', '2025-11-26 05:44:36', '2025-11-26 05:44:36', NULL),
(3, 'PATIENT', '2025-11-26 05:44:36', '2025-11-26 05:44:36', NULL),
(4, 'SUPPORTER', '2025-11-28 12:40:39', '2025-11-28 12:40:39', NULL);

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

--
-- Đang đổ dữ liệu cho bảng `schedules`
--

INSERT INTO `schedules` (`id`, `doctorId`, `date`, `time`, `maxBooking`, `sumBooking`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, '2025-01-05', '08:00:00', 2, 0, '2025-11-28 07:19:14', NULL, NULL),
(8, 1, '2025-01-05', '09:00:00', 2, 1, '2025-11-28 07:19:14', NULL, NULL),
(9, 1, '2025-01-06', '14:00:00', 1, 0, '2025-11-28 07:19:14', NULL, NULL),
(10, 3, '2025-01-05', '08:00:00', 2, 0, '2025-11-28 07:19:14', NULL, NULL),
(11, 3, '2025-01-06', '10:00:00', 1, 0, '2025-11-28 07:19:14', NULL, NULL),
(12, 3, '2025-01-07', '15:00:00', 2, 0, '2025-11-28 07:19:14', NULL, NULL);

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
('LxOiaJOi7A1pJdVFdoA0it30v0MXBwz9ZceIhcnM', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibW9mR3p3S1dpZFBZV2lQUzV6YkxuWlA5dkZ1TU5tNXVyS1pObXI2QyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNzaWxvZyI7czo1OiJyb3V0ZSI7czo4OiJiYWNzaWxvZyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czo2OiJkb2N0b3IiO086ODoic3RkQ2xhc3MiOjU6e3M6MjoiaWQiO2k6OTtzOjg6ImZ1bGxuYW1lIjtzOjIyOiJEci4gUGhhbiBWw6JuIFTGsOG7nW5nIjtzOjEwOiJzcGVjaWFsaXR5IjtzOjIyOiJDaMawYSBjw7MgY2h1ecOqbiBraG9hIjtzOjY6ImF2YXRhciI7czoxNjg6Imh0dHBzOi8vcG5nLnBuZ3RyZWUuY29tL3BuZy12ZWN0b3IvMjAyNTAxMDUvb3VybGFyZ2UvcG5ndHJlZS1wb3J0cmFpdC1zdHVkaW8taXNvbGF0ZWQtY3V0b3V0LWNsb3NldXAtc2hvdC1vZi1hc2lhbi1wcm9mZXNzaW9uYWwtc3VjY2Vzc2Z1bC1mZW1hbGUtcG5nLWltYWdlXzE1MDYzNDg1LnBuZyI7czo5OiJpc19hY3RpdmUiO2k6MTt9fQ==', 1765468234);

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
(1, 'Tim mạch', 'Chuyên khoa tim mạch', NULL, '2025-11-26 11:00:17', '2025-11-26 11:00:17', NULL),
(2, 'Da liễu', 'Chuyên khoa da liễu', NULL, '2025-11-26 11:00:17', '2025-11-26 11:00:17', NULL),
(3, 'Nhi khoa', 'Chuyên khoa nhi', NULL, '2025-11-26 11:00:17', '2025-11-26 11:00:17', NULL),
(4, 'Tiêu hóa', 'Chuyên khoa tiêu hóa', NULL, '2025-11-26 11:00:17', '2025-11-26 11:00:17', NULL),
(5, 'Sản phụ khoa', 'Chuyên khoa sản phụ khoa', NULL, '2025-11-26 11:00:17', '2025-11-26 11:00:17', NULL),
(6, 'Cơ xương khớp', 'Chuyên khoa cơ xương khớp', NULL, '2025-11-26 11:00:17', '2025-11-26 11:00:17', NULL),
(7, 'Nhãn khoa', 'Chuyên khoa nhãn khoa', NULL, '2025-11-26 11:00:17', '2025-11-26 11:00:17', NULL),
(8, 'Nha Khoa', 'Chuyên khoa Nha Khoa', NULL, '2025-11-26 04:00:17', '2025-11-26 04:00:17', NULL);

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

--
-- Đang đổ dữ liệu cho bảng `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chờ xác nhận', '2025-11-28 13:40:38', '2025-11-28 13:40:38', NULL),
(2, 'Đã xác nhận', '2025-11-28 13:40:38', '2025-11-28 13:40:38', NULL),
(3, 'Đã khám', '2025-11-28 13:40:38', '2025-11-28 13:40:38', NULL),
(4, 'Hủy', '2025-11-28 13:40:38', '2025-11-28 13:40:38', NULL);

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

--
-- Đang đổ dữ liệu cho bảng `supporterlogs`
--

INSERT INTO `supporterlogs` (`id`, `patientId`, `supporterId`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 16, 7, 'Hỗ trợ bệnh nhân đăng ký lịch thành công.', '2025-11-28 01:00:00', NULL, NULL),
(2, 17, 8, 'Giải đáp thắc mắc về thông tin bác sĩ.', '2025-11-28 01:05:00', NULL, NULL),
(3, 18, 7, 'Hỗ trợ thanh toán dịch vụ.', '2025-11-28 01:10:00', NULL, NULL),
(4, 19, 9, 'Gửi thông báo thay đổi lịch hẹn.', '2025-11-28 01:15:00', NULL, NULL),
(5, 20, 8, 'Hướng dẫn cài đặt ứng dụng HealthBooker.', '2025-11-28 01:20:00', NULL, NULL),
(6, 21, 7, 'Cập nhật thông tin cá nhân bệnh nhân.', '2025-11-28 01:25:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `gender` enum('Nam','Nữ','Khác') DEFAULT NULL,
  `roleId` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `address`, `phone`, `avatar`, `gender`, `roleId`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iLoileDev', 'admin@gmail.com', '$2y$12$hrElLGLajA938uHMNa1V/.fWQKUuZYbM2ElSV44jLAeNQtWVyqWfi', '5WpdBhN9JSukbwXpWvu7xsX3lLyX7JQw8a9LKdy3LYzfZvfITpavPAjUs4kZ', NULL, NULL, NULL, 'Nam', 1, 1, '2025-11-25 22:16:59', '2025-11-25 22:16:59', NULL),
(2, 'Nguyễn Vân Anh', 'patient1@gmail.com', '$2y$12$reW9JSP.q//DOboUhk2DbO2/Q37kyCCuA633BCUbmbF11Hu47RY62', NULL, NULL, NULL, NULL, 'Nam', 3, 1, '2025-11-25 22:54:18', '2025-11-25 22:54:18', NULL),
(3, 'Nguyễn Nhật Minh ', 'patient2@gmail.com', '$2y$12$e0NRF3vHqi7kXfC8U6F4fOu5tVQp3dZVupvym6G5OjPqv.K6pq1rK', NULL, NULL, NULL, NULL, 'Nam', 3, 1, '2025-11-28 09:32:43', '2025-11-28 09:32:43', NULL),
(4, 'Thái Thị Mỹ ', 'patient3@gmail.com', '$2y$12$e0NRF3vHqi7kXfC8U6F4fOu5tVQp3dZVupvym6G5OjPqv.K6pq1rK', NULL, NULL, NULL, NULL, 'Nữ', 3, 1, '2025-11-28 09:32:43', '2025-11-28 09:32:43', NULL),
(5, 'Trần Thị Tuyết', 'patient4@gmail.com', '$2y$12$XXV9sxFJ9FHfa3GF8/M6M.cj29wGcneay2OB9hfBO5f1lj4x7mcEG', NULL, NULL, NULL, NULL, 'Nữ', 3, 1, '2025-11-26 05:31:36', '2025-11-26 05:31:36', NULL),
(6, 'Trần Văn Toàn', 'patient5@gmail.com', '$2y$12$dVYM5pq5PJU.4ufJ48gaTOHf53AUNRlj2PEEve2NC/j8Zc5/yvJUa', NULL, NULL, NULL, NULL, 'Nam', 3, 1, '2025-11-26 05:31:36', '2025-11-26 05:31:36', NULL),
(7, 'Dr. Trịnh Trần Phương Hướng', 'doctor1@gmail.com', '$2y$12$7H.TdCSEGpFFbiu70unl3.nthrElZSzzj0ucWeo0Vo5cewjczjRsC', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/aida-public/AB6AXuBCkxmitPoFXpxvpuWGI_2HrlehwV-XKyJwlg73pQd1PVaQyg2r_G7zRxRCSOH1Cto51sKaQZmzRrp5y98OczTir5jkczGvLbtqF-XC1FtN5N8tJoS_tv9P6AtrXayMcfScy-5aW8R_g4AtylnmXXTrfpN7l3Ujq_USIa-pzxrwrD5c6WT1vnRBc5eqv0vyzOXB33UEATrQLpfCRVaoRF4gtErR8-Z1sGZ2AaZlk5Ng7dQQAXAYXVAVjyh0FBL16-aayJhaP4qXM3g', 'Nam', 2, 1, '2025-11-25 22:54:18', '2025-11-25 22:54:18', NULL),
(8, 'Dr. Trần Mạnh Hùng', 'doctor2@gmail.com', '$2y$12$Wz4p2Bl58yXuJ.vj5q6F9.wcXzIc/DXds3z1TJVkEjJxuzaYnyFy6', NULL, NULL, NULL, 'https://png.pngtree.com/png-vector/20250813/ourlarge/pngtree-smiling-male-doctor-in-white-coat-portrait-against-light-gray-background-png-image_16654591.png', 'Nam', 2, 1, '2025-11-26 05:31:35', '2025-11-26 05:31:35', NULL),
(9, 'Dr. Phan Vân Tường', 'doctor3@gmail.com', '$2y$12$8N1Vh14KYGzw3e29Ueyzsu.kcvn2MqBfKwtXRArI2cw4/gdWiVKxi', NULL, NULL, NULL, 'https://png.pngtree.com/png-vector/20250105/ourlarge/pngtree-portrait-studio-isolated-cutout-closeup-shot-of-asian-professional-successful-female-png-image_15063485.png', 'Nữ', 2, 1, '2025-11-26 05:31:35', '2025-11-26 05:31:35', NULL),
(10, 'Dr. Nguyễn An', 'doctor4@gmail.com', '$2y$12$UbfFeA5GD1fwsMg.iOsCM.i6x0JDnPqaBpP.xThEUM37W2nJkdYru', NULL, NULL, NULL, 'https://media.istockphoto.com/id/2207618864/photo/portrait-of-male-medical-professional-in-lab-coat-with-hands-in-pockets-standing-on-white.jpg?s=612x612&w=0&k=20&c=oIxLcIbVlAN0ZLRQ9fGaQoTNOUX19TcEQHiNmo6D_gY=', 'Nam', 2, 1, '2025-11-28 06:24:00', '2025-11-28 06:24:00', NULL),
(11, 'Dr. Lê Bảo', 'doctor5@gmail.com', '$2y$12$mNgzmABZbr94CIq3wr6rze6qH8EbXM5PYVd0IbZs.kSAumeWP6MUu', NULL, NULL, NULL, 'https://media.istockphoto.com/id/1418258989/photo/professional-doctor-in-white-uniform-posing-on-camera-with-clipboard.jpg?s=612x612&w=0&k=20&c=jgyohIi6aFuX6kUdatVyg0ETzUlc-U4i-HGb-JMwFxs=', 'Nam', 2, 1, '2025-11-28 06:24:01', '2025-11-28 06:24:01', NULL),
(12, 'Dr. Trần Cường', 'doctor6@gmail.com', '$2y$12$eGmZdyxjG.Arblabn5Xtl.qFi6eIE6Qf81xeGFKJLaIHjnlHklp2a', NULL, NULL, NULL, 'https://media.istockphoto.com/id/1635982957/photo/happy-asian-man-doctor-and-arms-crossed-in-confidence-of-healthcare-consultant-at-the-office.jpg?s=612x612&w=0&k=20&c=h6afWku3v9XVNVtZ86zYn0nIH8lOw-3v4rdIIt_VwA8=', 'Nam', 2, 1, '2025-11-28 06:24:01', '2025-11-28 06:24:01', NULL),
(13, 'Dr. Phạm Di', 'doctor7@gmail.com', '$2y$12$ieLebNJ/2gnLjHh0uBqfiuCSv8J3WhdiYZCTOokL4NYcdzhTQgzOS', NULL, NULL, NULL, 'https://www.shutterstock.com/image-photo/portrait-caucasian-female-doctor-standing-600nw-2557673827.jpg', 'Nam', 2, 1, '2025-11-28 06:24:01', '2025-11-28 06:24:01', NULL),
(14, 'Dr. Nguyễn Hạnh', 'doctor8@gmail.com', '$2y$12$hu6icHVTQWet84B.yCNYhulP9ikon3zol.3a5K7iN1grooQCiCBMq', NULL, NULL, NULL, 'https://www.shutterstock.com/image-photo/portrait-happy-asian-female-doctor-260nw-2590900925.jpg', 'Nam', 2, 1, '2025-11-28 06:24:01', '2025-11-28 06:24:01', NULL),
(24, 'vanced', 'vancedloile@gmail.com', '$2y$12$7sVqrl4xC8A1zJs74Hx.4efW7T9myKrMWoPQ4yGyFRPx7.ji8jL5W', 'U23MzToALQFrSYQYy5rmiSuuJm3Pj1RWN2NoRI1IfoZPS8UQrR1ZQq0F3KRu', NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocIPAc1RvoLkMjVORhyHjCyjT0taDE7cujcWnOJQQKx9vaH1c9E=s96-c', 'Nam', 3, 1, '2025-12-02 10:27:27', '2025-12-02 10:27:27', NULL);

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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD KEY `password_reset_tokens_email_index` (`email`);

--
-- Chỉ mục cho bảng `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `doctor_users`
--
ALTER TABLE `doctor_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `extra_infos`
--
ALTER TABLE `extra_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `supporterlogs`
--
ALTER TABLE `supporterlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
