$(function() {

  $('.delete-button').on('click', function(e) {

    // aタグのリンク機能を無効化
    e.preventDefault();

    // クリックされたタスクのIDを取得
    let id = $(this).data('id');

    // ajax処理を開始
    $.ajax({
      url: 'http://localhost/TodoApp/delete.php',
      type: 'GET',
      dataType: 'json',
      data: {
        id: id
      }
    }).done((data) => {
      // 成功した時、該当タスクを画面から削除
      $('#task-' + id).fadeOut();
    }).fail((error) => {
      console.log(error);
      console.log('error');
    });
  })

})
