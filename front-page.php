<?php get_header(); ?>

<!-- ══════════════════════════════════════════
     HERO
══════════════════════════════════════════ -->
<section class="hero">
  <div class="container">
    <div class="hero-inner">

      <div class="hero-content">
        <div class="hero-badge">
          &#10003; Trusted &bull; Professional &bull; Affordable
        </div>
        <h1>
          Expert <em>Cleaning</em> &amp;<br>
          <em>Fumigation</em> Services
        </h1>
        <p class="hero-desc">
          From deep cleaning your home to professional pest fumigation — we deliver spotless results every time. Serving Nairobi with pride.
        </p>
        <div class="hero-btns">
          <button class="btn btn-primary" data-open-modal="booking" style="padding:14px 28px;font-size:1rem;">
            &#128222;&nbsp; Book a Service
          </button>
          <a href="#services" class="btn btn-white" style="padding:14px 28px;font-size:1rem;">
            View Pricing
          </a>
        </div>
        <div class="hero-stats">
          <div class="stat-item">
            <strong>500+</strong>
            <span>Happy Clients</span>
          </div>
          <div class="stat-item">
            <strong>5&#9733;</strong>
            <span>Avg. Rating</span>
          </div>
          <div class="stat-item">
            <strong>Same Day</strong>
            <span>Booking</span>
          </div>
        </div>
      </div><!-- .hero-content -->

      <?php
        $hero_slides = array(
          1 => array(
            'icon'    => '&#x1F9F9;',
            'title'   => 'Professional Deep Cleaning',
            'desc'    => 'Spotless results for homes &amp; offices across Nairobi',
            'fallback'=> 'linear-gradient(135deg, #0a2463 0%, #1565C0 100%)',
          ),
          2 => array(
            'icon'    => '&#x1F41E;',
            'title'   => 'Certified Fumigation',
            'desc'    => 'Safe, effective pest control for every home &amp; business',
            'fallback'=> 'linear-gradient(135deg, #1B5E20 0%, #2E7D32 100%)',
          ),
          3 => array(
            'icon'    => '&#x23F0;',
            'title'   => 'Same-Day Booking Available',
            'desc'    => '500+ happy clients &amp; 5&#9733; average rating',
            'fallback'=> 'linear-gradient(135deg, #0D1B2A 0%, #1a3a6b 100%)',
          ),
        );
      ?>
      <div class="hero-carousel">
        <div class="carousel-track">

          <?php
            $carousel_imgs = get_option( 'westflush_hero_slides', array() );
            foreach ( $hero_slides as $i => $slide ) :
            $img_id  = isset( $carousel_imgs[ $i ] ) ? (int) $carousel_imgs[ $i ] : 0;
            $img_url = $img_id ? wp_get_attachment_image_url( $img_id, 'large' ) : '';
            if ( $img_url ) {
              $bg_style = 'background-image: url(\'' . esc_url( $img_url ) . '\'); background-size: cover; background-position: center;';
            } else {
              $bg_style = 'background: ' . $slide['fallback'] . ';';
            }
          ?>
          <div class="carousel-slide" style="<?php echo $bg_style; ?>">
            <?php if ( ! $img_url ) : ?>
            <div class="slide-visual"><?php echo $slide['icon']; ?></div>
            <?php endif; ?>
            <div class="slide-content">
              <h3><?php echo $slide['title']; ?></h3>
              <p><?php echo $slide['desc']; ?></p>
            </div>
          </div>
          <?php endforeach; ?>

        </div><!-- .carousel-track -->

        <div class="carousel-nav">
          <button class="carousel-btn prev" aria-label="Previous slide">&#8592;</button>
          <div class="carousel-dots">
            <span class="carousel-dot active"></span>
            <span class="carousel-dot"></span>
            <span class="carousel-dot"></span>
          </div>
          <button class="carousel-btn next" aria-label="Next slide">&#8594;</button>
        </div>

      </div><!-- .hero-carousel -->

    </div><!-- .hero-inner -->
  </div><!-- .container -->
</section><!-- .hero -->


<!-- ══════════════════════════════════════════
     TRUST BAR
