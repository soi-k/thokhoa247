<?php
/**
 * Gallery "Hình ảnh cửa hàng" / "Hình ảnh dự án" - lấy từ ACF gallery field
 * (gallery_cua_hang / gallery_du_an) trong trang tuỳ chỉnh trang chủ.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gallery_cua_hang = thokhoa247_get_field( 'gallery_cua_hang', 'option', array() );
$gallery_du_an    = thokhoa247_get_field( 'gallery_du_an', 'option', array() );
?>
<section class="gallery-section">
	<div class="container gallery-section__grid">
		<div class="gallery-block">
			<h2 class="section-title section-title--left"><?php esc_html_e( 'Hình ảnh cửa hàng', 'thokhoa247' ); ?></h2>
			<div class="gallery-block__images">
				<?php if ( ! empty( $gallery_cua_hang ) ) : ?>
					<?php foreach ( $gallery_cua_hang as $url ) : ?>
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php esc_attr_e( 'Hình ảnh cửa hàng', 'thokhoa247' ); ?>" loading="lazy">
					<?php endforeach; ?>
				<?php else : ?>
					<?php for ( $i = 0; $i < 3; $i++ ) : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.svg' ); ?>" alt="" loading="lazy">
					<?php endfor; ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="gallery-block">
			<h2 class="section-title section-title--left"><?php esc_html_e( 'Hình ảnh dự án', 'thokhoa247' ); ?></h2>
			<div class="gallery-block__images">
				<?php if ( ! empty( $gallery_du_an ) ) : ?>
					<?php foreach ( $gallery_du_an as $url ) : ?>
						<img src="<?php echo esc_url( $url ); ?>" alt="<?php esc_attr_e( 'Hình ảnh dự án', 'thokhoa247' ); ?>" loading="lazy">
					<?php endforeach; ?>
				<?php else : ?>
					<?php for ( $i = 0; $i < 3; $i++ ) : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.svg' ); ?>" alt="" loading="lazy">
					<?php endfor; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
