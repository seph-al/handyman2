<?php

/**
 * Class UB_Admin_Bar
 * @since 1.5
 */
class UB_Admin_Bar {

    /**
     * @const module name
     */
    const NAME = "custom-admin-bar";

    /**
     * @const Current Version Number
     */
    const VERSION = 1.5;

    /**
     * @const post type name
     */
    const POST_TYPE = "ub_admin_bar";

    /**
     * @const version key used for storing version number in database
     */
    const VERSION_KEY = 'ub_admin_bar_version';

    /**
     * @const style key for saving to options table
     */
    const STYLE = "ub_admin_bar_style";

    /**
     * @const order key for saving admin bar order to options table
     */
    const ORDER = "ub_admin_bar_order";
    /**
     * Constructs the class and hooks to action/filter hooks
     *
     * @since 1.5
     * @access public
     *
     */
    function __construct(){
        add_action("init", array( $this, "register_post_type" ));
        add_filter( 'ultimatebranding_settings_menu_adminbar_process', array( $this, 'update_data'), 10, 1 );
        add_action( "admin_bar_menu", array( $this, "reorder_menus" ), 99999 );
        add_action('admin_bar_menu', array( $this, "add_custom_menus" ), 1);
        add_action('admin_bar_menu', array( $this, "remove_menus_from_admin_bar" ), 999);
        add_action("wp_before_admin_bar_render", array( $this, "before_admin_bar_render" ));
        add_action("wp_after_admin_bar_render", array( $this, "after_admin_bar_render" ));
        add_action( "wp_ajax_ub_save_menu_ordering", array( $this, "ajax_save_menu_ordering" ) );

    }

    /**
     * @return void
     */
    function register_post_type(){
        $args = array(
            'labels'             => array(),
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => false,
            'show_in_menu'       => false,
            'query_var'          => false,
            'capability_type'    => 'page',
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => 999,
            'supports'           => array( )
        );
        register_post_type( self::POST_TYPE, $args );
    }
    /**
     * Updates data
     *
     * @since 1.5
     * @access public
     *
     * @hook ultimatebranding_settings_menu_adminbar_process
     *
     * @param bool $status
     * @return bool true on successful update, false on update failure
     */
    function update_data( $status ) {
        if( isset( $_POST['ub_admin_bar_restore_default_order'] ) ){
            ub_update_option( self::ORDER, "" );
            return true;
        }

        ub_update_option('wdcab', $_POST['wdcab']);

        ub_update_option( self::STYLE, strip_tags( $_POST['ub_admin_bar_style'] ) );

        $save_result = $this->save_new_menus();
        $update_result = $this->update_prev_menus();
        $remove_result = $this->remove_menus();
        return $save_result && $status && $update_result && $remove_result;
    }

    /**
     * Saves newly added menus
     *
     * @since 1.5
     * @access private
     *
     * @return bool
     */
    private function save_new_menus(){
        if( isset( $_POST['ub_ab_new'] ) ){
            $news = $_POST['ub_ab_new'];
            foreach( $news as $key =>  $new ){
                $new_sub = $new['links']['_last_'];

                unset( $new['links']['_last_'] );
                // Insert menu
                $parent_id  = $this->insert_menu( $new );

                $new_sub_id = true;
                // save new sub menu if any
                if( !is_wp_error( $parent_id ) && isset( $new_sub['title'] ) && !empty( $new_sub['title'] ) ){
                    $new_sub_id =  $this->insert_sub_menu( $new_sub, $parent_id );
                }

            }

            return !is_wp_error( $parent_id ) && !is_wp_error( $new_sub_id );
        }
        return true;
    }

