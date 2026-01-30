(function () {
  function ready(fn) {
    if (document.readyState !== 'loading') {
      fn();
    } else {
      document.addEventListener('DOMContentLoaded', fn);
    }
  }

  ready(function () {
    var header = document.querySelector('[data-scls-header]');
    var menuToggle = document.querySelector('[data-scls-menu-toggle]');
    var mobileMenu = document.querySelector('[data-scls-mobile-menu]');

    if (header) {
      var onScroll = function () {
        if (window.scrollY > 50) {
          header.classList.add('is-scrolled');
        } else {
          header.classList.remove('is-scrolled');
        }
      };
      window.addEventListener('scroll', onScroll);
      onScroll();
    }

    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', function () {
        var isOpen = menuToggle.classList.toggle('is-open');
        mobileMenu.classList.toggle('is-open', isOpen);
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });
    }

    document.querySelectorAll('[data-scroll-target]').forEach(function (button) {
      button.addEventListener('click', function () {
        var target = button.getAttribute('data-scroll-target');
        if (!target) {
          return;
        }
        var el = document.querySelector(target);
        if (el) {
          var offset = header ? header.offsetHeight : 0;
          var top = el.getBoundingClientRect().top + window.scrollY - offset;
          window.scrollTo({ top: top, behavior: 'smooth' });
        }
        if (menuToggle && mobileMenu) {
          menuToggle.classList.remove('is-open');
          mobileMenu.classList.remove('is-open');
          menuToggle.setAttribute('aria-expanded', 'false');
        }
      });
    });

    var counters = document.querySelectorAll('[data-scls-counter]');
    if (counters.length) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) {
            return;
          }
          var el = entry.target;
          if (el.getAttribute('data-counted') === 'true') {
            return;
          }
          el.setAttribute('data-counted', 'true');
          var endValue = parseFloat(el.getAttribute('data-value') || '0');
          var duration = 2000;
          var start = null;

          function step(timestamp) {
            if (!start) {
              start = timestamp;
            }
            var progress = Math.min((timestamp - start) / duration, 1);
            var current = Math.floor(endValue * progress);
            el.textContent = current;
            if (progress < 1) {
              window.requestAnimationFrame(step);
            }
          }

          window.requestAnimationFrame(step);
        });
      }, { threshold: 0.6 });

      counters.forEach(function (counter) {
        observer.observe(counter);
      });
    }

  });
})();
