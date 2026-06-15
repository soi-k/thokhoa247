<?php
/**
 * Trang bài viết: mục lục + nội dung (CTA giữa bài tự chèn qua filter) +
 * bài viết liên quan + dịch vụ liên quan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="main-content" class="container article-layout">
		<article <?php post_class( 'article' ); ?>>
			<header class="article__header">
				<h1 class="article__title"><?php the_title(); ?></h1>
				<p class="article__meta"><?php echo esc_html( get_the_date() ); ?></p>
			</header>

			<?php get_template_part( 'template-parts/sidebar-toc' ); ?>

			<div class="article__content">
				<?php the_content(); ?>
			</div>

			<?php
			$related = get_posts(
				array(
					'category__in'   => wp_get_post_categories( get_the_ID() ),
					'numberposts'    => 3,
					'post__not_in'   => array( get_the_ID() ),
				)
			);

			if ( $related ) :
				?>
				<section class="related-posts">
					<h2 class="section-title section-title--left"><?php esc_html_e( 'Bài viết liên quan', 'thokhoa247' ); ?></h2>
					<div class="blog-news__grid">
						<?php foreach ( $related as $related_post ) : ?>
							<a class="blog-card" href="<?php echo esc_url( get_permalink( $related_post ) ); ?>">
								<div class="blog-card__image">
									<?php if ( has_post_thumbnail( $related_post ) ) : ?>
										<?php echo get_the_post_thumbnail( $related_post, 'medium' ); ?>
									<?php else : ?>
										<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.svg' ); ?>" alt="" loading="lazy">
									<?php endif; ?>
								</div>
								<div class="blog-card__body">
									<h3><?php echo esc_html( get_the_title( $related_post ) ); ?></h3>
								</div>
							</a>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif; ?>

			<?php
			$related_services = thokhoa247_default_services_grid();
			?>
			<section class="related-services">
				<h2 class="section-title section-title--left"><?php esc_html_e( 'Các dịch vụ liên quan', 'thokhoa247' ); ?></h2>
				<ul class="related-services__list">
					<?php foreach ( array_slice( $related_services, 0, 4 ) as $service ) : ?>
						<li><?php echo esc_html( $service['title'] ); ?></li>
					<?php endforeach; ?>
				</ul>
			</section>
		</article>
	</main>
	<?php
endwhile;

get_footer();
