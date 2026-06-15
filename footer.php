<?php
/**
 * Footer: dải hotline, 4 cột thông tin, đối tác, "mọi người cũng tìm kiếm"
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact     = thokhoa247_default_contact();
$stores_hn   = thokhoa247_default_stores( 'ha-noi' );
$stores_hcm  = thokhoa247_default_stores( 'ho-chi-minh' );
?>
	<div class="hotline-strip">
		<div class="container hotline-strip__inner">
			<div class="hotline-strip__item">
				<span class="hotline-strip__label"><?php esc_html_e( 'Hotline', 'thokhoa247' ); ?></span>
				<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>"><?php echo esc_html( $contact['hotline'] ); ?></a>
			</div>
			<div class="hotline-strip__item">
				<span class="hotline-strip__label"><?php esc_html_e( 'Tư vấn miền Nam', 'thokhoa247' ); ?></span>
				<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline_mien_nam'] ) ); ?>"><?php echo esc_html( $contact['hotline_mien_nam'] ); ?></a>
			</div>
			<div class="hotline-strip__item">
				<span class="hotline-strip__label"><?php esc_html_e( 'Tư vấn miền Bắc', 'thokhoa247' ); ?></span>
				<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline_mien_bac'] ) ); ?>"><?php echo esc_html( $contact['hotline_mien_bac'] ); ?></a>
			</div>
		</div>
	</div>

	<footer class="site-footer">
		<div class="container site-footer__grid">
			<div class="footer-col">
				<h3><?php esc_html_e( 'Giới thiệu', 'thokhoa247' ); ?></h3>
				<p>
					<?php esc_html_e( 'THỢ KHÓA 247 là một trong những đơn vị sửa khóa uy tín hàng đầu, trang thiết bị hiện đại, đội ngũ thợ khóa tay nghề cao, tự tin xử lý được tất cả các vấn đề về khóa.', 'thokhoa247' ); ?>
				</p>
				<h3><?php esc_html_e( 'Phương châm hoạt động', 'thokhoa247' ); ?></h3>
				<p><?php esc_html_e( 'Nhanh - Chất lượng - Giá tốt là 3 yếu tố chúng tôi hướng tới trong dịch vụ sửa khóa của mình.', 'thokhoa247' ); ?></p>
			</div>

			<div class="footer-col">
				<h3><?php esc_html_e( 'Cửa hàng Hà Nội', 'thokhoa247' ); ?></h3>
				<ul class="footer-stores">
					<?php foreach ( $stores_hn as $store ) : ?>
						<li><?php echo esc_html( $store ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="footer-col">
				<h3><?php esc_html_e( 'Cửa hàng Hồ Chí Minh', 'thokhoa247' ); ?></h3>
				<ul class="footer-stores">
					<?php foreach ( $stores_hcm as $store ) : ?>
						<li><?php echo esc_html( $store ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="footer-col">
				<h3><?php esc_html_e( 'Bản đồ', 'thokhoa247' ); ?></h3>
				<div class="footer-map">
					<iframe
						src="https://www.google.com/maps?q=Ha+Noi&output=embed"
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						title="<?php esc_attr_e( 'Bản đồ', 'thokhoa247' ); ?>"></iframe>
				</div>
			</div>
		</div>

		<div class="container footer-search">
			<h4><?php esc_html_e( 'Mọi người cùng tìm kiếm', 'thokhoa247' ); ?></h4>
			<p>
				<?php
				esc_html_e(
					'Sửa khóa Hà Nội | Làm chìa khóa ô tô | Mở khóa xe hơi | Thay pin chìa khóa ô tô | Thay vỏ chìa khóa ô tô | Sửa khóa két sắt | Làm thẻ từ thang máy | Sửa khóa xe máy | Làm chìa khóa cửa cuốn | Sửa khóa tại nhà | Dịch vụ sửa cửa cuốn | Mở khóa ô tô | Lắp khóa cổng phụ ô tô | Làm chìa khóa vespa | Làm chìa khóa smartkey',
					'thokhoa247'
				);
				?>
			</p>
		</div>

		<div class="container footer-bottom">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved', 'thokhoa247' ); ?></span>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
			}
			?>
		</div>
	</footer>

	<?php
	$zalo_so = thokhoa247_get_field( 'zalo_so', 'option', $contact['zalo'] );
	if ( $zalo_so ) :
		?>
		<a class="zalo-float" href="https://zalo.me/<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $zalo_so ) ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Chat Zalo', 'thokhoa247' ); ?>">
			<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.5 2 2 5.8 2 10.5c0 2.6 1.4 4.9 3.6 6.5-.2.9-.6 2.1-.8 2.8-.1.3.2.6.5.5 1-.3 2.5-.9 3.4-1.4 1 .3 2.1.4 3.3.4 5.5 0 10-3.8 10-8.8S17.5 2 12 2z"/></svg>
			<span><?php esc_html_e( 'Chat Zalo', 'thokhoa247' ); ?></span>
		</a>
	<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
