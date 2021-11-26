/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100604
 Source Host           : localhost:3306
 Source Schema         : lpkmuda

 Target Server Type    : MySQL
 Target Server Version : 100604
 File Encoding         : 65001

 Date: 26/11/2021 22:09:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for app_kejuruan
-- ----------------------------
DROP TABLE IF EXISTS `app_kejuruan`;
CREATE TABLE `app_kejuruan`  (
  `kjr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kjr_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_harga` decimal(65, 0) NULL DEFAULT NULL,
  `kjr_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kjr_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_hit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `kjr_created_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `kjr_deleted_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_locked` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_pemateri` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kjr_type` enum('kejuruan','kilat') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kjr_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_kejuruan
-- ----------------------------
INSERT INTO `app_kejuruan` VALUES ('AYfU-0jr1LNiClE', 'Kilat 4', 400000, '<p>ddddd</p>', 'kilat-4', NULL, 'kilat-4-2021_10_17_210700.jpg', '2021-10-17 21:07:00', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-BWznw8IEC5', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-bmSs4rkE3M', 'Kilat 3', 300000, '<p>ccccc</p>', 'kilat-3', NULL, 'kilat-3-2021_10_17_210642.jpg', '2021-10-17 21:06:42', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-AmaI8KG7oH', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-hbEyKQfaz4', 'Kilat 9', 900000, '<p>kilat 9</p>', 'kilat-9', '16', 'kilat-9-2021_10_17_212309.jpg', '2021-10-17 21:23:09', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-BWznw8IEC5', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-I8dc4ZDgE2', 'Kilat 5', 500000, '<p>eeeee</p>', 'kilat-5', NULL, 'kilat-5-2021_10_17_210727.jpg', '2021-10-17 21:07:27', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-fblxtSv6oY', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-Ku2OTdZIvW', 'Kilat 7', 700000, '<p>aaaa</p>', 'kilat-7', '1', 'kilat-7-2021_10_17_212219.png', '2021-10-17 21:22:19', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-AmaI8KG7oH', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-NeoigPa5JV', 'Kilat 8', 800000, '<p>aaaa</p>', 'kilat-8', '8', 'kilat-8-2021_10_17_212243.jpg', '2021-10-17 21:22:43', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-BWznw8IEC5', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-o1ynLT9Ruv', 'Kilat 2', 200000, '<p>bbbbb</p>', 'kilat-2', NULL, 'kilat-2-2021_10_17_210621.jpg', '2021-10-17 21:06:21', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-qraFtznOsj', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-rCk0X9Kvfu', 'Kilat 1', 100000, '<p>aaaa</p>', 'kilat-1', '1', 'kilat-1-2021_10_17_210602.jpg', '2021-10-17 21:06:02', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-fblxtSv6oY', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('AYfU-WACYuN3kSU', 'Kilat 6', 600000, '<p>aaa</p>', 'kilat-6', NULL, 'kilat-6-2021_10_17_212201.jpg', '2021-10-17 21:22:01', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-qraFtznOsj', 'kilat');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-4VxNy28ezu', 'Desain Grafis Untuk Pemula', 200000, '<p>lorem ipsum 2</p>', 'desain-grafis-untuk-pemula', '15', 'kejuruan-2-2021_10_17_200920.jpg', '2021-10-17 20:09:20', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-AmaI8KG7oH', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-DW7JLbfz0A', 'Kejuruan 1', 100000, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry.</p>', 'kejuruan-1', '4', 'kejuruan-1-2021_10_17_200019.jpg', '2021-10-12 22:58:29', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-qraFtznOsj', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-f2S0ed584Y', 'Kejuruan 3', 300000, '<p>ddd</p>', 'kejuruan-3', '20', 'kejuruan-3-2021_10_17_201920.jpg', '2021-10-17 20:19:20', '3WzM9-6bGh4bLCyu', '2021-10-17 20:21:18', NULL, '0', '3WzM9-fblxtSv6oY', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-wgvVjywsva', 'Digital Marketing', 150000, '<p>deskripsi digital marketing</p>', 'digital-marketing', '6', 'digital-marketing-2021_10_17_202157.png', '2021-10-12 22:58:29', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-AmaI8KG7oH', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-wgvVjywsvb', 'Teknisi Komputer', 200000, 'deskripsi teknisi komputer', 'teknisi-komputer', '3', NULL, '2021-10-12 22:58:32', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-BWznw8IEC5', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-wgvVjywsvc', 'Tata Boga', 250000, 'deskripsi tata boga', 'tata-boga', '4', NULL, '2021-10-12 22:58:36', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-BWznw8IEC5', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-wgvVjywsvd', 'Menjahit', 300000, '<p>deskripsi menjahit</p>', 'menjahit', '11', 'menjahit-2021_10_17_202210.jpg', '2021-10-12 22:58:43', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-BWznw8IEC5', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-wgvVjywsvi', 'Office Perkantoran', 100000, '<p>deskripsi office</p>', 'office-perkantoran', '1', 'office-perkantoran-2021_10_17_202221.jpg', '2021-10-12 22:56:06', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-fblxtSv6oY', 'kejuruan');
INSERT INTO `app_kejuruan` VALUES ('Rfyil-xujZk1p6gQ', 'Programming', 300000, '<p>deskripsi programming</p>', 'programming', '121', 'kejuruan-3-2021_10_19_220812.png', '2021-10-17 20:21:31', '3WzM9-6bGh4bLCyu', NULL, NULL, '0', '3WzM9-AmaI8KG7oH', 'kejuruan');

