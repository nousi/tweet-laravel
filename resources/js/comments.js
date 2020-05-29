$(function() {
  var get_data =function (){
    $.ajax({
        url: window.location.host + "/comments",
        dataType: "json",
        success: data => {
            console.log('OK2');
            console.log(data);
        },
        error: () => {
            console.log('OK2');
            alert("エラーが発生しました");
        }
    });
  
  }
  setTimeout(get_data, 5000);
});
