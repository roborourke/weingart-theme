<?php
/**
 * Title: Numbered index
 * Slug: weingart/index-list
 * Description: A table of contents with large mono numerals against small text.
 * Categories: weingart, text
 * Keywords: contents, index, list, numbers
 * Viewport Width: 1400
 *
 * @package Weingart
 */

$weingart_rows = array(
	array( '01', __( 'Basel', 'weingart' ), __( 'Teaching a way of seeing: exercises in line, point and the page as a field.', 'weingart' ), __( 'School', 'weingart' ) ),
	array( '02', __( 'Monatsblätter', 'weingart' ), __( 'A trade journal used as a laboratory for type, with covers that broke its own rules.', 'weingart' ), __( 'Journal', 'weingart' ) ),
	array( '03', __( 'Montage', 'weingart' ), __( 'Film strips layered on a light table, then shot down to a single plate.', 'weingart' ), __( 'Process', 'weingart' ) ),
	array( '04', __( 'Grid', 'weingart' ), __( 'The Swiss grid as a place to leave from, and the rules that make leaving visible.', 'weingart' ), __( 'Method', 'weingart' ) ),
	array( '05', __( 'Hand', 'weingart' ), __( 'Pencil, scalpel, photostat. Proofs that kept their glue marks.', 'weingart' ), __( 'Craft', 'weingart' ) ),
);
?>
<!-- wp:group {"anchor":"index","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div id="index" class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"is-style-label","align":"wide"} -->
	<p class="alignwide is-style-label"><?php esc_html_e( 'Contents', 'weingart' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:separator {"className":"is-style-rule-heavy","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-rule-heavy"/>
	<!-- /wp:separator -->
<?php foreach ( $weingart_rows as $weingart_row ) : ?>

	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"22%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:22%">
			<!-- wp:paragraph {"className":"is-style-numeral","fontSize":"display"} -->
			<p class="is-style-numeral has-display-font-size"><?php echo esc_html( $weingart_row[0] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"53%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:53%">
			<!-- wp:heading {"level":2,"className":"is-style-condensed","fontSize":"xx-large"} -->
			<h2 class="wp-block-heading is-style-condensed has-xx-large-font-size"><?php echo esc_html( $weingart_row[1] ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php echo esc_html( $weingart_row[2] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"25%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:25%">
			<!-- wp:paragraph {"className":"is-style-caption"} -->
			<p class="is-style-caption"><?php echo esc_html( $weingart_row[3] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"className":"is-style-wide","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->
<?php endforeach; ?>
</div>
<!-- /wp:group -->
