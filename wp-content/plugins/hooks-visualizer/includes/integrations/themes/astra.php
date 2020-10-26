<?php

namespace WtsHv;

class Theme{

    private static $_instance = null;
    private static $hooks = [];

    public static function instance(){
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct(){
        $this->initialize_hooks();;

    }

    public function initialize_hooks(){
        $hook['astra_html_before'] = __('Astra HTML Before','wts-hv');
        $hook['astra_body_top'] = __('Astra Body Top','wts-hv');
        $hook['astra_body_bottom'] = __('Astra Body Bottom','wts-hv');
        $hook['astra_head_top'] = __('Astra Head Top','wts-hv');
        $hook['astra_head_bottom'] = __('Astra Head Bottom','wts-hv');
        $hook['astra_header_before'] = __('Astra Header Before','wts-hv');
        $hook['astra_header'] = __('Astra Header','wts-hv');
        $hook['astra_masthead_top'] = __('Astra Mast Header Top','wts-hv');
        $hook['astra_masthead'] = __('Astra Mast Header ','wts-hv');
        $hook['astra_masthead_bottom'] = __('Astra Mast Header Bottom ','wts-hv');
        $hook['astra_header_after'] = __('Astra Mast Header After ','wts-hv');
        $hook['astra_main_header_bar_top'] = __('Astra Main Header Bar Top','wts-hv');
        $hook['astra_main_header_bar_bottom'] = __('Astra Main Header Bar Bottom','wts-hv');
        $hook['astra_masthead_content'] = __('Astra Mast Head Content','wts-hv');
        $hook['astra_masthead_toggle_buttons_before'] = __('Astra Mast Head Toggle Button Before','wts-hv');
        $hook['astra_masthead_toggle_buttons'] = __('Astra Mast Head Toggle Button','wts-hv');
        $hook['astra_masthead_toggle_buttons_after'] = __('Astra Mast Head Toggle Button After','wts-hv');
        $hook['astra_content_before'] = __('Astra Mast Before','wts-hv');
        $hook['astra_content_after'] = __('Astra Content After','wts-hv');
        $hook['astra_content_top'] = __('Astra Content Top','wts-hv');
        $hook['astra_content_bottom'] = __('Astra Content Bottom','wts-hv');
        $hook['astra_content_while_before'] = __('Astra Content While Before','wts-hv');
        $hook['astra_content_while_after'] = __('Astra Content While After','wts-hv');
        $hook['astra_entry_before'] = __('Astra Entry Before','wts-hv');
        $hook['astra_entry_after'] = __('Astra Entry After','wts-hv');
        $hook['astra_entry_content_before'] = __('Astra Entry Content Before','wts-hv');
        $hook['astra_entry_content_after'] = __('Astra Entry Content After','wts-hv');
        $hook['astra_entry_top'] = __('Astra Entry Top','wts-hv');
        $hook['astra_entry_bottom'] = __('Astra Entry Bottom','wts-hv');
        $hook['astra_single_header_before'] = __('Astra Single Header Before','wts-hv');
        $hook['astra_single_header_after'] = __('Astra Single Header After','wts-hv');
        $hook['astra_single_header_top'] = __('Astra Single Header Top','wts-hv');
        $hook['astra_single_header_bottom'] = __('Astra Single Header Bottom','wts-hv');
        $hook['astra_comments_before'] = __('Astra Comments Before','wts-hv');
        $hook['astra_comments_after'] = __('Astra Comments After','wts-hv');
        $hook['astra_sidebars_before'] = __('Astra Sidebars Before','wts-hv');
        $hook['astra_sidebars_after'] = __('Astra Sidebars After','wts-hv');
        $hook['astra_footer'] = __('Astra Footer','wts-hv');
        $hook['astra_footer_before'] = __('Astra Footer Before','wts-hv');
        $hook['astra_footer_after'] = __('Astra Footer After','wts-hv');
        $hook['astra_footer_content_top'] = __('Astra Footer Content Top','wts-hv');
        $hook['astra_footer_content'] = __('Astra Footer Content','wts-hv');
        $hook['astra_footer_content_bottom'] = __('Astra Footer Content Bottom','wts-hv');
        $hook['astra_archive_header'] = __('Astra Header','wts-hv');
        $hook['astra_pagination'] = __('Astra Pagination','wts-hv');
        $hook['astra_entry_content_single'] = __('Astra Entry Content Single','wts-hv');
        $hook['astra_entry_content_404_page'] = __('Astra Entry Content 404 Page','wts-hv');
        $hook['astra_entry_content_blog'] = __('Astra Entry Content Blog','wts-hv');
        $hook['astra_blog_post_featured_format'] = __('Astra Blog Post Featured Format','wts-hv');
        $hook['astra_primary_content_top'] = __('Astra Primary Content Top','wts-hv');






        self::$hooks = $hook;

    }
    public function get_hooks()
    {
        return self::$hooks;
    }
}
Theme::instance();