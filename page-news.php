<?php
/*
 * Template Name: News Page
 */
get_header();
?>

<section class="news">
  <h1>News</h1>
  <div class="container">
    <div class="news-grid">
      <?php
      $news_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => -1 // Show all posts
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

<?php get_footer(); ?>