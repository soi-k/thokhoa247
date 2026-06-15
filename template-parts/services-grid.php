<?php
/**
 * Lưới 8 dịch vụ (icon grid, nền hồng nhạt)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = thokhoa247_default_services_grid();
?>
<section class="services-grid">
	<div class="container">
		<div class="services-grid__list">
			<?php foreach ( $services as $service ) : ?>
				<div class="services-grid__item">
					<span class="services-grid__icon">
						<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1a5 5 0 0 0-5 5v3H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-9a2 2 0 0 0-2-2h-1V6a5 5 0 0 0-5-5zm-3 8V6a3 3 0 1 1 6 0v3H9z"/></svg>
					</span>
					<h3><?php echo esc_html( $service['title'] ); ?></h3>
					<p><?php echo esc_html( $service['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
