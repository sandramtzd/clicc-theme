<?php
/*
 * Template Name: About Us
 */
get_header();
get_template_part('template-parts/hero');
?>

<section id="page-about" class="section">
  <div class="container">
    <?php
      while (have_posts()) : the_post();
        // Load block content
        $blocks = parse_blocks(get_the_content());

        // First loop: Render 3-column block only
        foreach ($blocks as $block) {
          if (
            isset($block['blockName']) &&
            $block['blockName'] === 'core/columns'
          ) {
            echo apply_filters('the_content', render_block($block));
          }
        }

        // Second loop: Render remaining blocks (e.g., call to action group)
        echo '<div class="cta-group">';
        foreach ($blocks as $block) {
          if (
            isset($block['blockName']) &&
            $block['blockName'] !== 'core/columns'
          ) {
            echo apply_filters('the_content', render_block($block));
          }
        }
        echo '</div>';

      endwhile;
    ?>
  </div>
</section>

<?php get_footer(); ?>