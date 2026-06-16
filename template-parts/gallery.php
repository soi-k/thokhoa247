<?php
/**
 * Gallery cửa hàng dạng slider lớn + thumbnail nhỏ bên phải.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gallery_cua_hang = array_filter( (array) thokhoa247_get_field( 'gallery_cua_hang', 'option', array() ) );
$gallery_du_an    = array_filter( (array) thokhoa247_get_field( 'gallery_du_an', 'option', array() ) );

if ( empty( $gallery_cua_hang ) && empty( $gallery_du_an ) ) {
	return;
}
?>
<section class="gallery-section">
	<div class="container">

		<?php if ( ! empty( $gallery_cua_hang ) ) : ?>
		<div class="gallery-block">
			<h2 class="section-title"><?php esc_html_e( 'Hình ảnh cửa hàng', 'thokhoa247' ); ?></h2>
			<div class="gallery-slider" data-gallery-slider>
				<div class="gallery-slider__main">
					<?php foreach ( $gallery_cua_hang as $i => $url ) : ?>
						<div class="gallery-slider__slide<?php echo 0 === $i ? ' is-active' : ''; ?>">
							<img src="<?php echo esc_url( $url ); ?>" alt="Hình ảnh cửa hàng <?php echo $i + 1; ?>" loading="<?php echo 0 === $i ? 'eager' : 'lazy'; ?>">
						</div>
					<?php endforeach; ?>
				</div>
				<?php if ( count( $gallery_cua_hang ) > 1 ) : ?>
				<div class="gallery-slider__thumbs">
					<?php foreach ( $gallery_cua_hang as $i => $url ) : ?>
						<button type="button" class="gallery-slider__thumb<?php echo 0 === $i ? ' is-active' : ''; ?>" data-gallery-thumb="<?php echo $i; ?>">
							<img src="<?php echo esc_url( $url ); ?>" alt="" loading="lazy">
						</button>
					<?php endforeach; ?>
				</div>
				<div class="gallery-slider__dots">
					<?php foreach ( $gallery_cua_hang as $i => $url ) : ?>
						<button type="button" class="gallery-slider__dot<?php echo 0 === $i ? ' is-active' : ''; ?>" data-gallery-dot="<?php echo $i; ?>"></button>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if ( ! empty( $gallery_du_an ) ) : ?>
		<div class="gallery-block" style="margin-top:48px">
			<h2 class="section-title"><?php esc_html_e( 'Hình ảnh dự án', 'thokhoa247' ); ?></h2>
			<div class="gallery-slider" data-gallery-slider>
				<div class="gallery-slider__main">
					<?php foreach ( $gallery_du_an as $i => $url ) : ?>
						<div class="gallery-slider__slide<?php echo 0 === $i ? ' is-active' : ''; ?>">
							<img src="<?php echo esc_url( $url ); ?>" alt="Hình ảnh dự án <?php echo $i + 1; ?>" loading="<?php echo 0 === $i ? 'eager' : 'lazy'; ?>">
						</div>
					<?php endforeach; ?>
				</div>
				<?php if ( count( $gallery_du_an ) > 1 ) : ?>
				<div class="gallery-slider__thumbs">
					<?php foreach ( $gallery_du_an as $i => $url ) : ?>
						<button type="button" class="gallery-slider__thumb<?php echo 0 === $i ? ' is-active' : ''; ?>" data-gallery-thumb="<?php echo $i; ?>">
							<img src="<?php echo esc_url( $url ); ?>" alt="" loading="lazy">
						</button>
					<?php endforeach; ?>
				</div>
				<div class="gallery-slider__dots">
					<?php foreach ( $gallery_du_an as $i => $url ) : ?>
						<button type="button" class="gallery-slider__dot<?php echo 0 === $i ? ' is-active' : ''; ?>" data-gallery-dot="<?php echo $i; ?>"></button>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>

	</div>
</section>
