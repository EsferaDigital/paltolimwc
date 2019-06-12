<?php

// Para modificar el extracto
if(!function_exists('paltolim_excerpt_more')):
  function paltolim_excerpt_more() {
    return '<a href="' . get_permalink() . '">' . __(' leer más', 'paltolim') . '<i class="fab fa-readme"></i></a>';
  }
endif;
add_filter( 'excerpt_more', 'paltolim_excerpt_more' );

if(!function_exists('paltolim_excerpt_length')):
  function paltolim_excerpt_length() {
    return 40;
  }
endif;
add_filter( 'excerpt_length', 'paltolim_excerpt_length' );
