<?php
/*
* Paltolim Functions and Definitions
*
*@link https://developer.wordpress.org(themes/basic/theme-functions)
*
*@package wordpress
*@subpackage paltolim
*@since 1.0.0
*@version 1.0.0
*/

//Establecer variables globales y asignar un valor a esas variables
global $google_fonts;
global $font_awesome;
global $hamburgers;

$google_fonts = 'https://fonts.googleapis.com/css?family=Raleway|Work+Sans';
$font_awesome = 'https://use.fontawesome.com/releases/v5.7.2/css/all.css';
$hamburgers = 'https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css';

//Establecer el ancho máximo permitido para cualquier contenido en el tema, como por ejemplo, embeds e imágines.
if(!isset($content_width)){
  $content_width = 800;
}
// Cargamos los css y js
if(!function_exists('paltolim_scripts')):
  function paltolim_scripts() {
    global $google_fonts;
    global $font_awesome;
    global $hamburgers;

    wp_enqueue_style('google-fonts', $google_fonts, array(), '1.0.0', 'all');
    wp_enqueue_style('font-awesome', $font_awesome, array(), '5.7.2', 'all');
    wp_enqueue_style('hamburgers', $hamburgers, array(), '1.1.3', 'all');
    wp_enqueue_style('style', get_stylesheet_uri(), array('google-fonts','font-awesome','hamburgers'), '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
  }
endif;
add_action( 'wp_enqueue_scripts', 'paltolim_scripts' );

//Creamos Menús
if(!function_exists('paltolim_menus')):
  function paltolim_menus() {
    register_nav_menus(array(
      'menu_main' => __('Menú Principal', 'paltolim'),
      'menu_social' => __('Menú Redes Sociales', 'paltolim')
    ));
  }
endif;
add_action( 'init', 'paltolim_menus' );

// Creamos Widgets
if(!function_exists('paltolim_register_sidebars')):
  function paltolim_register_sidebars() {

    register_sidebar(array(
      'name' => __('Sidebar Principal', 'paltolim'),
      'id' => 'sidebar_main',
      'description' => __('Este es el sidebar principal y aparecerá al lado del contenido principal.', 'paltolim'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Bajo la Cabecera'),
      'id' => 'sidebar_under-header',
      'description' => __('Este es el sidebar que va debajo del encabezado principal', 'paltolim'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Footer Columna I', 'paltolim'),
      'id' => 'footer_uno',
      'description' => __('Columna uno del footer.', 'paltolim'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Footer Columna II', 'paltolim'),
      'id' => 'footer_dos',
      'description' => __('Columna dos del footer.', 'paltolim'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Footer Columna III', 'paltolim'),
      'id' => 'footer_tres',
      'description' => __('Columna tres del footer.', 'paltolim'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));
  }
endif;
add_action('widgets_init', 'paltolim_register_sidebars');

// Añadimos soportes básicos
if(!function_exists('paltolim_setup')):
  function paltolim_setup() {
    // soporte a imagen destacada
    add_theme_support('post-thumbnails');

    //soporte a etiquetas semánticas de html5
    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption'
    ));

    // soporte a formatos de entrada
    add_theme_support('post-formats', array(
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat'
    ));

    //Soporte a títulos dinámicos de páginas del sitio (para el SEO)
    add_theme_support('title-tag');

    //Soporte para que añada meta que permite interactuar con lectores RSS
    add_theme_support('automatic-feed-links');

    // Remueve meta etiqueta que muestra la versión de wordpress que usamos
    remove_action('wp_head', 'wp_generator');
  }
endif;
add_action('after_setup_theme', 'paltolim_setup');

//Permitimos archivos svg en multimedia
function dmc_add_svg_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'dmc_add_svg_mime_types');

// Soportes adicionales
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/custom-excerpt.php';
require_once get_template_directory() . '/inc/custom-description.php';
require_once get_template_directory() . '/inc/custom-woocommerce.php';

