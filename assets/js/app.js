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

  // 追加ボタンがクリックされた時
  $('#add-button').on('click', function(e) {

    // 送信処理を無効化
    e.preventDefault();

    // 画面に入力された文字を取得
    let text = $('#input-task').val();

    $.ajax({
      url: 'http://localhost/TodoApp/create.php',
      type:'POST',
      dataType: 'json',
      data: {
        // ここに送信したい値を記述
        task: text
      }
    }).done((data) => {
      console.log(data);
    }).fail(() => {

    })

  })


})
