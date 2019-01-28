$(".dialog").before("<div class='dialogBlack'></div>");

$(".dialog").prepend('<div id="close">☒</div>');

$("#dialogMe").click(function() {
  dialogMe();
});

function dialogMe() {
  $(".dialog").css("display", "block");
  $(".dialogBlack").css("opacity", "0.5");
  $(".dialogBlack").css("z-index", "250");
  $(".dialog p, .dialog h2").css("opacity", "1");
  $("#close").css("opacity", "1");
  $("#okButton").css("opacity", "1");
  $(".dialog").css("height", "185px");
  $(".dialog").css("width", "300px");
  $(".dialog").css("padding", "15px");
  $(".dialog").css("margin-left", "-174.5px");
  setTimeout(function() {
    $(".dialog").css("opacity", "1");
  }, 400);
}

$(".dialog #close, .dialog #okButton, .dialogBlack").click(function() {
  $(".dialog p, .dialog h2").css("opacity", "0");
  $(".dialogBlack").css("opacity", "0");
  $(".dialogBlack").css("z-index", "-5");
  $("#close").css("opacity", "0");
  $("#okButton").css("opacity", "0");
  $(".dialog").css("height", "0px");
  $(".dialog").css("width", "0px");
  $(".dialog").css("margin-left", "174.5px");
  $(".dialog").css("padding", "0px");
  setTimeout(function() {
    $(".dialog").css("opacity", "0");
  }, 400);
});

dialogMe();