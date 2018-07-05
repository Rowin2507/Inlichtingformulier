// INLADEN PAGINA
$(window).bind("load", function() {
  $('body').addClass('loaded');
  setTimeout(function() {
    // SLIDE-IN ANIMATIE
    $('.main-blurred').addClass('loaded');
    $('.main-indicatie').addClass('loaded');
  }, 500);
});



$(function() {
  // VOLGENDE - VORIGE BUTTONS
  $(".vorige").click( function() {
    $('.main-content').css('margin-left', '+=400px');
  });
  $(".volgende").click( function() {
    $('.main-content').css('margin-left', '-=400px');
  });

  // FUNCTIES VOLGENDE - VORIGE BUTTONS
  setInterval(function(){;
    if ($(".main-content").css("marginLeft")=='0px'){
      $('#blok1').removeClass('hidden');
      $('#indicatie1').addClass('active');
      $('.main-indicatie-lijn-voortgang').css('margin-left', '-400px');
    } else if ($(".main-content").css("marginLeft")=='-400px'){
      $('#blok2').removeClass('hidden');
      $('#indicatie1').addClass('active');
      $('#indicatie2').addClass('active');
      $('.main-indicatie-lijn-voortgang').css('margin-left', '-282px');
    } else if ($(".main-content").css("marginLeft")=='-800px'){
      $('#blok3').removeClass('hidden');
      $('#indicatie1').addClass('active');
      $('#indicatie2').addClass('active');
      $('#indicatie3').addClass('active');
      $('.main-indicatie-lijn-voortgang').css('margin-left', '-164px');
    } else if ($(".main-content").css("marginLeft")=='-1200px'){
      $('#blok4').removeClass('hidden');
      $('#indicatie1').addClass('active');
      $('#indicatie2').addClass('active');
      $('#indicatie3').addClass('active');
      $('#indicatie4').addClass('active');
      $('.main-indicatie-lijn-voortgang').css('margin-left', '0px');
    } else if ($(".main-content").css("marginLeft")=='-1600px'){
      $('#blok5').removeClass('hidden');
      $('.main-indicatie-lijn-voortgang').css('color', '#fff');
      $('.main-indicatie-lijn-voortgang').css('margin-left', '0px');
      $('.main-indicatie-lijn').addClass('eind');
    } else {
      $('#blok1').addClass('hidden');
      $('#blok2').addClass('hidden');
      $('#blok3').addClass('hidden');
      $('#blok4').addClass('hidden');
      $('#blok5').addClass('hidden');

      $('#indicatie2').removeClass('active');
      $('#indicatie3').removeClass('active');
      $('#indicatie4').removeClass('active');
      $('.main-indicatie-lijn').removeClass('eind');
      $('.main-indicatie-lijn-voortgang').css('color', '#E52884');
    }
  }, 0);
});






// BUTTON DISABLED ALS INPUT NIET IS INGEVULD
// function checkForm()
// {
//     var elements = document.forms[0].elements;
//
//     var cansubmit= true;
//     for(var i = 0; i < elements.length; i++)
//     {
//         if(elements[i].value.length == 0 && elements[i].type != "button")
//         {
//             cansubmit = false;
//         }
//
//     }
//
//     document.getElementById("myButton").disabled = !cansubmit;
// };


// CUSTOM SELECT MENU
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);


$(document).ready(function(){
  // ID
  $.each($('.select-items div'), function(ind) {
    $(this).attr('id', 'opleiding-' + parseInt(ind + 1));
  });

  // CLICK EVENT
  $('.select-items div').click(function(e) {
    if ($("#opleiding-1").hasClass("same-as-selected")) {
      $(".opleiding-optie").removeClass('visible');
      $("#opleiding-1-input").addClass('visible');
      $("#opleiding-empty").addClass('removed');
    } else if ($("#opleiding-2").hasClass("same-as-selected")) {
      $(".opleiding-optie").removeClass('visible');
      $("#opleiding-2-input").addClass('visible');
      $("#opleiding-empty").addClass('removed');
    } else if ($("#opleiding-3").hasClass("same-as-selected")) {
      $(".opleiding-optie").removeClass('visible');
      $("#opleiding-3-input").addClass('visible');
      $("#opleiding-empty").addClass('removed');
    } else if ($("#opleiding-4").hasClass("same-as-selected")) {
      $(".opleiding-optie").removeClass('visible');
      $("#opleiding-4-input").addClass('visible');
      $("#opleiding-empty").addClass('removed');
    } else if ($("#opleiding-5").hasClass("same-as-selected")) {
      $(".opleiding-optie").removeClass('visible');
      $("#opleiding-5-input").addClass('visible');
      $("#opleiding-empty").addClass('removed');
    } else {
      $(".opleiding-optie").removeClass('visible');
      $("#opleiding-empty").addClass('removed');
    }
  });
});


