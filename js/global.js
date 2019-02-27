/* Borrows heavily from Dave Rupert's Cheapass Parallax 
 * https://daverupert.com/2018/02/cheapass-parallax/ 
 */

var battenBlockBioImage = document.querySelectorAll('.wp-block-batten-blocks-batten-bio');
battenBlockBioImage.forEach(e => e.classList.add('scroll-animate'));

var slideElements = document.querySelectorAll('.scroll-animate');
slideElements.forEach(el => el.classList.add("off-screen"));

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

function removeOffScreenClass() {
  slideElements.forEach(slideElement => {
    var scrollPosition = (window.pageYOffset || document.documentElement.scrollTop) + window.innerHeight;
    if (scrollPosition - 80 > slideElement.offsetTop) {
      slideElement.classList.remove('off-screen');
      slideElement.classList.add('on-screen');
      console.log('now!');
    }
  });
}

function handleScroll() {
  // change CSS scroll amount variable
  document.body.style.setProperty("--scroll-amount", (document.body.scrollTop || document.documentElement.scrollTop));
  // handle elements that animate on scroll
  removeOffScreenClass();
};

window.addEventListener('scroll', debounce(handleScroll));
removeOffScreenClass();


var heroImage = document.querySelector('.site-hero');
if ( window.innerWidth > 800 ) {
    heroImage.style.backgroundImage = `url('${heroImage.dataset.heroLarge}')`;
} else {
    heroImage.style.backgroundImage = `url('${heroImage.dataset.heroSmall}')`;
}

