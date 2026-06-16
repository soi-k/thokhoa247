<?php
/**
 * Khu vực phục vụ - "Sửa khóa tại Hà Nội" / "Sửa khóa tại Sài Gòn"
 * Lặp theo taxonomy "khu-vuc": nếu có term con (quận) đang được dùng cho bài
 * viết thì hiển thị link tới bài viết đó, nếu không thì hiển thị tên quận
 * mặc định không có link.
 *
 * @param string $city  'ha-noi' hoặc 'sai-gon'
 * @param string $title Tiêu đề section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$city  = isset( $args['city'] ) ? $args['city'] : 'ha-noi';
$title = isset( $args['title'] ) ? $args['title'] : __( 'Sửa khóa tại Hà Nội', 'thokhoa247' );

$parent_slug = ( 'sai-gon' === $city ) ? 'sua-khoa-tai-sai-gon' : 'sua-khoa-tai-ha-noi';
$parent_term = get_term_by( 'slug', $parent_slug, 'khu-vuc' );

$districts = array();

if ( $parent_term ) {
	$children = get_terms(
		array(
			'taxonomy'   => 'khu-vuc',
			'parent'     => $parent_term->term_id,
			'hide_empty' => false,
		)
	);

	if ( ! is_wp_error( $children ) && ! empty( $children ) ) {
		foreach ( $children as $child ) {
			// Tìm bài viết đầu tiên gắn term này
			$posts = get_posts(
				array(
					'posts_per_page' => 1,
					'tax_query'      => array(
						array(
							'taxonomy' => 'khu-vuc',
							'field'    => 'term_id',
							'terms'    => $child->term_id,
						),
					),
				)
			);
			$link = ! empty( $posts ) ? get_permalink( $posts[0] ) : get_term_link( $child );

			// Lấy ảnh từ bài viết (nếu có)
			$image = ! empty( $posts ) && has_post_thumbnail( $posts[0] )
				? get_the_post_thumbnail_url( $posts[0], 'medium' )
				: '';

			$districts[] = array(
				'title' => $child->name,
				'link'  => $link,
				'image' => $image,
			);
		}
	}
}

if ( empty( $districts ) ) {
	foreach ( thokhoa247_default_areas( $city ) as $name ) {
		// Tìm bài viết theo tiêu đề chứa tên quận
		$posts = get_posts(
			array(
				'posts_per_page' => 1,
				's'              => $name,
			)
		);
		$link  = ! empty( $posts ) ? get_permalink( $posts[0] ) : '';
		$image = ! empty( $posts ) && has_post_thumbnail( $posts[0] )
			? get_the_post_thumbnail_url( $posts[0], 'medium' )
			: '';

		$districts[] = array(
			'title' => $name,
			'link'  => $link,
			'image' => $image,
		);
	}
}
?>
<section class="areas">
	<div class="container">
		<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
		<div class="areas__grid">
			<?php foreach ( $districts as $district ) : ?>
				<?php
				$tag = $district['link'] ? 'a' : 'div';
				?>
				<<?php echo esc_html( $tag ); ?> class="area-card" <?php echo $district['link'] ? 'href="' . esc_url( $district['link'] ) . '"' : ''; ?>>
					<div class="area-card__image<?php echo empty( $district['image'] ) ? ' area-card__image--no-img' : ''; ?>">
						<?php if ( ! empty( $district['image'] ) ) : ?>
							<img src="<?php echo esc_url( $district['image'] ); ?>" alt="<?php echo esc_attr( $district['title'] ); ?>" loading="lazy">
						<?php endif; ?>
						<span class="area-card__name"><?php echo esc_html( $district['title'] ); ?></span>
					</div>
					<p class="area-card__caption"><?php echo esc_html( sprintf( /* translators: %s: tên quận/khu vực */ __( 'Sửa khóa Quận %s', 'thokhoa247' ), $district['title'] ) ); ?></p>
				</<?php echo esc_html( $tag ); ?>>
			<?php endforeach; ?>
		</div>
	</div>
</section>