    /**
     * Updates previous menus
     *
     * @since 1.5
     * @access private
     *
     * @return bool
     */
    private function  update_prev_menus(){
        $result = array();
        if( isset( $_POST['ub_ab_prev'] ) ) {
            $menus = $_POST['ub_ab_prev'];
            $main_order = 1;
            foreach( $menus  as $id => $menu ){
                $new = $menu['links']['_last_'];
                unset( $menu['links']['_last_'] );
                $links = $menu['links'];
                // update parent menu
                $parent_id = $this->update_menu($id, $menu, $main_order);
                $sub_order = 1;
                $result[] = !is_wp_error( $parent_id );
                // update sub menus
                if( count( $links ) > 0 ){
                    foreach( $links as $link_id => $link){
                        $res = $this->update_sub_menu($link_id, $link, $sub_order);
                        $result[] = !is_wp_error( $res );
                        $sub_order ++;
                    }
                }
                // add new submenu
                if( isset( $new['title'] ) && !empty( $new['title'] ) ){
                     $res = $this->insert_sub_menu($new, $parent_id, $sub_order );
                     $result[] = !is_wp_error( $res );
                }
                $main_order ++;
            }
        }

        return !in_array(false, $result);
    }

    /**
     * Removes menus
     *
     * @since 1.5
     * @access private
     *
     * @return bool
     */
    private function remove_menus(){
        global $wpdb;
        $result = array();
        if( isset( $_POST['ub_ab_delete_links'] ) && !empty( $_POST["ub_ab_delete_links"] )){
            $links = $_POST["ub_ab_delete_links"];
            $links = explode( ",", $links );
            foreach( $links as $link_id ){
                $link_id = (int) $link_id;
                if( $link_id > 0 ){
                    $query = $wpdb->prepare( "DELETE FROM {$wpdb->posts} WHERE ( `ID` = %d OR `post_parent` = %d ) AND  `post_type` = %s ", $link_id, $link_id,  UB_Admin_Bar::POST_TYPE);
                    $result[] = $wpdb->query($query);
                }
            }
        }

        return !in_array(false, $result);
    }


    /**
     * Inserts new menu
     *
     * @since 1.5
     * @access private
     *
     * @param $menu
     * @return int|WP_Error
     */
    private function insert_menu($menu){
        return wp_insert_post( array(
            'post_type' => UB_Admin_Bar::POST_TYPE,
            'post_status' => 'publish',
            'post_title' => $menu['title'] ? $menu['title'] : "New Bar title",
            'post_content' => $menu['title_link'] ? $menu['title_link'] : "#", // link url
            'post_excerpt' => isset( $menu['title_link_target'] ) && $menu['title_link_target'] === "on" ? "_blank" : "_self" // link target
        ) );
    }

    /**
     * Inserts sub menu
     *
     * @since 1.5
     * @access private
     *
     * @param $sub_menu
     * @param $parent_id
     * @param int $order
     * @return int|WP_Error
     */
    private function insert_sub_menu($sub_menu, $parent_id, $order = 0){

        $url = $sub_menu['url'];
        switch( $sub_menu['url_type'] ){
            case "site":
                $url = network_site_url( $url );
            break;
            case "admin":
                $url = network_admin_url( $url );
                break;
        }

        return  wp_insert_post( array(
            'post_type' => UB_Admin_Bar::POST_TYPE,
            'post_parent' => $parent_id,
            'post_status' => 'publish',
            'post_title' => $sub_menu['title'],
            'post_content' => $sub_menu['url'] ? $url : "new_sub_menu_link",
            'post_excerpt' => isset( $sub_menu['target'] ) && $sub_menu['target'] === "on"  ? "_blank" : "_self",
            'ping_status' => $sub_menu['url_type'] ? $sub_menu['url_type'] : "external",
            'menu_order' => $order
        ) );
    }

    /**
     * Updates a single menu
     *
     * @since 1.5
     * @access private
     *
     * @param $id
     * @param $menu
     * @param int $main_order
     * @return int|WP_Error
     */
    private function update_menu($id, $menu, $main_order = 0)
    {
        return  wp_update_post(array(
            'ID' => $id,
            'post_title' => $menu['title'] ? $menu['title'] : "New Bar title",
            'post_content' => $menu['title_link'] ? $menu['title_link'] : network_admin_url("/"), // link url
            'post_excerpt' => isset( $menu['title_link_target'] ) && $menu['title_link_target'] === "on" ? "_blank" : "_self",
            'menu_order' => $main_order
        ));

    }