-- ----------------------------
-- Table structure for app_kelas
-- ----------------------------
DROP TABLE IF EXISTS `app_kelas`;
CREATE TABLE `app_kelas`  (
  `kls_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kls_mbr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kls_kjr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kls_created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `kls_locked` int(2) NULL DEFAULT NULL,
  `kls_selesai` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `kls_trf_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kls_lunas` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`kls_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_kelas
-- ----------------------------
INSERT INTO `app_kelas` VALUES ('vLJO-AvUdESu5n3', 'CGiO-Uh4pEYkVDL', 'AYfU-hbEyKQfaz4', '2021-11-02 23:33:15', 0, '1', 'qdctb', '2021-11-02 23:33:49');
INSERT INTO `app_kelas` VALUES ('vLJO-bADZEYS0NX', 'CGiO-qEOvBClJMu', 'Rfyil-xujZk1p6gQ', '2021-11-02 21:56:34', 1, '0', '5yIPa', '2021-11-02 22:12:08');
INSERT INTO `app_kelas` VALUES ('vLJO-bT4ZXwU7QR', 'CGiO-Uh4pEYkVDL', 'Rfyil-xujZk1p6gQ', '2021-11-02 21:56:13', 0, '1', 'qdctb', '2021-11-02 22:00:06');
INSERT INTO `app_kelas` VALUES ('vLJO-DQ1qEXJTVj', 'CGiO-qEOvBClJMu', 'Rfyil-4VxNy28ezu', '2021-11-02 23:13:42', 1, '0', NULL, NULL);
INSERT INTO `app_kelas` VALUES ('vLJO-IJl72f38QA', 'CGiO-Uh4pEYkVDL', 'Rfyil-4VxNy28ezu', '2021-11-02 21:56:23', 0, '1', 'USAQf', '2021-11-02 21:58:37');
INSERT INTO `app_kelas` VALUES ('vLJO-oUXarsYplI', 'CGiO-Uh4pEYkVDL', 'Rfyil-wgvVjywsva', '2021-11-05 20:12:54', 0, '1', 'qdctb', '2021-11-05 20:15:16');
INSERT INTO `app_kelas` VALUES ('vLJO-WKIn6Pak1Q', 'CGiO-Uh4pEYkVDL', 'AYfU-Ku2OTdZIvW', '2021-11-21 20:39:45', 1, '0', 'qdctb', NULL);

-- ----------------------------
-- Table structure for app_materi
-- ----------------------------
DROP TABLE IF EXISTS `app_materi`;
CREATE TABLE `app_materi`  (
  `mtr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mtr_kjr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_index` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `mtr_locked` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_order` decimal(10, 0) NULL DEFAULT NULL,
  `mtr_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `mtr_created_at` timestamp(0) NULL DEFAULT NULL,
  `mtr_created_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mtr_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_materi
-- ----------------------------
INSERT INTO `app_materi` VALUES ('NvKt-41Zdbq2xDm', 'Rfyil-wgvVjywsva', 'NvKt-NewbHLR2Eg', 'Digital Marketing 3.1', '<p>Digital Marketing 3.1</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '0', 1, NULL, '2021-11-05 20:12:42', '3WzM9-AmaI8KG7oH', 'digital-marketing-31');
INSERT INTO `app_materi` VALUES ('NvKt-4A9ytH1hNw', 'Rfyil-4VxNy28ezu', 'NvKt-SfZ9milBO1', 'Grafis 2.2', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 11:16:13', '3WzM9-AmaI8KG7oH', 'grafis-22');
INSERT INTO `app_materi` VALUES ('NvKt-6GTyMOfxI2', 'Rfyil-xujZk1p6gQ', NULL, 'Programming 1', NULL, '0', 1, NULL, '2021-10-20 08:32:21', '3WzM9-AmaI8KG7oH', 'programming-1');
INSERT INTO `app_materi` VALUES ('NvKt-6qUQE2cSLD', 'AYfU-hbEyKQfaz4', 'NvKt-ik8BOHhqSZ', 'Kilat 9 - materi 1.1', '<p>kilat 9 - materi 1.1</p>', '0', 1, NULL, '2021-11-02 23:35:39', '3WzM9-BWznw8IEC5', 'kilat-9-materi-11');
INSERT INTO `app_materi` VALUES ('NvKt-7KekBvybYL', 'Rfyil-4VxNy28ezu', 'NvKt-hqXflZKeLI', 'Grafis 1.3', '<p>isi konsep desain&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '0', 3, NULL, '2021-10-20 10:19:39', '3WzM9-AmaI8KG7oH', 'grafis-13');
INSERT INTO `app_materi` VALUES ('NvKt-9hswoG3LmZ', 'Rfyil-4VxNy28ezu', NULL, 'Grafis 3', NULL, '0', 3, NULL, '2021-10-20 08:51:00', '3WzM9-6bGh4bLCyu', 'grafis-3');
INSERT INTO `app_materi` VALUES ('NvKt-9Oqr84bzQR', 'Rfyil-xujZk1p6gQ', 'NvKt-tyFB63nZmo', 'Programming 3.3', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 3, NULL, '2021-10-20 15:38:26', '3WzM9-AmaI8KG7oH', 'programming-33');
INSERT INTO `app_materi` VALUES ('NvKt-adOzrAebj4', 'Rfyil-xujZk1p6gQ', NULL, 'Programming 2', NULL, '0', 2, NULL, '2021-10-20 08:32:12', '3WzM9-AmaI8KG7oH', 'programming-2');
INSERT INTO `app_materi` VALUES ('NvKt-aLYNIbjcAr', NULL, 'NvKt-weXgnqCdhZ', 'Perkantoran 1.1', '<p>Latar Belakang perkantoran</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:09:30', '3WzM9-fblxtSv6oY', 'perkantoran-11');
INSERT INTO `app_materi` VALUES ('NvKt-b7N9Qve2zB', 'Rfyil-wgvVjywsvi', NULL, 'Perkantoran 3', NULL, '0', 3, NULL, '2021-10-20 08:49:35', '3WzM9-fblxtSv6oY', 'perkantoran-3');
INSERT INTO `app_materi` VALUES ('NvKt-BjDPEh6HmR', 'Rfyil-xujZk1p6gQ', 'NvKt-tyFB63nZmo', 'Programming 3.2', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 15:38:17', '3WzM9-AmaI8KG7oH', 'programming-32');
INSERT INTO `app_materi` VALUES ('NvKt-CAcOynjgP7', NULL, 'NvKt-UZ941rnuGT', 'Perkantoran 2.3', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 3, NULL, '2021-10-20 11:13:30', '3WzM9-fblxtSv6oY', 'perkantoran-23');
INSERT INTO `app_materi` VALUES ('NvKt-cVEHR5rCns', 'Rfyil-wgvVjywsva', NULL, 'Digital Marketing 2', NULL, '0', 2, NULL, '2021-11-05 20:09:50', '3WzM9-AmaI8KG7oH', 'digital-marketing-2');
INSERT INTO `app_materi` VALUES ('NvKt-d6ga2SpIQ9', 'Rfyil-xujZk1p6gQ', 'NvKt-adOzrAebj4', 'Programming 2.2', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 11:17:33', '3WzM9-AmaI8KG7oH', 'programming-22');
INSERT INTO `app_materi` VALUES ('NvKt-difL5ju36g', NULL, 'NvKt-UZ941rnuGT', 'Perkantoran 2.2', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 11:13:15', '3WzM9-fblxtSv6oY', 'perkantoran-22');
INSERT INTO `app_materi` VALUES ('NvKt-dq4N82Lm7J', 'Rfyil-4VxNy28ezu', 'NvKt-SfZ9milBO1', 'Grafis 2.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:16:06', '3WzM9-AmaI8KG7oH', 'grafis-21');
INSERT INTO `app_materi` VALUES ('NvKt-E1MgNSvGd2', 'Rfyil-xujZk1p6gQ', 'NvKt-6GTyMOfxI2', 'Programming 1.2', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 11:17:14', '3WzM9-AmaI8KG7oH', 'programming-12');
INSERT INTO `app_materi` VALUES ('NvKt-eBQARrCW2J', 'Rfyil-wgvVjywsva', 'NvKt-HqdaS9w6Kt', 'Digital Marketing 1.3', '<p>Digital Marketing 1.3</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '0', 3, NULL, '2021-11-05 20:11:14', '3WzM9-AmaI8KG7oH', 'digital-marketing-13');
INSERT INTO `app_materi` VALUES ('NvKt-elOx4agQz0', NULL, 'NvKt-weXgnqCdhZ', 'Perkantoran 1.3', '<p>manfaat perkantoran</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 3, NULL, '2021-10-20 11:10:09', '3WzM9-fblxtSv6oY', 'perkantoran-13');
INSERT INTO `app_materi` VALUES ('NvKt-eqsy40iaZW', 'Rfyil-wgvVjywsva', 'NvKt-HqdaS9w6Kt', 'Digital Marketing 1.1', '<p>Digital Marketing 1.1</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '0', 1, NULL, '2021-11-05 20:10:42', '3WzM9-AmaI8KG7oH', 'digital-marketing-11');
INSERT INTO `app_materi` VALUES ('NvKt-gWM3m2Eo4T', 'Rfyil-xujZk1p6gQ', 'NvKt-adOzrAebj4', 'Programming 2.3', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 3, NULL, '2021-10-20 15:41:25', '3WzM9-AmaI8KG7oH', 'programming-23');
INSERT INTO `app_materi` VALUES ('NvKt-HqdaS9w6Kt', 'Rfyil-wgvVjywsva', NULL, 'Digital Marketing 1', NULL, '0', 1, NULL, '2021-11-05 20:09:44', '3WzM9-AmaI8KG7oH', 'digital-marketing-1');
INSERT INTO `app_materi` VALUES ('NvKt-hqXflZKeLI', 'Rfyil-4VxNy28ezu', NULL, 'Grafis 1', NULL, '0', 1, NULL, '2021-10-20 08:24:15', '3WzM9-AmaI8KG7oH', 'grafis-1');
INSERT INTO `app_materi` VALUES ('NvKt-HxbQJjCmlt', 'Rfyil-xujZk1p6gQ', 'NvKt-6GTyMOfxI2', 'Programming 1.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:17:05', '3WzM9-AmaI8KG7oH', 'programming-11');
INSERT INTO `app_materi` VALUES ('NvKt-i07er6pjcE', 'Rfyil-xujZk1p6gQ', 'NvKt-tyFB63nZmo', 'Programming 3.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 15:37:46', '3WzM9-AmaI8KG7oH', 'programming-31');
INSERT INTO `app_materi` VALUES ('NvKt-IF1neuCd79', 'Rfyil-wgvVjywsvi', NULL, 'Perkantoran 5', NULL, '0', 5, NULL, '2021-10-20 11:08:00', '3WzM9-fblxtSv6oY', 'perkantoran-5');
INSERT INTO `app_materi` VALUES ('NvKt-ik8BOHhqSZ', 'AYfU-hbEyKQfaz4', NULL, 'Kilat 9 - materi 1', NULL, '0', 1, NULL, '2021-11-02 23:35:16', '3WzM9-BWznw8IEC5', 'kilat-9-materi-1');
INSERT INTO `app_materi` VALUES ('NvKt-JIkLeyKhMY', 'AYfU-hbEyKQfaz4', 'NvKt-WCgmpZRB0Y', 'Kilat 9 - materi 2.1', '<p>Kilat 9 - materi 2.1</p>', '0', 1, NULL, '2021-11-02 23:36:06', '3WzM9-BWznw8IEC5', 'kilat-9-materi-21');
INSERT INTO `app_materi` VALUES ('NvKt-jJluTF2iwr', NULL, 'NvKt-b7N9Qve2zB', 'Perkantoran 3.2', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 11:13:55', '3WzM9-fblxtSv6oY', 'perkantoran-32');
INSERT INTO `app_materi` VALUES ('NvKt-jSf8ngVJ0k', 'Rfyil-4VxNy28ezu', 'NvKt-hqXflZKeLI', 'Grafis 1.2', '<p>Tujuan Desain</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 10:21:00', '3WzM9-AmaI8KG7oH', 'grafis-12');
INSERT INTO `app_materi` VALUES ('NvKt-kwtVg23HrU', NULL, 'NvKt-UZ941rnuGT', 'Perkantoran 2.1', '<p>Perkantoran 2.1</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:13:05', '3WzM9-fblxtSv6oY', 'perkantoran-21');
INSERT INTO `app_materi` VALUES ('NvKt-lGvWOu3C6T', 'Rfyil-wgvVjywsvi', NULL, 'Perkantoran 4', NULL, '0', 4, NULL, '2021-10-20 11:07:53', '3WzM9-fblxtSv6oY', 'perkantoran-4');
INSERT INTO `app_materi` VALUES ('NvKt-lwSviVeM5T', 'AYfU-hbEyKQfaz4', 'NvKt-WCgmpZRB0Y', 'Kilat 9 - materi 2.2', '<p>Kilat 9 - materi 2.2</p>', '0', 2, NULL, '2021-11-02 23:36:17', '3WzM9-BWznw8IEC5', 'kilat-9-materi-22');
INSERT INTO `app_materi` VALUES ('NvKt-MXhk1fAyx7', 'Rfyil-wgvVjywsva', 'NvKt-HqdaS9w6Kt', 'Digital Marketing 1.2', '<p>Digital Marketing 1.2</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '0', 2, NULL, '2021-11-05 20:11:00', '3WzM9-AmaI8KG7oH', 'digital-marketing-12');
INSERT INTO `app_materi` VALUES ('NvKt-NEuR50ziWZ', 'Rfyil-wgvVjywsva', 'NvKt-cVEHR5rCns', 'Digital Marketing 2.2', '<p>Digital Marketing 2.2</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '0', 2, NULL, '2021-11-05 20:12:24', '3WzM9-AmaI8KG7oH', 'digital-marketing-22');
INSERT INTO `app_materi` VALUES ('NvKt-NewbHLR2Eg', 'Rfyil-wgvVjywsva', NULL, 'Digital Marketing 3', NULL, '0', 3, NULL, '2021-11-05 20:09:56', '3WzM9-AmaI8KG7oH', 'digital-marketing-3');
INSERT INTO `app_materi` VALUES ('NvKt-OYfktW1z8j', NULL, 'NvKt-weXgnqCdhZ', 'Perkantoran 1.2', '<p>tujuan perkantoran</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 11:09:44', '3WzM9-fblxtSv6oY', 'perkantoran-12');
INSERT INTO `app_materi` VALUES ('NvKt-P8Bu0keIjJ', NULL, 'NvKt-lGvWOu3C6T', 'Perkantoran 4.3', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 3, NULL, '2021-10-20 11:14:33', '3WzM9-fblxtSv6oY', 'perkantoran-43');
INSERT INTO `app_materi` VALUES ('NvKt-pRgzf2bGqS', NULL, 'NvKt-IF1neuCd79', 'Perkantoran 5.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:14:47', '3WzM9-fblxtSv6oY', 'perkantoran-51');
INSERT INTO `app_materi` VALUES ('NvKt-rWVsSv2Zm5', 'Rfyil-4VxNy28ezu', 'NvKt-9hswoG3LmZ', 'Grafis 3.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:16:28', '3WzM9-AmaI8KG7oH', 'grafis-31');
INSERT INTO `app_materi` VALUES ('NvKt-SfZ9milBO1', 'Rfyil-4VxNy28ezu', NULL, 'Grafis 2', NULL, '0', 2, NULL, '2021-10-20 08:24:39', '3WzM9-AmaI8KG7oH', 'grafis-2');
INSERT INTO `app_materi` VALUES ('NvKt-sJkgKBUl8G', 'Rfyil-4VxNy28ezu', 'NvKt-hqXflZKeLI', 'Grafis 1.4', '<p>Peluang desain</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 4, NULL, '2021-10-20 10:20:42', '3WzM9-AmaI8KG7oH', 'grafis-14');
INSERT INTO `app_materi` VALUES ('NvKt-SoXQLegaV1', 'Rfyil-wgvVjywsva', 'NvKt-cVEHR5rCns', 'Digital Marketing 2.1', '<p>Digital Marketing 2.1</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '0', 1, NULL, '2021-11-05 20:12:12', '3WzM9-AmaI8KG7oH', 'digital-marketing-21');
INSERT INTO `app_materi` VALUES ('NvKt-SrJXlfAaV2', 'Rfyil-xujZk1p6gQ', 'NvKt-adOzrAebj4', 'Programming 2.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:17:25', '3WzM9-AmaI8KG7oH', 'programming-21');
INSERT INTO `app_materi` VALUES ('NvKt-t03l6zSVAU', NULL, 'NvKt-b7N9Qve2zB', 'Perkantoran 3.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:13:47', '3WzM9-fblxtSv6oY', 'perkantoran-31');
INSERT INTO `app_materi` VALUES ('NvKt-tyFB63nZmo', 'Rfyil-xujZk1p6gQ', NULL, 'Programming 3', NULL, '0', 3, NULL, '2021-10-20 15:37:30', '3WzM9-AmaI8KG7oH', 'programming-3');
INSERT INTO `app_materi` VALUES ('NvKt-UsEvuJhrnT', 'AYfU-hbEyKQfaz4', 'NvKt-ik8BOHhqSZ', 'Kilat 9 - materi 1.2', '<p>Kilat 9 - materi 1.2</p>', '0', 2, NULL, '2021-11-02 23:35:51', '3WzM9-BWznw8IEC5', 'kilat-9-materi-12');
INSERT INTO `app_materi` VALUES ('NvKt-UZ941rnuGT', 'Rfyil-wgvVjywsvi', NULL, 'Perkantoran 2', NULL, '0', 2, NULL, '2021-10-20 08:49:49', '3WzM9-fblxtSv6oY', 'perkantoran-2');
INSERT INTO `app_materi` VALUES ('NvKt-WCgmpZRB0Y', 'AYfU-hbEyKQfaz4', NULL, 'Kilat 9 - materi 2', NULL, '0', 2, NULL, '2021-11-02 23:35:22', '3WzM9-BWznw8IEC5', 'kilat-9-materi-2');
INSERT INTO `app_materi` VALUES ('NvKt-weXgnqCdhZ', 'Rfyil-wgvVjywsvi', NULL, 'Perkantoran 1', NULL, '0', 1, NULL, '2021-10-20 08:49:30', '3WzM9-fblxtSv6oY', 'perkantoran-1');
INSERT INTO `app_materi` VALUES ('NvKt-wNC5vRFU3Q', NULL, 'NvKt-lGvWOu3C6T', 'Perkantoran 4.1', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 11:14:07', '3WzM9-fblxtSv6oY', 'perkantoran-41');
INSERT INTO `app_materi` VALUES ('NvKt-WV4lUC92k5', NULL, 'NvKt-lGvWOu3C6T', 'Perkantoran 4.2', '<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 2, NULL, '2021-10-20 11:14:24', '3WzM9-fblxtSv6oY', 'perkantoran-42');
INSERT INTO `app_materi` VALUES ('NvKt-Xbdasl6JA9', 'Rfyil-4VxNy28ezu', 'NvKt-hqXflZKeLI', 'Grafis 1.1', '<p>Latar belakang desain</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 1, NULL, '2021-10-20 10:21:18', '3WzM9-AmaI8KG7oH', 'grafis-11');
INSERT INTO `app_materi` VALUES ('NvKt-ZtC9TgB7o1', NULL, 'NvKt-weXgnqCdhZ', 'Perkantoran 1.4', '<p>Peluang Perkantoran</p>\r\n<p>&nbsp;</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/Vhm1Cv2uPko\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '0', 4, NULL, '2021-10-20 11:10:25', '3WzM9-fblxtSv6oY', 'perkantoran-14');

-- ----------------------------
-- Table structure for app_mitra
-- ----------------------------
DROP TABLE IF EXISTS `app_mitra`;
CREATE TABLE `app_mitra`  (
  `mtr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mtr_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_locked` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `mtr_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `mtr_created_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mtr_order` decimal(5, 0) NULL DEFAULT NULL,
  `mtr_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mtr_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_mitra
-- ----------------------------
INSERT INTO `app_mitra` VALUES ('CrfG-0dRuYjQ4tS', 'Taman Kanak-Kanak Mardi Rahayu Mayangrejo', 'taman-kanak-kanak-mardi-rahayu-mayangrejo-2021_10_17_144052.jpg', '0', '0000-00-00 00:00:00', NULL, NULL, 3, '');
INSERT INTO `app_mitra` VALUES ('CrfG-betvSC3U6m', 'Dikamhost.com', 'dikamhostcom-2021_10_17_143943.png', '0', '0000-00-00 00:00:00', NULL, NULL, 1, 'https://dikamhost.com');
INSERT INTO `app_mitra` VALUES ('CrfG-T5GctrqHSz', 'Kemenaker', 'kemenaker-2021_10_17_144012.jpg', '0', '0000-00-00 00:00:00', NULL, NULL, 2, 'https://kemnaker.go.id/');

-- ----------------------------
-- Table structure for app_modul
-- ----------------------------
DROP TABLE IF EXISTS `app_modul`;
CREATE TABLE `app_modul`  (
  `mdl_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mdl_mbr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mdl_mtr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mdl_created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`mdl_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_modul
-- ----------------------------
INSERT INTO `app_modul` VALUES ('mGed-1Ai5nJWF9V', 'CGiO-Uh4pEYkVDL', 'NvKt-eqsy40iaZW', '2021-11-05 20:16:55');
INSERT INTO `app_modul` VALUES ('mGed-3BmFAH7fdZ', 'CGiO-Uh4pEYkVDL', 'NvKt-Xbdasl6JA9', '2021-11-02 22:04:36');
INSERT INTO `app_modul` VALUES ('mGed-5kZRcJ8F2j', 'CGiO-Uh4pEYkVDL', 'NvKt-HxbQJjCmlt', '2021-11-02 22:01:28');
INSERT INTO `app_modul` VALUES ('mGed-8i1QcOGI5f', 'CGiO-Uh4pEYkVDL', 'NvKt-41Zdbq2xDm', '2021-11-05 20:17:30');
INSERT INTO `app_modul` VALUES ('mGed-9TPI8sHg6Y', 'CGiO-Uh4pEYkVDL', 'NvKt-i07er6pjcE', '2021-11-02 22:01:43');
INSERT INTO `app_modul` VALUES ('mGed-cxTuX5DRjB', 'CGiO-Uh4pEYkVDL', 'NvKt-JIkLeyKhMY', '2021-11-02 23:36:36');
INSERT INTO `app_modul` VALUES ('mGed-eHlsMWw6Yu', 'CGiO-Uh4pEYkVDL', 'NvKt-NEuR50ziWZ', '2021-11-05 20:17:27');
INSERT INTO `app_modul` VALUES ('mGed-fzm84YD3OH', 'CGiO-Uh4pEYkVDL', 'NvKt-rWVsSv2Zm5', '2021-11-05 20:00:49');
INSERT INTO `app_modul` VALUES ('mGed-hqZs5SUG6y', 'CGiO-Uh4pEYkVDL', 'NvKt-7KekBvybYL', '2021-11-02 22:05:39');
INSERT INTO `app_modul` VALUES ('mGed-l3nRegmJLy', 'CGiO-Uh4pEYkVDL', 'NvKt-sJkgKBUl8G', '2021-11-02 22:05:42');
INSERT INTO `app_modul` VALUES ('mGed-mgrPaB4dNH', 'CGiO-Uh4pEYkVDL', 'NvKt-eBQARrCW2J', '2021-11-05 20:17:14');
INSERT INTO `app_modul` VALUES ('mGed-MWaTmKvV16', 'CGiO-Uh4pEYkVDL', 'NvKt-lwSviVeM5T', '2021-11-02 23:36:38');
INSERT INTO `app_modul` VALUES ('mGed-nk0XvY17yj', 'CGiO-Uh4pEYkVDL', 'NvKt-4A9ytH1hNw', '2021-11-05 20:00:46');
INSERT INTO `app_modul` VALUES ('mGed-QpGmHEfBW3', 'CGiO-Uh4pEYkVDL', 'NvKt-MXhk1fAyx7', '2021-11-05 20:16:57');
INSERT INTO `app_modul` VALUES ('mGed-RrnBsqVHZl', 'CGiO-Uh4pEYkVDL', 'NvKt-6qUQE2cSLD', '2021-11-02 23:36:32');
INSERT INTO `app_modul` VALUES ('mGed-SLZr0Uejtd', 'CGiO-Uh4pEYkVDL', 'NvKt-gWM3m2Eo4T', '2021-11-02 22:01:39');
INSERT INTO `app_modul` VALUES ('mGed-sSeV84YXFp', 'CGiO-Uh4pEYkVDL', 'NvKt-UsEvuJhrnT', '2021-11-02 23:36:34');
INSERT INTO `app_modul` VALUES ('mGed-tVw2n3FJ8Z', 'CGiO-Uh4pEYkVDL', 'NvKt-E1MgNSvGd2', '2021-11-02 22:01:31');
INSERT INTO `app_modul` VALUES ('mGed-vUEfjOLzSn', 'CGiO-Uh4pEYkVDL', 'NvKt-jSf8ngVJ0k', '2021-11-02 22:05:35');
INSERT INTO `app_modul` VALUES ('mGed-W90hQSwkvp', 'CGiO-Uh4pEYkVDL', 'NvKt-SoXQLegaV1', '2021-11-05 20:17:26');
INSERT INTO `app_modul` VALUES ('mGed-WUIAj7bCHM', 'CGiO-Uh4pEYkVDL', 'NvKt-SrJXlfAaV2', '2021-11-02 22:01:34');
INSERT INTO `app_modul` VALUES ('mGed-x14otmjhRG', 'CGiO-Uh4pEYkVDL', 'NvKt-9Oqr84bzQR', '2021-11-02 22:01:47');
INSERT INTO `app_modul` VALUES ('mGed-xhXoWrMle0', 'CGiO-Uh4pEYkVDL', 'NvKt-d6ga2SpIQ9', '2021-11-02 22:01:37');
INSERT INTO `app_modul` VALUES ('mGed-YmQM92ZIRp', 'CGiO-Uh4pEYkVDL', 'NvKt-dq4N82Lm7J', '2021-11-05 20:00:34');
INSERT INTO `app_modul` VALUES ('mGed-ZEDijSzgso', 'CGiO-Uh4pEYkVDL', 'NvKt-BjDPEh6HmR', '2021-11-02 22:01:45');

-- ----------------------------
-- Table structure for app_sertifikat
-- ----------------------------
DROP TABLE IF EXISTS `app_sertifikat`;
CREATE TABLE `app_sertifikat`  (
  `srt_id` char(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `srt_mbr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `srt_kjr_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `srt_created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `srt_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `srt_no_urut` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`srt_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_sertifikat
-- ----------------------------
INSERT INTO `app_sertifikat` VALUES ('SC-F8vYEq6N3z', 'CGiO-Uh4pEYkVDL', 'AYfU-hbEyKQfaz4', '2021-11-03 00:31:01', 'SC-F8vYEq6N3z.jpg', '002');
INSERT INTO `app_sertifikat` VALUES ('SC-sHC1yw9Rmr', 'CGiO-Uh4pEYkVDL', 'Rfyil-4VxNy28ezu', '2021-11-05 20:00:54', 'SC-sHC1yw9Rmr.jpg', '003');
INSERT INTO `app_sertifikat` VALUES ('SC-TmI4u9Yfpk', 'CGiO-Uh4pEYkVDL', 'Rfyil-wgvVjywsva', '2021-11-14 20:34:58', 'SC-TmI4u9Yfpk.jpg', '004');
INSERT INTO `app_sertifikat` VALUES ('SC-VjNpX18chL', 'CGiO-Uh4pEYkVDL', 'Rfyil-xujZk1p6gQ', '2021-11-02 22:01:51', 'SC-VjNpX18chL.jpg', '001');

-- ----------------------------
-- Table structure for app_slider
-- ----------------------------
DROP TABLE IF EXISTS `app_slider`;
CREATE TABLE `app_slider`  (
  `sld_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sld_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sld_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sld_locked` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sld_created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `sld_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `sld_created_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sld_order` decimal(5, 0) NULL DEFAULT NULL,
  `sld_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`sld_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_slider
-- ----------------------------
INSERT INTO `app_slider` VALUES ('hoTVn-4woqvyszlG', 'Sertifikat', 'slider-3-2021_10_17_131126.jpg', '1', '0000-00-00 00:00:00', NULL, NULL, 1, '');
INSERT INTO `app_slider` VALUES ('hoTVn-AerQBHa7dJ', 'Dewi Putri Nur Kotafiya, S.Stat', 'dewi-putri-nur-kotafiya-sstat-2021_10_17_141909.png', '0', '0000-00-00 00:00:00', NULL, NULL, 6, '');
INSERT INTO `app_slider` VALUES ('hoTVn-kHZW1wOlox', 'Didik Abdul Mukmin, S.Kom', 'slider-3-2021_10_17_135520.png', '0', '0000-00-00 00:00:00', NULL, NULL, 3, '');
INSERT INTO `app_slider` VALUES ('hoTVn-O1RnzdCWQ9', 'Ali Muchtarom, S.Kom', 'ali-muchtarom-skom-2021_10_17_141853.png', '0', '0000-00-00 00:00:00', NULL, NULL, 5, '');
INSERT INTO `app_slider` VALUES ('hoTVn-p4giJrvKfO', 'Erlangga Rizki Mura, S.Kom', 'erlangga-rizki-mura-skom-2021_10_17_193819.png', '0', '0000-00-00 00:00:00', NULL, NULL, 2, '');
INSERT INTO `app_slider` VALUES ('hoTVn-SFCMqB2v7U', 'Ayu Mauliana Intahaya, S.Kom', 'ayu-mauliana-intahaya-skom-2021_10_17_141816.png', '0', '0000-00-00 00:00:00', NULL, NULL, 4, '');

-- ----------------------------
-- Table structure for app_tentang
-- ----------------------------
DROP TABLE IF EXISTS `app_tentang`;
CREATE TABLE `app_tentang`  (
  `tnt_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tnt_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tnt_isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`tnt_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_tentang
-- ----------------------------
INSERT INTO `app_tentang` VALUES ('DVite-yFfCpfnPIc', 'tentang-2021_10_17_155416.jpg', '<p class=\"mb-3\">LPK Muda Al-Hidayah berada dalam naungan Yayasan Generasi Muda Islami Kab.Bojonegoro. kami berkomitmen untuk:</p>\r\n<ul>\r\n<li>Membantu peserta didik untuk terus berkembang sesuai passionnya</li>\r\n<li>Memberi manfaat dan mengubah pemikiran masyarakat tentang pentingnya pendidikan</li>\r\n<li>Memberikan pelatihan gratis kepada anak yatim piatu dan anak yang kurang mampu</li>\r\n</ul>\r\n<p class=\"mt-3\">LPK Muda Al-Hidayah selalu berinovasi untuk menyediakan pelatihan yang berbobot dan disesuaikan dengan kebutuhan dunia kerja.Setelah penerimaan sertifikat ada sesi dimana peserta didik berkonsultasi dengan para mentor untuk mencari perusahaan atau instansi yang sesuai untuk bekerja setelah selesai pelatihan.</p>');

-- ----------------------------
-- Table structure for app_testimoni
-- ----------------------------
DROP TABLE IF EXISTS `app_testimoni`;
CREATE TABLE `app_testimoni`  (
  `tst_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tst_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tst_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tst_isi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tst_created_at` timestamp(0) NULL DEFAULT NULL,
  `tst_created_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tst_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `tst_order` int(11) NULL DEFAULT NULL,
  `tst_locked` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tst_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_testimoni
-- ----------------------------
INSERT INTO `app_testimoni` VALUES ('yCdk-4un1bvs5jt', 'testimoni-9-2021_10_18_011824.png', 'Testimoni 10', 'isi testi 10', '2021-10-18 01:18:24', '3WzM9-6bGh4bLCyu', NULL, 10, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-GKXQnWz5HJ', 'testimoni-8-2021_10_18_011812.png', 'Testimoni 8', 'isi testi 8', '2021-10-18 01:18:12', '3WzM9-6bGh4bLCyu', NULL, 8, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-hItd73K8Fk', 'testimoni-7-2021_10_18_011757.jpg', 'Testimoni 7', 'isi testi 7', '2021-10-18 01:17:57', '3WzM9-6bGh4bLCyu', NULL, 7, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-hJCNV1cFzL', 'testimoni-5-2021_10_18_011729.jpg', 'Testimoni 5', 'isi testimoni 5', '2021-10-18 01:17:29', '3WzM9-6bGh4bLCyu', NULL, 5, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-imAJRogxDL', 'testimoni-3-2021_10_18_011357.png', 'Testimoni 3', 'isi testimoni 33', '2021-10-18 01:13:57', '3WzM9-6bGh4bLCyu', NULL, 3, '1');
INSERT INTO `app_testimoni` VALUES ('yCdk-lbDXCBoRke', 'testimoni-6-2021_10_18_011745.png', 'Testimoni 6', 'isi testimoni 6', '2021-10-18 01:17:45', '3WzM9-6bGh4bLCyu', NULL, 6, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-oFU5kG4BIL', NULL, 'Testimoni 1', 'deskripsi 1 Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-10-18 00:28:43', '3WzM9-6bGh4bLCyu', NULL, 1, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-OWwdCcPQ31', 'testimoni-11-2021_10_18_012034.jpg', 'Testimoni 11', 'isi 11', '2021-10-18 01:20:34', '3WzM9-6bGh4bLCyu', NULL, 11, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-SLi7OACtxl', 'testimoni-2-2021_10_18_003056.jpg', 'Testimoni 2', 'isi testimoni 2 Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2021-10-18 00:30:56', '3WzM9-6bGh4bLCyu', NULL, 2, '0');
INSERT INTO `app_testimoni` VALUES ('yCdk-tBjdrRViMO', 'testimoni-4-2021_10_18_011714.jpg', 'Testimoni 4', 'isi testimoni 4', '2021-10-18 01:17:14', '3WzM9-6bGh4bLCyu', NULL, 4, '1');
INSERT INTO `app_testimoni` VALUES ('yCdk-yfX5ZYBF0o', 'testimoni-9-2021_10_18_012334.png', 'Testimoni 9', 'isi 9', '2021-10-18 01:23:34', '3WzM9-6bGh4bLCyu', NULL, 9, '0');

-- ----------------------------
-- Table structure for app_transfer
-- ----------------------------
DROP TABLE IF EXISTS `app_transfer`;
CREATE TABLE `app_transfer`  (
  `trf_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `trf_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trf_value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `trf_an` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`trf_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_transfer
-- ----------------------------
INSERT INTO `app_transfer` VALUES ('5yIPa', 'Bank Mandiri', '1780001797014', 'Erlangga Rizki Mura');
INSERT INTO `app_transfer` VALUES ('qdctb', 'Dana', '085784671374', 'Erlangga Rizki Mura');
INSERT INTO `app_transfer` VALUES ('USAQf', 'GoPay', '085784671374', 'Erlangga Rizki Mura');

-- ----------------------------
-- Table structure for artikel
-- ----------------------------
DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel`  (
  `art_id` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `art_gambar` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `art_isi` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `art_locked` int(2) NOT NULL DEFAULT 1,
  `art_tgl_upload` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `art_ktg_id` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `art_usr_id` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `art_judul` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `art_headline` int(1) NOT NULL DEFAULT 0,
  `art_slug` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `art_hit` int(11) NULL DEFAULT 0,
  `art_deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`art_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artikel
-- ----------------------------
INSERT INTO `artikel` VALUES ('Rfyil-1zeIAd9p5o', 'artikel-4-2021_09_25_092745.jpg', '<p><strong>isi artikel 4</strong></p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img src=\"http://dikamhost.test/storage/artikel/artikel-33333-2021_09_25_090953.jpg\" alt=\"\" width=\"427\" height=\"240\" /></p>', 0, '2021-09-25 16:27:45', 'zRciw-cq1iY6b7yD', '3WzM9-6bGh4bLCyu', 'Artikel 4', 0, 'artikel-4', 41, NULL);
INSERT INTO `artikel` VALUES ('Rfyil-D0nS9vc8f4', 'test-didikam-2021_09_27_230903.jpg', '<p><strong><img src=\"http://dikamhost.test/storage/artikel/artikel-3-2021_09_25_092712.jpg\" alt=\"\" width=\"408\" height=\"306\" /></strong></p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img src=\"http://dikamhost.test/storage/artikel/artikel-4-2021_09_25_092745.jpg\" alt=\"\" width=\"408\" height=\"306\" /></p>', 1, '2021-09-28 06:09:03', 'zRciw-HCbOD2wTv9', '3WzM9-AmaI8KG7oH', 'Test 7', 0, 'test-7', 22, NULL);
INSERT INTO `artikel` VALUES ('Rfyil-Dbl85QxgJa', 'artikel-33333-2021_09_25_090953.jpg', '<p>isi artikel 6</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 0, '2021-09-25 16:06:22', 'zRciw-yNYhBJrZmC', '3WzM9-6bGh4bLCyu', 'Artikel 6', 0, 'artikel-6', 2, NULL);
INSERT INTO `artikel` VALUES ('Rfyil-FGAQCcy9Dq', 'artikel-5-2021_09_27_155934.jpg', '<p><img src=\"http://dikamhost.test/storage/artikel/artikel-4-2021_09_25_092745.jpg\" alt=\"\" width=\"408\" height=\"306\" /></p>\r\n<p>isi artikel 5</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img src=\"http://dikamhost.test/storage/artikel/artikel-33333-2021_09_25_090953.jpg\" alt=\"\" width=\"427\" height=\"240\" /></p>\r\n<p>&nbsp;</p>\r\n<p><iframe title=\"YouTube video player\" src=\"https://www.youtube.com/embed/I2e7RZDRnZI\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>', 0, '2021-09-27 22:59:34', 'zRciw-yHmuWfSVKN', '3WzM9-6bGh4bLCyu', 'Artikel 5', 0, 'artikel-5', 13, NULL);
INSERT INTO `artikel` VALUES ('Rfyil-oxfz7XFbd9', NULL, '<p>isi artikel 1</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, '2021-09-25 16:01:09', 'zRciw-cq1iY6b7yD', '3WzM9-6bGh4bLCyu', 'Artikel 1', 0, 'artikel-1', 2, NULL);
INSERT INTO `artikel` VALUES ('Rfyil-qlKFQROe1A', 'artikel-3-2021_09_25_092712.jpg', '<p>isi artikel 3</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 0, '2021-09-25 16:27:12', 'zRciw-yNYhBJrZmC', '3WzM9-6bGh4bLCyu', 'Artikel 3', 0, 'artikel-3', 3, NULL);
INSERT INTO `artikel` VALUES ('Rfyil-UT0v7zfFLO', NULL, '<p>isi artikel 2</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 0, '2021-09-25 16:02:09', 'zRciw-yNYhBJrZmC', '3WzM9-6bGh4bLCyu', 'Artikel 2', 0, 'artikel-2', 35, NULL);

-- ----------------------------
-- Table structure for artikel_tags
-- ----------------------------
DROP TABLE IF EXISTS `artikel_tags`;
CREATE TABLE `artikel_tags`  (
  `artag_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `artag_art_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `artag_tag_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`artag_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artikel_tags
-- ----------------------------
INSERT INTO `artikel_tags` VALUES ('a', 'Rfyil-UT0v7zfFLO', 'OjnsH-BvJmhzUMXq');
INSERT INTO `artikel_tags` VALUES ('b', 'Rfyil-UT0v7zfFLO', 'OjnsH-fSgFYnPYKH');
INSERT INTO `artikel_tags` VALUES ('c', 'Rfyil-UT0v7zfFLO', 'OjnsH-hbkPnTEJPv');
INSERT INTO `artikel_tags` VALUES ('d', 'Rfyil-qlKFQROe1A', 'OjnsH-hbkPnTEJPv');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `ktg_id` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ktg_nama` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ktg_locked` tinyint(4) NOT NULL,
  `ktg_slug` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `ktg_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `ktg_usr_id` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ktg_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('zRciw-cq1iY6b7yD', 'Kategori 4', 0, 'kategori-4', NULL, '3WzM9-6bGh4bLCyu');
INSERT INTO `kategori` VALUES ('zRciw-HCbOD2wTv9', 'Kategori 2', 0, 'kategori-2', NULL, '3WzM9-6bGh4bLCyu');
INSERT INTO `kategori` VALUES ('zRciw-WjGR4cCxKe', 'Programming', 1, 'programming', NULL, '3WzM9-6bGh4bLCyu');
INSERT INTO `kategori` VALUES ('zRciw-yHmuWfSVKN', 'Kategori 5', 0, 'kategori-5', NULL, '3WzM9-6bGh4bLCyu');
INSERT INTO `kategori` VALUES ('zRciw-yNYhBJrZmC', 'Kategori 3', 0, 'kategori-3', NULL, '3WzM9-6bGh4bLCyu');
INSERT INTO `kategori` VALUES ('zRciw-yOzZF73IEo', 'Kategori 1', 1, 'kategori-1', NULL, '3WzM9-6bGh4bLCyu');

-- ----------------------------
-- Table structure for system_access
-- ----------------------------
DROP TABLE IF EXISTS `system_access`;
CREATE TABLE `system_access`  (
  `acs_group` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `acs_menu` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_access
-- ----------------------------
INSERT INTO `system_access` VALUES ('Fe1sF-RZ3S7JmIwU', 'DVite-rWim9D1FrG');
INSERT INTO `system_access` VALUES ('Fe1sF-RZ3S7JmIwU', 'DVite-rWim9D1FrT');
INSERT INTO `system_access` VALUES ('Fe1sF-RZ3S7JmIwU', 'DVite-rWim9D1FrJ');
INSERT INTO `system_access` VALUES ('Fe1sF-CrKLQ2EhuP', 'DVite-nCDZcOIORR');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-rWim9D1FrG');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-rWim9D1FrK');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-rWim9D1FrL');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-rWim9D1FrM');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-rWim9D1FrN');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-rWim9D1FrJ');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-rWim9D1FrT');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-ebRvcSjvDX');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-VxWayaejFP');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-HsNcPiuNdf');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-VxWayaejFI');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-m7m5QVSUPU');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-kTiUBfWDly');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-doCdIe7Lvo');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'DVite-doCdIe7LvU');
INSERT INTO `system_access` VALUES ('Fe1sF-2ciqv7x3Et', 'Dvite-H49lOqbyYs');

-- ----------------------------
-- Table structure for system_config
-- ----------------------------
DROP TABLE IF EXISTS `system_config`;
CREATE TABLE `system_config`  (
  `conf_char` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `conf_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `conf_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `conf_value` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `conf_option` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `conf_descryption` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `conf_order` int(11) NULL DEFAULT NULL,
  `conf_deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`conf_char`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_config
-- ----------------------------
INSERT INTO `system_config` VALUES ('app_brand', 'Logo Aplikasi', 'img', 'app_brand.png', NULL, 'Logo Aplikasi', 3, NULL);
INSERT INTO `system_config` VALUES ('app_descryption', 'Deskripsi Applikasi', 'textarea', 'Kursus Berkualitas Terpercaya', NULL, 'Deskripsi singkat tentang Aplikasi', 6, '2021-09-22 19:18:25');
INSERT INTO `system_config` VALUES ('app_icons', 'Icon Applikasi', 'img', 'app_icons.png', NULL, 'Gambar Icon Pada Tab Browser', 1, NULL);
INSERT INTO `system_config` VALUES ('app_keywords', 'Kata Kunci Applikasi', 'textarea', 'Simuda course, LPK Muda Alhidayah, Kursus Kilat, Kursus Bersertifikat, Kursus Kejuruan, Ingin Pintar, Tingkatkan Skill', NULL, 'Penulisan Keywords dipisahkan dengan tanda Koma (,)', 5, NULL);
INSERT INTO `system_config` VALUES ('app_names', 'Nama Applikasi', 'text', 'Simuda Course', NULL, 'Nama Aplikasi', 4, NULL);
INSERT INTO `system_config` VALUES ('app_sidebar_color', 'Sidebar Warna', 'select', 'success', '{\"danger\":\"Merah\",\"success\":\"Hijau\",\"primary\":\"Biru\",\"info\":\"Biru Muda\",\"warning\":\"Orange\",\"purple\":\"Ungu\",\"dark\":\"Hitam\",\"light\":\"Putih\"}', 'Warna pada halaman admin', 10, NULL);
INSERT INTO `system_config` VALUES ('app_sidebar_theme', 'Sidebar Tema', 'select', 'light', '{\"dark\":\"Gelap\",\"light\":\"Cerah\"}', 'Warna pada halaman admin', 9, NULL);
INSERT INTO `system_config` VALUES ('app_title', 'Judul Browser', 'text', 'Simuda Course', NULL, 'Judul Aplikasi pada Tab Browser', 2, NULL);
INSERT INTO `system_config` VALUES ('app_topbar_color', 'Navbar Warna', 'select', 'success', '{\"danger\":\"Merah\",\"success\":\"Hijau\",\"primary\":\"Biru\",\"info\":\"Biru Muda\",\"warning\":\"Orange\",\"purple\":\"Ungu\",\"dark\":\"Hitam\",\"light\":\"Putih\"}', 'Warna pada halaman admin', 8, NULL);
INSERT INTO `system_config` VALUES ('app_topbar_theme', 'Navbar Tema', 'select', 'dark', '{\"dark\":\"Gelap\",\"light\":\"Cerah\"}', 'Warna pada halaman admin', 7, NULL);

-- ----------------------------
-- Table structure for system_group
-- ----------------------------
DROP TABLE IF EXISTS `system_group`;
CREATE TABLE `system_group`  (
  `grp_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `grp_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `grp_create_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `grp_create_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `grp_deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`grp_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_group
-- ----------------------------
INSERT INTO `system_group` VALUES ('Fe1sF-2ciqv7x3Et', 'Administrator', '2021-08-19 09:55:16', '3WzM9-6bGh4bLCyu', NULL);
INSERT INTO `system_group` VALUES ('Fe1sF-CrKLQ2EhuP', 'Pemateri', '2021-10-17 14:51:49', NULL, NULL);
INSERT INTO `system_group` VALUES ('Fe1sF-RZ3S7JmIwU', 'Operator', '2021-09-22 19:18:00', NULL, NULL);

-- ----------------------------
-- Table structure for system_members
-- ----------------------------
DROP TABLE IF EXISTS `system_members`;
CREATE TABLE `system_members`  (
  `mbr_id` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mbr_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mbr_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `mbr_username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mbr_password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mbr_locked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 = Unlocked user;1 = Loked User;',
  `mbr_foto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `mbr_reset` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `mbr_last_login` timestamp(0) NULL DEFAULT NULL,
  `mbr_create_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `mbr_reset_at` timestamp(0) NULL DEFAULT NULL,
  `mbr_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `mbr_ip` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `mbr_kota_asal` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `mbr_tempat_lahir` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `mbr_tanggal_lahir` date NULL DEFAULT NULL,
  `mbr_no_induk` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mbr_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_members
-- ----------------------------
INSERT INTO `system_members` VALUES ('CGiO-qEOvBClJMu', 'Erlangga Riski Mura', 'erlangga@gmail.com', 'erlangga', '$2y$10$8XWNwIkjO.Tf13xU1E8QM.52mmjlmrBNUvuuG0HtsEN7VkAjVhqb.', 0, NULL, NULL, '2021-11-02 20:58:35', '2021-10-31 08:14:39', NULL, NULL, '127.0.0.1', 'Bojonegoro', 'Bojonegoro', '2000-09-30', '0003');
INSERT INTO `system_members` VALUES ('CGiO-Uh4pEYkVDL', 'Didik Abdul Mukmin', 'didik.abdul2017@gmail.com', 'didikam', '$2y$10$3Vzm7k0nbxRdTx0wayl/k.AhXjcC/cbgMEzlZKUYbC1LTpGN1Lti2', 0, 'didikam-2021_10_31_153724.png', NULL, '2021-11-21 21:20:20', '2021-10-31 06:48:24', NULL, NULL, '127.0.0.1', 'Bojonegoro', 'Tuban', '2000-01-28', '0002');

-- ----------------------------
-- Table structure for system_menu
-- ----------------------------
DROP TABLE IF EXISTS `system_menu`;
CREATE TABLE `system_menu`  (
  `mnu_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mnu_icon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mnu_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mnu_link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mnu_index` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mnu_order` int(3) NULL DEFAULT NULL,
  `mnu_create_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `mnu_create_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mnu_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `mnu_deleted_by` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mnu_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_menu
-- ----------------------------
INSERT INTO `system_menu` VALUES ('DVite-doCdIe7Lvo', 'fas fa-users', 'Pengguna', 'admin/user', 'DVite-m7m5QVSUPU', 2, '2021-08-19 12:51:31', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-doCdIe7LvU', 'fas fa-users', 'Members', 'admin/members', 'DVite-m7m5QVSUPU', 3, '2021-08-19 12:51:31', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-ebRvcSjvDX', 'fas fa-graduation-cap', 'Kursus', NULL, NULL, 3, '2021-08-19 12:51:31', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('Dvite-H49lOqbyYs', 'fas fa-sliders-h', 'Aplikasi', 'admin/config', 'DVite-m7m5QVSUPU', 4, '2021-08-19 12:51:31', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-HsNcPiuNdf', 'far fa-address-card', 'Gratis', 'admin/kilat', 'DVite-ebRvcSjvDX', 2, '2021-10-17 14:23:32', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-kTiUBfWDly', 'fas fa-users-cog', 'Role Group', 'admin/role', 'DVite-m7m5QVSUPU', 1, '2021-08-19 12:51:31', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-kTiUBfWDMn', 'fas fa-align-left', 'Menu', 'admin/menu', 'DVite-m7m5QVSUPU', 5, '2021-10-13 21:48:56', NULL, '2021-10-17 13:58:06', NULL);
INSERT INTO `system_menu` VALUES ('DVite-m7m5QVSUPU', 'fas fa-cogs', 'System', NULL, NULL, 99, '2021-08-19 12:51:31', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-nCDZcOIORR', 'fas fa-book-reader', 'Materi', 'admin/materi', NULL, 4, '2021-10-19 21:37:26', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-rWim9D1FrG', 'fas fa-id-card-alt', 'Admin Web', NULL, NULL, 2, '2021-08-19 12:51:31', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-rWim9D1FrJ', 'far fa-circle', 'Kategori', 'admin/kategori', 'DVite-rWim9D1FrG', 11, '2021-09-18 13:46:22', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-rWim9D1FrK', 'fas fa-sliders-h', 'Slider', 'admin/slider', 'DVite-rWim9D1FrG', 1, '2021-10-17 12:29:45', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-rWim9D1FrL', 'fas fa-handshake', 'Mitra', 'admin/mitra', 'DVite-rWim9D1FrG', 2, '2021-10-17 12:29:45', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-rWim9D1FrM', 'fas fa-address-card', 'Tentang', 'admin/tentang', 'DVite-rWim9D1FrG', 3, '2021-10-17 12:29:45', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-rWim9D1FrN', 'fas fa-user-tie', 'Testimoni', 'admin/testimoni', 'DVite-rWim9D1FrG', 4, '2021-10-17 12:29:45', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-rWim9D1FrT', 'far fa-circle', 'Artikel', 'admin/artikel', 'DVite-rWim9D1FrG', 12, '2021-09-18 13:46:08', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-VxWayaejFI', 'fas fa-money-bill-wave', 'Invoice', 'admin/invoice', NULL, 5, '2021-11-02 20:45:08', NULL, NULL, NULL);
INSERT INTO `system_menu` VALUES ('DVite-VxWayaejFP', 'far fa-address-book', 'Bersertifikat', 'admin/kejuruan', 'DVite-ebRvcSjvDX', 1, '2021-10-17 14:23:32', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for system_users
-- ----------------------------
DROP TABLE IF EXISTS `system_users`;
CREATE TABLE `system_users`  (
  `usr_id` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usr_group` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usr_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usr_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usr_username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usr_password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `usr_locked` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 = Unlocked user;1 = Loked User;',
  `usr_foto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `usr_reset` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `usr_last_login` timestamp(0) NULL DEFAULT NULL,
  `usr_create_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `usr_create_by` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usr_reset_at` timestamp(0) NULL DEFAULT NULL,
  `usr_update_at` timestamp(0) NULL DEFAULT NULL,
  `usr_update_by` char(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usr_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `usr_deskripsi` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `usr_facebook` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usr_twitter` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `usr_instagram` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`usr_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_users
-- ----------------------------
INSERT INTO `system_users` VALUES ('3WzM9-6bGh4bLCyu', 'Fe1sF-2ciqv7x3Et', 'Administrator System', 'administrator@mail.com', 'administrator', '$2y$10$KlRH85gljPQCun/ayvi3je4sxcMdoI4LDK2j/4bKhVEI/vUA2C89e', 0, 'administrator-2021_10_13_211458.png', NULL, '2021-09-10 08:51:18', NULL, NULL, NULL, '2021-10-17 15:13:20', NULL, NULL, 'Administrator Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'https://facebook.com', 'https://twitter.com/', 'https://instagram');
INSERT INTO `system_users` VALUES ('3WzM9-AmaI8KG7oH', 'Fe1sF-CrKLQ2EhuP', 'Didik Abdul Mukmin', 'didikam@gmail.com', 'didikam', '$2y$10$gap0CYRoPpJMGZIBueipQe29GtTDpGip278F5VzZDyNWqHrOlOday', 0, 'didikam-2021_10_17_145803.png', NULL, NULL, '2021-09-22 19:18:25', NULL, NULL, '2021-10-19 21:59:36', NULL, NULL, 'Didikam Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'https://facebook.com/didikam', 'https://twitter.com/didikam', 'https://instagram.com/didikam');
INSERT INTO `system_users` VALUES ('3WzM9-BWznw8IEC5', 'Fe1sF-CrKLQ2EhuP', 'Erlangga Rizki Mura, S.Kom', 'erlangga@gmail.com', 'erlangga', '$2y$10$IWrTYN8lih4EQPzi6bR1Q.jq15rDTH9..SDaGX73EV3MJfSCprTgG', 0, 'erlangga-2021_10_17_214008.jpeg', NULL, NULL, '2021-10-17 14:54:14', NULL, NULL, '2021-10-17 21:40:08', NULL, NULL, 'Erlangga Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '', '', '');
INSERT INTO `system_users` VALUES ('3WzM9-fblxtSv6oY', 'Fe1sF-CrKLQ2EhuP', 'Ali Muchtarom, S.Kom', 'tarom@gmail.com', 'tarom', '$2y$10$fEnePKtKIUGzn3eVFrPNlus.jAb3GfRozulBwQlepdRrXudgWO1RK', 0, 'tarom-2021_10_17_145448.png', NULL, NULL, '2021-10-17 14:54:48', NULL, NULL, '2021-10-17 15:13:13', NULL, NULL, 'Tarom Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'https://facebook.com/didikam', 'https://twitter.com/didikam', 'https://instagram.com/didikam');
INSERT INTO `system_users` VALUES ('3WzM9-qraFtznOsj', 'Fe1sF-CrKLQ2EhuP', 'Ayu Mauliana Intahaya, S.Kom', 'ayu@gmail.com', 'ayu', '$2y$10$VVXV8T32.hp4ZDl7FIEkOOmBjFEFNl8mjpECcpDoMQtFmOi.hcXSi', 0, 'ayu-2021_10_17_145845.jpg', NULL, NULL, '2021-10-17 14:58:45', NULL, NULL, '2021-10-17 15:13:24', NULL, NULL, 'Ayu Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '', '', '');

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `tag_id` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tag_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tag_slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tag_created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `tag_deleted_at` timestamp(0) NULL DEFAULT NULL,
  `tag_updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`tag_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('OjnsH-BvJmhzUMXq', 'Hosting', 'hosting', '2021-10-10 00:13:20', NULL, '2021-10-10 00:17:07');
INSERT INTO `tags` VALUES ('OjnsH-fSgFYnPYKH', 'Metode', 'metode', '2021-10-10 00:13:49', NULL, '2021-10-10 00:17:10');
INSERT INTO `tags` VALUES ('OjnsH-hbkPnTEJPv', 'Tugas Akhir', 'tugas-akhir', '2021-10-10 00:13:38', NULL, '2021-10-10 00:17:14');
INSERT INTO `tags` VALUES ('OjnsH-kJlsjKTefP', 'Programming', 'programming', '2021-10-10 00:12:19', NULL, '2021-10-10 00:17:17');
INSERT INTO `tags` VALUES ('OjnsH-sWMwcNQdWv', 'Perhitungan', 'perhitungan', '2021-10-10 00:13:59', NULL, '2021-10-10 00:17:20');

SET FOREIGN_KEY_CHECKS = 1;
