<?php
/**
 * Title: Halftone quote
 * Slug: weingart/halftone-quote
 * Description: A pull quote on a halftone dot screen.
 * Categories: weingart, text
 * Keywords: quote, halftone, pullquote
 * Viewport Width: 1400
 *
 * @package Weingart
 */

?>
<!-- wp:group {"align":"full","className":"is-style-halftone","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-halftone">
	<!-- wp:group {"align":"wide","backgroundColor":"paper","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"36rem","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide has-paper-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph {"className":"is-style-label"} -->
		<p class="is-style-label"><?php esc_html_e( 'Studio note / 07', 'weingart' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:quote -->
		<blockquote class="wp-block-quote">
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Make the grid visible. Then make it uncomfortable.', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->
			<cite><?php esc_html_e( 'Weingart theme, studio notes', 'weingart' ); ?></cite>
		</blockquote>
		<!-- /wp:quote -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
