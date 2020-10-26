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

        $hook['ocean_before_outer_wrap'] = __('Ocean Before Outer Wrap', 'wts-hv');
        $hook['ocean_before_wrap'] = __('Ocean Before Wrap', 'wts-hv');
        $hook['ocean_before_main'] = __('Ocean Before Main', 'wts-hv');
        $hook['ocean_before_content_wrap'] = __('Ocean Before Content Wrap', 'wts-hv');
        $hook['ocean_before_primary'] = __('Ocean Before Primary', 'wts-hv');
        $hook['ocean_before_content'] = __('Ocean Before Content', 'wts-hv');
        $hook['ocean_before_content_inner'] = __('Ocean Before Content Inner', 'wts-hv');
        $hook['ocean_after_content_inner'] = __('Ocean After Content Inner', 'wts-hv');
        $hook['ocean_after_content'] = __('Ocean After Content', 'wts-hv');
        $hook['ocean_after_primary'] = __('Ocean After Primary', 'wts-hv');
        $hook['ocean_after_content_wrap'] = __('Ocean After Content Wrap', 'wts-hv');
        $hook['ocean_after_main'] = __('Ocean After Main', 'wts-hv');
        $hook['ocean_before_footer'] = __('Ocean Before Footer', 'wts-hv');
        $hook['ocean_after_footer'] = __('Ocean After Footer', 'wts-hv');
        $hook['ocean_after_wrap'] = __('Ocean After Wrap', 'wts-hv');
        $hook['ocean_after_outer_wrap'] = __('Ocean After Outer Wrap', 'wts-hv');
        $hook['ocean_before_sidebar'] = __('Ocean Before Sidebar', 'wts-hv');
        $hook['ocean_before_sidebar_inner'] = __('Ocean Before Sidebar Inner', 'wts-hv');
        $hook['ocean_after_sidebar_inner'] = __('Ocean After Sidebar Inner', 'wts-hv');
        $hook['ocean_after_sidebar'] = __('Ocean After Sidebar', 'wts-hv');
        $hook['ocean_before_page_header'] = __('Ocean Before Page Header ', 'wts-hv');
        $hook['ocean_before_page_header_inner'] = __('Ocean Before Page Header Inner', 'wts-hv');
        $hook['ocean_after_page_header_inner'] = __('Ocean After Page Header Inner', 'wts-hv');
        $hook['ocean_after_page_header'] = __('Ocean After Page Header', 'wts-hv');
        $hook['ocean_before_footer_bottom'] = __('Ocean Before Footer Bottom', 'wts-hv');
        $hook['ocean_before_footer_bottom_inner'] = __('Ocean Before Footer Bottom Inner', 'wts-hv');
        $hook['ocean_after_footer_bottom_inner'] = __('Ocean After Footer Bottom Inner', 'wts-hv');
        $hook['ocean_after_footer_bottom'] = __('Ocean After Footer Bottom', 'wts-hv');
        $hook['ocean_before_footer_inner'] = __('Ocean Before Footer Inner', 'wts-hv');
        $hook['ocean_after_footer_inner'] = __('Ocean After Footer Inner', 'wts-hv');
        $hook['ocean_before_footer_widgets'] = __('Ocean Before Footer Widgets', 'wts-hv');
        $hook['ocean_before_footer_widgets_inner'] = __('Ocean Before Footer Widgets Inner', 'wts-hv');
        $hook['ocean_after_footer_widgets_inner'] = __('Ocean After Footer Widgets Inner', 'wts-hv');
        $hook['ocean_after_footer_widgets'] = __('Ocean After Footer Widgets', 'wts-hv');
        $hook['ocean_before_header'] = __('Ocean Before Header', 'wts-hv');
        $hook['ocean_before_header_inner'] = __('Ocean Before Header Inner', 'wts-hv');
        $hook['ocean_after_header_inner'] = __('Ocean After Header Inner', 'wts-hv');
        $hook['ocean_after_header'] = __('Ocean After header', 'wts-hv');
        $hook['ocean_before_logo'] = __('Ocean Before Logo', 'wts-hv');
        $hook['ocean_before_logo_inner'] = __('Ocean Before Logo Inner', 'wts-hv');
        $hook['ocean_after_logo_inner'] = __('Ocean After Logo Inner', 'wts-hv');
        $hook['ocean_after_logo'] = __('Ocean After Logo', 'wts-hv');
        $hook['ocean_before_mobile_icon'] = __('Ocean Before Mobile Icon', 'wts-hv');
        $hook['ocean_after_mobile_icon'] = __('Ocean After Mobile Icon', 'wts-hv');
        $hook['ocean_before_nav'] = __('Ocean Before Nav', 'wts-hv');
        $hook['ocean_before_nav_inner'] = __('Ocean Before Nav Inner', 'wts-hv');
        $hook['ocean_after_nav_inner'] = __('Ocean After Nav Inner', 'wts-hv');
        $hook['ocean_after_nav'] = __('Ocean After Nav', 'wts-hv');
        $hook['ocean_social_share'] = __('Ocean Social Share', 'wts-hv');
        $hook['ocean_before_top_bar'] = __('Ocean Before Top Bar', 'wts-hv');
        $hook['ocean_before_top_bar_inner'] = __('Ocean Before Top Bar Inner', 'wts-hv');
        $hook['ocean_after_top_bar_inner'] = __('Ocean After Top Bar Inner', 'wts-hv');
        $hook['ocean_after_top_bar'] = __('Ocean After Top Bar', 'wts-hv');

        self::$hooks = $hook;
    }
    public function get_hooks()
    {
        return self::$hooks;
    }

}
Theme::instance();
