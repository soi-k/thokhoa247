<?php
/**
 * Nội dung mẫu / mặc định dùng làm fallback khi admin chưa nhập ACF.
 * Tất cả nội dung tiếng Việt dưới đây CHỈ là placeholder, hãy vào
 * Tùy biến qua ACF (nếu đã cài plugin) để thay đổi mà không cần sửa code.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Thông tin liên hệ chung
 */
function thokhoa247_default_contact() {
	return array(
		'hotline'        => '0919.188.881',
		'hotline_mien_nam' => '0981.51.50.50',
		'hotline_mien_bac' => '0919.188.881',
		'working_hours' => '24/24',
	);
}

/**
 * 3 dịch vụ nổi bật (section ngay dưới hero)
 */
function thokhoa247_default_services_featured() {
	return array(
		array(
			'title' => 'Báo giá làm chìa khóa ô tô tại nhà',
			'desc'  => 'Đội ngũ kỹ thuật viên có mặt tận nơi, làm chìa khóa ô tô chính hãng, giá niêm yết rõ ràng.',
			'link'  => '#',
		),
		array(
			'title' => 'Sửa khóa cửa cuốn',
			'desc'  => 'Xử lý mọi sự cố cửa cuốn bị kẹt, motor hỏng, remote mất tín hiệu, có mặt sau 15 phút.',
			'link'  => '#',
		),
		array(
			'title' => 'Sửa khóa điện tử, khóa vân tay',
			'desc'  => 'Bảo trì, sửa chữa và cài đặt lại khóa điện tử, khóa vân tay các thương hiệu phổ biến.',
			'link'  => '#',
		),
	);
}

/**
 * Lưới 8 dịch vụ (icon grid nền hồng nhạt)
 */
function thokhoa247_default_services_grid() {
	return array(
		array( 'title' => 'Khóa ô tô', 'desc' => 'Làm chìa, sửa khóa, lập trình lại chìa khóa ô tô mọi hãng xe.' ),
		array( 'title' => 'Sửa khóa cửa', 'desc' => 'Sửa, thay thế khóa cửa nhà, cửa phòng các loại khóa cơ, khóa số.' ),
		array( 'title' => 'Sửa khóa két sắt', 'desc' => 'Mở khóa két sắt bị kẹt, quên mã, hỏng động cơ - không phá két.' ),
		array( 'title' => 'Sửa khóa xe máy', 'desc' => 'Làm lại chìa khóa xe máy, sửa ổ khóa bị gãy, kẹt, mất chìa.' ),
		array( 'title' => 'Sửa khóa mở máy', 'desc' => 'Sửa chữa hệ thống khóa mở máy ô tô, xe máy đời mới.' ),
		array( 'title' => 'Sửa khóa cửa cuốn', 'desc' => 'Sửa cửa cuốn, motor, remote, ray trượt cửa cuốn.' ),
		array( 'title' => 'Sao chép thẻ thang máy lấy ngay', 'desc' => 'Sao chép thẻ từ thang máy, thẻ chung cư, lấy ngay trong 15 phút.' ),
		array( 'title' => 'Sửa khóa Hall cấp số', 'desc' => 'Sửa, thay khóa Hall cấp số cho cửa cuốn công nghiệp.' ),
	);
}

/**
 * Vì sao chọn chúng tôi (3 cột trong section giới thiệu)
 */
function thokhoa247_default_why_choose_us() {
	return array(
		array(
			'title' => 'Dịch vụ chuyên nghiệp',
			'desc'  => 'Đội ngũ kỹ thuật viên được đào tạo bài bản, trang thiết bị hiện đại, xử lý nhanh gọn.',
		),
		array(
			'title' => 'Giá cả cạnh tranh',
			'desc'  => 'Báo giá rõ ràng trước khi thực hiện, không phát sinh chi phí ẩn.',
		),
		array(
			'title' => 'Cứu hộ lưu động 24/24',
			'desc'  => 'Sẵn sàng phục vụ mọi lúc, có mặt nhanh trong vòng 15 phút.',
		),
	);
}

/**
 * Danh sách quận mặc định cho 2 khu vực Hà Nội / Sài Gòn
 * (dùng khi chưa tạo term + bài viết gắn taxonomy "khu-vuc").
 */
function thokhoa247_default_areas( $city = 'ha-noi' ) {
	if ( 'sai-gon' === $city ) {
		return array(
			'Quận 1', 'Quận 3', 'Quận 4', 'Quận 5',
			'Quận 7', 'Quận 8', 'Quận 10', 'Quận 11',
			'Quận 12', 'Tân Bình', 'Bình Thạnh', 'Bình Tân',
		);
	}

	return array(
		'Hoàn Kiếm', 'Đống Đa', 'Ba Đình', 'Cầu Giấy',
		'Thanh Xuân', 'Hai Bà Trưng', 'Hà Đông', 'Nam Từ Liêm',
		'Long Biên', 'Hoàng Mai', 'Tây Hồ', 'Gia Lâm',
	);
}

/**
 * Đánh giá khách hàng mặc định (fallback khi chưa có post CPT danh-gia)
 */
function thokhoa247_default_testimonials() {
	return array(
		array(
			'name'    => 'Chị Bích Hiền',
			'role'    => 'Long Biên - Hà Nội',
			'content' => 'Gọi lúc 9h tối mà thợ đến sau 10 phút, sửa khóa cửa cuốn rất nhanh và giá hợp lý. Sẽ giới thiệu cho mọi người.',
		),
		array(
			'name'    => 'Anh Phan Trung Thông',
			'role'    => 'Cầu Giấy - Hà Nội',
			'content' => 'Mất chìa khóa ô tô tưởng phải mang ra hãng, gọi Thợ Khóa 247 làm lại chìa mới ngay tại nhà, tiết kiệm thời gian.',
		),
	);
}

/**
 * Hệ thống cửa hàng (footer)
 */
function thokhoa247_default_stores( $city = 'ha-noi' ) {
	if ( 'ho-chi-minh' === $city ) {
		return array(
			'CS1: 201/96 Nguyễn Xí, P26, Bình Thạnh, HCM',
			'CS2: Điện Biên Phủ, P15, Bình Thạnh, HCM',
			'CS3: Cầu Xéo, P.Tân Quý, Tân Phú, HCM',
			'CS4: Phạm Thế Hiển, P5, Quận 8, HCM',
			'CS5: Tân Hoà Đông, Bình Trị Đông, Bình Tân, HCM',
		);
	}

	return array(
		'CS1: 205 Giáp Nhất, Thanh Xuân, Hà Nội',
		'CS2: Xã Đàn, Đống Đa, Hà Nội',
		'CS3: Lạc Long Quân, Tây Hồ, Hà Nội',
		'CS4: Trần Nhật Duật, Hoàn Kiếm, Hà Nội',
		'CS5: Nguyễn Văn Cừ, Long Biên, Hà Nội',
	);
}
