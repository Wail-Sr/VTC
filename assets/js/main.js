$(".header_toggle").on("click", function (event) {
  $(".nav").toggleClass("show");
  $(".header_toggle").toggleClass("removeButton");
  $(".header_close").toggleClass("showButton");
});

$(".header_close").on("click", function (event) {
  $(".nav").toggleClass("show", false);
  $(".header_toggle").toggleClass("removeButton", false);
  $(".header_close").toggleClass("showButton", false);
});

function toggle() {
  var blur = $(".pop-up");
  blur.toggleClass("blurActive");
}

function pop_up(url) {
  window.open(
    url,
    "win2",
    "status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no"
  );
}

$(document).ready(function(){
  $('.my-select').selectpicker();
});


function intToString (value) {
  var suffixes = ["", "k", "m", "b","t"];
  var suffixNum = Math.floor((""+value).length/3);
  var shortValue = parseFloat((suffixNum != 0 ? (value / Math.pow(1000,suffixNum)) : value).toPrecision(2));
  if (shortValue % 1 != 0) {
      shortValue = shortValue.toFixed(1);
  }
  return shortValue+suffixes[suffixNum];
}

$(document).ready(function(){

  var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
  removeItemButton: true,
  maxItemCount:5,
  searchResultLimit:5,
  renderChoiceLimit:5
  });
  
  
  });


  $("#client").on("click", function () {
    document.getElementById('cas-trans').style.display = 'none';
  });

  $("#transporteur").on("click", function () {
    document.getElementById('cas-trans').style.display = 'block';
  });

  function close_con(){
    $(".pop-up").css("display", "none");
    document.getElementsByClassName("pop-up")[0].style.display = "none";
  }

  function open_con(){
    $(".pop-up").css("display", "flex");
    document.getElementsByClassName("pop-up")[0].style.display = "flex";
  }

  $("#add-an").on("click", function () {
    document.getElementById('form-add').style.display = 'block';
  });