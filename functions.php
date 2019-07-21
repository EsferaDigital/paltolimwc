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
    // soporte para woocommerce
    add_theme_support( 'woocommerce' );
    //soporte para ligthbox y zoom de productos
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
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

//Hooks y filtros woocommerce

add_filter( 'woocommerce_checkout_fields' , 'paltolim_override_checkout_fields' );

function paltolim_override_checkout_fields( $fields ) {
  // unset($fields['billing']['billing_first_name']);
  unset($fields['billing']['billing_last_name']);
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_state']);
  unset($fields['billing']['billing_phone']);
  unset($fields['order']['order_comments']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_last_name']);
  // unset($fields['billing']['billing_email']);
  unset($fields['billing']['billing_city']);
  unset( $tabs['additional_information'] );
  return $fields;
}

// Establece el valor de inicio, el valor máximo, el valor mínimo y la cantidad de incremento.

add_filter( 'woocommerce_quantity_input_args', 'paltolim_woocommerce_quantity_input_args', 10, 2 );

function paltolim_woocommerce_quantity_input_args( $args, $product ){
  if ( is_singular( 'product' ) ){
    $args['input_value'] 	= 50;
  }
  $args['max_value'] = 1000;
  $args['min_value'] = 50;
  $args['step'] = 50;
  return $args;
}

add_filter( 'woocommerce_available_variation', 'paltolim_woocommerce_available_variation' );

function paltolim_woocommerce_available_variation( $args ){
  $args['max_qty'] = 1000; 		// Maximum value (variations)
	$args['min_qty'] = 50;   	// Minimum value (variations)
	return $args;
}
// mejoramos botones para aumentar o disminuir productos pedidos
add_action( 'woocommerce_after_add_to_cart_quantity', 'paltolim_display_quantity_plus' );

function paltolim_display_quantity_plus() {
	echo '<button type="button" class="plus" >+</button>';
}

add_action( 'woocommerce_before_add_to_cart_quantity', 'paltolim_display_quantity_minus' );

function paltolim_display_quantity_minus() {
	echo '<button type="button" class="minus" >-</button>';
}

add_action( 'wp_footer', 'paltolim_add_cart_quantity_plus_minus' );

function paltolim_add_cart_quantity_plus_minus() {
	// Only run this on the single product page
	if ( ! is_product() ) return;
	?>
		<script type="text/javascript">

		jQuery(document).ready(function($){

			$('form.cart').on( 'click', 'button.plus, button.minus', function() {

				// Get current quantity values
				var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
				var val	= parseFloat(qty.val());
				var max = parseFloat(qty.attr( 'max' ));
				var min = parseFloat(qty.attr( 'min' ));
				var step = parseFloat(qty.attr( 'step' ));

				// Change the value if plus or minus
				if ( $( this ).is( '.plus' ) ) {
					if ( max && ( max <= val ) ) {
						qty.val( max );
					} else {
						qty.val( val + step );
					}
				} else {
					if ( min && ( min >= val ) ) {
						qty.val( min );
					} else if ( val > 1 ) {
						qty.val( val - step );
					}
				}

			});

		});

		</script>
	<?php
}

// Ocultar productos relacionados
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

// Soportes adicionales
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/custom-excerpt.php';
require_once get_template_directory() . '/inc/custom-description.php';