    /**
     * Updates single sub menu
     *
     * @since 1.5
     * @access private
     *
     * @param $sub_id
     * @param $sub
     * @param int $sub_order
     * @return int|WP_Error
     */
    private function update_sub_menu($sub_id, $sub, $sub_order = 0)
    {
        return wp_update_post(array(
            'ID' => $sub_id,
            'post_title' => $sub['title'],
            'post_content' => $sub['url'] ? $sub['url'] : "new_subbar_link",
            'post_excerpt' => isset( $sub['target'] ) && $sub['target'] === "on" ? "_blank" : "_self",
            'ping_status' => $sub['url_type'] ? $sub['url_type'] : "external",
            'menu_order' => $sub_order
        ));
    }

    /**
     * Returns number of parent menus
     *
     * @since 1.5
     * @access public
     *
     * @return int number of parent menus
     */
    public static function number_of_menus(){
        global $wpdb;
        $table = $wpdb->base_prefix . "posts";
        $q = $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE `post_type` = %s AND `post_parent` = 0 ", self::POST_TYPE);
        restore_current_blog();
        return (int) $wpdb->get_var( $q );
    }

    /**
     * Retrieves menus from database
     *
     * @since 1.5
     * @access public
     *
     * @return array UB_Admin_Bar_Menu|bool false
     */
    public static  function menus(){
        global $wpdb;
        $table = $wpdb->base_prefix . "posts";
        $q = $wpdb->prepare( "SELECT `ID` FROM `{$table}` WHERE `post_type` = %s AND `post_parent` = 0  ORDER BY `menu_order` ASC", UB_Admin_Bar::POST_TYPE);
        $ids = $wpdb->get_col( $q );
        if( is_array( $ids ) ){
            return array_map( array("UB_Admin_Bar_Menu", "load"), $ids  );
        }else{
            return false;
        }
    }

    /**
     * Migrates data from versions less than 1.5
     *
     * @since 1.5
     * @access public
     *
     * @return void
     */
    public static function migrate_data(){

        if( (float) ub_get_option( self::VERSION_KEY ) < 1.5 ){
            $prev_bar = ub_get_option("wdcab");
            if( $prev_bar ){
                $prev_subs = $prev_bar['links'];
                unset($prev_bar['links']);
                $parent_id = self::insert_menu($prev_bar);
                if( count( $prev_subs ) > 0 ){
                    foreach( $prev_subs as $key =>  $sub ){
                        self::insert_sub_menu($sub, $parent_id, (int) $key );
                    }
                }
                ub_update_option( self::VERSION_KEY, self::VERSION );
            }
        }

    }

    /**
     * Returns menus style
     *
     * @since 1.6
     * @access public
     *
     * @param bool $editor, true, it's in editor mode
     * @return array|mixed|string|void
     */
    public static function styles($editor = false){
        $style = <<<UBSTYLE
.ub_admin_bar_image{
    max-width: 100%;
    max-height: 28px;
    padding: 2px 0;
}
UBSTYLE;

        $save_style = ub_get_option(self::STYLE);
        if( $editor ){
            return  $save_style;
        }

        $styles = empty( $save_style ) ? $style : $save_style;
        return self::prefix_styles( $styles );
    }

    /**
     * Adds #ub_admin_bar_wrap prefix to the define styles
     *
     * @since 1.6
     * @access private
     *
     * @param $styles
     * @return array|string
     */
    private function prefix_styles( $styles ){
        if( !empty( $styles ) ){
            $styles = array_filter( explode( "}", $styles) );
            $output = array();
            foreach( $styles as $style ){
                $output[] =  "#ub_admin_bar_wrap " . $style . "}";
            }

            return implode( "", $output);
        }
        return $styles;
    }

    /**
     * Saves new menu order into database
     *
     * @since 1.6
     * @access public
     *
     * @return void
     */
    public function ajax_save_menu_ordering(){
        $order = $_POST['order'];

        $result = array(
            "status" => false
        );

        if( is_array( $order ) && count( $order ) > 0 ){

            ub_update_option( self::ORDER, $order );
            $result = array(
                "status" => true
            ) ;
        }

        header('Content-Type: application/json');
        echo json_encode($result);
        wp_die();
    }