══════════════════════════════════════════ -->
<div class="trust-bar">
  <div class="container">
    <div class="trust-inner">
      <div class="trust-item">&#10003;&nbsp; Fully Insured</div>
      <div class="trust-item">&#10003;&nbsp; Background-checked Staff</div>
      <div class="trust-item">&#10003;&nbsp; Eco-Friendly Products</div>
      <div class="trust-item">&#10003;&nbsp; Same-Day Booking Available</div>
      <div class="trust-item">&#10003;&nbsp; Satisfaction Guaranteed</div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SERVICES & PRICING
══════════════════════════════════════════ -->
<section class="services-section" id="services">
  <div class="container">

    <div class="section-head">
      <span class="section-label">What We Do</span>
      <h2 class="section-title">Our Cleaning Services</h2>
      <p class="section-desc">Transparent, affordable pricing for every home type. No hidden charges.</p>
    </div>

    <!-- Tab buttons -->
    <div class="services-tabs">
      <button class="tab-btn active" data-tab="tab-deep">&#x1F9FC; Deep Cleaning</button>
      <button class="tab-btn" data-tab="tab-general">&#x1F9F9; General Cleaning</button>
      <button class="tab-btn" data-tab="tab-extras">&#x2728; Add-Ons</button>
    </div>

    <!-- TAB: Deep Cleaning -->
    <div class="tab-panel active" id="tab-deep">
      <div class="services-grid">

        <div class="service-card">
          <div class="card-icon">&#x1F3E0;</div>
          <h3>Studio Apartment</h3>
          <p>Full deep clean for studio units including bathrooms, kitchen, and living areas.</p>
          <div class="price-row">
            <div>
              <span class="price-label">Empty</span>
              <span class="price-tag">KES 4,500</span>
            </div>
            <div>
              <span class="price-label">Occupied</span>
              <span class="price-tag occupied">KES 5,000</span>
            </div>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F6CF;</div>
          <h3>1 Bedroom Apartment</h3>
          <p>Comprehensive deep cleaning for 1-bed units. All surfaces, fixtures, and appliances.</p>
          <div class="price-row">
            <div>
              <span class="price-label">Empty</span>
              <span class="price-tag">KES 5,000</span>
            </div>
            <div>
              <span class="price-label">Occupied</span>
              <span class="price-tag occupied">KES 6,000</span>
            </div>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3E1;</div>
          <h3>2 Bedroom Apartment</h3>
          <p>Deep clean for 2-bed apartments including all rooms, bathrooms, and common areas.</p>
          <div class="price-row">
            <div>
              <span class="price-label">Empty</span>
              <span class="price-tag">KES 7,500</span>
            </div>
            <div>
              <span class="price-label">Occupied</span>
              <span class="price-tag occupied">KES 8,500</span>
            </div>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3D8;</div>
          <h3>3 Bedroom Apartment</h3>
          <p>Full deep clean for 3-bed units. Thorough cleaning of all rooms and spaces.</p>
          <div class="price-row">
            <div>
              <span class="price-label">Empty</span>
              <span class="price-tag">KES 12,000</span>
            </div>
            <div>
              <span class="price-label">Occupied</span>
              <span class="price-tag occupied">KES 13,500</span>
            </div>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3D9;</div>
          <h3>4 Bedroom Apartment</h3>
          <p>Deep cleaning for larger 4-bedroom apartments and townhouses.</p>
          <div class="price-row">
            <div>
              <span class="price-label">Empty</span>
              <span class="price-tag">KES 15,000</span>
            </div>
            <div>
              <span class="price-label">Occupied</span>
              <span class="price-tag occupied">KES 16,500</span>
            </div>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3F0;</div>
          <h3>5 Bedroom Apartment</h3>
          <p>Our largest deep clean package for spacious 5-bedroom units and mansions.</p>
          <div class="price-row">
            <div>
              <span class="price-label">Empty</span>
              <span class="price-tag">KES 18,500</span>
            </div>
            <div>
              <span class="price-label">Occupied</span>
              <span class="price-tag occupied">KES 20,500</span>
            </div>
          </div>
        </div>

      </div><!-- .services-grid -->
    </div><!-- #tab-deep -->


    <!-- TAB: General Cleaning -->
    <div class="tab-panel" id="tab-general">
      <div class="services-grid">

        <div class="service-card">
          <div class="card-icon">&#x1F3E0;</div>
          <h3>Studio Apartment</h3>
          <p>Regular maintenance cleaning for studio units.</p>
          <div class="price-row">
            <span class="price-tag">KES 900</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F6CF;</div>
          <h3>1 Bedroom</h3>
          <p>General cleaning for 1-bed apartments.</p>
          <div class="price-row">
            <span class="price-tag">KES 1,200</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3E1;</div>
          <h3>2 Bedroom</h3>
          <p>Regular clean for 2-bedroom apartments.</p>
          <div class="price-row">
            <span class="price-tag">KES 1,800</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3D8;</div>
          <h3>3 Bedroom</h3>
          <p>General cleaning for 3-bed units.</p>
          <div class="price-row">
            <span class="price-tag">KES 2,500</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3D9;</div>
          <h3>4 Bedroom</h3>
          <p>Regular maintenance for 4-bed apartments.</p>
          <div class="price-row">
            <span class="price-tag">KES 3,500</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F3F0;</div>
          <h3>5 Bedroom</h3>
          <p>General cleaning for large 5-bed units.</p>
          <div class="price-row">
            <span class="price-tag">KES 4,500</span>
          </div>
        </div>

      </div><!-- .services-grid -->
    </div><!-- #tab-general -->


    <!-- TAB: Add-Ons / Extras -->
    <div class="tab-panel" id="tab-extras">
      <div class="services-grid">

        <div class="service-card">
          <div class="card-icon">&#x1F6CB;</div>
          <h3>Mattress Cleaning</h3>
          <p>Professional steam and deep cleaning for mattresses of all sizes.</p>
          <div class="price-row">
            <div>
              <span class="price-label">4x6</span>
              <span class="price-tag">KES 2,500</span>
            </div>
            <div>
              <span class="price-label">5x6</span>
              <span class="price-tag">KES 3,000</span>
            </div>
            <div>
              <span class="price-label">6x6</span>
              <span class="price-tag">KES 3,500</span>
            </div>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F6CF;</div>
          <h3>Bed Frame Cleaning</h3>
          <p>Thorough cleaning and sanitization of bed frames.</p>
          <div class="price-row">
            <div>
              <span class="price-label">4x6</span>
              <span class="price-tag">KES 2,000</span>
            </div>
            <div>
              <span class="price-label">5x6</span>
              <span class="price-tag">KES 2,500</span>
            </div>
            <div>
              <span class="price-label">6x6</span>
              <span class="price-tag">KES 3,000</span>
            </div>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F6CB;</div>
          <h3>Seat / Sofa Cleaning</h3>
          <p>Deep cleaning and odour removal for sofas and seats.</p>
          <div class="price-row">
            <span class="price-tag">KES 600</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F455;</div>
          <h3>Laundry Service</h3>
          <p>Professional laundry and garment care service.</p>
          <div class="price-row">
            <span class="price-tag">KES 650</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F9F9;</div>
          <h3>Carpet Cleaning</h3>
          <p>Per metre carpet deep cleaning and stain removal.</p>
          <div class="price-row">
            <span class="price-tag">KES 50 / m²</span>
          </div>
        </div>

        <div class="service-card">
          <div class="card-icon">&#x1F6CF;</div>
          <h3>Duvet Cleaning</h3>
          <p>Professional cleaning and freshening for duvets and comforters.</p>
          <div class="price-row">
            <span class="price-tag">KES 850</span>
          </div>
        </div>

      </div><!-- .services-grid -->
    </div><!-- #tab-extras -->

  </div><!-- .container -->
