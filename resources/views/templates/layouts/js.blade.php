<!-- jquery && slick js vendor  -->
<script src="{{ asset('user/vendor/js/jquery.min.js') }}"></script>
<script src="{{ asset('user/vendor/js/slick.min.js') }}"></script>
<script src="{{ asset('user/vendor/js/swiper.min.js') }}"></script>
<script src="{{ asset('user/vendor/js/splide.min.js') }}"></script>
<script src="{{ asset('user/vendor/js/axios.min.js')}}"></script>

<script>
  $(".slick-container").slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
</script>


<script>
  var splide = new Splide(".splide", {
    perPage: 3,
    focus: 0,
    type: "loop",
    omitEnd: true,
    breakpoints: {
      1280: {
        perPage: 3,
      },
      820: {
        perPage: 2,
      },
      415: {
        perPage: 1,
      },
    },
  });

  splide.mount();

  document
    .querySelector(".carousel-control-prev")
    .addEventListener("click", function () {
      splide.go("-1");
    });

  document
    .querySelector(".carousel-control-next")
    .addEventListener("click", function () {
      splide.go("+1");
    });
</script>

