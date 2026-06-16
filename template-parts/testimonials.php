<?php
/**
 * Ý kiến khách hàng - dạng slider 2 card mỗi lần, có ảnh avatar tròn.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array();

$query = new WP_Query(
	array(
		'post_type'      => 'danh-gia',
		'posts_per_page' => 6,
	)
);

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$items[] = array(
			'name'    => get_the_title(),
			'role'    => thokhoa247_get_field( 'vai_tro', get_the_ID(), '' ),
			'content' => wp_strip_all_tags( get_the_content() ),
			'avatar'  => get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ),
		);
	}
	wp_reset_postdata();
}

if ( empty( $items ) ) {
	foreach ( thokhoa247_default_testimonials() as $item ) {
		$item['avatar'] = '';
		$items[]        = $item;
	}
}

// Chia thành cặp 2 item mỗi slide
$slides = array_chunk( $items, 2 );
?>
<section class="testimonials">
	<div class="container">
		<h2 class="section-title">
			<span style="color:var(--color-primary)">Ý KIẾN</span> KHÁCH HÀNG
		</h2>

		<div class="testimonials-slider" data-testi-slider>
			<?php foreach ( $slides as $si => $pair ) : ?>
				<div class="testimonials-slider__slide<?php echo 0 === $si ? ' is-active' : ''; ?>">
					<div class="testimonials-slider__pair">
						<?php foreach ( $pair as $item ) : ?>
							<div class="testimonial-card">
								<div class="testimonial-card__bubble">
									<p><?php echo esc_html( $item['content'] ); ?></p>
								</div>
								<div class="testimonial-card__author">
									<div class="testimonial-card__avatar">
										<img src="<?php echo esc_url( $item['avatar'] ? $item['avatar'] : get_template_directory_uri() . '/assets/images/avatar-placeholder.svg' ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy">
									</div>
									<div>
										<p class="testimonial-card__name"><?php echo esc_html( strtoupper( $item['name'] ) ); ?></p>
										<?php if ( ! empty( $item['role'] ) ) : ?>
											<p class="testimonial-card__role"><?php echo esc_html( $item['role'] ); ?></p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( count( $slides ) > 1 ) : ?>
		<div class="testimonials-slider__dots">
			<?php foreach ( $slides as $si => $pair ) : ?>
				<button type="button" class="testimonials-slider__dot<?php echo 0 === $si ? ' is-active' : ''; ?>" data-testi-dot="<?php echo $si; ?>"></button>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
