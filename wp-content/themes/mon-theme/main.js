(function() {
  "use strict";

  // Wait until the DOM is fully loaded
  document.addEventListener("DOMContentLoaded", function() {

    // --------------------------------------
    // Header toggle functionality
    // --------------------------------------
    const headerToggleBtn = document.querySelector('.header-toggle');
    if (headerToggleBtn) {
      function headerToggle() {
        const header = document.querySelector('#header');
        if (header) {
          header.classList.toggle('header-show');
          headerToggleBtn.classList.toggle('bi-list');
          headerToggleBtn.classList.toggle('bi-x');
        }
      }
      headerToggleBtn.addEventListener('click', headerToggle);
    }

    // --------------------------------------
    // Hide mobile nav on same-page/hash links
    // --------------------------------------
    const navLinks = document.querySelectorAll('#navmenu a');
    navLinks.forEach(navmenu => {
      navmenu.addEventListener('click', () => {
        const headerShow = document.querySelector('.header-show');
        if (headerShow) {
          headerToggle();
        }
      });
    });

    // --------------------------------------
    // Toggle mobile nav dropdowns
    // --------------------------------------
    const navDropdowns = document.querySelectorAll('.navmenu .toggle-dropdown');
    navDropdowns.forEach(navmenu => {
      navmenu.addEventListener('click', function(e) {
        e.preventDefault();
        const parentNode = this.parentNode;
        parentNode.classList.toggle('active');
        const nextSibling = parentNode.nextElementSibling;
        if (nextSibling) {
          nextSibling.classList.toggle('dropdown-active');
        }
        e.stopImmediatePropagation();
      });
    });

    // --------------------------------------
    // Preloader
    // --------------------------------------
    const preloader = document.querySelector('#preloader');
    if (preloader) {
      window.addEventListener('load', () => {
        preloader.remove();
      });
    }

    // --------------------------------------
    // Scroll top button functionality
    // --------------------------------------
    const scrollTop = document.querySelector('.scroll-top');
    if (scrollTop) {
      function toggleScrollTop() {
        if (window.scrollY > 100) {
          scrollTop.classList.add('active');
        } else {
          scrollTop.classList.remove('active');
        }
      }
      scrollTop.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });

      window.addEventListener('load', toggleScrollTop);
      document.addEventListener('scroll', toggleScrollTop);
    }

    // --------------------------------------
    // AOS Animation on Scroll
    // --------------------------------------
    if (typeof AOS !== 'undefined') {
      function aosInit() {
        AOS.init({
          duration: 600,
          easing: 'ease-in-out',
          once: true,
          mirror: false
        });
      }
      window.addEventListener('load', aosInit);
    }

    // --------------------------------------
    // Initialize Typed.js (Text typing effect)
    // --------------------------------------
    const selectTyped = document.querySelector('.typed');
    if (selectTyped) {
      let typed_strings = selectTyped.getAttribute('data-typed-items');
      typed_strings = typed_strings ? typed_strings.split(',') : [];
      if (typed_strings.length > 0) {
        new Typed('.typed', {
          strings: typed_strings,
          loop: true,
          typeSpeed: 100,
          backSpeed: 50,
          backDelay: 2000
        });
      }
    }

    // --------------------------------------
    // Initialize Pure Counter (if available)
    // --------------------------------------
    if (typeof PureCounter !== 'undefined') {
      new PureCounter();
    }

    // --------------------------------------
    // Animate skills items on reveal
    // --------------------------------------
    const skillsAnimation = document.querySelectorAll('.skills-animation');
    skillsAnimation.forEach((item) => {
      new Waypoint({
        element: item,
        offset: '80%',
        handler: function(direction) {
          const progressBars = item.querySelectorAll('.progress .progress-bar');
          progressBars.forEach(el => {
            el.style.width = el.getAttribute('aria-valuenow') + '%';
          });
        }
      });
    });

    // --------------------------------------
    // Initialize GLightbox
    // --------------------------------------
    if (typeof GLightbox !== 'undefined') {
      const glightbox = GLightbox({
        selector: '.glightbox'
      });
    }

    // --------------------------------------
    // Initialize Isotope Layout and Filters
    // --------------------------------------
    const isotopeItems = document.querySelectorAll('.isotope-layout');
    isotopeItems.forEach(function(isotopeItem) {
      const layout = isotopeItem.getAttribute('data-layout') || 'masonry';
      const filter = isotopeItem.getAttribute('data-default-filter') || '*';
      const sort = isotopeItem.getAttribute('data-sort') || 'original-order';

      let initIsotope;
      imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
        initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
          itemSelector: '.isotope-item',
          layoutMode: layout,
          filter: filter,
          sortBy: sort
        });
      });

      isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
        filters.addEventListener('click', function() {
          isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
          this.classList.add('filter-active');
          initIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          if (typeof aosInit === 'function') {
            aosInit();
          }
        }, false);
      });
    });

    // --------------------------------------
    // Initialize Swiper Sliders
    // --------------------------------------
    function initSwiper() {
      document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
        const config = JSON.parse(
          swiperElement.querySelector(".swiper-config").innerHTML.trim()
        );

        if (swiperElement.classList.contains("swiper-tab")) {
          initSwiperWithCustomPagination(swiperElement, config);
        } else {
          new Swiper(swiperElement, config);
        }
      });
    }

    window.addEventListener("load", initSwiper);

    // --------------------------------------
    // Scroll to correct position for hash links
    // --------------------------------------
    window.addEventListener('load', function(e) {
      if (window.location.hash) {
        const section = document.querySelector(window.location.hash);
        if (section) {
          setTimeout(() => {
            const scrollMarginTop = getComputedStyle(section).scrollMarginTop;
            window.scrollTo({
              top: section.offsetTop - parseInt(scrollMarginTop),
              behavior: 'smooth'
            });
          }, 100);
        }
      }
    });

    // --------------------------------------
    // Navmenu Scrollspy
    // --------------------------------------
    const navmenulinks = document.querySelectorAll('.navmenu a');
    function navmenuScrollspy() {
      navmenulinks.forEach(navmenulink => {
        if (!navmenulink.hash) return;
        const section = document.querySelector(navmenulink.hash);
        if (!section) return;
        const position = window.scrollY + 200;
        if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
          document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
          navmenulink.classList.add('active');
        } else {
          navmenulink.classList.remove('active');
        }
      });
    }

    window.addEventListener('load', navmenuScrollspy);
    document.addEventListener('scroll', navmenuScrollspy);

  });
})();
