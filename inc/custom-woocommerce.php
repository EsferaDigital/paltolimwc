<?php
// Añadimos soporte para woocommerce
if(!function_exists('paltolim_setup_woocommerce')):
  function paltolim_setup_woocommerce() {
    // soporte para woocommerce
    add_theme_support( 'woocommerce' );
    //soporte para ligthbox y zoom de productos
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
  }
endif;
add_action('after_setup_theme', 'paltolim_setup_woocommerce');

// Ocultar productos relacionados
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//Controlar número de columnas para mostrar productos en tienda
add_filter('loop_shop_columns', 'paltolim_columns_product', 20);
function paltolim_columns_product($columnas){
  return 3;
}

// Ocultar titulo tienda (no el del menú)
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

// Editar formulario realizar pedido
// function paltolim_override_checkout_fields( $fields ) {
//   // unset($fields['billing']['billing_first_name']);
//   // unset($fields['billing']['billing_last_name']);
//   unset($fields['billing']['billing_company']);
//   $fields['billing']['billing_address_1']; //Direccion
//   unset($fields['billing']['billing_address_2']['required']);
//   unset($fields['billing']['billing_city']['required']);
//   unset($fields['billing']['billing_postcode']);
//   $fields['billing']['billing_state'] = array('required' => false);
//   $fields['billing']['billing_phone'] = array('required' => false);
//   unset($fields['order']['order_comments']);
//   unset($fields['billing']['billing_postcode']);
//   unset($fields['billing']['billing_company']);
//   // unset($fields['billing']['billing_email']);
//   // $fields['billing']['billing_city']['required'];
//   unset( $tabs['additional_information'] );
//   return $fields;
// }
// add_filter( 'woocommerce_checkout_fields' , 'paltolim_override_checkout_fields', 9999 );


// function custom_override_checkout_fields( $fields )
// {
// unset($fields['billing']['billing_country']);
// return $fields;
// }
// add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');

// function custom_override_checkout_fields( $fields ){
// unset($fields['billing']['billing_country']);
// return $fields;
// }
// add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');

// function paltolim_edit_required_fields($f){
//   unset ( $f [ 'billing' ] [ 'billing_last_name' ] [ 'required' ] ) ;
//   $f ['billing'] ['billing_address_1'] = array(
//     'required' => false
//   );
//   unset ( $f ['billing'] ['billing_country']['required']);
//   return $f;
// }
// add_filter('woocommerce_checkout_fields', 'paltolim_edit_required_fields', 9999);

// Quitar opciones de menu de pagina mi cuenta

function paltolim_mi_cuenta_woocommmerce(){
  function quitar_tabs( $items ){
    unset( $items['downloads']);
    //unset( $items['orders']);
    unset( $items['edit-address']);
    //unset( $items['edit-account']);
    //unset( $items['customer-logout']);
    return $items;
  }

  add_filter( 'woocommerce_account_menu_items', 'quitar_tabs' );
}

add_action( 'after_setup_theme', 'paltolim_mi_cuenta_woocommmerce' );


function paltolim_not_required($address_fields){
  $address_fields['country']['required'] = false;
  return $address_fields;
}
add_filter('woocommerce_default_address_fields', 'paltolim_not_required');



// Establece el valor de inicio, el valor máximo, el valor mínimo y la cantidad de incremento de los productos

function paltolim_woocommerce_quantity_input_args( $args, $product ){
  if ( is_singular( 'product' ) ){
    $args['input_value'] 	= 5;
    $args['min_value'] = 5;
    $args['step'] = 5;
  }

  $args['max_value'] = 1000;


  return $args;
}
add_filter( 'woocommerce_quantity_input_args', 'paltolim_woocommerce_quantity_input_args', 10, 2 );

function paltolim_woocommerce_available_variation( $args ){
  $args['max_qty'] = 1000; 		// Maximum value (variations)
  $args['min_qty'] = 50;   	// Minimum value (variations)
  return $args;
}
add_filter( 'woocommerce_available_variation', 'paltolim_woocommerce_available_variation' );

// Mejoramos botones para aumentar o disminuir productos pedidos
function paltolim_display_quantity_plus() {
  echo '<button type="button" class="plus" >+</button>';
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'paltolim_display_quantity_plus' );

function paltolim_display_quantity_minus() {
  echo '<button type="button" class="minus" >-</button>';
}
add_action( 'woocommerce_before_add_to_cart_quantity', 'paltolim_display_quantity_minus' );


// Función que realiza el incremento
function paltolim_add_cart_quantity_plus_minus() {
  // Solo en la página de producto
  if ( ! is_product() ) return;
  ?>
    <script type="text/javascript">

    jQuery(document).ready(function($){

      $('form.cart').on( 'click', 'button.plus, button.minus', function() {

        // Get current quantity values
        var qty = $( this ).closest( 'form.cart' ).find( '.qty' ); //elemento cliqueado
        var val	= parseFloat(qty.val());
        var max = parseFloat(qty.attr( 'max' ));
        var min = parseFloat(qty.attr( 'min' ));
        var step = parseFloat(qty.attr( 'step' ));


        // console.log(val); // 5
        // console.log(max); // 1000
        // console.log(min); // 5
        // console.log(step); // 5

        // Cambia el numero de pedidos con botones + y -
        if ( $( this ).is( '.plus' ) ) {
          $('.minus').removeAttr('disabled')
          $('.minus').removeClass('disabled')
          if ( max && ( max > val ) && val === 5 ) {
            qty.val( max );
            qty.val( val + step );
            step = 10;
            console.log('entro');
          }
          else if(max && (max > val) && val === 10 ){
            qty.val( val + (step + 5) );
            console.log('entro2')
          } else if (max && max === val){
            $(".plus").attr('disabled','disabled');
            $('.plus').addClass('disabled')
            return
          }else {
            qty.val( val + (step + 5 ));
            step = 10;
            console.log('entro3');
          }
        } else {
          $('.plus').removeAttr('disabled')
          $('.plus').removeClass('disabled')
          if ( min && ( min >= val ) ) {
            qty.val( min );
          } else if ( val > 10) {
            qty.val( val - (step + 5));
          } else if(val >= 5){
            qty.val(val - step)
            $('.minus').attr('disabled', 'disabled');
            $('.minus').addClass('disabled')
          }


        }

      });

    });

    </script>
  <?php
}
add_action( 'wp_footer', 'paltolim_add_cart_quantity_plus_minus' );


?>
