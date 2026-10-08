<?php
/**
 * Title: Journal header
 * Slug: weingart/journal-header
 * Description: The Journal headline and a heavy rule. Used by the index template.
 * Inserter: no
 *
 * @package Weingart
 */

?>
<!-- wp:heading {"level":1,"className":"is-style-condensed","align":"wide","fontSize":"display"} -->
<h1 class="wp-block-heading alignwide is-style-condensed has-display-font-size"><?php esc_html_e( 'Journal', 'weingart' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:separator {"className":"is-style-rule-heavy","align":"wide"} -->
<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-rule-heavy"/>
<!-- /wp:separator -->
