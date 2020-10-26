<?php
/**
 *
 * @link:       http://www.femiyb.com
 * @package           Woo_Simple_Hooks
 *
 * Plugin Name:       	Simple Hooks for WooCommerce
 * Plugin URI:        	http://femiyb.co.za
 * Description:       	This plugin makes it easier for you to add WooCommerce hooks, so if you don't know your way around php, you can easily add the hooks from the dashboard.
 * Version:           	1.1.1
 * Requires at least: 	4.4
 * Tested up to: 		5.4.1
 * WC requires at least:3.0.0
 * WC tested up to: 	4.1.0
 * Author:            	Femi
 * Author URI:        	http://www.femiyb.com
 * License:            	GPL-2.0+
 * License URI:        	http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:         woo-simple-hooks
 * Domain Path:         /languages
 */
 
 /**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-hooks.php';

function wcsh_load_plugin_text_domain() {
	load_plugin_textdomain( ' woo-simple-hooks', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'wcsh_load_plugin_text_domain' );


function run_wcsh_Loader() {

	$plugin = new wcsh_Loader();
	$plugin->run();



}
run_wcsh_Loader();

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { // Check if woocommerce is active


// Simple Hooks Settings Page
add_action('admin_menu', 'wcsh_menu');
function wcsh_menu() {
    add_submenu_page( 'woocommerce', 'Simple Hooks Settings', 'Simple Hooks Settings', 'manage_options', 'wcsh-settings', 'wcsh_settings_page' ); 
  	add_action( 'admin_init', 'update_wcsh_settings' );
}


// Create function to register plugin settings in the database
if( !function_exists("update_wcsh_settings") )
{
function update_wcsh_settings() {
		$shophooks = array("wcsh_before_main_content", "wcsh_archive_description", "wcsh_before_shop_loop", "wcsh_before_shop_loop_item", "wcsh_before_shop_loop_item_title", "wcsh_shop_loop_item_title", "wcsh_after_shop_loop_item_title", "wcsh_after_shop_loop_item", "wcsh_after_shop_loop");
		foreach ($shophooks as $shophook){
		register_setting( 'wcsh-settings-shophook', $shophook );
		}
	
		$singleproducthooks = array("wcsh_before_single_product", "wcsh_before_single_product_summary", "wcsh_single_product_summary", "wcsh_wcsh_add_to_cart", "wcsh_before_add_to_cart_form", "wcsh_before_add_to_cart_button", "wcsh_before_add_to_cart_quantity", "wcsh_after_add_to_cart_quantity", "wcsh_after_add_to_cart_button", "wcsh_after_add_to_cart_form", "wcsh_product_thumbnails", "wcsh_after_single_product_summary", "wcsh_product_meta_start", "wcsh_product_meta_end");
		foreach ($singleproducthooks as $singleproducthook){
		register_setting( 'wcsh-settings-singleproduct', $singleproducthook );
		}
	
		$cartpagehooks = array("wcsh_before_cart", "wcsh_before_cart_table", "wcsh_before_cart_contents", "wcsh_cart_contents", "wcsh_cart_coupon", "wcsh_cart_actions", "wcsh_after_cart_contents", "wcsh_after_cart_table", "wcsh_before_cart_totals", "wcsh_cart_totals_before_shipping", "wcsh_after_shipping_rate", "wcsh_before_shipping_calculator", "wcsh_after_shipping_calculator", "wcsh_cart_totals_after_shipping", "wcsh_cart_totals_before_order_total", "wcsh_cart_totals_after_order_total", "wcsh_proceed_to_checkout", "wcsh_after_cart_totals", "wcsh_after_cart", "wcsh_after_checkout_billing_form");
		foreach ($cartpagehooks as $cartpagehook){
		register_setting( 'wcsh-settings-cartpage', $cartpagehook );
		}
	
		$checkoutpagehooks = array("wcsh_before_checkout_form", "wcsh_checkout_before_customer_details", "wcsh_checkout_after_customer_details", "wcsh_checkout_billing", "wcsh_before_checkout_billing_form", "wcsh_checkout_before_order_review", "wcsh_review_order_before_cart_contents", "wcsh_review_order_after_cart_contents", "wcsh_review_order_before_shipping", "wcsh_after_shipping_rate", "wcsh_review_order_after_shipping", "wcsh_review_order_before_order_total", "wcsh_review_order_after_order_total", "wcsh_review_order_before_payment", "wcsh_before_checkout_registration_form", "wcsh_checkout_before_terms_and_conditions", "wcsh_review_order_after_submit", "wcsh_review_order_after_payment", "wcsh_after_checkout_form");
		foreach ($checkoutpagehooks as $checkoutpagehook){
		register_setting('wcsh-settings-checkoutpage', $checkoutpagehook);
		}
	
		$accountpagehooks = array("wcsh_login_form_start", "wcsh_before_customer_login_form", "wcsh_login_form", "wcsh_login_form_end", "wcsh_after_customer_login_form");
		foreach ($accountpagehooks as $accountpagehook){
		register_setting( 'wcsh-settings-accountpage', $accountpagehook );
		}
	
		$otherhooks = array("wcsh_before_mini_cart", "wcsh_before_mini_cart_contents");
		foreach ($otherhooks as $otherhook){
		register_setting( 'wcsh-settings-otherhooks', $otherhook );
		}
	
}
}

// Create WordPress plugin page
if( !function_exists("wcsh_settings_page") ) {
	
function wcsh_settings_page(){
	$shophooks = array(
					''. __('Before Shop Page Main Content', 'woo-simple-hooks') .''=>"wcsh_before_main_content",
					''. __('Shop Page Archive Description', 'woo-simple-hooks') .''=>"wcsh_archive_description",
					''. __('Shop Page Before Shop Loop Hook', 'woo-simple-hooks') .''=>"wcsh_before_shop_loop",
					''. __('Shop Page Before Shop Loop Item', 'woo-simple-hooks') .''=>"wcsh_before_shop_loop_item",
					''. __('Shop Page Before Shop Loop Item Title', 'woo-simple-hooks') .''=>"wcsh_before_shop_loop_item_title",
					''. __('Shop Page Shop Loop Item Title', 'woo-simple-hooks') .''=>"wcsh_shop_loop_item_title",
					''. __('Shop Page After Shop Loop Item Title', 'woo-simple-hooks') .''=>"wcsh_after_shop_loop_item_title",
					''. __('Shop Page After Shop Loop Item', 'woo-simple-hooks') .''=>"wcsh_after_shop_loop_item",
					''. __('Shop Page After Shop Loop', 'woo-simple-hooks') .''=>"wcsh_after_shop_loop"
					);
	
	$singleproducthooks = array(
					''. __('Single Product Before single product hook', 'woo-simple-hooks') .''=>"wcsh_before_single_product",
					''. __('Single Product Before single product Summary hook', 'woo-simple-hooks') .''=>"wcsh_before_single_product_summary",
					''. __('Single Product Summary hook', 'woo-simple-hooks') .''=>"wcsh_single_product_summary",
					''. __('Single Product Simple Add to Cart hook', 'woo-simple-hooks') .''=>"wcsh_wcsh_add_to_cart",
					''. __('Single Product Before Add to Cart Form hook', 'woo-simple-hooks') .''=>"wcsh_before_add_to_cart_form",
					''. __('Single Product Before Add to Cart Button hook', 'woo-simple-hooks') .''=>"wcsh_before_add_to_cart_button",
					''. __('Single Product Before Add to Cart Quantity hook', 'woo-simple-hooks') .''=>"wcsh_before_add_to_cart_quantity",
					''. __('Single Product After Add to Cart Quantity hook', 'woo-simple-hooks') .''=>"wcsh_after_add_to_cart_quantity",
					''. __('Single Product After Add to Cart Button hook', 'woo-simple-hooks') .''=>"wcsh_after_add_to_cart_button",
					''. __('Single Product After Add to Cart Form hook', 'woo-simple-hooks') .''=>"wcsh_after_add_to_cart_form",
					''. __('Single Product Thumbnails hook', 'woo-simple-hooks') .''=>"wcsh_product_thumbnails",
					''. __('Single Product After Product Summary hook', 'woo-simple-hooks') .''=>"wcsh_after_single_product_summary",
					''. __('Single Product Meta Start hook', 'woo-simple-hooks') .''=>"wcsh_product_meta_start",
					''. __('Single Product Meta End hook', 'woo-simple-hooks') .''=>"wcsh_product_meta_end"
					);

	
	$cartpagehooks = array(
					''. __('Cart Page Before Cart Hook', 'woo-simple-hooks') .''=>"wcsh_before_cart",
					''. __('Cart Page Before Cart Table Hook', 'woo-simple-hooks') .''=>"wcsh_before_cart_table",
					''. __('Cart Page Before Cart Contents', 'woo-simple-hooks') .''=>"wcsh_before_cart_contents",
					''. __('Cart Page Cart Contents', 'woo-simple-hooks') .''=>"wcsh_cart_contents",
					''. __('Cart Page Cart Coupon', 'woo-simple-hooks') .''=>"wcsh_cart_coupon",
					''. __('Cart Page Cart Actions Hook', 'woo-simple-hooks') .''=>"wcsh_cart_actions",
					''. __('Cart Page After Cart Contents Hook', 'woo-simple-hooks') .''=>"wcsh_after_cart_contents",
					''. __('Cart Page After Cart Table Hook', 'woo-simple-hooks') .''=>"wcsh_after_cart_table",
					''. __('Cart Page Before Cart Totals Hook', 'woo-simple-hooks') .''=>"wcsh_before_cart_totals",
					''. __('Cart Page Cart Totals Before Shipping Hook', 'woo-simple-hooks') .''=>"wcsh_cart_totals_before_shipping",
					''. __('Cart Page After Shipping Rate', 'woo-simple-hooks') .''=>"wcsh_after_shipping_rate",
					''. __('Cart Page Before Shipping Calculator', 'woo-simple-hooks') .''=>"wcsh_before_shipping_calculator",
					''. __('Cart Page After Shipping Calculator', 'woo-simple-hooks') .''=>"wcsh_after_shipping_calculator",
					''. __('Cart Page Cart Totals After Shipping', 'woo-simple-hooks') .''=>"wcsh_cart_totals_after_shipping",
					''. __('Cart Page Cart Totals Before Order Total', 'woo-simple-hooks') .''=>"wcsh_cart_totals_before_order_total",
					''. __('Cart Page Cart Totals After Order Total', 'woo-simple-hooks') .''=>"wcsh_cart_totals_after_order_total",
					''. __('Cart Page Proceed To Checkout', 'woo-simple-hooks') .''=>"wcsh_proceed_to_checkout",
					''. __('Cart Page After Cart Totals', 'woo-simple-hooks') .''=>"wcsh_after_cart_totals",
					''. __('Cart Page After Cart', 'woo-simple-hooks') .''=>"wcsh_after_cart",
					''. __('Checkout Page Review Order Before Payment Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_before_payment"
					);
	
	$accountpagehooks = array(
					''. __('Account Page Login Form Start Hook', 'woo-simple-hooks') .''=>"wcsh_login_form_start",
					''. __('Account Page Before Customer Login Hook', 'woo-simple-hooks') .''=>"wcsh_before_customer_login_form",
					''. __('Checkout Page Login Form Hook', 'woo-simple-hooks') .''=>"wcsh_login_form",
					''. __('Checkout Page Login Form End Hook', 'woo-simple-hooks') .''=>"wcsh_login_form_end",
					''. __('Checkout Page After Customer Login Form Hook', 'woo-simple-hooks') .''=>"wcsh_after_customer_login_form"
					);
	
	$checkoutpagehooks = array(
					''. __('Checkout Page Before Checkout Form', 'woo-simple-hooks') .''=>"wcsh_before_checkout_form",
					''. __('Checkout Page Before Customer Details', 'woo-simple-hooks') .''=>"wcsh_checkout_before_customer_details",
					''. __('Checkout Page After Customer Details', 'woo-simple-hooks') .''=>"wcsh_checkout_after_customer_details",
					''. __('Checkout Page Checkout Billing Hook', 'woo-simple-hooks') .''=>"wcsh_checkout_billing",
					''. __('Checkout Page Before Checkout Billing Hook', 'woo-simple-hooks') .''=>"wcsh_before_checkout_billing_form",
					''. __('Checkout Page Before Order Review Hook', 'woo-simple-hooks') .''=>"wcsh_checkout_before_order_review",
					''. __('Checkout Page Review Order Before Cart Contents Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_before_cart_contents",
					''. __('Checkout Page Review Order After Cart Contents Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_after_cart_contents",
					''. __('Checkout Page Review Before Shipping Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_before_shipping",
					''. __('Checkout Page After Shipping Rate Hook', 'woo-simple-hooks') .''=>"wcsh_after_shipping_rate",
					''. __('Checkout Page Review Order After Shipping Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_after_shipping",
					''. __('Checkout Page Review Order Before Order Total Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_before_order_total",
					''. __('Checkout Page Review Order After Order Total Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_after_order_total",
					''. __('Checkout Page After Checkout Billing Form Hook', 'woo-simple-hooks') .''=>"wcsh_after_checkout_billing_form",
					''. __('Checkout Page Before Checkout registration Form Hook', 'woo-simple-hooks') .''=>"wcsh_before_checkout_registration_form",
					''. __('Checkout Page Before Terms and Conditions Hook', 'woo-simple-hooks') .''=>"wcsh_checkout_before_terms_and_conditions",
					''. __('Checkout Page Review Order After Submit Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_after_submit",
					''. __('Checkout Page Review Order After Payment Hook', 'woo-simple-hooks') .''=>"wcsh_review_order_after_payment",
					''. __('Checkout Page After Checkout Form Hook', 'woo-simple-hooks') .''=>"wcsh_after_checkout_form"
					);
	
	$otherhooks = array(
					''. __('Before Mini Cart Hook', 'woo-simple-hooks') .''=>"wcsh_before_mini_cart",
					''. __('Before Mini Cart Contents Hook', 'woo-simple-hooks') .''=>"wcsh_before_mini_cart_contents"
					   );
?>
		<?php $settings_image = plugin_dir_url( __FILE__ ) . 'icon-256x256.png'; ?>
  		<h1 style="font-family: monospace;text-transform: uppercase;"><?php _e('Simple Hooks Settings', 'woo-simple-hooks'); ?></h1>
  		<img src="<?php echo $settings_image; ?>" style="width: 4%;">
  		<form method="post" action="options.php">
  			<style>
			textarea.wcsh-textarea {
				width: 600px;
				height: 100px;	
				}
			</style>

  			<?php
  			$active_tab = "header-options";
            if( isset( $_GET[ 'tab' ] ) ) {
                $active_tab = $_GET[ 'tab' ];
            	}
?>

	  		<h2 class="nav-tab-wrapper">
				<a href="?page=wcsh-settings&tab=wcsh_shop_options" class="nav-tab <?php echo $active_tab == 'wcsh_shop_options' ? 'nav-tab-active' : ''; ?>">Shop Page Hooks</a>
				<a href="?page=wcsh-settings&tab=wcsh_single_product_options" class="nav-tab <?php echo $active_tab == 'wcsh_single_product_options' ? 'nav-tab-active' : ''; ?>">Single Product Page Hooks</a>
				<a href="?page=wcsh-settings&tab=wcsh_cart_page_options" class="nav-tab <?php echo $active_tab == 'wcsh_cart_page_options' ? 'nav-tab-active' : ''; ?>">Cart Page Hooks</a>
				<a href="?page=wcsh-settings&tab=wcsh_checkout_page_options" class="nav-tab <?php echo $active_tab == 'wcsh_checkout_page_options' ? 'nav-tab-active' : ''; ?>">Checkout Page Hooks</a>
				<a href="?page=wcsh-settings&tab=wcsh_account_page_options" class="nav-tab <?php echo $active_tab == 'wcsh_account_page_options' ? 'nav-tab-active' : ''; ?>">Account Page Hooks</a>
				<a href="?page=wcsh-settings&tab=wcsh_other_hooks_options" class="nav-tab <?php echo $active_tab == 'wcsh_other_hooks_options' ? 'nav-tab-active' : ''; ?>">Other Hooks</a>
		</h2>


    		<?php 
			if( $active_tab == 'wcsh_single_product_options' ) {
				settings_fields( 'wcsh-settings-singleproduct' );
				do_settings_sections( 'wcsh-settings-singleproduct' );
    		 ?>
	  			<h2><?php _e('WOOCOMMERCE SINGLE PRODUCT PAGE HOOKS', 'woo-simple-hooks'); ?></h2>
	  		<?php
			
				foreach ($singleproducthooks as $key => $singleproducthook){ ?>
				<table class="form-table">
				<tr valign="top">
				<th scope="row"><?php echo $key; ?></th>
				<td><textarea name="<?php echo $singleproducthook; ?>" class="wcsh-textarea"><?php echo get_option($singleproducthook); ?></textarea></td>
			 	</tr>
    			</table>	
				<?php }
				}
				elseif ($active_tab == 'wcsh_cart_page_options') {
				settings_fields( 'wcsh-settings-cartpage' );
				do_settings_sections( 'wcsh-settings-cartpage' );
				?>
				<h2><?php _e('WOOCOMMERCE CART PAGE HOOKS', 'woo-simple-hooks'); ?></h2>
				<?php
				foreach ($cartpagehooks as $key => $cartpagehook){ ?>
				<table class="form-table">
				<tr valign="top">
				<th scope="row"><?php echo $key; ?></th>
				<td><textarea name="<?php echo $cartpagehook; ?>" class="wcsh-textarea"><?php echo get_option($cartpagehook); ?></textarea></td>
				  </tr>
				</table>
    		<?php
    		}
    	}
	elseif ($active_tab == 'wcsh_checkout_page_options') {
				settings_fields( 'wcsh-settings-checkoutpage' );
				do_settings_sections( 'wcsh-settings-checkoutpage' );
				?>
				<h2><?php _e('WOOCOMMERCE CHECKOUT PAGE HOOKS', 'woo-simple-hooks'); ?></h2>
				<?php
				foreach ($checkoutpagehooks as $key => $checkoutpagehook){ ?>
				<table class="form-table">
				<tr valign="top">
				<th scope="row"><?php echo $key; ?></th>
				<td><textarea name="<?php echo $checkoutpagehook; ?>" class="wcsh-textarea"><?php echo get_option($checkoutpagehook); ?></textarea></td>
				  </tr>
				</table>
    		<?php
    		}
    	}
    		elseif ($active_tab == 'wcsh_account_page_options') {
    		settings_fields( 'wcsh-settings-accountpage' );
    		do_settings_sections( 'wcsh-settings-accountpage' );
    		?>
	  		<h2><?php _e('WOOCOMMERCE ACCOUNT PAGE HOOKS', 'woo-simple-hooks'); ?></h2>
	  		<?php
	  		foreach ($accountpagehooks as $key => $accountpagehook){ ?>
			<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php echo $key; ?></th>
			<td><textarea name="<?php echo $accountpagehook; ?>" class="wcsh-textarea"><?php echo get_option($accountpagehook); ?></textarea></td>
			  </tr>
    		</table>
    		<?php
    		}
    	}
			elseif ($active_tab == 'wcsh_other_hooks_options') {
    		settings_fields( 'wcsh-settings-otherhooks' );
    		do_settings_sections( 'wcsh-settings-otherhooks' );
    		?>
	  		<h2><?php _e('WOOCOMMERCE OTHER HOOKS', 'woo-simple-hooks'); ?></h2>
	  		<?php
	  		foreach ($otherhooks as $key => $otherhook){ ?>
			<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php echo $key; ?></th>
			<td><textarea name="<?php echo $otherhook; ?>" class="wcsh-textarea"><?php echo get_option($otherhook); ?></textarea></td>
			  </tr>
    		</table>
    		<?php
    		}
    	}
    		else
    		{ 
    		settings_fields( 'wcsh-settings-shophook' );
    		do_settings_sections( 'wcsh-settings-shophook' );
    		?>
    		<h2><?php _e('WOOCOMMERCE SHOP PAGE HOOKS', 'woo-simple-hooks'); ?></h2>
    		<?php
			foreach ($shophooks as $key => $shophook){	?>	  
			<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php echo $key; ?></th>
			<td><textarea name="<?php echo $shophook; ?>" class="wcsh-textarea"><?php echo get_option($shophook); ?></textarea></td>
			</tr>
			</table>

	  		<?php } 
			}
	
			submit_button(); ?>
 		</form>

	<?php
			
		}
	}	
} // Check if woocommerce is active

	else
	{
function wcsh_notice() {
    ?>
    <div class="error notice">
    <p><?php _e('Simple Hooks Plugin requires the WooCommerce Plugin', 'woo-simple-hooks'); ?></p>
    </div>
    <?php
}

add_action( 'admin_notices', 'wcsh_notice' );
}