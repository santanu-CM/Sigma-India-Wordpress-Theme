<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
	if (!$enable_vc) {
	?>
		<header class="entry-header">
    <?php
    if ( is_account_page() ) {
        global $wp;

        // Loop through query_vars to find the matching endpoint
        $endpoint_titles = [
            'dashboard' => 'My Account',
            'edit-account' => 'My Account / Profile Information',
            'edit-address' => 'My Account / Addresses',
            'orders' => 'My Account / Orders',            
            'offline-verify' => 'My Account / Product Registration',
            'verify-activity-code' => 'My Account / Verify Activity Code',
            'points-history' => 'My Account / My Point',
            'referral-code' => 'My Account / My Referral',     
            'merchandise-products' => 'My Account / Merchandise Products',
            'after-sale' => 'My Account / After Sales Support',
            'lense-loan' => 'My Account / Lense Finance',
            'exchange-old-product' => 'My Account / Exchange',
            'product-rental' => 'My Account / Rental',
            'service-registration' => 'My Account / Service Registration',
        ];

        $title = 'My Account'; // Default title

        foreach ( $endpoint_titles as $endpoint => $label ) {
            if ( isset( $wp->query_vars[ $endpoint ] ) ) {
                $title = $label;
                break;
            }
        }

        echo '<h1 class="entry-title f__h4 spacing__bottom__40">' . esc_html( $title ) . '</h1>';
    } else {
        the_title('<h1 class="entry-title f__h4 spacing__bottom__40">', '</h1>');
    }
    ?>
</header>


	<?php } ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'wp-bootstrap-starter'),
			'after'  => '</div>',
		));
		?>
	</div><!-- .entry-content -->

	<?php if (get_edit_post_link() && !$enable_vc) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__('Edit %s', 'wp-bootstrap-starter'),
					the_title('<span class="screen-reader-text">"', '"</span>', false)
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->