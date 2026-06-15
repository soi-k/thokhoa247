<?php
/**
 * Thợ Khóa 247 theme functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'THOKHOA247_VERSION', '1.0.0' );

/**
 * Theme setup
 */
function thokhoa247_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'menus' );

	register_nav_menus(
		array(
			'primary' => __( 'Menu chính', 'thokhoa247' ),
			'footer'  => __( 'Menu footer', 'thokhoa247' ),
		)
	);
}
add_action( 'after_setup_theme', 'thokhoa247_setup' );

/**
 * Enqueue styles & scripts
 */
function thokhoa247_assets() {
	wp_enqueue_style( 'thokhoa247-style', get_stylesheet_uri(), array(), THOKHOA247_VERSION );
	wp_enqueue_style( 'thokhoa247-main', get_template_directory_uri() . '/assets/css/style.css', array(), THOKHOA247_VERSION );
	wp_enqueue_script( 'thokhoa247-main', get_template_directory_uri() . '/assets/js/main.js', array(), THOKHOA247_VERSION, true );

	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thokhoa247_assets' );

/**
 * Custom Post Type: Sản phẩm
 */
function thokhoa247_register_cpt_san_pham() {
	register_post_type(
		'san-pham',
		array(
			'labels'        => array(
				'name'          => __( 'Sản phẩm', 'thokhoa247' ),
				'singular_name' => __( 'Sản phẩm', 'thokhoa247' ),
				'add_new_item'  => __( 'Thêm sản phẩm mới', 'thokhoa247' ),
				'edit_item'     => __( 'Sửa sản phẩm', 'thokhoa247' ),
				'all_items'     => __( 'Tất cả sản phẩm', 'thokhoa247' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'menu_icon'     => 'dashicons-admin-network',
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'san-pham' ),
			'menu_position' => 5,
		)
	);

	register_taxonomy(
		'loai-san-pham',
		'san-pham',
		array(
			'labels'            => array(
				'name'          => __( 'Loại sản phẩm', 'thokhoa247' ),
				'singular_name' => __( 'Loại sản phẩm', 'thokhoa247' ),
			),
			'public'            => true,
			'show_in_rest'      => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'loai-san-pham' ),
		)
	);
}
add_action( 'init', 'thokhoa247_register_cpt_san_pham' );

/**
 * Custom Post Type: Đánh giá khách hàng
 */
function thokhoa247_register_cpt_danh_gia() {
	register_post_type(
		'danh-gia',
		array(
			'labels'       => array(
				'name'          => __( 'Đánh giá khách hàng', 'thokhoa247' ),
				'singular_name' => __( 'Đánh giá', 'thokhoa247' ),
				'add_new_item'  => __( 'Thêm đánh giá mới', 'thokhoa247' ),
				'edit_item'     => __( 'Sửa đánh giá', 'thokhoa247' ),
				'all_items'     => __( 'Tất cả đánh giá', 'thokhoa247' ),
			),
			'public'       => false,
			'show_ui'      => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-star-filled',
			'supports'     => array( 'title', 'editor', 'thumbnail' ),
		)
	);
}
add_action( 'init', 'thokhoa247_register_cpt_danh_gia' );

/**
 * Taxonomy: Khu vực phục vụ (gắn cho post thường, dùng cho section "Sửa khóa tại Hà Nội / Sài Gòn")
 */
function thokhoa247_register_taxonomy_khu_vuc() {
	register_taxonomy(
		'khu-vuc',
		array( 'post' ),
		array(
			'labels'       => array(
				'name'          => __( 'Khu vực', 'thokhoa247' ),
				'singular_name' => __( 'Khu vực', 'thokhoa247' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => 'khu-vuc' ),
		)
	);

	// Hai nhóm cha mặc định: Hà Nội & Sài Gòn (chạy 1 lần khi theme activate).
	if ( ! term_exists( 'sua-khoa-tai-ha-noi', 'khu-vuc' ) ) {
		wp_insert_term( 'Sửa khóa tại Hà Nội', 'khu-vuc', array( 'slug' => 'sua-khoa-tai-ha-noi' ) );
	}
	if ( ! term_exists( 'sua-khoa-tai-sai-gon', 'khu-vuc' ) ) {
		wp_insert_term( 'Sửa khóa tại Sài Gòn', 'khu-vuc', array( 'slug' => 'sua-khoa-tai-sai-gon' ) );
	}
}
add_action( 'init', 'thokhoa247_register_taxonomy_khu_vuc' );

/**
 * Loại sản phẩm "Bán chạy" / "Khóa đồng" mặc định
 */
function thokhoa247_register_default_terms() {
	if ( ! term_exists( 'ban-chay', 'loai-san-pham' ) ) {
		wp_insert_term( 'Bán chạy', 'loai-san-pham', array( 'slug' => 'ban-chay' ) );
	}
	if ( ! term_exists( 'khoa-dong', 'loai-san-pham' ) ) {
		wp_insert_term( 'Khóa đồng', 'loai-san-pham', array( 'slug' => 'khoa-dong' ) );
	}
}
add_action( 'init', 'thokhoa247_register_default_terms', 11 );

/**
 * ACF field groups (chỉ đăng ký nếu plugin Advanced Custom Fields đã được cài).
 * Các field dùng cho hero, dịch vụ nổi bật, lưới dịch vụ, giới thiệu, đánh giá,
 * gallery cửa hàng/dự án và thông số kỹ thuật sản phẩm.
 */
require_once get_template_directory() . '/inc/acf-fields.php';

/**
 * Theme options mặc định (dùng làm fallback khi chưa nhập ACF) như hotline,
 * giờ làm việc, địa chỉ các cửa hàng...
 */
require_once get_template_directory() . '/inc/default-content.php';

/**
 * Tự động gán id="toc-N" cho các heading h2/h3 trong nội dung bài viết để
 * mục lục (template-parts/sidebar-toc.php) có thể liên kết tới.
 */
function thokhoa247_add_heading_ids( $content ) {
	if ( ! is_singular( 'post' ) || ! in_the_loop() ) {
		return $content;
	}

	$index = 0;

	return preg_replace_callback(
		'/<h([23])([^>]*)>/i',
		function ( $matches ) use ( &$index ) {
			++$index;
			return '<h' . $matches[1] . $matches[2] . ' id="toc-' . $index . '">';
		},
		$content
	);
}
add_filter( 'the_content', 'thokhoa247_add_heading_ids', 9 );

/**
 * Chèn box CTA (gọi ngay) vào giữa nội dung bài viết.
 */
function thokhoa247_insert_mid_content_cta( $content ) {
	if ( ! is_singular( 'post' ) || ! in_the_loop() || is_admin() ) {
		return $content;
	}

	$contact = thokhoa247_default_contact();
	$cta     = '<div class="article-cta"><p>' . esc_html__( 'Bạn cần thợ khóa hỗ trợ ngay?', 'thokhoa247' ) . '</p><a class="btn btn--call" href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ) . '">' . esc_html__( 'GỌI NGAY', 'thokhoa247' ) . ' - ' . esc_html( $contact['hotline'] ) . '</a></div>';

	$paragraphs = explode( '</p>', $content );
	$middle     = (int) floor( count( $paragraphs ) / 2 );

	if ( count( $paragraphs ) > 2 ) {
		$paragraphs[ $middle ] .= '</p>' . $cta;
		return implode( '</p>', $paragraphs );
	}

	return $content . $cta;
}
add_filter( 'the_content', 'thokhoa247_insert_mid_content_cta', 20 );

/**
 * Helper: lấy field ACF với fallback an toàn.
 */
function thokhoa247_get_field( $field, $post_id = false, $default = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $field, $post_id );
		if ( ! empty( $value ) ) {
			return $value;
		}
	}
	return $default;
}
