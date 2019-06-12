<aside class="Comments">
  <?php if(have_comments()): ?>
    <h3>
      <?php
        comments_number(
          __('No hay comentarios aún', 'paltolim'),
          __('Hay un comentario publicado', 'paltolim'),
          __('Hay % comentarios', 'paltolim')
        );
      ?>
    </h3>
    <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>
      <?php endif; ?>
      <?php comment_form(); ?>
</aside>
