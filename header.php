<?php
/**
 * Header: top bar + logo + menu chính
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact = thokhoa247_default_contact();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="topbar">
	<div class="container topbar__inner">
		<div class="topbar__left">
			<span><?php esc_html_e( 'Hệ thống cửa hàng', 'thokhoa247' ); ?></span>
			<span><?php esc_html_e( 'Câu hỏi thường gặp', 'thokhoa247' ); ?></span>
		</div>
		<div class="topbar__right">
			<span>
				<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.7 3.6.7.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.7 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
				<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['hotline'] ) ); ?>"><?php echo esc_html( $contact['hotline'] ); ?></a>
			</span>
			<span>
				<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm1 5v5l4 2-.8 1.6L11 13V7h2z"/></svg>
				<?php echo esc_html( $contact['working_hours'] ); ?>
			</span>
			<span><?php esc_html_e( 'Liên hệ', 'thokhoa247' ); ?></span>
		</div>
	</div>
</div>

<header class="site-header">
	<div class="container site-header__inner">
		<div class="site-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<span class="site-logo__text"><?php bloginfo( 'name' ); ?></span>
				<?php endif; ?>
			</a>
		</div>
		<button class="menu-toggle" aria-label="<?php esc_attr_e( 'Mở menu', 'thokhoa247' ); ?>" aria-expanded="false">
			<span></span><span></span><span></span>
		</button>
	</div>

	<nav class="main-nav" aria-label="<?php esc_attr_e( 'Menu chính', 'thokhoa247' ); ?>">
		<div class="container">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'main-nav__list',
					)
				);
			} else {
				?>
				<ul class="main-nav__list">
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Trang chủ', 'thokhoa247' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Khóa ô tô', 'thokhoa247' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Sửa khóa xe máy', 'thokhoa247' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Sửa khóa két sắt', 'thokhoa247' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Sửa khóa cửa', 'thokhoa247' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Sửa khóa cửa cuốn', 'thokhoa247' ); ?></a></li>
					<li><a href="<?php echo esc_url( get_post_type_archive_link( 'san-pham' ) ); ?>"><?php esc_html_e( 'Sản phẩm', 'thokhoa247' ); ?></a></li>
					<li><a href="#"><?php esc_html_e( 'Liên hệ', 'thokhoa247' ); ?></a></li>
				</ul>
				<?php
			}
			?>
		</div>
	</nav>
</header>
