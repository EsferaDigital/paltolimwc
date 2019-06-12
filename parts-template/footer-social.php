<?php
if(has_nav_menu('menu_social')):
  wp_nav_menu(array(
    'theme_location' => 'menu_social',
    'container' => 'nav',
    'container_id' => 'SocialMedia',
    'container_class' => 'SocialMedia',
    'link_before' => '<span class="sr-text">',
    'link_after' => '</span>'
  ));
else:
  echo '<p><small>Aquí puedes agregar un menú de redes sociales, créalo desde tu wp-admin.</small><7p>';
endif;
