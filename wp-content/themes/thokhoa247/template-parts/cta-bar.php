<?php
/**
 * Dải CTA nổi bật: "Bạn cần hỗ trợ? GỌI NGAY - Hotline: ..."
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact = thokhoa247_default_contact();
?>
<section class="cta-bar">
	<div class="container cta-bar__inner">
		<span class="cta-bar__text"><?php esc_html_e( 'Bạn cần hỗ trợ?', 'thokhoa247' ); ?></span>
		<a class="btn btn--call" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>">
			<?php esc_html_e( 'GỌI NGAY', 'thokhoa247' ); ?> - <?php esc_html_e( 'Hotline:', 'thokhoa247' ); ?> <?php echo esc_html( $contact['hotline'] ); ?>
		</a>
	</div>
</section>
