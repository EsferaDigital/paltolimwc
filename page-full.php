<?php
  /*
  * Template name: Page-full
  */
  get_header(); the_post();
?>
<main class="Main">
  <section class="Main-container">
    <?php the_post_thumbnail(); ?>
    <article class="Content">
      <?php the_content(); ?>
    </article>
  </section>
</main>
<?php
get_footer();
?>
