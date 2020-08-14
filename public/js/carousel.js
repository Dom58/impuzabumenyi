$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });
    $(".item5").click(function(){
        $("#myCarousel").carousel(4);
    });
    
    $(".item6").click(function(){
        $("#myCarousel").carousel(5);
    });
    
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});

// ++++++++++++++Plus and minus font awesome ++++++++++++++
  $(document).ready(function (){
$('.collapse').on('shown.bs.collapse',function(){
$(this).parent().find('.fa-plus-circle').removeClass('fa-plus-circle').addClass('fa-minus-circle');
}).on('hidden.bs.collapse',function(){
$(this).parent().find('.fa-minus-circle').removeClass('fa-minus-circle').addClass('fa-plus-circle');
});

  });

 
  // Hover ibidukikije imisozi/ibiyaga
  $(document).ready(function(){

  $('#volcano_hills').popover();
  });

// Hover Ibyiciro by'intwari
  $(document).ready(function(){
  $('#intwari').popover();
  });



  

