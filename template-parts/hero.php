<?php
/**
 * Hero slider: ảnh full-width, không có text HTML đè lên.
 * Text/design được thiết kế sẵn trong ảnh banner.
 * Upload banner qua: WP Admin > Trang chủ > "Banner trang chủ".
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$slides = thokhoa247_get_field( 'hero_slides', 'option', array() );

if ( empty( $slides ) ) {
	$slides = thokhoa247_default_hero_slides();
}
?>
<section class="hero">
	<div class="hero-slider" data-hero-slider>
		<?php foreach ( $slides as $index => $slide ) : ?>
			<?php
			$link = ! empty( $slide['link'] ) && '#' !== $slide['link'] ? $slide['link'] : '';
			$tag  = $link ? 'a' : 'div';
			?>
			<<?php echo esc_html( $tag ); ?> class="hero-slide<?php echo 0 === $index ? ' is-active' : ''; ?>"<?php echo $link ? ' href="' . esc_url( $link ) . '"' : ''; ?>>
				<img
					src="<?php echo esc_url( $slide['image'] ); ?>"
					alt="<?php echo esc_attr( $slide['title'] ); ?>"
					<?php echo 0 === $index ? 'loading="eager"' : 'loading="lazy"'; ?>
				>
			</<?php echo esc_html( $tag ); ?>>
		<?php endforeach; ?>

		<?php if ( count( $slides ) > 1 ) : ?>
			<button type="button" class="hero-slider__nav hero-slider__nav--prev" data-hero-prev aria-label="Banner trước">&#8249;</button>
			<button type="button" class="hero-slider__nav hero-slider__nav--next" data-hero-next aria-label="Banner sau">&#8250;</button>

			<div class="hero-slider__dots">
				<?php foreach ( $slides as $index => $slide ) : ?>
					<button type="button" class="hero-slider__dot<?php echo 0 === $index ? ' is-active' : ''; ?>" data-hero-dot="<?php echo esc_attr( $index ); ?>" aria-label="Banner <?php echo esc_attr( $index + 1 ); ?>"></button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
