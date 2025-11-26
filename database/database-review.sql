CREATE DATABASE IF NOT EXISTS `healthbooker` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `healthbooker`;

-- Bảng roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  `deletedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng users (tài khoản chung: admin, bác sĩ, bệnh nhân)
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL UNIQUE,
  `password` VARCHAR(255) DEFAULT NULL,
  `address` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `avatar` VARCHAR(255) DEFAULT NULL,
  `gender` VARCHAR(255) DEFAULT 'male',
  `roleId` INT UNSIGNED NOT NULL,
  `isActive` TINYINT(1) DEFAULT 1,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  `deletedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`roleId`) REFERENCES `roles`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng specializations (chuyên khoa)
DROP TABLE IF EXISTS `specializations`;
CREATE TABLE `specializations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `image` VARCHAR(255) DEFAULT NULL,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  `deletedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng clinics (phòng khám)
DROP TABLE IF EXISTS `clinics`;
CREATE TABLE `clinics` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `introductionHTML` TEXT DEFAULT NULL,
  `introductionMarkdown` TEXT DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `image` VARCHAR(255) DEFAULT NULL,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  `deletedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng doctor_users (bác sĩ)
DROP TABLE IF EXISTS `doctor_users`;
CREATE TABLE `doctor_users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctorId` INT UNSIGNED NOT NULL, 
  `clinicId` INT UNSIGNED NULL,
  `specializationId` INT UNSIGNED NOT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `photo` VARCHAR(255) DEFAULT NULL,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  `deletedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`doctorId`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`specializationId`) REFERENCES `specializations`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`clinicId`) REFERENCES `clinics`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng schedules (lịch khám của bác sĩ)
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctorId` INT UNSIGNED NOT NULL,
  `date` DATE NOT NULL,
  `time` TIME DEFAULT NULL,
  `maxBooking` INT DEFAULT NULL,
  `sumBooking` INT DEFAULT 0,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  `deletedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`doctorId`) REFERENCES `doctor_users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng statuses (trạng thái lịch hẹn)
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE IF NOT EXISTS `statuses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Bảng patients (thông tin đặt lịch khám của bệnh nhân)
DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctorId` INT UNSIGNED NOT NULL,
  `statusId` INT UNSIGNED NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dateBooking` DATE DEFAULT NULL,
  `timeBooking` TIME DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `isSentForms` tinyint(1) NOT NULL DEFAULT 0,
  `isTakeCare` tinyint(1) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`doctorId`) REFERENCES `doctor_users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`statusId`) REFERENCES `statuses`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Bảng feedbacks (đánh giá bác sĩ)
DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE `feedbacks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctorId` INT UNSIGNED NOT NULL,
  `patientId` INT UNSIGNED DEFAULT NULL,
  `timeBooking` TIME DEFAULT NULL,
  `dateBooking` DATE DEFAULT NULL,
  `content` TEXT DEFAULT NULL,
  `rating` TINYINT DEFAULT 5,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME DEFAULT NULL,
  `deletedAt` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`doctorId`) REFERENCES `doctor_users`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`patientId`) REFERENCES `patients`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng sessions (phiên làm việc)
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `sid` varchar(36) NOT NULL,
  `expires` datetime DEFAULT NULL,
  `data` text DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Bảng places (tỉnh/thành phố để lọc bác sĩ)
DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--- Bảng posts (bài viết về sức khỏe)
DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `contentMarkdown` text DEFAULT NULL,
  `contentHTML` text DEFAULT NULL,
  `forDoctorId` INT UNSIGNED DEFAULT NULL,
  `forSpecializationId` INT UNSIGNED DEFAULT NULL,
  `forClinicId` INT UNSIGNED DEFAULT NULL,
  `writerId` INT UNSIGNED NOT NULL,
  `confirmByDoctor` tinyint(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`forDoctorId`) REFERENCES `doctor_users`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`forSpecializationId`) REFERENCES `specializations`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`forClinicId`) REFERENCES `clinics`(`id`) ON DELETE SET NULL,
  FOREIGN KEY (`writerId`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Bảng extra_infos (thông tin bổ sung lưu lịch sử bệnh lý)
DROP TABLE IF EXISTS `extra_infos`;
CREATE TABLE IF NOT EXISTS `extra_infos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `patientId` INT UNSIGNED DEFAULT NULL,
  `historyBreath` text DEFAULT NULL,
  `placeId` INT UNSIGNED DEFAULT NULL,
  `oldForms` text DEFAULT NULL,
  `sendForms` text DEFAULT NULL,
  `moreInfo` text DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`patientId`) REFERENCES `patients`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`placeId`) REFERENCES `places`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Bảng supporterlogs (nhật ký hỗ trợ bệnh nhân)
DROP TABLE IF EXISTS `supporterlogs`;
CREATE TABLE IF NOT EXISTS `supporterlogs` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `patientId` INT UNSIGNED DEFAULT NULL,
  `supporterId` INT UNSIGNED DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`patientId`) REFERENCES patients(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`supporterId`) REFERENCES users(`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
