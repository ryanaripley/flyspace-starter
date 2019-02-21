/* Borrows heavily from Dave Rupert's Cheapass Parallax 
 * https://daverupert.com/2018/02/cheapass-parallax/ 
 */

var slideElements = document.querySelectorAll('.slide-parent');
slideElements.forEach(el => el.classList.add("slid-away"));

function debounce(func, wait = 5, immediate = true) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

function slideIn() {
  slideElements.forEach(slideElement => {
    var scrollPosition = (window.pageYOffset || document.documentElement.scrollTop) + window.innerHeight;
    if (scrollPosition > slideElement.offsetTop) {
      slideElement.classList.remove('slid-away');
    }
  });
}

function handleScroll() {
  // change CSS scroll amount variable
  document.body.style.setProperty("--scroll-amount", (document.body.scrollTop || document.documentElement.scrollTop));
  // handle sliding elements
  slideIn();
};

window.addEventListener('scroll', debounce(handleScroll));
slideIn();


var heroImage = document.querySelector('.site-hero');
if ( window.innerWidth > 800 ) {
    heroImage.style.backgroundImage = `url('${heroImage.dataset.heroLarge}')`;
} else {
    heroImage.style.backgroundImage = `url('${heroImage.dataset.heroSmall}')`;
}