</section><!-- .services-section -->


<!-- ══════════════════════════════════════════
     VIDEO SHOWCASE
══════════════════════════════════════════ -->
<section class="videos-section" id="videos">
  <div class="container">

    <div class="section-head">
      <span class="section-label">See Us In Action</span>
      <h2 class="section-title">Watch Our Work</h2>
      <p class="section-desc">See the quality and professionalism we bring to every job.</p>
    </div>

    <div class="videos-grid">

      <?php
        $video_urls = array(
          get_theme_mod( 'video_1_url', 'https://vimeo.com/1188608377' ),
          get_theme_mod( 'video_2_url', '' ),
          get_theme_mod( 'video_3_url', '' ),
        );
        $active_videos = array_filter( $video_urls );
      ?>

      <?php if ( ! empty( $active_videos ) ) : ?>

        <?php foreach ( $video_urls as $url ) :
          if ( ! $url ) continue;

          if ( preg_match( '/vimeo\.com\/(\d+)/', $url, $vm ) ) {
            $embed_url  = 'https://player.vimeo.com/video/' . $vm[1] . '?title=0&byline=0&portrait=0';
            $allow_attr = 'autoplay; fullscreen; picture-in-picture';
          } else {
            $embed_url = preg_replace(
              '/^.*(?:youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#&?]*).*$/i',
              'https://www.youtube.com/embed/$1',
              esc_url( $url )
            );
            $allow_attr = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
          }
        ?>
        <div class="video-wrap">
          <iframe src="<?php echo esc_url( $embed_url ); ?>"
            title="WestFlush Services Video"
            frameborder="0"
            allow="<?php echo esc_attr( $allow_attr ); ?>"
            allowfullscreen>
          </iframe>
        </div>
        <?php endforeach; ?>

      <?php else : ?>

        <div class="video-placeholder">
          <div class="vp-icon">&#x25B6;</div>
          <p>Videos coming soon</p>
          <small>Add video URLs via Appearance &rarr; Customize &rarr; Video Showcase</small>
        </div>

      <?php endif; ?>

    </div><!-- .videos-grid -->

  </div><!-- .container -->
