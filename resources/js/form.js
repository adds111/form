
$(document).ready(function (){

  $('.b').on('click', function (){
      history.back();
      console.log("qqq");
  });
  $('.n').on('click', function (){
      history.forward();
      console.log("aaaa");
  });


});
