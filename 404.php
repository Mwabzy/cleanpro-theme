<?php get_header(); ?>

<main style="padding:100px 0;text-align:center;">
  <div class="container">
    <div style="font-size:5rem;margin-bottom:16px;">&#x1F9F9;</div>
    <h1 style="font-size:2.5rem;font-weight:800;margin-bottom:12px;">Page Not Found</h1>
    <p style="color:#6B7280;margin-bottom:28px;">Oops — looks like this page got cleaned away!</p>
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-primary">Back to Home</a>
  </div>
</main>

<?php get_footer(); ?>
