<?php
/**
 * Template Name: Полная ширина
 */

get_header(); ?>

			<div id="primary" class="content-area ">
				<main id="main" class="site-main">
					<?php
						/**
						 * woocommerce_before_main_content hook.
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 */
						do_action( 'woocommerce_before_main_content' );
					?>
					<?php
					while ( have_posts() ) : the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title tkani_basket_stile">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php
								the_content();
								?>
							</div><!-- .entry-content -->

						</article><!-- #post-<?php the_ID(); ?> -->
					<?php
					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php

get_footer();
