<?php
/**
 * Sidebar trang bài viết: box hotline tư vấn + hệ thống cửa hàng Hà Nội / Sài Gòn.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact    = thokhoa247_get_contact();
$stores_hn  = thokhoa247_default_stores( 'ha-noi' );
$stores_hcm = thokhoa247_default_stores( 'ho-chi-minh' );
?>
<aside class="article-sidebar">
	<div class="sidebar-box sidebar-box--cta">
		<h3><?php esc_html_e( 'Trợ giúp tư vấn bán hàng', 'thokhoa247' ); ?></h3>
		<a class="btn btn--call" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>">
			<?php esc_html_e( 'Hotline:', 'thokhoa247' ); ?> <?php echo esc_html( $contact['hotline'] ); ?>
		</a>
		<p><?php esc_html_e( 'Thời gian làm việc:', 'thokhoa247' ); ?> <?php echo esc_html( $contact['working_hours'] ); ?></p>
	</div>

	<div class="sidebar-box">
		<h3><?php esc_html_e( 'Hệ thống cửa hàng Hà Nội', 'thokhoa247' ); ?></h3>
		<ul>
			<?php foreach ( $stores_hn as $store ) : ?>
				<li><?php echo esc_html( $store ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="sidebar-box">
		<h3><?php esc_html_e( 'Hệ thống cửa hàng Sài Gòn', 'thokhoa247' ); ?></h3>
		<ul>
			<?php foreach ( $stores_hcm as $store ) : ?>
				<li><?php echo esc_html( $store ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>
