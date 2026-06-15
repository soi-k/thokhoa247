<?php
/**
 * Danh sách sản phẩm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main-content" class="container archive-content">
	<h1 class="section-title section-title--left"><?php esc_html_e( 'Sản phẩm', 'thokhoa247' ); ?></h1>

	<?php if ( have_posts() ) : ?>
		<div class="products-featured__grid">
			<?php
			while ( have_posts() ) :
				the_post();
				$gia_sale = thokhoa247_get_field( 'gia_sale', get_the_ID(), 0 );
				$gia_goc  = thokhoa247_get_field( 'gia_goc', get_the_ID(), 0 );
				$percent  = ( $gia_goc && $gia_sale ) ? round( ( 1 - $gia_sale / $gia_goc ) * 100 ) : 0;
				?>
				<a class="product-card" href="<?php the_permalink(); ?>">
					<?php if ( $percent > 0 ) : ?>
						<span class="product-card__badge">-<?php echo esc_html( $percent ); ?>%</span>
					<?php endif; ?>
					<div class="product-card__image">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium' ); ?>
						<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder.svg' ); ?>" alt="" loading="lazy">
						<?php endif; ?>
					</div>
					<div class="product-card__body">
						<h3><?php the_title(); ?></h3>
						<?php if ( $gia_sale ) : ?>
							<p class="product-card__price">
								<span class="product-card__price-sale"><?php echo esc_html( number_format( (float) $gia_sale, 0, ',', '.' ) ); ?> đ</span>
								<?php if ( $gia_goc ) : ?>
									<span class="product-card__price-old"><?php echo esc_html( number_format( (float) $gia_goc, 0, ',', '.' ) ); ?> đ</span>
								<?php endif; ?>
							</p>
						<?php endif; ?>
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
		<p><?php esc_html_e( 'Chưa có sản phẩm nào.', 'thokhoa247' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
