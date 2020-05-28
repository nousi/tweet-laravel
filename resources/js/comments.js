$(function() {
  get_data();
});

function get_data() {
  $.ajax({
      url: "/comments",
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