</section><!-- .videos-section -->


<!-- ══════════════════════════════════════════
     FUMIGATION
══════════════════════════════════════════ -->
<section class="fumigation-section" id="pricing">
  <div class="container">

    <div class="section-head">
      <span class="section-label">Pest Control</span>
      <h2 class="section-title">Fumigation Services</h2>
      <p class="section-desc">Certified fumigation for homes and commercial spaces. Area-based pricing across Nairobi.</p>
    </div>

    <!-- Fumigation pricing by area -->
    <div class="fumigation-grid">

      <!-- Monde pricing -->
      <div class="fumi-table-wrap">
        <h3>&#x1F4CD; Cockroach Area Pricing</h3>
        <table class="fumi-table">
          <thead>
            <tr>
              <th>House Size</th>
              <th>Price (KES)</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Bedsitter</td><td class="price-cell">2,500</td></tr>
            <tr><td>1 Bedroom</td><td class="price-cell">2,700</td></tr>
            <tr><td>2 Bedroom</td><td class="price-cell">3,200</td></tr>
            <tr><td>3 Bedroom</td><td class="price-cell">3,700</td></tr>
            <tr><td>4 Bedroom</td><td class="price-cell">4,200</td></tr>
            <tr><td>5 Bedroom</td><td class="price-cell">4,700</td></tr>
            <tr><td>Single Room</td><td class="price-cell">2,050</td></tr>
          </tbody>
        </table>
      </div>

      <!-- Kangoni / Meude View pricing -->
      <div class="fumi-table-wrap">
        <h3>&#x1F4CD; Bedbugs Pricing</h3>
        <table class="fumi-table">
          <thead>
            <tr>
              <th>House Size</th>
              <th>Bedbugs (KES)</th>
              <th>Cockroach (KES)</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Bedsitter</td><td class="price-cell">3,000</td><td class="price-cell">3,600</td></tr>
            <tr><td>1 Bedroom</td><td class="price-cell">3,200</td><td class="price-cell">4,900</td></tr>
            <tr><td>2 Bedroom</td><td class="price-cell">3,700</td><td class="price-cell">5,900</td></tr>
            <tr><td>3 Bedroom</td><td class="price-cell">4,200</td><td class="price-cell">6,900</td></tr>
            <tr><td>4 Bedroom</td><td class="price-cell">4,700</td><td class="price-cell">8,100</td></tr>
            <tr><td>5 Bedroom</td><td class="price-cell">5,700</td><td class="price-cell">9,700</td></tr>
            <tr><td>Single Room</td><td class="price-cell">2,500</td><td class="price-cell">3,200</td></tr>
          </tbody>
        </table>
      </div>

    </div><!-- .fumigation-grid -->

    <!-- Specific pest treatments -->
    <div class="section-head" style="margin-top:16px;">
      <h3 class="section-title" style="font-size:1.4rem;">Specific Pest Treatments</h3>
      <p class="section-desc">Targeted treatments for specific pest infestations.</p>
    </div>

    <div class="fumi-pests">

      <div class="pest-card">
        <div class="pest-icon">&#x1F40D;</div>
        <h4>Snakes</h4>
        <div class="pest-price">KES 4,500</div>
      </div>

      <div class="pest-card">
        <div class="pest-icon">&#x1F40C;</div>
        <h4>Snails</h4>
        <div class="pest-price">KES 3,000</div>
      </div>

      <div class="pest-card">
        <div class="pest-icon">&#x1F41C;</div>
        <h4>Termites</h4>
        <div class="pest-price">KES 7,000</div>
      </div>

      <div class="pest-card">
        <div class="pest-icon">&#x1F400;</div>
        <h4>Rodents</h4>
        <div class="pest-price">KES 2,500</div>
      </div>

      <div class="pest-card">
        <div class="pest-icon">&#x1F987;</div>
        <h4>Bats</h4>
        <div class="pest-price">KES 7,500</div>
      </div>

    </div><!-- .fumi-pests -->

  </div><!-- .container -->
