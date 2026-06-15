<?php
/**
 * Blog tin tức - bài viết mới nhất
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$query = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'ignore_sticky_posts' => true,
	)
);
?>
<section class="blog-news">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Blog tin tức', 'thokhoa247' ); ?></h2>
		<?php if ( $query->have_posts() ) : ?>
			<div class="blog-news__grid">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<a class="blog-card" href="<?php the_permalink(); ?>">
						<div class="blog-card__image">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'medium' ); ?>
							<?php else : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.svg' ); ?>" alt="" loading="lazy">
							<?php endif; ?>
						</div>
						<div class="blog-card__body">
							<h3><?php the_title(); ?></h3>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
						</div>
					</a>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<div class="blog-news__more">
				<a class="btn btn--outline" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Xem thêm', 'thokhoa247' ); ?></a>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'Chưa có bài viết nào. Hãy đăng bài từ WP admin.', 'thokhoa247' ); ?></p>
		<?php endif; ?>
	</div>
</section>
