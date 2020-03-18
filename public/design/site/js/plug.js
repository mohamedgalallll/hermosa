$(document).ready(function() {
  $('#carousel1').owlCarousel({
    loop:true,
    margin:2,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
$('#carousel_salons').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 2
        },
        1000: {
            items: 4.5
        }
    }
});
$('#carousel_in_home').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    navText: ['<i class="fa fa-angle-left "></i>', '<i class="fa fa-angle-right "></i>'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});
    $(".set-filter > a").on("click", function() {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this)
          .siblings(".content-filter")
          .slideUp(200);
          $(this)
              .find("i")
          .removeClass("fa-minus")
          .addClass("fa-plus");
      } else {
        $(this)
          .find("i")
          .removeClass("fa-plus")
          .addClass("fa-minus");
        $(this).addClass("active");
        // $(".content-filter").slideUp(200);
        $(this)
          .siblings(".content-filter")
          .slideDown(200);
      }
    });
    $('#carousel3').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplayHoverPause:true,
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          1000: {
              items: 2
          }
      }
    });$('#carousel4').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      autoplayHoverPause:true,
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          1000: {
              items: 3
          }
      }
    });
    $(".set > a ").on("click", function() {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this).parent().removeClass("border-card");
        $(this)
          .siblings(".content")
          .slideUp(200);
        $(".set > a .i-salon")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
      } else {
        $(this)
          .find(".i-salon")
            .removeClass("fa-angle-down")
            .addClass("fa-angle-up");
        $(".set > a").removeClass("active");
        $(".set > a").parent().removeClass("border-card");
        $(this).addClass("active");
        $(this).parent().addClass("border-card");
        $(".content").slideUp(200);
        $(this)
          .siblings(".content")
          .slideDown(200);
      }
    });
    
    $('.js-example-basic-single').select2();

    $('.dating').pickadate();

    $(".custom-p").click(function(){
      $(".hidden-time").slideToggle();
    });
    $(".custom-p-date").click(function(){
        $(".hidden-time").slideToggle();
    });
    $(".choosingDate").click(function(){
        $(".hidden-date").slideToggle();
    });
    $(".my-custom-p").click(function(){
        $(".hidden-time").slideUp();
    });
    $(".myCustomP").click(function(){
        $(".hidden-date").slideUp();
    });
    $(".infMap").click(function(){
        $(".hidden-time").slideUp();
        $(".hiddenDate").slideUp();
        $(".hiddenTime").slideUp();
        $(".hiddenMap").slideToggle();
    });
    $(".infDate").click(function(){
        $(".hidden-time").slideUp();
        $(".hiddenTime").slideUp();
        $(".hiddenMap").slideUp();

        $(".hiddenDate").slideToggle();
    });
    $(".infTime").click(function(){
        $(".hidden-time").slideUp();
        $(".hiddenMap").slideUp();
        $(".hiddenDate").slideUp();
        $(".hiddenTime").slideToggle();
    });
  });
$(document).ready(function(){
    $(window).scroll(function() {
        if($(this).scrollTop() > 40){
            $("#btn-top").fadeIn();
        }else{
            $("#btn-top").fadeOut();
        }
    });
    $("#btn-top").click(function(){
        $('html , body').animate({scrollTop : 0} ,800);
    });

    $(".enter").click(function(){
        var chooseDate = $(this).find('.chooseDate').val();
        $(".myadd").html(chooseDate);
    });

     $(".chTime").click(function(){
         var chooseTime = $(this).find('.chooseTime').val();
         $(".myadd2").html(chooseTime);
     });

    $(".enter").click(function(){
        var addDate = $(this).find('.chooseDate').val();
        $(".addDate").html(addDate);
    });

    $(".chTime").click(function(){
        var chooseTime = $(this).find('.chooseTime').val();
        $(".addTime").html(chooseTime);
    });

    $( "#from, #to" ).change(function() {
        $(".addTime").html( 'من ' + $('#from').val() + ' الى ' +$('#to').val());
        $('.receiveTime').html( 'من ' + $('#from').val() + ' الى ' +$('#to').val());
    });
    $( "#fromTime, #toTime" ).change(function() {
        $(".myadd2").html( 'من ' + $('#fromTime').val() + ' الى ' +$('#toTime').val());
        $('.receive-time').html( 'من ' + $('#fromTime').val() + ' الى ' +$('#toTime').val());
    });
    $( "#fromTime1, #toTime1" ).change(function() {
        $(".addTime").html( 'من ' + $('#fromTime1').val() + ' الى ' +$('#toTime1').val());
    });
    $( "#dateSearch" ).change(function() {
        var dateSearch = $('#dateSearch').val();
        $(".addDate").html(dateSearch);
        $(".custom-p-date").html(dateSearch);
    });
    $( "#dateSearchHome" ).change(function() {
        var dateSearch = $('#dateSearchHome').val();
        $(".addDate").html(dateSearch);
        $(".custom-p-date").html(dateSearch);
    });
    $( "#myDateSearch" ).change(function() {
        var dateSearch = $('#myDateSearch').val();
        $(".myadd").html(dateSearch);
        $(".choosingDate").html(dateSearch);
    });


    $(".icon-color").click(function () {
       $('.custom-control-input').prop('checked', false);
    });

    $('.chats_menu .hover-user').click(function () {
        $(this).siblings('.hover-user').removeClass('active-user');
        $(this).addClass('active-user');
    });
});
