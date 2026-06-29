<?php
/**
 * Trang chủ - ráp các section theo cấu trúc suakhoanhanh.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main-content">
	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php get_template_part( 'template-parts/cta-bar' ); ?>
	<?php get_template_part( 'template-parts/services-featured' ); ?>
	<?php get_template_part( 'template-parts/services-grid' ); ?>
	<?php get_template_part( 'template-parts/about' ); ?>
	<?php get_template_part( 'template-parts/areas', null, array( 'city' => 'ha-noi', 'title' => __( 'Sửa khóa tại Hà Nội', 'thokhoa247' ) ) ); ?>
	<?php get_template_part( 'template-parts/products-featured' ); ?>
	<?php get_template_part( 'template-parts/blog-news' ); ?>
	<?php get_template_part( 'template-parts/testimonials' ); ?>
	<?php get_template_part( 'template-parts/gallery' ); ?>
</main>

<?php get_footer(); ?>
