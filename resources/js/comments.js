$(function() {
  var get_data = function get_data() {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
        url: window.location.host + "/comments",
        type: 'GET',
        dataType: "json",
        data   :null,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    }).done(function(data){
      console.log(data);
    }).fail(function(){
      alert("自動更新に失敗しました");
    });
  
    setTimeout("get_data()", 5000);
  }

  get_data;
});
