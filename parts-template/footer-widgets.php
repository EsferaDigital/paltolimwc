<div class="Footer-widgets-item">
  <?php
  if(is_active_sidebar('footer_uno')):
    dynamic_sidebar('footer_uno');
  else:
  ?>
  <article class="Widget">
    <h3>¿Cómo comprar?</h3>
    <a class="Como-comprar" href="http://localhost:8080/PaltolimWC/wp-content/uploads/2019/08/comprar.svg" target="_blank">
      <img src="http://localhost:8080/PaltolimWC/wp-content/uploads/2019/08/comprar.svg" alt="Como comprar">
    </a>
  </article>
  <?php endif; ?>
</div>
<div class="Footer-widgets-item">
  <?php
  if(is_active_sidebar('footer_dos')):
    dynamic_sidebar('footer_dos');
  else:
  ?>
  <article class="Widget">
    <h3><?php _e('Buscar', 'paltolim'); ?></h3>
      <?php get_search_for(); ?>
  </article>
  <?php endif; ?>
</div>
<div class="Footer-widgets-item">
  <?php
  if(is_active_sidebar('footer_tres')):
    dynamic_sidebar('footer_tres');
  else:
  ?>
  <article class="Widget">
    <h3><?php _e('Buscar', 'paltolim'); ?></h3>
      <?php get_search_for(); ?>
  </article>
  <?php endif; ?>
</div>
