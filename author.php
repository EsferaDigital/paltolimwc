<?php get_header(); ?>
<main class="Main">
  <section class="Main-container">
    <?php
      get_template_part('parts-template/author-content');
      if(have_posts()):
        while(have_posts()):
          the_posts();
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
