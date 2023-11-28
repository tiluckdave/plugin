$(document).ready(function() {
    $("#electricityForm").submit(function(event) {
      event.preventDefault();
      var units = $("#units").val();
  
      $.post("calculate.php", { units: units }, function(data) {
        $("#result").html("<p>Total Bill: Rs. " + data + "</p>");
        generateChart(units, data);
      });
    });
  });
  
  