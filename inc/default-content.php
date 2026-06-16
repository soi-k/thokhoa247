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
		'zalo'          => '0919188881',
	);
}

/**
 * Hero slider mặc định (dùng khi chưa nhập ACF repeater "hero_slides").
 */
function thokhoa247_default_hero_slides() {
	return array(
		array(
			'title'    => 'DỊCH VỤ SỬA KHÓA TẠI NHÀ',
			'subtitle' => 'Chuyên nghiệp - Nhanh, phục vụ 24/7 - Giá cạnh tranh - Phục vụ tận tâm, uy tín',
			'image'    => get_template_directory_uri() . '/assets/images/hero-placeholder.svg',
			'link'     => '#',
		),
		array(
			'title'    => 'LÀM CHÌA KHÓA Ô TÔ',
			'subtitle' => 'Phôi chìa chất lượng - Phục vụ tại nhà - Rẻ hơn giá hãng nhiều lần',
			'image'    => get_template_directory_uri() . '/assets/images/hero-placeholder.svg',
			'link'     => '#',
		),
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
 * Lưới 9 dịch vụ (icon grid nền đỏ parallax) - theo thứ tự web gốc
 */
function thokhoa247_default_services_grid() {
	return array(
		array( 'title' => 'Khóa Ô Tô',                              'desc' => 'Thợ Khóa 247 là đơn vị thợ khóa ô tô uy tín tại Hà Nội, Hồ Chí Minh. Cung cấp tất cả các dịch vụ làm chìa, sửa khóa, lập trình chìa khóa ô tô mọi hãng.',              'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sửa Khóa Cửa',                           'desc' => 'Thợ Khóa 247 sửa khóa cửa tại nhà, sửa khóa văn phòng, cơ quan trong tại Hà Nội, HCM. Dịch vụ nhanh nhất, giá tốt.',                                                      'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sửa Khóa Két Sắt',                       'desc' => 'Dịch vụ sửa khóa két sắt nhanh, an toàn, giá rẻ. Thợ Khóa 247 chuyên khóa két sắt: mở khóa, đánh chìa khóa, sửa khóa.',                                                   'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sửa Khóa Tủ',                            'desc' => 'Thợ Khóa 247 cung cấp dịch vụ sửa khóa tủ văn phòng, gia đình tại Hà Nội, HCM. Uy tín, chất lượng, giá rẻ.',                                                               'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sửa Khóa Xe Máy',                        'desc' => 'Thợ Khóa 247 chuyên làm chìa, sửa khóa xe máy, đánh chìa khóa xe máy chuyên nghiệp, giá rẻ tại Hà Nội, HCM.',                                                              'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sửa Khóa Cửa Cuốn',                      'desc' => 'Thợ Khóa 247 chuyên sửa khóa cửa cuốn, làm điều khiển cửa cuốn chuyên nghiệp, giá rẻ. Đặc biệt, phục vụ tận nơi 24/24.',                                                   'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sao Chép Thẻ Từ Thang Máy Tận Nơi Lấy Ngay [Chỉ Từ 30K]', 'desc' => 'Bạn đang cần tìm địa chỉ sao chép thẻ từ thang máy tận nơi cho số lượng nhỏ, lớn? Hãy để chúng tôi giúp bạn.',                                          'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sửa Khóa Vali, Cặp Số',                  'desc' => 'Thợ Khóa 247 chuyên sửa khóa vali, cặp số an toàn, hiệu quả, tiết kiệm. Liên hệ ngay: 0919.188.881.',                                                                      'link' => '#', 'icon' => '' ),
		array( 'title' => 'Sửa Khóa Điện Tử, Khóa Vân Tay',        'desc' => 'Nhận sửa chữa, lắp đặt khóa điện tử, khóa vân tay trên địa bàn Hà Nội, Hồ Chí Minh. Phục vụ tận nơi, 24/7.',                                                              'link' => '#', 'icon' => '' ),
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
			array( 'name' => 'Quận 1',   'caption' => 'Sửa Khóa Quận 1' ),
			array( 'name' => 'Quận 3',   'caption' => 'Sửa Khóa Quận 3' ),
			array( 'name' => 'Quận 4',   'caption' => 'Sửa Khóa Quận 4' ),
			array( 'name' => 'Quận 5',   'caption' => 'Sửa Khóa Quận 5' ),
			array( 'name' => 'Quận 6',   'caption' => 'Sửa Khóa Quận 6' ),
			array( 'name' => 'Quận 7',   'caption' => 'Sửa Khóa Quận 7' ),
			array( 'name' => 'Quận 8',   'caption' => 'Sửa Khóa Quận 8' ),
			array( 'name' => 'Quận 10',  'caption' => 'Sửa Khóa Quận 10' ),
			array( 'name' => 'Quận 11',  'caption' => 'Sửa Khóa Quận 11' ),
			array( 'name' => 'Quận 12',  'caption' => 'Sửa Khóa Quận 12' ),
			array( 'name' => 'Tân Bình', 'caption' => 'Sửa Khóa Quận Tân Bình' ),
			array( 'name' => 'Bình Tân', 'caption' => 'Sửa Khóa Quận Bình Tân' ),
		);
	}

	return array(
		array( 'name' => 'Hoàn Kiếm',   'caption' => 'Sửa Khóa Quận Hoàn Kiếm' ),
		array( 'name' => 'Đống Đa',     'caption' => 'Sửa Khóa Quận Đống Đa' ),
		array( 'name' => 'Ba Đình',     'caption' => 'Sửa Khóa Quận Ba Đình' ),
		array( 'name' => 'Cầu Giấy',    'caption' => 'Sửa Khóa Quận Cầu Giấy' ),
		array( 'name' => 'Thanh Xuân',  'caption' => 'Sửa Khóa Quận Thanh Xuân' ),
		array( 'name' => 'Hai Bà Trưng','caption' => 'Sửa Khóa Quận Hai Bà Trưng' ),
		array( 'name' => 'Tây Hồ',      'caption' => 'Sửa Khóa Quận Tây Hồ' ),
		array( 'name' => 'Hà Đông',     'caption' => 'Sửa Khóa Quận Hà Đông' ),
		array( 'name' => 'Long Biên',   'caption' => 'Sửa Khóa Quận Long Biên' ),
		array( 'name' => 'Hoàng Mai',   'caption' => 'Sửa Khóa Quận Hoàng Mai' ),
		array( 'name' => 'Từ Liêm',     'caption' => 'Sửa Khóa Huyện Từ Liêm' ),
		array( 'name' => 'Gia Lâm',     'caption' => 'Sửa Khóa Huyện Gia Lâm' ),
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
