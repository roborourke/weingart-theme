<?php
/**
 * Title: Archive loop
 * Slug: weingart/archive-loop
 * Description: The main query as a two-column numbered list with pagination. Used by the index, archive and search templates.
 * Categories: weingart, query
 * Keywords: archive, posts, list, pagination
 * Viewport Width: 1400
 *
 * @package Weingart
 */

?>
<!-- wp:query {"queryId":12,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide"} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"className":"is-style-indexed","layout":{"type":"grid","columnCount":2}} -->
		<!-- wp:post-terms {"term":"category"} /-->

		<!-- wp:post-title {"level":2,"isLink":true,"fontSize":"xx-large"} /-->

		<!-- wp:post-excerpt {"moreText":"","excerptLength":28} /-->

		<!-- wp:post-date {"format":"Y-m-d"} /-->
	<!-- /wp:post-template -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:query-pagination-previous /-->

		<!-- wp:query-pagination-numbers /-->

		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Nothing is set here yet. Try another word or return to the index.', 'weingart' ); ?></p>
		<!-- /wp:paragraph -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
