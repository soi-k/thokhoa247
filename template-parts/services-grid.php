<?php
/**
 * Lưới dịch vụ 3x3 - nền ảnh parallax + overlay màu cam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$raw_services = thokhoa247_get_field( 'services_grid', 'option', array() );
$services     = ! empty( $raw_services ) ? $raw_services : thokhoa247_default_services_grid();

$bg_image = thokhoa247_get_field( 'services_grid_bg', 'option', '' );
$bg_style = $bg_image ? ' style="background-image:url(\'' . esc_url( $bg_image ) . '\')"' : '';
?>
<section class="services-grid"<?php echo $bg_style; ?>>
	<div class="container">
		<div class="services-grid__list">
			<?php foreach ( $services as $service ) : ?>
				<?php
				$link = ! empty( $service['link'] ) ? $service['link'] : '';
				$tag  = $link ? 'a' : 'div';
				?>
				<<?php echo esc_html( $tag ); ?> class="services-grid__item" <?php echo $link ? 'href="' . esc_url( $link ) . '"' : ''; ?>>
					<span class="services-grid__icon">
						<?php if ( ! empty( $service['icon'] ) ) : ?>
							<img src="<?php echo esc_url( $service['icon'] ); ?>" alt="">
						<?php else : ?>
							<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1a5 5 0 0 0-5 5v3H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-9a2 2 0 0 0-2-2h-1V6a5 5 0 0 0-5-5zm-3 8V6a3 3 0 1 1 6 0v3H9z"/></svg>
						<?php endif; ?>
					</span>
					<div class="services-grid__text">
						<h3><?php echo esc_html( $service['title'] ); ?></h3>
						<p><?php echo esc_html( $service['desc'] ); ?></p>
					</div>
				</<?php echo esc_html( $tag ); ?>>
			<?php endforeach; ?>
		</div>
	</div>
</section>
