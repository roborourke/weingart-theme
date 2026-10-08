<?php
/**
 * Title: Stepped hero
 * Slug: weingart/stepped-hero
 * Description: A headline set in steps, with a vertical label and a wedge accent.
 * Categories: weingart, banner
 * Keywords: hero, headline, staircase, stepped
 * Viewport Width: 1400
 *
 * @package Weingart
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"is-style-label","align":"wide"} -->
	<p class="alignwide is-style-label"><?php esc_html_e( 'Basel School of Design / A study in disrupted grids', 'weingart' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:separator {"className":"is-style-rule-heavy","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-rule-heavy"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"70%"} -->
		<div class="wp-block-column" style="flex-basis:70%">
			<!-- wp:heading {"level":1,"className":"is-style-condensed","fontSize":"display"} -->
			<h1 class="wp-block-heading is-style-condensed has-display-font-size"><?php esc_html_e( 'Type', 'weingart' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"is-style-extended","style":{"spacing":{"padding":{"left":"var:preset|spacing|50"},"margin":{"top":"0"}}},"fontSize":"xx-large"} -->
			<p class="is-style-extended has-xx-large-font-size" style="margin-top:0;padding-left:var(--wp--preset--spacing--50)"><?php esc_html_e( 'is made', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"is-style-condensed","style":{"spacing":{"padding":{"left":"var:preset|spacing|60"},"margin":{"top":"0"}}},"fontSize":"display"} -->
			<p class="is-style-condensed has-display-font-size" style="margin-top:0;padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e( 'of tension', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"is-style-extended","style":{"spacing":{"padding":{"left":"var:preset|spacing|70"},"margin":{"top":"0"}}},"fontSize":"xx-large"} -->
			<p class="is-style-extended has-xx-large-font-size" style="margin-top:0;padding-left:var(--wp--preset--spacing--70)"><?php esc_html_e( 'and air.', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"30%"} -->
		<div class="wp-block-column" style="flex-basis:30%">
			<!-- wp:paragraph {"className":"is-style-label","style":{"typography":{"writingMode":"vertical-rl"}}} -->
			<p class="is-style-label" style="writing-mode:vertical-rl"><?php esc_html_e( 'Nº 01 / Grid, then rupture', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Set it tight. Set it loud. Keep the grid so you have something to break. Every line moves one step from the last.', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#index"><?php esc_html_e( 'Read the index', 'weingart' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:group {"className":"is-style-wedge","style":{"dimensions":{"minHeight":"8rem"}},"backgroundColor":"yellow","layout":{"type":"constrained","contentSize":"8rem","justifyContent":"left"}} -->
			<div class="wp-block-group is-style-wedge has-yellow-background-color has-background" style="min-height:8rem"></div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
