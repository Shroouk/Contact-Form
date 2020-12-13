/* global $,alert,console*/
$(function(){
  'use strict';


var uerror= true;
var emerror= true;
var msgerror= true;



/*------------------- username error ---------------------------*/
$('.username').blur(function(){
  if ($(this).val().length <3) {
    $(this).css('border','1px solid #f00');
    $('.u-error').html("<p>username must be larger than 3 characters!</p>");
    $('.u-error').css('color','#f00');
    $(this).parent().find('.asterisx').fadeIn(100);
    uerror=true;

  } else {
      $(this).css('border','1px solid #080');
      $(this).parent().find('.asterisx').fadeOut(100);
      $('.u-error').fadeOut(100);
      uerror=false;
  }


});

/*-------------------------- email error -----------------------------------*/

$('.email').blur(function(){
  if ($(this).val()==='') {
    $(this).css('border','1px solid #f00');
    $('.e-error').html("<p>This field can't be empty!</p>");
    $('.e-error').css('color','#f00');
    $(this).parent().find('.asterisx').fadeIn(100);
    emerror=true;

  } else {
      $(this).css('border','1px solid #080');
      $(this).parent().find('.asterisx').fadeOut(100);
      $('.e-error').fadeOut(100);
      emerror=false;
  }

});

/*---------------------- message error ------------------------*/

$('.message').blur(function(){
  if ($(this).val()==='') {
    $(this).css('border','1px solid #f00');
    $('.m-error').html("This field can't be empty!");
    $('.m-error').css('color','#f00');
    $(this).parent().find('.asterisx').fadeIn(100);
    msgerror=true;

  } else {
      $(this).css('border','1px solid #080');
      $(this).parent().find('.asterisx').fadeOut(100);
      $('.m-error').fadeOut(100);
      msgerror=false;
  }

});


/*----------------------------- submit form validation ----------------------------------*/

/*
$('.contact-form').submit(function(e){
  if(uerror===true || emerror===true || msgerror===true){
    e.preventDefault();
    $('.username, .email, .message').blur();

}
})
*/
});
