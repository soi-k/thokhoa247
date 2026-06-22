<?php
/**
 * Trang chi tiết sản phẩm: ảnh + thumbnail, giá, thông số, 2 CTA, mô tả,
 * bảng thông số kỹ thuật, cam kết bán hàng.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact = thokhoa247_get_contact();

while ( have_posts() ) :
	the_post();

	$gia_sale    = thokhoa247_get_field( 'gia_sale', get_the_ID(), 0 );
	$gia_goc     = thokhoa247_get_field( 'gia_goc', get_the_ID(), 0 );
	$thumbnails  = thokhoa247_get_field( 'thumbnails', get_the_ID(), array() );
	$thong_so    = thokhoa247_get_field( 'thong_so', get_the_ID(), array() );
	$main_image  = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : get_template_directory_uri() . '/assets/images/placeholder.svg';
	?>
	<main id="main-content" class="container product-page">
		<div class="product-page__gallery">
			<div class="product-page__main-image">
				<img src="<?php echo esc_url( $main_image ); ?>" alt="<?php the_title_attribute(); ?>" id="product-main-image">
			</div>
			<?php if ( ! empty( $thumbnails ) ) : ?>
				<div class="product-page__thumbs">
					<?php foreach ( $thumbnails as $url ) : ?>
						<button type="button" class="product-page__thumb" data-image="<?php echo esc_url( $url ); ?>">
							<img src="<?php echo esc_url( $url ); ?>" alt="">
						</button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="product-page__info">
			<h1 class="product-page__title"><?php the_title(); ?></h1>

			<?php if ( $gia_sale ) : ?>
				<p class="product-page__price">
					<span class="product-page__price-sale"><?php echo esc_html( number_format( (float) $gia_sale, 0, ',', '.' ) ); ?> đ</span>
					<span class="product-page__price-note">(<?php esc_html_e( 'Giá chưa bao gồm VAT', 'thokhoa247' ); ?>)</span>
				</p>
				<?php if ( $gia_goc ) : ?>
					<p class="product-page__price-old"><?php esc_html_e( 'Giá chính hãng:', 'thokhoa247' ); ?> <?php echo esc_html( number_format( (float) $gia_goc, 0, ',', '.' ) ); ?> đ</p>
				<?php endif; ?>
			<?php endif; ?>

			<div class="product-page__cta">
				<a class="btn btn--call" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>">
					<?php esc_html_e( 'GỌI NGAY', 'thokhoa247' ); ?>
					<small><?php esc_html_e( 'Gọi điện trực tiếp cho chúng tôi', 'thokhoa247' ); ?></small>
				</a>
				<a class="btn btn--outline" href="#contact-form">
					<?php esc_html_e( 'TƯ VẤN MIỄN PHÍ', 'thokhoa247' ); ?>
					<small><?php esc_html_e( 'Chúng tôi sẽ liên hệ lại với bạn', 'thokhoa247' ); ?></small>
				</a>
			</div>

			<div class="product-page__commitments">
				<h3><?php esc_html_e( 'Cam kết bán hàng', 'thokhoa247' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'Sản phẩm nhập khẩu chính hãng 100%', 'thokhoa247' ); ?></li>
					<li><?php esc_html_e( 'Giá cả cạnh tranh top thị trường', 'thokhoa247' ); ?></li>
					<li><?php esc_html_e( 'Bảo hành chính hãng lên đến 24 tháng', 'thokhoa247' ); ?></li>
					<li><?php esc_html_e( 'Giao hàng nhanh, lắp đặt tại nhà 24/7, kể cả thứ 7 và chủ nhật', 'thokhoa247' ); ?></li>
					<li><?php esc_html_e( 'Tư vấn miễn phí, chuyên nghiệp', 'thokhoa247' ); ?></li>
				</ul>
			</div>
		</div>

		<div class="product-page__description">
			<h2 class="section-title section-title--left"><?php esc_html_e( 'Mô tả sản phẩm', 'thokhoa247' ); ?></h2>
			<?php the_content(); ?>
		</div>

		<?php if ( ! empty( $thong_so ) ) : ?>
			<div class="product-page__specs">
				<h2 class="section-title section-title--left"><?php esc_html_e( 'Thông số kỹ thuật', 'thokhoa247' ); ?></h2>
				<table class="product-page__specs-table">
					<?php foreach ( $thong_so as $row ) : ?>
						<tr>
							<th><?php echo esc_html( $row['ten'] ); ?></th>
							<td><?php echo esc_html( $row['gia_tri'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		<?php endif; ?>

		<?php
		$loai_terms = wp_get_post_terms( get_the_ID(), 'loai-san-pham', array( 'fields' => 'ids' ) );
		$related    = array();

		if ( ! empty( $loai_terms ) && ! is_wp_error( $loai_terms ) ) {
			$related = get_posts(
				array(
					'post_type'      => 'san-pham',
					'posts_per_page' => 4,
					'post__not_in'   => array( get_the_ID() ),
					'tax_query'      => array(
						array(
							'taxonomy' => 'loai-san-pham',
							'field'    => 'term_id',
							'terms'    => $loai_terms,
						),
					),
				)
			);
		}

		if ( ! empty( $related ) ) :
			?>
			<div class="product-page__related">
				<h2 class="section-title section-title--left"><?php esc_html_e( 'Sản phẩm cùng loại', 'thokhoa247' ); ?></h2>
				<?php thokhoa247_render_product_grid( $related ); ?>
			</div>
		<?php endif; ?>
	</main>
	<?php
endwhile;

get_footer();
