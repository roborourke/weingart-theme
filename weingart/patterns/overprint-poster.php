<?php
/**
 * Title: Overprint poster
 * Slug: weingart/overprint-poster
 * Description: Three colour plates that overlap and multiply, with crop and registration marks.
 * Categories: weingart, featured
 * Keywords: poster, overprint, film, cmyk, plates
 * Viewport Width: 1400
 *
 * @package Weingart
 */

$weingart_plates = array(
	array( 'accent-1', __( 'Plate 1 / Cyan', 'weingart' ), __( 'Film', 'weingart' ) ),
	array( 'accent-2', __( 'Plate 2 / Magenta', 'weingart' ), __( 'Montage', 'weingart' ) ),
	array( 'accent-3', __( 'Plate 3 / Yellow', 'weingart' ), __( 'Layers', 'weingart' ) ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","className":"is-style-registration","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide is-style-registration">
		<!-- wp:group {"className":"is-style-overprint","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group is-style-overprint">
<?php foreach ( $weingart_plates as $weingart_plate ) : ?>
			<!-- wp:group {"style":{"dimensions":{"minHeight":"28rem"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"<?php echo esc_attr( $weingart_plate[0] ); ?>","textColor":"contrast","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between"}} -->
			<div class="wp-block-group has-contrast-color has-<?php echo esc_attr( $weingart_plate[0] ); ?>-background-color has-text-color has-background" style="min-height:28rem;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:paragraph {"className":"is-style-label"} -->
				<p class="is-style-label"><?php echo esc_html( $weingart_plate[1] ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":2,"className":"is-style-condensed","fontSize":"display"} -->
				<h2 class="wp-block-heading is-style-condensed has-display-font-size"><?php echo esc_html( $weingart_plate[2] ); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->
<?php endforeach; ?>
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"is-style-caption","align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<p class="alignwide is-style-caption" style="margin-top:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Fig. 1 / Three plates, one sheet. Where two colours overlap, the ink multiplies into a third.', 'weingart' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
