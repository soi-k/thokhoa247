<?php
/**
 * Đăng ký các field group ACF (Advanced Custom Fields) cho theme.
 * Chỉ chạy khi plugin ACF (free hoặc Pro) đang hoạt động.
 * Toàn bộ field dưới đây là tuỳ chọn - nếu để trống, theme sẽ
 * dùng nội dung mặc định trong inc/default-content.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/init', 'thokhoa247_register_acf_fields' );

function thokhoa247_register_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// ---- Tuỳ chọn trang chủ (Options Page) ----
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page(
			array(
				'page_title' => 'Tuỳ chỉnh trang chủ',
				'menu_title' => 'Trang chủ',
				'menu_slug'  => 'thokhoa247-trang-chu',
				'capability' => 'edit_posts',
			)
		);
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_trang_chu',
			'title'    => 'Trang chủ - Hero & Giới thiệu',
			'fields'   => array(
				array(
					'key'        => 'field_hero_slides',
					'label'      => 'Banner trang chủ (Slider)',
					'name'       => 'hero_slides',
					'type'       => 'repeater',
					'layout'     => 'block',
					'button_label' => 'Thêm banner',
					'sub_fields' => array(
						array(
							'key'   => 'field_hero_slide_title',
							'label' => 'Tiêu đề',
							'name'  => 'title',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_hero_slide_subtitle',
							'label' => 'Phụ đề',
							'name'  => 'subtitle',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_hero_slide_image',
							'label' => 'Ảnh banner',
							'name'  => 'image',
							'type'  => 'image',
							'return_format' => 'url',
						),
						array(
							'key'   => 'field_hero_slide_link',
							'label' => 'Đường dẫn (khi bấm vào banner)',
							'name'  => 'link',
							'type'  => 'url',
						),
					),
				),
				array(
					'key'   => 'field_about_image',
					'label' => 'Ảnh giới thiệu',
					'name'  => 'about_image',
					'type'  => 'image',
					'return_format' => 'url',
				),
				array(
					'key'   => 'field_about_content',
					'label' => 'Nội dung giới thiệu',
					'name'  => 'about_content',
					'type'  => 'wysiwyg',
				),
				array(
					'key'        => 'field_gallery_cua_hang',
					'label'      => 'Hình ảnh cửa hàng',
					'name'       => 'gallery_cua_hang',
					'type'       => 'gallery',
					'return_format' => 'url',
				),
				array(
					'key'        => 'field_gallery_du_an',
					'label'      => 'Hình ảnh dự án',
					'name'       => 'gallery_du_an',
					'type'       => 'gallery',
					'return_format' => 'url',
				),
				array(
					'key'   => 'field_zalo_so',
					'label' => 'Số điện thoại Zalo (cho nút chat nổi)',
					'name'  => 'zalo_so',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'thokhoa247-trang-chu',
					),
				),
			),
		)
	);

	// ---- Sản phẩm: giá, thông số kỹ thuật ----
	acf_add_local_field_group(
		array(
			'key'      => 'group_san_pham',
			'title'    => 'Thông tin sản phẩm',
			'fields'   => array(
				array(
					'key'   => 'field_gia_sale',
					'label' => 'Giá bán (đã giảm)',
					'name'  => 'gia_sale',
					'type'  => 'number',
				),
				array(
					'key'   => 'field_gia_goc',
					'label' => 'Giá gốc (chưa giảm)',
					'name'  => 'gia_goc',
					'type'  => 'number',
				),
				array(
					'key'        => 'field_thumbnails',
					'label'      => 'Ảnh thumbnail (chi tiết sản phẩm)',
					'name'       => 'thumbnails',
					'type'       => 'gallery',
					'return_format' => 'url',
				),
				array(
					'key'        => 'field_thong_so',
					'label'      => 'Thông số kỹ thuật',
					'name'       => 'thong_so',
					'type'       => 'repeater',
					'layout'     => 'table',
					'button_label' => 'Thêm thông số',
					'sub_fields' => array(
						array(
							'key'   => 'field_thong_so_ten',
							'label' => 'Tên thông số',
							'name'  => 'ten',
							'type'  => 'text',
						),
						array(
							'key'   => 'field_thong_so_gia_tri',
							'label' => 'Giá trị',
							'name'  => 'gia_tri',
							'type'  => 'text',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'san-pham',
					),
				),
			),
		)
	);

	// ---- Đánh giá khách hàng ----
	acf_add_local_field_group(
		array(
			'key'    => 'group_danh_gia',
			'title'  => 'Thông tin đánh giá',
			'fields' => array(
				array(
					'key'   => 'field_danh_gia_vai_tro',
					'label' => 'Vai trò / Khu vực',
					'name'  => 'vai_tro',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'danh-gia',
					),
				),
			),
		)
	);
}
