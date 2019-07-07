=== WooCommerce Better Usability ===
Contributors: moiseh
Tags: woocommerce, usability, ux, ajax, checkout, cart, shop
Requires at least: 4.8
Tested up to: 5.0.1
Stable tag: 1.0.26
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Provides overall improvements of the user experience when buying products in a WooCommerce based store. The areas of that the improvements was included are: Shop, Product, Cart and Checkout.

Free version features:

* Auto refresh the price totals on cart page when quantity changes using AJAX
* Show "-" and "+" buttons around the quantity field
* Show confirmation before user changes quantity to zero
* Go to checkout directly instead of cart page (simplified buy process)
* Allow to delete or change quantity on checkout page
* Allow to change product quantity direct on shop page
* Allow to add to cart AJAX on product page (like on shop)
* Ability to override various default things of WooCommerce
* Hide quantity fields on Product and Cart pages

[youtube https://www.youtube.com/watch?v=ysF3ZLYO1nQ ]

Premium version features:

* Synchronize products automatically with cart when change quantity [view demo](https://youtu.be/Xqv8rZ-hoOk)
* Update price automatically in Product pages, like on cart [view demo](https://youtu.be/ZKYJZAUXV_g)
* Change product variations directly in Shop page, meaning less clicks to buy [view demo](https://youtu.be/NhJewWjX-I8)
* Change product quantities in Shop page, automatically synchronizing with MiniCart widget [view demo](https://youtu.be/r7XQtkPV7sg)
* Make AJAX requests to delete product on checkout page, without full page reload [view demo](https://youtu.be/KYkqoqfsi3U)
* Display quantity buttons (+/-) on Product, Checkout and Mini-Cart widget [view demo](https://youtu.be/8GDpWQhcfyU)

View PRO version live demonstration [clicking here](http://ragob.com/wbudemo/).
Get PRO version [clicking here](https://gumroad.com/l/rLol).

== Installation ==

1. Upload `woo-better-usability.zip` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. It's done. Now you can go to the Settings to customize what you want

== Screenshots ==

1. Add to cart on Shop
2. Cart configuration
3. Product configuration
4. Shop configuration

== Changelog ==

= 1.0.15 =
* Added option to ignore the shop quantity change field on front page

= 1.0.16 =
* Fixed bug when working with WPML string translation on checkout
* Fixed randomic crashing and excessive AJAX requests problems on Shop page
* Fixed specific cases quantity synchronization problems

= 1.0.17 =
* Added AJAX queue system to avoid request problems
* Added hook wbu_is_shop_loop to intercept shop pages
* Prevent quantity duplication in specific cases

= 1.0.18 =
* Added properly internationalization (i18n)
* Added WC tested up compatibility tag
* Compatibility with WooCommerce Min/Max Quantities on Shop page

= 1.0.19 =
* Avada theme improvements and bugfixes

= 1.0.20 =
* Making automatic Cart updating text configuration more flexible 
* Testing with new WordPress 5
* Fixing Update cart button not hiding on Avada theme

= 1.0.21 =
* Updated deprecated jQuery click events
* Fixed single product page quantity inconsistence when add to cart multiple times

= 1.0.22 =
* Added rule to respect the stock quantity when change quantity in Shop page
* Enqueue wbulite.css file properly cause it stopped loading in last woocommerce versions

= 1.0.23 =
* Fixed increment and decrement quantity buttons bug
* Simplified and abstracted settings API

= 1.0.24 =
* Enqueue assets in all pages for better compatibility with custom pages
* Reduced `is shop loop` detection checks to better compatibility with Elementor and relateds
* Added overlay when AJAX refreshing cart using `Make Custom AJAX` method
* Removed option `Don't apply this option to front page` (use `wbu_enable_quantity_input` filter instead)
* Removed option `Always enqueue assets for better compatibility`
* Removed option `Optimize to make Cart work better when embebed in other pages`

= 1.0.25 =
* Fix and optimize some mess in JS code and removing loops
* Fix issue in Related products not showing quantity input for first product

= 1.0.26 =
* Changed the cart overlay behavior in Custom AJAX mode to use the default of WooCommerce

== Frequently Asked Questions ==

== Upgrade Notice ==
