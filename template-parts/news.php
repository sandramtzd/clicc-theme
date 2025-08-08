<?php
// This is the news section template part, now using Swiper.js for the carousel.
?>

<section id="news-section" class="section">
    <h2 class="section-title">News</h2>
    <div class="container">
        
        <div class="swiper news-swiper">
            <div class="swiper-wrapper">
                <?php
                // Query to fetch ALL posts for the carousel
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1, // This will fetch all posts
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );

                $news_query = new WP_Query($args);

                // Check if there are posts to display
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                        <div class="swiper-slide">
                            <div class="news-card">
                                <a href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title_attribute(); ?>">
                                    <div class="news-card-image">
                                        <?php
                                        // Display the post thumbnail or a placeholder
                                        if (has_post_thumbnail()) :
                                            the_post_thumbnail('medium', array('class' => 'post-thumbnail')); 
                                        else :
                                            ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="placeholder-icon">
                                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                                <polyline points="21 15 16 10 5 21"></polyline>
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <div class="news-card-content">
                                    <h3 class="news-card-title"><?php the_title(); ?></h3>
                                    <div class="news-card-meta">
                                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                    </div>
                                    <div class="news-card-excerpt">
                                        <?php
                                        echo wp_trim_words(get_the_excerpt(), 25, '...');
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
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p class="no-posts-message">No news available at the moment. Please check back later.</p>
                <?php endif; ?>
            </div> 
            
            <div class="swiper-pagination"></div>
        </div>
        
    </div>
</section>