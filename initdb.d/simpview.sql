-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 17, 2024 lúc 02:10 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `simpview`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Công nghệ', '2024-01-20 00:02:24', '2024-01-20 00:02:24', 'admin', 'admin'),
(2, 'Âm nhạc', '2024-01-20 00:02:24', '2024-01-20 00:02:24', 'admin', 'admin'),
(3, 'Giáo dục', '2024-01-20 00:03:51', '2024-01-20 00:03:51', 'admin', 'admin'),
(4, 'Du lịch', '2024-01-20 00:03:51', '2024-01-20 00:03:51', 'admin', 'admin'),
(5, 'Ẩm thực', '2024-01-20 00:04:50', '2024-01-20 00:04:50', 'admin', 'admin'),
(6, 'Thể thao', '2024-01-20 00:04:50', '2024-01-20 00:04:50', 'admin', 'admin'),
(7, 'Khoa học', '2024-01-20 00:05:37', '2024-01-20 00:05:37', 'admin', 'admin'),
(8, 'Nghệ thuật', '2024-01-20 00:05:37', '2024-01-20 00:05:37', 'admin', 'admin'),
(9, 'Điện ảnh', '2024-01-20 00:06:23', '2024-01-20 00:06:23', 'admin', 'admin'),
(10, 'Thời trang', '2024-01-20 00:06:23', '2024-01-20 00:06:23', 'admin', 'admin'),
(11, 'Làm đẹp', '2024-01-20 00:06:57', '2024-01-20 00:06:57', 'admin', 'admin'),
(12, 'Hài hước', '2024-01-20 00:06:57', '2024-01-20 00:06:57', 'admin', 'admin'),
(13, 'Xe cộ', '2024-01-20 00:07:51', '2024-01-20 00:07:51', 'admin', 'admin'),
(14, 'Chính trị - Xã hội', '2024-01-20 00:07:51', '2024-01-20 00:07:51', 'admin', 'admin'),
(15, 'Kinh doanh', '2024-01-20 00:08:39', '2024-01-20 00:08:39', 'admin', 'admin'),
(16, 'Giải trí', '2024-01-20 00:08:39', '2024-01-20 00:08:39', 'admin', 'admin'),
(17, 'Môi trường', '2024-01-20 00:09:11', '2024-01-20 00:09:11', 'admin', 'admin'),
(18, 'Sức khỏe', '2024-01-20 00:09:11', '2024-01-20 00:09:11', 'admin', 'admin'),
(19, 'Thiên nhiên', '2024-01-20 00:09:50', '2024-01-20 00:09:50', 'admin', 'admin'),
(20, 'Thiếu nhi', '2024-01-20 00:09:50', '2024-01-20 00:09:50', 'admin', 'admin'),
(21, 'Học tập', '2024-02-22 03:55:23', '2024-02-22 03:55:23', 'admin', 'admin'),
(23, 'Động vật', '2024-02-27 10:27:04', '2024-02-27 10:27:04', 'admin', 'admin'),
(24, 'Hoạt hình', '2024-03-14 21:11:00', '2024-03-14 21:11:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorylist`
--

CREATE TABLE `categorylist` (
  `categorylist_id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorylist`
--

INSERT INTO `categorylist` (`categorylist_id`, `user_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 7, '(´▽`ʃ♡ƪ)', '2024-02-27 00:59:43', '2024-02-27 00:59:43', NULL, NULL),
(15, 7, 'Nhạc chill', '2024-02-27 01:06:46', '2024-02-27 01:06:46', NULL, NULL),
(16, 7, 'Review phim', '2024-02-27 01:06:51', '2024-02-27 01:06:51', NULL, NULL),
(17, 7, 'Review truyện tranh', '2024-02-27 01:06:55', '2024-02-27 01:06:55', NULL, NULL),
(18, 8, 'Nhạc Hàn', '2024-02-27 09:55:30', '2024-02-27 09:55:30', NULL, NULL),
(19, 8, 'Nhạc Việt', '2024-02-27 09:56:18', '2024-02-27 09:56:18', NULL, NULL),
(20, 9, 'abc', '2024-03-11 14:14:22', '2024-03-11 14:14:22', NULL, NULL),
(21, 9, '123', '2024-03-11 14:14:28', '2024-03-11 14:14:28', NULL, NULL),
(22, 18, 'Tom & Jerry', '2024-03-14 20:58:52', '2024-03-14 20:58:52', NULL, NULL),
(23, 7, 'K-Pop', '2024-03-14 20:58:59', '2024-03-14 20:58:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `cmt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `video_id`, `cmt`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(6, 8, 2, 'Trường ngầu ghê', '2024-02-27 09:59:50', '2024-02-27 09:59:50', NULL, NULL),
(7, 8, 2, 'thật may mắn khi là một KMA-er', '2024-02-27 10:00:10', '2024-02-27 10:00:10', NULL, NULL),
(8, 8, 1, 'trường tui nè hihi', '2024-02-27 10:00:39', '2024-02-27 10:00:39', NULL, NULL),
(9, 9, 17, 'Bài hát này thực sự làm tôi cảm thấy thư giãn và yên bình.', '2024-02-27 10:06:21', '2024-02-27 10:06:21', NULL, NULL),
(10, 9, 4, 'anh ấy thật là tài năng', '2024-02-27 10:07:20', '2024-02-27 10:07:20', NULL, NULL),
(11, 9, 14, 'Bài hát này thực sự làm tôi cảm thấy nhẹ nhàng, giúp tôi lắng nghe và suy ngẫm về những cảm xúc riêng của mình', '2024-02-27 10:07:51', '2024-02-27 10:07:51', NULL, NULL),
(12, 10, 1, 'mình học ở miền Nam nè', '2024-02-27 10:24:27', '2024-02-27 10:24:27', NULL, NULL),
(13, 10, 2, 'sd rồi', '2024-02-27 10:24:38', '2024-02-27 10:24:38', NULL, NULL),
(15, 10, 14, 'Đôi khi chỉ cần một ca khúc như thế này để tâm hồn được xoa dịu và đắm chìm vào không gian riêng của mình', '2024-02-27 10:25:13', '2024-02-27 10:25:13', NULL, NULL),
(17, 18, 22, 'ngầu quá', '2024-03-14 21:01:45', '2024-03-14 21:01:45', NULL, NULL),
(18, 18, 16, 'tôi rất mong chờ vào sản phẩm tiếp theo của bạn', '2024-03-14 21:02:17', '2024-03-14 21:02:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist`
--

CREATE TABLE `playlist` (
  `list_id` int NOT NULL,
  `video_id` int NOT NULL,
  `categorylist_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `playlist`
--

INSERT INTO `playlist` (`list_id`, `video_id`, `categorylist_id`, `user_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(11, 17, 19, 8, '2024-02-27 09:56:37', '2024-02-27 09:56:37', NULL, NULL),
(14, 14, 18, 8, '2024-02-27 09:57:01', '2024-02-27 09:57:01', NULL, NULL),
(15, 15, 18, 8, '2024-02-27 09:57:05', '2024-02-27 09:57:05', NULL, NULL),
(16, 16, 19, 8, '2024-02-27 09:57:17', '2024-02-27 09:57:17', NULL, NULL),
(17, 22, 16, 7, '2024-02-27 13:56:22', '2024-02-27 13:56:22', NULL, NULL),
(19, 36, 23, 7, '2024-03-14 22:45:36', '2024-03-14 22:45:36', NULL, NULL),
(20, 33, 23, 7, '2024-03-14 22:45:48', '2024-03-14 22:45:48', NULL, NULL),
(21, 36, 1, 7, '2024-03-14 22:45:53', '2024-03-14 22:45:53', NULL, NULL),
(22, 36, 23, 7, '2024-03-14 22:46:02', '2024-03-14 22:46:02', NULL, NULL),
(23, 34, 21, 9, '2024-03-14 23:05:12', '2024-03-14 23:05:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reset_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_token_expiration` datetime DEFAULT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `privacy` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `reset_token`, `reset_token_expiration`, `profile_pic`, `img`, `privacy`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(7, 'Ly', 'Hoàng', 'camly', 'CT06N0134@actvn.edu.vn', 'ac0502ba329e3bef85ec368d132342ed', NULL, NULL, '1708967862_bia_chung.jpg', '1708967893_avt_134.jpg', 1, '2024-02-27 00:10:16', '2024-02-27 00:10:16', NULL, NULL),
(8, 'Hạnh', 'Nhi', 'hanhnhi', 'CT06N0143@actvn.edu.vn', '63e38559339dcf31b42931a2b766f40b', NULL, NULL, '1709002333_bia_chung.jpg', '1709002340_avt_143.jpg', 1, '2024-02-27 08:46:19', '2024-02-27 08:46:19', NULL, NULL),
(9, 'Đạt', 'Vũ', 'tiendat', 'CT06N0110@actvn.edu.vn', '5ae2d9e0c52ab285b8da99874acd65f5', NULL, NULL, '1709003118_bia_chung.jpg', '1709003125_avt_110.png', 1, '2024-02-27 10:04:46', '2024-02-27 10:04:46', NULL, NULL),
(10, 'Phát', 'Huỳnh', 'tanphat', 'CT06N0145@actvn.edu.vn', '335c40eafe26264a064ee40e95f7f25d', '843ff6413b3b71dfad4416a5b19d733f', '2024-03-16 05:14:55', '1709004233_bia_chung.jpg', '1709004240_avt_145.png', 1, '2024-02-27 10:23:20', '2024-02-27 10:23:20', NULL, NULL),
(18, 'Quyền', 'Nguyễn', 'ducquyen', 'CT06N0151@actvn.edu.vn', '7b92a293d962d62100207ec0c04a4f88', NULL, NULL, '1710424688_bia_chung.jpg', '1710424694_avt_151.png', 1, '2024-03-14 20:57:45', '2024-03-14 20:57:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `usersrp`
--

CREATE TABLE `usersrp` (
  `usersrp_id` int NOT NULL,
  `user_id` int NOT NULL,
  `privacy` int NOT NULL DEFAULT '1',
  `report_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `usersrp`
--

INSERT INTO `usersrp` (`usersrp_id`, `user_id`, `privacy`, `report_reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(7, 8, 1, 'nhỏ này trẩu', '2024-03-14 16:39:39', '2024-03-14 16:39:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `video_id` int NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `privacy` int NOT NULL,
  `filepath` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`video_id`, `user_id`, `category_id`, `title`, `content`, `privacy`, `filepath`, `views`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 7, 21, 'Học Viện Kỹ Thuật Mật Mã', 'ACTVN - Học Viện Kỹ Thuật Mật Mã là một trong những trường đại học đào tạo ngành An Toàn Thông Tin tốt nhất Việt Nam. Sinh viên của trường đã nhiều lần đạt thành tích nổi bật, đáng nể trong ngành bảo mật nói chung. Ngoài đào tạo các ngành CNTT, trường còn rất mạnh về khoản đào tạo ra các \"VĐV điền kinh chuyên nghiệp\" theo đúng nghĩa đen. #kma #attt #actvn #kmp #A90 #daihoc #kythuatmatma', 1, 'KMA_Nam.mp4', 3, '2024-02-27 00:25:59', '2024-02-27 00:25:59', NULL, NULL),
(2, 10, 21, 'Review về trường KMA - Học Viện Kỹ Thuật Mật Mã', 'ACTVN - Học Viện Kỹ Thuật Mật Mã là một trong những trường đại học đào tạo ngành An Toàn Thông Tin tốt nhất Việt Nam. Sinh viên của trường đã nhiều lần đạt thành tích nổi bật, đáng nể trong ngành bảo mật nói chung. Ngoài đào tạo các ngành CNTT, trường còn rất mạnh về khoản đào tạo ra các \"VĐV điền kinh chuyên nghiệp\" theo đúng nghĩa đen. #kma #attt #actvn #kmp #A90 #daihoc #kythuatmatma', 1, 'KMA_Bac.mp4', 3, '2024-02-27 00:27:29', '2024-02-27 00:27:29', NULL, NULL),
(4, 7, 2, 'Alexander Rybak - \"Europe\'s Skies\" ', ' #alexanderrybak \"Europe\'s Skies\" on iTunes: http://itunes.apple.com/no/album/no-b...  Music video premiere of \"Europe\'s Skies\". I hope you\'ll like it! :) ', 1, 'Alexander%20Rybak%20-%20-Europe\'s%20Skies-%20(Official%20Music%20Video).mp4', 5, '2024-02-27 00:45:08', '2024-02-27 00:45:08', NULL, NULL),
(14, 8, 2, 'DEAN - DIE 4 YOU', 'BUY / STREAM “DIE 4 YOU\" here: DIE4YOU.lnk.to/vr99KBkb', 1, 'DEAN%20-%20DIE%204%20YOU.mp4', 7, '2024-02-27 08:51:10', '2024-02-27 08:51:10', NULL, NULL),
(15, 8, 2, 'HYBS - Tip Toe (Official Video)', 'Produced by HYBS  Music by HYBS Lyrics by HYBS Arranged by HYBS Bass by Akkaraphon Suwannamake Mixed & Mastered by Henry Watkins', 1, 'HYBS%20-%20Tip%20Toe%20(Official%20Video).mp4', 0, '2024-02-27 08:53:24', '2024-02-27 08:53:24', NULL, NULL),
(16, 9, 2, 'ĐỢI - 52Hz (prod. RIO) | Official Lyric Video', 'Xin chào những người nghe tuyệt vời của 52Hz, Cảm ơn các bạn rất nhiều vì đã luôn yêu thương và ủng hộ mình cũng như âm nhạc mà mình đã và đang tạo ra. Để tri ân tình cảm đẹp đẽ này, mình muốn trân trọng gửi tới mọi người một trong những bài hát hay nhất mình từng được viết - \"ĐỢI\" không chỉ là một lá thư mà còn là một thước phim buồn về người con gái đã dành cả cuộc đời của mình để chờ đợi người yêu quay trở về. Bài hát không phải là nhạc Giáng Sinh mà chỉ là một bản tình ca mùa đông rất buồn. Mình mong rằng, mỗi khi bật bài nhạc lên, mọi người sẽ cảm nhận được sự buốt giá của cái \"mùa buồn nhất trong năm\" này, nhưng đồng thời cũng được sưởi ấm bởi tình yêu thuần khiết và kiên cường mà \"ĐỢI\" mang lại.  Lời cuối, mình sẽ không bao giờ hoàn thành được thứ âm nhạc đẹp đẽ này nếu thiếu đi những người cộng sự luôn ở bên mình trong suốt một năm nay. Cảm ơn mọi người nhiều lắm. Chúc mọi người một Giáng Sinh an lành và môt năm mới hạnh phúc!', 1, 'ĐỢI%20-%2052Hz%20(prod.%20RIO)%20-%20Official%20Lyric%20Video.mp4', 12, '2024-02-27 09:03:25', '2024-02-27 09:03:25', NULL, NULL),
(17, 8, 2, 'Em Ellata - Ngày ấy (Yesterday)', 'Ngày ấy (Yesterday) đã có mặt trên mọi nền tảng nghe nhạc: https://linktr.ee/emellata', 1, 'Em%20Ellata%20-%20Ngày%20ấy%20(Yesterday).mp4', 5, '2024-02-27 09:54:09', '2024-02-27 09:54:09', NULL, NULL),
(18, 10, 23, 'Thư giãn cùng boss cưng đáng yêu', 'Tik tok động vật, hài hước, vui nhộn - Tik tok Trung Quốc', 1, 'Tik%20tok%20Trung%20Quốc%20-%20Tik%20tok%20động%20vật%20-%20Thư%20giãn%20cùng%20boss%20cưng%20đáng%20yêu.mp4', 2, '2024-02-27 10:26:31', '2024-02-27 10:26:31', NULL, NULL),
(19, 7, 23, 'PHẢN ỨNG CỦA MÈO LẦN ĐẦU GẶP CHÓ', 'Các bạn cũng như mình luôn tự đặt câu hỏi không biết liệu các bé mèo lần đầu gặp chó sẽ phản ứng như thế nào đúng không?', 1, 'PHẢN%20ỨNG%20CỦA%20MÈO%20LẦN%20ĐẦU%20GẶP%20CHÓ.mp4', 3, '2024-02-27 12:31:50', '2024-02-27 12:31:50', NULL, NULL),
(20, 10, 23, 'Những chú mèo dễ thương, đắt tiền', 'Review trải nghiệm độc lạ với những chú Mèo dễ thương cực kỳ đắt tiền || Review Giải Trí Đời Sống', 1, 'Review%20trải%20nghiệm%20độc%20lạ%20với%20những%20chú%20Mèo%20dễ%20thương%20cực%20kỳ%20đắt%20tiền%20--%20Review%20Giải%20Trí%20Đời%20Sống.mp4', 7, '2024-02-27 12:33:10', '2024-02-27 12:33:10', NULL, NULL),
(21, 10, 2, 'Mitski - My Love Mine All Mine[Lyric]', '“My Love Mine All Mine” from the album ‘The Land Is Inhospitable and So Are We’ by Mitski. Listen + order:  https://Mitski.lnk.to/TLIIASAW', 1, 'Mitski%20-%20My%20Love%20Mine%20All%20Mine%5bLyric%5d.mp4', 16, '2024-02-27 13:45:29', '2024-02-27 13:45:29', NULL, NULL),
(22, 8, 9, 'Sát thủ nhân tạo', 'Sát Thủ Nhân Tạo là bộ phim hành động li kì kể về Koo Ja Yoon – một cô bé được nuôi dưỡng trong một tổ chức đáng sợ - nơi diễn ra các cuộc thí nghiệm y học được thực hiện trên chính cơ thể con người nhằm biến họ thành những cỗ máy giết người. Sau khi chạy trốn khỏi tổ chức, Ja Yoon bị mất trí nhớ và được một cặp vợ chồng già nhận nuôi. 10 năm sau, khi đã trở thành một nữ sinh trung học, Ja Yoon đăng ký tham gia một cuộc thi âm nhạc với mong muốn giúp gia đình vượt qua khó khăn tài chính. Nhưng cô không ngờ rằng, ngay từ khi hình ảnh của mình xuất hiện trên truyền hình, cuộc sống của cô bị đảo lộn hoàn toàn bởi sự truy đuổi của những kẻ lạ mặt.', 1, 'Sát%20Thủ%20IQ%20=%20300%20Đáng%20Sợ%20thế%20nào%20-%20review%20phim%20Sát%20Thủ%20Nhân%20Tạo.mp4', 27, '2024-02-27 13:47:00', '2024-02-27 13:47:00', NULL, NULL),
(24, 18, 12, 'Gumball | Being Larry For 5 Minutes | Cartoon Network', 'Gumball, the amusing blue cat with a giant head and his best buddy Darwin, a pet goldfish who sprouted legs, step up the hilarity and hijinks in Cartoon Network\'s comedy series, The Amazing World of Gumball.', 1, 'Gumball%20-%20Being%20Larry%20For%205%20Minutes%20-%20Cartoon%20Network.mp4', 0, '2024-03-14 21:00:05', '2024-03-14 21:00:05', NULL, NULL),
(25, 8, 12, 'Bỗng dưng trúng số', 'Kể về hành trình “hạ cánh” đầy bất ổn của một tờ vé số bay từ Hàn Quốc qua Triều Tiên. Từ đó, câu chuyện hài hước bậc nhất màn ảnh được mở ra khi những người lính của hai bên phải bước vào một cuộc đàm phán vô tiền khoáng hậu để quyết định số phận của giải độc đắc hàng triệu đô.', 1, 'tờ%20Vé%20Số%20Bất%20Ổn%20và%20Đội%20quân%20nhân%20Cồng%20Kềnh%20-%20review%20phim%20Bỗng%20Dưng%20Trúng%20Số.mp4', 1, '2024-03-14 21:04:04', '2024-03-14 21:04:04', NULL, NULL),
(26, 18, 2, '[MV] 하이라이트(HIGHLIGHT) - BODY', 'HIGHLIGHT THE 5TH MINI ALBUM [Switch On] TITLE SONG `BODY` MV 2024. 03. 11. 18:00', 1, '%5bMV%5d%20하이라이트(HIGHLIGHT)%20-%20BODY.mp4', 1, '2024-03-14 21:05:26', '2024-03-14 21:05:26', NULL, NULL),
(27, 8, 9, 'Chuyện kinh dị Nhật Bản', '(っ °Д °;)っ', 1, 'Những%20Câu%20Chuyện%20Kinh%20Dị%20Chỉ%20Có%20Ở%20Nhật%20Bản%20-QUẠC%20REVIEW-.mp4', 5, '2024-03-14 21:16:19', '2024-03-14 21:16:19', NULL, NULL),
(28, 7, 2, '★ 〈City of Stars〉♪ 바라던 바다', '이동욱x이수현이 함께 부르는 이 순간이 영화..★ 〈City of Stars〉♪', 1, '이동욱x이수현이%20함께%20부르는%20이%20순간이%20영화..★%20〈City%20of%20Stars〉♪%20바라던%20바다%20(sea%20of%20hope)%209회%20-%20JTBC%20210824%20방송.mp4', 0, '2024-03-14 21:25:02', '2024-03-14 21:25:02', NULL, NULL),
(29, 8, 23, 'Động vật dễ thương', '（づ￣3￣）づ╭❤️～', 1, 'Loai%20Đông%20Vât%20Siêu%20Dê%20Thương%20Ma%20Con%20Ngươi%20Đa%20Tư%20Chôi%20-%20Review%20Giải%20Trí%20Đời%20Sống.mp4', 0, '2024-03-14 21:26:01', '2024-03-14 21:26:01', NULL, NULL),
(30, 8, 5, 'Xúc xích phô mai kéo sợi', 'Một món đồ ăn đường phố phổ biến', 1, 'Món%20Xúc%20Xích%20Phô%20Mai%20Kéo%20Sợi%20Xứng%20Danh%20Vua%20Của%20Các%20Loại%20Đồ%20Ăn%20Nhanh%20-%20Review%20Con%20Người%20và%20Cuộc%20Sống.mp4', 0, '2024-03-14 21:26:37', '2024-03-14 21:26:37', NULL, NULL),
(31, 9, 24, 'Tom và Jerry - Trap Happy, Viet sub', 'Due to the YouTube policy, various contents of this channel are no longer available on YouTube. By clicking on the link below, you can enjoy about 4,000 contents, including videos that were previously serviced in this channel.(10 language subtitles Support)', 1, 'Tom%20và%20Jerry%20-%20Thòng%20lọng%20cầm%20hạnh%20phúc(Trap%20Happy,%20Viet%20sub).mp4', 0, '2024-03-14 21:27:56', '2024-03-14 21:27:56', NULL, NULL),
(32, 8, 24, 'Tom và Jerry - Polka Dot Puss, Viet sub', 'Due to the YouTube policy, various contents of this channel are no longer available on YouTube. By clicking on the link below, you can enjoy about 4,000 contents, including videos that were previously serviced in this channel.(10 language subtitles Support)', 1, 'Tom%20và%20Jerry%20-%20Con%20mèo%20họa%20tiết%20hình%20giột%20nước(Polka%20Dot%20Puss,%20Viet%20sub).mp4', 0, '2024-03-14 21:28:48', '2024-03-14 21:28:48', NULL, NULL),
(33, 9, 2, 'BTS (방탄소년단) \'Dynamite\' Official MV', 'BTS (방탄소년단) \'Dynamite\' Official MV', 1, 'BTS%20(방탄소년단)%20\'Dynamite\'%20Official%20MV.mp4', 3, '2024-03-14 21:56:33', '2024-03-14 21:56:33', NULL, NULL),
(34, 7, 2, '[M/V] BOL4(볼빨간사춘기) - Some(썸 탈꺼야)', 'BOL4\'s Mini Album [Red Diary Page.1]', 1, '%5bM-V%5d%20BOL4(볼빨간사춘기)%20-%20Some(썸%20탈꺼야).mp4', 10, '2024-03-14 21:57:46', '2024-03-14 21:57:46', NULL, NULL),
(35, 8, 2, 'CHI PU (芝芙) | HOA DƯỚI MẶT TRỜI (Official Music Video)', 'Mỗi chúng ta đều là bông hoa rực rỡ toả sáng dưới ánh mặt trời của chính mình. \"Hoa Dưới Mặt Trời\" là món quà mà Chi mong rằng có thể vỗ về bạn, cùng bạn vượt qua những ngày tháng chông chênh của cuộc đời. \"Vì dù sao cây vẫn nở hoa, mặt trời vẫn mọc” và mong rằng mọi người đều sẽ được hạnh phúc\" ❤️', 1, 'CHI%20PU%20(芝芙)%20-%20HOA%20DƯỚI%20MẶT%20TRỜI%20(Official%20Music%20Video).mp4', 1, '2024-03-14 21:58:43', '2024-03-14 21:58:43', NULL, NULL),
(36, 10, 2, 'SEVENTEEN (세븐틴) \'손오공\' Official MV', 'SEVENTEEN (세븐틴) \'손오공\' Official MV', 1, 'SEVENTEEN%20(세븐틴)%20\'손오공\'%20Official%20MV.mp4', 12, '2024-03-14 21:59:14', '2024-03-14 21:59:14', NULL, NULL),
(43, 10, 1, 'Intro công nghệ', 'Công nghệ thật toẹt zời', 1, '1710640588_Video Dành Cho Công Nghệ.mp4', 0, '2024-03-17 08:56:28', '2024-03-17 08:56:28', NULL, NULL),
(44, 10, 3, 'Người lao công', 'Giáo dục', 1, '1710640975_Người Lao Công (giáo dục).mp4', 0, '2024-03-17 09:02:55', '2024-03-17 09:02:55', NULL, NULL),
(45, 10, 4, 'Du lịch Sapa', 'Đường lên tiên cảnh', 1, '1710641000_DU LỊCH SAPA -  LÊN ĐỈNH FANSIPAN NGẮM MÂY CỰC ĐẸP.mp4', 0, '2024-03-17 09:03:20', '2024-03-17 09:03:20', NULL, NULL),
(46, 8, 6, 'Chung kết bơi tự do', 'Thể thao', 1, '1710641038_Bơi tự do 100m nam chung kết.mp4', 0, '2024-03-17 09:03:58', '2024-03-17 09:03:58', NULL, NULL),
(47, 8, 7, 'Trí tuệ nhân tạo', 'Khoa học', 1, '1710641060_Trí Tuệ Nhân Tạo Vận Hành Như Thế Nào.mp4', 0, '2024-03-17 09:04:20', '2024-03-17 09:04:20', NULL, NULL),
(48, 18, 8, 'Gốm Bát Tràng', 'Nghệ thuật', 1, '1710641176_Phóng sự quy trình làm Gốm Bát Tràng.mp4', 0, '2024-03-17 09:06:16', '2024-03-17 09:06:16', NULL, NULL),
(49, 18, 10, 'Thời trang đường phố Trung Quốc', 'Thời Trang', 1, '1710641196_Style-Outfit Của Giới Trẻ Trung Quốc 2023.mp4', 0, '2024-03-17 09:06:36', '2024-03-17 09:06:36', NULL, NULL),
(50, 18, 13, 'VinFast - Dẫn lối tiên phong', 'Xe', 1, '1710641224_VinFast - Dẫn lối tiên phong.mp4', 0, '2024-03-17 09:07:04', '2024-03-17 09:07:04', NULL, NULL),
(51, 9, 14, 'Chính trị xã hội', 'Chính trị xã hội', 1, '1710641252_Chủ nghĩa xã hội không bao giờ lỗi thời.mp4', 0, '2024-03-17 09:07:32', '2024-03-17 09:07:32', NULL, NULL),
(52, 9, 15, 'Khởi nghiệp từ vốn 500 đồng', 'Kinh doanh', 1, '1710641275_Chàng trai khởi nghiệp với ý tưởng 500 đồng lẻ, doanh thu 300 triệu.mp4', 0, '2024-03-17 09:07:55', '2024-03-17 09:07:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videosrp`
--

CREATE TABLE `videosrp` (
  `videosrp_id` int NOT NULL,
  `video_id` int NOT NULL,
  `privacy` int NOT NULL DEFAULT '1',
  `report_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videosrp`
--

INSERT INTO `videosrp` (`videosrp_id`, `video_id`, `privacy`, `report_reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 22, 1, 'máu me quá', '2024-03-14 20:23:27', '2024-03-14 20:23:27', NULL, NULL),
(9, 2, 1, 'không đúng sự thật', '2024-03-14 20:23:43', '2024-03-14 20:23:43', NULL, NULL),
(10, 1, 1, 'mẫu quá chói', '2024-03-14 20:23:54', '2024-03-14 20:23:54', NULL, NULL),
(11, 27, 1, 'kinh dị quá', '2024-03-14 22:46:38', '2024-03-14 22:46:38', NULL, NULL),
(12, 34, 1, 'hmm', '2024-03-14 23:05:31', '2024-03-14 23:05:31', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `categorylist`
--
ALTER TABLE `categorylist`
  ADD PRIMARY KEY (`categorylist_id`),
  ADD KEY `fk_categorylist_users` (`user_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_comments_users` (`user_id`),
  ADD KEY `fk_comments_videos` (`video_id`);

--
-- Chỉ mục cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `fk_playlist_users` (`user_id`),
  ADD KEY `fk_playlist_categorylist` (`categorylist_id`),
  ADD KEY `fk_playlist_videos` (`video_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `usersrp`
--
ALTER TABLE `usersrp`
  ADD PRIMARY KEY (`usersrp_id`),
  ADD KEY `fk_usersrp_users` (`user_id`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `fk_videos_users` (`user_id`),
  ADD KEY `fk_videos_category` (`category_id`);

--
-- Chỉ mục cho bảng `videosrp`
--
ALTER TABLE `videosrp`
  ADD PRIMARY KEY (`videosrp_id`),
  ADD KEY `fk_videosrp_videos` (`video_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `categorylist`
--
ALTER TABLE `categorylist`
  MODIFY `categorylist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `playlist`
--
ALTER TABLE `playlist`
  MODIFY `list_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `usersrp`
--
ALTER TABLE `usersrp`
  MODIFY `usersrp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `videosrp`
--
ALTER TABLE `videosrp`
  MODIFY `videosrp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categorylist`
--
ALTER TABLE `categorylist`
  ADD CONSTRAINT `fk_categorylist_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_videos` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `fk_playlist_categorylist` FOREIGN KEY (`categorylist_id`) REFERENCES `categorylist` (`categorylist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_playlist_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_playlist_videos` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `usersrp`
--
ALTER TABLE `usersrp`
  ADD CONSTRAINT `fk_usersrp_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_videos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `videosrp`
--
ALTER TABLE `videosrp`
  ADD CONSTRAINT `fk_videosrp_videos` FOREIGN KEY (`video_id`) REFERENCES `videos` (`video_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
