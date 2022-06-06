
/*display-mobile-menu*/
const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar-menu');
const body = document.querySelector('body');
const mobileMenu = () => {
  menu.classList.toggle('is-active');
  menuLinks.classList.toggle('active');
  body.classList.toggle('active');
};
menu.addEventListener('click', mobileMenu);
/*display-mobile-menu*/

/*Loader*/
$(window).on('load', function () {
  $(".loader").fadeOut(500, function () {
    //    $(".loads").fadeOut(500), $("body").css("overflow-y", "auto")

  })
})
/*Loader*/


/*Button-Scroll-down*/
$(function () {
  $('.down').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top }, 900, 'linear');
  });
});
/*Button-Scroll-down*/


/*Drop-Down-Menu*/
$(document).click(function () {
  $('div.dropdown-content').slideUp();
});

$('div.dropdown').click(function (event) {
  event.stopImmediatePropagation();
  $(this).children("div.dropdown-content").slideToggle("slow");

});
/*Drop-Down-Menu*/

/*Counter*/
var counted = 0;
$(window).scroll(function () {
  var oTop = $('#counter').offset().top - window.innerHeight;
  if (counted == 0 && $(window).scrollTop() > oTop) {
    $('.count').each(function () {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
        countNum: countTo
      },
        {
          duration: 3000,
          easing: 'swing',
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum);
          }
        });
    });
    counted = 1;
  }
});


/*Fancy-Box*/
$('[data-fancybox="gallery"]').fancybox({
  buttons: [
    "slideShow",
    "download",
    "close"
  ],
  transitionEffect: "circular",
});
/*Fancy-Box*/
