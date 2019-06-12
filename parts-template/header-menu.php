<button class="Panel-btn hamburger hamburger--elastic
" type="button">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>
<section class="Panel">
  <?php
  if(has_nav_menu('menu_main')):
    wp_nav_menu(array(
      'theme_location' => 'menu_main',
      'container' => 'nav',
      'container_id' => 'Menu',
      'container_class' => 'Menu'
    ));
  else:
  ?>
    <nav class="Menu">
      <ul>
        <?php wp_list_pages('title_li'); ?>
      </ul>
    </nav>
  <?php endif; ?>
</section>
