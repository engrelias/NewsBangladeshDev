 document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper(".video-content .newsSwiper", {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false, 
      },
      navigation: {
        nextEl: ".video-content .custom-next",
        prevEl: ".video-content .custom-prev",
      },
      breakpoints: {
        576: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        992: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 25,
        },
      },
      on: {
        init: () => {
          console.log("✅ News slider initialized")
        },
        slideChange: () => {
          console.log("➡ Slide changed")
        },
      },
    })

    // Store globally so resize handler can use it
    window.newsSwiper = swiper

    // Add click handlers for news cards
    document.querySelectorAll(".video-content .news-card").forEach((card) => {
      card.addEventListener("click", () => {
        console.log("📰 News card clicked")
      })
    })

    // Hover effect for play buttons
    document.querySelectorAll(".video-content .play-overlay").forEach((overlay) => {
      overlay.addEventListener("mouseenter", function () {
        this.style.transform = "translate(-50%, -50%) scale(1.2)"
      })
      overlay.addEventListener("mouseleave", function () {
        this.style.transform = "translate(-50%, -50%) scale(1)"
      })
    })
  })

  // Handle window resize
  window.addEventListener("resize", () => {
    if (window.newsSwiper) {
      window.newsSwiper.update()
    }
  })
