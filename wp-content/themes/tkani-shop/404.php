<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package tkani
 */

get_header();
?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title tkani-404-title"><?php esc_html_e( 'Oops! Эта страница не может быть найдена.', 'tkani' ); ?></h1>

				</header><!-- .page-header -->



				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
