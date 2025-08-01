<footer id="site-footer">
  <section class="accreditation">
    <h3>Accredited by</h3>
    <div class="logos">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/care-inspectorate.png" alt="Care Inspectorate">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/soscn.svg" alt="SOSCN">
    </div>
  </section>

  <section class="footer-links">
    <div class="column">
      <h4 class="sitemap">Sitemap</h4>
      <ul>
        <li><a href="<?php echo get_permalink( get_page_by_path('clubs') ); ?>">Clubs</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path('services') ); ?>">Services</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path('news') ); ?>">News</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path('contact') ); ?>">Contact us</a></li>
      </ul>
    </div>
    <div class="column">
      <h4 class="company">Company</h4>
      <ul>
        <li><a href="<?php echo get_permalink( get_page_by_path('about') ); ?>">About us</a></li>
      </ul>
    </div>
    <div class="column">
      <h4 class="useful-links">Useful Links</h4>
      <ul>
        <li><a href="https://www.careinspectorate.com/" target="_blank" rel="noopener noreferrer">Care Inspectorate</a></li>
        <li><a href="https://soscn.org/" target="_blank" rel="noopener noreferrer">SOSCN</a></li>
      </ul>
    </div>
    <div class="column">
      <h4 class="legal">Legal</h4>
      <ul>
        <li><a href="#">Privacy Notice</a></li>
        <li><a href="#">Privacy Policy</a></li>
      </ul>
    </div>
  </section>

  <div class="footer-contact-us">
    <h4>Contact Us</h4>
    <div class="contact-details">
      Community Link Childcare<br>
      178 Holburn Street, Third Floor,<br>
      Aberdeen, AB10 6DA<br>
      <a href="mailto:info@communitylinkchildcare.org.uk">info@communitylinkchildcare.org.uk</a><br>
      <a href="tel:01224443880">01224 443 880</a>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="registers">
      Registered in Scotland as<br>
      CLICC Ltd Company No. SC240746<br>
      Scottish Charity No. SC034840
    </div>
    <div class="site-by">
      ©2025 Community Link Childcare. All rights reserved.<br>
      Site by <strong>Sandra Martínez Domínguez<strong>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>