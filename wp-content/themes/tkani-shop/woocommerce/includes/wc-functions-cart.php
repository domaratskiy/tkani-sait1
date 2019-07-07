<?php
if ( ! function_exists( 'tkani_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	add_filter( 'woocommerce_add_to_cart_fragments', 'tkani_woocommerce_cart_link_fragment' );
	function tkani_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		tkani_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	}
}
	function tkani_woocommerce_cart_link() {
		?>
		<a class="cart-contents w3view-cart tkani-style-basket" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'tkani' ); ?>">
			<?php
				$item_count_text = sprintf(
					/* translators: number of items in the mini cart. */
					_n( '%d item', '%d шт', WC()->cart->get_cart_contents_count(), 'tkani' ),
					WC()->cart->get_cart_contents_count()
				);
			?>	


			<span class="count tkani-basket-color"><?php echo esc_html( $item_count_text ); ?></span>

			<span class="amount tkani-basket-color"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> 


		
			
			
		</a>
		<?php
	}







if ( ! function_exists( 'tkani_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function tkani_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php tkani_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);
				
				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}