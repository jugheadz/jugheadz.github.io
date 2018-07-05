$(document).ready(function(){
    
    /* sticky navigation */
    $('.js-about-section').waypoint(function(direction){
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else{
            $('nav').removeClass('sticky');
        }
    }, { 
        offset: '60px;'
    });
    
    /* scroll to about section when button clicked */
   $('.about-btn').click(function(){
        $('html, body').animate({scrollTop: $('.js-about-section').offset().top}, 1000);                
    });
    
  /* scroll to sections when navigation clicked */  
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
    $('.js-nav-toggle').click(function(){
        var nav = $('.nav-list');
        var icon = $('.js-nav-toggle i');
        
         nav.slideToggle(200);
        /*
        if (icon.hasClass('ion-navicon-round')){
            icon.addClass('ion-close-round');
            icon.removeClass('ion-navicon-round');
        }else{
            icon.addClass('ion-navicon-round');
            icon.removeClass('ion-close-round');
        }
       
        */
        
    });
    
});