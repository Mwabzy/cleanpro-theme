/* WestFlush Services — Main JS */

document.addEventListener('DOMContentLoaded', function () {

  /* ── Mobile nav toggle ── */
  const hamburger = document.getElementById('hamburger');
  const mobileNav = document.getElementById('mobile-nav');

  if (hamburger && mobileNav) {
    hamburger.addEventListener('click', function () {
      mobileNav.classList.toggle('active');
    });

    document.addEventListener('click', function (e) {
      if (!hamburger.contains(e.target) && !mobileNav.contains(e.target)) {
        mobileNav.classList.remove('active');
      }
    });
  }

  /* ── Services tabs ── */
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-panel');

  tabBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      tabBtns.forEach(function (b) { b.classList.remove('active'); });
      tabPanels.forEach(function (p) { p.classList.remove('active'); });
      btn.classList.add('active');
      const target = btn.dataset.tab;
      const panel = document.getElementById(target);
      if (panel) panel.classList.add('active');
    });
  });

  /* ── Scroll to top ── */
  const scrollBtn = document.getElementById('scroll-top');

  if (scrollBtn) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 400) {
        scrollBtn.classList.add('visible');
      } else {
        scrollBtn.classList.remove('visible');
      }
    });

    scrollBtn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ── Smooth scroll for anchor links ── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        if (mobileNav) mobileNav.classList.remove('active');
      }
    });
  });

  /* ── Contact form submission ── */
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var name     = contactForm.querySelector('[name="name"]').value.trim();
      var phone    = contactForm.querySelector('[name="phone"]').value.trim();
      var service  = contactForm.querySelector('[name="service"]').value.trim();
      var location = contactForm.querySelector('[name="location"]').value.trim();
      var message  = contactForm.querySelector('[name="message"]').value.trim();

      var text = 'Hello WestFlush! I would like to make an enquiry.\n\n'
        + 'Name: ' + name + '\n'
        + 'Phone: ' + phone + '\n'
        + 'Service: ' + service + '\n'
        + 'Location: ' + location + '\n'
        + (message ? 'Details: ' + message : '');

      window.open('https://wa.me/254721885666?text=' + encodeURIComponent(text), '_blank');
      contactForm.reset();
    });
  }

  /* ── Hero carousel ── */
  const heroCarousel = document.querySelector('.hero-carousel');
  if (heroCarousel) {
    const track = heroCarousel.querySelector('.carousel-track');
    const slides = heroCarousel.querySelectorAll('.carousel-slide');
    const dots = heroCarousel.querySelectorAll('.carousel-dot');
    const prevBtn = heroCarousel.querySelector('.carousel-btn.prev');
    const nextBtn = heroCarousel.querySelector('.carousel-btn.next');
    let current = 0;
    let autoTimer;

    function goTo(index) {
      current = (index + slides.length) % slides.length;
      track.style.transform = 'translateX(-' + (current * 100) + '%)';
      dots.forEach(function (d, i) { d.classList.toggle('active', i === current); });
    }

    function startAuto() {
      autoTimer = setInterval(function () { goTo(current + 1); }, 4500);
    }

    function stopAuto() {
      clearInterval(autoTimer);
    }

    prevBtn.addEventListener('click', function () { stopAuto(); goTo(current - 1); startAuto(); });
    nextBtn.addEventListener('click', function () { stopAuto(); goTo(current + 1); startAuto(); });
    dots.forEach(function (dot, i) {
      dot.addEventListener('click', function () { stopAuto(); goTo(i); startAuto(); });
    });

    startAuto();
  }

  /* ── Booking modal ── */
  const bookingModal = document.getElementById('booking-modal');
  if (bookingModal) {
    const openBtns = document.querySelectorAll('[data-open-modal="booking"]');

    function openModal() {
      bookingModal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      bookingModal.classList.remove('active');
      document.body.style.overflow = '';
    }

    openBtns.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        openModal();
      });
    });

    bookingModal.querySelector('.modal-close').addEventListener('click', closeModal);

    bookingModal.addEventListener('click', function (e) {
      if (e.target === bookingModal) closeModal();
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeModal();
    });

    /* ── Modal form submission ── */
    const modalForm = document.getElementById('modal-booking-form');
    if (modalForm) {
      modalForm.addEventListener('submit', function (e) {
        e.preventDefault();
        var name     = modalForm.querySelector('[name="name"]').value.trim();
        var phone    = modalForm.querySelector('[name="phone"]').value.trim();
        var service  = modalForm.querySelector('[name="service"]').value.trim();
        var location = modalForm.querySelector('[name="location"]').value.trim();
        var message  = modalForm.querySelector('[name="message"]').value.trim();

        var text = 'Hello WestFlush! I would like to make an enquiry.\n\n'
          + 'Name: ' + name + '\n'
          + 'Phone: ' + phone + '\n'
          + 'Service: ' + service + '\n'
          + 'Location: ' + location + '\n'
          + (message ? 'Details: ' + message : '');

        window.open('https://wa.me/254721885666?text=' + encodeURIComponent(text), '_blank');
        modalForm.reset();
        closeModal();
      });
    }
  }

});
