<?php
/**
 * Mục lục bài viết (Table of Contents) - tự động tạo từ các heading h2/h3
 * trong nội dung bài viết. JS (assets/js/main.js) sẽ gán id cho heading
 * và làm nổi bật mục lục khi cuộn trang.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$content = get_the_content();
$headings = array();

if ( preg_match_all( '/<h([23])[^>]*>(.*?)<\/h\1>/i', $content, $matches, PREG_SET_ORDER ) ) {
	foreach ( $matches as $index => $match ) {
		$headings[] = array(
			'level' => $match[1],
			'text'  => wp_strip_all_tags( $match[2] ),
			'id'    => 'toc-' . ( $index + 1 ),
		);
	}
}

if ( empty( $headings ) ) {
	return;
}
?>
<nav class="article-toc" aria-label="<?php esc_attr_e( 'Mục lục', 'thokhoa247' ); ?>">
	<h2 class="article-toc__title"><?php esc_html_e( 'Mục lục', 'thokhoa247' ); ?></h2>
	<ul>
		<?php foreach ( $headings as $heading ) : ?>
			<li class="article-toc__item article-toc__item--h<?php echo esc_attr( $heading['level'] ); ?>">
				<a href="#<?php echo esc_attr( $heading['id'] ); ?>"><?php echo esc_html( $heading['text'] ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>
