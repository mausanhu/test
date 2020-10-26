<?php

namespace WtsHv;

class woocommerce{

    private static $hooks = [];
    private static $_instance = null;

    public static function instance() {
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct(){
        $this->initialize_hooks();

    }
    private function initialize_hooks(){
        $hook['pre_get_product_search_form'] = __('Pre Get Product Search Form', 'wts-hv');
        $hook['woocommerce_account_content'] = __('WooCommerce Account Content', 'wts-hv');
        $hook['woocommerce_account_dashboard'] = __('WooCommerce Account Dashboard', 'wts-hv');
        $hook['woocommerce_account_downloads_column_'] = __('WooCommerce Account Downloads Column', 'wts-hv');
        $hook['woocommerce_account_navigation'] = __('WooCommerce Account Navigation', 'wts-hv');
        $hook['woocommerce_account_payment_methods_column_'] = __('WooCommerce Account Payment Method Column', 'wts-hv');
        $hook['woocommerce_account_{$Key}_endpoint'] = __('WooCommerce Account endpoint', 'wts-hv');
        $hook['woocommerce_after_account_download'] = __('WooCommerce After Account Download', 'wts-hv');
        $hook['woocommerce_after_account_navigation'] = __('WooCommerce After Account Navigation', 'wts-hv');
        $hook['woocommerce_after_account_orders'] = __('WooCommerce After Account Orders', 'wts-hv');
        $hook['woocommerce_after_account_payment_methods'] = __('WooCommerce After Account Payment Methods', 'wts-hv');
        $hook['woocommerce_after_available_downloads'] = __('WooCommerce After Available Downloads', 'wts-hv');
        $hook['woocommerce_after_cart'] = __('WooCommerce After Cart', 'wts-hv');
        $hook['woocommerce_after_cart_contents'] = __('WooCommerce After Cart Contents', 'wts-hv');
        $hook['woocommerce_after_cart_table'] = __('WooCommerce After Cart Table', 'wts-hv');
        $hook['woocommerce_after_cart_totals'] = __('WooCommerce After Cart Total', 'wts-hv');
        $hook['woocommerce_after_checkout_billing_form'] = __('WooCommerce After Checkout Billing Form', 'wts-hv');
        $hook['woocommerce_after_checkout_form'] = __('WooCommerce After Checkout  Form', 'wts-hv');
        $hook['woocommerce_after_checkout_registration_form'] = __('WooCommerce After Registration Form', 'wts-hv');
        $hook['woocommerce_after_checkout_shipping_form'] = __('WooCommerce After Checkout Shipping Form', 'wts-hv');
        $hook['woocommerce_after_edit_account_address_form'] = __('WooCommerce After Edit Account Address Form', 'wts-hv');
        $hook['woocommerce_after_edit_account_form'] = __('WooCommerce After Edit Account Form', 'wts-hv');
        $hook['woocommerce_after_edit_address_form_{$load_address)'] = __('WooCommerce After Edit Address Form Load Address', 'wts-hv');
        $hook['woocommerce_after_main_content'] = __('WooCommerce After Main Content', 'wts-hv');
        $hook['woocommerce_after_mini_cart'] = __('WooCommerce After Mini Cart', 'wts-hv');
        $hook['woocommerce_after_my_account'] = __('WooCommerce After My Account', 'wts-hv');
        $hook['woocommerce_after_order_notes'] = __('WooCommerce After Order Notes', 'wts-hv');
        $hook['woocommerce_after_shipping_calculator'] = __('WooCommerce Shipping Calculator', 'wts-hv');
        $hook['woocommerce_after_shipping_rate'] = __('WooCommerce Shipping Rates', 'wts-hv');
        $hook['woocommerce_after_shop_loop'] = __('WooCommerce Shop Loop', 'wts-hv');
        $hook['woocommerce_after_shop_loop_item'] = __('WooCommerce Shop Loop Item', 'wts-hv');
        $hook['woocommerce_after_shop_loop_item_title'] = __('WooCommerce Shop Loop Item Title', 'wts-hv');
        $hook['woocommerce_after_single_product'] = __('WooCommerce After Single Product', 'wts-hv');
        $hook['woocommerce_after_single_product_summary'] = __('WooCommerce After Single Product Summary', 'wts-hv');
        $hook['woocommerce_after_subcategory'] = __('WooCommerce After Subcategory', 'wts-hv');
        $hook['woocommerce_after_subcategory_title'] = __('WooCommerce After Subcategory Title', 'wts-hv');
        $hook['woocommerce_archive_description'] = __('WooCommerce Archive Description', 'wts-hv');
        $hook['woocommerce_auth_page_footer'] = __('WooCommerce Author Page Footer', 'wts-hv');
        $hook['woocommerce_auth_page_header'] = __('WooCommerce Author Page Header', 'wts-hv');
        $hook['woocommerce_available_download_end'] = __('WooCommerce Available Download End', 'wts-hv');
        $hook['woocommerce_available_download_start'] = __('WooCommerce Available Download Start ', 'wts-hv');
        $hook['woocommerce_before_account_navigation'] = __('WooCommerce Before Account Navigation ', 'wts-hv');
        $hook['woocommerce_before_account_downloads'] = __('WooCommerce Before Account Download ', 'wts-hv');
        $hook['woocommerce_before_account_orders'] = __('WooCommerce Before Account Orders ', 'wts-hv');
        $hook['woocommerce_before_account_orders_pagination'] = __('WooCommerce Before Account Orders Pagination ', 'wts-hv');
        $hook['woocommerce_before_available_downloads'] = __('WooCommerce Before Abailable Downloads', 'wts-hv');
        $hook['woocommerce_before_cart'] = __('WooCommerce Before Cart', 'wts-hv');
        $hook['woocommerce_before_cart_contents'] = __('WooCommerce Before Cart Content', 'wts-hv');
        $hook['woocommerce_before_cart_table'] = __('WooCommerce Before Cart Table', 'wts-hv');
        $hook['woocommerce_before_cart_totals'] = __('WooCommerce Before Cart Totals', 'wts-hv');
        $hook['woocommerce_before_checkout_billing_form'] = __('WooCommerce Before Checkout Billing Form', 'wts-hv');
        $hook['woocommerce_before_checkout_form'] = __('WooCommerce Before Checkout  Form', 'wts-hv');
        $hook['woocommerce_before_checkout_registration_form'] = __('WooCommerce Before Checkout Registration Form', 'wts-hv');
        $hook['woocommerce_before_checkout_shipping_form'] = __('WooCommerce Before Checkout Shipping Form', 'wts-hv');
        $hook['woocommerce_before_edit_account_address_form'] = __('WooCommerce Before Edit Account Address Form', 'wts-hv');
        $hook['woocommerce_before_edit_account_form'] = __('WooCommerce Before Edit Account Form', 'wts-hv');
        $hook['woocommerce_before_edit_address_form_{$load_address)}'] = __('WooCommerce Before Edit Account Adress Form', 'wts-hv');
        $hook['woocommerce_before_main_content'] = __('WooCommerce Before Main  Content', 'wts-hv');
        $hook['woocommerce_before_mini_cart'] = __('WooCommerce Before Mini  Content', 'wts-hv');
        $hook['woocommerce_before_mini_cart_contents'] = __('WooCommerce Before Mini Cart Content', 'wts-hv');
        $hook['woocommerce_before_my_account'] = __('WooCommerce Before My Account', 'wts-hv');
        $hook['woocommerce_before_order_notes'] = __('WooCommerce Before Order Notes', 'wts-hv');
        $hook['woocommerce_before_Shipping_Calculator'] = __('WooCommerce Before Shipping Calculator', 'wts-hv');
        $hook['woocommerce_before_shop_loop'] = __('WooCommerce Before Shop Loop', 'wts-hv');
        $hook['woocommerce_before_shop_loop_item'] = __('WooCommerce Before Shop Loop Item', 'wts-hv');
        $hook['woocommerce_before_shop_loop_item_title'] = __('WooCommerce Before Shop Loop Item Title', 'wts-hv');
        $hook['woocommerce_before_single_product'] = __('WooCommerce Before Single Product', 'wts-hv');
        $hook['woocommerce_before_single_product_summary'] = __('WooCommerce Before Single Product Summary', 'wts-hv');
        $hook['woocommerce_before_subcategory'] = __('WooCommerce Before Subcategory', 'wts-hv');
        $hook['woocommerce_before_subcategory_title'] = __('WooCommerce Before Subcategory Title', 'wts-hv');
        $hook['woocommerce_breadcrumb'] = __('WooCommerce Breadcrumb', 'wts-hv');
        $hook['woocommerce_cart_actions'] = __('WooCommerce Cart Action', 'wts-hv');
        $hook['woocommerce_cart_collaterals'] = __('WooCommerce Cart Collaterals', 'wts-hv');
        $hook['woocommerce_cart_contents'] = __('WooCommerce Cart Contents', 'wts-hv');
        $hook['woocommerce_cart_coupon'] = __('WooCommerce Cart Contents', 'wts-hv');
        $hook['woocommerce_cart_has_errors'] = __('WooCommerce Cart Has Error', 'wts-hv');/*SBIN0015309*/
        $hook['woocommerce_cart_is_empty'] = __('WooCommerce Cart Is Empty', 'wts-hv');
        $hook['woocommerce_cart_totals_after_order_total'] = __('WooCommerce Cart Total After Order Total', 'wts-hv');
        $hook['woocommerce_cart_totals_after_shipping'] = __('WooCommerce Cart Totals After Shipping', 'wts-hv');
        $hook['woocommerce_cart_totals_before_order_total'] = __('WooCommerce Cart total Before Order Total', 'wts-hv');
        $hook['woocommerce_cart_totals_before_shipping'] = __('WooCommerce Cart Totals Before Shipping', 'wts-hv');
        $hook['woocommerce_checkout_after_customer_details'] = __('WooCommerce Checkout After Customer Details', 'wts-hv');
        $hook['woocommerce_checkout_after_order_review'] = __('WooCommerce Checkout After  Order Review', 'wts-hv');
        $hook['woocommerce_checkout_after_terms_and_conditions'] = __('WooCommerce Checkout After Term And Conditions', 'wts-hv');
        $hook['woocommerce_checkout_before_customer_details'] = __('WooCommerce Checkout Before Customer Detail', 'wts-hv');
        $hook['woocommerce_checkout_before_order_review'] = __('WooCommerce Checkout Before Order Review', 'wts-hv');
        $hook['woocommerce_checkout_before_terms_and_conditions'] = __('WooCommerce Checkout Before Term and Condition', 'wts-hv');
        $hook['woocommerce_checkout_billing'] = __('WooCommerce Checkout Billing', 'wts-hv');
        $hook['woocommerce_checkout_order_review'] = __('WooCommerce Checkout Order Review', 'wts-hv');
        $hook['woocommerce_checkout_shipping'] = __('WooCommerce Checkout Shipping', 'wts-hv');
        $hook['woocommerce_edit_account_form'] = __('WooCommerce Edit Account Form', 'wts-hv');
        $hook['woocommerce_edit_account_form_end'] = __('WooCommerce Edit Account Form End', 'wts-hv');
        $hook['woocommerce_edit_account_form_start'] = __('WooCommerce Edit Account Form Start', 'wts-hv');
        $hook['woocommerce_email_after_order_table'] = __('WooCommerce Email After Order Table', 'wts-hv');
        $hook['woocommerce_email_before_order_table'] = __('WooCommerce Email Before Order Table', 'wts-hv');
        $hook['woocommerce_email_customer_details'] = __('WooCommerce Email Customer Details', 'wts-hv');
        $hook['woocommerce_email_footer'] = __('WooCommerce Email Footer', 'wts-hv');
        $hook['woocommerce_email_header'] = __('WooCommerce Email Header', 'wts-hv');
        $hook['woocommerce_email_order_details'] = __('WooCommerce Email Order Details', 'wts-hv');
        $hook['woocommerce_email_order_meta'] = __('WooCommerce Email Order Meta', 'wts-hv');
        $hook['woocommerce_lostpassword_form'] = __('WooCommerce Lost Password Form', 'wts-hv');
        $hook['woocommerce_mini_cart_contents'] = __('WooCommerce Mini Cart Contents', 'wts-hv');
        $hook['woocommerce_my_account_my_orders_column_{$column_id}'] = __('WooCommerce My Account My Orders Column', 'wts-hv');
        $hook['woocommerce_no_products_found'] = __('WooCommerce No Product Found', 'wts-hv');
        $hook['woocommerce_order_details_after_customer_details'] = __('WooCommerce Order Details After Customer Details', 'wts-hv');
        $hook['woocommerce_order_details_after_order_table'] = __('WooCommerce Order Details After Order Table', 'wts-hv');
        $hook['woocommerce_order_item_meta_end'] = __('WooCommerce Order Item Meta End','wts-hv');
        $hook['woocommerce_order_item_meta_start'] = __('WooCommerce Order Item Meta Start','wts-hv');
        $hook['woocommerce_order_items_table'] = __('WooCommerce Order Item Table','wts-hv');
        $hook['woocommerce_pay_order_after_submit'] = __('WooCommerce Pay Order After Submit','wts-hv');
        $hook['woocommerce_pay_order_before_submit'] = __('WooCommerce Pay Order Before Submit','wts-hv');
        $hook['woocommerce_proceed_to_checkout'] = __('WooCommerce Proceed To Checkout','wts-hv');
        $hook['woocommerce_product_meta_end'] = __('WooCommerce Proceed To Checkout','wts-hv');
        $hook['woocommerce_product_meta_start'] = __('WooCommerce Product Meta Start','wts-hv');
        $hook['woocommerce_product_thumbnails'] = __('WooCommerce Product Meta Start','wts-hv');
        $hook['woocommerce_resetpassword_form'] = __('WooCommerce Reset Password','wts-hv');
        $hook['woocommerce_review_after_comment_text'] = __('WooCommerce Review After Comment Text','wts-hv');
        $hook['woocommerce_review_before'] = __('WooCommerce Review Before','wts-hv');
        $hook['woocommerce_review_before_comment_meta'] = __('WooCommerce Review Before Comment Meta','wts-hv');
        $hook['woocommerce_review_before_comment_text'] = __('WooCommerce Review Before Comment Text','wts-hv');
        $hook['woocommerce_review_before_comment_text'] = __('WooCommerce Review Before Comment Text','wts-hv');
        $hook['woocommerce_review_comment_text'] = __('WooCommerce Review Comment Text','wts-hv');
        $hook['woocommerce_review_meta'] = __('WooCommerce Review Meta','wts-hv');
        $hook['woocommerce_review_order_after_cart_contents'] = __('WooCommerce Review Order After Cart Contents','wts-hv');
        $hook['woocommerce_review_order_after_order_total'] = __('WooCommerce Review Order After Order Total','wts-hv');
        $hook['woocommerce_review_order_after_payment'] = __('WooCommerce Review Order After payment','wts-hv');
        $hook['woocommerce_review_order_after_shipping'] = __('WooCommerce Review Order After Shipping','wts-hv');
        $hook['woocommerce_review_order_after_submit'] = __('WooCommerce Review Order After Submit','wts-hv');
        $hook['woocommerce_review_order_before_cart_contents'] = __('WooCommerce Review Order Before Cart Contents','wts-hv');
        $hook['woocommerce_review_order_before_order_total'] = __('WooCommerce Review Order Before Order Total','wts-hv');
        $hook['woocommerce_review_order_before_payment'] = __('WooCommerce Review Order Before Payment','wts-hv');
        $hook['woocommerce_review_order_before_shipping'] = __('WooCommerce Review Order Before Shipping','wts-hv');
        $hook['woocommerce_review_order_before_submit'] = __('WooCommerce Review Order Before Submit','wts-hv');
        $hook['woocommerce_share'] = __('WooCommerce Share','wts-hv');
        $hook['woocommerce_shop_loop'] = __('WooCommerce Shop Loop','wts-hv');
        $hook['woocommerce_shop_loop_item_title'] = __('WooCommerce Shop Loop Item Title','wts-hv');
        $hook['woocommerce_shop_loop_subcategory_title'] = __('WooCommerce Shop Loop Sub Cagtegory Title','wts-hv');
        $hook['woocommerce_sidebar'] = __('WooCommerce Sidebar','wts-hv');
        $hook['woocommerce_single_product_summary'] = __('WooCommerce Single Product Summary','wts-hv');
        $hook['woocommerce_thankyou'] = __('WooCommerce Thank you','wts-hv');
        $hook['woocommerce_thankyou_{$order->get_payment_method()}'] = __('WooCommerce Thank you Get Payment Method','wts-hv');
        $hook['woocommerce_view_order'] = __('WooCommerce View Order','wts-hv');
        $hook['woocommerce_widget_shopping_cart_before_buttons'] = __('WooCommerce Widget Shopping Cart Before Buttons','wts-hv');
        $hook['woocommerce_widget_shopping_cart_buttons'] = __('WooCommerce Widget Shopping Cart Buttons','wts-hv');
        $hook['woocommerce_{$product->get_type()}_add_to_cart)'] = __('WooCommerce Product Get Type Add to Cart','wts-hv');

       /*WooCommerce ShortCode Hooks*/

        $hook['after_woocommerce_add_payment_method'] = __('After WooCommerce Add Payment Method','wts-hv');
        $hook['after_woocommerce_pay'] = __('After WooCommerce Pay','wts-hv');
        $hook['before_woocommerce_add_payment_method'] = __('Before  WooCommerce Add Payment Method','wts-hv');
        $hook['before_woocommerce_pay'] = __('Before  WooCommerce Pay','wts-hv');
        $hook['before_woocommerce_pay'] = __('Before  WooCommerce Pay','wts-hv');
        self::$hooks = $hook;
    }
    public function get_hooks()
    {
        return self::$hooks;
    }
}
woocommerce::instance();