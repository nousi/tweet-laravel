$(function() {
  var get_data =function (){
    var last_comment_id = $('.comment:last').data('id');
    console.log(last_comment_id);
    $.ajax({
        url: "/comments",
        type: 'GET',
        dataType: "json",
        data: {id: last_comment_id}
    })
    .done(function(comments){
      console.log('OK');
      console.log(comments);
    })
    .fail(function(){
      console.log('NG');
      alert("自動更新に失敗しました")
    });
  };
  setInterval(get_data, 5000);
});
