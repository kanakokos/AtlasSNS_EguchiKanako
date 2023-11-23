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


$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});





// $(function () {
//   $('#UpdateModal').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget);
//     var post = button.data('post-contents');
//     var id = button.data('post-id');

//     var modal = $(this);
//     modal.find('.modal-body input#post').val(post);
//     modal.find('.modal-body input#id').val(id);
//   });
// });
