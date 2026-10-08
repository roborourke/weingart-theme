<?php
/**
 * Title: Post grid
 * Slug: weingart/post-grid
 * Description: The latest posts in three columns, numbered 01, 02, 03.
 * Categories: weingart, query
 * Keywords: posts, grid, journal, latest
 * Viewport Width: 1400
 *
 * @package Weingart
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":2,"className":"is-style-label","align":"wide"} -->
	<h2 class="wp-block-heading alignwide is-style-label"><?php esc_html_e( 'Journal / Latest entries', 'weingart' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:separator {"className":"is-style-rule-heavy","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-rule-heavy"/>
	<!-- /wp:separator -->

	<!-- wp:query {"queryId":11,"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"className":"is-style-indexed","layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:post-terms {"term":"category"} /-->

			<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"x-large"} /-->

			<!-- wp:post-excerpt {"moreText":"","excerptLength":22} /-->

			<!-- wp:post-date {"format":"Y-m-d"} /-->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph {"className":"is-style-caption"} -->
			<p class="is-style-caption"><?php esc_html_e( 'Nothing is set yet.', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->
