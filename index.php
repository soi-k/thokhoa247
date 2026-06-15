<?php
/**
 * Template mặc định - dùng cho trang blog/danh sách bài viết
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main-content" class="container archive-content">
	<h1 class="section-title section-title--left">
		<?php
		if ( is_home() && ! is_front_page() ) {
			esc_html_e( 'Blog tin tức', 'thokhoa247' );
		} else {
			the_archive_title();
		}
		?>
	</h1>

	<?php if ( have_posts() ) : ?>
		<div class="blog-news__grid">
			<?php
			while ( have_posts() ) :
				the_post();
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
			?>
		</div>

		<div class="pagination">
			<?php the_posts_pagination(); ?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'Không có nội dung nào.', 'thokhoa247' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
