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
    var submenuToggles = document.querySelectorAll('[data-scls-submenu-toggle]');

    var normalizeHost = function (host) {
      return (host || '').toLowerCase().replace(/^www\./, '');
    };

    var normalizePath = function (path) {
      if (!path) {
        return '/';
      }
      if (path.length > 1 && path.charAt(path.length - 1) === '/') {
        return path.slice(0, -1);
      }
      return path;
    };

    var isSamePageUrl = function (url) {
      if (!url) {
        return false;
      }
      var currentHost = normalizeHost(window.location.hostname);
      var targetHost = normalizeHost(url.hostname);
      if (currentHost !== targetHost) {
        return false;
      }
      var currentPath = normalizePath(window.location.pathname);
      var targetPath = normalizePath(url.pathname);
      if (currentPath === targetPath) {
        return true;
      }
      if (currentPath === '' || currentPath === '/') {
        return targetPath === '' || targetPath === '/' || targetPath === '/index.php';
      }
      return false;
    };

    var getScrollTarget = function (trigger) {
      if (!trigger) {
        return '';
      }
      var target = trigger.getAttribute('data-scroll-target');
      if (target) {
        return target;
      }
      if (trigger.tagName !== 'A') {
        return '';
      }
      var href = trigger.getAttribute('href') || '';
      if (!href || href === '#' || href.indexOf('#') === -1) {
        return '';
      }
      if (href.charAt(0) === '#') {
        return href;
      }
      try {
        var url = new URL(href, window.location.href);
        if (!isSamePageUrl(url)) {
          return '';
        }
        return url.hash || '';
      } catch (error) {
        return '';
      }
    };

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

    var closeMobileMenu = function () {
      if (!menuToggle || !mobileMenu) {
        return;
      }
      menuToggle.classList.remove('is-open');
      mobileMenu.classList.remove('is-open');
      menuToggle.setAttribute('aria-expanded', 'false');
    };

    var closeSubmenus = function () {
      document.querySelectorAll('.scls-nav-item.is-open').forEach(function (item) {
        item.classList.remove('is-open');
        var toggle = item.querySelector('[data-scls-submenu-toggle]');
        if (toggle) {
          toggle.setAttribute('aria-expanded', 'false');
        }
      });
    };

    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', function () {
        var isOpen = menuToggle.classList.toggle('is-open');
        mobileMenu.classList.toggle('is-open', isOpen);
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        if (!isOpen) {
          closeSubmenus();
        }
      });
    }

    if (submenuToggles.length) {
      submenuToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (event) {
          event.preventDefault();
          var parent = toggle.closest('.scls-nav-item');
          if (!parent) {
            return;
          }
          var isOpen = parent.classList.toggle('is-open');
          toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
      });
    }

    document.querySelectorAll('[data-scroll-target], .scls-nav-menu a[href*=\"#\"]').forEach(function (trigger) {
      trigger.addEventListener('click', function (event) {
        var target = getScrollTarget(trigger);
        if (!target) {
          return;
        }
        var targetEl = document.querySelector(target);
        if (targetEl) {
          event.preventDefault();
          var offset = header ? header.offsetHeight : 0;
          var top = targetEl.getBoundingClientRect().top + window.scrollY - offset;
          window.scrollTo({ top: top, behavior: 'smooth' });
        }
        closeMobileMenu();
        closeSubmenus();
      });
    });

    document.addEventListener('keydown', function (event) {
      if (event.key !== 'Escape') {
        return;
      }
      closeSubmenus();
      closeMobileMenu();
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
