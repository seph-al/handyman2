<?php

/**
 * Class UB_Admin_Bar_Menu
 * @property string $link_url
 * @property string $link_type
 * @property string $link_target
 * @property WP_Post[] $subs
 * @property bool $is_submenu
 * @property bool $is_image
 * @property string $title_image
 */
class UB_Admin_Bar_Menu{

    /**
     * @since 1.5
     * @access public
     *
     * @var int
     */
    var $id;

    /**
     * @since 1.5
     * @access public
     *
     * @var WP_Post
     */
    var $post;

    /**
     * Constructs the class
     *
     * @since 1.5
     * @access public
     *
     * @param WP_Post $post
     */
    function __construct(WP_Post $post){
        $this->post = $post;
        $this->id = $post->ID;
    }

    /**
     * Instantiates an object
     *
     * @since 1.5
     * @access public
     *
     * @param $id
     * @return UB_Admin_Bar_Menu
     */
    static function load($id){
		if( is_multisite() ){
	        switch_to_blog( 1 );
	        $post = get_post( $id );
	        restore_current_blog();
		}else{
			$post = get_post( $id );
		}

        return new UB_Admin_Bar_Menu( $post );

    }


    /**
     * Implements getter for properties
     *
     * @since 1.5.0
     * @access public
     *
     * @param $property
     * @return mixed
     */
    public function __get($property) {
        $method_name = "get_" . $property;
        $wp_property = "post_" . $property;
        if ( property_exists( $this, $property ) ) {
            return $this->$property;
        }elseif( method_exists( $this, $method_name ) ){
            return $this->$method_name();
        }elseif( property_exists($this->post, $wp_property) ){
            return $this->post->{$wp_property};
        }
    }

    /**
     * Return menu url
     *
     * @since 1.5
     * @access public
     *
     * @return string url to for menu
     */
    function get_link_url(){

        switch( $this->post->post_content ){
            case "network_site_url" :
                $url = network_site_url();
                break;
            case "admin_url" :
                $url = network_admin_url();
                break;
            case "site_url" :
                $url = trailingslashit( get_site_url() );
                break;
            case "#":
                $url = "#";
                break;
            default:
                $url = $this->post->post_content;
                break;
        }
        return $url === "url" ? "" : $url  ;
    }

    /**
     * Returns target type for menu link
     *
     * @since 1.5
     * @access public
     *
     * @return string menu url target
     */
    function get_link_target(){
        return $this->post->post_excerpt;
    }

    /**
     * Retrieves type of link/menu
     * Values are admin_url, site_url, # or url
     *
     * @since 1.5
     * @access public
     *
     * @return string
     */
    function get_link_type(){

        if( $this->is_submenu ){
            return $this->post->ping_status;
        }

        if(
            $this->post->post_content === network_admin_url("/")
            || $this->post->post_content  === "admin_url"
        ){
           return "admin_url";
        }elseif( !(
            $this->post->post_content === "admin_ur"
            || $this->post->post_content === "site_url"
            || $this->post->post_content === "#"
            || $this->post->post_content === "network_site_url"
        )  ) {
            return "url";
        }

        return $this->post->post_content;
    }

    /**
     * Retrieves sub menus
     *
     * @since 1.5
     * @access public
     *
     * @return array UB_Admin_Bar_Menu |bool false
     */
    function get_subs(){
        if( $this->is_submenu ) return false;
        global $wpdb;
        $table = $wpdb->base_prefix . "posts";
        $ids = $wpdb->get_col( $wpdb->prepare( "SELECT `ID` FROM `{$table}` WHERE `post_type` = %s AND `post_parent` = %d  ORDER BY `menu_order` ASC ", UB_Admin_Bar::POST_TYPE, $this->id  ) );
        if( is_array( $ids ) ){
            return array_map( array("UB_Admin_Bar_Menu", "load"), $ids  );
        }else{
            return false;
        }
    }

    /**
     * Retrieves image used as title if it's and image, returns url if it's not an image
     *
     * @since 1.5
     * @access public
     *
     * @return string
     */
    public function get_title_image(){
        if( $this->is_image ){
            return "<img  class='ub_admin_bar_image' src='{$this->post->post_title}' />";
        }
        return $this->post->post_title;
    }

    /**
     * Checks if link url is an image
     *
     * @since 1.5
     * @access public
     *
     * @return bool
     */
    private function get_is_image(){
        $image_extentions = array(
            'jpg',
            'jpeg',
            'gif',
            'svg',
            'png'
        );
        $extension = pathinfo( preg_replace('/\s+/', '', $this->post->post_title ) );
        $extension = isset( $extension['extension'] ) ? strtolower( $extension['extension'] ) : false;
        if( $extension ){
            return in_array( $extension,  $image_extentions );
        }else{
            return false;
        }

    }

    /**
     * Checks if it's a submenu
     *
     * @since 1.5
     * @access public
     *
     * @return bool
     */
    function get_is_submenu(){
        return (bool) $this->post->post_parent;
    }

    public function get_field_id( $field ){
        return $field . "-" . $this->id;
    }
}