<!DOCTYPE html>
<html lang="bn">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="@yield('meta_title')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />


    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />
       <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!--header social-icon -->
    <link rel="icon" href="{{asset('frontend/assets/img/favicon.png')}}" type="image/x-icon" />

    @yield('styles')
 
  </head>

 <body>



    <!---------- BEGIN: Body Content ----------->
        @yield('content')
    <!---------- END: Body Content ------------->


    <!-- jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{asset('frontend/assets/js/video.js')}}"></script>
    <!-- Slick Carousel JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <!-- Slick Slider JS -->
    <script>
        $(document).ready(function(){
            $('.trending-content .main-slider').slick({
                dots: true,
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                autoplay: true,
                autoplaySpeed: 4000,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>'
            });
        });
    </script>


    <!-- Added scroll to top functionality -->
    <script>

        function scrollToTop() {
            window.scrollTo({
            top: 0,
            behavior: "smooth",
            });
        }

        // Show/hide back to top button based on scroll position
        window.addEventListener("scroll", function () {
            const backToTop = document.querySelector(".back-to-top");
            if (window.pageYOffset > 300) {
            backToTop.style.display = "block";
            } else {
            backToTop.style.display = "none";
            }
        });
    </script>


    <!-- Language Toggle Script -->
    <script>
        const langBtn = document.getElementById("langToggle");

        langBtn.addEventListener("click", function () {
            if (langBtn.innerHTML.includes("BN")) {
            langBtn.innerHTML = '<img src="https://flagcdn.com/w20/gb.png" width="20" alt="ENG"> ENG';
            } else {
            langBtn.innerHTML = '<img src="https://flagcdn.com/w20/bd.png" width="20" alt="BN"> BN';
            }
        });
    </script>

  
    <!-- Script -->
    <script>
        const btnTop = document.getElementById("btn-top");
        const btnRecent = document.getElementById("btn-recent");
        const topNews = document.getElementById("top-news");
        const recentNews = document.getElementById("recent-news");
        const indicator = document.querySelector(".tab-indicator");

        function activateTab(activeBtn, inactiveBtn, showEl, hideEl, position) {
            // Content toggle
            hideEl.classList.add("d-none");
            showEl.classList.remove("d-none");

            // Button state
            activeBtn.classList.add("active");
            inactiveBtn.classList.remove("active");

            // Move indicator
            indicator.style.left = position;
        }

        btnTop.addEventListener("click", () => {
            activateTab(btnTop, btnRecent, topNews, recentNews, "0%");
        });

        btnRecent.addEventListener("click", () => {
            activateTab(btnRecent, btnTop, recentNews, topNews, "50%");
        });
    </script>


    <!-- Script -->
    <script>
        const navLinks = document.querySelectorAll(".nav-link-tab");
        const navIndicator = document.querySelector(".nav-indicator");
        const sections = document.querySelectorAll(".tab-section");

        navLinks.forEach((link, index) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

                // remove active from all links
                navLinks.forEach(l => l.classList.remove("active"));
                link.classList.add("active");

                // hide all sections
                sections.forEach(s => s.classList.add("d-none"));

                // show selected section
                const targetId = link.getAttribute("data-target");
                document.getElementById(targetId).classList.remove("d-none");

                // move indicator
                navIndicator.style.left = (index * 25) + "%";
            });
        });


        const navbar = document.getElementById("mainNav");

        window.addEventListener("scroll", function () {
            const scrollTop = window.scrollY;
            const docHeight = document.body.scrollHeight - window.innerHeight;
            const scrolledPercent = (scrollTop / docHeight) * 100;

            if (scrolledPercent > 4) {
                navbar.classList.add("fixed-top", "shadow-sm");
            } else {
                navbar.classList.remove("fixed-top", "shadow-sm");
            }
        });
    </script>


    <script>
        document.getElementById("scrollTopBtn").addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>


    <script>
        const ageeSection = document.getElementById("ageeSection");
        const poreeSection = document.getElementById("poreeSection");
        const btnAgee = document.getElementById("btnAgee");
        const btnPoree = document.getElementById("btnPoree");

        btnAgee.addEventListener("click", () => {
            ageeSection.classList.remove("d-none");
            poreeSection.classList.add("d-none");
        });

        btnPoree.addEventListener("click", () => {
            poreeSection.classList.remove("d-none");
            ageeSection.classList.add("d-none");
        });
    </script>

     @yield('scripts')

  </body>
</html>
