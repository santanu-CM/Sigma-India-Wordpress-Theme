(function ($) {
  jQuery(".hamburger__menu").on("click", function () {
    $(".menu").toggleClass("animate");
  });
  $(document).on("click", "#cust_btn", function () {
    $("#myModal").modal("toggle");
  });

  $(".slide__menu__open").on("click", function () {
    var menu = $(this).attr("data-menu");
    $(menu).toggleClass("slide__menu__expanded");
    $(menu).parent().toggleClass("slide__menu__expanded");
  });
  $(".slide__menu__wrapp, .slide__menu__close").on("click", function (event) {
    if (
      $(event.target).hasClass("slide__menu") ||
      $(event.target).hasClass("slide__menu__close")
    ) {
      $(".slide__menu__expanded").removeClass("slide__menu__expanded");
    }
  });

  var QtyInput = (function () {
    var $qtyInputs = $(".qty-input");
    if (!$qtyInputs.length) {
      return;
    }
    var $inputs = $qtyInputs.find(".product-qty");
    var $countBtn = $qtyInputs.find(".qty-count");
    var qtyMin = parseInt($inputs.attr("min"));
    var qtyMax = parseInt($inputs.attr("max"));
    $inputs.change(function () {
      var $this = $(this);
      var $minusBtn = $this.siblings(".qty-count--minus");
      var $addBtn = $this.siblings(".qty-count--add");
      var qty = parseInt($this.val());
      if (isNaN(qty) || qty <= qtyMin) {
        $this.val(qtyMin);
        $minusBtn.attr("disabled", true);
      } else {
        $minusBtn.attr("disabled", false);

        if (qty >= qtyMax) {
          $this.val(qtyMax);
          $addBtn.attr("disabled", true);
        } else {
          $this.val(qty);
          $addBtn.attr("disabled", false);
        }
      }
    });
    $countBtn.click(function () {
      var operator = this.dataset.action;
      var $this = $(this);
      var $input = $this.siblings(".product-qty");
      var qty = parseInt($input.val());
      if (operator == "add") {
        qty += 1;
        if (qty >= qtyMin + 1) {
          $this.siblings(".qty-count--minus").attr("disabled", false);
        }
        if (qty >= qtyMax) {
          $this.attr("disabled", true);
        }
      } else {
        qty = qty <= qtyMin ? qtyMin : (qty -= 1);

        if (qty == qtyMin) {
          $this.attr("disabled", true);
        }
        if (qty < qtyMax) {
          $this.siblings(".qty-count--add").attr("disabled", false);
        }
      }
      $input.val(qty);
    });
  })();

  $(".offset__wrapp")
    .mouseenter(function () {
      $(".offset__main").addClass("inverse__offset");
    })
    .mouseleave(function () {
      $(".offset__main").removeClass("inverse__offset");
    });

  jQuery("#products__slider").slick({
    rows: 1,
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 1201,
        settings: {
          slidesPerRow: 1,
          rows: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  jQuery('#products__slider__one').slick({
    rows: 1,
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 1201,
        settings: {
          slidesPerRow: 1,
          rows: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
  });


  jQuery("#featured__products__slider").slick({
    rows: 1,
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1201,
        settings: {
          slidesPerRow: 1,
          rows: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  jQuery("#review__slider").slick({
    rows: 1,
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1201,
        settings: {
          slidesPerRow: 1,
          rows: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
  $("#photo__gallery__slider").slick({
    rows: 1,
    dots: true,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1201,
        settings: {
          slidesPerRow: 1,
          rows: 1,
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  $("#camera__bf__view").slick({
    rows: 1,
    dots: true,
    arrows: true,
    infinite: false,
    speed: 400,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  jQuery(".product__pec__block__tab").on("click", ".show__single", function () {
    $(".product__pec__block__tab .active").removeClass("active");
    $(this).addClass("active");
  });

  $("#showall").click(function () {
    $(".targetDiv").show();
  });
  $(".show__single").click(function () {
    $(".targetcontent").hide();
    $("#content" + $(this).attr("target")).show();
  });

  jQuery(document).ready(function () {
    $(".plus__btn").click(function () {
      var val = $(".number__quantity").val();
      val++;
      if (val >= 1) {
        $(".number__quantity").attr("value", val);
      }
    });
    $(".minus__btn").click(function () {
      var val = $(".number__quantity").val();
      val--;
      if (val >= 1) {
        $(".number__quantity").attr("value", val);
      }
    });
  });

  jQuery(".product__slider__content").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    fade: false,
    infinite: false,
    speed: 1000,
    asNavFor: ".slider__thumb",
  });
  jQuery(".slider__thumb").slick({
    slidesToShow: 6,
    slidesToScroll: 4,
    asNavFor: ".product__slider__content",
    dots: false,
    centerMode: false,
    focusOnSelect: true,
  });

  jQuery("a[data-slide]").click(function (e) {
    e.preventDefault();
    var slideno = $(this).data("slide");
    $(".product__slider__content").slick("slickGoTo", slideno - 1);
  });
  jQuery(".awesome__slider").slick({
    dots: true,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    lazyLoad: "ondemand",
  });

  jQuery(".awesome__slider").on("swipe", function (event, slick, direction) {
    console.log(direction);
  });
  jQuery(".awesome__slider").on(
    "beforeChange",
    function (event, slick, currentSlide, nextSlide) {
      console.log(nextSlide);
      $(".product__verview__thumbnail").removeClass("active");
      $('.product__verview__thumbnail[data-rel="' + nextSlide + '"]').addClass(
        "active"
      );
    }
  );
  jQuery(".product__verview__thumbnail").on("click", function (e) {
    e.preventDefault();
    $(".awesome__slider").slick("slickGoTo", $(this).data("rel"));
  });

  // jQuery(function () {
  //   var filterList = {
  //     init: function () {
  //       var $filters = jQuery(".filter");
  
  //       jQuery("#gallery").mixItUp({
  //         selectors: {
  //           target: ".gallery__item",
          
  //         },
  //         load: {
  //           filter: "all",
  //         },
  //         callbacks: {
  //           onMixEnd: function () {
  //             // Optional: Debug or do stuff after mix
  //           },
  //         },
  //       });
  
  //       // Handle active class manually
  //       $filters.on("click", function () {
  //         $filters.removeClass("active");
  //         jQuery(this).addClass("active");
  //       });
  //     },
  //   };
  
  //   filterList.init();
  // });
  
  
  
  // jQuery(function () {
  //   var filterList = {
  //     init: function () {
  //       jQuery("#gallery").mixItUp({
  //         selectors: {
  //           target: ".gallery__item",
  //           filter: ".filter",
  //         },
  //         load: {
  //           filter: ".impressions, .how-to, .interviews",
  //         },
  //       });
  //     },
  //   };
  //   filterList.init();
  // });

  // jQuery(function ($) {
  //   var $controls = $('#filters .filter');
  
  //   $('#gallery-1').mixItUp({
  //     selectors: {
  //       target: '.gallery__item',
  //       filter: '.filter'
  //     },
  //     controls: {
  //       scope: 'local'            
  //     },
  //     load: {
  //       filter: '*'            
  //     }
  //   });
  
  //   // just for styling the “active” filter
  //   $controls.on('click', function(e) {
  //     e.preventDefault();
  //     $controls.removeClass('active');
  //     $(this).addClass('active');
  //   });
  // });
  
  

  // (function () {
  //   var didScroll;
  //   var lastScrollTop = 0;
  //   var delta = 500;
  //   var navbarEl = document.querySelector(".sub__header");
  //   var navbarHeight = navbarEl.offsetHeight;

  //   window.addEventListener("scroll", function (event) {
  //     didScroll = true;
  //   });

  //   setInterval(function () {
  //     if (!didScroll) return;
  //     hasScrolled();
  //     didScroll = false;
  //   }, 0);

  //   function hasScrolled() {
  //     var st = document.documentElement.scrollTop;
  //     if (Math.abs(lastScrollTop - st) <= delta) return;
  //     if (st > lastScrollTop && st > navbarHeight) {
  //       navbarEl.classList.remove("sub__header__down");
  //       navbarEl.classList.add("sub__header__up");
  //     } else {
  //       if (st + window.innerHeight < document.documentElement.offsetHeight) {
  //         navbarEl.classList.remove("sub__header__up");
  //         navbarEl.classList.add("sub__header__down");
  //       }
  //     }
  //     lastScrollTop = st;
  //   }
  // })();
  $(function () {
    var filterList = {
      init: function () {
        $("#gallery-2").mixItUp({
          selectors: {
            target: ".gallery__item",
            filter: ".filter",
          },
          load: {
            filter: ".products, .inspiration, .support, .news",
          },
        });
      },
    };
    filterList.init();
  });
  //jQuery(document).ready(function ($) {
    document.addEventListener("DOMContentLoaded", () => {
      const filterButtons = document.querySelectorAll(".filter__wrapp .btn");
      const items = document.querySelectorAll(".item__card");
      filterButtons.forEach((button) => {
        button.addEventListener("click", () => {
          filterButtons.forEach((btn) => btn.classList.remove("active"));
          button.classList.add("active");
          const category = button.getAttribute("data-filter");
          items.forEach((item) => {
            if (category === "all" || item.classList.contains(category)) {
              item.style.opacity = 0;
              setTimeout(() => {
                item.style.display = "block";
                item.style.opacity = 1;
              }, 500);
            } else {
              item.style.opacity = 0;
              setTimeout(() => {
                item.style.display = "none";
              }, 500);
            }
          });
        });
      });
      filterButtons[0].click();
    });
  //});
  jQuery(document).ready(function () {
    $("a[href*=#]").bind("click", function (e) {
      e.preventDefault();
      var target = $(this).attr("href");
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: $(target).offset().top,
          },
          600,
          function () {
            location.hash = target;
          }
        );
      return false;
    });
  });
  jQuery(window)
    .scroll(function () {
      var scrollDistance = $(window).scrollTop();
      $(".page__section").each(function (i) {
        if ($(this).position().top - 70 <= scrollDistance) {
          $(".navigation a").removeClass("active");
          $(".navigation a").eq(i).addClass("active");
        }
      });
    })
    .scroll();

  // function showHideDiv() {
  //   var srcElement = document.getElementById("filter-category");
  //   var filterElement = document.getElementById("filter-btn");
  //   if (srcElement != null) {
  //     if (srcElement.style.display === "block") {
  //       srcElement.style.display = 'none';
  //     } else {
  //       srcElement.style.display = 'block';
  //     }
  //     filterElement.classList.toggle("active__filter__btn")
  //     return false;
  //   }
  // }
  // var filter = document.getElementById("filter-btn");
  // filter.addEventListener("click", showHideDiv);

  // var filter = document.getElementById("filter-btn");
  $(function () {
    var filter = document.getElementById("filter-btn");
    var srcElement = document.getElementById("filter-category");

    function showHideDiv() {
      if (srcElement != null) {
        if (srcElement.style.display === "block") {
          srcElement.style.display = "none";
        } else {
          srcElement.style.display = "block";
        }
        filter.classList.toggle("active__filter__btn");
        return false;
      }
    }

    if (filter) {
      filter.addEventListener("click", showHideDiv);
    }
  });
})(jQuery);
