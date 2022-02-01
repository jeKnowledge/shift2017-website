function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = document.getElementById('days');
  var hoursSpan = document.getElementById('hours');
  var minutesSpan = document.getElementById('minutes');
  var secondsSpan = document.getElementById('seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

$(document).ready(function() {
  var wHeight = $(window).height();
  $('.faqs p').hide();

  if($('#clockdiv').length>0){
    var deadline = new Date(Date.parse('2017-02-17 13:00:00'));
    initializeClock('clockdiv', deadline);
  }

  if($('#clockdivHackathon').length>0){
    var deadline = new Date(Date.parse('2017-02-19 15:30:00'));
    initializeClock('clockdiv', deadline);
  }

});

$('.clickable').click(function() {
  $(this).parent().children('p').toggle( "slow" );
  $(this).children('.icon').children('.two').toggleClass('animateClose');
});

$('.index').scroll(function() {
  if($('.slide-one').length > 0 && $('.slide-one').offset().top<120) {

    $('header').css('background-color','#E62A44');
  }

  if($('.slide-two').length > 0 && $('.slide-two').offset().top<100) {
    $('header').css('background-color','#222222');
    // $('header').animate({ backgroundColor: '#222222' }, "slow");
  }
});

$(".c-hamburger").click(function(){
    $(".c-hamburger").toggleClass("is-active");
    if( $(".c-hamburger").hasClass("is-active")) {
      $(".header-main-menu").show();
    }
    else {
      $(".header-main-menu").hide("slow");
    }

});

$( window ).resize(function() {
  if ($(window).width() > 1100) {
    $(".header-main-menu").css({'display': 'block'});
  }
});

if($('#tabs').length>0){
  $("a.tab-title").click(function(event){
      event.preventDefault();
  });
  $('.tab-title').click(function() {
    $('.tab-title button').removeClass('selected');
    $(this).children('button').addClass('selected');
    $('.tab-content').removeClass('selected');
    $($(this).attr('href')).addClass('selected');
  });
}

if($('.photoFile').length>0){
    document.getElementById('photoFile').onchange = function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                $('.photo img').attr('src', fr.result);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    }
}

$('input[name="student"]').change(function() {
  if($(this).val() == 1){
    $('.student').removeClass('hide');
    $('.not-student').addClass('hide');
  }
  else {
    $('.student').addClass('hide');
    $('.not-student').removeClass('hide');
  }
});



// Get the modal
$('.modal-button').click(function() {
  $modalId = $(this).data('modal');

  if($modalId == 'removeModal'){
    $('input[name="remove_shifter"]').val($(this).data('shifter'));
  }

  if($modalId == 'detailModal'){
    $('h4.name').html('<strong>' + $(this).data('name') + '</strong>');
    $('p.description').html($(this).data('description'));
  }

  // Get the modal
  var modal = document.getElementById($modalId);
  modal.style.display = "block";

  // Get the <span> element that closes the modal
  var close = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  close.onclick = function() {
      modal.style.display = "none";
  }

  // Get the <span> element that closes the modal
  var cancel = document.getElementsByClassName("cancel")[0];

  if(cancel != null) {
    // When the user clicks on <span> (x), close the modal
    cancel.onclick = function() {
        modal.style.display = "none";
    }
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
})

$('#search-shifters-button').click(function() {
  $.ajax({
      url: '/json/searchShifters', 
      data: { string: $('#search-shifters-string').val() }, 
      // headers: {
      //       'X-XSRF-TOKEN': $('input[name="_token"]').val()
      //   },
      complete: function(data) {
        var response = jQuery.parseJSON(data.responseText);
        console.log(response.length);
        if(response.length>0){
          $('.list-shifters > tbody').html('');
          $.each(response, function(i, item) {
            var shifter = $('<tr class=\"shifter\" data-id=\"' + item.id + '\">').append($('<td>').html(item.name)).appendTo('.list-shifters > tbody');
          });
          $('#search-shifters-button').hide();
          $('.hide').removeClass('hide');
        }
        else {
          $('.search-shifters').parent().append('404 - Shifter not found, tenta outra vez');
        }
      }
    });
})

$('#search-shifters-string').on('keypress', function(event){
  if(event.keyCode == 13){
    event.preventDefault();
    $.ajax({
        url: '/json/searchShifters', 
        data: { string: $('#search-shifters-string').val() }, 
        // headers: {
        //       'X-XSRF-TOKEN': $('input[name="_token"]').val()
        //   },
        complete: function(data) {
          var response = jQuery.parseJSON(data.responseText);
          if(response.length>0){
            $('.list-shifters > tbody').html('');
            $.each(response, function(i, item) {
              console.log(item);
              var shifter = $('<tr class=\"shifter\" data-id=\"' + item.id + '\">').append($('<td>').html(item.name)).appendTo('.list-shifters > tbody');
            });
            $('#search-shifters-button').hide();
            $('.hide').removeClass('hide');
          }
          else {
            $('.search-shifters').parent().append('404 - Shifter not found, tenta outra vez');
          }
        }
      });
  }
});


$('.list-shifters').on('click', 'tr', function() {
  $('.selected').removeClass('selected');
  $('input[name="add_shifter"]').val($(this).data('id'));
  $(this).addClass('selected');
});
