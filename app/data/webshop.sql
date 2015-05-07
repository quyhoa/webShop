/*
Navicat MySQL Data Transfer

Source Server         : butchigho
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : webshop

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-04-02 08:03:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `descriptions` text,
  `price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `link_download` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `time_view` int(11) DEFAULT NULL,
  `amount_view` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `vote_good` int(11) DEFAULT NULL,
  `vote_bad` int(11) DEFAULT NULL,
  `amount_read` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('25', '24', 'Hạt gống tâm hồn', 'giao-duc/hat-giong-tam-hon-2.png', 'hat-gong-tam-hon', '', '45000', null, null, '50', 'linkdowmload', '20', null, '1', '2015-03-25 09:25:32', '', null, null, null);
INSERT INTO `books` VALUES ('26', '24', 'Khi mọi diểm tựa đều mất', 'giao-duc/khi-moi-diem-tua-deu-mat.jpg', 'khi-moi-diem-tua-deu-mat', '', '29000', null, null, '30', 'linkdowmload', '32', null, '1', '2015-03-25 09:27:23', '', null, null, null);
INSERT INTO `books` VALUES ('27', '24', 'Nơi nào có ý chí nơi đó có con đường', 'giao-duc/noi-nao-co-y-chi-noi-do-co-con-duong.jpg', 'noi-nao-co-y-chi-noi-do-co-con-duong', '', '29000', null, null, '30', 'linkdowmload', '32', null, '3', '2015-03-25 09:27:46', '', null, null, null);
INSERT INTO `books` VALUES ('28', '24', 'Khám phá sức mạnh bản thân', 'giao-duc/kham-pha-suc-manh-ban-than.jpg', 'kham-pha-suc-manh-ban-than', '', '29000', null, null, '30', 'linkdowmload', '32', null, '3', '2015-03-25 09:28:05', '', null, null, null);
INSERT INTO `books` VALUES ('29', '24', 'Hạt gống tâm hồn 4', 'giao-duc/hat-giong-tam-hon-4.jpg', 'hat-gong-tam-hon-4', '<p>Nơi đây bạn sẽ tìm được những giá trị sống vĩnh hằng để giúp nuôi dưỡng tâm hồn của bạn và những người thân yêu. Hãy chọn cho mình một quyển sách phù hợp để có thêm NIỀM TIN, NGHỊ LỰC và TÌNH YÊU trong cuộc sống.</p>\r\n', '50', null, null, '60', 'linkdowmload', '18', null, '3', '2015-03-25 13:06:30', '', null, null, null);
INSERT INTO `books` VALUES ('30', '24', 'Hạt gống tâm hồn 6', 'giao-duc/hat-giong-tam-hon-6.jpg', 'hat-gong-tam-hon-6', '', '39000', null, null, '50', 'linkdowmload', '23', '1427339411', '11', '2015-03-25 13:37:33', '', null, null, null);
INSERT INTO `books` VALUES ('33', '27', 'Erec Rex Tập 2 - Quái vật xứ khác', 'sach-nuoc-ngoai/mat_rong.jpg', 'erec-rex-tap-2---quai-vat-xu-khac', '', '70000', null, null, '34', 'linkdowmload', '3', null, null, '2015-03-30 04:42:31', '', null, null, null);
INSERT INTO `books` VALUES ('34', '27', 'Pendragon Tập 5 - Nước Đen', 'sach-nuoc-ngoai/november_4th_009.jpg', 'pendragon-tap-5---nuoc-den', '', '47000', null, null, '45', 'linkdowmload', '6', null, null, '2015-03-30 04:44:09', '', null, null, null);
INSERT INTO `books` VALUES ('35', '27', 'Pendragon Tập 3 - Cuộc Chiến Bất Thành', 'sach-nuoc-ngoai/pendragon_-_cuocchien_bat_thanh.jpg', 'pendragon-tap-3---cuoc-chien-bat-thanh', '', '47000', null, null, '45', 'linkdowmload', '6', null, null, '2015-03-30 04:44:43', '', null, null, null);
INSERT INTO `books` VALUES ('36', '27', 'Demonata - Tập 1: Chúa Yêu Lord Loss', 'sach-nuoc-ngoai/demonata_1_1.jpg', 'demonata---tap-1-chua-yeu-lord-loss', '', '50000', null, null, '45', 'linkdowmload', '6', null, '2', '2015-03-30 04:45:21', '', null, null, null);
INSERT INTO `books` VALUES ('37', '27', 'Cậu Bé Trộm Ma Thuật 02 - Giải Cứu Pháp Thuật', 'sach-nuoc-ngoai/img270_1.jpg', 'cau-be-trom-ma-thuat-02---giai-cuu-phap-thuat', '', '50000', null, null, '45', 'linkdowmload', '6', null, '2', '2015-03-30 04:46:35', '', null, null, null);
INSERT INTO `books` VALUES ('38', '26', 'Tướng Quân Và CEO', 'kinh-te/tuong-quan-va-ceo.jpg', 'tuong-quan-va-ceo', '', '84000', null, null, '50', 'linkdownload', '3', null, null, '2015-03-31 04:49:40', '', null, null, null);
INSERT INTO `books` VALUES ('39', '26', 'Làm Gì Khi Có Quá Nhiều Việc', 'kinh-te/lam-gi-khi-co-qua-nhieu-viec.jpg', 'lam-gi-khi-co-qua-nhieu-viec', '', '50000', null, null, '69', 'linkdownload', '5', null, null, '2015-03-31 04:56:09', '', null, null, null);
INSERT INTO `books` VALUES ('40', '26', 'Nghệ Thuật Đàm Phán Mới', 'kinh-te/dam-phan-moi.jpg', 'nghe-thuat-dam-phan-moi', '<p><strong>Nghệ Thuật Đàm Phán Mới</strong></p>\r\n\r\n<p><em>\"Chúng ta hãy bắt đầu lại, hãy nhớ phép lịch sự không phải là một dấu hiệu của sự yếu đuối. Sự chân thành cần được chứng minh. Hãy để chúng ta không bao giờ đàm phán vì run sợ. Hãy để chúng ta khôn', '50000', null, null, '69', 'linkdownload', '5', null, null, '2015-03-31 04:58:22', '', null, null, null);
INSERT INTO `books` VALUES ('41', '26', 'Trở Thành Đức Phật Trong Công Việc', 'kinh-te/tro-thanh-duc-phat-trong-cong-viec.jpg', 'tro-thanh-duc-phat-trong-cong-viec', '<p><strong>Trở Thành Đức Phật Trong Công Việc</strong></p>\r\n\r\n<p>Suốt 25 thế kỷ qua, Đức Phật, người sáng lập ra đạo Phật, luôn được coi là một trong những nhà tư tưởng vĩ đại nhất của nhân loại. Triết lý của đạo Phật là BI (lòng từ bi, khoan dung, độ lượ', '50000', null, null, '66', 'linkdownload', '8', null, '1', '2015-03-31 05:01:03', '', null, null, null);
INSERT INTO `books` VALUES ('42', '26', 'Tiến Bước', 'kinh-te/tien-buoc.jpg', 'tien-buoc', '<p><strong>Tiến Bước</strong></p>\r\n\r\n<p>Howard Schultz - chủ tịch và tổng giám đốc của Starbucks, tác giả của cuốn Dốc Hết Trái Tim - chia sẻ những câu chuyện, kinh nghiệm và bài học từ khi ông quay trở lại với vai trò CEO của Starbucks từ năm 2008 để giú', '50000', null, null, '66', 'linkdownload', '8', null, null, '2015-03-31 05:01:51', '', null, null, null);
INSERT INTO `books` VALUES ('43', '26', 'Thế Giới Quả Là Rộng Lớn Và Có Rất Nhiều Việc Phải Làm', 'kinh-te/the-gioi-qua-la-rong-lon.jpg', 'the-gioi-qua-la-rong-lon-va-co-rat-nhieu-viec-phai-lam', '', '70000', null, null, '66', 'linkdownload', '8', null, null, '2015-03-31 05:02:52', '', null, null, null);
INSERT INTO `books` VALUES ('44', '26', 'Tương Lai Nghề Nghiệp Của Tôi', 'kinh-te/tuong-lai-nghe-nghiep-cua-toi.jpg', 'tuong-lai-nghe-nghiep-cua-toi', '<p><strong>Tương Lai Nghề Nghiệp Của Tôi</strong></p>\r\n\r\n<p><strong>“Theo bạn đâu là mục đích của công việc?”</strong></p>\r\n\r\n<p>Câu trả lời phổ biến nhất có lẽ là “để tìm kiếm niềm vui trong cuộc sống”. Nhưng nếu câu hỏi này được thay đổi đi một chút thà', '70000', null, null, '66', 'linkdownload', '8', null, '1', '2015-03-31 05:03:38', '', null, null, null);
INSERT INTO `books` VALUES ('45', '26', 'Quảng Cáo Facebook Từ A Đến Z', 'kinh-te/quang-cao-facebook-tu-a-den-z.jpg', 'quang-cao-facebook-tu-a-den-z', '', '70000', null, null, '66', 'linkdownload', '8', null, null, '2015-03-31 05:04:34', '', null, null, null);
INSERT INTO `books` VALUES ('46', '26', 'Điểm Khủng Hoảng', 'kinh-te/diem-khung-hoang.jpg', 'diem-khung-hoang', '', '70000', null, null, '66', 'linkdownload', '8', null, null, '2015-03-31 05:05:30', '', null, null, null);
INSERT INTO `books` VALUES ('47', '26', 'Thuê Ngoài Từ A Đến Z', 'kinh-te/img842_2.jpg', 'thue-ngoai-tu-a-den-z', '', '70000', null, null, '66', 'linkdownload', '8', null, '1', '2015-03-31 05:06:16', '', null, null, null);
INSERT INTO `books` VALUES ('48', '26', 'Quản Trị Học Vui Vẻ', 'kinh-te/quan-tri-hoc-vui-ve.jpg', 'quan-tri-hoc-vui-ve', '', '55000', null, null, '66', 'linkdownload', '8', null, '1', '2015-03-31 05:07:10', '', null, null, null);
INSERT INTO `books` VALUES ('49', '25', 'Kiếp Này Em Từng Có Anh', 'van-hoc/kiep-nay-em-tung-co-anh.jpg', 'kiep-nay-em-tung-co-anh', '<p><strong>Kiếp Này Em Từng Có Anh</strong></p>\r\n\r\n<p>Câu chuyện nhắc tới rất nhiều chi tiết xoay quanh một bức tranh (2000 mảnh ghép lại) có tên là “Bầu trời Cherbourg” (tiếng Trung có nghĩa là bầu trời phía trên lâu đài tuyết). Đó là một bức tranh phong', '71000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:32:59', '', null, null, null);
INSERT INTO `books` VALUES ('50', '25', 'Nợ Đời', 'van-hoc/no-doi.jpg', 'no-doi', '<p><strong>Nợ Đời</strong></p>\r\n\r\n<p>Hồ Biểu Chánh là một nhà văn lớn của Nam Bộ, người có công mở đường cho nền tiểu thuyết Việt Nam hiện đại. Người đương thời và nhiều thế hệ về sau đã đón nhận tác phẩm Hồ Biểu Chánh với tất cả sự nồng nhiệt, trân trọng', '71000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:33:59', '', null, null, null);
INSERT INTO `books` VALUES ('51', '25', 'Con Nhà Giàu', 'van-hoc/con-nha-giau.jpg', 'con-nha-giau', '<p><strong>Con Nhà Giàu</strong></p>\r\n\r\n<p>Hồ Biểu Chánh là một nhà văn lớn của Nam Bộ, người có công mở đường cho nền tiểu thuyết Việt Nam hiện đại. Người đương thời và nhiều thế hệ về sau đã đón nhận tác phẩm Hồ Biểu Chánh với tất cả sự nồng nhiệt, trân', '71000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:35:12', '', null, null, null);
INSERT INTO `books` VALUES ('52', '25', 'Chúa Tàu Kim Quy', 'van-hoc/chua-tau-kim-quy.jpg', 'chua-tau-kim-quy', '<p><strong>Chúa Tàu Kim Quy</strong></p>\r\n\r\n<p>Hồ Biểu Chánh là một nhà văn lớn của Nam Bộ, người có công mở đường cho nền tiểu thuyết Việt Nam hiện đại. Người đương thời và nhiều thế hệ về sau đã đón nhận tác phẩm Hồ Biểu Chánh với tất cả sự nồng nhiệt, ', '38000', null, null, '89', 'linkdownload', '66', null, '1', '2015-03-31 05:36:20', '', null, null, null);
INSERT INTO `books` VALUES ('53', '25', 'Vì Nghĩa Vì Tình', 'van-hoc/vi-nghia-vi-tinh.jpg', 'vi-nghia-vi-tinh', '<p><strong>Vì Nghĩa Vì Tình</strong></p>\r\n\r\n<p>Hồ Biểu Chánh là một nhà văn lớn của Nam Bộ, người có công mở đường cho nền tiểu thuyết Việt Nam hiện đại. Người đương thời và nhiều thế hệ về sau đã đón nhận tác phẩm Hồ Biểu Chánh với tất cả sự nồng nhiệt, ', '45000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:37:37', '', null, null, null);
INSERT INTO `books` VALUES ('54', '25', 'Con Nhà Nghèo', 'van-hoc/con-nha-ngheo.jpg', 'con-nha-ngheo', '<p><strong>Con Nhà Nghèo</strong></p>\r\n\r\n<p>Hồ Biểu Chánh là một nhà văn lớn của Nam Bộ, người có công mở đường cho nền tiểu thuyết Việt Nam hiện đại. Người đương thời và nhiều thế hệ về sau đã đón nhận tác phẩm Hồ Biểu Chánh với tất cả sự nồng nhiệt, trâ', '45000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:38:41', '', null, null, null);
INSERT INTO `books` VALUES ('55', '25', 'Kẻ Làm Người Chịu', 'van-hoc/ke-lam-nguoi-chiu.jpg', 'ke-lam-nguoi-chiu', '<p><strong>Kẻ Làm Người Chịu</strong></p>\r\n\r\n<p>Hồ Biểu Chánh là một nhà văn lớn của Nam Bộ, người có công mở đường cho nền tiểu thuyết Việt Nam hiện đại. Người đương thời và nhiều thế hệ về sau đã đón nhận tác phẩm Hồ Biểu Chánh với tất cả sự nồng nhiệt,', '45000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:39:54', '', null, null, null);
INSERT INTO `books` VALUES ('56', '25', 'Chí Phèo Và Facebook', 'van-hoc/chi-pheo-va-facebook_1.jpg', 'chi-pheo-va-facebook', '<p><strong>Chí Phèo Và Facebook</strong></p>\r\n\r\n<p><strong>Võ Tòng Đánh Mèo&nbsp;</strong>(tên thật: Đinh Long, sinh năm 1982, cựu sinh viên Đại học Ngoại ngữ Hà Nội) - cây viết nổi tiếng bởi những tác phẩm hiện thực vừa hài hước vừa trầm lắng, được yêu t', '45000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:40:51', '', null, null, null);
INSERT INTO `books` VALUES ('57', '25', 'Theo Dấu Nhà Thơ', 'van-hoc/theo-dau-nha-tho.jpg', 'theo-dau-nha-tho', '<p><strong>Theo Dấu Nhà Thơ</strong></p>\r\n\r\n<p>Sau&nbsp;<strong>22 Tản Mạn</strong>, tác giả Võ Chân Cửu đã ra mắt tập sách&nbsp;<strong>Theo Dấu Nhà Thơ</strong>&nbsp;để phơi bày nguyên do tạo tác và sự xuất hiện của các bài thơ trước năm 1975 ở Sài Gòn ', '45000', null, null, '89', 'linkdownload', '66', null, '1', '2015-03-31 05:41:33', '', null, null, null);
INSERT INTO `books` VALUES ('58', '25', 'Không Gia Đình', 'van-hoc/khong-gia-dinh_4.jpg', 'khong-gia-dinh', '<p><strong>Không Gia Đình</strong></p>\r\n\r\n<p>Hector Malot (Hécto Malo) sinh năm 1830 ở miền Bắc nước Pháp. Ông là nhà văn chuyên viết tiểu thuyết được bạn đọc Pháp yêu mến.Trong các tác phẩm của Hector Malot: KHÔNG GIA ĐÌNH và TRONG GIA ĐÌNH là hai tác ph', '122000', null, null, '89', 'linkdownload', '66', null, '2', '2015-03-31 05:42:37', '', '1', '3', null);
INSERT INTO `books` VALUES ('59', '25', 'Ông Già Và Biển Cả', 'van-hoc/ong-gia-va-bien-ca_4.jpg', 'ong-gia-va-bien-ca', '<p><strong>Ông Già Và Biển Cả</strong></p>\r\n\r\n<p>Cùng với William Faulkner, Hemingway được xem là người khai sinh ra nền văn xuôi hiện đại Mỹ. Tầm ảnh hưởng của ông càng về cuối thế kỉ càng rõ nét. G.G. Marquez gọi ông là thầy và nhiều nhà văn Mỹ đương đạ', '122000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:43:26', '', null, null, null);
INSERT INTO `books` VALUES ('60', '25', 'Túp Lều Bác Tom', 'van-hoc/tup-leu-bac-tom.jpg', 'tup-leu-bac-tom', '<p><strong>Túp Lều Bác Tom</strong></p>\r\n\r\n<p><strong>Túp lều bác Tom</strong>&nbsp;ca ngợi những nô lệ da đen trung thực, biết tôn trọng phẩm giá con người như bác Tom, những người mẹ dũng cảm như Êlida, những thanh niên cương nghị, tha thiết với tự do n', '86000', null, null, '89', 'linkdownload', '66', null, '3', '2015-03-31 05:44:24', '', null, null, null);
INSERT INTO `books` VALUES ('61', '25', 'Những Tấm Lòng Cao Cả', 'van-hoc/nhung-tam-long-cao-ca_6.jpg', 'nhung-tam-long-cao-ca', '<p><strong>Những Tấm Lòng Cao Cả</strong></p>\r\n\r\n<p><em>\"Can đảm lên, người lính nhỏ của đạo quân mênh mông ấy! Sách vở là vũ khí của con, lớp học là đơn vị của con, trận địa là cả hoàn cầu, và chiến thắng là nền văn minh của nhân loại! Ôi, không bao giờ ', '86000', null, null, '89', 'linkdownload', '66', null, null, '2015-03-31 05:45:27', '', null, null, null);
INSERT INTO `books` VALUES ('62', '25', 'Chuyện Con Chuyện Cha', 'van-hoc/chuyen-con-chuyen-cha.jpg', 'chuyen-con-chuyen-cha', '<p><strong>Chuyện Con Chuyện Cha</strong></p>\r\n\r\n<p>Những chuyện trò như lời thủ thỉ của người cha với con trai và con gái của mình. Chỉ là chuyện lặt vặt hàng ngày, ăn cơm, học bài, trong nhà và ngoài đường phố nơi công cộng, nhưng khéo léo mang chứa nhữ', '44000', null, null, '89', 'linkdownload', '66', null, '1', '2015-03-31 05:46:39', '', null, null, null);

-- ----------------------------
-- Table structure for `books_orders`
-- ----------------------------
DROP TABLE IF EXISTS `books_orders`;
CREATE TABLE `books_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books_orders
-- ----------------------------
INSERT INTO `books_orders` VALUES ('1', '24', '1', '17');
INSERT INTO `books_orders` VALUES ('2', '23', '2', '17');
INSERT INTO `books_orders` VALUES ('3', '24', '1', '18');
INSERT INTO `books_orders` VALUES ('4', '23', '2', '18');
INSERT INTO `books_orders` VALUES ('5', '24', '1', '19');
INSERT INTO `books_orders` VALUES ('6', '23', '2', '19');
INSERT INTO `books_orders` VALUES ('7', '24', '1', '20');
INSERT INTO `books_orders` VALUES ('8', '24', '1', '21');
INSERT INTO `books_orders` VALUES ('9', '23', '2', '22');
INSERT INTO `books_orders` VALUES ('10', '28', '1', '23');
INSERT INTO `books_orders` VALUES ('11', '27', '1', '23');
INSERT INTO `books_orders` VALUES ('12', '26', '1', '23');
INSERT INTO `books_orders` VALUES ('13', '25', '1', '23');
INSERT INTO `books_orders` VALUES ('14', '28', '1', '24');
INSERT INTO `books_orders` VALUES ('15', '27', '1', '25');
INSERT INTO `books_orders` VALUES ('16', '23', '1', '26');
INSERT INTO `books_orders` VALUES ('17', '24', '1', '27');
INSERT INTO `books_orders` VALUES ('18', '28', '1', '28');
INSERT INTO `books_orders` VALUES ('19', '30', '1', '29');
INSERT INTO `books_orders` VALUES ('20', '37', '1', '30');
INSERT INTO `books_orders` VALUES ('21', '36', '1', '30');
INSERT INTO `books_orders` VALUES ('22', '62', '1', '31');
INSERT INTO `books_orders` VALUES ('23', '61', '2', '31');
INSERT INTO `books_orders` VALUES ('24', '60', '1', '31');
INSERT INTO `books_orders` VALUES ('25', '59', '1', '31');
INSERT INTO `books_orders` VALUES ('26', '62', '2', '32');
INSERT INTO `books_orders` VALUES ('27', '26', '1', '32');
INSERT INTO `books_orders` VALUES ('28', '56', '2', '33');

-- ----------------------------
-- Table structure for `books_writers`
-- ----------------------------
DROP TABLE IF EXISTS `books_writers`;
CREATE TABLE `books_writers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `writer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books_writers
-- ----------------------------
INSERT INTO `books_writers` VALUES ('10', '16', '10');
INSERT INTO `books_writers` VALUES ('11', '20', '3');
INSERT INTO `books_writers` VALUES ('12', '20', '2');
INSERT INTO `books_writers` VALUES ('15', '23', '10');
INSERT INTO `books_writers` VALUES ('16', '24', '13');
INSERT INTO `books_writers` VALUES ('17', '25', '10');
INSERT INTO `books_writers` VALUES ('18', '26', '10');
INSERT INTO `books_writers` VALUES ('19', '27', '13');
INSERT INTO `books_writers` VALUES ('20', '28', '14');
INSERT INTO `books_writers` VALUES ('21', '29', '7');
INSERT INTO `books_writers` VALUES ('22', '30', '7');
INSERT INTO `books_writers` VALUES ('23', '31', '10');
INSERT INTO `books_writers` VALUES ('24', '32', '7');
INSERT INTO `books_writers` VALUES ('25', '33', '7');
INSERT INTO `books_writers` VALUES ('26', '34', '7');
INSERT INTO `books_writers` VALUES ('27', '35', '15');
INSERT INTO `books_writers` VALUES ('28', '36', '16');
INSERT INTO `books_writers` VALUES ('29', '37', '17');
INSERT INTO `books_writers` VALUES ('32', '38', '19');
INSERT INTO `books_writers` VALUES ('33', '38', '20');
INSERT INTO `books_writers` VALUES ('34', '39', '21');
INSERT INTO `books_writers` VALUES ('35', '40', '22');
INSERT INTO `books_writers` VALUES ('36', '41', '23');
INSERT INTO `books_writers` VALUES ('37', '42', '24');
INSERT INTO `books_writers` VALUES ('38', '43', '25');
INSERT INTO `books_writers` VALUES ('39', '44', '26');
INSERT INTO `books_writers` VALUES ('40', '45', '27');
INSERT INTO `books_writers` VALUES ('41', '46', '28');
INSERT INTO `books_writers` VALUES ('42', '47', '29');
INSERT INTO `books_writers` VALUES ('43', '48', '30');
INSERT INTO `books_writers` VALUES ('44', '49', '31');
INSERT INTO `books_writers` VALUES ('45', '50', '32');
INSERT INTO `books_writers` VALUES ('46', '51', '32');
INSERT INTO `books_writers` VALUES ('47', '52', '32');
INSERT INTO `books_writers` VALUES ('48', '53', '32');
INSERT INTO `books_writers` VALUES ('49', '54', '32');
INSERT INTO `books_writers` VALUES ('50', '55', '33');
INSERT INTO `books_writers` VALUES ('51', '56', '34');
INSERT INTO `books_writers` VALUES ('52', '57', '35');
INSERT INTO `books_writers` VALUES ('53', '58', '36');
INSERT INTO `books_writers` VALUES ('54', '59', '37');
INSERT INTO `books_writers` VALUES ('55', '60', '38');
INSERT INTO `books_writers` VALUES ('56', '61', '39');
INSERT INTO `books_writers` VALUES ('57', '62', '40');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('24', null, '11', '12', 'Giáo dục', '<p>Sách giáo dục</p>\r\n', 'giao-duc', '2015-03-25 09:13:28');
INSERT INTO `categories` VALUES ('25', null, '13', '14', 'Văn học', '', 'van-hoc', '2015-03-25 13:02:06');
INSERT INTO `categories` VALUES ('26', null, '15', '16', 'Kinh tế', '<p>Sách kinh tế</p>\r\n', 'kinh-te', '2015-03-25 13:02:22');
INSERT INTO `categories` VALUES ('27', null, '17', '18', 'Sách nước ngoài', '<p>Tuyển tập các sách văn học nước ngoài mới và hay</p>\r\n', 'sach-nuoc-ngoai', '2015-03-30 04:16:38');

-- ----------------------------
-- Table structure for `categories_users`
-- ----------------------------
DROP TABLE IF EXISTS `categories_users`;
CREATE TABLE `categories_users` (
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories_users
-- ----------------------------

-- ----------------------------
-- Table structure for `details`
-- ----------------------------
DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of details
-- ----------------------------
INSERT INTO `details` VALUES ('5', '1', 'ngay khong em', 'guest/noi-nao-co-y-chi-noi-do-co-con-duong.jpg', '', null, '2015-03-25 04:49:57', null);
INSERT INTO `details` VALUES ('6', '1', 'Tuổi trẻ năng động', 'guest/hat-giong-tam-hon-4.jpg', '<p>Sách nói về một cậu bé với ngoại hình không cao, song tinh thần quậy phá thì không ai sánh bằng. Với niềm đam mê cùng trái bóng cậu đã mang đến những trân đấu hết sức hấp dẫn và thú vị</p>\r\n', null, '2015-03-26 07:45:25', null);

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', null);
INSERT INTO `groups` VALUES ('2', 'manager', null);
INSERT INTO `groups` VALUES ('4', 'member', null);

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('2', '1', '2015-03-25 00:00:00', '2015-03-25 00:00:00', '90000', null);
INSERT INTO `orders` VALUES ('22', '1', '2015-03-25 00:00:00', '2015-01-25 00:00:00', '60000', null);
INSERT INTO `orders` VALUES ('23', '2', '2015-03-25 09:39:20', '2015-04-25 09:39:20', '132000', '');
INSERT INTO `orders` VALUES ('24', '2', '2015-03-25 09:40:05', '2015-03-25 09:40:05', '29000', '');
INSERT INTO `orders` VALUES ('25', '2', '2015-03-25 09:40:30', '2015-03-25 09:40:30', '29000', '');
INSERT INTO `orders` VALUES ('26', '2', '2015-03-25 09:41:13', '2015-08-25 09:41:13', '30000', '');
INSERT INTO `orders` VALUES ('27', '2', '2015-03-25 09:42:12', '2015-02-25 09:42:12', '30000', '');
INSERT INTO `orders` VALUES ('28', '2', '2015-03-25 12:50:06', '2015-02-25 12:50:06', '29000', null);
INSERT INTO `orders` VALUES ('29', '1', '2015-03-27 05:05:36', '2015-06-27 05:05:36', '39000', null);
INSERT INTO `orders` VALUES ('30', '1', '2015-03-30 09:43:22', '2015-03-30 09:43:22', '100000', '');
INSERT INTO `orders` VALUES ('31', '1', '2015-03-31 06:32:57', '2015-03-31 06:32:57', '424000', '');
INSERT INTO `orders` VALUES ('32', '9', '2015-03-31 17:07:04', '2015-03-31 17:07:04', '117000', null);
INSERT INTO `orders` VALUES ('33', '9', '2015-03-31 17:09:50', '2015-03-31 17:09:50', '90000', null);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `actived` bit(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `change_good` int(11) DEFAULT NULL,
  `change_bad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '4', 'butchigho', 'e10adc3949ba59abbe56e057f20f883e', 'Quy Hoa', 'test@gmail.com', '99 pham nhu xuong da nang', null, '', '2015-03-23 05:18:30', null, '2015-03-23 05:18:30', null, null);
INSERT INTO `users` VALUES ('2', '1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Hoa Than', 'admin@gmail.com', null, null, '', null, null, null, null, null);
INSERT INTO `users` VALUES ('4', '2', 'test', 'e10adc3949ba59abbe56e057f20f883e', null, 'test@gmail.com', '', null, null, '2015-03-23 14:21:57', '', '2015-03-23 14:21:57', null, null);
INSERT INTO `users` VALUES ('7', '4', 'test4', 'e10adc3949ba59abbe56e057f20f883e', 'test4', 'test4@gmail.com', 'da nang', 'e98dab7fad9f151a43a8171d0a15701d', null, '2015-03-25 10:03:11', null, '2015-03-25 10:03:11', null, null);
INSERT INTO `users` VALUES ('8', '4', 'hongyen', '85e15e6268eb7b442bd0c429761f85be', 'thai thi hong yen', 'hongyen9530@gmail.com', '99 pham nhu xuong da nang', 'aaa72e7381465351d18c7b6d63010518', null, '2015-03-27 05:35:35', null, '2015-03-27 05:35:35', null, null);
INSERT INTO `users` VALUES ('10', '4', 'viet', 'ce27b0d79347eee0b985e034d5211cea', 'ngo thi viet', 'ngothivietqn@gmail.com', 'quang nam', null, '', '2015-04-01 02:07:29', null, '2015-04-01 02:07:29', null, null);

-- ----------------------------
-- Table structure for `usersonlines`
-- ----------------------------
DROP TABLE IF EXISTS `usersonlines`;
CREATE TABLE `usersonlines` (
  `id` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(255) DEFAULT NULL,
  `brower` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usersonlines
-- ----------------------------

-- ----------------------------
-- Table structure for `votes`
-- ----------------------------
DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `vote_good` int(11) DEFAULT NULL,
  `vote_bad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of votes
-- ----------------------------
INSERT INTO `votes` VALUES ('1', '22', '9', '1');

-- ----------------------------
-- Table structure for `writers`
-- ----------------------------
DROP TABLE IF EXISTS `writers`;
CREATE TABLE `writers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `biography` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of writers
-- ----------------------------
INSERT INTO `writers` VALUES ('2', 'ga moi', 'ga-moi', null, null);
INSERT INTO `writers` VALUES ('3', 'Quy Hoa', 'quy-hoa', 'Đang cập nhật', '2015-03-19 21:33:33');
INSERT INTO `writers` VALUES ('4', 'Ga Con', 'ga-con', 'Đang cập nhật', '2015-03-19 21:34:14');
INSERT INTO `writers` VALUES ('5', 'Ma Cao', 'ma-cao', 'Đang cập nhật', '2015-03-19 21:42:23');
INSERT INTO `writers` VALUES ('6', 'Van Cao', 'van-cao', 'Đang cập nhật', '2015-03-19 21:42:23');
INSERT INTO `writers` VALUES ('8', 'Quyhoa', 'quyhoa', 'Đang cập nhật', '2015-03-19 23:32:53');
INSERT INTO `writers` VALUES ('9', 'A Hoa', 'a-hoa', 'Đang cập nhật', '2015-03-20 16:44:45');
INSERT INTO `writers` VALUES ('10', 'Chưa Biết', 'chua-biet', 'Đang cập nhật', '2015-03-22 04:47:55');
INSERT INTO `writers` VALUES ('11', 'Ca Tim', 'ca-tim', 'Đang cập nhật', '2015-03-22 05:13:38');
INSERT INTO `writers` VALUES ('12', 'Nam Cao', 'nam-cao', 'Đang cập nhật', '2015-03-24 09:28:45');
INSERT INTO `writers` VALUES ('17', 'But Chi Gho', 'but-chi-gho', 'Đang cập nhật', '2015-03-30 04:46:35');
INSERT INTO `writers` VALUES ('18', 'But Chi Mau', 'but-chi-mau', 'Đang cập nhật', '2015-03-30 04:47:15');
INSERT INTO `writers` VALUES ('19', 'Steve Forbes', 'steve-forbes', 'Đang cập nhật', '2015-03-31 04:50:26');
INSERT INTO `writers` VALUES ('20', 'John Prevas', 'john-prevas', 'Đang cập nhật', '2015-03-31 04:50:26');
INSERT INTO `writers` VALUES ('21', 'Laura Stack', 'laura-stack', 'Đang cập nhật', '2015-03-31 04:56:09');
INSERT INTO `writers` VALUES ('22', 'Gerand I', 'gerand-i', 'Đang cập nhật', '2015-03-31 04:58:22');
INSERT INTO `writers` VALUES ('23', 'Franz Metcalf-BJ Gallagher', 'franz-metcalf-bj-gallagher', 'Đang cập nhật', '2015-03-31 05:01:03');
INSERT INTO `writers` VALUES ('25', 'Kim Woo Choong', 'kim-woo-choong', 'Đang cập nhật', '2015-03-31 05:02:52');
INSERT INTO `writers` VALUES ('27', 'Trung Đức', 'trung-duc', 'Đang cập nhật', '2015-03-31 05:04:33');
INSERT INTO `writers` VALUES ('28', 'Brian Tracy', 'brian-tracy', 'Đang cập nhật', '2015-03-31 05:05:30');
INSERT INTO `writers` VALUES ('30', 'Vũ Thái Hà', 'vu-thai-ha', 'Đang cập nhật', '2015-03-31 05:07:10');
INSERT INTO `writers` VALUES ('31', 'Trương Tiểu Nhàn', 'truong-tieu-nhan', 'Đang cập nhật', '2015-03-31 05:32:59');
INSERT INTO `writers` VALUES ('32', 'Hồ Biểu Chánh', 'ho-bieu-chanh', 'Đang cập nhật', '2015-03-31 05:33:59');
INSERT INTO `writers` VALUES ('34', 'Võ Tòng Đánh Mèo', 'vo-tong-danh-meo', 'Đang cập nhật', '2015-03-31 05:40:50');
INSERT INTO `writers` VALUES ('35', 'Võ Chân Cửu', 'vo-chan-cuu', 'Đang cập nhật', '2015-03-31 05:41:32');
INSERT INTO `writers` VALUES ('36', 'Hector Malot', 'hector-malot', 'Đang cập nhật', '2015-03-31 05:42:37');
INSERT INTO `writers` VALUES ('37', 'Ernest Hemingway', 'ernest-hemingway', 'Đang cập nhật', '2015-03-31 05:43:26');
INSERT INTO `writers` VALUES ('38', 'Harriet Beecher Stowe', 'harriet-beecher-stowe', 'Đang cập nhật', '2015-03-31 05:44:24');
INSERT INTO `writers` VALUES ('39', 'Edmondo De Amicis', 'edmondo-de-amicis', 'Đang cập nhật', '2015-03-31 05:45:27');
INSERT INTO `writers` VALUES ('40', 'Phúc Lai', 'phuc-lai', 'Đang cập nhật', '2015-03-31 05:46:39');
