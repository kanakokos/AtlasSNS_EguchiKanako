$(function () {
  $('.menu-trigger').click(function () {
    $(this).toggleClass('active');  //toggleClass=クラスの追加・削除が可能
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