</section><!-- .fumigation-section -->


<!-- ══════════════════════════════════════════
     WHY CHOOSE US
══════════════════════════════════════════ -->
<section class="why-section">
  <div class="container">

    <div class="section-head">
      <span class="section-label">Why WestFlush</span>
      <h2 class="section-title">The WestFlush Difference</h2>
      <p class="section-desc">We go beyond surface-level cleaning to deliver real results.</p>
    </div>

    <div class="why-grid">

      <div class="why-card">
        <div class="w-icon">&#x1F3C6;</div>
        <h3>Experienced Team</h3>
        <p>Our trained, vetted cleaning and fumigation professionals deliver consistent, high-quality results every visit.</p>
      </div>

      <div class="why-card">
        <div class="w-icon">&#x1F33F;</div>
        <h3>Eco-Friendly Products</h3>
        <p>We use safe, effective, environmentally conscious cleaning agents that are safe for your family and pets.</p>
      </div>

      <div class="why-card">
        <div class="w-icon">&#x23F0;</div>
        <h3>Punctual &amp; Reliable</h3>
        <p>We respect your time. Our teams arrive on schedule and complete every job thoroughly and efficiently.</p>
      </div>

      <div class="why-card">
        <div class="w-icon">&#x1F4B0;</div>
        <h3>Transparent Pricing</h3>
        <p>No hidden costs. What you see is what you pay. Competitive rates with no surprises on your invoice.</p>
      </div>

      <div class="why-card">
        <div class="w-icon">&#x1F6E1;</div>
        <h3>Fully Insured</h3>
        <p>Every job is covered. We carry full liability insurance so your property and belongings are always protected.</p>
      </div>

      <div class="why-card">
        <div class="w-icon">&#x2B50;</div>
        <h3>Satisfaction Guaranteed</h3>
        <p>Not happy with the results? We come back and make it right. Your satisfaction is our top priority.</p>
      </div>

    </div><!-- .why-grid -->
  </div><!-- .container -->
</section><!-- .why-section -->


<!-- ══════════════════════════════════════════
     CONTACT
