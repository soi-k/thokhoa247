<?php
/**
 * Hero banner: tiêu đề lớn + phụ đề + ảnh + CTA gọi ngay
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact      = thokhoa247_default_contact();
$hero_title   = thokhoa247_get_field( 'hero_title', 'option', 'KHÓA THÔNG MINH' );
$hero_subtitle = thokhoa247_get_field( 'hero_subtitle', 'option', 'Hàng chính hãng - Mẫu mã đa dạng - Giá cạnh tranh' );
$hero_image   = thokhoa247_get_field( 'hero_image', 'option', get_template_directory_uri() . '/assets/images/hero-placeholder.svg' );
?>
<section class="hero">
	<div class="container hero__inner">
		<div class="hero__content">
			<h1 class="hero__title"><?php echo esc_html( $hero_title ); ?></h1>
			<p class="hero__subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
			<a class="btn btn--primary" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>">
				<?php esc_html_e( 'Gọi ngay', 'thokhoa247' ); ?> - <?php echo esc_html( $contact['hotline'] ); ?>
			</a>
		</div>
		<div class="hero__image">
			<img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php echo esc_attr( $hero_title ); ?>" loading="eager">
		</div>
	</div>
</section>
