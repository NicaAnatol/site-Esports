
jQuery('body').on('click', '.nav-butter.hidden_menu', function () {
    if (jQuery(this).hasClass('active')) {
      jQuery(this).removeClass('active').parent().find('.navigation').removeClass('active');
    } else {
      jQuery(this).addClass('active').parent().find('.navigation').addClass('active');
    }
  }).on('click', '.nav-butter.side_menu', function () {
    if (jQuery(this).hasClass('active')) {
      jQuery(this).removeClass('active');
      jQuery('.side-navigation').removeClass('active');
    } else {
      jQuery(this).addClass('active');
      jQuery('.side-navigation').addClass('active');
    }
  }).on('click', '.nav-butter.fullscreen', function () {
    jQuery(this).toggleClass('active');
    jQuery('.fullscreen-navigation-area').toggleClass('active');
  }).on('click', '.side-navigation a', function (e) {
    var $el = jQuery(this),
      $parent = $el.parent();
 
    if ($parent.hasClass('menu-item-has-children') && !$parent.hasClass('active')) {
      e.preventDefault();
 
      $parent.addClass('hide active').siblings().addClass('hide');
      $el.parents('.sub-menu').addClass('opened');
    }
  }).on('click', '.side-navigation .sub-menu > .back', function () {
    var $el = jQuery(this);
 
    $el.parent().parent().removeClass('hide active').siblings().removeClass('hide');
    $el.parent().parent().removeClass('opened').parent().removeClass('opened');
  }).find('.side-navigation .sub-menu').prepend('<li class="back free-basic-ui-elements-left-arrow"></li>');
 
 
  jQuery(window).on('load scroll', function () {
    var scroll_top = jQuery(document).scrollTop();
 
    if (scroll_top > 50) {
      jQuery('header.site-header').addClass('fixed');
    } else {
      jQuery('header.site-header').removeClass('fixed');
    }
 
    if(scroll_top > jQuery(window).height()*1.2) {
      jQuery('.scroll-to-top-button').addClass('show');
    } else {
      jQuery('.scroll-to-top-button').removeClass('show');
    }
 
    jQuery('.screen-section').each(function () {
      var this_scroll_top = parseInt(jQuery(this).offset().top - jQuery('#wpadminbar').height()),
        this_h = parseInt(jQuery(this).height());
 
      if (scroll_top >= this_scroll_top && scroll_top < (this_scroll_top + this_h)) {
        jQuery('header.site-header').addClass('hide-header');
      } else {
        jQuery('header.site-header').removeClass('hide-header');
      }
    });
 
    if (scroll_top > (jQuery(window).height() * 1.2)) {
      jQuery('.scroll-up-arrow').addClass('show');
    } else {
      jQuery('.scroll-up-arrow').removeClass('show');
    }
  });
 
 
 
  var nav_el = '';
  if (jQuery('.navigation').hasClass('visible_menu')) {
    nav_el = 'yes';
  }
 
  jQuery(window).on('load resize', function () {
    var window_height = jQuery(window).height() - jQuery('.header-space:visible').height() - jQuery('#wpadminbar').height();
 
    jQuery('.full-height').css('height', window_height);
 
    jQuery('.main-container, .protected-post-form').css('min-height', window_height - jQuery('.page-top-block').outerHeight() - jQuery('.site-footer').outerHeight());
 
    if (nav_el == "yes") {
      if (jQuery(window).width() >= 992) {
        jQuery('.navigation, .site-header .nav-butter').addClass('visible_menu').removeClass('hidden_menu');
      } else {
        jQuery('.navigation, .site-header .nav-butter').removeClass('visible_menu').addClass('hidden_menu');
      }
    }});
  
 
  jQuery('.fullscreen-navigation').each(function() {
    var $this = jQuery(this);
 
    $this.find('.sub-menu, .children').each(function() {
      jQuery(this).prepend('<li class="back pointers-left-arrow"></li>');
    });
 
    $this.on('click', '.menu-item-has-children > a', function(e) {
      if (!jQuery(this).hasClass('current')) {
        e.preventDefault();
        jQuery(this).addClass('current hidden').parent().siblings().addClass('hidden').find('a.current').removeClass('current');
      } else if (jQuery(this).attr('href') == '' || jQuery(this).attr('href') == '#') {
        e.preventDefault();
        jQuery(this).removeClass('current hidden').parent().siblings().removeClass('hidden');
      }
    }).on('click', 'li.back', function() {
      jQuery(this).parent().prev().removeClass('current hidden').parent().siblings().removeClass('hidden');
    });
  });
 
 
 
 window.addEventListener('load', function() {
     const loadingDiv = document.getElementById('loading1');  
     loadingDiv.style.display = 'none';  
 });
 function scrollToSection(sectionId) {
     const section = document.getElementById(sectionId);
     section.scrollIntoView({
         behavior: 'smooth'
     });
 }
 
 function validateEmail(email) {
   const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   return re.test(String(email).toLowerCase());
 }
 
 document.addEventListener("DOMContentLoaded", function() {
   const form = document.getElementById("emailForm");
   const emailInput = form.querySelector('input[name="EMAIL"]');
   const messageDiv = document.getElementById("message");
 
   form.addEventListener("submit", function(event) {
       const email = emailInput.value;
 
       messageDiv.textContent = '';
 
       if (!validateEmail(email)) {
           event.preventDefault(); 
           messageDiv.textContent = "Invalid email format.";
           messageDiv.classList.add('error');
       } else {
           messageDiv.classList.remove('error');
       }
   });
 });