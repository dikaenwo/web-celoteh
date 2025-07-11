<!DOCTYPE html>
<html lang="en">
<x-header>{{ $title }}</x-header>
<body class="body__wrapper">
    <div id="back__preloader">
        <div id="back__circle_loader"></div>
        <div class="back__loader_logo">
          <img loading="lazy" src="{{ asset('img/pre.png') }}" alt="Preload" />
        </div>
    </div>
    <div class="mode_switcher my_switcher">
        <button id="light--to-dark-button" class="light align-items-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="ionicon dark__mode"
            viewBox="0 0 512 512"
          >
            <path
              d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="32"
            />
          </svg>
  
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="ionicon light__mode"
            viewBox="0 0 512 512"
          >
            <path
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-miterlimit="10"
              stroke-width="32"
              d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"
            />
            <circle
              cx="256"
              cy="256"
              r="80"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-miterlimit="10"
              stroke-width="32"
            />
          </svg>
  
          <span class="light__mode">Light</span>
          <span class="dark__mode">Dark</span>
        </button>
    </div>
    <main class="main_wrapper overflow-hidden">
       
    <x-navbar></x-navbar>
    {{ $slot }}
    <x-footer></x-footer>
    </main>
    <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
      // On page load or when changing themes, best to add inline in `head` to avoid FOUC
      if (
        localStorage.getItem("theme-color") === "dark" ||
        (!("theme-color" in localStorage) &&
          window.matchMedia("(prefers-color-scheme: dark)").matches)
      ) {
        document
          .getElementById("light--to-dark-button")
          ?.classList.add("dark--mode");
      }
      if (localStorage.getItem("theme-color") === "light") {
        document
          .getElementById("light--to-dark-button")
          ?.classList.remove("dark--mode");
      }
    </script>
</body>
</html>