<?php
/**
 * MuuStack functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MuuStack
 */

require_once get_template_directory(). '/funct/navbar.php';


function muustack_scripts() {

	//Estilos

	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('bootstrap', get_template_directory_uri(). '/libs/bootstrap/css/bootstrap.min.css', array(), '4.4.1', 'all');
	wp_enqueue_style('fontawesome', get_template_directory_uri(). '/fontawesome/css/all.min.css', array(), '3.0.1', 'all');
	wp_enqueue_style('aos_css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '1.0', 'all');
    wp_enqueue_style('estilos', get_template_directory_uri(). '/libs/estilo.css', array(), '1.0.1', 'all');


	//Scripts
	wp_enqueue_script( 'popper', get_template_directory_uri(). '/libs/poppers.min.js', array('jquery'), '1.16.0', true);
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/libs/bootstrap/js/bootstrap.min.js', array('popper'), '4.4.1',true);;
	wp_enqueue_script('aos', get_template_directory_uri().'/libs/aos.js', array(), '1.0', true);
  	wp_enqueue_script('scripts', get_template_directory_uri().'/libs/scripts.js', array(), '1.0', true);
	
	wp_localize_script( 'scripts', 'bloginfo', array(
			'template_url' => get_bloginfo('template_url'),
			'site_url' => get_bloginfo('url'),
			'post_id'   => get_queried_object()
	));
}    

add_action( 'wp_enqueue_scripts', 'muustack_scripts' );



//Menú
function muustack_register_my_menu() {
	register_nav_menus(
			array(
				'menu-principal' => __( 'Menú principal' ),
			)
		);
} 
add_action('init', 'muustack_register_my_menu');


/* Funciones para clases Menu*/
function liclass_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'liclass_class_on_li', 1, 3);

function add_menuclass($ulclass) {
	return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
 }
 add_filter('wp_nav_menu','add_menuclass');

 function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
      $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);



//Cambiamos el logo del inicio
add_action( 'login_enqueue_scripts', 'bs_change_login_logo' );
function bs_change_login_logo() { ?> 

<style type="text/css"> 
  
#login h1 a {
    background-image: url('<?php echo get_template_directory_uri(); ?>'); /* Colocar url de la imagen */
    height: 80px;
    background-position: center;
    background-size: cover;
    width: 160px;
} 					  
</style>
					  
<?php }

//Cambiamos la URL del logo			  
add_filter( 'login_headerurl', 'bs_login_logo_url' );
function bs_login_logo_url($url) {
    return ''; //Colocar url de retorno
}

//Revuevo el logo de wordpress del backend
function ls_admin_bar_remove() {
global $wp_admin_bar;
$wp_admin_bar->remove_menu( 'wp-logo' );
}

add_action( 'wp_before_admin_bar_render', 'ls_admin_bar_remove', 0 );

// Activar imágenes destacadas en páginas y entradas
add_theme_support( 'post-thumbnails' );

/* imagenes destacadas en post y post types */
add_filter('manage_posts_columns', 'add_thumbnail_column', 5);

 function add_thumbnail_column($columns){

  $columns['new_post_thumb'] = __('Imagen destacada');

  return $columns;

}


//Cambiar el pie de pagina del panel de Administración
function change_footer_admin() {
 $any = date('Y');
 echo '©'.$any.' Copyright · Desarrollado por <a href="https://muustack.com" target="_blank" style="color:black;"><b>MuuStack</b></a>';
}
add_filter('admin_footer_text', 'change_footer_admin');


//Short code Year.
function year_shortcode(){
	$year = date_i18n ('Y');
	return $year;
}
add_shortcode ('year', 'year_shortcode');