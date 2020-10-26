<?php

namespace WtsHv;


class wts_hv{
    private static $_instance = null;
    private static $_theme = null;


    private static $_show = false;

    public static function instance(){
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    private function __construct(){

        self::$_theme = get_option( 'template' );

        add_action('plugins_loaded', [$this, 'set_mode']);

        add_action('plugins_loaded',[$this, 'plugins_loaded']);
        add_action('wp_head',[$this,'my_css']);

        if(!is_admin()){
            add_action('admin_bar_menu',[$this, 'add_nodes'],100);
        }

        $this->includes();
    }
    public function add_nodes($wp_admin_bar){
        $show_always = get_option('wts-hv-show-always');
        if(!$this->is_user_allowed() || $show_always ){
            return;
        }
        global $wp;
        $current_url = home_url(add_query_arg(array(['hv' => 'show']),$wp->request));
        if(!self::$_show){
            $args = [
                'id' => 'show_hooks',
                'title' => __('Show Hooks','wts-hv'),
                'href' => $current_url
            ];
            $wp_admin_bar->add_node($args);
        }
        else{
            $current_url = home_url(add_query_arg(array([]),$wp->request));
            $args = [
                'id' => 'hide_hooks',
                'title' => __('Hide Hooks','wts-hv'),
                'href' => $current_url,
                'tabindex' => '6',
            ];
            $wp_admin_bar->add_node($args);

        }

    }

    public function my_css(){

        if(!self::$_show){
            return;
        }
         ?>
        <style>
            .hv-filter{
                margin: 5px;
                border: 1px solid #f5c6cb;
                background-color: #f8d7da;
                color: #721c24;
                padding: 5px;
                border-radius: 5px;
                text-align: center;
                clear: both;

            }
        </style><?php
    }

    public function set_mode(){
        $show_always = get_option('wts-hv-show-always');
        if($show_always){
            self::$_show = true;
            return;
        }

        if(!$this->is_user_allowed()){
            return;
        }

        if(isset($_GET['hv']) && $_GET['hv'] == 'show'){
            self::$_show = true;
        }
    }

    private function is_user_allowed(){
        $current_user = wp_get_current_user();
        $allowed_roles = get_option('wts-hv-roles');
        if(!is_array($allowed_roles)){
            $allowed_roles = array('administrator');
        }
        //echo'<pre>'; print_r($current_user->roles[0]) ; echo'</pre>'; die();
        if(!isset($current_user->roles[0]) || !in_array($current_user->roles[0],$allowed_roles))
        {
            return false;
        }

        return true;
    }

    public function plugins_loaded(){

        // Todo:: add option to enable/disable woo hooks
        if (class_exists('WooCommerce')) {
            //require_once WTS_HV_PATH . 'includes/integrations/plugins/woocommerce.php';
        }

        $this->show_hooks();
    }

    function includes(){

        // Todo:: add option to enable/disable theme hooks
        if(file_exists(WTS_HV_PATH . 'includes/integrations/themes/' . self::$_theme . '.php')) {
            require_once WTS_HV_PATH . 'includes/integrations/themes/' . self::$_theme . '.php';

        }
        require_once WTS_HV_PATH . 'includes/admin.php';

    }

    function display_hooks($hooks){

       if(count($hooks)){
        foreach($hooks as $hook => $label){
            add_action($hook,function() {
                $current_filter = current_filter();
                ?>
                <div class="hv-filter">
                    <?php echo $current_filter; ?>
                </div>
                <?php
            });
        }
       }
    }

    function show_hooks(){
        if(!self::$_show){
            return;
        }

        if(class_exists('WtsHv\Theme')){
            $hooks = Theme::instance()->get_hooks();
            $this->display_hooks($hooks);
        }
        if(class_exists('WtsHv\woocommerce')){
            $hooks = woocommerce::instance()->get_hooks();
            $this->display_hooks($hooks);


        }
    }

}
wts_hv::instance();