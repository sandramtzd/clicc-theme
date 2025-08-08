<?php
get_header();
get_template_part('template-parts/hero');
?>

<main class="single-post">
  <section class="section">
    <div class="container single-post-container">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
      ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="single-post-header">
              
              <?php if (has_excerpt()) : ?>
                <p class="single-post-excerpt"><?php echo get_the_excerpt(); ?></p>
              <?php endif; ?>
              <?php
                    // Get the author's email to generate the Gravatar URL
                    $author_email = get_the_author_meta('email');
                    $has_gravatar = get_avatar_url($author_email); // Checks if a Gravatar exists
                    $gravatar_url = 'https://gravatar.com/' . md5(strtolower(trim($author_email)));
              ?>

              <div class="author-meta-info">
                <div class="author-info">
                  <?php if ($has_gravatar) : ?>
                    <div class="author-avatar">
                      <a href="<?php echo esc_url($gravatar_url); ?>" target="_blank" rel="noopener noreferrer">
                      <?php echo get_avatar($author_email, 48); ?>
                      </a>
                    </div>
                  <?php endif; ?>
                  <div class="author-details">
                    <span class="author-name">
                      <?php if ($has_gravatar) : ?>
                        <a href="<?php echo esc_url($gravatar_url); ?>" target="_blank" rel="noopener noreferrer">
                          <?php the_author(); ?>
                        </a>
                      <?php else : ?>
                        <?php the_author(); ?>
                      <?php endif; ?>
                    </span>
                    <span class="post-meta-divider">·</span>
                    <span class="post-reading-time"><?php echo community_link_childcare_reading_time(); ?> min read</span>
                    <span class="post-meta-divider">·</span>
                    <time class="post-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('M j, Y'); ?></time>
                  </div>
                </div>
              </div>
            </header>

            <div class="single-post-content">
              <?php
              // Display the post content and other elements
              the_content();
              ?>
            </div>

            <footer class="single-post-footer">
              <?php
              // Optionally add categories, tags, or comments here
              // comments_template();
              ?>
            </footer>
          </article>
        <?php
        endwhile;
      else :
        echo '<p>No content found.</p>';
      endif;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>