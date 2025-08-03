<?php
// This is the services section template part
?>
<section class="services-section">
  <h2 class="section-title">Services</h2>
  <div class="scroll-arrows">
    <button class="scroll-left" aria-label="Scroll Left">←</button>
    <button class="scroll-right" aria-label="Scroll Right">→</button>
  </div>

  <div class="services-scroll-container">
    <div class="services-grid">
      <div class="service-card service-consulting">
        <h3>Consulting Services</h3>
        <p>We provide a full range of support and consultancy services for childcare professionals and businesses to ensure that they are meeting statutory requirements.</p>
        <a href="<?php echo get_permalink( get_page_by_path('contact') ); ?>" class="btn">Contact Us</a>
      </div>
      <div class="service-card service-pvg">
        <h3>PVG Scheme Record</h3>
        <p>Community Link Childcare is registered with PVG Scheme record to process enhanced disclosures for childcare employees.</p>
        <a href="<?php echo get_permalink( get_page_by_path('contact') ); ?>" class="btn">Contact Us</a>
      </div>
      <div class="service-card service-pool">
        <h3>Relief Pool of Flexible Childcare Staff</h3>
        <p>As part of our services for childcare providers we operate a flexible relief pool of childcare staff who are registered to work in any childcare setting.</p>
        <a href="<?php echo get_permalink( get_page_by_path('contact') ); ?>" class="btn">Contact Us</a>
      </div>
      <div class="service-card service-creche">
        <h3>Crèche Services</h3>
        <p>Each crèche package can be tailored to suit your wedding or event. We can also organise refreshments and baby change facilities so that you are free to completely enjoy your day.</p>
        <a href="<?php echo get_permalink( get_page_by_path('contact') ); ?>" class="btn">Contact Us</a>
      </div>
  
    </div>
  </div>
</section>