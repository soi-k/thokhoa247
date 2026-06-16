<?php
/**
 * Trang cài đặt trang chủ – không cần ACF Pro.
 * Dữ liệu lưu vào wp_options với prefix "thokhoa247_".
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', 'thokhoa247_add_options_page' );
function thokhoa247_add_options_page() {
	add_menu_page(
		'Tùy chỉnh trang chủ',
		'Trang chủ',
		'edit_posts',
		'thokhoa247-options',
		'thokhoa247_render_options_page',
		'dashicons-admin-home',
		3
	);
}

add_action( 'admin_enqueue_scripts', 'thokhoa247_options_scripts' );
function thokhoa247_options_scripts( $hook ) {
	if ( 'toplevel_page_thokhoa247-options' !== $hook ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script(
		'thokhoa247-admin',
		get_template_directory_uri() . '/assets/js/admin-options.js',
		array( 'jquery' ),
		'1.0',
		true
	);
}

add_action( 'admin_post_thokhoa247_save_options', 'thokhoa247_save_options' );
function thokhoa247_save_options() {
	if ( ! current_user_can( 'edit_posts' ) || ! check_admin_referer( 'thokhoa247_options' ) ) {
		wp_die( 'Không có quyền.' );
	}

	$text_fields = array(
		'hotline', 'hotline_mien_nam', 'working_hours', 'zalo_so',
		'services_grid_bg', 'about_image',
	);
	foreach ( $text_fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_option( 'thokhoa247_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	// Lưu about_content với wp_kses_post
	if ( isset( $_POST['about_content'] ) ) {
		update_option( 'thokhoa247_about_content', wp_kses_post( wp_unslash( $_POST['about_content'] ) ) );
	}

	// Gallery ảnh cửa hàng
	if ( isset( $_POST['gallery_cua_hang'] ) && is_array( $_POST['gallery_cua_hang'] ) ) {
		$gallery = array_filter( array_map( 'esc_url_raw', array_map( 'wp_unslash', $_POST['gallery_cua_hang'] ) ) );
		update_option( 'thokhoa247_gallery_cua_hang', array_values( $gallery ) );
	}

	// Gallery ảnh dự án
	if ( isset( $_POST['gallery_du_an'] ) && is_array( $_POST['gallery_du_an'] ) ) {
		$gallery = array_filter( array_map( 'esc_url_raw', array_map( 'wp_unslash', $_POST['gallery_du_an'] ) ) );
		update_option( 'thokhoa247_gallery_du_an', array_values( $gallery ) );
	}

	// Lưu services grid
	$svcs = array();
	if ( isset( $_POST['svc_title'] ) && is_array( $_POST['svc_title'] ) ) {
		foreach ( $_POST['svc_title'] as $si => $t ) {
			$svcs[] = array(
				'title' => sanitize_text_field( wp_unslash( $t ) ),
				'desc'  => sanitize_text_field( wp_unslash( $_POST['svc_desc'][ $si ] ?? '' ) ),
				'link'  => esc_url_raw( wp_unslash( $_POST['svc_link'][ $si ] ?? '' ) ),
				'icon'  => esc_url_raw( wp_unslash( $_POST['svc_icon'][ $si ] ?? '' ) ),
			);
		}
	}
	if ( ! empty( $svcs ) ) {
		update_option( 'thokhoa247_services_grid', $svcs );
	}

	// Hero slides (tối đa 4)
	$slides = array();
	if ( isset( $_POST['slide_title'] ) && is_array( $_POST['slide_title'] ) ) {
		foreach ( $_POST['slide_title'] as $i => $title ) {
			$slides[] = array(
				'title'    => sanitize_text_field( wp_unslash( $title ) ),
				'subtitle' => sanitize_text_field( wp_unslash( $_POST['slide_subtitle'][ $i ] ?? '' ) ),
				'image'    => esc_url_raw( wp_unslash( $_POST['slide_image'][ $i ] ?? '' ) ),
				'link'     => esc_url_raw( wp_unslash( $_POST['slide_link'][ $i ] ?? '' ) ),
			);
		}
	}
	update_option( 'thokhoa247_hero_slides', $slides );

	wp_safe_redirect( admin_url( 'admin.php?page=thokhoa247-options&saved=1' ) );
	exit;
}

function thokhoa247_render_options_page() {
	$saved = isset( $_GET['saved'] );

	$hotline        = get_option( 'thokhoa247_hotline', '' );
	$hotline_nam    = get_option( 'thokhoa247_hotline_mien_nam', '' );
	$working_hours  = get_option( 'thokhoa247_working_hours', '' );
	$zalo_so        = get_option( 'thokhoa247_zalo_so', '' );
	$about_image    = get_option( 'thokhoa247_about_image', '' );
	$about_content  = get_option( 'thokhoa247_about_content', '' );
	$services_bg    = get_option( 'thokhoa247_services_grid_bg', '' );
	$slides         = get_option( 'thokhoa247_hero_slides', array() );

	if ( empty( $slides ) ) {
		$slides = array(
			array( 'title' => '', 'subtitle' => '', 'image' => '', 'link' => '' ),
			array( 'title' => '', 'subtitle' => '', 'image' => '', 'link' => '' ),
		);
	}
	?>
	<div class="wrap">
		<h1>🏠 Tùy chỉnh trang chủ</h1>
		<?php if ( $saved ) : ?>
			<div class="notice notice-success"><p>✅ Đã lưu thành công!</p></div>
		<?php endif; ?>

		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="thokhoa247_save_options">
			<?php wp_nonce_field( 'thokhoa247_options' ); ?>

			<!-- THÔNG TIN LIÊN HỆ -->
			<h2>📞 Thông tin liên hệ</h2>
			<table class="form-table">
				<tr>
					<th>Hotline Hà Nội</th>
					<td><input type="text" name="hotline" value="<?php echo esc_attr( $hotline ); ?>" class="regular-text" placeholder="0919.188.881"></td>
				</tr>
				<tr>
					<th>Hotline Sài Gòn</th>
					<td><input type="text" name="hotline_mien_nam" value="<?php echo esc_attr( $hotline_nam ); ?>" class="regular-text" placeholder="0981.51.50.50"></td>
				</tr>
				<tr>
					<th>Giờ làm việc</th>
					<td><input type="text" name="working_hours" value="<?php echo esc_attr( $working_hours ); ?>" class="regular-text" placeholder="24/24"></td>
				</tr>
				<tr>
					<th>Số Zalo (nút chat nổi)</th>
					<td><input type="text" name="zalo_so" value="<?php echo esc_attr( $zalo_so ); ?>" class="regular-text" placeholder="0919188881"></td>
				</tr>
			</table>

			<!-- HERO SLIDER -->
			<h2>🖼 Banner trang chủ (Slider)</h2>
			<p style="color:#666">Tối đa 4 banner. Để trống = dùng nội dung mặc định.</p>
			<div id="slides-wrap">
			<?php foreach ( $slides as $i => $slide ) : ?>
				<div class="slide-row" style="border:1px solid #ddd;padding:16px;margin-bottom:16px;background:#f9f9f9;border-radius:4px">
					<strong>Banner <?php echo $i + 1; ?></strong>
					<table class="form-table" style="margin-top:8px">
						<tr>
							<th width="160">Tiêu đề</th>
							<td><input type="text" name="slide_title[]" value="<?php echo esc_attr( $slide['title'] ); ?>" class="regular-text" placeholder="VD: DỊCH VỤ SỬA KHÓA TẠI NHÀ"></td>
						</tr>
						<tr>
							<th>Phụ đề</th>
							<td><input type="text" name="slide_subtitle[]" value="<?php echo esc_attr( $slide['subtitle'] ); ?>" class="large-text" placeholder="VD: Chuyên nghiệp - Nhanh - 24/7"></td>
						</tr>
						<tr>
							<th>Ảnh banner</th>
							<td>
								<input type="text" name="slide_image[]" value="<?php echo esc_attr( $slide['image'] ); ?>" class="large-text tk247-image-url" placeholder="URL ảnh">
								<button type="button" class="button tk247-upload-btn" data-target="slide_image_<?php echo $i; ?>">Chọn ảnh</button>
								<?php if ( $slide['image'] ) : ?>
									<br><img src="<?php echo esc_url( $slide['image'] ); ?>" style="max-height:80px;margin-top:8px;border-radius:4px">
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<th>Link (khi bấm)</th>
							<td><input type="text" name="slide_link[]" value="<?php echo esc_attr( $slide['link'] ); ?>" class="regular-text" placeholder="https://..."></td>
						</tr>
					</table>
				</div>
			<?php endforeach; ?>
			</div>
			<button type="button" id="add-slide" class="button">+ Thêm banner</button>

			<!-- SECTION DỊCH VỤ -->
			<h2>🔧 Lưới dịch vụ (nền parallax)</h2>
			<table class="form-table">
				<tr>
					<th>Ảnh nền section dịch vụ</th>
					<td>
						<input type="text" name="services_grid_bg" id="services_grid_bg" value="<?php echo esc_attr( $services_bg ); ?>" class="large-text tk247-image-url">
						<button type="button" class="button tk247-upload-btn">Chọn ảnh</button>
						<p class="description">Đề xuất: ảnh nền tối 1600×900px (ảnh chụp tay/chìa khóa)</p>
						<?php if ( $services_bg ) : ?>
							<br><img src="<?php echo esc_url( $services_bg ); ?>" style="max-height:80px;margin-top:8px;border-radius:4px">
						<?php endif; ?>
					</td>
				</tr>
			</table>

			<!-- DANH SÁCH DỊCH VỤ TRONG LƯỚI -->
			<h2 style="margin-top:28px">🔑 Danh sách dịch vụ trong lưới</h2>
			<p style="color:#666">8 dịch vụ hiển thị ở section nền đỏ. Thêm ảnh tròn cho mỗi dịch vụ.</p>
			<?php
			$saved_services = get_option( 'thokhoa247_services_grid', array() );
			$default_svcs   = thokhoa247_default_services_grid();
			$svc_rows = array();
			for ( $si = 0; $si < 9; $si++ ) {
				$svc_rows[] = array(
					'title' => $saved_services[ $si ]['title'] ?? ( $default_svcs[ $si ]['title'] ?? '' ),
					'desc'  => $saved_services[ $si ]['desc']  ?? ( $default_svcs[ $si ]['desc']  ?? '' ),
					'link'  => $saved_services[ $si ]['link']  ?? ( $default_svcs[ $si ]['link']  ?? '#' ),
					'icon'  => $saved_services[ $si ]['icon']  ?? '',
				);
			}
			?>
			<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;max-width:900px">
			<?php foreach ( $svc_rows as $si => $svc ) : ?>
				<div style="border:1px solid #ddd;padding:14px;border-radius:4px;background:#f9f9f9">
					<strong>Dịch vụ <?php echo $si + 1; ?></strong>
					<table class="form-table" style="margin:8px 0 0">
						<tr>
							<th width="80" style="font-weight:normal">Tên</th>
							<td><input type="text" name="svc_title[]" value="<?php echo esc_attr( $svc['title'] ); ?>" class="widefat"></td>
						</tr>
						<tr>
							<th style="font-weight:normal">Mô tả</th>
							<td><input type="text" name="svc_desc[]" value="<?php echo esc_attr( $svc['desc'] ); ?>" class="widefat"></td>
						</tr>
						<tr>
							<th style="font-weight:normal">Link</th>
							<td><input type="text" name="svc_link[]" value="<?php echo esc_attr( $svc['link'] ); ?>" class="widefat"></td>
						</tr>
						<tr>
							<th style="font-weight:normal">Ảnh icon</th>
							<td>
								<input type="text" name="svc_icon[]" value="<?php echo esc_attr( $svc['icon'] ); ?>" class="widefat tk247-image-url" placeholder="URL ảnh tròn">
								<button type="button" class="button button-small tk247-upload-btn" style="margin-top:4px">Chọn ảnh</button>
								<?php if ( $svc['icon'] ) : ?>
									<br><img src="<?php echo esc_url( $svc['icon'] ); ?>" style="width:56px;height:56px;object-fit:cover;border-radius:50%;margin-top:6px">
								<?php endif; ?>
							</td>
						</tr>
					</table>
				</div>
			<?php endforeach; ?>
			</div>

			<!-- GALLERY ẢNH -->
			<h2>🖼 Hình ảnh cửa hàng</h2>
			<p style="color:#666">Upload tối đa 6 ảnh. Hiển thị ở phần "Hình ảnh cửa hàng" cuối trang chủ.</p>
			<?php
			$gallery_cua_hang = get_option( 'thokhoa247_gallery_cua_hang', array() );
			while ( count( $gallery_cua_hang ) < 6 ) { $gallery_cua_hang[] = ''; }
			?>
			<div class="gallery-upload-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;max-width:700px">
				<?php foreach ( $gallery_cua_hang as $idx => $url ) : ?>
					<div style="border:1px solid #ddd;padding:8px;border-radius:4px;background:#fafafa">
						<input type="text" name="gallery_cua_hang[]" value="<?php echo esc_attr( $url ); ?>" class="widefat tk247-image-url" placeholder="URL ảnh <?php echo $idx + 1; ?>">
						<button type="button" class="button button-small tk247-upload-btn" style="margin-top:4px;width:100%">Chọn ảnh</button>
						<?php if ( $url ) : ?>
							<img src="<?php echo esc_url( $url ); ?>" style="width:100%;height:80px;object-fit:cover;margin-top:6px;border-radius:2px">
						<?php else : ?>
							<div style="width:100%;height:80px;margin-top:6px;background:#eee;border-radius:2px;display:flex;align-items:center;justify-content:center;color:#aaa;font-size:11px">Chưa có ảnh</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>

			<h2 style="margin-top:32px">🖼 Hình ảnh dự án</h2>
			<p style="color:#666">Upload tối đa 6 ảnh. Hiển thị ở phần "Hình ảnh dự án" cuối trang chủ.</p>
			<?php
			$gallery_du_an = get_option( 'thokhoa247_gallery_du_an', array() );
			while ( count( $gallery_du_an ) < 6 ) { $gallery_du_an[] = ''; }
			?>
			<div class="gallery-upload-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;max-width:700px">
				<?php foreach ( $gallery_du_an as $idx => $url ) : ?>
					<div style="border:1px solid #ddd;padding:8px;border-radius:4px;background:#fafafa">
						<input type="text" name="gallery_du_an[]" value="<?php echo esc_attr( $url ); ?>" class="widefat tk247-image-url" placeholder="URL ảnh <?php echo $idx + 1; ?>">
						<button type="button" class="button button-small tk247-upload-btn" style="margin-top:4px;width:100%">Chọn ảnh</button>
						<?php if ( $url ) : ?>
							<img src="<?php echo esc_url( $url ); ?>" style="width:100%;height:80px;object-fit:cover;margin-top:6px;border-radius:2px">
						<?php else : ?>
							<div style="width:100%;height:80px;margin-top:6px;background:#eee;border-radius:2px;display:flex;align-items:center;justify-content:center;color:#aaa;font-size:11px">Chưa có ảnh</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>

			<!-- SECTION GIỚI THIỆU -->
			<h2>ℹ️ Giới thiệu công ty</h2>
			<table class="form-table">
				<tr>
					<th>Ảnh giới thiệu</th>
					<td>
						<input type="text" name="about_image" id="about_image" value="<?php echo esc_attr( $about_image ); ?>" class="large-text tk247-image-url">
						<button type="button" class="button tk247-upload-btn">Chọn ảnh</button>
						<?php if ( $about_image ) : ?>
							<br><img src="<?php echo esc_url( $about_image ); ?>" style="max-height:80px;margin-top:8px;border-radius:4px">
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<th>Nội dung giới thiệu</th>
					<td><?php wp_editor( $about_content, 'about_content', array( 'textarea_rows' => 6 ) ); ?></td>
				</tr>
			</table>

			<?php submit_button( 'Lưu tất cả cài đặt', 'primary large' ); ?>
		</form>
	</div>
	<?php
}
