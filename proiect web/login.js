
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
 
   
 
    if(scroll_top > jQuery(window).height()*1.2) {
      jQuery('.scroll-to-top-button').addClass('show');
    } else {
      jQuery('.scroll-to-top-button').removeClass('show');
    }
 

 
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
const container = document.querySelector(".container4"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");


    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })


    signUp.addEventListener("click", ( )=>{
        container.classList.add("active2");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active2");
    });

    function validateForm() {
        var usernameInput = document.forms["signupForm"]["username"];
        var emailInput = document.forms["signupForm"]["email"];
        var passwordInput = document.forms["signupForm"]["password"];
        var confirmPasswordInput = document.forms["signupForm"]["confirm_password"];

        if (usernameInput.value.trim() === "") {
            alert("Please enter your username.");
            usernameInput.focus();
            return false;
        }

        var email = emailInput.value.trim();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            emailInput.focus();
            return false;
        }

        var password = passwordInput.value.trim();
        if (password.length < 8) {
            alert("Password must be at least 8 characters long.");
            passwordInput.focus();
            return false;
        }
        var passwordPattern = /^(?=.*\d)(?=.*[a-zA-Z]).{8,}$/;
        if (!passwordPattern.test(password)) {
            alert("Password must contain at least one digit.");
            passwordInput.focus();
            return false;
        }

        if (password !== confirmPasswordInput.value.trim()) {
            alert("Passwords do not match.");
            confirmPasswordInput.focus();
            return false;
        }

        return true;
    }

    function validateEmail() {
      var emailInput = document.getElementById("email1");
      var email = emailInput.value.trim();
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
      if (!emailPattern.test(email)) {
          alert("Please enter a valid email address.");
          emailInput.focus();
          return false; 
      }
      return true; 
  }
