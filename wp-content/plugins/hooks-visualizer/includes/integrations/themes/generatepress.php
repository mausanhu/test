<?php

namespace WtsHv;

class Theme{
    private static $hooks = [];

    private static $_instance = null;

    public static function instance(){
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function __construct(){
        $this->initialize_hooks();
    }

    private function initialize_hooks(){
        $hooks['generate_before_header'] = __('GP Before Header', 'wts-hv');
        $hooks['generate_before_header_content'] = __('GP Before Header Content', 'wts-hv');
        $hooks['generate_after_header_content'] = __('GP After Header Content', 'wts-hv');
        $hooks['generate_after_header'] = __('GP After Header', 'wts-hv');
        $hooks['generate_inside_container'] = __('GP Inside Container', 'wts-hv');
        $hooks['generate_before_footer'] = __('GP Before Footer', 'wts-hv');
        $hooks['generate_before_footer_content'] = __('GP Before Footer Content', 'wts-hv');
        $hooks['generate_after_footer_widgets'] = __('GP After Footer Widgets', 'wts-hv');
        $hooks['generate_credits'] = __('GP Credits', 'wts-hv');
        $hooks['generate_after_footer_content'] = __('GP After Footer Content', 'wts-hv');
        $hooks['generate_before_main_content'] = __('GP Before Main Content', 'wts-hv');
        $hooks['generate_before_content'] = __('GP Before Content', 'wts-hv');
        $hooks['generate_after_entry_header'] = __('GP After Entry Header', 'wts-hv');
        $hooks['generate_after_content'] = __('GP After Content', 'wts-hv');
        $hooks['generate_after_main_content'] = __('GP After Main Content', 'wts-hv');
        $hooks['generate_sidebars'] = __('GP Sidebars', 'wts-hv');
        $hooks['generate_archive_title'] = __('GP Archive Title', 'wts-hv');
        $hooks['generate_inside_comments'] = __('GP Inside Comments', 'wts-hv');
        $hooks['generate_below_comments_title'] = __('GP Below Comments Title', 'wts-hv');
        $hooks['generate_before_entry_title'] = __('GP Before Entry Title', 'wts-hv');
        $hooks['generate_after_entry_title'] = __('GP After Entry Title', 'wts-hv');
        $hooks['generate_after_entry_content'] = __('GP After Entry Content', 'wts-hv');
        $hooks['generate_before_right_sidebar_content'] = __('GP Before Right Sidebar Content', 'wts-hv');
        $hooks['generate_after_right_sidebar_content'] = __('GP After Right Sidebar Content', 'wts-hv');
        $hooks['generate_before_left_sidebar_content'] = __('GP Before Left Sidebar Content', 'wts-hv');
        $hooks['generate_after_left_sidebar_content'] = __('GP After Left Sidebar Content', 'wts-hv');
        $hooks['generate_inside_navigation'] = __('GP Inside Navigation', 'wts-hv');
        $hooks['generate_inside_mobile_menu'] = __('GP inside Mobile Menu', 'wts-hv');
        $hooks['generate_paging_navigation'] = __('GP Paging Navigation', 'wts-hv');
        $hooks['generate_before_logo'] = __('GP Before Logo', 'wts-hv');
        $hooks['generate_after_logo'] = __('GP After Logo', 'wts-hv');
        $hooks['generate_before_archive_title'] = __('GP Before Archive Title', 'wts-hv');
        $hooks['generate_after_archive_title'] = __('GP After Archive Title', 'wts-hv');
        $hooks['generate_after_archive_description'] = __('GP After Archive Description', 'wts-hv');

        self::$hooks = $hooks;
    }

    public function get_hooks(){
        return self::$hooks;
    }
}

Theme::instance();