<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="custom-contact-form" novalidate>
  <input type="hidden" name="action" value="submit_contact_form">
  <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

  <div class="form-group">
    <input type="text" name="first_name" placeholder="Name" required>
    <input type="text" name="last_name" placeholder="Surname" required>
  </div>

  <input type="email" name="email" placeholder="Email address" required>
  <textarea name="message" placeholder="Message" rows="5" required></textarea>

  <!-- Google reCAPTCHA -->
  <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>"></div>

  <button type="submit">Submit</button>
</form>

<!-- Load reCAPTCHA JS -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>