// HIDE TEXT INPUT (RADIO BUTTON CLICK EVENT)
$('input[type="radio"]').click(function(){
  if($(this).attr("value")=="leerling-extra_zorg-ja"){
    $(".leerling-extra_zorg-text").addClass("visible-input");
  }
  if($(this).attr("value")=="leerling-extra_zorg-nee"){
    $(".leerling-extra_zorg-text").removeClass("visible-input");
  }
});


// GOOGLE MAPS OPEN
$(function() {
  $(".show-map").click(function() {
    $(".main-content").addClass("maps");
    $('#map').addClass("map-visible");
    $('.hide-map').addClass("map-visible");
    $(".buttons").addClass("map-visible");
  });
  $(".hide-map").click(function() {
    $(".main-content").removeClass("maps");
    $('#map').removeClass("map-visible");
    $('.hide-map').removeClass("map-visible");
    $(".submit-map").removeClass("map-visible");

    $(".buttons").removeClass("map-visible");
  });
});

$("#map-zoeken").keyup(function() {
  if (!this.value) {
    $('#map-zoeken').css('marginBottom', '0');
    $(".submit-map").removeClass("map-visible");
  } else {
    $('#map-zoeken').css('marginBottom', '20px');
    $(".submit-map").addClass("map-visible");
  }
});

$('#map-zoeken').on('focusin', function() {
  console.log('focusin');

  $(this).off('keydown').keydown(function(event){
    if(event.keyCode == 13) {
      console.log('enter!');
      event.preventDefault();
      return false;
    }
  });
});

$(function() {
  $('#map-zoeken').keyup(function() {
    $('.input-button').text($(this).val());
    $('.input-button').css('color', '#fff');
  });
});

$(document).ready(function(){
  $(".hide-map").click(function(){
    $('.input-button').text($("#map-zoeken").val());
  });
  $(".submit-map").click(function(){
    $('.input-button').text($("#map-zoeken").val());
    $(".main-content").removeClass("maps");
    $('#map').removeClass("map-visible");
    $('.hide-map').removeClass("map-visible");
    $(".submit-map").removeClass("map-visible");
    $(".buttons").removeClass("map-visible");
  });

});


// GOOGLE MAPS LOCATIE SELECT
function initAutocomplete() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 52.3544833, lng: 4.8546422},
    zoom: 10,
    mapTypeId: 'roadmap',

    mapTypeControl: false,
    zoomControl: true,
    streetViewControl: false,
    fullscreenControl: false
  });

  function initMap() {
  }

  // Create the search box and link it to the UI element.
  var input = document.getElementById('map-zoeken');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      if (!place.geometry) {
        console.log("Deze plek bestaat niet.");
        return;
      }
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}



//SUBMIT BUTTON --- AFGEROND MELDING
$(function() {
  var form_data = $('.pdf-voorbeeld-overlay-content');

  $('#inlichtingformulier-form').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      type: 'post',
      url: 'model/form-data.php',
      data: $('#inlichtingformulier-form').serialize(),
      success:function(html){
        form_data.html(html);
      }
    });
  });

  $(".submit").click(function() {
    $(".main-blurred").addClass("afgerond");
    $('.main-indicatie').removeClass('loaded');
  });
  $(".formulier-afgerond-terug").click(function() {
    $(".main-blurred").removeClass("afgerond");
    $(".main-blurred").css("transition", ".8s");
    $('.main-indicatie').addClass('loaded');
  });
});


//PDF VOORBEELD TOGGLE
$(function() {
  $(".button-afgerond.wit").click(function() {
    $(".pdf-voorbeeld-overlay").addClass("visible");
    $(".container").addClass("visible");
    $(".pdf-voorbeeld-overlay-content").addClass("visible");
    $(".pdf-voorbeeld-overlay-buttons").addClass("visible");
  });
  $(".pdf-voorbeeld-overlay").click(function() {
    $(".pdf-voorbeeld-overlay").removeClass("visible");
    $(".container").removeClass("visible");
    $(".pdf-voorbeeld-overlay-content").removeClass("visible");
    $(".pdf-voorbeeld-overlay-buttons").removeClass("visible");
  });
  $(".pdf-overlay-sluiten").click(function() {
    $(".pdf-voorbeeld-overlay").removeClass("visible");
    $(".container").removeClass("visible");
    $(".pdf-voorbeeld-overlay-content").removeClass("visible");
    $(".pdf-voorbeeld-overlay-buttons").removeClass("visible");
  });
});



//FOOTER
var datumDiv = document.getElementById("copyright");
var datum = new Date();
datumDiv.innerHTML = 'Copyright &#169 ' + datum.getFullYear() + ' | <a href="https://rowinschmidt.nl/" target="_blank">Rowin Schmidt</a> | <a href="https://www.ma-web.nl/" target="_blank">Mediacollege</a>';
