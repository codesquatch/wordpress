
jQuery(function ($) {

    // Bootstrap isn't changing the main menu when the screen resized, so we do it ourselves
    $( window ).resize(function(){
      if ($(window).width() > 992) {
        // Remove Bootstraps `in` class
        $('.navbar .navbar-collapse').removeClass('in');
        // Set the .navbar-toggle to false instead of true
        $('.navbar-toggle').attr('aria-expanded', 'false');
        // Add collapsed class to our .navbar toggle so we can change the background to white
        $('.navbar-toggle').addClass('collapsed');
        // Remove the dropdown-toggled class to get rid of the grey background
        $('.navbar-default').removeClass('dropdown-toggled');

        if ($('#main-menu-collapse .navbar-nav').children().hasClass('menu-open')) {
          $('#main-menu-collapse ul').css('display', '');
          $('#main-menu-collapse .navbar-nav').closest('li').removeClass('menu-open');
        }
      }
    });
    //
    $ ( window ).scroll(function(){
      if ($( window ).scrollTop() >= 75) {
        // Show our "To Top" arrow
        $('#scroll-menu').addClass('scroll-menu-appear');
        if ($('#content #menu-toggle').length == 0) {
          $('.navbar #menu-toggle').clone();
          $('.navbar #menu-toggle').appendTo('#scroll-menu');
        }
        // Our `Survival becomes second nature text`
        if ($(window).scrollTop() >= 300) {
          $('.battle .pull-left').addClass('left-sliding-text');
        }
        else {
          $('.battle .pull-left').removeClass('left-sliding-text');
        }
        // Friend or Foe text
        if ($(window).scrollTop() >= 973) {
          $('.friend-or-foe .pull-right').addClass('right-sliding-text');
        }
        else {
          $('.friend-or-foe .pull-right').removeClass('right-sliding-text');
        }
        // Dragon Warrior text
        if ($(window).scrollTop() >= 1545) {
          $('.dragon-warrior .pull-left').addClass('left-sliding-text');
        }
        else {
          $('.dragon-warrior .pull-left').removeClass('left-sliding-text');
        }
      }
      else {
        $('#scroll-menu').removeClass('scroll-menu-appear');
        if ($('.navbar #menu-toggle').length == 0) {
          $('#scroll-menu #menu-toggle').insertBefore('.search');
        }
      }
    });

    // Open our side menu if we click the "Menu" button
    $('#menu-toggle').on('click', function(e){
      $('#main-menu-toggle').toggleClass('menu-open');
      $('body').toggleClass('open-body');
      $('#page').css('opacity', '0.3');
      $('#menu-toggle').hide();
    });
    // Close the side menu if we click the X
    $('#menu-close').on('click', function(){
      $('#main-menu-toggle').toggleClass('menu-open');
      $('body').toggleClass('open-body');
      $('#menu-toggle').show();
      $('#page').css('opacity', '1');
    });

    // Close the side menu bar if we click on the body of the page
    $("#page").click(function(e) {
       if ($("#main-menu-toggle").css('left') == '0px') {
        $('#main-menu-toggle').toggleClass('menu-open');
        $('body').toggleClass('open-body');
        $('#menu-toggle').show();
        $('#page').css('opacity', '1');
      }
  });

    // Adds accordion functionality to the side menu items
    $('.menu-main-menu-container > ul > li a').on('click', function() {

    	var checkElement = $(this).next();

    	$('.menu-main-menu-container li').removeClass('active');
    	$(this).closest('li').addClass('active');

    	if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    		$(this).closest('li').removeClass('active');
    		checkElement.slideUp('slow');
    		$(this).parent('li').removeClass('expanded');
    	}

    	if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
      	$(this).parent('li').addClass('expanded');
    		checkElement.slideDown('slow');
    	}

    	if (checkElement.is('ul')) {
    		return false;
    	}
    	else {
    		return true;
    	}
    });

    $('.connect-text a').tooltip({
      title: 'Click to Play',
    });

});