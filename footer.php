<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">

      <!-- Brand -->
      <div class="footer-brand">
        <div class="footer-logo">
          <?php if ( has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
          <?php else : ?>
            <div class="logo-icon">&#x1F9F9;</div>
            <div class="logo-text">
              WestFlush
              <span>Cleaning &amp; Fumigation</span>
            </div>
          <?php endif; ?>
        </div>
        <p>Professional cleaning and fumigation services you can trust. Serving Nairobi and surrounding areas with excellence and reliability.</p>
      </div>

      <!-- Services -->
      <div class="footer-col">
        <h4>Services</h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Deep Cleaning</a></li>
          <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">General Cleaning</a></li>
          <li><a href="<?php echo esc_url( home_url('/#pricing') ); ?>">Fumigation</a></li>
          <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Mattress Cleaning</a></li>
          <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Carpet Cleaning</a></li>
          <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Bed Frame Cleaning</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="footer-col">
        <h4>Contact</h4>
        <ul>
          <li><a href="tel:+254721885666">&#128222; +254 721 885 666</a></li>
          <li><a href="https://wa.me/254721885666">&#128172; WhatsApp Us</a></li>
          <li><a href="mailto:westflushfumigatorscleaners@gmail.com">&#9993; westflushfumigatorscleaners@gmail.com</a></li>
          <li><a href="#">&#128205; Nairobi, Kenya</a></li>
        </ul>
      </div>

    </div><!-- .footer-grid -->

    <div class="footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> WestFlush Services. All rights reserved.</span>
      <span>Created by Mwabzy Lasso : 0790848063</span>
    </div>
  </div><!-- .container -->
</footer>

<!-- Scroll to Top -->
<button class="scroll-top" id="scroll-top" aria-label="Scroll to top">&#8679;</button>

<?php wp_footer(); ?>
</body>
</html>
