
window.addEventListener('load', function() {
  const loadingDiv = document.getElementById('loading1');  
  loadingDiv.style.display = 'none';  
});

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
  const slides = document.querySelectorAll('.swiper-slide1');
  const pagination = document.querySelectorAll('.pagination1 .dot');
  const lines = document.querySelectorAll('.pagination1 .diagonal-line');
  
  let currentSlide = 0;
  let startX1 = 0;
  let isSwiping = false; 
  
  function resetAnimations() {
      slides.forEach((slide) => {
          const newText = slide.querySelector(".slide-text1").cloneNode(true);
          const newButton = slide.querySelector(".slide-button1").cloneNode(true);
  
          const textElement = slide.querySelector(".slide-text1");
          const buttonElement = slide.querySelector(".slide-button1");
  
          textElement.parentNode.replaceChild(newText, textElement);
          buttonElement.parentNode.replaceChild(newButton, buttonElement);
      });
  }
  
  function goToSlide(index) {
      slides.forEach((slide, i) => {
          slide.style.transform = `translateX(${(i - index) * 100}%)`;
      });
  
      pagination.forEach(dot => dot.classList.remove("active1"));
      pagination[index].classList.add("active1");
  
      currentSlide = index;
  
      resetAnimations();
  }
  
  pagination.forEach((dot, dotIndex) => {
      dot.addEventListener("click", (e) => {
          const slideIndex = parseInt(e.target.getAttribute("data-slide"));
          goToSlide(slideIndex);
  
          lines.forEach(line => line.classList.remove("rotating")); 
  
          if (dotIndex < pagination.length - 1) {
              lines[dotIndex].classList.add("rotating");
          }
      });
  });
  
  const swiperContainer = document.querySelector(".swiper-container1");
  
  swiperContainer.addEventListener("touchstart", (e) => {
      startX1 = e.touches[0].clientX; 
      isSwiping = true; 
  });
  
  swiperContainer.addEventListener("mousedown", (e) => {
      startX1 = e.clientX;
      isSwiping = true;
  });
  
  function handleSwipe(endX) {
      if (isSwiping) {
          const swipeDistance = endX - startX1; 
  
          if (swipeDistance > 50 && currentSlide > 0) {
              goToSlide(currentSlide - 1);
          } else if (swipeDistance < -50 && currentSlide < slides.length - 1) { 
              goToSlide(currentSlide + 1);
          }
  
          isSwiping = false; 
      }
  }
  
  

        const openButton = document.getElementById('openVideoButton');
  const closeSVG = document.getElementById('closeSVG');
  const videoContainer = document.getElementById('videoContainer');
  

  openButton.addEventListener('click', function () {
      videoContainer.style.display = 'flex';
  });
  

  closeSVG.addEventListener('click', function () {
      videoContainer.style.display = 'none';
  });
  

  videoContainer.addEventListener('click', function (event) {
      if (event.target === videoContainer) {
          videoContainer.style.display = 'none';
      }
  });
        function animateCounter(element, start, end, duration) {
              let startTime = null;
  
              function animationStep(currentTime) {
                  if (!startTime) {
                      startTime = currentTime;
                  }
                  
                  const elapsedTime = currentTime - startTime;
                  const progress = Math.min(elapsedTime / duration, 1);  
                  const currentCount = Math.floor(start + (end - start) * progress);  
                  
                  element.textContent = currentCount; 
                  
                  if (progress < 1) {
                      requestAnimationFrame(animationStep); 
                  }
              }
  
              requestAnimationFrame(animationStep); 
          }
  
          function animateCounter(element, start, end, duration) {
              let startTime = null;
  
              function animationStep(currentTime) {
                  if (!startTime) {
                      startTime = currentTime;
                  }
  
                  const elapsedTime = currentTime - startTime;
                  const progress = Math.min(elapsedTime / duration, 1); 
                  const currentCount = Math.floor(start + (end - start) * progress);  
  
                  element.textContent = currentCount;  
  
                  if (progress < 1) {
                      requestAnimationFrame(animationStep);
                  }
              }
  
              requestAnimationFrame(animationStep); 
          }
  

          function onIntersect(entries, observer) {
              entries.forEach((entry) => {
                  if (entry.isIntersecting) { 
                      const target = entry.target;
                      const targetValue = parseInt(target.dataset.target, 10); 
                      animateCounter(target, 0, targetValue, 2000);  
                      observer.unobserve(target);  
                  }
              });
          }
  

          const observer = new IntersectionObserver(onIntersect, {
              root: null,  
              rootMargin: '0px', 
              threshold: 0.5 
          });
  
  
          
          window.addEventListener('DOMContentLoaded', function() {
              const counterContainers = document.querySelectorAll('.counter-container');  
              counterContainers.forEach((container) => {
                  const counter = container.querySelector('.counter');  
                  observer.observe(counter); 
              });
          });

          function scrollToSection(sectionId) {
              const section = document.getElementById(sectionId);
              section.scrollIntoView({
                  behavior: 'smooth'
              });
          }

          const wrapper = document.querySelector(".wrapper");
  const carousel = document.querySelector(".carousel");
  const firstCardWidth = carousel.querySelector(".card").offsetWidth;
  const arrowBtns = document.querySelectorAll(".wrapper i");
  const carouselChildrens = [...carousel.children];
  
  let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;
  

  let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);
  

  carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
      carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
  });

  carouselChildrens.slice(0, cardPerView).forEach(card => {
      carousel.insertAdjacentHTML("beforeend", card.outerHTML);
  });
  
  carousel.classList.add("no-transition");
  carousel.scrollLeft = carousel.offsetWidth;
  carousel.classList.remove("no-transition");
  
  arrowBtns.forEach(btn => {
      btn.addEventListener("click", () => {
          carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
      });
  });
  
  const dragStart = (e) => {
      isDragging = true;
      carousel.classList.add("dragging");
      carousel.classList.add("no-transition");
      startX = e.pageX;
      startScrollLeft = carousel.scrollLeft;
  }
  
  const dragging = (e) => {
      if(!isDragging) return; 
      carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
  }
  
  const dragStop = () => {
      isDragging = false;
      carousel.classList.remove("dragging");
      carousel.classList.remove("no-transition");
      carousel.classList.add("transition");
  }
  
  const infiniteScroll = () => {

      if(carousel.scrollLeft === 0) {
          carousel.classList.add("no-transition");
          carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
          carousel.classList.remove("no-transition");
      }

      else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
          carousel.classList.add("no-transition");
          carousel.scrollLeft = carousel.offsetWidth;
          carousel.classList.remove("no-transition");
      }
  
      clearTimeout(timeoutId);
      if(!wrapper.matches(":hover")) autoPlay();
  }
  
  const autoPlay = () => {
      if(window.innerWidth < 800 || !isAutoPlay) return; 
      timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
  }
  autoPlay();
  
  carousel.addEventListener("mousedown", dragStart);
  carousel.addEventListener("mousemove", dragging);
  document.addEventListener("mouseup", dragStop);
  carousel.addEventListener("scroll", infiniteScroll);
  wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
  wrapper.addEventListener("mouseleave", autoPlay);


  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.match-item a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const matchData = JSON.parse(this.getAttribute('data-match'));
            const url = 'matches_generator.php';
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(matchData),
            })
            .then(response => {
            })
            .catch(error => {
                console.error('Error sending data to PHP:', error);
            });
        });
    });

    document.querySelector('.loadmore-button').addEventListener('click', function() {
        this.classList.add('loading');
        fetch('fetch_matches.php')
            .then(response => response.json())
            .then(data => {
                this.classList.remove('loading');

                const container = document.querySelector('.obiect');
                data.forEach(match => {
                    const matchItem = document.createElement('div');
                    matchItem.className = 'match-item event-box istp-item';
                    matchItem.setAttribute('data-category', match.categorie);

                    matchItem.innerHTML = `
                        <div class="wrap">
                            <div class="game-team">
                                <div class="item">
                                    <div class="logo">
                                        <img src="${match.team1_image}" class="teamlogo" title="${match.team1_name}">
                                    </div>
                                    <div class="title">${match.team1_name}</div>
                                    <div class="points">${match.team1_score}</div>
                                </div>
                                <div class="sep">vs</div>
                                <div class="item">
                                    <div class="logo">
                                        <img src="${match.team2_image}" class="teamlogo" title="${match.team2_name}">
                                    </div>
                                    <div class="title">${match.team2_name}</div>
                                    <div class="points">${match.team2_score}</div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="heading">
                                    <a  href="matches_generator.php?id=${match.id}" data-match='${JSON.stringify(match)}'>${match.league_name} &#8211; ${match.categorie}</a>
                                </div>
                                <div class="date">${new Date(match.date).toLocaleString()}</div>
                            </div>
                        </div>
                        <div class="links">
                            <a href="${match.twitch_link}" class="stream-link twitch" target="_blank">
                                <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 268">
                                    <path fill="currentColor" d="M17.458 0L0 46.556v186.201h63.983v34.934h34.931l34.898-34.934h52.36L256 162.954V0zm23.259 23.263H232.73v128.029l-40.739 40.741H128L93.113 226.92v-34.886H40.717zm64.008 116.405H128V69.844h-23.275zm63.997 0h23.27V69.844h-23.27z"/>
                                </svg></i>
                                <span>twitch stream</span>
                            </a>
                            <a href="${match.youtube_link}" class="stream-link youtube" target="_blank">
                                <i class=""><svg width="1em" height="1em" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 461.001 461.001" xml:space="preserve">
                                    <g>
                                        <path fill="currentColor" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/>
                                    </g>
                                </svg></i>
                                <span>youtube stream</span>
                            </a>
                        </div>
                    `;

                    container.appendChild(matchItem);
                });

                document.querySelectorAll('.link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const matchData = JSON.parse(this.getAttribute('data-match'));
                        displayMatchDetails(matchData);
                    });
                });

                const targetButton = document.querySelector('.loadmore-button-block');
                if (targetButton) {
                    targetButton.remove();
                }
            })
            .catch(error => {
                console.error('Error fetching matches:', error);
                this.classList.remove('loading');
            });
    });
});




