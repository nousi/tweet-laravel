$(function() {
  var get_data =function (){
    $.ajax({
        url: "/comments",
        type: 'GET',
        dataType: "json",
        data: null
    })
    .done(function(data){
      console.log('OK');
      console.log(data);
    })
    .fail(function(){
      console.log('NG');
      alert("自動更新に失敗しました")
    });
  };
  setTimeout(get_data, 5000);
});
