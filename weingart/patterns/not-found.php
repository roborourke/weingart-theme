<?php
/**
 * Title: Page not found
 * Slug: weingart/not-found
 * Description: A 404 message with a large numeral and a search form. Used by the 404 template.
 * Inserter: no
 *
 * @package Weingart
 */

?>
<!-- wp:paragraph {"className":"is-style-numeral","align":"wide"} -->
<p class="alignwide is-style-numeral">404</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"is-style-condensed","align":"wide","fontSize":"xx-large"} -->
<h1 class="wp-block-heading alignwide is-style-condensed has-xx-large-font-size"><?php esc_html_e( 'Page not found', 'weingart' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"wide"} -->
<p class="alignwide"><?php esc_html_e( 'The sheet you asked for is not on the table. Try a search, or go back to the index.', 'weingart' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:pattern {"slug":"weingart/search-form"} /-->
