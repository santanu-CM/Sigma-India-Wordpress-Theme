(function ($) {

  $('.hamburger__menu').on('click', function () {
    $('.menu').toggleClass('animate');
  })
  $(document).on("click", "#cust_btn", function () {
    $("#myModal").modal("toggle");
  })

  $('.slide__menu__open').on('click', function () {
    var menu = $(this).attr('data-menu');
    $(menu).toggleClass('slide__menu__expanded');
    $(menu).parent().toggleClass('slide__menu__expanded');
  });
  $('.slide__menu__wrapp, .slide__menu__close').on('click', function (event) {
    if ($(event.target).hasClass('slide__menu') || $(event.target).hasClass('slide__menu__close')) {
      $('.slide__menu__expanded').removeClass('slide__menu__expanded');
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
          $addBtn.attr('disabled', true);
        } else {
          $this.val(qty);
          $addBtn.attr('disabled', false);
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

  $('.offset__wrapp').mouseenter(function () {
    $('.offset__main').addClass("inverse__offset");
  }).mouseleave(function () {
    $('.offset__main').removeClass("inverse__offset");
  });

  $('#products__slider').slick({
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


  $('#featured__products__slider').slick({
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
        }
      },
    ]
  });

  
  $('.product__pec__block__tab').on('click', '.show__single', function () {
    $('.product__pec__block__tab .active').removeClass('active');
    $(this).addClass('active');
  });

  $('#showall').click(function () {
    $('.targetDiv').show();
  });
  $('.show__single').click(function () {
    $('.targetcontent').hide();
    $('#content' + $(this).attr('target')).show();
  });


  $(document).ready(function(){
    $(".plus__btn").click(function(){
      var val= $(".number__quantity").val();
      val++;
      if(val >= 1){
        $(".number__quantity").attr("value", val);
      }
    });
    $(".minus__btn").click(function(){
      var val= $(".number__quantity").val();
      val--;
      if(val >= 1){
        $(".number__quantity").attr("value", val);
      }
    });
  });


$('.product__slider__content').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  dots: true,
  fade: false,
	infinite: false,
	speed: 1000,
  asNavFor: '.slider__thumb',
});
$('.slider__thumb').slick({
  slidesToShow: 6,
  slidesToScroll: 4,
  asNavFor: '.product__slider__content',
  dots: false,
  centerMode: false,
  focusOnSelect: true
});

$('a[data-slide]').click(function(e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.product__slider__content').slick('slickGoTo', slideno - 1);
});



  function showHideDiv() {
    var srcElement = document.getElementById("filter-category");
    var filterElement = document.getElementById("filter-btn");
    if (srcElement != null) {
      if (srcElement.style.display === "block") {
        srcElement.style.display = 'none';
      } else {
        srcElement.style.display = 'block';
      }
      filterElement.classList.toggle("active__filter__btn")
      return false;
    }
  }
  var filter = document.getElementById("filter-btn");
  filter.addEventListener("click", showHideDiv);

  var filter = document.getElementById("filter-btn");

})(jQuery)
