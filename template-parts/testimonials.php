<?php
/**
 * Ý kiến khách hàng - lấy từ CPT "danh-gia", fallback nội dung mặc định.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array();

$query = new WP_Query(
	array(
		'post_type'      => 'danh-gia',
		'posts_per_page' => 4,
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
?>
<section class="testimonials">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Ý kiến khách hàng', 'thokhoa247' ); ?></h2>
		<div class="testimonials__grid">
			<?php foreach ( $items as $item ) : ?>
				<div class="testimonial-card">
					<div class="testimonial-card__avatar">
						<img src="<?php echo esc_url( $item['avatar'] ? $item['avatar'] : get_template_directory_uri() . '/assets/images/avatar-placeholder.svg' ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" loading="lazy">
					</div>
					<div class="testimonial-card__body">
						<p class="testimonial-card__content">"<?php echo esc_html( $item['content'] ); ?>"</p>
						<p class="testimonial-card__name"><?php echo esc_html( $item['name'] ); ?></p>
						<?php if ( ! empty( $item['role'] ) ) : ?>
							<p class="testimonial-card__role"><?php echo esc_html( $item['role'] ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
