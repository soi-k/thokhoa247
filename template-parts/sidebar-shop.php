<?php
/**
 * Sidebar trang bài viết: box hotline tư vấn.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact = thokhoa247_get_contact();
?>
<aside class="article-sidebar">
	<div class="sidebar-box sidebar-box--cta">
		<h3><?php esc_html_e( 'Trợ giúp tư vấn bán hàng', 'thokhoa247' ); ?></h3>
		<a class="btn btn--call" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>">
			<?php esc_html_e( 'Hotline:', 'thokhoa247' ); ?> <?php echo esc_html( $contact['hotline'] ); ?>
		</a>
		<p><?php esc_html_e( 'Thời gian làm việc:', 'thokhoa247' ); ?> <?php echo esc_html( $contact['working_hours'] ); ?></p>
	</div>
</aside>
