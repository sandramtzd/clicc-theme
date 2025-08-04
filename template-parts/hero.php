<section id="hero-section" class="hero-section">
  <?php if (has_post_thumbnail()) : ?>
    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> background" class="hero-bg">
  <?php else : ?>
    <img src="<?php echo get_theme_file_uri('/assets/images/hero.png'); ?>" alt="Default background" class="hero-bg">
  <?php endif; ?>
  
  <div class="hero-overlay">
    <div class="container">
      <?php if (is_front_page()) : ?>
        <h1>Community Link <br> Childcare</h1>
      <?php else : ?>
        <h1><?php the_title(); ?></h1>
      <?php endif; ?>

      <?php if (get_field('hero_subheading')) : ?>
        <h2><?php the_field('hero_subheading'); ?></h2>
      <?php endif; ?>

      <?php if (get_field('hero_tagline')) : ?>
        <h3><?php the_field('hero_tagline'); ?></h3>
      <?php endif; ?>
    </div>
  </div>
</section>