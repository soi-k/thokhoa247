<?php
/**
 * 3 thẻ dịch vụ nổi bật.
 * Ưu tiên 3 bài viết mới nhất trong category "dich-vu-noi-bat" nếu tồn tại,
 * nếu không có thì dùng nội dung mặc định.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cards = array();

$category = get_category_by_slug( 'dich-vu-noi-bat' );
if ( $category ) {
	$query = new WP_Query(
		array(
			'category_name'  => 'dich-vu-noi-bat',
			'posts_per_page' => 3,
		)
	);

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$cards[] = array(
				'title' => get_the_title(),
				'desc'  => get_the_excerpt(),
				'link'  => get_permalink(),
				'image' => get_the_post_thumbnail_url( get_the_ID(), 'medium' ),
			);
		}
		wp_reset_postdata();
	}
}

if ( empty( $cards ) ) {
	foreach ( thokhoa247_default_services_featured() as $item ) {
		$item['image'] = '';
		$cards[]       = $item;
	}
}
?>
<section class="services-featured">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Dịch vụ nổi bật', 'thokhoa247' ); ?></h2>
		<div class="services-featured__grid">
			<?php foreach ( $cards as $card ) : ?>
				<a class="service-card" href="<?php echo esc_url( $card['link'] ); ?>">
					<div class="service-card__image">
						<?php if ( ! empty( $card['image'] ) ) : ?>
							<img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" loading="lazy">
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.svg' ); ?>" alt="" loading="lazy">
						<?php endif; ?>
					</div>
					<div class="service-card__body">
						<h3><?php echo esc_html( $card['title'] ); ?></h3>
						<p><?php echo esc_html( wp_strip_all_tags( $card['desc'] ) ); ?></p>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
