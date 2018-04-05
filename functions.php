<?php
// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'feed_links_extra', 3 );

function footer_enqueue_scripts(){
    remove_action('wp_head','wp_print_scripts');
    remove_action('wp_head','wp_print_head_scripts',9);
    remove_action('wp_head','wp_enqueue_scripts',1);
    add_action('wp_footer','wp_print_scripts',5);
    add_action('wp_footer','wp_enqueue_scripts',5);
    add_action('wp_footer','wp_print_head_scripts',5);
}
add_action('after_setup_theme','footer_enqueue_scripts');

// Add plugin JQuery.cookies
function jquery_cookies() {
    wp_enqueue_script( 'jquery_cookies', get_stylesheet_directory_uri() . '/js/jquery.cookie.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts', 'jquery_cookies' );

remove_filter('the_excerpt', 'wpautop');
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150 );
}

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'category-thumb', 300, 9999 );
    add_image_size( 'catalog-thumb', 220, 220, true );
}

register_nav_menus( array(
    'header_menu' => 'Меню в шапке',
    'footer_menu' => 'Меню в подвале'
) );

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'New Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));

add_action('admin_menu', 'register_custom_menu_page');

function register_custom_menu_page() {
    add_menu_page('Меню', 'Меню', '8', 'nav-menus.php');

}



add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );
add_filter( 'login_headertitle', create_function('', 'return false;') );

if ( !current_user_can( 'edit_users' ) ) {
    add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
    add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}


add_filter( 'show_admin_bar', '__return_false' );


//Добавляем атрибут title для изображений галерей(атрибут убран начиная с WP 3.5)
function my_image_titles($atts,$img) {
    $atts['title'] = trim(strip_tags( $img->post_content ));
    return $atts;
}
add_filter('wp_get_attachment_image_attributes','my_image_titles',10,2);

function display_map($atts) {
    $num = $atts['num'] - 1;
    $maps = get_field('yandex_maps');
    $map_code = $maps[$num]['yandex_code'];
    return "<div class='map_wrap'>".$map_code."</div>";
}
add_shortcode('map', 'display_map');

function display_bold_hr() {
    return "<div class='bold_hr'></div>";
}
add_shortcode('hr', 'display_bold_hr');

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

if( !function_exists('post_count_on_archive') ):
    function post_count_on_archive( $query ) {
        if ( $query->is_search() ) {
            $query->set( 'posts_per_page', '100' ); /*количество постов*/
        }
    }
    add_action( 'pre_get_posts', 'post_count_on_archive' );
endif;

//Каты
function display_cat($atts) {
    $num = $atts['num'] - 1;
    $cat_blocks = get_field('cats');
    $cat_link_text = $cat_blocks[$num]['cat_link_text'];
    $cat_block_content = $cat_blocks[$num]['cat_block_content'];
    $cat_block_html =
        '<div class="cat_block">
		<a class="cat_block_link" href="#">'.$cat_link_text.'</a>
		<div class="cat_block_content_wrap">
			<div class="cat_block_content">'
        .$cat_block_content.
        '</div>
		</div>
	</div>';
    return $cat_block_html;
}
add_shortcode('cat', 'display_cat');
?>