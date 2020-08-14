
// ++++++++++++++++++ Affix class +++++++++++++++++++++++++++++++

// $(function(){
//     $('.navbar').affix({
    
//     });
// });


$(document).ready(function(){
  var btt= $('.back-to-top');
// $(window).on('scroll',function () {
//   console.log('scrolled');
// });   
// ++++++++++++++++++++++ remove the below codes to check scrolling++++++++++++++++++++++


btt.on('click',function(e){
  // $('html,body').animate({
  //   scrollTop: 0;
  // },500 or'slow');
  // e.preventDefault();
});

  $(window).on('scroll',function(){

var self= $(this),
    height = self.height(),
    top = self.scrollTop();
    if( top > height){

      if(!btt.is(':visible')){
        btt.show();
      }
    }
    else{
      btt.hide();

    }
  });
});

// accordion js on share font awersome

//   var accordions= document.getElementsByClassName("accordion");
// for (var i = 0; i < accordions.length; i++) {
//   accordions[i].onclick=function(){
//     var content=this.nextElementSibling;

//     if (content.style.maxHeight){
//       // acccordion open /close
// content.style.maxHeight=null;
//     }
//     else{
//       content.style.maxHeight =content.scrollHeight +"px";

//     }
//   }
// }

