$(function() {
  function append_comment(comment){
    var comment = (
      (`<tr class="comment" data-id=${comment.id}>
          <td width="30px">${comment.user.name}</td>
          <td>${comment.text}}</td>
        </tr>`
      )
    );
    return comment
  };
  var get_data =function (){
    var last_comment_id = $('.comment:last').data('id');
    $.ajax({
        url: "/comments",
        type: 'GET',
        dataType: "json",
        data: {id: last_comment_id}
    })
    .done(function(comments){
        var insertHTML = '';
        comments.forEach(function(comment){
          insertHTML = append_comment(comment);
          $('.comments').append(insertHTML);
          $('.comments').animate({scrollTop: $('.comments')[0].scrollHeight}, 'fast');
        });
    })
    .fail(function(){
      alert("自動更新に失敗しました");
    });
  };
  setInterval(get_data, 5000);
});
