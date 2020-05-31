$(function() {
  function append_comment(comment){
    var comment = (
      (`<tr class="comment" data-id='${comment['id']}'>
          <td width="30px">${comment['user']['name']}</td>
          <td>${comment['text']}</td>
        </tr>`
      )
    );
    return comment;
  };
  var get_data =function (){
    if(window.location.href.match(/\/tweets\/\d+/)){
      var last_comment_id = $('.comment:last').data('id');
      $.ajax({
          url: "/comments",
          type: 'GET',
          dataType: "json",
          data: {id: last_comment_id}
      })
      .done(function(comments){
          var insertHTML = '';
          if (comments.length > 0) {
            for (var i = 0; i < comments.length; i++) {
              console.log(comments[i]);
              console.log(comments[i]['text']);
              insertHTML = append_comment(comments[i]);
              $('.comments').append(insertHTML);
              $('.comments').animate({scrollTop: $('.comments')[0].scrollHeight}, 'fast');
            }
          }
      })
      .fail(function(){
        alert("自動更新に失敗しました");
      });
    }
  };
  setInterval(get_data, 5000);
});
