<?php
// This is the services section template part

// Get the content of the Services page
$services_page = get_page_by_path('services');
if ($services_page) :
    $services_content = apply_filters('the_content', $services_page->post_content);

    // Use regular expressions to find all wp-block-media-text blocks
    preg_match_all('/<div class="wp-block-media-text__content">(.*?)<\/div>/s', $services_content, $matches);

    // Define an array of classes for the card colors
    $card_colors = ['service-consulting', 'service-pvg', 'service-pool', 'service-creche'];
    $color_index = 0;

    if (!empty($matches[1])) :
?>

<section id="services-section" class="section">
  <h2 class="section-title">Services</h2>

  <div class="services-scroll-container">
    <div class="services-grid">

      <?php foreach ($matches[1] as $service_block) :
          // Get the title and paragraph
          preg_match('/<h2.*?>(.*?)<\/h2>/s', $service_block, $title_match);
          preg_match('/<p.*?>(.*?)<\/p>/s', $service_block, $p_match);
          
          $title = isset($title_match[1]) ? strip_tags($title_match[1]) : '';
          $paragraph = isset($p_match[1]) ? strip_tags($p_match[1]) : '';
          
          // Get the button link
          preg_match('/<a.*?href="(.*?)".*?>(.*?)<\/a>/s', $service_block, $button_match);
          $button_link = isset($button_match[1]) ? $button_match[1] : '';
          $button_text = isset($button_match[2]) ? $button_match[2] : 'Read More';

          // Set the card color class
          $card_class = $card_colors[$color_index % count($card_colors)];
          $color_index++;
      ?>

      <div class="service-card <?php echo esc_attr($card_class); ?>">
        <h3><?php echo esc_html($title); ?></h3>
        <p><?php echo esc_html($paragraph); ?></p>
        <a href="<?php echo esc_url($button_link); ?>" class="btn"><?php echo esc_html($button_text); ?></a>
      </div>

      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php 
    endif;
endif;
?>
