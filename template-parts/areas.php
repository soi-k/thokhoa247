<?php
/**
 * Khu vực phục vụ - thứ tự cố định theo default array, tra cứu bài viết theo tên.
 *
 * @param string $city  'ha-noi' hoặc 'sai-gon'
 * @param string $title Tiêu đề section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$city  = isset( $args['city'] ) ? $args['city'] : 'ha-noi';
$title = isset( $args['title'] ) ? $args['title'] : __( 'Sửa khóa tại Hà Nội', 'thokhoa247' );

// Luôn dùng default array làm thứ tự cố định - tra cứu bài viết theo tên quận
$districts = array();

foreach ( thokhoa247_default_areas( $city ) as $item ) {
	$name    = is_array( $item ) ? $item['name'] : $item;
	$caption = is_array( $item ) ? $item['caption'] : sprintf( 'Sửa Khóa Quận %s', $name );

	// Tìm bài viết gắn taxonomy "khu-vuc" theo tên term, hoặc tìm theo tiêu đề
	$link  = '';
	$image = '';

	$term = get_term_by( 'name', $name, 'khu-vuc' );
	if ( $term && ! is_wp_error( $term ) ) {
		$posts = get_posts(
			array(
				'posts_per_page' => 1,
				'tax_query'      => array(
					array(
						'taxonomy' => 'khu-vuc',
						'field'    => 'term_id',
						'terms'    => $term->term_id,
					),
				),
			)
		);
		if ( ! empty( $posts ) ) {
			$link  = get_permalink( $posts[0] );
			$image = has_post_thumbnail( $posts[0] ) ? get_the_post_thumbnail_url( $posts[0], 'medium' ) : '';
		} else {
			$link = get_term_link( $term );
		}
	}

	// Fallback: tìm bài viết theo tiêu đề chứa tên quận
	if ( ! $link ) {
		$posts = get_posts(
			array(
				'posts_per_page' => 1,
				's'              => $name,
			)
		);
		if ( ! empty( $posts ) ) {
			$link  = get_permalink( $posts[0] );
			$image = has_post_thumbnail( $posts[0] ) ? get_the_post_thumbnail_url( $posts[0], 'medium' ) : '';
		}
	}

	$districts[] = array(
		'title'   => $name,
		'caption' => $caption,
		'link'    => $link,
		'image'   => $image,
	);
}
?>
<section class="areas">
	<div class="container">
		<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
		<div class="areas__grid">
			<?php foreach ( $districts as $district ) : ?>
				<?php $tag = $district['link'] ? 'a' : 'div'; ?>
				<<?php echo esc_html( $tag ); ?> class="area-card" <?php echo $district['link'] ? 'href="' . esc_url( $district['link'] ) . '"' : ''; ?>>
					<div class="area-card__image<?php echo empty( $district['image'] ) ? ' area-card__image--no-img' : ''; ?>">
						<?php if ( ! empty( $district['image'] ) ) : ?>
							<img src="<?php echo esc_url( $district['image'] ); ?>" alt="<?php echo esc_attr( $district['title'] ); ?>" loading="lazy">
						<?php endif; ?>
						<span class="area-card__name"><?php echo esc_html( $district['title'] ); ?></span>
					</div>
					<p class="area-card__caption"><?php echo esc_html( $district['caption'] ); ?></p>
				</<?php echo esc_html( $tag ); ?>>
			<?php endforeach; ?>
		</div>
	</div>
</section>
