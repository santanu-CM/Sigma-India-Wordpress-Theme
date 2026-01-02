(function ($) {
  $(document).ready(function ($) {
    // $(document).ready(function ($) {
    if ($('.js--sticky-nav').length > 0) {
      var sections = $('.js--sticky-nav-sections > div, .js--sticky-nav-sections > section'),
        stickyNav = $('.js--sticky-nav'),
        stickyNavHeight = stickyNav.outerHeight();

      $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();
        sections.each(function () {
          var top = $(this).offset().top,
            bottom = top + $(this).outerHeight();
          if (cur_pos >= top && cur_pos <= bottom) {
            stickyNav.find('a').removeClass('active');
            sections.removeClass('active');

            $(this).addClass('active');
            stickyNav.find('a[href="#' + $(this).attr('id') + '"]').addClass('active');
          }
          if ($(window).scrollTop() <= $('.js--sticky-nav-sections div:first-child, .js--sticky-nav-sections section:first-child').offset().top) {
            stickyNav.find('a').removeClass('active');
            sections.removeClass('active');
          }
        });
      });
      // stickyNav.find('a').on('click', function () {
      //   var $el = $(this),
      //     id = $el.attr('href');
      //   $('html, body').animate({
      //     scrollTop: $(id).offset().top
      //   }, 500);
      //   return false;
      // });
      stickyNav.parent().addClass('js--has-sticky-nav');
      $('.js--sticky-nav-sections > div, .js--sticky-nav-sections > section').addClass('js--sticky-nav-section');
      var previousScroll = 0,
        stickyNav = $('.js--sticky-nav'),
        stickyNavHeight = stickyNav.outerHeight(),
        menuOffset = stickyNav.offset().top,
        menuOffsetBottom = (menuOffset + stickyNavHeight),
        detachPoint = menuOffsetBottom,
        hideShowOffset = 1;
      $(window).scroll(function () {
        var currentScroll = $(this).scrollTop(),
          scrollDifference = Math.abs(currentScroll - previousScroll);
        if (currentScroll > menuOffset) {
          if (currentScroll > (detachPoint + (stickyNavHeight * 2))) {
            if (!stickyNav.hasClass('detached'))
              stickyNav.addClass('detached');
          }
          if (scrollDifference >= hideShowOffset) {
            if (currentScroll > previousScroll && $(window).scrollTop() >= menuOffsetBottom) {
              if (!stickyNav.hasClass('invisible'))
                stickyNav.addClass('invisible');
            } else {
              if (stickyNav.hasClass('invisible'))
                stickyNav.removeClass('invisible');
            }
          }
        } else {
          if (currentScroll <= menuOffsetBottom) {
            stickyNav.removeClass('detached');
          }
        }
        previousScroll = currentScroll;
      })
    }


    $('.hamburger__menu').on('click', function () {
      $('.menu').toggleClass('animate');
    })

    //New Updated code 
    $('.main__banner__slider').owlCarousel({
      margin: 0, autoplay: true, nav: false, dots: true, loop: false, navText: "",
      responsive: {
        0: { items: 1 },
        500: { items: 1 },
        700: { items: 1 },
        1000: { items: 1 },
        1299: { items: 1 }
      }
    })
  

    $('.product__list__slider').owlCarousel({
      margin: 20, autoplay: true, nav: true, dots: true, loop: false, navText: "",
      responsive: {
        0: { items: 1 },
        500: { items: 2 },
        700: { items: 3 },
        1000: { items: 4 },
        1299: { items: 5 }
      }
    })
    
    $('.product__list__slider__like').owlCarousel({
      margin: 20, autoplay: true, nav: true, dots: false, loop: false, navText: "",
      responsive: {
        0: { items: 1 },
        500: { items: 2 },
        700: { items: 3 },
        1000: { items: 4 },
        1299: { items: 4 }
      }
    })

    //New Updated Code added
    $('.blog__list__slider').owlCarousel({
    margin: 20, autoplay: true, nav: true, dots: true, loop: false,
    responsive: {
      0: { items: 1 },
      500: { items: 1 },
      700: { items: 2 },
      1000: { items: 3 },
      1299: { items: 3 }
    }
  })
	  //New Updated Code added for learn page
	  $('.blog__list__slider__two').owlCarousel({
		  margin: 20, autoplay: true, nav: false, dots: false, loop: false,
		  responsive: {
			  0: { items: 1 },
			  500: { items: 1 },
			  700: { items: 2 },
			  1000: { items: 3 },
			  1299: { items: 3 }
		  }
	  })

    $('.watch__slider__list').owlCarousel({
      margin: 20, autoplay: true, nav: true, dots: false, loop: false, navText: "",
      responsive: {
        0: { items: 1 },
        500: { items: 1 },
        700: { items: 2 },
        1000: { items: 3 },
        1299: { items: 3 }
      }
    })

    $('.event__slider__list').owlCarousel({
      margin: 20, autoplay: true, nav: true, dots: true, loop: false, navText: "",
      responsive: {
        0: { items: 1 },
        500: { items: 1 },
        700: { items: 2 },
        1000: { items: 3 },
        1299: { items: 3 }
      }
    })

    $('.gallery__slider').owlCarousel({
      loop: false,
      margin: 10,
      nav: true,
      startPosition: 2,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })

    $('.single__product__slider').owlCarousel({
      margin: 0, autoplay: true, nav: true, dots: true, loop: false, navText: "",
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })

   //New review slider added 
   $('.reviews__slider').slick({
    slidesToShow: 3,
    slidesToShow: 1,
    centerMode: true,
    arrows: true,
    dots: true,
    speed: 300,
    centerPadding: '328px',
    infinite: true,
    autoplaySpeed: 5000,
    autoplay: false,
    responsive: [
      {
        breakpoint:1400,
        settings: {
          slidesToShow: 3,
          slidesToShow: 1,
          centerPadding: '250px'
        }
      },
      {
        breakpoint:992,
        settings: {
          slidesToShow: 3,
          slidesToShow: 1,
          centerPadding: '200px'
        }
      },
      {
        breakpoint:768,
        settings: {
          slidesToShow: 3,
          slidesToShow: 1,
          centerPadding: '100px'
        }
      },
      {
        breakpoint:576,
        settings: {
          slidesToShow: 3,
          slidesToShow: 1,
          centerPadding: '40px'
        }
      }
    ]
  });

    $('.features__list__slider').owlCarousel({
      margin: 0, autoplay: true, nav: false, dots: true, loop: true,
      responsive: {
        0: { items: 2 },
        500: { items: 4 },
        700: { items: 5 },
        1000: { items: 7 },
        1299: { items: 7 }
      }
    })

    var btn = $('#button');
    $(window).scroll(function () {
      if ($(window).scrollTop() > 400) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });
    btn.on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, '300');
    });

    $('#price_pick').change(function () {
      var value = $('#price_pick :selected').val();
      var txt = $('#price_pick :selected').text();
      $("#value").html(value);
    });

    // $("div.card__item").slice(0, 9).addClass('display__card');
    // $("#loadmore").on('click', function (e) {
    //   e.preventDefault();
    //   $("div:hidden").slice(0, 9).addClass('display__card');
    //   if ($("div:hidden").length == 0) {
    //     $("#loadmore").remove();
    //   } else {
    //     $('html,body').animate({
    //       scrollTop: $(this).offset().top
    //     }, 1500);
    //   }
    // });

    $('.slide__menu__open').on('touchend click', function () {

      console.log(`aaaaa`)

      var menu = $(this).attr('data-menu');

      $(menu).toggleClass('slide__menu__expanded');
      $(menu).parent().toggleClass('slide__menu__expanded');

    });

    $('.slide__menu, .slide__menu__close').on('touchend click', function (event) {

      if ($(event.target).hasClass('slide__menu') || $(event.target).hasClass('slide__menu__close')) {
        $('.slide__menu__expanded').removeClass('slide__menu__expanded');
      }
    });


    $('<div class="quantity__nav"><div class="quantity__button quantity__up"></div><div class="quantity__button quantity__down"></div></div>').insertAfter('.quantity input');
    $('.quantity').each(function () {
      var spinner = $(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity__up'),
        btnDown = spinner.find('.quantity__down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function () {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function () {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });

    const selectHotspot = (e) => {
      const clickedHotspot = e.target.parentElement;
      const container = clickedHotspot.parentElement;
      const hotspots = container.querySelectorAll(".lg-hotspot");
      hotspots.forEach(hotspot => {
        if (hotspot === clickedHotspot) {
          hotspot.classList.toggle("lg-hotspot--selected");
        } else {
          hotspot.classList.remove("lg-hotspot--selected");
        }
      });
    }

    (() => {
      const buttons = document.querySelectorAll(".lg-hotspot__button");
      buttons.forEach(button => {
        button.addEventListener("click", selectHotspot);
      });
    })();

    let filterCatValues = [];
    let filterAttrValues = '';
    $('input[name="filter_category"]').change(function () {
      filterCatValues = [];
      filterCatValues = $('input[name="filter_category"]:checked').map(function () {
        return $(this).val();
      }).get();

      filterData();
    });

    $('select[name="filter_attribute"]').change(function () {
      filterAttrValues = $(this).val();
      filterData();
    });

    $(`.btn__clear__filter`).click(function (e) {
      e.preventDefault();
      filterCatValues = [];
      filterAttrValues = '';
      filterData();
      $("#product_filter")[0].reset();      
    })


    function filterData() {
      let filters = '';            
      filters = filterCatValues.join(' ');

      // if (filterAttrValues) {
      //   filters += ` ${filterAttrValues}`;
      // }

      filters = filters.trim();
      filters = filters.split(' ');  
      filters = filters.filter(x => x);

      $(".product__list__wrapp__bgcolor .product__card").each(function () {

        let commonClasses = [];
        let classes = $(this).attr('class').split(' ');

        if(filters.length){
          console.log('11')
           commonClasses = filters.filter(x => classes.includes(x));          
        }        

        if (filters.length && commonClasses.length && filterAttrValues.length > 1 && classes.includes(filterAttrValues)) {          
          console.log('22')
          $(this).show();
        } 
        
        else if(filters.length && !commonClasses.length && filterAttrValues.length > 1 && classes.includes(filterAttrValues)){        
          console.log('33')  
          $(this).hide();
        }

        else if(filters.length && commonClasses.length && filterAttrValues.length > 1 && classes.includes(filterAttrValues) == false){   
          console.log('44')       
          $(this).hide();
        }

        else if(!filters.length && filterAttrValues.length > 1 && classes.includes(filterAttrValues)){ 
          console.log('55')         
          $(this).show();
        }

        else if(filters.length && commonClasses.length  && filterAttrValues.length <= 1){    
          console.log('66')      
          $(this).show();
        }

        else if(!filters.length && filterAttrValues.length <= 1 ){ 
          console.log('77')         
          $(this).show();
        }

        else{          
          console.log('88')
          $(this).hide();
        }
      })
    }

    document.addEventListener('DOMContentLoaded', () => {
      // Fetch cart items using AJAX
      fetch('/wp-admin/admin-ajax.php?action=get_cart_items')
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            const cartItems = data.data;
            const cartContainer = document.getElementById('cart-items');
            const subtotalContainer = document.getElementById('cart-subtotal');
            let subtotal = 0;

            cartItems.forEach(item => {
              const cartItem = document.createElement('div');
              cartItem.className = 'cart__item';
              cartItem.innerHTML = `
                      <div class="image__box"><a href="#"><img src="${item.image}" alt="${item.name}" /></a></div>
                      <div class="card__content">
                          <h3>${item.name}</h3>
                          <div class="producr__item">${item.price}</div>
                          <button class="delete__product"><img src="assets/images/close-black.svg" alt="Delete" /></button>
                      </div>
                  `;
              cartContainer.appendChild(cartItem);

              // Update subtotal
              subtotal += parseFloat(item.price.replace(/[^\d.-]/g, ''));
            });

            subtotalContainer.innerText = `Subtotal - $ ${subtotal.toFixed(2)}`;
          }
        });
    });

  });


