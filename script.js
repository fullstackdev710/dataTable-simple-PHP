$(document).ready(function () {
  $("#contact-detail").on("dblclick", "td", function (e) {
    //  debugger;
    currentValue = e.target.innerText;
    console.log(currentValue);
    $(this).html(
      "<input id='currentInput' type='text' value='" +
        currentValue +
        "'/> <button onclick='setNewValue()'>Set</button>"
    );
  });
});

function setNewValue() {
  resultId = $("#currentInput")
    .parent()
    .parent()
    .children("td:first-child")[0].innerText;

  fieldName = $("#currentInput").parent().data("field");
  newValue = $("#currentInput").val();

  console.log(resultId, fieldName, newValue);

  $("#currentInput").parent().text(newValue);

  $.ajax({
    url: `server.php`,
    type: "POST",
    data: {
      resultsid: resultId,
      field_name: fieldName,
      value: newValue,
    },
    success: function (result) {
      console.log(result);
      // when call is sucessfull
    },
    error: function (err) {
      console.log(err);
      // check the err for error details
    },
  });
}