    /**
     * Returns menus' order
     *
     * @since 1.6
     * @access public
     *
     * @return mixed|void
     */
    public static function order(){
        return ub_get_option( self::ORDER );
    }


    /**
     * Renders before admin bad renderer
     *
     * @hook wp_before_admin_bar_render
     *
     * @since 1.6
     * @access public
     */
    function before_admin_bar_render(){
        ?>
        <style type="text/css">
            <?php echo UB_Admin_Bar::styles();?>
        </style>

        <div id='ub_admin_bar_wrap'>

    <?php
    }

    /**
     * Renders after admin bad renderer
     *
     * @hook wp_after_admin_bar_render
     *
     * @since 1.6
     * @access public
     */
    function after_admin_bar_render(){
        ?>
        </div>
        <?php
    }


    /**
     * Keeps the menus in order based on saved orderings
     *
     * @since 1.6
     * @access public
     *
     * @param $wp_admin_bar instance of WP_Admin_Bar passed by refrence
     * @hook admin_bar_menu
     *
     * @return void
     */
    public function reorder_menus(){
        /**
         * @var $wp_admin_bar WP_Admin_Bar
         */
        global $wp_admin_bar;

        $order = UB_Admin_Bar::order();
        if( !$order || !is_array( $order ) ) return;

        $nodes = $wp_admin_bar->get_nodes();
        // remove all nodes
        foreach( $nodes as $node_id =>  $node ){
            $wp_admin_bar->remove_node( $node_id );
        }

        // add ordered nodes
        foreach( $order as $o ){
            if( isset( $nodes[$o] ) ){
                $wp_admin_bar->add_node( $nodes[ $o ] );
                unset( $nodes[ $o ] );
            }
        }

        // add rest of the nodes
        if( count( $nodes ) > 0 ){
            foreach( $nodes as $node ){
                $wp_admin_bar->add_node($node);
            }
        }

    }

    /**
     * Adds custom menus to the admin bar
     *
     * @since 1.0
     * @access public
     *
     * @param $wp_admin_bar WP_Admin_Bar passed by refrence
     * @hook admin_bar_menu
     *
     * @return void
     */
    function add_custom_menus() {
        /**
         * @var $wp_admin_bar WP_Admin_Bar
         */
        global $wp_admin_bar;

        $enabled = ub_get_option("wdcab");
        $enabled = (bool) $enabled['enabled'];
        if( !$enabled ) return;

        /**
         * @var $menu UB_Admin_Bar_Menu
         * @var $sub UB_Admin_Bar_Menu
         */
        foreach( UB_Admin_Bar::menus() as $menu ){
            $wp_admin_bar->add_menu(array(
                    'id' => "ub_admin_bar-" . $menu->id,
                    'title' => $menu->title_image,
                    'href' => $menu->link_url,
                    'meta' => array(
                        'target' => $menu->link_target
                    ),
                )
            );


            foreach( $menu->subs as $sub ){
                $wp_admin_bar->add_menu(array(
                        'parent' => "ub_admin_bar-" . $menu->id,
                        'id' => "ub_admin_bar-" . $sub->id,
                        'title' => $sub->title_image,
                        'href' => $sub->link_url,
                        'meta' => array(
                            'target' => $sub->link_target
                        ),
                    )
                );
            }
        }
    }

    /**
     * Removes selected default menus from admin bar
     *
     * @since 1.0
     * @access public
     *
     * @return void
     */
    function remove_menus_from_admin_bar() {
        global $wp_version;
        $version = preg_replace('/-.*$/', '', $wp_version);
        if (version_compare($version, '3.3', '>=')) {
            global $wp_admin_bar;
            $opts = ub_get_option('wdcab');
            $disabled = is_array(@$opts['disabled_menus']) ? $opts['disabled_menus'] : array();
            foreach ($disabled as $id) {
                $wp_admin_bar->remove_node($id);
            }
        }
    }


}

new UB_Admin_Bar;