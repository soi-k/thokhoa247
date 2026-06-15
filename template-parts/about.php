<?php
/**
 * Giới thiệu thương hiệu + "Vì sao chọn chúng tôi"
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_image   = thokhoa247_get_field( 'about_image', 'option', get_template_directory_uri() . '/assets/images/about-placeholder.svg' );
$about_content = thokhoa247_get_field( 'about_content', 'option', '' );
$reasons       = thokhoa247_default_why_choose_us();
?>
<section class="about">
	<div class="container about__inner">
		<div class="about__image">
			<img src="<?php echo esc_url( $about_image ); ?>" alt="<?php esc_attr_e( 'Giới thiệu Thợ Khóa 247', 'thokhoa247' ); ?>" loading="lazy">
		</div>
		<div class="about__content">
			<h2 class="section-title section-title--left"><?php esc_html_e( 'Giới thiệu', 'thokhoa247' ); ?></h2>
			<?php if ( $about_content ) : ?>
				<div class="about__text"><?php echo wp_kses_post( $about_content ); ?></div>
			<?php else : ?>
				<div class="about__text">
					<p>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: site name */
								__( '%s là đơn vị cung cấp dịch vụ sửa khóa, mở khóa, làm chìa khóa chuyên nghiệp tại Hà Nội và TP. Hồ Chí Minh. Chúng tôi sở hữu đội ngũ thợ khóa lành nghề cùng trang thiết bị hiện đại, sẵn sàng có mặt 24/24.', 'thokhoa247' ),
								get_bloginfo( 'name' )
							)
						);
						?>
					</p>
				</div>
			<?php endif; ?>

			<h3 class="about__why-title"><?php esc_html_e( 'Vì sao chọn chúng tôi', 'thokhoa247' ); ?></h3>
			<div class="about__reasons">
				<?php foreach ( $reasons as $reason ) : ?>
					<div class="about__reason">
						<h4><?php echo esc_html( $reason['title'] ); ?></h4>
						<p><?php echo esc_html( $reason['desc'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
