<?php
/**
 * Hero slider: nhiều banner luân phiên + CTA gọi ngay.
 * Nhập banner qua: WP admin > Trang chủ > "Banner trang chủ (Slider)" (ACF).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact = thokhoa247_default_contact();
$slides  = thokhoa247_get_field( 'hero_slides', 'option', array() );

if ( empty( $slides ) ) {
	$slides = thokhoa247_default_hero_slides();
}
?>
<section class="hero">
	<div class="hero-slider" data-hero-slider>
		<?php foreach ( $slides as $index => $slide ) : ?>
			<div class="hero-slide<?php echo 0 === $index ? ' is-active' : ''; ?>">
				<div class="container hero__inner">
					<div class="hero__content">
						<h1 class="hero__title"><?php echo esc_html( $slide['title'] ); ?></h1>
						<p class="hero__subtitle"><?php echo esc_html( $slide['subtitle'] ); ?></p>
						<a class="btn btn--primary" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>">
							<?php esc_html_e( 'Gọi ngay', 'thokhoa247' ); ?> - <?php echo esc_html( $contact['hotline'] ); ?>
						</a>
					</div>
					<div class="hero__image">
						<img src="<?php echo esc_url( $slide['image'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" <?php echo 0 === $index ? 'loading="eager"' : 'loading="lazy"'; ?>>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

		<?php if ( count( $slides ) > 1 ) : ?>
			<button type="button" class="hero-slider__nav hero-slider__nav--prev" data-hero-prev aria-label="<?php esc_attr_e( 'Banner trước', 'thokhoa247' ); ?>">&#8249;</button>
			<button type="button" class="hero-slider__nav hero-slider__nav--next" data-hero-next aria-label="<?php esc_attr_e( 'Banner sau', 'thokhoa247' ); ?>">&#8250;</button>

			<div class="hero-slider__dots">
				<?php foreach ( $slides as $index => $slide ) : ?>
					<button type="button" class="hero-slider__dot<?php echo 0 === $index ? ' is-active' : ''; ?>" data-hero-dot="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %d: số thứ tự banner */ __( 'Banner %d', 'thokhoa247' ), $index + 1 ) ); ?>"></button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
