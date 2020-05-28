$(function() {
  get_data();
});

function get_data() {
  console.log(window.location.host + "/comments")
  $.ajax({
      url: window.location.host + "/comments",
      dataType: "json",
      success: data => {
          console.log(data);
      },
      error: () => {
          alert("ajax Error");
      }
  });

  setTimeout("get_data()", 5000);
}