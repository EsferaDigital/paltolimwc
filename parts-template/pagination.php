<?php if(get_next_posts_link() or get_previous_posts_link()): ?>
  <div class="Pagination">
    <nav>
      <?php
      echo paginate_links(array(
        'prev_text' => __('<span>&laquo; Anteriores</span>', 'paltolim'),
        'next_text' => __('<span>Siguientes &raquo;</span>', 'paltolim')
      ));
      ?>
    </nav>
  </div>
    <?php endif; ?>
