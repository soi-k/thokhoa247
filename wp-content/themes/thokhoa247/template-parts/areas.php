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
			$districts[] = array(
				'title' => $child->name,
				'link'  => get_term_link( $child ),
				'image' => '',
			);
		}
	}
}

if ( empty( $districts ) ) {
	foreach ( thokhoa247_default_areas( $city ) as $name ) {
		$districts[] = array(
			'title' => $name,
			'link'  => '',
			'image' => '',
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
					<div class="area-card__image">
						<img src="<?php echo esc_url( $district['image'] ? $district['image'] : get_template_directory_uri() . '/assets/images/placeholder.svg' ); ?>" alt="<?php echo esc_attr( $district['title'] ); ?>" loading="lazy">
						<span class="area-card__name"><?php echo esc_html( $district['title'] ); ?></span>
					</div>
					<p class="area-card__caption"><?php echo esc_html( sprintf( /* translators: %s: tên quận/khu vực */ __( 'Sửa khóa Quận %s', 'thokhoa247' ), $district['title'] ) ); ?></p>
				</<?php echo esc_html( $tag ); ?>>
			<?php endforeach; ?>
		</div>
	</div>
</section>
