


$( "#book_link" ).click(function() {
  $(".container").show();
  $("#transactions").hide();
  //alert( "Handler for .click() called." );
});
$( "#transaction_link" ).click(function() {
  $(".container").hide();
  $("#transactions").show();
  //alert( "Handler for .click() called." );
});
