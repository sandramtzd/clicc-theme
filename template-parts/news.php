<section class="news-section">
  <h2>Latest News</h2>
  <div class="container">
    <div class="news-grid">
      <?php
      $news_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 3
      ));

      if ($news_query->have_posts()) :
        while ($news_query->have_posts()) : $news_query->the_post(); ?>
          <div class="news-card">
            <h3><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      else : ?>
        <p>No news available at the moment.</p>
      <?php endif; ?>
    </div>
  </div>
</section>