//Copy Link Start
$('[data-bs-toggle="tooltip"]').each(function () {
  new bootstrap.Tooltip(this);
});
$('#copy-link').on('click', function (event) {
  event.preventDefault();
  const url = $(this).data('url');
  const $copyLinkButton = $(this);
  if (navigator.clipboard && navigator.clipboard.writeText) {
    navigator.clipboard.writeText(url).then(function () {
      $copyLinkButton.attr('data-bs-original-title', 'Link copied!');
      const tooltip = bootstrap.Tooltip.getInstance($copyLinkButton[0]);
      tooltip.show();
      setTimeout(() => {
        tooltip.hide();
      }, 1500);
    }).catch(function (err) {
      console.error('Failed to copy the URL to clipboard: ', err);
    });
  } else {
    const $tempInput = $('<input>');
    $tempInput.css({ position: 'absolute', left: '-9999px' }).val(url);
    $('body').append($tempInput);
    $tempInput.select();
    try {
      document.execCommand('copy');
      $copyLinkButton.attr('data-bs-original-title', 'Link copied!');
      const tooltip = bootstrap.Tooltip.getInstance($copyLinkButton[0]);
      tooltip.show();
      setTimeout(() => {
        tooltip.hide();
      }, 1500);
    } catch (err) {
      console.error('Fallback: Could not copy the url: ', err);
    }
    $tempInput.remove();
  }
});
//Copy Link End  

})(jQuery)

document.addEventListener('DOMContentLoaded', function () {
  const menuItems = document.querySelectorAll('.navbar-nav > li');

  menuItems.forEach(item => {
    // Check if the <li> has the class 'dropdown' and 'dropdown__wrap'
    if (item.classList.contains('dropdown') && item.classList.contains('dropdown__wrap')) {
      // Select the <a> element within the <li>
      const anchor = item.querySelector('a');

      // Create the <i> element
      const icon = document.createElement('i');

      // Add the icon__box class to the <i> element
      icon.classList.add('icon__box');

      // Append the <i> element to the <a> element
      anchor.appendChild(icon);
    }
  });
});

document.addEventListener('DOMContentLoaded', function () {
    var dropdownLinks = document.querySelectorAll('.dropdown__toggle');

    dropdownLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            // If dropdown is already open, navigate to the link
            if (link.getAttribute('aria-expanded') === 'true') {
                window.location.href = link.href;
            }
        });
    });
});

// Top Button
let backToTopBtn = document.getElementById("btn-back-to-top");
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopBtn.style.display = "block";
    } else {
        backToTopBtn.style.display = "none";
    }
};
backToTopBtn.addEventListener("click", function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});







