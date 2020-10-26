<?php
namespace WtsHv;

class Admin{
    private static $_instance = null;

    public static function instance(){
        if(is_null(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_settings_page']);
    }

    public function add_settings_page(){
        add_options_page('Hook Visualizer Settings','Hook Visualizer','manage_options', 'hook_visualizer' ,[$this, 'setting_page']);
        add_action('admin_init',[$this,'register_setting']);
    }

    function register_setting(){
        register_setting('hv-plugin-setting-group','wts-hv-roles');
        register_setting('hv-plugin-setting-group','wts-hv-show-always');
    }

    public function setting_page(){
        global $wp_roles;

        $allowed_roles = get_option('wts-hv-roles');
        $show_always = get_option('wts-hv-show-always');


        if(!is_array($allowed_roles)){
            $allowed_roles = array('administrator');
        }
        ?>

        <div class="wrap">
            <h1>Hook Visualizer</h1>
        </div>
        <form method="POST" action="options.php">
            <?php settings_fields('hv-plugin-setting-group'); ?>
            <?php do_settings_sections('hv-plugin-setting-group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Allowed User Roles

                    </th>
                    <td>
                        <label>
                            <?php $all_roles = $wp_roles->roles;
                            //echo'<pre>'; print_r($all_roles); echo '<pre>';
                            foreach($all_roles as $key => $role)
                            {?>
                            <input type="checkbox" value="<?php echo $key; ?>" name="wts-hv-roles[]"  <?php echo in_array($key,$allowed_roles)?'checked':'';  ?>>
                            <?php
                               echo $role['name']; echo'<br>';
                            }
                            ?>

                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Show Always
                        </br><small>This will show hooks always, discarding any settings made above.</small>
                    </th>
                    <td>
                        <input type="checkbox" name="wts-hv-show-always" value="1" <?php echo $show_always?'checked':''; ?>>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>

        </form>



    <?php }
}
Admin::instance();