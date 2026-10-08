<?php
/**
 * Title: Post navigation
 * Slug: weingart/post-navigation
 * Description: Previous and next post links with translated labels.
 * Inserter: no
 *
 * @package Weingart
 */

?>
<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"30rem"}} -->
<div class="wp-block-group alignwide">
	<!-- wp:post-navigation-link {"type":"previous","label":"<?php echo esc_attr_x( 'Previous', 'post navigation label', 'weingart' ); ?>","showTitle":true} /-->

	<!-- wp:post-navigation-link {"label":"<?php echo esc_attr_x( 'Next', 'post navigation label', 'weingart' ); ?>","showTitle":true} /-->
</div>
<!-- /wp:group -->
