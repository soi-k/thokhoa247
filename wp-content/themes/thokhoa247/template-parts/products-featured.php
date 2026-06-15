<?php
/**
 * Sản phẩm nổi bật với 2 tab "Bán chạy" / "Khóa đồng".
 * Lấy từ CPT "san-pham" theo taxonomy "loai-san-pham".
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tabs = array(
	'ban-chay'  => __( 'Bán chạy', 'thokhoa247' ),
	'khoa-dong' => __( 'Khóa đồng', 'thokhoa247' ),
);
?>
<section class="products-featured">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Sản phẩm nổi bật', 'thokhoa247' ); ?></h2>

		<div class="products-tabs" role="tablist">
			<?php $first = true; ?>
			<?php foreach ( $tabs as $slug => $label ) : ?>
				<button class="products-tabs__btn<?php echo $first ? ' is-active' : ''; ?>" role="tab" data-tab="<?php echo esc_attr( $slug ); ?>">
					<?php echo esc_html( $label ); ?>
				</button>
				<?php $first = false; ?>
			<?php endforeach; ?>
			<a class="products-tabs__more" href="<?php echo esc_url( get_post_type_archive_link( 'san-pham' ) ); ?>"><?php esc_html_e( 'Xem thêm', 'thokhoa247' ); ?> &rsaquo;</a>
		</div>

		<?php
		$first = true;
		foreach ( $tabs as $slug => $label ) :
			$query = new WP_Query(
				array(
					'post_type'      => 'san-pham',
					'posts_per_page' => 4,
					'tax_query'      => array(
						array(
							'taxonomy' => 'loai-san-pham',
							'field'    => 'slug',
							'terms'    => $slug,
						),
					),
				)
			);
			?>
			<div class="products-tabs__panel<?php echo $first ? ' is-active' : ''; ?>" data-tab="<?php echo esc_attr( $slug ); ?>">
				<div class="products-featured__grid">
					<?php if ( $query->have_posts() ) : ?>
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
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
						wp_reset_postdata();
						?>
					<?php else : ?>
						<p class="products-featured__empty"><?php esc_html_e( 'Chưa có sản phẩm nào trong nhóm này. Hãy thêm sản phẩm và gán Loại sản phẩm tương ứng trong WP admin.', 'thokhoa247' ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php
			$first = false;
		endforeach;
		?>
	</div>
</section>
