<?php
/*
Plugin Name: Edit WooCommerce Templates
Plugin URI:
Description: The plugin helps you edit WooCommerce templates files for your Current Theme
Version: 1.0.3.2
Author: ioannup
Author URI: https://www.upwork.com/freelancers/~0165d3dc4b2ffbbd7d
License: GPLv2
Requires at least: 4.9
Tested up to: 5.2
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


if ( ! class_exists( 'IO_Theme_Templates' ) ) {

class IO_Theme_Templates {


    /**
     * @var Singleton The reference the *Singleton* instance of this class
     */
    private static $instance;


    /**
     * @var
     */
    private static $all_templates;


    /**
     * @var bool
     */
    private static $can_edit;


    /**
     * @var bool Based on DISALLOW_FILE_EDIT constant
     */
    private static $allow_file_edit;


    /**
     * @var string Current page
     */
    private static $page;


    /**
     * @var array
     */
    private static $templates_exists;

    public static function get_all_templates() {
        if ( is_null( self::$all_templates ) ) {
            self::set_all_templates();
        }
        return self::$all_templates;
    }


    public static function get_templates_exists() {
        if ( is_null( self::$templates_exists )  ) {
            self::set_templates_exists();
        }
        return self::$templates_exists;
    }


    public static function set_all_templates() {
        self::$all_templates = WC_Admin_Status::scan_template_files( WC()->plugin_path() . '/templates' );
    }


    public static function set_templates_exists() {
        self::$templates_exists = WC_Admin_Status::scan_template_files( get_stylesheet_directory() . '/woocommerce' );
    }


    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone() {}

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup() {}


    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the `new` operator from outside of this class.
     */
    protected function __construct() {
		self::$allow_file_edit = ( !defined( 'DISALLOW_FILE_EDIT' ) || DISALLOW_FILE_EDIT !== true )
				&& ( !defined( 'DISALLOW_FILE_MODS' ) || DISALLOW_FILE_MODS !== true ) ;
		self::$page = filter_input( INPUT_GET, 'page' ) ;

        add_action( 'admin_menu', array( $this, 'register_woocommerce_submenu_page' ) );
        add_action( 'admin_init', array( $this, 'request_action' ) );
        add_action( 'wp_ajax_wooet_dismiss_syntax_highlighting_description', array( $this, 'dismiss_highlighting_description' ) );
        add_action( 'wp_ajax_wooet_child_theme', array( $this, 'wooet_child_theme' ) );
        if ( 'wc-theme_templates' === self::$page && 'edit' === filter_input( INPUT_GET, 'action' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_syntax_highlighting_notice' ) );
        }
        if ( 'wc-theme_templates' === self::$page ) {
            add_action( 'admin_notices', array( $this, 'admin_child_theme_notice' ) );
        }
		global $pagenow;
		if ( 'plugins.php' === $pagenow && !self::$allow_file_edit ) {
			add_action( 'admin_notices', array( $this, 'disallow_file_edit_notice' ) );
		}
    }

    /**
     * hide admin notice
     */
    function dismiss_highlighting_description() {
        update_user_meta( get_current_user_id(), 'wooet_syntax_highlighting_description', '1' );
        exit;
    }

    /**
     * hide admin notice
     */
    function wooet_child_theme() {
        update_user_meta( get_current_user_id(), 'wooet_child_theme', '1' );
        exit;
    }

    /**
     * Show admin notice for new syntax highlighting
     */
    function admin_syntax_highlighting_notice() {
        if ( !get_user_meta( get_current_user_id(), 'wooet_syntax_highlighting_description', true ) ) {
            wp_enqueue_script( 'wooet_template_edit', plugins_url( 'asset/js/template_edit.js', __FILE__ ), array( 'jquery' ), false, true );
        ?>
        <div class="notice notice-success is-dismissible wooet-syntax_highlighting_description-notice" >
            <p><?php printf( __( 'We introduce you Syntax Highlighting for better editing Woocommerce templates. You can enable/disable this option %shere%s' )
					, '<a href="' . get_admin_url( null, 'profile.php' ) . '" target="_blank">'
					,'</a>' ); ?></p>
        </div>


        <?php
        }
    }

    /**
     * Show admin notice for child theme
     */
    function admin_child_theme_notice() {
        if ( is_child_theme() && !get_user_meta( get_current_user_id(), 'wooet_child_theme', true ) ) {
            wp_enqueue_script( 'wooet_template_edit', plugins_url( 'asset/js/template_edit.js', __FILE__ ), array( 'jquery' ), false, true );
        ?>
        <div class="notice notice-success is-dismissible wooet-child_theme-notice" >
            <p><?php _e( 'You use a child theme. Your Parent theme can also override WooCommerce templates. If you want to manage it for the Parent theme - switch to it and after managing it - switch back to the child theme.' ); ?></p>
        </div>


        <?php
        }
    }

    /**
     * Show admin notice for child theme
     */
    public function disallow_file_edit_notice() {
        ?>
        <div class="notice notice-success wooet-child_theme-notice" >
            <p><?php printf( __( 'DISALLOW_FILE_EDIT or DISALLOW_FILE_MODS is enabled ( probably in wp-config.php file ). You should disable it before using %1$s Edit WooCommerce Templates %2$s plugin. ' ), '<b>', '</b>' ); ?></p>
        </div>
        <?php
    }

    function register_woocommerce_submenu_page() {
        self::$can_edit = self::$allow_file_edit && current_user_can( 'edit_themes' );

        if ( self::$can_edit ) {
            add_submenu_page( 'woocommerce', __( 'Theme Templates' ), __( 'Theme Templates' ), 'manage_woocommerce', 'wc-theme_templates', array( $this, 'select_pages' ) );
        }
    }

    function select_pages() {
        $id = filter_input( INPUT_GET, 'id' );
        $message = '';
        if ( filter_input( INPUT_GET, 'reset' ) && $id ) {
            check_admin_referer( 'io_reset_template' .  $id );
            $message = self::delete_template( $id );
            wp_redirect( add_query_arg( array( 'msg'=>$message, '_wpnonce'=>wp_create_nonce('edit_template_' . $id) ), remove_query_arg( array( '_wpnonce', 'reset' ) ) ) );
            exit();
        }
        if ( !empty( $_POST['data'] ) ) {
            $data = $_POST['data'];
            check_admin_referer( 'save_template' .  $id );

            $content = !empty( $data['content'] ) ? wp_unslash( $data['content'] ) : '';
            $message = self::save_template( $id, $content );
            wp_redirect( add_query_arg( 'msg', $message ) );
            exit();
        }

        if ( 'edit' === filter_input( INPUT_GET, 'action' ) ) {
            check_admin_referer( 'edit_template_' .  $id );

            if ( !in_array( $id, self::get_all_templates() ) ) {
                self::filesystem_error( __(  "There are not found such Template in WooCommerce" ) );
            }

            $templates_exists = self::get_templates_exists();
            $in_theme = in_array( $id, $templates_exists );

            //Code Editor
            $real_file = self::get_full_path( $id, $in_theme );
            // Enqueue code editor and settings for manipulating HTML.
            $syntax_highlighting = wp_enqueue_code_editor( array( 'file' => $real_file ) );
            // Bail if user disabled CodeMirror.
            if ( false !== $syntax_highlighting ) {
                wp_add_inline_script( 'code-editor', sprintf( 'jQuery( function( $ ) { wp.codeEditor.initialize( "newcontent", %s ); } )', wp_json_encode( $syntax_highlighting ) ) );
                wp_add_inline_script(
                    'wp-codemirror',
                    'window.CodeMirror = wp.CodeMirror;'
                );
            }

            add_meta_box( 'io-theme-template_publish', __( 'Publish' ),  array( $this, 'publish_meta_box' ), 'io-woocommerce-edit-template-publish', 'side', 'high' );
            require_once( plugin_dir_path( __FILE__ ) . 'includes/template_edit.php' );
        } else {
            $this->theme_templates_page( $message );
        }
    }


    /**
     * generate Theme Templates Page
     *
     */
    private function theme_templates_page( $message ) {

        if(!class_exists('IO_Theme_Templates_List_Table')){
            require_once( plugin_dir_path( __FILE__ ) . 'includes/list-table-theme-templates.php' );
        }

        //Create an instance of our package class...
        $templatesListTable = new IO_Theme_Templates_List_Table();
        //Fetch, prepare, sort, and filter our data...
        $templatesListTable->prepare_items();

        ?>
        <div class="wrap">

            <div id="icon-users" class="icon32"><br/></div>
            <h2><?php _e( 'Theme Templates' ) ?></h2>

            <?php self::show_message(); ?>

            <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
            <form id="theme_templates-filter" method="get">
                <?php $templatesListTable->search_box( __( 'Search Templates' ), 'search-submit' ); ?>
                <!-- For plugins, we also need to ensure that the form posts back to our current page -->
                <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
                <!-- Now we can render the completed list table -->
                <?php $templatesListTable->display() ?>
            </form>

        </div>
        <?php
    }


    /**
     * Get template content
     *
     * @param string $path
     * @param bool $in_theme
     * @param bool $hide_error
     * @return string|bool
     */
    static function get_template_content( $path, $in_theme, $hide_error = false ) {
        $full_path = self::get_full_path( $path, $in_theme );

        global $wp_filesystem;

        $url = '';

        $fs_path = preg_replace( '/\/[^\/]+$/', '', $full_path );

        if ( self::connect_fs( $url, "", $fs_path ) ) {

            if( $wp_filesystem->exists( $full_path ) ) {
                $text = $wp_filesystem->get_contents( $full_path );
                if( !$text ) {
                    return "";
                } else {
                    return $text;
                }
            } elseif ( !$hide_error ) {
                self::filesystem_error( __( "File doesn't exist" ) );
            }
        }
    }


    /**
     * Get full path based on template name
     *
     * @param string $path
     * @param bool $in_theme
     * @return string
     */
    static function get_full_path( $path, $in_theme ) {
        if ( $in_theme ) {
            $template_dir = get_stylesheet_directory() . '/woocommerce';
        } else {
            $template_dir = WC()->plugin_path() . '/templates';
        }
        $full_path = $template_dir . '/' . $path;

        return $full_path;
    }


    /**
     * Display form for input FTP\SHH credentials and error message
     *
     * @param string $message
     */
    static function filesystem_error( $message ) {
        $error = new WP_Error("filesystem_error", $message );
        echo $error->get_error_message();
        exit;
    }


    static function connect_fs( $url, $method, $context, $fields = null ) {
        global $wp_filesystem;

		$method = 'direct';

        if ( false === ($credentials = request_filesystem_credentials( $url, $method, false, $context, $fields )) ) {
            self::filesystem_error( __( "Cannot initialize filesystem" ) );
        }

        //check if credentials are correct or not.
        if ( !WP_Filesystem( $credentials ) ) {
            request_filesystem_credentials( $url, $method, true, $context, $fields );
            self::filesystem_error( __( "Cannot initialize filesystem" ) );
        }

        return true;
    }


    /**
     * generate Publish metabox
     */
    function publish_meta_box( $data ) {
        $onclick = !empty( $data['status'] )
                ? ' onclick=\'return confirm("' . __( 'Are you sure that you want to rewrite this Template to Current Theme?' ) . '");\''
                : '';
        ?>
        <div class="submitbox" id="submitpost">
            <div id="delete-action">
                <a class="submitdelete deletion" onclick='return confirm("<?php _e( 'Are you sure to reset this Template from Current Theme?' ) ?>");'
                   href="admin.php?page=wc-theme_templates&action=edit&reset=true&id=<?php echo $data['id'] ?>&_wpnonce=<?php echo wp_create_nonce( 'io_reset_template' . $data['id']  ) ?>">
                       <?php _e( 'Reset' ) ?></a>
            </div>
            <div id="publishing-action">
                <span class="spinner"></span>
                <input <?php echo $onclick ?> name="save" type="submit" class="button button-primary button-large" id="save" value="<?php esc_attr_e( 'Save Template to Theme' ) ?>" />
            </div>
            <div class="clear"></div>
        </div>
        <?php
    }



    static function save_template( $path, $content = null ) {
        $theme_path = get_stylesheet_directory();
        $full_path = $theme_path . '/woocommerce/' . $path;

        if ( is_null( $content ) ) {
            $content = self::get_template_content( $path, true, true );
            if ( is_null( $content ) ) {
                $content = self::get_template_content( $path, false );
            } else {
                return 'tsu';
            }
        }

        global $wp_filesystem;

        self::create_folder( $theme_path, '/woocommerce/' . $path );

        $result = $wp_filesystem->put_contents( $full_path, $content, FS_CHMOD_FILE);

        //Template saved to Theme successfully
        return $result ? 'tss' : 'tsu';


    }



    private static function create_folder( $theme_path, $path ) {
        global $wp_filesystem;

        $url = '';
        $fs_path = get_stylesheet_directory();
        $form_fields = array("data");
        if( self::connect_fs( $url, "", $fs_path, $form_fields ) ) {

            $folders = explode( '/', $path );
            $dir = $theme_path;
            foreach( $folders as $folder ) {
                if ( !empty( $folder ) && false === strpos( $folder, '.php' ) ) {
                    $dir .= '/' . $folder;
                    if ( $wp_filesystem->is_dir( $dir ) ) {
                        continue;
                    } else {
                        $wp_filesystem->mkdir( $dir, FS_CHMOD_DIR );
                    }
                }
            }
        }
    }



    static function delete_template( $path ) {
        $full_path = get_stylesheet_directory() . '/woocommerce/' . $path;

        global $wp_filesystem;

        $url = wp_nonce_url("admin.php?page=wc-theme_templates", "filesystem-nonce");
        $fs_path = preg_replace( '/\/[^\/]+$/', '', $full_path );
        if( self::connect_fs( $url, "", $fs_path ) ) {
            $result = $wp_filesystem->delete( $full_path );

            //Template removed (or not) from Theme successfully
            return $result ? 'trs' : 'tru';
        }
    }


    /**
     * Show message by $_GET['msg']
     */
    static function show_message() {
        if ( $message = filter_input( INPUT_GET, 'msg') ) {
            switch( $message ) {
                case 'trs':
                    echo  '<div id="message" class="updated"><p>' . __('Template removed from Theme successfully') . '</p></div>';
                    break;
                case 'tru':
                    echo  '<div id="message" class="error"><p>' . __("Can't remove Template from Theme. Please, check Theme folder permissions") . '</p></div>';
                    break;
                case 'tre':
                    echo  '<div id="message" class="error"><p>' . __("Not all selected Templates have been removed from Theme. Please, check Theme folder permissions or maybe some templates don't exist.") . '</p></div>';
                    break;
                case 'et':
                    echo  '<div id="message" class="error"><p>' . __("Template doesn't exist in Current Theme") . '</p></div>';
                    break;
                case 'tss':
                    echo '<div id="message" class="updated"><p>' . __('Template saved to Theme successfully') . '</p></div>';
                    break;
                case 'tsu':
                    echo '<div id="message" class="error"><p>' . __("Can't rewrite Template. Please, check Theme folder permissions") . '</p></div>';
                    break;
                case 'tse':
                    echo  '<div id="message" class="error"><p>' . __("Not all selected Templates have been saved to Theme. Please, check Theme folder permissions or maybe some templates already exist there. If you really want to rewrite theirs - please, reset theirs at first.") . '</p></div>';
                    break;
            }
        }
    }


    function request_action() {
        if ( 'wc-theme_templates' === self::$page ) {
            add_filter( 'removable_query_args', array( $this, 'remove_our_query_args_for_our_pages' ) );
        }
    }


    /**
     * Add get-params for deleting from url
     *
     * @param array $removable_query_args
     * @return array
     */
    function remove_our_query_args_for_our_pages( $removable_query_args ) {
        $removable_query_args[] = 'reset';
        $removable_query_args[] = 'save';
        $removable_query_args[] = 'msg';
        return $removable_query_args;
    }
}
}

IO_Theme_Templates::get_instance();
