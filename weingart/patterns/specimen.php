<?php
/**
 * Title: Type specimen
 * Slug: weingart/specimen
 * Description: Width and weight contrast, the type scale and the palette.
 * Categories: weingart, text
 * Keywords: specimen, type scale, palette, typography
 * Viewport Width: 1400
 *
 * @package Weingart
 */

$weingart_scale = array(
	array( 'display', '7rem' ),
	array( 'xx-large', '3.5rem' ),
	array( 'x-large', '2rem' ),
	array( 'large', '1.25rem' ),
	array( 'base', '1rem' ),
	array( 'small', '0.875rem' ),
	array( 'x-small', '0.75rem' ),
);

$weingart_palette = array(
	array( 'base', __( 'Paper', 'weingart' ), 'contrast' ),
	array( 'contrast', __( 'Ink', 'weingart' ), 'base' ),
	array( 'accent-1', __( 'Cyan film', 'weingart' ), 'contrast' ),
	array( 'accent-2', __( 'Magenta film', 'weingart' ), 'contrast' ),
	array( 'accent-3', __( 'Yellow film', 'weingart' ), 'contrast' ),
	array( 'accent-4', __( 'Basel red', 'weingart' ), 'base' ),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"is-style-label","align":"wide"} -->
	<p class="alignwide is-style-label"><?php esc_html_e( 'Specimen / Archivo and IBM Plex Mono', 'weingart' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:separator {"className":"is-style-rule-heavy","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-rule-heavy"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"is-style-condensed","fontSize":"giant"} -->
			<p class="is-style-condensed has-giant-font-size">Aa</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"is-style-caption"} -->
			<p class="is-style-caption"><?php esc_html_e( 'Width 62, weight 900. For headlines that must fit.', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"is-style-extended","fontSize":"giant"} -->
			<p class="is-style-extended has-giant-font-size">Aa</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"is-style-caption"} -->
			<p class="is-style-caption"><?php esc_html_e( 'Width 125, weight 200. For air between the heavy lines.', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"className":"is-style-wide","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->
<?php foreach ( $weingart_scale as $weingart_step ) : ?>

	<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"22%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:22%">
			<!-- wp:paragraph {"className":"is-style-caption"} -->
			<p class="is-style-caption"><?php echo esc_html( $weingart_step[0] . ' / ' . $weingart_step[1] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"78%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:78%">
			<!-- wp:paragraph {"className":"is-style-condensed","fontSize":"<?php echo esc_attr( $weingart_step[0] ); ?>"} -->
			<p class="is-style-condensed has-<?php echo esc_attr( $weingart_step[0] ); ?>-font-size"><?php esc_html_e( 'Wege zur Typographie', 'weingart' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
<?php endforeach; ?>

	<!-- wp:separator {"className":"is-style-wide","align":"wide"} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
<?php foreach ( $weingart_palette as $weingart_swatch ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"dimensions":{"minHeight":"9rem"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"width":"1px","style":"solid"}},"borderColor":"contrast","backgroundColor":"<?php echo esc_attr( $weingart_swatch[0] ); ?>","textColor":"<?php echo esc_attr( $weingart_swatch[2] ); ?>","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"bottom"}} -->
			<div class="wp-block-group has-border-color has-contrast-border-color has-<?php echo esc_attr( $weingart_swatch[2] ); ?>-color has-<?php echo esc_attr( $weingart_swatch[0] ); ?>-background-color has-text-color has-background" style="border-style:solid;border-width:1px;min-height:9rem;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
				<!-- wp:paragraph {"className":"is-style-label"} -->
				<p class="is-style-label"><?php echo esc_html( $weingart_swatch[1] ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