══════════════════════════════════════════ -->
<section class="contact-section" id="contact">
  <div class="container">

    <div class="section-head">
      <span class="section-label">Get In Touch</span>
      <h2 class="section-title">Book a Service</h2>
      <p class="section-desc">Fill out the form below and we'll get back to you promptly with a quote.</p>
    </div>

    <div class="contact-grid">

      <!-- Form -->
      <div class="contact-form">
        <h3>Request a Quote</h3>
        <form id="contact-form">
          <div class="form-group">
            <label for="cf-name">Full Name *</label>
            <input type="text" id="cf-name" name="name" placeholder="Your full name" required>
          </div>
          <div class="form-group">
            <label for="cf-phone">Phone Number *</label>
            <input type="tel" id="cf-phone" name="phone" placeholder="+254 7XX XXX XXX" required>
          </div>
          <div class="form-group">
            <label for="cf-service">Service Required *</label>
            <select id="cf-service" name="service" required>
              <option value="">Select a service...</option>
              <optgroup label="Cleaning">
                <option>Deep Cleaning</option>
                <option>General Cleaning</option>
                <option>Mattress Cleaning</option>
                <option>Bed Frame Cleaning</option>
                <option>Carpet Cleaning</option>
                <option>Sofa / Seat Cleaning</option>
                <option>Laundry Service</option>
                <option>Duvet Cleaning</option>
              </optgroup>
              <optgroup label="Fumigation">
                <option>General Fumigation</option>
                <option>Snake Fumigation</option>
                <option>Termite Treatment</option>
                <option>Rodent Control</option>
                <option>Bat Removal</option>
                <option>Snail Treatment</option>
              </optgroup>
            </select>
          </div>
          <div class="form-group">
            <label for="cf-location">Location / Area *</label>
            <input type="text" id="cf-location" name="location" placeholder="e.g. Westlands, Nairobi" required>
          </div>
          <div class="form-group">
            <label for="cf-message">Additional Details</label>
            <textarea id="cf-message" name="message" placeholder="Property size, date preference, special requirements..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px;">
            &#128222;&nbsp; Send Enquiry
          </button>
        </form>
      </div><!-- .contact-form -->

      <!-- Info -->
      <div class="contact-info">
        <h3>Contact Us Directly</h3>
        <p>Prefer to speak with us directly? Reach out via phone or WhatsApp for fast booking and instant quotes.</p>

        <div class="contact-items">
          <div class="contact-item">
            <div class="ci-icon">&#128222;</div>
            <div>
              <strong>Phone / WhatsApp</strong>
              <span>+254 721 885 666</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon">&#9993;</div>
            <div>
              <strong>Email</strong>
              <span>westflushfumigatorscleaners@gmail.com</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon">&#128205;</div>
            <div>
              <strong>Location</strong>
              <span>Nairobi, Kenya &mdash; We come to you!</span>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon">&#9200;</div>
            <div>
              <strong>Working Hours</strong>
              <span>24 Hours Available, 7 Days a Week</span>
            </div>
          </div>
        </div>

        <div style="margin-top:32px;padding:24px;background:var(--blue-pale);border-radius:var(--radius);border-left:4px solid var(--blue);">
          <strong style="color:var(--blue);display:block;margin-bottom:8px;">&#x1F4AC; WhatsApp for Fast Booking</strong>
          <p style="font-size:0.88rem;color:var(--gray);margin-bottom:14px;">Send us a WhatsApp message for the quickest response and same-day bookings.</p>
          <a href="https://wa.me/254721885666?text=Hi%20WestFlush%2C%20I%20need%20a%20quote%20for..." class="btn btn-primary" style="width:100%;justify-content:center;">
            Chat on WhatsApp
          </a>
        </div>
      </div><!-- .contact-info -->

    </div><!-- .contact-grid -->
  </div><!-- .container -->
</section><!-- .contact-section -->

<!-- ══════════════════════════════════════════
     BOOKING MODAL
══════════════════════════════════════════ -->
<div class="modal-overlay" id="booking-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
  <div class="modal-box">
    <button class="modal-close" aria-label="Close modal">&times;</button>
    <h3 id="modal-title">&#128222;&nbsp; Book a Service</h3>
    <p class="modal-subtitle">Fill out the form and we'll get back to you promptly with a quote.</p>
    <form id="modal-booking-form">
      <div class="form-group">
        <label for="mb-name">Full Name *</label>
        <input type="text" id="mb-name" name="name" placeholder="Your full name" required>
      </div>
      <div class="form-group">
        <label for="mb-phone">Phone Number *</label>
        <input type="tel" id="mb-phone" name="phone" placeholder="+254 7XX XXX XXX" required>
      </div>
      <div class="form-group">
        <label for="mb-service">Service Required *</label>
        <select id="mb-service" name="service" required>
          <option value="">Select a service...</option>
          <optgroup label="Cleaning">
            <option>Deep Cleaning</option>
            <option>General Cleaning</option>
            <option>Mattress Cleaning</option>
            <option>Bed Frame Cleaning</option>
            <option>Carpet Cleaning</option>
            <option>Sofa / Seat Cleaning</option>
            <option>Laundry Service</option>
            <option>Duvet Cleaning</option>
          </optgroup>
          <optgroup label="Fumigation">
            <option>General Fumigation</option>
            <option>Snake Fumigation</option>
            <option>Termite Treatment</option>
            <option>Rodent Control</option>
            <option>Bat Removal</option>
            <option>Snail Treatment</option>
          </optgroup>
        </select>
      </div>
      <div class="form-group">
        <label for="mb-location">Location / Area *</label>
        <input type="text" id="mb-location" name="location" placeholder="e.g. Westlands, Nairobi" required>
      </div>
      <div class="form-group">
        <label for="mb-message">Additional Details</label>
        <textarea id="mb-message" name="message" placeholder="Property size, date preference, special requirements..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:14px;">
        &#128222;&nbsp; Send Enquiry
      </button>
    </form>
  </div>
</div>

<?php get_footer(); ?>
