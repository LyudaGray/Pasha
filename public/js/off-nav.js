$("#showmenu").click(function(e){

  e.preventDefault();


});

 

$("#menu a").click(function(event){

  event.preventDefault();

  if($(this).next('ul').length){

    $(this).next().toggle('fast');

    $(this).children('i:last-child').toggleClass('fa-caret-down fa-caret-left');

  }

});