document.addEventListener("DOMContentLoaded", function() {
  const filterButtons = document.querySelectorAll(".filter-buttons .button");

  const observeNewItems = function(targetNode) {
      const config = { childList: true, subtree: true };
      const callback = function(mutationsList, observer) {
          for (let mutation of mutationsList) {
              if (mutation.type === 'childList') {
                  mutation.addedNodes.forEach(function(node) {
                      if (node.nodeType === 1 && node.classList.contains("match-item")) {
                      }
                  });
              }
          }
      };
      const observer = new MutationObserver(callback);
      observer.observe(targetNode, config);
  };

  const targetNode = document.querySelector('.obiect');
  if (targetNode) {
      observeNewItems(targetNode);
  }

  filterButtons.forEach(button => {
      button.addEventListener("click", function() {
          const filter = this.getAttribute("data-filter");

          filterButtons.forEach(btn => btn.classList.remove("current"));
          this.classList.add("current");

          const matchItems = document.querySelectorAll(".match-item");

          matchItems.forEach(item => {
              if (filter === "*" || item.getAttribute("data-category") === filter) {
                  if (item.classList.contains("hidden1")) {
                      item.classList.remove("hidden1");
                      item.classList.add("appearing");
                      item.classList.remove("disappearing");
                  }
              } else {
                  if (!item.classList.contains("hidden1")) {
                      item.classList.add("disappearing");
                      item.classList.remove("appearing");
                      setTimeout(() => {
                          item.classList.add("hidden1");
                      }, 200);
                  }
              }
          });

          if (filter !== "*") {
              const loadMoreButton = document.querySelector('.loadmore-button-block');
              if (loadMoreButton) {
                  loadMoreButton.style.display = "none";
              }
          } else {
              const loadMoreButton = document.querySelector('.loadmore-button-block');
              if (loadMoreButton) {
                  loadMoreButton.style.display = "block";
              }
          }
      });
  });
});
document.addEventListener("DOMContentLoaded", function() {
  const fortniteButton = document.querySelector(".filter-buttons [data-filter='fortnite']");
  const matchContainer = document.querySelector('.matches-block');
  let fortniteMatch = null;

  const addFortniteMatch = function() {
    if (!fortniteMatch) {
      fortniteMatch = document.createElement('div');
      fortniteMatch.classList.add('match-item', 'event-box', 'istp-item'); 
      fortniteMatch.setAttribute('data-category', 'fortnite');
      fortniteMatch.innerHTML = `
        <div class="wrap">
          <div class="game-team">
            <div class="item">
              <div class="logo"><img alt="Rebels" src="https://img-cdn.hltv.org/teamlogo/vfupmnriFumqC8u48wFIdm.png?ixlib=java-2.1.0&amp;w=50&amp;s=f88ee3468bbd8661c4d9e40b2eddda29" class="teamlogo" srcset="https://img-cdn.hltv.org/teamlogo/vfupmnriFumqC8u48wFIdm.png?ixlib=java-2.1.0&amp;w=100&amp;s=2ff8b2264de9a198450fe4ba845dd1e9 2x" title="Rebels"></div>
              <div class="title">Rebels</div>
              <div class="points">150</div>
            </div>
            <div class="sep">vs</div>
            <div class="item">
              <div class="sticker">win</div>
              <div class="logo"><img class="teamlogo" src="https://img-cdn.hltv.org/teamlogo/uGXQCgbNPTsZH1xUu-dNUI.png?ixlib=java-2.1.0&amp;w=50&amp;s=6c08df4532cb410b72cc3cfbc93945af" srcset="https://img-cdn.hltv.org/teamlogo/uGXQCgbNPTsZH1xUu-dNUI.png?ixlib=java-2.1.0&amp;w=100&amp;s=790693bd383df15073d2506242e1fce2 2x" title="The Prodigies"></div>
              <div class="title">Prodigies</div>
              <div class="points">120</div>
            </div>
          </div>
          <div class="content">
            <div class="heading">
              <a class="link" href="#">eSport League &#8211; CS GO Division</a>
            </div>
            <div class="date">MAY 20, 2024 11:00 am</div>
          </div>
        </div>
        <div class="links">
          <a href="#" class="stream-link twitch" target="_blank"><i><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 268">
          <path fill="currentColor" d="M17.458 0L0 46.556v186.201h63.983v34.934h34.931l34.898-34.934h52.36L256 162.954V0zm23.259 23.263H232.73v128.029l-40.739 40.741H128L93.113 226.92v-34.886H40.717zm64.008 116.405H128V69.844h-23.275zm63.997 0h23.27V69.844h-23.27z"/>
        </svg></i><span>twitch stream</span></a>
          <a href="#" class="stream-link youtube" target="_blank"><i><svg width="1em" height="1em" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
          viewBox="0 0 461.001 461.001" xml:space="preserve">
       <g>
         <path fill="currentColor" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728
           c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137
           C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607
           c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/>
       </g>
       </svg></i><span>youtube stream</span></a>
        </div>
      `;
      matchContainer.appendChild(fortniteMatch);
    }
  };

  const filterButtons = document.querySelectorAll(".filter-buttons button[data-filter]:not([data-filter='fortnite'])");
  filterButtons.forEach(button => {
    button.addEventListener("click", function() {
      if (fortniteMatch) {
        fortniteMatch.remove();
        fortniteMatch = null;
      }
    });
  });

  fortniteButton.addEventListener("click", function() {
    addFortniteMatch();
  });

  fortniteButton.addEventListener("click", function() {
      addFortniteMatch();
  });
});
document.addEventListener("DOMContentLoaded", function() {
  const matchContainer = document.querySelector('.matches-block');
  let pubgMatch = null;

  const addPUBGMatch = function() {
    if (!pubgMatch) {
      pubgMatch = document.createElement('div');
      pubgMatch.classList.add('match-item', 'event-box', 'istp-item');
      pubgMatch.setAttribute('data-category', 'pubg');
      pubgMatch.innerHTML = `
        <div class="wrap">
          <div class="game-team">
            <div class="item">
              <div class="logo"><img alt="Rebels" src="https://img-cdn.hltv.org/teamlogo/vfupmnriFumqC8u48wFIdm.png?ixlib=java-2.1.0&amp;w=50&amp;s=f88ee3468bbd8661c4d9e40b2eddda29" class="teamlogo" srcset="https://img-cdn.hltv.org/teamlogo/vfupmnriFumqC8u48wFIdm.png?ixlib=java-2.1.0&amp;w=100&amp;s=2ff8b2264de9a198450fe4ba845dd1e9 2x" title="Rebels"></div>
              <div class="title">ok</div>
              <div class="points">150</div>
            </div>
            <div class="sep">vs</div>
            <div class="item">
              <div class="sticker">win</div>
              <div class="logo"><img class="teamlogo" src="https://img-cdn.hltv.org/teamlogo/uGXQCgbNPTsZH1xUu-dNUI.png?ixlib=java-2.1.0&amp;w=50&amp;s=6c08df4532cb410b72cc3cfbc93945af" srcset="https://img-cdn.hltv.org/teamlogo/uGXQCgbNPTsZH1xUu-dNUI.png?ixlib=java-2.1.0&amp;w=100&amp;s=790693bd383df15073d2506242e1fce2 2x" title="The Prodigies"></div>
              <div class="title">Prodigies</div>
              <div class="points">120</div>
            </div>
          </div>
          <div class="content">
            <div class="heading">
              <a class="link" href="#">eSport League &#8211; CS GO Division</a>
            </div>
            <div class="date">MAY 20, 2024 11:00 am</div>
          </div>
        </div>
        <div class="links">
          <a href="#" class="stream-link twitch" target="_blank"><i><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 268">
          <path fill="currentColor" d="M17.458 0L0 46.556v186.201h63.983v34.934h34.931l34.898-34.934h52.36L256 162.954V0zm23.259 23.263H232.73v128.029l-40.739 40.741H128L93.113 226.92v-34.886H40.717zm64.008 116.405H128V69.844h-23.275zm63.997 0h23.27V69.844h-23.27z"/>
        </svg></i><span>twitch stream</span></a>
          <a href="#" class="stream-link youtube" target="_blank"><i><svg width="1em" height="1em" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
          viewBox="0 0 461.001 461.001" xml:space="preserve">
       <g>
         <path fill="currentColor" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728
           c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137
           C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607
           c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/>
       </g>
       </svg></i><span>youtube stream</span></a>
        </div>
      `;
      matchContainer.appendChild(pubgMatch);
    }
  };

  const filterButtons = document.querySelectorAll(".filter-buttons button[data-filter]:not([data-filter='pubg'])");
  filterButtons.forEach(button => {
    button.addEventListener("click", function() {
      if (pubgMatch) {
        pubgMatch.remove();
        pubgMatch = null;
      }
    });
  });

  const pubgButton = document.querySelector(".filter-buttons [data-filter='pubg']");
  pubgButton.addEventListener("click", function() {
    addPUBGMatch();
  });
});
const slides1 = document.querySelectorAll('.swiper-slide1');
const dots = document.querySelectorAll('.dot');
let currentIndex = 0;

function showSlide(index) {
  slides1[currentIndex].querySelector('.animatia').classList.remove('animate-in-left');
  slides1[currentIndex].querySelector('.animatia').classList.add('animate-out-right');

  currentIndex = index;

  slides1[currentIndex].querySelector('.animatia').classList.remove('animate-out-right');
  slides1[currentIndex].querySelector('.animatia').classList.add('animate-in-left');

  dots.forEach(dot => dot.classList.remove('active1'));
  dots[currentIndex].classList.add('active1');
}

dots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    showSlide(index);
  });
});


showSlide(0);



document.addEventListener('keydown', function(event) {
  const key = event.key;
  const elementId = 'item' + key;
  const element = document.getElementById(elementId);
  if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
  }
});