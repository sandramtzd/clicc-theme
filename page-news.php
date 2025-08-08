<?php
/*
 * Template Name: News
 */
get_header();
get_template_part('template-parts/hero');
?>

<section id="news-page" class="section">
  <div class="container">
    <h1 class="page-title">All Our News & Updates</h1>
    <div class="news-page-grid">
      <?php
      // Query to fetch ALL posts
      $args = array(
          'post_type'      => 'post',
          'posts_per_page' => -1, // -1 means retrieve all posts
          'orderby'        => 'date',
          'order'          => 'DESC',
      );

      $all_news_query = new WP_Query($args);

      // Check if there are posts to display
      if ($all_news_query->have_posts()) :
          while ($all_news_query->have_posts()) : $all_news_query->the_post();
              // Display each post as a card for the grid
              ?>
              <div class="news-page-card">
                  <a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title_attribute(); ?>">
                      <div class="news-page-card-image">
                          <?php
                          if (has_post_thumbnail()) :
                              the_post_thumbnail('medium_large', array('class' => 'post-thumbnail')); // Using 'medium_large' for better resolution in grid
                          else :
                              // Placeholder image SVG if no thumbnail is set
                              ?>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="placeholder-icon">
                                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                  <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                  <polyline points="21 15 16 10 5 21"></polyline>
                              </svg>
                          <?php endif; ?>
                      </div>
                  </a>
                  <div class="news-page-card-content">
                      <h3 class="news-page-card-title"><?php the_title(); ?></h3>
                      <div class="news-page-card-meta">
                          <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                      </div>
                      <div class="news-page-card-excerpt">
                          <?php
                          // Display a trimmed excerpt with a few more words for the full page
                          echo wp_trim_words(get_the_excerpt(), 30, '...');
                          ?>
                      </div>
                      <a href="<?php the_permalink(); ?>" class="read-more-button">
                          <span>Read more</span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <line x1="5" y1="12" x2="19" y2="12"></line>
                              <polyline points="12 5 19 12 12 19"></polyline>
                          </svg>
                      </a>
                  </div>
              </div>
          <?php endwhile;
          // IMPORTANT: Restore original post data after custom queries
          wp_reset_postdata();
      else :
          // Message if no posts are found
          ?>
          <p class="no-posts-message">No news available at the moment. Please check back later.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>