<?php
/**
 * Title: Colophon footer
 * Slug: weingart/colophon
 * Description: An ink footer with the site title, a colophon note and a vertical label.
 * Categories: weingart, footer
 * Keywords: footer, colophon
 * Block Types: core/template-part/footer
 * Viewport Width: 1400
 *
 * @package Weingart
 */

?>
<!-- wp:group {"align":"full","className":"is-style-ink","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-ink" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:separator {"className":"is-style-rule-heavy","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-rule-heavy"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"10%"} -->
		<div class="wp-block-column" style="flex-basis:10%">
			<!-- wp:paragraph {"className":"is-style-label","style":{"typography":{"writingMode":"vertical-rl"}}} -->
			<p class="is-style-label" style="writing-mode:vertical-rl"><?php esc_html_e( 'Colophon', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"45%"} -->
		<div class="wp-block-column" style="flex-basis:45%">
			<!-- wp:site-title {"level":2,"fontSize":"xx-large"} /-->

			<!-- wp:site-tagline /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"45%"} -->
		<div class="wp-block-column" style="flex-basis:45%">
			<!-- wp:paragraph {"className":"is-style-caption"} -->
			<p class="is-style-caption"><?php esc_html_e( 'Set in Archivo and IBM Plex Mono, both under the SIL Open Font License. Three process colours, printed as film.', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"is-style-caption"} -->
			<p class="is-style-caption"><a href="#"><?php esc_html_e( 'Back to top', 'weingart' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
