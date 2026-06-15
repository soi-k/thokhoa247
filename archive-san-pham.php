<?php
/**
 * Danh sách sản phẩm - nhóm theo thương hiệu (taxonomy "thuong-hieu").
 * Sản phẩm chưa gán thương hiệu sẽ hiển thị ở nhóm "Sản phẩm khác".
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$all_posts = get_posts(
	array(
		'post_type'      => 'san-pham',
		'posts_per_page' => -1,
	)
);

$brands = get_terms(
	array(
		'taxonomy'   => 'thuong-hieu',
		'hide_empty' => true,
	)
);

$grouped  = array();
$no_brand = array();

if ( ! is_wp_error( $brands ) && ! empty( $brands ) ) {
	foreach ( $all_posts as $product ) {
		$terms = wp_get_post_terms( $product->ID, 'thuong-hieu' );
		if ( empty( $terms ) || is_wp_error( $terms ) ) {
			$no_brand[] = $product;
			continue;
		}
		foreach ( $terms as $term ) {
			$grouped[ $term->term_id ]['term']    = $term;
			$grouped[ $term->term_id ]['posts'][] = $product;
		}
	}
}
?>

<main id="main-content" class="container archive-content">
	<h1 class="section-title section-title--left"><?php esc_html_e( 'Sản phẩm', 'thokhoa247' ); ?></h1>

	<?php if ( ! empty( $grouped ) ) : ?>
		<?php foreach ( $grouped as $group ) : ?>
			<h2 class="section-title section-title--left products-brand-title"><?php echo esc_html( $group['term']->name ); ?></h2>
			<?php thokhoa247_render_product_grid( $group['posts'] ); ?>
		<?php endforeach; ?>

		<?php if ( ! empty( $no_brand ) ) : ?>
			<h2 class="section-title section-title--left products-brand-title"><?php esc_html_e( 'Sản phẩm khác', 'thokhoa247' ); ?></h2>
			<?php thokhoa247_render_product_grid( $no_brand ); ?>
		<?php endif; ?>
	<?php elseif ( ! empty( $all_posts ) ) : ?>
		<?php thokhoa247_render_product_grid( $all_posts ); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Chưa có sản phẩm nào.', 'thokhoa247' ); ?></p>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
