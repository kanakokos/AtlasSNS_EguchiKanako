$(function () {
  $('.menu-trigger').click(function () {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
      $('.menu').addClass('active');
    } else {
      $('.menu').removeClass('active');
    }
  });
});

// $('.menu-trigger').click(function () {
//   $('.menu-trigger').removeClass('active');
//   $('.menu').removeClass('active');
// });
