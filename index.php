<?php
/**
 * Fallback template — WordPress requires this file.
 */
get_header();
?>

<main style="padding: 80px 0; text-align:center;">
  <div class="container">
    <h1 style="font-size:2rem;margin-bottom:16px;">Welcome to CleanPro Services</h1>
    <p style="color:#6B7280;margin-bottom:24px;">Professional cleaning and fumigation in Nairobi.</p>
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-primary">Go to Homepage</a>
  </div>
</main>

<?php get_footer(); ?>
