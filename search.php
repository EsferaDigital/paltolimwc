<?php get_header(); ?>
<main class="Main">
  <section class="Main-container">
    <div class="TermsResults">
      <h3><?php _e('Resultados para la búsqueda:', 'paltolim'); ?></h3>
      <mark><?php get_search_query(); ?></mark>
    </div>
    <?php
      if(have_posts()):
        while(have_posts()):
          the_post();
          get_template_part('parts-template/search-content');
        endwhile;
        get_template_part('parts-template/pagination');
      else:
        get_template_part('parts-template/not-found');
      endif;
    ?>
  </section>
</main>
<?php
get_sidebar();
get_footer();
?>
