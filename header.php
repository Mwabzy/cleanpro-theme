<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="header-inner">

    <!-- Logo -->
    <?php if ( has_custom_logo() ) : ?>
      <div class="site-logo site-logo--image">
        <?php the_custom_logo(); ?>
      </div>
    <?php else : ?>
      <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo">
        <div class="logo-icon">&#x1F9F9;</div>
        <div class="logo-text">
          WestFlush
          <span>Cleaning &amp; Fumigation</span>
        </div>
      </a>
    <?php endif; ?>

    <!-- Desktop Nav -->
    <ul class="desktop-nav">
      <li><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></li>
      <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Services</a></li>
      <li><a href="<?php echo esc_url( home_url('/#pricing') ); ?>">Pricing</a></li>
      <li><a href="<?php echo esc_url( home_url('/#contact') ); ?>">Contact</a></li>
    </ul>

    <!-- Header CTA -->
    <div class="header-cta">
      <a href="tel:+254721885666" class="btn-call">
        &#128222; Call Us
      </a>
      <a href="<?php echo esc_url( home_url('/#contact') ); ?>" class="btn btn-primary">
        Book Now
      </a>
    </div>

    <!-- Hamburger -->
    <button class="hamburger" id="hamburger" aria-label="Toggle menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div><!-- .header-inner -->
</header><!-- .site-header -->

<!-- Mobile Nav -->
<nav class="mobile-nav" id="mobile-nav" aria-label="Mobile Navigation">
  <ul>
    <li><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></li>
    <li><a href="<?php echo esc_url( home_url('/#services') ); ?>">Services</a></li>
    <li><a href="<?php echo esc_url( home_url('/#pricing') ); ?>">Pricing</a></li>
    <li><a href="<?php echo esc_url( home_url('/#contact') ); ?>">Contact</a></li>
  </ul>
</nav>
