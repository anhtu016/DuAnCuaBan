-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 08, 2024 lúc 05:44 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data_da1_fix`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ghi_chu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `total_price` int NOT NULL,
  `status_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `payment_id`, `name`, `email`, `phone`, `address`, `ghi_chu`, `total_price`, `status_id`, `user_id`) VALUES
(11, 1, 'demo', 'demo@gmail.com', '03146978520', 'hanoi', '', 2900000, 5, 0),
(12, 1, 'sample', 'sample@gmail.com', '014789632', 'hà nội', '', 2900000, 4, 0),
(13, 1, 'haha', 'haha@gmail.com', '01234567889', 'hanoi', '', 3900000, 3, 0),
(14, 1, 'haha', 'haha@gmail.com', '01234567889', 'hanoi', '', 1000000, 5, 1),
(15, 1, 'haha', 'haha@gmail.com', '01234567889', 'hanoi', '', 4900000, 5, 1),
(16, 1, 'haha', 'haha@gmail.com', '01234567889', 'hanoi', '', 3200000, 3, 1),
(17, 1, 'haha', 'haha@gmail.com', '01234567889', 'hanoi', '', 2900000, 5, 1),
(18, 1, 'haha', 'haha@gmail.com', '01234567889', 'hanoi', '', 2200000, 1, 1),
(19, 1, 'haha', 'haha@gmail.com', '01234567889', 'hanoi', '', 52000000, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_deltail_id` int NOT NULL,
  `bill_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL,
  `thanh_tien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`bill_deltail_id`, `bill_id`, `product_id`, `price`, `quantity`, `thanh_tien`) VALUES
(9, 11, 4, 2900000, 1, 2900000),
(10, 12, 4, 2900000, 1, 2900000),
(11, 13, 3, 1000000, 1, 1000000),
(12, 13, 4, 2900000, 1, 2900000),
(13, 14, 3, 1000000, 1, 1000000),
(14, 15, 4, 2900000, 1, 2900000),
(15, 15, 6, 2000000, 1, 2000000),
(16, 16, 3, 1000000, 1, 1000000),
(17, 16, 5, 2200000, 2, 2200000),
(18, 17, 4, 2900000, 1, 2900000),
(19, 18, 5, 2200000, 1, 2200000),
(20, 19, 6, 2000000, 1, 2000000),
(21, 19, 7, 50000000, 1, 50000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `payment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_name`) VALUES
(1, 'Chưa thanh toán'),
(2, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `product_img`, `product_price`, `product_description`, `product_quantity`) VALUES
(3, 'Quần dài', 1, 'quandai.jpeg', 1000000, 'Quần dài là loại trang phục che phủ từ hông đến mắt cá chân, được làm từ nhiều chất liệu như cotton, denim, hoặc kaki.', 100),
(4, 'Áo cộc tay', 2, 'aococtay.jpeg', 2900000, 'Áo cộc tay là loại áo có phần tay áo ngắn, thường được làm từ các chất liệu thoáng mát như cotton, linen hoặc polyester.', 100),
(5, 'áo thu đông', 2, 'aohaimau.png', 2200000, 'Áo thu đông là loại áo được thiết kế để giữ ấm trong những ngày thời tiết se lạnh hoặc đông. Chúng thường được làm từ các chất liệu như len, nỉ, thun hoặc vải dày, giúp chống lại gió lạnh và giữ nhiệt tốt.', 200),
(6, 'áo vest nam', 2, 'vestdep.jpg', 2000000, 'Áo vest là trang phục lịch sự, sang trọng, thường được thiết kế với dáng ôm vừa vặn và có nhiều kiểu dáng như vest một hàng cúc, hai hàng cúc. Áo vest thường được làm từ vải len, cotton hoặc vải tweed, phù hợp cho các sự kiện trang trọng.', 150),
(7, 'Sample', 2, '../uploads/1.2.02.3.21.030.124.01.10200011.jpg', 50000000, 'Sample', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id_category` int NOT NULL,
  `product_category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id_category`, `product_category_name`) VALUES
(1, 'Quần'),
(2, 'Áo'),
(3, 'Mũ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `status_id` int NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Chờ xử lí'),
(2, 'Chờ lấy hàng'),
(3, 'Đang giao hàng'),
(4, 'Đã giao hàng'),
(5, 'Đơn đàng đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` int NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_role`, `user_img`, `user_address`, `user_phone`) VALUES
(1, 'haha', '123456', 'haha@gmail.com', 1, 'logo.png', 'hanoi', '01234567889'),
(2, 'user1', '123456', 'user@gmail.com', 0, './uploads/boo-9.jpg', 'hà nội', '0552114786'),
(3, 'sample', '123456', 'sample@gmail.com', 0, './uploads/1.2.08.3.18.007.222.23-10700011-bst-1_1.jpg', 'hà nội', '014789632');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `fk_payment` (`payment_id`),
  ADD KEY `fk_status` (`status_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`bill_deltail_id`),
  ADD KEY `fk_bill` (`bill_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `bill_deltail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `fk_bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
