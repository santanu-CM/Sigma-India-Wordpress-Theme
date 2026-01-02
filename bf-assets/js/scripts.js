(function ($) {

  $('.hamburger__menu').on('click', function (e) {
	  e.preventDefault();
    $('.menu').toggleClass('animate');
  })

  $(document).on("click","#cust_btn",function(e){
	  e.preventDefault();
    $("#pre-book").modal("toggle");
  })

})(jQuery)